<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Elvora Innovations') }}</title>
    <meta name="description" content="Secure access to Elvora Innovations Command Center. Engineering the future of venture building.">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/elvora-logo.png') }}">

    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fonts: Inter, Outfit, JetBrains Mono -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@450&display=swap" rel="stylesheet"/>

    <!-- Assets -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            primary: '#003366',
                            primaryDark: '#001F3D',
                            secondary: '#CC9933',
                            secondaryDark: '#99701F',
                            bg: '#FFFFFF',
                            surfaceLight: '#F8FAFC',
                            surfaceDark: '#0F172A',
                            borderLight: '#E2E8F0',
                            textDark: '#0F172A',
                            textMuted: '#475569',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    boxShadow: {
                        premium: '0 10px 30px -10px rgba(0, 51, 102, 0.08), 0 1px 3px 0 rgba(0, 0, 0, 0.02)',
                        premiumHover: '0 20px 40px -15px rgba(0, 51, 102, 0.12), 0 1px 10px 0 rgba(0, 0, 0, 0.03)',
                    }
                }
            }
        }
    </script>
    @vite(['resources/js/app.js'])

    <style>
        :root {
            --elvora-glow-1: rgba(0, 51, 102, 0.2);
            --elvora-glow-2: rgba(204, 153, 51, 0.08);
            --brand-primary: #003366;
            --brand-secondary: #CC9933;
        }


        /* Sophisticated Background */
        .auth-bg {
            background-color: #020617; /* slate-950 */
        }

        /* Glass Form Container */
        .glass-form {
            background: rgba(15, 23, 42, 0.7); /* slate-900/70 */
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .input-transition {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .auth-input {
            background: rgba(2, 6, 23, 0.5) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: white !important;
        }

        .auth-input:focus {
            border-color: var(--brand-secondary) !important;
            box-shadow: 0 0 0 4px rgba(204, 153, 51, 0.1) !important;
            background: rgba(2, 6, 23, 0.7) !important;
        }

        /* Loading state for buttons */
        .btn-loading {
            position: relative;
            color: transparent !important;
            pointer-events: none;
        }

        .btn-loading::after {
            content: "";
            position: absolute;
            width: 1.25rem;
            height: 1.25rem;
            top: 50%;
            left: 50%;
            margin: -0.625rem 0 0 -0.625rem;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: var(--brand-secondary);
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Image Side Overlays */
        .image-overlay {
            background: linear-gradient(to right, rgba(2, 6, 23, 0.4), rgba(2, 6, 23, 0.9));
        }

        .image-gradient-elite {
            background: radial-gradient(circle at 20% 30%, var(--elvora-glow-1) 0%, transparent 70%),
                        radial-gradient(circle at 80% 70%, var(--elvora-glow-2) 0%, transparent 70%);
        }

        /* Prevent scrollbar layout shift */
        html {
            scrollbar-gutter: stable;
        }
    </style>
</head>
<body class="auth-bg min-h-screen text-slate-200 font-sans antialiased selection:bg-brand-secondary/30 selection:text-white overflow-x-hidden">
    {{ $slot }}

    @stack('scripts')
</body>
</html>
