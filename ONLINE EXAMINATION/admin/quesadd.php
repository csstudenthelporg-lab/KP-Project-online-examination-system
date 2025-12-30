<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/Exam.php');
$exam = new Exam();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addQuestion = $exam->getAddQuestion($_POST);
}
// Get Total
$total = $exam->getTotalRows();
$next = $total + 1;
?>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">

        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Add New Question</h1>
            <p class="text-gray-600">Create a new question for the examination bank</p>
        </div>

        <!-- Alert Area -->
        <?php if (isset($addQuestion)): ?>
            <div class="mb-6">
                <?php echo $addQuestion; ?>
            </div>
        <?php endif; ?>

        <!-- Question Form Card -->
        <div class="card">
            <form action="" method="post" class="space-y-8">

                <!-- Question Number and Text -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Question Number -->
                    <div class="form-group">
                        <label class="form-label">Question No.</label>
                        <div
                            class="w-full h-14 bg-gray-50 border border-gray-200 flex items-center justify-center rounded-lg font-bold text-primary text-xl">
                            #<?php echo str_pad($next, 2, '0', STR_PAD_LEFT); ?>
                            <input type="hidden" name="quesNo" value="<?php echo $next; ?>">
                        </div>
                    </div>

                    <!-- Question Text -->
                    <div class="md:col-span-3 form-group">
                        <label class="form-label">Question Text</label>
                        <textarea name="ques" rows="3" class="form-textarea"
                            placeholder="Enter the question text here..." required></textarea>
                    </div>
                </div>

                <!-- Answer Options -->
                <div class="space-y-4">
                    <label class="form-label">Answer Options</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-group">
                            <label class="form-label text-xs">Option 1</label>
                            <input type="text" name="ans1" class="form-input" placeholder="First option" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label text-xs">Option 2</label>
                            <input type="text" name="ans2" class="form-input" placeholder="Second option" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label text-xs">Option 3</label>
                            <input type="text" name="ans3" class="form-input" placeholder="Third option" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label text-xs">Option 4</label>
                            <input type="text" name="ans4" class="form-input" placeholder="Fourth option" required />
                        </div>
                    </div>
                </div>

                <!-- Correct Answer -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-primary text-white rounded-lg flex items-center justify-center text-xl flex-shrink-0">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm mb-1">Correct Answer</h4>
                                <p class="text-xs text-gray-600">Specify which option is correct (1-4)</p>
                            </div>
                        </div>
                        <div class="w-full md:w-32">
                            <input type="number" name="rightAns" min="1" max="4"
                                class="form-input text-center text-lg font-bold" placeholder="#" required />
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center gap-4 pt-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save"></i>
                        Add Question
                    </button>
                    <a href="queslist.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>