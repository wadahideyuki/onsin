<?php
/*
Template Name: news
*/

get_header();
?>

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
            <li>
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
