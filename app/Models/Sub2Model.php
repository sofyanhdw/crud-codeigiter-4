<?php 

namespace App\Models;
use CodeIgniter\Model;

class Sub2Model extends Model{
    protected $table         = 'tm_subkategori2';
    protected $primaryKey    = 'id_subkategori2';
    protected $allowedFields = ['nama_subkategori2', 'subkategori2_id_subkategori1'];
    protected $validationRules = [];
    protected $valdationMessages = [];
    protected $skipValidation = [];

}