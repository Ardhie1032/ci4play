<?php

class Info extends Base\MainController
{

	public $setName = 'Ardhie1032';

    public function __construct()
    {
		$this->_siteInfo();
    }
    
	public function index()
	{
		$this->_getName();
		
		$data['routesCollection'] = $this->_getRouteCollection();
		
		echo view('other_info', $data);
	}

	/**
	 *  Utility (routes collection)
	 *  
	 *  @return array
	 */
    public function _getRouteCollection()
    {
        $routes = CodeIgniter\Services::routes(true);
		
        $data =  '<pre>';
        $data .= print_r($routes->getRoutes(), true);
        $data .= '</pre>';
		
		return $data;
    }
    
	//--------------------------------------------------------------------

}
