<?php namespace Base;

use CodeIgniter\HTTP\Response;
use Config\App as Config;

class MainController extends \CodeIgniter\Controller
{
    
	public $setName = 'Suparman';
	
	public function index()
	{
		echo view('welcome_message');
	}
	
	public function site_info()
	{
		echo view('other_info');
	}

	public function _getName()
	{
		$getName = $this->setName;
		echo "<h1>Hello {$getName}!</h1>";
	}

	public function _siteInfo()
	{
		$config = new Config;
		echo '<h1>'.$config->siteTitle.'</h1>';
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
