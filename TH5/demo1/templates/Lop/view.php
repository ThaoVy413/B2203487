<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lop $lop
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lop'), ['action' => 'edit', $lop->malop], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lop'), ['action' => 'delete', $lop->malop], ['confirm' => __('Are you sure you want to delete # {0}?', $lop->malop), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lop'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lop'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lop view content">
            <h3><?= h($lop->malop) ?></h3>
            <table>
                <tr>
                    <th><?= __('Mamon Id') ?></th>
                    <td><?= h($lop->mamon_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Malop') ?></th>
                    <td><?= h($lop->malop) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nienkhoa') ?></th>
                    <td><?= h($lop->nienkhoa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lop->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
