<?php

use Laris\Inventory;
namespace Laris;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table to use for the model.
     * @var string
     */
    protected  $table = 'categories';

    /**
     * The relationshi with the Inventory class.
     * @return model
     */
    public function inventories()
    {
    	return $this->belongsTo(Inventory::class);
    }
}
