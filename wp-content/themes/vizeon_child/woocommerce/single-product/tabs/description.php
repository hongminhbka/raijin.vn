<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

?>
<script>
const readMoreBtn = document.querySelector(".read-more-btn");
const text = document.querySelector(".mtext");

readMoreBtn.addEventListener("click", (e) => {
  text.classList.toggle("show-more");
  if (readMoreBtn.innerText === "Read More") {
    readMoreBtn.innerText = "Read Less";
  } else {
    readMoreBtn.innerText = "Read More";
  }
});
</script>
<div class="mtext"><span class="dots"> ...</span> <span class="moreText">
<?php the_content(); ?>
</span></div>
<button class="read-more-btn">Read More</button>
