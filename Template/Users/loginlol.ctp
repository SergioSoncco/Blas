<!-- include the BotDetect layout stylesheet --> 
<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?> 
 
<div class="users form"> 
<?= $this->Flash->render('auth') ?> 
<?= $this->Form->create() ?> 
  <fieldset> 
    <legend><?= __('Please enter your username and password') ?></legend> 
    <?= $this->Form->input('username') ?> 
    <?= $this->Form->input('password') ?> 

    <!-- show captcha image html --> 
    <?= captcha_image_html() ?> 

    <!-- Captcha code user input textbox --> 
    <?= $this->Form->input('CaptchaCode', [ 
      'label' => 'Retype the characters from the picture:', 
      'maxlength' => '10', 
      'id' => 'CaptchaCode' 
    ]) ?> 
  </fieldset> 


<?= $this->Form->button(__('Login'), ['style' => 'float: left; margin-left: 20px;']) ?> 
<?= $this->Form->end() ?> 
</div> 