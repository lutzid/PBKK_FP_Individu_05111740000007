<?php

namespace MyModel;

use Phalcon\Mvc\Model;
use MyModel\My_Model;

class Pemijat extends My_Model
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
    public $status;
    public $tarif;

    public function initialize () {
        $this->setSource('pemijat');

        $this->hasMany(
            'id',
            'MyModel\Pemesanan',
            'pemijat_id',
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
        $this->status = $data['status'];
        $this->tarif = $data['tarif'];
    }

    public function getTarif(){
        return $this->tarif;
    }
}