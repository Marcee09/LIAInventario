<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    private const SEE_PANEL = 'see-panel';
    private const ROLES_LIST = 'roles-list';
    private const ROLES_CREATE = 'roles-create';
    private const ROLES_EDIT = 'roles-edit';
    private const ROLES_DELETE = 'roles-delete';
    private const USERS_LIST = 'users-list';
    private const USERS_CREATE = 'users-create';
    private const USERS_EDIT = 'users-edit';
    private const USERS_DELETE = 'users-delete';
    private const USERS_DISABLE = 'users-disable';
    private const USERS_ENABLE = 'users-enable';

    private $permissions = [
        self::SEE_PANEL,
        self::ROLES_LIST,
        self::ROLES_CREATE,
        self::ROLES_EDIT,
        self::ROLES_DELETE,
        self::USERS_LIST,
        self::USERS_CREATE,
        self::USERS_EDIT,
        self::USERS_DELETE,
        self::USERS_DISABLE,
        self::USERS_ENABLE,
    ];

    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        Role::create(['name' => 'root']);

        $registered_role = Role::create(['name' => 'registered']);
        $registered_role->givePermissionTo(self::SEE_PANEL);

        $roles_admin = Role::create(['name' => 'roles-admin']);
        $roles_admin->givePermissionTo(self::SEE_PANEL);
        $roles_admin->givePermissionTo(self::ROLES_LIST);
        $roles_admin->givePermissionTo(self::ROLES_CREATE);
        $roles_admin->givePermissionTo(self::ROLES_EDIT);
        $roles_admin->givePermissionTo(self::ROLES_DELETE);

        $users_admin = Role::create(['name' => 'users-admin']);
        $users_admin->givePermissionTo(self::SEE_PANEL);
        $users_admin->givePermissionTo(self::USERS_LIST);
        $users_admin->givePermissionTo(self::USERS_CREATE);
        $users_admin->givePermissionTo(self::USERS_EDIT);
        $users_admin->givePermissionTo(self::USERS_DELETE);
        $users_admin->givePermissionTo(self::USERS_DISABLE);
        $users_admin->givePermissionTo(self::USERS_ENABLE);
    }
}
