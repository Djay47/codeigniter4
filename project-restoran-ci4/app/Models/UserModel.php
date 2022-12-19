<?php namespace APP\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table = 'user';
	protected $primaryKey = 'iduser';
	protected $allowedFields = ['user', 'email', 'password', 'posisi', 'status'];
}