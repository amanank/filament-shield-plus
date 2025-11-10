<?php

declare(strict_types=1);

namespace AmanAnk\FilamentShieldPlus\Contracts;

interface HasShieldPermissions
{
    public static function getPermissionPrefixes(): array;
}
