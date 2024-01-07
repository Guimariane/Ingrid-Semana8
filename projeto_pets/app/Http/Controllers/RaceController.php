<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    public function index(){
        $races = Race::all();
        return $races;

    }

    public function store(Request $request){

        try {
        $request->validate([
            'name' => 'required|unique:races|string|max:50',
        ]);

        $data = $request->all();

        $product = Race::create($data);

        return $product;

    } catch (\Exception $exception){
        return response()->json(['message' => $exception->getMessage()], 400);
    }

    }

    public function show($id){
        $race = Race::find($id);

        if(!$race){
            return response()->json(['message' => 'Categoria não foi encontrada'], 404);
        }

        return $race;
    }

    public function destroy($id){
        $race = Race::find($id);

        if(!$race){
            return response()->json(['message' => 'Conquista não foi encontrada'], 404);
        }

        $race->delete();

        return response(['message' => 'Id excluído com sucesso'], 204);

    }

    public function update($id, Request $request){

        try{

            $race = Race::find($id);

            if(!$race){
                return response()->json(['message' => 'Conquista não foi encontrada'], 404);
            }

            $race->update($request->all());


        } catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], 400);
        }

    }
}
