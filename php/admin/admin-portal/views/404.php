<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Favicon icon-->
    <link href="/admin-portal/assets/img/favicon.png" type="image/png" rel="icon">
    <!--Browser navbar color for mobile-->
    <!-- Chrome, Firefox OS and Opera -->
   <meta name="theme-color" content="#00796a">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#00796a">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#00796a">
    <!--Page title-->
    <title>404 - APSU USA</title>

    <!--google material design icon-->
    <link href="/admin-portal/assets/css/material.css" type="text/css" rel="stylesheet" />
    <!-- materialize CSS  -->
    <link href="/admin-portal/assets/css/materialize.css" type="text/css" rel="stylesheet" />
    <!--app css-->
    <link href="/admin-portal/assets/css/app-style.css" type="text/css" rel="stylesheet" />
    <link href="/admin-portal/assets/app-theme.css" type="text/css" rel="stylesheet" />
    <style>
        main {
            padding: 0px !important;
        }
    </style>

</head>
<body>
    <!-- pre page loader-->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/admin-portal/includes/global-preloader.php');
    ?>
    <!--End pre page loader-->
    <!--Page Body-->
    <main>
        <div id="error-banner">
            <div class="row">
                <div class="col s12 center">
                    <span class="error-code">404</span>
                    <h2 class="common-IntroText light">Page not found!</h2>
                    <p class="common-body-text">
                        You can <a class="common-Link" href="/">return to our home page</a>, or <a class="common-Link" href="#">drop us a line</a>.
                    </p>
                </div>
            </div>
        </div>
    </main>
    <!--End page body-->
    
    <!--  Scripts-->
    <!-- Jquery -->
    <script src="/admin-portal/assets/js/jquery.min.js"></script>
    <!-- Materializecss js -->
    <script src="/admin-portal/assets/js/materialize.js"></script>
    <!-- Custom Js -->
    <script src="/admin-portal/assets/js/init.js"></script>
    <!--End scripts-->

</body>
<!--End body-->
</html>
