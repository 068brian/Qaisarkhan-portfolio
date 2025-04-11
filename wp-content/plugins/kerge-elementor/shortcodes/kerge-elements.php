<?php
namespace Kerge;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Elements
{
    public function __construct()
    {
        $this->add_actions();
    }
    
    
	// Add Actions
    private function add_actions()
    {
        // Add New Elementor Categories
        add_action( 'elementor/init', array( $this, 'add_elementor_category' ), 999 );
        // Register Widget Scripts
        add_action( 'elementor/frontend/after_enqueue_scripts', array( $this, 'register_widget_scripts' ) );
        // Register Widget Styles
        add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'register_widget_styles' ), 1 );
        // Register New Widgets
        add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ), 10 );
		
    }
	
    // Add New Categories to Elementor
    public function add_elementor_category()
    {
        \Elementor\Plugin::instance()->elements_manager->add_category( 'kerge-elements', array(
            'title' => __( 'Kerge Elements', 'kerge-widgets' ),
        ), 1 );
    }

    // Register Widget Styles
    public function register_widget_styles()
    {
		wp_enqueue_style( 'kerge_widget_styles', plugins_url( 'assets/css/style.css', __FILE__ ), array(), '1.0.0');
    }

    // Register Widget Scripts
    public function register_widget_scripts()
    {
		wp_enqueue_script( 'kerge_scripts', plugins_url( 'assets/js/scripts.js', __FILE__ ), array( 'jquery' ), true, 1, 'all' );
        $theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') : 'light';
        if ($theme_style == 'dark') {
            wp_enqueue_style( 'kerge_elementor_styles_dark', plugins_url( 'assets/css/dark-styles.css', __FILE__ ), array(), '1.0.0');
        }
        if ( is_rtl() ) {
            wp_enqueue_style('kerge-elementor-rtl-styles', plugins_url( 'assets/css/rtl.css', __FILE__ ), array(), '1.0.0');
        }
    }
    
	
    // Register New Widgets
    public function register_widgets()
    {
        $this->include_widgets();
		$this->include_widget_outputs();
    }
    
	
    // Include Widgets
    private function include_widgets()
    {
		foreach(glob(plugin_dir_path( __FILE__ ) . '/widgets/*.php' ) as $file ){
			$this->include_widget( $file );
		}
		
    }
	
	
	// Include and Load Widget
    private function include_widget($file)
    {
		
		$base  = basename( str_replace( '.php', '', $file ) );
		$class = ucwords( str_replace( '-', ' ', $base ) );
		$class = str_replace( ' ', '_', $class );
		$class = sprintf( 'Kerge\Widgets\%s', $class );
		
		require_once $file; // include widget php file
		
		if ( class_exists( $class ) ) {
			\Elementor\Plugin::instance()->widgets_manager->register( new $class ); // load widget class
		}
		
    }
	
	
	// Call to Widget Outputs
	private function include_widget_outputs()
    {
		foreach(glob(plugin_dir_path( __FILE__ ) . '/widgets/output/*.php' ) as $file ){
			require_once $file;
		}
    }
}

