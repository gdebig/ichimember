<?php

namespace App\Controllers;

use App\Models\DprModel;

class Infodpr extends BaseController
{
    public function index()
    {
        $session = session();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $role = $session->get('role');
        $dpr_id = $session->get('dpr_id');
        $model = new DprModel();
        $dpr = $model->where('dpr_id', $dpr_id)->first();
        helper('tanggal');
        $data['info_dpr'] = $dpr;
        $data['logged_in'] = $logged_in;
        $data['user_id'] = $user_id;
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Manajemen Anggota ICHI";
        $data['data_bread'] = "Anggota";
        return view('member/infodpr', $data);
    }

    public function ubahdpr($id){
        $session = session();
        $logged_in = $session->get('logged_in');
        $model = new DprModel();
        $dpr = $model->where('dpr_id', $id)->first();
        if ($dpr){
            $data = [
                'dpr_id' => $dpr['dpr_id'],
                'kodedpr' => $dpr['kodedpr'],
                'dpr_nama' => $dpr['dpr_nama'],
                'dpr_tingkat' => $dpr['dpr_tingkat'],
                'nosk' => $dpr['nosk'],
                'file_sk' => $dpr['file_sk'],
                'expired' => $dpr['expired'],
                'alamat' => $dpr['alamat'],
                'email' => $dpr['email'],
                'notelp' => $dpr['notelp']
            ];
        }
        $data['user_id'] = $session->get('user_id');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Ubah Data DPR / DPP ICHI";
        $data['data_bread'] = "Ubah Data DPR/DPP";
        $data['logged_in'] = $session->get('logged_in');
        return view('member/ubahinfodpr', $data);
    }

    public function ubahdprproses(){
        $session = session();
        $model = new DprModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $dpr_id = $this->request->getVar('dpr_id');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/infodpr');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'dpr_nama' => [
                    'label'  => 'Nama DPR / DPP',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama DPR / DPP harus diisi.',
                    ],
                ],
                'nosk' => [
                    'label'  => 'Nomor SK',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nomor SK harus diisi.',
                    ],
                ],
                'expired' => [
                    'label'  => 'Tanggal Akhir SK',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tanggal Akhir SK harus diisi.',
                    ],
                ],
                'email' => [
                    'label'  => 'Email Resmi',
                    'rules'  => 'valid_email',
                    'errors' => [
                        'valid_email' => 'Field Email Resmi harus diisi dengan format email yang benar.',
                    ],
                ]
            ]);

            if ($formvalid){
                $filename = $this->request->getVar('filename');
                $dpr_nama = $this->request->getVar('dpr_nama');
                $nosk = $this->request->getVar('nosk');
                $file_sk = $this->request->getFile('file_sk');
                $expired = $this->request->getVar('expired');
                $alamat = $this->request->getVar('alamat');
                $email = $this->request->getVar('email');
                $notelp = $this->request->getVar('notelp');

                $ext = $file_sk->getClientExtension();
                if (!empty($ext)){
                    $filename = $kodedpr.'_'.str_replace(' ', '', $dpr_nama).'_skdprdpp.'.$ext;
                    $file_sk->move('uploads/docs/',$filename,true);
                }else{
                    $filename = $filename;
                }
    
                $data = array(
                    'dpr_nama' => $dpr_nama,
                    'nosk' => $nosk,
                    'file_sk' => $filename,
                    'expired' => $expired,
                    'alamat' => $alamat,
                    'email' => $email,
                    'notelp' => $notelp,
                    'datamodified' => date('Y-m-d')
                );
    
                $model->update($dpr_id, $data); 
    
                return redirect()->to('/mandpr');
            }else{
                $dpr = $model->where('dpr_id', $dpr_id)->first();
                if ($dpr){
                    $data = [
                        'dpr_id' => $dpr['dpr_id'],
                        'dpr_nama' => $dpr['dpr_nama'],
                        'nosk' => $dpr['nosk'],
                        'file_sk' => $dpr['file_sk'],
                        'expired' => $dpr['expired'],
                        'alamat' => $dpr['alamat'],
                        'email' => $dpr['email'],
                        'notelp' => $dpr['notelp']
                    ];
                }
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Ubah Data DPR / DPP ICHI";
                $data['data_bread'] = "Ubah Data DPR / DPP";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/ubahdpr', $data);
            }
        }        
    }
}