<?php

namespace App\Controllers;

use App\Models\DiriModel;
use App\Models\KerjaModel;
use App\Models\OrgModel;
use App\Models\PendModel;
use App\Models\PubModel;
use App\Models\UserModel;
use App\Models\DprModel;

class Mananggota extends BaseController
{
    public function index()
    {
        $session = session();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $role = $session->get('role');
        $dpr_id = $session->get('dpr_id');
        $model = new UserModel();
        $data['logged_in'] = $logged_in;
        if ($role=="superadmin"){
            $member = $model->where('tbl_user.softdelete', 'Tidak')->join('tbl_dpr', 'tbl_user.dpr_id = tbl_dpr.dpr_id', 'left')->orderby('tbl_user.user_id','DESC')->findall();
        }elseif($role=="admin"){
            $member = $model->where('tbl_user.softdelete', 'Tidak')->where('tbl_user.dpr_id', $dpr_id)->join('tbl_dpr', 'tbl_user.dpr_id = tbl_dpr.dpr_id', 'left')->orderby('tbl_user.user_id','DESC')->findall();            
        }
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
        $data['page_title'] = "Manajemen Anggota ICHI";
        $data['data_bread'] = "Anggota";
        return view('member/mananggota', $data);
    }   

    public function tambahmember(){
        $session = session();
        $logged_in = $session->get('logged_in');
        $user_id = $session->get('user_id');
        $model = new DprModel();
        $data['data_dpr'] = $model->orderby('dpr_id', 'ASC')->findAll();
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Tambah Anggota ICHI";
        $data['data_bread'] = "Tambah Anggota";
        $data['user_id'] = $user_id;
        $data['logged_in'] = $logged_in;
        return view('member/tambahmember', $data);
    }

    public function tambahmemberproses(){
        $session = session();
        $model = new UserModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/mananggota');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'kodeanggota' => [
                    'label'  => 'Kode Anggota',
                    'rules'  => 'required|is_unique[tbl_user.kodeanggota]',
                    'errors' => [
                        'required' => 'Field Kode Anggota harus diisi.',
                        'is_unique' => 'Field Kode Anggota sudah digunakan. Ganti kode anggota.'
                    ],
                ],
                'username' => [
                    'label'  => 'Username',
                    'rules'  => 'required|valid_email|is_unique[tbl_user.username]',
                    'errors' => [
                        'required' => 'Field Nama Anggota harus diisi.',
                        'is_unique' => 'Email yang digunakan sudah ada. Ganti email yang lain.',
                        'valid_email' => "Harus menggunakan format email yang benar.",
                    ],
                ],
                'namalengkap' => [
                    'label'  => 'Nama Lengkap',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Lengkap harus diisi.',
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
            ]);

            if ($formvalid){
                $role = $session->get('role');

                $kodeanggota = $this->request->getVar('kodeanggota');
                $dpr_id = $this->request->getVar('dpr_id');
                $username = $this->request->getVar('username');
                $namalengkap = $this->request->getVar('namalengkap');
                $newpass = $this->request->getVar('newpass');
                $status = $this->request->getVar('status');
                $superadmin = $this->request->getVar('superadmin') == "yes" ? "y" : "n";
                $admin = $this->request->getVar('admin') == "yes" ? "y" : "n";
                $anggota = $this->request->getVar('anggota') == "yes" ? "y" : "n";
                $calon = $this->request->getVar('calon') == "yes" ? "y" : "n";
                if ($role=="superadmin"){
                    $tipe_user = $superadmin.$admin.$anggota.$calon;
                }elseif($role=="admin"){
                    $tipe_user = 'n'.$admin.$anggota.$calon;
                }
                $kehormatan = $this->request->getVar('kehormatan');
                $confirm = $this->request->getVar('confirm');
    
                $data = array(
                    'kodeanggota' => $kodeanggota,
                    'dpr_id' => $dpr_id,
                    'username' => $username,
                    'namalengkap' => $namalengkap,
                    'password' => password_hash($newpass, PASSWORD_DEFAULT),
                    'status' => $status,
                    'type' => $tipe_user,
                    'kehormatan' => $kehormatan,
                    'confirm' => $confirm,
                    'softdelete' => 'Tidak',
                    'datecreated' => date('Y-m-d'),
                    'datamodified' => date('Y-m-d')
                );
    
                $model->save($data); 
    
                return redirect()->to('/mananggota');
            }else{
                $model1 = new DprModel();
                $data['data_dpr'] = $model1->orderby('dpr_id', 'ASC')->findAll();
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Tambah Anggota ICHI";
                $data['data_bread'] = "Tambah Anggota";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/tambahmembervalid', $data);
            }
        }        
    }

    public function hapusmember($id){
        $session = session();
        $model = new UserModel();
        $logged_in = $session->get('logged_in');
        $data = array(
            'softdelete' => 'Ya',
            'datamodified' => date('Y-m-d')
        );
        $model->update($id, $data);
        $session->setFlashdata('msg', 'Data anggota ICHI berhasil dihapus.');

        return redirect()->to('/mananggota');        
    }

    public function ubahmember($id){
        $session = session();
        $logged_in = $session->get('logged_in');
        $model = new UserModel();
        $member = $model->where('user_id', $id)->first();
        if ($member){
            $data = [
                'user_id' => $member['user_id'],
                'kodeanggota' => $member['kodeanggota'],
                'dpr_id' => $member['dpr_id'],
                'username' => $member['username'],
                'namalengkap' => $member['namalengkap'],
                'status' => $member['status'],
                'type' => $member['type'],
                'kehormatan' => $member['kehormatan'],
                'confirm' => $member['confirm']
            ];
        }
        $model1 = new DprModel();
        $data['data_dpr'] = $model1->orderby('dpr_id', 'ASC')->findAll();
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Ubah Data Anggota ICHI";
        $data['data_bread'] = "Ubah Data Anggota";
        $data['logged_in'] = $session->get('logged_in');
        return view('member/ubahmember', $data);
    }

    public function ubahmemberproses(){
        $session = session();
        $model = new UserModel();
        $logged_in = $session->get('logged_in');
        $role = $session->get('role');
        $user_id = $this->request->getVar('user_id');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/mananggota');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'kodeanggota' => [
                    'label'  => 'Kode Anggota',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Kode Anggota harus diisi.',
                        'is_unique' => 'Field Kode Anggota sudah digunakan. Ganti kode anggota.'
                    ],
                ],
                'username' => [
                    'label'  => 'Username',
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'Field Nama Anggota harus diisi.',
                        'is_unique' => 'Email yang digunakan sudah ada. Ganti email yang lain.',
                        'valid_email' => "Harus menggunakan format email yang benar.",
                    ],
                ],
                'namalengkap' => [
                    'label'  => 'Nama Lengkap',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Lengkap harus diisi.',
                    ],
                ],
                'confirmpass' => [
                    'label'  => 'confirmpass',
                    'rules'  => 'matches[newpass]',
                    'errors' => [
                        'matches' => "Konfirmasi Password tidak sama.",
                    ]
                ],
            ]);

            if ($formvalid){
                $kodeanggota = $this->request->getVar('kodeanggota');
                $dpr_id = $this->request->getVar('dpr_id');
                $username = $this->request->getVar('username');
                $namalengkap = $this->request->getVar('namalengkap');
                $newpass = $this->request->getVar('newpass');
                $status = $this->request->getVar('status');
                $superadmin = $this->request->getVar('superadmin') == "yes" ? "y" : "n";
                $admin = $this->request->getVar('admin') == "yes" ? "y" : "n";
                $anggota = $this->request->getVar('anggota') == "yes" ? "y" : "n";
                $calon = $this->request->getVar('calon') == "yes" ? "y" : "n";
                if ($role=="superadmin"){
                    $tipe_user = $superadmin.$admin.$anggota.$calon;
                }elseif($role=="admin"){
                    $tipe_user = 'n'.$admin.$anggota.$calon;
                }
                $kehormatan = $this->request->getVar('kehormatan');
                $confirm = $this->request->getVar('confirm');

                if (!empty($newpass)){
                $datauser = array(
                    'kodeanggota' => $kodeanggota,
                    'dpr_id' => $dpr_id,
                    'username' => $username,
                    'namalengkap' => $namalengkap,
                    'password' => password_hash($newpass, PASSWORD_DEFAULT),
                    'status' => $status,
                    'type' => $tipe_user,
                    'kehormatan' => $kehormatan,
                    'confirm' => $confirm,
                    'softdelete' => 'Tidak',
                    'datamodified' => date('Y-m-d')
                );
                }else{
                    $datauser = array(
                        'kodeanggota' => $kodeanggota,
                        'dpr_id' => $dpr_id,
                        'username' => $username,
                        'namalengkap' => $namalengkap,
                        'status' => $status,
                        'type' => $tipe_user,
                        'kehormatan' => $kehormatan,
                        'confirm' => $confirm,
                        'softdelete' => 'Tidak',
                        'datamodified' => date('Y-m-d')
                    );                    
                }
    
                $model->update($user_id, $datauser); 
    
                return redirect()->to('/mananggota');
            }else{
                $member = $model->where('user_id', $user_id)->first();
                if ($member){
                    $data = [
                        'user_id' => $member['user_id'],
                        'dpr_id' => $member['dpr_id'],
                        'kodeanggota' => $member['kodeanggota'],
                        'username' => $member['username'],
                        'namalengkap' => $member['namalengkap'],
                        'status' => $member['status'],
                        'type' => $member['type'],
                        'kehormatan' => $member['kehormatan'],
                        'confirm' => $member['confirm']
                    ];
                }
                $model1 = new DprModel();
                $data['data_dpr'] = $model1->orderby('dpr_id', 'ASC')->findAll();
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Ubah Data Anggota ICHI";
                $data['data_bread'] = "Ubah Data Anggota";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/ubahmember', $data);
            }
        }        
    }

    public function profile($id){
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
        return view('member/profilemember', $data);
    }
}