<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MyBet;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function BetList()
    {
        try {
            $bet=MyBet::find(Auth::user()->id)->get();
        } catch (\Throwable $th) {
            $bet=null;
        }
        
       
        
        return view('MyBets',['bets'=>$bet]);
    }
    public function modifyBet(MyBet $bet)
    {
        
    }
    public function cancelBet(MyBet $bet,$user_id,$object_id)
    {
        MyBet::where('user_id',$user_id)
        ->where('object_id',$object_id)
        ->delete();
        return back();
    }
}
