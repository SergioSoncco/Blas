<!-- include the BotDetect layout stylesheet --> 
<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?> 
 
<div class="users form"> 
<?= $this->Form->create($user) ?> 
  <fieldset> 
    <legend><?= __('Register User') ?></legend> 
    <?= $this->Form->input('username') ?> 
    <?= $this->Form->input('email') ?> 
    <?= $this->Form->input('password') ?> 
    <?= $this->Form->input('confirm_password', ['type' => 'password']) ?> 

    <!-- show captcha image html --> 
    <?= captcha_image_html() ?> 

    <!-- Captcha code user input textbox --> 
    <?= $this->Form->input('CaptchaCode', [ 
      'label' => 'Retype the characters from the picture:', 
      'maxlength' => '10', 
      'id' => 'CaptchaCode' 
    ]) ?> 
   </fieldset> 
<?= $this->Form->button(__('Register'), ['style' => 'float: left; margin-left: 20px;']) ?> 
<?= $this->Form->end() ?> 
</div> 

