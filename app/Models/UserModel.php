<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Usermodel extends Model{
    protected $table = 'tbl_user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_id', 'kodeanggota', 'username', 'namalengkap', 'password', 'status', 'type', 'kehormatan', 'confirm', 'softdelete', 'datecreated', 'datemodified'];
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    
    protected $useTimestamps = false;
    protected $createdField  = 'datecreated';
    protected $updatedField  = 'datemodified';
}