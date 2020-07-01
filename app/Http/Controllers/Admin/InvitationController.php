<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitations = Invitation::where('registered_at', null)->orderBy('created_at', 'desc')->get();
        $title = 'Invitation Requests';
        return view('admin.invitations.index', compact('title', 'invitations'));
    }

    public function sendInvite(Request $request, $id)
    {
        $invite = Invitation::findOrFail($id);
        
        $url = $invite->getLink();
        $email = $invite->email;

        Mail::to($email)->send(new InvitationMail($url));
        return redirect()->route('admin.showInvitations')->with('success','Invitation Sended Successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
