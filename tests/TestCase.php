<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function countElements($selector, $number)
    {
        $this->assertCount($number, $this->crawler->filter($selector));
        
        return $this;
    }

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    public function createCategory()
    {
        $category = factory(Laris\Category::class)->create([
            'name'      => 'roy',
        ]);
        
        return $category;
    }

    public function createInventory()
    {
        $inventory = factory(Laris\Inventory::class)->create([
            'name'      => 'Order ABC',
            'category_id'  => 1,
        ]);

        return $inventory;
    }

    public function createModels()
    {
        $this->createCategory();
        $this->createInventory();
    }
}
