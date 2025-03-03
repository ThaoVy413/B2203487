<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sinhvien $sinhvien
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sinhvien'), ['action' => 'edit', $sinhvien->masv], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sinhvien'), ['action' => 'delete', $sinhvien->masv], ['confirm' => __('Are you sure you want to delete # {0}?', $sinhvien->masv), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sinhvien'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sinhvien'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sinhvien view content">
            <h3><?= h($sinhvien->masv) ?></h3>
            <table>
                <tr>
                    <th><?= __('Masv') ?></th>
                    <td><?= h($sinhvien->masv) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hoten') ?></th>
                    <td><?= h($sinhvien->hoten) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($sinhvien->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gioitinh') ?></th>
                    <td><?= h($sinhvien->gioitinh) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sdt') ?></th>
                    <td><?= h($sinhvien->sdt) ?></td>
                </tr>
                <tr>
                    <th><?= __('Matkhau') ?></th>
                    <td><?= h($sinhvien->matkhau) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sinhvien->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ngaysinh') ?></th>
                    <td><?= h($sinhvien->ngaysinh) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
