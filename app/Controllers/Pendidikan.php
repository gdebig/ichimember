<?php

namespace App\Controllers;

use App\Models\PendModel;

class Pendidikan extends BaseController
{
    public function index()
    {
        $session = session();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $model = new PendModel();
        $data['logged_in'] = $logged_in;
        $user_id = $session->get('user_id');
        $pend = $model->where('user_id', $user_id)->orderby('thnmasuk','ASC')->findall();
        if (!empty($pend)){
            $data['data_pend'] = $pend;
        }else{
            $data['data_pend'] = 'kosong';
        }
        $data['user_id'] = $session->get('user_id');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Data Pendidikan Anggota ICHI";
        $data['data_bread'] = "Pendidikan";
        return view('member/pendidikan', $data);
    }   

    public function tambahpendidikan(){
        $session = session();
        $logged_in = $session->get('logged_in');
        $user_id = $session->get('user_id');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Tambah Data Pendidikan Anggota ICHI";
        $data['data_bread'] = "Tambah Data Pendidikan";
        $data['user_id'] = $user_id;
        $data['logged_in'] = $logged_in;
        return view('member/tambahpendidikan', $data);
    }

    public function tambahpendproses(){
        $session = session();
        $model = new PendModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/pendidikan');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'jenjang' => [
                    'label'  => 'jenjang',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Jenjang Pendidikan harus diisi.',
                    ],
                ],
                'namauniv' => [
                    'label'  => 'Nama Sekolah / Perguruan Tinggi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Sekolah / Perguruan Tinggi harus diisi.',
                    ],
                ],
                'thnmasuk' => [
                    'label'  => 'Tahun Masuk',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tahun Masuk harus diisi.',
                    ],
                ],
                'thnlulus' => [
                    'label'  => 'Tahun Lulus',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tahun Lulus harus diisi.',
                    ],
                ]
            ]);

            if ($formvalid){
                $jenjang = $this->request->getVar('jenjang');
                $namauniv = $this->request->getVar('namauniv');
                $fakultas = $this->request->getVar('fakultas');
                $jurusan = $this->request->getVar('jurusan');
                $thnmasuk = $this->request->getVar('thnmasuk');
                $thnlulus = $this->request->getVar('thnlulus');
    
                $data = array(
                    'user_id' => $user_id,
                    'jenjang' => $jenjang,
                    'namauniv' => $namauniv,
                    'fakultas' => $fakultas,
                    'jurusan' => $jurusan,
                    'thnmasuk' => $thnmasuk,
                    'thnlulus' => $thnlulus,
                    'datecreated' => date('Y-m-d'),
                    'datamodified' => date('Y-m-d')
                );
    
                $model->save($data); 
    
                return redirect()->to('/pendidikan');
            }else{
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Tambah Data Pendidikan Anggota ICHI";
                $data['data_bread'] = "Tambah Data Pendidikan";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/tambahpendvalid', $data);
            }
        }        
    }

    public function hapuspendidikan($id){
        $session = session();
        $model = new PendMOdel();
        $logged_in = $session->get('logged_in');
        $model->delete($id);
        $session->setFlashdata('msg', 'Data pendidikan berhasil dihapus.');

        return redirect()->to('/pendidikan');        
    }

    public function ubahpendidikan($id){
        $session = session();
        $logged_in = $session->get('logged_in');
        $model = new PendModel();
        $pend = $model->where('pend_id', $id)->first();
        if ($pend){
            $data = [
                'pend_id' => $pend['pend_id'],
                'user_id' => $pend['user_id'],
                'jenjang' => $pend['jenjang'],
                'namauniv' => $pend['namauniv'],
                'fakultas' => $pend['fakultas'],
                'jurusan' => $pend['jurusan'],
                'thnmasuk' => $pend['thnmasuk'],
                'thnlulus' => $pend['thnlulus']
            ];
        }
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Ubah Data Pendidikan Anggota ICHI";
        $data['data_bread'] = "Ubah Data Pendidikan";
        $data['logged_in'] = $session->get('logged_in');
        return view('member/ubahpendidikan', $data);
    }

    public function ubahpendproses(){
        $session = session();
        $model = new PendModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $pend_id = $this->request->getVar('pend_id');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/pendidikan');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'jenjang' => [
                    'label'  => 'jenjang',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Jenjang Pendidikan harus diisi.',
                    ],
                ],
                'namauniv' => [
                    'label'  => 'Nama Sekolah / Perguruan Tinggi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Sekolah / Perguruan Tinggi harus diisi.',
                    ],
                ],
                'thnmasuk' => [
                    'label'  => 'Tahun Masuk',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tahun Masuk harus diisi.',
                    ],
                ],
                'thnlulus' => [
                    'label'  => 'Tahun Lulus',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tahun Lulus harus diisi.',
                    ],
                ]
            ]);

            if ($formvalid){
                $jenjang = $this->request->getVar('jenjang');
                $namauniv = $this->request->getVar('namauniv');
                $fakultas = $this->request->getVar('fakultas');
                $jurusan = $this->request->getVar('jurusan');
                $thnmasuk = $this->request->getVar('thnmasuk');
                $thnlulus = $this->request->getVar('thnlulus');
    
                $data = array(
                    'jenjang' => $jenjang,
                    'namauniv' => $namauniv,
                    'fakultas' => $fakultas,
                    'jurusan' => $jurusan,
                    'thnmasuk' => $thnmasuk,
                    'thnlulus' => $thnlulus,
                    'datamodified' => date('Y-m-d')
                );
    
                $model->update($pend_id, $data); 
    
                return redirect()->to('/pendidikan');
            }else{
                $pend = $model->where('pend_id', $pend_id)->first();
                if ($pend){
                    $data = [
                        'pend_id' => $pend['pend_id'],
                        'user_id' => $pend['user_id'],
                        'jenjang' => $pend['jenjang'],
                        'namauniv' => $pend['namauniv'],
                        'fakultas' => $pend['fakultas'],
                        'jurusan' => $pend['jurusan'],
                        'thnmasuk' => $pend['thnmasuk'],
                        'thnlulus' => $pend['thnlulus']
                    ];
                }
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Tambah Data Pendidikan Anggota ICHI";
                $data['data_bread'] = "Tambah Data Pendidikan";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/ubahpendidikan', $data);
            }
        }        
    }
}