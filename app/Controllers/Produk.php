<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\ProdukModel;
use App\Models\Sub1Model;
use App\Models\Sub2Model;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Validation\Rules;

class Produk extends Controller
{
	public function index()
	{
        $produkmodel = new ProdukModel();
        $data = [
			'tm_produk' => $produkmodel->orderBy('id_produk', 'DESC')->findAll(),
			'title'     => 'Data Produk'
		];
		return view('/produk/produklist', $data);
	}

	public function tambahproduk() {
		$produkmodel = new ProdukModel();
		$data = [
			'tm_kategori'	=> $produkmodel->getKategori(),
			'title'			=> 'Tambah Produk',
		];
		return view('/produk/tambahproduk', $data);
	}

	// public function DynamicSub() {
	// 	$request = service('request');
	// 	$kategorimodel = new KategoriModel();
	// 	if($request->isAJAX()) {
	// 		$caridata = $request->getGet('search');
	// 		$datakategori = $kategorimodel->like('nama_kategori', $caridata)->get();

	// 		if($datakategori->getNumRows() > 0) {
	// 			$list = [];
	// 			$key = 0;
	// 			foreach($datakategori->getResultArray() as $row) :

	// 				$list[$key]['id'] = $row['id_kategori'];
	// 				$list[$key]['text'] = $row['nama_kategori'];

	// 			endforeach;

	// 			echo json_encode($list);
	// 		}
	// 	}
	// }

	// public function DynamicSub2() {
	// 	$request = service('request');
	// 	$Sub1Model = new Sub1Model();
	// 	if($request->isAJAX()) {
	// 		$id_kategori = $request->getVar('id_kategori');

	// 		$dataSubkategori1 = $Sub1Model->where('subkategori1_id_kategori', $id_kategori)->get();

	// 		$getdatasubkategori1 = "";

	// 		foreach($dataSubkategori1->getResultArray() as $row) :
	// 			$getdatasubkategori1 .= '<option value="' .$row['id_subkategori1']. '">' .$row['nama_subkategori1']. '</option>';

	// 		endforeach;

	// 		$msg = [
	// 			'data' => $getdatasubkategori1
	// 		];
	// 		echo json_encode($msg);
	// 	}
	// }

	// public function DynamicSub3() {
	// 	$request = service('request');
	// 	$Sub2Model = new Sub2Model();
	// 	if($request->isAJAX()) {
	// 		$id_subkategori1 = $request->getVar('id_subkategori1');

	// 		$dataSubkategori2 = $Sub2Model->where('subkategori2_id_subkategori1', $id_subkategori1)->get();

	// 		$getdatasubkategori2 = "";

	// 		foreach($dataSubkategori2->getResultArray() as $row) :
	// 			$getdatasubkategori2 .= '<option value="' .$row['id_subkategori2']. '">' .$row['nama_subkategori2']. '</option>';

	// 		endforeach;

	// 		$msg = [
	// 			'data' => $getdatasubkategori2
	// 		];
	// 		echo json_encode($msg);
	// 	}
	// }

	public function DynamicSub() {

		$request = service('request');
		$Sub1Model = new Sub1Model();
		$Sub2Model = new Sub2Model();
		// $csrfName = csrf_token();
		// $csrfHash = csrf_hash();

		if($request->getVar('DynamicSub'))
		{
			$DynamicSub = $request->getVar('DynamicSub');
			// header('Content-Type: application/json');
			if($DynamicSub == 'get_sub1')
			{
				$sub1data['token'] = csrf_hash(); 
				$sub1data = $Sub1Model->where('subkategori1_id_kategori',
				$request->getVar('subkategori1_id_kategori'))->findAll();
				echo json_encode($sub1data);
			}

			header('Content-Type: application/json');
			if($DynamicSub == 'get_sub2')
			{
				$sub2data['token'] = csrf_hash();
				$sub2data = $Sub2Model->where('subkategori2_id_subkategori1',
				$request->getVar('subkategori2_id_subkategori1'))->findAll();
                  
				echo json_encode($sub2data);
			}
		}

	}
}