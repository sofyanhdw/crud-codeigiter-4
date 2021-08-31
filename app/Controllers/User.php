<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Validation\Rules;

class User extends Controller
{
	public function index()
	{
        $usermodel = new UserModel();
		//$userdesc = $usermodel->orderBy('user_id', 'DESC'); 
        $data = [
			'user_sa' 	=> $usermodel->getJoinUser(),
			'title'		=> 'Data User'
		];
		return view('/user/userlist', $data);
	}

	public function notfound(){
		$data = [
			'title'	=> '404 not found'
		];
		return view('notfound', $data);
	}

	public function tambahuser() {

		session();
		$usermodel = new UserModel();
		$data = [
			'title'			=> 'Tambah User',
			'validation'	=> \Config\Services::validation(),
			'role_akses'	=> $usermodel->getRole(),
			'role_id'		=> $usermodel->getJoinUser()
		];
			
		return view('/user/tambahuser', $data);
	}

	public function add() 
	{
		$request = service('request');
		$inputPost = $request->getPost();

		//validasi input data
		if(!$this->validate([
			'user_name' => [
				'rules' => 'required|is_unique[user_sa.user_name]|min_length[6]|max_length[27]',
				'errors' => [
					'required' 		=> 'username harus diisi',
					'is_unique' 	=> 'username sudah terdaftar',
					'min_length'	=> 'minimal panjang username 6 karakter',
					'max_length'	=> 'maksimal panjang username 27 karakter'
					]
			],
			'email' => [
				'rules' => 'required|valid_email|min_length[6]|is_unique[user_sa.email]|max_length[92]',
				'errors' => [
					'required'		=> '{field} harus diisi',
					'valid_email'	=> '{field} tidak benar',
					'is_unique'		=> '{field} sudah terdaftar',
					'min_length'	=> 'panjang {field} minimal 6 karakter',
					'max_length'	=> 'panjang {field} maksimal 92 karakter'
				] 	
			],
			'user_password' =>[
				'rules' => 'required|min_length[10]|max_length[99]', 
				'errors' => [
					'required'		=> 'password harus diisi',
					'min_length'	=> 'panjang password harus lebih dari 10 karakter',
					'max_length'	=> 'panjang password maksimak 99 karakter'
				]
			],
			'validpassword' => [
				'rules' => 'required|matches[user_password]',
				'errors' =>[
					'required'	=> 'harus diisi',
					'matches'	=> 'password harus sama'
					]
				],
				'role_id' => [
					'rules'	=> 'required',
					'errors' => [
						'required'	=> 'role harus dipilih'
					]
				]
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/user/tambahuser')
				->withInput()
				->with('validation', $validation);
		}


		$usermodel = new UserModel();
		$data = [
			'user_name'		=> $inputPost['user_name'],
			'email'			=> $inputPost['email'],
			'user_password'	=> password_hash($inputPost['user_password'], PASSWORD_BCRYPT),
			'role_id'		=> $inputPost['role_id']
		];
		//insert data
		$berhasil = $usermodel->insert($data);
		if($berhasil){
			session()->setFlashdata('message', 'user berhasil ditambahkan');
			session()->setFlashdata('notification', 'is-primary is-light');

			return redirect()->to('user');
		}
	}

	public function delete($user_id = 0){
		$usermodel = new UserModel();
		$berhasil = $usermodel->delete($user_id);
		if($berhasil){
			session()->setFlashdata('message', 'Data Berhasil Dihapus');
			session()->setFlashdata('notification', 'is-primary is-light');
			return redirect()->to('user');
		}
	}

	//edit data
	public function edituser($user_id = 0) {
		session();

		$usermodel = new UserModel();
		$dataid = $usermodel->find($user_id);
		$data = [
			'title'			=> 'Edit data user',
			'dataid'		=> $dataid,
			'role_akses'	=> $usermodel->getRole(),
			'role_id'		=> $usermodel->getJoinUser()
		];
		return view('user/edituser', $data);
	}

	public function ubah($user_id = 0){
		$request = service('request');
		$inputPost = $request->getPost();
		$varuserid = $request->getVar('user_id');
		$usermodel = new UserModel();
		
		if(!$this->validate([
			'user_name' => [
				'rules' => 'required|is_unique[user_sa.user_name,user_id,{user_id}]|min_length[6]|max_length[27]',
				'errors' => [
					'required' 		=> 'username harus diisi',
					'is_unique' 	=> 'username sudah terdaftar',
					'min_length'	=> 'minimal panjang username 6 karakter',
					'max_length'	=> 'maksimal panjang username 27 karakter'
					]
			],
			'email' => [
				'rules' => 'required|valid_email|min_length[6]|is_unique[user_sa.email,user_id,{user_id}]|max_length[92]',
				'errors' => [
					'required'		=> '{field} harus diisi',
					'valid_email'	=> '{field} tidak benar',
					'is_unique'		=> '{field} sudah terdaftar',
					'min_length'	=> 'panjang {field} minimal 6 karakter',
					'max_length'	=> 'panjang {field} maksimal 92 karakter'
				] 	
			],
				'role_id' => [
					'rules'	=> 'required',
					'errors' => [
						'required'	=> 'role harus dipilih'
					]
				]
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/user/edituser/' . $varuserid)
				->withInput()
				->with('validation', $validation);
		}

		$data = [
			'user_name'		=> $inputPost['user_name'],
			'email'			=> $inputPost['email'],
			'role_id'		=> $inputPost['role_id']
			
		];
		//update data
		if($usermodel->update($user_id, $data)){
			session()->setFlashdata('message', 'data user berhasil diubah');
			session()->setFlashdata('notification', 'is-primary is-light');

			return redirect()->to('user');
		}
	}

	//ubah password
	public function ubahpassword($user_id = 0) {
		session();

		$usermodel = new UserModel();
		$dataid = $usermodel->find($user_id);
		$data = [
			'title'		=> 'Edit data user',
			'dataid'	=> $dataid
		];
		return view('user/ubahpassword', $data);
	}

	public function ubahpasswd($user_id = 0){
		$request = service('request');
		$inputPost = $request->getPost();
		$varuserid = $request->getVar('user_id');
		$usermodel = new UserModel();
		
		if(!$this->validate([
			'user_password' =>[
				'rules' => 'required|min_length[10]|max_length[99]', 
				'errors' => [
					'required'		=> 'password harus diisi',
					'min_length'	=> 'panjang password harus lebih dari 10 karakter',
					'max_length'	=> 'panjang password maksimak 99 karakter'
				]
			],
			'validpassword' => [
				'rules' => 'required|matches[user_password]',
				'errors' =>[
					'required'	=> 'harus diisi',
					'matches'	=> 'password harus sama'
					]
			]
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/user/ubahpassword/' . $varuserid)
				->withInput()
				->with('validation', $validation);
		}

		$data = [
			'user_password'		=> password_hash($inputPost['user_password'], PASSWORD_BCRYPT)
			
		];
		//update data
		if($usermodel->update($user_id, $data)){
			session()->setFlashdata('message', 'password berhasil diubah');
			session()->setFlashdata('notification', 'is-primary is-light');

			return redirect()->to('user');
		}		
	}
}

