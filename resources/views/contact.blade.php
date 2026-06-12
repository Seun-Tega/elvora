@extends('layouts.app')

@section('title', 'Contact Us | Elvora Innovation')

@section('content')
    <div class="min-h-[85vh] flex items-center bg-brand-surfaceLight dark:bg-brand-surfaceDark py-20 border-b border-brand-borderLight dark:border-white/10">
        <div class="max-w-[1600px] w-full mx-auto px-4 grid lg:grid-cols-12 gap-16 relative z-10 w-full">
            <!-- Left Info column -->
            <div class="lg:col-span-5 space-y-6 flex flex-col justify-center">
                <span class="text-brand-secondary font-bold text-xs uppercase tracking-widest block">Get In Touch</span>
                <h1 class="font-display font-extrabold text-fluid-3xl md:text-fluid-4xl text-brand-primary dark:text-white leading-tight">
                    Let’s Build Something Great Together
                </h1>
                <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed max-w-md">
                    Whether you’re building a startup, scaling a business, or growing an organization, Elvora Innovation is ready to help.
                </p>
                
                <div class="space-y-6 pt-6 border-t border-brand-borderLight dark:border-white/10 text-xs font-semibold text-brand-textMuted dark:text-slate-400">
                    <div class="flex items-center gap-3">
                        <x-lucide-mail class="w-6 h-6 text-brand-primary dark:text-brand-secondary" />
                        <div>
                            <p class="text-[9px] uppercase font-bold text-slate-400">Email Address</p>
                            <a href="mailto:hello@elvora.com" class="text-brand-primary dark:text-white hover:underline text-sm font-bold mt-0.5 block">hello@elvora.com</a>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <x-lucide-message-square class="w-6 h-6 text-brand-primary dark:text-brand-secondary" />
                        <div>
                            <p class="text-[9px] uppercase font-bold text-slate-400">WhatsApp Hotline</p>
                            <a href="https://wa.me/2348123456789" target="_blank" class="text-brand-primary dark:text-white hover:underline text-sm font-bold mt-0.5 block">+234 812 345 6789</a>
                        </div>
                    </div>

                    <!-- Promise indicators -->
                    <div class="bg-brand-surfaceLight dark:bg-slate-900 border border-brand-borderLight dark:border-white/10 p-4 rounded-xl space-y-2">
                        <p class="text-[9px] uppercase font-bold text-slate-400">Our Promises</p>
                        <div class="flex justify-between items-center text-[10px]">
                            <span>Reply Time</span>
                            <span class="text-brand-secondary font-bold">Under 12 hrs</span>
                        </div>
                        <div class="flex justify-between items-center text-[10px]">
                            <span>Priority Reply</span>
                            <span class="text-brand-secondary font-bold">Under 2 hrs</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Card column -->
            <div class="lg:col-span-7 overflow-x-auto">
                <div x-data="{ 
                formData: {
                    name: '',
                    email: '',
                    phone: '',
                    message: ''
                },
                errors: {},
                isSubmitting: false,
                successMessage: '',
                errorMessage: '',
                validate() {
                    this.errors = {};
                    if (!this.formData.name.trim()) this.errors.name = 'Full name is required';
                    if (!this.formData.email.trim() || !this.formData.email.includes('@')) this.errors.email = 'Valid email is required';
                    if (!this.formData.message.trim()) this.errors.message = 'Message body is required';
                    return Object.keys(this.errors).length === 0;
                },
                async submitForm() {
                    if (!this.validate()) return;
                    this.isSubmitting = true;
                    this.successMessage = '';
                    this.errorMessage = '';

                    const csrfToken = document.querySelector('meta[name=&quot;csrf-token&quot;]').getAttribute('content');
                    const formBody = new FormData();
                    Object.entries(this.formData).forEach(([key, val]) => formBody.append(key, val));

                    try {
                        const response = await fetch('{{ route('contact.submit') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json'
                            },
                            body: formBody
                        });
                        const data = await response.json();
                        if (response.ok && data.success) {
                            this.successMessage = data.message;
                            this.formData = { name: '', email: '', phone: '', message: '' };
                        } else {
                            this.errorMessage = data.errors ? Object.values(data.errors).flat().join(' | ') : (data.message || 'Validation failed.');
                        }
                    } catch (err) {
                        this.errorMessage = 'Connection error. Please try again.';
                    } finally {
                        this.isSubmitting = false;
                    }
                }
            }" class="bg-white dark:bg-slate-900 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl shadow-premium">
                
                <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white mb-6">Tell us about your project and we will get back to you.</h3>

                <!-- Alerts -->
                <div x-show="errorMessage" x-text="errorMessage" class="mb-6 p-4 rounded-xl text-xs font-semibold bg-red-50 text-red-700 border border-red-100" style="display: none;"></div>
                <div x-show="successMessage" x-text="successMessage" class="mb-6 p-4 rounded-xl text-xs font-semibold bg-green-50 text-green-700 border border-green-100" style="display: none;"></div>

                <form @submit.prevent="submitForm()" class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Full Name *</label>
                        <input type="text" x-model="formData.name" class="w-full bg-slate-50 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5 rounded-xl px-4 py-3 text-xs focus:ring-brand-primary focus:border-brand-primary text-brand-primary dark:text-white" placeholder="Alex Carter">
                        <span class="text-[10px] text-red-500 font-semibold mt-1 block" x-show="errors.name" x-text="errors.name" style="display: none;"></span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Email Address *</label>
                            <input type="email" x-model="formData.email" class="w-full bg-slate-50 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5 rounded-xl px-4 py-3 text-xs focus:ring-brand-primary focus:border-brand-primary text-brand-primary dark:text-white" placeholder="name@company.com">
                            <span class="text-[10px] text-red-500 font-semibold mt-1 block" x-show="errors.email" x-text="errors.email" style="display: none;"></span>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Phone Number</label>
                            <input type="tel" x-model="formData.phone" class="w-full bg-slate-50 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5 rounded-xl px-4 py-3 text-xs focus:ring-brand-primary focus:border-brand-primary text-brand-primary dark:text-white" placeholder="+234 ...">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Your Message *</label>
                        <textarea x-model="formData.message" rows="5" class="w-full bg-slate-50 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5 rounded-xl px-4 py-3 text-xs focus:ring-brand-primary focus:border-brand-primary text-brand-primary dark:text-white" placeholder="How can we help you today?"></textarea>
                        <span class="text-[10px] text-red-500 font-semibold mt-1 block" x-show="errors.message" x-text="errors.message" style="display: none;"></span>
                    </div>

                    <button type="submit" :disabled="isSubmitting" class="w-full bg-brand-primary text-white hover:bg-brand-primaryDark py-3.5 rounded-xl font-bold flex items-center justify-center space-x-2 transition-all active:scale-95 shadow-sm">
                        <span x-text="isSubmitting ? 'Sending...' : 'Send Message'">Send Message</span>
                        <x-lucide-send class="w-4 h-4" x-show="!isSubmitting" />
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
