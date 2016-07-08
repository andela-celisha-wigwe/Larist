<?php

namespace Laris\Http\Repositories;

use Laris\Inventory;
use Laris\Category;

/**
* 
*/
class InventoryRepository
{

	protected $condition;

	public function __construct()
	{
		$this->condition = env('DB_CONNECTION') == 'pgsql' ? 'ILIKE' : 'LIKE';
	}

	public function searchInventories($name)
	{
		return Inventory::where('name', $this->condition, "%$name%")->paginate(10);
	}

	public function searchWithCategory($name, $cat)
	{
		$category = Category::where('name', $cat)->get()->first();

		$inventories = $category->inventories;

		return Inventory::where('name', $this->condition, "%$name%")->where('category_id', $category->id)->paginate(10);
	}
}