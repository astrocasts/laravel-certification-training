<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $name string
 */
class Subreddit extends Model
{
    protected $fillable = ['name', 'secret_message'];

    private $message;

    public function setNameAttribute($name)
    {
        print " < setting name to $name >";
        $this->attributes['name'] = strtolower($name);
    }

    public function setSecretMessageAttribute($message)
    {
        $this->message = encrypt($message);
    }

    public function getSecretMessageAttribute()
    {
        return $this->message ? decrypt($this->message) : null;
    }
}
