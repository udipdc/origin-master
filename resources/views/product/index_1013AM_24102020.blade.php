@extends('layouts.app')

@section('content')
<link href="{{asset('front/css/themecss/so_advanced_search.css')}}" rel="stylesheet">
<link id="color_scheme" href="{{asset('front/css/theme.css')}}" rel="stylesheet">
<link href="{{asset('front/js/lightslider/lightslider.css')}}" rel="stylesheet">

         <!-- Main Container  -->
         <div class="main-container container">
            <ul class="breadcrumb">
               <li><a href="#"><i class="fa fa-home"></i></a></li>
               <li><a href="#">Products</a></li>
            </ul>
            <div class="row">
               <!--Middle Part Start-->
               <div id="content" class="col-md-12 col-sm-12">
                  <div class="products-category">
                     <h3 class="title-category ">Products</h3>
                     <!--changed listings-->
                     <div class="products-list row nopadding-xs so-filter-gird">
                        @foreach($productList as $product)
                           <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                              <div class="product-item-container item--static">
                                 <div class="left-block">
                                    <div class="product-image-container second_img">
                                       <a href="product.html" target="_self" title="DPicanha porkcho">
                                          @if($product->product_image!="")
                                             <img src="{{ url('product/'.$product->product_image) }}" class="img-1 img-responsive" alt="image1">
                                             <img src="{{ url('product/'.$product->product_image) }}" class="img-2 img-responsive" alt="image2">
                                          @else
                                             <img src="image/catalog/demo/product/270/2.jpg" class="img-1 img-responsive" alt="image1">
                                             <img src="image/catalog/demo/product/270/3.jpg" class="img-2 img-responsive" alt="image2">
                                          @endif
                                       </a>
                                    </div>
                                    <!--quickview--> 
                                    <div class="so-quickview">
                                       <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-search"></i><span>Quick view</span></a>
                                    </div>
                                    <!--end quickview-->
                                 </div>
                                 <div class="right-block">
                                    <div class="button-group cartinfo--static">                                                
                                       <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i></button>
                                       <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">
                                       <span>Add to cart </span>   
                                       </button>
                                       <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-refresh"></i></button>                                                    
                                    </div>
                                    <h4><a href="product.html" title="Picanha porkcho" target="_self">{{ $product->product_name }}</a></h4>
                                    <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    </div>
                                    <div class="price">
                                       <span class="price">$89.00</span>
                                    </div>
                                    <div class="description item-desc">
                                       <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                    </div>
                                    <div class="list-block">
                                       <button class="addToCart btn-button" type="button" title="Add to Cart" onclick="cart.add('101', '1');"><i class="fa fa-shopping-basket"></i>
                                       </button>
                                       <button class="wishlist btn-button" type="button" title="Add to Wish List" onclick="wishlist.add('101');"><i class="fa fa-heart"></i>
                                       </button>
                                       <button class="compare btn-button" type="button" title="Compare this Product" onclick="compare.add('101');"><i class="fa fa-refresh"></i>
                                       </button>
                                       <!--quickview-->                                                      
                                       <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i></a>                                                        
                                       <!--end quickview-->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        @endforeach
                     </div>
                     <!--// End Changed listings-->
                     <!-- Filters -->
                     <div class="product-filter product-filter-bottom filters-panel">
                        <div class="row">
                           <div class="col-sm-6 text-left"></div>
                           <div class="col-sm-6 text-right">Showing 1 to 12 of 12 (1 Pages)</div>
                        </div>
                     </div>
                     <!-- //end Filters -->
                  </div>
               </div>
               <!--Middle Part End-->
            </div>
            <!--Middle Part End-->
         </div>
         <!-- //Main Container -->

@endsection

@section('page-js-script')
    <script type="text/javascript">@if($message = Session::get('success')) var success_msg = "{!! $message !!}"; @endif @if($message = Session::get('error')) var error_msg = "{!! $message !!}"; @endif</script>
@endsection