<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Traits\API_response;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    use API_response;
    public function index()
    {
        $data = Clients::all();
        return $this->sendResponse("List of all  Our  Clients", [$data]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => "required",
            'first_name' => "required",
            'last_name' => "required",
            'dateOfBirth' => "required",
            'allergies' => "required",
            'email' => "required",
            'mobile_number' => "required",
            'password' => "required"

        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->sendError("Failure", $errors);
        }

        $obj = new Clients();
        $obj->username = $request->username;
        $obj->first_name = $request->first_name;
        $obj->last_name = $request->last_name;
        $obj->dateOfBirth = $request->dateOfBirth;
        $obj->allergies = $request->allergies;
        $obj->email = $request->email;
        $obj->mobile_number = $request->mobile_number;
        $obj->password = Hash::make($request->password);
        $obj->save();
        return $this->sendResponse("Client created Successfully", $obj, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $obj = Clients::find($id);
        if (!$obj) {
            return $this->sendError("Id does not exist", [], Response::HTTP_BAD_REQUEST);
        }
        return $this->sendResponse(" The below is the Client information", $obj, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => "required",
            'first_name' => "required",
            'last_name' => "required",
            'dateOfBirth' => "required",
            'allergies' => "required",
            'email' => "required",
            'mobile_number' => "required",
            'password' => "required"
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->sendError("Failure", $errors);
        }

        $obj = Clients::find($id);
        if (!$obj) {
            return $this->sendError("Id does not exist", [], Response::HTTP_BAD_REQUEST);
        }

        $obj->username = $request->username;
        $obj->first_name = $request->first_name;
        $obj->last_name = $request->last_name;
        $obj->dateOfBirth = $request->dateOfBirth;
        $obj->allergies = $request->allergies;
        $obj->email = $request->email;
        $obj->mobile_number = $request->mobile_number;
        $obj->password = $request->password;
        $obj->save();
        return $this->sendResponse("Clients updated Successfully", $obj);
    }


    public function destroy($id)
    {
        $obj = Clients::find($id);
        if (!$obj) {
            return $this->sendError("Id does not exist", [], Response::HTTP_BAD_REQUEST);
        }
        $obj->delete();
        return $this->sendResponse("Clients deleted Successfully", []);
    }
}
