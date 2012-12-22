<?php
/**
 * Template for Gallery page
 * Template Name: Gallery page
 * @package WordPress
 *
 */

get_header();?>

<div id="content">
<header class="entry-header">
	<h1 class="entry-title"><?php the_title(); ?></h1>
</header><!-- .entry-header -->

<div class="entry-content">
	<?php the_content(); ?>
</div><!-- .entry-content -->

<?php
$media_query = new WP_Query(
    array(
        'post_type' => 'attachment',
        'post_status' => 'null',
        'posts_per_page' => -1,
		'post_parent' => 0,
		'post__not_in' => array(269, 344) // specify any images that you are not attached to a post, but that you don't want in the gallery
    )
);
$list = array();
foreach ($media_query->posts as $post) {
	$list[] = array('title' => $post->post_title, 'id' => ($post->ID.", "));
}

foreach($list as $image){
	$gallery .= $image['id'];
}
$gallery = substr($gallery, 0, -2);
echo do_shortcode('[gallery include="'.$gallery.'" orderby="title"]');
?>

</div> <!-- content -->

<?php
get_footer();

?>