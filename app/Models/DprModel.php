<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Dprmodel extends Model{
    protected $table = 'tbl_dpr';
    protected $primaryKey = 'dpr_id';
    protected $allowedFields = ['dpr_id', 'kodedpr', 'dpr_nama', 'dpr_tingkat', 'nosk', 'file_sk', 'expired', 'alamat', 'email', 'notelp', 'datecreated', 'datemodified'];
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    
    protected $useTimestamps = false;
    protected $createdField  = 'datecreated';
    protected $updatedField  = 'datemodified';
}