<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LopFixture
 */
class LopFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'lop';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'mamon_id' => 'Lorem ip',
                'malop' => 'Lorem ipsum dolor ',
                'nienkhoa' => 'Lorem ipsum dolor ',
            ],
        ];
        parent::init();
    }
}
