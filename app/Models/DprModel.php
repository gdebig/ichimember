<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Orgmodel extends Model{
    protected $table = 'tbl_dpr';
    protected $primaryKey = 'dpr_id';
    protected $allowedFields = ['dpr_id', 'dpr_nama', 'dpr_tingkat', 'datecreated', 'datemodified'];
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    
    protected $useTimestamps = false;
    protected $createdField  = 'datecreated';
    protected $updatedField  = 'datemodified';
}