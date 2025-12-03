<?php

namespace App\Providers\Filament;

use Caresome\FilamentAuthDesigner\AuthDesignerPlugin;
use Caresome\FilamentAuthDesigner\Enums\AuthLayout;
use Caresome\FilamentAuthDesigner\Enums\MediaDirection;
use Filament\FontProviders\GoogleFontProvider;
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
use pxlrbt\FilamentSpotlight\SpotlightPlugin;

class AppPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->globalSearch(false)
            ->id('app')
            ->path('app')
            ->login()
            ->registration()
            ->passwordReset()
            ->emailVerification()
            ->brandLogoHeight('72px')
            ->favicon(asset('assets/favicon.ico'))
            ->brandLogo(fn () => view('filament.brand-logo'))
            ->viteTheme('resources/css/filament/app/theme.css')
            ->font('Quicksand', provider: GoogleFontProvider::class)
            ->plugins([
                SpotlightPlugin::make(),
                AuthDesignerPlugin::make()
                    ->login(
                        layout: AuthLayout::Panel,
                        media: asset('assets/loginVideo.mp4'),
                        direction: MediaDirection::Left,
                    )
                    ->registration(
                        layout: AuthLayout::Panel,
                        media: asset('assets/loginVideo.mp4'),
                        direction: MediaDirection::Left,
                    )
                    ->passwordReset(
                        layout: AuthLayout::Panel,
                        media: asset('assets/loginVideo.mp4'),
                        direction: MediaDirection::Left
                    )
                    ->emailVerification(
                        layout: AuthLayout::Panel,
                        media: asset('assets/loginVideo.mp4'),
                        direction: MediaDirection::Left
                    )
                    ->themeToggle()]
            )
            ->colors([
                'primary' => Color::Teal[950],
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
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
