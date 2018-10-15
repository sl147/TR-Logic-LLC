$(document).ready(function(){
	var user = new Vue ({
		el: "#regVue",
		data: {
			select : '../components/SelUser.php?login=',
			verifyUser : '../components/VerifyUser.php?login=',
			getUser : '../components/getUserByLogin.php?login=',
			login:'',
			password: '',
			isUser: true,
			userId: '',
			errMesage: '',
			errorAuthorization: false,
		},	
		methods: {
			verifyLogin: function(v) {
				this.$http.get(this.select+v).then(function (response) {
					this.isUser  = JSON.parse(response.data)
					if (!this.isUser) {
						this.errMesage = 'Извините, но логин '+this.login+ ' не зарегистрирован' 
						this.errorAuthorization = true
					}
				},function (error){
					console.log(error);
				})
			},
			getIdUser: function() {
				axios.get(this.getUser+this.login)
				.then(response => {
					const idUser = response.data
					this.userId	= idUser.id
					location = 'profile/'+this.userId
				})
				.catch(err => {
					console.log(err)
				})			
			},
			submit: function() {
				if (this.login.length == 0) {
					this.errMesage = 'не введено логин'
					this.errorAuthorization = true
					return
				}
				if (this.password.length == 0) {
					this.errMesage = 'не введено пароль'
					this.errorAuthorization = true
					return
				}
				var req = this.verifyUser+this.login+'&password='+this.password
				this.$http.get(req).then(function (response) {
					this.isUser = JSON.parse(response.data)
					this.getIdUser()
				},function (error){
					console.log(error)
				})				
			}
		},
		watch: {
			login: function(val) {
				this.errorAuthorization = false
				if (val.length > 0) {this.verifyLogin(val)}
			}
	}
})
});