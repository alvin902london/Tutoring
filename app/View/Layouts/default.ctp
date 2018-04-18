<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <!-- Meta -->
    <?php echo $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>
    </title>
    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/css/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/css/headers/header-default.css">
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/css/footers/footer-v2.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/plugins/animate.css">
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/plugins/parallax-slider/css/parallax-slider.css">
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">

    <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/jquery/jquery-migrate.min.js"></script>    

    <!-- CSS Customization -->
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/css/custom.css">  
    <?php
        echo $this->Html->meta('icon');
        //Bootstrap core CSS
        //Custom styles for this template
        echo $this->Html->css(array('bootstrap-datetimepicker', 'bootstrap-datetimepicker.min', 'sticky_footer'));
        echo $this->Html->script(array('moment', 'bootstrap-datetimepicker.min', 'bootstrap-checkbox'));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>          		
</head>
<body>
<div class="wrapper">
    <!--=== Header ===-->
    <div class="header">
        <div class="container">
            <!-- Logo -->
            <a class="logo" href="<?php echo $this->webroot; ?>">
                <img src="<?php echo $this->webroot; ?>assets/img/logo1-default.png" alt="Logo">
            </a>
            <!-- End Logo -->                                   

            <!-- Toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
            <!-- End Toggle -->
        </div><!--/end container-->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
            <div class="container">
                <ul class="nav navbar-nav pull-left indent">
                    <!-- Home -->
                    <li class="<?php if ($this->params['controller'] == 'posts' && $this->params['action'] == 'home') { echo 'active'; } ?>">
                        <a href="<?php echo $this->webroot; ?>">
                            <i class="fa fa-home"></i> <?php echo __('首頁'); ?>
                        </a>
                    </li>
                    <!-- End Home -->

                    <!-- Hire -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('尋找導師'); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="<?php echo $this->webroot; ?>posts/msf_setup"><?php echo __('尋找導師'); ?></a></li>
                            <li><a href="<?php echo $this->webroot; ?>posts/private_view"><?php echo __('選擇導師'); ?></a></li>
                            <li><a href="page_home14.html">Helo I'm Nick.</a></li>
                            <li><a href="page_home9.html">Option 7: Home Creative</a></li>
                            <li><a href="page_home10.html">Option 8: Home Inspire</a></li>
                            <li><a href="page_home11.html">Option 9: Home Desire</a></li>
                            <li><a href="page_jobs.html">Option 10: Home Jobs</a></li>
                            <li><a href="page_home3.html">Option 11: Amazing Content</a></li>
                            <li><a href="page_home6.html">Option 12: Home Magazine</a></li>
                            <li class="dropdown-submenu">
                                <a href="javascript:void(0);">Option 13: Home Sidebar</a>
                                <ul class="dropdown-menu">
                                    <li><a href="page_home12.html">- Home Left Sidebar</a></li>
                                    <li><a href="page_home13.html">- Home Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="page_home1.html">Option 14: Home Basic v1</a></li>
                            <li><a href="page_home2.html">Option 15: Home Basic v2</a></li>
                            <li><a href="page_home5.html">Option 16: Home Basic v3</a></li>
                            <li><a href="page_home4.html">Option 17: Home Basic v4</a></li>
                            <li><a href="page_home7.html">Option 18: Home Basic v5</a></li>
                        </ul>
                    </li>
                    <!-- End Hire -->

                    <!-- Teach -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('應徵補習'); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="<?php echo $this->webroot; ?>posts"><?php echo __('最新個案'); ?></a></li>
                            <li><a href="<?php echo $this->webroot; ?>profiles/msf_setup"><?php echo __('登記成為導師'); ?></a></li>
                            <li><a href="page_home14.html">Option 6: Home Incredible</a></li>
                            <li><a href="page_home9.html">Option 7: Home Creative</a></li>
                            <li><a href="page_home10.html">Option 8: Home Inspire</a></li>
                            <li><a href="page_home11.html">Option 9: Home Desire</a></li>
                            <li><a href="page_jobs.html">Option 10: Home Jobs</a></li>
                            <li><a href="page_home3.html">Option 11: Amazing Content</a></li>
                            <li><a href="page_home6.html">Option 12: Home Magazine</a></li>
                            <li class="dropdown-submenu">
                                <a href="javascript:void(0);">Option 13: Home Sidebar</a>
                                <ul class="dropdown-menu">
                                    <li><a href="page_home12.html">- Home Left Sidebar</a></li>
                                    <li><a href="page_home13.html">- Home Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="page_home1.html">Option 14: Home Basic v1</a></li>
                            <li><a href="page_home2.html">Option 15: Home Basic v2</a></li>
                            <li><a href="page_home5.html">Option 16: Home Basic v3</a></li>
                            <li><a href="page_home4.html">Option 17: Home Basic v4</a></li>
                            <li><a href="page_home7.html">Option 18: Home Basic v5</a></li>
                        </ul>
                    </li>
                    <!-- End Teach -->
                </ul>
                <ul class="nav navbar-nav indent-right">
                    <?php if (!AuthComponent::user()): ?>
                        <!-- Login -->
                        <li>
                            <a href="<?php echo $this->webroot; ?>users/login">
                                <i class="fa fa-lock"></i> <?php echo ('登入'); ?>
                            </a>    
                        </li>
                        <!-- End Login -->
                        
                        <!-- Register -->
                        <li>
                            <a href="<?php echo $this->webroot; ?>users/add">
                                <i class="fa fa-pencil"></i> <?php echo ('註冊'); ?>
                            </a>
                            <div class="search-open">
                                <div class="input-group animated fadeInDown">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button class="btn-u" type="button">Go</button>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <!-- End Register --> 
                    <?php else: ?>
                    <!-- User -->
                    <li class="dropdown active">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> <?php echo AuthComponent::user('contact_person'); ?>
                        </a>
                        <ul class="dropdown-menu subheading">
                            <?php if(($this->session->read('role') == null && AuthComponent::user('default_role') == 'student') || ($this->session->read('role') !== null && $this->session->read('role') == 'student')): ?>
                                <li><h3><?php echo __('學生頁面'); ?></h3></li>
                                <li><a href="<?php echo $this->webroot; ?>posts/msf_setup"><i class="fa fa-cog"></i> <?php echo ('登記新個案'); ?></a></li>
                                <li><a href="<?php echo $this->webroot; ?>posts/student"><i class="fa fa-cog"></i> <?php echo ('已登記個案'); ?></a></li>
                            <?php endif ?>
                            <?php if (($this->session->read('role') == null && AuthComponent::user('default_role') == 'tutor') || ($this->session->read('role') !== null && $this->session->read('role') == 'tutor')): ?><!-- Need Editing -->
                                <li><h3><?php echo __('導師頁面'); ?></h3></li>
                                <li><a href="<?php echo $this->webroot; ?>posts/msf_setup"><i class="fa fa-cog"></i> <?php echo ('登記新個案'); ?></a></li>
                                <li><a href="<?php echo $this->webroot; ?>posts/student"><i class="fa fa-cog"></i> <?php echo ('已登記個案'); ?></a></li>
                            <?php endif ?>
                            <li><h3><?php echo __('您的帳戶'); ?></h3></li>
                            <li><a href="<?php echo $this->webroot; ?>users/edit/<?php echo AuthComponent::user('id'); ?>"><i class="fa fa-cog"></i> <?php echo ('更改密碼'); ?></a></li>
                            <li><a href="<?php echo $this->webroot; ?>users/logout"><i class="fa fa-unlock-alt"></i> <?php echo ('登出'); ?></a></li>
                            <?php $action = $this->request->params['action']; ?>
                            <?php if (($this->session->read('role') == null && AuthComponent::user('default_role') == 'student') || ($this->session->read('role') !== null && $this->session->read('role') == 'student')): ?>
                                <li><?php echo $this->Form->postLink('<i class="fa fa-cog"></i> ' . __('轉換至導師頁面'), 'switch_role/tutor/' . $action, array('escape' => false)); ?></li>
                            <?php endif ?>
                            <?php if (($this->session->read('role') == null && AuthComponent::user('default_role') == 'tutor') || ($this->session->read('role') !== null && $this->session->read('role') == 'tutor')): ?>
                                <li><?php echo $this->Form->postLink('<i class="fa fa-cog"></i> ' . __('轉換至學生頁面'), 'switch_role/student/' . $action, array('escape' => false)); ?></li>
                            <?php endif ?>
                        </ul>
                    </li>
                    <!-- End User -->                    
                    <?php endif; ?>
                </ul>
            </div><!-- End Container -->
        </div><!-- Navbar Collapse -->
    </div>
    <!--=== End Header ===-->   
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
    <!--=== Footer v2 ===-->
    <div id="footer-v2" class="footer-v2">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <!-- About -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <a href="index.html"><img id="logo-footer" class="footer-logo" src="<?php echo $this->webroot; ?>assets/img/logo1-default.png" alt=""></a>
                        <p class="margin-bottom-20">Unify is an incredibly beautiful responsive Bootstrap Template for corporate and creative professionals.</p>

                        <form class="footer-subsribe">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Email Address">                            
                                <span class="input-group-btn">
                                    <button class="btn-u" type="button">Go</button>
                                </span>
                            </div>                  
                        </form>                         
                    </div>
                    <!-- End About -->
                    
                    <!-- Link List -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2 class="heading-sm">Useful Links</h2></div>
                        <ul class="list-unstyled link-list">
                            <li><a href="#">About us</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">Portfolio</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">Latest jobs</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">Community</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">Contact us</a><i class="fa fa-angle-right"></i></li>
                        </ul>
                    </div>
                    <!-- End Link List -->                   

                    <!-- Latest Tweets -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="latest-tweets">
                            <div class="headline"><h2 class="heading-sm">Latest Tweets</h2></div>
                            <div class="latest-tweets-inner">
                                <i class="fa fa-twitter"></i>
                                <p>
                                    <a href="#">@htmlstream</a> 
                                    At vero seos etodela ccusamus et 
                                    <a href="#">http://t.co/sBav7dm</a> 
                                    <small class="twitter-time">2 hours ago</small>
                                </p>    
                            </div>
                            <div class="latest-tweets-inner">
                                <i class="fa fa-twitter"></i>
                                <p>
                                    <a href="#">@htmlstream</a> 
                                    At vero seos etodela ccusamus et 
                                    <a href="#">http://t.co/sBav7dm</a> 
                                    <small class="twitter-time">4 hours ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Latest Tweets -->    

                    <!-- Address -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2 class="heading-sm">Contact Us</h2></div>                         
                        <address class="md-margin-bottom-40">
                            <i class="fa fa-home"></i>25, Lorem Lis Street, California, US <br />
                            <i class="fa fa-phone"></i>Phone: 800 123 3456 <br />
                            <i class="fa fa-globe"></i>Website: <a href="#">www.htmlstream.com</a> <br />
                            <i class="fa fa-envelope"></i>Email: <a href="mailto:info@anybiz.com">info@anybiz.com</a> 
                        </address>

                        <!-- Social Links -->
                        <ul class="social-icons">
                            <li><a href="#" data-original-title="Facebook" class="rounded-x social_facebook"></a></li>
                            <li><a href="#" data-original-title="Twitter" class="rounded-x social_twitter"></a></li>
                            <li><a href="#" data-original-title="Goole Plus" class="rounded-x social_googleplus"></a></li>
                            <li><a href="#" data-original-title="Linkedin" class="rounded-x social_linkedin"></a></li>
                        </ul>
                        <!-- End Social Links -->
                    </div>
                    <!-- End Address -->
                </div>
            </div> 
        </div><!--/footer-->

        <div class="copyright">
            <div class="container">
                <p class="text-center">2015 &copy; All Rights Reserved. Unify Theme by <a target="_blank" href="https://twitter.com/htmlstream">Htmlstream</a></p>
            </div> 
        </div><!--/copyright--> 
    </div>
    <!--=== End Footer v2 ===-->
</div><!--/wrapper-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/smoothScroll.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/parallax-slider/js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/parallax-slider/js/jquery.cslider.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/gmap/gmaps.js"></script>
<!-- JS Customization -->
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/js/custom.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/js/pages/page_contacts.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/js/plugins/owl-carousel.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/js/plugins/parallax-slider.js"></script>
<?php if ($this->params['controller'] == 'posts' && $this->params['action'] == 'home'): ?>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
            OwlCarousel.initOwlCarousel();
            ParallaxSlider.initParallaxSlider();   
        });       
    </script>
<?php endif; ?>
<?php if ($this->params['controller'] == 'comments' && $this->params['action'] == 'add'): ?> 
    <script type="text/javascript">
        var div = document.getElementById("dom-target");
        var myData = div.textContent;
        var div2 = document.getElementById("dom-target2");
        var myData2 = div2.textContent;
        var div3 = document.getElementById("dom-target3");
        var myData3 = div3.textContent;  
        //console.log(myData2);  
        jQuery(document).ready(function() {
            App.init();
            ContactPage.initMap(myData, myData2, myData3);
            ContactPage.initPanorama();
        });
        $(document).ready(function() {
            $('#test').prop('disabled', !$('#CommentFrequencyNotOk').is(":checked"));
            $('#test2').prop('disabled', !$('#CommentRateNotOk').is(":checked"));
        });
    
        $('#CommentFrequencyNotOk').on('click', function () {
            $('#test').prop('disabled', !$('#CommentFrequencyNotOk').is(":checked"));
        });
        $('#CommentRateNotOk').on('click', function () {
            $('#test2').prop('disabled', !$('#CommentRateNotOk').is(":checked"));
        });
    
        $(function(){
            $("#CommentQualificationRemarks").on("keydown change", function(e){
                if (e.keyCode == 8)
                    return;
                var x = $(this).val();
                if (x.match(/[\u3400-\u9FBF]/) && x.length >= 20) {
                    e.preventDefault();
                    $(this).val(x.substring(0,20));
                } else if (x.length >= 50){
                    e.preventDefault();
                    $(this).val(x.substring(0,50));
                }
                $("#length").text("length: "+x.length);
            });
        });  

//        $(function(){
//            $("#CommentTag1").on("keydown change", function(e){
//                if (e.keyCode == 8)
//                    return;
//                var x = $(this).val();
//                if (x.match(/[\u3400-\u9FBF]/) && x.length >= 9) {
//                    e.preventDefault();
//                    $(this).val(x.substring(0,9));
//                } else if (x.length >= 15){
//                    e.preventDefault();
//                    $(this).val(x.substring(0,15));
//                }
//                $("#length").text("length: "+x.length);
//            });
//        });        
//        
//        $(function(){
//            $("#CommentTag2").on("keydown change", function(e){
//                if (e.keyCode == 8)
//                    return;
//                var x = $(this).val();
//                if (x.match(/[\u3400-\u9FBF]/) && x.length >= 9) {
//                    e.preventDefault();
//                    $(this).val(x.substring(0,9));
//                } else if (x.length >= 50){
//                    e.preventDefault();
//                    $(this).val(x.substring(0,15));
//                }
//                $("#length").text("length: "+x.length);
//            });
//        });       
    </script>      
<?php endif; ?>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<!--[if lt IE 9]>
    <script src="<?php echo $this->webroot; ?>plugins/respond.js"></script>
    <script src="<?php echo $this->webroot; ?>plugins/html5shiv.js"></script>
    <script src="<?php echo $this->webroot; ?>plugins/placeholder-IE-fixes.js"></script>
<![endif]-->
</body>
</html>