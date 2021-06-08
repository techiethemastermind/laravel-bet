<?php 
namespace VanguardLTE
{
    class MatchEvent extends \Illuminate\Database\Eloquent\Model
    {
        protected $fillable = [
            'event_id', 
            'sport_id', 
            'sport_name', 
            'time', 
            'time_status', 
            'league', 
            'home', 
            'away', 
            'ss', 
            'updated_at', 
            'created_at'
        ];
    }

}
