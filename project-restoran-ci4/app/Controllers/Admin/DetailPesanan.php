<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DetailPesananModel;

class DetailPesanan extends BaseController
{
	protected $db;
	protected $DetailPesananModel;

	public function __construct()
	{
		$this->db = $this->db = \Config\Database::connect();
		$this->DetailPesananModel = new DetailPesananModel();
	}
	
	public function index()
	{
		$data = [
			'title' => 'Detail Pesanan',
			'detailpesanan' => $this->DetailPesananModel->findAll(),
		];

		return view('detailpesanan/select', $data);
	}

	public function cari()
	{
		$tglAwal = $this->request->getGet('tglAwal');
		$tglAkhir = $this->request->getGet('tglAkhir');
		$query = "SELECT * FROM vdetailpesanan WHERE tglpesanan BETWEEN '$tglAwal' AND '$tglAkhir'";
		$vdetailpesanan = $this->db->query($query)->getResult('array');

		$data = [
			'title' => 'Detail Pesanan',
			'detailpesanan' => $vdetailpesanan
		];

		return view('detailpesanan/select', $data);
	}

	//--------------------------------------------------------------------

}
