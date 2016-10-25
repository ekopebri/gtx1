<?php 

use Illuminate\Database\Eloquent\Model;

class Cashoutdiv extends \Eloquent {

    protected $table = 'tb_divcashout';

    public function div()
    {
        return $this->belongsTo('Div', 'divisi_id');
    }
}