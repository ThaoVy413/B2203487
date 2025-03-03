<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diem $diem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Diem'), ['action' => 'edit', $diem->malop], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Diem'), ['action' => 'delete', $diem->malop], ['confirm' => __('Are you sure you want to delete # {0}?', $diem->malop), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Diem'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Diem'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diem view content">
            <h3><?= h($diem->malop) ?></h3>
            <table>
                <tr>
                    <th><?= __('Malop') ?></th>
                    <td><?= h($diem->malop) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sv Id') ?></th>
                    <td><?= h($diem->sv_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Masv') ?></th>
                    <td><?= h($diem->masv) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($diem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Malop Id') ?></th>
                    <td><?= $this->Number->format($diem->malop_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Diem') ?></th>
                    <td><?= $this->Number->format($diem->diem) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
