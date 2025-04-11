<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Home_Page_Second extends Widget_Base {

	public function get_name() {
		return 'kerge-home-page-second';
	}

	public function get_title() {
		return __( 'Home Page Second', 'kerge-elementor' );
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
			'text',
			  [
				 'label'       => __( 'Text', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type text here', 'kerge-elementor' ),
				 'default' 	   => __( '<p>Praesent sed aliquam arcu, non accumsan neque. In odio ante, vulputate ac magna vel, pharetra lobortis quam. Duis enim tortor, egestas et felis id, lobortis malesuada magna. Nunc sit amet sagittis nisi, eu semper nisl. Cras ut dictum nisl. Donec tincidunt eget orci.</p><p>Aliquam mollis, leo nec commodo facilisis, turpis lorem dapibus erat, sed consectetur nunc nulla ac elit. Suspendisse dictum id dui mollis auctor. Etiam id sapien neque. Cras nec rhoncus sem. Mauris metus ligula, varius vel iaculis at, pulvinar tincidunt magna.</p>', 'kerge-elementor' ),
			  ]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'button_title',
			[
				'label'       => __( 'Button title', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type button title here', 'kerge-elementor' ),
				'label_block' => true,
				'default' 	   => __( 'Button', 'kerge-elementor' ),
			]
		);
		$repeater->add_control(
			'url',
			[
				'label'       => __( 'URL', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type URL here', 'kerge-elementor' ),
				'label_block' => true,
				'default' 	   => __( 'http://example.com', 'kerge-elementor' ),
			]
		);
		$repeater->add_control(
			'target',
			[
				'label' => __( 'Open Link in New Tab.', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'kerge-elementor' ),
				'label_off' => __( 'No', 'kerge-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$repeater->add_control(
			'button_type',
			[
				'label' => __( 'Button Type.', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Primary', 'kerge-elementor' ),
				'label_off' => __( 'Secondary', 'kerge-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'buttons',
			[
				'label' => __( 'Buttons', 'kerge-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'button_title' => __( 'Download CV', 'kerge-elementor' ),
						'url' => __( 'http://example.com', 'kerge-elementor' ),
						'target' => 'yes',
						'button_type' => 'yes',
					],
					[
						'button_title' => __( 'Contact', 'kerge-elementor' ),
						'url' => __( 'http://example.com', 'kerge-elementor' ),
						'target' => 'yes',
						'button_type' => 'no',
					],
				],
				'title_field' => '{{{ button_title }}}',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style Section', 'kerge-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'title_size',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Title Font Size (px)', 'kerge-elementor' ),
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 48,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 48,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 36,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .hp-main-title' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_font_family',
			[
				'label' => esc_html__( 'Title Font Family', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Poppins', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .hp-main-title' => 'font-family: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'subtitle_size',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Subtitles Font Size (px)', 'kerge-elementor' ),
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 14,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 14,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 14,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .sp-subtitle' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'subtitle_font_family',
			[
				'label' => esc_html__( 'Subtitle Font Family', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Poppins', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .sp-subtitle' => 'font-family: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'text_size',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Text Font Size (px)', 'kerge-elementor' ),
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 14,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 14,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 14,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} p' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'text_font_family',
			[
				'label' => esc_html__( 'Text Font Family', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Poppins', sans-serif",
				'selectors' => [
					'{{WRAPPER}} p' => 'font-family: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'text_position',
			[
				'label' => __( 'Display text to the left or right of the image.', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Left', 'kerge-elementor' ),
				'label_off' => __( 'Right', 'kerge-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$id = $this->get_id();
		$settings 	= $this->get_settings();

		$title = $settings['title'];
		$text = $settings['text'];
		$reverse = $settings['text_position'];
		$img = $settings['image']['url'];

		?>

        <div class="section-inner start-page-full-width">
            <div class="start-page-full-width">
                <div class="row <?php if($reverse == "yes") { ?> flex-direction-reverse<?php } ?>">
                    <?php if (!empty($img)) { ?>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="inner-content">
                            <div class="fill-block" style="background-image: url(<?php echo esc_attr( $img ) ?>)"></div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (!empty($img)) { ?>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                    <?php } else { ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                    <?php } ?>
                        <div class="inner-content">
                            <div class="hp-text-block">
                            	
                            	<?php if ( !empty($settings['subtitles']) ): ?>
                                <div class="owl-carousel text-rotation">                                    
                                    <?php foreach ($settings['subtitles'] as $hp_subtitles): ?>
                                        <div class="item">
                                            <div class="sp-subtitle"><?php echo wp_kses_post($hp_subtitles['subtitle']); ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>

                                <?php
                                if( !empty( $title ) ) :
                                ?>
                                <h2 class="hp-main-title"><?php echo wp_kses_post($title); ?></h2>
                                <?php endif; ?>

                                <?php echo wp_kses_post($text); ?>


                                <?php if ( function_exists('fw_get_db_settings_option') ): ?>
                                    <?php $hp_buttons = $settings['buttons'];
                                    if ( !empty($hp_buttons)) : ?>
                                        <div class="hp-buttons">
                                        <?php
					                    foreach ($hp_buttons as $hp_buttons):
					                        if( !empty( $hp_buttons['url'] ) ) :
						                        $target = (!isset($hp_buttons['target'])) ? '_blank' : $hp_buttons['target'];
						                        $type = $hp_buttons['button_type'];
						                        if ($type == 'yes') {
						                        	$type = "primary";
						                        } else {
						                        	$type = "secondary";
						                        }
						                    ?>
						                        <a href="<?php echo esc_url($hp_buttons['url']); ?>" target="<?php echo esc_attr($target) ?>" class="btn btn-<?php echo esc_attr($type) ?>"><?php echo esc_attr($hp_buttons['button_title']); ?></a>
					                    	<?php endif;
					                    endforeach;
					                    ?>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
	}
}
