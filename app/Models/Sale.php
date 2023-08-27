<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

     protected $fillable = [
        "servents_id",
        "quantity",
        "total_price",
        "total_received",
        "remaining_amount",
        "payment_type",
        "payment_status",
    ];

    public function tables()
    {
        return $this->belongsToMany(Table::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function servant()
    {
        return $this->belongsTo(Servant::class, "servents_id");
    }
}