<?php

namespace Mystore\Model;

use Shulha\Framework\Model\Model;

/**
 * Class Products
 * @package Mystore\Model
 */
class Products extends Model
{
    public $table = 'products';

    /**
     * get all parameters by product id
     *
     * @param $id
     * @return null|\stdClass
     */
    public function parameters($id)
    {
        return $this->qb->query('SELECT par.title, pv.value, par.unit, pv.parameters_id, pv.id FROM products p 
                                 LEFT JOIN parameters_values pv ON p.id = pv.products_id
                                 LEFT JOIN parameters par ON pv.parameters_id = par.id 
                                 WHERE p.id ='. $id.'ORDER BY pv.parameters_id')->get();
    }

    /**
     * get product matches the supplied search
     *
     * @param $search
     * @return null|\stdClass
     */
    public function search($search)
    {
        return $this->qb->query('SELECT DISTINCT p.id, p.title, p.description, p.price, p.article, pv.value, par.title as par_title
                                 FROM products p 
                                 LEFT JOIN parameters_values pv ON p.id = pv.products_id
                                 LEFT JOIN parameters par ON pv.parameters_id = par.id
                                 WHERE p.title ILIKE \'%'. $search . '%\' OR p.description ILIKE \'%'. $search . '%\'
                                  OR pv.value ILIKE \'%'. $search . '%\' OR par.title ILIKE \'%'. $search . '%\'')->get();
    }
}
