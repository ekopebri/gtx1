<?php 

use Illuminate\Database\Eloquent\Model;

class Cashoutd extends \Eloquent {

    protected $table = 'cash_out_detail';

    public function proyek()
    {
        return $this->belongsTo('Proyek');
    }
}