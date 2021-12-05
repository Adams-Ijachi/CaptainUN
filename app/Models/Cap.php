<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cap extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillables = [
        'name',
        'description',
        'is_approved',
        'user_id',
        'type',
        'avg_rating',
    ];



    public function getStatusAttribute()
    {
        # code...

        return [
            // return div

            '1' => ['gradient-1','Approved'],
            '0' => ['gradient-2','Pending'],
        ][$this->is_approved];

    }




    public function getDateForHumansAttribute()
    {
        # code...
        return $this->created_at->diffForHumans();
    }


    public function scopeSearch($query, $search)
    {
        # code...
        return $query->where('name', 'like', '%'.$search.'%')->orWhere('description', 'like', '%'.$search.'%')->orWhere('type', 'like', '%'.$search.'%');
    }
    


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function goals()
    {
        return $this->hasMany(Goal::class);
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