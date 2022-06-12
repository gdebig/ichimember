<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $logged_in = $session->get('logged_in');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['logged_in'] = $logged_in;
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Anggota ICHI";
        return view('main/dashboard1', $data);
    }

    public function daftar()
    {
        $session = session();
        $logged_in = $session->get('logged_in');
        $data['logged_in'] = $logged_in;
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Daftar Anggota ICHI";
        return view('main/daftar', $data);
    }

    public function daftarproses(){
        
        $model = new UserModel();
        $session = session();
        $logged_in = $session->get('logged_in');
        if ($logged_in){
            return redirect()->to('/home');
        }

        $button = $this->request->getVar('submit');
        if ($button=="batal"){
            return redirect()->to('/home');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'email' => [
                    'label'  => 'email',
                    'rules'  => 'required|valid_email|is_unique[tbl_user.username]',
                    'errors' => [
                        'required' => 'Field Email harus diisi.',
                        'is_unique' => 'Email yang digunakan sudah ada.',
                        'valid_email' => "Harus menggunakan format email yang benar.",
                    ],
                ],
                'newpass' => [
                    'label'  => 'newpass',
                    'rules'  => 'required|min_length[6]',
                    'errors' => [
                        'required' => "Field Password harus diisi.",
                        'min_length' => "Panjang password minimal 6 karakter.",
                    ]
                ],
                'confirmpass' => [
                    'label'  => 'confirmpass',
                    'rules'  => 'required|min_length[6]|matches[newpass]',
                    'errors' => [
                        'required' => "Field Password harus diisi.",
                        'min_length' => "Panjang password minimal 6 karakter.",
                        'matches' => "Konfirmasi Password tidak sama.",
                    ]
                ],
                'namalengkap' => [
                    'label'  => 'namalengkap',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Lengkap harus diisi.',
                    ]
                ],
            ]);

            if ($formvalid){

                $username = $this->request->getVar('email');
                $newpass = $this->request->getVar('newpass');
                $namalengkap = $this->request->getVar('namalengkap');

                $datauser = array(
                    'username' => $username,
                    'password' => password_hash($newpass, PASSWORD_DEFAULT),
                    'namalengkap' => $namalengkap,
                    'status' => 'aktif',
                    'type' => 'nnny',
                    'kehormatan' => 'tidak',
                    'confirm' => 'tidak',
                    'datecreated' => date('Y-m-d H:i:s'),
                    'datemodified' => date('Y-m-d H:i:s')
                );

                $model->save($datauser);

                $session->setFlashdata('msg', 'Data akun berhasil didaftarkan. Gunakan akun yang sudah didaftar untuk login di <a href="'.base_url().'/home/login">link berikut</a>. Setelah login, dapat mengisi data-data yang dibutuhkan untuk konfirmasi keanggotaan ICHI oleh admin.');
    
                return redirect()->to('/home');
                
            }else{
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Daftar Anggota ICHI";
                $data['validation'] = $this->validator;
                return view('main/daftarvalid', $data);
            }
        }
    }

    public function login()
    {
        $session = session();
        $logged_in = $session->get('logged_in');
        $data['logged_in'] = $logged_in;
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Login Anggota ICHI";
        return view('main/login', $data);
    }

    public function auth()
    {

        helper(['form']);
        $rules = [
            'email'     => 'required|valid_email',
            'password'     => 'required'
        ];
        
        if($this->validate($rules)){
            $session = session();
            $model = new UserModel();
            $username = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $data = $model->where('username', $username)->where('status','aktif')->first();
            if($data){
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);
                $tipe_user = $data['type'];
                if($verify_pass){
                    $issadmin = $tipe_user[0]=='y' ? TRUE : FALSE;
                    $isadmin = $tipe_user[1]=='y' ? TRUE : FALSE;
                    $isanggota = $tipe_user[2]=='y' ? TRUE : FALSE;
                    $iscalon = $tipe_user[3]=='y' ? TRUE : FALSE;
                    $ses_data = [
                        'user_id'           => $data['user_id'],
                        'username'          => $data['username'],
                        'status'            => $data['status'],
                        'tipe_user'         => $data['type'],
                        'confirm'           => $data['confirm'],
                        'issadmin'          => $issadmin,
                        'isadmin'           => $isadmin,
                        'isanggota'         => $isanggota,
                        'iscalon'           => $iscalon,
                        'logged_in'         => TRUE
                    ];
                    $session->set($ses_data);
                    if ($issadmin){
                        $session->set('role', 'superadmin');
                        return redirect()->to('/superadmin');                        
                    }elseif($isadmin){
                        $session->set('role', 'admin');
                        return redirect()->to('/admin');
                    }elseif($isanggota){
                        $session->set('role', 'anggota');
                        return redirect()->to('/confanggota');
                    }elseif($iscalon){
                        $session->set('role', 'calon');
                        return redirect()->to('/anggota');
                    }else{
                        $session->destroy();
                        return redirect()->to('/home');
                    }
                }else{
                    $session->setFlashdata('msg', 'Salah password.');
                    return redirect()->to('/home/login');
                }
            }else{
                $session->setFlashdata('msg', 'Username tidak ditemukan atau status sudah tidak aktif.');
                return redirect()->to('/home/login');
            }
        }else{
            $data['validation'] = $this->validator;
            $data['title'] = "Sistem Informasi Anggota ICHI";
            $data['page_title'] = "Login Anggota ICHI";
            return view('main/login', $data);
        }
    }
 
    //fungsi logout
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/home');
    }
}