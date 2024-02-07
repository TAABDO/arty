<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable=[
       'name',
       'descrption',
       'status',
       'start_date',
       'end_date',
       'image',
       'budget',
       'partner_id',
    ];
}
