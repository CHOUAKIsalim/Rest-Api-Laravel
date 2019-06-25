<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use Uuids;

    public $timestamps = false;
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'time', 'creator'
    ];

    protected $with = ['creator', 'messages'];



    public function creator() {
        return $this->belongsTo(User::class, 'creator');
    }

    public function messages()
    {
        return $this->hasMany(  Message::class, 'thread');
    }

}
