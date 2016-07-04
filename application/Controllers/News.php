<?php

class News extends Base\MainController
{

	public $setName = 'Ardhie1032';

    public function __construct()
    {
        $this->news = new App\Models\NewsModel;
		$this->_siteInfo();
    }
    
	/**
	 *  @url: example.com
	 *  @param integer $currentPage
	 */
    public function index($currentPage = null)
    {
        $config = [
            'currentPage' => $currentPage,
            'model' => $this->news,
            'urlPattern' => '/news/index/(:num)'
        ];
        
        $data = (new Libraries\Ardhie1032\Paging)->data($config);
        
        echo view('news/pagination_table', $data);
    }

	/**
	 *  @uri: example.com/hash_id/
	 *  @param integer $id
	 */
	public function hash_id($id)
	{
        $hash_id = $this->news->encodeID($id);
		echo $hash_id;
        echo '<br>';
        echo $this->news->decodeID($hash_id);
	}

	/**
	 *  Return all datas (where 'deleted' = 0)
	 *  @uri: example.com/news/view
	 *  
	 *  Return specific data (macth the specific 'id')
	 *  @uri: example.com/news/view/2
	 *  @param integer $id
	 */
	public function view($id = null)
	{
        echo '<pre>';

		if( is_null($id) )
			$news = $this->news->findAll();
		else
			$news = $this->news->find($id);
		
		if( is_null($news) )
			$news = 'Not found!';

        print_r($news);
		
        echo '</pre>';
	}

	/**
	 *  Save data (insert or create new)
	 *  @uri: example.com/news/save
	 *  
	 *  Save data (update, with spesific 'id')
	 *  @uri: example.com/news/save/3
	 *  @param integer $id
	 */
	public function save($id = null)
	{
		// Create and save
        $data = [
            'title' => 'Foo',
            'slug'  => 'foo',
            'text'  => 'Hello Foo!'
        ];
		
		// Update and save with match the ID
		if( !is_null($id) )
			$data['id'] = $id;

        $this->news->save($data);
	}

	/**
	 *  Delete data (with spesific 'id')
	 *  @uri: example.com/news/save/3
	 */
	public function delete($id = 1)
	{
        $this->news->delete($id); // Soft delete
        # $this->news->delete($id, true); // Permanent delete
	}

	/**
	 *  Return JSON data
	 *  @uri: example.com/news/ajax
	 */
    public function ajax()
    {
        $data = ['ardhie' => 1032];

        $this->_outputJSON($data);
    }

	//--------------------------------------------------------------------
    
}
