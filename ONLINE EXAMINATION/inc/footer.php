</main>

<footer class="relative bg-slate-50 pt-20 pb-10 overflow-hidden font-sans">
    <!-- Subtle Background Pattern -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" 
         style="background-image: radial-gradient(#4F46E5 1px, transparent 1px); background-size: 32px 32px;">
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <!-- Brand / Mission -->
            <div class="space-y-6 stagger-reveal delay-100">
                <h3 class="text-lg font-bold text-slate-900">
                    Our Mission
                </h3>
                <p class="text-slate-600 text-sm leading-relaxed font-medium max-w-xs">
                    Empowering the next generation of learners with a secure, intuitive, and modern examination platform. Excellence in every test.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-white hover:bg-blue-600 hover:border-blue-600 transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-white hover:bg-blue-600 hover:border-blue-600 transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-white hover:bg-blue-600 hover:border-blue-600 transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>

            <!-- Resources -->
            <div class="stagger-reveal delay-150">
                <h3 class="text-lg font-bold text-slate-900 mb-6">
                    Resources
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="group flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-blue-500 group-hover:scale-125 transition-all"></span>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Study Guides</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="group flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-blue-500 group-hover:scale-125 transition-all"></span>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Success Stories</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="group flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-blue-500 group-hover:scale-125 transition-all"></span>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Knowledge Base</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="group flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-blue-500 group-hover:scale-125 transition-all"></span>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Help Center</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Navigation -->
            <div class="stagger-reveal delay-200">
                <h3 class="text-lg font-bold text-slate-900 mb-6">
                    Platform
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="exam.php" class="group flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
                            <i class="fas fa-chevron-right text-[10px] text-slate-300 group-hover:text-blue-500 transition-colors"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php" class="group flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
                            <i class="fas fa-chevron-right text-[10px] text-slate-300 group-hover:text-blue-500 transition-colors"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="register.php" class="group flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
                            <i class="fas fa-chevron-right text-[10px] text-slate-300 group-hover:text-blue-500 transition-colors"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Student Registration</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="stagger-reveal delay-300">
                <h3 class="text-lg font-bold text-slate-900 mb-6">
                    Stay Updated
                </h3>
                <p class="text-slate-500 text-sm mb-4 font-medium">
                    Get the latest updates and exam tips directly in your inbox.
                </p>
                <form class="flex items-center gap-2" onsubmit="event.preventDefault();">
                    <div class="relative flex-1">
                        <input type="email" placeholder="Email address" 
                               class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 transition-all placeholder:text-slate-400">
                    </div>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-4 py-2.5 transition-colors shadow-md hover:shadow-lg active:scale-95">
                        <i class="fas fa-arrow-right text-sm"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-slate-200 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-semibold uppercase tracking-widest text-slate-400">
            <p>&copy; <?php echo date('Y'); ?> ExamPro System. All rights reserved.</p>
            <div class="flex gap-8">
                <a href="#" class="hover:text-blue-600 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-blue-600 transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-blue-600 transition-colors">Admin</a>
            </div>
        </div>
    </div>
</footer>

<script>
	// Toggle Password Visibility
	document.querySelectorAll('.toggle-password').forEach(button => {
		button.addEventListener('click', function () {
			const targetId = this.getAttribute('data-target');
			const input = document.getElementById(targetId) || document.getElementsByName(targetId)[0];
			const icon = this.querySelector('i');

			if (input.type === 'password') {
				input.type = 'text';
				icon.classList.remove('fa-eye');
				icon.classList.add('fa-eye-slash');
			} else {
				input.type = 'password';
				icon.classList.remove('fa-eye-slash');
				icon.classList.add('fa-eye');
			}
		});
	});
</script>
</body>

</html>