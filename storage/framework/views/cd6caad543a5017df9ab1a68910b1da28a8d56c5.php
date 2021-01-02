<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Basic page needs
         ============================================ -->
      <title>Medical Store</title>
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

      <!-- Theme CSS
         ============================================ -->
      <link href="<?php echo e(asset('front/css/themecss/so_advanced_search.css')); ?>" rel="stylesheet">
      <link id="color_scheme" href="<?php echo e(asset('front/css/theme.css')); ?>" rel="stylesheet">
      <!-- Google web fonts
         ============================================ -->
      <link href='https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500,600,700' rel='stylesheet' type='text/css'>
      <style type="text/css">
         body{font-family:'Rubik', sans-serif;}

         .productImage{
               width: 1170px !important;
               height: 780px !important;
         }
      </style>
   </head>
   <body class="res layout-1 layout-subpage">
      <div id="wrapper" class="wrapper-fluid banners-effect-5">
         <!-- Header Container  -->
            <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <!-- //Header Container  -->
         <!-- Main Container  -->
         <div class="main-container container">
            <ul class="breadcrumb">
               <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i></a></li>
               <li><a href="<?php echo e(url('productList')); ?>">Product</a></li>
               <li><a href="#"><?php if(isset($productData)): ?> <?php echo e($productData->product_name); ?> <?php endif; ?></a></li>
            </ul>
            <div class="row">
               <!--Middle Part Start-->
               <div id="content" class="col-md-12 col-sm-12">
                  <div class="article-info">
                     <div class="blog-header">
                        <h3><?php if(isset($productData)): ?> <?php echo e($productData->product_name); ?> <?php endif; ?></h3>
                     </div>
                     <div class="form-group">
                        <!-- <a href="image/catalog/blog/1.jpg" class="image-popup"><img src="image/catalog/blog/1.jpg" alt="Kire tuma demonstraverunt lector"></a> -->
                        <?php if($productData->product_image!=""): ?>
                           <a href="<?php echo e(url('product/'.$productData->product_image)); ?>" class="image-popup">
                              <img src="<?php echo e(url('product/'.$productData->product_image)); ?>" alt="<?php echo e($productData->product_name); ?>" class="productImage">
                           </a>
                        <?php else: ?>
                           <a href="image/catalog/demo/product/270/2.jpg" class="image-popup">
                              <img src="image/catalog/demo/product/270/2.jpg" alt="image1" class="productImage">
                           </a>
                        <?php endif; ?>
                     </div>
                     <div class="article-description">
                        <p>Morbi tempus, non ullamcorper euismod, erat odio suscipit purus, nec ornare lacus turpis ac purus. Mauris cursus in mi vel dignissim. Morbi mollis elit ipsum, a feugiat lectus gravida non. Aenean molestie justo sed aliquam euismod. Maecenas laoreet bibendum laoreet. Morbi tempor massa sit amet purus lobortis, non porta tellus dignissim. </p>
                        <p>Proin dictum justo a nisl pellentesque egestas.Nulla commodo euismod nisi ac bibendum. Mauris in pellentesque tellus, in cursus magna. Sed volutpat dui bibendum mi molestie, at volutpat nunc dictum. Fusce sagittis massa id eros scelerisque, eget accumsan magna lacinia. Nullam posuere neque at neque dictum interdum</p>
                        <p> Mauris cursus in mi vel dignissim. Morbi mollis elit ipsum, a feugiat lectus gravida non. Aenean molestie justo sed aliquam euismod. Maecenas laoreet bibendum laoreet. Morbi tempor massa sit amet purus lobortis, non porta tellus dignissim. Proin dictum justo a nisl pellentesque egestas.Nulla commodo euismod nisi ac bibendum. Mauris in pellentesque tellus, in cursus magna. Sed volutpat dui bibendum mi molestie, at volutpat nunc dictum. Fusce sagittis massa id eros scelerisque, eget accumsan magna lacinia. Nullam posuere neque at neque dictum interdum</p>
                     </div>
                  </div>
               </div>
            </div>
            <!--Middle Part End-->
         </div>
         <!-- //Main Container -->
         <!-- Footer Container -->
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <!-- //end Footer Container -->
      </div>

   </body>
</html><?php /**PATH C:\xampp\htdocs\MedicalStore\resources\views/product/productDetails.blade.php ENDPATH**/ ?>