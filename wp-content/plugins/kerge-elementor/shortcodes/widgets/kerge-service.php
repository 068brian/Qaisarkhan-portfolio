<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Service extends Widget_Base {

	public function get_name() {
		return 'kerge-service';
	}

	public function get_title() {
		return __( 'Service', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
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
					'value' => 'fas fa-desktop',
					'fa4compatibility' => true,
					'library' => 'solid'
				],
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title of the Service', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'kerge-elementor' ),
				 'default' 	   => __( 'Service', 'kerge-elementor' ),
			  ]
		);
		
		$this->add_control(
			'description',
			  [
				 'label'       => __( 'Description', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type description here', 'kerge-elementor' ),
				 'default' 	   => '',
			  ]
		);

		$this->add_control(
			'color',
			[
				'label' => __( 'Icon Color', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#888',
				'selectors' => [
					'{{WRAPPER}} .info-block-w-icon i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$title 			= $settings['title'];
		$desc 			= $settings['description'];
		?>
		<div class="info-list-w-icon">
			<div class="info-block-w-icon">
				<div class="ci-icon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<div class="ci-text">
					<h4><?php echo wp_kses_post($title) ?></h4>
					<p><?php echo wp_kses_post($desc) ?></p>
				</div>
			</div>
		</div>
		<?php
	}

}
