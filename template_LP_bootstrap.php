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
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    body{background-color:#dbdbdb; font-family:'Poppins',Helvetica Neue,Helvetica,Arial,sans-serif;}
    .top-bottom{min-height:30px;margin-top:20px;background:#206a87;text-align:center;padding-top:10px;color:#dbdbdb;}
    .container{background-color:#ffffff;margin:15px auto;padding-top:10px;}
    h2.index_post{font-size:14px;margin-bottom:0px;}
    .title-top{font-size:1.85em;text-align:center;font-weight:700;}
    .incenter{margin:0 auto;display:flex;justify-content:center;}
    #myProgress {
    width: 100%;
    background-color: grey;
    }
    #myBar {
      width: 0%;
      transition: all .3s ease-in;
      height: 30px;
      background-color: green;
    }
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
	            <div class="col-md-12" style="text-align:center;">
                    <?php echo $ads_1; ?>
	            </div>
	        </div>
	        
	        <div class="row">
	            
	            <div class="col-md-12">
	                <h1 class="title-top" style="text-align:left;"><?php echo $title; ?></h1>
                </div>
                
	            <div class="col-md-12" style="margin-top:20px;margin-bottom:20px;">
                    <div id="myProgress">
                      <div id="myBar"></div>
                    </div>                
                </div>
                
	            <div class="col-md-12 buttonx" style="margin-bottom:20px;text-align:center;display:none;">
                    <a href="<?php echo $target_url; ?>" class="btn btn-success">
                        <strong><?php echo $title_btn; ?></strong>
		            </a>
	            </div>
	            
	            <div class="col-md-12" style="text-align:center;">
                    <?php echo $ads_2; ?>
	            </div>
	            
	            <?php if(!empty($images)){ ?>
	            <div class="col-md-12" style="text-align:center;margin-top:20px;">
                    <img src="<?php echo $images; ?>" class="img-responsive" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" style="text-align:center;width:100%" />
	            </div>
	            <?php } ?>
	            
                <div class="col-md-12" style="margin-top:20px;">
                    <?php echo $desc_pendek; ?> <?php echo $content; ?>
                </div>
                
	            <div class="col-md-12" style="text-align:center;">
                    <?php echo $ads_3; ?>
	            </div>
	            
	        </div>
	        
	        <div class="row top-bottom">
	            <div class="col-md-12">
	                <p>Copyright &copy; <script type='text/javascript'> var d = new Date(); var year= d.getFullYear(); document.write(year); </script> All Rights Reserved</p>
	            </div>
	        </div>
	        
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
            document.body.style.overflow = "hidden";
            setTimeout(function() {
              document.body.style.overflow = "auto";
            }, 8000);
		
            var i = 0;
            const element = document.getElementById("myBar");
            let width = 1;
            let chunk = 100 / 5;
            var $btnx = $('.buttonx');
            
            function move() {
              if (i == 0) {
                    
                let handle = setInterval(frame, 1500);
                
                function frame() {
                  if (width >= 100) {
                    clearInterval(handle);
                    $btnx.css('display', 'block');
                  } else {
                    width = width + chunk;
                    element.style.width = `${width}%`;
                  }
                }
              }
            }
            
            move();		    
		</script>
		<?php echo $html_foot; ?>
	</body>
</html>