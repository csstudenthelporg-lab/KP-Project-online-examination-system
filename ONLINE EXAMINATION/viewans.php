<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$total = $exam->getTotalRows();
?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center justify-between mb-10 stagger-reveal">
        <div class="space-y-1">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight"><span class="text-gradient-primary">Review
                    Answers</span></h1>
            <p class="text-slate-500 text-sm font-medium">Total <?php echo $total; ?> Questions Reviewed</p>
        </div>
        <a href="exam.php"
            class="bg-white text-slate-600 border border-slate-200 px-6 py-3 rounded-xl font-bold hover:bg-slate-50 hover:text-slate-900 transition-colors flex items-center gap-2 text-xs uppercase tracking-widest shadow-sm">
            <i class="fas fa-times text-[10px]"></i>
            Exit Review
        </a>
    </div>

    <div class="space-y-6">
        <?php
        $getQues = $exam->getqueData();
        if ($getQues) {
            $delay = 0;
            while ($question = $getQues->fetch_assoc()) {
                $delay += 100; // Increment delay for stagger effect
                ?>
                <div class="bg-white border border-slate-200 rounded-[2rem] p-8 md:p-10 shadow-sm relative overflow-hidden group hover-lift stagger-reveal"
                    style="transition-delay: <?php echo $delay; ?>ms;">
                    <div class="flex items-start gap-5 mb-8">
                        <span
                            class="w-10 h-10 bg-blue-50 text-blue-600 border border-blue-100 rounded-xl flex items-center justify-center font-bold flex-shrink-0 text-sm">
                            <?php echo $question['quesNo']; ?>
                        </span>
                        <h3 class="text-xl font-bold text-slate-800 leading-snug pt-1">
                            <?php echo $question['ques']; ?>
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ml-0 md:ml-16">
                        <?php
                        $quesnumber = $question['quesNo'];
                        $answer = $exam->getAnswer($quesnumber);
                        if ($answer) {
                            while ($result = $answer->fetch_assoc()) {
                                $isCorrect = ($result['rightAns'] == '1');
                                ?>
                                <div
                                    class="p-5 rounded-2xl border transition-all <?php echo $isCorrect ? 'bg-emerald-50 border-emerald-200 text-emerald-800' : 'bg-slate-50 border-slate-100 text-slate-500'; ?>">
                                    <div class="flex items-center justify-between gap-4">
                                        <span class="text-sm font-bold"><?php echo $result['ans']; ?></span>
                                        <?php if ($isCorrect): ?>
                                            <div
                                                class="w-6 h-6 bg-emerald-500 text-white rounded-lg flex items-center justify-center text-[10px] shadow-sm shadow-emerald-500/20">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($isCorrect): ?>
                                        <p class="text-[9px] font-bold uppercase tracking-widest mt-2 text-emerald-600">Correct Answer</p>
                                    <?php endif; ?>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>

            <?php }
        } ?>
    </div>

    <div class="mt-12 text-center stagger-reveal" style="transition-delay: <?php echo $delay + 100; ?>ms;">
        <a href="exam.php"
            class="inline-flex items-center gap-3 bg-primary text-white px-12 py-5 rounded-xl font-bold hover:bg-primary-hover shadow-lg shadow-primary/20 transition-all transform active:scale-95 uppercase tracking-widest text-xs">
            Return to Dashboard
            <i class="fas fa-home text-[10px] opacity-70"></i>
        </a>
    </div>
</div>
<?php include 'inc/footer.php'; ?>