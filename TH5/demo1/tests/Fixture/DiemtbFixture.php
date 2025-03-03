<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DiemtbFixture
 */
class DiemtbFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'diemtb';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'Lorem ipsum dolor ',
                'ho_ten' => 'Lorem ipsum dolor sit amet',
                'diem_tich_luy' => 1.5,
                'so_mon_da_hoc' => 1,
                'so_mon_da_tich_luy' => 1,
                'tong_sotc_da_tich_luy' => 1.5,
            ],
        ];
        parent::init();
    }
}
