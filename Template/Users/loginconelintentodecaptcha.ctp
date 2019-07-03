<?php echo $this->Form->create();?>
<h1>Login</h1>
<?php
echo $this->Form->control('username');
echo $this->Form->control('password') ;	
echo $this->Html->image("/users/captcha",["class"=>"captcha"]);
<script type = "text/javascript">
		$(function(){
			$(".reload_captcha").click(function(e){
				e.preventDefault();
				$(".captcha").attr("src",$("captcha").attr("src"));

			});



		});
</script>
echo $this->Html->link("ver otro captcha","#",['class'=>"reload_captcha"]);
echo $this->Form->control("captcha",['label'=> false,'placeholder'=>"Digite la imagen "]);
echo $this->Form->button("enviar",["type"=>"submit"]);
$this->Form->end();
	?>
	


