<?php include 'views/layouts/header.php';?>
<?php include 'views/layouts/footer.php';?>



<!-- 
<button v-popover:foo>Toggle popover</button>
 
<popover name="foo">
  Hello
</popover>
-->


<?if (User::isGuest()) :?>
	<div class="text-center col-lg-12 col-md-12col-sm-12 col-xs-12">
<?else :?>
	<div class="text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?endif;?>


<!-- 	<b-btn v-b-popover.hover="'I am popover content!'" title="Popover Title">
    Hover Me
</b-btn> -->

<!-- <?if ($errors) :?>
	<div class="warningTXT text-center">
		Извините, но введены некорректные данные <?$var = $errors ? 'true' : 'false';
		 echo "var: ".$var;?>
	</div>
<?else :?>
	<div class="warningTXT text-center">
		ок<?$var = $errors ? 'true' : 'false';
		 echo "var: ".$var;?>
	</div>	
<?endif;?> -->

<form id = "auth" method="POST">
<div id='userVue'>
<div class="warningTXT text-center" v-show="errSubmit==true">Извините, но введены некорректные данные {{errors}} 1111</div>	
	<legend>
		<div class="authTitle text-center"><b>Регистрация</b> <br> (поля отмеченные <span style='color: red;'>красным </span>обязательны к заполнению)</div>
	</legend>
	
		<div class="heightDivInput">
			<label for="login" style='color:red'>Логін</label>
			<input id="login" autofocus type="text" name="login" v-model.lazy="login" placeholder = "введите свой логин" />
			<div class="warningTXT text-center" v-show="isUser==true">Извините, но логин {{login}} занят</div>
		</div>	
		<div class="heightDivInput">
			<label for="password" style='color:red'>Пароль</label>
			<input id="password" type="password" name="password" v-model.lazy="password" placeholder = "введите пароль" />
			<div class="warningTXT text-center" v-show="isPassword==true">Извините, но пароль должен быть больше 5 символов</div>
		</div>

		<div class="heightDivInput">
			<label for="passwordConfirm" style='color:red'>Повторите пароль</label>
			<input id="passwordConfirm" type="password"  v-model.lazy="passwordconfirm" placeholder = "введите пароль ещё раз" />
			<div class="warningTXT text-center" v-show="isConfirmPassword==true">Извините, но пароль не совпадает с подтверждением</div>
		</div>
	<input type="hidden" name="errors" v-model.lazy="errors" />
</div>	
	<?php foreach ($user_meta as $meta):?>
		<div class="heightDivInput">
		<label for="<?= $meta['user_meta']?>"><?= $meta['user_meta_name']?></label>
		<input id="<?= $meta['user_meta']?>" name="<?= $meta['user_meta']?>" type="<?= $meta['user_meta_type']?>" />
		</div>
	<?php endforeach; ?>

	<div class="chek"><input style='width:40px; height: 30px' id="chekid" name="chek" type="checkbox" />
		Я согласен(на) на использование моих персональных данных для сайта ...
	</div><br><br>						
	<div class = "text-center">
		<button @click="submit()" class="btn btn-info" id="btn-chek" >Зарегистрировать</button>
	</div>  
	
</form>

<script src="../js/mainVue.js"></script>