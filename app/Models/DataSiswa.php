<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    use HasFactory;
    
    protected $table = 'data_siswa';
    protected $fillable = [
            'fullName' ,
            'arabicName' ,
            'birthPlace' ,
            'birthDate'  ,
            'class10'    ,
            'class11'    ,
            'class12'    ,
            'room10'     ,
            'room11'     ,
            'room12'     ,
            'SDName'     ,
            'SDYear'     ,
            'SMPName'    ,
            'SMPYear'    ,
            'nik'        ,
            'address'    ,
            'province'   ,
            'city'       ,
            'district'   ,
            'village'    ,
            'zipCode'    ,
            'fatherName' ,
            'fatherPhone',
            'fatherStatus',
            'fatherJob'   ,
            'motherName' ,
            'motherPhone',
            'motherStatus',
            'motherJob'  ,
            'maritalStatus',
            'khidmahPlace',
            'furtherStudy',
            'myPhone'     ,
            'myEmail'     ,
            'status'
    ];

        protected $hidden = [
        'id',
        // 'photoLink',
        // 'fileDriveLink',
        // 'shEmail',
        // 'passwordEmail',
        // 'nisn',
        // 'nik'
    ];
}
