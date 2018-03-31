<?php
/**
 * Created by PhpStorm.
 * User: elporfirio
 * Date: 14/04/14
 * Time: 08:09 PM
 */
require_once("https://twitter.com/GobiernoBTA");
$conexion = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, TOKEN, TOKEN_SECRET);
//var_dump($conexion);
$cuenta = $conexion->get("followers/list");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mi App de Twitter</title>
<style>
body{
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.follower{
    width: 300px;
    min-height: 320px;
    float: left;
    margin: 10px;
    border-radius: 8px;
    border: 2px solid gainsboro;
    padding: 10px;
}
img {
    float:left;
    margin: 5px;
    border: 6px #FFF solid;
    border-radius: 2px;
}
.nombre {
    float: left;
    font-size: 18px;
}
.separador{
    min-height: 14px;
}
.clr{
    clear: both;
}
</style>
</head>
<body>
<h2>Mis seguidores</h2>
<?php
foreach($cuenta->users as $follower){
    echo "<div class='follower'>";
    echo "<img src='".$follower->profile_image_url."'>";
    echo "<span class='nombre'>" . $follower->screen_name . "</span>";
    echo "<div class='clr'></div>";
    echo "<div class='separador' style='background: url(".$follower->profile_background_image_url.")'></div>" ;
    echo "<br>";
    echo "Tiene : <b>" . $follower->friends_count . "</b> amigos, y <b>".$follower->statuses_count."</b> tweets";
    echo "<hr>";
    echo "<span style='color: #".$follower->profile_background_color."'>" . $follower->description . "</span>";
    echo "<h4>Ultimo Tweet:</h4>";
    echo $follower->status->text;
    echo "</div>";
}
?>
<div style="clear: both;"></div>
</body>
</html>