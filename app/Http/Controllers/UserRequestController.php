<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user_requests = UserRequest::all();
        return view('user-requests.index', compact('user_requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user-requests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        UserRequest::create($request->all());
        return redirect()->route('user-requests.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user_request = UserRequest::find($id);
        return view('user-requests.show', compact('user_request'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user_request = UserRequest::find($id);
        return view('user-requests.edit', compact('user_request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user_request = UserRequest::find($id);
        $user_request->update($request->all());
        return redirect()->route('user-requests.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user_request = UserRequest::find($id);
        $user_request->delete();
        return redirect()->route('user_request.index');
    }
}
