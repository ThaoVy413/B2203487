<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DiemFixture
 */
class DiemFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'diem';
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
                'malop_id' => 1,
                'malop' => 'Lorem ipsum dolor ',
                'sv_id' => 'Lorem ipsum dolor ',
                'masv' => 'Lorem ipsum dolor ',
                'diem' => 1.5,
            ],
        ];
        parent::init();
    }
}
