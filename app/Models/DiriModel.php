<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Dirimodel extends Model{
    protected $table = 'tbl_datadiri';
    protected $primaryKey = 'diri_id';
    protected $allowedFields = ['diri_id', 'user_id', 'tempatlahir', 'tanggallahir', 'gender', 'alamat', 'noktp', 'uploadktp', 'notelp', 'email', 'foto', 'keahlian', 'bagidata', 'tempatkerja', 'alamatkerja', 'telpkerja', 'emailkerja', 'scholar_id', 'scopus_id', 'orcid_id', 'sinta_id', 'datecreated', 'datemodified'];
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    
    protected $useTimestamps = false;
    protected $createdField  = 'datecreated';
    protected $updatedField  = 'datemodified';
}