<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\FriendsUsers;

class FriendsController extends Controller
{
    public function index(){
    	$friends = Auth::user()->friends()->get();
    	$friendRequests = Auth::user()->requests()->get();	
    	return view('friends', compact('friends', 'friendRequests'));
    }

    public function request($id){
    	$data['user_id'] = Auth::id();
    	$data['friend_id'] = $id;
    	$data['state'] = '0';
    	FriendsUsers::create($data);

    	return redirect(route('home'));
    }

    public function accept($id){
    	$friends_users = Auth::user()->requests()->where('user_id', $id)->get()->first();
    	$friends_users['state'] = '1';
    	dd($friends_users);
    	$friends_users->update();

    	return redirect(route('friends'));
    }

    public function reject($id){
    	$friends_users = Auth::user()->requests()->where('user_id', $id)->get()->first();
    	$friends_users->delete();

    	return redirect(route('friends'));
    }
}
