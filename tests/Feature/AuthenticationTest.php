<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

describe('Authentication', function () {
    describe('Login Page', function () {
        test('login page loads correctly', function () {
            $response = $this->get('/login');

            $response->assertStatus(200)
                ->assertViewIs('auth.login');
        });

        test('unauthenticated users can access login page', function () {
            $response = $this->get('/login');

            $response->assertStatus(200);
        });

        test('authenticated users are redirected from login to dashboard', function () {
            $user = User::factory()->create();

            $response = $this->actingAs($user)->get('/login');

            $response->assertRedirect('/admin');
        });
    });

    describe('Login Form Submission', function () {
        test('login fails with invalid credentials', function () {
            User::factory()->create([
                'email' => 'admin@example.com',
                'password' => Hash::make('correct-password'),
            ]);

            $response = $this->post('/login', [
                'email' => 'admin@example.com',
                'password' => 'wrong-password',
            ]);

            expect($response->status())->toBe(302);

            $this->assertGuest();
        });

        test('login fails with non-existent email', function () {
            $response = $this->post('/login', [
                'email' => 'nonexistent@example.com',
                'password' => 'password123',
            ]);

            expect($response->status())->toBe(302);

            $this->assertGuest();
        });

        test('login fails with missing email', function () {
            $response = $this->post('/login', [
                'password' => 'password123',
            ]);

            expect($response->status())->toBe(302);
        });

        test('login fails with missing password', function () {
            $response = $this->post('/login', [
                'email' => 'admin@example.com',
            ]);

            expect($response->status())->toBe(302);
        });

        test('login succeeds with valid credentials', function () {
            $user = User::factory()->create([
                'email' => 'admin@example.com',
                'password' => Hash::make('correct-password'),
            ]);

            $response = $this->post('/login', [
                'email' => 'admin@example.com',
                'password' => 'correct-password',
            ]);

            $response->assertRedirect('/admin');
            $this->assertAuthenticatedAs($user);
        });

        test('login redirects to intended destination after authentication', function () {
            $user = User::factory()->create([
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
            ]);

            $response = $this->post('/login', [
                'email' => 'admin@example.com',
                'password' => 'password123',
            ]);

            $response->assertRedirect('/admin');
        });

        test('session is regenerated after successful login', function () {
            $user = User::factory()->create([
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
            ]);

            $this->post('/login', [
                'email' => 'admin@example.com',
                'password' => 'password123',
            ]);

            $this->assertAuthenticated();
        });

        test('login preserves email in session on validation error', function () {
            $response = $this->post('/login', [
                'email' => 'test@example.com',
                'password' => 'password',
            ]);

            expect($response->status())->toBe(302);
        });
    });

    describe('Admin Dashboard', function () {
        test('dashboard is accessible to authenticated users', function () {
            $user = User::factory()->create();

            $response = $this->actingAs($user)->get('/admin/dashboard');

            $response->assertStatus(200)
                ->assertViewIs('admin.dashboard')
                ->assertViewHas('user', $user);
        });

        test('dashboard shows correct user information', function () {
            $user = User::factory()->create([
                'email' => 'testuser@example.com',
            ]);

            $response = $this->actingAs($user)->get('/admin/dashboard');

            $response->assertSeeText('testuser@example.com');
        });

        test('unauthenticated users are redirected from dashboard to login', function () {
            $response = $this->get('/admin/dashboard');

            $response->assertRedirect('/login');
        });

        test('admin route redirects to dashboard', function () {
            $user = User::factory()->create();

            $response = $this->actingAs($user)->get('/admin');

            $response->assertRedirect('/admin/dashboard');
        });

        test('unauthenticated users redirected from admin to login', function () {
            $response = $this->get('/admin');

            $response->assertRedirect('/login');
        });
    });

    describe('Logout', function () {
        test('logout destroys session and redirects to home', function () {
            $user = User::factory()->create();

            $this->actingAs($user)
                ->post('/logout')
                ->assertRedirect('/');

            $this->assertGuest();
        });

        test('authenticated user can logout', function () {
            $user = User::factory()->create();

            $this->actingAs($user)->post('/logout');

            $this->assertGuest();
        });

        test('accessing protected route after logout redirects to login', function () {
            $user = User::factory()->create();

            $this->actingAs($user)->post('/logout');

            $response = $this->get('/admin/dashboard');

            $response->assertRedirect('/login');
        });
    });

    describe('Home Route', function () {
        test('home route redirects to shop', function () {
            $response = $this->get('/');

            $response->assertRedirect('/shop');
        });

        test('unauthenticated users can access home', function () {
            $response = $this->get('/');

            $response->assertStatus(302);
        });
    });
});
