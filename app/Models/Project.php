<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $fillable=[
       'name',
       'description',
       'status',
       'start_date',
       'end_date',
       'budget',
       'partner_id',
    ];

    public const STATUS_RADIO=[
                  '1'=>'start',
                  '2'=>'In Progress',
                  '3'=>'fineshed',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function partner()
    {
        return $this->belongsTo(Partner::class , "partner_id");
    }
   
}
