<?php namespace Base;

use \CodeIgniter\HTTP\Response;

class MainController extends \CodeIgniter\Controller
{

    public function __construct()
    {
        //echo 'hello?';
    }
    
	public function index()
	{
		echo view('welcome_message');
	}

    public function _outputJSON($data = [], $statusCode = 200)
    {
        $response = new Response(new \Config\App);

        $output = json_encode($data);
        
        $response->setStatusCode(200);
        $response->setBody($output);
        $response->setHeader('Content-type', 'application/json');
        $response->noCache();

        // Sends the output to the browser
        $response->send();
    }

	//--------------------------------------------------------------------

}
