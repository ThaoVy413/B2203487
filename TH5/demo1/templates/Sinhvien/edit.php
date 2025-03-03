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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sinhvien->masv],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sinhvien->masv), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sinhvien'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sinhvien form content">
            <?= $this->Form->create($sinhvien) ?>
            <fieldset>
                <legend><?= __('Edit Sinhvien') ?></legend>
                <?php
                    echo $this->Form->control('id');
                    echo $this->Form->control('hoten');
                    echo $this->Form->control('ngaysinh');
                    echo $this->Form->control('email');
                    echo $this->Form->control('gioitinh');
                    echo $this->Form->control('sdt');
                    echo $this->Form->control('matkhau');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
