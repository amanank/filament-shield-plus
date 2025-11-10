<?php

namespace AmanAnk\FilamentShieldPlus\Traits;

use AmanAnk\FilamentShieldPlus\Support\Utils;
use Filament\Facades\Filament;
use Illuminate\Support\Str;

trait HasWidgetShield
{
    public static function canView(): bool
    {
        return Filament::auth()->user()->can(static::getPermissionName());
    }

    protected static function getPermissionName(): string
    {
        return Str::of(class_basename(static::class))
            ->prepend(
                Str::of(Utils::getWidgetPermissionPrefix())
                    ->append('_')
                    ->toString()
            )
            ->toString();
    }
}
