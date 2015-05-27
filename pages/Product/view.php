<script>
var OSC = angular.module('OSC',[]);
OSC.controller("productctrl",function($scope,$http){
	$http.post(HOME_PATH + "index.php/services/Product.xml").success(function(data){
			$scope.products = data;
			$scope.Category = "<?php echo $GLOBALS['url'][5]; ?>";
			console.log(data);
	});
	$scope.addCart = function(Id,Price){
		$http.post(HOME_PATH + "index.php/services/SessionHandler.xml").success(function(data){
			var Data = data;
			if (Data.error == "Unauthorized"){
				alert("Please login first");
			}else{
				$.ajax({
				method:"post",
				url:HOME_PATH + "index.php/services/Cart.xml",
				data:{call:'add',CustId:1,ItemId:Id,Price:Price},
				success:function(data){
					var data = JSON.parse(data);
					alert(data.error);
				},
				async:false
				});
			}
		});
	}
});
</script>
<section id="advertisement">
		<div class="container">
			<img src="<?php echo HOME_PATH ?>assets/images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	<section ng-controller="productctrl">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Products</h2>
						<div class="col-sm-4" ng-repeat="product in products" ng-if="product.Category == Category">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img ng-src="<?php echo HOME_PATH; ?>upload/Images/{{product.Imageurl}}" />
										<h2>{{product.Price}}</h2>
										<p>{{product.Name}}</p>
										<a href="" class="btn btn-default add-to-cart" ng-click="addCart(product.ID,product.Price)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>{{product.Price}}</h2>
											<p>{{product.Name}}</p>
											<a href="" class="btn btn-default add-to-cart" ng-click="addCart(product.ID,product.Price)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
