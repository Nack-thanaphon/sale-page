<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactTable Test Case
 */
class ContactTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactTable
     */
    protected $Contact;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Contact',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Contact') ? [] : ['className' => ContactTable::class];
        $this->Contact = $this->getTableLocator()->get('Contact', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Contact);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ContactTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
