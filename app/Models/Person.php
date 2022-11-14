<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Str;

class Person extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['names', 'last_names', 'code', 'email', 'phone'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function cycle()
    {
        return $this->belongsTo(Cycle::class)->withDefault();
    }

    public function gol()
    {
        return $this->belongsTo(Gol::class)->withDefault();
    }

    public function getFirstNameAndLastName()
    {
        $first_name = Str::of($this->names)->explode(' ')[0];
        $last_name  = Str::of($this->last_names)->explode(' ')[0];

        return $first_name . '+' . $last_name;
    }
}
