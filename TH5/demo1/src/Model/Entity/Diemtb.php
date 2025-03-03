<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Diemtb Entity
 *
 * @property string $id
 * @property string $ho_ten
 * @property string|null $diem_tich_luy
 * @property int $so_mon_da_hoc
 * @property int $so_mon_da_tich_luy
 * @property string|null $tong_sotc_da_tich_luy
 */
class Diemtb extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'id' => true,
        'ho_ten' => true,
        'diem_tich_luy' => true,
        'so_mon_da_hoc' => true,
        'so_mon_da_tich_luy' => true,
        'tong_sotc_da_tich_luy' => true,
    ];
}
