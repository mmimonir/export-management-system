# 🧭 Navigation Guide - Blog & Store Modules

## 📍 How to Access the Routes

### Blog Module Routes

#### Welcome Page (Public)

```
URL: http://localhost:8000/blog
Route Name: blog.welcome
Method: GET
```

#### List All Blog Posts (Authenticated)

```
URL: http://localhost:8000/blog/posts
Route Name: blog.post.index
Method: GET
Requires: Authentication & Email Verification
```

#### Create New Blog Post (Authenticated)

```
URL: http://localhost:8000/blog/posts/create
Route Name: blog.post.create
Method: GET
Requires: Authentication & Email Verification
```

#### View Specific Blog Post (Authenticated)

```
URL: http://localhost:8000/blog/posts/{id}
Route Name: blog.post.show
Method: GET
Requires: Authentication & Email Verification
Example: http://localhost:8000/blog/posts/1
```

#### Edit Blog Post (Authenticated)

```
URL: http://localhost:8000/blog/posts/{id}/edit
Route Name: blog.post.edit
Method: GET
Requires: Authentication & Email Verification
Example: http://localhost:8000/blog/posts/1/edit
```

#### Delete Blog Post (Authenticated)

```
URL: http://localhost:8000/blog/posts/{id}
Route Name: blog.post.destroy
Method: DELETE
Requires: Authentication & Email Verification
Example: http://localhost:8000/blog/posts/1
```

---

### Store Module Routes

#### Welcome Page (Public)

```
URL: http://localhost:8000/store
Route Name: store.welcome
Method: GET
```

#### List All Products (Authenticated)

```
URL: http://localhost:8000/store/products
Route Name: store.product.index
Method: GET
Requires: Authentication & Email Verification
```

#### Create New Product (Authenticated)

```
URL: http://localhost:8000/store/products/create
Route Name: store.product.create
Method: GET
Requires: Authentication & Email Verification
```

#### View Specific Product (Authenticated)

```
URL: http://localhost:8000/store/products/{id}
Route Name: store.product.show
Method: GET
Requires: Authentication & Email Verification
Example: http://localhost:8000/store/products/1
```

#### Edit Product (Authenticated)

```
URL: http://localhost:8000/store/products/{id}/edit
Route Name: store.product.edit
Method: GET
Requires: Authentication & Email Verification
Example: http://localhost:8000/store/products/1/edit
```

#### Delete Product (Authenticated)

```
URL: http://localhost:8000/store/products/{id}
Route Name: store.product.destroy
Method: DELETE
Requires: Authentication & Email Verification
Example: http://localhost:8000/store/products/1
```

---

## 🔗 Using Route Names in Blade Templates

### Blog Module Navigation

```blade
<!-- Welcome Page Link -->
<a href="{{ route('blog.welcome') }}">Blog Home</a>

<!-- List Posts -->
<a href="{{ route('blog.post.index') }}">All Posts</a>

<!-- Create Post -->
<a href="{{ route('blog.post.create') }}">Write New Post</a>

<!-- View Post -->
<a href="{{ route('blog.post.show', $post->id) }}">Read Post</a>

<!-- Edit Post -->
<a href="{{ route('blog.post.edit', $post->id) }}">Edit Post</a>

<!-- Delete Post (Form with DELETE method) -->
<form action="{{ route('blog.post.destroy', $post->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Post</button>
</form>
```

### Store Module Navigation

```blade
<!-- Welcome Page Link -->
<a href="{{ route('store.welcome') }}">Store Home</a>

<!-- List Products -->
<a href="{{ route('store.product.index') }}">All Products</a>

<!-- Create Product -->
<a href="{{ route('store.product.create') }}">Add New Product</a>

<!-- View Product -->
<a href="{{ route('store.product.show', $product->id) }}">View Product</a>

<!-- Edit Product -->
<a href="{{ route('store.product.edit', $product->id) }}">Edit Product</a>

<!-- Delete Product (Form with DELETE method) -->
<form action="{{ route('store.product.destroy', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Product</button>
</form>
```

---

## 🎯 Quick Navigation Links

### Access Welcome Pages Directly

**Blog Welcome:**

```html
<a href="/blog">Go to Blog</a>
```

**Store Welcome:**

```html
<a href="/store">Go to Store</a>
```

### Using route() Helper

**Blog Welcome:**

```php
route('blog.welcome')  // Generates: /blog
```

**Store Welcome:**

```php
route('store.welcome')  // Generates: /store
```

---

## 📋 Complete Route Table

| Module    | Action         | URL                         | Route Name              | Requires Auth |
| --------- | -------------- | --------------------------- | ----------------------- | ------------- |
| **Blog**  | Welcome        | `/blog`                     | `blog.welcome`          | ❌ No         |
|           | List Posts     | `/blog/posts`               | `blog.post.index`       | ✅ Yes        |
|           | Create Post    | `/blog/posts/create`        | `blog.post.create`      | ✅ Yes        |
|           | View Post      | `/blog/posts/{id}`          | `blog.post.show`        | ✅ Yes        |
|           | Edit Post      | `/blog/posts/{id}/edit`     | `blog.post.edit`        | ✅ Yes        |
|           | Delete Post    | `/blog/posts/{id}`          | `blog.post.destroy`     | ✅ Yes        |
| **Store** | Welcome        | `/store`                    | `store.welcome`         | ❌ No         |
|           | List Products  | `/store/products`           | `store.product.index`   | ✅ Yes        |
|           | Create Product | `/store/products/create`    | `store.product.create`  | ✅ Yes        |
|           | View Product   | `/store/products/{id}`      | `store.product.show`    | ✅ Yes        |
|           | Edit Product   | `/store/products/{id}/edit` | `store.product.edit`    | ✅ Yes        |
|           | Delete Product | `/store/products/{id}`      | `store.product.destroy` | ✅ Yes        |

---

## 🚀 Testing Routes

### Using Laravel Artisan

List all routes:

```bash
php artisan route:list
```

List routes for specific module:

```bash
php artisan route:list | grep blog
php artisan route:list | grep store
```

Show route details:

```bash
php artisan route:list --name=blog.welcome
```

---

## 💡 Navigation Examples

### In Blade Template - Main Navigation

```blade
<!-- Navigation Links -->
<nav>
    <a href="{{ route('blog.welcome') }}" class="nav-link">
        📝 Blog
    </a>
    <a href="{{ route('store.welcome') }}" class="nav-link">
        🛍️ Store
    </a>
</nav>
```

### In Blade Template - Module Dashboard

```blade
<!-- Blog Dashboard -->
<div class="container">
    <h1>Blog Dashboard</h1>

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('blog.post.index') }}" class="btn btn-primary">
                View All Posts
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('blog.post.create') }}" class="btn btn-success">
                Create New Post
            </a>
        </div>
    </div>
</div>
```

### In Blade Template - Redirect After Action

```blade
<!-- After creating a post -->
<?php
// In Controller
redirect()->route('blog.post.show', $post->id);

// Or with success message
return redirect()->route('blog.post.index')
    ->with('success', 'Post created successfully!');
?>
```

---

## 🔐 Authentication Requirement

Routes with `@authenticated` middleware require:

1. **User must be logged in**

    ```bash
    # Get login page
    http://localhost:8000/login
    ```

2. **User email must be verified**
    - Check `email_verified_at` column in users table
    - Users are redirected to email verification page if not verified

### Bypass Authentication (Development Only)

In `routes/web.php`:

```php
// Remove middleware for testing
Route::middleware([])->group(function () {
    Route::resource('blog/posts', BlogController::class);
});
```

---

## 📱 Example Navigation Flow

### Blog User Journey

```
1. Visit /blog                    (Welcome Page)
   ↓
2. Click "Read Posts"            → /blog/posts (List)
   ↓
3. Click on a post               → /blog/posts/{id} (View)
   ↓
4. Click "Create Post"           → /blog/posts/create (Form)
   ↓
5. Submit form                   → /blog/posts (Redirect to List)
```

### Store User Journey

```
1. Visit /store                   (Welcome Page)
   ↓
2. Click "Shop Now"              → /store/products (List)
   ↓
3. Click on a product            → /store/products/{id} (View)
   ↓
4. Click "Add Product"           → /store/products/create (Form)
   ↓
5. Submit form                   → /store/products (Redirect to List)
```

---

## 🎯 Direct Access URLs

### Start Here (No Authentication Required)

```
Blog Welcome:    http://localhost:8000/blog
Store Welcome:   http://localhost:8000/store
```

### After Login (Authentication Required)

```
Blog Posts:      http://localhost:8000/blog/posts
Store Products:  http://localhost:8000/store/products
```

---

## 📖 Summary

✅ **Blog Routes are prefixed with** `/blog`  
✅ **Store Routes are prefixed with** `/store`  
✅ **Welcome pages are public** (no login required)  
✅ **Resource pages require authentication** (login + email verification)  
✅ **Use route() helper** for generating links in templates  
✅ **Route names make templates maintainable** (no hardcoding URLs)

Happy Navigating! 🎉
