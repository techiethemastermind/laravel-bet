<?php 
namespace VanguardLTE\Http\Controllers\Web\Frontend
{
    set_time_limit(0);
    class TestController extends \VanguardLTE\Http\Controllers\Controller
    {
        public function index(\Illuminate\Http\Request $request)
        {

        }

        public function sportsRefresh(\Illuminate\Http\Request $request)
        {
            $sportArr = [
                '1'	     => 'Soccer',
                '18'	 => 'Basketball',
                '13'	 => 'Tennis',
                '91'	 => 'Volleyball',
                '78'	 => 'Handball',
                '16'	 => 'Baseball',
                '17'	 => 'Ice Hockey',
                '14'	 => 'Snooker',
                '12'	 => 'American Football',
                '3'	     => 'Cricket',
                '83'	 => 'Futsal',
                '15'	 => 'Darts',
                '92'	 => 'Table Tennis',
                '94'	 => 'Badminton',
                '8'	     => 'Rugby Union',
                '19'	 => 'Rugby League',
                '36'	 => 'Australian Rules',
                '66'	 => 'Bowls',
                '9'	     => 'Boxing/UFC',
                '75'	 => 'Gaelic Sports',
                '90'	 => 'Floorball',
                '95'	 => 'Beach Volleyball',
                '110'	 => 'Water Polo',
                '107'	 => 'Squash',
                '151'	 => 'E-sports',
            ];
            
            $sport = $request->get('sport');
            $response = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v1/bet365/inplay_filter?sport_id='.$sport.'&token='.env('API_TOKEN'));
            $apiData = $response->json();
            if(isset($apiData['results'])){
                $data = $apiData['results'];
                foreach($data as $index => $row) {
                    $statResponse = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v1/bet365/event?token='.env('API_TOKEN').'&FI='.$row['id']);
                    $odds = array();
                    $columns = 0;
                    $fulltimeResultFound = false;
                    $matchGoalsFound = false;
                    if(isset($statResponse['results'])) {
                        foreach($statResponse['results'][0] as $result) {
                            // fulltime_result
                            if($result['type'] == 'MG' && $result['ID'] == 1777) {
                                $fulltimeResultFound = true;
                            }
                            if($fulltimeResultFound && $result['type'] == 'MA') {
                                $columns = $result['CN'];
                            }
                            if($columns != 0 && $fulltimeResultFound && $result['type'] == 'PA') {
                                $odds[] = [
                                    'title' => $result['NA'],
                                    'name' => $result['N2'],
                                    'odds' => $this->convertToDecimal($result['OD']) + 1,
                                ];
                                $columns--;
                                if($columns == 0) {
                                    $fulltimeResultFound = false;
                                }
                            }
    
                            // match_goals
                            // if($result['type'] == 'MG' && $result['ID'] == 421) {
                            //     $matchGoalsFound = true;
                            // }
                            // if($matchGoalsFound && $result['type'] == 'PA' && isset($result['HA'])) {
                            //     $odds['match_goals'][] = [
                            //         'handicap' => $result['HA'],
                            //         'odds' => $this->convertToDecimal($result['OD']) + 1,
                            //     ];
                            //     if(count($odds['match_goals']) >= 2) {
                            //         $matchGoalsFound = false;
                            //     }
                            // }
                        }
                    }

                    //store odds
                    $rseultCount = \VanguardLTE\SoccerOdds::where('event_id', $row['id'])->count();
                    if($rseultCount == 0) {
                        \VanguardLTE\SoccerOdds::create([
                            'event_id'              => $row['id'], 
                            'fulltime_result'       => json_encode($odds)
                        ]);
                    }else{
                        \VanguardLTE\SoccerOdds::where('event_id', $row['id'])
                        ->update([
                            'fulltime_result'       => json_encode($odds)
                        ]);
                    }

                    //store event in DB
                    $count = \VanguardLTE\MatchEvent::where('event_id', $row['id'])->count();
                    if($count == 0) {
                        \VanguardLTE\MatchEvent::create([
                            'event_id'      => $row['id'], 
                            'sport_id'      => $sport,
                            'sport_name'    => $sportArr[$sport],
                            'time'          => $row['time'],
                            'time_status'   => $row['time_status'],
                            'league'        => json_encode($row['league']),
                            'home'          => json_encode($row['home']),
                            'away'          => json_encode($row['away']),
                            'ss'            => $row['ss'],
                            'updated_at'    => date('Y-m-d H:i:s'),
                            'created_at'    => date('Y-m-d H:i:s'),
                        ]);
                    }else{
                        \VanguardLTE\MatchEvent::where('event_id', $row['id'])
                        ->update([
                            'sport_id'      => $sport,
                            'sport_name'    => $sportArr[$sport],
                            'time'          => $row['time'],
                            'time_status'   => $row['time_status'],
                            'league'        => json_encode($row['league']),
                            'home'          => json_encode($row['home']),
                            'away'          => json_encode($row['away']),
                            'ss'            => $row['ss'],
                            'updated_at'    => date('Y-m-d H:i:s')
                        ]);
                    }
                }
            }
        }

        public function soccerOddsRefresh()
        {
            $events = \DB::table('match_events')
                                ->where('sport_id', '1')
                                ->where('time_status', '1')
                                ->get();
            if($events->count() > 0) {
                foreach($events as $event) {
                    $statResponse = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v1/bet365/event?token='.env('API_TOKEN').'&FI='.$event->event_id);
                    $odds = array();
                    $columns = 0;
                    $fulltimeResultFound = false;
                    $matchGoalsFound = false;
                    $timeStatus = $event->time_status;
                    if(isset($statResponse['results'])) {
                        foreach($statResponse['results'][0] as $result) {
                            //Update time status
                            if($result['type'] == 'EV') {
                                $timeStatus = $result['TT'];
                            }

                            // fulltime_result
                            if($result['type'] == 'MG' && $result['ID'] == 1777) {
                                $fulltimeResultFound = true;
                            }
                            if($fulltimeResultFound && $result['type'] == 'MA') {
                                $columns = $result['CN'];
                            }
                            if($columns != 0 && $fulltimeResultFound && $result['type'] == 'PA') {
                                $odds[] = [
                                    'title' => $result['NA'],
                                    'name' => $result['N2'],
                                    'odds' => $this->convertToDecimal($result['OD']) + 1,
                                ];
                                $columns--;
                                if($columns == 0) {
                                    $fulltimeResultFound = false;
                                }
                            }
    
                            // match_goals
                            // if($result['type'] == 'MG' && $result['ID'] == 421) {
                            //     $matchGoalsFound = true;
                            // }
                            // if($matchGoalsFound && $result['type'] == 'PA' && isset($result['HA'])) {
                            //     $odds['match_goals'][] = [
                            //         'handicap' => $result['HA'],
                            //         'odds' => $this->convertToDecimal($result['OD']) + 1,
                            //     ];
                            //     if(count($odds['match_goals']) >= 2) {
                            //         $matchGoalsFound = false;
                            //     }
                            // }
                        }
                    }

                    if($timeStatus != $event->time_status) {
                        \VanguardLTE\MatchEvent::where('id', $event->id)
                        ->update([
                            'time_status'   => $timeStatus,
                            'updated_at'    => date('Y-m-d H:i:s')
                        ]);
                    }

                    //store odds
                    \VanguardLTE\SoccerOdds::where('event_id', $event->id)
                    ->update([
                        'fulltime_result'   => json_encode($odds)
                    ]);
                }
            }
        }

        function convertToDecimal ($fraction)
        {
            $numbers=explode("/",$fraction);
            $floatValue = round($numbers[0]/$numbers[1], 2);
            return number_format((float)$floatValue, 2, '.', '');
        }
    }
}