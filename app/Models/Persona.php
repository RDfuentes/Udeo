<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'personas';

    protected $fillable = ['name','telefono','tipopersona_id','status'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipopersona()
    {
        return $this->hasOne('App\Models\Tipopersona', 'id', 'tipopersona_id');
    }
    
}
