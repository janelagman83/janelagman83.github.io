<?php 
$your_email ='lagman562@gmail.com';// <<=== update to your email address

session_start();
$errors = '';
$name = '';
$visitor_email = '';
$user_message = '';

if(isset($_POST['submit']))
{
    
    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $user_message = $_POST['message'];
    ///------------Do Validations-------------
    if(empty($name)||empty($visitor_email))
    {
        $errors .= "\n Name and Email are required fields. ";   
    }
    if(IsInjected($visitor_email))
    {
        $errors .= "\n Bad email value!";
    }
    if(empty($_SESSION['6_letters_code'] ) ||
      strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
    {
    //Note: the captcha code is compared case insensitively.
    //if you want case sensitive match, update the check above to
    // strcmp()
        $errors .= "\n The captcha code does not match!";

    }
    
    if(empty($errors))
    {
        //send the email
        $to = $your_email;
        $subject="New form submission";
        $from = $your_email;
        
        $body = "$name submitted the contact form:\n".
        "Name: $name\n".
        "Email: $visitor_email \n".
        "$user_message\n".
        
        $headers = "From: $from \r\n";
        $headers .= "Reply-To: $visitor_email \r\n";
        
        mail($to, $subject, $body,$headers);
        
        header('Location: index.php');
    }
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Jane Design</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- FONTS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:300'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>

    <!-- CSS -->
    <link rel='stylesheet' href='css/global.css'>
    <link rel='stylesheet' href='css/structure.css'>
    <link rel='stylesheet' href='css/resume.css'>
    <script language="JavaScript" src="js/gen_validatorv31.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="layout-boxed one-page mobile-tb-center no-content-padding hide-love header-classic minimalist-header sticky-header sticky-white ab-hide subheader-title-left nice-scroll">

    <!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        <div id="Header_wrapper">
            <!-- Header -->
            <header id="Header">

                <!-- Header -  Logo and Menu area -->
                <div id="Top_bar">
                    <div class="container">
                        <div class="column one">
                            <div class="top_bar_left clearfix">
                                <!-- Logo-->
                                <div class="logo">
                                    <a id="logo" href="index-resume.html" title="Jane Lagman Design"><img class="logo-main scale-with-grid" src="images/resume.png" alt="Jane Lagman Design" /><img class="logo-sticky scale-with-grid" src="images/resume.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="menu_wrapper top_bar_right">
                                    <nav id="menu">
                                        <ul id="menu-main-menu" class="menu">
                                            <li>
                                                <a href="index-resume.html#about"><span>About</span></a>
                                            </li>
                                            <li>
                                                <a href="index-resume.html#web"><span>Web Design</span></a>
                                            </li>
                                            <li>
                                                <a href="index-resume.html#email"><span>Email Design</span></a>
                                            </li>
                                            <li>
                                                <a href="index-resume.html#banner"><span>Media Banner Design</span></a>
                                            </li>
                                            <li>
                                                <a href="index-resume.html#print"><span>Print Design</span></a>
                                            </li>
                                            <li>
                                                <a href="index-resume.html#personal"><span>Personal Designs</span></a>
                                            </li>
                                            <li>
                                                <a href="index-resume.html#contact"><span>Contact</span></a>
                                            </li>
                                        </ul>
                                    </nav><a class="responsive-menu-toggle" href="#"><i class="fa fa-chevron-circle-down"></i></a>
                                </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <!-- Main Content -->
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">
                        <div class="section dark" id="about" style="padding-top:100px; padding-bottom:60px; background-color:#373737; background-image:url(images/jane-lagman.jpg); background-repeat:no-repeat; background-position:center top; background-attachment:fixed; background-size:cover; -webkit-background-size:cover" data-stellar-background-ratio="0.5">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second column_column">
                                        <div class="column_attr">
                                            <div style="margin-left: 20px;">
                                                <h2 style="font-size: 50px; line-height: 50px; font-weight: bold; margin-bottom: 3px;">Jane Lagman</h2>
                                                <p style="font-size: 30px; line-height: 30px; font-weight: 300; margin-top: 10px; color: #40c6c2;">
                                                    Graphic / Web Designer
                                                </p>
                                                <p class="big" style="color: #222222;">
                                                   I am a Californian at heart but currently reside in the outdoor sauna city of Las Vegas! I am always gearing myself to learn and produce fresh and new ideas in technology, marketing and design. I live and breathe an organic and clean lifestyle that shows not only through my work ethic, but also in my love for every aspect of design.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!----------------------------------Portfolio---------------------------------->
                        <div class="section dark" id="web" style="padding-top:25px; padding-bottom:0px; background-color:#40c6c2">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- Page Title-->
                                    <!-- One full width row-->
                                    <div class="column one column_fancy_heading">
                                        <div class="fancy_heading fancy_heading_icon">
                                            <h2 class="title">Website Design & Development</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section full-width" style="padding-top:0px; padding-bottom:0px; background-color:#505050">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_portfolio_grid">
                                        <ul class="portfolio_grid">
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_1-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_1" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_1-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a><a href="http://www.americastravel.com/" class="link" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_2-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_2" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_2-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a><a href="http://geslasvegas.com/" class="link" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_3-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_3" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_3-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a><a href="http://www.mysunridgevillage.com/" class="link" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_4-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_4" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_4-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a><a href="http://cmg-hoa.com" class="link" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_5-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_5" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_5-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a><a href="staging/jj-golf/jj-golf.html" class="link" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_6-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_6" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_6-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a><a href="staging/tahiti-giveaway/tahiti-giveaway.html" class="link" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_7-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_7" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_7-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a><a href="staging/aces/aces.html" class="link" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_8-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_8" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_8-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!------------------------------------------------->
                        <div class="section dark" id="email" style="padding-top:25px; padding-bottom:0px; background-color:#40c6c2">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- Page Title-->
                                    <!-- One full width row-->
                                    <div class="column one column_fancy_heading">
                                        <div class="fancy_heading fancy_heading_icon">
                                            <h2 class="title">Email Design & Development</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section full-width" style="padding-top:0px; padding-bottom:0px; background-color:#505050">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_portfolio_grid">
                                        <ul class="portfolio_grid">
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_9-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_9" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_9-1200x800.jpg" class="zoom" rel="prettyphoto">
                                                                <i class="fa fa-search"></i></a><a href="staging/LVW/summer-2018.html" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_10-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_10" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_10-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a><a href="staging/Telesales/01-HTML/01-telesales.html" class="link" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_11-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_11" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_11-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a><a href="staging/OAD-2018/oad-2018.html" class="link" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_12-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_12" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_12-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a><a href="staging/GES/site-launch.html" class="link" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_13-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_13" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_13-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a><a href="staging/MightAudio/jointhemovement.html" class="link" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_14-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_14" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_14-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_15-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_15" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_15-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_16-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_16" />
                                                        </a>
                                                        <div class="image_links double">
                                                            <a href="images/portfolio_16-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a><a href="staging/DrDabber/halloween-sale.html" class="link" target="_blank"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section dark" id="banner" style="padding-top:25px; padding-bottom:0px; background-color:#40c6c2">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- Page Title-->
                                    <!-- One full width row-->
                                    <div class="column one column_fancy_heading">
                                        <div class="fancy_heading fancy_heading_icon">
                                            <h2 class="title">Media Banners</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section full-width" style="padding-top:0px; padding-bottom:0px; background-color:#505050">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_portfolio_grid">
                                        <ul class="portfolio_grid">
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_17-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_17" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_17-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_18-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_18" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_18-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_19-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_19" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_19-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_20-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_20" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_20-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_21-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_21" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_21-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_22-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_22" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_22-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_23-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_23" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_23-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_24-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_24" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_24-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section dark" id="print" style="padding-top:25px; padding-bottom:0px; background-color:#40c6c2">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- Page Title-->
                                    <!-- One full width row-->
                                    <div class="column one column_fancy_heading">
                                        <div class="fancy_heading fancy_heading_icon">
                                            <h2 class="title">Print Design</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section full-width" style="padding-top:0px; padding-bottom:0px; background-color:#505050">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_portfolio_grid">
                                        <ul class="portfolio_grid">
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_25-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_25" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_25-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_26-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_26" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_26-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_27-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_27" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_27-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_28-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_28" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_28-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_29-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_29" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_29-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_30-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_30" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_30-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_31-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_31" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_31-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_32-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_32" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_32-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section dark" id="personal" style="padding-top:25px; padding-bottom:0px; background-color:#40c6c2">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- Page Title-->
                                    <!-- One full width row-->
                                    <div class="column one column_fancy_heading">
                                        <div class="fancy_heading fancy_heading_icon">
                                            <h2 class="title">Personal Designs</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section full-width" style="padding-top:0px; padding-bottom:0px; background-color:#505050">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_portfolio_grid">
                                        <ul class="portfolio_grid">
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_33-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_33" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_33-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_34-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_34" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_34-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_35-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_35" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_35-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_36-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_36" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_36-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_37-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_37" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_37-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_38-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_38" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/portfolio_38-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_39-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_39" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/Lalaloopsy.pdf" target="_blank"><i class="fa fa-file-pdf"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="#">
                                                            <div class="mask"></div><img width="640" height="500" src="images/portfolio_40-640x500.jpg" class="scale-with-grid wp-post-image" alt="portfolio_40" />
                                                        </a>
                                                        <div class="image_links single">
                                                            <a href="images/Stadium-Passport-App.pdf" target="_blank"><i class="fa fa-file-pdf"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!----------------------------------Experience---------------------------------->
                        <div class="section" id="experience" style="padding-top:25px; padding-bottom:0px; background-color:#000000">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- Page Title-->
                                    <!-- One full width row-->
                                    <div class="column one column_fancy_heading">
                                        <div class="fancy_heading fancy_heading_icon">
                                            <h2 class="title" style="color:#ffffff;">Experience</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section" style="padding-top:60px; padding-bottom:0px; background-color:#fff">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <div class="column one-fourth column_column">
                                        <div class="column_attr animate" data-anim-type="fadeInLeft">
                                            <h4 class="hrmargin_b_5">702 WEST</h4>
                                            <div class="big">
                                                <p>
                                                    Lead Web / Graphic Designer<br/>February 2016 // Present
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Three Fourth (3/4) Column -->
                                    <div class="column three-fourth column_column">
                                        <div class="column_attr animate" data-anim-type="fadeInRight">
                                            <div class="big">
                                                <p>
                                                    Project manage promotional emails and web landing page ads. Design and code marketing emails, landing pages along with quality control assessment of all web media design. 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items_group clearfix">
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_column">
                                        <div class="column_attr animate" data-anim-type="fadeInLeft">
                                            <h4 class="hrmargin_b_5">JANE DESIGN</h4>
                                            <div class="big">
                                                <p>
                                                    Freelance Graphic/Web Designer<br/>June 2009 // Present
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Three Fourth (3/4) Column -->
                                    <div class="column three-fourth column_column">
                                        <div class="column_attr animate" data-anim-type="fadeInRight">
                                            <div class="big">
                                                <p>
                                                	<b>E & M DRIVING SCHOOL</b><br/>
                                                   	Designed company logo and business cards as well as marketing collaterals such as brochures, discount voucher and advertising flyers. 
                                                    <br/><br/>
                                                    <b>DR. DABBER</b><br/>
                                                    Helped with creating promotions for email campaigns. Handle all design request such as newsletter/promotional email design and development, in house branding development and color correct social assets and product photos.
                                                    <br/><br/>
                                                    <b>SHOEDAZZLE / JUSTFAB</b></b><br/>
                                                    Programmed and scheduled out going marketing emails, Q.A. emails, along with web landing page ads for promotional products, project managed promotional emails and web landing page ads.
                                                    <br/><br/>
                                                    <b>SCOPELY INC.</b><br/>
                                                    Designed marketing banners and worked under the Senior UI designer to implement branding guidelines on the Dice with Buddies mobile game for all mobile platform and prepared designed assets for engineers.
                                                    <br/><br/>
                                                    <b>AMERICAN BUSINESS CARDS</b><br/>
                                                    Design business cards for new and current clients. Redesign company web layout and upload content and images on CMS website.
                                                    <br/><br/>
                                                    <b>RUBY DILLON D.D.S.</b><br/>
                                                    Designed product packaging, custom wordpress web layout using thesis themes platform, logo design for products and upload content on existing wordpress website.
                                                    <br/><br/>
                                                    <b>METRO DIGI</b><br/>
                                                    I worked with a team of six people to prepare the IDML eBook files to be converted to XHTML files. I also programmed [strictly implementing CSS/CSS3 techniques on converted XHTML files] and performed cross browse testing for the eBook files on an iPad and Kindle platform.
                                                    <br/><br/> 
                                                    <b>NICHOLE FOWLER & ASSOCIATES</b><br/> 
                                                    I assisted in a logo development project by researching competitor’s logos and various typographical references relating to the clients brand and also created sketches. Apart from the logo development, I also assisted in creating landing page mock-ups.
                                                    <br/><br/>
                                                    <b>COVEROO</b><br/>
                                                    I worked with a team of four people and my duties included, but not limited to preparing artwork to be printed on paper or etched on hard material mediums. I also assisted in creating requested artwork through our online store as well as design packaging and advertisement banners.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items_group clearfix">
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_column">
                                        <div class="column_attr animate" data-anim-type="fadeInLeft">
                                            <h4 class="hrmargin_b_5">LUNCHBOX</h4>
                                            <div class="big">
                                                <p>
                                                    Graphic / Web Designer<br/>May 2013 // May 2014
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Three Fourth (3/4) Column -->
                                    <div class="column three-fourth column_column">
                                        <div class="column_attr animate" data-anim-type="fadeInRight">
                                            <div class="big">
                                                <p>
                                                    I worked in the entertainment department and handled nationwide name brands such as T-Mobile, Mattel, Fisher Price, Dyson and Walmart. I designed banners, flyers for upcoming events, landing page designs, newsletter email designs and advertisement banners. 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page devider -->
                                    <!-- One full width row-->
                                    <div class="column one column_divider">
                                        <hr class="no_line" />
                                    </div>
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_column">
                                        <div class="column_attr animate" data-anim-type="fadeInLeft">
                                            <h4 class="hrmargin_b_5">ROOT CREATIVE GROUP</h4>
                                            <div class="big">
                                                <p>
                                                    Graphic / Web Designer<br/>June 2011 // September 2012
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Three Fourth (3/4) Column -->
                                    <div class="column three-fourth column_column">
                                        <div class="column_attr animate" data-anim-type="fadeInRight">
                                            <div class="big">
                                                <p>
                                                    I handled various design task, starting from brochure layouts, logo development, package design, article layouts, web layouts, landing page designs, newsletter email designs, advertisement banners, Microsoft Word and PowerPoint document designs. I also hand coded landing pages, websites and marketing newsletter emails.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page devider -->
                                    <!-- One full width row-->
                                    <div class="column one column_divider">
                                        <hr class="no_line" />
                                    </div>
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_column">
                                        <div class="column_attr animate" data-anim-type="fadeInLeft">
                                            <h4 class="hrmargin_b_5">EUROTEC CORP.</h4>
                                            <div class="big">
                                                <p>
                                                    Web Editor / Designer<br/>April 2011 // June 2011
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Three Fourth (3/4) Column -->
                                    <div class="column three-fourth column_column">
                                        <div class="column_attr animate" data-anim-type="fadeInRight">
                                            <div class="big">
                                                <p>
                                                    I maintained the company’s eCommerce website by upload images and content for new inventory products. I also designed ad banners for upcoming sale events and updated the company twitter, blogger and facebook social media.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                      

                        
                        <div class="section dark" id="contact" style="padding-top:55px; padding-bottom:0px; background-color:#40c6c2">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One Third (1/3) Column -->
                                    <div class="column one-third column_column">
                                        <div class="column_attr">
                                            <div class="flv_align_right">
                                                <h2>Write a message</h2>
                                                <div class="big">
                                                    <p style="color:#000000;">
                                                        If you would like to know more or have questions please feel free to message me. Thanks!
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Two Third (2/3) Column -->
                                    <div class="column two-third column_column">
                                        <div class="column_attr">
                                           <div id="contactWrapper" >
												<form id="contactform" name="contact_form" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">	
													<div class="column one-second">
														<input placeholder="Your name" type="text" name="name" id="name" size="40" value="<?php echo htmlentities($name) ?>" aria-required="true" aria-invalid="false" />
													</div>
													<div class="column one-second">
														<input placeholder="Your e-mail" type="email" name="email" id="email" size="40" value="<?php echo htmlentities($visitor_email) ?>" aria-required="true" aria-invalid="false" />
													</div>
													<div class="column one">
														 <textarea placeholder="Message" name="message" id="message" style="width:100%;" rows="10" aria-invalid="false"></textarea>
													</div>
													
													<div class="column four-fifth">
	                                                <p>
                                                    <?php
	                                                    if(!empty($errors)){
	                                                    echo "<p class='err'>".nl2br($errors)."</p>";
	                                                    }
	                                                ?>

	                                                
	                                                    <img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' >
	                                                    <input placeholder="Enter the code here" size="40" id="6_letters_code" name="6_letters_code" type="text"> 
	                                                    <small style="color:#000000;font-size:13px;font-weight:bolder;line-height:18px;">Can't read the image? click <a href='javascript: refreshCaptcha();' style="color:#ff0b03;">here</a> to refresh</small>
	                                                </p>
	                                                </div>
	                                                
	                                                <div class="column one-fifth" style="padding-top:47px;">
	                                                    <input type="submit" name="submit" value="Send Message" id="submit" onClick="return check_values();">
	                                                </div>
												</form>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section the_content no_content">
                            <div class="section_wrapper">
                                <div class="the_content_wrapper"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer id="Footer" class="clearfix">
            <!-- Footer copyright-->
            <div class="footer_copy">
                <div class="container">
                    <div class="column one">
                        <a id="back_to_top" href="#" class="button button_left button_js"><span class="button_icon"><i class="fa fa-angle-up"></i></span></a>
                        <div class="copyright">
                            &copy; 2019 Jane Design, Alrights Reserved.
                        </div>
                        <!--Social info area-->
                        <ul class="social"></ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JS -->
    <script src="js/jquery-2.1.4.min.js"></script>

    <script src="js/mfn.menu.js"></script>
    <script src="js/jquery.plugins.js"></script>
    <script src="js/jquery.jplayer.min.js"></script>
    <script src="js/animations/animations.js"></script>
    <script src="js/scripts.js"></script>

    <script>
        jQuery(window).load(function() {
            var retina = window.devicePixelRatio > 1 ? true : false;
            if (retina) {
                var retinaEl = jQuery("#logo img.logo-main");
                var retinaLogoW = retinaEl.width();
                var retinaLogoH = retinaEl.height();
                retinaEl.attr("src","images/retina-resume2.png").width(retinaLogoW).height(retinaLogoH);
                var stickyEl = jQuery("#logo img.logo-sticky");
                var stickyLogoW = stickyEl.width();
                var stickyLogoH = stickyEl.height();
                stickyEl.attr("src","images/retina-resume2.png").width(stickyLogoW).height(stickyLogoH);
            }
        });
    </script>
    <script language="JavaScript">
        // Code for validating the form
        // Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
        // for details
        var frmvalidator  = new Validator("contact_form");
        //remove the following two lines if you like error message box popups
        frmvalidator.EnableOnPageErrorDisplaySingleBox();
        frmvalidator.EnableMsgsTogether();

        frmvalidator.addValidation("name","req","Please provide your name"); 
        frmvalidator.addValidation("email","req","Please provide your email"); 
        frmvalidator.addValidation("email","email","Please enter a valid email address"); 
        </script>
        <script language='JavaScript' type='text/javascript'>
        function refreshCaptcha()
        {
            var img = document.images['captchaimg'];
            img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
        }
    </script>

</body>

</html>