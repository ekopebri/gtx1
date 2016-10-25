<?php 

use Illuminate\Database\Eloquent\Model;

class Omzet extends \Eloquent {

    protected $table = 'omzets';

    public function proyek()
    {
        return $this->belongsTo('Proyek');
    }
}