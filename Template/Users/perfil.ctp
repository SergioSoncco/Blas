<?php 
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($perfil->name) ?></h3>
    </div>
  
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Profile Picture') ?></td>
            <td><?= $imagesUser ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'update'], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>

                <?= $this->Form->postLink('', ['action' => 'deleteImage',$imagesUser], ['confirm' => __('Are you sure you want to delete # {0}?', $perfil->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>

        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($perfil->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Surname') ?></td>
            <td><?= h($perfil->surname) ?></td>
        </tr>
        <tr>
            <td><?= __('Address') ?></td>
            <td><?= h($perfil->address) ?></td>
        </tr>
        <tr>
            <td><?= __('Phone') ?></td>
            <td><?= h($perfil->phone) ?></td>
        </tr>
        <tr>
            <td><?= __('Email') ?></td>
            <td><?= h($perfil->email) ?></td>
        </tr>
        <tr>
            <td><?= __('Password') ?></td>
            <td><?= h($perfil->password) ?></td>
        </tr>
        <tr>
            <td><?= __('Role') ?></td>
            <td><?= $perfil->role->name?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($perfil->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($perfil->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($perfil->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $perfil->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <br>
    <li><?= $this->Html->link(__('Edit my Profile'), ['controller' => 'Users', 'action' => 'update']) ?> </li>
</div>

