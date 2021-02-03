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

the_block_header('slider-block');

$images = get_field('images');
$title = get_field('title');
$description = get_field('description');
$duration = get_field('duration');

	if ($images) {

	echo "<div class='slider full-screen'>";

	for ($i=0; $i < count($images); $i++) { 
		echo "<div class='slide'>";
		echo "<img src='{$images[$i]['url']}' />";
		echo "<div class='slide-title'>";
		echo "<p class='name'>{$title}</p>";
		echo "<p class='description'>{$description}</p>";
		echo "</div>";
		echo "</div>";
	}

		
	echo "</div>";

};

?>

<script>


 var slider = document.querySelector('.slider');
 var slide = document.querySelectorAll('.slide');
	

 var sliderLength = slider.children.length;
 var currentSlide = 0;


  var sliderElementLeft = document.createElement('div');
  sliderElementLeft.setAttribute('class', 'left');
  sliderElementLeft.innerHTML = "<";
  var sliderElementRight = document.createElement('div');
  sliderElementRight.setAttribute('class', 'right');
  sliderElementRight.innerHTML = ">";

  
  slider.appendChild( sliderElementLeft );
  slider.appendChild( sliderElementRight );
  

  
slider.children[currentSlide].style.display = "block";

  
function nextSlide(x){
  let z = x;
  if(x >= sliderLength){
    z = 0;
  }
  
  if(x < 0){
    z = sliderLength - 1;
  }
  
  if(x != currentSlide){
  changeSlide(currentSlide, z);
  }
  
  clearTimeout(sliderChangeInterval);

  sliderChangeInterval = setTimeout(function(){
    let x = currentSlide + 1;
    nextSlide(x);
  }, <?php echo $duration; ?>);
  
}
  
function changeSlide(x, y) {
 
  slider.children[y].style.display = "block";
  slider.children[x].style.display = "none"; 

  
  currentSlide = y;
  
  
 }


  let sliderChangeInterval = setTimeout(function(){
    let x = currentSlide + 1;
    nextSlide(x);
  }, <?php echo $duration; ?>);
  
  document.querySelector('.left').onclick = function(){
    let x = currentSlide - 1;
    nextSlide(x);
  };

   document.querySelector('.right').onclick = function(){
    let x = currentSlide + 1;
    nextSlide(x);
  };
  


</script>


<?php
the_block_footer(); 
