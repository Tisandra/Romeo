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
<html lang="en-US">
<head itemscope="itemscope" itemtype="http://schema.org/WebSite">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#9a1518" />
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
<link href="//fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,700i,900" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $siteurl; ?>wp-content/plugins/kuli-digital-ads/barbar_style.css" />
<style>
body {
    color: #000000;
    font-family: "Roboto","Helvetica Neue",sans-serif;
    font-weight: 400;
    font-size: 16px;
}
h1 {
    font-size: 30px;
}
.wp-block-image {
    margin: 0 0 1em;
}
.wp-block-image .aligncenter {
    margin-left: auto;
    margin-right: auto;
    display: table;
}
.breadcrumbs {
    padding: 10px 20px;
    border: 1px solid #ecf0f1;
    margin-bottom: 20px;
    text-transform: uppercase;
    font-size: 11px;
}
#elpe-generate{ display: none; }
#elpe-wait2{ display: none; }
#elpe-link{ display: none; }
</style>
<?php echo $html_head; ?>
</head>
<body style="background: #fff;">

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
    
<div class="site inner-wrap" id="site-container">
<div id="content" class="gmr-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-md-12">
                <main id="main" class="site-main" role="main">
                    <article itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <div class="gmr-box-content gmr-single">
						
                            <div style="display:block;width:100%;position:relative;margin-bottom:4px;margin-top:5px;">
								<?php echo $ads_1; ?>
                            </div>
							
                            <header class="entry-header">
                                <h1 class="entry-title" itemprop="headline"><?php echo $title; ?></h1>
                            </header>
								
								<div style="display:block;width:100%;position:relative;margin-bottom:5px;margin-top:2px;text-align:center;">
                        		    <div id="elpe-wait1">
                        		        <button class="btn btn-danger" disabled="disabled" style="background: #007634;border-color: #007634;color: #fff;">
                        		            <i class="fa fa-send"></i> Loading... <span id="elpe-time"></span>
                        	           </button>
                                    </div>
                                    
                        		    <div id="elpe-generate">
                        				<a class="btn btn-danger" href="#elpe" onclick="elpegenerate()" style="background: #007634;border-color: #007634;">
                                            <strong>Double Click Here</strong>
                                        </a>
                                    </div>
                                </div>
								
								<div style="display:block;width:100%;position:relative;margin-bottom:5px;margin-top:5px;">
									<?php echo $ads_2; ?>
								</div>
								
								<?php if(!empty($images)){ ?>
                                <div class="wp-block-image"><figure class="aligncenter size-large">
                                    <img src="<?php echo $images; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" style="width:100%;" />
                                </figure></div>
                                <?php } ?>
								
                                <div class="elpe-bottom text-center" id="elpe">
                                    <div id="elpe-wait2">
                        				<a class="btn btn-danger" href="<?php echo $target_url; ?>" style="background: #007634;border-color: #007634;margin-top: 120px;">
                                            <strong>Visit</strong> Or Download <strong>Now</strong>
                                        </a>
                                    </div>
                                    <div id="elpe-link">
                                    </div>
                                </div>
                                
                                <div style="display:block;width:100%;position:relative;margin-bottom:10px;margin-top:10px;">
                                    <?php echo $ads_3; ?>
                                </div>

							<div style="display:block;width:100%;position:relative;margin-bottom:5px;margin-top:5px;text-align:center;">
							
				                    <img data-original-height="48" data-original-width="50" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjwP1TtwibGqfLyW40MqOIoHrir5HV-R81sTscke6CFgEgiLLKwJnYddVMBl9ujXIJ8OqSPPgyOWJI9j-CZY7wMwf9FWzokb9kf4AjD9wS4GRU0M5d5M5JQlLU-v7Lgc2NoxcFW0AFHMfuxTQocn5sduyjt2_ZnNDYFuYwkofjCFHVun4o3ziJkQjo/s1600/atas.png" width="70" height="65" border="0">
									
                                    <h2 style="text-align: center;font-size: 16px;margin-top: 15px;margin-bottom: 55px;">
					                <strong><span style="color: red;">Download Now</span><span style="color: green;">  Click OPEN / INSTALL / VISIT</span> <span style="color: red;">above</span></strong>
		                            </h2>
									
                            </div>
								
							<?php echo $desc_pendek; ?> <?php echo $content; ?>

                        </div>
                    </article>
                </main>
            </div>

        </div>
    </div>
</div>
</div>
<script type="text/javascript">
            let count = 5;
            let counter = setInterval(timer, 1000);
            function timer() {
                count = count - 1;
                if (count <= 0) {
                    document.getElementById('elpe-wait1').style.display = 'none';
                    document.getElementById('elpe-generate').style.display = 'block';
                    clearInterval(counter);
                    return;
                }
                document.getElementById("elpe-time").innerHTML = count;
            }

            function elpegenerate() {
                document.getElementById('elpe').focus();
                document.getElementById('elpe-link').style.display = 'none';
                document.getElementById('elpe-wait2').style.display = 'block';

                setInterval(function () {
                    document.getElementById('elpe-wait2').style.display = 'none';
                }, 30000);
                setInterval(function () {
                    document.getElementById('elpe-link').style.display = 'block';
                }, 2000);
            }
</script>
<script>
document.body.style.overflow = "hidden";
setTimeout(function() {
  document.body.style.overflow = "auto";
}, 5000);
</script>
<?php echo $html_foot; ?>
	
</body>
</html>