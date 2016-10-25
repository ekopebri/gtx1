<?php 

use Illuminate\Database\Eloquent\Model;

class Upload extends \Eloquent {

    protected $table = 'file';

    public function proyek()
    {
        return $this->belongsTo('Proyek');
    }

    public function div()
    {
        return $this->belongsTo('Div', 'divisi_id');
    }
}