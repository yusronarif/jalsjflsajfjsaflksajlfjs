<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?php echo $site_name; ?></title>
    <meta name="description" content="<?php echo $site_name; ?>"/>
    <meta name="author" content="GoodSyst"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/front/css/base.css"/>
    <link rel="stylesheet" class="alt" href="<?php echo site_url(); ?>assets/front/css/theme-orange.css">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,600italic,600,400italic' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo site_url(); ?>assets/front/images/favicon.ico"/>
    <link rel="apple-touch-icon-precomposed" href="<?php echo site_url(); ?>assets/front/images/apple-touch-icon.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url(); ?>assets/front/images/apple-touch-icon-57x57.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url(); ?>assets/front/images/apple-touch-icon-72x72.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url(); ?>assets/front/images/apple-touch-icon-114x114.png"/>

    <noscript>
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/front/css/styleNoJS.css"/>
    </noscript>

    <script type="text/javascript" src="<?php echo site_url(); ?>assets/front/js/modernizr.custom.79639.js"></script><!-- JQuery Plugin -->
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/front/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/front/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/front/js/jquery.slitslider.js"></script>
    <script type='text/javascript' src="<?php echo site_url(); ?>assets/front/js/jquery.plugins.min.js"></script>
    <script type='text/javascript' src="<?php echo site_url(); ?>assets/front/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="<?php echo site_url(); ?>assets/front/js/tinynav.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/front/js/jquery.iosslider.min.js"></script>
    <script type='text/javascript' src="<?php echo site_url(); ?>assets/front/js/jquery.flexslider.js"></script>
    <script type='text/javascript' src="<?php echo site_url(); ?>assets/front/js/jquery.prettyPhoto.js"></script>
    <script type='text/javascript' src="<?php echo site_url(); ?>assets/front/js/superfish.js"></script>
    <script type='text/javascript' src="<?php echo site_url(); ?>assets/front/js/isotope.js"></script>
    <script type='text/javascript' src="<?php echo site_url(); ?>assets/front/js/jquery.hoverex.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/front/twitter/jquery.tweet.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/front/js/jflickrfeed.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/front/js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/front/js/jcarousel.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/front/js/jquery.carouFredSel.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/front/js/jquery.validate.js"></script>

    <script src="<?php echo site_url(); ?>assets/front/assets/plugins/revolutionslider/js/jquery.themepunch.revolution.min.js"></script>
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/front/assets/plugins/revolutionslider/css/settings.css">

    <!-- JQuery Custom Plugin -->
    <script type='text/javascript' src="<?php echo site_url(); ?>assets/front/js/custom.js"></script>
    <script type="text/javascript">
        $(window).bind("load", function ()
        {
            $(document).ready(function ()
            {
                $('#flexslider-loader').fadeOut(800);
            });
        });
    </script>
    <script type="application/x-javascript">
        addEventListener("load", function ()
        {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar()
        {
            window.scrollTo(0, 1);
        }
    </script>

    <!--[if lt IE 9]>
    <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<?php
if($_SERVER['CI_ENV']!='development')
{
    ?><script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-72217594-1', 'auto');
    ga('send', 'pageview');
</script><?php
}
?>

<div class="main-wrapper">
    <!--header-->