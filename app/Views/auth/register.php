<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-user-plus"></i> Реєстрація нового користувача</h4>
            </div>
            <div class="card-body">
                <form action="/auth/register" method="post">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">Ім'я</label>
                                <input type="text" class="form-control <?= isset($validation) && $validation->hasError('first_name') ? 'is-invalid' : '' ?>"
                                       id="first_name" name="first_name" value="<?= old('first_name') ?>" required>
                                <?php if (isset($validation) && $validation->hasError('first_name')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('first_name') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Прізвище</label>
                                <input type="text" class="form-control <?= isset($validation) && $validation->hasError('last_name') ? 'is-invalid' : '' ?>"
                                       id="last_name" name="last_name" value="<?= old('last_name') ?>" required>
                                <?php if (isset($validation) && $validation->hasError('last_name')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('last_name') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email адреса</label>
                        <input type="email" class="form-control <?= isset($validation) && $validation->hasError('email') ? 'is-invalid' : '' ?>"
                               id="email" name="email" value="<?= old('email') ?>" required>
                        <?php if (isset($validation) && $validation->hasError('email')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('email') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Пароль</label>
                                <input type="password" class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>"
                                       id="password" name="password" required>
                                <?php if (isset($validation) && $validation->hasError('password')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password') ?>
                                    </div>
                                <?php endif; ?>
                                <div class="form-text">Мінімум 8 символів</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password_confirm" class="form-label">Підтвердження пароля</label>
                                <input type="password" class="form-control <?= isset($validation) && $validation->hasError('password_confirm') ? 'is-invalid' : '' ?>"
                                       id="password_confirm" name="password_confirm" required>
                                <?php if (isset($validation) && $validation->hasError('password_confirm')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password_confirm') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Номер телефону (опціонально)</label>
                        <input type="tel" class="form-control <?= isset($validation) && $validation->hasError('phone') ? 'is-invalid' : '' ?>"
                               id="phone" name="phone" value="<?= old('phone') ?>" placeholder="+380xxxxxxxxx">
                        <?php if (isset($validation) && $validation->hasError('phone')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('phone') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Адреса доставки (опціонально)</label>
                        <textarea class="form-control" id="address" name="address" rows="3"><?= old('address') ?></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i> Зареєструватися
                        </button>
                    </div>

                </form>

                <div class="text-center mt-3">
                    <p class="mb-0">Вже маєте акаунт? <a href="/auth/login">Увійдіть</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>