<x-auth-elvora-layout>
    <x-slot name="title">Reset Password | Elvora Innovation</x-slot>

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
                <h2 class="mt-6 text-3xl font-display font-bold text-white tracking-tight">Reset Password</h2>
                <p class="mt-2 text-sm text-slate-400">Establish a new secure password for your access credentials</p>
            </div>

            <!-- Form Card -->
            <div class="bg-slate-900/40 backdrop-blur-xl border border-white/10 p-8 rounded-3xl shadow-2xl relative overflow-hidden">
                <!-- Inner top border highlight -->
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-brand-secondary/30 to-transparent"></div>

                <form class="space-y-6" id="resetForm" method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-[0.15em]" for="email">Email Address</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-brand-secondary transition-colors text-[20px]">mail</span>
                            <input class="auth-input w-full pl-11 pr-4 py-3 rounded-xl outline-none input-transition text-sm bg-slate-950/60 border border-white/10 text-white focus:border-brand-secondary focus:ring-4 focus:ring-brand-secondary/10" 
                                id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email', $request->email) }}" 
                                required autofocus autocomplete="username" />
                        </div>
                        @if($errors->has('email'))
                            <p class="text-red-400 text-xs mt-1 animate-in fade-in slide-in-from-top-1">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-[0.15em]" for="password">New Password</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-brand-secondary transition-colors text-[20px]">lock_open</span>
                            <input class="auth-input w-full pl-11 pr-11 py-3 rounded-xl outline-none input-transition text-sm bg-slate-950/60 border border-white/10 text-white focus:border-brand-secondary focus:ring-4 focus:ring-brand-secondary/10" 
                                id="password" 
                                type="password" 
                                name="password" 
                                placeholder="Min. 8 characters" 
                                required 
                                autocomplete="new-password" />
                            <button class="togglePassword material-symbols-outlined absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-500 hover:text-white transition-colors p-1" 
                                    type="button"
                                    aria-label="Toggle password visibility">
                                visibility
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
                            <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-brand-secondary transition-colors text-[20px]">lock</span>
                            <input class="auth-input w-full pl-11 pr-11 py-3 rounded-xl outline-none input-transition text-sm bg-slate-950/60 border border-white/10 text-white focus:border-brand-secondary focus:ring-4 focus:ring-brand-secondary/10" 
                                id="password_confirmation" 
                                type="password" 
                                name="password_confirmation" 
                                placeholder="Repeat password" 
                                required 
                                autocomplete="new-password" />
                            <button class="togglePassword material-symbols-outlined absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-500 hover:text-white transition-colors p-1" 
                                    type="button"
                                    aria-label="Toggle password visibility">
                                visibility
                            </button>
                        </div>
                    </div>

                    <!-- Primary Action -->
                    <button class="w-full bg-brand-secondary hover:bg-brand-secondaryDark text-white py-3.5 rounded-xl font-bold shadow-lg shadow-brand-secondary/10 transition-all active:scale-[0.98] flex items-center justify-center gap-2 group mt-4" 
                            type="submit"
                            id="submitBtn">
                        <span>Reset Password</span>
                        <span class="material-symbols-outlined transition-transform group-hover:translate-x-0.5 text-lg">lock_reset</span>
                    </button>
                </form>
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
            const resetForm = document.getElementById('resetForm');
            const submitBtn = document.getElementById('submitBtn');

            // Handle Loading State
            resetForm.addEventListener('submit', () => {
                submitBtn.classList.add('btn-loading');
                submitBtn.disabled = true;
            });

            // Toggle password visibility
            document.querySelectorAll('.togglePassword').forEach(btn => {
                btn.addEventListener('click', () => {
                    const input = btn.previousElementSibling;
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    btn.textContent = type === 'password' ? 'visibility' : 'visibility_off';
                });
            });
        });
    </script>
    @endpush
</x-auth-elvora-layout>
