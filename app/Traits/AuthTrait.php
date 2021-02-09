<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait AuthTrait{
    public function userAuthCheck(){
        if (!Auth::user()){
            throw new \Exception('You have to be logged in');
        }
    }
}
