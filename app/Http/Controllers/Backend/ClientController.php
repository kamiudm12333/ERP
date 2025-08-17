<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('assignedUser')->latest()->paginate(10);
        return view('backend.clients.index', compact('clients'));
    }

    public function create()
    {
        $users = User::all();
        return view('backend.clients.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'zip_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive,prospect,former',
            'notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:users,id',
            'source' => 'nullable|string|max:255',
            'last_contact' => 'nullable|date',
            'next_follow_up' => 'nullable|date|after:last_contact',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Client created successfully!');
    }

    public function show(Client $client)
    {
        $client->load('assignedUser', 'projects');
        return view('backend.clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        $users = User::all();
        return view('backend.clients.edit', compact('client', 'users'));
    }

    public function update(Request $request, Client $client)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'zip_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive,prospect,former',
            'notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:users,id',
            'source' => 'nullable|string|max:255',
            'last_contact' => 'nullable|date',
            'next_follow_up' => 'nullable|date|after:last_contact',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client updated successfully!');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully!');
    }
}