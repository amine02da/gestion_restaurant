<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servant extends Model
{
    use HasFactory;

    protected $fillable = ["name", "address", "phone"];

    public static function rules()
    {
        return [
            "name" => "required",
            "address" => "required",
            "phone" => "required|min:10|max:10"
        ];
    }
}
