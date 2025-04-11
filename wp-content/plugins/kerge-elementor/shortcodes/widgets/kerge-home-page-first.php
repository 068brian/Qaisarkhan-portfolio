<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Home_Page_First extends Widget_Base {

	public function get_name() {
		return 'kerge-home-page-first';
	}

	public function get_title() {
		return __( 'Home Page First', 'kerge-elementor' );
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
				 'default' 	   => get_bloginfo( 'name' ),
			  ]
		);

		$this->add_control(
			'h2_color',
			[
				'label' => esc_html__( 'Title Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} h2' => 'color: {{VALUE}}',
				],
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type subtitle here', 'kerge-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitles',
			[
				'label' => __( 'Subtitles', 'kerge-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'subtitle' => __( 'Web Designer', 'kerge-elementor' ),
					],
					[
						'subtitle' => __( 'Frontend-developer', 'kerge-elementor' ),
					],
				],
				'title_field' => '{{{ subtitle }}}',
			]
		);

		$this->add_control(
			'sub_color',
			[
				'label' => esc_html__( 'Subtitles Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .start-page .title-block .sp-subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Background Image', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'selectors' => [
					'{{WRAPPER}} .section-inner' => "background-image: url('{{URL}}')",
				],
			]
		);

		$this->add_control(
			'slider',
			[
				'label' => esc_html__( 'Background Image Slideshow. Add Images', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
			]
		);

		$this->add_control(
			'speed',
			  [
				 'label'       => __( 'Background Image Slideshow Speed', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type speed here', 'kerge-elementor' ),
				 'default' 	   => 6,
			  ]
		);

		$this->add_control(
			'color',
			[
				'label' => __( 'Background Mask Color', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(10,10,10,.45)',
				'selectors' => [
					'{{WRAPPER}} .mask' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();
		$id = uniqid( 'hp-first-' );
		$sliderid = uniqid( 'img-slider-' );
		$speed = $settings['speed'] * 1000;

		?>

		<div id="<?php echo esc_attr($id); ?>" class="start-page elementor-start-page">
			<div class="section-inner vcentered home-page-first-style">
				<?php $imgcount = 0;
				foreach ( $settings['slider'] as $image) {
				    $image;
				    $imgcount++; 
				} ?>
				<?php if ($imgcount != 0) {
					?>
					<div id="<?php echo esc_attr($sliderid); ?>" class="img-slider owl-carousel bg-slider" data-speed="<?php echo esc_attr($speed); ?>">
					<?php foreach ( $settings['slider'] as $image ) { ?>
						<div class="img-slider-bg" style="background-image: url(<?php echo esc_attr( $image['url'] ) ?>)"></div>
					<?php } ?>
					</div>
				<?php } ?>
				<div class="mask"></div>
	            <div class="row">
	              	<div class="col-sm-12 col-md-12 col-lg-12">
		                <div class="title-block">
			                <h2><?php echo wp_kses_post($settings['title']); ?></h2>
			                <div id="<?php echo esc_attr(uniqid( 'text-slider-' )); ?>" class="owl-carousel text-rotation">   
			                	<?php foreach ($settings['subtitles'] as $subtitle): ?>
				                    <div class="sp-subtitle"><?php echo wp_kses_post($subtitle['subtitle']); ?></div>
								<?php endforeach; ?>    
			                </div>
		                </div>
	              	</div>
	            </div>
	        </div>
	    </div>

        <?php
	}
}
