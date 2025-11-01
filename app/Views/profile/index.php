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
                    <a class="nav-link active" href="/profile">
                        <i class="fas fa-user-edit"></i> Особисті дані
                    </a>
                    <a class="nav-link" href="/profile/orders">
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
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-user-edit"></i> <?= esc($title) ?></h4>
            </div>
            <div class="card-body">
                <form action="/profile/update" method="post">

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">Ім'я</label>
                            <input type="text" class="form-control <?= isset($validation) && $validation->hasError('first_name') ? 'is-invalid' : '' ?>"
                                   id="first_name" name="first_name"
                                   value="<?= old('first_name', $user['first_name']) ?>" required>
                            <?php if (isset($validation) && $validation->hasError('first_name')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('first_name') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Прізвище</label>
                            <input type="text" class="form-control <?= isset($validation) && $validation->hasError('last_name') ? 'is-invalid' : '' ?>"
                                   id="last_name" name="last_name"
                                   value="<?= old('last_name', $user['last_name']) ?>" required>
                            <?php if (isset($validation) && $validation->hasError('last_name')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('last_name') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email адреса</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= esc($user['email']) ?>" disabled>
                        <div class="form-text">Email можна змінити, звернувшись до адміністратора</div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Номер телефону</label>
                        <input type="tel" class="form-control <?= isset($validation) && $validation->hasError('phone') ? 'is-invalid' : '' ?>"
                               id="phone" name="phone"
                               value="<?= old('phone') ?>" placeholder="+380xxxxxxxxx">
                        <?php if (isset($validation) && $validation->hasError('phone')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('phone') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Адреса доставки</label>
                        <textarea class="form-control" id="address" name="address" rows="3"
                                  placeholder="Ваша адреса для доставки товарів"><?= old('address') ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Роль в системі</label>
                        <div>
                            <?php if ($user['role'] === 'admin'): ?>
                                <span class="badge bg-primary fs-6">
                                    <i class="fas fa-crown"></i> Адміністратор
                                </span>
                            <?php else: ?>
                                <span class="badge bg-secondary fs-6">
                                    <i class="fas fa-user"></i> Користувач
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Зберегти зміни
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-key"></i> Безпека акаунта</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Зміна пароля</h6>
                        <p class="text-muted">Регулярно змінюйте пароль для безпеки вашого акаунта</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                            <i class="fas fa-key"></i> Змінити пароль
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal для зміни пароля -->
<div class="modal fade" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Зміна пароля</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/profile/change-password" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Поточний пароль</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Новий пароль</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                        <div class="form-text">Мінімум 8 символів</div>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Підтвердження нового пароля</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Скасувати</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Змінити пароль
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>