<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LopTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LopTable Test Case
 */
class LopTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LopTable
     */
    protected $Lop;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Lop',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Lop') ? [] : ['className' => LopTable::class];
        $this->Lop = $this->getTableLocator()->get('Lop', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Lop);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LopTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
