<?php include 'views/layouts/header.php';?>

<div class="text-center col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
<div class="text-center col-lg-6 col-md-6 col-sm-12 col-xs-12">	
	<div id='userVue'>
		<div class="warningSubmit">
			<div class="text-center" v-show="errorRegistration">
				{{errMesage}}
			</div>
		</div>
		<div class = "auth">
			<legend>
				<div class="authTitle text-center">
					<b>Регистрация</b> <br> (поля отмеченные
					<span class="lab">
						красным 
					</span>
					обязательны к заполнению)
				</div>
			</legend>

			<div class="heightDivInput">
				<label  class="text-right lab" for="login">
					Логін
				</label>
				<input autofocus type="text"  v-model.lazy="login" placeholder = "введите свой логин" />
				<div class="warningTXT text-center" v-show="isUser">
					Извините, но логин {{login}} занят
				</div>
			</div>	
			<div class="heightDivInput">
				<label class="text-right lab" for="password">
					Пароль
				</label>
				<input type="password" v-model.lazy="password" placeholder = "введите пароль больше 5 символов" />
				<span><i class="fa fa-info-circle  fa-fw"></i></span>
				<div class="warningTXT text-center" v-show="isPassword">
					Извините, но пароль должен быть больше 5 символов
				</div>
			</div>

			<div class="heightDivInput">
				<label  class="text-right lab" for="passwordConfirm">
					Повторите пароль
				</label>
				<input type="password" v-model.lazy="passwordconfirm" placeholder = "введите пароль ещё раз" />
				<div class="warningTXT text-center" v-show="isConfirmPassword">
					Извините, но пароль не совпадает с подтверждением
				</div>
			</div>

			<div v-for="meta in metas">
				<div class="heightDivInput">
					<label class="text-right">
						{{meta.user_meta_name}}
					</label>
					<input id="" v-model="meta.value" />
				</div>
			</div>
			<div class="warningMeta">
				<div class="text-center" v-show="errorMeta">
					{{errMesageMeta}}
				</div>
			</div>
			<div class="chek">
				<input style='width:40px; height: 30px' id="chekid" v-model="chek" type="checkbox" />
				Я согласен(на) на использование моих персональных данных для сайта ...
			</div><br><br>						
			<div class = "text-center">
				<button v-bind:disabled="isDisabled" @click="submit()" class="btn btn-info" id="btn-chek" >
					Зарегистрировать
				</button>
			</div> 
		</div>
	</div>
</div>


<?php include 'views/layouts/footer.php';?>
<script src="../js/mainVue.js"></script>
