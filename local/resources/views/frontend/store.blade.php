@extends('frontend.master')
@section('title','Danh Sách Sản Phẩm')
@section('main')
@section('header')
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="css/slick.css"/>
<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="css/font-awesome.min.css">

@stop

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="{{asset('/')}}">Home</a></li>
					<li class="active">
						@foreach($_prods_cate as $key=>$value)
						@if($key==0)
						{{$value->cate_name}} ({{count($_prods_cate)}})
						@endif
						@endforeach
					</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->
			<div id="aside" class="col-md-3">
				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Danh Mục</h3>
					<div class="checkbox-filter">
						<form onchange="">
							@foreach($cate_childrens as $key=>$value)
							<div class="input-checkbox">
								<input type="checkbox" name="{{$value->cate_name}}" value="{{$value->cate_name}}" id="category-{{$key}}">
								<label for="category-{{$key}}">
									<span></span>
									{{$value->cate_name}}
									<small>({{($key+2)*12}})</small>
								</label>
							</div>
							@endforeach
						</form>
					</div>
				</div>
				<!-- /aside Widget -->
				<!-- aside Widget -->
				<!-- <div class="aside">
					<h3 class="aside-title">Top selling</h3>
					<div class="product-widget">
						<div class="product-img">
							<img src="./img/product01.png" alt="">
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
						</div>
					</div>

					<div class="product-widget">
						<div class="product-img">
							<img src="./img/product02.png" alt="">
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
						</div>
					</div>

					<div class="product-widget">
						<div class="product-img">
							<img src="./img/product03.png" alt="">
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
						</div>
					</div>
				</div> -->
				<!-- /aside Widget -->
			</div>
			<!-- /ASIDE -->

			<!-- STORE -->
			<div id="store" class="col-md-9">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="store-sort">
						<label>
							Sort By:
							<select class="input-select">
								<option value="0">Popular</option>
								<option value="1">Position</option>
							</select>
						</label>

						<label>
							Show:
							<select class="input-select">
								<option value="0">10</option>
								<option value="1">50</option>
							</select>
						</label>
					</div>
					<ul class="store-grid">
						<li class="active"><i class="fa fa-th"></i></li>
						<!-- <li><a href="#"><i class="fa fa-th-list"></i></a></li> -->
					</ul>
				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">
					<!-- product -->
					@foreach($_prods_cate as $prods_cate)
					<div class="col-md-4 col-xs-6">
						<!-- product -->
						<div class="product">
							<a href="{{asset('chitietsanpham/'.$prods_cate->prod_id.'/'.$prods_cate->prod_slug.'.html')}}">
								<div class="product-img">
									<img src="../images/products/{{$prods_cate->prod_img}}" alt="{{$prods_cate->prod_img}}">
									<div class="product-label">
										<!-- <span class="sale">-30%</span> -->
										<span class="new">NEW</span>
									</div>
								</div>
							</a>
							<div class="product-body">
								<p class="product-category">{{$prods_cate->cate_name}}</p>
								<h3 class="product-name"><a href="{{asset('chitietsanpham/'.$prods_cate->prod_id.'/'.$prods_cate->prod_slug.'.html')}}">{{$prods_cate->prod_name}}</a></h3>
								<h4  class="product-price">Giá  <del class="product-old-price">Liên Hệ</del></h4>
								<div class="product-rating">
									@for($i=1;$i<=5;$i++)
									@if($i<=$prods_cate->prod_rate)
									<i class="fa fa-star"></i>
									@else
									<i class="fa fa-star-o"></i>
									@endif
									@endfor
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view" onclick="window.location.href='{{asset('chitietsanpham/'.$prods_cate->prod_id.'/'.$prods_cate->prod_slug.'.html')}}'"><i class="fa fa-eye"></i><span class="tooltipp">Xem Chi Tiết</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn" onclick="window.location.href='{{asset('checkout/add/'.$prods_cate->prod_id.'?qty=1')}}'"><i class="fa fa-shopping-cart"></i> Thêm Vào báo Giá</button>
							</div>
						</div>
						<!-- /product -->
					</div>
					@endforeach
					<!-- /product -->
				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					@if(count($_prods_cate)>9)
					<span class="store-qty">đang hiển thị 10-100 Sản Phẩm</span>
					@elseif(count($_prods_cate)>=1 && count($_prods_cate)<= 9)
					<span class="store-qty">đang hiển thị dới 10 Sản Phẩm</span>
					@elseif(count($_prods_cate)== 0)
					<span class="store-qty">chưa có Sản Phẩm trong danh mục này</span>
					@endif
					<ul class="store-pagination"> 
						{{$_prods_cate->links()}}
					</ul>
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->


@section('script')
<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

@stop
@stop