<script>
var OSC = angular.module('OSC',[]);
OSC.controller("loginctrl",function($scope,$http){
	$scope.login = function(){
		$.ajax({
			method:"post",
			url:HOME_PATH + "index.php/services/User.xml",
			data:{
				call:"login",
				Username:$("#username").val(),
				Pwd:$("#password").val()},
			success:function(data){
				var Data = JSON.parse(data);
				if (Data.error == "login successfully"){
					window.location = HOME_PATH + "index.php";
				}else{
					alert(Data.error);
				}	
			},
			async:false
		});
	};
	$scope.register = function(){
		$.ajax({
			method:"post",
			url:HOME_PATH + "index.php/services/User.xml",
			data:{
				call:"signup",
				txt_Name:$("#txt_Name").val(),
				txt_Username:$("#txt_Username").val(),
				txt_Password:$("#txt_Password").val(),
				txt_EMail:$("#txt_EMail").val()
			},
			success:function(data){
				var Data = JSON.parse(data);
				alert(Data.error);	
			},
			async:false
		});
	};
});
</script>
	<section id="form" ng-controller="loginctrl"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form onsubmit="return false;">
							<input type="text" placeholder="Username" id="username" />
							<input type="password" placeholder="Password" id="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" ng-click="login()" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form onsubmit="return false;">
							<input type="text" placeholder="Full Name" id="txt_Name"/>
							<input type="text" placeholder="username" id="txt_Username"/>
							<input type="email" placeholder="Email Address" id="txt_EMail"/>
							<input type="password" placeholder="Password" id="txt_Password"/>
							<button type="submit" ng-click="register()" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->