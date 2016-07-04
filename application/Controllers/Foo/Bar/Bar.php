<?php namespace Foo\Bar;

class Bar extends \CodeIgniter\Controller
{

	public function index()
	{
		echo view('welcome_message');
	}

	public function hello($name = 'foo')
	{
		echo 'Foo\Bar::hello()<br>';
		echo "Hello $name";
	}
	//--------------------------------------------------------------------

}
