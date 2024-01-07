<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index(){
        $people = People::all();
        return $people;

    }

    public function store(Request $request){

        try {
        $request->validate([
            'name' => 'required|string|unique:people|min:3',
            'cpf' => 'string|unique:people|min:11',
            'contact' => 'string|unique:people|min:11',
        ]);

        $data = $request->all();

        $person = People::create($data);

        return response()->json(["Pessoa adicionada com sucesso", $person], 200);

    } catch (\Exception $exception){
        return response()->json(['message' => $exception->getMessage()], 500);
    }

    }

    public function update($id, Request $request){

        try{

            $person = People::find($id);

            if(!$person){
                return response()->json(['message' => 'Pessoa não encontrada'], 400);
            }

            $person->update($request->all());

            response()->json(["Pessoa atualizada com sucesso", $person], 200);

        } catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], 500);
        }

    }

    public function show($id){
        $person = People::find($id);

        if(!$person){
            return response()->json(['message' => 'Pessoa não encontrada'], 404);
        }

        return $person;
    }

    public function destroy($id){
        $person = People::find($id);

        if(!$person){
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $person->delete();

        return response('Id excluído com sucesso', 204);

    }
}
