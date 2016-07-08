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
}
