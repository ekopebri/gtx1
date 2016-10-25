<?php 

use Illuminate\Database\Eloquent\Model;

class Termin extends \Eloquent {

    protected $table = 'termins';

    public function proyek()
    {
        return $this->belongsTo('Proyek');
    }

}