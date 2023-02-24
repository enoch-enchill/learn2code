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
    <title>APSU USA - Registration</title>

    <!-- materialize CSS  -->
    <link href="/admin-portal/assets/css/material.css" type="text/css" rel="stylesheet" />
    <link href="/admin-portal/assets/css/materialize.css" type="text/css" rel="stylesheet" />
    <!--app css-->
    <link href="/admin-portal/assets/css/web-style.css" type="text/css" rel="stylesheet" />
    <link href="/admin-portal/assets/css/web-theme.css" type="text/css" rel="stylesheet" />
    <!--Common css-->
    <link href="/admin-portal/assets/css/common-style.css" type="text/css" rel="stylesheet" />

</head>
<body>
    <!--Page Loader-->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/admin-portal/includes/global-preloader.php');
    ?>
    <!--End pre page loader-->
    <!--Page Body-->
    <main>
        <div id="brand-banner">
            <div class="section">
                <div class="row">
                    <div class="col s12">
                        <img src="/admin-portal/assets/img/favicon.png" alt=""  class="brand-logo"/>
                        <a href="./" class="brand"><span id="backend-page-caption">APSU USA - Registration</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div id="form-banner" class="form-xl">
            <div class="section" id="form-registration-html"></div>
        </div>

    </main>
    <!--End page body-->
    <!--Footer-->
    <footer class="form-footer">

        <div class="row">
            <div class="col s12 center">
                <ul class="footer-list">
                    <li><a href="http://www.apsuusa.org/" target="_blank">&copy;<?php echo date("Y"); ?> APSU USA</a></li>
                    <li>All Rights Reserved</li>
                    <li>By: <a href="https://nkunyim.net/" target="_blank">Nkunyim Technologies</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!--End footer-->
    <!--  Scripts-->
    <!-- Jquery -->
    <script src="/admin-portal/assets/js/jquery.min.js"></script>
    <!-- Materializecss js -->
    <script src="/admin-portal/assets/js/materialize.js"></script>
    <!-- gradientify Gradients jquery plugins -->
    <script src="/admin-portal/assets/js/jquery.gradientify.min.js"></script>
    <!-- Custom Js -->
    <script src="/admin-portal/assets/js/init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            /*background ingradient section*/
            $("body").gradientify({
                gradients: [{
                    start: [237, 238, 240],
                    stop: [246, 246, 246]
                }, {
                    start: [246, 246, 246],
                    stop: [228, 228, 228]
                }, {
                    start: [228, 228, 228],
                    stop: [246, 246, 246]
                }]
            });
        });
    </script>

    <!-- Page Modules -->
    <script type="module" src="/admin-portal/modules/register.js"></script>
    <!--End scripts-->
</body>
</html>