<?php 

use Illuminate\Database\Eloquent\Model;

class Cashoutddiv extends \Eloquent {

    protected $table = 'tb_divcashout_detail';

    public function div()
    {
        return $this->belongsTo('Div', 'divisi_id');
    }
}