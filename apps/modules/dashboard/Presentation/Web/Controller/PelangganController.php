<?php

namespace MyModule\Dashboard\Presentation\Web\Controller;

use Phalcon\Mvc\Controller;
use MyModule\Dashboard\Presentation\Web\Controller\BaseController;
use Phalcon\Http\Request;
use MyModel\Pelanggan;

class PelangganController extends BaseController 
{
    public function indexAction () 
    {
        // $db = $this->getDI()->get('db');

        // $sql = "SELECT nama, alamat, gambar from pemijat";

        // $result = $db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

        // echo json_encode($result);
    }

    public function registerIndexAction()
    {
    }

    public function registerAction()
    {
        if($this->request->isPost())
        {
            $random = new \Phalcon\Security\Random();
            $data = $_POST;
            $data['id'] = $random->base64(18);
            $data['password'] = $this->security->hash($data['password']);
            $data['reset_pass'] = 'null';
            $data['gambar'] = 'storage/avatar3.jpg';
            $new_pelanggan = new Pelanggan();
            $new_pelanggan->registrasi($data);
            // var_dump($new_pelanggan);die;
            $new_pelanggan->save();
           return $this->response->redirect('login/pelanggan')->send();
        }
    }

    public function loginIndexAction()
    {

    }

    public function loginAction()
    {
        $email    = $this->request->getPost('email');
        $pass   = $this->request->getPost('password');
    	$get_pelanggan   = Pelanggan::findFirst(
            [
                "conditions" => "email = :email:",
                "bind" => [
                    "email"   => $email
                ],
            ]
        );
        if($get_pelanggan === false){
            $this->flashSession->error("Email atau Password yang anda inputkan salah.");
            return $this->response->redirect('login');
        }else{
            if(!$this->security->checkHash($pass,$get_pelanggan->password)){
                $this->flashSession->error("Email atau Password yang anda inputkan salah.");
                return $this->response->redirect('login');
            }
            $this->session->set('auth', $get_pelanggan);
            $this->session->set('role', 'Pelanggan');
        }

        return $this->response->redirect('/home');
    }

    public function logoutAction()
    {
        $this->session->destroy();
        return $this->response->redirect('');
    }

    public function editAction()
    {
        if($this->request->isPost())
        {
            $id = $this->getSessionId();
            // var_dump($id);die;
            $user = Pelanggan::findFirst(
                [
                    "conditions" => "id = :id:",
                    "bind" => [
                        "id"   => $id
                    ],
                ]
            );
            $data = $_POST;
            $data['id'] = $id;
            $data['reset_pass'] = 'null';
            $user->registrasi($data);
            // $user->save();
            if($this->request->hasFiles() == true){
                $uploads = $this->request->getUploadedFiles();
                // var_dump($this->request->getUploadedFiles());die();  
                $isuploaded = false;
                $allpath = "";
                foreach($uploads as $up)
                {
                    $path = 'storage/'.time().'-'.strtolower($up->getname());
                    $fpath = BASE_PATH . "/public/" . $path;
                    if($up->moveTo($fpath)){
                        $isUploaded = true;
                        $allpath.=$path;
                    }else{
                        $isUploaded = false;
                    }

                }
                $user->gambar = $allpath;
            }
            // var_dump($user);die;
            if($user->save())
            {
                return $this->response->redirect('profile');
            }
        }
    }
}