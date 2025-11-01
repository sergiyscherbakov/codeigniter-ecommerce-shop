<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-user"></i> Мій акаунт</h5>
            </div>
            <div class="card-body">
                <nav class="nav flex-column">
                    <a class="nav-link" href="/profile">
                        <i class="fas fa-user-edit"></i> Особисті дані
                    </a>
                    <a class="nav-link active" href="/profile/orders">
                        <i class="fas fa-shopping-bag"></i> Мої замовлення
                    </a>
                    <a class="nav-link" href="/cart">
                        <i class="fas fa-shopping-cart"></i> Кошик
                    </a>
                    <?php if (session()->get('user_role') === 'admin'): ?>
                        <hr>
                        <a class="nav-link text-primary" href="/admin">
                            <i class="fas fa-cogs"></i> Адміністрування
                        </a>
                    <?php endif; ?>
                    <hr>
                    <a class="nav-link text-danger" href="/auth/logout">
                        <i class="fas fa-sign-out-alt"></i> Вихід
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-shopping-bag"></i> <?= esc($title) ?></h4>
                <span class="badge bg-primary"><?= count($orders) ?> замовлень</span>
            </div>
            <div class="card-body">
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $order): ?>
                        <div class="card border-start border-primary border-3 mb-3">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <h6 class="mb-1">Замовлення #<?= $order['id'] ?></h6>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar"></i> <?= date('d.m.Y', strtotime($order['date'])) ?>
                                        </small>
                                    </div>
                                    <div class="col-md-2">
                                        <?php
                                        $statusConfig = [
                                            'new' => ['class' => 'warning', 'icon' => 'clock', 'text' => 'Нове'],
                                            'confirmed' => ['class' => 'info', 'icon' => 'check', 'text' => 'Підтверджене'],
                                            'processing' => ['class' => 'primary', 'icon' => 'cog', 'text' => 'В обробці'],
                                            'shipped' => ['class' => 'secondary', 'icon' => 'truck', 'text' => 'Відправлене'],
                                            'delivered' => ['class' => 'success', 'icon' => 'check-circle', 'text' => 'Доставлене'],
                                            'cancelled' => ['class' => 'danger', 'icon' => 'times', 'text' => 'Скасоване']
                                        ];
                                        $status = $statusConfig[$order['status']] ?? $statusConfig['new'];
                                        ?>
                                        <span class="badge bg-<?= $status['class'] ?> fs-6">
                                            <i class="fas fa-<?= $status['icon'] ?>"></i> <?= $status['text'] ?>
                                        </span>
                                    </div>
                                    <div class="col-md-2">
                                        <small class="text-muted">Товарів:</small><br>
                                        <strong><?= $order['items_count'] ?> шт.</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <small class="text-muted">Сума:</small><br>
                                        <strong class="text-primary"><?= number_format($order['total'], 2) ?> грн</strong>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <a href="/profile/orders/<?= $order['id'] ?>" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-eye"></i> Детальніше
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>

                <?php else: ?>
                    <div class="text-center py-5">
                        <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">У вас ще немає замовлень</h5>
                        <p class="text-muted">Почніть покупки, щоб переглядати свої замовлення тут</p>
                        <a href="/" class="btn btn-primary">
                            <i class="fas fa-store"></i> Перейти до каталогу
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!empty($orders)): ?>
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-filter"></i> Фільтри</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="status_filter" class="form-label">Статус замовлення</label>
                            <select class="form-select" id="status_filter">
                                <option value="">Всі статуси</option>
                                <option value="new">Нові</option>
                                <option value="confirmed">Підтверджені</option>
                                <option value="processing">В обробці</option>
                                <option value="shipped">Відправлені</option>
                                <option value="delivered">Доставлені</option>
                                <option value="cancelled">Скасовані</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="date_from" class="form-label">Дата від</label>
                            <input type="date" class="form-control" id="date_from">
                        </div>
                        <div class="col-md-4">
                            <label for="date_to" class="form-label">Дата до</label>
                            <input type="date" class="form-control" id="date_to">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary me-2">
                                <i class="fas fa-search"></i> Застосувати фільтри
                            </button>
                            <button type="button" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Скинути
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>