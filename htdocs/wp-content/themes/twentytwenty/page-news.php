<?php
/*
Template Name: news
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
          <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $the_query = new WP_Query(array(
              'post_status' => 'publish',
              'paged' => $paged,
              'posts_per_page' => 10, // 表示件数
              'orderby'     => 'date',
              'order' => 'DESC'
            ));
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
          ?>
            <li id="<?php the_ID(); ?>">
              <header class="entry-header">
                <div class="date"><?php echo get_the_date('Y/m/d'); ?></div>
              </header>
              <h3 class="entry-ttl"><?php the_title(); ?></h3>
              <div class="entry-cont"><?php the_content(); ?></div>
            </li>
          <?php
              endwhile; // ループの終了
            endif;
          ?>
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
      <a href="/">TOPページに戻る</a></div>
      <div class="u-pager1">
        <?php
          if ($the_query->max_num_pages > 1) {
            echo paginate_links(array(
              'base' => get_pagenum_link(1) . '%_%',
              'format' => 'page/%#%/',
              'prev_text' => '',
              'next_text' => '',
              'before_page_number' => '<em class="no">',
              'after_page_number' => '</em>',
              'current' => max(1, $paged),
              'mid_size' => 1,
              'end_size' => 0,
              'total' => $the_query->max_num_pages
            ));
          }
          wp_reset_postdata(); // 直前のクエリを復元する
        ?>
      </div>
    </div>
  </section>
</article>




<?php
  get_footer();
