<x-filament-widgets::widget>
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 hover:shadow-premium-hover transition-all duration-300">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <x-filament::icon icon="heroicon-m-bolt" class="h-5 w-5 text-[#CC9933]" />
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white">Common Tasks</h3>
                </div>
                <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Quickly create content or manage your settings.</p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <x-filament::button
                    href="{{ \App\Filament\Resources\Blogs\BlogResource::getUrl('create') }}"
                    tag="a"
                    icon="heroicon-m-plus"
                    size="xs"
                    color="primary"
                    class="shadow-sm"
                >
                    Create Blog
                </x-filament::button>

                <x-filament::button
                    href="{{ \App\Filament\Resources\Categories\CategoryResource::getUrl('create') }}"
                    tag="a"
                    icon="heroicon-m-tag"
                    size="xs"
                    color="gray"
                    class="shadow-sm"
                    outlined
                >
                    Create Category
                </x-filament::button>

                <x-filament::button
                    href="{{ \App\Filament\Resources\ProjectRequests\ProjectRequestResource::getUrl('index') }}"
                    tag="a"
                    icon="heroicon-m-briefcase"
                    size="xs"
                    color="gray"
                    class="shadow-sm"
                >
                    Project Requests
                </x-filament::button>

                <x-filament::button
                    href="{{ \App\Filament\Resources\Users\UserResource::getUrl('create') }}"
                    tag="a"
                    icon="heroicon-m-user-plus"
                    size="xs"
                    color="gray"
                    class="shadow-sm"
                    outlined
                >
                    Add Team Member
                </x-filament::button>

                <x-filament::button
                    href="{{ \App\Filament\Resources\ContactMessages\ContactMessageResource::getUrl('index') }}"
                    tag="a"
                    icon="heroicon-m-arrow-down-tray"
                    size="xs"
                    color="gray"
                    class="shadow-sm"
                    outlined
                >
                    Export Leads
                </x-filament::button>

                <x-filament::button
                    href="{{ \App\Filament\Resources\Settings\SettingResource::getUrl('index') }}"
                    tag="a"
                    icon="heroicon-m-cog-6-tooth"
                    size="xs"
                    color="gray"
                    class="shadow-sm"
                    outlined
                >
                    Settings
                </x-filament::button>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
