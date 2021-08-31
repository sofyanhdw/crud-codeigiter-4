<?php 

namespace App\Models;
use CodeIgniter\Model;

class KategoriModel extends Model{
    protected $table         = 'tm_kategori';
    protected $primaryKey    = 'id_kategori';
    protected $allowedFields = ['nama_kategori'];
    protected $validationRules = [];
    protected $valdationMessages = [];
    protected $skipValidation = [];

}