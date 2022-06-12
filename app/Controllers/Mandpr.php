<?php

namespace App\Controllers;

use App\Models\DprModel;

class Mandpr extends BaseController
{
    public function index()
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
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Manajemen Dewan Pengurus ICHI";
        $data['data_bread'] = "Dewan Pengurus";
        return view('member/mandpr', $data);
    }   

    public function tambahdpr(){
        $session = session();
        $logged_in = $session->get('logged_in');
        $user_id = $session->get('user_id');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Tambah Data DPR / DPP ICHI";
        $data['data_bread'] = "Tambah Data DPR/DPP";
        $data['user_id'] = $user_id;
        $data['logged_in'] = $logged_in;
        return view('member/tambahdpr', $data);
    }

    public function tambahdprproses(){
        $session = session();
        $model = new DprModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/mandpr');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'kodedpr' => [
                    'label'  => 'Kode DPR / DPP',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Kode DPR / DPP harus diisi.',
                    ],
                ],
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
                ]
            ]);

            if ($formvalid){
                $kodedpr = $this->request->getVar('kodedpr');
                $dpr_nama = $this->request->getVar('dpr_nama');
                $dpr_tingkat = $this->request->getVar('dpr_tingkat');
                $nosk = $this->request->getVar('nosk');
                $file_sk = $this->request->getFile('file_sk');
                $expired = $this->request->getVar('expired');

                $ext = $file_sk->getClientExtension();
                if (!empty($ext)){
                    $filename = $kodedpr.'_'.str_replace(' ', '', $dpr_nama).'_skdprdpp.'.$ext;
                    $file_sk->move('uploads/docs/',$filename,true);
                }else{
                    $filename = '';
                }
    
                $data = array(
                    'user_id' => $user_id,
                    'kodedpr' => $kodedpr,
                    'dpr_nama' => $dpr_nama,
                    'dpr_tingkat' => $dpr_tingkat,
                    'nosk' => $nosk,
                    'file_sk' => $filename,
                    'expired' => $expired,
                    'datecreated' => date('Y-m-d'),
                    'datamodified' => date('Y-m-d')
                );
    
                $model->save($data); 
    
                return redirect()->to('/mandpr');
            }else{
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['confirm'] = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Tambah Data DPR / DPP ICHI";
                $data['data_bread'] = "Tambah Data DPR/DPP";
                $data['logged_in'] = $session->get('logged_in');
                $data['user_id'] = $session->get('user_id');
                $data['validation'] = $this->validator;
                return view('member/tambahdprvalid', $data);
            }
        }        
    }

    public function hapusdpr($id){
        $session = session();
        $model = new DprModel();
        $logged_in = $session->get('logged_in');
        $model->delete($id);
        $session->setFlashdata('msg', 'Data DPR / DPP berhasil dihapus.');

        return redirect()->to('/mandpr');        
    }

    public function ubahdpr($id){
        $session = session();
        $logged_in = $session->get('logged_in');
        $model = new DprModel();
        $org = $model->where('dpr_id', $id)->first();
        if ($org){
            $data = [
                'dpr_id' => $org['dpr_id'],
                'kodedpr' => $org['kodedpr'],
                'dpr_nama' => $org['dpr_nama'],
                'dpr_tingkat' => $org['dpr_tingkat'],
                'nosk' => $org['nosk'],
                'file_sk' => $org['file_sk'],
                'expired' => $org['expired']
            ];
        }
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['confirm'] = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Ubah Data DPR / DPP Anggota ICHI";
        $data['data_bread'] = "Ubah Data DPR/DPP";
        $data['logged_in'] = $session->get('logged_in');
        return view('member/ubahdpr', $data);
    }

    public function ubahdprproses(){
        $session = session();
        $model = new DprModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $dpr_id = $this->request->getVar('dpr_id');
        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/mandpr');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'kodedpr' => [
                    'label'  => 'Kode DPR / DPP',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Kode DPR / DPP harus diisi.',
                    ],
                ],
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
                ]
            ]);

            if ($formvalid){
                $filename = $this->request->getVar('filename');
                $kodedpr = $this->request->getVar('kodedpr');
                $dpr_nama = $this->request->getVar('dpr_nama');
                $dpr_tingkat = $this->request->getVar('dpr_tingkat');
                $nosk = $this->request->getVar('nosk');
                $file_sk = $this->request->getFile('file_sk');
                $expired = $this->request->getVar('expired');

                $ext = $file_sk->getClientExtension();
                if (!empty($ext)){
                    $filename = $kodedpr.'_'.str_replace(' ', '', $dpr_nama).'_skdprdpp.'.$ext;
                    $file_sk->move('uploads/docs/',$filename,true);
                }else{
                    $filename = $filename;
                }
    
                $data = array(
                    'kodedpr' => $kodedpr,
                    'dpr_nama' => $dpr_nama,
                    'dpr_tingkat' => $dpr_tingkat,
                    'nosk' => $nosk,
                    'file_sk' => $filename,
                    'expired' => $expired,
                    'datamodified' => date('Y-m-d')
                );
    
                $model->update($dpr_id, $data); 
    
                return redirect()->to('/mandpr');
            }else{
                $org = $model->where('dpr_id', $dpr_id)->first();
                if ($org){
                    $data = [
                        'dpr_id' => $org['dpr_id'],
                        'kodedpr' => $org['kodedpr'],
                        'dpr_nama' => $org['dpr_nama'],
                        'dpr_tingkat' => $org['dpr_tingkat'],
                        'nosk' => $org['nosk'],
                        'file_sk' => $org['file_sk'],
                        'expired' => $org['expired']
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