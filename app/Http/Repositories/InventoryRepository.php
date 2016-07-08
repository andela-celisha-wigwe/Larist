<?php

namespace Laris\Http\Repositories;

use Laris\Inventory;

/**
* 
*/
class InventoryRepository
{

	public function searchInventories($name)
	{
		$condition = env('DB_CONNECTION') == 'pgsql' ? 'ILIKE' : 'LIKE';

		return Inventory::where('name', $condition, "%$name%")->get();
	}
}