<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->login(\App\Filament\Pages\Auth\CustomLogin::class)
            ->registration(\App\Filament\Pages\Auth\CustomRegister::class)
            ->colors([
                'primary' => '#003366',
                'accent' => '#CC9933',
                'gray' => Color::Slate,
                'info' => Color::Blue,
                'success' => Color::Emerald,
                'warning' => Color::Amber,
                'danger' => Color::Rose,
            ])
            ->font('Inter')
            ->brandName('Elvora Innovation')
            ->brandLogo(fn () => view('filament.logo'))
            ->brandLogoHeight('2.5rem')
            ->sidebarFullyCollapsibleOnDesktop()
            ->databaseNotifications()
            ->renderHook(
                PanelsRenderHook::TOPBAR_START,
                fn (): string => Blade::render(<<<'BLADE'
                     <div
                        x-data="{}"
                     >
                        <button
                            x-data="{}"
                            x-on:click="$store.sidebar.isOpen ? $store.sidebar.close() : $store.sidebar.open()"
                            class="elvora-sidebar-toggle-desktop fixed top-[13px] left-5 z-[40] flex items-center justify-center w-9 h-9 rounded-lg border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800 text-gray-500 dark:text-gray-400 shadow-sm transition-all duration-200 focus:outline-none"
                            x-tooltip="{
                                content: $store.sidebar.isOpen ? 'Close sidebar' : 'Open sidebar',
                                theme: $store.theme,
                            }"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <!-- Outer rounded panel border -->
                                <rect x="2.5" y="3.5" width="19" height="17" rx="2.5" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                <!-- Left sidebar divider -->
                                <line x1="8.5" y1="3.5" x2="8.5" y2="20.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <!-- Three nav lines in sidebar panel -->
                                <line x1="4.5" y1="8" x2="6.5" y2="8" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                                <line x1="4.5" y1="11" x2="6.5" y2="11" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                                <line x1="4.5" y1="14" x2="6.5" y2="14" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>
                BLADE),
            )

            ->renderHook(
                PanelsRenderHook::GLOBAL_SEARCH_AFTER,
                fn (): string => Blade::render(<<<'BLADE'
                    <div class="flex items-center md:mx-2">
                        <x-filament::icon-button
                            x-show="$store.theme === 'light'"
                            x-on:click="$dispatch('theme-changed', 'dark')"
                            color="gray"
                            icon="heroicon-m-moon"
                            icon-size="lg"
                            x-tooltip="{
                                content: 'Switch to dark theme',
                                theme: $store.theme,
                            }"
                        />
                        <x-filament::icon-button
                            x-cloak
                            x-show="$store.theme === 'dark'"
                            x-on:click="$dispatch('theme-changed', 'light')"
                            color="gray"
                            icon="heroicon-m-sun"
                            icon-size="lg"
                            x-tooltip="{
                                content: 'Switch to light theme',
                                theme: $store.theme,
                            }"
                        />
                    </div>
                BLADE),
            )
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->navigationGroups([
                'Lead Management',
                'Content',
                'Marketing',
                'Analytics',
                'Users',
                'Settings',
                'System',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
