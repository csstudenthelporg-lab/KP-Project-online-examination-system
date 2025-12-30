<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$question = $exam->getQuestion();
$total = $exam->getTotalRows();

if (!$question) {
    header("Location:exam.php?error=noques");
    exit();
}
?>

<div class="container mx-auto px-4 py-12">
    <!-- Header/Hero -->
    <div class="max-w-4xl mx-auto text-center mb-12">
        <div
            class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 text-primary rounded-2xl mb-6 shadow-sm">
            <i class="fas fa-file-signature text-2xl"></i>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Exam Instructions</h1>
        <p class="text-gray-600 text-lg">Please review the guidelines below before starting your assessment.</p>
    </div>

    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Exam Details Card -->
        <div class="card bg-white shadow-md border border-gray-100 p-8">
            <h3 class="flex items-center gap-3 text-lg font-bold text-gray-900 mb-6">
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i class="fas fa-info-circle text-sm"></i>
                </div>
                Exam Overview
            </h3>

            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wide">Total Questions</span>
                    <span class="text-lg font-bold text-gray-900"><?php echo $total; ?></span>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wide">Question Type</span>
                    <span class="text-sm font-semibold text-gray-700">Multiple Choice</span>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wide">Passing Score</span>
                    <span class="text-sm font-bold text-green-600">50%</span>
                </div>
            </div>
        </div>

        <!-- Rules Card -->
        <div class="card bg-white shadow-md border border-gray-100 p-8">
            <h3 class="flex items-center gap-3 text-lg font-bold text-gray-900 mb-6">
                <div class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center">
                    <i class="fas fa-shield-alt text-sm"></i>
                </div>
                Critical Rules
            </h3>

            <ul class="space-y-4">
                <li class="flex gap-4">
                    <div class="pt-1.5">
                        <div class="w-1.5 h-1.5 rounded-full bg-red-500"></div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">Do not minimize the browser or switch tabs during
                        the exam.</p>
                </li>
                <li class="flex gap-4">
                    <div class="pt-1.5">
                        <div class="w-1.5 h-1.5 rounded-full bg-red-500"></div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">Ensure you have a stable internet connection before
                        starting.</p>
                </li>
                <li class="flex gap-4">
                    <div class="pt-1.5">
                        <div class="w-1.5 h-1.5 rounded-full bg-red-500"></div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">Once the exam starts, the timer cannot be paused.
                    </p>
                </li>
            </ul>
        </div>
    </div>

    <!-- Actions -->
    <div class="max-w-4xl mx-auto mt-12 flex flex-col sm:flex-row items-center justify-center gap-4">
        <a href="exam.php" class="btn btn-secondary w-full sm:w-auto text-center">
            Go Back
        </a>
        <a href="test.php?q=<?php echo $question['quesNo']; ?>" onclick="localStorage.removeItem('exam_time_left');"
            class="btn btn-primary btn-lg w-full sm:w-auto text-center flex items-center justify-center gap-2">
            Start Examination
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</div>

<?php include 'inc/footer.php'; ?>