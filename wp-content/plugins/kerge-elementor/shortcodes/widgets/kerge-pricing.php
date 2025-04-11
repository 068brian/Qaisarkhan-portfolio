<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Pricing extends Widget_Base {

	public function get_name() {
		return 'kerge-pricing';
	}

	public function get_title() {
		return __( 'Pricing', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-price-table';
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
			'highlight',
			[
				'label' => __( 'Highlighted', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'kerge-elementor' ),
				'label_off' => __( 'No', 'kerge-elementor' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Plan name', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type plane name here', 'kerge-elementor' ),
				 'default' 	   => __( 'Basic', 'kerge-elementor' ),
			  ]
		);

		$this->add_control(
			'price',
			  [
				 'label'       => __( 'Price', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type price here', 'kerge-elementor' ),
				 'default' 	   => __( '$128', 'kerge-elementor' ),
			  ]
		);

		$this->add_control(
			'price_desc',
			  [
				 'label'       => __( 'Price Small Description / Period', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type text here', 'kerge-elementor' ),
				 'default' 	   => __( 'per month', 'kerge-elementor' ),
			  ]
		);

		$this->add_control(
			'button_text',
			  [
				 'label'       => __( 'Button Text', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type button text here', 'kerge-elementor' ),
				 'default' 	   => __( 'Free Trial', 'kerge-elementor' ),
			  ]
		);

		$this->add_control(
			'button_url',
			[
				'label' => __( 'Link', 'kerge-elementor' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'kerge-elementor' ),
				'default' => [
					'url' => '#',
					'is_external' => false,
				],
			]
		);

		$this->add_control(
			'button_type',
			[
				'label' => __( 'Button Type: Primary', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'kerge-elementor' ),
				'label_off' => __( 'No', 'kerge-elementor' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'description_item',
			  [
				 'label'       => __( 'Item', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type description item here', 'kerge-elementor' ),
				 'default' 	   => __( 'Unlimited traffic', 'kerge-elementor' ),
			  ]
		);
		
		$this->add_control(
			'description',
			[
				'label' => __( 'Description Items', 'kerge-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'description_item' => __( 'Unlimited traffic', 'kerge-elementor' ),
					],
					[
						'description_item' => __( 'Unlimited disk space', 'kerge-elementor' ),
					],
				],
				'title_field' => '{{{ description_item }}}',
			]
		);



		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$highlight = $settings['highlight'];

		if ($highlight == "yes") {
			$highlight = "highlight";
		} else {
			$highlight = "";
		}

		$title = $settings['title'];

		$price = $settings['price'];

		$price_desc = $settings['price_desc'];

		$button_text = $settings['button_text'];

		$button_url = $settings['button_url']['url'];

		$button_type = $settings['button_type'];

		$description = $settings['description'];

		$target = $settings['button_url']['is_external'] ? ' target="_blank"' : '';

		$nofollow = $settings['button_url']['nofollow'] ? ' rel="nofollow"' : '';
		?>
		<div class="fw-pricing">
			<div class="fw-package <?php echo esc_attr($highlight); ?>">
				<?php if (! empty($title)) { ?>
			        <div class="fw-heading-row">
			        	<span><?php echo wp_kses_post($title); ?></span>
			        </div>
		    	<?php } ?>
		        
		        <div class="fw-pricing-row">
		        	<?php if (! empty($price)) { ?>
		        	<span><?php echo wp_kses_post($price); ?></span>
		        	<?php } ?>

		        	<?php if (! empty($price_desc)) { ?>
		        	<small><?php echo wp_kses_post($price_desc); ?></small>
		        	<?php } ?>
		        </div>
		        
		        <?php if (! empty($button_text)) { 


		        	if ($button_type == "yes") {
		        		$button_type = "primary";
		        	} else {
		        		$button_type = "secondary";
		        	}
		        	?>

			        <div class="fw-button-row">
			        	<a href="<?php echo wp_kses_post($button_url); ?>" <?php echo wp_kses_post($target); ?> <?php echo wp_kses_post($nofollow); ?> class="btn btn-<?php echo esc_attr($button_type); ?>"><?php echo wp_kses_post($button_text); ?></a>
			        </div>
			    <?php } ?>

			    <?php if ( $description ) {
					foreach ( $description as $item ) {
						$desc_text = $item['description_item']; ?>

						<div class="fw-default-row"><?php echo wp_kses_post($desc_text); ?></div>
						
					<?php
					}
				}
				?>

		    </div>
		</div>
	    <?php
	}

}
