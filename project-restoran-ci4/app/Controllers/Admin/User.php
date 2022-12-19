<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
	protected $userModel;
	protected $validation;

	public function __construct()
	{
		$this->userModel = new UserModel();
		$this->validation = \Config\Services::validation();
	}

	public function index()
	{
		$pager = \Config\Services::pager();

		// Konfigurasi Pagination
		$jmlDataPerHal = 2;
		$posHal = ( isset( $_GET["page_list"] ) ? $_GET["page_list"] : 1 );
		$awalData = ($jmlDataPerHal * $posHal) - $jmlDataPerHal;

		$data = [
			'title' => 'User',
			'user' => $this->userModel->paginate($jmlDataPerHal, 'list'),
			'pager' => $this->userModel->pager,
			'jmlDataPerHal' => $jmlDataPerHal,
			'posHal' => $posHal,
			'awalData' => $awalData
		];

		return view('user/select', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Insert',
			'posisi' => ['admin', 'koki', 'kasir'],
			'validation' => $this->validation,
		];

		return view('user/insert', $data);
	}

	public function insert()
	{
		$rules = [
			'user' => 'required|alpha_numeric_space|is_unique[user.user]|min_length[3]',
			'email' => 'required|valid_email',
			'password' => 'required|min_length[8]',
		];

		if( !($this->validate($rules)) )
		{
			session()->setFlashdata( 'errorInfo', $this->validation->getErrors() );
			return redirect()->to(base_url('admin/user/create'));
		}
		else
		{
			$user = strtolower($this->request->getPost('user'));
			$email = $this->request->getPost('email');
			$posisi = $this->request->getPost('posisi');
			$password = $this->request->getPost('password');

			// Enkripsi Password
			$password = password_hash($password, PASSWORD_DEFAULT);

			$data = [
				'user' => $user,
				'email' => $email,
				'posisi' => $posisi,
				'password' => $password,
			];

			$this->userModel->save($data);
			return redirect()->to(base_url('/admin/user'));
		}
	}

	public function update_status($id = null, $status = null)
	{
		$data = [
			'iduser' => $id,
			'status' => ($status == 1)? 0 : 1
		];
		
		$this->userModel->save($data);
		return redirect()->to(base_url('/admin/user'));
	}

	public function update($id = null)
	{
		$data = [
			'title' => 'Update',
			'user' => $this->userModel->find($id),
			'posisi' => ['admin', 'koki', 'kasir'],
			'validation' => $this->validation,
		];

		return view('user/update', $data);
	}

	public function save()
	{
		$rules = [
			'user' => 'required|alpha_numeric_space|min_length[3]',
			'email' => 'required|valid_email',
		];

		$iduser = $this->request->getPost('iduser');

		if( !($this->validate($rules)) )
		{
			session()->setFlashdata( 'errorInfo', $this->validation->getErrors() );
			return redirect()->to(base_url('/admin/user/update/' . $iduser));
		}
		else
		{
			$user = strtolower($this->request->getPost('user'));
			$email = $this->request->getPost('email');
			$posisi = $this->request->getPost('posisi');

			$data = [
				'iduser' => $iduser,
				'user' => $user,
				'email' => $email,
				'posisi' => $posisi,
			];

			$this->userModel->save($data);
			return redirect()->to(base_url('admin/user'));
		}	
	}

	public function delete($id = null)
	{
		$this->userModel->delete($id);
		return redirect()->to(base_url('/admin/user'));
	}

	//--------------------------------------------------------------------
}
