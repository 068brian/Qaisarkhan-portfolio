<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Quote extends Widget_Base {

	public function get_name() {
		return 'kerge-quote';
	}

	public function get_title() {
		return __( 'Quote', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-blockquote';
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
			'text',
			  [
				 'label'       => __( 'Text', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Enter quote text', 'kerge-elementor' ),
				 'default' 	   => '',
			  ]
		);

		$this->add_control(
			'author',
			  [
				 'label'       => __( 'Author', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Enter the quote author', 'kerge-elementor' ),
				 'default' 	   => '',
			  ]
		);

		$this->add_control(
			'author_link',
			  [
				 'label'       => __( 'Author Link', 'kerge-elementor' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Enter the author link', 'kerge-elementor' ),
				 'default' 	   => '',
			  ]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();
		?>
		<blockquote class="quote">
		    <?php echo wp_kses_post( do_shortcode( $settings['text'] ) ); ?>
			<?php if( $settings['author'] != '' ) : ?>
				<footer class="quote-author">
					<span>
						<?php if($settings['author_link'] != '') : ?>
							<a href="<?php echo esc_url( $settings['author_link'] ); ?>"><?php echo esc_html( $settings['author'] ); ?></a>
						<?php else : ?>
							<?php echo esc_html( $settings['author'] ); ?>
						<?php endif; ?>
					</span>
				</footer>
			<?php endif; ?>
		</blockquote>
		<?php
	}

}
