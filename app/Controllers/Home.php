<?php

namespace App\Controllers;

use App\Models\DiriModel;
use App\Models\KerjaModel;
use App\Models\OrgModel;
use App\Models\PendModel;
use App\Models\PubModel;
use App\Models\UserModel;
use App\Models\DprModel;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $logged_in = $session->get('logged_in');
        $model = new UserModel();
        $where = 'tbl_user.type LIKE "__y_"';
        $member = $model->select('tbl_user.user_id, tbl_user.namalengkap, tbl_datadiri.foto, tbl_datadiri.alamat, tbl_datadiri.notelp, tbl_datadiri.email, tbl_datadiri.bagidata, tbl_datadiri.keahlian, tbl_datadiri.tempatkerja, tbl_datadiri.alamatkerja, tbl_datadiri.telpkerja, tbl_datadiri.emailkerja, tbl_dpr.dpr_nama')->where('softdelete','Tidak')->where('status', 'aktif')->where($where)->join('tbl_datadiri', 'tbl_user.user_id=tbl_datadiri.user_id','left')->join('tbl_dpr', 'tbl_user.dpr_id=tbl_dpr.dpr_id','left')->orderby('tbl_user.user_id','RANDOM')->limit(9)->find();
        if(!empty($member)){
            $data['info_member'] = $member;
        }else{
            $data['info_member'] = "kosong";
        }
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
        $model = new DprModel();
        $data['data_dpr'] = $model->findAll();
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

                $dpr_id = $this->request->getVar('dpr_id');
                $username = $this->request->getVar('email');
                $newpass = $this->request->getVar('newpass');
                $namalengkap = $this->request->getVar('namalengkap');

                $datauser = array(
                    'dpr_id' => $dpr_id,
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
            $data = $model->where('username', $username)->where('status','aktif')->where('softdelete','Tidak')->first();
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
                        'dpr_id'            => $data['dpr_id'],
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
                        return redirect()->to('/anggota');
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

    public function lihatprofile($id){
        $session = session();
        $logged_in = $session->get('logged_in');
        $member = new UserModel();
        $datamember = $member->where('user_id', $id)->join('tbl_dpr', 'tbl_user.dpr_id=tbl_dpr.dpr_id', 'left')->first();
        $profile = new DiriModel();
        $dataprofile = $profile->where('user_id', $id)->first();
        $kerja = new KerjaModel();
        $datakerja = $kerja->where('user_id', $id)->orderby('kerja_id', 'DESC')->findAll();
        $org = new OrgModel();
        $dataorg = $org->where('user_id', $id)->orderby('org_id', 'DESC')->findAll();
        $pend = new PendModel();
        $datapend = $pend->where('user_id', $id)->orderby('pend_id', 'DESC')->findAll();
        $pub = new PubModel();
        $datapub = $pub->where('user_id', $id)->orderby('pub_id', 'DESC')->findAll();

        helper(['tanggal']);
        if (!empty($datamember)){
            $data['info_member'] = $datamember;
        }else{
            $data['info_member'] = "Data kosong";
        }
        if (!empty($dataprofile)){
            $data['info_profile'] = $dataprofile;
        }else{
            $data['info_profile'] = "Data kosong";
        }
        if (!empty($datakerja)){
            $data['info_kerja'] = $datakerja;
        }else{
            $data['info_kerja'] = "Data kosong";
        }
        if (!empty($dataorg)){
            $data['info_org'] = $dataorg;
        }else{
            $data['info_org'] = "Data kosong";
        }
        if (!empty($datapend)){
            $data['info_pend'] = $datapend;
        }else{
            $data['info_pend'] = "Data kosong";
        }
        if (!empty($datapub)){
            $data['info_pub'] = $datapub;
        }else{
            $data['info_pub'] = "Data kosong";
        }

        $data['user_id'] = $id;
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Profile Anggota ICHI";
        $data['data_bread'] = "Profile Anggota";
        $data['logged_in'] = $session->get('logged_in');
        return view('main/profilemember', $data);
    }
    
    public function anggota()
    {
        $session = session();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $role = $session->get('role');
        $dpr_id = $session->get('dpr_id');
        $model = new UserModel();
        $data['logged_in'] = $logged_in;
        $where = 'tbl_user.type LIKE "__y_"';
        $member = $model->select('tbl_user.user_id, tbl_user.kodeanggota, tbl_user.namalengkap, tbl_dpr.dpr_nama, tbl_datadiri.keahlian')->where('tbl_user.status','aktif')->where('tbl_user.softdelete', 'Tidak')->where($where)->join('tbl_dpr', 'tbl_user.dpr_id = tbl_dpr.dpr_id', 'left')->join('tbl_datadiri', 'tbl_user.user_id = tbl_datadiri.user_id', 'left')->orderby('tbl_user.user_id','DESC')->findall();
        if (!empty($member)){
            $data['info_member'] = $member;
        }else{
            $data['info_member'] = 'kosong';
        }
        $data['user_id'] = $user_id;
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        return view('main/daftaranggota', $data);
    }

    public function daftardpr()
    {
        $session = session();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $model = new DprModel();
        $data['logged_in'] = $logged_in;
        $dpr = $model->orderby('dpr_id','ASC')->findall();
        if (!empty($dpr)){
            $data['info_dpr'] = $dpr;
        }else{
            $data['info_dpr'] = 'kosong';
        }
        $data['user_id'] = $session->get('user_id');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Daftar DPP/DPR ICHI";
        $data['data_bread'] = "Dewan Pengurus";
        return view('main/daftardpr', $data);
    }   
}