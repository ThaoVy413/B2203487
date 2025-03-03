<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lop Entity
 *
 * @property int $id
 * @property string $mamon_id
 * @property string $malop
 * @property string $nienkhoa
 */
class Lop extends Entity
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
        'mamon_id' => true,
        'malop' => true,
        'nienkhoa' => true,
    ];
}
