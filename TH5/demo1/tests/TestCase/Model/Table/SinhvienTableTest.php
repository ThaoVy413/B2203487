<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SinhvienTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SinhvienTable Test Case
 */
class SinhvienTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SinhvienTable
     */
    protected $Sinhvien;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Sinhvien',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sinhvien') ? [] : ['className' => SinhvienTable::class];
        $this->Sinhvien = $this->getTableLocator()->get('Sinhvien', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Sinhvien);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SinhvienTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
