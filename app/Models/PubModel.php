<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Pubmodel extends Model{
    protected $table = 'tbl_publikasi';
    protected $primaryKey = 'pub_id';
    protected $allowedFields = ['pub_id', 'user_id', 'tipepublikasi', 'judul', 'mediapublikasi', 'tahun', 'linkpub', 'datecreated', 'datemodified'];
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    
    protected $useTimestamps = false;
    protected $createdField  = 'datecreated';
    protected $updatedField  = 'datemodified';
}