<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Orgmodel extends Model{
    protected $table = 'tbl_organisasi';
    protected $primaryKey = 'org_id';
    protected $allowedFields = ['org_id', 'user_id', 'namaorganisasi', 'jabatan', 'thnawal', 'thnakhir', 'datecreated', 'datemodified'];
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    
    protected $useTimestamps = false;
    protected $createdField  = 'datecreated';
    protected $updatedField  = 'datemodified';
}