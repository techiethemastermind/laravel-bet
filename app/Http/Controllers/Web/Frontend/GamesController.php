<?php 
namespace VanguardLTE\Http\Controllers\Web\Frontend
{
    class GamesController extends \VanguardLTE\Http\Controllers\Controller
    {
        public function index(\Illuminate\Http\Request $request, $category1 = '', $category2 = '')
        {
/*            $checked = new \VanguardLTE\Lib\LicenseDK();
            $license_notifications_array = $checked->aplVerifyLicenseDK(null, 0);
            if( $license_notifications_array['notification_case'] != 'notification_license_ok' ) 
            {
                return redirect()->route('frontend.page.error_license');
            }
            if( !$this->security() ) 
            {
                return redirect()->route('frontend.page.error_license');
            }*/
            if( \Illuminate\Support\Facades\Auth::check() && !\Illuminate\Support\Facades\Auth::user()->hasRole('user') ) 
            {
                return redirect()->route('backend.dashboard');
            }
            if( !\Illuminate\Support\Facades\Auth::check() ) 
            {
                return redirect()->route('frontend.auth.login');
            }
            $categories = [];
            $game_ids = [];
            $cat1 = false;
            $title = trans('app.games');
            $body = '';
            $keywords = '';
            $description = '';
            $shop_id = (\Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->shop_id : 0);
            $shop = \VanguardLTE\Shop::find($shop_id);
            $games = \VanguardLTE\Game::where([
                'view' => 1, 
                'shop_id' => $shop_id
            ]);
            $frontend = 'Default';
            if( $shop_id && $shop ) 
            {
                $frontend = $shop->frontend;
            }
            if( $category1 == '' ) 
            {
                if( $currentCategory = $request->cookie('currentCategory') ) 
                {
                    $category = \VanguardLTE\Category::where([
                        'href' => $currentCategory, 
                        'shop_id' => $shop_id
                    ])->first();
                    if( $category ) 
                    {
                        $category1 = $category->href;
                        return redirect()->route('frontend.game.list.category', [
                            'category1' => $category1, 
                            'page' => $request->cookie('currentPage')
                        ]);
                    }
                }
                if( settings('use_all_categories') ) 
                {
                    return redirect()->route('frontend.game.list.category', [
                        'category1' => 'all', 
                        'page' => $request->cookie('currentPage')
                    ]);
                }
                $category = \VanguardLTE\Category::where([
                    'parent' => 0, 
                    'shop_id' => $shop_id
                ])->orderBy('position')->first();
                if( $category ) 
                {
                    $category1 = $category->href;
                    return redirect()->route('frontend.game.list.category', $category1);
                }
            }
            \Illuminate\Support\Facades\Cookie::queue('currentCategory', $category1, 2678400);
            if( $category1 != '' ) 
            {
                $cat1 = \VanguardLTE\Category::where([
                    'href' => $category1, 
                    'shop_id' => $shop_id
                ])->first();
                if( !$cat1 && $category1 != 'all' ) 
                {
                    abort(404);
                }
                if( $category2 != '' ) 
                {
                    $cat2 = \VanguardLTE\Category::where([
                        'href' => $category2, 
                        'parent' => $cat1->id, 
                        'shop_id' => $shop_id
                    ])->first();
                    if( !$cat2 ) 
                    {
                        abort(404);
                    }
                    $categories[] = $cat2->id;
                }
                else if( $category1 != 'all' ) 
                {
                    $categories = \VanguardLTE\Category::where([
                        'parent' => $cat1->id, 
                        'shop_id' => $shop_id
                    ])->pluck('id')->toArray();
                    $categories[] = $cat1->id;
                }
                else
                {
                    $categories = \VanguardLTE\Category::where([
                        'parent' => 0, 
                        'shop_id' => $shop_id
                    ])->pluck('id')->toArray();
                }
                if( $frontend == 'Amatic' ) 
                {
                    $Amatic = \VanguardLTE\Category::where([
                        'title' => 'Amatic', 
                        'shop_id' => $shop_id
                    ])->first();
                    if( $Amatic ) 
                    {
                        $categories = \VanguardLTE\Category::where([
                            'parent' => $Amatic->id, 
                            'shop_id' => $shop_id
                        ])->pluck('id')->toArray();
                        $categories[] = $Amatic->id;
                    }
                }
                if( $frontend == 'NetEnt' ) 
                {
                    $Amatic = \VanguardLTE\Category::where([
                        'title' => 'NetEnt', 
                        'shop_id' => $shop_id
                    ])->first();
                    if( $Amatic ) 
                    {
                        $categories = \VanguardLTE\Category::where([
                            'parent' => $Amatic->id, 
                            'shop_id' => $shop_id
                        ])->pluck('id')->toArray();
                        $categories[] = $Amatic->id;
                    }
                }
                $game_ids = \VanguardLTE\GameCategory::whereIn('category_id', $categories)->groupBy('game_id')->pluck('game_id')->toArray();
                if( count($game_ids) > 0 ) 
                {
                    $games = $games->whereIn('id', $game_ids);
                }
                else
                {
                    $games = $games->where('id', 0);
                }
            }
            $detect = new \Detection\MobileDetect();
            $devices = [];
            if( $detect->isMobile() || $detect->isTablet() ) 
            {
                $games = $games->whereIn('device', [
                    0, 
                    2
                ]);
                $devices = [
                    0, 
                    2
                ];
            }
            else
            {
                $games = $games->whereIn('device', [
                    1, 
                    2
                ]);
                $devices = [
                    1, 
                    2
                ];
            }
            if( $shop ) 
            {
                switch( $shop->orderby ) 
                {
                    case 'AZ':
                        $games = $games->orderBy('name', 'ASC');
                        break;
                    case 'Rand':
                        $games = $games->inRandomOrder();
                        break;
                    case 'RTP':
                        $games = $games->orderBy(\DB::raw('CASE WHEN(stat_in > 0) THEN(stat_out*100)/stat_in ELSE 0 END '), 'DESC');
                        break;
                    case 'Count':
                        $games = $games->orderBy('bids', 'DESC');
                        break;
                    case 'Date':
                        $games = $games->orderBy('created_at', 'DESC');
                        break;
                }
            }
            $games = $games->get();
            $jpgs = \VanguardLTE\JPG::where('shop_id', $shop_id)->get();
            $categories = false;
            $currentSliderNum = -1;
            if( $games ) 
            {
                $cat_ids = \VanguardLTE\GameCategory::whereIn('game_id', \VanguardLTE\Game::where([
                    'view' => 1, 
                    'shop_id' => $shop_id
                ])->pluck('id'))->groupBy('category_id')->pluck('category_id');
                if( count($cat_ids) ) 
                {
                    $categories = \VanguardLTE\Category::whereIn('id', $cat_ids)->get();
                    if( $category1 != '' ) 
                    {
                        foreach( $categories as $index => $cat ) 
                        {
                            if( $cat->href == $category1 ) 
                            {
                                $currentSliderNum = $cat->href;
                                break;
                            }
                        }
                    }
                }
            }
            if( settings('use_all_categories') && $category1 == 'all' ) 
            {
                $currentSliderNum = 'all';
            }
            return view('frontend.' . $frontend . '.games.list', compact('games', 'category1', 'cat1', 'categories', 'currentSliderNum', 'title', 'body', 'keywords', 'description', 'jpgs', 'shop', 'devices'));
        }
        public function setpage(\Illuminate\Http\Request $request)
        {
            $cookie = cookie('currentPage', $request->page, 2678400);
            return response()->json([
                'success' => true, 
                'page' => $request->page
            ])->cookie($cookie);
        }
        public function search(\Illuminate\Http\Request $request)
        {
            if( \Illuminate\Support\Facades\Auth::check() && !\Illuminate\Support\Facades\Auth::user()->hasRole('user') ) 
            {
                return redirect()->route('backend.dashboard');
            }
            if( !\Illuminate\Support\Facades\Auth::check() ) 
            {
                return redirect()->route('frontend.auth.login');
            }
            $shop_id = (\Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->shop_id : 0);
            $frontend = 'Default';
            if( $shop_id ) 
            {
                $shop = \VanguardLTE\Shop::find($shop_id);
                if( $shop ) 
                {
                    $frontend = $shop->frontend;
                }
            }
            $query = (isset($request->q) ? $request->q : '');
            $games = \VanguardLTE\Game::where('view', 1);
            $games = $games->where('shop_id', $shop_id);
            $games = $games->where('name', 'like', '%' . $query . '%');
            $detect = new \Detection\MobileDetect();
            if( $detect->isMobile() || $detect->isTablet() ) 
            {
                $games = $games->whereIn('device', [
                    0, 
                    2
                ]);
            }
            else
            {
                $games = $games->whereIn('device', [
                    1, 
                    2
                ]);
            }
            $games = $games->orderBy('name', 'ASC');
            $games = $games->get();
            return view('frontend.' . $frontend . '.games.search', compact('games'));
        }
        public function go(\Illuminate\Http\Request $request, $game)
        {
            if( \Illuminate\Support\Facades\Auth::check() && !\Illuminate\Support\Facades\Auth::user()->hasRole('user') ) 
            {
                return redirect()->route('backend.dashboard');
            }
            if( !\Illuminate\Support\Facades\Auth::check() ) 
            {
                return redirect()->route('frontend.auth.login');
            }
            $detect = new \Detection\MobileDetect();
            $userId = \Illuminate\Support\Facades\Auth::id();
            $object = '\VanguardLTE\Games\\' . $game . '\SlotSettings';
            $slot = new $object($game, $userId);
            $game = \VanguardLTE\Game::where([
                'name' => $game, 
                'shop_id' => \Illuminate\Support\Facades\Auth::user()->shop_id
            ]);
            if( $detect->isMobile() || $detect->isTablet() ) 
            {
                $game = $game->whereIn('device', [
                    0, 
                    2
                ]);
            }
            else
            {
                $game = $game->whereIn('device', [
                    1, 
                    2
                ]);
            }
            $game = $game->first();
            if( !$game ) 
            {
                return redirect()->route('frontend.game.list');
            }
            if( !$game->view ) 
            {
                return redirect()->route('frontend.game.list');
            }
            $is_api = false;
            return view('frontend.games.list.' . $game->name, compact('slot', 'game', 'is_api'));
        }
        public function server(\Illuminate\Http\Request $request, $game)
        {
            if( \Illuminate\Support\Facades\Auth::check() && !\Illuminate\Support\Facades\Auth::user()->hasRole('user') ) 
            {
                echo '{"responseEvent":"error","responseType":"start","serverResponse":"Wrong User"}';
                exit();
            }
            if( !\Illuminate\Support\Facades\Auth::check() ) 
            {
            }
            $GLOBALS['rgrc'] = config('app.salt');
            $userId = \Illuminate\Support\Facades\Auth::id();
            $object = '\VanguardLTE\Games\\' . $game . '\Server';
            $server = new $object();
            echo $server->get($request, $game, $userId);
        }
/*        public function security()
        {
            if( config('LicenseDK.APL_INCLUDE_KEY_CONFIG') != 'wi9qydosuimsnls5zoe5q298evkhim0ughx1w16qybs2fhlcpn' ) 
            {
                return false;
            }
            if( md5_file(base_path() . '/app/Lib/LicenseDK.php') != '3c5aece202a4218a19ec8c209817a74e' ) 
            {
                return false;
            }
            if( md5_file(base_path() . '/config/LicenseDK.php') != '951a0e23768db0531ff539d246cb99cd' ) 
            {
                return false;
            }
            return true;
        }*/

        function apiSports(\Illuminate\Http\Request $request)
        {
            $arr = [
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

            asort($arr);

            return $arr;
        }

        function inplayEvents($sport, \Illuminate\Http\Request $request)
        {
            $data = array();
            $leagueMatches = [];
            $count = $request->get('limit');
            $clubLeague = $request->get('league');

            if(!$count){
                $count = 10;
            }

            if($sport == 1) {
                $query = \DB::table('match_events as me')
                            ->join('soccer_odds as so', 'so.event_id', '=', 'me.event_id')
                            ->where('me.time_status', '1');
                if($count != 'all' && $count != '') {
                    $query->limit($count);
                }
                $data = $query->get();

                if($clubLeague){
                    foreach($data as $index => $row) {
                        $league = json_decode($row->league);
                        $leagueMatches[$league->id]['name'] = $league->name;
                        $leagueMatches[$league->id]['matches'][] = $data[$index];
                    }
                    $data = $leagueMatches;
                }

                return $data;
            }

            $response = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v1/bet365/inplay_filter?sport_id='.$sport.'&token='.env('API_TOKEN'));
            $apiData = $response->json();
            if(isset($apiData['results'])){
                if($count == 'all') {
                    $data = $apiData['results'];
                }else{
                    $data = array_slice($apiData['results'], 0, $count);
                }
                foreach($data as $index => $row) {
                    if($clubLeague){
                        if($sport == 1) {
                            $statResponse = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v1/bet365/event?token='.env('API_TOKEN').'&FI='.$row['id']);
                            $odds = array();
                            $columns = 0;
                            $fulltimeResultFound = false;
                            $matchGoalsFound = false;
                            foreach($statResponse['results'][0] as $result) {
                                // fulltime_result
                                if($result['type'] == 'MG' && $result['ID'] == 1777) {
                                    $fulltimeResultFound = true;
                                }
                                if($fulltimeResultFound && $result['type'] == 'MA') {
                                    $columns = $result['CN'];
                                }
                                if($columns != 0 && $fulltimeResultFound && $result['type'] == 'PA') {
                                    $odds['fulltime_result'][] = [
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
                                if($result['type'] == 'MG' && $result['ID'] == 421) {
                                    $matchGoalsFound = true;
                                }
                                if($matchGoalsFound && $result['type'] == 'PA' && isset($result['HA'])) {
                                    $odds['match_goals'][] = [
                                        'handicap' => $result['HA'],
                                        'odds' => $this->convertToDecimal($result['OD']) + 1,
                                    ];
                                    if(count($odds['match_goals']) >= 2) {
                                        $matchGoalsFound = false;
                                    }
                                }
                            }
                            $data[$index]['odds'] = (count($odds) > 0)? $odds : '';

                        }else{
                            $statResponse = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v3/bet365/prematch?token='.env('API_TOKEN').'&FI='.$row['id']);
                            $data[$index]['odds'] = $statResponse['results'][0];    
                        }
                        $leagueMatches[$row['league']['id']]['name'] = $row['league']['name'];
                        $leagueMatches[$row['league']['id']]['matches'][] = $data[$index];
                    }else{
                        if($sport == 1) {
                            $statResponse = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v1/bet365/event?token='.env('API_TOKEN').'&FI='.$row['id']);
                            $odds = array();
                            $columns = 0;
                            $marketFound = false;
                            foreach($statResponse['results'][0] as $result) {
                                if($result['type'] == 'MG' && $result['ID'] == 1777) {
                                    $marketFound = true;
                                }
                                if($marketFound && $result['type'] == 'MA') {
                                    $columns = $result['CN'];
                                }
                                if($columns != 0 && $marketFound && $result['type'] == 'PA') {
                                    $odds[] = [
                                        'title' => $result['NA'],
                                        'name' => $result['N2'],
                                        'odds' => $this->convertToDecimal($result['OD']) + 1,
                                    ];
                                    $columns--;
                                    if($columns == 0) {
                                        $marketFound = false;
                                    }
                                }
                            }
                            $data[$index]['odds'] = (count($odds) > 0)? $odds : '';
                        }else if($sport == 13){
                            $statResponse = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v3/bet365/prematch?token='.env('API_TOKEN').'&FI='.$row['id']);
                            $data[$index]['odds'] = (isset($statResponse['results'][0]['main']['sp']['to_win_match']['odds']))? $statResponse['results'][0]['main']['sp']['to_win_match']['odds'] : '';
                        }

                        if($data[$index]['odds'] == '') {
                            unset($data[$index]);
                        }
                    }
                }

            }
            if($clubLeague){
                $data = $leagueMatches;
            }
            return $data;
        }

        function getInplayEvent($sport, $eventID, \Illuminate\Http\Request $request)
        {
            $event = null;
            $response = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v1/bet365/inplay_filter?sport_id='.$sport.'&token='.env('API_TOKEN'));
            $apiData = $response->json();
            foreach($apiData['results'] as $index => $row) {
                if($row['id'] == $eventID){
                    $event = $row;
                }
            }
            if($event) {
                return response()->json(['status' => 'success', 'data' => $event]);
            }else{
                return response()->json(['status' => 'error', 'data' => null]);
            }
        }

        function convertToDecimal ($fraction)
        {
            $numbers=explode("/",$fraction);
            $floatValue = round($numbers[0]/$numbers[1], 2);
            return number_format((float)$floatValue, 2, '.', '');
        }

        function featuredGames($sport)
        {
            $response = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v1/bet365/upcoming?sport_id='.$sport.'&token='.env('API_TOKEN').'&day='.date('Ymd'));
            $apiData = $response->json();
            $data = array_slice($apiData['results'], 0, 15);
            foreach($data as $index => $row) {
                $statResponse = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v1/bet365/event?token='.env('API_TOKEN').'&FI='.$row['id']);
                $odds = array();
                $columns = 0;
                $marketFound = false;
                foreach($statResponse['results'][0] as $result) {
                    if($result['type'] == 'MG' && $result['ID'] == 1777) {
                        $marketFound = true;
                    }
                    if($marketFound && $result['type'] == 'MA') {
                        $columns = $result['CN'];
                    }
                    if($columns != 0 && $marketFound && $result['type'] == 'PA') {
                        $odds[] = [
                            'title' => $result['NA'],
                            'name' => $result['N2'],
                            'odds' => $this->convertToDecimal($result['OD']) + 1,
                        ];
                        $columns--;
                        if($columns == 0) {
                            $marketFound = false;
                        }
                    }
                }
                $data[$index]['odds'] = (count($odds) > 0)? $odds : '';
                if($data[$index]['odds'] == '') {
                    unset($data[$index]);
                }
            }
            return $data;
        }

        function prematchOdds($eventID, \Illuminate\Http\Request $request)
        {
            $sportID = $request->get('sportID');
            if($sportID == 1) {
                $statResponse = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v1/bet365/event?token='.env('API_TOKEN').'&FI='.$eventID);
                $odds = array();
                $columns = 0;
                $fulltimeResultFound = false;
                $doubleChanceFound = false;
                $halfTimeResultFound = false;
                $firstGoalFound = false;
                $matchGoalsFound = false;
                foreach($statResponse['results'][0] as $result) {
                    // fulltime_result
                    if($result['type'] == 'MG' && $result['ID'] == 1777) {
                        $fulltimeResultFound = true;
                    }
                    if($fulltimeResultFound && $result['type'] == 'MA') {
                        $columns = $result['CN'];
                    }
                    if($columns != 0 && $fulltimeResultFound && $result['type'] == 'PA') {
                        $odds['fulltime_result'][] = [
                            'title' => $result['NA'],
                            'name' => $result['N2'],
                            'odds' => $this->convertToDecimal($result['OD']) + 1,
                        ];
                        $columns--;
                        if($columns == 0) {
                            $fulltimeResultFound = false;
                        }
                    }

                    // double_chance
                    if($result['type'] == 'MG' && $result['ID'] == 10115) {
                        $doubleChanceFound = true;
                    }
                    if($doubleChanceFound && $result['type'] == 'MA') {
                        $columns = $result['CN'];
                    }
                    if($columns != 0 && $doubleChanceFound && $result['type'] == 'PA') {
                        $odds['double_chance'][] = [
                            'title' => $result['NA'],
                            'odds' => $this->convertToDecimal($result['OD']) + 1,
                        ];
                        $columns--;
                        if($columns == 0) {
                            $doubleChanceFound = false;
                        }
                    }

                    // half_time_result
                    if($result['type'] == 'MG' && $result['ID'] == 10161) {
                        $halfTimeResultFound = true;
                    }
                    if($halfTimeResultFound && $result['type'] == 'MA') {
                        $columns = $result['CN'];
                    }
                    if($columns != 0 && $halfTimeResultFound && $result['type'] == 'PA') {
                        $odds['half_time_result'][] = [
                            'title' => $result['NA'],
                            'odds' => $this->convertToDecimal($result['OD']) + 1,
                        ];
                        $columns--;
                        if($columns == 0) {
                            $halfTimeResultFound = false;
                        }
                    }

                    // first_goal
                    if($result['type'] == 'MG' && $result['ID'] == 1778) {
                        $firstGoalFound = true;
                    }
                    if($firstGoalFound && $result['type'] == 'MA') {
                        $columns = $result['CN'];
                    }
                    if($columns != 0 && $firstGoalFound && $result['type'] == 'PA') {
                        $odds['first_goal'][] = [
                            'title' => $result['NA'],
                            'odds' => $this->convertToDecimal($result['OD']) + 1,
                        ];
                        $columns--;
                        if($columns == 0) {
                            $firstGoalFound = false;
                        }
                    }

                    // match_goals
                    if($result['type'] == 'MG' && $result['ID'] == 421) {
                        $matchGoalsFound = true;
                    }
                    if($matchGoalsFound && $result['type'] == 'PA' && isset($result['HA'])) {
                        $odds['match_goals'][] = [
                            'handicap' => $result['HA'],
                            'odds' => $this->convertToDecimal($result['OD']) + 1,
                        ];
                        if(count($odds['match_goals']) >= 2) {
                            $matchGoalsFound = false;
                        }
                    }
                }
                return $odds;
            }else{
                $response = \Illuminate\Support\Facades\Http::get('http://api.b365api.com/v1/bet365/prematch?FI='.$eventID.'&token='.env('API_TOKEN'));
                $apiData = $response->json();
                return $apiData['results'];
            }
        }
    }
}
namespace 
{
    function onkXppk3PRSZPackRnkDOJaZ9()
    {
        return 'OkBM2iHjbd6FHZjtvLpNHOc3lslbxTJP6cqXsMdE4evvckFTgS';
    }

}
