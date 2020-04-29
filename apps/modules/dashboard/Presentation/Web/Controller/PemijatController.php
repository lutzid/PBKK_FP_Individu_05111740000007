<?php

namespace MyModule\Dashboard\Presentation\Web\Controller;

use Phalcon\Mvc\Controller;
use MyModule\Dashboard\Presentation\Web\Controller\BaseController;
use Phalcon\Http\Request;
use MyModel\Pemijat;

class PemijatController extends BaseController 
{
    public function registerIndexAction()
    {
        // $db = $this->getDI()->get('db');

        // $sql = "SELECT nama, alamat, gambar from pemijat";

        // $result = $db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

        // echo json_encode($result);
        // echo "register pemijat";
        // $this->view->pick('views/authentication/register');
    }

    public function registerAction()
    {
        if($this->request->isPost())
        {
            $random = new \Phalcon\Security\Random();
            $data = $_POST;
            $data['id'] = $random->base64Safe();
            $data['password'] = $this->security->hash($data['password']);
            $data['reset_pass'] = 'null';
            $data['gambar'] = 'storage/avatar3.jpg';
            $data['status'] = 'Tidak Aktif';
            $data['tarif'] = 0;
            $new_pemijat = new Pemijat();
            $new_pemijat->registrasi($data);
            $new_pemijat->save();
           return $this->response->redirect('login/pemijat')->send();
        }
    }

    public function loginIndexAction()
    {

    }

    public function loginAction()
    {
        $email    = $this->request->getPost('email');
        $pass   = $this->request->getPost('password');
    	$get_pemijat   = Pemijat::findFirst(
            [
                "conditions" => "email = :email:",
                "bind" => [
                    "email"   => $email
                ],
            ]
        );
        if($get_pemijat == false){
            $this->flashSession->error("Email atau Password yang anda inputkan salah.");
            return $this->response->redirect('login/pemijat');
        }else{
            if(!$this->security->checkHash($pass,$get_pemijat->password)){
                $this->flashSession->error("Email atau Password yang anda inputkan salah.");
                return $this->response->redirect('login/pemijat');
            }
            // $this->session->set('auth',[
            //     'username' => $user->username
            // ]);
            $this->session->set('auth', $get_pemijat);
            $this->session->set('role', 'Pemijat');
        }

        return $this->response->redirect('/home');
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->flashSession->success("Anda berhasil logout.");
        return $this->response->redirect('login/pemijat');
    }

    public function editAction()
    {
        if($this->request->isPost())
        {
            $id = $this->getSessionId();
            $user = Pemijat::findFirst(
                [
                    "conditions" => "id = :id:",
                    "bind" => [
                        "id"   => $id
                    ],
                ]
            );
            // $user->status = 'Aktif';
            $data = $_POST;
            $data['id'] = $id;
            $data['reset_pass'] = 'null';
            $data['gambar'] = $user->gambar;
            if($user->password !== $data['password']){
                $data['password'] = $this->security->hash($data['password']);
            }
            if($this->request->hasFiles() == true){
                $uploads = $this->request->getUploadedFiles();
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
                $data['gambar'] = $allpath;
            }
            $user->registrasi($data);
            if($user->save())
            {
                $this->flashSession->success("Profile Anda berhasil diperbarui.");
                return $this->response->redirect('profile');
            } else {
                $this->flashSession->error("Profile Anda tidak berhasil diperbarui.");
                return $this->response->redirect('profile');
            }
        }
    }
}