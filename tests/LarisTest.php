<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LarisTest extends TestCase
{

	public function testSearchPage()
	{
		$this->visit('/')
		->see('Search');

		$this->countElements('#by-name', 1);

		$this->countElements('#search-button', 1);

		$this->countElements('#by-category', 1);
	}

	public function testSearchResultsAreDisplayed()
	{
		$this->createModels();

		$this->visit('/')
		->type('Order', 'name')
		->press('search-button')
		->seePageIs('/search?category=&name=Order')
		->see('Order ABC');
	}

	public function testSearchByCategory()
	{
		$this->createModels();

		$category = factory(Laris\Category::class)->create([
            'name'      => 'Cat2',
        ]);

        $inventory = factory(Laris\Inventory::class)->create([
            'name'      => 'Order XYZ',
            'category_id'  => 2,
        ]);

        $inventory = factory(Laris\Inventory::class)->create([
            'name'      => 'Order LMN',
            'category_id'  => 2,
        ]);

		$this->visit('/')
		->select('Cat2', 'category')
		->press('search-button')
		->seePageIs('/search?category=Cat2&name=')
		->see('Order XYZ')
		->see('Order LMN')
		->dontSee('Order ABC');
	}
}
