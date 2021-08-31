<?php 

namespace App\Models;
use CodeIgniter\Model;

class ProdukModel extends Model{
    protected $table         = 'tm_produk';
    protected $primaryKey    = 'id_produk';
    protected $allowedFields = [
                                'nama_produk', 
                                'deskripsi', 
                                'harga', 
                                'sku', 
                                'berat', 
                                'jumlah_stok', 
                                'tgl_publish',
                                'produk_id_foto', 
                                'produk_id_kategori',
                                'produk_id_subkategori1',
                                'produk_id_subkategori2'
                                ];
    protected $validationRules = [];
    protected $valdationMessages = [];
    protected $skipValidation = [];


    public function getKategori(){
        $builder = $this->db->table('tm_kategori');
        $builder->orderBy('nama_kategori', 'ASC');
        return $builder->get()->getResultArray();
    }

    public function getKategoridanSub(){
        $builder = $this->db->table('tm_produk');
        $builder->select('*');
        $builder->join('tm_kategori', 'tm_kategori.id_kategori = tm_produk.produk_id_kategori', 'left');
        $builder->join('tm_subkategori1', 'tm_subkategori1.id_subkategori1 = tm_produk.produk_id_subkategori1', 'left');
        $builder->join('tm_subkategori2', 'tm_subkategori2.id_subkategori2 = tm_produk.produk_id_subkategori2', 'left');
        $builder->orderBy('tm_produk.id_produk', 'DESC');
        return $builder->get()->getResultArray();
    }
}