</main><!-- #main -->

<footer class="site-footer">
    <div class="footer-content">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Organization Info -->
            <div>
                <h3 class="text-lg font-semibold text-blue-600 mb-4">
                    <?php bloginfo('name'); ?>
                </h3>
                <p class="text-gray-600 mb-4">
                    Kelompok Kerja Kepala Sekolah (K3S) Kecamatan Cilodong merupakan wadah kolaborasi 
                    dan pengembangan profesional kepala sekolah di wilayah Kecamatan Cilodong, Kota Depok.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Tautan Cepat</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class' => 'space-y-2',
                    'container' => false,
                    'fallback_cb' => false,
                ));
                ?>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Kontak</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>Sekretariat K3S Kecamatan Cilodong</li>
                    <li>Kota Depok, Jawa Barat</li>
                    <li>Email: <?php echo esc_html(get_theme_mod('contact_email', 'info@k3scilodong.org')); ?></li>
                    <li>WhatsApp: <?php echo esc_html(get_theme_mod('contact_phone', '+62 xxx-xxxx-xxxx')); ?></li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-8 pt-8 border-t border-gray-200">
            <p class="text-center text-gray-500">
                © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. 
                <?php esc_html_e('Hak Cipta Dilindungi.', 'k3s-cilodong'); ?>
            </p>
        </div>
    </div>
</footer>

<!-- Mobile Menu Script -->
<script>
document.getElementById('mobile-menu-button').addEventListener('click', function() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
});
</script>

<?php wp_footer(); ?>
</body>
</html>
