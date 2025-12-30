<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/loginheader.php');
include_once($filepath . '/../classes/Admin.php');
$ad = new Admin();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminData = $ad->getAdminData($_POST);
}
?>

<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 py-12">
    <div class="w-full max-w-md">

        <!-- Brand -->
        <div class="text-center mb-8">
            <div
                class="inline-flex items-center justify-center w-12 h-12 bg-primary text-white rounded-xl mb-4 shadow-lg shadow-primary/20">
                <i class="fas fa-shield-alt text-lg"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900">Admin Portal</h1>
            <p class="text-sm text-gray-500 mt-1">Authorized personnel only</p>
        </div>

        <div class="card shadow-xl border-0">
            <?php if (isset($adminData)): ?>
                <div class="mb-6">
                    <div
                        class="p-3 bg-red-50 border border-red-100 text-red-700 text-sm rounded-lg flex items-center gap-2">
                        <i class="fas fa-exclamation-circle"></i>
                        <?php echo $adminData; ?>
                    </div>
                </div>
            <?php endif; ?>

            <form action="login.php" method="post" class="space-y-5">
                <!-- Username -->
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="fas fa-user-shield"></i>
                        </span>
                        <input type="text" name="adminUser" class="form-input pl-12" placeholder="Enter admin username"
                            required />
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="password" name="adminPass" class="form-input pl-12 pr-12"
                            placeholder="Enter secure password" required />
                        <span
                            class="toggle-password absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 cursor-pointer hover:text-gray-600">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-full">
                    <i class="fas fa-sign-in-alt"></i>
                    Access Dashboard
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <a href="../index.php"
                    class="text-sm text-gray-500 hover:text-primary transition-colors flex items-center justify-center gap-2">
                    <i class="fas fa-arrow-left"></i>
                    Return to Student Portal
                </a>
            </div>
        </div>

        <div class="mt-8 text-center">
            <p class="text-xs text-gray-400">
                &copy; <?php echo date('Y'); ?> ExamPro Management System
            </p>
        </div>
    </div>
</div>

<script>
    // Toggle Password Visibility
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function () {
            const input = this.previousElementSibling;
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