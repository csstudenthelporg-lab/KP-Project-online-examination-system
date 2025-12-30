<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/User.php');
$usr = new User();
?>

<?php
if (isset($_GET['dis'])) {
    $dblid = (int) $_GET['dis'];
    $dblUser = $usr->disableUser($dblid);
}

if (isset($_GET['ena'])) {
    $eblid = (int) $_GET['ena'];
    $eblUser = $usr->enaUser($eblid);
}

if (isset($_GET['del'])) {
    $delid = (int) $_GET['del'];
    $delUser = $usr->delUser($delid);
}
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Page Header -->
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-2">
            <h1 class="text-4xl font-bold text-slate-900 tracking-tight">Student Registry</h1>
            <p class="text-slate-500 text-md max-w-xl">Manage student accounts, permissions, and status.</p>
        </div>

        <!-- Alert Area -->
        <div class="w-full md:w-auto">
            <?php
            if (isset($dblUser))
                echo "<div class='p-4 mb-4 text-sm text-yellow-800 rounded-xl bg-yellow-50 border border-yellow-100 flex items-center gap-2'><i class='fas fa-exclamation-triangle'></i>" . $dblUser . "</div>";
            if (isset($eblUser))
                echo "<div class='p-4 mb-4 text-sm text-green-800 rounded-xl bg-green-50 border border-green-100 flex items-center gap-2'><i class='fas fa-check-circle'></i>" . $eblUser . "</div>";
            if (isset($delUser))
                echo "<div class='p-4 mb-4 text-sm text-red-800 rounded-xl bg-red-50 border border-red-100 flex items-center gap-2'><i class='fas fa-trash-alt'></i>" . $delUser . "</div>";
            ?>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th
                            class="px-8 py-5 text-xs font-bold text-slate-500 uppercase tracking-widest w-[80px] text-center">
                            #</th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-500 uppercase tracking-widest">Student
                            Information</th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-500 uppercase tracking-widest">Username</th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-500 uppercase tracking-widest">Email Address
                        </th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-500 uppercase tracking-widest text-center">
                            Status</th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-500 uppercase tracking-widest text-right">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php
                    $userData = $usr->getUserData();
                    if ($userData) {
                        $i = 0;
                        while ($result = $userData->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr class="hover:bg-slate-50/50 transition-all duration-200">
                                <td class="px-8 py-5 text-center font-bold text-slate-400 text-sm">
                                    <?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center font-bold text-sm shadow-sm">
                                            <?php echo substr($result['name'], 0, 1); ?>
                                        </div>
                                        <span class="font-bold text-slate-700"><?php echo $result['name']; ?></span>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-slate-500 font-mono text-xs">@<?php echo $result['userName']; ?></td>
                                <td class="px-8 py-5 text-slate-600 text-sm"><?php echo $result['email']; ?></td>
                                <td class="px-8 py-5 text-center">
                                    <?php if ($result['status'] == '0'): ?>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-bold uppercase rounded-full tracking-wider border border-emerald-100">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
                                        </span>
                                    <?php else: ?>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 bg-rose-50 text-rose-600 text-[10px] font-bold uppercase rounded-full tracking-wider border border-rose-100">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Disabled
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-8 py-5 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <?php if ($result['status'] == '0'): ?>
                                            <a onclick="return confirm('Are you sure you want to disable this student?')"
                                                href="?dis=<?php echo $result['userId']; ?>"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg text-amber-500 hover:bg-amber-50 border border-transparent hover:border-amber-100 transition-all"
                                                title="Disable User">
                                                <i class="fas fa-user-slash text-xs"></i>
                                            </a>
                                        <?php else: ?>
                                            <a onclick="return confirm('Are you sure you want to enable this student?')"
                                                href="?ena=<?php echo $result['userId']; ?>"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg text-emerald-500 hover:bg-emerald-50 border border-transparent hover:border-emerald-100 transition-all"
                                                title="Enable User">
                                                <i class="fas fa-user-check text-xs"></i>
                                            </a>
                                        <?php endif; ?>

                                        <a onclick="return confirm('Are you sure you want to remove this student?')"
                                            href="?del=<?php echo $result['userId']; ?>"
                                            class="w-8 h-8 flex items-center justify-center rounded-lg text-rose-500 hover:bg-rose-50 border border-transparent hover:border-rose-100 transition-all"
                                            title="Delete User">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="6" class="px-8 py-24 text-center">
                                <div class="flex flex-col items-center gap-4 opacity-40">
                                    <i class="fas fa-users-slash text-6xl"></i>
                                    <p class="text-sm font-bold uppercase tracking-widest">No students found in registry</p>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>