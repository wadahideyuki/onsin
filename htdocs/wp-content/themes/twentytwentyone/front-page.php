<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

<article class="mainZone">
  <div class="box is_logo">
    <h1><img src="/common/img/main/logo.svg" alt="穏心 on-shin 和朴想"/>
    </h1>
  </div>
  <div class="box is_catch">
    <h2><img src="/common/img/main/catch.svg" alt="穏心 穏やかな心で 和 和を大切に 朴 飾らず自然に 想 想いを込めて淡々と"/>
    </h2>
  </div>
</article>

<?php
  $args = array(
    'posts_per_page' => 1 // 表示件数の指定
  );
  $posts = get_posts($args);
  if ($posts) :
?>
  <article class="newsZone">
    <dl>
      <dt>お知らせ</dt>
      <dd>
        <?php
          foreach ($posts as $post): // ループの開始
          setup_postdata($post); // 記事データの取得
        ?>
          <a href="/news/">
            <span class="date"><?php echo get_the_date('Y/m/d'); ?></span>
            <?php the_title(); ?>
          </a>
        <?php
          endforeach; // ループの終了
          wp_reset_postdata(); // 直前のクエリを復元する
        ?>
      </dd>
    </dl>
  </article>
<?php endif; ?>



<?php
  the_content();


get_footer();
