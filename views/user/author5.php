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
<table>
			<tr >
				<td  class="heightDivInput text-right lab" for="login">
					Логін
				</td>
				<td class="heightDivInput">
				<input size='60' autofocus type="text"  v-model.lazy="login" placeholder = "введите свой логин" />
				
				</td>
				<td class="heightDivInput">					
					<b-btn size="sm" v-b-popover.hover="'логин должен быть больше 3 символов'" title="Логин" variant="primary">
						<span class=""><i class="fa fa-info-circle fa-lg fa_custom" aria-hidden="true"></i></span>
					</b-btn>					
				</td>
			</tr>
			<tr  class="heightDivShow" v-show="errUser">
				<div class="warningTXT text-center" >
				
					<td colspan='3'>
						{{errUser}}
					</td>
				
				</div>
			</tr>	
			<tr class="heightDivInput">
				<td class="text-right lab" for="password">
					Пароль
				</td>
				<td>
				<input size='60' type="password" v-model.lazy="password" placeholder = "введите пароль больше 5 символов" />
				
				<div class="warningTXT text-center" v-show="isPassword">
					Извините, но пароль должен быть больше 5 символов
				</div>
				</td>
				<td>					
					<b-btn size="sm" v-b-popover.hover="'пароль должен быть больше 5 символов'" title="Пароль" variant="primary">
						<span><i class="fa fa-info-circle fa_custom fa-lg" aria-hidden="true"></i></span>
					</b-btn>					
				</td>
			</tr>

			<tr class="heightDivInput">
				<td class="text-right lab" for="passwordConfirm">
					Повторите пароль
				</td>
				<td>
				<input size='60' type="password" v-model.lazy="passwordconfirm" placeholder = "введите пароль ещё раз" />
				<div class="warningTXT text-center" v-show="isConfirmPassword">
					Извините, но пароль не совпадает с подтверждением
				</div>
				</td>
				<td>					
					<b-btn size="sm" v-b-popover.hover="'введите повторно пароль'" title="Повторение пароля" variant="primary">
						<span><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i></span>
					</b-btn>					
				</td>
			</tr>

			<tr v-for="meta in metas" class="heightDivInput">
					<td class="text-right">
						{{meta.user_meta_name}}
					</td>
					<td>
					<input size='60' v-model="meta.value" />
					</td>
					<td></td>
			</tr>
</table>			
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
