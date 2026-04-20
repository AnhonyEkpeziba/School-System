    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-12 pb-6 no-print">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- About -->
                <div>
                    <h3 class="text-xl font-bold mb-4"><?php echo getConfig('site_name'); ?></h3>
                    <p class="text-gray-300 text-sm"><?php echo getConfig('content.about.content'); ?></p>
                    <div class="flex space-x-3 mt-4">
                        <?php foreach(getConfig('social') as $platform => $url): ?>
                            <?php if($url): ?>
                                <a href="<?php echo $url; ?>" target="_blank" class="text-gray-400 hover:text-white">
                                    <i class="fab fa-<?php echo $platform; ?> text-xl"></i>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/pages/about.php" class="text-gray-300 hover:text-white">About Us</a></li>
                        <li><a href="/pages/academics.php" class="text-gray-300 hover:text-white">Academics</a></li>
                        <li><a href="/pages/admissions.php" class="text-gray-300 hover:text-white">Admissions</a></li>
                        <li><a href="/apply.php" class="text-gray-300 hover:text-white">Apply Online</a></li>
                        <li><a href="/pages/gallery.php" class="text-gray-300 hover:text-white">Gallery</a></li>
                        <li><a href="/pages/contact.php" class="text-gray-300 hover:text-white">Contact Us</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact Info</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start space-x-2">
                            <i class="fas fa-map-marker-alt mt-1"></i>
                            <span class="text-gray-300"><?php echo getConfig('contact.address'); ?></span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-phone"></i>
                            <span class="text-gray-300"><?php echo getConfig('contact.phone'); ?></span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-envelope"></i>
                            <span class="text-gray-300"><?php echo getConfig('contact.email'); ?></span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-clock"></i>
                            <span class="text-gray-300"><?php echo getConfig('contact.hours'); ?></span>
                        </li>
                    </ul>
                </div>
                
                <!-- Newsletter -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Newsletter</h3>
                    <p class="text-gray-300 text-sm mb-3">Subscribe to get updates about our seminary</p>
                    <form id="newsletterForm" class="space-y-2">
                        <input type="email" placeholder="Your email address" class="w-full px-3 py-2 rounded-lg text-gray-800">
                        <button type="submit" class="bg-primary w-full px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400 text-sm">
                <p>&copy; <?php echo date('Y'); ?> <?php echo getConfig('copyright'); ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-8 right-8 bg-primary text-white w-12 h-12 rounded-full hidden hover:bg-primary-dark transition shadow-lg no-print">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        });
        
        // Back to top button
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.classList.remove('hidden');
            } else {
                backToTop.classList.add('hidden');
            }
        });
        
        backToTop?.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        
        // Newsletter form
        document.getElementById('newsletterForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for subscribing! (Demo mode)');
            this.reset();
        });
        
        // Add fade-in animation to elements
        document.querySelectorAll('.fade-in-on-scroll').forEach(el => {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        observer.unobserve(entry.target);
                    }
                });
            });
            observer.observe(el);
        });
    </script>
</body>
</html>