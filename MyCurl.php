<?php
class MyCURL {
    /**
     * [simple_curl description]
     * @param  [type] $url [description]
     * @return [resource]      [description]
     */
    public function simple_curl($url) {
        $ch = curl_init();

        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);

        // grab URL and pass it to the browser
        curl_exec($ch);

        // close cURL resource, and free up system resources
        curl_close($ch);
    }

    /**
     * Get images
     * @param  [string] $url    website url
     * @param  [string] $save_path where to save image
     * @return [array]         image infomations
     */
    public function get_images($url, $save_path) {
        $html = file_get_html($url);

        $images = [];

        if (is_object($html)) {
            $img_arr = $html->find('img');
            foreach($img_arr as $img) {
                $src = $this->get_src($url, $img->src);

                $type = $this->find_extension($src);

                if ( !empty($type) )  {
                    $name = date('YmdHis',time()).mt_rand(). $type;
                    $path = $save_path . $name;

                    $this->save_image($path, $src);

                    $images[] = [
                        'path_local' => $path,
                        'path_server' => $src
                    ];
                }
            }
        }

        $html->clear(); 
        unset($html);

        return $images;
    }

    /**
     * [get_src description]
     * @param  [string] $url [description]
     * @param  [string] $src [description]
     * @return [string]      [description]
     */
    public function get_src($url, $src) {
        if (stripos($src, $url) == FALSE) {
            $src = $url . $src;
        }
        return $src;
    }
    /**
     * Find image extension
     * @param  [string] $src  image src
     * @return [string]       image extension
     */
    public function find_extension($src) {
        foreach ($GLOBALS['image_extension'] as $value) {
            // https://www.w3schools.com/php/func_string_strripos.asp
            if (strripos($src, $value) !== FALSE) {
                return $value;
            }
        }
        return NULL;
    }

    /**
     * Save images
     * @param  [type] $path [description]
     * @param  [type] $src  [description]
     * @return [type]       [description]
     */
    public function save_image($path, $src) {
        $fp = fopen($path, 'w');
        $ch = curl_init($src);

        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_FILE, $fp);

        curl_exec($ch);
        curl_close($ch);
    }

    /**
     * [basic_auth description]
     * @param  [type] $url       [description]
     * @param  [type] $username  [description]
     * @param  [type] $password  [description]
     * @param  [type] $useragent [description]
     * @return [type]            [description]
     */
    public function basic_auth($url, $username, $password, $useragent) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3"));


        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "{$username}:{$password}");

        curl_exec($ch);
        curl_close($ch);

        // http://www.useragentstring.com/index.php
        echo $useragent . '<br>';
        echo 'Fake user agent: ' . $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * [get_data description]
     * @param  [type] $url       [description]
     * @param  [type] $param_arr [description]
     * @return [type]            [description]
     */
    public function get_data($url, $param_arr) {
        $param = 'result?stay_date='.urlencode($param_arr['stay_date']);
        $url .= $param;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_exec($ch);
        curl_close($ch);
    }

    /**
     * [post_data description]
     * @param  [type] $url       [description]
     * @param  [type] $param_arr [description]
     * @return [type]            [description]
     */
    public function post_data($url, $param_arr, $cookie, $user_agent,$timeout = 5) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch,CURLOPT_USERAGENT,$user_agent);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param_arr);

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
        curl_setopt ($ch, CURLOPT_COOKIEFILE, $cookie);

        curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_ENCODING, "" );

        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );

        $content = curl_exec( $ch );
        var_dump($content);

        curl_close($ch);
    }
}
