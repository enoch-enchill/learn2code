<!--Start HTML document-->
<!DOCTYPE html>

<!--HTML-->
<html lang="en">
<!--Head-->
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
    <title>Contents | APSU USA Portal</title>
    <!-- CSS  -->

    <!--google material design icons-->
    <link href="/admin-portal/assets/css/material.css" type="text/css" rel="stylesheet" />
    <!--materializecss css-->
    <link href="/admin-portal/assets/css/materialize.min.css" type="text/css" rel="stylesheet" />
    <!-- <link href="/admin-portal/assets/css/materialize-1.0.0.min.css" type="text/css" rel="stylesheet" /> -->
    <!--Syntax Highlighter prism css-->
    <link href="/admin-portal/assets/plugins/prism/prism.css" type="text/css" rel="stylesheet" />
    <!--sweetalert-->
    <link href="/admin-portal/assets/plugins/sweetalert/dist/sweetalert.css" type="text/css" rel="stylesheet" />
    <!--data tables-->
    <link href="/admin-portal/assets/plugins/DataTables/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Custom css-->
    <link href="/admin-portal/assets/css/app-style.css" type="text/css" rel="stylesheet" />
    <!--page theme css-->
    <link href="/admin-portal/assets/css/app-theme.css" type="text/css" rel="stylesheet" />
    <!--Common css-->
    <link href="/admin-portal/assets/css/common-style.css" type="text/css" rel="stylesheet" />
</head>
<!-- End head-->
<!--body-->

<body>
    
    <!-- pre page loader-->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/admin-portal/includes/global-preloader.php');
    ?>
    <!--End pre page loader-->
    <!--Navbar-->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/admin-portal/includes/global-navbar.php');
    ?>
    <!--End navbar-->
    
    <!--Left sidebar-->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/admin-portal/includes/global-sidebar.php');
    ?>
    <!--End left sidebar-->
    
    <!--Page Body-->
    <main>
        <!--Page body title-->
        <div class="me-page-title">
            <!--Page Title-->
            <div class="row" style="margin-bottom:0px!important;">
                <div class="col s8">
                    <?php
                        $content = (object)SessionConfig::get_page();
                    ?>
                    <h1 id="website-content-edit-id" data-id="<?php echo $content->id;?>">Edit Content</h1>
                    <!--Page description-->
                    <p>Fields marked as <i class="text-danger">*</i> are mandatory and must be provided.</p>                
                </div>
                <div class="col s4">
                    <a href="/admin/website/contents" class="btn-floating waves-effect waves-light default float-right"><i class="material-icons">restore</i></a>
                </div>
            </div>
        </div>
        <!--Page body content-->
        <div class="me-page-body">
            <div class="row" id="website-content-add"></div>
        </div>
        <!--End page body content-->
                
    </main>
    <!--End page body-->
    
    <!--Footer-->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/admin-portal/includes/global-footer.php');
    ?>
    <!--End footer-->
    
    <!--  Scripts-->

    <!-- Jquery -->
    <script src="/admin-portal/assets/js/jquery.min.js"></script>
    <!-- Materializecss js -->
    <script src="/admin-portal/assets/js/materialize.min.js"></script>
    <!-- <script src="/admin-portal/assets/js/materialize-1.0.0.min.js"></script> -->
    <!--Syntax Highlighter prism js-->
    <script src="/admin-portal/assets/plugins/prism/prism.js"></script>
    <!--Sweetalert-->
    <script src="/admin-portal/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
    <!-- data table -->
    <script type="text/javascript" src="/admin-portal/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="/admin-portal/assets/js/init.js"></script>
    <!--data tables example-->
    <script type="text/javascript">
        /*hide data table select entity programmatically*/
        $(document).ready(function() {
            $(".dataTables_wrapper .dropdown-content.select-dropdown li").on("click", function() {
                var that = this;
                setTimeout(function() {
                    if ($(that).parent().hasClass('active')) {
                        $(that).parent().removeClass('active');
                        $(that).parent().prev().removeClass('active');
                        $(that).parent().hide();
                        $(that).removeClass('selected');
                    }
                }, 40);
            });
        });
    </script>

    <!-- Page Modules -->
    <script type="module" src="/admin-portal/modules/website-contents-edit.js"></script>

    <!--End scripts-->
</body>
<!--End body-->
</html>
<!--End HTML-->