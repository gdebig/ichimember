<?php

namespace App\Controllers;

use App\Models\KerjaModel;

class Pengkerja extends BaseController
{
    public function index()
    {
        $session = session();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $model = new KerjaModel();
        $data['logged_in'] = $logged_in;
        $user_id = $session->get('user_id');
        $kerja = $model->where('user_id', $user_id)->orderby('thnawal','ASC')->findall();
        if (!empty($kerja)){
            $data['info_kerja'] = $kerja;
        }else{
            $data['info_kerja'] = 'kosong';
        }
        $data['user_id'] = $user_id;
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Data Pengalaman Kerja Anggota ICHI";
        $data['data_bread'] = "Pengalaman Kerja";
        return view('member/pengkerja', $data);
    }   

    public function tambahkerja(){
        $session = session();
        $logged_in = $session->get('logged_in');
        $user_id = $session->get('user_id');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Tambah Data Pengalaman Kerja Anggota ICHI";
        $data['data_bread'] = "Tambah Data Pengalaman kerja";
        $data['user_id'] = $user_id;
        $data['logged_in'] = $logged_in;
        return view('member/tambahkerja', $data);
    }

    public function tambahkerjaproses(){
        $session = session();
        $model = new KerjaModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/pengkerja');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'namainstansi' => [
                    'label'  => 'Nama Instansi / Tempat Kerja',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Instansi / Tempat Kerja harus diisi.',
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
                $namainstansi = $this->request->getVar('namainstansi');
                $jabatan = $this->request->getVar('jabatan');
                $thnawal = $this->request->getVar('thnawal');
                $thnakhir = $this->request->getVar('thnakhir');
                $thnawal = $this->request->getVar('thnawal');
                $thnakhir = $this->request->getVar('thnakhir');
    
                $data = array(
                    'user_id' => $user_id,
                    'namainstansi' => $namainstansi,
                    'jabatan' => $jabatan,
                    'thnawal' => $thnawal,
                    'thnakhir' => $thnakhir,
                    'datecreated' => date('Y-m-d'),
                    'datamodified' => date('Y-m-d')
                );
    
                $model->save($data); 
    
                return redirect()->to('/pengkerja');
            }else{
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Tambah Data Pengalaman Kerja Anggota ICHI";
                $data['data_bread'] = "Tambah Data Pengalaman kerja";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/tambahkerjavalid', $data);
            }
        }        
    }

    public function hapuskerja($id){
        $session = session();
        $model = new KerjaModel();
        $logged_in = $session->get('logged_in');
        $model->delete($id);
        $session->setFlashdata('msg', 'Data pengalaman kerja berhasil dihapus.');

        return redirect()->to('/pengkerja');        
    }

    public function ubahkerja($id){
        $session = session();
        $logged_in = $session->get('logged_in');
        $model = new KerjaModel();
        $kerja = $model->where('kerja_id', $id)->first();
        if ($kerja){
            $data = [
                'kerja_id' => $kerja['kerja_id'],
                'user_id' => $kerja['user_id'],
                'namainstansi' => $kerja['namainstansi'],
                'jabatan' => $kerja['jabatan'],
                'thnawal' => $kerja['thnawal'],
                'thnakhir' => $kerja['thnakhir']
            ];
        }
        $data['user_id'] = $session->get('user_id');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Ubah Data Pengalaman Kerja Anggota ICHI";
        $data['data_bread'] = "Ubah Data Pengalaman Kerja";
        $data['logged_in'] = $session->get('logged_in');
        return view('member/ubahkerja', $data);
    }

    public function ubahkerjaproses(){
        $session = session();
        $model = new KerjaModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $kerja_id = $this->request->getVar('kerja_id');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/pengkerja');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'namainstansi' => [
                    'label'  => 'Nama Instansi / Tempat Kerja',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Instansi / Tempat Kerja harus diisi.',
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
                $namainstansi = $this->request->getVar('namainstansi');
                $jabatan = $this->request->getVar('jabatan');
                $thnawal = $this->request->getVar('thnawal');
                $thnakhir = $this->request->getVar('thnakhir');
    
                $data = array(
                    'namainstansi' => $namainstansi,
                    'jabatan' => $jabatan,
                    'thnawal' => $thnawal,
                    'thnakhir' => $thnakhir,
                    'datamodified' => date('Y-m-d')
                );
    
                $model->update($kerja_id, $data); 
    
                return redirect()->to('/pengkerja');
            }else{
                $kerja = $model->where('kerja_id', $kerja_id)->first();
                if ($kerja){
                    $data = [
                        'kerja_id' => $kerja['kerja_id'],
                        'user_id' => $kerja['user_id'],
                        'namainstansi' => $kerja['namainstansi'],
                        'jabatan' => $kerja['jabatan'],
                        'thnawal' => $kerja['thnawal'],
                        'thnakhir' => $kerja['thnakhir']
                    ];
                }
                $data['user_id'] = $user_id;
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Ubah Data Pengalaman Kerja Anggota ICHI";
                $data['data_bread'] = "Ubah Data Pengalaman Kerja";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/ubahkerja', $data);
            }
        }        
    }
}