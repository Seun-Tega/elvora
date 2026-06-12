<div class="fixed inset-0 flex min-h-screen text-left bg-slate-50 dark:bg-slate-950 z-50 overflow-hidden font-sans lg:h-screen transition-colors duration-300">
    <!-- Style block to ensure maximum visibility for inputs and placeholders in light/dark modes -->
    <style>
        .fi-input {
            color: #0f172a !important; 
        }
        .dark .fi-input {
            color: #f8fafc !important; 
        }
        .fi-input::placeholder {
            color: #64748b !important; 
            opacity: 1 !important;
        }
        .dark .fi-input::placeholder {
            color: #94a3b8 !important; 
            opacity: 1 !important;
        }
        .fi-input-wrp {
            background-color: #ffffff !important;
            border-color: rgba(15, 23, 42, 0.1) !important;
            border-radius: 12px !important;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;
            transition: all 0.2s ease-in-out !important;
        }
        .fi-input-wrp:focus-within {
            border-color: #CC9933 !important;
            box-shadow: 0 0 0 2px rgba(204, 153, 51, 0.2) !important;
        }
        .dark .fi-input-wrp {
            background-color: #0f172a !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
        }
        .dark .fi-input-wrp:focus-within {
            border-color: #CC9933 !important;
            box-shadow: 0 0 0 2px rgba(204, 153, 51, 0.4) !important;
        }
        /* Style Filament's Primary Button to match Elvora's theme colors */
        .fi-btn {
            border-radius: 9999px !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            transition: all 0.3s ease-in-out !important;
        }
        .fi-btn-color-primary {
            background-color: #001e40 !important;
            color: #ffffff !important;
        }
        .fi-btn-color-primary:hover {
            background-color: #CC9933 !important;
            color: #001e40 !important;
            transform: scale(1.02) !important;
        }
        .dark .fi-btn-color-primary {
            background-color: #CC9933 !important;
            color: #001e40 !important;
        }
        .dark .fi-btn-color-primary:hover {
            background-color: #ffffff !important;
            color: #001e40 !important;
            transform: scale(1.02) !important;
        }
    </style>

    <!-- Left Column: Visual Architecture -->
    <div class="hidden lg:block lg:w-1/2 h-full relative bg-[#001e40] overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img alt="Abstract Architecture" 
                 id="adminHeroImage"
                 class="w-full h-full object-cover opacity-40 mix-blend-luminosity scale-105 transition-transform duration-300" 
                 src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1920&auto=format&fit=crop"/>
        </div>
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-[#020617] via-[#001e40]/70 to-[#020617]/50 mix-blend-multiply z-[1]"></div>
        
        <!-- Overlay Content -->
        <div class="relative z-10 flex flex-col justify-between h-full p-12 text-white">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/elvora-logo.png') }}" alt="Elvora" class="h-8 w-auto">
                <span class="font-display font-extrabold text-xl tracking-tight">Elvora Innovation</span>
            </div>
            <div>
                <h2 class="text-3xl font-extrabold tracking-tight text-white leading-tight">Join the ecosystem. Build tomorrow's legacy today.</h2>
                <p class="text-xs text-slate-300 mt-3 max-w-sm opacity-80 leading-relaxed">
                    Access registration to the administrative dashboard for managing applications, client proposals, and system metrics.
                </p>
                <div class="flex items-center gap-2 mt-8">
                    <div class="h-0.5 w-8 bg-[#CC9933]"></div>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#CC9933]">Access Enrollment</span>
                </div>
            </div>
        </div>
        <div class="absolute inset-0 pointer-events-none opacity-10 z-[2]" style="background-image: radial-gradient(#ffffff 0.5px, transparent 0.5px); background-size: 24px 24px;"></div>
    </div>

    <!-- Right Column: Authentication Form -->
    <div class="w-full lg:w-1/2 h-full flex flex-col bg-slate-50 dark:bg-[#090f1d] overflow-y-auto justify-between p-8 md:p-12 transition-colors duration-300">
        <header class="flex justify-between items-center w-full flex-shrink-0 z-10">
            <a href="/" class="flex items-center gap-2 sm:gap-2.5 group transition-all duration-300">
                <img src="{{ asset('images/elvora-logo.png') }}" alt="Elvora Innovation" class="h-6 sm:h-7 w-auto object-contain">
                <div class="flex flex-col">
                    <span class="font-display font-black text-sm leading-tight text-[#001e40] dark:text-white tracking-tighter group-hover:text-brand-secondary transition-colors">Elvora Innovation</span>
                    <span class="font-black uppercase text-brand-secondary" style="font-size: 2.8px; tracking: 0.35em;">structure . growth . legacy</span>
                </div>
            </a>
            <a class="flex items-center gap-1 text-slate-400 hover:text-brand-primary dark:hover:text-brand-secondary transition-colors" href="/">
                
                <span class="text-[9px] font-bold uppercase tracking-widest">Main Site</span>
            </a>
        </header>

        <div class="w-full max-w-md mx-auto my-auto py-10 z-10">
            <div class="bg-white dark:bg-[#0b1329] border border-slate-200/60 dark:border-white/5 shadow-2xl rounded-3xl p-8 md:p-10 space-y-6">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight mb-1">Create Account</h1>
                    <p class="text-slate-400 dark:text-slate-400 text-xs">Register your administrative identity to begin.</p>
                </div>

                <x-filament-panels::form id="form" wire:submit="register">
                    {{ $this->form }}

                    <div class="pt-2">
                        <x-filament-panels::form.actions
                            :actions="$this->getCachedFormActions()"
                            :full-width="$this->hasFullWidthFormActions()"
                        />
                    </div>
                </x-filament-panels::form>
                
                <div class="text-center pt-2 border-t border-slate-100 dark:border-white/5">
                    <p class="text-xs text-slate-400 dark:text-slate-500">
                        Already have an account? 
                        <a href="{{ route('filament.admin.auth.login') }}" class="text-[#001e40] dark:text-[#CC9933] font-black uppercase hover:underline text-[10px] tracking-wider ml-1">Sign In</a>
                    </p>
                </div>
            </div>
        </div>

        <footer class="opacity-60 text-[10px] text-slate-400 dark:text-slate-500 flex-shrink-0 z-10">
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
