<?php

namespace MyModel;

use Phalcon\Mvc\Model;
use MyModel\My_Model;

class Pemesanan extends Model {
    public $id;
    public $pemijat_id;
    public $pelanggan_id;
    public $status;

    public function initialize () {
        $this->setSource('pemesanan');
    }
}