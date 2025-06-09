<?php get_header(); ?>

<div class="site-content">
    <div class="max-w-4xl mx-auto">
        <?php if (have_posts()) : ?>
            <div class="grid gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card hover:shadow-lg transition-shadow'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="relative h-64">
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                            </div>
                        <?php endif; ?>

                        <div class="p-6">
                            <div class="flex items-center gap-4 text-sm text-gray-600 mb-3">
                                <span><?php echo get_the_date(); ?></span>
                                <span>•</span>
                                <span><?php echo get_the_category_list(', '); ?></span>
                            </div>

                            <h2 class="text-2xl font-bold text-gray-900 mb-4">
                                <a href="<?php the_permalink(); ?>" class="hover:text-blue-600">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <div class="text-gray-600 mb-4">
                                <?php the_excerpt(); ?>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">
                                    <?php _e('Oleh:', 'k3s-cilodong'); ?> <?php the_author(); ?>
                                </span>
                                <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-700 font-medium">
                                    <?php _e('Baca Selengkapnya', 'k3s-cilodong'); ?> →
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="mt-8 flex justify-center">
                <?php
                the_posts_pagination(array(
                    'prev_text' => __('Previous', 'k3s-cilodong'),
                    'next_text' => __('Next', 'k3s-cilodong'),
                    'class' => 'flex items-center space-x-2',
                ));
                ?>
            </div>

        <?php else : ?>
            <div class="text-center py-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    <?php _e('Tidak ada artikel yang ditemukan.', 'k3s-cilodong'); ?>
                </h2>
                <p class="text-gray-600">
                    <?php _e('Silakan coba mencari dengan kata kunci lain.', 'k3s-cilodong'); ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
