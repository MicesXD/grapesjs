<?php
header("Content-Type:application/json");
include('db.php');
$data = json_decode(file_get_contents("php://input"),true);

$assets = $data['gjs-assets'];
$assets=json_encode($assets);
$components = $data['gjs-components'];
$components=json_encode($components);
$css = $data['gjs-css'];
$css = json_encode($css);
$html = $data['gjs-html'];
$html= json_encode($html);
$styles = $data['gjs-styles'];
$styles = json_encode($styles);

//$page_id = $data['page_id']; **I did not use it in my code here.. but you might need it. See the last part of this answer.**

 $result = mysqli_query(
 $con,
 "INSERT INTO `pages` (assets, components, css, html, styles)
  VALUES ($assets, $components, $css, $html, $styles)") or die(mysqli_error($con));

echo "success";

?>