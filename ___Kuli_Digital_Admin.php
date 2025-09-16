<?php
// session_start();
global $wpdb;
$DB_sql = $wpdb->prefix.'kuli_digital_setting';
$DB_data = $wpdb->prefix.'kuli_digital_project';
$siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST']."/";
$currurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (isset($_POST['lisensi_key'], $_POST['save_lisensi'], $_POST['mail_key'])) {
            $email = trim($_POST['mail_key']);
			$lisensi = trim($_POST['lisensi_key']);
            // $md5_mail = md5($email);
            // $lisensi = trim($_POST['lisensi_key']);
            // $ifdom = strtolower($_SERVER['HTTP_HOST']);
            // $ifmd5 = md5("AGCscript+KuliDigital");
            // $codex = md5($ifdom . $ifmd5 . $md5_mail);
            // if (preg_match('/^' . $codex . '$/', $lisensi)) {
                $wpdb->query("UPDATE {$DB_sql} SET lisensi = '{$lisensi}', email = '{$email}', getipintel_api = '{$email}' WHERE id = '1'");
            // } else {
                // echo "<script>alert('Upsss... ID Lisensi Salah')</script>";
            // }
        }
        foreach ($wpdb->get_results("SELECT * FROM {$DB_sql} WHERE id = '1'") as $key => $row) {
            $email = $row->email;
            $lisensi = $row->lisensi;
            $organik_status = $row->organik_status;
            $organik = $row->organik;
            $block_country = $row->block_country;
            $block_redirect = $row->block_redirect;
            $manual_organik = $row->manual_organik;
            $non_organik = $row->non_organik;
            $block_ip = $row->block_ip;
            $getipintel_api = $row->getipintel_api;
            $proxycheck_api = $row->proxycheck_api;
            $ipqualityscore_api = $row->ipqualityscore_api;
            $traffic_filter_status = $row->traffic_filter_status;
        }
        $md5_mail = md5($email);
        $ifdom = strtolower($_SERVER['HTTP_HOST']);
        $ifmd5 = md5("AGCscript+KuliDigital");
        $codex = md5($ifdom . $ifmd5 . $md5_mail);
        if (isset($_POST['del_organik'])) {
            if (!empty($_POST['id_organik'])) {
                foreach ($_POST['id_organik'] as $idx) {
                    $ifnumb .= '^' . $idx . '$|';
                }
            }
            $isnumb = rtrim($ifnumb, '|');
            $js_dt = json_decode($organik, TRUE);
            $nm = 0;
            $is_data = array();
            foreach ($js_dt as $js_data) {
                $ifmd5 = md5(trim($js_data));
                if (!preg_match('/' . $isnumb . '/', $ifmd5)) {
                    $is_data[] = $js_data;
                }
                $nm++;
            }
            $dataz = array();
            foreach ($is_data as $datax) {
                if (empty($datax)) {
                    continue;
                }
                $dataz[] = $datax;
            }
            $result = json_encode($dataz, JSON_UNESCAPED_UNICODE);
            if ($wpdb->query("UPDATE {$DB_sql} SET organik = '{$result}' WHERE id = '1'") === FALSE) {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-danger" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Upsss... Menyimpan Data GAGAL</div>';
            } else {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-success" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Menyimpan Data SUKSES</div>';
            }
        }
        if (isset($_POST['save_sts_org'])) {
            $orgdata = $_POST['organik_data'];
            if ($wpdb->query("UPDATE {$DB_sql} SET organik_status = '{$orgdata}' WHERE id = '1'") === FALSE) {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-danger" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Upsss... Menyimpan Data GAGAL</div>';
            } else {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-success" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Menyimpan Data SUKSES</div>';
            }
        }
        if (isset($_POST['save_manual_organik'])) {
            $orgdata = $_POST['manual_organik'];
            if ($wpdb->query("UPDATE {$DB_sql} SET manual_organik = '{$orgdata}' WHERE id = '1'") === FALSE) {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-danger" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Upsss... Menyimpan Data GAGAL</div>';
            } else {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-success" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Menyimpan Data SUKSES</div>';
            }
        }
        if (isset($_POST['save_non_organik'])) {
            $orgdata = $_POST['non_organik'];
            if ($wpdb->query("UPDATE {$DB_sql} SET non_organik = '{$orgdata}' WHERE id = '1'") === FALSE) {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-danger" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Upsss... Menyimpan Data GAGAL</div>';
            } else {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-success" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Menyimpan Data SUKSES</div>';
            }
        }
        if (isset($_POST['save_block_ip'])) {
            $orgdata = $_POST['block_ip'];
            if ($wpdb->query("UPDATE {$DB_sql} SET block_ip = '{$orgdata}' WHERE id = '1'") === FALSE) {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-danger" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Upsss... Menyimpan Data GAGAL</div>';
            } else {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-success" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Menyimpan Data SUKSES</div>';
            }
        }
        if (isset($_POST['save_block_country'])) {
            $ifblock = $_POST['block_country'];
            $isblock = array();
            foreach ($ifblock as $ifblockx) {
                $isblock[] = $ifblockx;
            }
            $result = json_encode($isblock, JSON_UNESCAPED_UNICODE);
            if ($wpdb->query("UPDATE {$DB_sql} SET block_country = '{$result}' WHERE id = '1'") === FALSE) {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-danger" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Upsss... Menyimpan Data GAGAL</div>';
            } else {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-success" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Menyimpan Data SUKSES</div>';
            }
        }
        if (isset($_POST['save_url_blockip'], $_POST['block_redirect'])) {
            $block_redirect = $_POST['block_redirect'];
            if ($wpdb->query("UPDATE {$DB_sql} SET block_redirect = '{$block_redirect}' WHERE id = '1'") === FALSE) {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-danger" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Upsss... Menyimpan Data GAGAL</div>';
            } else {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-success" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Menyimpan Data SUKSES</div>';
            }
        }
		if (isset($_POST['save_traffic_filter'])) {
            $status = $_POST['traffic_filter_status'];
            $getipintel_api = $_POST['getipintel_api'];
            $proxycheck_api = $_POST['proxycheck_api'];
            $ipqualityscore_api = $_POST['ipqualityscore_api'];
            if ($wpdb->query("UPDATE {$DB_sql} SET traffic_filter_status = '{$status}', getipintel_api = '{$getipintel_api}', proxycheck_api = '{$proxycheck_api}', ipqualityscore_api = '{$ipqualityscore_api}' WHERE id = '1'") === FALSE) {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-danger" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Upsss... Menyimpan Data GAGAL</div>';
            } else {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-success" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Menyimpan Data SUKSES</div>';
            }
        }
        if (isset($_POST['id_data'], $_POST['delete_shortlink_data'])) {
            $idmd5z = $_POST['id_data'];
            if ($wpdb->query("DELETE FROM {$DB_data} WHERE idmd5='{$idmd5z}'") === FALSE) {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-danger" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Upsss... Menghapus Data GAGAL</div>';
            } else {
                $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-success" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Menghapus Data SUKSES</div>';
            }
        }
        if (isset($_POST['save_project'])) {
            $shortlink = $_POST['shortlink'];
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $gambar = $_POST['gambar'];
            $konten = $_POST['konten'];
            $ads_1 = $_POST['ads_1'];
            $ads_2 = $_POST['ads_2'];
            $ads_3 = $_POST['ads_3'];
            $float_ads = $_POST['float_ads'];
            $download_button_text = $_POST['download_button_text'];
            $download_button_url = $_POST['download_button_url'];
            $back_button_text = $_POST['back_button_text'];
            $back_button_url = $_POST['back_button_url'];
            $html_head = $_POST['html_head'];
            $html_foot = $_POST['html_foot'];
            $traffic_source = $_POST['traffic_source'];
            $device_view = $_POST['device_view'];
            $themes = $_POST['themes'];
            $timer = $_POST['timer'];
            $idmd5z = substr(md5($shortlink), 1, 13);
            if (isset($_POST['save_lp'])) {
                if ($wpdb->query($wpdb->prepare("INSERT INTO {$DB_data} (idmd5, shortlink, judul, deskripsi, gambar, konten, ads_1, ads_2, ads_3, float_ads, download_button_text, download_button_url, back_button_text, back_button_url, html_head, html_foot, traffic_source, device_view, themes, timer) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s )", array($idmd5z, $shortlink, $judul, $deskripsi, $gambar, $konten, $ads_1, $ads_2, $ads_3, $float_ads, $download_button_text, $download_button_url, $back_button_text, $back_button_url, $html_head, $html_foot, $fb_ads_traffic, $google_ads_traffic, $device_view, $themes, $timer))) === FALSE) {
                    $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-danger" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Upsss... Menyimpan Data GAGAL</div>';
                } else {
                    $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-success" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Menyimpan Data SUKSES</div>';
                }
            }
            if (isset($_POST['edit_lp'])) {
                $idmd5v = $_POST['edit_lp'];
                if ($wpdb->query("UPDATE {$DB_data} SET shortlink = '{$shortlink}', judul = '{$judul}', deskripsi = '{$deskripsi}', gambar = '{$gambar}', konten = '{$konten}', ads_1 = '{$ads_1}', ads_2 = '{$ads_2}', ads_3 = '{$ads_3}', float_ads = '{$float_ads}', download_button_text = '{$download_button_text}', download_button_url = '{$download_button_url}', back_button_text = '{$back_button_text}', back_button_url = '{$back_button_url}', html_head = '{$html_head}', html_foot = '{$html_foot}', traffic_source = '{$traffic_source}', device_view = '{$device_view}', themes = '{$themes}', timer = '{$timer}' WHERE idmd5 = '{$idmd5v}'") === FALSE) {
                    $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-danger" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Upsss... Menyimpan Data GAGAL</div>';
                } else {
                    $_SESSION['infoz'] = '<div class="alert alert-dismissible alert-success" style="margin: 10px;"><button type="button" class="close" data-dismiss="alert">&times;</button>Menyimpan Data SUKSES</div>';
                }
            }
        }
        foreach ($wpdb->get_results("SELECT * FROM {$DB_sql} WHERE id = '1'") as $key => $row) {
            $email = $row->email;
            $lisensi = $row->lisensi;
            $organik_status = $row->organik_status;
            $organik = $row->organik;
            $block_country = $row->block_country;
            $block_redirect = $row->block_redirect;
            $manual_organik = $row->manual_organik;
            $non_organik = $row->non_organik;
            $block_ip = $row->block_ip;
        }
        $opt_org = '<option value="off">Organik Non-Aktif</option><option value="on">Organik Aktif</option>';
        $opt_org = preg_replace('/value="' . $organik_status . '"/', 'value="' . $organik_status . '" selected', $opt_org);
        $themesx = '<option value="default">Default Template</option><option value="custom">PlayStore Template</option><option value="barbar">BarBar Template</option><option value="loading">Loading Template</option><option value="bootstrap">Bootstrap Template</option><option value="warrior">Warrior Template</option>';
		if(isset($themes)){
			$themesx = preg_replace('/value="' . $themes . '"/', 'value="' . $themes . '" selected', $themesx);
		}
        if (!empty($organik)) {
            $js_dt = json_decode($organik, TRUE);
            $totdt = count($js_dt);
        } else {
            $totdt = 0;
        }
        if ($totdt == 0) {
            $tot_org = '';
            if (preg_match('/on/', $organik_status)) {
                $wpdb->query("UPDATE {$DB_sql} SET organik_status = 'off' WHERE id = '1'");
            }
            $option_org = '';
        } else {
            $tot_org = '<span style="font-weight:700;color:#09b107;">Total Data Organik : <span>' . $totdt . '</span></span>';
            $option_org = '<div class="col-md-4">
                    <div class="form-group">
                        <div class="row" style="">
                            <div class="col-md-6" style="padding-right:0;">
                                <select class="form-control" name="organik_data" style="height:30px;max-width:30rem;">' . $opt_org . '</select>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-info btn-sm" name="save_sts_org"><strong>Save Status Organik</strong></button>
                            </div>
                        </div>
                    </div>
                </div>';
        }
        if (!empty($block_country)) {
            $cn_dt = json_decode($block_country, TRUE);
            if (count($cn_dt) == 0) {
                $data_cntr = '007';
            } else {
				$data_cntrx = '';
                foreach ($cn_dt as $cn_dtx) {
                    $data_cntrx .= $cn_dtx . '|';
                }
                $data_cntr = rtrim($data_cntrx, "|");
            }
        } else {
            $data_cntr = '007';
        }
        $countryx = array("AD" => "Andorra", "AE" => "United Arab Emirates", "AF" => "Afghanistan", "AG" => "Antigua and Barbuda", "AI" => "Anguilla", "AL" => "Albania", "AM" => "Armenia", "AN" => "Netherlands Antilles", "AO" => "Angola", "AP" => "Asia/Pacific Region", "AQ" => "Antarctica", "AR" => "Argentina", "AS" => "American Samoa", "AT" => "Austria", "AU" => "Australia", "AW" => "Aruba", "AX" => "Aland Islands", "AZ" => "Azerbaijan", "BA" => "Bosnia and Herzegovina", "BB" => "Barbados", "BD" => "Bangladesh", "BE" => "Belgium", "BF" => "Burkina Faso", "BG" => "Bulgaria", "BH" => "Bahrain", "BI" => "Burundi", "BJ" => "Benin", "BM" => "Bermuda", "BN" => "Brunei Darussalam", "BO" => "Bolivia", "BR" => "Brazil", "BS" => "Bahamas", "BT" => "Bhutan", "BV" => "Bouvet Island", "BW" => "Botswana", "BY" => "Belarus", "BZ" => "Belize", "CA" => "Canada", "CC" => "Cocos (Keeling) Islands", "CD" => "Congo, The Democratic Republic of the", "CF" => "Central African Republic", "CG" => "Congo", "CH" => "Switzerland", "CI" => "Cote d'Ivoire", "CK" => "Cook Islands", "CL" => "Chile", "CM" => "Cameroon", "CN" => "China", "CO" => "Colombia", "CR" => "Costa Rica", "CU" => "Cuba", "CV" => "Cape Verde", "CX" => "Christmas Island", "CY" => "Cyprus", "CZ" => "Czech Republic", "DE" => "Germany", "DJ" => "Djibouti", "DK" => "Denmark", "DM" => "Dominica", "DO" => "Dominican Republic", "DZ" => "Algeria", "EC" => "Ecuador", "EE" => "Estonia", "EG" => "Egypt", "EH" => "Western Sahara", "ER" => "Eritrea", "ES" => "Spain", "ET" => "Ethiopia", "EU" => "Europe", "FI" => "Finland", "FJ" => "Fiji", "FK" => "Falkland Islands (Malvinas)", "FM" => "Micronesia, Federated States of", "FO" => "Faroe Islands", "FR" => "France", "GA" => "Gabon", "GB" => "United Kingdom", "GD" => "Grenada", "GE" => "Georgia", "GF" => "French Guiana", "GG" => "Guernsey", "GH" => "Ghana", "GI" => "Gibraltar", "GL" => "Greenland", "GM" => "Gambia", "GN" => "Guinea", "GP" => "Guadeloupe", "GQ" => "Equatorial Guinea", "GR" => "Greece", "GS" => "South Georgia and the South Sandwich Islands", "GT" => "Guatemala", "GU" => "Guam", "GW" => "Guinea-Bissau", "GY" => "Guyana", "HK" => "Hong Kong", "HM" => "Heard Island and McDonald Islands", "HN" => "Honduras", "HR" => "Croatia", "HT" => "Haiti", "HU" => "Hungary", "ID" => "Indonesia", "IE" => "Ireland", "IL" => "Israel", "IM" => "Isle of Man", "IN" => "India", "IO" => "British Indian Ocean Territory", "IQ" => "Iraq", "IR" => "Iran, Islamic Republic of", "IS" => "Iceland", "IT" => "Italy", "JE" => "Jersey", "JM" => "Jamaica", "JO" => "Jordan", "JP" => "Japan", "KE" => "Kenya", "KG" => "Kyrgyzstan", "KH" => "Cambodia", "KI" => "Kiribati", "KM" => "Comoros", "KN" => "Saint Kitts and Nevis", "KP" => "Korea, Democratic People's Republic of", "KR" => "Korea, Republic of", "KW" => "Kuwait", "KY" => "Cayman Islands", "KZ" => "Kazakhstan", "LA" => "Lao People's Democratic Republic", "LB" => "Lebanon", "LC" => "Saint Lucia", "LI" => "Liechtenstein", "LK" => "Sri Lanka", "LR" => "Liberia", "LS" => "Lesotho", "LT" => "Lithuania", "LU" => "Luxembourg", "LV" => "Latvia", "LY" => "Libyan Arab Jamahiriya", "MA" => "Morocco", "MC" => "Monaco", "MD" => "Moldova, Republic of", "ME" => "Montenegro", "MG" => "Madagascar", "MH" => "Marshall Islands", "MK" => "Macedonia", "ML" => "Mali", "MM" => "Myanmar", "MN" => "Mongolia", "MO" => "Macao", "MP" => "Northern Mariana Islands", "MQ" => "Martinique", "MR" => "Mauritania", "MS" => "Montserrat", "MT" => "Malta", "MU" => "Mauritius", "MV" => "Maldives", "MW" => "Malawi", "MX" => "Mexico", "MY" => "Malaysia", "MZ" => "Mozambique", "NA" => "Namibia", "NC" => "New Caledonia", "NE" => "Niger", "NF" => "Norfolk Island", "NG" => "Nigeria", "NI" => "Nicaragua", "NL" => "Netherlands", "NO" => "Norway", "NP" => "Nepal", "NR" => "Nauru", "NU" => "Niue", "NZ" => "New Zealand", "OM" => "Oman", "PA" => "Panama", "PE" => "Peru", "PF" => "French Polynesia", "PG" => "Papua New Guinea", "PH" => "Philippines", "PK" => "Pakistan", "PL" => "Poland", "PM" => "Saint Pierre and Miquelon", "PN" => "Pitcairn", "PR" => "Puerto Rico", "PS" => "Palestinian Territory", "PT" => "Portugal", "PW" => "Palau", "PY" => "Paraguay", "QA" => "Qatar", "RE" => "Reunion", "RO" => "Romania", "RS" => "Serbia", "RU" => "Russian Federation", "RW" => "Rwanda", "SA" => "Saudi Arabia", "SB" => "Solomon Islands", "SC" => "Seychelles", "SD" => "Sudan", "SE" => "Sweden", "SG" => "Singapore", "SH" => "Saint Helena", "SI" => "Slovenia", "SJ" => "Svalbard and Jan Mayen", "SK" => "Slovakia", "SL" => "Sierra Leone", "SM" => "San Marino", "SN" => "Senegal", "SO" => "Somalia", "SR" => "Suriname", "ST" => "Sao Tome and Principe", "SV" => "El Salvador", "SY" => "Syrian Arab Republic", "SZ" => "Swaziland", "TC" => "Turks and Caicos Islands", "TD" => "Chad", "TF" => "French Southern Territories", "TG" => "Togo", "TH" => "Thailand", "TJ" => "Tajikistan", "TK" => "Tokelau", "TL" => "Timor-Leste", "TM" => "Turkmenistan", "TN" => "Tunisia", "TO" => "Tonga", "TR" => "Turkey", "TT" => "Trinidad and Tobago", "TV" => "Tuvalu", "TW" => "Taiwan", "TZ" => "Tanzania, United Republic of", "UA" => "Ukraine", "UG" => "Uganda", "UM" => "United States Minor Outlying Islands", "US" => "United States", "UY" => "Uruguay", "UZ" => "Uzbekistan", "VA" => "Holy See (Vatican City State)", "VC" => "Saint Vincent and the Grenadines", "VE" => "Venezuela", "VG" => "Virgin Islands, British", "VI" => "Virgin Islands, U.S.", "VN" => "Vietnam", "VU" => "Vanuatu", "WF" => "Wallis and Futuna", "WS" => "Samoa", "YE" => "Yemen", "YT" => "Mayotte", "ZA" => "South Africa", "ZM" => "Zambia", "ZW" => "Zimbabwe");
        $i = 0;
		$is_block_cn = '';
        foreach ($countryx as $ifcntr => $countryz) {
            if (preg_match('/' . $data_cntr . '/', $ifcntr)) {
                $isckd = 'checked="checked"';
            } else {
                $isckd = '';
            }
            $is_block_cn .= '<div class="col-md-4">
                            <div id="inputPreview">
                                <input type="checkbox" id="check_' . $i . '" class="css-checkbox" name="block_country[]" value="' . $ifcntr . '" ' . $isckd . '> <label for="check_' . $i . '">' . $countryz . '</label>
                            </div>
                        </div>';
            $i++;
        }
        if (isset($_SESSION['infoz'])) {
            $infoz = $_SESSION['infoz'];
            $infoz_js = "setTimeout(function(){ \$('#infoz').hide(1000);}, 3000);";
            unset($_SESSION['infoz']);
        }
        ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .modal { overflow: auto !important; }
    .css-checkbox { position: absolute; overflow: hidden; clip: rect(0 0 0 0); height: 1px; width: 1px; margin: -1px; padding: 0; border: 0; }#inputPreview { display: block; gap: 20px; justify-content: center;       }.css-checkbox + label { font-weight:400; position: relative; font-size: 14px; cursor: pointer; display: inline-flex; align-items: center; height: 20px; color: rgb(0, 0, 0); }.css-checkbox + label::before { content: " "; display: inline-block; vertical-align: middle; margin-right: 3px; width: 16px; height: 16px; background-color: white; border-width: 2px; border-style: solid; border-color: rgb(204, 204, 204); border-radius: 2px; box-shadow: none; }.css-checkbox:checked + label::after { content: " "; background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA0NDggNTEyIj48cGF0aCBmaWxsPSIjMDA2YmVkIiBkPSJNMCA5NkMwIDYwLjY1IDI4LjY1IDMyIDY0IDMySDM4NEM0MTkuMyAzMiA0NDggNjAuNjUgNDQ4IDk2VjQxNkM0NDggNDUxLjMgNDE5LjMgNDgwIDM4NCA0ODBINjRDMjguNjUgNDgwIDAgNDUxLjMgMCA0MTZWOTZ6Ii8+PC9zdmc+"); background-repeat: no-repeat; background-size: 14px 14px; background-position: center center; position: absolute; display: flex; justify-content: center; align-items: center; margin-left: 0px; left: 0px; top: 0px; text-align: center; background-color: transparent; font-size: 10px; height: 20px; width: 20px; }
</style>

<?php
        if (empty($lisensi)) {
            ?>

<div class="container" style="width:98%;margin:30px auto;">

    <div class="row" style="margin-bottom:20px;">
        <div class="col-md-12">
            <h1 style="font-weight:900;font-size:30px;">
                <span style="color:#3594b9;">Kuli Digital</span><span style="font-size:20px;color:#c5c5c5;"> v2.0</span>
            </h1>
            <h2 style="font-size:16px;font-weight:700;color:#b5b5b5;margin-top:0px;">Landing Pages for Paid Traffic ADS</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <form class="form-horizontal" action="<?php
            echo $currurl;
            ?>" method="POST">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label" style="margin-bottom:20px;text-align:left;">Silahkan masukkan Email dan ID Lisensi Untuk Domain <span style="font-weight:700;color:#ff0000;"><?php
            echo strtolower($_SERVER['HTTP_HOST']);
            ?></span></label>
                        <div class="form-inline">
                            <input type="email" class="form-control" style="width:30%;" name="mail_key" placeholder="masukkan email" required>
                            <input type="text" class="form-control" style="width:50%;" name="lisensi_key" placeholder="masukkan id lisensi" required>
                            <button type="submit" class="btn btn-primary" name="save_lisensi">Konfirmasi Lisensi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php
            exit;
        }
?>

<div class="container" style="width:98%;margin:30px auto;">
	<?php if(isset($infoz)){ ?>
    <div id="infoz" style="margin:10px;"><?php echo $infoz; ?></div>
	<?php } ?>
    
    <div class="row" style="margin-bottom:20px;">
        <div class="col-md-12">
            <h1 style="font-weight:900;font-size:30px;">
                <span style="color:#3594b9;">Kuli Digital</span><span style="font-size:20px;color:#c5c5c5;"> v2.0</span>
            </h1>
            <h2 style="font-size:16px;font-weight:700;color:#b5b5b5;margin-top:0px;">Landing Pages for Paid Traffic ADS</h2>
        </div>
    </div>

    <div class="row" style="margin-bottom:20px;">
        <div class="col-md-12">
            <h3 style="font-size:14px;font-weight:900;margin-bottom:5px;color:#b30000;">CREATE NEW PROJECT</h3>
            <p style="margin-bottom:5px;">Untuk awal, silahkan buat project Landing Pages pada tombol dibawah.<br>
            1 Project = 1 halaman Landing Pages.<br>
            Lengkapi semua data project dan simpan.</p>
            <p><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_lp"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; <strong>New Landing Pages</strong></button></p>

<?php
foreach($wpdb->get_results( "SELECT * FROM $DB_data") as $key => $row) {
    $shortlink = $row->shortlink;
    $judul = $row->judul;
    $deskripsi = preg_replace('/\\\\/', '', $row->deskripsi);
    $gambar = $row->gambar;
    $konten = preg_replace('/\\\\/', '', $row->konten);
    $ads_1 = preg_replace('/\\\\/', '', $row->ads_1);
    $ads_2 = preg_replace('/\\\\/', '', $row->ads_2);
    $ads_3 = preg_replace('/\\\\/', '', $row->ads_3);
    $float_ads = preg_replace('/\\\\/', '', $row->float_ads);
    $download_button_text = $row->download_button_text;
    $download_button_url = $row->download_button_url;
    $back_button_text = $row->back_button_text;
    $back_button_url = $row->back_button_url;
    $device_view = $row->device_view;
    $themes = $row->themes;
    $timer = $row->timer;
    $traffic_source = $row->traffic_source;
    $html_head = preg_replace('/\\\\/', '', $row->html_head);
    $html_foot = preg_replace('/\\\\/', '', $row->html_foot);
    $idmd5z = $row->idmd5;
    
    $desktop_views = '<option value="all">All Device</option><option value="mobile">Only Mobile</option>';
    $desktop_views = preg_replace('/value="'.$device_view.'"/', 'value="'.$device_view.'" selected', $desktop_views);
	
    $traffic_option_first = '<option value="all">All</option><option value="fb">Facebook Ads</option><option value="google">Google Ads</option><option value="fb_google">Facebook Ads & Google Ads</option>';
    $traffic_option = preg_replace('/value="'.$traffic_source.'"/', 'value="'.$traffic_source.'" selected', $traffic_option_first);
    
    $themesx = '<option value="default">Default Template</option><option value="custom">PlayStore Template</option><option value="barbar">BarBar Template</option><option value="loading">Loading Template</option><option value="bootstrap">Bootstrap Template</option><option value="warrior">Warrior Template</option>';
    $themesx = preg_replace('/value="'.$themes.'"/', 'value="'.$themes.'" selected', $themesx);
    
?>
                    <div class="row"style="margin-top:10px;">
                        
                        <div class="col-md-10">
                            <strong><?php echo $judul; ?></strong><br>
                            <pre><?php echo $siteurl . $shortlink; ?></pre>
                        </div>
                        <div class="col-md-2">
                            <form action="<?php echo $currurl; ?>" method="POST">
                                <button type="button" class="btn btn-info btn-sm" style="font-weight:700;margin-top:25px;" data-toggle="modal" data-target="#lp_<?php echo $idmd5z; ?>">Edit</button>
                                <input type="hidden" name="id_data" value="<?php echo $idmd5z; ?>">
                                <button type="submit" class="btn btn-danger btn-sm" name="delete_shortlink_data" style="font-weight:700;margin-top:25px;" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>

<div class="modal fade" id="lp_<?php echo $idmd5z; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel" style="font-size:20px;font-weight:700;color:#3594b9;">New Landing Pages</h4>
			</div>
			<div class="modal-body">
			    <form class="form-horizontal" method="POST" action="<?php echo $currurl; ?>">
    			    <div class="panel panel-default">
    			        <div class="panel-body">
    			            
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">ShortLink Ads <span style="font-weight:900;color:#ff0000;">*</span></label>
    			                    <input type="text" class="form-control" name="shortlink" value="<?php echo $shortlink; ?>" required>
                                    <span class="help-block">ShortLink adalah url yang akan di jadikan iklan.<br>
                                    Buat kata unik dan karakter hanya terdiri dari : <br>
                                    huruf besar, huruf kecil, angka, garis tengah - dan garis bawah _ dan tanpa spasi.<br>
                                    <b>Contoh :</b> Contoh-Link_Iklan-1</span>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Title Landing Pages <span style="font-weight:900;color:#ff0000;">*</span></label>
    			                    <input type="text" class="form-control" name="judul" value="<?php echo $judul; ?>" required>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Top Adsense</label>
    			                    <textarea class="form-control" rows="5" name="ads_1" placeholder="kode adsense bagian atas"><?php echo $ads_1; ?></textarea>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Short Desc</label>
    			                    <textarea class="form-control" rows="5" name="deskripsi" placeholder="deskripsi pendek bagian atas"><?php echo $deskripsi; ?></textarea>
    			                    <span class="help-block">Isi deskripsi pendek untuk bagian atas LP</span>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Middle Adsense</label>
    			                    <textarea class="form-control" rows="5" name="ads_2" placeholder="kode adsense bagian tengah"><?php echo $ads_2; ?></textarea>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Images Landing Pages</label>
    			                    <div class="form-inline">
    			                        <div class="row">
    			                            <div class="col-md-9">
    			                                <input type="text" class="form-control" style="width:100%;" name="gambar" id="gmb<?php echo $idmd5z; ?>" value="<?php echo $gambar; ?>" >
    			                            </div>
                                            <div class="col-md-2">
                                                <input type="button" name="upload-img" id="upload-img<?php echo $idmd5z; ?>" class="gmb<?php echo $idmd5z; ?> button-secondary" value="Upload Image">
                                            </div>
    			                        </div>
    			                    </div>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Bottom Adsense</label>
    			                    <textarea class="form-control" rows="5" name="ads_3" placeholder="kode adsense bagian bawah"><?php echo $ads_3; ?></textarea>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Content Article</label>
    			                    <textarea class="form-control" rows="15" name="konten" placeholder="konten artikel (gunakan HTML kode)"><?php echo $konten; ?></textarea>
    			                    <span class="help-block">Buat artikel dan sertakan dengan HTML tags</span>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Download Button Text <span style="font-weight:900;color:#ff0000;">*</span></label>
    			                    <input type="text" class="form-control" name="download_button_text" value="<?php echo $download_button_text; ?>" required>
    			                    <span class="help-block">Isi nama text atau tulisan pada tombol</span>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Download Button Url <span style="font-weight:900;color:#ff0000;">*</span></label>
    			                    <input type="text" class="form-control" name="download_button_url" value="<?php echo $download_button_url; ?>" required>
    			                    <span class="help-block">Isi target url pada tombol</span>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;display:none;">
    			                <div class="form-group">
    			                    <label class="control-label">Back Button Text <span style="font-weight:900;color:#ff0000;">*</span></label>
    			                    <input type="text" class="form-control" name="back_button_text" value="<?php echo $back_button_text; ?>" >
    			                    <span class="help-block">Silahkan isi text untuk back button</span>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;display:none;">
    			                <div class="form-group">
    			                    <label class="control-label">Back Button Url <span style="font-weight:900;color:#ff0000;">*</span></label>
    			                    <input type="text" class="form-control" name="back_button_url" value="<?php echo $back_button_url; ?>" >
    			                    <span class="help-block">Silahkan isi target url untuk back button</span>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Floating Ads Code</label>
    			                    <textarea class="form-control" rows="5" name="float_ads" placeholder="kode iklan melayang"><?php echo $float_ads; ?></textarea>
    			                    <span class="help-block">Silahkan isi dengan kode iklan jika ingin iklan melayang</span>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Head HTML Code</label>
    			                    <textarea class="form-control" rows="7" name="html_head" placeholder="kode HTML bagian head"><?php echo $html_head; ?></textarea>
    			                    <span class="help-block">Silahkan isi sesuai keperluan untuk bagian head</span>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Footer HTML Code</label>
    			                    <textarea class="form-control" rows="7" name="html_foot" placeholder="kode HTML bagian footer"><?php echo $html_foot; ?></textarea>
    			                    <span class="help-block">Silahkan isi sesuai keperluan untuk bagian footer</span>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
                                <div class="form-group">
                                    <label class="control-label">Device View</label>
                                    <select class="form-control" name="device_view">
                                        <?php echo $desktop_views; ?>
                                    </select>
                                    <span class="help-block">Pilih view mode device untuk Landing Pages</span>
                                </div>
                            </div>

    			            <div class="panel-body" style="padding-top:0px;">
                                <div class="form-group">
                                    <label class="control-label">Template LP</label>
                                    <select class="form-control" name="themes">
                                        <?php echo $themesx; ?>
                                    </select>
                                    <span class="help-block">Pilih salah satu template</span>
                                </div>
                            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Timer Scroll</label>
    			                    <input type="number" class="form-control" min="1" max="9" name="timer" placeholder="3" style="width:20%;" value="<?php echo $timer; ?>">
    			                    <span class="help-block">Default 3 Detik</span>
    			                </div>
    			            </div>
							
							<div class="panel-body" style="padding-top:0px;">
                                <div class="form-group">
                                    <label class="control-label">Traffic Source</label>
                                    <select class="form-control" name="traffic_source">
                                        <?php echo $traffic_option; ?>
                                    </select>
                                    <span class="help-block">Munculkan LP dari semua sumber traffic atau dari Paid Ads (FB Ads / Google Ads), selain itu redirect</span>
                                </div>
                            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <input type="hidden" name="edit_lp" value="<?php echo $idmd5z; ?>">
    			                    <button type="submit" class="btn btn-danger btn-sm" name="save_project"><strong>Save Data Project LP</strong></button>
    			                </div>
    			            </div>
    			        </div>
    			    </div>
			    </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
jQuery(document).ready(function ($) {
    $('#upload-img<?php echo $idmd5z; ?>').click(function (e) {
        var wsclass = $(this).attr('class');
        var wsclass = wsclass.split(' ')[0];
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            multiple: false
        }).open()
        .on('select', function (e) {
            var uploaded_image = image.state().get('selection').first();
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            $('#' + wsclass).val(image_url);
            $('#preview-' + wsclass).attr("src", image_url);
        });
    });
});
</script>
<?php } ?>

            <h3 style="font-size:14px;font-weight:900;margin-bottom:5px;color:#b30000;margin-top:50px;">DATA ORGANIK</h3>
            <p style="margin-bottom:5px;">Untuk dapat mengaktifkan hasil dari organik trefik, Domain atau SubDomain LP wajib terindex di Google.<br>
            Silahkan scrape data organik terlebih dahulu dengan klik tombol dibawah, dan tunggu hingga selesai.<br>
            Setelah itu aktifkan pilihan Organik Trefik.<br>
            <?php echo $tot_org; ?></p>
            <form class="form-horizontal row" style="" method="POST" action="<?php echo $currurl; ?>">
                <div class="col-md-2">
                    <!--<p><a href="<?php echo $siteurl; ?>single_kdads" class="btn btn-warning btn-sm" target="_blank" style="margin-bottom:5px;"><i class="fa fa-database" aria-hidden="true"></i>&nbsp; <strong>Scrape Data Organik</strong></a></p>-->
                    <p><button type="button" class="btn btn-warning btn-sm" id="scrape_data_organik" style="margin-bottom:5px;"><i class="fa fa-database" aria-hidden="true"></i>&nbsp; <strong>Scrape Data Organik</strong></button>
                </div>
                <?php echo $option_org; ?>
            </form>
            
            <?php if($totdt > 0){ ?>
            
            <p style="margin-bottom:25px;margin-top:15px;">
                <strong style="font-size:14px;font-weight:900;color:#b30000;">Hasil Data Organik Scrape</strong><br>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#filter_organik" style="margin-bottom:5px;"><strong>Check Organik Scrape</strong></button>
            </p>

            <form class="form-horizontal row" style="" method="POST" action="<?php echo $currurl; ?>">
                <div class="col-md-8">
                    <div class="panel-body" style="padding-top:0px;">
                        <div class="form-group">
                            <label class="control-label" style="font-size:14px;font-weight:900;color:#b30000;">LINK MANUAL ORGANIK</label>
                            <span class="help-block" style="margin-bottom:0px;">Kamu bisa masukkan data url organik sendiri dan pisahkan dengan baris baru / paragraf.<br>
                            Apabila manual organik kosong, hasil LP akan menggunakan organik dari scrape.</span>
                            <textarea class="form-control" rows="10" name="manual_organik" placeholder="url organik manual"><?php echo $manual_organik; ?></textarea>
                            <button type="submit" class="btn btn-primary" name="save_manual_organik" style="margin-top:5px;">Save Manual Organik</button>
                        </div>
                    </div>
                </div>
            </form>
            
            <form class="form-horizontal row" style="" method="POST" action="<?php echo $currurl; ?>">
                <div class="col-md-8">
                    <div class="panel-body" style="padding-top:0px;">
                        <div class="form-group">
                            <label class="control-label" style="font-size:14px;font-weight:900;color:#b30000;">LINK NON-ORGANIK</label>
                            <span class="help-block" style="margin-bottom:0px;">Masukkan url post kamu sendiri dan pisahkan dengan baris baru / paragraf.<br>
                            Fitur ini berfungsi apabila organik di non-aktifkan.</span>
                            <textarea class="form-control" rows="10" name="non_organik" placeholder="url post non-organik"><?php echo $non_organik; ?></textarea>
                            <button type="submit" class="btn btn-primary" name="save_non_organik" style="margin-top:5px;">Save Non-Organik</button>
                        </div>
                    </div>
                </div>
            </form>
            
<div class="modal fade" id="filter_organik" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel" style="font-size:20px;font-weight:700;color:#3594b9;">Filter Data Organik</h4>
				<p>Silahkan pilih url hasil organik untuk dihapus.<br>
				Atau silahkan copy paste url organik untuk di masukkan ke manual organik.</p>
			</div>
			<div class="modal-body">
			    <form class="form-horizontal" method="POST" action="<?php echo $currurl; ?>">
    			    <div class="panel panel-default">
    			        <div class="panel-body">
    			            
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <div class="checkbox">
    			                        <ul class="list-group" style="overflow:auto;width:100%;height:400px;">
    			                        <?php
    			                        $i = 0;
    			                        sort($js_dt);
    			                        foreach($js_dt as $js_data){
    			                            $ifmd5 = md5(trim($js_data));
    			                            $ifurlv = preg_replace('/^.*?\&url=|\&ved=.*/', '', $js_data);
    			                            echo '<li class="list-group-item"><label><input type="checkbox" name="id_organik[]" value="'.$ifmd5.'" style="-webkit-appearance:auto;"> '.$ifurlv.'</label><br>
    			                            <pre>'.$js_data.'</pre></li>';
    			                            $i++;
    			                        }
    			                        ?>
    			                        </ul>
    			                        <button type="submit" class="btn btn-danger btn-sm" name="del_organik"><strong>Remove Organik</strong></button>
    			                    </div>
    			                </div>
    			            </div>
    			            
    			        </div>
    			    </div>
			    </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

            <?php } ?>

            <h3 style="font-size:14px;font-weight:900;margin-bottom:5px;color:#b30000;margin-top:50px;">BLOCK IP COUNTRY</h3>
            <p style="margin-bottom:5px;">Silahkan pilih beberapa negara yang akan di block dengan klik tombol merah dibawah.<br>
            Dan isi redirect URL tujuan untuk visitor dari negara yang telah diblock.</p>
            <p><button type="button" class="btn btn-danger btn-sm" id="show_blockIP" style="margin-bottom:5px;"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp; <strong>Block IP Country</strong></button></p>
            <form class="form-horizontal" method="POST" action="<?php echo $currurl; ?>">
                <div class="panel panel-default blockIP_checkbox" style="background:#d7d7d7;display:none;">
					<button type="button" id="ckAll" onclick="checkAllCheckboxes('block_country[]')" class="btn btn-primary" style="margin: 8px;">Check All</button>
					<hr>
                    <div class="row"><?php echo $is_block_cn; ?></div>
                    <div class="row">
                        <div class="col-md-12" style="text-align:center;margin-top:20px;margin-bottom:20px;">
                            <button type="submit" class="btn btn-danger btn-sm" name="save_block_country"><strong>Simpan Block Country</strong></button>
                        </div>
                    </div>
                </div>
            </form>
            
            <h3 style="font-size:14px;font-weight:900;margin-bottom:0px;color:#b30000;margin-top:50px;">BLOCK IP MANUAL</h3>
            <form class="form-horizontal row" style="" method="POST" action="<?php echo $currurl; ?>">
                <div class="col-md-8">
                    <div class="panel-body" style="padding-top:0px;">
                        <div class="form-group">
                            <span class="help-block" style="margin-bottom:0px;">Masukkan IP yang ingin di block dan pisahkan dengan baris baru / paragraf.</span>
                            <textarea class="form-control" rows="10" name="block_ip" placeholder="101.010.101.0"><?php echo $block_ip; ?></textarea>
                            <button type="submit" class="btn btn-primary" name="save_block_ip" style="margin-top:5px;">Save Block IP</button>
                        </div>
                    </div>
                </div>
            </form>
            
            <form class="form-horizontal" method="POST" action="<?php echo $currurl; ?>">
                <div class="panel panel-default" style="border:0;">
                    <div class="row" style="margin-bottom:20px;">
                        <div class="col-md-2">
                            <label class="control-label" style="font-size:14px;font-weight:900;color:#b30000;">URL Redirect Blocks</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="block_redirect" placeholder="isi url redirect block ip" value="<?php echo $block_redirect; ?>">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-info btn-sm" name="save_url_blockip"><strong>Save Redirect Url</strong></button>
                        </div>
                    </div>
                </div>
            </form>
			
			<h3 style="font-size:14px;font-weight:900;margin-bottom:0px;color:#b30000;margin-top:50px;">TRAFFIC FILTER</h3>
			<p><b class="text-danger">Mohon Dibaca!</b>
			<br>Filter traffic menggunakan 3 sumber yaitu <a href="http://getipintel.net/" target="_blank"><b>getipintel <span class="text-success">(default)</span></b></a>, <a href="https://proxycheck.io/" target="_blank"><b>proxycheck <span class="text-warning">(optional)</span></b></a>, dan <a href="https://www.ipqualityscore.com/" target="_blank"><b>ipqualityscore <span class="text-warning">(optional)</span></b></a>.
			<br>Jika salah satu API Key dari ipinfo atau ipqualityscore diisi maka akan mengutamakan diantara kedua layanan tsb, jika API Key diisikan di kedua layanan tsb maka yang akan digunakan pertama adalah dari proxycheck dan jika sudah mencapai limit maka akan menggunakan ipqualityscore dan jika sudah mencapai limit maka akan menggunakan layanan default yaitu getipintel.</p>
			<ul>
				<li><b>ProxyCheck: free limit 1000 / hari</b></li>
				<li><b>IPQualityScore: free limit 5000 / bulan</b></li>
			</ul>
            <form class="form-horizontal row" style="" method="POST" action="<?php echo $currurl; ?>">
                <div class="col-md-8">
                    <div class="panel-body" style="padding-top:0px;">
                        <div class="form-group">
                            <span class="help-block" style="margin-bottom:0px;">Status Traffic Filter</span>
                            <select class="form-control" name="traffic_filter_status" style="height:30px;max-width:30rem;">
								<option value="off" <?php if($traffic_filter_status == 'off'){ echo "selected"; } ?>>OFF</option>
								<option value="on" <?php if($traffic_filter_status == 'on'){ echo "selected"; } ?>>ON</option>
							</select>
                        </div>
                        <div class="form-group">
                            <span class="help-block" style="margin-bottom:0px;">GetIpIntel: Masukkan Email yang valid agar filter dapat berjalan dengan baik.</span>
                            <input class="form-control" type="email" name="getipintel_api" value="<?= isset($getipintel_api)?$getipintel_api:''; ?>" placeholder="Email" required/>
                        </div>
                        <div class="form-group">
                            <span class="help-block" style="margin-bottom:0px;">Proxycheck: Masukkan API Key.</span>
                            <input class="form-control" type="text" name="proxycheck_api" value="<?= isset($proxycheck_api)?$proxycheck_api:''; ?>" placeholder="API Key (Optional)" />
                        </div>
                        <div class="form-group">
                            <span class="help-block" style="margin-bottom:0px;">IpQualityscore: Masukkan API Key.</span>
                            <input class="form-control" type="text" name="ipqualityscore_api" value="<?= isset($ipqualityscore_api)?$ipqualityscore_api:''; ?>" placeholder="API Key (Optional)" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="save_traffic_filter" style="margin-top:5px;">Save Traffic Filter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<div class="modal fade" id="add_lp" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel" style="font-size:20px;font-weight:700;color:#3594b9;">New Landing Pages</h4>
			</div>
			<div class="modal-body">
			    <form class="form-horizontal" method="POST" action="<?php echo $currurl; ?>">
    			    <div class="panel panel-default">
    			        <div class="panel-body">
    			            
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">ShortLink Ads <span style="font-weight:900;color:#ff0000;">*</span></label>
    			                    <input type="text" class="form-control" name="shortlink" placeholder="buat shortlink ads" required>
                                    <span class="help-block">ShortLink adalah url yang akan di jadikan iklan.<br>
                                    Buat kata unik dan karakter hanya terdiri dari : <br>
                                    huruf besar, huruf kecil, angka, garis tengah - dan garis bawah _ dan tanpa spasi.<br>
                                    <b>Contoh :</b> Contoh-Link_Iklan-1</span>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Title Landing Pages <span style="font-weight:900;color:#ff0000;">*</span></label>
    			                    <input type="text" class="form-control" name="judul" placeholder="masukkan title" required>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Top Adsense</label>
    			                    <textarea class="form-control" rows="5" name="ads_1" placeholder="kode adsense bagian atas"></textarea>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Short Desc</label>
    			                    <textarea class="form-control" rows="5" name="deskripsi" placeholder="deskripsi pendek bagian atas"></textarea>
    			                    <span class="help-block">Isi deskripsi pendek untuk bagian atas LP</span>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Middle Adsense</label>
    			                    <textarea class="form-control" rows="5" name="ads_2" placeholder="kode adsense bagian tengah"></textarea>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Images Landing Pages</label>
    			                    <div class="form-inline">
    			                        <div class="row">
    			                            <div class="col-md-9">
    			                                <input type="text" class="form-control" style="width:100%;" name="gambar" id="gmb1" placeholder="masukkan url gambar" >
    			                            </div>
                                            <div class="col-md-2">
                                                <input type="button" name="upload-img" id="upload-img1" class="gmb1 button-secondary" value="Upload Image">
                                            </div>
    			                        </div>
    			                    </div>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Bottom Adsense</label>
    			                    <textarea class="form-control" rows="5" name="ads_3" placeholder="kode adsense bagian bawah"></textarea>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Content Article</label>
    			                    <textarea class="form-control" rows="15" name="konten" placeholder="konten artikel (gunakan HTML kode)"></textarea>
    			                    <span class="help-block">Buat artikel dan sertakan dengan HTML tags</span>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Download Button Text <span style="font-weight:900;color:#ff0000;">*</span></label>
    			                    <input type="text" class="form-control" name="download_button_text" placeholder="isi nama tombol" required>
    			                    <span class="help-block">Isi nama text atau tulisan pada tombol</span>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Download Button Url <span style="font-weight:900;color:#ff0000;">*</span></label>
    			                    <input type="text" class="form-control" name="download_button_url" placeholder="isi url target pada tombol" required>
    			                    <span class="help-block">Isi target url pada tombol</span>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;display:none;">
    			                <div class="form-group">
    			                    <label class="control-label">Back Button Text <span style="font-weight:900;color:#ff0000;">*</span></label>
    			                    <input type="text" class="form-control" name="back_button_text" placeholder="isi text untuk back button" >
    			                    <span class="help-block">Silahkan isi text untuk back button</span>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;display:none;">
    			                <div class="form-group">
    			                    <label class="control-label">Back Button Url <span style="font-weight:900;color:#ff0000;">*</span></label>
    			                    <input type="text" class="form-control" name="back_button_url" placeholder="isi url target untuk back button" >
    			                    <span class="help-block">Silahkan isi target url untuk back button</span>
    			                </div>
    			            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Floating Ads Code</label>
    			                    <textarea class="form-control" rows="5" name="float_ads" placeholder="kode iklan melayang"></textarea>
    			                    <span class="help-block">Silahkan isi dengan kode iklan jika ingin iklan melayang</span>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Head HTML Code</label>
    			                    <textarea class="form-control" rows="7" name="html_head" placeholder="kode HTML bagian head"></textarea>
    			                    <span class="help-block">Silahkan isi sesuai keperluan untuk bagian head</span>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <label class="control-label">Footer HTML Code</label>
    			                    <textarea class="form-control" rows="7" name="html_foot" placeholder="kode HTML bagian footer"></textarea>
    			                    <span class="help-block">Silahkan isi sesuai keperluan untuk bagian footer</span>
    			                </div>
    			            </div>

    			            <div class="panel-body" style="padding-top:0px;">
                                <div class="form-group">
                                    <label class="control-label">Device View</label>
                                    <select class="form-control" name="device_view">
                                        <option value="all">All Device</option>
                                        <option value="mobile">Only Mobile</option>
                                    </select>
                                    <span class="help-block">Pilih view mode device untuk Landing Pages</span>
                                </div>
                            </div>

    			            <div class="panel-body" style="padding-top:0px;">
                                <div class="form-group">
                                    <label class="control-label">Template LP</label>
                                    <select class="form-control" name="themes">
                                        <option value="default">Default Template</option>
                                        <option value="custom">PlayStore Template</option>
                                        <option value="barbar">BarBar Template</option>
                                        <option value="loading">Loading Template</option>
                                        <option value="bootstrap">Bootstrap Template</option>
                                    </select>
                                    <span class="help-block">Pilih salah satu template</span>
                                </div>
                            </div>

    			            <div class="panel-body" style="padding-top:0px;display:none;">
    			                <div class="form-group">
    			                    <label class="control-label">Timer Scroll</label>
    			                    <input type="number" class="form-control" min="1" max="9" name="timer" placeholder="3" style="width:20%;">
    			                    <span class="help-block">Default 3 Detik</span>
    			                </div>
    			            </div>
							
							<div class="panel-body" style="padding-top:0px;">
                                <div class="form-group">
                                    <label class="control-label">Traffic Source</label>
                                    <select class="form-control" name="traffic_source">
                                        <?php echo $traffic_option_first; ?>
                                    </select>
                                    <span class="help-block">Munculkan LP dari semua sumber traffic atau dari Paid Ads (FB Ads / Google Ads), selain itu redirect</span>
                                </div>
                            </div>
    			                
    			            <div class="panel-body" style="padding-top:0px;">
    			                <div class="form-group">
    			                    <input type="hidden" name="save_lp" value="save">
    			                    <button type="submit" class="btn btn-danger btn-sm" name="save_project"><strong>Simpan Data Project LP</strong></button>
    			                </div>
    			            </div>
    			        </div>
    			    </div>
			    </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

</div>

<div id="loads" style="display:none;position:fixed;z-index:1000;top:0;left:0;height:100%;width:100%;background:rgba(40,40,40,.83);">
    <i class="fa fa-spinner fa-spin fa-3x fa-fw" style="position:absolute;margin:auto;left:50%;top:50%;color:#00d0ff;"></i>
</div>

<?php wp_enqueue_media(); ?>
<script>
$(document).ready(function() {
    <?php if(isset($infoz_js)) { echo $infoz_js; } ?>
    $('#show_blockIP').click(function() {
        $('.blockIP_checkbox').slideToggle("slow");
    });
    $("#scrape_data_organik").click(function(e){
        e.preventDefault();
        $("#loads").show();
		$.ajax({
			url: "<?php echo $siteurl; ?>single_kdads",
			type: "post",
			data: {item:'scrape_dataorganik'},
			success: function(response){
				$("#loads").hide();
				alert(response);
				window.location.reload();
			}
		});		
    });
});
function checkAllCheckboxes(checkboxName) {
	// Get all checkboxes with the specified name attribute
	var checkboxes = document.querySelectorAll('input[name="' + checkboxName + '"]');

	// Check if any checkbox is unchecked
	var isAnyUnchecked = Array.from(checkboxes).some(function(checkbox) {
		return !checkbox.checked;
	});

	// Toggle the checked state based on the current state
	checkboxes.forEach(function(checkbox) {
		checkbox.checked = isAnyUnchecked;
	});
}
jQuery(document).ready(function ($) {
    $('#upload-img1').click(function (e) {
        var wsclass = $(this).attr('class');
        var wsclass = wsclass.split(' ')[0];
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            multiple: false
        }).open()
        .on('select', function (e) {
            var uploaded_image = image.state().get('selection').first();
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            $('#' + wsclass).val(image_url);
            $('#preview-' + wsclass).attr("src", image_url);
        });
    });
});
</script>