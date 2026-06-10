<?php

use App\Filament\Pages\Auth\CustomLogin;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Livewire\Livewire;

test('admin login screen can be rendered', function () {
    $response = $this->get('/admin/login');

    $response->assertStatus(200);
});

test('admin user can authenticate using livewire login', function () {
    // Ensure the admin role exists
    $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    
    $user = User::factory()->create();
    $user->assignRole($adminRole);

    Livewire::test(CustomLogin::class)
        ->set('data.email', $user->email)
        ->set('data.password', 'password')
        ->call('authenticate')
        ->assertHasNoErrors();

    $this->assertAuthenticated();
});

test('invalid admin user cannot authenticate', function () {
    Livewire::test(CustomLogin::class)
        ->set('data.email', 'invalid@elvora.com')
        ->set('data.password', 'wrong-password')
        ->call('authenticate')
        ->assertHasErrors(['data.email']);

    $this->assertGuest();
});
