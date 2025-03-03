<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diemtb $diemtb
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Diemtb'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diemtb form content">
            <?= $this->Form->create($diemtb) ?>
            <fieldset>
                <legend><?= __('Add Diemtb') ?></legend>
                <?php
                    echo $this->Form->control('ho_ten');
                    echo $this->Form->control('diem_tich_luy');
                    echo $this->Form->control('so_mon_da_hoc');
                    echo $this->Form->control('so_mon_da_tich_luy');
                    echo $this->Form->control('tong_sotc_da_tich_luy');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
