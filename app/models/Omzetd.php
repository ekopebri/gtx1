<?php 

use Illuminate\Database\Eloquent\Model;

class Omzetd extends \Eloquent {

    protected $table = 'omzet_detail';

    public function proyek()
    {
        return $this->belongsTo('Proyek');
    }
}