<?php 
namespace VanguardLTE
{
    class SoccerOdds extends \Illuminate\Database\Eloquent\Model
    {
        protected $table = 'soccer_odds';
        public $timestamps = false;
        protected $fillable = [
            'event_id', 
            'fulltime_result', 
        ];
    }

}
