<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/Exam.php');
$exam = new Exam();
?>
<?php
if (isset($_GET['delque'])) {
    $quesNo = (int) $_GET['delque'];
    $delresult = $exam->getdelresult($quesNo);
}
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-2">
            <h1 class="text-4xl font-bold text-slate-900 tracking-tight">Question Registry</h1>
            <p class="text-slate-500 text-md max-w-xl">View and manage all examination inquiry modules.</p>
        </div>
        <a href="quesadd.php"
            class="bg-primary text-white hover:bg-primary-hover px-8 py-3.5 rounded-xl font-bold shadow-md transition-all flex items-center gap-3 text-sm">
            <i class="fas fa-plus"></i>
            Add New Question
        </a>
    </div>

    <?php if (isset($delresult)): ?>
        <div class="mb-8">
            <div
                class="p-4 rounded-xl border border-red-100 bg-red-50 text-red-800 text-sm font-semibold flex items-center gap-3">
                <i class="fas fa-trash-alt"></i>
                <?php echo strip_tags($delresult); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-8 py-5 text-xs font-bold text-slate-500 uppercase tracking-widest w-[100px]">ID
                        </th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-500 uppercase tracking-widest">Question
                            Details</th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-500 uppercase tracking-widest text-right">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php
                    $questionData = $exam->getqueData();
                    if ($questionData) {
                        $i = 0;
                        while ($result = $questionData->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr class="hover:bg-slate-50/50 transition-all duration-200">
                                <td class="px-8 py-6">
                                    <span
                                        class="w-10 h-10 bg-slate-100 text-slate-700 rounded-lg flex items-center justify-center font-bold text-sm">
                                        <?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="bg-white border border-slate-100 p-5 rounded-xl">
                                        <p class="text-slate-800 font-medium text-base">
                                            <?php echo $result['ques']; ?>
                                        </p>
                                        <div class="mt-3 flex items-center gap-3">
                                            <span
                                                class="px-2.5 py-1 bg-slate-100 text-slate-500 text-[10px] font-bold uppercase rounded-md tracking-wider">Active
                                                Module</span>
                                            <span class="text-[10px] text-slate-400 font-medium">Ref:
                                                QX-<?php echo $result['quesNo']; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <a onclick="return confirm('Confirm deletion of this question?')"
                                        href="?delque=<?php echo $result['quesNo']; ?>"
                                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-rose-50 text-rose-600 border border-rose-100 rounded-lg text-xs font-bold hover:bg-rose-600 hover:text-white transition-all active:scale-95">
                                        <i class="fas fa-trash-alt"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="3" class="px-8 py-24 text-center">
                                <div class="flex flex-col items-center gap-4 opacity-40">
                                    <i class="fas fa-database text-6xl"></i>
                                    <p class="text-sm font-bold uppercase tracking-widest">No questions found in registry
                                    </p>
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