<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
    use HasFactory;
    public function cat(){
        return $this->belongsTo(Category::class,'cat_id');
    }
}
