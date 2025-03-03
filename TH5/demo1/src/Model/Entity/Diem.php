<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Diem Entity
 *
 * @property int $id
 * @property int $malop_id
 * @property string $malop
 * @property string $sv_id
 * @property string $masv
 * @property string $diem
 */
class Diem extends Entity
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
        'malop_id' => true,
        'malop' => true,
        'sv_id' => true,
        'masv' => true,
        'diem' => true,
    ];
}
