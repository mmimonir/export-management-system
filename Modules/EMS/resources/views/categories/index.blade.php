@extends('layouts.admin')

@section('title', 'Product Categories - EMS')
@section('page-title', 'Product Categories')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('ems.dashboard') }}">EMS</a></li>
    <li class="breadcrumb-item active">Product Categories</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header ems-list-card-header d-flex flex-column flex-sm-row align-items-sm-center justify-content-between">
            <h3 class="card-title">Product Categories</h3>
            <button type="button" class="btn btn-primary btn-sm" id="create-category">
                <i class="bi bi-plus-lg me-1"></i> Add category
            </button>
        </div>
        <div class="card-body">
            <div class="row g-2 align-items-end mb-3" aria-label="Category filters">
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="category-status-filter" class="form-label">Status</label>
                    <select id="category-status-filter" class="form-select">
                        <option value="">All statuses</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div id="categories-loading" class="text-center text-body-secondary py-3" role="status">Loading categories…</div>
            <div class="table-responsive">
                <table id="categories-table" class="table table-striped table-hover align-middle w-100">
                    <thead>
                        <tr>
                            <th scope="col" class="exportable">ID</th>
                            <th scope="col" class="exportable">Name</th>
                            <th scope="col" class="exportable">Slug</th>
                            <th scope="col" class="exportable">Description</th>
                            <th scope="col" class="exportable">Products</th>
                            <th scope="col" class="exportable">Status</th>
                            <th scope="col" class="no-export text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="categories-table-body"></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="category-modal" tabindex="-1" aria-labelledby="category-modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="category-form" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title" id="category-modal-title">Add category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Name</label>
                            <input id="category-name" name="name" class="form-control" maxlength="100" required>
                            <div class="invalid-feedback" data-error-for="name"></div>
                        </div>
                        <div class="mb-3">
                            <label for="category-slug" class="form-label">Slug</label>
                            <input id="category-slug" name="slug" class="form-control" maxlength="100" required>
                            <div class="invalid-feedback" data-error-for="slug"></div>
                        </div>
                        <div class="mb-3">
                            <label for="category-description" class="form-label">Description <span class="text-body-secondary">(optional)</span></label>
                            <textarea id="category-description" name="description" rows="3" class="form-control"></textarea>
                            <div class="invalid-feedback" data-error-for="description"></div>
                        </div>
                        <div class="form-check">
                            <input id="category-is-active" name="is_active" type="checkbox" class="form-check-input" value="1" checked>
                            <label for="category-is-active" class="form-check-label">Active</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="save-category">Save category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const endpoint = @json(route('ems.categories.index'));
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const form = document.getElementById('category-form');
            const modal = new bootstrap.Modal(document.getElementById('category-modal'));
            const tableBody = document.getElementById('categories-table-body');
            let currentId = null;
            let categoriesDataTable = null;

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
                const { data } = await request(endpoint);
                const rows = data.map((category) => {
                    const row = document.createElement('tr');
                    const activeLabel = category.is_active ? 'Active' : 'Inactive';
                    row.innerHTML = `
                        <td>${escapeHtml(category.id)}</td>
                        <td>${escapeHtml(category.name)}</td>
                        <td>${escapeHtml(category.slug)}</td>
                        <td>${escapeHtml(category.description || '—')}</td>
                        <td data-order="${escapeHtml(category.products_count)}">${escapeHtml(category.products_count)}</td>
                        <td data-search="${activeLabel}"><span class="badge ${category.is_active ? 'text-bg-success' : 'text-bg-secondary'}">${activeLabel}</span></td>
                        <td class="text-sm-end">
                            <div class="d-flex flex-wrap gap-1 justify-content-sm-end">
                                <button type="button" class="btn btn-outline-primary btn-sm" data-action="edit" data-id="${escapeHtml(category.id)}">Edit</button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-action="delete" data-id="${escapeHtml(category.id)}">Delete</button>
                            </div>
                        </td>
                    `;
                    return row;
                });

                if (!categoriesDataTable) {
                    categoriesDataTable = window.initializeExportDataTable({
                        selector: '#categories-table',
                        title: 'Product Categories',
                        priorities: {
                            detail: 1,
                            actions: 6,
                            actionsPriority: 2,
                            columns: [
                                { column: 1, priority: 1 },
                                { column: 5, priority: 3 },
                                { column: 4, priority: 4 },
                                { column: 2, priority: 5 },
                                { column: 3, priority: 6 },
                            ],
                        },
                        filters: [
                            { selector: '#category-status-filter', column: 5 },
                        ],
                    });
                }

                categoriesDataTable.clear().rows.add(rows).draw(false);
                document.getElementById('categories-loading').classList.add('d-none');
            };

            const resetForm = () => {
                currentId = null;
                form.reset();
                document.getElementById('category-is-active').checked = true;
                document.getElementById('category-modal-title').textContent = 'Add category';
                document.getElementById('save-category').textContent = 'Save category';
                clearErrors();
            };

            document.getElementById('create-category').addEventListener('click', () => {
                resetForm();
                modal.show();
            });

            tableBody.addEventListener('click', async (event) => {
                const button = event.target.closest('button[data-action]');
                if (!button) return;

                const id = button.dataset.id;
                if (button.dataset.action === 'edit') {
                    try {
                        const { data: category } = await request(`${endpoint}/${id}`);
                        resetForm();
                        currentId = category.id;
                        ['name', 'slug', 'description'].forEach((field) => {
                            form.elements.namedItem(field).value = category[field] ?? '';
                        });
                        document.getElementById('category-is-active').checked = Boolean(category.is_active);
                        document.getElementById('category-modal-title').textContent = 'Edit category';
                        document.getElementById('save-category').textContent = 'Update category';
                        modal.show();
                    } catch (error) {
                        reportError(error);
                    }
                    return;
                }

                if (button.dataset.action === 'delete') {
                    const confirmation = await window.Swal.fire({
                        title: 'Delete this category?',
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
                        await loadCategories();
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
                data.is_active = document.getElementById('category-is-active').checked ? 1 : 0;
                const button = document.getElementById('save-category');
                button.disabled = true;

                try {
                    const result = await request(
                        currentId ? `${endpoint}/${currentId}` : endpoint,
                        currentId ? 'PATCH' : 'POST',
                        data
                    );
                    modal.hide();
                    await loadCategories();
                    showAlert(result.message);
                } catch (error) {
                    reportError(error);
                } finally {
                    button.disabled = false;
                }
            });

            loadCategories().catch((error) => {
                document.getElementById('categories-loading').classList.add('d-none');
                reportError(error);
            });
        });
    </script>
@endpush
