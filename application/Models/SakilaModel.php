<?php namespace App\Models;

class SakilaModel extends \CodeIgniter\Model
{
    protected $DBGroup        = 'sakila';

    protected $table          = 'actor';
    protected $primaryKey     = 'actor_id';
    protected $allowedFields  = ['title', 'slug', 'text'];


    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps  = false;
    protected $dateFormat     = 'datetime';

}