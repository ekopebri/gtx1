<?php 

use Illuminate\Database\Eloquent\Model;

class Div extends \Eloquent {

    protected $table = 'tb_divisi';

    protected $fillable = array('spk, nm_divisi, wilayah');

    public function loandiv()
    {
        return $this->hasMany('Loandiv');
    }

    public function upload()
    {
        return $this->hasMany('Upload');
    }
    
    /*
    public function cashin()
    {
        return $this->hasMany('Cashin');
    } */

}