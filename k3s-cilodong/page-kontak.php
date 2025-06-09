<?php
/**
 * Template Name: Contact Page
 */

get_header(); ?>

<div class="site-content">
    <div class="container mx-auto px-4 max-w-7xl">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                <?php the_title(); ?>
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                <?php _e('Silakan hubungi kami untuk informasi lebih lanjut tentang K3S Kecamatan Cilodong atau kirimkan pesan melalui formulir di bawah ini.', 'k3s-cilodong'); ?>
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Contact Information -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Office Address -->
                <div class="card">
                    <div class="p-6">
                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2"><?php _e('Alamat Kantor', 'k3s-cilodong'); ?></h3>
                                <p class="text-gray-600">
                                    <?php echo nl2br(esc_html(get_theme_mod('office_address', "Sekretariat K3S Kecamatan Cilodong\nJl. Raya Cilodong No. 123\nKota Depok, Jawa Barat 16413"))); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div class="card">
                    <div class="p-6">
                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2"><?php _e('Telepon', 'k3s-cilodong'); ?></h3>
                                <p class="text-gray-600">
                                    <?php _e('Telp:', 'k3s-cilodong'); ?> <?php echo esc_html(get_theme_mod('office_phone', '(021) xxx-xxxx')); ?><br>
                                    <?php _e('WhatsApp:', 'k3s-cilodong'); ?> <?php echo esc_html(get_theme_mod('whatsapp', '+62 xxx-xxxx-xxxx')); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="card">
                    <div class="p-6">
                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2"><?php _e('Email', 'k3s-cilodong'); ?></h3>
                                <p class="text-gray-600">
                                    <?php echo esc_html(get_theme_mod('contact_email', 'info@k3scilodong.org')); ?><br>
                                    <?php echo esc_html(get_theme_mod('alt_email', 'sekretariat@k3scilodong.org')); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="card">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6"><?php _e('Kirim Pesan', 'k3s-cilodong'); ?></h2>
                        <?php
                        if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode('[contact-form-7 id="' . get_theme_mod('contact_form_id', '') . '"]');
                        } else {
                        ?>
                            <form action="#" method="post" class="space-y-6">
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label for="name" class="text-sm font-medium text-gray-900">
                                            <?php _e('Nama Lengkap', 'k3s-cilodong'); ?>
                                        </label>
                                        <input
                                            type="text"
                                            id="name"
                                            name="name"
                                            required
                                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        >
                                    </div>
                                    <div class="space-y-2">
                                        <label for="email" class="text-sm font-medium text-gray-900">
                                            <?php _e('Email', 'k3s-cilodong'); ?>
                                        </label>
                                        <input
                                            type="email"
                                            id="email"
                                            name="email"
                                            required
                                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        >
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label for="subject" class="text-sm font-medium text-gray-900">
                                        <?php _e('Subjek', 'k3s-cilodong'); ?>
                                    </label>
                                    <input
                                        type="text"
                                        id="subject"
                                        name="subject"
                                        required
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    >
                                </div>

                                <div class="space-y-2">
                                    <label for="message" class="text-sm font-medium text-gray-900">
                                        <?php _e('Pesan', 'k3s-cilodong'); ?>
                                    </label>
                                    <textarea
                                        id="message"
                                        name="message"
                                        rows="6"
                                        required
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    ></textarea>
                                </div>

                                <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <?php _e('Kirim Pesan', 'k3s-cilodong'); ?>
                                </button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="card mt-12">
            <div class="p-6">
                <?php if (get_theme_mod('google_maps_embed')) : ?>
                    <div class="aspect-[16/9]">
                        <?php echo get_theme_mod('google_maps_embed'); ?>
                    </div>
                <?php else : ?>
                    <div class="aspect-[16/9] bg-gray-100 rounded-lg flex items-center justify-center">
                        <p class="text-gray-500"><?php _e('Peta lokasi akan ditampilkan di sini', 'k3s-cilodong'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
