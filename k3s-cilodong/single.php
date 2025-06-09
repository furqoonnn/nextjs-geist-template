<?php get_header(); ?>

<div class="site-content">
    <div class="max-w-4xl mx-auto">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="relative h-[400px] mb-8 rounded-lg overflow-hidden">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                    </div>
                <?php endif; ?>

                <header class="mb-8">
                    <div class="flex items-center gap-4 text-sm text-gray-600 mb-4">
                        <span><?php echo get_the_date(); ?></span>
                        <span>•</span>
                        <span><?php echo get_the_category_list(', '); ?></span>
                    </div>

                    <h1 class="text-4xl font-bold text-gray-900 mb-4">
                        <?php the_title(); ?>
                    </h1>

                    <div class="flex items-center gap-4">
                        <?php echo get_avatar(get_the_author_meta('ID'), 40, '', '', array('class' => 'rounded-full')); ?>
                        <div>
                            <p class="font-medium text-gray-900">
                                <?php the_author(); ?>
                            </p>
                            <p class="text-sm text-gray-600">
                                <?php
                                if (get_post_type() === 'anggota') {
                                    echo esc_html(get_post_meta(get_the_ID(), '_jabatan', true));
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </header>

                <div class="prose prose-blue max-w-none mb-8">
                    <?php the_content(); ?>
                </div>

                <?php if (get_post_type() === 'anggota') : ?>
                    <div class="bg-gray-50 p-6 rounded-lg mb-8">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">
                            <?php _e('Informasi Tambahan', 'k3s-cilodong'); ?>
                        </h2>
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-600">
                                    <?php _e('Jabatan:', 'k3s-cilodong'); ?>
                                </dt>
                                <dd class="text-gray-900">
                                    <?php echo esc_html(get_post_meta(get_the_ID(), '_jabatan', true)); ?>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-600">
                                    <?php _e('Sekolah:', 'k3s-cilodong'); ?>
                                </dt>
                                <dd class="text-gray-900">
                                    <?php echo esc_html(get_post_meta(get_the_ID(), '_sekolah', true)); ?>
                                </dd>
                            </div>
                        </dl>
                    </div>
                <?php endif; ?>

                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . __('Pages:', 'k3s-cilodong'),
                    'after'  => '</div>',
                ));
                ?>

                <footer class="border-t border-gray-200 pt-8 mt-8">
                    <?php
                    $tags_list = get_the_tag_list('', ', ');
                    if ($tags_list) :
                    ?>
                        <div class="mb-4">
                            <span class="text-sm font-medium text-gray-600">
                                <?php _e('Tags:', 'k3s-cilodong'); ?>
                            </span>
                            <span class="text-sm text-gray-600">
                                <?php echo $tags_list; ?>
                            </span>
                        </div>
                    <?php endif; ?>

                    <nav class="flex justify-between">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                        ?>
                        <div>
                            <?php if ($prev_post) : ?>
                                <a href="<?php echo get_permalink($prev_post); ?>" class="text-blue-600 hover:text-blue-700">
                                    ← <?php echo get_the_title($prev_post); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div>
                            <?php if ($next_post) : ?>
                                <a href="<?php echo get_permalink($next_post); ?>" class="text-blue-600 hover:text-blue-700">
                                    <?php echo get_the_title($next_post); ?> →
                                </a>
                            <?php endif; ?>
                        </div>
                    </nav>
                </footer>
            </article>

            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
