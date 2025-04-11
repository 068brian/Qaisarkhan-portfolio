<?php

namespace Kerge\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Kerge_Blog_Posts extends Widget_Base {

	public function get_name() {
		return 'kerge-blog-posts';
	}

	public function get_title() {
		return __( 'Blog Posts', 'kerge-elementor' );
	}

	public function get_icon() {
		return 'eicon-archive-posts';
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
			'layout',
			[
				'label' => __( 'Layout', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'two-columns',
				'options' => [
					'one-column'  => __( 'One Column', 'kerge-elementor' ),
					'two-columns' => __( 'Two Columns', 'kerge-elementor' ),
					'three-columns' => __( 'Three Columns', 'kerge-elementor' ),
				],
			]
		);

		$this->add_control(
			'number_of_posts',
			[
				'label'       => __( 'Number of posts to show', 'kerge-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type number here', 'kerge-elementor' ),
				'label_block' => true,
				'default' 	   => __( '6', 'kerge-elementor' ),
			]
		);

		$this->add_control(
			'featured_image',
			[
				'label' => __( 'Open Website Link in New Tab', 'kerge-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'kerge-elementor' ),
				'label_off' => __( 'Off', 'kerge-elementor' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$id = $this->get_id();

		$settings 	= $this->get_settings();

		global $post;

		$blog_number_of_posts = $settings['number_of_posts'];
		$layout = $settings['layout'];

		if ($layout === 'one-column'):
		    $thumbnail_class = 'blog-masonry-image-one-c';
		elseif ($layout === 'two-columns'):
		     $thumbnail_class = 'blog-masonry-image-two-c';
		elseif ($layout === 'three-columns'):
		     $thumbnail_class = 'blog-masonry-image-three-c';
		endif;

		$show_posts_with_feat_img = $settings['featured_image'];
		?>

		<div class="blog-masonry <?php echo esc_attr($layout); ?> clearfix">
		    <?php
		        $args_post = array( 'post_type' => 'post', 'posts_per_page' => -1 );
		        $loop_post = new \WP_Query( $args_post );
		        
		        if ( $loop_post->have_posts() ) :
		            
		            $i = 1;
		            
		            while ( ( $loop_post->have_posts() ) && ( $i <= $blog_number_of_posts ) ) : $loop_post->the_post();
		                
		                if ( $show_posts_with_feat_img == 'yes' )
		                {
		                    if ( has_post_thumbnail() )
		                    {
		                        $i++;
		                        
		                        ?>
		                            <!-- Blog Post <?php the_ID(); ?> -->
		                            <div class="item post-<?php the_ID(); ?>">
		                              <div class="blog-card">
		                                <div class="media-block">
		                                    <div class="category">
		                                        <?php
		                                            $categories = get_the_category();
		                                            $separator = ' ';
		                                            $output = '';
		                                            if ( ! empty( $categories ) ) {
		                                                foreach( $categories as $category ) {
		                                                    $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( 'View all posts in %s', 'kerge-elementor' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
		                                                }
		                                                echo trim( $output, $separator );
		                                            }
		                                        ?>
		                                    </div>
		                                    <a href="<?php the_permalink(); ?>">
		                                        <?php if ( is_sticky() ): ?>
		                                            <span class="sticky-badge"><i class="fa fa-fw fa-thumb-tack"></i></span>
		                                        <?php endif; ?>

		                                        <?php
		                                            the_post_thumbnail( esc_attr($thumbnail_class), array( 'alt' => get_the_title(), 'title' => "" ) );
		                                        ?>
		                                        <div class="mask"></div>
		                                    </a>
		                                </div>
		                                <div class="post-info">
		                                    <div class="post-date"><?php echo esc_attr(get_the_date( 'd M Y' )); ?></div>
		                                    <a href="<?php the_permalink(); ?>"><h4 class="blog-item-title"><?php the_title(); ?></h4></a>
		                                </div>
		                              </div>
		                            </div>
		                            <!-- End of Blog Post <?php the_ID(); ?> -->
		                        <?php
		                    }
		                }
		                else
		                {
		                    $i++;
		                    
		                    ?>
		                        <!-- Blog Post <?php the_ID(); ?> -->
		                        <div class="item post-<?php the_ID(); ?>">
		                          <div class="blog-card">
		                            <div class="media-block">
		                                <div class="category">
		                                    <?php
		                                        $categories = get_the_category();
		                                        $separator = ' ';
		                                        $output = '';
		                                        if ( ! empty( $categories ) ) {
		                                            foreach( $categories as $category ) {
		                                                $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( 'View all posts in %s', 'kerge-elementor' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
		                                            }
		                                            echo trim( $output, $separator );
		                                        }
		                                    ?>
		                                </div>
		                                <a href="<?php the_permalink(); ?>">
		                                    <?php if ( is_sticky() ): ?>
		                                        <span class="sticky-badge"><i class="fa fa-fw fa-thumb-tack"></i></span>
		                                    <?php endif; ?>
		                                    <?php
		                                        if ( has_post_thumbnail() )
		                                        {
		                                            the_post_thumbnail( esc_attr($thumbnail_class), array( 'alt' => get_the_title(), 'title' => "" ) );
		                                        }
		                                        else
		                                        { 
		                                        ?>
		                                            <div class="post-without-f-image"></div>
		                                        <?php
		                                        }
		                                    ?>
		                                    <div class="mask"></div>
		                                </a>
		                            </div>
		                            <div class="post-info">
		                                <div class="post-date"><?php echo esc_attr(get_the_date( 'd M Y' )); ?></div>
		                                <a href="<?php the_permalink(); ?>"><h4 class="blog-item-title"><?php the_title(); ?></h4></a>
		                            </div>
		                          </div>
		                        </div>
		                        <!-- End of Blog Post <?php the_ID(); ?> -->
		                    <?php
		                }
		                
		            endwhile;
		        endif;
		        \wp_reset_postdata();
		    ?>
		</div>

		<?php
		    if ( get_option( 'show_on_front' ) == 'posts' )
		    {
		        ?>
		            <a class="btn btn-primary" href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html_e( 'See All Posts', 'kerge-elementor' ); ?></a>
		        <?php
		    }
		    else
		    {
		        $blog_page_url = get_page_link( get_option( 'page_for_posts' ) );
		        
		        ?>
		            <a class="btn btn-primary" href="<?php echo esc_url($blog_page_url); ?>"><?php echo esc_html_e( 'See All Posts', 'kerge-elementor' ); ?></a>
		        <?php
		    }
	}

}
