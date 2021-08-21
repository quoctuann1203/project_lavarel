<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function phones() {
        return $this->hasMany(Phone::class);
    }

    public function listSelectData()
    {
        $items = $this->get();
        return array_column(json_decode(json_encode($items), true), 'name', 'id');
    }
}
