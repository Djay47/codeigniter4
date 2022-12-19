<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pesanan extends BaseController
{
	protected $db;
	protected $pager;

	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->pager = \Config\Services::pager();
	}

	public function index()
	{
		// Konfigurasi Pagination
		$vpesanan = $this->db->query("SELECT * FROM vpesanan")->getResult('array');
		$jmlData = count($vpesanan);
		$jmlDataPerHal = 5;
		$posHal = ( isset( $_GET["page"] ) ? $_GET["page"] : 1 );
		$awalData = ($jmlDataPerHal * $posHal) - $jmlDataPerHal;

		$query = "SELECT * FROM vpesanan ORDER BY idpesanan ASC LIMIT $awalData, $jmlDataPerHal";
		$result = $this->db->query($query);
		$vpesanan = $result->getResult('array');
		
		$data = [
			'title' => 'Pesanan',
			'vpesanan' => $vpesanan,
			'pager' => $this->pager,
			'jmlData' => $jmlData,
			'jmlDataPerHal' => $jmlDataPerHal,
			'posHal' => $posHal,
			'awalData' => $awalData,
		];

		return view('pesanan/select', $data);
	}

	public function update($id = null)
	{
		$queryPesanan = "SELECT * FROM vpesanan WHERE idpesanan = $id";
		$vpesanan = $this->db->query($queryPesanan)->getResult('array');

		$queryVdetailpesanan = "SELECT * FROM vdetailpesanan WHERE idpesanan = $id";
		$vdetailpesanan = $this->db->query($queryVdetailpesanan)->getResult('array');

		$data = [
			'title' => 'Pembayaran',
			'vpesanan' => $vpesanan, 
			'vdetailpesanan' => $vdetailpesanan,
		];

		return view('pesanan/update', $data);
	}

	public function save()
	{
		$idpesanan = $this->request->getPost('idpesanan');
		$total = $this->request->getPost('total');
		$bayar = $this->request->getPost('bayar');
		$kembali = $bayar - $total;

		if ( $kembali < 0 )
		{
			session()->setFlashdata('pesan', 'Pembayaran Belum Lunas!');
			return redirect()->to(base_url("admin/pesanan/update/$idpesanan"));
		}
		else
		{
			$query = "UPDATE pesanan SET bayar = $bayar, kembali = $kembali, state = 1 WHERE idpesanan = $idpesanan";
			$this->db->query($query);
			return redirect()->to(base_url("admin/pesanan"));
		}
	}

	//--------------------------------------------------------------------

}
