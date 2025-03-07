<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Monhoc $monhoc
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Monhoc'), ['action' => 'edit', $monhoc->mamon], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Monhoc'), ['action' => 'delete', $monhoc->mamon], ['confirm' => __('Are you sure you want to delete # {0}?', $monhoc->mamon), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Monhoc'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Monhoc'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="monhoc view content">
            <h3><?= h($monhoc->mamon) ?></h3>
            <table>
                <tr>
                    <th><?= __('Mamon') ?></th>
                    <td><?= h($monhoc->mamon) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tenmon') ?></th>
                    <td><?= h($monhoc->tenmon) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($monhoc->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sotc') ?></th>
                    <td><?= $this->Number->format($monhoc->sotc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cotichluy') ?></th>
                    <td><?= $monhoc->cotichluy ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
