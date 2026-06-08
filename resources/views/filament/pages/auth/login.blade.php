<div class="fixed inset-0 flex min-h-screen text-left bg-slate-50 dark:bg-slate-950 z-50 overflow-hidden font-sans lg:h-screen transition-colors duration-300">
    <!-- Style block to ensure maximum visibility for inputs and placeholders in light/dark modes -->
    <style>
        .fi-input {
            color: #0f172a !important; /* Slate 900 for light mode */
        }
        .dark .fi-input {
            color: #f8fafc !important; /* Slate 50 for dark mode */
        }
        .fi-input::placeholder {
            color: #64748b !important; /* Slate 500 for light mode */
            opacity: 1 !important;
        }
        .dark .fi-input::placeholder {
            color: #94a3b8 !important; /* Slate 400 for dark mode */
            opacity: 1 !important;
        }
        .fi-input-wrp {
            background-color: #ffffff !important;
            border-color: rgba(15, 23, 42, 0.15) !important;
            color: #0f172a !important;
        }
        .dark .fi-input-wrp {
            background-color: #0f172a !important;
            border-color: rgba(255, 255, 255, 0.15) !important;
            color: #f8fafc !important;
        }
    </style>

    <!-- Left Column: Visual Architecture -->
    <div class="hidden lg:block lg:w-1/2 h-full relative bg-[#001e40] overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img alt="Abstract Architecture" 
                 id="adminHeroImage"
                 class="w-full h-full object-cover opacity-60 mix-blend-overlay scale-105 transition-transform duration-300" 
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuBNNysmo9_id3Xj5da15D-BvvKJ2Qalw1PRLEVdykPselFO-zMT8rcsFu7a6nrzoKJOIEff1azKCzkkBMUIJlrXodNK56YPREPSrgkOTmPANViFOuU7D-X3lLjVIRpQEHa8ufHD3S_NRcqa3Ksdw0pqmKSPRTkyY1fYT5fDYQBvQW1dpLlLsALsUPRvVGDMgKL5rI3Aolz57IPQSkvbnk7gZfoSgnBSmYCiGOs_5Zk1MhPXaevUrc39ivalyVejml7YNt0onsNPHt9o"/>
        </div>
        <!-- Overlay Content -->
        <div class="relative z-10 flex flex-col justify-between h-full p-12 text-white">
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-white">Elvora Innovations</h2>
                <p class="text-xs text-slate-300 mt-2 max-w-sm opacity-90 leading-relaxed">
                    Architecting the infrastructure of tomorrow's legacy.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <div class="h-0.5 w-8 bg-[#CC9933]"></div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-[#CC9933]">Admin Command Center</span>
            </div>
        </div>
        <div class="absolute inset-0 pointer-events-none opacity-20" style="background-image: radial-gradient(#ffffff 0.5px, transparent 0.5px); background-size: 24px 24px;"></div>
    </div>

    <!-- Right Column: Authentication Form -->
    <div class="w-full lg:w-1/2 h-full flex flex-col bg-white dark:bg-slate-900 overflow-y-auto justify-between p-8 md:p-12 transition-colors duration-300">
        <header class="flex justify-between items-center w-full flex-shrink-0">
            <div>
                <span class="font-extrabold tracking-tight text-[#001e40] dark:text-white text-lg">Elvora Control Panel</span>
            </div>
            <a class="flex items-center gap-1.5 text-slate-500 hover:text-[#001e40] dark:hover:text-white transition-colors" href="/">
                <x-filament::icon icon="heroicon-m-arrow-left" class="h-4 w-4" />
                <span class="text-xs font-bold uppercase tracking-widest">Main Site</span>
            </a>
        </header>

        <div class="w-full max-w-md mx-auto my-auto py-12 space-y-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight mb-1">Welcome Back</h1>
                <p class="text-slate-500 dark:text-slate-400 text-sm">Authenticate your administrative access credentials.</p>
            </div>

            {{ $this->content }}
        </div>

        <footer class="opacity-60 text-xs text-slate-500 dark:text-slate-400 flex-shrink-0">
            © {{ date('Y') }} Elvora Innovations. All rights reserved.
        </footer>
    </div>

    <!-- JavaScript placed inside the single root element for Livewire compatibility -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const image = document.getElementById('adminHeroImage');
            window.addEventListener('mousemove', (e) => {
                if (!image) return;
                const moveX = (e.clientX - window.innerWidth / 2) * 0.005;
                const moveY = (e.clientY - window.innerHeight / 2) * 0.005;
                image.style.transform = `scale(1.05) translate(${moveX}px, ${moveY}px)`;
            });
        });
    </script>
</div>
