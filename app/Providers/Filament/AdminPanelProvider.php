<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use App\Filament\Pages\Login;
use Filament\Enums\ThemeMode;
use Filament\Support\Assets\Css;
use App\Filament\Pages\Dashboard;
use Filament\Support\Colors\Color;
use App\Http\Middleware\VerifyLocale;
use App\Http\Middleware\VerifyPunishments;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $topNavigationEnabled = getSetting('hk_top_navigation_enabled', '0') === '1';
        $defaultTheme = getSetting('default_cms_mode', 'light') === 'dark' ? ThemeMode::Dark : ThemeMode::Light;

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(action: Login::class)
            ->colors([
                'primary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->topNavigation($topNavigationEnabled)
            ->defaultThemeMode($defaultTheme)
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([])
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
                VerifyLocale::class,
                VerifyPunishments::class,
            ])
            ->brandLogo(asset('assets/images/logo.gif'))
            ->favicon(asset('assets/images/panel_favicon.gif'))
            ->sidebarCollapsibleOnDesktop()
            ->authMiddleware([
                Authenticate::class,
            ])
            ->assets([
                Css::make('ckeditor-stylesheet', asset('assets/css/ckeditor.css')),
                Css::make('scrollbar-stylesheet', asset('assets/css/filament.css'))
            ])
            ->plugins([
                FilamentShieldPlugin::make()
                    ->gridColumns([
                        'default' => 1,
                        'sm' => 2
                    ])
                    ->sectionColumnSpan(1)
                    ->checkboxListColumns([
                        'default' => 1,
                        'sm' => 2
                    ])
                    ->resourceCheckboxListColumns([
                        'default' => 1,
                        'sm' => 2,
                    ]),
            ]);
    }
}
