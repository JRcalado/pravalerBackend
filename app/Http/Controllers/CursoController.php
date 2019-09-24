<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{
    public function index($id)
    {

        return response()->json(Curso::find($id));
    }


    public function unicInt($id)
    {

        $curso  =  \App\Models\Curso::where('instituicao_id', '=',$id)->get();
        return response()->json($curso);
    }
    public function create(Request $request)
        {


            $this->validate($request, [
                'name' => 'required',
              'duracao' => 'required',
              'status' => 'required',
              'instituicao_id' => 'required',
            ]);

         $data=[
            'name' =>$request->name,
            'duracao' => $request->cnpj,
            'status' => $request->status,
            'instituicao_id'=>$request->instituicao_id

        ];

            if (\App\Models\Curso::create($data))
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
            'duracao' => $request->cnpj,
            'status' => $request->status,
            'instituicao_id'=>$request->instituicao_id
                ];

             $inst  =  \App\Models\Curso::find($id);
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

             $inst  =  \App\Models\Curso::find($id);
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

