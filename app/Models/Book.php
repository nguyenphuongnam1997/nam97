<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    // protected $fillable = ['bookcode','bookname','author','publishingyear','publishingcompany','category_ID','description','amount','unitprice'];
    public function category(){
        return $this->belongsTo('\App\Models\Category','category_ID','id');
    }
}
