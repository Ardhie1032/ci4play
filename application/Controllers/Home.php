<?php namespace App\Controllers;

class Home extends \CodeIgniter\Controller
{

	public function index()
	{
		echo view('welcome_message');
	}

	public function index2($nama = 'Ardiansyah<br>hahaha', $kelas = null, $nis = 1032)
	{
		echo view('welcome_message');
	}

	//--------------------------------------------------------------------

}
