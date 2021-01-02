<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Basic page needs
         ============================================ -->
      <title>Autoparts - Multipurpose Responsive HTML5 Template</title>
      <meta charset="utf-8">
      <meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
      <meta name="description" content="SuperMarket is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
      <meta name="author" content="Magentech">
      <meta name="robots" content="index, follow" />
      <!-- Mobile specific metas
         ============================================ -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <!-- Favicon
         ============================================ -->
      <link rel="shortcut icon" type="image/png" href="ico/favicon-16x16.png"/>
      <!-- Libs CSS
         ============================================ -->
      <link rel="stylesheet" href="{{asset('front/css/bootstrap/css/bootstrap.min.css')}}">
      <link href="{{asset('front/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
      <link href="{{asset('front/js/datetimepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
      <link href="{{asset('front/js/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
      <link href="{{asset('front/css/themecss/lib.css')}}" rel="stylesheet">
      <link href="{{asset('front/js/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">
      <link href="{{asset('front/js/minicolors/miniColors.css')}}" rel="stylesheet">
      <link href="{{asset('front/js/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet">
      <link href="{{asset('front/pe-icon-7-stroke/css/helper.css')}}" rel="stylesheet">
      <!-- Theme CSS
         ============================================ -->
      <link href="{{asset('front/css/themecss/so_searchpro.css')}}" rel="stylesheet">
      <link href="{{asset('front/css/themecss/so_megamenu.css')}}" rel="stylesheet">
      <link href="{{asset('front/css/themecss/so_advanced_search.css')}}" rel="stylesheet">
      <link href="{{asset('front/css/themecss/so-listing-tabs.css')}}" rel="stylesheet">
      <link href="{{asset('front/css/themecss/so-categories.css')}}" rel="stylesheet">
      <link href="{{asset('front/css/themecss/so-newletter-popup.css')}}" rel="stylesheet">
      <link href="{{asset('front/css/themecss/so-latest-blog.css')}}" rel="stylesheet">
      <link href="{{asset('front/css/footer/footer1.css')}}" rel="stylesheet">
      <link href="{{asset('front/css/header/header1.css')}}" rel="stylesheet">
      <link id="color_scheme" href="{{asset('front/css/theme.css')}}" rel="stylesheet">
      <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
      <link href="{{asset('front/js/lightslider/lightslider.css')}}" rel="stylesheet">
      <!-- Google web fonts
         ============================================ -->
      <link href='https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500,600,700' rel='stylesheet' type='text/css'>
      <style type="text/css">
         body{font-family:'Rubik', sans-serif;}
      </style>
   </head>
   <body class="res layout-1">
      <div id="wrapper" class="wrapper-fluid banners-effect-5">
         <!-- Header Container  -->
         <header id="header" class=" typeheader-1">
            <!-- Header Top -->
            <div class="header-top hidden-compact">
            </div>
            <div class="header-middle">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <div class="logo">
                           <a href="index.html"><img src="image/catalog/logo.png" title="Your Store" alt="Your Store" /></a>
                        </div>
                     </div>
                     <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 middle-right">
                        <div class="main-menu-w">
                           <div class="responsive so-megamenu megamenu-style-dev">
                              <nav class="navbar-default">
                                 <div class=" container-megamenu  horizontal open ">
                                    <div class="navbar-header">
                                       <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                       <span class="icon-bar"></span>
                                       <span class="icon-bar"></span>
                                       <span class="icon-bar"></span>
                                       </button>
                                    </div>
                                    <div class="megamenu-wrapper">
                                       <span id="remove-megamenu" class="fa fa-times"></span>
                                       <div class="megamenu-pattern">
                                          <div class="container-mega">
                                             <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                <li class="">
                                                   <p class="close-menu"></p>
                                                   <a href="{{ url('/') }}" class="clearfix">
                                                   <strong>Home</strong>
                                                   </a>
                                                </li>
                                                <li class="with-sub-menu hover">
                                                   <p class="close-menu"></p>
                                                   <a href="#" class="clearfix">
                                                   <strong>Company</strong>
                                                   <b class="caret"></b>
                                                   </a>
                                                   <div class="sub-menu" style="width: 40%; ">
                                                      <div class="content" >
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <ul class="row-list">
                                                                  <li><a class="subcategory_item" href="faq.html">Quality</a></li>
                                                                  <li><a class="subcategory_item" href="sitemap.html">Vission  and mission</a></li>
                                                               </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <ul class="row-list">
                                                                  <li><a class="subcategory_item" href="about-us.html">Certificate</a></li>
                                                                  <li><a class="subcategory_item" href="about-us-2.html">Services</a></li>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </li>
                                                <li class="">
                                                   <p class="close-menu"></p>
                                                   <a href="{{ url('productList') }}" class="clearfix">
                                                   <strong>Product</strong>
                                                   <span class="label"></span>
                                                   </a>
                                                </li>
                                                <li class="">
                                                   <p class="close-menu"></p>
                                                   <a href="#" class="clearfix">
                                                   <strong>About US</strong>
                                                   <span class="label"></span>
                                                   </a>
                                                </li>
                                                <li class="">
                                                   <p class="close-menu"></p>
                                                   <a href="#" class="clearfix">
                                                   <strong>Distributors</strong>
                                                   <span class="label"></span>
                                                   </a>
                                                </li>
                                                <li class="">
                                                   <p class="close-menu"></p>
                                                   <a href="#" class="clearfix">
                                                   <strong>ContactUs</strong>
                                                   <span class="label"></span>
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </nav>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="header-bottom hidden-compact">
            </div>
         </header>
         <!-- //Header Container  -->
         <!-- Main Container  -->
         <div class="main-container container">
            <ul class="breadcrumb">
               <li><a href="#"><i class="fa fa-home"></i></a></li>
               <li><a href="#">Electronics</a></li>
            </ul>
            <div class="row">
               <!--Middle Part Start-->
               <div id="content" class="col-md-12 col-sm-12">
                  <div class="products-category">
                     <h3 class="title-category ">Accessories</h3>
                     <!--changed listings-->
                     <div class="products-list row nopadding-xs so-filter-gird">
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="DPicanha porkcho">
                                    <img src="image/catalog/demo/product/270/2.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/3.jpg" class="img-2 img-responsive" alt="image2">
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
                                    <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">
                                    <span>View Details</span>   
                                    </button>
                                 </div>
                                 <h4><a href="product.html" title="Picanha porkcho" target="_self">Picanha porkcho</a></h4>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Stickrum bresao">
                                    <img src="image/catalog/demo/product/270/3.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/4.jpg" class="img-2 img-responsive" alt="image2">
                                    </a>
                                 </div>
                                 <span class="label-product label-sale">-11%</span>
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
                                 <h4><a href="product.html" title="Stickrum bresao" target="_self">Stickrum bresao</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price-new">$85.00</span>
                                    <span class="price-old">$96.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Shoulder kevinis">
                                    <img src="image/catalog/demo/product/270/4.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/5.jpg" class="img-2 img-responsive" alt="image2">
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
                                 <h4><a href="product.html" title="Shoulder kevinis" target="_self">Shoulder kevinis</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$60.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Remporum stick">
                                    <img src="image/catalog/demo/product/270/5.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/6.jpg" class="img-2 img-responsive" alt="image2">
                                    </a>
                                 </div>
                                 <span class="label-product label-new">New</span>
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
                                 <h4><a href="product.html" title="Remporum stick" target="_self">Remporum stick</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$65.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Luis rute arure">
                                    <img src="image/catalog/demo/product/270/7.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/8.jpg" class="img-2 img-responsive" alt="image2">
                                    </a>
                                 </div>
                                 <span class="label-product label-sale">-15%</span>
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
                                 <h4><a href="product.html" title="Luis rute arure" target="_self">Luis rute arure</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price-new">$50.00</span>
                                    <span class="price-old">$59.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Sunt in culpa">
                                    <img src="image/catalog/demo/product/270/6.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/7.jpg" class="img-2 img-responsive" alt="image2">
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
                                 <h4><a href="product.html" title="Sunt in culpa" target="_self">Sunt in culpa</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$40.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Duis aute irure ">
                                    <img src="image/catalog/demo/product/270/8.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/9.jpg" class="img-2 img-responsive" alt="image2">
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
                                 <h4><a href="product.html" title="Volup tatem accu" target="_self">Volup tatem accu</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$60.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Volup tatem accu">
                                    <img src="image/catalog/demo/product/wheel_tires/6.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/wheel_tires/2.jpg" class="img-2 img-responsive" alt="image2">
                                    </a>
                                 </div>
                                 <span class="label-product label-new">New </span>
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
                                 <h4><a href="product.html" title="Volup tatem accu" target="_self">Volup tatem accu</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$48.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-layout">
                              <div class="product-item-container item--static">
                                 <div class="left-block">
                                    <div class="product-image-container second_img">
                                       <a href="product.html" target="_self" title="DPicanha porkcho">
                                       <img src="image/catalog/demo/product/wheel_tires/5.jpg" class="img-1 img-responsive" alt="image1">
                                       <img src="image/catalog/demo/product/wheel_tires/3.jpg" class="img-2 img-responsive" alt="image2">
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
                                    <h4><a href="product.html" title="Picanha porkcho" target="_self">Picanha porkcho</a></h4>
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
                        </div>
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Stickrum bresao">
                                    <img src="image/catalog/demo/product/wheel_tires/2.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/wheel_tires/4.jpg" class="img-2 img-responsive" alt="image2">
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
                                 <h4><a href="product.html" title="Stickrum bresao" target="_self">Stickrum bresao</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$85.00</span>                      
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-layout">
                              <div class="product-item-container item--static">
                                 <div class="left-block">
                                    <div class="product-image-container second_img">
                                       <a href="product.html" target="_self" title="Shoulder kevinis">
                                       <img src="image/catalog/demo/product/wheel_tires/4.jpg" class="img-1 img-responsive" alt="image1">
                                       <img src="image/catalog/demo/product/wheel_tires/5.jpg" class="img-2 img-responsive" alt="image2">
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
                                    <h4><a href="product.html" title="Shoulder kevinis" target="_self">Shoulder kevinis</a></h4>
                                    <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    </div>
                                    <div class="price">
                                       <span class="price">$60.00</span>
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
                        </div>
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Volup tatem accu">
                                    <img src="image/catalog/demo/product/270/1.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/2.jpg" class="img-2 img-responsive" alt="image2">
                                    </a>
                                 </div>
                                 <span class="label-product label-new">New</span>
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
                                 <h4><a href="product.html" title="Volup tatem accu" target="_self">Volup tatem accu</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$48.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="DPicanha porkcho">
                                    <img src="image/catalog/demo/product/270/2.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/3.jpg" class="img-2 img-responsive" alt="image2">
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
                                 <h4><a href="product.html" title="Picanha porkcho" target="_self">Picanha porkcho</a></h4>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Stickrum bresao">
                                    <img src="image/catalog/demo/product/270/3.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/4.jpg" class="img-2 img-responsive" alt="image2">
                                    </a>
                                 </div>
                                 <span class="label-product label-sale">-11%</span>
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
                                 <h4><a href="product.html" title="Stickrum bresao" target="_self">Stickrum bresao</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price-new">$85.00</span>
                                    <span class="price-old">$96.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Shoulder kevinis">
                                    <img src="image/catalog/demo/product/270/4.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/5.jpg" class="img-2 img-responsive" alt="image2">
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
                                 <h4><a href="product.html" title="Shoulder kevinis" target="_self">Shoulder kevinis</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$60.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Remporum stick">
                                    <img src="image/catalog/demo/product/270/5.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/6.jpg" class="img-2 img-responsive" alt="image2">
                                    </a>
                                 </div>
                                 <span class="label-product label-new">New</span>
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
                                 <h4><a href="product.html" title="Remporum stick" target="_self">Remporum stick</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$65.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Luis rute arure">
                                    <img src="image/catalog/demo/product/270/7.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/8.jpg" class="img-2 img-responsive" alt="image2">
                                    </a>
                                 </div>
                                 <span class="label-product label-sale">-15%</span>
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
                                 <h4><a href="product.html" title="Luis rute arure" target="_self">Luis rute arure</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price-new">$50.00</span>
                                    <span class="price-old">$59.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Sunt in culpa">
                                    <img src="image/catalog/demo/product/270/6.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/7.jpg" class="img-2 img-responsive" alt="image2">
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
                                 <h4><a href="product.html" title="Sunt in culpa" target="_self">Sunt in culpa</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$40.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Duis aute irure ">
                                    <img src="image/catalog/demo/product/270/8.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/270/9.jpg" class="img-2 img-responsive" alt="image2">
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
                                 <h4><a href="product.html" title="Volup tatem accu" target="_self">Volup tatem accu</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$60.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Volup tatem accu">
                                    <img src="image/catalog/demo/product/wheel_tires/6.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/wheel_tires/2.jpg" class="img-2 img-responsive" alt="image2">
                                    </a>
                                 </div>
                                 <span class="label-product label-new">New </span>
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
                                 <h4><a href="product.html" title="Volup tatem accu" target="_self">Volup tatem accu</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$48.00</span>
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-layout">
                              <div class="product-item-container item--static">
                                 <div class="left-block">
                                    <div class="product-image-container second_img">
                                       <a href="product.html" target="_self" title="DPicanha porkcho">
                                       <img src="image/catalog/demo/product/wheel_tires/5.jpg" class="img-1 img-responsive" alt="image1">
                                       <img src="image/catalog/demo/product/wheel_tires/3.jpg" class="img-2 img-responsive" alt="image2">
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
                                    <h4><a href="product.html" title="Picanha porkcho" target="_self">Picanha porkcho</a></h4>
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
                        </div>
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-item-container item--static">
                              <div class="left-block">
                                 <div class="product-image-container second_img">
                                    <a href="product.html" target="_self" title="Stickrum bresao">
                                    <img src="image/catalog/demo/product/wheel_tires/2.jpg" class="img-1 img-responsive" alt="image1">
                                    <img src="image/catalog/demo/product/wheel_tires/4.jpg" class="img-2 img-responsive" alt="image2">
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
                                 <h4><a href="product.html" title="Stickrum bresao" target="_self">Stickrum bresao</a></h4>
                                 <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                 </div>
                                 <div class="price">
                                    <span class="price">$85.00</span>                      
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
                        <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="product-layout">
                              <div class="product-item-container item--static">
                                 <div class="left-block">
                                    <div class="product-image-container second_img">
                                       <a href="product.html" target="_self" title="Shoulder kevinis">
                                       <img src="image/catalog/demo/product/wheel_tires/4.jpg" class="img-1 img-responsive" alt="image1">
                                       <img src="image/catalog/demo/product/wheel_tires/5.jpg" class="img-2 img-responsive" alt="image2">
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
                                    <h4><a href="product.html" title="Shoulder kevinis" target="_self">Shoulder kevinis</a></h4>
                                    <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    </div>
                                    <div class="price">
                                       <span class="price">$60.00</span>
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
                        </div>
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
         <!-- Footer Container -->
         <footer class="footer-container typefooter-1">
            <!-- Footer Top Container -->
            <div class="row-top">
               <div class="block-services container">
                  <div class="row">
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-margin1">
                        <div class="icon-service">
                           <div class="icon"><i class="pe-7s-car">&nbsp;</i></div>
                           <div class="text">
                              <h6>Free shipping</h6>
                              <p class="no-margin">On all orders over $99.00</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-margin1">
                        <div class="icon-service">
                           <div class="icon"><i class="pe-7s-refresh-2">&nbsp;</i></div>
                           <div class="text">
                              <h6>30 days return</h6>
                              <p class="no-margin">You have 30 days to return</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-margin">
                        <div class="icon-service">
                           <div class="icon"><i class="pe-7s-door-lock">&nbsp;</i></div>
                           <div class="text">
                              <h6>Safe Shopping<br></h6>
                              <p class="no-margin">Payment 100% secure</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="icon-service">
                           <div class="icon"><i class="pe-7s-users">&nbsp;</i></div>
                           <div class="text">
                              <h6>Online support</h6>
                              <p class="no-margin">Contact us 24 hours a day</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /Footer Top Container -->
            <!-- Footer middle Container -->
            <div class="container">
               <div class="row footer-middle">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-style">
                     <div class="box-footer box-infos">
                        <div class="module">
                           <h3 class="modtitle">Contact us</h3>
                           <div class="modcontent">
                              <ul class="list-icon">
                                 <li><span class="icon pe-7s-map-marker"></span>5611 Wellington Road, Suite 115, Gainesville, VA 20155</li>
                                 <li><span class="icon pe-7s-call"></span> <a href="#">888 9344 6000 - 888 1234 6789</a></li>
                                 <li><span class="icon pe-7s-mail"></span><a href="mailto:contact@opencartworks.com">contact@opencartworks.com</a></li>
                                 <li><span class="icon pe-7s-alarm"></span>7 Days a week from 10-00 am to 6-00 pm</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-style">
                     <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-style">
                           <div class="box-information box-footer">
                              <div class="module clearfix">
                                 <h3 class="modtitle">Information</h3>
                                 <div class="modcontent">
                                    <ul class="menu">
                                       <li><a href="#">About Us</a></li>
                                       <li><a href="#">FAQ</a></li>
                                       <li><a href="#">Warranty And Services</a></li>
                                       <li><a href="#">Support 24/7 page</a></li>
                                       <li><a href="#">Product Registration</a></li>
                                       <li><a href="#">Product Support</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-style">
                           <div class="box-account box-footer">
                              <div class="module clearfix">
                                 <h3 class="modtitle">My Account</h3>
                                 <div class="modcontent">
                                    <ul class="menu">
                                       <li><a href="#">Brands</a></li>
                                       <li><a href="#">Gift Certificates</a></li>
                                       <li><a href="#">Affiliates</a></li>
                                       <li><a href="#">Specials</a></li>
                                       <li><a href="#">FAQs</a></li>
                                       <li><a href="#">Custom Link</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-clear">
                           <div class="box-service box-footer">
                              <div class="module clearfix">
                                 <h3 class="modtitle">Categories</h3>
                                 <div class="modcontent">
                                    <ul class="menu">
                                       <li><a href="#">Event & Party Supplies</a></li>
                                       <li><a href="#">Home Improvement</a></li>
                                       <li><a href="#">Lamps & Light Fixtures</a></li>
                                       <li><a href="#">Kitchen & Bath Fixtures</a></li>
                                       <li><a href="#">Customer Service</a></li>
                                       <li><a href="#">Kitchen & Dining</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row row-dark">
                  <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12 col-socials">
                     <ul class="socials">
                        <li class="facebook"><a href="https://www.facebook.com/smartaddons.page" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="https://twitter.com/smartaddons" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="google_plus"><a href="https://plus.google.com/u/0/+Smartaddons/posts" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li class="pinterest"><a href="https://www.pinterest.com/smartaddons/" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                        <li class="instagram"><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li class="Youtube"><a href="#" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                     </ul>
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                     <div class="module newsletter-footer1">
                        <div class="newsletter">
                           <h3 class="modtitle">Sign Up for Newsletter</h3>
                           <div class="block_content">
                              <form method="post" id="signup" name="signup" class="form-group form-inline signup send-mail">
                                 <div class="form-group">
                                    <div class="input-box">
                                       <input type="email" placeholder="Your email address..." value="" class="form-control" id="txtemail" name="txtemail" size="55">
                                    </div>
                                    <div class="subcribe">
                                       <button class="btn btn-primary btn-default font-title" type="submit" onclick="return subscribe_newsletter();" name="submit">
                                       <span>Subscribe</span>
                                       </button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /Footer middle Container -->
            <!-- Footer Bottom Container -->
            <div class="footer-bottom">
               <div class="container">
                  <div class="row">
                     <div class="copyright col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <p>Autoparts © 2019 Demo Store. All Rights Reserved. Designed by <a href="http://www.opencartworks.com/" target="_blank">OpenCartWorks.Com</a></p>
                     </div>
                     <div class="payment-w col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <img src="image/catalog/demo/payment/payment.png" alt="imgpayment">
                     </div>
                  </div>
               </div>
            </div>
            <!-- /Footer Bottom Container -->
            <!--Back To Top-->
            <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
         </footer>
         <!-- //end Footer Container -->
      </div>
      <!-- Include Libs & Plugins
         ============================================ -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script type="text/javascript" src="{{asset('front/js/jquery-2.2.4.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/owl-carousel/owl.carousel.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/slick-slider/slick.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/theme/libs.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/unveil/jquery.unveil.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/countdown/jquery.countdown.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/datetimepicker/moment.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery-ui/jquery-ui.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/lightslider/lightslider.js')}}"></script>
      <!-- Theme files
         ============================================ -->
      <script type="text/javascript" src="{{asset('front/js/theme/so_megamenu.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/theme/addtocart.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/theme/application.js')}}"></script>    
      <script type="text/javascript"><!--
         // Check if Cookie exists
             if($.cookie('display')){
                 view = $.cookie('display');
             }else{
                 view = 'grid';
             }
             if(view) display(view);
         //-->
      </script> 
   </body>
</html>