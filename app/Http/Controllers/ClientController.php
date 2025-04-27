<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Program;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Show the form to create a new client.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retrieve all programs from the database and pass them to the view
        $programs = Program::all();

        // Return the create view and pass the programs data to the view
        return view('clients.create', compact('programs'));
    }

    /**
     * Store a newly created client in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data to ensure it meets the required criteria
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'programs' => 'required|array',
        ]);

        // Create a new client using the validated data (name and age)
        $client = Client::create($request->only(['name', 'age']));

        // Attach the selected programs to the client (many-to-many relationship)
        $client->programs()->attach($request->programs);

        // Redirect to the clients index page with a success message
        return redirect()->route('clients.index')->with('success', 'Client registered successfully.');
    }

    /**
     * Display a list of all clients with optional search.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Search functionality
        $search = $request->input('search');  // Get the search term from the request

        if ($search) {
            // If search term is provided, filter clients by name or age
            $clients = Client::where('name', 'like', "%{$search}%")
                             ->orWhere('age', 'like', "%{$search}%")
                             ->get();
        } else {
            // If no search term, retrieve all clients
            $clients = Client::all();
        }

        // Return the view with the list of clients and the search term
        return view('clients.index', compact('clients', 'search'));
    }

    /**
     * Display the details of a single client.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Retrieve the client by its ID
        $client = Client::findOrFail($id);

        // Return the view with the client details
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form to edit an existing client.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Retrieve the client by its ID
        $client = Client::findOrFail($id);

        // Retrieve all programs from the database
        $programs = Program::all();

        // Return the edit view with the client data and available programs
        return view('clients.edit', compact('client', 'programs'));
    }

    /**
     * Update an existing client in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'programs' => 'required|array',
        ]);

        // Retrieve the client by its ID
        $client = Client::findOrFail($id);

        // Update the client data
        $client->update($request->only(['name', 'age']));

        // Sync the programs (many-to-many relationship) with the updated list
        $client->programs()->sync($request->programs);

        // Redirect to the clients index page with a success message
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }
}
