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
            $this->flashSession->success("Pemesanan berhasil diterima.");
        } else {
            $this->flashSession->error("Pemesanan gagal diterima.");
        }
        return $this->response->redirect('home');
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
            $this->flashSession->success("Pemesanan berhasil ditolak.");
        } else {
            $this->flashSession->error("Pemesanan gagal ditolak.");
        }
        return $this->response->redirect('home');
    }

    public function registrasiAction($pemijatId)
    {
        $random = new \Phalcon\Security\Random();
        $pemesanan = new Pemesanan();

        $pemesanan->id = $random->base64Safe();
        $pemesanan->pemijat_id = $pemijatId;
        $pemesanan->pelanggan_id = $this->getSessionId();
        $pemesanan->status = 'Pending';
        if ($pemesanan->save())
        {
            $this->flashSession->success("Pemesanan berhasil dilakukan.");
        } else {
            $this->flashSession->error("Pemesanan gagal dilakukan.");
        }
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
        if($pemesanan->delete())
        {
            $this->flashSession->success("Pemesanan berhasil dibatalkan.");
        } else {
            $this->flashSession->error("Pemesanan gagal dibatalkan.");
        }

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
            $this->flashSession->success("Pemesanan berhasil diselesaikan.");
        } else {
            $this->flashSession->error("Pemesanan gagal diselesaikan.");
        }
        return $this->response->redirect('home');
    }
}