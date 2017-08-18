<!DOCTYPE html>
<html>
<head>
<title>cURL</title>
</head>

<body>
    <div>
        <p>Simplest example</p>
        <form action="curl.php">
            URL: <input type="text" name="url" placeholder="Input URL" value="https://www.bbcgoodfood.com/howto/guide/fizzy-drinks">
            <input type="submit" value="SUBMIT">
        </form>
    </div>
    <div>
        <p>Get images</p>
        <form action="images.php">
            URL: <input type="text" name="url" placeholder="Input URL" value="https://www.bbcgoodfood.com/howto/guide/fizzy-drinks">
            <input type="submit" value="Get Images">
        </form>
    </div>
    <div>
        <p>BasicAuth</p>
        <form action="auth.php">
            <input type="text" name="url" placeholder="Input URL" value="https://japanhotelairtrip.tabi-air.com/"></br></br>
            <input type="text" name="username" placeholder="Input User" value="rakuda"></br></br>
            <input type="text" name="password" placeholder="Input Password" value="ea"></br></br>
            <input type="submit" value="Access">
        </form>
    </div>
</body>

</html>
<?php
phpinfo();