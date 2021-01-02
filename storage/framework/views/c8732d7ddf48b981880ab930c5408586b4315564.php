<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic page needs
    ============================================ -->
    <title>Medical Store</title>
    <meta charset="utf-8">
    <meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description" content="Autoparts is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
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
    <link rel="stylesheet" href="<?php echo e(asset('front/css/bootstrap/css/bootstrap.min.css')); ?>">
    <link href="<?php echo e(asset('front/css/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/js/datetimepicker/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/js/owl-carousel/owl.carousel.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/js/slick-slider/slick.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/css/themecss/lib.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/js/jquery-ui/jquery-ui.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/js/minicolors/miniColors.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/js/pe-icon-7-stroke/css/pe-icon-7-stroke.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/pe-icon-7-stroke/css/helper.css')); ?>" rel="stylesheet">
    <!-- Theme CSS
    ============================================ -->
    <link href="<?php echo e(asset('front/css/themecss/so_searchpro.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/css/themecss/so_megamenu.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/css/themecss/so-categories.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/css/themecss/so-listing-tabs.css')); ?>" rel="stylesheet">
    <!-- <link href="<?php echo e(asset('front/css/themecss/so-category-slider.css')); ?>" rel="stylesheet"> -->
    <link href="<?php echo e(asset('front/css/themecss/so-deals.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/css/themecss/so-newletter-popup.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/css/themecss/so-latest-blog.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/css/footer/footer1.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/css/header/header1.css')); ?>" rel="stylesheet">
    <link id="color_scheme" href="<?php echo e(asset('front/css/home3.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/css/responsive.css')); ?>" rel="stylesheet">
    <!-- Google web fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500,600,700' rel='stylesheet' type='text/css'>

    <!-- <link href="<?php echo e(asset('front/css/custom.css')); ?>" rel="stylesheet"> -->
    <style type="text/css">
      .container-megamenu.horizontal ul.megamenu > li > a strong{
        font-weight: 600 !important;
      }

      .container-megamenu.horizontal ul.megamenu > li:hover > a, .container-megamenu.horizontal ul.megamenu > li > a:hover, .container-megamenu.horizontal ul.megamenu > li.active > a, .container-megamenu.horizontal ul.megamenu > li.active_menu > a{
          border-radius: 3rem;
      }
    </style>
</head>
<body class="common-home res layout-3">
    <div id="wrapper" class="wrapper-fluid banners-effect-1">
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
                             <!-- <a href="index.html"><img src="image/catalog/logo.png" title="Your Store" alt="Your Store" /></a> -->

                            <?php if(isset(settingData()->site_logo) && !empty(settingData()->site_logo)): ?>
                                <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('front/images/Logo/'.settingData()->site_logo)); ?>" alt="brand-logo" ></a>
                            <?php else: ?>
                                <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('front/images/Logo/MedicalLogo.jpg')); ?>" alt="" ></a>
                            <?php endif; ?>

                          </div>
                       </div>
                       <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 middle-right" style="margin-top: 2%;">
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
                                               <ul class="megamenu menuText" data-transition="slide" data-animationtime="250">
                                                  <li class="">
                                                     <p class="close-menu"></p>
                                                     <a href="<?php echo e(url('/')); ?>" class="clearfix">
                                                     <strong style="text-transform:capitalize;"><?php echo e(ucfirst('Home')); ?></strong>
                                                     </a>
                                                  </li>
                                                  <li class="with-sub-menu hover">
                                                     <p class="close-menu"></p>
                                                     <a href="#" class="clearfix">
                                                     <strong style="text-transform:capitalize;">Company</strong>
                                                     <b class="caret"></b>
                                                     </a>
                                                     <div class="sub-menu" style="width: 40%; ">
                                                        <div class="content" >
                                                           <div class="row">
                                                              <div class="col-md-6">
                                                                 <ul class="row-list">
                                                                    <li><a class="subcategory_item" href="#">Quality</a></li>
                                                                    <li><a class="subcategory_item" href="#">Vission  and mission</a></li>
                                                                 </ul>
                                                              </div>
                                                              <div class="col-md-6">
                                                                 <ul class="row-list">
                                                                    <li><a class="subcategory_item" href="#">Certificate</a></li>
                                                                    <li><a class="subcategory_item" href="#">Services</a></li>
                                                                 </ul>
                                                              </div>
                                                           </div>
                                                        </div>
                                                     </div>
                                                  </li>
                                                  <li class="">
                                                     <p class="close-menu"></p>
                                                     <a href="<?php echo e(url('productList')); ?>" class="clearfix">
                                                     <strong style="text-transform:capitalize;">Product</strong>
                                                     <span class="label"></span>
                                                     </a>
                                                  </li>
                                                  <li class="">
                                                     <p class="close-menu"></p>
                                                     <a href="#" class="clearfix">
                                                     <strong style="text-transform:capitalize;">About US</strong>
                                                     <span class="label"></span>
                                                     </a>
                                                  </li>
                                                  <li class="">
                                                     <p class="close-menu"></p>
                                                     <a href="#" class="clearfix">
                                                     <strong style="text-transform:capitalize;">Distributors</strong>
                                                     <span class="label"></span>
                                                     </a>
                                                  </li>
                                                  <li class="">
                                                     <p class="close-menu"></p>
                                                     <a href="#" class="clearfix">
                                                     <strong style="text-transform:capitalize;">ContactUs</strong>
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

<?php /**PATH C:\xampp\htdocs\MedicalStore\resources\views/layouts/header.blade.php ENDPATH**/ ?>