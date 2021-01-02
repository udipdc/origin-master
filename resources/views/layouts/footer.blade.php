         <!-- Footer Container -->
         <footer class="footer-container typefooter-1">
            <!-- Footer middle Container -->
            <div class="container">
               <!--<div class="row footer-middle">
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
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-style">
                           <div class="box-account box-footer">
                              <div class="module clearfix">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-clear">
                           <div class="box-service box-footer">
                              <div class="module clearfix">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                <div class="row row-dark">
                  <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12 col-socials">
                     <ul class="socials">
                        <li class="facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="google_plus"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li class="pinterest"><a href="#" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
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
               </div> -->

               <div class="row footer-middle">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-style">
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
               </div>

            </div>
            <!-- /Footer middle Container -->
            <!-- Footer Bottom Container -->
            <div class="footer-bottom">
               <div class="container">
                  <div class="row">
                     <div class="copyright col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        @if(isset(settingData()->footer_text) && !empty(settingData()->footer_text))
                            <p> {{ settingData()->footer_text }} </p>
                        @else
                            <p class="text-center">Copyright &copy; Reserved by <a href="https://themeforest.net/user/quixlab">MedicalLogo</a> 2020</p>
                        @endif
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
      <script type="text/javascript" src="{{asset('front/js/themejs/libs.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/unveil/jquery.unveil.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/countdown/jquery.countdown.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/datetimepicker/moment.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery-ui/jquery-ui.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/modernizr/modernizr-2.6.2.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/minicolors/jquery.miniColors.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/lightslider/lightslider.js')}}"></script>
      <!-- Theme files
         ============================================ -->
      <script type="text/javascript" src="{{asset('front/js/themejs/application.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/themejs/homepage.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/themejs/toppanel.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/themejs/so_megamenu.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/themejs/addtocart.js')}}"></script>  
      <!-- <script type="text/javascript" src="js/themejs/cpanel.js"></script> -->
   </body>
</html>