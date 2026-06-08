<x-auth-elvora-layout>
    <x-slot name="title">Verify Email | Elvora Innovation</x-slot>

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
                <h2 class="mt-6 text-3xl font-display font-bold text-white tracking-tight">Verify Your Email</h2>
                <p class="mt-2 text-sm text-slate-400">Please confirm your email address to unlock your account</p>
            </div>

            <!-- Form Card -->
            <div class="bg-slate-900/40 backdrop-blur-xl border border-white/10 p-8 rounded-3xl shadow-2xl relative overflow-hidden">
                <!-- Inner top border highlight -->
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-brand-secondary/30 to-transparent"></div>

                <div class="mb-6 text-sm text-slate-300 leading-relaxed text-center">
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                </div>

                <!-- Session Feedback -->
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-6 animate-in fade-in duration-500" role="alert">
                        <div class="flex items-start gap-3 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400">
                            <span class="material-symbols-outlined text-[20px] mt-0.5">check_circle</span>
                            <span class="text-sm">A new verification link has been sent to the email address you provided.</span>
                        </div>
                    </div>
                @endif

                <div class="space-y-4">
                    <form method="POST" action="{{ route('verification.send') }}" id="verificationForm">
                        @csrf
                        <button class="w-full bg-brand-secondary hover:bg-brand-secondaryDark text-white py-3.5 rounded-xl font-bold shadow-lg shadow-brand-secondary/10 transition-all active:scale-[0.98] flex items-center justify-center gap-2 group" 
                                type="submit"
                                id="submitBtn">
                            <span>Resend Verification Email</span>
                            <span class="material-symbols-outlined transition-transform group-hover:translate-x-0.5 text-lg">mail</span>
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full bg-transparent hover:bg-white/5 border border-white/10 text-slate-300 py-3 rounded-xl font-bold transition-all flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-lg">logout</span>
                            <span>Sign Out</span>
                        </button>
                    </form>
                </div>
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
            const verificationForm = document.getElementById('verificationForm');
            const submitBtn = document.getElementById('submitBtn');

            // Handle Loading State
            verificationForm.addEventListener('submit', () => {
                submitBtn.classList.add('btn-loading');
                submitBtn.disabled = true;
            });
        });
    </script>
    @endpush
</x-auth-elvora-layout>
