<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;



if ( function_exists( 'kerge_contact_action' ) ) {

	$recaptcha = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/recaptcha_switcher') :  'on';
	if( $recaptcha = 'on' ){
	    wp_enqueue_script('js-recaptcha', 'https://www.google.com/recaptcha/api.js',array(),'2.0',true,'in_footer');
	}

	if ( ! defined( 'ABSPATH' ) ) { exit; }

	class Kerge_Contact_Form_Simple extends Widget_Base {

		public function get_name() {
			return 'kerge-contact-form-simple';
		}

		public function get_title() {
			return __( 'Contact Form Simple', 'kerge-elementor' );
		}

		public function get_icon() {
			return 'eicon-form-horizontal';
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
					 'default' 	   => __( 'Block Title', 'kerge-elementor' ),
				  ]
			);

			$this->add_control(
				'checkbox',
				[
					'label' => __( 'Show the Checkbox', 'kerge-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Yes', 'kerge-elementor' ),
					'label_off' => __( 'No', 'kerge-elementor' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);

			$this->add_control(
				'checkbox_text',
				  [
					 'label'       => __( 'Checkbox Text', 'kerge-elementor' ),
					 'type'        => Controls_Manager::TEXTAREA,
					 'placeholder' => __( 'Checkbox text. In this field you can use HTML tags, for example, you can add a link to any page.', 'kerge-elementor' ),
					 'default' 	   => '',
				  ]
			);

			$this->add_control(
				'checkbox_error',
				  [
					 'label'       => __( 'Checkbox Text', 'kerge-elementor' ),
					 'type'        => Controls_Manager::TEXTAREA,
					 'placeholder' => __( 'Checkbox error text.', 'kerge-elementor' ),
					 'default' 	   => '',
				  ]
			);

			$this->add_control(
				'checkbox_mandatory',
				[
					'label' => __( 'Checkbox Mandatory', 'kerge-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Yes', 'kerge-elementor' ),
					'label_off' => __( 'No', 'kerge-elementor' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings 	= $this->get_settings();

			$block_title = '<div class="block-title element-title"><h3>'.$settings['title'].'</h3></div>';


			$recaptcha = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/recaptcha_switcher') : 'on';
			$recaptcha_key = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/on/recaptcha_key') : '6LdqmCAUAAAAAMMNEZvn6g4W5e0or2sZmAVpxVqI';
			$id = uniqid( 'contact_form_' );
			$checkbox = $settings['checkbox'];
			$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';
			?>

			<?php if (!empty($block_title)) {
				echo wp_kses_post($block_title);
			} ?>

			<form id="<?php echo esc_attr($id); ?>" class="contact-form" action="#" method="post">

				<div class="messages"></div>

				<div class="controls two-columns">
					<div class="fields clearfix">
						<div class="left-column">
							<div class="form-group form-group-with-icon">
								<input id="form_name" type="text" name="name" class="form-control" placeholder="<?php esc_html_e('Full Name','kerge-elementor'); ?>" required="required" data-error="<?php esc_html_e('Name is required.','kerge-elementor'); ?>">
								<div class="form-control-border"></div>
								<div class="help-block with-errors"></div>
							</div>

							<div class="form-group form-group-with-icon">
								<input id="form_email" type="email" name="email" class="form-control" placeholder="<?php esc_html_e('Email Address','kerge-elementor'); ?>" required="required" data-error="<?php esc_html_e('Valid email is required.','kerge-elementor'); ?>">
								<div class="form-control-border"></div>
								<div class="help-block with-errors"></div>
							</div>

							<div class="form-group form-group-with-icon">
								<input id="form_subject" type="text" name="subject" class="form-control" placeholder="<?php esc_html_e('Subject','kerge-elementor'); ?>" required="required" data-error="<?php esc_html_e('Subject is required.','kerge-elementor'); ?>">
								<div class="form-control-border"></div>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="right-column">
							<div class="form-group form-group-with-icon">
								<textarea id="form_message" name="message" class="form-control" placeholder="<?php esc_html_e('Message','kerge-elementor'); ?>" rows="7" required="required" data-error="<?php esc_html_e('Please, leave me a message.','kerge-elementor'); ?>"></textarea>
								<div class="form-control-border"></div>
								<div class="help-block with-errors"></div>
							</div>
						</div>
					</div>

					<?php if ( $checkbox == 'yes' ) {
						$checkbox_text = $settings['checkbox_text'];
						$checkbox_error = $settings['checkbox_error'];
						$checkbox_required = $settings['checkbox_mandatory'];
						?>
						<div class="form-group-with-icon form-group form-group-checkbox">
							<input type="checkbox" name="checkbox" class="form-control form-control-checkbox" <?php if ($checkbox_required == 'on'): ?>required="required"<?php endif; ?> data-error="<?php echo esc_attr($checkbox_error); ?>">
							<label><?php echo wp_kses_post($checkbox_text); ?></label>
							<div class="form-control-border"></div>
							<div class="help-block with-errors"></div>
						</div>
						<?php
					} ?>

					<?php if( $recaptcha == 'on' ) { 
						?>
							<?php if( $theme_style == 'dark' ) { ?>
							<div class="g-recaptcha" data-sitekey="<?php echo esc_attr($recaptcha_key); ?>" data-theme="dark"></div>
							<?php } else { ?>
							<div class="g-recaptcha" data-sitekey="<?php echo esc_attr($recaptcha_key); ?>"></div>
							<?php
						}
					} ?>

					<input type="submit" class="button btn-send" value="<?php esc_html_e('Send message','kerge-elementor'); ?>">
				</div>
			</form>

			<?php


		}

	}

}