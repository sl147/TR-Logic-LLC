<?php include 'views/layouts/header.php';?>


<?if (User::isGuest()) :?>
	<div class="text-center col-lg-8 col-md-8 col-sm-12 col-xs-12">
<?else :?>
	<div class="text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?endif;?>
<form id = "auth" method="POST">
	<fieldset class="control-group">
		<legend>
			<div class="authTitle text-center"><b>Реєстрація</b> <br> (поля відмічені <b style='color: red;'>червоним </b>обов'язкові до заповнення)</div>
		</legend>
		<label for="login" style='color:red'><b>Логін</label>
			<input class="input-xlarge" autofocus id="login" name="login" type="text"required><br><br>

		<label for="password" style='color:red'>Пароль</label>
		<input id="password" name="password" type="password" required><br><br>

		<label for="passwordConfirm" style='color:red'>Повторіть пароль</label>
		<input id="passwordConfirm" name="passwordConfirm" type="password"><br><br>

		<?php foreach ($user_meta as $meta):?>
			<label for="<?= $meta['user_meta']?>"><?= $meta['user_meta']?></label>
			<input id="<?= $meta['user_meta']?>" name="<?= $meta['user_meta']?>" type="<?= $meta['user_meta_type']?>" /><br><br>
		<?php endforeach; ?>

		<div class="chek"><input style='width:40px; height: 30px' id="chekid" name="chek" type="checkbox" />

			Я даю згоду інтернет-магазину remeslodr.in.ua отримувати, зберігати і використовувати мої персональні дані: ім'я, прізвище, по батькові, поштову адресу, телефону, адресу електронної пошти для оформлення договорів купівлі-продажу, здійснення платежів, оформлення прийому-передачі товарів, оповіщення під час виконання замовлень, поширення комерційних електронних повідомлень і т.д. Мої персональні дані не можуть надаватися третім особам без моєї письмової згоди, за винятком випадків, передбачених законодавством України. 
		</div><br><br>						
		<div class = "text-center">
			<button class="btn btn-info" id="btn-chek" name="submit" type="submit">Зареєструвати</button>
		</div>  
	</fieldset>
</form>

<?php include 'views/layouts/footer.php';?>