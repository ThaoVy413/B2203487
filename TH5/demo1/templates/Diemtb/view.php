<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diemtb $diemtb
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Diemtb'), ['action' => 'edit', $diemtb->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Diemtb'), ['action' => 'delete', $diemtb->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diemtb->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Diemtb'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Diemtb'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diemtb view content">
            <h3><?= h($diemtb->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($diemtb->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ho Ten') ?></th>
                    <td><?= h($diemtb->ho_ten) ?></td>
                </tr>
                <tr>
                    <th><?= __('Diem Tich Luy') ?></th>
                    <td><?= $diemtb->diem_tich_luy === null ? '' : $this->Number->format($diemtb->diem_tich_luy) ?></td>
                </tr>
                <tr>
                    <th><?= __('So Mon Da Hoc') ?></th>
                    <td><?= $this->Number->format($diemtb->so_mon_da_hoc) ?></td>
                </tr>
                <tr>
                    <th><?= __('So Mon Da Tich Luy') ?></th>
                    <td><?= $this->Number->format($diemtb->so_mon_da_tich_luy) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tong Sotc Da Tich Luy') ?></th>
                    <td><?= $diemtb->tong_sotc_da_tich_luy === null ? '' : $this->Number->format($diemtb->tong_sotc_da_tich_luy) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
