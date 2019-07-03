<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grade[]|\Cake\Collection\CollectionInterface $grades
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Grade'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="grades index large-9 medium-8 columns content">
    <h3><?= __('Grades') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('student_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grade_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grade_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grade_3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('average') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grades as $grade): ?>
            <tr>
                <td><?= $this->Number->format($grade->id) ?></td>
                <td><?= $grade->has('subject') ? $this->Html->link($grade->subject->name, ['controller' => 'Subjects', 'action' => 'view', $grade->subject->id]) : '' ?></td>
                <td><?= $grade->has('student') ? $this->Html->link($grade->student->id, ['controller' => 'Students', 'action' => 'view', $grade->student->id]) : '' ?></td>
                <td><?= $this->Number->format($grade->grade_1) ?></td>
                <td><?= $this->Number->format($grade->grade_2) ?></td>
                <td><?= $this->Number->format($grade->grade_3) ?></td>
                <td><?= $this->Number->format($grade->average) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $grade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $grade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
