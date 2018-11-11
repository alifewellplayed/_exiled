<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _Exiled
 */
 $the_date = the_date( '', '<span class="datetime d-block mb-3 layout-single-column">', '</span>', false );
 $format = get_post_format( get_the_ID() );
 //echo $format;
?>

<?php echo $the_date; ?>
<?php if ($format == 'link') {
  include get_template_directory() . '/template-parts/_post/_link.php';
} elseif ($format == 'aside') {
  include get_template_directory() . '/template-parts/_post/_aside.php';
} elseif ($format == 'status') {
  include get_template_directory() . '/template-parts/_post/_status.php';
} else {
 include get_template_directory() . '/template-parts/_post/_default.php';
 }
?>
