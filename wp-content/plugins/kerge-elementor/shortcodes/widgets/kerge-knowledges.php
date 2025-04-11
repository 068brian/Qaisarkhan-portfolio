<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Knowledges extends Widget_Base {

	public function get_name() {
		return 'kerge-knowledges';
	}

	public function get_title() {
		return __( 'Knowledges', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-check-circle';
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

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'knowledge',
			[
				'label'       => __( 'Knowledge', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type knowledge here', 'kerge-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'knowledges',
			[
				'label' => __( 'Knowledges', 'kerge-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'knowledge' => __( 'Marketing', 'kerge-elementor' ),
					],
					[
						'knowledge' => __( 'Social Media', 'kerge-elementor' ),
					],
					[
						'knowledge' => __( 'Communication', 'kerge-elementor' ),
					],
					[
						'knowledge' => __( 'Social Networking', 'kerge-elementor' ),
					],
				],
				'title_field' => '{{{ knowledge }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();
		?>

		<ul class="knowledges">
	        <?php foreach ($settings['knowledges'] as $knowledge): 
				?>
				<li><?php echo wp_kses_post($knowledge['knowledge']); ?></li>
			<?php endforeach; ?>
      	</ul>
        <?php
	}

}
