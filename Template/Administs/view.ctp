<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Teacher $teacher
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Form->postLink(__('Delete Teacher'), ['action' => 'delete', $administ->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administ->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['action' => 'index']) ?> </li>
        
    </ul>
</nav>
<div class="teachers view large-9 medium-8 columns content">
    <h3><?= h($administ->user->names),h(' '),h($administ->user->surnames)  ?></h3>
    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $administ->has('user') ? $this->Html->link($administ->user->id, ['controller' => 'Users', 'action' => 'view', $administ->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teacher Id') ?></th>
            <td><?= $this->Number->format($administ->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($administ->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($administ->modified) ?></td>
        </tr>
    </table>
</div>
