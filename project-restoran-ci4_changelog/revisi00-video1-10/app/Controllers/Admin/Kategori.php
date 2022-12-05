<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
	protected $kategoriModel;

	public function __construct()
	{
		// Instansiasi atau pembuatan objek model
		$this->kategoriModel = new KategoriModel();
	}

	public function index()
	{
		$data = 
		[
			'title' => 'Restoran',
			'kategori' => $this->kategoriModel->findAll()
		];

		// dd($data["kategori"]);

		return view('kategori/index', $data);
	}

	public function create()
	{
		$data = 
		[
			'title' => 'Insert | Restoran'
		];

		return view('kategori/create', $data);
	}

	public function save()
	{
		#----------------------------------
		# Metode Pertama
		#----------------------------------

		// dd($this->request->getVar());

		// $this->kategoriModel->save([
		// 	'kategori' => $this->request->getVar('kategori'),
		// 	'keterangan' => $this->request->getVar('keterangan')
		// ]);

		#----------------------------------
		# Metode Kedua
		#----------------------------------

		// dd($_POST);

		$this->kategoriModel->insert($_POST);

		return redirect()->to(base_url('admin/kategori'));
	}

	public function update($id = null)
	{
		$data = 
		[
			'title' => 'Update | Restoran'
		];

		return view('kategori/update', $data);
	}

	public function delete($id = null)
	{
		echo "<h1>Delete Data ID-$id</h1>";
	}

	//--------------------------------------------------------------------

}