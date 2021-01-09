      <!-- footer 
         ================================================== -->
      <footer class="footer-box without-border">
         <div class="container-fluid">
            <div class="inner-footer">
               <div class="row">
                  <div class="col-sm-6">
                     <p class="copyright-line">Develop By 2021. Made with love in india</p>
                  </div>
                  <div class="col-sm-6">
                     <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a class="pinterest" href="#"><i class="fa fa-pinterest-square"></i></a></li>
                        <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
                        <li><a class="vimeo" href="#"><i class="fa fa-vimeo-square"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>

      </footer>
      <!-- End footer -->

   </div>
   <!-- End Container -->

   <div class="preloader">
      <img alt="" src="<?php echo e(asset('front/images/loader.gif')); ?>">
   </div>

   <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

   <script src="<?php echo e(asset('js/shutter-plugins.min.js')); ?>"></script>
   <script src="<?php echo e(asset('js/popper.js')); ?>"></script>
   <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
   <script src="<?php echo e(asset('js/script.js')); ?>"></script>

   <script>
      var tpj=jQuery;                     
      var revapi202;
            tpj(document).ready(function() {
                if (tpj("#rev_slider_202_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_202_1");
                } else {
                    revapi202 = tpj("#rev_slider_202_1").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "js/",
                        sliderLayout: "fullscreen",
                        dottedOverlay: "none",
                        delay: 3000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 50,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            bullets: {
                                enable: false
                            },
                            arrows: {
 
                        enable: false,
                        style: 'uranus',
                        tmp: '',
                        rtl: false,
                        hide_onleave: false,
                        hide_onmobile: true,
                        hide_under: 0,
                        hide_over: 9999,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,

                        left: {
                           container: 'slider',
                           h_align: 'left',
                           v_align: 'center',
                           h_offset: 50,
                           v_offset: 20
                        },

                        right: {
                           container: 'slider',
                           h_align: 'right',
                           v_align: 'center',
                           h_offset: 50,
                           v_offset: 20
                        }

                     }
                        },
                        responsiveLevels: [1140, 960, 778, 480],
                        visibilityLevels: [1140, 960, 778, 480],
                        gridwidth: [1920, 960, 778, 480],
                        gridheight: [1080, 900, 960, 720],
                        lazyType: "none",
                        parallax: {
                            type: "scroll",
                            origo: "slidercenter",
                            speed: 1000,
                            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
                            type: "scroll",
                        },
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "off",
                        shuffle: "off",
                        autoHeight: "off",
                        fullScreenAutoWidth: "off",
                        fullScreenAlignForce: "off",
                        fullScreenOffsetContainer: '.navbar, footer',
                        fullScreenOffset: 0,
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            }); /*ready*/
   </script>   

   </body>
</html>
<?php /**PATH C:\xampp\htdocs\pratapbhai_bharad\resources\views/layouts/footer.blade.php ENDPATH**/ ?>