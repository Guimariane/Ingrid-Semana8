<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    public function index(){
        $pets = Pets::all();
        return $pets;

    }

    public function store(Request $request){

        try {
        $request->validate([
            'name' => 'required|string|max:150',
            'age' => 'int',
            'weight' => 'numeric',
            'size' => 'required|string|in:SMALL,MEDIUM,LARGE,EXTRA_LARGE',
            'race_id' => 'required|int',
            'specie_id' => 'required|int',
            'client_id' => 'int',
        ]);

        $data = $request->all();

        $pet = Pets::create($data);

        return $pet;

    } catch (\Exception $exception){
        return response()->json(['message' => $exception->getMessage()], 400);
    }

    }

    public function show($id){
        $pet = Pets::find($id);

        if(!$pet){
            return response()->json(['message' => 'Pet não encontrado'], 404);
        }

        return $pet;
    }

    public function destroy($id){
        $pet = Pets::find($id);

        if(!$pet){
            return response()->json(['message' => 'Pet não encontrado'], 404);
        }

        $pet->delete();

        return response(['message' => 'Id excluído com sucesso'], 204);

    }

    public function update($id, Request $request){

        try{

            $pet = Pets::find($id);

            if(!$pet){
                return response()->json(['message' => 'Pet não encontrado'], 404);
            }

            $pet->update($request->all());


        } catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], 400);
        }

    }
}
