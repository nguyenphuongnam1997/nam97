<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguyenPhuongNam27 extends Model
{
    protected $table = 'nguyen_phuong_nam27s';

    // protected $fillable = ['username','email','phonenumber','address'];
    public function role(){
        return $this->belongsTo('\App\Models\Role','role_id','id');
    }
}
