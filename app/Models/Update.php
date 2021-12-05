<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Update extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image',
    ];


   

    public function updatable()
    {
        return $this->morphTo();
    }

    public function getDateForHumansAttribute()
    {
        # code...
        return $this->created_at->diffForHumans();
    }
}
