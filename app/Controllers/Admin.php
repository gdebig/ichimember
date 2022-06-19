<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DiriModel;
use App\Models\KerjaModel;
use App\Models\DprModel;
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
        $dpr_id = $session->get('dpr_id');

        $model = new UserModel();
        $data['user_count'] = $model->where('softdelete','Tidak')->where('dpr_id',$dpr_id)->countAllResults();
        $where = "datecreated >= DATE_SUB(now(), INTERVAL 3 MONTH)";
        $data['last3months'] = $model->where($where)->where('softdelete','Tidak')->where('dpr_id',$dpr_id)->countAllResults();

        $model1 = new DprModel();
        $data['dpr_count'] = $model1->countAll();
        $where1 = "datediff(NOW(), tbl_dpr.expired)>=-180";
        $dpr = $model1->where($where1)->orderby('expired', 'ASC')->findAll();
        if (!empty($dpr)){
            $data['info_dpr'] = $dpr;
        }else{
            $data['info_dpr'] = 'kosong';
        }

        $data['user_id'] = $session->get('user_id');
        $data['role'] = $session->get('role');
        $data['tipe_user'] = $session->get('tipe_user');
        $data['title'] = "Sistem Informasi Anggota ICHI";
        $data['page_title'] = "Dashboard Admin ICHI";
        $data['data_bread'] = "Admin";
        $data['logged_in'] = $logged_in;
        return view('member/admindash', $data);
    }
}