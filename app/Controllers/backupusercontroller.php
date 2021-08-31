<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
	public function index()
	{
		$usermodel = new UserModel();
        $data['user_sa'] = $usermodel->findAll();
        return view('user/list', $data);
	}

    public function create()
    {
        return view('user/create');
    }

    public function store()
    {
        $request = service('request');
        $postData = $request->getPost();

        if(isset($postData['submit'])){
            //validation
            $input = $this->validate([
                'user_name' => 'required|min_length[5]',
                'email'     => 'required'
            ]);

            if(!$input){
                return  redirect()
                        ->route('user/create')
                        ->withInput()
                        ->with('validation', $this->validator);
            } else{
                $usermodel = new UserModel();
                $data = [
                    'user_name' => $postData['user_name'],
                    'email'     => $postData['email']
                ];
                //inserting the data
                if($usermodel->insert($data)){
                    session()->setFlashdata('message', 'Berhasil ditambahkan');
                    session()->setFlashdata('alert-class', 'alert-success');

                    return  redirect()
                            ->route('user/create')
                            ->withInput();
                }
            }
        }
    }

    public function edit($user_id = 0)
    {
        //selecting the record by user_id
        $usermodel = new UserModel();
        $userSearchId =  $usermodel->find($user_id);

        $data['userSearchId'] = $userSearchId;
        return view('user/edit', $data);
    }

    public function update($user_id = 0)
    {
        $request = service('request');
        $postData = $request->getPost();

        //validation
        $input = $this->validate([
            'user_name' => 'required|min_length[3]',
            'email'     => 'required'
        ]);

        if(!$input){
            return redirect()
                    ->route('user/edit/'.$user_id)
                    ->withInput()
                    ->with('validation', $this->validator);
        } else{
            $usermodel = new UserModel();
            $data = [
                'user_name' => $postData['user_name'],
                'email'     => $postData['email']
            ];

            //update record
            if($usermodel->update($user_id, $data)){
                session()->setFlashdata('message', 'Data berhasil diupdate');
                session()->setFlashdata('alert-class', 'alert-success');
                return redirect()->route('user/list');
            } else {
                session()->setFlashdata('message', 'Data gagal diupdate');
                session()->setFlashdata('alert-class', 'alert-danger');

                return redirect()
                        ->route('user/edit/'.$user_id)
                        ->withInput();
            }
        }
    }

    public function delete($user_id = 0) 
    {
        $usermodel = new UserModel();

        //check record
        if($usermodel->find($user_id)){
            //delete record
            $usermodel->delete($user_id);

                session()->setFlashdata('message', 'Data berhasil dihapus');
                session()->setFlashdata('alert-class', 'alert-success');
            } else {
                session()->setFlashdata('message', 'Data gagal dihapus');
                session()->setFlashdata('alert-class', 'alert-danger');
        }
        return redirect()->route('user/list');
    }
}
