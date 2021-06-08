<?php 
namespace VanguardLTE\Http\Controllers\Web\Frontend
{
    class HomeController extends \VanguardLTE\Http\Controllers\Controller
    {
        public function index(\Illuminate\Http\Request $request)
        {
            return view('frontend.Default.homepage');
        }
    }
}