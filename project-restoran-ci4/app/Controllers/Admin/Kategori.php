<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
	protected $kategoriModel;
	protected $validation;

	public function __construct()
	{
		// Instansiasi atau pembuatan objek model
		$this->kategoriModel = new KategoriModel();
		$this->validation = \Config\Services::validation();
	}

	// Menampilkan daftar kategori
	public function index()
	{
		$pager = \Config\Services::pager();
		
		// Konfigurasi Pagination
		$jmlDataPerHal = 2;
		$posHal = ( isset( $_GET["page_list"] ) ? $_GET["page_list"] : 1 );
		$awalData = ($jmlDataPerHal * $posHal) - $jmlDataPerHal;

		$data = 
		[
			'title' => 'Kategori',
			'kategori' => $this->kategoriModel->paginate($jmlDataPerHal, 'list'),
			'pager' => $this->kategoriModel->pager,
			'jmlDataPerHal' => $jmlDataPerHal,
			'posHal' => $posHal,
			'awalData' => $awalData
		];

		return view('kategori/select', $data);
	}

	// menampilkan form untuk menambahkan data
	public function create()
	{
		$data = [
			'title' => 'Insert',
			'validation' => $this->validation
		];

		return view('kategori/insert', $data);
	}

	// menambahkan data ke database
	public function insert()
	{
		$rules = [
			'kategori' => 'required|alpha_space|is_unique[kategori.kategori]|min_length[3]'
		];

		if ( !$this->validate($rules) )
		{	
			session()->setFlashdata( 'errorInfo', $this->validation->getError() );
			return redirect()->to(base_url('admin/kategori/create'));
		}
		else
		{
			$this->kategoriModel->insert($_POST);
			return redirect()->to(base_url('/admin/kategori'));
		}
	}

	// menampilkan form untuk memperbarui data
	public function update($id = null)
	{
		$data = 
		[
			'title' => 'Update',
			'kategori' => $this->kategoriModel->find($id),
			'validation' => $this->validation,
		];

		return view('kategori/update', $data);
	}

	// memperbarui data dari database
	public function save()
	{	
		$rules = [
			'kategori' => 'required|alpha_space|min_length[3]'
		];

		$idkategori = $_POST["idkategori"];

		if ( !$this->validate($rules) )
		{
			session()->setFlashdata( 'errorInfo', $this->validation->getError() );
			return redirect()->to(base_url("admin/kategori/update/$idkategori"));
		}
		else
		{
			$this->kategoriModel->save($_POST);
			return redirect()->to(base_url('/admin/kategori'));
		}
	}

	// menghapus data dari database
	public function delete($id = null)
	{
		$this->kategoriModel->delete($id);
		return redirect()->to(base_url('/admin/kategori'));
	}

	//--------------------------------------------------------------------
}