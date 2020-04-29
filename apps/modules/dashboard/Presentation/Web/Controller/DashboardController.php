<?php

namespace MyModule\Dashboard\Presentation\Web\Controller;

use Phalcon\Mvc\Controller;
use MyModule\Dashboard\Presentation\Web\Controller\BaseController;
use MyModel\Pemijat;
use MyModel\Pemesanan;
use MyModel\Pelanggan;

class DashboardController extends BaseController 
{
    public function beforeExecuteRoute($dispatcher)
    {
    	if(!$this->session->has('auth')){
    		return $this->dispatcher->forward(
            [
                'controller' => 'authentication',
                'action'     => 'loginIndex',
            ]);
        }
    }

    public function error404Action()
    {

    }

    public function homeAction()
    {
        if(!$this->session->has('auth')){
            return $this->response->redirect('login');
        }
        
        if ($this->is_pemijat()){
            $id = $this->getSessionId();
            $pemesanans = Pemesanan::find(
                [
                    "conditions" => "pemijat_id = :id: AND status = :status:",
                    "bind" => [
                        "id" => $id,
                        "status" => 'Pending'
                    ]
                ]
            );
            $pemijat = Pemijat::findFirst(
                [
                    "conditions" => "id = :id:",
                    "bind" => [
                        "id" => $id
                    ]
                ]
            );
            $pemijatan = Pemesanan::find(
                [
                    "conditions" => "pemijat_id = :id: AND status = :status:",
                    "bind" => [
                        "id" => $id,
                        "status" => 'Selesai'
                    ]
                ]
            )->count();
            $query = $this->modelsManager->createQuery(
                'SELECT pelanggan_id FROM \MyModel\Pemesanan WHERE [status] = "Selesai" AND pemijat_id = :id: GROUP BY pelanggan_id'
            );
            $orang = $query->execute(
                [
                    'id' => $id
                ]
            )->count();
            $pesanSelesai = Pemesanan::find(
                [
                    "conditions" => "pemijat_id = :id: AND status = :status:",
                    "bind" => [
                        "id" => $id,
                        "status" => 'Selesai'
                    ]
                ]
            );
            $penghasilan = $pesanSelesai->count() * $pemijat->getTarif();
            $this->view->pemesanans = $pemesanans;
            $this->view->penghasilan = $penghasilan;
            $this->view->pemijatan = $pemijatan;
            $this->view->orang = $orang;
        } else {
            $id = $this->getSessionId();
            $pemesanans = Pemesanan::find(
                [
                    "conditions" => "pelanggan_id = :id: AND status != :status: AND status != :status2:",
                    "bind" => [
                        "id" => $id,
                        "status" => 'Selesai',
                        "status2" => 'Ditolak'
                    ]
                ]
            );
            $jenis_kelamin = $this->session->get('auth')->jenis_kelamin;
            $status = $this->session->get('auth')->status;
            $pemijats = Pemijat::find(
                [
                    "conditions" => "jenis_kelamin = :jenis_kelamin: AND status = :status:",
                    "bind" => [
                        "jenis_kelamin" => $jenis_kelamin,
                        "status" => 'Aktif'
                    ],
                ]
            );

            $this->view->pemijats = $pemijats;
            $this->view->pemesanans = $pemesanans;
        }

    }

    public function riwayatAction()
    {
        if(!$this->session->has('auth')){
            return $this->response->redirect('login');
        }

        if ($this->is_pemijat()){
            $id = $this->getSessionId();
            $pemijat = Pemijat::findFirst(
                [
                    "conditions" => "id = :id:",
                    "bind" => [
                        "id" => $id
                    ]
                ]
            );
            $pemesanans = $pemijat->getpemesanan();
            $this->view->pemesanans = $pemesanans;
        } else {
            $id = $this->session->get('auth')->id;
            $pelanggan = Pelanggan::findFirst(
                [
                    "conditions" => "id = :id:",
                    "bind" => [
                        "id" => $id
                    ]
                ]
            );
            // $pemesanans = Pemesanan::find(
            //     [
            //         "conditions" => "pemijat_id = :id:",
            //         "bind" => [
            //             "pemijat_id" => $id
            //         ]
            //     ]
            // );
            $pemesanans = $pelanggan->getpemesanan();
            $this->view->pemesanans = $pemesanans;
        }
    }

    public function profileAction()
    {
        if(!$this->session->has('auth')){
            return $this->response->redirect('login');
        }

        if ($this->is_pemijat()){
            $id = $this->getSessionId();
            $user = Pemijat::findFirst(
                [
                    "conditions" => "id = :id:",
                    "bind" => [
                        "id" => $id
                    ]
                ]
            );
            $this->view->user = $user;
        } else {
            $id = $this->getSessionId();
            $user = Pelanggan::findFirst(
                [
                    "conditions" => "id = :id:",
                    "bind" => [
                        "id" => $id
                    ]
                ]
            );
            $this->view->user = $user;
        }
    }
}