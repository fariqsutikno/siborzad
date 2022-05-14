<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\EditingRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EditingRequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $reqs = EditingRequests::get();
        $waitingReqs = EditingRequests::where('requestStatus', '=', 'waiting')->get();
        $acceptedReqs = EditingRequests::where('requestStatus', '=', 'accept')->get();
        $ignoredReqs = EditingRequests::where('requestStatus', '=', 'ignored')->get();
        return view('reqs.index', compact('reqs', 'waitingReqs', 'acceptedReqs', 'ignoredReqs'));
    }

    public function accept(Request $request){
        $req = EditingRequests::where('id', '=', $request->id)->first();
        
        DataSiswa::where('nism', '=', $req->nism)->update([
            'fullName'   => $req->fullName,
            'arabicName' => $req->arabicName,
            'birthPlace' => $req->birthPlace,
            'birthDate'  => date("Y-m-d", strtotime($req->birthDate)),
            'class10'    => $req->class10,
            'class11'    => $req->class11,
            'class12'    => $req->class12,
            'room10'     => $req->room10,
            'room11'     => $req->room11,
            'room12'     => $req->room12,
            'SDName'     => $req->SDName,
            'SDYear'     => $req->SDYear,
            'SMPName'     => $req->SMPName,
            'SMPYear'     => $req->SMPYear,
            'nik'        => $req->nik,
            'address'    => $req->address,
            'province'   => $req->province,
            'city'       => $req->city,
            'district'   => $req->district,
            'village'    => $req->village,
            'zipCode'    => $req->zipCode,
            'fatherName' => $req->fatherName,
            'fatherPhone'=> $req->fatherPhone,
            'fatherStatus'=>$req->fatherStatus,
            'fatherJob'   =>$req->fatherJob,
            'motherName' => $req->motherName,
            'motherPhone'=> $req->motherPhone,
            'motherStatus'=>$req->motherStatus,
            'motherJob'  => $req->motherJob,
            'maritalStatus'=>$req->maritalStatus,
            'khidmahPlace'=>$req->khidmahPlace,
            'furtherStudy'=>$req->furtherStudy,
            'myPhone'      => $req->myPhone,
            'myEmail'      => $req->myEmail,
            'status'=> 'verified'
        ]);
        $req->update(['requestStatus' => 'accept']);
        return redirect(route('reqs.index'));
    }

    public function ignore(Request $request){
        EditingRequests::where('id', '=', $request->id)->update(['requestStatus' => 'ignored']);
        return redirect(route('reqs.index'));
    }
}
