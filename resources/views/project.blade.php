@extends('layouts.app')

@section('title', 'Start Project | Elvora Innovation')

@section('content')
    <div class="min-h-[85vh] flex items-center bg-brand-surfaceLight dark:bg-brand-surfaceDark py-20 border-b border-brand-borderLight dark:border-white/10">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 grid lg:grid-cols-12 gap-16 relative z-10 w-full">
            <!-- Left Info column -->
            <div class="lg:col-span-5 space-y-6 flex flex-col justify-center">
                <span class="text-brand-secondary font-bold text-xs uppercase tracking-widest block">Start Your Idea</span>
                <h1 class="font-display font-extrabold text-3xl md:text-4xl text-brand-primary dark:text-white leading-tight">
                    Ready to Bring Your Idea to Life?
                </h1>
                <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed max-w-md">
                    Tell us about your project, goals, and timeline. Our team will review your request and schedule a talk to discuss the best way to make it a success.
                </p>
                <div class="pt-4 border-t border-brand-borderLight dark:border-white/10 space-y-2 text-xs text-brand-textMuted dark:text-slate-400">
                    <p class="flex items-center gap-2"><span class="material-symbols-outlined text-brand-secondary text-base">timer</span> We usually reply in less than 12 hours</p>
                    <p class="flex items-center gap-2"><span class="material-symbols-outlined text-brand-secondary text-base">lock</span> Your privacy and ideas are safe with us</p>
                </div>
            </div>

            <!-- Form Card column (Alpine.js State) -->
            <div x-data="{ 
                step: 1, 
                formData: {
                    name: '',
                    email: '',
                    phone: '',
                    organization: '',
                    project_type: '',
                    budget_range: '',
                    timeline: '',
                    description: ''
                },
                errors: {},
                isSubmitting: false,
                successMessage: '',
                errorMessage: '',
                validateStep1() {
                    this.errors = {};
                    if (!this.formData.name.trim()) this.errors.name = 'Full name is required';
                    if (!this.formData.email.trim() || !this.formData.email.includes('@')) this.errors.email = 'Valid email is required';
                    return Object.keys(this.errors).length === 0;
                },
                validateStep2() {
                    this.errors = {};
                    if (!this.formData.project_type) this.errors.project_type = 'Please select a project type';
                    if (!this.formData.budget_range) this.errors.budget_range = 'Please select your budget range';
                    if (!this.formData.timeline) this.errors.timeline = 'Please select your timeline';
                    return Object.keys(this.errors).length === 0;
                },
                validateStep3() {
                    this.errors = {};
                    if (!this.formData.description.trim()) this.errors.description = 'Please tell us about your idea';
                    return Object.keys(this.errors).length === 0;
                },
                nextStep() {
                    if (this.step === 1 && this.validateStep1()) this.step = 2;
                    else if (this.step === 2 && this.validateStep2()) this.step = 3;
                },
                prevStep() {
                    if (this.step > 1) this.step--;
                },
                async submitForm() {
                    if (!this.validateStep3()) return;
                    this.isSubmitting = true;
                    this.successMessage = '';
                    this.errorMessage = '';

                    const csrfToken = document.querySelector('meta[name=&quot;csrf-token&quot;]').getAttribute('content');
                    const formBody = new FormData();
                    Object.entries(this.formData).forEach(([key, val]) => formBody.append(key, val));

                    try {
                        const response = await fetch('{{ route('project.submit') }}', {
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
                            this.step = 4; // success step
                        } else {
                            this.errorMessage = data.errors ? Object.values(data.errors).flat().join(' | ') : (data.message || 'Validation failed.');
                        }
                    } catch (err) {
                        this.errorMessage = 'Connection error. Please try again.';
                    } finally {
                        this.isSubmitting = false;
                    }
                }
            }" class="lg:col-span-7 bg-white dark:bg-slate-900 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl shadow-premium relative min-h-[480px] flex flex-col justify-between">
                
                <!-- Progress Header -->
                <div x-show="step < 4" class="mb-8 space-y-3">
                    <div class="flex justify-between items-center text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        <span x-text="'Step ' + step + ' of 3'">Step 1 of 3</span>
                        <span x-text="step === 1 ? 'About You' : step === 2 ? 'About Your Idea' : 'Extra details'"></span>
                    </div>
                    <!-- Visual Progress Bar -->
                    <div class="w-full bg-slate-100 dark:bg-slate-800 h-1 rounded-full overflow-hidden">
                        <div class="bg-brand-primary dark:bg-brand-secondary h-full transition-all duration-300" :style="'width: ' + (step * 33.3) + '%'"></div>
                    </div>
                </div>

                <!-- Error Toast Alert -->
                <div x-show="errorMessage" x-text="errorMessage" class="mb-6 p-4 rounded-xl text-xs font-semibold bg-red-50 text-red-700 border border-red-100" style="display: none;"></div>

                <!-- Step 1 Layout -->
                <div x-show="step === 1" class="space-y-4 flex-grow">
                    <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white mb-6">Start Your Project With Elvora Innovation</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Full Name *</label>
                            <input type="text" x-model="formData.name" class="w-full bg-slate-50 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5 rounded-xl px-4 py-3 text-xs focus:ring-brand-primary focus:border-brand-primary text-brand-primary dark:text-white" placeholder="Alex Carter">
                            <span class="text-[10px] text-red-500 font-semibold mt-1 block" x-show="errors.name" x-text="errors.name"></span>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Contact Email *</label>
                            <input type="email" x-model="formData.email" class="w-full bg-slate-50 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5 rounded-xl px-4 py-3 text-xs focus:ring-brand-primary focus:border-brand-primary text-brand-primary dark:text-white" placeholder="name@company.com">
                            <span class="text-[10px] text-red-500 font-semibold mt-1 block" x-show="errors.email" x-text="errors.email"></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Phone Number</label>
                            <input type="tel" x-model="formData.phone" class="w-full bg-slate-50 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5 rounded-xl px-4 py-3 text-xs focus:ring-brand-primary focus:border-brand-primary text-brand-primary dark:text-white" placeholder="+1 (555) 000-0000">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Company / Organization</label>
                            <input type="text" x-model="formData.organization" class="w-full bg-slate-50 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5 rounded-xl px-4 py-3 text-xs focus:ring-brand-primary focus:border-brand-primary text-brand-primary dark:text-white" placeholder="Acme Corp">
                        </div>
                    </div>
                </div>

                <!-- Step 2 Layout -->
                <div x-show="step === 2" class="space-y-4 flex-grow" style="display: none;">
                    <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white mb-6">Start Your Project With Elvora Innovation</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">What do you want to build? *</label>
                            <select x-model="formData.project_type" class="w-full bg-slate-50 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5 rounded-xl px-4 py-3 text-xs focus:ring-brand-primary focus:border-brand-primary text-brand-primary dark:text-white">
                                <option value="">Select Option...</option>
                                <option value="Building a new idea">Building a new idea</option>
                                <option value="Web Building">Web Building</option>
                                <option value="Mobile App Building">Mobile App Building</option>
                                <option value="Helping Business Grow">Helping Business Grow</option>
                                <option value="Strategy Advice">Strategy Advice</option>
                            </select>
                            <span class="text-[10px] text-red-500 font-semibold mt-1 block" x-show="errors.project_type" x-text="errors.project_type"></span>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Budget Range *</label>
                            <select x-model="formData.budget_range" class="w-full bg-slate-50 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5 rounded-xl px-4 py-3 text-xs focus:ring-brand-primary focus:border-brand-primary text-brand-primary dark:text-white">
                                <option value="">Select Range...</option>
                                <option value="$10k - $25k">$10,000 – $25,000</option>
                                <option value="$25k - $50k">$25,000 – $50,000</option>
                                <option value="$50k - $100k">$50,000 – $100,000</option>
                                <option value="$100k+">$100,000+</option>
                            </select>
                            <span class="text-[10px] text-red-500 font-semibold mt-1 block" x-show="errors.budget_range" x-text="errors.budget_range"></span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">How soon do you need it? *</label>
                        <select x-model="formData.timeline" class="w-full bg-slate-50 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5 rounded-xl px-4 py-3 text-xs focus:ring-brand-primary focus:border-brand-primary text-brand-primary dark:text-white">
                            <option value="">Select Timeline...</option>
                            <option value="< 1 Month">Under 1 Month</option>
                            <option value="1 - 3 Months">1 to 3 Months</option>
                            <option value="3 - 6 Months">3 to 6 Months</option>
                            <option value="6 Months+">More than 6 months</option>
                        </select>
                        <span class="text-[10px] text-red-500 font-semibold mt-1 block" x-show="errors.timeline" x-text="errors.timeline"></span>
                    </div>
                </div>

                <!-- Step 3 Layout -->
                <div x-show="step === 3" class="space-y-4 flex-grow" style="display: none;">
                    <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white mb-6">Start Your Project With Elvora Innovation</h3>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Tell us about your idea *</label>
                        <textarea x-model="formData.description" rows="5" class="w-full bg-slate-50 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5 rounded-xl px-4 py-3 text-xs focus:ring-brand-primary focus:border-brand-primary text-brand-primary dark:text-white" placeholder="Tell us what you want to build, who it's for, and what you want to achieve..."></textarea>
                        <span class="text-[10px] text-red-500 font-semibold mt-1 block" x-show="errors.description" x-text="errors.description"></span>
                    </div>
                </div>

                <!-- Step 4 Layout (Success Screen) -->
                <div x-show="step === 4" class="text-center py-8 space-y-6 flex-grow flex flex-col items-center justify-center" style="display: none;">
                    <div class="w-16 h-16 rounded-full bg-green-50 dark:bg-green-950/30 flex items-center justify-center text-green-500">
                        <span class="material-symbols-outlined text-4xl">check_circle</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Sent Successfully</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed max-w-md mx-auto" x-text="successMessage"></p>
                    </div>
                    <button @click="step = 1; formData = { name: '', email: '', phone: '', organization: '', project_type: '', budget_range: '', timeline: '', description: '' }; successMessage = '';" 
                            class="px-6 py-2.5 bg-brand-surfaceLight dark:bg-slate-800 text-brand-primary dark:text-white text-xs font-bold rounded-xl border border-brand-borderLight dark:border-white/5">
                        Submit Another Request
                    </button>
                </div>

                <!-- Navigation Controls -->
                <div x-show="step < 4" class="flex justify-between items-center pt-8 mt-8 border-t border-brand-borderLight dark:border-white/10">
                    <button type="button" @click="prevStep()" x-show="step > 1" class="text-xs font-bold text-brand-textMuted hover:text-brand-primary transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">arrow_back</span> Back
                    </button>
                    <!-- Spacer -->
                    <span x-show="step === 1"></span>

                    <button type="button" @click="nextStep()" x-show="step < 3" class="bg-brand-primary text-white hover:bg-brand-primaryDark px-4 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-1">
                        Continue <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>

                    <button type="button" @click="submitForm()" x-show="step === 3" :disabled="isSubmitting" class="bg-brand-primary text-white hover:bg-brand-primaryDark px-4 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-2">
                        <span x-text="isSubmitting ? 'Sending...' : 'Let\'s Build Together'">Let's Build Together</span>
                        <span class="material-symbols-outlined text-sm" x-show="!isSubmitting">handshake</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection
