<?php
/********************************************
*  Add Custom RSS Dashboard Widget
********************************************/
  function gemini_rss_dashboard_widget() {
    if ( function_exists( 'fetch_feed' ) ) {
      $feed = fetch_feed( 'https://geminiams.com/feed/' );
      if (is_wp_error($feed)) {
        $limit = 0;
        $items = 0;
      } else {
        $limit = $feed->get_item_quantity(5);
        $items = $feed->get_items(0, $limit);
      }
    }
    if ($limit == 0) 
      echo '<div>The RSS Feed is either empty or unavailable.</div>'; 
    
    else foreach ($items as $item) { 
    $date = $item->get_date('F j, Y');
    $content = $item->get_content();
    $content = wp_html_excerpt($content, 120) . ' ...';
    ?>
    
    <div class="rss-dashboard" style="border-bottom:2px solid #19325A; padding:.25rem 0 1rem;">
      <h3 style="margin: .5rem 0; font-weight:bold;">
        <a style="color: #19325A;" href="<?php echo $item->get_permalink(); ?>" title="<?php echo mysql2date( __( 'j F Y @ g:i a', 'gemini' ), $item->get_date( 'Y-m-d H:i:s' ) ); ?>" target="_blank">
          <?php echo $item->get_title(); ?>
        </a>
      </h3>
      <h5 style="margin: 0.5em 0;">
        <?php echo $date; ?>
      </h5>
      <p style="margin: 0.5em 0;">
        <?php echo $content; ?>
      </p>
      <a style="text-transform:uppercase; text-decoration:none; font-weight:bold; font-size:12px;" href="<?php echo $item->get_permalink(); ?>"target="_blank">
        Read More
      </a>
    </div>

  <?php } ?>
  <a style="text-align:center; margin:1.5rem 0 1rem; display:block; text-transform:uppercase; text-decoration:none; font-weight:bold;" href="https://geminiams.com/insights/" target="_blank">Read The Gemini Blog</a>
  <?php }
  function gemini_theme_info_dashboard_widget() {
  echo "
    <div style='display:flex;'>
      <img style='width:25%' src=" . get_template_directory_uri() . "/lib/gemini/g-black.png />
      <ul>
        <li><strong>Managed By:</strong> Gemini Advanced Marketing</li>
        <li><strong>Website:</strong> <a style='color: #19325A; font-weight:bold;' href='https://geminiams.com/'>geminiams.com</a></li>
        <li><strong>Contact:</strong> Lindsey Ziegahn - <a style='color: #19325A; font-weight:bold;' href='mailto:lziegahn@geminiams.com'>lziegahn@geminiams.com </a></li>
      </ul>
    </div>
  ";
  }
  // calling all custom dashboard widgets
  function gemini_custom_dashboard_widgets() {
    wp_add_dashboard_widget( 'gemini_rss_dashboard_widget', __( 'Gemini Marketing News', 'gemini' ), 'gemini_rss_dashboard_widget' );
    wp_add_dashboard_widget( 'gemini_theme_info_dashboard_widget', __( 'Gemini Contact Info', 'gemini' ), 'gemini_theme_info_dashboard_widget' );
    /*
    Be sure to drop any other created Dashboard Widgets
    in this function and they will all load.
    */
  }
  add_action( 'wp_dashboard_setup', 'gemini_custom_dashboard_widgets' );
/********************************************
*  End Custom RSS Dashboard Widget
********************************************/


/***********************************************
*  Disable Default Wordpress Dashboard Widgets
***********************************************/
function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);    // Right Now Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // Activity Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Comments Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  // Incoming Links Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         // Plugins Widget

	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);    // Quick Press Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     // Recent Drafts Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           //
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);         //

	// remove plugin dashboard boxes
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);           // Yoast's SEO Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);        // Gravity Forms Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);   // bbPress Plugin Widget
}

// removing the dashboard widgets
add_action( 'wp_dashboard_setup', 'disable_default_dashboard_widgets' );
/**************************************************
*  End Disable Default Wordpress Dashboard Widgets
**************************************************/


/**************************************
*  Change Default Wordpress Logo Links
**************************************/
  // changing the logo link from wordpress.org to your site
  function gemini_login_url() {  return home_url(); }
  add_filter( 'login_headerurl', 'gemini_login_url' );
  // changing the alt text on the logo to show your site name
  function gemini_login_title() { return get_option( 'blogname' ); }
  add_filter( 'login_headertitle', 'gemini_login_title' );
/******************************************
*  End Change Default Wordpress Logo Links
******************************************/

/**************************************
*  Custom Admin Footer
**************************************/
  function gemini_admin_footer() {
    _e( '<span id="footer-thankyou">Manged by <a href="https://geminiams.com/" target="_blank">Gemini Advanced Marketing</a></span>.', 'gemini' );
  }
  add_filter( 'admin_footer_text', 'gemini_admin_footer' );
/**************************************
*  End Custom Admin Footer
**************************************/

/**************************************
*  Custom Login CSS
**************************************/

  function gemini_login_css() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/dist/css/custom-login.css', false );
  }
  add_action( 'login_enqueue_scripts', 'gemini_login_css', 10 );
/**************************************
*  End Custom Login CSS
**************************************/

/**************************************
*  Change Admin Howdy to Welcome
**************************************/
  function change_howdy($translated, $text, $domain) {
    if (!is_admin() || 'default' != $domain)
        return $translated;
    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Welcome', $translated);
    return $translated;
  }
  add_filter('gettext', 'change_howdy', 10, 3);
/**************************************
*  End Change Admin Howdy to Welcome
**************************************/


/**************************************
*  Change Admin Admin Logo
**************************************/
function gemini_admin_css() { 
	echo '
		<style type="text/css">
			#wp-admin-bar-wp-logo>.ab-item .ab-icon:before {
   				 display: none !important;
   			}
   			.ab-top-menu>li:hover>.ab-item, .ab-top-menu>li>.ab-item:focus {
   				background:transparent !important;
   			}
   			#wp-admin-bar-wp-logo {
   				background-image: url(' . get_template_directory_uri() . '/lib/gemini/g-white.png) !important;
   				background-size: contain !important;
    			background-repeat: no-repeat !important;
    			background-position: center !important;
    			background-color: transparent !important;
    			margin: 0px !important;
    			width: 50px !important;
			}
		</style>
	'; 
} 
add_action('admin_head','gemini_admin_css');
add_action('wp_head','gemini_admin_css');
/**************************************
*  End Change Admin Admin Logo
**************************************/


/**************************************
*  Remove Default Menu Links
**************************************/
function gemini_remove_logo_menu_items($wp_admin_bar)
{
    $wp_admin_bar->remove_menu("about");
    $wp_admin_bar->remove_menu("wporg");
    $wp_admin_bar->remove_menu("documentation");
    $wp_admin_bar->remove_menu("support-forums");
    $wp_admin_bar->remove_menu("feedback");
}
add_action("admin_bar_menu", "gemini_remove_logo_menu_items", 999);
/**************************************
*  End Remove Default Menu Links
**************************************/

/**************************************
*  Add Custom Admin Menu Item
**************************************/
function gemini_add_custom_menu_items() {
	global $wp_admin_bar;
	$args = array(
		'id'     => 'about-wgemini',
		'parent' => 'wp-logo',
		'title'  => __( 'About', 'text_domain' ),
		'href'	 => 'https://geminiams.com/about-us/',
		'meta'   => array(
			'html'     => '',
			'class'    => '',
			'target'   => '_blank',
			'onclick'  => 'asdf',
			'title'    => '',
			'tabindex' => '',
		),
	);
	$wp_admin_bar->add_menu( $args );
}
add_action( 'wp_before_admin_bar_render', 'gemini_add_custom_menu_items', 999 );
/**************************************
*  End Add Custom Admin Menu Item
**************************************/

?>