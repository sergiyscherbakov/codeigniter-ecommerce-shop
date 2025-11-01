<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-box"></i> <?= esc($title) ?></h2>
            <div>
                <a href="/admin" class="btn btn-outline-secondary me-2">
                    <i class="fas fa-arrow-left"></i> Назад до панелі
                </a>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="fas fa-plus"></i> Додати товар
                </button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Каталог товарів</h5>
                    <div class="d-flex gap-2">
                        <select class="form-select" style="width: 150px;">
                            <option>Всі категорії</option>
                            <option>Ноутбуки</option>
                            <option>Смартфони</option>
                            <option>Аксесуари</option>
                        </select>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Пошук товарів...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Фото</th>
                                <th>Назва</th>
                                <th>Категорія</th>
                                <th>Ціна</th>
                                <th>Кількість</th>
                                <th>Статус</th>
                                <th>Дії</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="bg-light d-flex align-items-center justify-content-center"
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-laptop text-muted"></i>
                                    </div>
                                </td>
                                <td>
                                    <strong>MacBook Pro 13"</strong><br>
                                    <small class="text-muted">M2 чип, 8GB RAM</small>
                                </td>
                                <td><span class="badge bg-info">Ноутбуки</span></td>
                                <td><strong>45,000 ₴</strong></td>
                                <td>
                                    <span class="badge bg-warning">5 шт.</span>
                                </td>
                                <td><span class="badge bg-success">Активний</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" title="Редагувати">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="Переглянути">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" title="Змінити статус">
                                        <i class="fas fa-toggle-on"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" title="Видалити">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="bg-light d-flex align-items-center justify-content-center"
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-mobile-alt text-muted"></i>
                                    </div>
                                </td>
                                <td>
                                    <strong>iPhone 15 Pro</strong><br>
                                    <small class="text-muted">128GB, Blue Titanium</small>
                                </td>
                                <td><span class="badge bg-primary">Смартфони</span></td>
                                <td><strong>52,000 ₴</strong></td>
                                <td>
                                    <span class="badge bg-success">12 шт.</span>
                                </td>
                                <td><span class="badge bg-success">Активний</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" title="Редагувати">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="Переглянути">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" title="Змінити статус">
                                        <i class="fas fa-toggle-on"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" title="Видалити">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="bg-light d-flex align-items-center justify-content-center"
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-headphones text-muted"></i>
                                    </div>
                                </td>
                                <td>
                                    <strong>AirPods Pro</strong><br>
                                    <small class="text-muted">3-е покоління</small>
                                </td>
                                <td><span class="badge bg-secondary">Аксесуари</span></td>
                                <td><strong>8,500 ₴</strong></td>
                                <td>
                                    <span class="badge bg-danger">0 шт.</span>
                                </td>
                                <td><span class="badge bg-secondary">Немає в наявності</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" title="Редагувати">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="Переглянути">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-success" title="Поповнити склад">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" title="Видалити">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <span class="page-link">Попередня</span>
                        </li>
                        <li class="page-item active">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Наступна</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Modal для додавання товару -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Додати новий товар</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="productName" class="form-label">Назва товару</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        <div class="col-md-4">
                            <label for="category" class="form-label">Категорія</label>
                            <select class="form-select" id="category" required>
                                <option value="">Виберіть категорію</option>
                                <option value="1">Ноутбуки</option>
                                <option value="2">Смартфони</option>
                                <option value="3">Аксесуари</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Опис товару</label>
                        <textarea class="form-control" id="description" rows="3" required></textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="price" class="form-label">Ціна (₴)</label>
                            <input type="number" class="form-control" id="price" min="0" step="0.01" required>
                        </div>
                        <div class="col-md-4">
                            <label for="quantity" class="form-label">Кількість</label>
                            <input type="number" class="form-control" id="quantity" min="0" required>
                        </div>
                        <div class="col-md-4">
                            <label for="status" class="form-label">Статус</label>
                            <select class="form-select" id="status" required>
                                <option value="active">Активний</option>
                                <option value="inactive">Неактивний</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Фото товару</label>
                        <input type="file" class="form-control" id="image" accept="image/*">
                        <div class="form-text">Підтримувані формати: JPG, PNG, GIF. Максимальний розмір: 2MB</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Скасувати</button>
                    <button type="submit" class="btn btn-primary">Створити товар</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>