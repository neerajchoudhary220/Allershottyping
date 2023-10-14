<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OneSignalController extends Controller
{
    public function index(){
        $activePage = "OneSignal";
        return view('aller.onesignal.index',compact('activePage'));
    }
}
