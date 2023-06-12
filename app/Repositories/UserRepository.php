<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function getById($id) {
        return User::findOrFail($id);
    }

    public function getByInfo($request) {
        $user = User::where('email', $request->email)->where('password', $request->password);
        if($user->exists()) {
            return  $user->first();
        }else{
            return false;
        }
    }


}
