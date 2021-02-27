<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class UpdateTeamAddressController extends Controller
{
    public function __invoke(Request $request, Team $team)
    {
        $request->validate([
            'address' => ['required', 'min:3']
        ]);

        $team->update(['address' => $request->address]);

        return redirect()->back();
    }
}
