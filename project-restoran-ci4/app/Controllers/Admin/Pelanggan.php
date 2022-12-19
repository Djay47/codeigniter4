<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use App\Models\MenuModel;
use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
	protected $kategoriModel;
	protected $menuModel;
	protected $pelangganModel;
	protected $pager;

	public function __construct()
	{
		$this->kategoriModel = new KategoriModel();
		$this->menuModel = new MenuModel();
		$this->pelangganModel = new PelangganModel();
		$this->pager = \Config\Services::pager();
	}

	public function index()
	{
		// Konfigurasi Pagination
		$jmlDataPerHal = 2;
		$posHal = ( isset( $_GET["page_list"] ) ? $_GET["page_list"] : 1 );
		$awalData = ($jmlDataPerHal * $posHal) - $jmlDataPerHal;

		$data = [
			'title' => 'Pelanggan',
			'pelanggan' => $this->pelangganModel->paginate($jmlDataPerHal, 'list'),
			'pager' => $this->pelangganModel->pager,
			'jmlDataPerHal' => $jmlDataPerHal,
			'posHal' => $posHal,
			'awalData' => $awalData
		];

		return view('pelanggan/select', $data);
	}

	public function update_status($id = null, $status = null)
	{
		$data = [
			'idpelanggan' => $id,
			'status' => ($status == 1) ? 0 : 1
		];

		$this->pelangganModel->save($data);
		return redirect()->to(base_url('/admin/pelanggan'));
	}

	public function delete($id = null)
	{
		$this->pelangganModel->delete($id);
		return redirect()->to(base_url('/admin/pelanggan'));
	}

	//--------------------------------------------------------------------

}
