<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Skills_First_Style extends Widget_Base {

	public function get_name() {
		return 'kerge-skills-first-style';
	}

	public function get_title() {
		return __( 'Skills 1 Style', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
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
			'block_title',
			[
				'label'       => __( 'Block Title', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type block title here', 'kerge-elementor' ),
				'default' 	   => __( 'Skills', 'kerge-elementor' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Skill Title', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type title here', 'kerge-elementor' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'value',
			[
				'label'       => __( 'Value', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type value here. Example: 99.', 'kerge-elementor' ),
				'label_block' => true,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .skill-percentage' => 'width: {{VALUE}}%',
				],
			]
		);
		$repeater->add_control(
			'color',
			[
				'label' => __( 'Skill Color', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#0099e5',
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .skill-percentage' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} {{CURRENT_ITEM}}.skill-container' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'skills',
			[
				'label' => __( 'Tesimonials List', 'kerge-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'Web Design', 'kerge-elementor' ),
						'value' => '90',
						'color' => '#0099e5',
					],
					[
						'title' => __( 'Print Design', 'kerge-elementor' ),
						'value' => '80',
						'color' => '#0099e5',
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$id = uniqid( 'skills-' );

		$block_title = $settings['block_title'];

		$skills 	= $settings['skills'];

		$html = '<div class="timeline clearfix">'.$block_title.'';
		?>

		<?php if (!empty($block_title)): ?>
			<div class="block-title element-title">
				<h3><?php echo esc_html($block_title); ?></h3>
			</div>
		<?php endif; ?>

		<div id="<?php echo esc_attr($id); ?>" class="skills-info skills-first-style">
		<?php foreach ($settings['skills'] as $skill): 
			$skill_id = uniqid( 'skills' );
			?>
			<div class="clearfix">
				<h4><?php echo esc_html($skill['title']); ?></h4>
			</div>
			<div id="skill-<?php echo esc_attr($skill_id); ?>" class="skill-container elementor-repeater-item-<?php echo esc_attr($skill['_id']); ?>">
				<div class="skill-percentage"></div>
			</div>
		<?php endforeach; ?>
		</div>

		<?php
	}

}
