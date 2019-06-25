<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản Phẩm mới </h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm </p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($new_product as $new)
								<div class="col-sm-3">
									<div class="single-item">
										@if($new->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="/product/{{$new->id}}"><img src="source/image/product/{{$new->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price">
											@if($new->promotion_price==0)
												<span class="flash-sale">{{$new->unit_price}}</span>
											@else
												<span class="flash-del">{{$new->unit_price}}</span>
												<span class="flash-sale">{{$new->promotion_price}}</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
							</div>
							<div class="row">
								{!! $new_product->links() !!}
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản Phẩm Khuyến Mãi </h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sanpham_khuyenmai)}} sản phẩm </p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sanpham_khuyenmai as $spkm)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="/saleproduct/{{$spkm->id}}"><img src="source/image/product/{{$spkm->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spkm->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{$spkm->unit_price}}</span>
												<span class="flash-sale">{{$spkm->promotion_price}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div class="row">
								{!! $sanpham_khuyenmai->links() !!}
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
