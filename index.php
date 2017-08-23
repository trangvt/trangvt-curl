<!DOCTYPE html>
<html>
<head>
<title>cURL</title>
<style type="text/css">
    hr {
        width: 100% !important;
    }
</style>
</head>

<body>
    <div>
        <p>Simplest example</p>
        <form action="curl.php">
            URL: <input type="text" name="url" value="https://japanhotel.airtrip.jp">
            <input type="submit" value="SUBMIT">
        </form>
    </div>
    <br><hr>
    <div>
        <p>Get images via cURL. Don't add last slash in URL</p>
        <form action="images.php">
            URL: <input type="text" name="url" value="https://japanhotel.airtrip.jp">
            <input type="submit" value="Get Images">
        </form>
    </div>
    <br><hr>
    <div>
        <p>Access to the website has BasicAuth</p>
        <form action="auth.php">
            <input type="text" name="url" value="https://japanhotelairtrip.tabi-air.com/"></br></br>
            <input type="text" name="username" value="rakuda"></br></br>
            <input type="text" name="password" value="ea"></br></br>
            <input type="submit" value="Access">
        </form>
    </div>
    <br><hr>
    <div>
        <p>GET DATA via cURL</p>
        <form action="get.php">
            <input type="text" name="url" value="https://japanhotel.airtrip.jp/"></br></br>
            <input type="text" name="stay_date" value="2017/08/22"></br></br>
            <input type="submit" value="SUBMIT">
        </form>
    </div>
    <br><hr>
    <div>
        <p>POST DATA: Login via cURL</p>
        <form action="post.php" method="POST">
            url: <input type="text" name="url" value="https://www.bbcgoodfood.com/user/login"></br></br>
            name: <input type="text" name="name" value="trangvt.khtn@gmail.com"></br></br>
            pass: <input type="text" name="pass" value="27081991"></br></br>
            form_build_id: <input type="text" name="form_build_id" value="form-6x1QcEJZxwJz8IyZY712wJar6ssyUsHRyldDKS24t3k"></br></br>
            form_id: <input type="text" name="form_id" value="user_login"></br></br>
            op: <input type="text" name="op" value="Sign in"></br></br>
            <input type="submit" value="SUBMIT">
        </form>
    </div>
    <br><hr>
</body>

</html>
<?php
require_once('config.php');
$ch = new MyCurl();

phpinfo();

