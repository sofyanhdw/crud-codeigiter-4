<?php 

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
    protected $table         = 'user_sa';
    protected $primaryKey    = 'user_id';
    protected $allowedFields = ['user_name', 'email', 'user_password', 'role_id'];
    protected $validationRules = [];
    protected $valdationMessages = [];
    protected $skipValidation = [];


    public function getRole(){
        $builder = $this->db->table('role_akses');
        return $builder->get()->getResultArray();
    }

    public function getJoinUser(){
        $builder = $this->db->table('user_sa');
        $builder->select('*');
        $builder->join('role_akses', 'role_akses.role_id = user_sa.role_id', 'left');
        $builder->orderBy('user_sa.user_id', 'DESC');
        return $builder->get()->getResultArray();
    }
}
