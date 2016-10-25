<?php 

use Illuminate\Database\Eloquent\Model;

class Cashout extends \Eloquent {

    protected $table = 'cash_out';

    public function proyek()
    {
        return $this->belongsTo('Proyek');
    }
}