<?php

namespace MyModel;

use Phalcon\Mvc\Model;
use MyModel\My_Model;

class Pelanggan extends Model {
    public $id;
    public $nama;
    public $ktp;
    public $jenis_kelamin;
    public $alamat;
    public $email;
    public $password;
    public $reset_pass;
    public $gambar;

    public function initialize () {
        $this->setSource('pelanggan');
    }
}