<?php
include_once("../lib/Session.php");
Session::checkAdminSession();
include_once("../lib/Database.php");
include_once("../helpers/Format.php");
$db = new Database();
$fm = new Format();
?>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin Panel | ExamPro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#2563EB',
                            hover: '#1D4ED8',
                            light: '#DBEAFE',
                        },
                        secondary: '#DC2626',
                        background: '#F9FAFB',
                        surface: '#FFFFFF',
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Educational Design System -->
    <link rel="stylesheet" href="../css/educational.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Intersection Observer for Staggered Reveals
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.stagger-reveal').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</head>

<body class="bg-slate-50 min-h-screen text-slate-900 font-sans relative overflow-x-hidden">

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
        header("Location:login.php");
        exit();
    }
    ?>

    <!-- Professional Admin Navbar -->
    <nav
        class="sticky top-0 z-[100] px-4 py-4 md:px-8 border-b border-white/50 bg-white/80 backdrop-blur-md shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between">
                <!-- Brand -->
                <div class="flex items-center gap-8">
                    <a href="index.php" class="flex items-center gap-3 group">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-xl flex items-center justify-center text-lg shadow-lg shadow-blue-500/30 group-hover:rotate-12 transition-transform duration-300">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div>
                            <p
                                class="text-lg font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-slate-900 to-blue-800 leading-none tracking-tight">
                                ExamPro</p>
                            <p class="text-[10px] font-bold text-blue-600 mt-0.5 uppercase tracking-widest">Admin Portal
                            </p>
                        </div>
                    </a>

                    <div class="hidden lg:flex items-center gap-1 pl-8 border-l border-slate-200/60">
                        <a href="index.php"
                            class="px-4 py-2 rounded-lg text-sm font-semibold transition-all <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'; ?>">
                            Dashboard
                        </a>
                        <a href="users.php"
                            class="px-4 py-2 rounded-lg text-sm font-semibold transition-all <?php echo (basename($_SERVER['PHP_SELF']) == 'users.php') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'; ?>">
                            Students
                        </a>
                        <a href="queslist.php"
                            class="px-4 py-2 rounded-lg text-sm font-semibold transition-all <?php echo (basename($_SERVER['PHP_SELF']) == 'queslist.php') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'; ?>">
                            Questions
                        </a>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-4">
                    <a href="../index.php"
                        class="hidden md:flex px-4 py-2 rounded-lg text-xs font-bold text-slate-500 hover:text-blue-600 transition-colors gap-2 items-center group">
                        Live Site <i class="fas fa-external-link-alt group-hover:translate-x-0.5 transition-transform"></i>
                    </a>

                    <div class="h-6 w-[1px] bg-slate-200 mx-1 hidden md:block"></div>

                    <a href="quesadd.php"
                        class="hidden md:flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-lg text-xs font-bold transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5 active:scale-95">
                        <i class="fas fa-plus"></i>
                        Add Content
                    </a>

                    <div class="flex items-center gap-3 pl-2">
                         <a href="?action=logout"
                            class="w-10 h-10 bg-white text-slate-500 border border-slate-200 rounded-xl flex items-center justify-center hover:bg-rose-50 hover:text-rose-600 hover:border-rose-200 transition-all shadow-sm hover:shadow active:scale-95"
                            title="Logout">
                            <i class="fas fa-power-off text-sm"></i>
                        </a>
                        <!-- Mobile Menu Button -->
                        <button type="button" onclick="document.getElementById('mobile-admin-menu').classList.toggle('hidden')"
                            class="lg:hidden w-10 h-10 bg-white text-slate-500 border border-slate-200 rounded-xl flex items-center justify-center hover:bg-slate-50 hover:text-blue-600 transition-all shadow-sm active:scale-95">
                            <i class="fas fa-bars text-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-12 relative z-10">