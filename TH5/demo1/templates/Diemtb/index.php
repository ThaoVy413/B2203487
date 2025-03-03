<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Diemtb> $diemtb
 */
?>
<div class="diemtb index content">
    <?= $this->Html->link(__('New Diemtb'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Diemtb') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ho_ten') ?></th>
                    <th><?= $this->Paginator->sort('diem_tich_luy') ?></th>
                    <th><?= $this->Paginator->sort('so_mon_da_hoc') ?></th>
                    <th><?= $this->Paginator->sort('so_mon_da_tich_luy') ?></th>
                    <th><?= $this->Paginator->sort('tong_sotc_da_tich_luy') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diemtb as $diemtb): ?>
                <tr>
                    <td><?= h($diemtb->id) ?></td>
                    <td><?= h($diemtb->ho_ten) ?></td>
                    <td><?= $diemtb->diem_tich_luy === null ? '' : $this->Number->format($diemtb->diem_tich_luy) ?></td>
                    <td><?= $this->Number->format($diemtb->so_mon_da_hoc) ?></td>
                    <td><?= $this->Number->format($diemtb->so_mon_da_tich_luy) ?></td>
                    <td><?= $diemtb->tong_sotc_da_tich_luy === null ? '' : $this->Number->format($diemtb->tong_sotc_da_tich_luy) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $diemtb->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diemtb->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diemtb->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diemtb->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
