<?php 

namespace App\Models;
use CodeIgniter\Model;

class Sub1Model extends Model{
    protected $table         = 'tm_subkategori1';
    protected $primaryKey    = 'id_subkategori1';
    protected $allowedFields = ['nama_subkategori1', 'subkategori1_id_kategori'];
    protected $validationRules = [];
    protected $valdationMessages = [];
    protected $skipValidation = [];

}