<x-auth-elvora-layout>
    <x-slot name="title">Sign In | Elvora Innovation</x-slot>

    <div class="min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8 relative overflow-hidden bg-slate-950">
        <!-- Background glows -->
        <div class="absolute top-[-20%] left-[-10%] w-[600px] h-[600px] rounded-full bg-brand-primary/15 blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-[600px] h-[600px] rounded-full bg-brand-secondary/5 blur-[120px] pointer-events-none"></div>

        <!-- Decorative Subtle Grid -->
        <div class="absolute inset-0 pointer-events-none opacity-[0.03]" style="background-image: radial-gradient(rgba(255, 255, 255, 0.15) 1px, transparent 1px); background-size: 24px 24px;"></div>

        <div class="w-full max-w-md space-y-8 relative z-10">
            <!-- Logo & Brand Header -->
            <div class="flex flex-col items-center text-center">
                <a href="/" class="group flex flex-col items-center gap-3 transition-all duration-300 hover:opacity-90">
                    <div class="relative flex items-center justify-center p-3 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md transition-all duration-500 group-hover:border-brand-secondary/30 group-hover:bg-brand-secondary/5 shadow-premium">
                        <img src="{{ asset('images/elvora-logo.png') }}" alt="Elvora Innovation" class="h-10 w-auto object-contain transition-transform duration-500 group-hover:scale-105">
                    </div>
                </a>
                <h2 class="mt-6 text-3xl font-display font-bold text-white tracking-tight">Welcome Back</h2>
                <p class="mt-2 text-sm text-slate-400">Sign in to your Elvora account</p>
            </div>

            <!-- Form Card -->
            <div class="bg-slate-900/40 backdrop-blur-xl border border-white/10 p-8 rounded-3xl shadow-2xl relative overflow-hidden">
                <!-- Inner top border highlight -->
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-brand-secondary/30 to-transparent"></div>

                <!-- Session Feedback -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form class="space-y-6" id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-[0.15em]" for="email">Email Address</label>
                        <div class="relative group">
                            <x-lucide-mail width="20" height="20" class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-brand-secondary transition-colors" />
                            <input class="auth-input w-full pl-11 pr-4 py-3 rounded-xl outline-none input-transition text-sm bg-slate-955/60 border border-white/10 text-white focus:border-brand-secondary focus:ring-4 focus:ring-brand-secondary/10" 
                                id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                placeholder="name@company.com" 
                                required autofocus 
                                autocomplete="username" />
                        </div>
                        @if($errors->has('email'))
                            <p class="text-red-400 text-xs mt-1 animate-in fade-in slide-in-from-top-1">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-[0.15em]" for="password">Password</label>
                            @if (Route::has('password.request'))
                                <a class="text-xs font-bold text-brand-secondary hover:text-white transition-colors" href="{{ route('password.request') }}">
                                    Forgot password?
                                </a>
                            @endif
                        </div>
                        <div class="relative group">
                            <x-lucide-lock width="20" height="20" class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-brand-secondary transition-colors" />
                            <input class="auth-input w-full pl-11 pr-11 py-3 rounded-xl outline-none input-transition text-sm bg-slate-950/60 border border-white/10 text-white focus:border-brand-secondary focus:ring-4 focus:ring-brand-secondary/10" 
                                id="password" 
                                type="password" 
                                name="password" 
                                placeholder="••••••••" 
                                required 
                                autocomplete="current-password" />
                            <button class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-500 hover:text-white transition-colors p-1" 
                                    type="button" 
                                    id="togglePassword"
                                    aria-label="Toggle password visibility">
                                <x-lucide-eye width="20" height="20" class="eye-icon" />
                                <x-lucide-eye-off width="20" height="20" class="eye-off-icon hidden" />
                            </button>
                        </div>
                        @if($errors->has('password'))
                            <p class="text-red-400 text-xs mt-1 animate-in fade-in slide-in-from-top-1">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <label class="flex items-center gap-3 cursor-pointer group" for="remember">
                            <input class="w-4 h-4 rounded bg-slate-955 border-white/10 text-brand-secondary focus:ring-brand-secondary/20 focus:ring-offset-0 transition-all cursor-pointer" 
                                id="remember" 
                                name="remember" 
                                type="checkbox"/>
                            <span class="text-sm text-slate-400 group-hover:text-slate-200 transition-colors">Remember me</span>
                        </label>
                    </div>

                    <!-- Primary Action -->
                    <button class="w-full bg-brand-secondary hover:bg-brand-secondaryDark text-white py-3.5 rounded-xl font-bold shadow-lg shadow-brand-secondary/10 transition-all active:scale-[0.98] flex items-center justify-center gap-2 group" 
                            type="submit"
                            id="submitBtn">
                        <span>Sign In</span>
                    
                    </button>
                </form>

                <!-- Navigation Route -->
                <div class="mt-6 pt-6 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
                    <p class="text-xs text-slate-400">New to Elvora Innovation?</p>
                    <a class="flex items-center gap-1 text-xs font-bold text-white hover:text-brand-secondary transition-all group tracking-wider" href="{{ route('register') }}">
                        <span>Create Account</span>
                        <x-lucide-arrow-right width="14" height="14" class="group-hover:translate-x-0.5 transition-transform" />
                    </a>
                </div>
            </div>

            <!-- Trust Indicator / SSL Badge -->
            <div class="flex items-center justify-center gap-6 text-slate-500 text-xs font-medium">
                <span class="flex items-center gap-1">
                    <x-lucide-lock width="16" height="16" />
                    Secure SSL Encryption
                </span>
                <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
                <span class="flex items-center gap-1">
                    <x-lucide-shield-check width="16" height="16" />
                    Authorized Gateway
                </span>
            </div>

            <!-- Professional Footer -->
            <footer class="text-center text-[10px] font-bold uppercase tracking-[0.2em] text-slate-600">
                <div class="flex justify-center gap-4">
                    <a class="hover:text-brand-secondary transition-colors" href="#">Privacy Policy</a>
                    <span>•</span>
                    <a class="hover:text-brand-secondary transition-colors" href="#">Terms of Service</a>
                </div>
                <p class="mt-3">© {{ date('Y') }} Elvora Innovation. All rights reserved.</p>
            </footer>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loginForm = document.getElementById('loginForm');
            const submitBtn = document.getElementById('submitBtn');
            const togglePass = document.getElementById('togglePassword');
            const passInput = document.getElementById('password');

            // Handle Loading State
            loginForm.addEventListener('submit', () => {
                submitBtn.classList.add('btn-loading');
                submitBtn.disabled = true;
            });

            // Password Visibility Toggle
            if (togglePass && passInput) {
                const eyeIcon = togglePass.querySelector('.eye-icon');
                const eyeOffIcon = togglePass.querySelector('.eye-off-icon');

                togglePass.addEventListener('click', () => {
                    const type = passInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passInput.setAttribute('type', type);
                    
                    if (type === 'password') {
                        eyeIcon.classList.remove('hidden');
                        eyeOffIcon.classList.add('hidden');
                    } else {
                        eyeIcon.classList.add('hidden');
                        eyeOffIcon.classList.remove('hidden');
                    }
                });
            }
        });
    </script>
    @endpush
</x-auth-elvora-layout>
