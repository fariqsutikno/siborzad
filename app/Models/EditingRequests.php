<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditingRequests extends Model
{
    use HasFactory;

    protected $table = 'editing_requests';
    protected $fillable = [
        'requestStatus',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'requestStatus'
    ];
}
