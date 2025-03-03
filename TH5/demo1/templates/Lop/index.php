<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Lop> $lop
 */
?>
<div class="lop index content">
    <?= $this->Html->link(__('New Lop'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lop') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('mamon_id') ?></th>
                    <th><?= $this->Paginator->sort('malop') ?></th>
                    <th><?= $this->Paginator->sort('nienkhoa') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lop as $lop): ?>
                <tr>
                    <td><?= $this->Number->format($lop->id) ?></td>
                    <td><?= h($lop->mamon_id) ?></td>
                    <td><?= h($lop->malop) ?></td>
                    <td><?= h($lop->nienkhoa) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lop->malop]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lop->malop]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lop->malop], ['confirm' => __('Are you sure you want to delete # {0}?', $lop->malop)]) ?>
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
