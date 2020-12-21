<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowBook extends Model
{

    use HasFactory;
    protected $table = 'borrow_books';
    public function book(){
        return $this->belongsTo('\App\Models\Book','book_id','id');
    }
    public function getAccount(){
        return $this->belongsTo('\App\Models\NguyenPhuongNam27','account_id','id');
    }
}
