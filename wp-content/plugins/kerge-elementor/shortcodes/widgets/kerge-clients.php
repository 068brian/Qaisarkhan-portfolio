<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Clients extends Widget_Base {

	public function get_name() {
		return 'kerge-clients';
	}

	public function get_title() {
		return __( 'Clients', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-logo';
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
				'label'       => __( 'Block Title', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type block title here', 'kerge-elementor' ),
				'default' 	   => __( 'Clients', 'kerge-elementor' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'image',
			[
				'label' => __( 'Logo', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'name',
			[
				'label'       => __( 'Title', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type company/client name here', 'kerge-elementor' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'link',
			[
				'label'       => __( 'Website Link', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type company here', 'kerge-elementor' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'target',
			[
				'label' => __( 'Open Website Link in New Tab', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'kerge-elementor' ),
				'label_off' => __( 'No', 'kerge-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'clients',
			[
				'label' => __( 'Tesimonials List', 'kerge-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'name' => __( 'Company 1', 'kerge-elementor' ),
						'link' => __( 'http://example.com', 'kerge-elementor' ),
					],
					[
						'name' => __( 'Company 3', 'kerge-elementor' ),
						'link' => __( 'http://example.com', 'kerge-elementor' ),
					],
					[
						'name' => __( 'Company 3', 'kerge-elementor' ),
						'link' => __( 'http://example.com', 'kerge-elementor' ),
					],
					[
						'name' => __( 'Company 4', 'kerge-elementor' ),
						'link' => __( 'http://example.com', 'kerge-elementor' ),
					],
					[
						'name' => __( 'Company 5', 'kerge-elementor' ),
						'link' => __( 'http://example.com', 'kerge-elementor' ),
					],
					[
						'name' => __( 'Company 6', 'kerge-elementor' ),
						'link' => __( 'http://example.com', 'kerge-elementor' ),
					],
					[
						'name' => __( 'Company 7', 'kerge-elementor' ),
						'link' => __( 'http://example.com', 'kerge-elementor' ),
					],
				],
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Slider Settings', 'kerge-elementor' ),
			]
		);

		$this->add_control(
			'desktop',
			[
				'label'       => __( 'Items on the front: Desktop', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Example: 5', 'kerge-elementor' ),
				'default' 	   => __( '5', 'kerge-elementor' ),
			]
		);

		$this->add_control(
			'tablet',
			[
				'label'       => __( 'Items on the front: Tablet', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Example: 4', 'kerge-elementor' ),
				'default' 	   => __( '4', 'kerge-elementor' ),
			]
		);

		$this->add_control(
			'mobile',
			[
				'label'       => __( 'Items on the front: Mobile', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Example: 2', 'kerge-elementor' ),
				'default' 	   => __( '2', 'kerge-elementor' ),
			]
		);

		$this->add_control(
			'loop',
			[
				'label' => __( 'Infinity Loop', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'kerge-elementor' ),
				'label_off' => __( 'No', 'kerge-elementor' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'kerge-elementor' ),
				'label_off' => __( 'No', 'kerge-elementor' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$id = $this->get_id();

		$settings = $this->get_settings();

		$block_title = '<div class="block-title element-title"><h3>'.$settings['title'].'</h3></div>';

		$clients_list = $settings['clients'];

		$loop = $settings['loop'];

		if ( $loop == 'yes' ) {
			$loop_value = 'loop-on';
		} else {
			$loop_value = 'loop-off';
		}

		$autoplay = $settings['autoplay'];

		if ( $autoplay == 'yes' ) {
			$autoplay_value = 'autoplay-on';
		} else {
			$autoplay_value = 'autoplay-off';
		}

		$html = ''.$block_title.'
		<div id="clients_'.$id.'" class="clients owl-carousel '.$loop_value.' '.$autoplay_value.'" data-mobile-items="'.$settings['mobile'].'" data-tablet-items="'.$settings['tablet'].'" data-items="'.$settings['desktop'].'">';

		if ( $clients_list ) {
			foreach ( $clients_list as $item ) {
				$html .= '<div class="client-block">';
				$target = $item['target'];
				if ( $target == 'yes' ) {
					$target_value = '_blank';
				} else {
					$target_value = '_self';
				}

				$link = $item['link'];

				$img = '<img src="'.$item['image']['url'].'" alt="'.$item['name'].'">';

				if ($link != '') {
					$html .= '<a href="'.$link.'" target="'.$target_value.'" title="'.$item['name'].'">'.$img.'</a>';
				} else {
					$html .= ''.$img.'';
				}
				$html .= '</div>';
			}
		}
		$html .= '</div>';

		echo $html;
	}

}
