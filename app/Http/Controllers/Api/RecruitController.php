<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\RecruitRepository as RecruitRepo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Repositories\CandidateRepository as CandidateRepo;

class RecruitController extends Controller
{
    protected $recruitRepo;
    protected $candidateRepo;

    public function __construct(RecruitRepo $recruitRepo, CandidateRepo $candidateRepo)
    {
        $this->recruitRepo      = $recruitRepo;
        $this->candidateRepo    = $candidateRepo;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'file' => 'required|mimes:doc,docx,pdf|max:2048',
        ]);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        if($file = $request->file('file')){
            $orignal_filename = Str::slug($request['name']).'-'.date('d-m-Y').'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->putFileAs(
                'files/',
                $file,
                $orignal_filename
            );
            $data = $request->only( 'phone','email', 'introduce', 'recruit_id');
            $data['fullname'] = $request['name'];
            $data['url_cv'] = '/storage/files/'.$orignal_filename;
            $result = $this->candidateRepo->create($data);
            return response()->json([
                "success" => 200,
                "message" => "Success",
                "data" =>  true,
            ]);
        }else{
            return response()->json([
                "success" => 404,
                "message" => "Success",
                "data" =>  false,
            ]);
        }

    }
}
