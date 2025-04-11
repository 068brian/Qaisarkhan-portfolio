<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Home_Page_Third extends Widget_Base {

	public function get_name() {
		return 'kerge-home-page-third';
	}

	public function get_title() {
		return __( 'Home Page Third', 'kerge-elementor' );
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
				 'default' 	   => __( 'Fusce tempor magna mi, non egestas velit ultricies nec. Aenean convallis, risus non condimentum gravida, odio mauris ullamcorper felis, ut venenatis purus ex eu mi. Quisque imperdiet lacinia urna, a placerat sapien pretium eu.', 'kerge-elementor' ),
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
		$disable_move_effect = '';
		$img = $settings['image']['url'];

		$bg_styles = 'style="background-image: url('.$img.')"';

		?>

		<div class="section-content vcentered home-page-third-style">

			<div id="home_content_<?php echo esc_attr($id); ?>" class="home-content">
			    <div class="row flex-v-align<?php if($reverse == "yes") { ?> flex-direction-reverse<?php } ?>">
			        <div class="col-sm-12 <?php if($reverse == "yes") { ?>col-md-6 col-lg-6<?php } else { ?>col-md-5 col-lg-5<?php } ?>">
			            <div class="home-photo">
			                <div class="hp-inner<?php if ($disable_move_effect == 'yes') { ?> without-move<?php } ?>" <?php echo wp_kses_post($bg_styles) ?>></div>
			            </div>
			        </div>

			        <div class="col-sm-12 <?php if($reverse == "yes") { ?>col-md-6 col-lg-6<?php } else { ?>col-md-7 col-lg-7<?php } ?>">
			            <div class="home-text<?php if($reverse == "no") { ?> hp-left<?php } ?>">
			                <?php if ( !empty($settings['subtitles']) ): ?>
			                <div class="owl-carousel text-rotation">                                    
			                    <?php foreach ($settings['subtitles'] as $hp_subtitles): ?>
			                        <div class="item">
			                            <h4><?php echo esc_html($hp_subtitles['subtitle']); ?></h4>
			                        </div>
			                    <?php endforeach; ?>
			                </div>
			                <?php endif; ?>
			                <h1><?php echo wp_kses_post($title); ?></h1>
			                <p><?php echo wp_kses_post($text); ?></p>
			                <?php $hp_buttons = $settings['buttons'];
			                if ( !empty($hp_buttons)) : ?>
			                   <div class="home-buttons">
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
			            </div>
			        </div>
			    </div>
			</div>

        </div>

        <?php
	}
}
