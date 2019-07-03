<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administ $administ
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $administ->administ_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $administ->administ_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Administs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="administs form large-9 medium-8 columns content">
    <?= $this->Form->create($administ) ?>
    <fieldset>
        <legend><?= __('Edit Administ') ?></legend>
        <?php
            echo $this->Form->control('names');
            echo $this->Form->control('surnames');
            echo $this->Form->control('DNI');
            echo $this->Form->control('gender');
            echo $this->Form->control('phone_number');
            echo $this->Form->control('email');
            echo $this->Form->control('address');
            echo $this->Form->control('birthday', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
