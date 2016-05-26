<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.deb.im
 * @since      1.0.0
 *
 * @package    Common_Content
 * @subpackage Common_Content/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Common_Content
 * @subpackage Common_Content/admin
 * @author     Debabrata Karfa <wpsupport@deb.im>
 */
class Common_Content_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Common_Content_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Common_Content_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/common-content-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Common_Content_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Common_Content_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/common-content-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function commoncontent_panel_dashboard() {
		$titan = TitanFramework::getInstance( 'commoncontent-panel' );

		$adminPanel = $titan->createAdminPanel( array(
		    'name' => 'Common Content Panel',
		    'position' => '10',
		    'icon' => 'dashicons-editor-spellcheck',
		) );
		
		$ccpanel_main = $adminPanel->createTab( array(
		    'name' => 'Settings',
		) );

		$ccpanel_main->createOption( array(
		    'name' => 'Common Content Display Dashboard',
		    'type' => 'heading',
		) );

		$ccpanel_main->createOption( array(
		    'name' => 'Display on Top/Before Content?',
		    'id' => 'is_display_top',
		    'type' => 'enable',
		    'default' => false,
		    'desc' => 'Enable or disable, to display the Content at Top/Before Content?',
		) );

		$ccpanel_main->createOption( array(
		    'name' => 'Display on Bottom/After Content?',
		    'id' => 'is_display_bottom',
		    'type' => 'enable',
		    'default' => true,
		    'desc' => 'Enable or disable, to display the Content at After/Bottom Content',
		) );

		$ccpanel_main->createOption( array(
		    'name' => 'Display on Pages too?',
		    'id' => 'is_display_on_pages',
		    'type' => 'enable',
		    'default' => false,
		    'desc' => 'Enable or disable for Pages',
		) );

		$ccpanel_main->createOption( array(
		    'name' => 'My Editor Option',
		    'id' => 'my_editor_option',
		    'type' => 'editor',
		    'desc' => 'Put your footer content here',
		    'editor_settings' => array(
		        'tinymce' => array(
		            'content_css' => 'path/to/editor-styles.css',
		        ),
		    ),
		) );

		$ccpanel_main->createOption( array(
		    'name' => 'Content Font',
		    'id' => 'ccpanel_display_font_style',
		    'type' => 'font',
		    'desc' => 'Select Font Style',
		    'show_font_weight' => false,
		    'show_font_style' => true,
		    'show_line_height' => false,
		    'show_letter_spacing' => false,
		    'show_text_transform' => true,
		    'show_font_variant' => false,
		    'show_text_shadow' => false,
		    'default' => array(
		        'font-family' => 'Exo 2',
		        'color' => '#888888',
		        'line-height' => '1em',
		        'font-weight' => '400',
		    )
		) );

		$ccpanel_main->createOption( array(
		    'type' => 'save'
		) );

		$ccpanel_help = $adminPanel->createTab( array(
		    'name' => 'Help',
		) );

		$ccpanel_help->createOption( array(
		    'name' => 'Help and Support',
		    'type' => 'heading',
		) );

		$ccpanel_help->createOption( array(
		    'type' => 'note',
		    'desc' => '<h3>If you have any issue, Submit your issue at <a href="https://github.com/debabratakarfa/universalcontent/issues" target="_blank">here</a></h3>'
		) );

		$ccpanel_help->createOption( array(
		    'name' => 'Donate Link',
		    'type' => 'heading',
		) );

		$ccpanel_help->createOption( array(
		    'type' => 'note',
		    'desc' => '<h3>Want to donate, help me. <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8TBNF87WBE4HW" target="_blank">Donate Link</a></h3>'
		) );



	}

}
