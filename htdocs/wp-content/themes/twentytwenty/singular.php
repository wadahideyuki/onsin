<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
<h1 class="onsnTop"> <a href="/"><img src="/common/img/main/logo.svg" alt="穏心"></a></h1>
<article class="newslistZone">
  <section class="u-secTtl">
    <div class="u-inner">
      <h2 class="u-ttl1"><img src="/common/img/news_ttl.svg" alt="お知らせ"/>
      </h2>
    </div>
  </section>
  <section class="u-secCont">
    <div class="u-inner">
      <div class="u-whtBox1 is_course">
        <ul class="newslist">
		<li>
		<header class="entry-header">
                <div class="date"><?php echo get_the_date('Y/m/d'); ?></div>
              </header>
              <h3 class="entry-ttl"><?php the_title(); ?></h3>
              <div class="entry-cont"><?php the_content(); ?></div>
</li>
        </ul>
      </div>

      <div class="btnBack">
        <style> 
      .btnBack{
        text-align: center;
        padding: 20px 0;
      }
      .btnBack a{
        background: #000;
        color: #FFF;
        display: inline-block;
        padding: .5em 1em;
        font-size: 1.8rem;
        border-radius: 50px;

        text-align: center;
      }
      
      </style>
      <a href="/news/">ニュースの一覧へ</a></div>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
