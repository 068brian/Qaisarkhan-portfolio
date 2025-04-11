<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Testimonials extends Widget_Base {

	public function get_name() {
		return 'kerge-testimonials';
	}

	public function get_title() {
		return __( 'Testimonials', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
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
				'default' 	   => __( 'Testimonials', 'kerge-elementor' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'quote',
			[
				'label'       => __( 'Quote', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type quote here', 'kerge-elementor' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'name',
			[
				'label'       => __( 'Name', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type name here', 'kerge-elementor' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'company',
			[
				'label'       => __( 'Company', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type company here', 'kerge-elementor' ),
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
			'testimonials',
			[
				'label' => __( 'Tesimonials List', 'kerge-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'quote' => __( 'Testimonial Text', 'kerge-elementor' ),
						'name' => __( 'Julia Hickman', 'kerge-elementor' ),
						'company' => __( 'Omni Source', 'kerge-elementor' ),
						'link' => __( 'http://example.com', 'kerge-elementor' ),
					],
					[
						'quote' => __( 'Testimonial Text', 'kerge-elementor' ),
						'name' => __( 'Robert Watkins', 'kerge-elementor' ),
						'company' => __( 'Endicott Shoes', 'kerge-elementor' ),
						'link' => __( 'http://example.com', 'kerge-elementor' ),
					],
					[
						'quote' => __( 'Testimonial Text', 'kerge-elementor' ),
						'name' => __( 'Kristin Carroll', 'kerge-elementor' ),
						'company' => __( 'Helping Hand', 'kerge-elementor' ),
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
				'placeholder' => __( 'Example: 2', 'kerge-elementor' ),
				'default' 	   => __( '2', 'kerge-elementor' ),
			]
		);

		$this->add_control(
			'tablet',
			[
				'label'       => __( 'Items on the front: Tablet', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Example: 2', 'kerge-elementor' ),
				'default' 	   => __( '2', 'kerge-elementor' ),
			]
		);

		$this->add_control(
			'mobile',
			[
				'label'       => __( 'Items on the front: Mobile', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Example: 1', 'kerge-elementor' ),
				'default' 	   => __( '1', 'kerge-elementor' ),
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

		$testimonials_list = $settings['testimonials'];

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

		$html	    = ''.$block_title.'
		<div id="testimonials_'.$id.'" class="testimonials owl-carousel '.$loop_value.' '.$autoplay_value.'" data-mobile-items="'.$settings['mobile'].'" data-tablet-items="'.$settings['tablet'].'" data-items="'.$settings['desktop'].'">';
		if ( $testimonials_list ) {
			foreach ( $testimonials_list as $item ) {
				$target = $item['target'];
				if ( $target == 'yes' ) {
					$target_value = '_blank';
				} else {
					$target_value = '_self';
				}

				$link = $item['link'];

				if ($link != '') {
					$company = '<p class="testimonial-firm"><a href="'.$link.'" target="'.$target_value.'">'.$item['company'].'</a></p>';
				} else {
					$company = '<p class="testimonial-firm">'.$item['company'].'</p>';
				}

				$img = $item['image']['url'];

				if ($img != '') {
					$img_code = '<img src="'.$item['image']['url'].'" alt="'.$item['company'].'">';
				} else {
					$img_code = '<div style="padding-top: 20px;"></div>';
				}

				$html .= '<div class="testimonial">

					<!-- Testimonial Content -->
					<div class="testimonial-content">
						<div class="testimonial-text">
    					<p>'.$item['quote'].'</p>
    				</div>
					</div>            
					<!-- /Testimonial Content -->

					<!-- Testimonial Author -->
					<div class="testimonial-credits">
						<!-- Picture -->
						<div class="testimonial-picture">
												'.$img_code.'
						</div>              
						<!-- /Picture -->
						<!-- Testimonial author information -->
						<div class="testimonial-author-info">
							<p class="testimonial-author">'.$item['name'].'</p>
							'.$company.'
						</div>
					</div>
					<!-- /Testimonial author information -->  
		  
				</div>';
			}
		}
		$html .= '</div>';
		echo $html;

	}

}
