<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/User.php');
include_once($filepath . '/../classes/Exam.php');

$user = new User();
$exam = new Exam();

// Fetch dynamic stats
$allUsers = $user->getUserData();
$totalUsers = ($allUsers) ? $allUsers->num_rows : 0;

$totalQuestions = $exam->getTotalRows();
?>

<!-- Animated Background Blobs -->
<div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none -z-10">
    <div
        class="absolute top-0 right-0 w-[600px] h-[600px] bg-indigo-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
    </div>
    <div
        class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-blue-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
    </div>
    <div
        class="absolute top-1/2 left-1/2 w-[600px] h-[600px] bg-purple-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000">
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Page Header -->
    <div class="mb-12 stagger-reveal delay-100">
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-2 tracking-tight">Admin Dashboard</h1>
        <p class="text-slate-500 font-medium">Overview of system metrics and student performance.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">

        <!-- Total Students Card -->
        <div
            class="glass-panel p-8 rounded-[2rem] hover:shadow-xl transition-all group stagger-reveal delay-100 border border-white/60">
            <div class="flex items-start justify-between mb-6">
                <div
                    class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform shadow-inner">
                    <i class="fas fa-users"></i>
                </div>
                <span
                    class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full uppercase tracking-wider">Active</span>
            </div>
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Total Students</h3>
            <p class="text-4xl font-black text-slate-900 mb-6 group-hover:text-blue-600 transition-colors">
                <?php echo $totalUsers; ?></p>
            <a href="users.php"
                class="text-blue-600 hover:text-blue-700 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">
                Directory
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>

        <!-- Total Questions Card -->
        <div
            class="glass-panel p-8 rounded-[2rem] hover:shadow-xl transition-all group stagger-reveal delay-200 border border-white/60">
            <div class="flex items-start justify-between mb-6">
                <div
                    class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform shadow-inner">
                    <i class="fas fa-layer-group"></i>
                </div>
                <span
                    class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full uppercase tracking-wider">Live</span>
            </div>
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Question Bank</h3>
            <p class="text-4xl font-black text-slate-900 mb-6 group-hover:text-indigo-600 transition-colors">
                <?php echo $totalQuestions; ?></p>
            <a href="queslist.php"
                class="text-indigo-600 hover:text-indigo-700 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">
                Manage Content
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>

        <!-- Quick Action Card -->
        <div
            class="p-8 rounded-[2rem] bg-gradient-to-br from-blue-600 to-indigo-700 text-white shadow-xl shadow-blue-600/20 hover:shadow-blue-600/30 transition-shadow group relative overflow-hidden stagger-reveal delay-300">
            <!-- Decorative circle -->
            <div
                class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full blur-2xl -mr-16 -mt-16 pointer-events-none">
            </div>

            <div class="flex items-start justify-between mb-6 relative z-10">
                <div
                    class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center text-2xl backdrop-blur-sm shadow-inner text-white">
                    <i class="fas fa-bolt"></i>
                </div>
            </div>
            <h3 class="text-xs font-bold text-blue-200 uppercase tracking-widest mb-2 relative z-10">Quick Action</h3>
            <p class="text-2xl font-bold mb-6 relative z-10 leading-tight">Create New Assessment</p>
            <a href="quesadd.php"
                class="inline-flex bg-white text-blue-700 hover:bg-blue-50 px-5 py-2.5 rounded-xl font-bold text-sm items-center gap-2 transition-all relative z-10 shadow-lg hover:-translate-y-0.5">
                Add Question
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 gap-8 stagger-reveal delay-300">

        <!-- Recent Students -->
        <div
            class="bg-white/60 backdrop-blur-md p-8 rounded-[2.5rem] border border-white/60 shadow-sm relative overflow-hidden">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Recent Registrations</h2>
                    <p class="text-sm text-slate-500 font-medium">New students joining the platform</p>
                </div>
                <a href="users.php" class="text-sm font-bold text-blue-600 hover:text-blue-700 hover:underline">View
                    All</a>
            </div>

            <div class="space-y-3">
                <?php if ($allUsers && $allUsers->num_rows > 0):
                    $allUsers->data_seek(0);
                    $count = 0;
                    while ($row = $allUsers->fetch_assoc()):
                        if ($count >= 5)
                            break;
                        $count++;
                        ?>
                        <div
                            class="flex items-center justify-between p-4 bg-white border border-slate-100 rounded-2xl hover:bg-blue-50/50 hover:border-blue-100 transition-all group shadow-sm hover:shadow-md">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-slate-100 to-slate-200 text-slate-600 rounded-xl flex items-center justify-center font-bold text-lg shadow-sm group-hover:from-blue-100 group-hover:to-blue-200 group-hover:text-blue-700 transition-all">
                                    <?php echo strtoupper(substr($row['name'], 0, 1)); ?>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-800 text-sm group-hover:text-blue-700 transition-colors">
                                        <?php echo $row['name']; ?></p>
                                    <p class="text-xs text-slate-500 font-medium tracking-wide">@<?php echo $row['userName']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span
                                    class="px-3 py-1 bg-green-50 text-green-600 text-[10px] font-bold uppercase rounded-full tracking-wider border border-green-100">Active</span>
                                <div
                                    class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-white hover:text-blue-600 transition-all cursor-pointer shadow-sm border border-slate-100">
                                    <i class="fas fa-ellipsis-v text-xs"></i>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; else: ?>
                    <div class="py-12 text-center text-slate-400">
                        <i class="fas fa-ghost text-4xl mb-4 opacity-30"></i>
                        <p class="font-bold text-xs uppercase tracking-widest">No students registered yet</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>