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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $diemtb->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $diemtb->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Diemtb'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diemtb form content">
            <?= $this->Form->create($diemtb) ?>
            <fieldset>
                <legend><?= __('Edit Diemtb') ?></legend>
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
