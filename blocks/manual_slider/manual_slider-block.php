<?php

/**
 * ACF Block
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 *
 * @package Nax_Custom
 *
 */

require_once get_template_directory() . '/blocks/blocks-functions.php';

the_block_header('manual_slider-block');

$images = get_field('gallery');


	if ($images) {

	echo "<div id='body'>";
	echo "<div class='home-product-new-hldr'>";
	echo "<div class='slider-btn-hldr slider-btn-hldr-left'>";
	echo "<button id='left-btn' class='slider-btn' style='display: none;'>";
	echo "<svg viewBox='0 0 256 256'>";
	echo "<polyline fill='none' stroke='black' stroke-width='16' points='184,16 72,128 184,240'>";
	echo "</polyline>";
	echo "</svg>";
	echo "</button>";
	echo "</div>";
	echo "<div class='home-product-new'>";
	echo "<div class='home-grid products-grid products-grid--max-4' style='left: 0px;'>";

	echo "<div id='body'>";

	for ($i=0; $i < count($images); $i++) { 
		echo "<div class='item-container'>";
		echo "<div class='item'>";
		echo "<img src='{$images[$i]['url']}' />";
		echo "</div>";
		echo "</div>";
	}

	echo "</div>";
	echo "</div>";

	echo "<div class='slider-btn-hldr slider-btn-hldr-right'>";
	echo "<button id='right-btn' class='slider-btn' style='display: block;'>";
	echo "<svg viewBox='0 0 256 256'>";
	echo "<polyline fill='none' stroke='black' stroke-width='16' points='72,16 184,128 72,240'>";
	echo "</polyline>";
	echo "</svg>";
	echo "</button>";
	echo "</div>";



	
	echo "</div>";
	echo "</div>";

};

?>

<script>
	
(function(){
  
  var listEl = document.querySelector('.home-grid.products-grid.products-grid--max-4');
  var btnLeftEl = document.querySelector('#left-btn');
  var btnRightEl = document.querySelector('#right-btn');
  var count = 0;

  function slideImages(dir){
    var totalChildren = listEl.querySelectorAll(".item").length;
    dir === "left" ? ++count : --count;
    listEl.style.left = count * 286 + 'px';
    btnLeftEl.style.display = count < 0 ? "block" : "none";
    // Here, 4 is the number displayed at any given time
    btnRightEl.style.display = count > 4-totalChildren ? "block" : "none";
  }

  btnLeftEl.addEventListener("click", function(e) {
      slideImages("left");
  });
  btnRightEl.addEventListener("click", function(e) {
      slideImages("right");
  });

  
})();


</script>



<?php
the_block_footer(); 
