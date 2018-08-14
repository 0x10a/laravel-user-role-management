# Laravel User Role Management

## Introduction

User Role Management is a Web application for User management with Roles and Permissions based on Laravel Framework and [AdminLTE theme](https://adminlte.io/)

## System Requirements

User Management System needs to run in PHP version 7 or higher.

## Installation

1. Set database name in your .env file.

2. Setup Database Tables

```bash
php artisan migrate
```

3. Populate Database with Basic permissions, roles, users

```bash
php artisan db:seed
```

## Usage

To login as Developer
    Email: developer@demo.com
    Password: 12345678

To login as Admin:
    Email: admin@demo.com
    Password: 123456789

To login as Staff:
    Email: staff@demo.com
    Password: 123456789

To login as Client:
    Email: client@demo.com
    Password: 123456789

## FAQ

- What are permissions?

Permissions are the base of whole system. Roles are based on the permissions. User can have multiple
permissions. User will only be able to perform an action if the user has the permission to do so.
Permissions are assign to roles and roles are assigned to users.

- How to check if user has permission?

```php
Auth::user()->can('permission_name')
```
- How to add new permission?

To add new permission, enter the detail in add permission form:
You must enter the module name. After that assign the permission to the any role you want.
Note: Permission needs to be implemented in the code to take effect.

- How to edit permission?

To edit permission, press the button on front of the permission on permissions page. Form will be shown with all
the existing values.
Note: Permission needs to be implemented in the code to take effect.

- What are roles?

Roles are created from the permissions. Role ca have multiple permissions.

- How to add new role?

To add new role, you have to enter all the detail in the form and ASSIGN Permissions.

- How to register new User?

New user is registered as a client, to change the role of the new registered user.
Edit in Register Controller:

```php
protected function create(array $data)
{
    $NewUser = new User;
    $NewUser->email = $data['email'];
    $NewUser->name = $data['name'];
    $NewUser->password = bcrypt($data['password']);
    $NewUser->save();
    $NewUser->roles()->attach(2); // 2 = Role ID, which is Client
    return $NewUser;
}
```

- Logs ?

Log is automatically created whenever an operation is done on the model. Every action is saved in the database.

- 401 Unrecognized Error message?

This error will show, when user won't have permission to view a page.

## Laravel Documentation

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

