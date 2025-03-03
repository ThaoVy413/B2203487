<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiemtbTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiemtbTable Test Case
 */
class DiemtbTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiemtbTable
     */
    protected $Diemtb;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Diemtb',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Diemtb') ? [] : ['className' => DiemtbTable::class];
        $this->Diemtb = $this->getTableLocator()->get('Diemtb', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Diemtb);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DiemtbTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
