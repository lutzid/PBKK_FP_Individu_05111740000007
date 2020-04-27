<?php

namespace MyModel;

use Phalcon\Mvc\Model;
use MyModel\My_Model;

class Pelanggan extends My_Model
{
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

        $this->hasMany(
            'id',
            'MyModel\Pemesanan',
            'pelanggan_id',
            [
                'alias' => 'pemesanan'
            ]
        );
    }

    public function registrasi($data)
    {
        $this->id = $data['id'];
        $this->nama = $data['nama'];
        $this->ktp = $data['ktp'];
        $this->jenis_kelamin = $data['jenis_kelamin'];
        $this->alamat = $data['alamat'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->reset_pass = $data['reset_pass'];
        $this->gambar = $data['gambar'];
    }
}