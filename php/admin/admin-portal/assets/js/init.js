/* ////////////////////////////////    custom script /////////////////////////////////////////// */

'use strict';

$(function() {
    /* Page Loader */
    var timerStartPageLoading = Date.now();
    var pageLoadTime = (Date.now() - timerStartPageLoading) + 600;

    $("#pre-page-loader").show(0).delay(pageLoadTime).hide(0);

    /* Show and hide left sidebar*/
    $('.sidebar-collapse').sideNav({
        menuWidth: 230,
        draggable: false
    });

    /* initialize user account and notification dropdown*/
    $('#user-account-box .dropdown-button,#notifications-box .dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrain_width: false, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: false, // Displays dropdown below the button
        alignment: 'left' // Displays dropdown with edge aligned to the left of button
    });

    /*initialize chips*/
    $('.chips').material_chip();


    /* initialized tabs*/
    $('ul.tabs').tabs();
    /*initialized collapsible*/
    $('.collapsible').collapsible();
    /*initialized select*/
    $('select').material_select();

    /*models*/
    $('.modal').modal();

    /*initialized datapicker*/
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
    /* initialized character count*/
    $('input#input_text, textarea#textarea1').characterCounter();

    /* initialized autocomplete*/
    $('input.autocomplete').autocomplete({
        data: {
            "Apple": null,
            "Microsoft": null,
            "Google": 'http://placehold.it/250x250'
        }
    });


    /* full screen */

    $('#me-fullscreen').on('click', function() {
        if ((document.fullScreenElement && document.fullScreenElement !== null) ||
            (!document.mozFullScreen && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
        }
    });

    /* Page Refresh*/

    $('#me-pageRefresh').on('click', function() {
        location.reload();
        return false;

    });

    /*show and hide mobile search */
    $('#me-show-mobile-search').on('click', function() {
        $('#me-right-navbar,#me-left-navbar,#logo-container').addClass('hide-default-navbar');
        $('#me-mobile-search').addClass('show-default-navbar');

    });

    $('#me-hide-mobile-search').on('click', function() {
        hideMobileSearchResult();
        $('#me-right-navbar,#me-left-navbar,#logo-container').removeClass('hide-default-navbar');
        $('#me-mobile-search').removeClass('show-default-navbar');

    });

    /* flow text*/
    $('#flow-toggle').on('click', function() {
        $('#flow-text-demo p').toggleClass('flow-text');
    });

    /*Animate css*/

    $.fn.extend({
        animateCss: function(animationName) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            this.addClass('animated ' + animationName).one(animationEnd, function() {
                $(this).removeClass('animated ' + animationName);
            });
        }
    });


    /* Left sidebar toggle */

    $(document).on('click', '#left-sidebar .leftside-navigation .collapsible-header', function() {
        if ($(this).next('.collapsible-body').css("display") != 'block') {
            $('#left-sidebar .leftside-navigation .collapsible-header').next('.collapsible-body').slideUp();
            $('#left-sidebar .leftside-navigation .collapsible-header').removeClass("active");
        }
        $(this).toggleClass("active");
        $(this).next('.collapsible-body').slideToggle();

    });

    /* right sidebar show and hide*/

    $('.toggle-right-sidebar').on('click', function() {
        $('#right-sidebar-nav').animate({
            width: 'toggle'
        }, "slow")

        if ($('.toggle-fixed').css('right') == "0px") {
            $('.toggle-fixed').animate({
                right: 300
            }, "slow");
            $('.toggle-fixed .toggle-icon').text('clear');

        } else {
            $('.toggle-fixed').animate({
                right: 0
            }, "slow");
            $('.toggle-fixed .toggle-icon').text('menu');
        }
    });

    /* search result box */
    var browerBodyWidth = $(window).width();
    $('input#desktop-search.search-list-on').on('focus', function() {

        if (browerBodyWidth > 990) {
            showDesktopSearchResult();
        }
    });

    $('input#mobile-search.search-list-on').on('focus', function() {

        if (browerBodyWidth <= 990) {
            showMobileSearchResult();
        }
    });

    $('#search-backdrop').on('click', function() {
        if (browerBodyWidth > 990) {
            hideDesktopSearchResult();
        } else {
            hideMobileSearchResult();
        }

    });

    function searchResultToggle() {
        browerBodyWidth = $(window).width();
        if (browerBodyWidth > 990) {
            var searchInput = $('.desktop-search-div');
            var searchPosition = searchInput.position();
            $('#search-result').css({ 'top': '48px', 'width': '' + $('.desktop-search-div').width(), 'left': '' + searchPosition.left + 'px' });
        } else {
            hideDesktopSearchResult();
        }
    }

    function showDesktopSearchResult() {
        var searchInput = $('.desktop-search-div');
        var searchPosition = searchInput.position();
        $('#search-result').css({ 'top': '48px', 'width': '' + $('.desktop-search-div').width(), 'left': '' + searchPosition.left + 'px' });
        $('.desktop-search-div').css({ 'z-index': '2000' });
        $('#search-backdrop,#search-result').show();

    }

    function showMobileSearchResult() {
        $('#search-result').css({ 'width': '100%', 'left': '0px', 'right': '0px', 'top': '56px' });
        $('.mobile-search-div').css({ 'z-index': '2000' });
        $('#search-backdrop,#search-result').show();

    }

    function hideDesktopSearchResult() {
        $('.desktop-search-div').css('z-index', 'inherit');
        $('#search-backdrop,#search-result').hide();
    }

    function hideMobileSearchResult() {
        $('.mobile-search-div').css('z-index', 'inherit');
        $('#search-backdrop,#search-result').hide();
    }

    /*scroll top*/

    $('#scroll-top-dash').on('click', function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });
});