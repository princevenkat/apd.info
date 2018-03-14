<?php 
/* 
Template Name: Migrate
*/
 get_header(); ?>

<?php

$sql=mysql_query("SELECT intermediate.id, SUBSTRING(intermediate.imageid, 1, LOCATE('"', intermediate.imageid) - 1) imageid FROM (SELECT id, SUBSTRING(post_content, LOCATE('[caption id=', post_content) + 24, 20) imageid FROM wp_posts WHERE LOCATE('[caption id=', post_content) > 0) intermediate WHERE LOCATE('"', intermediate.imageid) > 0");

echo $sql;
?>

<?php get_footer();?>