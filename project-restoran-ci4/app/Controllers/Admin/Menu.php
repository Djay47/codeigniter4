<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use App\Models\MenuModel;

class Menu extends BaseController
{
	protected $kategoriModel;
	protected $menuModel;
	protected $pager;
	protected $validation;

	public function __construct()
	{
		$this->kategoriModel = new KategoriModel();
		$this->menuModel = new MenuModel();
		$this->pager = \Config\Services::pager();
		$this->validation = \Config\Services::validation();
	}

	public function index()
	{
		// Konfigurasi Pagination
		$jmlDataPerHal = 2;
		$posHal = ( isset( $_GET["page_list"] ) ? $_GET["page_list"] : 1 );
		$awalData = ($jmlDataPerHal * $posHal) - $jmlDataPerHal;

		$data =
		[
			'title' => 'Menu',
			'menu' => $this->menuModel->paginate($jmlDataPerHal, 'list'),
			'pager' => $this->menuModel->pager,
			'jmlDataPerHal' => $jmlDataPerHal,
			'posHal' => $posHal,
			'awalData' => $awalData
		];

		return view('menu/select', $data);
	}

	public function select()
	{
		$idkategori = ( isset($_GET['idkategori']) ) ? $_GET['idkategori'] : 0;
		
		// Konfigurasi Pagination
		$jmlData = count( $this->menuModel->where( 'idkategori', $idkategori )->findAll() );
		$jmlDataPerHal = 1;
		$posHal = ( isset( $_GET["page"] ) ? $_GET["page"] : 1 );
		$awalData = ($jmlDataPerHal * $posHal) - $jmlDataPerHal;

		$data = [
			'title' => 'Menu',
			'idkategori' => $idkategori,
			'menu' => $this->menuModel->where('idkategori', $idkategori)->findAll($jmlDataPerHal, $awalData),
			'pager' => $this->pager,
			'jmlData' => $jmlData,
			'jmlDataPerHal' => $jmlDataPerHal,
			'posHal' => $posHal,
			'awalData' => $awalData
		];

		return view('menu/menu_select', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Insert',
			'kategori' => $this->kategoriModel->findAll(),
			'validation' => $this->validation,
		];

		return view('menu/insert', $data);
	}

	public function insert()
	{
		$request = $this->request->getPost();
		$file = $this->request->getFile('gambar');
		$fileName = $file->getName();
		
		$data = [
			'idkategori' => $request["idkategori"],
			'menu' => $request["menu"],
			'harga' => $request["harga"],
			'gambar' => $fileName,
		];

		$rules = [
			'menu' => 'required|alpha_space|is_unique[menu.menu]|min_length[3]',
			'harga' => 'required|numeric',
			'gambar' => 'is_image[gambar]',
		];

		if( !$this->validate($rules) )
		{
			session()->setFlashdata( 'errorInfo', $this->validation->getErrors() );
			return redirect()->to(base_url('admin/menu/create'));
		}
		else
		{
			$file->move('image/upload');
			$this->menuModel->save($data);
			return redirect()->to(base_url('/admin/menu'));
		}
	}

	public function update($id = null)
	{
		$data = [
			'title' => 'Update',
			'menu' => $this->menuModel->find($id),
			'validation' => $this->validation,
		];

		return view('menu/update', $data);
	}

	public function save()
	{
		$file = $this->request->getFile('gambar');
		$error = $file->getError();

		// error = 4 artinya tidak ada file yang diupload
		if( $error == 4 )
		{
			$fileName = $this->request->getPost('gambar');
		}
		else
		{
			$fileName = $file->getName();
			$file->move('image/upload');
		}

		$data = [
			'idmenu' => $this->request->getPost('idmenu'),
			'menu' => $this->request->getPost('menu'),
			'harga' => $this->request->getPost('harga'),
			'gambar' => $fileName,
		];

		$rules = [
			'menu' => 'required|alpha_space|min_length[3]',
			'harga' => 'required|numeric',
			'gambar' => 'is_image[gambar]',
		];

		$idmenu = $data["idmenu"];

		if ( !$this->validate($rules) )
		{
			session()->setFlashdata( 'errorInfo', $this->validation->getErrors() );
			return redirect()->to(base_url("admin/menu/update/$idmenu"));
		}
		else
		{
			$this->menuModel->save($data);
			return redirect()->to(base_url('/admin/menu'));
		}	
	}

	public function delete($id = null)
	{
		$this->menuModel->delete($id);
		return redirect()->to(base_url('admin/menu'));
	}

	public function form_upload()
	{
		$data =
		[
			'title' => 'Upload Gambar'
		];

		return view('menu/form_upload', $data);
	}

	public function upload()
	{
		$gambar = $this->request->getFile('gambar');
		$name = $gambar->getName();
		$gambar->move('image/upload');
		
		if($gambar->hasMoved())
		{
			echo "$name Berhasil Diupload";
		}
		else
		{
			echo "$name Gagal Diupload";
		}
	}

	public function option_index()
	{
		$data = [
			'kategori' => $this->kategoriModel->findAll()
		];

		return view('layout/option_index', $data);
	}

	public function option_select()
	{
		$data = [
			'kategori' => $this->kategoriModel->findAll()
		];

		return view('layout/option_select', $data);
	}

	//--------------------------------------------------------------------
}
