<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BidstatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BidstatusTable Test Case
 */
class BidstatusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BidstatusTable
     */
    public $Bidstatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bidstatus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bidstatus') ? [] : ['className' => 'App\Model\Table\BidstatusTable'];
        $this->Bidstatus = TableRegistry::get('Bidstatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bidstatus);

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
