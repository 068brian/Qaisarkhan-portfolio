<?php

// Exit if accessed directly. 
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'Kerge_Core' ) ) 
{
	
	class Kerge_Core {
		// Vars
		private static $instance = null;
		public $version = '1.0.0.0';
		private $plugin_path = null;
		
		public function __construct() 
		{
			
			$this->includes();
			$this->init_hooks();
		}
		
		
		// Includes
		public function includes() 
		{

			require_once( __DIR__ . '/kerge-elements.php' );
		}
		
		
		// Hook into actions and filters.
		private function init_hooks() 
		{

			add_action( 'plugins_loaded', [ $this, 'init' ] );
			
			add_action( 'wp_ajax_nopriv_fn_action_post_terms', 'fn_post_terms' );
			add_action( 'wp_ajax_fn_action_post_terms', 'fn_post_terms' );

		}
		
		
		// Check if elementor exists
		public function init() 
		{
			new \Kerge\Kerge_Elements();
		}

		public function admin_notice_missing_main_plugin() 
		{
			$message = sprintf(
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'kerge-widgets' ),
				'<strong>' . esc_html__( 'Kerge', 'kerge-widgets' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'kerge-widgets' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

		}
		
		public static function get_instance() 
		{
			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
	}
}


if ( ! function_exists( 'kerge_load' ) ) 
{
	function kerge_load() 
	{
		return kerge_Core::get_instance();
	}
	
	kerge_load();
}

function lmpixels_add_linearicons_tab( $tabs = array() ) {

    // Append new icons
    $linearicons = array(
        'home',
        'apartment',
        'pencil',
        'magic-wand',
        'drop',
        'lighter',
        'poop',
        'sun',
        'moon',
        'cloud',
        'cloud-upload',
        'cloud-download',
        'cloud-sync',
        'cloud-check',
        'database',
        'lock',
        'cog',
        'trash',
        'dice',
        'heart',
        'star',
        'star-half',
        'star-empty',
        'flag',
        'envelope',
        'paperclip',
        'inbox',
        'eye',
        'printer',
        'file-empty',
        'file-add',
        'enter',
        'exit',
        'graduation-hat',
        'license',
        'music-note',
        'film-play',
        'camera-video',
        'camera',
        'picture',
        'book',
        'bookmark',
        'user',
        'users',
        'shirt',
        'store',
        'cart',
        'tag',
        'phone-handset',
        'phone',
        'pushpin',
        'map-marker',
        'map',
        'location',
        'calendar-full',
        'keyboard',
        'spell-check',
        'screen',
        'smartphone',
        'tablet',
        'laptop',
        'laptop-phone',
        'power-switch',
        'bubble',
        'heart-pulse',
        'construction',
        'pie-chart',
        'chart-bars',
        'gift',
        'diamond',
        'linearicons',
        'dinner',
        'coffee-cup',
        'leaf',
        'paw',
        'rocket',
        'briefcase',
        'bus',
        'car',
        'train',
        'bicycle',
        'wheelchair',
        'select',
        'earth',
        'smile',
        'sad',
        'neutral',
        'mustache',
        'alarm',
        'bullhorn',
        'volume-high',
        'volume-medium',
        'volume-low',
        'volume',
        'mic',
        'hourglass',
        'undo',
        'redo',
        'sync',
        'history',
        'clock',
        'download',
        'upload',
        'enter-down',
        'exit-up',
        'bug',
        'code',
        'link',
        'unlink',
        'thumbs-up',
        'thumbs-down',
        'magnifier',
        'cross',
        'menu',
        'list',
        'chevron-up',
        'chevron-down',
        'chevron-left',
        'chevron-right',
        'arrow-up',
        'arrow-down',
        'arrow-left',
        'arrow-right',
        'move',
        'warning',
        'question-circle',
        'menu-circle',
        'checkmark-circle',
        'cross-circle',
        'plus-circle',
        'circle-minus',
        'arrow-up-circle',
        'arrow-down-circle',
        'arrow-left-circle',
        'arrow-right-circle',
        'chevron-up-circle',
        'chevron-down-circle',
        'chevron-left-circle',
        'chevron-right-circle',
        'crop',
        'frame-expand',
        'frame-contract',
        'layers',
        'funnel',
        'text-format',
        'text-format-remove',
        'text-size',
        'bold',
        'italic',
        'underline',
        'strikethrough',
        'highlight',
        'text-align-left',
        'text-align-center',
        'text-align-right',
        'text-align-justify',
        'line-spacing',
        'indent-increase',
        'indent-decrease',
        'pilcrow',
        'direction-ltr',
        'direction-rtl',
        'page-break',
        'sort-alpha-asc',
        'sort-amount-asc',
        'hand',
        'pointer-up',
        'pointer-right',
        'pointer-down',
        'pointer-left',
    );
    
    $tabs['linearicons'] = array(
        'name'          => 'linearicons',
        'label'         => esc_html__( 'Linearicons Free', 'breezycv' ),
        'labelIcon'     => 'lnr lnr-star',
        'prefix'        => 'lnr-',
        'displayPrefix' => 'lnr',
        'url'           => plugins_url( 'assets/css/linearicons/style.css', __FILE__ ),
        'icons'         => $linearicons,
        'ver'           => '1.0.0',
    );

    return $tabs;
}

add_filter( 'elementor/icons_manager/additional_tabs', 'lmpixels_add_linearicons_tab' );

function lmpixels_add_sevenstroke_tab( $tabs = array() ) {

    // Append new icons
    $sevenstroke = array(
        'album',
        'arc',
        'back-2',
        'bandaid',
        'car',
        'diamond',
        'door-lock',
        'eyedropper',
        'female',
        'gym',
        'hammer',
        'headphones',
        'helm',
        'hourglass',
        'leaf',
        'magic-wand',
        'male',
        'map-2',
        'next-2',
        'paint-bucket',
        'pendrive',
        'photo',
        'piggy',
        'plugin',
        'refresh-2',
        'rocket',
        'settings',
        'shield',
        'smile',
        'usb',
        'vector',
        'wine',
        'cloud-upload',
        'cash',
        'close',
        'bluetooth',
        'cloud-download',
        'way',
        'close-circle',
        'id',
        'angle-up',
        'wristwatch',
        'angle-up-circle',
        'world',
        'angle-right',
        'volume',
        'angle-right-circle',
        'users',
        'angle-left',
        'user-female',
        'angle-left-circle',
        'up-arrow',
        'angle-down',
        'switch',
        'angle-down-circle',
        'scissors',
        'wallet',
        'safe',
        'volume2',
        'volume1',
        'voicemail',
        'video',
        'user',
        'upload',
        'unlock',
        'umbrella',
        'trash',
        'tools',
        'timer',
        'ticket',
        'target',
        'sun',
        'study',
        'stopwatch',
        'star',
        'speaker-signal',
        'shuffle',
        'shopbag',
        'share',
        'server',
        'search',
        'film',
        'science',
        'disk',
        'ribbon',
        'repeat',
        'refresh',
        'add-user',
        'refresh-cloud',
        'paperclip',
        'radio',
        'note2',
        'print',
        'network',
        'prev',
        'mute',
        'power',
        'medal',
        'portfolio',
        'like2',
        'plus',
        'left-arrow',
        'play',
        'key',
        'plane',
        'joy',
        'photo-gallery',
        'pin',
        'phone',
        'plug',
        'pen',
        'right-arrow',
        'paper-plane',
        'delete-user',
        'paint',
        'bottom-arrow',
        'notebook',
        'note',
        'next',
        'news-paper',
        'musiclist',
        'music',
        'mouse',
        'more',
        'moon',
        'monitor',
        'micro',
        'menu',
        'map',
        'map-marker',
        'mail',
        'mail-open',
        'mail-open-file',
        'magnet',
        'loop',
        'look',
        'lock',
        'lintern',
        'link',
        'like',
        'light',
        'less',
        'keypad',
        'junk',
        'info',
        'home',
        'help2',
        'help1',
        'graph3',
        'graph2',
        'graph1',
        'graph',
        'global',
        'gleam',
        'glasses',
        'gift',
        'folder',
        'flag',
        'filter',
        'file',
        'expand1',
        'exapnd2',
        'edit',
        'drop',
        'drawer',
        'download',
        'display2',
        'display1',
        'diskette',
        'date',
        'cup',
        'culture',
        'crop',
        'credit',
        'copy-file',
        'config',
        'compass',
        'comment',
        'coffee',
        'cloud',
        'clock',
        'check',
        'chat',
        'cart',
        'camera',
        'call',
        'calculator',
        'browser',
        'box2',
        'box1',
        'bookmarks',
        'bicycle',
        'bell',
        'battery',
        'ball',
        'back',
        'attention',
        'anchor',
        'albums',
        'alarm',
        'airplay',
    );
    
    $tabs['sevenstroke'] = array(
        'name'          => 'sevenstroke',
        'label'         => esc_html__( 'Pe Icon 7 Stroke', 'breezycv' ),
        'labelIcon'     => 'pe-7s-star',
        'prefix'        => 'pe-7s-',
        'displayPrefix' => 'pe-7s',
        'url'           => plugins_url( 'assets/css/pe-icon-7-stroke/css/pe-icon-7-stroke.css', __FILE__ ),
        'icons'         => $sevenstroke,
        'ver'           => '1.0.0',
    );

    return $tabs;
}

add_filter( 'elementor/icons_manager/additional_tabs', 'lmpixels_add_sevenstroke_tab' );