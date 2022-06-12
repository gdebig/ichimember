<?php

namespace App\Controllers;

use App\Models\OrgModel;

class Organisasi extends BaseController
{
    public function index()
    {
        $session = session();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $model = new OrgModel();
        $data['logged_in'] = $logged_in;
        $user_id = $session->get('user_id');
        $org = $model->where('user_id', $user_id)->orderby('thnawal','ASC')->findall();
        if (!empty($org)){
            $data['info_org'] = $org;
        }else{
            $data['info_org'] = 'kosong';
        }
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Data Organisasi Anggota ICHI";
        $data['data_bread'] = "Organisasi";
        return view('member/organisasi', $data);
    }   

    public function tambahorg(){
        $session = session();
        $logged_in = $session->get('logged_in');
        $user_id = $session->get('user_id');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Tambah Data Organisasi Anggota ICHI";
        $data['data_bread'] = "Tambah Data Organisasi";
        $data['user_id'] = $user_id;
        $data['logged_in'] = $logged_in;
        return view('member/tambahorg', $data);
    }

    public function tambahorgproses(){
        $session = session();
        $model = new OrgModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/organisasi');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'namaorganisasi' => [
                    'label'  => 'Nama Organisasi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Organisasi harus diisi.',
                    ],
                ],
                'jabatan' => [
                    'label'  => 'Jabatan',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Jabatan harus diisi.',
                    ],
                ]
            ]);

            if ($formvalid){
                $namaorganisasi = $this->request->getVar('namaorganisasi');
                $jabatan = $this->request->getVar('jabatan');
                $thnawal = $this->request->getVar('thnawal');
                $thnakhir = $this->request->getVar('thnakhir');
    
                $data = array(
                    'user_id' => $user_id,
                    'namaorganisasi' => $namaorganisasi,
                    'jabatan' => $jabatan,
                    'thnawal' => $thnawal,
                    'thnakhir' => $thnakhir,
                    'datecreated' => date('Y-m-d'),
                    'datamodified' => date('Y-m-d')
                );
    
                $model->save($data); 
    
                return redirect()->to('/organisasi');
            }else{
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Tambah Data Organisasi Anggota ICHI";
                $data['data_bread'] = "Tambah Data Organisasi";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/tambahorgvalid', $data);
            }
        }        
    }

    public function hapusorg($id){
        $session = session();
        $model = new OrgModel();
        $logged_in = $session->get('logged_in');
        $model->delete($id);
        $session->setFlashdata('msg', 'Data Organisasi berhasil dihapus.');

        return redirect()->to('/organisasi');        
    }

    public function ubahorg($id){
        $session = session();
        $logged_in = $session->get('logged_in');
        $model = new OrgModel();
        $org = $model->where('org_id', $id)->first();
        if ($org){
            $data = [
                'org_id' => $org['org_id'],
                'user_id' => $org['user_id'],
                'namaorganisasi' => $org['namaorganisasi'],
                'jabatan' => $org['jabatan'],
                'thnawal' => $org['thnawal'],
                'thnakhir' => $org['thnakhir']
            ];
        }
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Ubah Data Organisasi Anggota ICHI";
        $data['data_bread'] = "Ubah Data Organisasi";
        $data['logged_in'] = $session->get('logged_in');
        return view('member/ubahorg', $data);
    }

    public function ubahorgproses(){
        $session = session();
        $model = new OrgModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $org_id = $this->request->getVar('org_id');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/organisasi');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'namaorganisasi' => [
                    'label'  => 'Nama Organisasi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Organisasi harus diisi.',
                    ],
                ],
                'jabatan' => [
                    'label'  => 'Jabatan',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Jabatan harus diisi.',
                    ],
                ]
            ]);

            if ($formvalid){
                $namaorganisasi = $this->request->getVar('namaorganisasi');
                $jabatan = $this->request->getVar('jabatan');
                $thnawal = $this->request->getVar('thnawal');
                $thnakhir = $this->request->getVar('thnakhir');
    
                $data = array(
                    'namaorganisasi' => $namaorganisasi,
                    'jabatan' => $jabatan,
                    'thnawal' => $thnawal,
                    'thnakhir' => $thnakhir,
                    'datamodified' => date('Y-m-d')
                );
    
                $model->update($org_id, $data); 
    
                return redirect()->to('/organisasi');
            }else{
                $org = $model->where('org_id', $org_id)->first();
                if ($org){
                    $data = [
                        'org_id' => $org['org_id'],
                        'user_id' => $org['user_id'],
                        'namaorganisasi' => $org['namaorganisasi'],
                        'jabatan' => $org['jabatan'],
                        'thnawal' => $org['thnawal'],
                        'thnakhir' => $org['thnakhir']
                    ];
                }
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Ubah Data Organisasi Anggota ICHI";
                $data['data_bread'] = "Ubah Data Organisasi";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/ubahorg', $data);
            }
        }        
    }
}