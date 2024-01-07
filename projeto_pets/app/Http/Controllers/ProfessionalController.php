<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Professional;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    public function index(){
        $professionals = Professional::all();
        return $professionals;

    }

    public function store(Request $request){
        try{
            $request->validate([
                'name' => 'required|string|min:3',
                'cpf' => 'string|min:11',
                'contact' => 'string|min:11',
                'speciality' => 'required|string|max:50',
                'register' => 'string|max:20'
            ]);

            $dataPeople = $request->only('name', 'cpf', 'contact');
            $dataProfessional = $request->only('speciality', 'register');

            $people = People::create($dataPeople);

            Professional::create([
                'people_id' => $people->id,
                ...$dataProfessional
            ]);

            return $people;
        } catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function update($id, Request $request){

        try{

            $professional = Professional::find($id);

            if(!$professional){
                return response()->json(['message' => 'Conquista não foi encontrada'], 404);
            }

            $professional->update($request->all());


        } catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], 400);
        }

    }

    public function destroy($id){
        $professional = Professional::find($id);

        if(!$professional){
            return response()->json(['message' => 'Conquista não foi encontrada'], 404);
        }

        $professional->delete();

        return response(['message' => 'Id excluído com sucesso'], 204);

    }

    public function show($id){
        $professional = Professional::find($id);

        if(!$professional){
            return response()->json(['message' => 'Categoria não foi encontrada'], 404);
        }

        return $professional;
    }
}
