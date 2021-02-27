<?php


namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as FortifyLoginResponse;

class LoginResponse implements FortifyLoginResponse
{

    public function toResponse($request)
    {
        $user = auth()->user();

        $role = $user->teamRole($user->currentTeam)->key;

        $routesByRole = [
            'owner' => 'dashboard',
            'admin' => 'dashboard',
            'editor' => 'home'
        ];

        return redirect()->route($routesByRole[$role]);
    }
}
