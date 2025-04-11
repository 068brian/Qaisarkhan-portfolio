<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Infolist extends Widget_Base {

	public function get_name() {
		return 'kerge-info-list';
	}

	public function get_title() {
		return __( 'Info List', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
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
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type title here', 'kerge-elementor' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'value',
			[
				'label'       => __( 'Text/Value', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type text/value here', 'kerge-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'info_list',
			[
				'label' => __( 'Info List', 'kerge-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'Residence', 'kerge-elementor' ),
						'value' => __( 'USA', 'kerge-elementor' ),
					],
					[
						'title' => __( 'e-mail', 'kerge-elementor' ),
						'value' => __( 'email@example.com', 'kerge-elementor' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$info_list 	= $settings['info_list'];
		$html	    = '<div class="info-list">';
		if ( $info_list ) {
			$html .= '<ul>';
			foreach ( $info_list as $item ) {
				$html .= '<li><span class="title">'.$item['title'].'</span><span class="value">'.$item['value'].'</span></li>';
			}
			$html .= '</ul>';
		}
		$html .= '</div>';
		echo $html;
	}

}
