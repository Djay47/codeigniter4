<?php namespace APP\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
	protected $table = "kategori";
	protected $primaryKey = 'idkategori';
	protected $allowedFields = ['kategori', 'keterangan'];
}