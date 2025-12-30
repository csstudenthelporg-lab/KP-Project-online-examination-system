<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div
        class="bg-white border border-slate-200 rounded-[3rem] p-10 md:p-16 shadow-2xl text-center relative overflow-hidden">
        <!-- Success Animation/Icon -->
        <div class="relative z-10">
            <div
                class="w-24 h-24 bg-green-50 text-green-500 rounded-3xl flex items-center justify-center mx-auto mb-8 text-4xl shadow-sm">
                <i class="fas fa-check-circle"></i>
            </div>

            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4 tracking-tight">Exam Completed!</h1>
            <p class="text-slate-500 text-lg mb-12 max-w-md mx-auto font-medium">Congratulations! You have successfully
                submitted your examination. Here is your final result.</p>

            <!-- Score Display -->
            <div class="relative inline-block mb-12">
                <div class="relative bg-slate-50 border border-slate-100 rounded-[2.5rem] p-12 shadow-sm min-w-[280px]">
                    <span class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Final
                        Score</span>
                    <h2 class="text-8xl font-black text-primary tracking-tighter">
                        <?php
                        if (isset($_SESSION['score'])) {
                            echo $_SESSION['score'];
                        } else {
                            echo "0";
                        }
                        ?>
                    </h2>
                    <p class="text-slate-400 font-bold mt-4 uppercase tracking-widest text-[10px]">Excellent Effort!</p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="viewans.php"
                    class="w-full sm:w-auto bg-primary hover:bg-primary-hover text-white font-bold px-10 py-5 rounded-xl shadow-lg shadow-primary/20 transition-all transform active:scale-95 flex items-center justify-center gap-3 text-xs uppercase tracking-widest">
                    <i class="fas fa-eye text-[10px] opacity-70"></i>
                    Review Answers
                </a>
                <a href="exam.php"
                    class="w-full sm:w-auto bg-white border border-slate-200 text-slate-600 font-bold px-10 py-5 rounded-xl hover:bg-slate-50 transition-all flex items-center justify-center gap-3 text-xs uppercase tracking-widest">
                    <i class="fas fa-home text-[10px] opacity-70"></i>
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    localStorage.removeItem('exam_time_left');
</script>

<?php include 'inc/footer.php'; ?>