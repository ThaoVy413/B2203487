<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonhocTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonhocTable Test Case
 */
class MonhocTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MonhocTable
     */
    protected $Monhoc;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Monhoc',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Monhoc') ? [] : ['className' => MonhocTable::class];
        $this->Monhoc = $this->getTableLocator()->get('Monhoc', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Monhoc);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MonhocTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
