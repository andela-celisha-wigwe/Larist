<?php

namespace Laris\Http\Controllers;

use Laris\Inventory;
use Illuminate\Http\Request;
use Laris\Http\Repositories\InventoryRepository;
use Laris\Http\Requests;

class InventoriesController extends Controller
{
    protected $inventoryRepo;

    public function __construct(InventoryRepository $inventoryRepo)
    {
    	$this->inventoryRepo = $inventoryRepo;
    }

    public function index(Request $request)
    {
    	if( $request->category ) {
    		$inventories = $this->inventoryRepo->searchWithCategory($request->name, $request->category);
    	} else {
    		$inventories = $this->inventoryRepo->searchInventories($request->name);
    	}
    	

    	$data = [
    		'inventories' => $inventories,
    		'paging' => $inventories->appends(['name' => $request->name])->links(),
    	];



    	return view('welcome')->with($data);
    }
}
