<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login | PT Rimau Bahtera Shipping</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-error": "#ffffff",
                        "surface-bright": "#f7fafc",
                        "on-background": "#181c1e",
                        "background": "#f7fafc",
                        "secondary-fixed-dim": "#ffb3ad",
                        "primary": "#004e7b",
                        "on-primary-container": "#c7e2ff",
                        "on-error-container": "#93000a",
                        "surface-dim": "#d7dadc",
                        "primary-fixed": "#cee5ff",
                        "on-tertiary-fixed-variant": "#41484d",
                        "inverse-surface": "#2d3133",
                        "error-container": "#ffdad6",
                        "on-secondary-fixed-variant": "#930012",
                        "tertiary-fixed-dim": "#c0c7ce",
                        "surface-container-highest": "#e0e3e5",
                        "error": "#ba1a1a",
                        "on-primary": "#ffffff",
                        "surface": "#f7fafc",
                        "outline-variant": "#c0c7d0",
                        "on-tertiary-fixed": "#161c22",
                        "on-secondary-fixed": "#410003",
                        "on-tertiary-container": "#d9dfe6",
                        "on-primary-fixed": "#001d32",
                        "on-secondary-container": "#fffbff",
                        "secondary-container": "#dc3033",
                        "surface-container-low": "#f1f4f6",
                        "primary-fixed-dim": "#96ccff",
                        "primary-container": "#1b679b",
                        "outline": "#717880",
                        "tertiary-fixed": "#dce3ea",
                        "surface-tint": "#136397",
                        "surface-container-high": "#e5e9eb",
                        "on-secondary": "#ffffff",
                        "on-primary-fixed-variant": "#004a75",
                        "surface-container-lowest": "#ffffff",
                        "secondary": "#b8101e",
                        "on-surface-variant": "#41474f",
                        "secondary-fixed": "#ffdad6",
                        "inverse-primary": "#96ccff",
                        "on-tertiary": "#ffffff",
                        "surface-variant": "#e0e3e5",
                        "surface-container": "#ebeef0",
                        "on-surface": "#181c1e",
                        "tertiary": "#444b51",
                        "tertiary-container": "#5c6369",
                        "inverse-on-surface": "#eef1f3"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "margin-desktop": "40px",
                        "margin-mobile": "16px",
                        "container-max": "1200px",
                        "baseline": "8px",
                        "gutter": "20px"
                    },
                    "fontFamily": {
                        "headline-lg": ["Montserrat"],
                        "body-lg": ["Inter"],
                        "headline-md": ["Montserrat"],
                        "display-lg": ["Montserrat"],
                        "headline-lg-mobile": ["Montserrat"],
                        "body-md": ["Inter"],
                        "label-sm": ["Inter"]
                    },
                    "fontSize": {
                        "headline-lg": ["26px", {
                            "lineHeight": "34px",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "headline-md": ["20px", {
                            "lineHeight": "28px",
                            "fontWeight": "600"
                        }],
                        "display-lg": ["38px", {
                            "lineHeight": "46px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "headline-lg-mobile": ["22px", {
                            "lineHeight": "30px",
                            "fontWeight": "600"
                        }],
                        "body-md": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "label-sm": ["11px", {
                            "lineHeight": "15px",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24
        }

        .login-card {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(8px);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
    </style>
</head>

<body
    class="bg-surface font-body-md text-on-surface min-h-screen md:h-screen md:overflow-hidden flex flex-col md:flex-row">
    <!-- Left Column: Maritime Hero Image -->
    <div class="hidden md:flex md:w-[60%] h-full relative overflow-hidden bg-primary">
        <img alt="Maritime Background" class="absolute inset-0 w-full h-full object-cover opacity-80"
            src="{{ asset('images/KapalHome.jpg') }}">
        <div class="absolute inset-0 bg-gradient-to-tr from-primary/90 via-primary/40 to-black/20"></div>
        <div class="absolute bottom-10 left-10 right-10 z-10 hidden lg:block">
            <div class="glass-card p-6 rounded-xl text-white max-w-lg shadow-2xl">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-2 h-2 rounded-full bg-primary-fixed-dim animate-pulse"></span>
                    <span class="text-[10px] uppercase tracking-widest text-primary-fixed-dim font-bold">PT Rimau
                        Bahtera Shipping</span>
                </div>
                <h2
                    class="text-2xl font-black tracking-tight mb-2 bg-gradient-to-r from-white via-primary-fixed-dim to-white bg-clip-text text-transparent">
                    SIMOP-KAPAL
                </h2>
                <p class="text-xs opacity-90 leading-relaxed font-body-md">Sistem Informasi Monitoring dan Pengelolaan
                    Kapal. Solusi maritim terintegrasi untuk efisiensi logistik, pelacakan armada, dan manajemen
                    operasional.</p>
            </div>
        </div>
    </div>

    <!-- Right Column: Login Form -->
    <main
        class="w-full md:w-[40%] md:h-full flex flex-col items-center justify-between p-6 bg-surface-container-low overflow-y-auto py-6">

        <!-- Back to Home Button -->
        <div class="w-full max-w-[380px] mx-auto">
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-1.5 text-xs font-semibold text-primary hover:text-primary-container transition-all group">
                <span
                    class="material-symbols-outlined text-sm group-hover:-translate-x-1 transition-transform">arrow_back</span>
                Kembali ke Beranda
            </a>
        </div>

        <!-- Login Card Container -->
        <div
            class="w-full max-w-[380px] mx-auto bg-white rounded-2xl shadow-lg border border-outline-variant/30 p-6 flex flex-col my-auto hover:shadow-xl transition-all duration-300">
            <!-- Branding Header -->
            <div class="flex flex-col items-center text-center mb-5">
                <img alt="PT Rimau Bahtera Shipping Logo" class="h-8 w-auto mb-2 object-contain"
                    src="{{ asset('images/logo_rimaushipping.png') }}">
                <h1 class="text-sm font-bold uppercase text-primary tracking-tight mb-1">
                    SIMOP-KAPAL
                </h1>
                <p class="text-[9px] text-outline uppercase tracking-wider font-semibold">
                    PT RIMAU BAHTERA SHIPPING
                </p>
            </div>

            <!-- Login Title Section -->
            <div class="mb-4 text-center">
                <h2 class="text-lg font-bold text-on-background mb-0.5">Login</h2>
                <p class="text-xs text-on-surface-variant">Silahkan masuk untuk melanjutkan</p>
            </div>

            <!-- Session Status Alert -->
            @if (session('status'))
                <div
                    class="mb-4 p-3 bg-primary-container text-on-primary-container border border-primary/20 rounded-lg flex items-start gap-2">
                    <span class="material-symbols-outlined text-primary text-lg mt-0.5">info</span>
                    <div class="text-xs font-medium">
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <!-- Global Error Banner -->
            @if ($errors->any())
                <div
                    class="mb-4 p-3 bg-error-container text-on-error-container border border-error/20 rounded-lg flex items-start gap-2">
                    <span class="material-symbols-outlined text-error text-lg mt-0.5">warning</span>
                    <div>
                        <p class="font-bold text-xs text-error">Gagal Masuk</p>
                        <ul class="text-[10px] list-disc list-inside opacity-90 mt-0.5 space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-3.5">
                @csrf

                <!-- Email Field -->
                <div class="space-y-1">
                    <label
                        class="font-label-sm text-label-sm text-on-surface-variant uppercase text-[10px] tracking-wide"
                        for="email">Email</label>
                    <div class="relative group">
                        <span
                            class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors text-lg">mail</span>
                        <input
                            class="w-full pl-11 pr-4 py-2 bg-surface border @error('email') border-error ring-1 ring-error @else border-outline-variant hover:border-outline @enderror rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary focus:shadow-sm focus:shadow-primary/15 outline-none transition-all font-body-md text-sm placeholder:text-outline-variant"
                            id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda"
                            type="email" required autofocus>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="space-y-1">
                    <label
                        class="font-label-sm text-label-sm text-on-surface-variant uppercase text-[10px] tracking-wide"
                        for="password">Password</label>
                    <div class="relative group">
                        <span
                            class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors text-lg">lock</span>
                        <input
                            class="w-full pl-11 pr-11 py-2 bg-surface border @error('password') border-error ring-1 ring-error @else border-outline-variant hover:border-outline @enderror rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary focus:shadow-sm focus:shadow-primary/15 outline-none transition-all font-body-md text-sm placeholder:text-outline-variant"
                            id="password" name="password" placeholder="Masukkan password Anda" type="password"
                            required>
                        <button
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors"
                            type="button" id="togglePassword">
                            <span class="material-symbols-outlined text-lg">visibility</span>
                        </button>
                    </div>
                </div>

                <!-- Options Row -->
                <div class="flex items-center justify-between pt-0.5">
                    <label class="flex items-center space-x-2 cursor-pointer group">
                        <input id="remember" name="remember"
                            class="w-3.5 h-3.5 rounded border-outline-variant text-primary focus:ring-primary"
                            type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                        <span
                            class="font-body-md text-on-surface-variant group-hover:text-primary transition-colors text-xs">Ingat
                            saya</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="font-label-sm text-primary hover:underline transition-all text-xs"
                            href="{{ route('password.request') }}">Lupa password?</a>
                    @endif
                </div>

                <!-- Primary Action Button -->
                <div class="pt-1">
                    <button
                        class="w-full bg-primary text-on-primary py-2.5 rounded-lg font-semibold uppercase tracking-wider hover:opacity-90 active:scale-[0.98] transition-all flex items-center justify-center gap-2 shadow-md hover:shadow-lg text-sm group"
                        type="submit">
                        MASUK
                        <span
                            class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer inside Right Column -->
        <footer class="pt-4 text-center w-full max-w-[380px] mx-auto">
            <p class="font-label-sm text-outline tracking-wider opacity-70 text-[10px]">
                © 2026 PT Rimau Bahtera Shipping. All rights reserved.
            </p>
        </footer>
    </main>

    <!-- Password Visibility Toggle Logic -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const input = document.getElementById('password');
            const icon = this.querySelector('.material-symbols-outlined');
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerText = 'visibility_off';
            } else {
                input.type = 'password';
                icon.innerText = 'visibility';
            }
        });
    </script>
</body>

</html>

