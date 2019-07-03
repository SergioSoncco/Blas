<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user

 */

?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['type'=>'file']) ?>
    <fieldset>
    	<legend><?=__('Add Image') ?></legend>

    	<?php
    		echo $this->Form->file('image');
    	?>
    	
    	<?= 	$this->Form->button(__('Upload image')) ?>

    </fieldset>
    <?= $this->Form->end() ?>
 </div>   
