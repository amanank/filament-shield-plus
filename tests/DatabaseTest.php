<?php

use AmanAnk\FilamentShieldPlus\Facades\FilamentShield;
use AmanAnk\FilamentShieldPlus\Resources\RoleResource;

it('can check if package testing is configured', function () {
    expect(true)->toBeTrue();
});

it('can check if the permission name can be configured using the closure', function () {
    $resource = RoleResource::class;

    FilamentShield::configurePermissionIdentifierUsing(
        fn ($resource) => str('Spatie\\Permission\\Models\\Role')
            ->afterLast('\\')
            ->lower()
            ->toString()
    );

    expect(FilamentShield::getPermissionIdentifier($resource))->toBe('role');
});
