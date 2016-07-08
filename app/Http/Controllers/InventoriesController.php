<?php

namespace Laris\Http\Controllers;

use Laris\Inventory;
use Illuminate\Http\Request;
use Laris\Http\Requests\SearchInventoriesRequest;
use Laris\Http\Repositories\InventoryRepository;
use Laris\Http\Requests;

class InventoriesController extends Controller
{
    protected $inventoryRepo;

    public function __construct(InventoryRepository $inventoryRepo)
    {
    	$this->inventoryRepo = $inventoryRepo;
    }

    public function index(SearchInventoriesRequest $request)
    {
    	$data = [
    		'inventories' => $this->inventoryRepo->searchInventories($request->name)
    	];

    	return view('welcome')->with($data);
    }
}
