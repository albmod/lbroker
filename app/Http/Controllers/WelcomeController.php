<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{




    public function index($locale,$username)
    {

        App::setLocale($locale);
     $username = encrypt_decrypt('decrypt', $username);
     $member=User::where('username',$username)->first();

        if( $member){
        Auth::login($member, true);
            return view('main',compact('username'));
        }
        else{
            return' sorry';
        }



    }

    public function profile($locale,$username)
    {

        App::setLocale($locale);
        $username = encrypt_decrypt('decrypt', $username);
        $member=User::where('username',$username)->first();

        if( $member){
            Auth::login($member, true);
            return view('profile',compact('username'));
        }
        else{
            return' sorry';
        }



    }









}
