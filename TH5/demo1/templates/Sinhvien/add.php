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
            <?= $this->Html->link(__('List Sinhvien'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sinhvien form content">
            <?= $this->Form->create($sinhvien) ?>
            <fieldset>
                <legend><?= __('Add Sinhvien') ?></legend>
                <?php
                    echo $this->Form->control('masv');
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
