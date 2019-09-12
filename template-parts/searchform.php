<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _Exiled
 */

 ?>

 <form action="/" method="get">
    <label id="sr-only" for="search">Search in <?php echo home_url( '/' ); ?></label>
    <input type="search" class="search-field" placeholder="Search" value="<?php the_search_query(); ?>" name="s">
    <input type="submit" class="search-submit sr-only" value="Search">
</form>