<?php
ob_start();
include 'inc/header.php';
Session::checkSession();

if (isset($_GET['q'])) {
    $quesnumber = (int) $_GET['q'];
} else {
    header("Location:exam.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pro->getProcessData($_POST);
    exit();
}

$total = $exam->getTotalRows();
$question = $exam->getQuestionNumber($quesnumber);

// Safety Check: If question doesn't exist
if (!$question) {
    header("Location:exam.php?error=notfound");
    exit();
}
?>

<div class="min-h-screen bg-gray-50 pb-20">
    <!-- Fixed Exam Sub-Header -->
    <div class="sticky top-16 z-40 bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <!-- Branding/Icon -->
                <div
                    class="hidden sm:inline-flex items-center gap-2 px-3 py-1 bg-blue-50 border border-blue-100 rounded-lg text-primary">
                    <i class="fas fa-graduation-cap text-xs"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest">Exam Portal</span>
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Question</span>
                    <div class="flex items-baseline gap-1">
                        <span class="text-xl font-bold text-gray-900"><?php echo $question['quesNo']; ?></span>
                        <span class="text-sm font-medium text-gray-400">/ <?php echo $total; ?></span>
                    </div>
                </div>
            </div>

            <!-- Timer Area -->
            <div id="exam-timer-container"
                class="flex items-center gap-3 bg-gray-900 px-5 py-2 rounded-lg shadow-sm transition-colors duration-300">
                <i class="fas fa-clock text-white/80 animate-pulse text-sm"></i>
                <span id="exam-timer" class="text-white font-mono font-bold text-lg tabular-nums">00:00</span>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="w-full h-1 bg-gray-100">
            <div class="h-full bg-primary transition-all duration-700 ease-out"
                style="width: <?php echo ($question['quesNo'] / $total) * 100; ?>%"></div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8 relative z-10">

            <!-- Main Exam Content -->
            <div class="flex-grow space-y-6">
                <div class="card shadow-md">
                    <form id="examForm" method="post" action="" class="space-y-8">

                        <!-- Question Header -->
                        <div>
                            <span
                                class="inline-block px-3 py-1 bg-gray-100 text-gray-500 rounded-lg text-[10px] font-bold uppercase tracking-widest mb-4">
                                Multiple Choice
                            </span>
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">
                                <?php echo $question['ques']; ?>
                            </h2>
                        </div>

                        <!-- Options List -->
                        <div class="grid grid-cols-1 gap-3">
                            <?php
                            $answer = $exam->getAnswer($quesnumber);
                            if ($answer) {
                                while ($result = $answer->fetch_assoc()) {
                                    ?>
                                    <label
                                        class="group relative flex items-center p-5 bg-white border-2 border-gray-100 rounded-xl cursor-pointer hover:border-primary/30 hover:bg-blue-50/30 transition-all duration-200">
                                        <input type="radio" name="ans" value="<?php echo $result['id']; ?>" class="peer hidden"
                                            required>

                                        <!-- Custom Checkbox -->
                                        <div
                                            class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center mr-4 peer-checked:border-primary peer-checked:bg-primary transition-all duration-200 group-hover:border-primary/50">
                                            <i
                                                class="fas fa-check text-white text-[10px] opacity-0 peer-checked:opacity-100 transition-opacity"></i>
                                        </div>

                                        <span
                                            class="text-base font-medium text-gray-700 peer-checked:text-primary peer-checked:font-bold transition-colors">
                                            <?php echo $result['ans']; ?>
                                        </span>
                                    </label>
                                <?php }
                            } ?>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-8 border-t border-gray-100 flex flex-wrap items-center justify-between gap-6">
                            <input type="hidden" name="quesnumber" value="<?php echo $quesnumber; ?>" />

                            <div class="order-2 lg:order-1">
                                <p
                                    class="text-gray-400 text-[10px] font-bold uppercase tracking-widest flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Response Auto-sync
                                </p>
                            </div>

                            <div class="order-1 lg:order-2 w-full lg:w-auto">
                                <button type="submit" name="submit"
                                    class="w-full lg:w-auto btn btn-primary btn-lg flex items-center justify-center gap-3">
                                    <?php echo ($quesnumber == $total) ? 'Finish & Submit' : 'Next Question'; ?>
                                    <i
                                        class="fas <?php echo ($quesnumber == $total) ? 'fa-check-double' : 'fa-arrow-right'; ?> text-xs opacity-80"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Question Palette Sidebar -->
            <div class="w-full lg:w-80 space-y-6">
                <div class="card shadow-md sticky top-48">
                    <h3
                        class="text-xs font-bold text-gray-900 mb-6 flex items-center justify-between uppercase tracking-widest">
                        <span>Palette</span>
                        <span class="text-primary bg-blue-50 px-2 py-1 rounded text-[10px]"><?php echo $total; ?>
                            Questions</span>
                    </h3>

                    <div class="grid grid-cols-5 gap-2">
                        <?php for ($i = 1; $i <= $total; $i++) {
                            $isActive = ($i == $quesnumber);
                            $isAttempted = ($i < $quesnumber);

                            // Determine classes based on state
                            $classes = "w-full aspect-square flex items-center justify-center rounded-lg text-xs font-bold transition-all border ";
                            if ($isActive) {
                                $classes .= "bg-primary text-white border-primary shadow-md shadow-blue-200";
                            } elseif ($isAttempted) {
                                $classes .= "bg-gray-800 text-white border-gray-800";
                            } else {
                                $classes .= "bg-gray-50 text-gray-500 border-gray-100 hover:border-primary/30 hover:text-primary";
                            }
                            ?>
                            <a href="test.php?q=<?php echo $i; ?>" class="<?php echo $classes; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php } ?>
                    </div>

                    <!-- Legend -->
                    <div class="mt-8 pt-6 border-t border-gray-100 space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded bg-primary"></div>
                            <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Current</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded bg-gray-800"></div>
                            <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Attempted</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded bg-gray-50 border border-gray-200"></div>
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Pending</span>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="button" onclick="confirmSubmit()"
                            class="w-full py-3 border border-red-200 text-red-500 bg-red-50 rounded-lg text-xs font-bold uppercase tracking-widest hover:bg-red-100 hover:text-red-600 transition-all">
                            Exit Exam
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="finishModal" class="fixed inset-0 z-[60] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="toggleModal(false)"></div>

    <div class="flex items-center justify-center min-h-screen p-4">
        <div
            class="relative bg-white rounded-2xl shadow-xl max-w-md w-full p-8 text-center animate-up transform transition-all">
            <div
                class="w-16 h-16 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-exclamation-triangle text-2xl"></i>
            </div>

            <h3 class="text-xl font-bold text-gray-900 mb-2">Submit Examination?</h3>
            <p class="text-gray-500 text-sm mb-8">
                Are you sure you want to finish the exam? This action cannot be undone and your responses will be final.
            </p>

            <div class="flex flex-col gap-3">
                <button type="button" onclick="submitExamNow()" class="btn btn-primary w-full justify-center">
                    Yes, Submit Exam
                </button>
                <button type="button" onclick="toggleModal(false)"
                    class="btn bg-gray-100 text-gray-700 hover:bg-gray-200 w-full justify-center">
                    Return to Questions
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleModal(show) {
        document.getElementById('finishModal').classList.toggle('hidden', !show);
    }

    function confirmSubmit() {
        toggleModal(true);
    }

    function submitExamNow() {
        window.location.href = "final.php";
    }

    // --- Core Timer Logic ---
    (function () {
        const EXAM_DURATION = 15 * 60; // 15 minutes
        const timerElement = document.getElementById('exam-timer');
        const containerElement = document.getElementById('exam-timer-container');

        if (!timerElement) return;

        function updateDisplay(seconds) {
            if (isNaN(seconds) || seconds < 0) seconds = 0;
            const mins = Math.floor(seconds / 60);
            const secs = seconds % 60;
            const display = (mins < 10 ? "0" + mins : mins) + ":" + (secs < 10 ? "0" + secs : secs);
            timerElement.textContent = display;

            if (seconds < 120) {
                containerElement.classList.remove('bg-gray-900');
                containerElement.classList.add('bg-red-600', 'animate-pulse');
            } else {
                containerElement.classList.add('bg-gray-900');
                containerElement.classList.remove('bg-red-600', 'animate-pulse');
            }
        }

        // Initialize from localStorage
        let timeLeft;
        let stored = localStorage.getItem('exam_time_left');

        if (stored !== null && !isNaN(parseInt(stored))) {
            timeLeft = parseInt(stored);
            if (timeLeft <= 0) timeLeft = EXAM_DURATION;
        } else {
            timeLeft = EXAM_DURATION;
            localStorage.setItem('exam_time_left', timeLeft);
        }

        updateDisplay(timeLeft);

        const timerInterval = setInterval(function () {
            if (timeLeft > 0) {
                timeLeft--;
                localStorage.setItem('exam_time_left', timeLeft);
                updateDisplay(timeLeft);
            } else {
                clearInterval(timerInterval);
                localStorage.removeItem('exam_time_left');
                window.onbeforeunload = null;
                alert("Time is up! Your exam will be submitted automatically.");
                window.location.href = "final.php";
            }
        }, 1000);

        // Safety: Form submission cleanup
        const examForm = document.getElementById('examForm');
        if (examForm) {
            examForm.addEventListener('submit', function () {
                window.onbeforeunload = null;
            });
        }

        // Warning before leave
        window.onbeforeunload = function () {
            return "Are you sure you want to leave? Your exam progress might be lost.";
        };
    })();
</script>

<?php include 'inc/footer.php'; ?>