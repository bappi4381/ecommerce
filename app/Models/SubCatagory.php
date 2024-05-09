<?php

namespace App\Models;
use App\Models\Catagory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCatagory extends Model
{
    use HasFactory;
    protected $fillable = [
        'catagory_id',
        'subcatagory_name',
    ];
    public function category() {
        return $this->belongsTo(Catagory::class, 'catagory_id', 'id');
    }
    public function products() {
        return $this->hasMany(Product::class, 'sub_catagory_id', 'id');
    }
}
