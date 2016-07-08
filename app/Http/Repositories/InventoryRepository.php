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
		return $this->getInventory($name)->paginate(10);
	}

	public function searchWithCategory($name, $cat)
	{
		return Category::where('name', $cat)->get()->first()->inventories()->paginate(10);
	}

	private function getInventory($name)
	{
		return Inventory::where('name', $this->condition, "%$name%");
	}
}