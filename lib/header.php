<?php
require_once 'config.php'; // Pastikan path benar
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Announcement BL HMST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Website Announcement Pengurus BADAN LEGISLATIF HMST UPI Purwakarta." name="description">
    <meta content="Marshep Ollo" name="author">

    <!-- App favicon (for browsers) -->
    <link rel="shortcut icon" href="<?php echo $config['web']['url']; ?>assets/images/HMST.png">

    <!-- Additional icons for various devices -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $config['web']['url']; ?>assets/images/HMST.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $config['web']['url']; ?>assets/images/HMST.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $config['web']['url']; ?>assets/images/HMST.png">

    <!-- Jsvectormap plugin css -->
    <link href="<?php echo $config['web']['url']; ?>assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css">

    <!-- Icons css  (Mandatory in All Pages) -->
    <link href="<?php echo $config['web']['url']; ?>assets/css/icons.min.css" rel="stylesheet" type="text/css">

    <!-- App css  (Mandatory in All Pages) -->
    <link href="<?php echo $config['web']['url']; ?>assets/css/app.min.css" rel="stylesheet" type="text/css">
    
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>


<body>

    <div class="wrapper">

        <!-- Start Sidebar -->
        <aside id="app-menu"
            class="hs-overlay fixed inset-y-0 start-0 z-60 hidden w-sidenav min-w-sidenav bg-white border-e border-default-200 overflow-y-auto -translate-x-full transform transition-all duration-300 hs-overlay-open:translate-x-0 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden [--body-scroll:true] [--overlay-backdrop:true] lg:[--overlay-backdrop:false]">

            <!-- Sidenav Logo -->
            <div class="sticky top-0 flex h-topbar items-center justify-center px-6 border-b border-default-200 .bg-primary/5">
                <a href="<?php echo $config['web']['url']; ?>">
                    <img src="<?php echo $config['web']['url']; ?>assets/images/logo-dark.png" alt="logo" class="flex h-10">
                </a>
            </div>

            <div class="p-4" data-simplebar>
                <ul class="admin-menu hs-accordion-group flex w-full flex-col gap-1.5">
                    <li class="px-5 py-2 text-sm font-medium text-default-600">Page</li>
                    <li class="menu-item">
                        <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-700 transition-all hover:bg-default-900/5"
                            href="<?php echo $config['web']['url']; ?>">
                            <i class="text-2xl i-solar-verified-check-bold-duotone"></i>
                            Check
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- End Sidebar -->

        <!-- Start Page Content here -->
        <div class="page-content">

            <!-- Topbar Start -->
            <header class="sticky top-0 z-50 flex items-center px-5 bg-white border-b app-header h-topbar border-default-200">
                <div class="container flex items-center gap-4">
                    <!-- Topbar Brand Logo -->
                    <!--<a href="<?php echo $config['web']['url']; ?>" class="flex md:hidden">-->
                    <!--    <img src="<?php echo $config['web']['url']; ?>assets/images/logo-sm.png" class="h-6" alt="Small logo">-->
                    <!--</a>-->

                    <!-- Sidenav Menu Toggle Button -->
                    <button id="button-toggle-menu" class="p-2 rounded-full cursor-pointer text-default-500 hover:text-default-600"
                        data-hs-overlay="#app-menu" aria-label="Toggle navigation">
                        <i class="text-2xl i-tabler-menu-2"></i>
                    </button>
                    
                    <!-- Profile Dropdown Button -->
                    <div class="ms-auto hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <div class="relative">
                        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                            <button type="button" class="hs-dropdown-toggle">
                                <a href="<?php echo $config['web']['url']; ?>">
                                    <img src="<?php echo $config['web']['url']; ?>assets/images/HMST.png" alt="user-image" class="h-10 rounded-full">
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Topbar End -->

            <main>
