<?php

use Laris\Category;
namespace Laris;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /**
     * The table to use for the model.
     * @var string
     */
    protected  $table = 'inventories';

    /**
     * The relationshi with the Category class.
     * @return model
     */
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
