<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sinhvien Entity
 *
 * @property int $id
 * @property string $masv
 * @property string $hoten
 * @property \Cake\I18n\FrozenDate $ngaysinh
 * @property string $email
 * @property string $gioitinh
 * @property string $sdt
 * @property string $matkhau
 */
class Sinhvien extends Entity
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
        'masv' => true,
        'hoten' => true,
        'ngaysinh' => true,
        'email' => true,
        'gioitinh' => true,
        'sdt' => true,
        'matkhau' => true,
    ];
}
