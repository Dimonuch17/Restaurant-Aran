                <!-- Blog post -->
                <div <?php post_class('blog-post'); ?> id="post-<?php the_ID(); ?>">
                    <div class="col-lg-12">
                        <div class="post wow fadeIn" data-wow-duration="2s">
                            <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                                <?php the_post_thumbnail( 'full', array( 'class' => "img-responsive")); ?>
                            <?php endif; ?>
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>