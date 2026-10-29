@extends('layouts.admin')

@section('title', 'Products - EMS')
@section('page-title', 'Export Products')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('ems.dashboard') }}">EMS</a></li>
    <li class="breadcrumb-item active">Products</li>
@endsection

@section('content')
    <div id="product-alert" class="mb-3" aria-live="polite"></div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title">Export Products</h3>
            <button type="button" class="btn btn-primary btn-sm" id="create-product">
                <i class="bi bi-plus-lg me-1"></i> Add product
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>English name</th>
                            <th>Bangla name</th>
                            <th>Category</th>
                            <th>HS code</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="products-table-body">
                        <tr><td colspan="8" class="text-center text-body-secondary">Loading products…</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="product-modal" tabindex="-1" aria-labelledby="product-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <form id="product-form" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title" id="product-modal-title">Add product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="product-form-alert" class="mb-3" aria-live="polite"></div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="product-category" class="form-label">Category</label>
                                <select id="product-category" name="category_id" class="form-select" required>
                                    <option value="">Select category</option>
                                </select>
                                <div class="invalid-feedback" data-error-for="category_id"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="product-slug" class="form-label">Slug</label>
                                <input id="product-slug" name="slug" class="form-control" maxlength="255" required>
                                <div class="invalid-feedback" data-error-for="slug"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="product-name-bangla" class="form-label">Bangla name</label>
                                <input id="product-name-bangla" name="name_bangla" class="form-control" maxlength="255" required>
                                <div class="invalid-feedback" data-error-for="name_bangla"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="product-name-bangla-display" class="form-label">Bangla display name</label>
                                <input id="product-name-bangla-display" name="name_bangla_display" class="form-control" maxlength="255" required>
                                <div class="invalid-feedback" data-error-for="name_bangla_display"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="product-name-banglish" class="form-label">Banglish name</label>
                                <input id="product-name-banglish" name="name_banglish" class="form-control" maxlength="255" required>
                                <div class="invalid-feedback" data-error-for="name_banglish"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="product-name-english-bangla" class="form-label">English name with Bangla</label>
                                <input id="product-name-english-bangla" name="name_english_with_bangla" class="form-control" maxlength="255" required>
                                <div class="invalid-feedback" data-error-for="name_english_with_bangla"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="product-name-english" class="form-label">English name</label>
                                <input id="product-name-english" name="name_english" class="form-control" maxlength="255" required>
                                <div class="invalid-feedback" data-error-for="name_english"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="product-name-english-display" class="form-label">English display name</label>
                                <input id="product-name-english-display" name="name_english_display" class="form-control" maxlength="255" required>
                                <div class="invalid-feedback" data-error-for="name_english_display"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="product-botanical-name" class="form-label">Botanical name <span class="text-body-secondary">(optional)</span></label>
                                <input id="product-botanical-name" name="botanical_name" class="form-control" maxlength="255">
                                <div class="invalid-feedback" data-error-for="botanical_name"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="product-hs-code" class="form-label">HS code</label>
                                <input id="product-hs-code" name="hs_code" class="form-control" maxlength="20" required>
                                <div class="invalid-feedback" data-error-for="hs_code"></div>
                            </div>
                            <div class="col-md-4">
                                <label for="product-unit-price" class="form-label">Unit price <span class="text-body-secondary">(optional)</span></label>
                                <input id="product-unit-price" name="unit_price" type="number" min="0" step="0.01" class="form-control">
                                <div class="invalid-feedback" data-error-for="unit_price"></div>
                            </div>
                            <div class="col-md-4">
                                <label for="product-currency" class="form-label">Currency</label>
                                <input id="product-currency" name="currency" class="form-control" minlength="3" maxlength="3" value="USD" required>
                                <div class="invalid-feedback" data-error-for="currency"></div>
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <div class="form-check mb-2">
                                    <input id="product-is-active" name="is_active" type="checkbox" class="form-check-input" value="1" checked>
                                    <label for="product-is-active" class="form-check-label">Active</label>
                                </div>
                                <div class="invalid-feedback" data-error-for="is_active"></div>
                            </div>
                            <div class="col-12">
                                <label for="product-notes" class="form-label">Notes <span class="text-body-secondary">(optional)</span></label>
                                <textarea id="product-notes" name="notes" rows="3" class="form-control"></textarea>
                                <div class="invalid-feedback" data-error-for="notes"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="save-product">Save product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const endpoint = @json(route('ems.products.index'));
            const categoryEndpoint = @json(route('ems.categories.index'));
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const form = document.getElementById('product-form');
            const modal = new bootstrap.Modal(document.getElementById('product-modal'));
            const tableBody = document.getElementById('products-table-body');
            const categorySelect = document.getElementById('product-category');
            let currentId = null;

            const escapeHtml = (value) => String(value ?? '').replace(/[&<>"']/g, (character) => ({
                '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;'
            })[character]);

            const showAlert = (target, message, type = 'success') => {
                target.innerHTML = `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${escapeHtml(message)}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
            };

            const request = async (url, method = 'GET', data = null) => {
                const response = await fetch(url, {
                    method,
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': csrfToken,
                        ...(data ? { 'Content-Type': 'application/json' } : {}),
                    },
                    ...(data ? { body: JSON.stringify(data) } : {}),
                });
                const payload = await response.json();

                if (!response.ok) {
                    throw { status: response.status, payload };
                }

                return payload;
            };

            const clearErrors = () => {
                form.querySelectorAll('.is-invalid').forEach((input) => input.classList.remove('is-invalid'));
                form.querySelectorAll('[data-error-for]').forEach((element) => element.textContent = '');
                document.getElementById('product-form-alert').innerHTML = '';
            };

            const reportError = (error, target) => {
                const errors = error.payload?.errors;
                if (errors) {
                    Object.entries(errors).forEach(([field, messages]) => {
                        const input = form.elements.namedItem(field);
                        const feedback = form.querySelector(`[data-error-for="${field}"]`);
                        if (input && feedback) {
                            input.classList.add('is-invalid');
                            feedback.textContent = messages[0];
                        }
                    });
                    showAlert(target, error.payload.message || 'Please correct the highlighted fields.', 'danger');
                    return;
                }

                showAlert(target, error.payload?.message || 'The request could not be completed.', 'danger');
            };

            const loadCategories = async () => {
                const { data } = await request(categoryEndpoint);
                categorySelect.innerHTML = '<option value="">Select category</option>';
                data.forEach((category) => {
                    const option = new Option(
                        `${category.name}${category.is_active ? '' : ' (inactive)'}`,
                        category.id
                    );
                    categorySelect.add(option);
                });
            };

            const loadProducts = async () => {
                const { data } = await request(endpoint);
                tableBody.innerHTML = data.length ? data.map((product) => `
                    <tr>
                        <td>${escapeHtml(product.id)}</td>
                        <td>${escapeHtml(product.name_english)}</td>
                        <td>${escapeHtml(product.name_bangla_display)}</td>
                        <td>${escapeHtml(product.category?.name || '—')}</td>
                        <td>${escapeHtml(product.hs_code)}</td>
                        <td>${product.unit_price === null ? '—' : `${escapeHtml(product.currency)} ${escapeHtml(product.unit_price)}`}</td>
                        <td><span class="badge ${product.is_active ? 'text-bg-success' : 'text-bg-secondary'}">${product.is_active ? 'Active' : 'Inactive'}</span></td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-outline-primary btn-sm" data-action="edit" data-id="${escapeHtml(product.id)}">Edit</button>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-action="delete" data-id="${escapeHtml(product.id)}">Delete</button>
                        </td>
                    </tr>
                `).join('') : '<tr><td colspan="8" class="text-center text-body-secondary">No products found.</td></tr>';
            };

            const resetForm = () => {
                currentId = null;
                form.reset();
                document.getElementById('product-currency').value = 'USD';
                document.getElementById('product-is-active').checked = true;
                document.getElementById('product-modal-title').textContent = 'Add product';
                document.getElementById('save-product').textContent = 'Save product';
                clearErrors();
            };

            document.getElementById('create-product').addEventListener('click', () => {
                resetForm();
                modal.show();
            });

            tableBody.addEventListener('click', async (event) => {
                const button = event.target.closest('button[data-action]');
                if (!button) return;

                const id = button.dataset.id;
                if (button.dataset.action === 'edit') {
                    try {
                        const { data: product } = await request(`${endpoint}/${id}`);
                        resetForm();
                        currentId = product.id;
                        Object.keys(product).forEach((key) => {
                            const input = form.elements.namedItem(key);
                            if (!input || input.type === 'button' || input.type === 'submit') return;
                            if (input.type === 'checkbox') input.checked = Boolean(product[key]);
                            else if (product[key] !== null) input.value = product[key];
                        });
                        document.getElementById('product-modal-title').textContent = 'Edit product';
                        document.getElementById('save-product').textContent = 'Update product';
                        modal.show();
                    } catch (error) {
                        reportError(error, document.getElementById('product-alert'));
                    }
                    return;
                }

                if (button.dataset.action === 'delete' && window.confirm('Delete this product?')) {
                    try {
                        const result = await request(`${endpoint}/${id}`, 'DELETE');
                        await loadProducts();
                        showAlert(document.getElementById('product-alert'), result.message);
                    } catch (error) {
                        reportError(error, document.getElementById('product-alert'));
                    }
                }
            });

            form.addEventListener('submit', async (event) => {
                event.preventDefault();
                clearErrors();
                const data = Object.fromEntries(new FormData(form).entries());
                data.is_active = document.getElementById('product-is-active').checked ? 1 : 0;
                const button = document.getElementById('save-product');
                button.disabled = true;

                try {
                    const result = await request(
                        currentId ? `${endpoint}/${currentId}` : endpoint,
                        currentId ? 'PATCH' : 'POST',
                        data
                    );
                    modal.hide();
                    await loadProducts();
                    showAlert(document.getElementById('product-alert'), result.message);
                } catch (error) {
                    reportError(error, document.getElementById('product-form-alert'));
                } finally {
                    button.disabled = false;
                }
            });

            Promise.all([loadCategories(), loadProducts()]).catch((error) => {
                reportError(error, document.getElementById('product-alert'));
            });
        });
    </script>
@endpush
