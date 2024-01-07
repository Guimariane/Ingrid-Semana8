<?php

namespace App\Http\Controllers;

use App\Models\Specie;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    public function index(){
        $species = Specie::all();
        return $species;

    }

    public function store(Request $request){

        try {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
        ]);

        $data = $request->all();

        $specie = Specie::create($data);

        return $specie;

    } catch (\Exception $exception){
        return response()->json(['message' => $exception->getMessage()], 400);
    }

    }

    public function show($id){
        $specie = Specie::find($id);

        if(!$specie){
            return response()->json(['message' => 'Espécie não foi encontrada'], 404);
        }

        return $specie;
    }

    public function destroy($id){
        $specie = Specie::find($id);

        if(!$specie){
            return response()->json(['message' => 'Espécie não foi encontrada'], 404);
        }

        $specie->delete();

        return response(['message' => 'Id excluído com sucesso'], 204);

    }

    public function update($id, Request $request){

        try{

            $specie = Specie::find($id);

            if(!$specie){
                return response()->json(['message' => 'Conquista não foi encontrada'], 404);
            }

            $specie->update($request->all());


        } catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], 400);
        }

    }
}
