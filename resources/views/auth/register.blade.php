<x-auth-elvora-layout>
    <x-slot name="title">Create Account | Elvora Innovation</x-slot>

    <div class="min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8 relative overflow-hidden bg-slate-950 py-12">
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
                <h2 class="mt-6 text-3xl font-display font-bold text-white tracking-tight">Create Account</h2>
                <p class="mt-2 text-sm text-slate-400">Join the Elvora Innovation network</p>
            </div>

            <!-- Form Card -->
            <div class="bg-slate-900/40 backdrop-blur-xl border border-white/10 p-8 rounded-3xl shadow-2xl relative overflow-hidden">
                <!-- Inner top border highlight -->
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-brand-secondary/30 to-transparent"></div>

                <form class="space-y-5" id="registerForm" method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Full Name Field -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-[0.15em]" for="name">Full Name</label>
                        <div class="relative group">
                            <x-lucide-user width="20" height="20" class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-brand-secondary transition-colors" />
                            <input class="auth-input w-full pl-11 pr-4 py-3 rounded-xl outline-none input-transition text-sm bg-slate-955/60 border border-white/10 text-white focus:border-brand-secondary focus:ring-4 focus:ring-brand-secondary/10" 
                                id="name" 
                                type="text" 
                                name="name" 
                                value="{{ old('name') }}" 
                                placeholder="Alexander Vance" 
                                required autofocus 
                                autocomplete="name" />
                        </div>
                        @if($errors->has('name'))
                            <p class="text-red-400 text-xs mt-1 animate-in fade-in slide-in-from-top-1">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-[0.15em]" for="email">Email Address</label>
                        <div class="relative group">
                            <x-lucide-mail width="20" height="20" class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-brand-secondary transition-colors" />
                            <input class="auth-input w-full pl-11 pr-4 py-3 rounded-xl outline-none input-transition text-sm bg-slate-950/60 border border-white/10 text-white focus:border-brand-secondary focus:ring-4 focus:ring-brand-secondary/10" 
                                id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                placeholder="name@company.com" 
                                required 
                                autocomplete="username" />
                        </div>
                        @if($errors->has('email'))
                            <p class="text-red-400 text-xs mt-1 animate-in fade-in slide-in-from-top-1">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-[0.15em]" for="password">Password</label>
                        <div class="relative group">
                            <x-lucide-lock width="20" height="20" class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-brand-secondary transition-colors" />
                            <input class="auth-input w-full pl-11 pr-11 py-3 rounded-xl outline-none input-transition text-sm bg-slate-950/60 border border-white/10 text-white focus:border-brand-secondary focus:ring-4 focus:ring-brand-secondary/10" 
                                id="password" 
                                type="password" 
                                name="password" 
                                placeholder="Min. 8 characters" 
                                required 
                                autocomplete="new-password" />
                            <button class="togglePassword absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-500 hover:text-white transition-colors p-1" 
                                    type="button"
                                    aria-label="Toggle password visibility">
                                <x-lucide-eye width="20" height="20" class="eye-icon" />
                                <x-lucide-eye-off width="20" height="20" class="eye-off-icon hidden" />
                            </button>
                        </div>
                        @if($errors->has('password'))
                            <p class="text-red-400 text-xs mt-1 animate-in fade-in slide-in-from-top-1">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-[0.15em]" for="password_confirmation">Confirm Password</label>
                        <div class="relative group">
                            <x-lucide-lock width="20" height="20" class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-brand-secondary transition-colors" />
                            <input class="auth-input w-full pl-11 pr-11 py-3 rounded-xl outline-none input-transition text-sm bg-slate-955/60 border border-white/10 text-white focus:border-brand-secondary focus:ring-4 focus:ring-brand-secondary/10" 
                                id="password_confirmation" 
                                type="password" 
                                name="password_confirmation" 
                                placeholder="Repeat password" 
                                required 
                                autocomplete="new-password" />
                            <button class="togglePassword absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-500 hover:text-white transition-colors p-1" 
                                    type="button"
                                    aria-label="Toggle password visibility">
                                <x-lucide-eye width="20" height="20" class="eye-icon" />
                                <x-lucide-eye-off width="20" height="20" class="eye-off-icon hidden" />
                            </button>
                        </div>
                    </div>

                    <!-- Compliance -->
                    <div class="pt-1">
                        <label class="flex items-start gap-3 cursor-pointer group" for="terms">
                            <input class="mt-1 w-4 h-4 rounded bg-slate-950 border-white/10 text-brand-secondary focus:ring-brand-secondary/20 focus:ring-offset-0 transition-all cursor-pointer" 
                                id="terms" 
                                name="terms" 
                                required 
                                type="checkbox"/>
                            <span class="text-xs text-slate-400 leading-relaxed group-hover:text-slate-200 transition-colors">
                                I agree to the 
                                <a href="#" class="text-brand-secondary font-semibold hover:text-white transition-colors">Terms of Service</a> and 
                                <a href="#" class="text-brand-secondary font-semibold hover:text-white transition-colors">Privacy Policy</a>.
                            </span>
                        </label>
                    </div>

                    <!-- Primary Action -->
                    <button class="w-full bg-brand-secondary hover:bg-brand-secondaryDark text-white py-3.5 rounded-xl font-bold shadow-lg shadow-brand-secondary/10 transition-all active:scale-[0.98] flex items-center justify-center gap-2 group mt-4" 
                            type="submit"
                            id="submitBtn">
                        <span>Create Account</span>
                        <x-lucide-arrow-right width="18" height="18" class="transition-transform group-hover:translate-x-1" />
                    </button>
                </form>

                <!-- Navigation Route -->
                <div class="mt-6 pt-6 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
                    <p class="text-xs text-slate-400">Already have an account?</p>
                    <a class="flex items-center gap-1 text-xs font-bold text-white hover:text-brand-secondary transition-all group tracking-wider" href="{{ route('login') }}">
                        <span>Sign In</span>
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
            const registerForm = document.getElementById('registerForm');
            const submitBtn = document.getElementById('submitBtn');

            // Handle Loading State
            registerForm.addEventListener('submit', () => {
                submitBtn.classList.add('btn-loading');
                submitBtn.disabled = true;
            });

            // Toggle password visibility
            document.querySelectorAll('.togglePassword').forEach(btn => {
                btn.addEventListener('click', () => {
                    const input = btn.previousElementSibling;
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    
                    const eyeIcon = btn.querySelector('.eye-icon');
                    const eyeOffIcon = btn.querySelector('.eye-off-icon');

                    if (type === 'password') {
                        eyeIcon.classList.remove('hidden');
                        eyeOffIcon.classList.add('hidden');
                    } else {
                        eyeIcon.classList.add('hidden');
                        eyeOffIcon.classList.remove('hidden');
                    }
                });
            });
        });
    </script>
    @endpush
</x-auth-elvora-layout>
