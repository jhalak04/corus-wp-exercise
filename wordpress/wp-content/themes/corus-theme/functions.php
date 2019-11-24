<?php
/**
 * Post Type: Gallery.
 */

class ImageGallery {
    
    /**
     * __construct
     *
     * @return void
     */
    function __construct() {
        add_action( 'init', array( $this, 'image_gallery' ) );
    }

    /**
     * image_gallery
     * Create Custom Post Type Gallery
     * @return void
     */
    function image_gallery() {
        register_post_type( 'gallery',
        // CPT Options
        [
            'labels' => [
                'name' => __('Gallery'),
                'singular_name' => __('Gallery')
            ],
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'gallery'),
            'query_var' => true,
            'supports' => [ "title", "editor", "thumbnail" ],
            'capability_type' => "post",
        ]);
    }

    /**
     * gallery_post_type_items
     * Show Gallery post type item for slider
     * @return void
     */
    function gallery_post_type_items() {
        $sliderHTML = '';
        while ( have_posts() ) : the_post();
            $fields = get_fields();
            $i = 1;
            foreach($fields as $key => $value) {
                $sliderHTML .= '<div id="slider-'.$i.'" class="custom-slider">';
                    $sliderHTML .= '<img src="'.$value.'" class="sliderImage"/>';
                $sliderHTML .= '</div>';
                $i++;
            }
        endwhile;
		return $sliderHTML;
    }

    /**
     * header_menu
     *
     * @return void
     */
    function header_menu() {
        global $post;
        $headerHTML = '';
        $query = new WP_Query(array(
            'post_type' => 'gallery',
            'post_status' => 'publish',
            'order' => 'ASC'
        ));
        $post_slug = $post->post_name;
        while ($query->have_posts()) {
            $query->the_post();
            $posts = get_post(); 
               
            $classActive = ($post_slug == $posts->post_name) ? "active" : "";
            $postURL =  apply_filters( 'the_guid', $posts->guid ); 
            $postTitle =  apply_filters( 'the_title', $posts->post_title ); 
            
            $headerHTML .= '<a href="'.$postURL.'" class="'.$classActive.'">'.$postTitle.'</a>'; 
        }
        
        wp_reset_query();
        return $headerHTML;
    }
}

$imageGallery = new ImageGallery();
?>