<?php

class Sakila extends \Base\Controller
{

    public $setNamaSaya = 'Suparman';
    
    public function __construct()
    {
        $this->_siteInfo();
    }

	public function index()
	{
        parent::hello();
	}

    public function getActors($currentPage = null)
    {
        $model = new \App\Models\SakilaModel;
        
        $paging = new \Libraries\Ardhie1032\Paging;
        
        $config = [
            'currentPage' => $currentPage,
            'model' => new \App\Models\SakilaModel,
            'returnArray' => false,
            'useSoftDeletes' => false,
            'fieldSelect' => '*',
            'table' => 'actor',
            'itemsPerPage' => 10,
            'urlPattern' => '/sakila/getActors/(:num)'
        ];
        
        $data = $paging->data($config);
        
        echo view('sakila/table_pagination', $data);
    }
	//--------------------------------------------------------------------

}
