# Aimeos-Consistent Admin System Design Spec

**Date:** May 11, 2026  
**Status:** Approved  
**Project:** LargoCorp e-commerce admin system redesign  

---

## Overview

Redesign the login page and create a comprehensive admin system (dashboard, user management, store settings) with consistent Aimeos styling. The interface will use Bootstrap 5 + Aimeos CSS variables imported directly from vendor files to ensure pixel-perfect consistency with the Aimeos admin panel.

**Scope:** Login page, admin dashboard, user management (CRUD), store settings  
**Tech Stack:** Laravel 12, Bootstrap 5, Aimeos CSS, Blade templates  
**Database:** Laravel `users` table + optional `shop_settings` table  

---

## 1. Architecture

### Design Principles
- **Unified Design System:** Use Aimeos Bootstrap 5 CSS and CSS variables directly
- **Complementary Not Redundant:** Custom pages sit alongside Aimeos admin (`/admin/{site}/jqadm`)
- **Sidebar Navigation:** Fixed left sidebar matching Aimeos admin style
- **Component-Based:** Reusable Blade components for consistency
- **Responsive:** Sidebar collapses on mobile, layouts adapt to screen size

### File Structure
```
resources/views/
├── layouts/
│   ├── auth.blade.php                  (login page layout wrapper)
│   └── admin.blade.php                 (admin pages layout - sidebar + navbar)
├── auth/
│   └── login.blade.php                 (redesigned Aimeos-styled login)
├── admin/
│   ├── dashboard.blade.php             (stats, welcome, quick actions)
│   ├── users/
│   │   ├── index.blade.php             (user list table)
│   │   ├── create.blade.php            (create user form)
│   │   └── edit.blade.php              (edit user form)
│   ├── settings/
│   │   └── index.blade.php             (store settings form)
│   └── components/
│       ├── sidebar.blade.php           (navigation menu - reusable)
│       ├── navbar.blade.php            (top bar - reusable)
│       └── stat-card.blade.php         (stats card - reusable)
```

### CSS Integration
- Import Aimeos Bootstrap 5 CSS from `vendor/aimeos/ai-admin-jqadm/themes/default/`
- Use Aimeos CSS variables: `--bs-primary`, `--bs-secondary`, `--bs-line-light`, etc.
- No custom color gradients; rely on Aimeos palette
- Reuse Aimeos button classes: `.btn-primary`, `.btn-secondary`
- Reuse Aimeos form classes: `.form-control`, `.form-label`, `.form-group`

---

## 2. Login Page

### Current State
- Purple gradient background
- White card container
- Email/password inputs
- Demo credentials displayed

### Redesign
**Visual Style:**
- Aimeos blue color scheme (use `--bs-primary` from Aimeos)
- Centered white card on colored background
- Subtle shadow and border-radius matching Aimeos forms
- Bootstrap form styling with Aimeos CSS classes

**Components:**
- Header: "LargoCorp Admin" title + description
- Form fields:
  - Email input (required, type="email")
  - Password input (required, type="password")
  - Validation error messages
- Primary action button: "Sign In" (Aimeos `.btn-primary` style)
- Secondary link: "← Back to Shop" (links to `/shop`)
- Footer: Demo credentials in subtle text

**Behavior:**
- CSRF protection via `@csrf` directive
- Email and password validation
- Already authenticated users redirect to `/admin/dashboard`
- Invalid credentials: flash error message, preserve email in old input
- Successful login: regenerate session, redirect to `/admin`

**File:** `resources/views/auth/login.blade.php`

---

## 3. Admin Layout System

### Navbar (Reusable Component)
**File:** `resources/views/admin/components/navbar.blade.php`

**Content:**
- Left: LargoCorp logo/brand + "Admin" text
- Center: Page title (e.g., "Dashboard", "User Management")
- Right: User dropdown menu
  - Current user email
  - Logout button (POST form)

**Styling:**
- Background: Light gray (`--bs-light` or light section from Aimeos)
- Text: Dark (`--bs-dark`)
- Padding: Matches Aimeos nav spacing
- Border-bottom: Subtle line (Aimeos `--bs-line-light`)

---

### Sidebar (Reusable Component)
**File:** `resources/views/admin/components/sidebar.blade.php`

**Content:**
Menu items with icons and active state:
1. **Dashboard** (home icon) → `/admin/dashboard`
2. **User Management** (users icon) → `/admin/users`
3. **Store Settings** (gear icon) → `/admin/settings`
4. **Aimeos Admin Panel** (external link icon) → `/admin/{site}/jqadm` (opens in new tab)
5. **Shop Frontend** (shop icon) → `/shop` (opens in new tab)

**Styling:**
- Fixed left sidebar (width: ~250px)
- Background: White
- Border-right: Subtle line
- Menu items: Hover state with background color
- Active item: Highlighted (blue background, white text)
- Responsive: Collapse to hamburger icon on mobile

---

### Admin Layout Wrapper
**File:** `resources/views/layouts/admin.blade.php`

**Structure:**
- Import Aimeos Bootstrap CSS from vendor
- Include navbar component at top
- Include sidebar component on left
- Main content area (flex layout)
- Responsive grid (sidebar collapses on mobile)

**CSS Imports (in `<head>`):**
```html
<link rel="stylesheet" href="{{ asset('vendor/aimeos/ai-admin-jqadm/themes/default/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/aimeos/ai-admin-jqadm/themes/default/admin.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/aimeos/ai-admin-jqadm/themes/default/common.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/aimeos/ai-admin-jqadm/themes/default/menu.css') }}">
```

---

## 4. Admin Dashboard

### Route
- URL: `/admin/dashboard`
- Middleware: `auth` (protected)
- View: `resources/views/admin/dashboard.blade.php`

### Content Sections

**Welcome Card:**
- Heading: "Welcome to LargoCorp Admin"
- Subtext: "You are successfully logged in. Manage your e-commerce store."

**Statistics Grid:**
Three stat cards in a responsive grid:
1. **Products**
   - Icon: Box/package icon
   - Label: "Total Products"
   - Value: Dynamic count from Aimeos (query `mshop_product` table)
   
2. **Orders**
   - Icon: Order/receipt icon
   - Label: "Total Orders"
   - Value: Dynamic count from Aimeos (query `mshop_order` table)
   
3. **Categories**
   - Icon: Tag/folder icon
   - Label: "Total Categories"
   - Value: Dynamic count from Aimeos (query `mshop_catalog` table)

**Stat Card Component:**
**File:** `resources/views/admin/components/stat-card.blade.php`
- Props: `icon`, `label`, `value`, `bgColor` (optional)
- Styling: Aimeos card style with left border accent
- Responsive: Adapts to grid layout

**Quick Action Buttons:**
- "Go to Aimeos Admin Panel" (blue, primary style) → `/admin/default/jqadm`
- "View Shop Frontend" (secondary style) → `/shop`

**Layout:**
- Flex column layout
- Welcome card at top
- Stats grid (3 columns, responsive)
- Action buttons below

---

## 5. User Management

### Users List Page

**Route:** `GET /admin/users`  
**View:** `resources/views/admin/users/index.blade.php`  
**Controller:** `app/Http/Controllers/Admin/UserController.php` (method: `index`)  

**Content:**
- Heading: "User Management"
- "Add New User" button (top right) → `/admin/users/create`
- Table with columns:
  - Email
  - Role (Admin, Manager, etc.)
  - Status (Active/Inactive badge)
  - Created At (date)
  - Actions (Edit, Delete buttons)
- Pagination if many users (Laravel paginate)
- Optional: Search/filter by email

**Styling:**
- Table: Aimeos `.table` class
- Buttons: `.btn-sm` for actions
- Badges: `.badge-success` (active), `.badge-secondary` (inactive)

---

### Create User Page

**Route:** `GET /admin/users/create`  
**View:** `resources/views/admin/users/create.blade.php`  
**Controller:** `app/Http/Controllers/Admin/UserController.php` (method: `create`)  

**Form Fields:**
- Email (required, unique, type="email")
- Password (required, min 8 chars, type="password")
- Confirm Password (required, matches password, type="password")
- Role (dropdown: Admin, Manager, Guest)
- Status (toggle: Active/Inactive, default Active)

**Actions:**
- Save button (primary) → POST `/admin/users` → redirect to `/admin/users`
- Cancel link → back to `/admin/users`

**Validation:**
- Email: required, email format, unique in users table
- Password: required, min 8 characters, confirmed
- Role: required, in allowed roles
- Status: required, boolean

---

### Edit User Page

**Route:** `GET /admin/users/{id}/edit`  
**View:** `resources/views/admin/users/edit.blade.php`  
**Controller:** `app/Http/Controllers/Admin/UserController.php` (method: `edit`)  

**Form Fields:**
- Email (required, unique except current user)
- Password (optional, only if user wants to change; if provided, min 8 chars)
- Confirm Password (optional, matches password if password provided)
- Role (dropdown: Admin, Manager, Guest)
- Status (toggle: Active/Inactive)

**Actions:**
- Update button (primary) → PUT `/admin/users/{id}` → redirect to `/admin/users`
- Delete button (danger) → DELETE `/admin/users/{id}` → redirect to `/admin/users` with success message
- Cancel link → back to `/admin/users`

**Validation:**
- Email: required, email format, unique except current user
- Password: optional, min 8 if provided, confirmed
- Role: required, in allowed roles
- Status: required, boolean

---

### Delete User

**Route:** `DELETE /admin/users/{id}`  
**Controller:** `app/Http/Controllers/Admin/UserController.php` (method: `destroy`)  

**Behavior:**
- Delete user from `users` table
- Redirect to `/admin/users` with success message
- Prevent deleting current logged-in user (validation)
- Optional: Add soft deletes for audit trail

---

### User Model & Database

**Table:** `users` (Laravel default)  
**Fields:**
- id (primary key)
- email (unique)
- password (hashed)
- role (enum or string: admin, manager, guest)
- status (boolean: 1=active, 0=inactive)
- created_at (timestamp)
- updated_at (timestamp)

**Model:** `app/Models/User` (extend Laravel User model)
- Add `role` and `status` to fillable array
- Add accessors/mutators as needed
- Relationships: None required initially

---

## 6. Store Settings Page

### Route
- URL: `GET /admin/settings` (show form)
- URL: `PUT /admin/settings` (save form)
- View: `resources/views/admin/settings/index.blade.php`
- Controller: `app/Http/Controllers/Admin/SettingsController.php`

### Form Sections

**General Section:**
- Store Name (text input, required)
- Store URL (text input, required, URL format)
- Admin Email (text input, required, email format)

**Email Configuration Section:**
- SMTP Host (text input, e.g., "smtp.mailtrap.io")
- SMTP Port (number input, e.g., 2525)
- SMTP Username (text input)
- SMTP Password (password input)
- From Address (email input, required)
- From Name (text input, default "LargoCorp")

**Localization Section:**
- Default Language (dropdown: en, de, fr, etc.)
- Default Currency (dropdown: USD, EUR, GBP, etc.)

### Behavior
- On GET: Load current settings from config or database, populate form
- On PUT: Validate form, save to database/config, show success message
- Errors: Display validation errors inline with field highlighting

### Storage
- **Option 1:** Store in `config/shop.php` (simple, persisted in code)
- **Option 2:** Store in database `shop_settings` table (more flexible, requires migration)
- Recommendation: Database table for easy updates without code deployment

### Database (if using DB)

**Table:** `shop_settings`  
**Fields:**
- id (primary key)
- key (string, unique: "store_name", "store_url", etc.)
- value (longtext: JSON or string)
- created_at (timestamp)
- updated_at (timestamp)

---

## 7. Routes

### Authentication Routes (Existing, Unchanged)
```
GET  /login              → Show login form
POST /login              → Process login
POST /logout             → Process logout
GET  /                   → Redirect to /shop
```

### Admin Routes (Protected by `auth` Middleware)
```
GET  /admin              → Redirect to /admin/dashboard
GET  /admin/dashboard    → Show dashboard
GET  /admin/users        → List users
GET  /admin/users/create → Show create form
POST /admin/users        → Store new user
GET  /admin/users/{id}/edit  → Show edit form
PUT  /admin/users/{id}   → Update user
DELETE /admin/users/{id} → Delete user
GET  /admin/settings     → Show settings form
PUT  /admin/settings     → Save settings
```

### Route Middleware
```php
Route::middleware(['web', 'auth'])->group(function () {
    Route::redirect('/admin', '/admin/dashboard');
    Route::get('/admin/dashboard', ...);
    Route::resource('/admin/users', UserController::class);
    Route::get('/admin/settings', SettingsController@show);
    Route::put('/admin/settings', SettingsController@update);
});
```

---

## 8. Controllers

### UserController
**File:** `app/Http/Controllers/Admin/UserController.php`

**Methods:**
- `index()` → List all users with pagination
- `create()` → Show create form
- `store(Request $request)` → Save new user
- `edit(User $user)` → Show edit form
- `update(Request $request, User $user)` → Update user
- `destroy(User $user)` → Delete user

**Authorization:**
- All methods require `auth` middleware
- Optional: Add policies to restrict non-admins from editing other users

---

### SettingsController
**File:** `app/Http/Controllers/Admin/SettingsController.php`

**Methods:**
- `show()` → Display settings form with current values
- `update(Request $request)` → Validate and save settings

**Authorization:**
- Require `auth` middleware
- Optional: Only allow admin role

---

## 9. Testing

### Existing Tests (Still Valid)
- 21 authentication tests in `tests/Feature/AuthenticationTest.php`

### New Tests to Add
- **User Management:**
  - List users (paginated)
  - Create user (validation, success)
  - Edit user (validation, success)
  - Delete user (success, prevent self-delete)
  - Authorization (only logged-in users)
  
- **Settings:**
  - Display settings form
  - Save settings (validation, success)
  - Authorization (logged-in users only)

### Test File
**File:** `tests/Feature/AdminTest.php`

---

## 10. Styling & Consistency

### Color Palette (from Aimeos CSS variables)
- Primary: `--bs-primary` (blue)
- Secondary: `--bs-secondary` (gray)
- Danger: `--bs-danger` (red, for delete actions)
- Success: `--bs-success` (green, for confirmation messages)

### Typography
- Font family: System fonts (matches Aimeos Bootstrap)
- Font sizes: Standard Bootstrap scale

### Spacing
- Use Bootstrap utility classes (`.p-3`, `.m-2`, etc.)
- Match Aimeos admin spacing conventions

### Components
- Buttons: `.btn-primary`, `.btn-secondary`, `.btn-danger`
- Forms: `.form-control`, `.form-label`, `.form-group`
- Tables: `.table`, `.table-sm`
- Cards: `.card`, `.card-body` (with Aimeos styling)
- Badges: `.badge-success`, `.badge-secondary`
- Alerts: `.alert-success`, `.alert-danger`, `.alert-warning`

---

## 11. Data Flow & Logic

### Authentication Flow (Existing)
1. User visits `/login`
2. Enters email + password
3. Laravel `Auth::attempt()` validates
4. Session regenerated
5. Redirect to `/admin/dashboard`

### User Management Flow
1. Admin visits `/admin/users` → see list
2. Click "Add New User" → `/admin/users/create`
3. Fill form → POST `/admin/users`
4. Controller validates → saves to DB
5. Redirect to `/admin/users` with success message

### Settings Flow
1. Admin visits `/admin/settings`
2. Form pre-populated with current settings
3. Admin edits fields → PUT `/admin/settings`
4. Controller validates → saves to DB
5. Show success message

---

## 12. Error Handling & Validation

### Authentication
- Invalid credentials: Show error message, preserve email
- Already authenticated: Redirect to dashboard

### User Management
- Duplicate email: Show validation error
- Invalid password: Show requirements
- Cannot delete self: Show warning
- Unauthorized access: Redirect to dashboard

### Settings
- Invalid email format: Show validation error
- Invalid SMTP port: Show validation error
- Missing required fields: Show validation errors

---

## 13. Future Enhancements (Out of Scope)

- Activity logging (track admin actions)
- Two-factor authentication
- Password reset via email
- Role-based permissions (policies)
- API token management
- Email templates editor

---

## Summary

**Deliverables:**
✓ Redesigned login page (Aimeos-styled)  
✓ Admin layout with sidebar navigation  
✓ Dashboard with stats and quick actions  
✓ User management (CRUD)  
✓ Store settings page  
✓ Consistent Aimeos styling throughout  
✓ Tests for all new functionality  

**Key Features:**
- Bootstrap 5 + Aimeos CSS variables
- Sidebar navigation (responsive)
- Form validation with error messages
- Session security (regeneration, invalidation)
- Pagination for user lists
- Reusable Blade components

**Tech Stack:**
- Laravel 12
- Bootstrap 5
- Aimeos CSS
- Blade templating
- Pest testing framework
