@extends('layouts.admin')

@section('title', 'Products - EMS')
@section('page-title', 'Export Products')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('ems.dashboard') }}">EMS</a></li>
    <li class="breadcrumb-item active">Products</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header ems-list-card-header d-flex flex-column flex-sm-row align-items-sm-center justify-content-between">
            <h3 class="card-title">Export Products</h3>
            <div class="d-flex gap-2">
                <input type="file" id="import-products-file" class="visually-hidden" accept=".xlsx">
                <button type="button" class="btn btn-outline-primary btn-sm" id="import-products">
                    <i class="bi bi-file-earmark-arrow-up me-1"></i> Import Excel
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="create-product">
                    <i class="bi bi-plus-lg me-1"></i> Add product
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-2 align-items-end mb-3" aria-label="Product filters">
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="product-category-filter" class="form-label">Category</label>
                    <select id="product-category-filter" class="form-select">
                        <option value="">All categories</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="product-status-filter" class="form-label">Status</label>
                    <select id="product-status-filter" class="form-select">
                        <option value="">All statuses</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="product-price-min" class="form-label">Minimum price</label>
                    <input id="product-price-min" type="number" min="0" step="0.01" class="form-control" placeholder="Any">
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="product-price-max" class="form-label">Maximum price</label>
                    <input id="product-price-max" type="number" min="0" step="0.01" class="form-control" placeholder="Any">
                </div>
            </div>
            <div id="products-loading" class="text-center text-body-secondary py-3" role="status">Loading products…</div>
            <div class="table-responsive">
                <table id="products-table" class="table table-striped table-hover align-middle w-100">
                    <thead>
                        <tr>
                            <th scope="col" class="exportable">English Name</th>
                            <th scope="col" class="exportable">Bangla Name</th>
                            <th scope="col" class="exportable">HS Code</th>
                            <th scope="col" class="exportable">HS Code for buyer</th>
                            <th scope="col" class="exportable">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="no-export text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="products-table-body"></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="product-modal" tabindex="-1" aria-labelledby="product-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <form id="product-form" class="product-modal-form" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title" id="product-modal-title">Add product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                            <div class="col-md-6">
                                <label for="product-hs-code-buyer-country" class="form-label">Buyer-country HS code <span class="text-body-secondary">(optional)</span></label>
                                <input id="product-hs-code-buyer-country" name="hs_code_buyer_country" class="form-control" maxlength="20">
                                <div class="invalid-feedback" data-error-for="hs_code_buyer_country"></div>
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
            const importEndpoint = @json(route('ems.products.import'));
            const categoryEndpoint = @json(route('ems.categories.index'));
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const form = document.getElementById('product-form');
            const modal = new bootstrap.Modal(document.getElementById('product-modal'));
            const tableBody = document.getElementById('products-table-body');
            const categorySelect = document.getElementById('product-category');
            const categoryFilter = document.getElementById('product-category-filter');
            const importFile = document.getElementById('import-products-file');
            let currentId = null;
            let productsDataTable = null;

            const escapeHtml = (value) => String(value ?? '').replace(/[&<>"']/g, (character) => ({
                '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;'
            })[character]);

            const showAlert = (message, type = 'success') => {
                window.showNotification({
                    icon: type === 'danger' ? 'error' : 'success',
                    text: message,
                });
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
            };

            const reportError = (error) => {
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
                    showAlert(error.payload.message || 'Please correct the highlighted fields.', 'danger');
                    return;
                }

                showAlert(error.payload?.message || 'The request could not be completed.', 'danger');
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
                const selectedCategory = categoryFilter.value;
                const categories = [...new Set(data.map((product) => product.category?.name).filter(Boolean))].sort();
                categoryFilter.replaceChildren(new Option('All categories', ''));
                categories.forEach((category) => categoryFilter.add(new Option(category, category)));
                if (categories.includes(selectedCategory)) categoryFilter.value = selectedCategory;

                const rows = data.map((product) => {
                    const row = document.createElement('tr');
                    const activeLabel = product.is_active ? 'Active' : 'Inactive';
                    row.innerHTML = `
                        <td>${escapeHtml(product.name_english)}</td>
                        <td>${escapeHtml(product.name_bangla_display)}</td>
                        <td>${escapeHtml(product.hs_code)}</td>
                        <td>${escapeHtml(product.hs_code_buyer_country || '—')}</td>
                        <td data-order="${escapeHtml(product.unit_price ?? '')}">${product.unit_price === null ? '—' : `${escapeHtml(product.currency)} ${escapeHtml(product.unit_price)}`}</td>
                        <td>${escapeHtml(product.category?.name || '—')}</td>
                        <td data-search="${activeLabel}"><span class="badge ${product.is_active ? 'text-bg-success' : 'text-bg-secondary'}">${activeLabel}</span></td>
                        <td class="text-sm-end">
                            <div class="d-flex flex-wrap gap-1 justify-content-sm-end">
                                <button type="button" class="btn btn-outline-primary btn-sm" data-action="edit" data-id="${escapeHtml(product.id)}">Edit</button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-action="delete" data-id="${escapeHtml(product.id)}">Delete</button>
                            </div>
                        </td>
                    `;
                    return row;
                });

                if (!productsDataTable) {
                    productsDataTable = window.initializeExportDataTable({
                        selector: '#products-table',
                        title: 'Export Products',
                        priorities: {
                            detail: 0,
                            actions: 7,
                            actionsPriority: 1,
                            hidden: [5, 6],
                            columns: [
                                { column: 1, priority: 3 },
                                { column: 2, priority: 4 },
                                { column: 3, priority: 5 },
                                { column: 4, priority: 2 },
                            ],
                        },
                        filters: [
                            { selector: '#product-category-filter', column: 5 },
                            { selector: '#product-status-filter', column: 6 },
                            { selector: '#product-price-min, #product-price-max', type: 'range', column: 4 },
                        ],
                    });
                }

                productsDataTable.clear().rows.add(rows).draw(false);
                document.getElementById('products-loading').classList.add('d-none');
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

            document.getElementById('import-products').addEventListener('click', () => importFile.click());

            importFile.addEventListener('change', async () => {
                const file = importFile.files[0];
                if (!file) return;

                const button = document.getElementById('import-products');
                const formData = new FormData();
                formData.append('file', file);
                button.disabled = true;

                try {
                    const response = await fetch(importEndpoint, {
                        method: 'POST',
                        headers: {
                            Accept: 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: formData,
                    });
                    const result = await response.json();

                    if (!response.ok) {
                        const errors = Object.values(result.errors || {}).flat();
                        throw new Error(errors.join(' ') || result.message || 'The import could not be completed.');
                    }

                    await loadProducts();
                    showAlert(result.message);
                } catch (error) {
                    showAlert(error.message || 'The import could not be completed.', 'danger');
                } finally {
                    button.disabled = false;
                    importFile.value = '';
                }
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
                        reportError(error);
                    }
                    return;
                }

                if (button.dataset.action === 'delete') {
                    const confirmation = await window.Swal.fire({
                        title: 'Delete this product?',
                        text: 'This action cannot be undone.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        confirmButtonText: 'Yes, delete it',
                        cancelButtonText: 'Cancel',
                    });
                    if (!confirmation.isConfirmed) return;

                    try {
                        const result = await request(`${endpoint}/${id}`, 'DELETE');
                        await loadProducts();
                        showAlert(result.message);
                    } catch (error) {
                        reportError(error);
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
                    showAlert(result.message);
                } catch (error) {
                    reportError(error);
                } finally {
                    button.disabled = false;
                }
            });

            Promise.all([loadCategories(), loadProducts()]).catch((error) => {
                document.getElementById('products-loading').classList.add('d-none');
                reportError(error);
            });
        });
    </script>
@endpush
