<?php 

use Illuminate\Database\Eloquent\Model;

class Loan extends \Eloquent {

    protected $table = 'loans';

    public function proyek()
    {
        return $this->belongsTo('Proyek');
    }

}