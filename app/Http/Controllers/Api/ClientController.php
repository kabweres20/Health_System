<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display the profile of a single client via API.
     *
     * @param Client $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Client $client)
    {
        // Load related programs for the client if needed
        $client->load('programs');

        // Return the client data as a JSON response
        return response()->json([
            'success' => true,
            'client' => $client,
        ], 200);
    }
}
