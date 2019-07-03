<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grade $grade
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grade'), ['action' => 'edit', $grade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grade'), ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grade'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="grades view large-9 medium-8 columns content">
    <h3><?= h($grade->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= $grade->has('subject') ? $this->Html->link($grade->subject->name, ['controller' => 'Subjects', 'action' => 'view', $grade->subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Student') ?></th>
            <td><?= $grade->has('student') ? $this->Html->link($grade->student->id, ['controller' => 'Students', 'action' => 'view', $grade->student->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($grade->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade 1') ?></th>
            <td><?= $this->Number->format($grade->grade_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade 2') ?></th>
            <td><?= $this->Number->format($grade->grade_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade 3') ?></th>
            <td><?= $this->Number->format($grade->grade_3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Average') ?></th>
            <td><?= $this->Number->format($grade->average) ?></td>
        </tr>
    </table>
</div>
