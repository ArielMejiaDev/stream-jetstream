<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as FortifyRegisterResponse;

class RegisterResponse implements FortifyRegisterResponse
{
    public function toResponse($request)
    {
        $user = auth()->user();

        $role = $user->teamRole($user->currentTeam)->key;

//        $routesByRole = [
//            'owner' => 'welcome.owner',
//            'admin' => 'dashboard',
//            'editor' => 'home'
//        ];

        return redirect()->route('welcome.owner');
    }
}
