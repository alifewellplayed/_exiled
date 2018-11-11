<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package _Exiled
 */
 $_exiled_title = get_bloginfo( 'name', 'display' );
 $_exiled_author = get_option('site_author');
 $_exiled_description = get_bloginfo( 'description', 'display' );
?>

<svg id="logo">
  <g fill-rule="nonzero" fill="#00403c" stroke-width="1">
    <g id="SiteLogo">
      <polygon class="LogoShape" id="LogoShape-t" points="27.17 9.123 0.83 18.247 0.83 0"></polygon>
      <polygon class="LogoShape" id="LogoShape-b" points="0.83 22.877 27.17 13.753 27.17 32"></polygon>
    </g>
    <symbol id="s-text">
      <text text-anchor="left" x="50px" y="10px" dy=".35em"><?php echo $_exiled_title; ?></text>
    </symbol>
    <symbol id="a-text">
      <text text-anchor="left" x="50px" y="40px" dy=".35em">By <?php echo $_exiled_author; ?></text>
    </symbol>
  </g>
  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s-text" class="text"></use>
  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s-text" class="text"></use>
  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s-text" class="text"></use>
  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s-text" class="text"></use>
  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s-text" class="text"></use>
  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#a-text" class="text-sm"></use>
</svg>
