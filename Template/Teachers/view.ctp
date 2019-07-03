<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Teacher $teacher
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Form->postLink(__('Delete Teacher'), ['action' => 'delete', $teacher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacher->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['action' => 'index']) ?> </li>
        
    </ul>
</nav>
<div class="teachers view large-9 medium-8 columns content">
    <h3><?= h($teacher->user->names),h(' '),h($teacher->user->surnames)  ?></h3>
    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $teacher->has('user') ? $this->Html->link($teacher->user->id, ['controller' => 'Users', 'action' => 'view', $teacher->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teacher Id') ?></th>
            <td><?= $this->Number->format($teacher->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($teacher->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($teacher->modified) ?></td>
        </tr>
    </table>


<?php if (!empty($teacher->subjects)): ?>
            <div class="related">
        <h4><?= __('Related Subject') ?></h4>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Level id') ?></th>
                <th scope="col"><?= __('Teacher id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                
            </tr>
            <?php foreach ($teacher->subjects as $subject): ?>
            <tr>
                <td><?= h($subject->id) ?></td>
                <td><?= h($subject->level_id) ?></td>
                <td><?= h($subject->teacher_id) ?></td>
                <td><?= h($subject->name) ?></td>
                
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
    <?php endif; ?>
</div>
