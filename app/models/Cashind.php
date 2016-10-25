<?php 

use Illuminate\Database\Eloquent\Model;

class Cashind extends \Eloquent {

    protected $table = 'cash_in_detail';

    public function proyek()
    {
        return $this->belongsTo('Proyek');
    }
}