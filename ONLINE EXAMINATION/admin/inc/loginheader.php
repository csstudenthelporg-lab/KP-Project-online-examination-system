<?php
include_once("../lib/Session.php");
Session::checkAdminLogin();

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!doctype html>
<html lang="en">

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
                    },
                    secondary: '#DC2626',
                    background: '#F9FAFB',
                    surface: '#FFFFFF',
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                    heading: ['Roboto', 'sans-serif'],
                }
            }
        }
    }
</script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto:wght@700&display=swap"
    rel="stylesheet">

<!-- Educational Design System -->
<link rel="stylesheet" href="../css/educational.css">
</head>

<body class="bg-gray-50 flex flex-col min-h-screen">