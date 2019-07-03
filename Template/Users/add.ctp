<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user

 */

?>
<script type="text/javascript">     

        // var valid=true;

        jQuery(document).ready( function() {

            $("#dateDay option:first").text('DAY');
            $("#dateMonth option:first").text('MONTH');
            $("#dateYear option:first").text('YEAR');


        });




</script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
         <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>

        <li><?= $this->Html->link(__('List Administs'), ['controller' => 'Administs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
       
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
       
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['novalidate']) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            
            echo $this->Form->select(__('role'),['1'=>(__('Administ')),'2'=>(__('Teacher')),'3'=>(__('Student'))]);
            echo $this->Form->control(__('username'));
            echo $this->Form->control(__('password'));
            echo $this->Form->control(__('status'));
            echo $this->Form->control(__('names'));
            echo $this->Form->control(__('surnames'));
            echo $this->Form->control(__('DNI'));
        
            echo $this->Form->radio(__('gender'),['0'=>(__('Feminine')),'1'=>(__('Masculine'))]);
            echo $this->Form->control(__('phone_number'));
            echo $this->Form->control(__('email'));
            echo $this->Form->control(__('address'));
            
echo $this->Form->date(__('birthday'), [
        'maxYear' => date('Y'),
        'minYear' => 1980,
        'monthNames' => true, // Months are displayed as numbers
        'empty' => [
            'year' => 'Choose year...', // The year select control has no option for empty value
            'month' => 'Choose month...',
            'day' => 'Choose day...', // The month select control does, though
        ],
        'day' => true, // Do not show day select control
        'year' => [
            'class' => 'cool-years',
            'title' => 'Registration Year'
        ]
    ]);
# default order m/d/y





           // echo $this->Form->control(__('birthday'), ['empty' => true]);
        ?>
    </fieldset>
    
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
