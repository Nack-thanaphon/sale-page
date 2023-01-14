<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CartitemTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CartitemTable Test Case
 */
class CartitemTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CartitemTable
     */
    protected $Cartitem;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Cartitem',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Cartitem') ? [] : ['className' => CartitemTable::class];
        $this->Cartitem = $this->getTableLocator()->get('Cartitem', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cartitem);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CartitemTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
