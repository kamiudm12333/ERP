<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();
        return view('backend.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('backend.clients.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:10',
            'country' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'status' => 'required|in:active,inactive,pending',
            'total_business' => 'nullable|numeric|min:0',
            'last_contact_date' => 'nullable|date'
        ]);

        Client::create($validateData);

        $notification = array(
            'message' => 'Client Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('clients.index')->with($notification);
    }

    public function show(Client $client)
    {
        return view('backend.clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('backend.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:10',
            'country' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'status' => 'required|in:active,inactive,pending',
            'total_business' => 'nullable|numeric|min:0',
            'last_contact_date' => 'nullable|date'
        ]);

        $client->update($validateData);

        $notification = array(
            'message' => 'Client Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('clients.index')->with($notification);
    }

    public function destroy(Client $client)
    {
        $client->delete();

        $notification = array(
            'message' => 'Client Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('clients.index')->with($notification);
    }
}
