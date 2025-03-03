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
            <?= $this->Html->link(__('List Lop'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lop form content">
            <?= $this->Form->create($lop) ?>
            <fieldset>
                <legend><?= __('Add Lop') ?></legend>
                <?php
                    echo $this->Form->control('id');
                    echo $this->Form->control('mamon_id');
                    echo $this->Form->control('nienkhoa');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
