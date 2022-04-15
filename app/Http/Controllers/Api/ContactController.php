<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Repositories\ContactRepository as ContactRepo;

class ContactController extends Controller
{
    protected $contactRepo;

    public function __construct(ContactRepo $contactRepo)
    {
        $this->contactRepo      = $contactRepo;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'content' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $data = $request->only('name', 'email', 'phone', 'content');
        $result = $this->contactRepo->create($data);
        return response()->json([
            "success" => 200,
            "message" => "Success",
            "data" =>  true,
        ]);


    }
}
