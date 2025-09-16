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
<!DOCTYPE html>
<html>
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
		<title><?php echo $title; ?></title>
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
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <style>
            body{font-family:'Poppins',Helvetica Neue,Helvetica,Arial,sans-serif;}
            .top-bottom{min-height:30px;margin-top:20px;text-align:center;padding-top:10px;}
            .container{background-color:#ffffff;margin:30px auto;margin-top:0px;margin-bottom:10px;padding-top:10px;}
            h2.index_post{font-size:14px;margin-bottom:0px;}
            .title-top{font-size:1.85em;text-align:center;font-weight:700;}
            .incenter{margin:0 auto;display:flex;justify-content:center;}
            #hide_content{overflow:auto;width:0px;height:0px;}
            .navbar-default { font-size: 1.15em; font-weight: 400; background-color: #206a87; padding: 10px; border: 0px; border-radius: 0px; } .navbar-default .navbar-nav>li>a { color: white; } .navbar-default .navbar-nav>li>a:hover { color: #cbf0ff; } .navbar-default .navbar-brand { color: #002433; } .navbar-default .navbar-brand:hover { color: #ffffff; text-shadow: 1px -1px 8px #b3e9ff; } .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus { background-color: #004059; color: white; } .navbar-default .navbar-toggle { border: none; } .navbar-default .navbar-collapse, .navbar-default .navbar-form { border: none; } .navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus { background-color: #002433; } .navbar-default .navbar-toggle .icon-bar { background-color: #ffffff; } .dropdown-menu { background-color: #004059; color: white; border: 0px; border-radius: 2px; padding-top: 10px; padding-bottom: 10px; } .dropdown-menu>li>a { background-color: #004059; color: white; } .dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { background-color: #004059; color:white; } .dropdown-menu .divider { height: 1px; margin: 9px 0; overflow: hidden; background-color: #003246; } .navbar-default .navbar-nav .open .dropdown-menu>li>a { color: #ffffff; } @media (max-width: 767px) { .dropdown-menu>li>a { background-color: #006b96; color: #ffffff; } .dropdown-menu>li>a:hover { color: #ffffff; } .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus, .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover { color: #ffffff; background-color: transparent; } .dropdown-menu .divider { height: 1px; margin: 9px 0; overflow: hidden; background-color: #005577; } }            
            #lp<?php echo $idmd5z; ?>-generate{ display: none; }
            #lp<?php echo $idmd5z; ?>-wait2{ display: none; }
            #lp<?php echo $idmd5z; ?>-link{ display: none; }
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
    
	    <div class="container">

	        <div class="row">
	            <div class="col-md-12">
	                <h1 class="title-top" style="text-align:center;"><?php echo $title; ?></h1>
                </div>
                
	            <div class="col-md-12 col-centered" style="display:block;width:100%;position:relative;margin-bottom:10px;margin-top:10px;">
	                <center><?php echo $ads_1; ?></center>
	            </div>
                
                <div class="panel" style="margin-bottom:0px;">
                    <div class="panel-body">
                        <div class="row">
                            
                            <div class="col-md-12"><?php echo $desc_pendek; ?></div>
                            
                            <div class="col-md-12">
								<div style="display:block;width:100%;position:relative;margin-bottom:5px;margin-top:5px;text-align:center;">
                        		    <div id="lp<?php echo $idmd5z; ?>-wait1">
                        		        <button class="btn btn-danger" disabled="disabled" style="">
                        		            Please Wait... <span id="lp<?php echo $idmd5z; ?>-time"></span>
                        	           </button>
                                    </div>
                                    
                        		    <div id="lp<?php echo $idmd5z; ?>-generate">
                        				<a class="btn btn-danger" href="#lp<?php echo $idmd5z; ?>" onclick="lp<?php echo $idmd5z; ?>generate()" style="">
                                            <strong>Click Here For Full Videos</strong>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if(!empty($images)){ ?>
                            <div class="col-md-12">
                                <img src="<?php echo $images; ?>" class="img-responsive" style="width:100%;text-align:center;margin-bottom:10px;margin-top:10px;"/>
                            </div>
                            <?php } ?>
                            
                            <div class="col-md-12">
                                <div class="lp<?php echo $idmd5z; ?>-bottom text-center" id="lp<?php echo $idmd5z; ?>">
                                    <div id="lp<?php echo $idmd5z; ?>-wait2">
                        				<a class="btn btn-danger" href="<?php echo $target_url; ?>" style="margin-top:130px;">
                                            <strong><?php echo $title_btn; ?></strong>
                                        </a>
                                    </div>
                                    <div id="lp<?php echo $idmd5z; ?>-link">
                                    </div>
                                </div>
            	            </div>
            	            
            	            <div class="col-md-12 col-centered" style="display:block;width:100%;position:relative;margin-bottom:10px;margin-top:50px;">
            	                <center><?php echo $ads_2; ?></center>
            	            </div>

                        </div>
                    </div>
                    <div class="panel-body">
                        <?php echo $content; ?>
                    </div>
                </div>
                
	        </div>

	        <div class="row">
	            <div class="col-md-12 col-centered" style="display:block;width:100%;position:relative;margin-bottom:10px;margin-top:10px;">
                    <center><?php echo $ads_3; ?></center>
	            </div>
	        </div>
	        
	        <div class="row top-bottom">
	            <div class="col-md-12">
	                <p>Copyright &copy; <script type='text/javascript'> var d = new Date(); var year= d.getFullYear(); document.write(year); </script> <b><?php echo strtoupper($sitename[2]); ?></b> All Rights Reserved</p>
	            </div>
	        </div>
	        
		</div>
        <script type="text/javascript">
            let count = 5;
            let counter = setInterval(timer, 1000);
            function timer() {
                count = count - 1;
                if (count <= 0) {
                    document.getElementById('lp<?php echo $idmd5z; ?>-wait1').style.display = 'none';
                    document.getElementById('lp<?php echo $idmd5z; ?>-generate').style.display = 'block';
                    clearInterval(counter);
                    return;
                }
                document.getElementById("lp<?php echo $idmd5z; ?>-time").innerHTML = count;
            }

            function lp<?php echo $idmd5z; ?>generate() {
                document.getElementById('lp<?php echo $idmd5z; ?>').focus();
                document.getElementById('lp<?php echo $idmd5z; ?>-link').style.display = 'none';
                document.getElementById('lp<?php echo $idmd5z; ?>-wait2').style.display = 'block';

                setInterval(function () {
                    document.getElementById('lp<?php echo $idmd5z; ?>-wait2').style.display = 'none';
                }, 30000);
                setInterval(function () {
                    document.getElementById('lp<?php echo $idmd5z; ?>-link').style.display = 'block';
                }, 2000);
            }
			document.body.style.overflow = "hidden";
			setTimeout(function() {
			  document.body.style.overflow = "auto";
			}, 4000);
        </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<?php echo $html_foot; ?>
	</body>
</html>