<?php
include_once 'lib/Session.php';
Session::init();
$hideNavbar = true;
?>
<?php include 'inc/header.php'; ?>

<!-- Top Navigation -->
<nav class="absolute top-0 w-full z-50 p-6">
	<div class="max-w-7xl mx-auto flex justify-end items-center">


		<div class="flex items-center gap-4 w-full md:w-auto justify-end">
			<a href="index.php" class="btn btn-secondary btn-sm">
				<i class="fas fa-sign-in-alt"></i> Login
			</a>
			<a href="admin/" class="btn btn-secondary btn-sm">
				<i class="fas fa-user-shield"></i> Admin
			</a>
		</div>
	</div>
</nav>

<div class="min-h-screen flex items-center justify-center bg-background px-4 py-20 relative overflow-hidden">
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
				<div
					class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm border border-white/50 stagger-reveal">
					<div
						class="w-8 h-8 bg-blue-600 text-white rounded-lg flex items-center justify-center shadow-lg shadow-blue-600/30">
						<i class="fas fa-rocket"></i>
					</div>
					<span class="font-bold text-slate-800">Start Your Journey</span>
				</div>

				<h1
					class="text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight stagger-reveal delay-100 tracking-tight">
					Create Your<br />
					<span class="text-gradient-primary">Student Account</span>
				</h1>

				<p
					class="text-lg text-slate-600 leading-relaxed stagger-reveal delay-200 max-w-lg mx-auto lg:mx-0 font-medium">
					Join thousands of students and access premium assessment tools, real-time analytics, and secure
					testing environments.
				</p>

				<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 stagger-reveal delay-300">
					<div
						class="bg-white/60 backdrop-blur-sm p-4 rounded-2xl shadow-sm border border-white/50 flex items-center gap-3 hover-lift transition-all">
						<div
							class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center text-lg">
							<i class="fas fa-bolt"></i>
						</div>
						<div class="text-left">
							<p class="font-bold text-slate-900 text-sm">Instant Results</p>
							<p class="text-xs text-slate-500 font-medium">Get feedback immediately</p>
						</div>
					</div>
					<div
						class="bg-white/60 backdrop-blur-sm p-4 rounded-2xl shadow-sm border border-white/50 flex items-center gap-3 hover-lift transition-all">
						<div
							class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-lg">
							<i class="fas fa-check-circle"></i>
						</div>
						<div class="text-left">
							<p class="font-bold text-slate-900 text-sm">Secure Platform</p>
							<p class="text-xs text-slate-500 font-medium">Data protection guaranteed</p>
						</div>
					</div>
				</div>
			</div>

			<!-- Right Side: Register Form -->
			<div class="w-full stagger-reveal delay-200">
				<div
					class="bg-white/80 backdrop-blur-xl rounded-[2rem] shadow-xl border border-white/50 p-8 md:p-10 animate-float hover:shadow-2xl transition-shadow duration-500">
					<div class="mb-8">
						<h2 class="text-2xl font-bold text-gray-900 mb-2">Create Account</h2>
						<p class="text-gray-600 text-sm">Enter your details to register</p>
					</div>

					<form id="registerForm" method="post" onsubmit="return false;" class="space-y-5">

						<!-- Name -->
						<div class="form-group">
							<label for="name" class="form-label">Full Name</label>
							<div class="relative group">
								<span
									class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-primary transition-colors">
									<i class="fas fa-user"></i>
								</span>
								<input type="text" id="name" name="name" class="form-input pl-12"
									placeholder="e.g. John Doe" required>
							</div>
						</div>

						<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
							<!-- Username -->
							<div class="form-group">
								<label for="userName" class="form-label">Username</label>
								<div class="relative group">
									<span
										class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-primary transition-colors">
										<i class="fas fa-at"></i>
									</span>
									<input type="text" id="userName" name="userName" class="form-input pl-12"
										placeholder="john_doe" required>
								</div>
							</div>

							<!-- Email -->
							<div class="form-group">
								<label for="email" class="form-label">Email Address</label>
								<div class="relative group">
									<span
										class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-primary transition-colors">
										<i class="fas fa-envelope"></i>
									</span>
									<input type="email" id="email" name="email" class="form-input pl-12"
										placeholder="example@edu.com" required>
								</div>
							</div>
						</div>

						<!-- Password -->
						<div class="form-group">
							<label for="password" class="form-label">Password</label>
							<div class="relative group">
								<span
									class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-primary transition-colors">
									<i class="fas fa-lock"></i>
								</span>
								<input type="password" id="password" name="password" class="form-input pl-12 pr-12"
									placeholder="Create a strong password" required>
								<span data-target="password"
									class="toggle-password absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 cursor-pointer hover:text-gray-600">
									<i class="fas fa-eye"></i>
								</span>
							</div>
						</div>

						<button type="submit" id="registersubm"
							class="btn btn-primary btn-lg w-full transform active:scale-95 transition-transform duration-200 btn-glow">
							<i class="fas fa-user-plus"></i>
							Create Account
						</button>
					</form>

					<div class="mt-8 pt-6 border-t border-gray-100 text-center">
						<p class="text-sm text-gray-600">
							Already have an account?
							<a href="index.php" class="text-primary hover:text-primary-hover font-semibold">Login
								here</a>
						</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php include 'inc/footer.php'; ?>