<?php

declare(strict_types=1);

namespace AmanAnk\FilamentShieldPlus\Traits;

use AmanAnk\FilamentShieldPlus\Support\Utils;
use Filament\Panel;

trait HasPanelShield
{
    public static function bootHasPanelShield()
    {
        if (! app()->runningInConsole()) {
            if (Utils::isPanelUserRoleEnabled()) {

                Utils::createPanelUserRole();

                static::created(fn ($user) => $user->assignRole(Utils::getPanelUserRoleName()));

                static::deleting(fn ($user) => $user->removeRole(Utils::getPanelUserRoleName()));
            }
        }
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole(Utils::getSuperAdminName()) || $this->hasRole(Utils::getPanelUserRoleName());
    }
}
