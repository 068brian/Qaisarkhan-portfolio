<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Block_Title extends Widget_Base {

	public function get_name() {
		return 'kerge-block-title';
	}

	public function get_title() {
		return __( 'Block Title', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-archive-title';
	}

	public function get_categories() {
		return [ 'kerge-elements' ];
	}

	protected function register_controls() {
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Content', 'kerge-elementor' ),
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'kerge-elementor' ),
				 'default' 	   => __( 'Block Title', 'kerge-elementor' ),
			  ]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$title 	= $settings['title'];
		
		$html	    = '<div class="block-title"><h3>'.$title.'</h3></div>';

		echo $html;
	}

}
