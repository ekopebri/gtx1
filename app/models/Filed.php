<?php 

use Illuminate\Database\Eloquent\Model;

class Filed extends \Eloquent {

    protected $table = 'file';

    public function proyek()
    {
        return $this->belongsTo('Proyek');
    }

}