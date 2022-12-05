<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Menu extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		echo "<h1>Menu</h1>";
	}

	public function select()
	{
		echo "<h1>Display Data</h1>";
	}

	public function update($id = null, $nama = null)
	{
		echo "<h1>Update Data</h1>";
		echo "ID : $id <br>";
		echo "Nama = $nama <br>";
	}

	//--------------------------------------------------------------------

}
