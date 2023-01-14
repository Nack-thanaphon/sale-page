<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CartTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CartTable Test Case
 */
class CartTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CartTable
     */
    protected $Cart;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Cart',
        'app.Products',
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
        $config = $this->getTableLocator()->exists('Cart') ? [] : ['className' => CartTable::class];
        $this->Cart = $this->getTableLocator()->get('Cart', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cart);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CartTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
