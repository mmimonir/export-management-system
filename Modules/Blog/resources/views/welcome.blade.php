@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Welcome to Blog</h1>
                <p class="lead mb-4">Discover insights, stories, and knowledge from our expert writers and contributors.</p>
                <p class="mb-4">Explore our collection of articles, tutorials, and blog posts covering various topics of
                    interest.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="btn btn-primary btn-lg">
                        <i class="bi bi-book"></i> Read Posts
                    </a>
                    <a href="#" class="btn btn-outline-primary btn-lg">
                        <i class="bi bi-pencil"></i> Create Post
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="blog-container text-center">
                    <div style="font-size: 120px; color: #667eea;">
                        <i class="bi bi-file-text"></i>
                    </div>
                    <h3 class="text-muted mt-4">Your Blog Hub</h3>
                    <p class="text-muted">Share your thoughts with the world</p>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size: 48px; color: #667eea;" class="mb-3">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <h5 class="card-title">Write Posts</h5>
                        <p class="card-text text-muted">Create and publish engaging blog posts to share your expertise.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size: 48px; color: #667eea;" class="mb-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="card-title">Community</h5>
                        <p class="card-text text-muted">Connect with readers and engage in meaningful discussions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size: 48px; color: #667eea;" class="mb-3">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h5 class="card-title">Analytics</h5>
                        <p class="card-text text-muted">Track your post performance and reader engagement metrics.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-light mt-5 rounded p-5">
            <h3 class="mb-3">Ready to Share Your Story?</h3>
            <p class="mb-4">Start writing today and join thousands of creators sharing their passion and knowledge.</p>
            <button class="btn btn-primary btn-lg">
                <i class="bi bi-pen"></i> Start Writing
            </button>
        </div>
    </div>

    @vite(['Modules/Blog/resources/assets/js/app.js', 'Modules/Blog/resources/assets/sass/app.scss'])
@endsection
