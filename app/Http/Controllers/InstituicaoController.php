<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instituicao;
use Illuminate\Support\Facades\Validator;

class InstituicaoController extends Controller
{
    public function index()
    {
        return response()->json(Instituicao::all());
    }

    public function unicInt($id)
    {
     //   $id   = Input::get('id');
        $inst  =  \App\Models\Instituicao::find($id);
        return response()->json($inst);
    }

    public function create(Request $request)
        {


            $this->validate($request, [
                'name' => 'required',
              'cnpj' => 'required',
              'status' => 'required',
            ]);

         $data=[
            'name' =>$request->name,
            'cnpj' => $request->cnpj,
            'status' => $request->status,

        ];

            if (\App\Models\Instituicao::create($data))
                return response()->json([
                    'success' => true,
                    'instituição' => $data
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
                'name' => $request->name,
                'cnpj' => $request->cnpj,
                'status' => $request->status,
                ];

             $inst  =  \App\Models\Instituicao::find($id);
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

             $inst  =  \App\Models\Instituicao::find($id);
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

