<?php get_header(); ?>

<!-- Banner Section -->
<section class="banner">
    <div class="banner-content">
        <div class="banner-card">
            <h1 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-4">
                <?php echo get_theme_mod('banner_title', 'Kolaborasi untuk Pendidikan Berkualitas'); ?>
            </h1>
            <p class="text-center text-gray-700 text-lg">
                <?php echo get_theme_mod('banner_description', 'Kelompok Kerja Kepala Sekolah (K3S) Kecamatan Cilodong berkomitmen untuk meningkatkan kualitas pendidikan melalui kolaborasi dan inovasi.'); ?>
            </p>
        </div>
    </div>
</section>

<!-- Welcome Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="card">
            <div class="p-8 md:p-12">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">
                            <?php echo get_theme_mod('welcome_title', 'Sambutan Ketua K3S'); ?>
                        </h2>
                        <div class="prose prose-blue max-w-none">
                            <?php echo wpautop(get_theme_mod('welcome_message', 'Selamat datang di website resmi K3S Kecamatan Cilodong...')); ?>
                        </div>
                        <div class="mt-6">
                            <p class="font-semibold text-gray-900">
                                <?php echo get_theme_mod('chairman_name', 'Dr. Nama Ketua K3S'); ?>
                            </p>
                            <p class="text-gray-600">Ketua K3S Kecamatan Cilodong</p>
                        </div>
                    </div>
                    <div class="relative h-[400px]">
                        <?php 
                        $welcome_image = get_theme_mod('welcome_image');
                        if ($welcome_image) :
                        ?>
                            <img src="<?php echo esc_url($welcome_image); ?>" alt="Ketua K3S" class="w-full h-full object-cover rounded-lg">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recent Activities Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                <?php _e('Kegiatan Terbaru', 'k3s-cilodong'); ?>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                <?php _e('Berbagai kegiatan dan program yang telah dilaksanakan oleh K3S Kecamatan Cilodong dalam rangka peningkatan mutu pendidikan.', 'k3s-cilodong'); ?>
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $activities = new WP_Query(array(
                'post_type' => 'kegiatan',
                'posts_per_page' => 3
            ));

            if ($activities->have_posts()) :
                while ($activities->have_posts()) : $activities->the_post();
            ?>
                <div class="card overflow-hidden hover:shadow-lg transition-shadow">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="relative h-48">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            <?php the_title(); ?>
                        </h3>
                        <p class="text-sm text-blue-600 mb-2">
                            <?php echo get_the_date(); ?>
                        </p>
                        <p class="text-gray-600 mb-4">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-700 font-medium">
                            <?php _e('Selengkapnya', 'k3s-cilodong'); ?> →
                        </a>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo get_post_type_archive_link('kegiatan'); ?>" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <?php _e('Lihat Semua Kegiatan', 'k3s-cilodong'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Quick Links Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Documents -->
            <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">
                    <?php _e('Dokumen', 'k3s-cilodong'); ?>
                </h3>
                <p class="text-gray-600 mb-4">
                    <?php _e('Akses dokumen penting dan surat edaran', 'k3s-cilodong'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/dokumen')); ?>" class="text-blue-600 hover:text-blue-700 font-medium">
                    <?php _e('Lihat Dokumen', 'k3s-cilodong'); ?>
                </a>
            </div>

            <!-- Gallery -->
            <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">
                    <?php _e('Galeri', 'k3s-cilodong'); ?>
                </h3>
                <p class="text-gray-600 mb-4">
                    <?php _e('Dokumentasi kegiatan dan acara', 'k3s-cilodong'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/galeri')); ?>" class="text-blue-600 hover:text-blue-700 font-medium">
                    <?php _e('Lihat Galeri', 'k3s-cilodong'); ?>
                </a>
            </div>

            <!-- News -->
            <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">
                    <?php _e('Berita', 'k3s-cilodong'); ?>
                </h3>
                <p class="text-gray-600 mb-4">
                    <?php _e('Berita terbaru dan pengumuman', 'k3s-cilodong'); ?>
                </p>
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="text-blue-600 hover:text-blue-700 font-medium">
                    <?php _e('Baca Berita', 'k3s-cilodong'); ?>
                </a>
            </div>

            <!-- Contact -->
            <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">
                    <?php _e('Kontak', 'k3s-cilodong'); ?>
                </h3>
                <p class="text-gray-600 mb-4">
                    <?php _e('Hubungi kami untuk informasi', 'k3s-cilodong'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/kontak')); ?>" class="text-blue-600 hover:text-blue-700 font-medium">
                    <?php _e('Hubungi Kami', 'k3s-cilodong'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
