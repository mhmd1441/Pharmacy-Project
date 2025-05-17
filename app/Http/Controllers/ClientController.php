<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // READ - Display all clients

    // public function index()
    // {
    //     $clients = Client::all();
    //     return view('clients.index', compact('client'));
    // }

    public function index()

    {
       return view('Admin.viewClient');
    } 
      // CREATE - show form to add a new client



    public function create()
    {
        return view('clients.create');
    }

    // STORE - Store new client in the database

    public function store(Request $request)
    {
    $request->validate([
        'name'=> 'required|string|max:255',
        'email'=> 'required|string|email|max:255|unique:clients',
        'phone'=> 'required|string|max:255',
    ]);

    Client::create($request->all());

    return redirect()->route('clients.index')->with('success', 'Client added successfully!');
    }


    // UPDATE - save update cleint

    public function update(Request $requst, $id)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|max:255',
            'phone'=> 'required|string|max:255',
        ]);
        $client = Client::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('clients.index')->with('Success', 'Client updated Successfully.');
    }

    // DELETE - delete the client

    public function destroy($id)
    {
        $client = Client::findorFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client Deleted Successfully.');
    }
   
}
