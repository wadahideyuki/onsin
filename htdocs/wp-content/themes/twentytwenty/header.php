<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" >
  <?php wp_head(); ?>
  <link href="/common/css/style.css?2022-2" rel="stylesheet" type="text/css" media="all"/>
  <script src="/common/js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="/common/js/slick.min.js" type="text/javascript"></script>
  <script src="/common/js/common.js" type="text/javascript"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <div class="l-wrapper">
    <main class="l-cont">
