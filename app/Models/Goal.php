<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Goal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'is_approved',
        'url',
        'avg_rating',
        'cap_id',
    ];


    // belongsTo
    public function cap()
    {
        return $this->belongsTo(Cap::class);
    }


    public function getStatusAttribute()
    {
        # code...

        return [
            // return div

            '1' => ['gradient-1','Approved'],
            '0' => ['gradient-2','Pending'],
        ][$this->is_approved];

    }

    public function updates()
    {
        return $this->morphMany(Update::class, 'updatable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }



}
