<?php
include_once 'lib/Session.php';
Session::init();
Session::checkLogin();
$hideNavbar = true;
?>
<?php include 'inc/header.php'; ?>

<!-- Top Navigation -->
<nav class="absolute top-0 w-full z-50 p-6">
	<div class="max-w-7xl mx-auto flex justify-between items-center">
		<!-- Brand -->
		<div class="flex items-center">
			<div
				class="group inline-flex items-center gap-3 bg-white/90 backdrop-blur-md px-5 py-2.5 rounded-full shadow-sm border border-white/50 transition-all hover:scale-105 hover:shadow-md cursor-default">
				<div
					class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30 text-lg group-hover:rotate-12 transition-transform duration-300">
					<i class="fas fa-graduation-cap"></i>
				</div>
				<span
					class="font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-slate-900 to-blue-800 text-lg tracking-tight">ExamPro</span>
			</div>
		</div>

		<div class="flex items-center gap-4 w-full md:w-auto justify-end">
			<a href="register.php" class="btn btn-primary btn-sm">
				<i class="fas fa-user-plus"></i> Register
			</a>
			<a href="admin/" class="btn btn-secondary btn-sm">
				<i class="fas fa-user-shield"></i> Admin Panel
			</a>
		</div>
	</div>
</nav>

<div class="min-h-screen flex items-center justify-center bg-background px-4 py-12 relative overflow-hidden">
	<!-- Animated Background Blobs -->
	<div
		class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
	</div>
	<div
		class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
	</div>
	<div
		class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
	</div>

	<div class="w-full max-w-6xl relative z-10">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

			<!-- Left Side: Hero Content -->
			<div class="text-center lg:text-left space-y-6">


				<h1
					class="text-4xl md:text-6xl font-extrabold text-slate-900 leading-tight stagger-reveal delay-100 tracking-tight">
					Welcome to<br />
					<span class="text-gradient-primary">Online Examination</span><br />
					System
				</h1>

				<p
					class="text-lg text-slate-600 leading-relaxed stagger-reveal delay-200 max-w-lg mx-auto lg:mx-0 font-medium">
					A modern, secure, and user-friendly platform designed to help students excel in their academic
					assessments with confidence.
				</p>

				<div class="flex flex-wrap justify-center lg:justify-start gap-6 pt-4 stagger-reveal delay-300">
					<div
						class="flex items-center gap-3 hover-lift p-3 bg-white/50 backdrop-blur-sm rounded-2xl border border-white/50 transition-all">
						<div
							class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-lg">
							<i class="fas fa-shield-alt"></i>
						</div>
						<div>
							<p class="font-bold text-slate-900 text-sm">Secure Testing</p>
							<p class="text-xs text-slate-500 font-medium">Protected environment</p>
						</div>
					</div>
					<div
						class="flex items-center gap-3 hover-lift p-3 bg-white/50 backdrop-blur-sm rounded-2xl border border-white/50 transition-all">
						<div
							class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-lg">
							<i class="fas fa-clock"></i>
						</div>
						<div>
							<p class="font-bold text-slate-900 text-sm">Instant Results</p>
							<p class="text-xs text-slate-500 font-medium">Real-time scoring</p>
						</div>
					</div>
				</div>
			</div>

			<!-- Right Side: Login Form -->
			<div class="w-full stagger-reveal delay-200">
				<div
					class="bg-white/80 backdrop-blur-xl rounded-[2rem] shadow-xl border border-white/50 p-8 md:p-10 animate-float hover:shadow-2xl transition-shadow duration-500">
					<div class="mb-8">
						<h2 class="text-2xl font-bold text-gray-900 mb-2">Student Login</h2>
						<p class="text-gray-600 text-sm">Enter your credentials to access your dashboard</p>
					</div>

					<form id="loginForm" method="post" onsubmit="return false;" class="space-y-6">
						<!-- Email Input -->
						<div class="form-group">
							<label for="email" class="form-label">Email Address</label>
							<div class="relative group">
								<span
									class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-primary transition-colors">
									<i class="fas fa-envelope"></i>
								</span>
								<input type="email" id="email" name="email" class="form-input pl-12"
									placeholder="student@example.com" required />
							</div>
						</div>

						<!-- Password Input -->
						<div class="form-group">
							<div class="flex justify-between items-center mb-2">
								<label for="password" class="form-label mb-0">Password</label>
								<a href="#" class="text-xs text-primary hover:text-primary-hover font-semibold">Forgot
									Password?</a>
							</div>
							<div class="relative group">
								<span
									class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-primary transition-colors">
									<i class="fas fa-lock"></i>
								</span>
								<input type="password" id="password" name="password" class="form-input pl-12 pr-12"
									placeholder="Enter your password" required />
								<span data-target="password"
									class="toggle-password absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 cursor-pointer hover:text-gray-600">
									<i class="fas fa-eye"></i>
								</span>
							</div>
						</div>

						<button type="submit" id="loginsubm"
							class="btn btn-primary btn-lg w-full transform active:scale-95 transition-transform duration-200">
							<i class="fas fa-sign-in-alt"></i>
							Sign In
						</button>
					</form>

					<div class="mt-8 pt-6 border-t border-gray-100 text-center">
						<p class="text-sm text-gray-600">
							Don't have an account?
							<a href="register.php" class="text-primary hover:text-primary-hover font-semibold">Create
								Account</a>
						</p>
						<p class="text-xs text-gray-500 mt-3">
							<a href="admin/" class="hover:text-gray-700 transition-colors">Admin Portal</a>
						</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php include 'inc/footer.php'; ?>