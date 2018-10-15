<?php include 'views/layouts/header.php';?>
<div class="text-center col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>

	<div class="text-center col-lg-4 col-md-4 col-sm-12 col-xs-12">	
		<div id='regVue' class = "authlog">
		<div class="input-group margin-bottom-sm">
			<span class="input-group-addon"><i class="fa fa-sign-in fa-fw"></i></span>
			<input class="btnwidth form-control" v-model.lazy="login" autofocus placeholder="Введите логин">
			<b-btn class="btnPopover" size="sm" v-b-popover.hover="'введите логин, который Вы выбрали при регистрации'" title="ЛОГИН" variant="info">
				<span class=""><i class="fa fa-info-circle fa-lg fa_custom" aria-hidden="true"></i></span>
			</b-btn>
		</div>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
			<input class="btnwidth form-control" v-model.lazy="password" type="password" placeholder="Введите пароль">
			<b-btn class="btnPopover" size="sm" v-b-popover.hover="'введите пароль, который Вы выбрали при регистрации'" title="ПАРОЛЬ" variant="info">
				<span class=""><i class="fa fa-info-circle fa-lg fa_custom" aria-hidden="true"></i></span>
			</b-btn>
		</div>
		<div class="btnReg">		
			<button @click="submit()" class="btnwidth btn btn-info btn-sm">войти </button>			
			<a href='author' class="btnwidth btn btn-primary btn-sm">регистрация</a>
		
			<div class="warningUser text-center" v-show="errorAuthorization==true">
				{{errMesage}}
			</div>
	</div>
	</div>
</div>

<?php include 'views/layouts/footer.php';?>
<script src="../js/registerVue.js"></script>