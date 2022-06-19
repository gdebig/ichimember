<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DiriModel;
use App\Models\KerjaModel;
use App\Models\OrgModel;
use App\Models\PendModel;
use App\Models\PengModel;
use App\Models\PubModel;
use App\Models\DprModel;

class Anggota extends BaseController
{
    public function index()
    {
        $session = session();
        $logged_in = $session->get('logged_in');
        $user_id = $session->get('user_id');

        $dirimodel = new DiriModel();
        $datadiri = $dirimodel->where('user_id', $user_id)->first();
        $kerjamodel = new KerjaModel();
        $datakerja = $kerjamodel->where('user_id', $user_id)->first();
        $orgmodel = new OrgModel();
        $dataorg = $orgmodel->where('user_id', $user_id)->first();
        $pendmodel = new PendModel();
        $datapend = $pendmodel->where('user_id', $user_id)->first();
        $pubmodel = new PubModel();
        $datapub = $pubmodel->where('user_id', $user_id)->first();

        $data['adaprofile'] = !empty($datadiri) ? "Ada" : "Tidak";
        $data['adakerja'] = !empty($datakerja) ? "Ada" : "Tidak";
        $data['adaorg'] = !empty($dataorg) ? "Ada" : "Tidak";
        $data['adapend'] = !empty($datapend) ? "Ada" : "Tidak";
        $data['adapub'] = !empty($datapub) ? "Ada" : "Tidak";

        $data['user_id'] = $session->get('user_id');
        $data['confirm'] = $session->get('confirm');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Dashboard Anggota ICHI";
        $data['data_bread'] = "Anggota";
        $data['logged_in'] = $logged_in;
        return view('member/dashboard', $data);
    }   

    //Fungsi tentang profile anggota ICHI
    public function profile(){
        $session = session();
        $logged_in = $session->get('logged_in');
        helper(['tanggal']);
        
        $user_id = $session->get('user_id');
        $model = new DiriModel();
        $user = $model->where('user_id', $user_id)->first();
        $model1 = new UserModel();
        $nama = $model1->where('user_id', $user_id)->join('tbl_dpr','tbl_user.dpr_id = tbl_dpr.dpr_id','left')->first();
        if ($user){
            $data = [
                'diri_id' => $user['diri_id'],
                'user_id' => $user['user_id'],
                'tempatlahir' => $user['tempatlahir'],
                'tanggallahir' => $user['tanggallahir'],
                'gender' => $user['gender'],
                'alamat' => $user['alamat'], 
                'noktp' => $user['noktp'],
                'uploadktp' => $user['uploadktp'],
                'notelp' => $user['notelp'],
                'email' => $user['email'],
                'foto' => $user['foto'],
                'keahlian' => $user['keahlian'],
                'bagidata' => $user['bagidata'],
                'tempatkerja' => $user['tempatkerja'],
                'alamatkerja' => $user['alamatkerja'],
                'scholar_id' => $user['scholar_id'],
                'scopus_id' => $user['scopus_id'],
                'orcid_id' => $user['orcid_id'],
                'sinta_id' => $user['sinta_id'],
                'telpkerja' => $user['telpkerja'],
                'emailkerja' => $user['emailkerja']
            ];
            $data['namalengkap'] = $nama['namalengkap'];
            $data['dpr_nama'] = $nama['dpr_nama'];
        }else{
            $data['kosong'] = "kosong";
        }
        $data['user_id'] = $session->get('user_id');
        $data['confirm'] = $session->get('confirm');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['logged_in'] = $logged_in;
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Data Diri Anggota ICHI";
        $data['data_bread'] = "Data Diri";
        return view('member/profile', $data);
    }

    public function buatprofile(){
        $session = session();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');
        $model1 = new UserModel();
        $nama = $model1->where('user_id', $user_id)->first();
        $data['confirm'] = $session->get('confirm');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['user_id'] = $user_id;
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Buat Profile Anggota ICHI";
        $data['data_bread'] = "Buat Profile";
        $data['logged_in'] = $logged_in;
        $data['namalengkap'] = $nama['namalengkap'];
        return view('member/buatprofile', $data);
    }

    public function buatprofileproses(){
        $session = session();
        $model = new UserModel();
        $model1 = new DiriModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');

        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/anggota/profile');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'namalengkap' => [
                    'label'  => 'namalengkap',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Lengkap harus diisi.',
                    ],
                ],
                'tempatlahir' => [
                    'label'  => 'tempatlahir',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tempat Lahir harus diisi.',
                    ],
                ],
                'tanggallahir' => [
                    'label'  => 'tanggallahir',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tanggal Lahir harus diisi.',
                    ],
                ],
                'gender' => [
                    'label'  => 'gender',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Badan Kejuruan harus diisi.',
                    ],
                ],
                'alamat' => [
                    'label'  => 'alamat',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Alamat Rumah harus diisi.',
                    ],
                ],
                'noktp' => [
                    'label'  => 'noktp',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nomor KTP harus diisi.',
                    ],
                ],
                'uploadktp' => [
                    'rules'  => 'uploaded[uploadktp]|ext_in[uploadktp,jpg,jpeg,png,pdf]|max_size[uploadktp, 2000]',
                    'errors' => [
                        'uploaded' => 'Field Upload Scan KTP tidak boleh kosong',
                        'ext_in' => "Hanya menerima file JPG, JPEG atau PNG",
                        'max_size' => "Ukuran File Maksimal 2MB"
                    ],
                ],
                'notelp' => [
                    'label'  => 'notelp',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Telepon (Nomor WhatsApp) harus diisi.',
                    ],
                ],
                'email' => [
                    'label'  => 'email',
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'Field Nomor Mobile harus diisi.',
                        'valid_email' => 'Field Email harus diisi dengan format yang benar.'
                    ],
                ],
                'photo' => [
                    'rules'  => 'uploaded[photo]|ext_in[photo,jpg,jpeg,png]|max_size[photo, 2000]',
                    'errors' => [
                        'uploaded' => 'Field Foto tidak boleh kosong',
                        'ext_in' => "Hanya menerima file JPG, JPEG atau PNG",
                        'max_size' => "Ukuran File Maksimal 2MB"
                    ],
                ],
                'keahlian' => [
                    'label'  => 'Keahlian',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tempat Kerja harus diisi.',
                    ],
                ],
                'tempatkerja' => [
                    'label'  => 'Tempat Kerja',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tempat Kerja harus diisi.',
                    ],
                ],
                'alamatkerja' => [
                    'label'  => 'alamatkerja',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Alamat Kantor harus diisi.',
                    ],
                ],
                'telpkerja' => [
                    'label'  => 'Telepon Kantor',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Telepon Kantor harus diisi.',
                    ],
                ],
                'emailkerja' => [
                    'label'  => 'Email Kantor',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Email Kantor harus diisi.',
                    ],
                ],
                'bagidata' => [
                    'label'  => 'bagidata',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Berbagi Profile harus diisi.',
                    ],
                ]
            ]);

            if ($formvalid){
                $user_id = $this->request->getVar('user_id');
                $namalengkap = $this->request->getVar('namalengkap');
                $tempatlahir = $this->request->getVar('tempatlahir');
                $tanggallahir = $this->request->getVar('tanggallahir');
                $gender = $this->request->getVar('gender');
                $alamat = $this->request->getVar('alamat');
                $noktp = $this->request->getVar('noktp');
                $uploadktp = $this->request->getFile('uploadktp');
                $notelp = $this->request->getVar('notelp');
                $email = $this->request->getVar('email');
                $foto = $this->request->getFile('photo');
                $keahlian = $this->request->getVar('keahlian');
                $tempatkerja = $this->request->getVar('tempatkerja');
                $alamatkerja = $this->request->getVar('alamatkerja');
                $telpkerja = $this->request->getVar('telpkerja');
                $emailkerja = $this->request->getVar('emailkerja');
                $bagidata = $this->request->getVar('bagidata');
                $scholar_id = $this->request->getVar('scholar_id');
                $scopus_id = $this->request->getVar('scopus_id');
                $orcid_id = $this->request->getVar('orcid_id');
                $sinta_id = $this->request->getVar('sinta_id');

                $ext = $uploadktp->getClientExtension();
                $uploadktpname = $user_id.'_ktp.'.$ext;
                $uploadktp->move('uploads/docs/',$uploadktpname,true);

                $ext1 = $foto->getClientExtension();
                $fotoname = $user_id.'_photopics.'.$ext1;
                $foto->move('uploads/pics/',$fotoname,true);

                $nama = array(
                    'namalengkap' => $namalengkap
                );
    
                $datadiri = array(
                    'user_id' => $user_id,
                    'tempatlahir' => $tempatlahir,
                    'tanggallahir' => $tanggallahir,
                    'gender' => $gender,
                    'alamat' => $alamat,
                    'noktp' => $noktp,
                    'uploadktp' => $uploadktpname,
                    'notelp' => $notelp,
                    'email' => $email,
                    'foto' => $fotoname,
                    'keahlian' => $keahlian,
                    'bagidata' => $bagidata,
                    'tempatkerja' => $tempatkerja,
                    'telpkerja' => $telpkerja,
                    'alamatkerja' => $alamatkerja,
                    'emailkerja' => $emailkerja,
                    'scholar_id' => $scholar_id,
                    'scopus_id' => $scopus_id,
                    'orcid_id' => $orcid_id,
                    'sinta_id' => $sinta_id,
                    'datecreated' => date('Y-m-d'),
                    'datemodified' => date('Y-m-d')
                );
    
                $model->update($user_id, $nama);
                $model1->save($datadiri);
                $session->setFlashdata('msg', 'Data Diri berhasil ditambah.');
    
                return redirect()->to('/anggota/profile');
            }else{
                $data['confirm'] = $session->get('confirm');
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['user_id'] = $user_id;
                $nama = $model->where('user_id', $user_id)->first();
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Buat Profile Anggota ICHI";
                $data['data_bread'] = "Buat Profile";
                $data['logged_in'] = $logged_in;
                $data['namalengkap'] = $nama['namalengkap'];
                $data['validation'] = $this->validator;
                return view('member/buatprofilevalid', $data);
            }
        }
    }

    public function ubahpass($id){
        $session = session();
        $logged_in = $session->get('logged_in');
        $data['confirm'] = $session->get('confirm');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['user_id'] = $id;
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Ubah Password";
        $data['data_bread'] = "Ubah Password";
        $data['logged_in'] = $logged_in;
        return view('member/ubahpass', $data);
    }

    public function ubahpassproses(){
        $session = session();
        $model = new UserModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');

        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/anggota/profile');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'oldpass' => [
                    'label'  => 'Password Lama',
                    'rules'  => 'required|min_length[6]',
                    'errors' => [
                        'required' => 'Field Password Lama harus diisi.',
                        'min_length' => 'Panjang password minimal 6 karakter.'
                    ],
                ],
                'newpass' => [
                    'label'  => 'Password Baru',
                    'rules'  => 'required|min_length[6]',
                    'errors' => [
                        'required' => 'Field Password Baru harus diisi.',
                        'min_length' => 'Panjang password minimal 6 karakter.'
                    ],
                ],
                'confpass' => [
                    'label'  => 'Konfirmasi Password Baru',
                    'rules'  => 'required|min_length[6]|matches[newpass]',
                    'errors' => [
                        'required' => "Field Password harus diisi.",
                        'min_length' => "Panjang password minimal 6 karakter.",
                        'matches' => "Konfirmasi Password tidak sama.",
                    ]
                ]
            ]);

            if ($formvalid){
                $oldpass = $this->request->getVar('oldpass');
                $newpass = $this->request->getVar('newpass');

                $data = $model->where('user_id', $user_id)->first();
                $verify_pass = password_verify($oldpass, $data['password']);
               if ($verify_pass){
                    $datapass=array(
                        'password' => password_hash($newpass, PASSWORD_DEFAULT)
                    );

                    $model->update($user_id, $datapass);
                    $session->setFlashdata('msg', 'Password berhasil diubah.');

                    return redirect()->to('/anggota/profile');
                }else{
                    $session->setFlashdata('passerror', 'Password lama tidak sesuai.');
                    return redirect()->to('/anggota/ubahpass/'.$user_id);
                }
            }else{
                $data['confirm'] = $session->get('confirm');
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $logged_in = $session->get('logged_in');
                $data['user_id'] = $user_id;
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Ubah Password";
                $data['data_bread'] = "Ubah Password";
                $data['logged_in'] = $logged_in;
                $data['validation'] = $this->validator;
                return view('member/ubahpass', $data);
            }
        }
    }

    public function ubahprofile($id){
        $session = session();
        $model = new UserModel();
        $model1 = new DiriModel();
        $nama = $model->where('user_id', $id)->first();
        $datadiri = $model1->where('user_id', $id)->first();

        $data = array(
            'diri_id' => $datadiri['diri_id'],
            'user_id' => $datadiri['user_id'],
            'tempatlahir' => $datadiri['tempatlahir'],
            'tanggallahir' => $datadiri['tanggallahir'],
            'gender' => $datadiri['gender'],
            'alamat' => $datadiri['alamat'],
            'noktp' => $datadiri['noktp'],
            'uploadktp' => $datadiri['uploadktp'],
            'notelp' => $datadiri['notelp'],
            'email' => $datadiri['email'],
            'foto' => $datadiri['foto'],
            'keahlian' => $datadiri['keahlian'],
            'bagidata' => $datadiri['bagidata'],
            'tempatkerja' => $datadiri['tempatkerja'],
            'alamatkerja' => $datadiri['alamatkerja'],
            'telpkerja' => $datadiri['telpkerja'],
            'emailkerja' => $datadiri['emailkerja'],
            'scholar_id' => $datadiri['scholar_id'],
            'scopus_id' => $datadiri['scopus_id'],
            'orcid_id' => $datadiri['orcid_id'],
            'sinta_id' => $datadiri['sinta_id']
        );

        $data['namalengkap'] = $nama['namalengkap'];

        $logged_in = $session->get('logged_in');
        $data['confirm'] = $session->get('confirm');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Ubah Data Profile";
        $data['data_bread'] = "Ubah Data Profile";
        $data['logged_in'] = $logged_in;
        return view('member/ubahprofile', $data);
    }

    public function ubahprofileproses(){
        $session = session();
        $model = new UserModel();
        $model1 = new DiriModel();
        $user_id = $session->get('user_id');
        $logged_in = $session->get('logged_in');

        $button=$this->request->getVar('submit');
        
        if ($button=="batal"){
            return redirect()->to('/anggota/profile');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'namalengkap' => [
                    'label'  => 'namalengkap',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nama Lengkap harus diisi.',
                    ],
                ],
                'tempatlahir' => [
                    'label'  => 'tempatlahir',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tempat Lahir harus diisi.',
                    ],
                ],
                'tanggallahir' => [
                    'label'  => 'tanggallahir',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tanggal Lahir harus diisi.',
                    ],
                ],
                'gender' => [
                    'label'  => 'gender',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Badan Kejuruan harus diisi.',
                    ],
                ],
                'alamat' => [
                    'label'  => 'alamat',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Alamat Rumah harus diisi.',
                    ],
                ],
                'noktp' => [
                    'label'  => 'noktp',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Nomor KTP harus diisi.',
                    ],
                ],
                'uploadktp' => [
                    'rules'  => 'ext_in[uploadktp,jpg,jpeg,png,pdf]|max_size[uploadktp, 2000]',
                    'errors' => [
                        'uploaded' => 'Field Upload Scan KTP tidak boleh kosong',
                        'ext_in' => "Hanya menerima file JPG, JPEG atau PNG",
                        'max_size' => "Ukuran File Maksimal 2MB"
                    ],
                ],
                'notelp' => [
                    'label'  => 'notelp',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Telepon (Nomor WhatsApp) harus diisi.',
                    ],
                ],
                'email' => [
                    'label'  => 'email',
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'Field Nomor Mobile harus diisi.',
                        'valid_email' => 'Field Email harus diisi dengan format yang benar.'
                    ],
                ],
                'photo' => [
                    'rules'  => 'ext_in[photo,jpg,jpeg,png]|max_size[photo, 2000]',
                    'errors' => [
                        'uploaded' => 'Field Foto tidak boleh kosong',
                        'ext_in' => "Hanya menerima file JPG, JPEG atau PNG",
                        'max_size' => "Ukuran File Maksimal 2MB"
                    ],
                ],
                'keahlian' => [
                    'label'  => 'Keahlian',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tempat Kerja harus diisi.',
                    ],
                ],
                'tempatkerja' => [
                    'label'  => 'Tempat Kerja',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Tempat Kerja harus diisi.',
                    ],
                ],
                'alamatkerja' => [
                    'label'  => 'alamatkerja',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Alamat Kantor harus diisi.',
                    ],
                ],
                'telpkerja' => [
                    'label'  => 'Telepon Kantor',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Telepon Kantor harus diisi.',
                    ],
                ],
                'emailkerja' => [
                    'label'  => 'Email Kantor',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Email Kantor harus diisi.',
                    ],
                ],
                'bagidata' => [
                    'label'  => 'bagidata',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Field Berbagi Profile harus diisi.',
                    ],
                ]
            ]);

            if ($formvalid){
                $user_id = $this->request->getVar('user_id');
                $diri_id = $this->request->getVar('diri_id');
                $olduploadktp = $this->request->getVar('uploadktp');
                $oldfoto = $this->request->getVar('foto');
                $namalengkap = $this->request->getVar('namalengkap');
                $tempatlahir = $this->request->getVar('tempatlahir');
                $tanggallahir = $this->request->getVar('tanggallahir');
                $gender = $this->request->getVar('gender');
                $alamat = $this->request->getVar('alamat');
                $noktp = $this->request->getVar('noktp');
                $uploadktp = $this->request->getFile('uploadktp');
                $notelp = $this->request->getVar('notelp');
                $email = $this->request->getVar('email');
                $foto = $this->request->getFile('photo');
                $keahlian = $this->request->getVar('keahlian');
                $tempatkerja = $this->request->getVar('tempatkerja');
                $alamatkerja = $this->request->getVar('alamatkerja');
                $telpkerja = $this->request->getVar('telpkerja');
                $emailkerja = $this->request->getVar('emailkerja');
                $bagidata = $this->request->getVar('bagidata');
                $scholar_id = $this->request->getVar('scholar_id');
                $scopus_id = $this->request->getVar('scopus_id');
                $orcid_id = $this->request->getVar('orcid_id');
                $sinta_id = $this->request->getVar('sinta_id');

                $ext = $uploadktp->getClientExtension();
                if ((empty($olduploadktp))&&(!empty($ext))){
                    $uploadktpname = $user_id.'_ktp.'.$ext;
                    $uploadktp->move('uploads/docs/',$uploadktpname,true);
                }elseif((!empty($olduploadktp))&&(!empty($ext))){
                    $oldext = substr($olduploadktp, -4);
                    if ($oldext == $ext){
                        $uploadktp->move('uploads/docs/',$olduploadktp,true);
                        $uploadktpname = $olduploadktp;
                    }else{
                        $uploadktpname = $user_id.'_ktp.'.$ext;
                        $uploadktp->move('uploads/docs/',$uploadktpname,true);
                    }
                }else{
                    $uploadktpname = $olduploadktp;
                }

                $ext1 = $uploadktp->getClientExtension();
                if ((empty($oldfoto))&&(!empty($ext1))){
                    $fotoname = $user_id.'_photopics.'.$ext1;
                    $foto->move('uploads/pics/',$fotoname,true);
                }elseif((!empty($oldfoto))&&(!empty($ext1))){
                    $oldext = substr($oldfoto, -4);
                    if ($oldext == $ext1){
                        $foto->move('uploads/docs/',$olduploadktp,true);
                        $fotoname = $oldfoto;
                    }else{
                        $fotoname = $user_id.'_photopics.'.$ext1;
                        $foto->move('uploads/pics/',$fotoname,true);
                    }
                }else{
                    $fotoname = $oldfoto;
                }

                $nama = array(
                    'namalengkap' => $namalengkap
                );
    
                $datadiri = array(
                    'tempatlahir' => $tempatlahir,
                    'tanggallahir' => $tanggallahir,
                    'gender' => $gender,
                    'alamat' => $alamat,
                    'noktp' => $noktp,
                    'uploadktp' => $uploadktpname,
                    'notelp' => $notelp,
                    'email' => $email,
                    'foto' => $fotoname,
                    'keahlian' => $keahlian,
                    'bagidata' => $bagidata,
                    'tempatkerja' => $tempatkerja,
                    'telpkerja' => $telpkerja,
                    'alamatkerja' => $alamatkerja,
                    'emailkerja' => $emailkerja,
                    'scholar_id' => $scholar_id,
                    'scopus_id' => $scopus_id,
                    'orcid_id' => $orcid_id,
                    'sinta_id' => $sinta_id,
                    'datemodified' => date('Y-m-d')
                );
    
                $model->update($user_id, $nama);
                $model1->update($diri_id, $datadiri);
                $session->setFlashdata('msg', 'Data Diri berhasil diubah.');
    
                return redirect()->to('/anggota/profile');
            }else{
                $nama = $model->where('user_id', $user_id)->first();
                $datadiri = $model1->where('user_id', $user_id)->first();
        
                $data = array(
                    'diri_id' => $datadiri['diri_id'],
                    'user_id' => $datadiri['user_id'],
                    'tempatlahir' => $datadiri['tempatlahir'],
                    'tanggallahir' => $datadiri['tanggallahir'],
                    'gender' => $datadiri['gender'],
                    'alamat' => $datadiri['alamat'],
                    'noktp' => $datadiri['noktp'],
                    'uploadktp' => $datadiri['uploadktp'],
                    'notelp' => $datadiri['notelp'],
                    'email' => $datadiri['email'],
                    'foto' => $datadiri['foto'],
                    'keahlian' => $datadiri['keahlian'],
                    'bagidata' => $datadiri['bagidata'],
                    'tempatkerja' => $datadiri['tempatkerja'],
                    'alamatkerja' => $datadiri['alamatkerja'],
                    'telpkerja' => $datadiri['telpkerja'],
                    'emailkerja' => $datadiri['emailkerja'],
                    'scholar_id' => $datadiri['scholar_id'],
                    'scopus_id' => $datadiri['scopus_id'],
                    'orcid_id' => $datadiri['orcid_id'],
                    'sinta_id' => $datadiri['sinta_id']
                );
        
                $data['namalengkap'] = $nama['namalengkap'];
        
                $data['confirm'] = $session->get('confirm');
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $logged_in = $session->get('logged_in');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Ubah Data Profile";
                $data['data_bread'] = "Ubah Data Profile";
                $data['logged_in'] = $logged_in;
                $data['validation'] = $this->validator;
                return view('member/ubahprofile', $data);
            }
        }
    }

    //Mengatur link konfirmasi
    public function konfirmasi(){
        $session = session();
        $logged_in = $session->get('logged_in');
        $user_id = $session->get('user_id');
        $confirm = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Konfirmasi Pendaftaran Anggota ICHI";
        $data['data_bread'] = "Konfirmasi";
        $data['logged_in'] = $logged_in;
        $data['user_id'] = $user_id;
        $data['confirm'] = $confirm;
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        return view('member/konfirmasi', $data);
    }

    public function konfirmproses(){
        $session = session();
        $model = new UserModel();
        $button = $this->request->getVar('submit');
        $user_id = $this->request->getVar('user_id');
        if ($button == "batal"){
            return redirect()->to('/anggota');
        }else{
            helper(['form', 'url']);

            $formvalid = $this->validate([
                'terms2' => [
                    'label'  => 'terms2',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Anda belum memberi centang pada opsi konfirmasi.',
                    ],
                ]
            ]);

            if ($formvalid){
                $terms2 = $this->request->getVar('terms2');
    
                $data = array(
                    'confirm' => $terms2,
                    'datemodified' => date('Y-m-d')
                );
                $model->update($user_id, $data);
                $session->set('confirm', 'ya');
                $session->setFlashdata('msg', 'Anda sudah mengkonfirmasi data pendaftaran. Selanjutnya akan diproses oleh admin.');
    
                return redirect()->to('/anggota');
            }else{
                $logged_in = $session->get('logged_in');
                $user_id = $session->get('user_id');
                $confirm = $session->get('confirm');
                $data['title'] = "Sistem Informasi Anggota ICHI";
                $data['page_title'] = "Konfirmasi Pendaftaran Anggota ICHI";
                $data['data_bread'] = "Konfirmasi";
                $data['logged_in'] = $logged_in;
                $data['user_id'] = $user_id;
                $data['confirm'] = $confirm;
                $data['role'] = $session->get('role');
                $data['tipe_user'] = $session->get('tipe_user');
                $data['validation'] = $this->validator;
                return view('member/konfirmasi', $data);
            }
        }
    }

    //Mengatur link ubah peran
    public function ubahrole(){
        $session = session();
        $logged_in = $session->get('logged_in');
        $user_id = $session->get('user_id');
        $confirm = $session->get('confirm');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Ubah Peran Anggota ICHI";
        $data['data_bread'] = "ubahperan";
        $data['logged_in'] = $logged_in;
        $data['user_id'] = $user_id;
        $data['confirm'] = $confirm;
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        return view('member/ubahperan', $data);
    }

    public function peranproses($peran){
        $session = session();
        if ($peran=="superadmin"){
            $session->set('role', $peran);
            return redirect()->to('/superadmin');
        } elseif ($peran=="admin"){
            $session->set('role', $peran);
            return redirect()->to('/admin');
        } elseif ($peran=="anggota"){
            $session->set('role', $peran);
            return redirect()->to('/anggota');
        } elseif ($peran=="calon"){
            $session->set('role', $peran);
            return redirect()->to('/anggota');
        }
    }
}