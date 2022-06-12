<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Kerjamodel extends Model{
    protected $table = 'tbl_pekerjaan';
    protected $primaryKey = 'kerja_id';
    protected $allowedFields = ['kerja_id', 'user_id', 'namainstansi', 'jabatan', 'thnawal', 'thnakhir', 'datecreated', 'datemodified'];
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    
    protected $useTimestamps = false;
    protected $createdField  = 'datecreated';
    protected $updatedField  = 'datemodified';
}