<?php 
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'twentysixteen' ),
	'social'  => __( 'Social Links Menu', 'twentysixteen' ),
	) );

//Thay đổi class menu
function change_submenu_class($menu) {  
  $menu = preg_replace('/ class="menu"/','/ class="nav navbar-nav" /',$menu);  
  return $menu;  
}  
add_filter('wp_nav_menu','change_submenu_class');

// ham hien thi CPT thương hiệu


// ham hien thi CPT sản phẩm kính
function get_san_pham($args){
 $san_pham =''; 
 $loop = new WP_Query($args);
 if($loop->have_posts()){
  while ( $loop->have_posts() ) : $loop->the_post(); 
  ?>
  <div class="item">
    <a class="khung_anh" data-lightbox="image-1" href="<?php the_post_thumbnail_url(); ?>" data-title=
    "<div class='information col-md-12'>
    <h1><?php the_title();?></h1>
    <h6>Price: <?php $output = get_post_meta( get_the_ID(), 'price', true );
      $price = number_format( $output,0,",",".");
      setlocale(LC_MONETARY, 'vnd');
      echo $price; ?>p</h6>
      <p class='description_box'><?php the_excerpt(); ?></p>
      <button type='button' class='btn btn-warning'><a href='<?php the_permalink();?>'>подробнее</a></button>
    </div>">
    <!-- img -->
    <?php the_post_thumbnail() ;?>

    <a href="<?php the_permalink();?>" class="col-md-8 col-md-offset-2 col-xs-12 name_glasses"><?php the_title();?></a>
    <!-- gia -->
    <p class="col-md-8 col-md-offset-2 price_glasses"><?php $output = get_post_meta( get_the_ID(), 'price', true );
      $price = number_format( $output,0,",",".");
      setlocale(LC_MONETARY, 'vnd');
      echo $price; ?>p</p>
    </a>
  </div>
  <?php
  endwhile;
  return $san_pham;
} else{
  return "<p style='text-align: center; font-size: 14px; padding-top: 15px;'>Không có dữ liệu hiển thị...</p>";
}
}

// trinh soan thao
add_action( 'add_meta_boxes', array ( 'T5_Richtext_Excerpt', 'switch_boxes' ) );

/**
 * Replaces the default excerpt editor with TinyMCE.
 */
class T5_Richtext_Excerpt
{
    /**
     * Replaces the meta boxes.
     *
     * @return void
     */
    public static function switch_boxes()
    {
      if ( ! post_type_supports( $GLOBALS['post']->post_type, 'excerpt' ) )
      {
        return;
      }

      remove_meta_box(
            'postexcerpt' // ID
        ,   ''            // Screen, empty to support all post types
        ,   'normal'      // Context
        );

      add_meta_box(
            'postexcerpt2'     // Reusing just 'postexcerpt' doesn't work.
        ,   __( 'Excerpt' )    // Title
        ,   array ( __CLASS__, 'show' ) // Display function
        ,   null              // Screen, we use all screens with meta boxes.
        ,   'normal'          // Context
        ,   'core'            // Priority
        );
    }

    /**
     * Output for the meta box.
     *
     * @param  object $post
     * @return void
     */
    public static function show( $post )
    {
      ?>
      <label class="screen-reader-text" for="excerpt"><?php
        _e( 'Excerpt' )
        ?></label>
        <?php
        // We use the default name, 'excerpt', so we don’t have to care about
        // saving, other filters etc.
        wp_editor(
          self::unescape( $post->post_excerpt ),
          'excerpt',
          array (
            'textarea_rows' => 100
            ,   'media_buttons' => TRUE
            ,   'teeny'         => TRUE
            ,   'tinymce'       => TRUE
            )
          );
      }

    /**
     * The excerpt is escaped usually. This breaks the HTML editor.
     *
     * @param  string $str
     * @return string
     */
    public static function unescape( $str )
    {
      return str_replace(
        array ( '&lt;', '&gt;', '&quot;', '&amp;', '&nbsp;', '&amp;nbsp;' )
        ,   array ( '<',    '>',    '"',      '&',     ' ', ' ' )
        ,   $str
        );
    }
  }
// end trinh soan thao