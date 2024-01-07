<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function index(){
        $vaccines = Vaccine::all();
        return $vaccines;

    }

    public function store(Request $request){

        try {
        $request->validate([
            'name' => 'required|string|max:150',
            'dose' => 'decimal|required',
            'profissional_id' => 'required',
            'pet_id' => 'required',
        ]);

        $data = $request->all();

        $vaccine = Vaccine::create($data);

        return $vaccine;

    } catch (\Exception $exception){
        return response()->json(['message' => $exception->getMessage()], 400);
    }

    }

    public function show($id){
        $vaccine = Vaccine::find($id);

        if(!$vaccine){
            return response()->json(['message' => 'Pet não encontrado'], 404);
        }

        return $vaccine;
    }

    public function destroy($id){
        $vaccine = Vaccine::find($id);

        if(!$vaccine){
            return response()->json(['message' => 'Pet não encontrado'], 404);
        }

        $vaccine->delete();

        return response(['message' => 'Id excluído com sucesso'], 204);

    }

    public function update($id, Request $request){

        try{

            $vaccine = Vaccine::find($id);

            if(!$vaccine){
                return response()->json(['message' => 'Pet não encontrado'], 404);
            }

            $vaccine->update($request->all());


        } catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], 400);
        }

    }
}
