<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Orgmodel extends Model{
    protected $table = 'tbl_pengurus';
    protected $primaryKey = 'peng_id';
    protected $allowedFields = ['peng_id', 'user_id', 'dpr_id', 'tingkat', 'jabatan', 'tahunawal', 'tahunakhir', 'jobdesc', 'datecreated', 'datemodified'];
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    
    protected $useTimestamps = false;
    protected $createdField  = 'datecreated';
    protected $updatedField  = 'datemodified';
}