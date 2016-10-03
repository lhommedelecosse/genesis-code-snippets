<?php  // <~ do not copy the opening php tag

/**
 * Changing the AuthorBox in WordPress
 * 
 * @package   Changing the AuthorBox in WordPress
 * @author    Neil Gee
 * @link      http://wpbeaches.com/author-box-genesis/
 * @copyright (c) 2014, Neil Gee
 */
//Change Default Method Contacts in User Profile
function themeprefix_modify_user_contact_methods( $user_contact ){
  /* Add user contact methods */
  $user_contact['pinterest'] = __( 'Pinterest URL' );
  /* $user_contact['linkedin'] = __( 'LinkedIn URL' );   */
  /* Remove user contact methods */
  /*   unset($user_contact['aim']); */
  /*   unset($user_contact['jabber']); */
  /*   unset($user_contact['yim']); */
  return $user_contact;
}
add_filter( 'user_contactmethods', 'themeprefix_modify_user_contact_methods' );
//Load Fontawesome
function themeprefix_fontawesome_styles() {
	wp_register_style( 'fontawesome' , '//netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css', '' , '4.4.0', 'all' );
	wp_enqueue_style( 'fontawesome' );
}
add_action( 'wp_enqueue_scripts', 'themeprefix_fontawesome_styles' ); 
//Create New Author Box
function themeprefix_alt_author_box() {
    if( is_single( '' ) ) {
//author box code goes here
			?>
	   		<div class="author-box"><?php echo get_avatar( get_the_author_meta( 'ID' ), '70' ); ?> 
                <div class="about-author"><h4>About <?php echo get_the_author(); ?></h4><p><?php echo get_the_author_meta( 'description' ); ?> 
            </div>
            <div class="all-posts"><a href="<?php echo get_author_posts_url(  get_the_author_meta( 'ID' )); ?>">View all posts by <?php echo  get_the_author(); ?></a></div>

                <ul class="social-links">
	                
                <?php if ( get_the_author_meta( 'facebook' ) != '' ): ?>
                    <li><a href="<?php echo get_the_author_meta( 'facebook' ); ?>"><i class="fa fa-facebook"></i></a></li>
                <?php endif; ?>
                
                <?php if ( get_the_author_meta( 'twitter' ) != '' ): ?>
                    <li><a href="https://twitter.com/<?php echo get_the_author_meta( 'twitter' ); ?>"><i class="fa fa-twitter"></i></a></li>
                <?php endif; ?>
                
                <?php if ( get_the_author_meta( 'googleplus' ) != '' ): ?>
                    <li><a href="<?php echo get_the_author_meta( 'googleplus' ); ?>"><i class="fa fa-google-plus"></i></a></li>
                <?php endif; ?>
                
                <?php if ( get_the_author_meta( 'pinterest' ) != '' ): ?>
                    <li><a href="<?php echo get_the_author_meta( 'pinterest' ); ?>"><i class="fa fa-pinterest"></i></a></li>
                <?php endif; ?>
                
                <?php if ( get_the_author_meta( 'user_email' ) != '' ): ?>
                    <li><a href="mailto:<?php echo get_the_author_meta( 'user_email' ); ?>"><i class="fa fa-envelope-o"></i></a></li>
                <?php endif; ?>
                            
                </ul>
         </div>
    <?php 
    }
}
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );
add_action( 'genesis_entry_footer', 'themeprefix_alt_author_box', 10 );
