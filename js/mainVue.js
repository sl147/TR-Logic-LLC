var user = new Vue ({
	el: "#userVue",
	data: {
		select : '../components/SelUser.php?login=',
		selectMeta: '../components/selMeta.php',
		register: '../components/register.php?login=',
		registerMeta: '../components/registerMeta.php?id=',
		login: '',			
		password: '',
		passwordconfirm: '',
		isUser: false,
		isPassword: false,
		isConfirmPassword: false,
		chek: false,
		isDisabled:true,
		userId: '',
		metas:[],
		errMesage: '',
		errorRegistration: false,
		errorMeta: false,
		errMesageMeta:false,
		errUser: false,
		regex: /^[a-zA-Z0-9- ]*$/

	},	
	methods: {	
		registerInBase: function() {
			const request = this.register+this.login+'&password='+this.password
			axios.get(request)
			.then(response => {
				this.userId = response.data
				this.registerMetaInBase()				
			})
			.catch(err => {
    		console.log(err)
			})
		},			
		registerMetaInBase: function() {
			for (let meta of this.metas) {
				const req = this.registerMeta+parseInt(this.userId,10)+'&meta='+parseInt(meta.id,10)+'&value='+meta.value
				axios.get(req)
					.then(response => {
						location = 'profile/'+parseInt(this.userId,10)
					})
					.catch(err => {
	        			console.log(err)
				})							
			}
		},
		validatePhone: function (phone) {
	      const re = /^\d[\d\(\)\ -]{4,14}\d$/
	      return re.test(phone);
	    },				
		validateEmail: function (email) {
	      const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	      return re.test(email);
	  	},
	  	validate: function() {
	  		this.errorMeta = false
	  		this.errMesageMeta = ''
			for (let meta of this.metas) {
				if (meta.value.length > 0) {						
					if (meta.user_meta_type == 'email') {
						if (!this.validateEmail(meta.value)) {
							this.errorMeta = true
							this.errMesageMeta = 'Неверный адрес e-mail'
							return false
						}							
					}
					if (meta.user_meta_type == 'tel') {
						if (!this.validatePhone(meta.value)) {
							this.errorMeta = true
							this.errMesageMeta = 'Неверный номер телефона'
							return false
						}							
					}
				}
			}
			return true
	  	},			
		submit: function() {
			this.errorRegistration = false
			this.errorMeta = false
							
			if (this.login.length == 0) {
				this.errMesage = 'Извините, но не введён логин'
				this.errorRegistration = true
				return
			}
			if (this.password.length == 0) {
				this.errMesage = 'Извините, но не введено пароль'
				this.errorRegistration = true
				return
			}
			if (this.passwordconfirm.length == 0) {
				this.errMesage = 'Извините, но не введено подтверждение пароля'
				this.errorRegistration = true
				return
			}
			if (!this.validate()) return false
			if (!this.isUser && !this.isPassword && !this.isConfirmPassword) {
				this.registerInBase()
			}
			else {
				this.errorRegistration = true
				this.errMesage = 'Извините, введены некорректные данные'
			}
		},
		verifyRegEx: function (v) {
			if(this.regex.test(v) == false) {
				return 'можна использовать только буквы и цифры'
			}
			return false
		},
		verifyLogin: function(v) {
			this.errMesage = ''
			this.errUser = false
			if (v.length < 4) {
				this.errUser = 'логин должен содержать не меньше 4 сиволов'
				return
			}
			if (v.length > 0) {
				if(this.verifyRegEx(v)) {
					this.errMesage = this.verifyRegEx(v)
					return
				}
				axios.get(this.select+v)
				.then(response => {
					this.isUser  = response.data
					this.errUser = this.isUser ? 'Извините, но логин '+this.login+ ' занят' : false
				})
				.catch(err => {
	    		console.log(err)
				})
			}			
		},
		verifyPassword: function(v) {
			this.isPassword = false
			this.errMesage = ''
			if(v.length < 6) {
				this.isPassword = true
				this.errMesage = 'Извините, но пароль должен быть больше 5 символов'
				return
			}
			if(this.verifyRegEx(v)) {
				this.isPassword = true
				this.errMesage = this.verifyRegEx(v)
				return
			}
		},
		verifyPasswordConfirm: function(v) {
			this.isConfirmPassword = false
			this.errMesage = ''
			if(v != this.password) {
				this.isConfirmPassword = true
				this.errMesage = 'Извините, но пароль не совпадает с подтверждением'
				return
			}
		},
		getMeta: function() {
			axios.post(this.selectMeta)
			.then(response => {
				this.metas = response.data
				for (let meta of this.metas) {
					meta.value = ''
				}
			})
			.catch(err => {
    		console.log(err)
			})
		},
		clickEnter: function() {
			this.errMesage = 'для перехода к следующему полю ввода используйте мышку'
			this.errorRegistration = true
		}
	},
	watch: {	
		login:  function (val) {
			this.isUser = false
			this.verifyLogin(val)
			this.errorRegistration = false
		},
		password:  function (val) {
			this.errorRegistration = false			
			this.verifyPassword(val)
		},
		passwordconfirm:  function (val) {
			this.errorRegistration = false
			this.verifyPasswordConfirm(val)
		},
		chek: function(val){
			this.isDisabled = !this.chek
		},
	},
	created: function() {
		this.getMeta()	
	}
})