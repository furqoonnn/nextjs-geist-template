<?php get_header(); ?>

<div class="site-content">
    <div class="max-w-7xl mx-auto">
        <header class="text-center mb-12">
            <?php
            if (is_post_type_archive()) {
                $post_type = get_post_type_object(get_post_type());
                echo '<h1 class="text-4xl font-bold text-gray-900 mb-4">' . esc_html($post_type->labels->name) . '</h1>';
                if ($post_type->description) {
                    echo '<p class="text-gray-600 max-w-2xl mx-auto">' . esc_html($post_type->description) . '</p>';
                }
            } else {
                the_archive_title('<h1 class="text-4xl font-bold text-gray-900 mb-4">', '</h1>');
                the_archive_description('<p class="text-gray-600 max-w-2xl mx-auto">', '</p>');
            }
            ?>
        </header>

        <?php if (is_post_type_archive('anggota')) : ?>
            <!-- Anggota Archive -->
            <div class="mb-8">
                <div class="card">
                    <div class="p-6">
                        <div class="flex flex-col md:flex-row gap-4">
                            <input
                                type="text"
                                placeholder="<?php esc_attr_e('Cari nama atau sekolah...', 'k3s-cilodong'); ?>"
                                class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            >
                            <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value=""><?php esc_html_e('Semua Wilayah', 'k3s-cilodong'); ?></option>
                                <option value="cilodong-utara"><?php esc_html_e('Cilodong Utara', 'k3s-cilodong'); ?></option>
                                <option value="cilodong-selatan"><?php esc_html_e('Cilodong Selatan', 'k3s-cilodong'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="card overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="p-6">
                            <div class="flex flex-col items-center">
                                <div class="w-32 h-32 rounded-full overflow-hidden mb-4">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('thumbnail', array('class' => 'w-full h-full object-cover')); ?>
                                    <?php endif; ?>
                                </div>
                                <h2 class="text-xl font-semibold text-gray-900 text-center mb-1">
                                    <?php the_title(); ?>
                                </h2>
                                <p class="text-gray-600 text-center mb-2">
                                    <?php echo esc_html(get_post_meta(get_the_ID(), '_jabatan', true)); ?>
                                </p>
                                <p class="text-blue-600 font-medium text-center">
                                    <?php echo esc_html(get_post_meta(get_the_ID(), '_sekolah', true)); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        <?php elseif (is_post_type_archive('kegiatan')) : ?>
            <!-- Kegiatan Archive -->
            <div class="mb-8">
                <div class="card">
                    <div class="p-6">
                        <div class="flex flex-col md:flex-row gap-4">
                            <input
                                type="text"
                                placeholder="<?php esc_attr_e('Cari kegiatan...', 'k3s-cilodong'); ?>"
                                class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            >
                            <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value=""><?php esc_html_e('Semua Kategori', 'k3s-cilodong'); ?></option>
                                <option value="rapat"><?php esc_html_e('Rapat', 'k3s-cilodong'); ?></option>
                                <option value="workshop"><?php esc_html_e('Workshop', 'k3s-cilodong'); ?></option>
                                <option value="seminar"><?php esc_html_e('Seminar', 'k3s-cilodong'); ?></option>
                                <option value="pelatihan"><?php esc_html_e('Pelatihan', 'k3s-cilodong'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="card overflow-hidden hover:shadow-lg transition-shadow">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="relative h-64">
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-2">
                                <?php the_title(); ?>
                            </h2>
                            <div class="flex items-center text-gray-600 mb-4">
                                <span class="font-medium">Tanggal:</span>
                                <span class="ml-2"><?php echo get_the_date(); ?></span>
                            </div>
                            <div class="text-gray-600 mb-4">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-700 font-medium">
                                <?php _e('Selengkapnya', 'k3s-cilodong'); ?> →
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        <?php else : ?>
            <!-- Default Archive -->
            <div class="grid gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="card hover:shadow-lg transition-shadow">
                        <div class="grid md:grid-cols-3 gap-6">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="relative h-64 md:h-full min-h-[200px]">
                                    <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="md:col-span-2 p-6">
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
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php if ($wp_query->max_num_pages > 1) : ?>
            <div class="mt-8 flex justify-center">
                <?php
                the_posts_pagination(array(
                    'prev_text' => __('Previous', 'k3s-cilodong'),
                    'next_text' => __('Next', 'k3s-cilodong'),
                    'class' => 'flex items-center space-x-2',
                ));
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
