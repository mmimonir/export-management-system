@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Welcome to Store</h1>
                <p class="lead mb-4">Discover premium products and exceptional value in our online marketplace.</p>
                <p class="mb-4">Browse our curated collection of high-quality items and enjoy a seamless shopping
                    experience.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="btn btn-success btn-lg">
                        <i class="bi bi-shop"></i> Shop Now
                    </a>
                    <a href="#" class="btn btn-outline-success btn-lg">
                        <i class="bi bi-plus-circle"></i> Add Product
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="store-container text-center">
                    <div style="font-size: 120px; color: #28a745;">
                        <i class="bi bi-bag-check"></i>
                    </div>
                    <h3 class="text-muted mt-4">Your Online Store</h3>
                    <p class="text-muted">Shop amazing products with confidence</p>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size: 48px; color: #28a745;" class="mb-3">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h5 class="card-title">Wide Selection</h5>
                        <p class="card-text text-muted">Browse thousands of products from trusted sellers and brands.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size: 48px; color: #28a745;" class="mb-3">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h5 class="card-title">Fast Shipping</h5>
                        <p class="card-text text-muted">Get your orders delivered quickly and reliably to your doorstep.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size: 48px; color: #28a745;" class="mb-3">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h5 class="card-title">Secure Payment</h5>
                        <p class="card-text text-muted">Shop with confidence with our secure payment processing system.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <h3 class="mb-4">Featured Products</h3>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="product-card">
                    <div class="product-image"
                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-phone" style="font-size: 64px; color: white;"></i>
                    </div>
                    <h5 class="product-title">Premium Phone</h5>
                    <div class="product-price">$499.99</div>
                    <p class="product-description">Latest model with cutting-edge technology and stunning display.</p>
                    <div class="product-actions">
                        <button class="btn btn-sm btn-outline-success flex-grow-1">
                            <i class="bi bi-eye"></i> View
                        </button>
                        <button class="btn btn-sm btn-success flex-grow-1">
                            <i class="bi bi-cart-plus"></i> Add
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="product-card">
                    <div class="product-image"
                        style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-headphones" style="font-size: 64px; color: white;"></i>
                    </div>
                    <h5 class="product-title">Wireless Headphones</h5>
                    <div class="product-price">$149.99</div>
                    <p class="product-description">Crystal-clear sound with noise-cancelling technology.</p>
                    <div class="product-actions">
                        <button class="btn btn-sm btn-outline-success flex-grow-1">
                            <i class="bi bi-eye"></i> View
                        </button>
                        <button class="btn btn-sm btn-success flex-grow-1">
                            <i class="bi bi-cart-plus"></i> Add
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="product-card">
                    <div class="product-image"
                        style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-laptop" style="font-size: 64px; color: white;"></i>
                    </div>
                    <h5 class="product-title">Ultra Laptop</h5>
                    <div class="product-price">$1,299.99</div>
                    <p class="product-description">Powerful performance for professionals and creators.</p>
                    <div class="product-actions">
                        <button class="btn btn-sm btn-outline-success flex-grow-1">
                            <i class="bi bi-eye"></i> View
                        </button>
                        <button class="btn btn-sm btn-success flex-grow-1">
                            <i class="bi bi-cart-plus"></i> Add
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="product-card">
                    <div class="product-image"
                        style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-smartwatch" style="font-size: 64px; color: white;"></i>
                    </div>
                    <h5 class="product-title">Smart Watch</h5>
                    <div class="product-price">$299.99</div>
                    <p class="product-description">Stay connected with style and technology on your wrist.</p>
                    <div class="product-actions">
                        <button class="btn btn-sm btn-outline-success flex-grow-1">
                            <i class="bi bi-eye"></i> View
                        </button>
                        <button class="btn btn-sm btn-success flex-grow-1">
                            <i class="bi bi-cart-plus"></i> Add
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-light mt-5 rounded p-5">
            <h3 class="mb-3">Special Offer!</h3>
            <p class="mb-4">Get 20% off on your first purchase. Use code: <strong>WELCOME20</strong></p>
            <button class="btn btn-success btn-lg">
                <i class="bi bi-lightning-fill"></i> Shop Now
            </button>
        </div>
    </div>

    @vite(['Modules/Store/resources/assets/js/app.js', 'Modules/Store/resources/assets/sass/app.scss'])
@endsection
