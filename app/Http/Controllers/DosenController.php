<?php

namespace App\Http\Controllers;

use App\Dosen;
use Illuminate\Http\Request;
use App\Http\Resources\DosenResource;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    public function index()
    {
        $response['success'] = true;
        $response['message'] = "data dosen";
        //$response['data'] = Dosen::all();
        $response['data'] = DosenResource::collection(Dosen::all());

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $dosen = Dosen::find($id);
        if ($dosen) {
            $response['success'] = true;
            $response['message'] = "detail dosen";
            $response['data'] = Dosen::find($id);
        } else {
            $response['success'] = false;
            $response['message'] = "dosen not found";
            $response['data'] = null;
        }
        return response()->json($response, 201);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id_dosen' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
        ]);

        if ($validation->fails()) {
            $response['success'] = false;
            $response['message'] = "error";
            $response['data'] = $validation->messages();
        } else {
            $dosen = Dosen::create($request->all());
            $response['success'] = true;
            $response['message'] = "dosen created";
            $response['data'] = $dosen;
        }
        return response()->json($response, 201);
    }

    public function update($id, Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id_dosen' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
        ]);

        if ($validation->fails()) {
            $response['success'] = false;
            $response['message'] = "error";
            $response['data'] = $validation->messages();
        } else {
            $dosen = Dosen::find($id);
            if ($dosen) {
                $dosen->update($request->all());
                $response['success'] = true;
                $response['message'] = "dosen update";
                $response['data'] = Dosen::find($id);
            } else {
                $response['success'] = false;
                $response['message'] = "dosen not found";
                $response['data'] = null;
            }
        }
        return response()->json($response, 201);
    }

    public function destroy($id)
    {
        $dosen = Dosen::find($id);
        if ($dosen) {
            $dosen->delete();
            $response['success'] = true;
            $response['message'] = "dosen deleted";
            $response['data'] = null;
            $responseCode = 200;
        } else {
            $response['success'] = false;
            $response['message'] = "dosen not found";
            $response['data'] = null;
            $responseCode = 404;
        }

        return response()->json($response, $responseCode);
    }
}
