<?php

namespace App\Controllers;

use App\Models\PubModel;

class Publikasi extends BaseController
{
    public function index()
    {
        $session = session();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $model = new PubModel();
        $data['logged_in'] = $logged_in;
        $user_id = $session->get('user_id');
        $pub = $model->where('user_id', $user_id)->orderby('tahun','ASC')->findall();
        if (!empty($pub)){
            $data['data_pub'] = $pub;
        }else{
            $data['data_pub'] = 'kosong';
        }
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Data Publikasi Anggota ICHI";
        $data['data_bread'] = "Publikasi";
        return view('member/publikasi', $data);
    }   

    public function tambahpub(){
        $session = session();
        $logged_in = $session->get('logged_in');
        $user_id = $session->get('user_id');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Tambah Data Publikasi Anggota ICHI";
        $data['data_bread'] = "Tambah Data Publikasi";
        $data['user_id'] = $user_id;
        $data['logged_in'] = $logged_in;
        return view('member/tambahpub', $data);
    }

    public function tambahpubproses(){
        $session = session();
        $model = new PubModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/publikasi');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'judul' => [
                    'label'  => 'Judul Publikasi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Judul Publikasi harus diisi.',
                    ],
                ],
                'mediapublikasi' => [
                    'label'  => 'Nama Journal/Proceeding/Media Publikasi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Journal/Proceeding/Media Publikasi harus diisi.',
                    ],
                ]
            ]);

            if ($formvalid){
                $tipepublikasi = $this->request->getVar('tipepublikasi');
                $judul = $this->request->getVar('judul');
                $mediapublikasi = $this->request->getVar('mediapublikasi');
                $tahun = $this->request->getVar('tahun');
                $linkpub = $this->request->getVar('linkpub');
    
                $data = array(
                    'user_id' => $user_id,
                    'tipepublikasi' => $tipepublikasi,
                    'judul' => $judul,
                    'mediapublikasi' => $mediapublikasi,
                    'tahun' => $tahun,
                    'linkpub' => $linkpub,
                    'datecreated' => date('Y-m-d'),
                    'datamodified' => date('Y-m-d')
                );
    
                $model->save($data); 
    
                return redirect()->to('/publikasi');
            }else{
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Tambah Data Publikasi Anggota ICHI";
                $data['data_bread'] = "Tambah Data Publikasi";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/tambahpubvalid', $data);
            }
        }        
    }

    public function hapuspub($id){
        $session = session();
        $model = new PubModel();
        $logged_in = $session->get('logged_in');
        $model->delete($id);
        $session->setFlashdata('msg', 'Data Publikasi berhasil dihapus.');

        return redirect()->to('/publikasi');        
    }

    public function ubahpub($id){
        $session = session();
        $logged_in = $session->get('logged_in');
        $model = new PubModel();
        $pub = $model->where('pub_id', $id)->first();
        if ($pub){
            $data = [
                'pub_id' => $pub['pub_id'],
                'user_id' => $pub['user_id'],
                'tipepublikasi' => $pub['tipepublikasi'],
                'judul' => $pub['judul'],
                'mediapublikasi' => $pub['mediapublikasi'],
                'tahun' => $pub['tahun'],
                'linkpub' => $pub['linkpub']
            ];
        }
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Ubah Data Publikasi Anggota ICHI";
        $data['data_bread'] = "Ubah Data Publikasi";
        $data['logged_in'] = $session->get('logged_in');
        return view('member/ubahpub', $data);
    }

    public function ubahpubproses(){
        $session = session();
        $model = new PubModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $pub_id = $this->request->getVar('pub_id');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/publikasi');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'judul' => [
                    'label'  => 'Judul Publikasi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Judul Publikasi harus diisi.',
                    ],
                ],
                'mediapublikasi' => [
                    'label'  => 'Nama Journal/Proceeding/Media Publikasi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Journal/Proceeding/Media Publikasi harus diisi.',
                    ],
                ]
            ]);

            if ($formvalid){
                $tipepublikasi = $this->request->getVar('tipepublikasi');
                $judul = $this->request->getVar('judul');
                $mediapublikasi = $this->request->getVar('mediapublikasi');
                $tahun = $this->request->getVar('tahun');
                $linkpub = $this->request->getVar('linkpub');
    
                $data = array(
                    'tipepublikasi' => $tipepublikasi,
                    'judul' => $judul,
                    'mediapublikasi' => $mediapublikasi,
                    'tahun' => $tahun,
                    'linkpub' => $linkpub,
                    'datamodified' => date('Y-m-d')
                );
    
                $model->update($pub_id, $data); 
    
                return redirect()->to('/publikasi');
            }else{
                $pub = $model->where('pub_id', $pub_id)->first();
                if ($pub){
                    $data = [
                        'pub_id' => $pub['pub_id'],
                        'user_id' => $pub['user_id'],
                        'tipepublikasi' => $pub['tipepublikasi'],
                        'judul' => $pub['judul'],
                        'mediapublikasi' => $pub['mediapublikasi'],
                        'tahun' => $pub['tahun'],
                        'linkpub' => $pub['linkpub']
                    ];
                }
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Ubah Data Publikasi Anggota ICHI";
                $data['data_bread'] = "Ubah Data Publikasi";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/ubahpub', $data);
            }
        }        
    }
}