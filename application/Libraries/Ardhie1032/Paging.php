<?php namespace Libraries\Ardhie1032;

/**
 *  PHP Paginator
 *  @Author: Jason Grimes
 *  @Github: github.com/jasongrimes/php-paginator
 *  @Composer: composer require "jasongrimes/paginator:~1.0"
 */
        
use \JasonGrimes\Paginator;

/**
 *  Simple Paging Library
 *  @Author: Ardhie1032
 *  @Github: ardhie1032
 *  
 *  @param  array $config
 *  @return array
 *  
 *  @Usage:
 *  
 *      $config = [
 *          'currentPage' => null,
 *          'model' => new NewsModel,
 *          'returnArray' => false,
 *          'fieldSelect' => '*',
 *          'itemsPerPage' => 10,
 *          'urlPattern' => '/foo/baz/home/getActors/(:num)',
 *          'useSoftDeletes' => true
 *      ];
 *      
 *      $pageData = $paging->get($config);
 *  
 */

class Paging {
    
	public function data(array $config = [])
	{
        $config = array_merge([
            'currentPage' => null, // or integer
            'returnArray' => false,
            'fieldSelect' => '*',
            'itemsPerPage' => 3,
            'useSoftDeletes' => true
        ], $config);
        
        $model = $config['model'];
        
        $itemsPerPage = $config['itemsPerPage'];

        $currentPage = $config['currentPage'] ?? 1;

        $offset = ($currentPage == 1) ? 0 : $currentPage * $itemsPerPage - $itemsPerPage ;

        $asResult = ($config['returnArray'] == true) ? 'asArray' : 'asObject';
        
        $queryData = $model->{$asResult}()
                           ->findAll($itemsPerPage, $offset);

        $totalItems = ($config['useSoftDeletes'] == true)
                            ? 
                                $model->where('deleted', 0)->countAllResults()
                            :
                                $model->countAllResults();
        
        $data['offset'] = $offset;
        $data['results'] = $queryData;
        $data['totalItems'] = $totalItems;

        $data['paging'] = new Paginator($totalItems, $itemsPerPage, $currentPage, $config['urlPattern']);

        return $data;
	}

}