<?php

declare(strict_types=1);

namespace Amanank\FilamentShield\Contracts;

interface HasShieldPermissions {
    public static function getPermissionPrefixes(): array;
}
