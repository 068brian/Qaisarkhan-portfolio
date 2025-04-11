<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Timeline extends Widget_Base {

	public function get_name() {
		return 'kerge-timeline';
	}

	public function get_title() {
		return __( 'Timeline', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-time-line';
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
			'block_title',
			[
				'label'       => __( 'Block Title', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type block title here', 'kerge-elementor' ),
				'default' 	   => __( 'Timeline', 'kerge-elementor' ),
			]
		);

		$this->add_control(
			'style',
			[
				'label' => __( 'Timeline Style', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'second',
				'options' => [
					'first'  => __( 'First Style', 'kerge-elementor' ),
					'second' => __( 'Second Style', 'kerge-elementor' ),
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'period',
			[
				'label'       => __( 'Period', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type period here', 'kerge-elementor' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'color',
			[
				'label' => __( 'Period Color', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#0099e5',
			]
		);
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
			'company',
			[
				'label'       => __( 'Company', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type title here', 'kerge-elementor' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'text',
			[
				'label'       => __( 'Text/Description', 'kerge-elementor' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Type text/description here', 'kerge-elementor' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'logo',
			[
				'label' => __( 'Logo', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'timeline',
			[
				'label' => __( 'Tesimonials List', 'kerge-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'period' => __( '2016 - Current', 'kerge-elementor' ),
						'title' => __( 'Lead Ui/Ux Designer', 'kerge-elementor' ),
						'company' => __( 'Envato', 'kerge-elementor' ),
						'text' => __( 'Praesent dignissim sollicitudin justo, sed elementum quam lacinia quis. Phasellus eleifend tristique posuere. Sed vitae dui nec magna.', 'kerge-elementor' ),
						'color' => '#0099e5',
					],
					[
						'period' => __( '2013 - 2016', 'kerge-elementor' ),
						'title' => __( 'Senior Ui/Ux Designer', 'kerge-elementor' ),
						'company' => __( 'Envato', 'kerge-elementor' ),
						'text' => __( 'Praesent dignissim sollicitudin justo, sed elementum quam lacinia quis. Phasellus eleifend tristique posuere. Sed vitae dui nec magna.', 'kerge-elementor' ),
						'color' => '#0099e5',
					],
				],
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$block_title = '<div class="block-title element-title"><h3>'.$settings['block_title'].'</h3></div>';

		$style 	= $settings['style'];

		$timeline 	= $settings['timeline'];

		if ( $style == "first" ) {
            $html = '<div class="timeline timeline-first-style clearfix">'.$block_title.'';
		} elseif ( $style == "second" )  {
			$html = '<div class="timeline timeline-second-style clearfix">'.$block_title.'';
		}

		if ( $timeline ) {
			foreach ( $timeline as $item ) {
				$logo = $item['logo']['url'];
				$id = uniqid( 'timeline-' );
				if( !empty( $logo ) ) {
					$logo_code = '<span class="item-logo"><img src="'.$logo.'" alt="'.$item['company'].'" /></span>';
				} else {
					$logo_code = '';
				}

				if ( $style == "first" ) {
		            $html .= '<div id="'.$id.'" class="timeline-item" data-color="'.$item['color'].'">
								<span class="item-period">'.$item['period'].'</span>
								<h4 class="item-title">'.$item['title'].'</h4>
								<span class="item-small">'.$item['company'].'</span>
								'.$logo_code.'
								<div class="text">'.$item['text'].'</div>
							</div>';
				} elseif ( $style == "second" )  {
					$html .= '<div id="'.$id.'" class="timeline-item clearfix" data-color="'.$item['color'].'">
								<div class="left-part">
									<h5 class="item-period">'.$item['period'].'</h5>
									<span class="item-company">'.$item['company'].'</span>
									'.$logo_code.'
								</div>
								<div class="divider"></div>
								<div class="right-part">
									<h4 class="item-title">'.$item['title'].'</h4>
									<div class="text">'.$item['text'].'</div>
								</div>
							</div>';
				}
			}
		}
		

		$html .= '</div>';
		echo $html;
	}

}
