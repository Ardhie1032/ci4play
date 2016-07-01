<?php namespace App\Models;

class NewsModel extends \CodeIgniter\Model
{
    protected $DBGroup        = 'news';

    protected $table          = 'news';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['title', 'slug', 'text'];


    protected $returnType     = 'array';

	protected $createdField   = 'dibuat';
	protected $updatedField   = 'disunting';

    protected $useTimestamps  = true;
    protected $useSoftDeletes = true;
    protected $dateFormat     = 'datetime';
}