<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-shopping-cart"></i> <?= esc($title) ?></h4>
                <span class="badge bg-primary"><?= count($cartItems) ?> товарів</span>
            </div>
            <div class="card-body">
                <?php if (!empty($cartItems)): ?>
                    <?php foreach ($cartItems as $item): ?>
                        <div class="row align-items-center mb-3 border-bottom pb-3">
                            <div class="col-md-2">
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 80px;">
                                    <i class="fas fa-image fa-2x text-muted"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6 class="mb-1"><?= esc($item['name']) ?></h6>
                                <small class="text-muted"><?= esc(substr($item['description'], 0, 80)) ?>...</small>
                            </div>
                            <div class="col-md-2">
                                <span class="fw-bold"><?= number_format($item['price'], 2) ?> грн</span>
                            </div>
                            <div class="col-md-2">
                                <form action="/cart/update/<?= $item['id'] ?>" method="post" class="d-flex">
                                    <input type="number" class="form-control form-control-sm"
                                           name="quantity" value="<?= $item['cart_quantity'] ?>"
                                           min="1" max="<?= $item['quantity'] ?>"
                                           onchange="this.form.submit()">
                                </form>
                            </div>
                            <div class="col-md-1">
                                <span class="fw-bold"><?= number_format($item['subtotal'], 2) ?> грн</span>
                            </div>
                            <div class="col-md-1">
                                <a href="/cart/remove/<?= $item['id'] ?>"
                                   class="btn btn-outline-danger btn-sm"
                                   onclick="return confirm('Видалити товар з кошика?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center py-5">
                        <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Кошик порожній</h5>
                        <p class="text-muted">Додайте товари до кошика, щоб продовжити покупки</p>
                        <a href="/" class="btn btn-primary">
                            <i class="fas fa-store"></i> Перейти до каталогу
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if (!empty($cartItems)): ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-calculator"></i> Підсумок замовлення</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Товарів:</span>
                        <span><?= count($cartItems) ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Загальна кількість:</span>
                        <span><?= array_sum(array_column($cartItems, 'cart_quantity')) ?> шт.</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Сума товарів:</span>
                        <span><?= number_format($total, 2) ?> грн</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Доставка:</span>
                        <span>
                            <?php if ($total >= 1000): ?>
                                <span class="text-success">Безкоштовно</span>
                            <?php else: ?>
                                50.00 грн
                            <?php endif; ?>
                        </span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>До сплати:</strong>
                        <strong class="text-primary">
                            <?= number_format($total + ($total >= 1000 ? 0 : 50), 2) ?> грн
                        </strong>
                    </div>

                    <?php if ($total < 1000): ?>
                        <div class="alert alert-info">
                            <small>
                                <i class="fas fa-info-circle"></i>
                                Додайте товарів на <?= number_format(1000 - $total, 2) ?> грн
                                для безкоштовної доставки
                            </small>
                        </div>
                    <?php endif; ?>

                    <div class="d-grid gap-2">
                        <a href="/cart/checkout" class="btn btn-primary btn-lg">
                            <i class="fas fa-credit-card"></i> Оформити замовлення
                        </a>
                        <a href="/" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Продовжити покупки
                        </a>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h6><i class="fas fa-shield-alt"></i> Гарантії якості</h6>
                    <ul class="list-unstyled small text-muted">
                        <li><i class="fas fa-check text-success"></i> Оригінальні товари</li>
                        <li><i class="fas fa-check text-success"></i> Гарантія 12 місяців</li>
                        <li><i class="fas fa-check text-success"></i> Повернення протягом 14 днів</li>
                        <li><i class="fas fa-check text-success"></i> Захист покупця</li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>