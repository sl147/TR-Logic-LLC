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
			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
					<div class="heightDivInput">
						<label  class="text-right lab" for="login">
							Логін
						</label>
						<input autofocus type="text" @keyup.enter="clickEnter()" v-model.lazy="login" placeholder = "введите свой логин" />
						<div class="warningTXT text-center" v-show="errUser">
							{{errUser}}
						</div>
					</div>
				</div>				
				<div class="text-center col-lg-1 col-md-1 col-sm-12 col-xs-12">
					<b-btn size="sm" v-b-popover.hover="'логин должен быть больше 3 символов и содержать только буквы и цифры'" title="Логин" variant="primary">
						<span<i class="fa fa-info-circle fa-lg fa_custom" aria-hidden="true"></i></span>
					</b-btn>
				</div>
			</div>		
			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
				<div class="heightDivInput">				
						<label class="text-right lab" for="password">
							Пароль
						</label>
						<input type="password" @keyup.enter="clickEnter()" v-model.lazy="password" placeholder = "введите пароль" />					
						<div class="warningTXT text-center" v-show="isPassword">
							{{errMesage}}
						</div>
					</div>
				</div>				
				<div class="text-center col-lg-1 col-md-1 col-sm-12 col-xs-12">
					<b-btn size="sm" v-b-popover.hover="'пароль должен быть больше 5 символов'" title="Пароль" variant="primary">
						<span><i class="fa fa-info-circle fa_custom fa-lg" aria-hidden="true"></i></span>
					</b-btn>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">			
			<div class="heightDivInput">
				<label  class="text-right lab" for="passwordConfirm">
					Повторите пароль
				</label>
				<input type="password" @keyup.enter="clickEnter()" v-model.lazy="passwordconfirm" placeholder = "введите пароль ещё раз" />
				<div class="warningTXT text-center" v-show="isConfirmPassword">
					{{errMesage}}
				</div>
			</div>
				</div>				
				<div class="text-center col-lg-1 col-md-1 col-sm-12 col-xs-12">
					<b-btn size="sm" v-b-popover.hover="'введите повторно пароль'" title="Повторение пароля" variant="primary">
						<span><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i></span>
					</b-btn>
				</div>
			</div>
			<div v-for="meta in metas">
				<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
				<div class="heightDivInput">
					<label class="text-right">
						{{meta.user_meta_name}}
					</label>
					<input v-model="meta.value" />
				</div>
				</div>				

				</div>				
			</div>
			<div class="warningMeta">
				<div class="text-center" v-show="errorMeta">
					{{errMesageMeta}}
				</div>
			</div>
			<div class="chek">
				<input style='width:40px; height: 30px' v-model="chek" type="checkbox" />
				Я согласен(на) на использование моих персональных данных для сайта ...
			</div><br>
			<div class="warningConfirm">
				<div class="text-center" v-show="isDisabled">
					Для регистрации подтвердите своё согласие
					на использование Ваших персональных данных
				</div>
			</div>
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