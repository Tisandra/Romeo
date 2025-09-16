<?php
$siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST']."/";
$currurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
global $wpdb;
$DB_pos = $wpdb->prefix.'posts';
$DB_sql = $wpdb->prefix.'kuli_digital_setting';
$DB_data = $wpdb->prefix.'kuli_digital_project';
$if_slug = $_SESSION['slugID'];
foreach ($wpdb->get_results("SELECT * FROM {$DB_sql} WHERE id = '1'") as $key => $row) {
	$email = $row->email;
	$lisensi = $row->lisensi;
	$organik_status = $row->organik_status;
	$organik = $row->organik;
	$block_country = $row->block_country;
	$block_redirect = empty($row->block_redirect) ? $_SESSION['redirect']:$row->block_redirect;
	$manual_organik = $row->manual_organik;
	$non_organik = $row->non_organik;
	$block_ip = $row->block_ip;
	$traffic_filter_status = $row->traffic_filter_status;
	$getipintel_api = $row->getipintel_api;
	$proxycheck_api = $row->proxycheck_api;
	$ipqualityscore_api = $row->ipqualityscore_api;
}
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
    $timer = empty($row->timer) ? '3':$row->timer;
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
		<link rel="icon" type="image/x-icon" href="<?php echo $siteurl; ?>wp-content/plugins/kuli.2.0/assets/namari/images/favicon.ico">
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
		<!-- Main CSS Files -->
		<link rel="stylesheet" href="<?php echo $siteurl; ?>wp-content/plugins/kuli.2.0/assets/namari/css/style.css">

		<!-- Namari Color CSS -->
		<link rel="stylesheet" href="<?php echo $siteurl; ?>wp-content/plugins/kuli.2.0/assets/namari/css/namari-color.css">

		<!--Icon Fonts - Font Awesome Icons-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css
">

		<!-- Animate CSS-->
		<link href="<?php echo $siteurl; ?>wp-content/plugins/kuli.2.0/assets/namari/css/animate.css" rel="stylesheet" type="text/css">

		<!--Google Webfonts-->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <style>
			#floatads {display: none !important;}
            #lp<?php echo $idmd5z; ?>-generate{ display: none; }
            #lp<?php echo $idmd5z; ?>-wait2{ display: none; }
            #lp<?php echo $idmd5z; ?>-link{ display: none; }
			.section-heading-block h2::after {
			  background: #d2b356;
			  content: "";
			  display: block;
			  width: 100%;
			  height: 2px;
			  margin-top: 30px;
			}
			.temp_banner_bungkus {
			  position: relative;
			  text-align: center;
			  margin-top: 2rem;
			  margin-bottom: 2rem;
			}
			.temp_banner_ads {
			  position: absolute;
			  width: 100%;
			  z-index: 10000;
			}
			.temp_banner_ads_flex {
			  display: flex;
			  flex-wrap: nowrap;
			  justify-content: space-between;
			}
			.temp_banner_ads_flex_item {
			  flex: 1 1 auto;
			  text-align: center;
			}
			.temp_banner_ads_2, .temp_banner_ads_3 {
				margin: 20px 0;
				text-align: center;
			}
			.temp_banner_image_container img {
				max-width: 100%;
			}
        </style>
        <?php echo $html_head; ?>
	</head>
	<body>
		<!-- Preloader -->
		<div id="preloader">
			<div id="status" class="la-ball-triangle-path">
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
		<!--End of Preloader-->

		<div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
			<div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
			<div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
			<div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
			<div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
		</div>
		
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
		<div id="wrapper">
			<!--Main Content Area-->
			<main id="content">
				<div class="temp_banner_bungkus">
					<!-- Ads -->
					<div class="temp_banner_ads" style="top: 50px; left: 0px;">
						<div class="temp_banner_ads_flex">
							<!-- Center ads -->
							<div class="temp_banner_ads_flex_item">
								<div style="opacity: 0;">
									<?php echo $ads_1; ?>
								</div>
							</div>
							<!-- [END] Center ads -->							
						</div>
					</div>
					<!-- [END] Ads -->
					<!-- Content -->
					<div class="temp_banner_content">
						<h3 class="text-center"><span style="color: #ff0000;">PLAY NOW &amp; DOWNLOAD</span></h3>
					</div>
					<!-- [END] Content -->

					<!-- Images -->
					<div style="display: none;" data-blackwarrior-banner-button="<?php echo $idmd5z; ?>">
						<div class="temp_banner_image_container text-center" style="margin-bottom: 40px;">
							<img src="http://tech.miui.id/wp-content/uploads/2024/01/faketwo.gif" alt="" class="blackwarrior_banner_image">
						</div>
						<div class="temp_banner_image_container text-center" style="margin-bottom: 20px;">
							<img src="http://tech.miui.id/wp-content/uploads/2024/01/download.gif" alt="" class="blakehed_banner_image">
						</div>
					</div>
					<!-- [END] Images -->
					<!-- Counter -->
					<div>
						<h2 class="blackwarrior_banner_counter" data-blackwarrior-banner="<?php echo $idmd5z; ?>" data-blackwarrior-banner-time="<?php echo $timer; ?>">Please wait in <?php echo $timer; ?> seconds</h2>
					</div>
				</div>
				<!--Introduction-->
				<section id="about" class="introduction scrollto">
					<div class="row clearfix">
						<div class="col-1">
							<div class="section-heading section-heading-block">
								<h2 class="section-title text-center"><?php echo $title; ?></h2>
								<p class="section-subtitle"><?php echo $desc_pendek; ?></p>
							</div>
						</div>
						<div class="col-1">
							<div style="display:block;width:100%;position:relative;margin-bottom:5px;margin-top:5px;text-align:center;">
								<div id="lp<?php echo $idmd5z; ?>-wait1">
									<button class="button" disabled="disabled" style="margin: unset;">
										Please Wait... <span id="lp<?php echo $idmd5z; ?>-time"></span>
								   </button>
								</div>
								
								<div id="lp<?php echo $idmd5z; ?>-generate">
									<a class="button" href="#lp<?php echo $idmd5z; ?>" onclick="lp<?php echo $idmd5z; ?>generate()" style="margin: unset;">
										<strong>Click Here For Full Videos</strong>
									</a>
								</div>
							</div>
							<div class="temp_banner_ads_2">
								<?php echo $ads_2; ?>
							</div>
							<?php if(!empty($images)){ ?>
							<div class="text-center">
								<img src="<?php echo $images; ?>" class="img-responsive" style="width:50%;margin:10px 0;"/>
							</div>
							<?php } ?>
							
							<div>
								<div class="lp<?php echo $idmd5z; ?>-bottom text-center" id="lp<?php echo $idmd5z; ?>">
									<div id="lp<?php echo $idmd5z; ?>-wait2">
										<a class="button" href="<?php echo $target_url; ?>" style="margin-top:130px;">
											<strong><?php echo $title_btn; ?></strong> <i class="fa fa-download"></i>
										</a>
									</div>
									<div id="lp<?php echo $idmd5z; ?>-link">
									</div>
								</div>
							</div>
							<p><?php echo $content; ?></p>
							<div class="temp_banner_ads_3">
								<?php echo $ads_3; ?>
							</div>
						</div>
					</div>
				</section>
				<!--End of Introduction-->
			</main>
			<!--Footer-->
			<footer id="landing-footer" class="clearfix">
				<div class="row clearfix">

					<p id="copyright" class="col-2">Made with love by <?php echo strtoupper($sitename[2]); ?></p>

					<!--Social Icons in Footer-->
					<ul class="col-2 social-icons">
						<li>
							<a target="_blank" title="Facebook" href="https://www.facebook.com/username">
								<i class="fa fa-facebook fa-1x"></i><span>Facebook</span>
							</a>
						</li>
						<li>
							<a target="_blank" title="Google+" href="http://google.com/+username">
								<i class="fa fa-google-plus fa-1x"></i><span>Google+</span>
							</a>
						</li>
						<li>
							<a target="_blank" title="Twitter" href="http://www.twitter.com/username">
								<i class="fa fa-twitter fa-1x"></i><span>Twitter</span>
							</a>
						</li>
						<li>
							<a target="_blank" title="Instagram" href="http://www.instagram.com/username">
								<i class="fa fa-instagram fa-1x"></i><span>Instagram</span>
							</a>
						</li>
						<li>
							<a target="_blank" title="behance" href="http://www.behance.net">
								<i class="fa fa-behance fa-1x"></i><span>Behance</span>
							</a>
						</li>
					</ul>
					<!--End of Social Icons in Footer-->
				</div>
			</footer>
			<!--End of Footer-->
		</div>
		<script src="<?php echo $siteurl; ?>wp-content/plugins/kuli.2.0/assets/namari/js/site.js"></script>
		<script type="text/javascript">
			let count = <?php echo $timer; ?>;
			let counter = setInterval(timer, 1000);
			function timer() {
				if (count > 0) {
					document.getElementById("lp<?php echo $idmd5z; ?>-time").innerHTML = count;
					
					count--;
				} else {
					document.getElementById('lp<?php echo $idmd5z; ?>-wait1').style.display = 'none';
					document.getElementById('lp<?php echo $idmd5z; ?>-generate').style.display = 'block';
					clearInterval(counter);
				}
				
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
		<script type="text/javascript" id="blackwarrior_script-js-extra">
		/* <![CDATA[ */
		var blackwarrior = {"ads_class":"adsbygoogle","protection":true,"disable_right_click":true,"jump_url":"<?php echo $block_redirect; ?>"};
		/* ]]> */
		</script>
		<script type="text/javascript" src="<?php echo $siteurl; ?>wp-content/plugins/kuli.2.0/assets/bw.js?v=2"></script>
		<?php echo $html_foot; ?>
	</body>
</html>