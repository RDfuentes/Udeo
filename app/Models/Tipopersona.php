<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipopersona extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tipopersonas';

    protected $fillable = ['name','descripcion','status'];
	
}
