<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Rimau Shipping | Leading Maritime Logistics</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(209, 213, 219, 0.3);
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary": "#444b51",
                        "surface": "#f7fafc",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed": "#ffdad6",
                        "surface-container-low": "#f1f4f6",
                        "on-tertiary-fixed-variant": "#41484d",
                        "secondary-container": "#dc3033",
                        "primary-container": "#1b679b",
                        "surface-bright": "#f7fafc",
                        "outline": "#717880",
                        "inverse-on-surface": "#eef1f3",
                        "on-primary": "#ffffff",
                        "on-primary-fixed": "#001d32",
                        "secondary": "#b8101e",
                        "on-tertiary-container": "#d9dfe6",
                        "error-container": "#ffdad6",
                        "on-secondary-fixed-variant": "#930012",
                        "surface-container-highest": "#e0e3e5",
                        "on-secondary-fixed": "#410003",
                        "outline-variant": "#c0c7d0",
                        "surface-variant": "#e0e3e5",
                        "on-background": "#181c1e",
                        "surface-tint": "#136397",
                        "primary-fixed": "#cee5ff",
                        "on-error": "#ffffff",
                        "error": "#ba1a1a",
                        "on-secondary": "#ffffff",
                        "surface-dim": "#d7dadc",
                        "on-surface-variant": "#41474f",
                        "secondary-fixed-dim": "#ffb3ad",
                        "surface-container-high": "#e5e9eb",
                        "inverse-primary": "#96ccff",
                        "surface-container-lowest": "#ffffff",
                        "tertiary-fixed": "#dce3ea",
                        "on-surface": "#181c1e",
                        "primary": "#004e7b",
                        "tertiary-fixed-dim": "#c0c7ce",
                        "background": "#f7fafc",
                        "on-primary-container": "#c7e2ff",
                        "on-error-container": "#93000a",
                        "on-tertiary-fixed": "#161c22",
                        "surface-container": "#ebeef0",
                        "tertiary-container": "#5c6369",
                        "primary-fixed-dim": "#96ccff",
                        "on-secondary-container": "#fffbff",
                        "inverse-surface": "#2d3133",
                        "on-primary-fixed-variant": "#004a75"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "margin-mobile": "16px",
                        "margin-desktop": "40px",
                        "container-max": "1200px",
                        "gutter": "20px",
                        "baseline": "8px"
                    },
                    "fontFamily": {
                        "headline-md": ["Montserrat"],
                        "headline-lg-mobile": ["Montserrat"],
                        "body-md": ["Inter"],
                        "display-lg": ["Montserrat"],
                        "headline-lg": ["Montserrat"],
                        "label-sm": ["Inter"],
                        "body-lg": ["Inter"]
                    },
                    "fontSize": {
                        "headline-md": ["20px", {
                            "lineHeight": "28px",
                            "fontWeight": "600"
                        }],
                        "headline-lg-mobile": ["22px", {
                            "lineHeight": "30px",
                            "fontWeight": "600"
                        }],
                        "body-md": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "display-lg": ["38px", {
                            "lineHeight": "46px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "headline-lg": ["26px", {
                            "lineHeight": "34px",
                            "fontWeight": "600"
                        }],
                        "label-sm": ["11px", {
                            "lineHeight": "15px",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }]
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-surface text-on-surface font-body-md overflow-x-hidden">
    <!-- Top Navigation Bar -->
    <header
        class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-md shadow-sm border-b border-outline-variant h-16 transition-all duration-300 ease-in-out">
        <div class="max-w-container-max mx-auto h-full px-margin-desktop flex justify-between items-center">
            <div class="flex items-center gap-8">
                <a href="#">
                    <img alt="Rimau Shipping Logo" class="h-8 w-auto"
                        src="{{ asset('images/logo_rimaushipping.png') }}" />
                </a>
            </div>
            <nav class="hidden md:flex gap-6 items-center h-full">
                <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-300 font-label-sm text-label-sm"
                    href="#services">Services</a>
                <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-300 font-label-sm text-label-sm"
                    href="#about">About Us</a>
                <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-300 font-label-sm text-label-sm"
                    href="#fleet">Fleet</a>
                <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-300 font-label-sm text-label-sm"
                    href="#quality">Quality</a>
                <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-300 font-label-sm text-label-sm"
                    href="#safety">Safety</a>
            </nav>
            <div class="flex items-center gap-3">
                <a href="#contact"
                    class="bg-surface border border-outline text-on-surface hover:bg-surface-container-high px-4 py-1.5 rounded-lg font-headline-md text-label-sm font-bold active:scale-95 transition-all">
                    Contact Us
                </a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="bg-primary text-on-primary px-4 py-1.5 rounded-lg font-headline-md text-label-sm font-bold hover:opacity-90 active:scale-95 transition-all">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-primary text-on-primary px-4 py-1.5 rounded-lg font-headline-md text-label-sm font-bold hover:opacity-90 active:scale-95 transition-all">
                            Login
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img alt="Maritime Hero" class="w-full h-full object-cover" src="{{ asset('images/KapalHome.jpg') }}" />
            <div class="absolute inset-0 bg-primary/40 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-on-background/80 to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-container-max mx-auto px-margin-desktop w-full">
            <div class="max-w-2xl text-on-primary">
                <h1 class="font-display-lg text-display-lg mb-4 leading-tight">
                    Leading the Way in Maritime Logistics
                </h1>
                <p class="font-body-lg text-body-lg mb-8 opacity-90">
                    Reliable shipping solutions across the archipelago and beyond. Precision-driven logistics built on a
                    foundation of industrial excellence.
                </p>
                <div class="flex gap-4">
                    <a href="#about"
                        class="bg-primary px-6 py-3 rounded font-headline-md text-body-md font-bold hover:bg-primary-container transition-all text-center inline-block">
                        Learn More
                    </a>
                    <a href="#fleet"
                        class="border-2 border-on-primary px-6 py-3 rounded font-headline-md text-body-md font-bold hover:bg-on-primary hover:text-primary transition-all text-center inline-block">
                        View Fleet
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section (Corporate Profile) -->
    <section id="about" class="py-16 bg-surface-container-lowest">
        <div class="max-w-container-max mx-auto px-margin-desktop">
            <div class="grid md:grid-cols-12 gap-gutter items-center">
                <div class="md:col-span-5">
                    <span
                        class="text-secondary font-label-sm text-label-sm tracking-widest uppercase mb-3 block">Corporate
                        Profile</span>
                    <h2 class="font-headline-lg text-headline-lg mb-6 text-on-background">
                        PT Rimau Shipping: Delivering Operational Precision
                    </h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-4">
                        Established as a cornerstone of maritime excellence, PT Rimau Shipping specializes in
                        high-density logistics and vessel operations. We bridge the vast expanses of the archipelago
                        with unwavering reliability.
                    </p>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Our commitment to international standards and safety ensures that your cargo is managed with the
                        highest degree of professionalism, leveraging technology and a robust industrial fleet.
                    </p>
                </div>
                <div class="md:col-span-7 grid grid-cols-2 gap-4">
                    <div class="aspect-square bg-surface-container-high rounded-xl overflow-hidden relative group">
                        <div
                            class="absolute inset-0 bg-primary/20 group-hover:bg-transparent transition-all duration-500">
                        </div>
                        <img alt="RIMAU 1610 Vessel" class="w-full h-full object-cover"
                            src="{{ asset('images/kapal1.jpg') }}" />
                    </div>
                    <div class="aspect-square bg-surface-container-high rounded-xl overflow-hidden mt-8 relative group">
                        <div
                            class="absolute inset-0 bg-primary/20 group-hover:bg-transparent transition-all duration-500">
                        </div>
                        <img alt="Industrial Bulk Carrier Operations" class="w-full h-full object-cover"
                            src="{{ asset('images/kapal2.jpg') }}" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 bg-surface-container">
        <div class="max-w-container-max mx-auto px-margin-desktop">
            <div class="text-center mb-12">
                <h2 class="font-headline-lg text-headline-lg mb-3">Strategic Marine Solutions</h2>
                <div class="w-16 h-1 bg-primary mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-3 gap-gutter">
                <!-- Service 1 -->
                <div
                    class="bg-surface p-8 border border-outline-variant hover:shadow-xl transition-all group flex flex-col h-full">
                    <div class="mb-6 text-primary group-hover:scale-110 transition-transform origin-left">
                        <span class="material-symbols-outlined text-4xl">call_log</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md mb-3">Vessel Operations</h3>
                    <p class="font-body-md text-on-surface-variant flex-grow">
                        Comprehensive management of tug and barge operations, providing reliable coastal shipping and
                        project-based maritime transport.
                    </p>
                    <a class="mt-6 text-primary font-bold flex items-center gap-2 group-hover:underline" href="#fleet">
                        Learn More <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>
                <!-- Service 2 -->
                <div
                    class="bg-surface p-8 border border-outline-variant hover:shadow-xl transition-all group flex flex-col h-full">
                    <div class="mb-6 text-primary group-hover:scale-110 transition-transform origin-left">
                        <span class="material-symbols-outlined text-4xl">precision_manufacturing</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md mb-3">Logistics Solutions</h3>
                    <p class="font-body-md text-on-surface-variant flex-grow">
                        End-to-end supply chain integration, from port handling to multi-modal logistics, designed for
                        efficiency and industrial scale.
                    </p>
                    <a class="mt-6 text-primary font-bold flex items-center gap-2 group-hover:underline" href="#about">
                        Explore Logistics <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>
                <!-- Service 3 -->
                <div
                    class="bg-surface p-8 border border-outline-variant hover:shadow-xl transition-all group flex flex-col h-full">
                    <div class="mb-6 text-primary group-hover:scale-110 transition-transform origin-left">
                        <span class="material-symbols-outlined text-4xl">anchor</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md mb-3">Marine Services</h3>
                    <p class="font-body-md text-on-surface-variant flex-grow">
                        Technical support, ship agency, and maritime consulting services backed by years of regional and
                        international experience.
                    </p>
                    <a class="mt-6 text-primary font-bold flex items-center gap-2 group-hover:underline"
                        href="#quality">
                        View Services <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Fleet Showcase -->
    <section id="fleet" class="py-16 overflow-hidden bg-surface-container-low">
        <div class="max-w-container-max mx-auto px-margin-desktop">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div class="max-w-xl">
                    <h2 class="font-headline-lg text-headline-lg mb-3">Our Powerful Fleet</h2>
                    <p class="font-body-lg text-on-surface-variant">
                        Operating a versatile fleet of modern vessels equipped to handle diverse maritime challenges
                        with safety and precision.
                    </p>
                </div>
                <div class="flex gap-3">
                    <button
                        class="w-10 h-10 rounded-full border border-outline flex items-center justify-center hover:bg-primary hover:text-on-primary transition-all">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button
                        class="w-10 h-10 rounded-full border border-outline flex items-center justify-center hover:bg-primary hover:text-on-primary transition-all">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-6">
                <!-- Fleet Item 1: High-Power Tug Boats -->
                <div class="group cursor-pointer">
                    <div class="overflow-hidden rounded-xl aspect-[16/9] mb-3">
                        <img alt="RIMAU 1610 High-Power Tug Boat"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            src="{{ asset('images/kapal1.jpg') }}" />
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-headline-md text-headline-md">RIMAU 1610 Tug</h4>
                            <p class="text-on-surface-variant text-sm">High-Power Harbor &amp; Coastal Support</p>
                        </div>
                        <span
                            class="bg-primary-container text-on-primary-container px-3 py-1 rounded text-label-sm font-bold">ACTIVE</span>
                    </div>
                </div>
                <!-- Fleet Item 2: Industrial Bulk Carriers -->
                <div class="group cursor-pointer">
                    <div class="overflow-hidden rounded-xl aspect-[16/9] mb-3">
                        <img alt="Industrial Bulk Carrier Operations"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            src="{{ asset('images/KapalHome.jpg') }}" />
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-headline-md text-headline-md">Industrial Bulk Carrier</h4>
                            <p class="text-on-surface-variant text-sm">Deep-Sea Logistics Capabilities</p>
                        </div>
                        <span
                            class="bg-primary-container text-on-primary-container px-3 py-1 rounded text-label-sm font-bold">OFFSHORE</span>
                    </div>
                </div>
                <!-- Fleet Item 3: RIMAU 3016 Barge -->
                <div class="group cursor-pointer">
                    <div class="overflow-hidden rounded-xl aspect-[16/9] mb-3">
                        <img alt="RIMAU 3016 Series Barge"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            src="{{ asset('images/kapal3.jpg') }}" />
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-headline-md text-headline-md">RIMAU 3016 Barge</h4>
                            <p class="text-on-surface-variant text-sm">High-Density Cargo Transport</p>
                        </div>
                        <span
                            class="bg-primary-container text-on-primary-container px-3 py-1 rounded text-label-sm font-bold">COASTAL</span>
                    </div>
                </div>
                <!-- Fleet Item 4: Specialized Support -->
                <div class="group cursor-pointer">
                    <div class="overflow-hidden rounded-xl aspect-[16/9] mb-3">
                        <img alt="Specialized Support Vessel"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            src="{{ asset('images/kapal4.jpg') }}" />
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-headline-md text-headline-md">Specialized Support</h4>
                            <p class="text-on-surface-variant text-sm">Maritime Technical Services</p>
                        </div>
                        <span
                            class="bg-primary-container text-on-primary-container px-3 py-1 rounded text-label-sm font-bold">SUPPORT</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Professional Team / Safety First Section -->
    <section id="safety" class="py-16 bg-surface-container-highest">
        <div class="max-w-container-max mx-auto px-margin-desktop">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <span class="text-secondary font-label-sm text-label-sm tracking-widest uppercase mb-3 block">Our
                        People</span>
                    <h2 class="font-headline-lg text-headline-lg mb-6 text-on-background leading-tight">
                        Our Professional Team: The Heart of Our Excellence
                    </h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-4">
                        At Rimau Shipping, safety is not just a protocol; it's our primary culture. Our highly trained
                        maritime professionals are dedicated to ensuring the integrity of your cargo and the safety of
                        every operation.
                    </p>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary text-xl">groups</span>
                            <span class="font-body-md font-bold">Certified Professional Crew</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary text-xl">security</span>
                            <span class="font-body-md font-bold">Zero-Harm Safety Initiatives</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary text-xl">engineering</span>
                            <span class="font-body-md font-bold">Continuous Skills Development</span>
                        </div>
                    </div>
                </div>
                <div class="order-1 md:order-2 rounded-2xl overflow-hidden shadow-xl">
                    <img alt="Professional Team on Deck" class="w-full h-auto"
                        src="{{ asset('images/pegawai.jpg') }}" />
                </div>
            </div>
        </div>
    </section>

    <!-- Quality & Safety -->
    <section id="quality" class="py-16 bg-tertiary text-on-tertiary">
        <div class="max-w-container-max mx-auto px-margin-desktop">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="absolute -top-10 -left-10 w-24 h-24 bg-primary/20 rounded-full blur-2xl"></div>
                    <img alt="ISO Certifications" class="relative z-10 w-full max-w-sm mx-auto shadow-xl bg-white p-4"
                        src="{{ asset('images/ISO.jpg') }}" />
                    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-secondary/10 rounded-full blur-2xl"></div>
                </div>
                <div>
                    <h2 class="font-headline-lg text-headline-lg mb-6 leading-tight">
                        Uncompromising Standards in Safety &amp; Quality
                    </h2>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-on-tertiary/10 rounded flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl"
                                    style="font-variation-settings: 'FILL' 1;">verified</span>
                            </div>
                            <div>
                                <h4 class="font-headline-md text-body-lg font-bold mb-1">ISO 9001:2015 Certified</h4>
                                <p class="opacity-80 text-body-md text-sm">Adhering to strict international quality
                                    management systems for maritime operations and logistics excellence.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-on-tertiary/10 rounded flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl"
                                    style="font-variation-settings: 'FILL' 1;">health_and_safety</span>
                            </div>
                            <div>
                                <h4 class="font-headline-md text-body-lg font-bold mb-1">Maritime Safety Culture</h4>
                                <p class="opacity-80 text-body-md text-sm">Prioritizing the health and safety of our
                                    crew and the integrity of your cargo through continuous training.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-on-tertiary/10 rounded flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl"
                                    style="font-variation-settings: 'FILL' 1;">eco</span>
                            </div>
                            <div>
                                <h4 class="font-headline-md text-body-lg font-bold mb-1">Environmental Responsibility
                                </h4>
                                <p class="opacity-80 text-body-md text-sm">Implementing sustainable practices and
                                    strictly following MARPOL regulations to protect marine ecosystems.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA / Contact Us -->
    <section id="contact" class="py-20 relative">
        <div class="absolute inset-0 bg-surface-container-high overflow-hidden">
            <div class="absolute top-0 right-0 w-1/2 h-full opacity-10">
                <svg viewbox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M38.1,-48.7C50.5,-38.7,62.5,-27.9,67.6,-14.8C72.8,-1.7,71.2,13.7,64.2,27.1C57.2,40.4,44.9,51.8,31.4,59.3C17.9,66.8,3.2,70.5,-12.3,69.5C-27.8,68.5,-44,62.8,-56.3,51.9C-68.5,41.1,-76.8,25.2,-77.8,9.5C-78.8,-6.2,-72.5,-21.7,-62.4,-34.5C-52.4,-47.3,-38.6,-57.4,-24.5,-61.7C-10.4,-66,3.9,-64.5,18.4,-60.7C32.9,-56.9,47.6,-50.8,38.1,-48.7Z"
                        fill="currentColor" transform="translate(200 200)"></path>
                </svg>
            </div>
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop relative z-10 text-center">
            <div class="max-w-2xl mx-auto glass-card p-12 rounded-2xl shadow-lg">
                <h2 class="font-headline-lg text-headline-lg mb-4">Partner with Rimau Shipping</h2>
                <p class="font-body-lg text-on-surface-variant mb-8">
                    Whether you need transshipment, cargo handling, or specialized vessel operations, our team is ready
                    to scale with your logistical requirements.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="mailto:info@rimaushipping.co.id"
                        class="bg-primary text-on-primary px-8 py-3.5 rounded font-headline-md text-body-md font-bold hover:scale-105 transition-all shadow-md text-center">
                        Get a Quotation
                    </a>
                    <a href="tel:+6221XXXXXX"
                        class="bg-tertiary text-on-tertiary px-8 py-3.5 rounded font-headline-md text-body-md font-bold hover:scale-105 transition-all text-center">
                        Contact Sales
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-tertiary dark:bg-tertiary-container text-on-tertiary py-12 border-t border-tertiary-container">
        <div
            class="max-w-container-max mx-auto px-margin-desktop flex flex-col md:flex-row justify-between items-start gap-gutter">
            <div class="max-w-xs">
                <img alt="Rimau Shipping Logo White" class="h-8 w-auto mb-4 brightness-0 invert"
                    src="{{ asset('images/logo_rimaushipping.png') }}" />
                <p class="font-body-md opacity-80 mb-4 text-sm">
                    Precise Logistics, Global Scale. Your trusted maritime partner in the Indonesian archipelago.
                </p>
                <div class="flex gap-3">
                    <a class="w-8 h-8 rounded-full bg-on-tertiary/10 flex items-center justify-center hover:bg-primary transition-all"
                        href="#">
                        <span class="material-symbols-outlined text-sm">face_nod</span>
                    </a>
                    <a class="w-8 h-8 rounded-full bg-on-tertiary/10 flex items-center justify-center hover:bg-primary transition-all"
                        href="#">
                        <span class="material-symbols-outlined text-sm">alternate_email</span>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-8">
                <div>
                    <h5 class="font-bold mb-4 text-label-sm uppercase tracking-widest text-xs">Company</h5>
                    <ul class="space-y-3 font-body-md opacity-70 text-sm">
                        <li><a class="hover:text-on-tertiary transition-colors" href="#about">About Us</a></li>
                        <li><a class="hover:text-on-tertiary transition-colors" href="#">Career</a></li>
                        <li><a class="hover:text-on-tertiary transition-colors" href="#">Maritime
                                Regulations</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold mb-4 text-label-sm uppercase tracking-widest text-xs">Services</h5>
                    <ul class="space-y-3 font-body-md opacity-70 text-sm">
                        <li><a class="hover:text-on-tertiary transition-colors" href="#services">Fleet Management</a>
                        </li>
                        <li><a class="hover:text-on-tertiary transition-colors" href="#">Coal Logistics</a></li>
                        <li><a class="hover:text-on-tertiary transition-colors" href="#">Transshipment</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold mb-4 text-label-sm uppercase tracking-widest text-xs">Legal</h5>
                    <ul class="space-y-3 font-body-md opacity-70 text-sm">
                        <li><a class="hover:text-on-tertiary transition-colors" href="#">Privacy Policy</a></li>
                        <li><a class="hover:text-on-tertiary transition-colors" href="#">Terms of Service</a>
                        </li>
                        <li><a class="hover:text-on-tertiary transition-colors" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop mt-12 pt-6 border-t border-on-tertiary/10">
            <p class="text-label-sm font-label-sm opacity-60 text-xs">
                © 2026 PT Rimau Shipping. All rights reserved. Precise Logistics, Global Scale.
            </p>
        </div>
    </footer>

    <script>
        // Simple scroll reveal effect for sections
        const observerOptions = {
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                }
            });
        }, observerOptions);

        document.querySelectorAll('section').forEach(section => {
            section.classList.add('transition-all', 'duration-1000', 'opacity-0', 'translate-y-10');
            observer.observe(section);
        });
    </script>
</body>

</html>

