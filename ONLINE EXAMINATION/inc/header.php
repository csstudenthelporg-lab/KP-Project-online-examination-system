<?php
ob_start();
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Session.php');
Session::init();

include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Format.php');
spl_autoload_register(function ($class) {
  include_once "classes/" . $class . ".php";
});

$db = new Database();
$fm = new Format();
$exam = new Exam();
$user = new User();
$pro = new Process();

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<?php
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  Session::destroy();
  header("Location:index.php");
  exit();
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Online Exam System | Excellence in Evaluation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Modern Online Examination System">

  <!-- Professional Typography -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <!-- Tailwind CSS with Professional Design Tokens -->
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
            success: '#10B981',
            danger: '#EF4444',
            warning: '#F59E0B',
            background: '#F9FAFB',
            surface: '#FFFFFF',
          },
          fontFamily: {
            sans: ['Outfit', 'sans-serif'],
            heading: ['Outfit', 'sans-serif'],
          },
        }
      }
    }
  </script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Educational Design System -->
  <link rel="stylesheet" href="css/educational.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/main.js"></script>
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

<body
  class="<?php echo isset($bodyClass) ? $bodyClass : 'bg-background min-h-screen flex flex-col font-sans'; ?> relative overflow-x-hidden">

  <?php
  if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    Session::destroy();
    header("Location:index.php");
    exit();
  }
  ?>

  <?php if (!isset($hideNavbar)): ?>
    <!-- Professional Navigation -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex items-center">
            <a href="index.php" class="flex-shrink-0 flex items-center gap-3 group">
              <div
                class="w-9 h-9 bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-lg flex items-center justify-center shadow-md shadow-blue-500/20 group-hover:rotate-12 transition-transform duration-300">
                <i class="fas fa-graduation-cap text-lg"></i>
              </div>
              <span
                class="text-lg font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-slate-900 to-blue-800 tracking-tight">ExamPro</span>
            </a>
          </div>

          <div class="hidden md:flex items-center space-x-6">
            <?php
            $login = Session::get("login");
            if ($login == true) {
              ?>
              <a href="exam.php"
                class="text-gray-700 hover:text-primary font-medium transition-colors text-sm">Dashboard</a>
              <a href="profile.php"
                class="text-gray-700 hover:text-primary font-medium transition-colors text-sm">Profile</a>

              <div class="flex items-center gap-3 pl-6 border-l border-gray-200">
                <div class="flex flex-col items-end">
                  <span class="text-xs text-gray-500 font-medium">Logged in as</span>
                  <span class="text-sm font-bold text-gray-900"><?php echo Session::get("name"); ?></span>
                </div>
                <a href="?action=logout"
                  class="bg-gray-100 hover:bg-red-50 text-gray-600 hover:text-red-600 p-2.5 rounded-lg transition-all">
                  <i class="fas fa-sign-out-alt"></i>
                </a>
              </div>
            <?php } else { ?>
              <a href="index.php" class="text-gray-700 hover:text-primary font-semibold transition-colors text-sm">Login</a>
              <a href="register.php"
                class="bg-primary hover:bg-primary-hover text-white px-5 py-2.5 rounded-lg font-semibold shadow-sm transition-all">
                Register Now
              </a>
              <a href="admin/"
                class="text-gray-500 hover:text-gray-700 transition-colors text-xs font-semibold border-l border-gray-200 pl-6">
                Admin Portal
              </a>
            <?php } ?>
          </div>

          <!-- Mobile menu button -->
          <div class="md:hidden flex items-center">
            <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
              class="text-gray-600 hover:text-primary p-2">
              <i class="fas fa-bars text-xl"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu -->
      <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
        <div class="px-4 pt-2 pb-6 space-y-2">
          <?php if ($login == true) { ?>
            <a href="exam.php"
              class="block px-4 py-3 rounded-lg text-base font-semibold text-gray-700 hover:bg-gray-50 transition-colors">Dashboard</a>
            <a href="profile.php"
              class="block px-4 py-3 rounded-lg text-base font-semibold text-gray-700 hover:bg-gray-50 transition-colors">Profile</a>
            <a href="?action=logout"
              class="block px-4 py-3 rounded-lg text-base font-semibold text-red-600 hover:bg-red-50 transition-colors">Logout</a>
          <?php } else { ?>
            <a href="index.php"
              class="block px-4 py-3 rounded-lg text-base font-semibold text-gray-700 hover:bg-gray-50">Login</a>
            <a href="register.php"
              class="block px-4 py-3 rounded-lg text-base font-semibold text-white bg-primary">Register</a>
            <a href="admin/" class="block px-4 py-3 rounded-lg text-base font-semibold text-gray-500 hover:bg-gray-50">Admin
              Portal</a>
          <?php } ?>
        </div>
      </div>
    </nav>
  <?php endif; ?>

  <main class="flex-grow py-8">