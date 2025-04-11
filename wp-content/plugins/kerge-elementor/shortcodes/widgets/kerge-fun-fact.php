<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Fun_Fact extends Widget_Base {

	public function get_name() {
		return 'kerge-fun-fact';
	}

	public function get_title() {
		return __( 'Fun Fact', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-nerd-wink';
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
			'icon',
			[
				'label' => __( 'Icon', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-heart',
				],
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title of the Fun Fact', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'kerge-elementor' ),
				 'default' 	   => __( 'Happy Clients', 'kerge-elementor' ),
			  ]
		);

		$this->add_control(
			'value',
			  [
				 'label'       => __( 'Value/Text of the Fun Fact', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type value/text here', 'kerge-elementor' ),
				 'default' 	   => __( '999+', 'kerge-elementor' ),
			  ]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$title 	= $settings['title'];
		$icon = $settings['icon']['value'];
		$value = $settings['value'];

		$html = '<div class="fun-fact">
	                <i class="'.$icon.'"></i>
	                <h4>'.$title.'</h4>
	                <span class="fun-fact-block-value">'.$value.'</span>
	            </div>';

		echo $html;
	}

}
