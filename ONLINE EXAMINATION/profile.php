<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$userId = Session::get("userId");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userProfile = $user->getUserPData($userId, $_POST);
}
?>

<div class="min-h-screen bg-gray-50 px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div class="space-y-1">
                <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Student Profile</h1>
                <p class="text-gray-500 text-sm font-medium">Manage your personal information and account settings.</p>
            </div>
            <div
                class="flex items-center gap-3 bg-white px-5 py-3 rounded-2xl border border-gray-100 shadow-sm shadow-gray-200/50">
                <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                    <i class="fas fa-user-circle text-xl"></i>
                </div>
                <div class="text-left">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">
                        Authenticated</p>
                    <p class="text-xs font-bold text-gray-900"><?php echo Session::get("userName"); ?></p>
                </div>
            </div>
        </div>

        <?php if (isset($userProfile)): ?>
            <div
                class="mb-8 p-4 rounded-xl bg-blue-50 border border-blue-100 text-blue-600 text-sm font-semibold flex items-center gap-3">
                <i class="fas fa-info-circle"></i>
                <?php echo $userProfile; ?>
            </div>
        <?php endif; ?>

        <div class="bg-white border border-gray-200 rounded-[2rem] shadow-lg overflow-hidden relative">
            <div class="p-8 md:p-12 relative z-10">
                <form action="" method="post" class="space-y-8">
                    <?php
                    $getData = $user->getUserProfile($userId);
                    if ($getData) {
                        while ($result = $getData->fetch_assoc()) {
                            ?>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Full Name -->
                                <div class="space-y-2">
                                    <label for="name" class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1">Full
                                        Name</label>
                                    <div class="relative group">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-primary transition-colors">
                                            <i class="fas fa-signature"></i>
                                        </span>
                                        <input type="text" name="name" id="name" value="<?php echo $result['name']; ?>"
                                            class="w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none text-gray-900 font-semibold placeholder-gray-400"
                                            placeholder="Enter Full Name">
                                    </div>
                                </div>

                                <!-- Username -->
                                <div class="space-y-2">
                                    <label for="userName"
                                        class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1">Username</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                            <i class="fas fa-at"></i>
                                        </span>
                                        <input type="text" name="userName" id="userName"
                                            value="<?php echo $result['userName']; ?>"
                                            class="w-full pl-11 pr-4 py-3.5 bg-gray-100 border border-gray-200 rounded-xl text-gray-500 font-bold cursor-not-allowed"
                                            readonly>
                                    </div>
                                    <p class="text-[10px] text-gray-400 ml-1 font-medium">Username cannot be changed.</p>
                                </div>

                                <!-- Email Address -->
                                <div class="space-y-2 md:col-span-2">
                                    <label for="email"
                                        class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1">Email
                                        Address</label>
                                    <div class="relative group">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-primary transition-colors">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" name="email" id="email" value="<?php echo $result['email']; ?>"
                                            class="w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none text-gray-900 font-semibold placeholder-gray-400"
                                            placeholder="Enter Email Address">
                                    </div>
                                </div>
                            </div>

                            <div class="pt-8 border-t border-gray-100 flex flex-col sm:flex-row items-center gap-4">
                                <button type="submit" id="profileUpdate"
                                    class="w-full sm:w-auto btn btn-primary px-10 py-4 rounded-xl shadow-lg shadow-primary/20 transition-all transform active:scale-95 flex items-center justify-center gap-2 text-xs uppercase tracking-widest font-bold">
                                    <i class="fas fa-save text-[10px]"></i>
                                    Save Changes
                                </button>
                                <a href="exam.php"
                                    class="w-full sm:w-auto text-center text-gray-500 font-bold px-8 py-4 rounded-xl hover:text-gray-900 hover:bg-gray-50 transition-all text-xs uppercase tracking-widest">
                                    Cancel
                                </a>
                            </div>

                        <?php }
                    } ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>