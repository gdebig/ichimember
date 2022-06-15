<?php

namespace App\Controllers;

use App\Models\UserModel;

class Mananggota extends BaseController
{
    public function index()
    {
        $session = session();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $model = new UserModel();
        $data['logged_in'] = $logged_in;
        $member = $model->where('softdelete', 'Tidak')->orderby('user_id','DESC')->findall();
        if (!empty($member)){
            $data['info_member'] = $member;
        }else{
            $data['info_member'] = 'kosong';
        }
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
                        'required' => 'Field Kode member / DPP harus diisi.',
                        'is_unique' => 'Field Kode Anggota sudah digunakan. Ganti kode anggota.'
                    ],
                ],
                'username' => [
                    'label'  => 'Username',
                    'rules'  => 'required|valid_email|is_unique[tbl_user.username]',
                    'errors' => [
                        'required' => 'Field Nama member / DPP harus diisi.',
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
                $kodeanggota = $this->request->getVar('kodeanggota');
                $username = $this->request->getVar('username');
                $namalengkap = $this->request->getVar('namalengkap');
                $newpass = $this->request->getVar('newpass');
                $status = $this->request->getVar('status');
                $superadmin = $this->request->getVar('superadmin') == "yes" ? "y" : "n";
                $admin = $this->request->getVar('admin') == "yes" ? "y" : "n";
                $anggota = $this->request->getVar('anggota') == "yes" ? "y" : "n";
                $calon = $this->request->getVar('calon') == "yes" ? "y" : "n";
                $tipe_user = $superadmin.$admin.$anggota.$calon;
                $kehormatan = $this->request->getVar('kehormatan');
                $confirm = $this->request->getVar('confirm');
    
                $data = array(
                    'kodeanggota' => $kodeanggota,
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
                'username' => $member['username'],
                'namalengkap' => $member['namalengkap'],
                'status' => $member['status'],
                'type' => $member['type'],
                'kehormatan' => $member['kehormatan'],
                'confirm' => $member['confirm']
            ];
        }
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
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $user_id = $this->request->getVar('user_id');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/mananggota');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'kodeanggota' => [
                    'label'  => 'Kode member / DPP',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Kode member / DPP harus diisi.',
                    ],
                ],
                'username' => [
                    'label'  => 'Nama member / DPP',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama member / DPP harus diisi.',
                    ],
                ],
                'namalengkap' => [
                    'label'  => 'Nama Lengkap',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Lengkap harus diisi.',
                    ],
                ],
                'status' => [
                    'label'  => 'Tanggal Akhir SK',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tanggal Akhir SK harus diisi.',
                    ],
                ]
            ]);

            if ($formvalid){
                $filename = $this->request->getVar('filename');
                $kodeanggota = $this->request->getVar('kodeanggota');
                $username = $this->request->getVar('username');
                $member_tingkat = $this->request->getVar('member_tingkat');
                $namalengkap = $this->request->getVar('namalengkap');
                $newpass = $this->request->getFile('newpass');
                $status = $this->request->getVar('status');

                $ext = $newpass->getClientExtension();
                if (!empty($ext)){
                    $filename = $kodeanggota.'_'.str_replace(' ', '', $username).'_skmemberdpp.'.$ext;
                    $newpass->move('uploads/docs/',$filename,true);
                }else{
                    $filename = $filename;
                }
    
                $data = array(
                    'kodeanggota' => $kodeanggota,
                    'username' => $username,
                    'member_tingkat' => $member_tingkat,
                    'namalengkap' => $namalengkap,
                    'newpass' => $filename,
                    'status' => $status,
                    'datamodified' => date('Y-m-d')
                );
    
                $model->update($user_id, $data); 
    
                return redirect()->to('/manmember');
            }else{
                $member = $model->where('user_id', $user_id)->first();
                if ($member){
                    $data = [
                        'user_id' => $member['user_id'],
                        'kodeanggota' => $member['kodeanggota'],
                        'username' => $member['username'],
                        'member_tingkat' => $member['member_tingkat'],
                        'namalengkap' => $member['namalengkap'],
                        'newpass' => $member['newpass'],
                        'status' => $member['status']
                    ];
                }
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Ubah Data member / DPP ICHI";
                $data['data_bread'] = "Ubah Data member / DPP";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/ubahmember', $data);
            }
        }        
    }
}