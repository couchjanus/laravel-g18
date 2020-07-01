<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;

class InvitationController extends Controller
{
    public function store(Request $request)
    {
        $invitation = new Invitation($request->all());
        $invitation->generateInvitationToken();
        $invitation->save();

        return redirect()->route('requestInvitation')
            ->with('success', 'Invitation to register successfully requested. Please wait for registration link.');
    }
}
