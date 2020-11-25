<?php
/* Template Name: Webinar Redirect */
get_header(); 
?>  
<?php 
echo $country_code = $_SERVER["HTTP_CF_IPCOUNTRY"];
$curlangs =  ICL_LANGUAGE_CODE;
if($country_code == "US"){
	header("Location: https://info.storyterrace.com/us/webinar/6-24-2020/meet-our-writers");
	die();
}elseif ($country_code == "IE") {
	header("Location: https://info.storyterrace.com/uk/webinar/6-24-2020/meet-our-writers-0");
	die();
}elseif ($country_code == "GB") {
	header("Location: https://info.storyterrace.com/uk/webinar/6-24-2020/meet-our-writers-0");
	die();
}else{
	header("Location: https://info.storyterrace.com/us/webinar/6-24-2020/meet-our-writers");
	die();
}
?>
<?php get_footer(); ?>