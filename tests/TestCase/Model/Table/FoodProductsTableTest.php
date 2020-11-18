<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FoodProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FoodProductsTable Test Case
 */
class FoodProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FoodProductsTable
     */
    public $FoodProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FoodProducts',
        'app.FoodGroups',
        'app.Items',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FoodProducts') ? [] : ['className' => FoodProductsTable::class];
        $this->FoodProducts = TableRegistry::getTableLocator()->get('FoodProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FoodProducts);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
