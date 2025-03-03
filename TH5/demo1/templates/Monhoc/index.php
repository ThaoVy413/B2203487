<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Monhoc> $monhoc
 */
?>
<div class="monhoc index content">
    <?= $this->Html->link(__('New Monhoc'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Monhoc') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('mamon') ?></th>
                    <th><?= $this->Paginator->sort('tenmon') ?></th>
                    <th><?= $this->Paginator->sort('sotc') ?></th>
                    <th><?= $this->Paginator->sort('cotichluy') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($monhoc as $monhoc): ?>
                <tr>
                    <td><?= $this->Number->format($monhoc->id) ?></td>
                    <td><?= h($monhoc->mamon) ?></td>
                    <td><?= h($monhoc->tenmon) ?></td>
                    <td><?= $this->Number->format($monhoc->sotc) ?></td>
                    <td><?= h($monhoc->cotichluy) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $monhoc->mamon]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $monhoc->mamon]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $monhoc->mamon], ['confirm' => __('Are you sure you want to delete # {0}?', $monhoc->mamon)]) ?>
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
