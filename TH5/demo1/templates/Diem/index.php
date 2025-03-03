<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Diem> $diem
 */
?>
<div class="diem index content">
    <?= $this->Html->link(__('New Diem'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Diem') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('malop_id') ?></th>
                    <th><?= $this->Paginator->sort('malop') ?></th>
                    <th><?= $this->Paginator->sort('sv_id') ?></th>
                    <th><?= $this->Paginator->sort('masv') ?></th>
                    <th><?= $this->Paginator->sort('diem') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diem as $diem): ?>
                <tr>
                    <td><?= $this->Number->format($diem->id) ?></td>
                    <td><?= $this->Number->format($diem->malop_id) ?></td>
                    <td><?= h($diem->malop) ?></td>
                    <td><?= h($diem->sv_id) ?></td>
                    <td><?= h($diem->masv) ?></td>
                    <td><?= $this->Number->format($diem->diem) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $diem->malop]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diem->malop]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diem->malop], ['confirm' => __('Are you sure you want to delete # {0}?', $diem->malop)]) ?>
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
