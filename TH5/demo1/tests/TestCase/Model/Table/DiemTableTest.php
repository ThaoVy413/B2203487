<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiemTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiemTable Test Case
 */
class DiemTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiemTable
     */
    protected $Diem;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Diem',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Diem') ? [] : ['className' => DiemTable::class];
        $this->Diem = $this->getTableLocator()->get('Diem', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Diem);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DiemTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
