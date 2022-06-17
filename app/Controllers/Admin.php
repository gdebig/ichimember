<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DiriModel;
use App\Models\KerjaModel;
use App\Models\OrgModel;
use App\Models\PendModel;
use App\Models\PengModel;
use App\Models\PubModel;

class Admin extends BaseController
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
        $data['issadmin'] = $session->get('issadmin');
        $data['isadmin'] = $session->get('isadmin');
        $data['isanggota'] = $session->get('isanggota');
        $data['iscalon'] = $session->get('iscalon');
        
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Dashboard Admin ICHI";
        $data['data_bread'] = "Admin";
        $data['logged_in'] = $logged_in;
        return view('member/admindash', $data);
    }
}