<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package _Exiled
 */
 function wpb_latest_sticky() {
   $sticky = get_option( 'sticky_posts' );
   rsort( $sticky );
   $sticky = array_slice( $sticky, 0, 4 );
   $the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
   if ( $the_query->have_posts() ) {
     $return .= '<ul>';
     while ( $the_query->have_posts() ) {
       $the_query->the_post();
       $return .= '<li><a href="' .get_permalink(). '" title="'  . get_the_title() . '">' . get_the_title() . '</a><br />' . get_the_excerpt(). '</li>';
     }
     $return .= '</ul>';
   } else {

   }
   wp_reset_postdata();
   return $return;
 }
 add_shortcode('latest_stickies', 'exiled_latest_sticky');
?>
