<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
  <link href="/common/css/style.css" rel="stylesheet" type="text/css" media="all"/>
  <script src="/common/js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="/common/js/slick.min.js" type="text/javascript"></script>
  <script src="/common/js/common.js" type="text/javascript"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <div class="l-wrapper">
    <main class="l-cont">



