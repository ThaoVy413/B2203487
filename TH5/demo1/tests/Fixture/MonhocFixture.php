<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MonhocFixture
 */
class MonhocFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'monhoc';
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
                'mamon' => 'Lorem ip',
                'tenmon' => 'Lorem ipsum dolor sit amet',
                'sotc' => 1,
                'cotichluy' => 1,
            ],
        ];
        parent::init();
    }
}
