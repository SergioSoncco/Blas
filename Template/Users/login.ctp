<?php echo $this->Form->create(null,["onsubmit"=>"return miFuncion()"]);?>

<head><script src="https://www.google.com/recaptcha/api.js" async defer></script></head>
<h1>Login</h1>


<?php

echo $this->Form->control('username');
echo $this->Form->control('password') ;

?>
<div class="g-recaptcha" data-sitekey="6Lc4XKcUAAAAALtnglD6Qou1sctm1zDDDgxzhfPg" data-callback="enableSubmit"></div>

<?php
echo $this->Form->button("Login", ["type"=>"submit"], ["onClick"=>"miFuncion();"]);
$this->Form->end();
?>

<script>function miFuncion() {
    var response = grecaptcha.getResponse();

    if(response.length == 0){
      alert("Captcha no verificado");
	return false;    
}else{
	alert("Bienvenido    :)");
	return true;}
  }</script>



