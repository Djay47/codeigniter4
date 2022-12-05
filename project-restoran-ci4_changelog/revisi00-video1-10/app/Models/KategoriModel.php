<?php namespace APP\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
	protected $table = "kategori";
	protected $allowedFields = ['kategori', 'keterangan'];
}