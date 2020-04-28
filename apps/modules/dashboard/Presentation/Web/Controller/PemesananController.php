<?php

namespace MyModule\Dashboard\Presentation\Web\Controller;

use Phalcon\Mvc\Controller;
use MyModule\Dashboard\Presentation\Web\Controller\BaseController;
use Phalcon\Http\Request;
use MyModel\Pemesanan;

class PemesananController extends BaseController
{
    public function indexAction()
    {

    }

    public function acceptAction($pemesananId)
    {
        $pemesanan = Pemesanan::findFirst(
            [
                "conditions" => "id = :pemesananId:",
                "bind" => [
                    "pemesananId" => $pemesananId
                ],
            ]
        );
        $pemesanan->status = 'Proses';
        if($pemesanan->save())
        {
            return $this->response->redirect('home');
        }
    }

    public function rejectAction($pemesananId)
    {
        $pemesanan = Pemesanan::findFirst(
            [
                "conditions" => "id = :pemesananId:",
                "bind" => [
                    "pemesananId" => $pemesananId
                ],
            ]
        );
        $pemesanan->status = 'Ditolak';
        if($pemesanan->save())
        {
            return $this->response->redirect('home');
        }
    }

    public function registrasiAction($pemijatId)
    {
        $random = new \Phalcon\Security\Random();
        $pemesanan = new Pemesanan();

        $pemesanan->id = $random->base64(18);
        $pemesanan->pemijat_id = $pemijatId;
        $pemesanan->pelanggan_id = $this->getSessionId();
        $pemesanan->status = 'Pending';
        $pemesanan->save();

        return $this->response->redirect('home');
    }

    public function cancelAction($pemesananId)
    {
        $pemesanan = Pemesanan::findFirst(
            [
                "conditions" => "id = :pemesananId:",
                "bind" => [
                    "pemesananId" => $pemesananId
                ],
            ]
        );
        $pemesanan->delete();

        return $this->response->redirect('home');
    }

    public function selesaiAction($pemesananId)
    {
        $pemesanan = Pemesanan::findFirst(
            [
                "conditions" => "id = :pemesananId:",
                "bind" => [
                    "pemesananId" => $pemesananId
                ],
            ]
        );
        $pemesanan->status = 'Selesai';
        if($pemesanan->save())
        {
            return $this->response->redirect('home');
        }
    }
}