<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BranchTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BranchTable Test Case
 */
class BranchTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BranchTable
     */
    protected $Branch;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Branch',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Branch') ? [] : ['className' => BranchTable::class];
        $this->Branch = $this->getTableLocator()->get('Branch', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Branch);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BranchTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
