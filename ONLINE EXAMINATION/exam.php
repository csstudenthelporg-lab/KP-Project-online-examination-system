<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
?>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-5xl mx-auto">

        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-3">Examination Dashboard</h1>
            <p class="text-gray-600">Welcome back! Ready to begin your assessment?</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Welcome Card -->
                <div class="card">
                    <div class="flex items-start gap-4 mb-6">
                        <div
                            class="w-16 h-16 bg-primary text-white rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Ready to Begin</h2>
                            <p class="text-gray-600">
                                Welcome to your testing portal. Please ensure you have a stable internet connection
                                before starting the examination.
                            </p>
                        </div>
                    </div>

                    <a href="starttest.php" class="btn btn-primary btn-lg w-full md:w-auto">
                        <i class="fas fa-play"></i>
                        Start Examination
                    </a>
                </div>

                <!-- Exam Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="card">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 font-semibold mb-1">Time Limit</p>
                                <p class="text-2xl font-bold text-gray-900">15 Minutes</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-14 h-14 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center text-xl">
                                <i class="fas fa-list-ul"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 font-semibold mb-1">Question Type</p>
                                <p class="text-2xl font-bold text-gray-900">Multiple Choice</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="space-y-6">

                <!-- Testing Rules -->
                <div class="card">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="w-1 h-6 bg-primary rounded-full"></span>
                        Testing Rules
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-primary text-sm mt-0.5"></i>
                            <p class="text-sm text-gray-600">Avoid refreshing the browser once the test starts.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-primary text-sm mt-0.5"></i>
                            <p class="text-sm text-gray-600">The timer starts automatically upon initialization.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-primary text-sm mt-0.5"></i>
                            <p class="text-sm text-gray-600">Results will be available instantly after completion.</p>
                        </li>
                    </ul>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <a href="profile.php"
                            class="text-sm text-primary hover:text-primary-hover font-semibold flex items-center justify-center gap-2">
                            View Your Profile
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Help Card -->
                <div class="card bg-gradient-to-br from-blue-50 to-indigo-50 border-blue-200">
                    <h3 class="font-bold text-gray-900 mb-3">Need Assistance?</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Encountered an issue? Our technical support team is here to help you.
                    </p>
                    <a href="#" class="btn btn-outline btn-sm w-full">
                        <i class="fas fa-headset"></i>
                        Contact Support
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>