@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($cart_content as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ URL :: to($cart -> attributes -> image) }}" height = "80px" width = "80px"alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $cart -> name }}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{ $cart -> price }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action = "{{ url('/update-cart')}}" method = "post">
									    {{ csrf_field() }}
										<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart -> quantity }}" autocomplete="off" size="2">
										<input type = "hidden" name = "item_id" value = "{{ $cart -> id }}">
										<button type = "submit" class = "btn btn-sm btn-default">update</button>
									</form>
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ $cart -> getPriceSum() }}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ URL :: to('/delete-cart-item/'.$cart -> id) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{ Cart::getSubTotal() }}.00</span></li>
							<li>Eco Tax <span>0.00</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{ Cart::getTotal() }}.00</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>

							@if(Session :: get('user_name') == NULL)
							<a class="btn btn-default check_out" href="{{ URL :: to('/user-login') }}">Check Out</a>
							@else
							<a class="btn btn-default check_out" href="{{ URL :: to('/checkout') }}">Check Out</a>
							@endif 
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection