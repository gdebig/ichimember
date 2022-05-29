<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Orgmodel extends Model{
    protected $table = 'tbl_datadiri';
    protected $primaryKey = 'diri_id';
    protected $allowedFields = ['diri_id', 'user_id', 'dpr_id', 'tempatlahir', 'tanggallahir', 'gender', 'alamat', 'noktp', 'uploadktp', 'notelp', 'email', 'foto', 'keahlian', 'datecreated', 'datemodified'];
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    
    protected $useTimestamps = false;
    protected $createdField  = 'datecreated';
    protected $updatedField  = 'datemodified';
}