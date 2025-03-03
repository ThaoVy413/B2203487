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
            <?= $this->Html->link(__('List Diem'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diem form content">
            <?= $this->Form->create($diem) ?>
            <fieldset>
                <legend><?= __('Add Diem') ?></legend>
                <?php
                    echo $this->Form->control('id');
                    echo $this->Form->control('malop_id');
                    echo $this->Form->control('sv_id');
                    echo $this->Form->control('diem');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
