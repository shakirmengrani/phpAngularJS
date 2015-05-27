<script>
var OSC = angular.module('OSC',[]);
OSC.controller("cartctrl",function($scope,$http){	
	var getData = function(){
		var Data = $.ajax({
			method:"post",
			url: HOME_PATH + "index.php/services/Cart.xml",
			data:{call:'get'},
			success:function(data){
				return data;
			},
			async:false
		});
		$scope.cartData = JSON.parse(Data.responseText);
	}
	$scope.getQty = function(row){
		return $("[name='quantity_" + row + "']").val();
	}
	$scope.editQty = function(flag,row){
		var defQty = $("[name='quantity_" + row + "']").val();
		if (flag == 1){
			$("[name='quantity_" + row + "']").val(parseInt(defQty) + 1);
		}else if (flag == 0){
			if (parseInt(defQty) == 0){
			}else{
				$("[name='quantity_" + row + "']").val(parseInt(defQty) - 1);
			}
		}
	}
	$scope.removeItem = function(row){
		var Data = $.ajax({
		method:"post",
		url: HOME_PATH + "index.php/services/Cart.xml",
		data:{call:'remove',ItemId:row},
		success:function(data){
			var Data  = JSON.parse(data);
			alert(Data.error);
			getData();
		},
		async:false
	});
	}
	getData();
});
</script>
<section id="cart_items" ng-controller="cartctrl">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="item in cartData">
							<td class="cart_product">
								<a href=""><img src="<?php echo HOME_PATH ?>assets/images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{item.Name}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price" style="text-align:right">
								<p>
								Price : {{item.Price}}<br />
								Discount : {{item.Discount}}<hr />
								Net : {{item.Net}}
								</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="javascript:void(0)" ng-click="editQty(1,item.ID)"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity_{{item.ID}}" value="{{item.Qty}}" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="javascript:void(0)" ng-click="editQty(0,item.ID)"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{item.Net * getQty(item.ID)}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="javascript:void(0)" ng-click="removeItem(item.ID)"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->