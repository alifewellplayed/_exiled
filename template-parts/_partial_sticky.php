<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package _Exiled
 */
 function exiled_latest_sticky() {
   $sticky = get_option( 'sticky_posts' );
   rsort( $sticky );
   $sticky = array_slice( $sticky, 0, 4 );
   $the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
   if ( $the_query->have_posts() ) {
     echo '<ul class="list-unstyled replica-media-list layout-single-column">';
     while ( $the_query->have_posts() ) {
       $the_query->the_post();
       $title = get_the_title();
       $url_source = get_post_meta(get_the_ID(), 'source-url', true);
       if (!empty( $url_source)) { $url = $url_source; } else { $url = get_permalink(); }
       $absolute_url = get_permalink();
       $naturalTime = get_the_date();
       $humanTime = human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
       $excerpt = get_the_excerpt(); ?>
       <li class="media">
         <div class="media-body">
           <time datetime="<?php echo $naturalTime; ?>" class="sr-only"><?php echo $naturalTime; ?></time>
         </datetime>
         <h5 class="mt-0 mb-1">
           <a href="<?php echo $url; ?>"><span><?php echo $title; ?></span></a>
           <small class="datetime pl-2"><?php echo $humanTime; ?></small>
           <span class="linked-list-permalink pl-2 sr-only"><a href="<?php echo $absolute_url; ?>" rel="bookmark" class="glyph">&#8734;</a></span>
         </h5>
         <span class="linked-excerpt">
           <?php echo $excerpt; ?>
         </span>
       </div>
       </li>
     <?php }
     echo '</ul>';
   }
   wp_reset_postdata();
 }

 exiled_latest_sticky();
