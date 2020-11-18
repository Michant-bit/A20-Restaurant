<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FoodGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FoodGroupsTable Test Case
 */
class FoodGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FoodGroupsTable
     */
    public $FoodGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FoodGroups',
        'app.FoodProducts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FoodGroups') ? [] : ['className' => FoodGroupsTable::class];
        $this->FoodGroups = TableRegistry::getTableLocator()->get('FoodGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FoodGroups);

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
}
