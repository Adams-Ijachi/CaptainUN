<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'comment',
        'user_id',
        'is_approved'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function commentable()
    {
        return $this->morphTo();
    }

    public function getDateForHumansAttribute()
    {
        # code...
        return $this->created_at->diffForHumans();
    }


    public function getAssociatedModelAttribute()
    {
        # code...
        // model name
        return class_basename($this->commentable_type);
       
        


    }




}
