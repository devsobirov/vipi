<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $fillable = [
        'email'
    ];

    public static function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }
}