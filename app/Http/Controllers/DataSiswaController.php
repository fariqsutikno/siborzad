<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dataSiswa = DataSiswa::select('fullName', 'nism', 'birthPlace', 'birthDate', 'class12', 'fatherName', 'myPhone', 'status')->get();
        return view('dataSiswa.index', compact('dataSiswa'));

    }
}
