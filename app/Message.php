<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use Uuids;

    public $timestamps = false;
    public $incrementing = false;
    protected $with = ['creator'];
    protected $hidden = ['thread'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'time', 'creator', 'thread'
    ];

    public function creator() {
        return $this->belongsTo(User::class, 'creator');
    }




}
