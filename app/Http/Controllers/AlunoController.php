<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller
{
    public function index($id)
    {
        return response()->json(Aluno::find($id));
    }

    public function unicInt($id)
    {

        $aluno  =  \App\Models\Aluno::where('curso_id', '=',$id)->get();
        return response()->json($aluno);
    }

    public function create(Request $request)
        {


            $this->validate($request, [
                'name' => 'required',
                'cpf'  => 'required',
                'nascimento'  => 'required',
                'email'  => 'required',
                'celular'  => 'required',
                'endereco' => 'required',
                'numero'  => 'required',
                'bairro' => 'required',
                'cidade' => 'required',
                'uf' => 'required',
                'status' => 'required',
                'curso_id' => 'required',
                'instituicao_id' => 'required'
            ]);

         $data=[
            'name' =>$request->name,
            'cpf'  => $request->cpf,
            'nascimento'  => $request->nascimento,
            'email'  => $request->email,
            'celular'  => $request->celular,
            'endereco' => $request->endereco,
            'numero'  => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'uf' => $request->uf,
            'status' => $request->status,
            'curso_id' => $request->curso_id,
            'instituicao_id' => $request->instituicao_id

        ];

            if (\App\Models\Aluno::create($data))
                return response()->json([
                    'success' => true,
                    'curso' => $data
                ]);
            else
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, instituicao could not be added'
                ], 500);
        }

        public function update(Request $request)
        {


            $this->validate($request, [
                'id' => 'required',
             ]);
             $id = $request->id;


         $data=[
            'name' =>$request->name,
            'cpf'  => $request->cpf,
            'nascimento'  => $request->nascimento,
            'email'  => $request->email,
            'celular'  => $request->celular,
            'endereco' => $request->endereco,
            'numero'  => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'uf' => $request->uf,
            'status' => $request->status,
            'curso_id' => $request->curso_id,
            'instituicao_id' => $request->instituicao_id

        ];
             $inst  =  \App\Models\Aluno::find($id);
            if ($inst->update($data))
                return response()->json([
                    'success' => true,

                ]);
            else
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, instituicao could not be added'
                ], 500);
        }

        public function delete(Request $request)
        {


            $this->validate($request, [
                'id' => 'required',
             ]);
             $id = $request->id;

             $inst  =  \App\Models\Aluno::find($id);
            if ($inst->delete())
                return response()->json([
                    'success' => true,

                ]);
            else
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, instituicao could not be added'
                ], 500);
        }
}

