<?php
$siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST']."/";
$currurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
global $wpdb;
$DB_pos = $wpdb->prefix.'posts';
$DB_sql = $wpdb->prefix.'kuli_digital_setting';
$DB_data = $wpdb->prefix.'kuli_digital_project';
$if_slug = $_SESSION['slugID'];
foreach($wpdb->get_results("SELECT * FROM $DB_data WHERE idmd5 = '$if_slug'") as $key => $row){
    $slug_url = $row->shortlink;
    $images = $row->gambar;
    $title = $row->judul;
    $desc_pendek = preg_replace('/\\\\/', '', $row->deskripsi);
    $content = preg_replace('/\\\\/', '', $row->konten);
    $ads_1 = preg_replace('/\\\\/', '', $row->ads_1);
    $ads_2 = preg_replace('/\\\\/', '', $row->ads_2);
    $ads_3 = preg_replace('/\\\\/', '', $row->ads_3);
    $float_ads = preg_replace('/\\\\/', '', $row->float_ads);
    $target_url = $row->download_button_url;
    $title_btn = $row->download_button_text;
    $back_button_text = $row->back_button_text;
    $back_button_url = $row->back_button_url;
    $desktop_view = $row->device_view;
    $html_head = preg_replace('/\\\\/', '', $row->html_head);
    $html_foot = preg_replace('/\\\\/', '', $row->html_foot);
    $idmd5z = $row->idmd5;
}
$despos = str_replace("\n\n", "</p>\n<p>", $content);
$despos = "<p>" . $despos . "</p>";

$sitename = explode('/', $siteurl);
?>
<!doctype html>
<html amp lang="en">
<head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
    <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-lightbox-gallery" src="https://cdn.ampproject.org/v0/amp-lightbox-gallery-0.1.js"></script>
    <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <title><?php echo $title; ?></title>
    <link rel="canonical" href="<?php echo $currurl; ?>" />
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link href="//www.youtube.com" rel="preconnect dns-prefetch">
    <link href="//pagead2.googlesyndication.com" rel="preconnect dns-prefetch">
    <link href="//googleads.g.doubleclick.net" rel="preconnect dns-prefetch">
    <link href="//ad.doubleclick.net" rel="preconnect dns-prefetch">
    <link href="//i.ytimg.com" rel="preconnect dns-prefetch">
    <link href="//www.gstatic.com" rel="preconnect dns-prefetch">
    <link href="//www.google.com" rel="preconnect dns-prefetch">
    <link href="//cse.google.com" rel="preconnect dns-prefetch">
    <link href="//tpc.googlesyndication.com" rel="preconnect dns-prefetch">
    <link href="//www.google-analytics.com" rel="preconnect dns-prefetch">
    <link href="//yt3.ggpht.com" rel="preconnect dns-prefetch">
    <link href="//cdn.jsdelivr.net" rel="preconnect dns-prefetch">
    <link href="//fonts.gstatic.com" rel="preconnect dns-prefetch">
    <link href="//adservice.google.com" rel="preconnect dns-prefetch">
    <link href="//ajax.cloudflare.com" rel="preconnect dns-prefetch">
    <link href="//www.googletagmanager.com" rel="preconnect dns-prefetch">
    <link href="//partner.googleadservices.com" rel="preconnect dns-prefetch">
    <link href="//www.googletagservices.com" rel="preconnect dns-prefetch">
    <link href="//static.doubleclick.net" rel="preconnect dns-prefetch">
    <style amp-boilerplate>
        body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }
    </style>
	<noscript>
        <style amp-boilerplate>
            body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }
        </style>
    </noscript>
    <link rel="shortcut icon" type="image/x-icon" href="http://www.gstatic.com/android/market_images/web/favicon_v3.ico" />
    <style amp-custom>
    html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, menu, nav, output, ruby, section, summary, time, mark, audio, video {
        margin: 0;
        padding: 0;
        border: 0;
        font: inherit;
        font-size: 100%;
        vertical-align: baseline;
    }
    body {
        background: #f5f5f5;
        font-family: Helvetica, Arial, sans-serif;
    }

    ul, menu, dir {
        -webkit-margin-before: 0em;
        -webkit-margin-after: 0em;
    }

    ul, li {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    p {
        -webkit-margin-before: 0em;
        -webkit-margin-after: 0em;
    }
    a:-webkit-any-link {
        color: -webkit-link;
        text-decoration: none;
        cursor: auto;
    }

    h1, h2, h3, h4, h5, h6 {
        -webkit-margin-before: 0em;
        -webkit-margin-after: 0em;
    }

    .header .go-back i, .choose-cate .toggle, .header-r .icon-sear::after, .header-r .icon-main::after, .dropdown-toggle .caret, .search-bar .search-submit i, .search-bar-box .search-submit i, .search-combox .search-button i, .search-suggestion .item .icon-down, .list .other .icon-down, .special-list .inner::after, .cate-list .inner::after, .footer-links .back-top::before, .cate-menu .toggle::before, .alert .alert-close, .dialog-close {
        display: inline-block;
        /* background: url(/asset/v2/images/sp.png?03c5725f) no-repeat 200em 0; */
        background: url(/asset/v2/images/sp.png?03c5725f) no-repeat 200em 0;
        background-size: 68px auto;
        /* overflow: hidden; */
        color: transparent;
    }
    .header {
        position: fixed;
        left: 0;
        top: 0;
        z-index: 1;
        width: 100%;
        height: 44px;
        background: #f43b18 url(data:image/png;base64,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);
        background-size: 100%;
        box-shadow: 0 1px 2px -1px grey;
        -moz-box-shadow: 0 1px 2px -1px grey;
        -webkit-box-shadow: 0 1px 2px -1px grey;
    }

    .header > h1,
    /* .header > h1 .logo {
        display: inline-block;
        height: 44px;
    } */
    .header > h1 .menu {
        display: inline-block;
        height: 44px;
    }

    .header .logo img {
        width: 60px;
        height: 14px;
        /*margin: 15px 0 0 10px;*/
    }

    .header .btn-download-client {
        position: absolute;
        display: inline-block;
        background-color: #d63329;
        border: 1px solid #a21f17;
        box-shadow: 0 0 7px 3px rgba(89, 6, 1, 0.15);
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        left: 80px;
        top: 6px;
        padding: 0 6px;
    }

    .header .btn-download-client > span {
        display: inline-block;
        background: url(/asset/v2/images/btn-download-arrow.png?dbae42b5) no-repeat center right;
        background-size: 20px;
        line-height: 30px;
        padding-right: 24px;
        font-size: 12px;
        color: #fff;
    }

    .header .fb-like {
        position: absolute;
        left: 75px;
        top: 12px;
        width: 150px;
        height: 30px;
        overflow: hidden;
    }

    .header .search-bar-box {
        width: 44%;
    }

    .header .go-back {
        display: inline-block;
        height: 44px;
        padding: 0 2px 0 10px;
    }

    .header .go-back i {
        display: inline-block;
        background-size: 68px auto;
        overflow: hidden;
        color: transparent;
        /*width: 7px;*/
        height: 12px;
        background-position: 0 -120px;
        margin-top: 16px;
    }

    .header .dialog-box {
        position: absolute;
        right: 5px;
        top: 9px;
        width: 28px;
        height: 28px;
        overflow: hidden;
    }

    .header .dialog-box-page {
        position: relative;
        right: 4px;
        top: -3px;
        width: 28px;
        height: 28px;
        display: inline-block;
    }

    .header .dialog-box.shake-left {
        transition: all 0.1s ease-out;
        -moz-transition: all 0.1s ease-out; /* Firefox 4 */
        -webkit-transition: all 0.1s ease-out; /* Safari  Chrome */
        -o-transition: all 0.1s ease-out; /* Opera */
        transform: rotate(-10deg);
        -ms-transform: rotate(-10deg);
        -moz-transform: rotate(-10deg);
        -webkit-transform: rotate(-10deg);
        -o-transform: rotate(-10deg);
    }

    .header .dialog-box.shake-right {
        transition: all 0.1s ease-out;
        -moz-transition: all 0.1s ease-out; /* Firefox 4 */
        -webkit-transition: all 0.1s ease-out; /* Safari  Chrome */
        -o-transition: all 0.1s ease-out; /* Opera */
        transform: rotate(10deg);
        -ms-transform: rotate(10deg);
        -moz-transform: rotate(10deg);
        -webkit-transform: rotate(10deg);
        -o-transform: rotate(10deg);
    }

    .header .adv-box img {
        width: 60px;
        height: 14px;
        margin: 15px 0 0 10px;
    }

    .activate-searchbar .fb-like {
        display: none;
    }

    .activate-searchbar .search-bar {
        width: 70%;
    }

    .header-back .logo img {
        margin-left: 0;
    }

    .choose-cate .toggle {
        width: 15px;
        height: 15px;
        background-position: 0 -20px;
        margin-left: 6px;
    }

    .choose-cate .toggle {
        vertical-align: middle;
    }

    .header-m {
        height: 44px;
        line-height: 44px;
        text-align: center;
        color: #343434;
        font-weight: bold;
        font-size: 16px;
        padding-left: 42px;
        overflow: hidden;
        background: url(data:image/png;base64,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) no-repeat center center;
        background-size: auto 15px;
    }

    .header-l {
        position: absolute;
        top: 0;
        left: 0;
    }
    .header-icon-menu {
        position: absolute;
        top: 0;
        left: 0;
        display: inline-block;
        height: 44px;
    }
    .header-r {
        position: absolute;
        top: 0;
        right: 0;
    }

    .header-r .icon-sear,
    .header-r .icon-main,
    .header-r .icon-radar {
        position: relative;
        top: 7px;
        display: inline-block;
        padding: 0 0 0;
        border-radius: 2px;
    }

    .header-r .icon-sear::after,
    .header-r .icon-main::after,
    .header-r .icon-radar::after {
        content: "";
        width: 20px;
        height: 20px;
        /* background-position: 0 0; */
        background-position: -24px -218px;
        background-size: 78px auto;
    }

    .header-r .icon-sear::after {
        background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAQAAABLCVATAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfkChoIGBpFf2z1AAAB8UlEQVRIx62VMUgDMRSG/5MiFApaqIOiHRSchKogXZSCmwgOjgUHV6EgTrpU6qLOXd0Ex26KdBNBByeLUKVoEVQEpbjcosjvYC5NvMtdSn1LHvkfX/68d1yAfwonaJMJLGEeGYwhiS+84QEXOHHOOiJziGW6DIomC4zZYgoGiBd1ZqMhcVYYHZ9cC+0R46hiVlFqOMUN3gEMYwqLSCvalrNn9qO6qXDCpy+zoVSsmnvjhcu88eoHStV48KRcWTAX2sd9iaoGyWUp5xERSgtyf6WE9FOJHC2YYstQzbw8YyIaBLAoP4SELngtvLLBABySBy+0d3sAzIj8xA7kvKAm0owOGhH5tR0IwL1Y0zooKfI3a9CrWPt10JfIe61BXuW3DvrwG42IQbG+6KA7kU9bgybFeqvtys/+0Y7CrBz/qC7kpLBsBTr0/ph+qSmkBuMd+Cn5xTUpHkVg+liX/4mUX45JmdwPwaR4LuuKJsOfsuQ44KzfmkflRTG9J8r1yBaL6kQYY1a22OBIeSC5iV1Nu0Udz4hjEDMYCDh729kxuVqJeNVIKtcz9QkAOM5qCMTlJmMsWaEA5lhRWt9ub8kbQhDKMcASmEMGaSTh4hlPuHRuNL2Ethdzr2xCc7XeBUhDtboCKahGlyCAG2yxGf46dxg/5byMYrgGEjYAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjAtMTAtMjZUMDg6MjQ6MTMrMDA6MDAYkHRCAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIwLTEwLTI2VDA4OjI0OjEzKzAwOjAwac3M/gAAAABJRU5ErkJggg==) no-repeat;
        background-size: 20px 20px;
    }

    .header-r .icon-sear.press,
    .header-r .icon-main.press,
    .header-r .icon-radar.press {
        background-color: #B72820;
    }

    .header-r .icon-radar::after {
        background-image: url(/asset/v2/images/search/icon-radar.png?b30d36b8);
        display: inline-block;
        background-size: 100%;
        overflow: hidden;
        color: transparent;
    }
    .header-r .icon-sear {
        top: 6px;
        padding: 6px 6px 0;
        margin: 0 2px 0 0;
    }
    .header-r .icon-main {
        top: 6px;
        padding: 6px 6px 0;
        margin: 0 2px 0 0;
    }

    .header-r .icon-main::after {
        width: 22px;
        height: 20px;
        background-position: -23px -151px;
    }

    

    
    
    
    

    .detail-app-info {
        background: #fff;
        padding-bottom: 10px;
        min-height: 87px;
        position: relative;
    }

    .detail-app-info .pic {
        position: absolute;
        margin: 12px 0 12px 12px;
    }

    .detail-app-info .text {
        position: absolute;
        margin: 12px 130px 0 84px;
    }

    .detail-app-info .text .name {
        line-height: 20px;
        color: #343434;
        font-size: 16px;
        word-wrap: break-word;
        max-height: 40px;
        overflow: hidden;
    }

    .detail-app-info .mid {
        line-height: 18px;
    }

    .detail-app-info .star-small {
        display: inline-block;
        background: url('/asset/id/amp_images/star_small.png');
        background-size: 60px auto;
        width: 60px;
        height: 10px;
        font-size: 0;
    }

    .detail-app-info .star-small.s1 {
        background-position: 0 -12px;
    }

    .detail-app-info .star-small.s2 {
        background-position: 0 -24px;
    }

    .detail-app-info .star-small.s3 {
        background-position: 0 -36px;
    }

    .detail-app-info .star-small.s4 {
        background-position: 0 -47px;
    }

    .detail-app-info .star-small.s5 {
        background-position: 0 -59px;
    }

    .detail-app-info .star-small.s6 {
        background-position: 0 -71px;
    }

    .detail-app-info .star-small.s7 {
        background-position: 0 -83px;
    }

    .detail-app-info .star-small.s8 {
        background-position: 0 -95px;
    }

    .detail-app-info .star-small.s9 {
        background-position: 0 -106px;
    }

    .detail-app-info .star-small.s10 {
        background-position: 0 -118px;
    }

    .detail-app-info .rating-num {
        font-size: 12px;
        color: #9e9e9e;
    }

    .detail-app-info .other .type {
        font-size: 12px;
        color: #878787;
        text-decoration: none;
    }

    .detail-app-info .other span {
        font-size: 12px;
        color: #878787;
    }

    .detail-app-info .select-download-box {
        position: absolute;
        top: 50%;
        right: 10px;
        margin-top: -27px;
    }

    .detail-app-info .select-download-box .operate {
        margin: 7px 0 0 0;
    }

    .detail-app-info .select-download-box .checkbox {
        display: inline-block;
        border-radius: 2px;
        width: 16px;
        height: 16px;
        text-align: center;
        font-size: 12px;
        line-height: 16px;
        margin: 0 9px;
        border: 1px solid #D63329;
    }

    .detail-app-info .select-download-box .checkbox:after {
        content: '✔';
        color: #D63329;
    }

    .detail-app-info .select-download-box .intro {
        display: inline-block;
        color: #343434;
        font-size: 12px;
        line-height: 16px;
    }

    .detail-app-info .select-download-btn {
        display: inline-block;
        width: 122px;
        line-height: 32px;
        margin: 12px 0 0 0;
        font-size: 14px;
        text-align: center;
        color: #fff;
        background: #D63329;
        border-radius: 6px;
        white-space: nowrap;
    }

    /*  */
    amp-carousel {
        margin: 10px 0 0 0;
    }

    

    /**/
    .panel {
        position: relative;
        background: #fff;
        border-bottom: 1px solid #e3e3e3;
        margin: 11px 0 0 0;
        padding: 12px 12px 12px 12px;
    }

    .panel .panel-title {
        font-size: 16px;
        color: #343434;
        font-weight: bold;
    }

    .panel .panel-title:before {
        content: '|';
        line-height: normal;
        width: 2px;
        height: 13px;
        color: #D63329;
        margin: 0 10px 0 0;
    }

    .panel .panel-bd {
        font-size: 14px;
        margin-top: 10px;
    }

    .panel.panel-desc .panel-bd {
        max-height: 300px;
        overflow: hidden;
    }

    

    .panel-desc .panel-ft .expander {
        position: relative;
        top: -20px;
        float: right;
        color: #D63329;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        background: #fff;
        opacity: 0.95;
        -webkit-box-shadow: -10px -5px 10px 15px #fff;
        -moz-box-shadow: -10px -5px 10px 15px #fff;
        box-shadow: -10px -5px 10px 15px #fff;
    }

    .panel .panel-bd .text {
        font-size: 14px;
        line-height: 20px;
        color: #878787;
    }

    .panel .more-btn {
        position: absolute;
        right: 12px;
        top: 12px;
        font-size: 16px;
        font-weight: bold;
        color: #D63329;
    }

    .panel .more-btn:after {
        position: relative;
        top: 1px;
        display: inline-block;
        content: '';
        width: 14px;
        height: 14px;
        margin: 0 0 0 8px;
        background: url('/asset/id/amp_images/more-icon.png') no-repeat;
        background-size: 100% auto;
    }

    /*  */
    .panel-info .panel-bd {
        margin: 11px 0 15px 0;
    }

    .panel-info .panel-bd p {
        font-size: 14px;
        color: #343434;
        margin: 12px 0 0 0;
    }

    .panel-info .panel-bd .label {
        color: #878787;
    }

    .panel-info .flex {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        padding: 0 5px 10px;
        color: #666;
    }

    .panel-info .panel-ft .see-more,
    .panel-info .panel-ft .download-btn {
        display: inline-block;
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
        line-height: 32px;
        border: 1px solid #D63329;
        border-radius: 4px;
        text-align: center;
        text-decoration: none;
    }

    .panel-info .panel-ft .see-more {
        color: #D63329;
        margin: 0 2px 0 0;
    }

    .panel-info .panel-ft .download-btn {
        color: #fff;
        background: #D63329;
        margin: 0 0 0 2px;
    }

    /*  */
    .panel-related-searches {
        position: relative;
    }

    .panel-related-searches .text-list li {
        border-bottom: 1px solid #e3e3e3;
    }

    .panel-related-searches .text-list li:last-child {
        border-bottom: 0;
    }

    .panel-related-searches .text-list li a {
        line-height: 40px;
        text-decoration: none;
        font-size: 14px;
        color: #878787;
    }

    .panel-related-searches .more-btn {
        position: absolute;
        right: 12px;
        top: 12px;
        font-size: 16px;
        font-weight: bold;
        color: #D63329;
    }

    .panel-related-searches .more-btn:after {
        position: relative;
        top: 1px;
        display: inline-block;
        content: '';
        width: 14px;
        height: 14px;
        margin: 0 0 0 8px;
        background: url('/asset/id/amp_images/more-icon.png') no-repeat;
        background-size: 100% auto;
    }

    /*  */
    .panel-rate .panel-bd {
        overflow: hidden;
        margin: 18px 0 20px 0;
    }

    .panel-rate .rate-btn amp-img {
        position: relative;
        left: -5px;
    }

    .panel-rate .star-large {
        float: left;
        margin: 4px 0 0 0;
    }

    .panel-rate .star i {
        display: inline-block;
        width: 29px;
        height: 29px;
    }

    .panel-rate .star i.on {
        background: url('/asset/id/amp_images/score_on.png') no-repeat;
        background-size: 100%;
    }

    .panel-rate .rate-num {
        display: block;
        float: left;
        margin: 9px 0 0 10px;
        font-size: 14px;
        color: #878787;
    }

    .panel-rate .rate-btn {
        display: block;
        float: right;
        width: 85px;
        line-height: 32px;
        text-align: center;
        border: 1px solid #6BB856;
        border-radius: 6px;
        font-size: 14px;
        color: #343434;
    }

    /*  */
    .panel-rcmd:first-child {
        margin-top: 0;
    }

    .panel-rcmd .rcmd-list {
        overflow: hidden;
        margin: 10px 0 8px 0px;
    }

    .panel-rcmd .rcmd-list .item {
        float: left;
        min-width: 48px;
        width: 25%;
        text-align: center;
        margin-bottom: 10px;
        padding: 0 6px;
        box-sizing: border-box;
    }

    .panel-rcmd .rcmd-list .name {
        margin: 9px 0 7px 0;
        font-size: 12px;
        color: #343434;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .panel-rcmd .rcmd-download-btn {
        display: block;
        width: 75px;
        line-height: 28px;
        font-size: 14px;
        color: #fff;
        text-align: center;
        background: #6BB856;
        text-decoration: none;
        border-radius: 4px;
        margin: 0 auto;
    }

    /* Share by */
    .share-group {
        height: 34px;
        padding: 15px 12px 15px 12px;
    }

    .share-group span {
        position: relative;
        top: -9px;
    }

    .share-group a {
        margin: 0 0 0 10px;
    }

    .share-group a:first-child {
        margin: 0 0 0 7px;
    }

    /* */
    .breadcrumb {
        margin: 14px 0 19px 12px;
        font-size: 14px;
        color: #878787;
        line-height: 2;
    }
    .breadcrumb,.breadcrumb-amp a {
        color: #878787;
        text-decoration: none;
        display: inline-block;
        line-height:22px;
    }
    .breadcrumb-amp {
        margin: 10px 0 10px 12px;
        font-size: 14px;
        color: #878787;
        line-height:22px;
    }
    /*  */
    .footer {
    }

    .footer .common-border-bottom {
        border-bottom: 1px solid #e3e3e3;
    }

    .footer .footer-links {
        margin: 0 12px;
        text-align: center;
        color: #878787;
    }

    .footer .footer-links a {
        font-size: 12px;
        color: #878787;
    }

    .footer .gerneral {
        line-height: 40px;
    }

    .footer .gerneral .item {
        margin: 0 19px 0 0;
    }

    .footer .gerneral .back-top {
        display: inline-block;
        height: 24px;
        line-height: 24px;
        border: 1px solid #BEBEBE;
        border-radius: 2px;
        font-size: 12px;
        padding: 0 8px;
        background-color: #BEBEBE;
        color: #fff;
    }

    .footer .gerneral .back-top:before {
        content: '';
        display: block;
        float: left;
        width: 9px;
        height: 11px;
        background: url('/asset/id/amp_images/back2top.png') no-repeat;
        background-size: 100% auto;
        margin: 6px 6px 0 0;
    }

    .footer .friendly-links .item {
        display: inline-block;
        line-height: 33px;
    }

    .footer .friendly-links .item item:after {
        content: '|';
        color: #878787;
        padding: 0 8px;
    }

    .footer .friendly-links amp-img {
        position: relative;
        top: 4px;
    }

    .footer .friendly-links .f-like:before,
    .footer .friendly-links .t-like:before,
    .footer .friendly-links .f-corporation:before,
    .footer .friendly-links .f-business:before,
    .footer .friendly-links .icon_app:before {
        content: '';
        display: inline-block;
        position: relative;
        top: 4px;
        right: 5px;
        width: 16px;
        height: 16px;
        margin: 0 0 0 9px;
    }

    .footer .friendly-links .f-corporation:before {
        background: url('/asset/v2/images/ic_corporation.png') no-repeat;
        background-size: 16px 16px;
    }
    .footer .friendly-links .f-business:before {
        background: url('/asset/v2/images/ic_business.png') no-repeat;
        background-size: 16px 16px;
    }
    .footer .friendly-links .f-like:before {
        background: url('/asset/id/amp_images/icon_facebook.png') no-repeat;
        background-size: 16px 16px;
    }

    .footer .friendly-links .t-like:before {
        background: url('/asset/id/amp_images/icon_twitter.png') no-repeat;
        background-size: 16px 16px;
    }

    .footer .friendly-links .icon_app:before {
        background: url('/asset/id/amp_images/icon_9apps.png') no-repeat;
        background-size: 16px 16px;
    }

    .footer .friendly-links .f-like:after,
    .footer .friendly-links .t-like:after {
        content: '|';
        color: #858585;
    }

    .footer .row .item {
        display: inline-block;
        line-height: 33px;
    }

    .footer .row .item a:after {
        content: '|';
        color: #878787;
        margin: 0 0 0 9px;
    }

    .footer .row .item:last-child a:after {
        display: none;
    }

    .footer .lang {
        line-height: 45px;
    }

    .footer-text {
        /*margin: 28px 0 0 0;*/
        padding: 22px 0 14px;
        font-size: 12px;
        text-align: center;
    }

    .footer-text .giftbox {
        color: #da4a46;
        line-height: 34px;
    }

    .footer-text .giftbox amp-img {
        position: relative;
        top: 3px;
    }

    .footer-text .giftbox span {
        margin: 0 8px 0 5px;
    }

    .footer-text .contact {
        color: #343434;
    }

    .panel.panel-desc .panel-ft {
        text-align: center;
        font-size: 12px;
        line-height: 16px;
        color: #ec2c3e;
        padding: 5px 5px 5px 5px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.6) 0%, #ffffff 100%);
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 30px;
        line-height: 30px;
        display: block;
    }

    .panel-ft .toggle-more {
        display: block;
    }

    .panel-ft .toggle-less {
        display: none;
    }

    .panel .panel-bd.expand {
        max-height: inherit;
        padding-bottom: 30px;
    }

    .panel .panel-ft.expand .toggle-more {
        display: none;
    }

    .panel .panel-ft.expand .toggle-less {
        display: block;
    }

    .panel-review-hidden .panel-review-row {
        padding: 10px 0
    }

    .panel-review-hidden .panel-review-row:nth-child(n+2) {
        border-top: 1px dashed #eee
    }

    .panel-review-hidden .panel-review-row .panel-user-row {
        display: flex
    }

    .panel-review-hidden .panel-review-row .panel-user-row .panel-user-icon {
        border-radius: 50%;
        min-width: 35px;
        margin-top: 2px;
        max-width: 35px;
        min-height: 35px;
        max-height: 35px;
        overflow: hidden
    }

    .panel-review-hidden .panel-review-row .panel-user-row .panel-user-icon img {
        width: 100%;
        height: 100%;
    }

    .panel-review-hidden .panel-review-row .panel-user-row .panel-user-info {
        display: flex;
        flex-direction: column;
        margin-left: 15px;
    }

    .panel-review-hidden .panel-review-row .panel-user-row .panel-user-info .panel-user-name {
        font-weight: 700;
    }

    .panel-review-hidden .panel-review-row .panel-user-row .panel-user-info .panel-review-time {
        font-size: 12px;
        margin-top: 5px;
        margin-bottom: 5px;
        color: #9e9e9e
    }

    .panel-review-hidden .panel-review-row .panel-user-row .panel-user-info .panel-review-content {
        line-height: 21px;
        text-overflow: ellipsis;
        overflow: hidden;
        max-width: 80vw;
        height: auto;
        color: #8b8b8b
    }

    .panel-review-hidden .panel-review-row .panel-user-row .panel-user-info .js-detail-btn-full {
        color: #409eff
    }

    .panel-related-searches .more-btn:after {
        background: url(/asset/v2/images/sp_audio.png?03a727b8) no-repeat 0 0;
        background-size: 26px auto;
    }

    .panel .more-btn:after {
        background: url(/asset/v2/images/sp_audio.png?03a727b8) no-repeat 0 0;
        background-size: 26px auto;
    }

    .footer .friendly-links .icon_app:before {
        background: url(/asset/v2/images/icon_9apps.png?eab80b9a) no-repeat;
        background-size: 16px 16px;
    }

    .footer {
        background-color: #434343;
        color: #A6A6A6;
    }

    .footer-text .contact {
        color: #A6A6A6;
    }

    .footer .footer-links a {
        color: #fff;
    }
    .banner-download {
        padding: 12px;
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        align-items: center;
        background: #fff;
        margin-top: 6px;
        box-shadow: 0px 0px 1px #0000005c;
        -moz-box-shadow: 0px 0px 1px #0000005c;
        -webkit-box-shadow: 0px 0px 1px #0000005c;
    }
    .banner-download .download-wrapper {
        flex: 1;
        display: flex;
    }
    .banner-download .icon img {
        width: 50px;
        height: 50px;
    }
    .banner-download .info {
        height: 50px;
        margin-left: 10px;
        color: #343434;
    }
    .banner-download .info p {
        font-size: 14px;
        font-weight: bold;
        min-height: 25px;
        margin-top: 3px;
    }
    .banner-download .info span {
        font-weight: 100;
        font-size: 12px;
    }
    .banner-download .btn-download {
        border: 1px solid #ec2c3e;
        width: 90px;
        height: 35px;
        line-height: 35px;
        color: #fff;
        font-size: 14px;
        border-radius: 5px;
        background: #ec2c3e;
        text-align: center;
    }
    p{margin-top: 10px;}
</style>
<?php echo $html_head; ?>
</head>
<body>
<?php if(!empty($float_ads)){ ?>
<script type="text/javascript">
        $(document).ready(function() {$('img#closed').click(function(){$('#btm_banner').hide(90);});});
</script>
<div id="floatads" style="width:100%;margin:auto;text-align:center;float:none;overflow:hidden;display:scroll;position:fixed;bottom:0;z-index:9999">
	<div><a id="close-floatads" onclick='document.getElementById(&apos;floatads&apos;).style.display = &apos;none&apos;;' style="cursor:pointer;"><img alt='close' src='https://3.bp.blogspot.com/-ZZSacDHLWlM/VhvlKTMjbLI/AAAAAAAAF2M/UDzU4rrvcaI/s1600/btn_close.gif' title='close button'/></a></div>
    <div style="text-align:center;display:block;max-width:728px;height:auto;overflow:hidden;margin:auto">
        <?php echo $float_ads; ?>
	</div>
</div>
<?php } ?>
    
<div class="breadcrumb-amp" style="text-align:center;">
    <a href="<?php echo $siteurl; ?>">Home</a> » <a href="<?php echo $currurl; ?>">Apps</a> » <a class="theme-color"><?php echo $title; ?></a>
</div>

<section class="content" style="max-width:970px;margin:20px auto;">

    <div style="margin-top:20px;margin-bottom:20px;text-align:center;">
        <?php echo $ads_1; ?>
    </div>

    <div class="detail-app-info">
        
        <?php if(!empty($images)){ ?>
        <div class="pic">
            <amp-img itemprop="image" src="<?php echo $images; ?>" width="65" height="65" alt="Web Template"></amp-img>
        </div>
        <?php } ?>
        
        <div class="text">
            <h1 class="name" itemprop="name"><?php echo $title; ?></h1>
            
            <p class="other">
                <a class="type"><span itemprop="applicationCategory">Productivity</span></a>
                <span>| <?php echo rand(2,6).'.'.rand(1,9); ?>MB</span>
            </p>
        </div>
        <div class="select-download-box" style="margin-top:-37px;">
            <a class="select-download-btn" title="Download" href="<?php echo $target_url; ?>" style="cursor:pointer;width:110px;">Download</a>
        </div>
    </div>

    <div style="margin-top:20px;margin-bottom:20px;text-align:center;">
        <?php echo $ads_2; ?>
    </div>

        <amp-state id="show_more">
            <script type="application/json">
                {
                    "show": false
                }
            </script>
        </amp-state>
        <div class="panel panel-desc" role="foldToggle">
            <h2 class="panel-title">Description</h2>
            <div class="panel-bd" [class]="(show_more.show ? 'panel-bd expand' : 'panel-bd')">
                <div class="text" itemprop="description"><?php echo $desc_pendek; ?> <?php echo $content; ?></div>
            </div>
            <div class="panel-ft js-detail-btn-more" tabindex="0" role="button" on="tap:AMP.setState({show_more: {show: !show_more.show}})" [class]="(show_more.show ? 'panel-ft js-detail-btn-more expand' : 'panel-ft js-detail-btn-more')">
                <span class="toggle-more" style="cursor:pointer;">Show More</span>
                <span class="toggle-less" style="cursor:pointer;">Less</span>
            </div>
        </div>

        <div class="panel panel-descr margin-top">
            <div style="margin-top:20px;margin-bottom:20px;text-align:center;">
                <?php echo $ads_3; ?>
            </div>
        </div>
<script>
document.body.style.overflow = "hidden";
setTimeout(function() {
  document.body.style.overflow = "auto";
}, 5000);
</script>
<?php echo $html_foot; ?>
</body>
</html>