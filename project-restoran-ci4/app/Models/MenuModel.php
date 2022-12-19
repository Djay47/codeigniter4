<?php namespace APP\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
	protected $table = "menu";
	protected $primaryKey = 'idmenu';
	protected $allowedFields = ['idkategori', 'menu', 'gambar', 'harga'];
}