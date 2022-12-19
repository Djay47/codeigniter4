<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
	public function before(RequestInterface $request)
	{
		// cek apakah session()->get('loginStatus') telah dibuat atau belum dengan kata lain user sudah login atau belum
		if( empty(session()->get('loginStatus')) )
		{
			return redirect()->to(base_url('/admin/adminpage/login'));	// redirect kehalaman login
		}
	}

	//-----------------------------------------------------------------------------

	public function after(RequestInterface $request, ResponseInterface $response)
	{
		// Do something here
	}
}