<?php namespace APP\Models;

use Codeigniter\Model;

class PelangganModel extends Model
{
	protected $table = "pelanggan";
	protected $primaryKey = "idpelanggan";
	protected $allowedFields = ['status'];
}