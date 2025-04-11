<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Certificate extends Widget_Base {

	public function get_name() {
		return 'kerge-certificate';
	}

	public function get_title() {
		return __( 'Certificate', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
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
				 'default' 	   => '',
			  ]
		);

		$this->add_control(
			'membership',
			  [
				 'label'       => __( 'Membership ID', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type Membership ID here', 'kerge-elementor' ),
				 'default' 	   => '',
			  ]
		);

		$this->add_control(
			'date',
			  [
				 'label'       => __( 'Date of receipt of the certificate', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type Date here', 'kerge-elementor' ),
				 'default' 	   => '',
			  ]
		);

		$this->add_control(
			'logo',
			[
				'label' => __( 'Company Logo', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Certificate Image', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => '',
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'label_block' => true,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$title = $settings['title'];
		$membership = $settings['membership'];
		$date = $settings['date'];
		$logo = $settings['logo']['url'];
		$img = $settings['image']['url'];
		?>

		<?php if ( ! empty( $settings['website_link']['url'] ) ) {
			$this->add_link_attributes( 'website_link', $settings['website_link'] ); ?>
			<a class="social-button" <?php echo $this->get_render_attribute_string( 'website_link' ); ?> title="<?php echo wp_kses_post($item['title']) ?>">
		<?php
		}
		?>

		<?php if( !empty( $img ) && empty( $settings['website_link']['url'] ) ) : ?>
		<a href="<?php echo esc_url($img); ?>" class="lightbox">
		<?php endif; ?>
		<div class="certificate-item clearfix">
		    <div class="certi-logo">
		        <?php if( !empty( $logo ) ) : ?>
		        <img src="<?php echo esc_url($logo); ?>" alt="<?php esc_attr_e('logo', 'kerge-elementor'); ?>">
		        <?php endif; ?>
		    </div>
		    <div class="certi-content">
		        <div class="certi-title">
		            <h4><?php echo esc_html($title); ?></h4>
		        </div>
		        <div class="certi-id">
		            <span><?php echo esc_html($membership); ?></span>
		        </div>
		        <div class="certi-date">
		            <span><?php echo esc_html($date); ?></span>
		        </div>
		        <div class="certi-company">
		            <span></span>
		        </div>
		    </div>
		</div>
		<?php if( !empty( $img ) ) : ?>
		</a>
		<?php endif;
	}

}
