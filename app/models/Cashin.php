<?php 

use Illuminate\Database\Eloquent\Model;

class Cashin extends \Eloquent {

    protected $table = 'cash_in';

    public function proyek()
    {
        return $this->belongsTo('Proyek');
    }
}