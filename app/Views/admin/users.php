<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-users"></i> <?= esc($title) ?></h2>
            <div>
                <a href="/admin" class="btn btn-outline-secondary me-2">
                    <i class="fas fa-arrow-left"></i> Назад до панелі
                </a>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fas fa-user-plus"></i> Додати користувача
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
                    <h5 class="mb-0">Список користувачів</h5>
                    <div class="input-group" style="width: 300px;">
                        <input type="text" class="form-control" placeholder="Пошук користувачів...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Ім'я</th>
                                <th>Email</th>
                                <th>Роль</th>
                                <th>Статус</th>
                                <th>Дата реєстрації</th>
                                <th>Дії</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>999</td>
                                <td>Адмін Тестовий</td>
                                <td>admin@test.com</td>
                                <td><span class="badge bg-danger">Адміністратор</span></td>
                                <td><span class="badge bg-success">Активний</span></td>
                                <td>01.01.2025</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" title="Редагувати">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="Переглянути">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>998</td>
                                <td>Юзер Тестовий</td>
                                <td>user@test.com</td>
                                <td><span class="badge bg-secondary">Користувач</span></td>
                                <td><span class="badge bg-success">Активний</span></td>
                                <td>01.01.2025</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" title="Редагувати">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="Переглянути">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" title="Заблокувати">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Іван Петренко</td>
                                <td>ivan@example.com</td>
                                <td><span class="badge bg-secondary">Користувач</span></td>
                                <td><span class="badge bg-success">Активний</span></td>
                                <td>15.09.2025</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" title="Редагувати">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" title="Переглянути">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" title="Заблокувати">
                                        <i class="fas fa-ban"></i>
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

<!-- Modal для додавання користувача -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Додати нового користувача</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Ім'я</label>
                            <input type="text" class="form-control" id="firstName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Прізвище</label>
                            <input type="text" class="form-control" id="lastName" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Роль</label>
                        <select class="form-select" id="role" required>
                            <option value="user">Користувач</option>
                            <option value="admin">Адміністратор</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="tel" class="form-control" id="phone" placeholder="+380xxxxxxxxx">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Скасувати</button>
                    <button type="submit" class="btn btn-primary">Створити користувача</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>