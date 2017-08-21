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
     * [get_images description]
     * @param  [type] $url    [description]
     * @param  [type] $save_path [description]
     * @return [type]         [description]
     */
    public function get_images($url, $save_path) {
        $html = file_get_html($url);

        if (is_object($html)) {
            $img_arr = $html->find('img');
            foreach($img_arr as $img) {
                $src = $img->src;
                $type = substr($src, strripos($src, ".") + 1);
                $name = date('YmdHis',time()).mt_rand(). '.' . $type;
                $path = $save_path . $name;
                echo '<br>';
                echo $path.'<br>';
                echo $img->src;

                $this->save_images($path, $src);
            }
        }

        $html->clear(); 
        unset($html);
    }

    /**
     * [save_images description]
     * @param  [type] $path [description]
     * @param  [type] $src  [description]
     * @return [type]       [description]
     */
    public function save_images($path, $src) {
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
    public function post_data($url, $param_arr) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param_arr));

        curl_exec($ch);
        curl_close($ch);
    }
}
