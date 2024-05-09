<?php

namespace App\Models;
use App\Models\Catagory;
use App\Models\SubCatagory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_title',
        'price',
        'catagory_id',
        'sub_catagory_id',
        'description',
        'image',
    ];
    public function category() {
        return $this->belongsTo(Catagory::class, 'catagory_id', 'id');
    }
    
    public function sub_category() {
        return $this->belongsTo(SubCatagory::class, 'sub_catagory_id', 'id');
    }
    
}
