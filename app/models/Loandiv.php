<?php 

use Illuminate\Database\Eloquent\Model;

class Loandiv extends \Eloquent {

    protected $table = 'tb_divloan';

    public function div()
    {
        return $this->belongsTo('Div', 'divisi_id');
    }

}