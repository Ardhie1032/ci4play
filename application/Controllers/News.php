<?php

class News extends Base\MainController
{

    public function __construct()
    {
        $this->news = new App\Models\NewsModel;
        //parent::__construct();
        //$this->_siteInfo();
    }
    
    public function hello()
    {
        echo 1032;
    }
    
    public function collection()
    {
        $routes = CodeIgniter\Services::routes(true);
        echo '<pre>';
        print_r($routes->getRoutes());
        echo '</pre>';
    }
    
	public function index($see = '1', $what = null)
	{
		echo view('news/index');
	}

    public function data($name = 'mixinix', $age = 15, $isCodeIgniterFavorite = true, $single = false)
    {
        $currentPage = $name;
        $config = [
            'currentPage' => $currentPage,
            'model' => $this->news,
            'urlPattern' => '/news/data/(:num)'
        ];
        
        $data = (new \Libraries\Ardhie1032\Paging)->data($config);
        
        //echo view('news/pagination_table', $data);
    }

	public function hashId($id)
	{
        $hash_id = $this->news->encodeID($id);
		echo $hash_id;
        echo '<br>';
        echo $this->news->decodeID($hash_id);
	}

	public function view()
	{
        $user = $this->news->findAll();

        echo '<pre>';
        print_r($user);
        echo '</pre>';
	}

	public function save()
	{
        $data = [
            'title' => 'testing2',
            'slug'  => 'testing2',
            'text'  => 'Testing2'
        ];

        $this->news->save($data);
	}

	public function update()
	{
        $data = [
            'id'    => 8,
            'title' => 'news8',
            'slug'  => 'news8',
            'text'  => 'News Updated8!'
        ];

        $this->news->save($data);
	}

	public function delete()
	{
        $this->news->delete(6);
	}

    public function ajax()
    {
        $data = ['ardhie' => 1032];

        $this->_outputJSON($data);
    }

	//--------------------------------------------------------------------
    
}
