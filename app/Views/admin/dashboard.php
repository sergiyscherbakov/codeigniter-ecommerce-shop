<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-tachometer-alt"></i> <?= esc($title) ?></h2>
            <span class="badge bg-warning text-dark fs-6">
                <i class="fas fa-crown"></i> Режим адміністратора
            </span>
        </div>
    </div>
</div>

<!-- Статистика -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title"><?= $stats['users'] ?></h4>
                        <p class="card-text">Користувачів</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="/admin/users" class="text-white text-decoration-none">
                    <small>Переглянути всіх <i class="fas fa-arrow-right"></i></small>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title"><?= $stats['orders'] ?></h4>
                        <p class="card-text">Замовлень</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-shopping-bag fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="/admin/orders" class="text-white text-decoration-none">
                    <small>Переглянути всі <i class="fas fa-arrow-right"></i></small>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title"><?= $stats['products'] ?></h4>
                        <p class="card-text">Товарів</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-box fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="/admin/products" class="text-white text-decoration-none">
                    <small>Переглянути всі <i class="fas fa-arrow-right"></i></small>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title"><?= number_format($stats['revenue']) ?> ₴</h4>
                        <p class="card-text">Прибуток</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-chart-line fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="text-white text-decoration-none">
                    <small>Детальна статистика <i class="fas fa-arrow-right"></i></small>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Швидкі дії -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-bolt"></i> Швидкі дії</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="/admin/products" class="btn btn-outline-primary w-100">
                            <i class="fas fa-plus"></i><br>
                            Додати товар
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="/admin/users" class="btn btn-outline-success w-100">
                            <i class="fas fa-user-plus"></i><br>
                            Додати користувача
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="/admin/orders" class="btn btn-outline-info w-100">
                            <i class="fas fa-list"></i><br>
                            Переглянути замовлення
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="#" class="btn btn-outline-warning w-100">
                            <i class="fas fa-cog"></i><br>
                            Налаштування
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Останні замовлення -->
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-clock"></i> Останні замовлення</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Клієнт</th>
                                <th>Сума</th>
                                <th>Статус</th>
                                <th>Дата</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#001</td>
                                <td>Іван Петренко</td>
                                <td>2,500 ₴</td>
                                <td><span class="badge bg-success">Виконано</span></td>
                                <td>18.09.2025</td>
                            </tr>
                            <tr>
                                <td>#002</td>
                                <td>Марія Коваленко</td>
                                <td>1,200 ₴</td>
                                <td><span class="badge bg-warning">В обробці</span></td>
                                <td>18.09.2025</td>
                            </tr>
                            <tr>
                                <td>#003</td>
                                <td>Олексій Сидоренко</td>
                                <td>850 ₴</td>
                                <td><span class="badge bg-info">Відправлено</span></td>
                                <td>17.09.2025</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-exclamation-triangle"></i> Сповіщення</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-warning">
                    <strong>Увага!</strong> У товару "MacBook Pro 13" закінчується залишок.
                </div>
                <div class="alert alert-info">
                    <strong>Інформація:</strong> 2 нових користувача зареєструвалися сьогодні.
                </div>
                <div class="alert alert-success">
                    <strong>Успіх!</strong> Всі замовлення за вчора виконані.
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>