<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
USE App\Models\UserModel;

class AdminPage extends BaseController
{
	public function index()
	{
		switch( session()->get('posisi') )
		{
			case 'admin':
				return redirect()->to(base_url('/admin/kategori'));
			
			case 'koki':
				return redirect()->to(base_url('/admin/menu'));
			
			case 'kasir':
				return redirect()->to(base_url('/admin/pesanan'));
		}
	}

	public function login()
	{	
		// variable ini akan digunakan untuk ekspresi pengkondisian yang nantinya akan memunculkan atau tidak sebuah alert pada halaman login
		$loginError = 0;	// inisialisasi variable $loginError dengan 0

		// mengecek apakah tombol login sudah ditekan atau belum
		if( $this->request->getPost() )
		{
			// mengambil data dari form
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');

			$userModel = new UserModel();
			
			// mengambil data dari baris/record table user berdasarkan email yang sesuai
			$user = $userModel->where(['email' => $email])->first();
			
			// cek apakah record dengan email yang diinputkan oleh user ada pada database
			if( empty($user) )
			{
				// jika record dengan email yang diinputkan oleh user tidak ditemukan dan password tidak sesuai, maka timpa nilai vairiable $loginError dengan 1;
				$loginError = 1;
			}
			else
			{
				// jika $user tidak bernilai null, maka cek kesesuaian password yang diinputkan oleh user dengan data password pada record
				if( password_verify($password, $user["password"]) )
				{
					// jika password sesuai, buat array assosiative untuk session
					$data = [
						'loginStatus' => true,
						'user' => $user['user'],
						'email' => $user['email'],
						'posisi' => $user['posisi'],
					];
					
					session()->set($data);	// membuat session dari array $data
					return redirect()->to(base_url('/admin/'));	// redirect ke halaman lain

					// proses login selesai
				}
			}
		}

		$data = 
		[
			'title' => 'Login',
			'loginError' => $loginError
		];

		return view('layout/login', $data);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('/admin/adminpage/login/'));
	}

	//--------------------------------------------------------------------
}
