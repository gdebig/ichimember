<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Orgmodel extends Model{
    protected $table = 'tbl_pendidikan';
    protected $primaryKey = 'pend_id';
    protected $allowedFields = ['pend_id', 'user_id', 'jenjang', 'namauniv', 'fakultas', 'jurusan', 'thnmasuk', 'thnlulus', 'datecreated', 'datemodified'];
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    
    protected $useTimestamps = false;
    protected $createdField  = 'datecreated';
    protected $updatedField  = 'datemodified';
}