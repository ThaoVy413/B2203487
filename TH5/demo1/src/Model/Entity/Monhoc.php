<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Monhoc Entity
 *
 * @property int $id
 * @property string $mamon
 * @property string $tenmon
 * @property int $sotc
 * @property bool $cotichluy
 */
class Monhoc extends Entity
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
        'mamon' => true,
        'tenmon' => true,
        'sotc' => true,
        'cotichluy' => true,
    ];
}
