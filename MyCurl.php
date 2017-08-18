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
                $name = date('YmdHis',time()).mt_rand(). '.jpg';
                $path = $save_path . $name;
                echo '<br>';
                echo $img->src;
                $fp = fopen($path, 'w');
                $ch = curl_init($img->src);
                curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_exec($ch);
                curl_close($ch);
            }
        }

        $html->clear(); 
        unset($html);
    }
}
