<?php 

use Illuminate\Database\Eloquent\Model;

class Proyek extends \Eloquent {

    protected $table = 'proyeks';

    protected $fillable = array('spk, nm_proyek, jenis_proyek, type_proyek');

    public function termin()
    {
        return $this->hasMany('Termin');
    }

    public function loan()
    {
        return $this->hasMany('Loan');
    }

    public function cashin()
    {
        return $this->hasMany('Cashin');
    }

    public function cashind()
    {
        return $this->hasMany('Cashind');
    }

    public function cashout()
    {
        return $this->hasMany('Cashout');
    }

    public function cashoutd()
    {
        return $this->hasMany('Cashoutd');
    }

    public function omzet()
    {
        return $this->hasMany('Omzet');
    }

    public function omzetd()
    {
        return $this->hasMany('Omzetd');
    }

    public function upload()
    {
        return $this->hasMany('Upload');
    }

}