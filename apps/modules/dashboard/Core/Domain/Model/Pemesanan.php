<?php

namespace MyModel;

use Phalcon\Mvc\Model;
use MyModel\My_Model;

class Pemesanan extends My_Model
{
    public $id;
    public $pemijat_id;
    public $pelanggan_id;
    public $status;

    public function initialize () {
        $this->setSource('pemesanan');

        $this->belongsTo(
            'pemijat_id',
            'MyModel\Pemijat',
            'id',
            [
                'alias' => 'pemijat',
            ]
        );

        $this->belongsTo(
            'pelanggan_id',
            'MyModel\Pelanggan',
            'id',
            [
                'alias' => 'pelanggan'
            ]
        );
    }
}