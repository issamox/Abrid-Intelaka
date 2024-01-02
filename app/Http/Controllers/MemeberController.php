<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemeberController extends Controller
{
    public function index(){
        $members = Member::all();
        return view('members.index',compact('members'));
    }
}
