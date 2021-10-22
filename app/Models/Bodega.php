<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "bodegas";
    protected $primaryKey = "id_b";
}
