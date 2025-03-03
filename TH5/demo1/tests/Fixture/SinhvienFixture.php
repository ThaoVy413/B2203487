<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SinhvienFixture
 */
class SinhvienFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'sinhvien';
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
                'masv' => 'Lorem ipsum dolor ',
                'hoten' => 'Lorem ipsum dolor sit amet',
                'ngaysinh' => '2025-02-26',
                'email' => 'Lorem ipsum dolor sit amet',
                'gioitinh' => 'Lorem ipsum dolor sit amet',
                'sdt' => 'Lorem ipsum dolor ',
                'matkhau' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
