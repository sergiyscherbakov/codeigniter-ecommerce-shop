<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-shopping-bag"></i> <?= esc($title) ?></h2>
            <div>
                <a href="/admin" class="btn btn-outline-secondary me-2">
                    <i class="fas fa-arrow-left"></i> Назад до панелі
                </a>
                <button class="btn btn-outline-primary" onclick="window.print()">
                    <i class="fas fa-print"></i> Друк звіту
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Фільтри -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="statusFilter" class="form-label">Статус замовлення</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">Всі статуси</option>
                            <option value="pending">В обробці</option>
                            <option value="processing">Обробляється</option>
                            <option value="shipped">Відправлено</option>
                            <option value="delivered">Доставлено</option>
                            <option value="cancelled">Скасовано</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="dateFrom" class="form-label">Дата від</label>
                        <input type="date" class="form-control" id="dateFrom">
                    </div>
                    <div class="col-md-3">
                        <label for="dateTo" class="form-label">Дата до</label>
                        <input type="date" class="form-control" id="dateTo">
                    </div>
                    <div class="col-md-3">
                        <label for="searchOrder" class="form-label">Пошук</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchOrder" placeholder="№ замовлення або клієнт">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Список замовлень</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-success btn-sm">
                            <i class="fas fa-file-excel"></i> Експорт Excel
                        </button>
                        <button class="btn btn-outline-info btn-sm">
                            <i class="fas fa-file-pdf"></i> Експорт PDF
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>№ Замовлення</th>
                                <th>Клієнт</th>
                                <th>Товари</th>
                                <th>Сума</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th>Дії</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>#ORD-001</strong></td>
                                <td>
                                    <div>
                                        <strong>Іван Петренко</strong><br>
                                        <small class="text-muted">ivan@example.com</small><br>
                                        <small class="text-muted">+380501234567</small>
                                    </div>
                                </td>
                                <td>
                                    <small>
                                        MacBook Pro 13" (1 шт.)<br>
                                        AirPods Pro (1 шт.)
                                    </small>
                                </td>
                                <td><strong>53,500 ₴</strong></td>
                                <td>
                                    <select class="form-select form-select-sm" style="width: 120px;">
                                        <option value="pending">В обробці</option>
                                        <option value="processing">Обробляється</option>
                                        <option value="shipped" selected>Відправлено</option>
                                        <option value="delivered">Доставлено</option>
                                        <option value="cancelled">Скасовано</option>
                                    </select>
                                </td>
                                <td>
                                    <small>
                                        18.09.2025<br>
                                        <span class="text-muted">14:30</span>
                                    </small>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info" title="Переглянути деталі"
                                            data-bs-toggle="modal" data-bs-target="#orderDetailsModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-primary" title="Редагувати">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-success" title="Друк">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>#ORD-002</strong></td>
                                <td>
                                    <div>
                                        <strong>Марія Коваленко</strong><br>
                                        <small class="text-muted">maria@example.com</small><br>
                                        <small class="text-muted">+380509876543</small>
                                    </div>
                                </td>
                                <td>
                                    <small>
                                        iPhone 15 Pro (1 шт.)
                                    </small>
                                </td>
                                <td><strong>52,000 ₴</strong></td>
                                <td>
                                    <select class="form-select form-select-sm" style="width: 120px;">
                                        <option value="pending">В обробці</option>
                                        <option value="processing" selected>Обробляється</option>
                                        <option value="shipped">Відправлено</option>
                                        <option value="delivered">Доставлено</option>
                                        <option value="cancelled">Скасовано</option>
                                    </select>
                                </td>
                                <td>
                                    <small>
                                        17.09.2025<br>
                                        <span class="text-muted">16:45</span>
                                    </small>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info" title="Переглянути деталі">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-primary" title="Редагувати">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-success" title="Друк">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>#ORD-003</strong></td>
                                <td>
                                    <div>
                                        <strong>Олексій Сидоренко</strong><br>
                                        <small class="text-muted">alex@example.com</small><br>
                                        <small class="text-muted">+380671112233</small>
                                    </div>
                                </td>
                                <td>
                                    <small>
                                        AirPods Pro (1 шт.)
                                    </small>
                                </td>
                                <td><strong>8,500 ₴</strong></td>
                                <td>
                                    <select class="form-select form-select-sm" style="width: 120px;">
                                        <option value="pending">В обробці</option>
                                        <option value="processing">Обробляється</option>
                                        <option value="shipped">Відправлено</option>
                                        <option value="delivered" selected>Доставлено</option>
                                        <option value="cancelled">Скасовано</option>
                                    </select>
                                </td>
                                <td>
                                    <small>
                                        16.09.2025<br>
                                        <span class="text-muted">10:15</span>
                                    </small>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info" title="Переглянути деталі">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-primary" title="Редагувати">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-success" title="Друк">
                                        <i class="fas fa-print"></i>
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

<!-- Modal для деталей замовлення -->
<div class="modal fade" id="orderDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Деталі замовлення #ORD-001</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Інформація про клієнта</h6>
                        <table class="table table-sm">
                            <tr><td><strong>Ім'я:</strong></td><td>Іван Петренко</td></tr>
                            <tr><td><strong>Email:</strong></td><td>ivan@example.com</td></tr>
                            <tr><td><strong>Телефон:</strong></td><td>+380501234567</td></tr>
                            <tr><td><strong>Адреса:</strong></td><td>м. Київ, вул. Хрещатик, 1</td></tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Інформація про замовлення</h6>
                        <table class="table table-sm">
                            <tr><td><strong>Номер:</strong></td><td>#ORD-001</td></tr>
                            <tr><td><strong>Дата:</strong></td><td>18.09.2025 14:30</td></tr>
                            <tr><td><strong>Статус:</strong></td><td><span class="badge bg-info">Відправлено</span></td></tr>
                            <tr><td><strong>Спосіб оплати:</strong></td><td>Готівкою при отриманні</td></tr>
                        </table>
                    </div>
                </div>

                <h6 class="mt-4">Товари в замовленні</h6>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Товар</th>
                                <th>Ціна</th>
                                <th>Кількість</th>
                                <th>Сума</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>MacBook Pro 13"</td>
                                <td>45,000 ₴</td>
                                <td>1</td>
                                <td>45,000 ₴</td>
                            </tr>
                            <tr>
                                <td>AirPods Pro</td>
                                <td>8,500 ₴</td>
                                <td>1</td>
                                <td>8,500 ₴</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Загальна сума:</th>
                                <th>53,500 ₴</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary">Редагувати замовлення</button>
                <button type="button" class="btn btn-success">Друк</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>