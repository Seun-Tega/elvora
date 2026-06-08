<x-filament-widgets::widget>
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 hover:shadow-premium-hover transition-all duration-300">
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-800/80 pb-4 mb-4">
            <div class="flex items-center gap-2">
                <x-filament::icon icon="heroicon-m-clock" class="h-5 w-5 text-[#CC9933]" />
                <div>
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white">Recent Activity</h3>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400">Activity across leads, messages, and blog edits.</p>
                </div>
            </div>
            <x-filament::button href="{{ \App\Filament\Pages\ActivityCenter::getUrl() }}" tag="a" icon="heroicon-m-arrow-right" color="gray" size="xs" outlined>
                View Center
            </x-filament::button>
        </div>

        <!-- 3-Column Activity Feed Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Project Requests Column -->
            <div class="space-y-3">
                <div class="flex items-center gap-1.5 border-b border-slate-100 dark:border-slate-800/60 pb-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Project Requests</h4>
                </div>
                <div class="divide-y divide-slate-50 dark:divide-slate-800/40 space-y-1">
                    @forelse ($recentProjects as $project)
                        <a href="{{ \App\Filament\Resources\ProjectRequests\ProjectRequestResource::getUrl('edit', ['record' => $project]) }}" class="group block py-2 px-1 hover:bg-slate-50 dark:hover:bg-slate-800/30 rounded-lg transition-colors duration-150">
                            <span class="block text-xs font-bold text-slate-700 dark:text-slate-300 group-hover:text-brand-primary dark:group-hover:text-brand-accent transition-colors">{{ $project->name }}</span>
                            <div class="flex justify-between items-center mt-1">
                                <span class="text-[10px] font-semibold uppercase tracking-wide bg-blue-50 dark:bg-blue-950/30 text-blue-600 dark:text-blue-400 px-1.5 py-0.5 rounded">{{ $project->status ?? 'new' }}</span>
                                <small class="text-[9px] font-mono text-slate-400">{{ $project->created_at?->diffForHumans() }}</small>
                            </div>
                        </a>
                    @empty
                        <p class="text-xs text-slate-400 dark:text-slate-500 py-4 italic">No project requests.</p>
                    @endforelse
                </div>
            </div>

            <!-- Messages Column -->
            <div class="space-y-3">
                <div class="flex items-center gap-1.5 border-b border-slate-100 dark:border-slate-800/60 pb-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#CC9933]"></span>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Contact Messages</h4>
                </div>
                <div class="divide-y divide-slate-50 dark:divide-slate-800/40 space-y-1">
                    @forelse ($recentMessages as $message)
                        <a href="{{ \App\Filament\Resources\ContactMessages\ContactMessageResource::getUrl('edit', ['record' => $message]) }}" class="group block py-2 px-1 hover:bg-slate-50 dark:hover:bg-slate-800/30 rounded-lg transition-colors duration-150">
                            <span class="block text-xs font-bold text-slate-700 dark:text-slate-300 group-hover:text-brand-primary dark:group-hover:text-brand-accent transition-colors">{{ $message->name }}</span>
                            <div class="flex justify-between items-center mt-1">
                                <span class="text-[10px] font-medium text-slate-500 dark:text-slate-400 truncate max-w-[120px]">{{ $message->email }}</span>
                                <small class="text-[9px] font-mono text-slate-400">{{ $message->created_at?->diffForHumans() }}</small>
                            </div>
                        </a>
                    @empty
                        <p class="text-xs text-slate-400 dark:text-slate-500 py-4 italic">No messages yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Content changes Column -->
            <div class="space-y-3">
                <div class="flex items-center gap-1.5 border-b border-slate-100 dark:border-slate-800/60 pb-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Content Changes</h4>
                </div>
                <div class="divide-y divide-slate-50 dark:divide-slate-800/40 space-y-1">
                    @forelse ($recentPosts as $post)
                        <a href="{{ \App\Filament\Resources\Blogs\BlogResource::getUrl('edit', ['record' => $post]) }}" class="group block py-2 px-1 hover:bg-slate-50 dark:hover:bg-slate-800/30 rounded-lg transition-colors duration-150">
                            <span class="block text-xs font-bold text-slate-700 dark:text-slate-300 group-hover:text-brand-primary dark:group-hover:text-brand-accent transition-colors truncate">{{ $post->title }}</span>
                            <div class="flex justify-between items-center mt-1">
                                <span class="text-[10px] font-semibold uppercase tracking-wide px-1.5 py-0.5 rounded {{ $post->published ? 'bg-emerald-50 dark:bg-emerald-950/30 text-emerald-600 dark:text-emerald-400' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400' }}">
                                    {{ $post->published ? 'Published' : 'Draft' }}
                                </span>
                                <small class="text-[9px] font-mono text-slate-400">{{ $post->updated_at?->diffForHumans() }}</small>
                            </div>
                        </a>
                    @empty
                        <p class="text-xs text-slate-400 dark:text-slate-500 py-4 italic">No content changes.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
