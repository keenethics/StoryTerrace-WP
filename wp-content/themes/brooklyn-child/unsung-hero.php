<?php
/* Template Name: Unsung Hero Redirect */
get_header(); 
?>  
<?php 
$country_code = $_SERVER["HTTP_CF_IPCOUNTRY"];
$curlangs =  ICL_LANGUAGE_CODE;
if($country_code == "GB"){
header("Location: https://info.storyterrace.com/uk/unsung-heroes");
die();
}elseif ($country_code == "US") {
	header("Location: https://info.storyterrace.com/us/unsung-heroes");
	die();
}else{
	if($curlangs == 'en-US') {
		header("Location: https://info.storyterrace.com/us/unsung-heroes");
		die();
	}elseif ($curlangs == 'en-GB') {
		header("Location: https://info.storyterrace.com/uk/unsung-heroes");
		die();
	}
}
?>
<?php get_footer(); ?>