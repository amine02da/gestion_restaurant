<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        "category_id",
        "title",
        "slug",
        "description",
        "price",
        "image",
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class);
    }

    public static function rules($id)
    {
        return [
            "title" => "required|unique:menus,title,".$id,
            "description" => "max:255",
            "price" => "required",
            "image" => "required|image|mimes:png,jpg,jpge|max:2048",
            "category_id" => "required|exists:categories,id",
        ];
    }
}
