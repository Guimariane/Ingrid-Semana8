<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();
        return $clients;

    }

    public function store(Request $request){

        try {
        $request->validate([
            'people_id' => 'required',
        ]);

        $data = $request->all();

        $person = Client::create($data);

        return $person;

    } catch (\Exception $exception){
        return response()->json(['message' => $exception->getMessage()], 400);
    }

    }
}
