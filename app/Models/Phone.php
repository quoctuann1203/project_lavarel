<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = ['name','provide','price','image','inventory_quantity','description'];

    public function provider() {
        return $this->belongsTo(Provider::class);
    }

    public function order() {
        return $this->belongsToMany(Order::class);
    }
}
