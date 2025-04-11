<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Social_Icons extends Widget_Base {

	public function get_name() {
		return 'kerge-social-icons';
	}

	public function get_title() {
		return __( 'Social Icons', 'kerge-elementor' );
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
			'size',
			[
				'label' => __( 'Icons Size', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '16',
				'selectors' => [
					'{{WRAPPER}} .social-button i' => 'font-size: {{VALUE}}px; line-height: calc({{VALUE}}px*2)',
					'{{WRAPPER}} .social-button' => 'width: calc(({{VALUE}}px * 2) + 2px); height: calc(({{VALUE}}px * 2) + 2px)',
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
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
		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title of the Social Icon', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type title here', 'kerge-elementor' ),
				'default' 	   => __( 'Example', 'kerge-elementor' ),
			]
		);
		$repeater->add_control(
			'color',
			[
				'label' => __( 'Icon Color', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#888',
				'selectors' => [
					'{{WRAPPER}} .social-button i' => 'color: {{VALUE}}',
				],
			]
		);
		$repeater->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'kerge-elementor' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'label_block' => true,
			]
		);
		$this->add_control(
			'social_icons',
			[
				'label' => __( 'Social Icons', 'kerge-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'icon' => [
							'value' => 'fab fa-twitter',
							'fa4compatibility' => true,
							'library' => 'solid'
						],
						'title' => __( 'Twitter', 'kerge-elementor' ),
						'color' => '#888',
						'website_link' => [
							'url' => esc_html__( 'https://your-link.com', 'kerge-elementor' ),
							'is_external' => true,
							'nofollow' => true,
						],
					],
					[
						'icon' => [
							'value' => 'fab fa-facebook',
							'fa4compatibility' => true,
							'library' => 'solid'
						],
						'title' => __( 'LinkedIn', 'kerge-elementor' ),
						'color' => '#888',
						'website_link' => [
							'url' => esc_html__( 'https://your-link.com', 'kerge-elementor' ),
							'is_external' => true,
							'nofollow' => true,
						],
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings_for_display();

		$social_icons 	= $settings['social_icons'];
		?>
		<div class="social-links-block">
		<?php if ( $social_icons ) { ?>
			<ul class="social-links">
			<?php foreach ( $social_icons as $item ) { 
				if ( ! empty( $item['website_link']['url'] ) ) {
					$this->add_link_attributes( 'website_link', $item['website_link'] );
				}
				?>
				<li>
					<a class="social-button" <?php echo $this->get_render_attribute_string( 'website_link' ); ?> title="<?php echo wp_kses_post($item['title']) ?>">
						<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
			    	</a>
				</li>
			<?php } ?>
			</ul>
		<?php } ?>
		</div>

		<?php
	}

}
