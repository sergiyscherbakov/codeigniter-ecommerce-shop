<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-credit-card"></i> <?= esc($title) ?></h4>
            </div>
            <div class="card-body">
                <form action="/cart/place-order" method="post">

                <h5><i class="fas fa-user"></i> Контактні дані</h5>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">Ім'я</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="<?= session()->get('user_name') ? explode(' ', session()->get('user_name'))[0] : '' ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Прізвище</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               value="<?= session()->get('user_name') ? explode(' ', session()->get('user_name'))[1] ?? '' : '' ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= session()->get('user_email') ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                               placeholder="+380xxxxxxxxx" required>
                    </div>
                </div>

                <h5><i class="fas fa-truck"></i> Доставка</h5>
                <div class="mb-4">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="shipping_method"
                               id="delivery_courier" value="courier" checked>
                        <label class="form-check-label" for="delivery_courier">
                            <strong>Кур'єрська доставка</strong> - 50 грн
                            <small class="text-muted d-block">Доставка протягом 1-2 робочих днів</small>
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="shipping_method"
                               id="delivery_pickup" value="pickup">
                        <label class="form-check-label" for="delivery_pickup">
                            <strong>Самовивіз</strong> - безкоштовно
                            <small class="text-muted d-block">Забрати з нашого магазину</small>
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="shipping_method"
                               id="delivery_post" value="post">
                        <label class="form-check-label" for="delivery_post">
                            <strong>Новою Поштою</strong> - за тарифами перевізника
                            <small class="text-muted d-block">Доставка в відділення або поштомат</small>
                        </label>
                    </div>
                </div>

                <div class="mb-4" id="address_section">
                    <label for="address" class="form-label">Адреса доставки</label>
                    <textarea class="form-control" id="address" name="address" rows="3"
                              placeholder="Вкажіть повну адресу для доставки" required></textarea>
                </div>

                <h5><i class="fas fa-credit-card"></i> Оплата</h5>
                <div class="mb-4">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method"
                               id="payment_cash" value="cash" checked>
                        <label class="form-check-label" for="payment_cash">
                            <strong>Готівкою при отриманні</strong>
                            <small class="text-muted d-block">Оплата кур'єру або в магазині</small>
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method"
                               id="payment_card" value="card">
                        <label class="form-check-label" for="payment_card">
                            <strong>Картою онлайн</strong>
                            <small class="text-muted d-block">Безпечна оплата через банк</small>
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method"
                               id="payment_transfer" value="transfer">
                        <label class="form-check-label" for="payment_transfer">
                            <strong>Банківський переказ</strong>
                            <small class="text-muted d-block">Оплата за реквізитами</small>
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="notes" class="form-label">Коментар до замовлення (опціонально)</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3"
                              placeholder="Будь-які додаткові побажання..."></textarea>
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="terms" required>
                    <label class="form-check-label" for="terms">
                        Я погоджуюся з <a href="#" class="text-decoration-none">умовами користування</a>
                        та <a href="#" class="text-decoration-none">політикою конфіденційності</a>
                    </label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-check"></i> Підтвердити замовлення
                    </button>
                    <a href="/cart" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Назад до кошика
                    </a>
                </div>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-list"></i> Ваше замовлення</h5>
            </div>
            <div class="card-body">
                <?php foreach ($cartItems as $item): ?>
                    <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                        <div>
                            <h6 class="mb-0"><?= esc($item['name']) ?></h6>
                            <small class="text-muted"><?= $item['cart_quantity'] ?> шт. × <?= number_format($item['price'], 2) ?> грн</small>
                        </div>
                        <span><?= number_format($item['subtotal'], 2) ?> грн</span>
                    </div>
                <?php endforeach; ?>

                <div class="d-flex justify-content-between mb-2">
                    <span>Сума товарів:</span>
                    <span><?= number_format($total, 2) ?> грн</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Доставка:</span>
                    <span id="delivery_cost">50.00 грн</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <strong>До сплати:</strong>
                    <strong class="text-primary" id="total_cost"><?= number_format($total + 50, 2) ?> грн</strong>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const shippingMethods = document.querySelectorAll('input[name="shipping_method"]');
    const addressSection = document.getElementById('address_section');
    const deliveryCost = document.getElementById('delivery_cost');
    const totalCost = document.getElementById('total_cost');
    const baseTotal = <?= $total ?>;

    function updateShipping() {
        const selectedMethod = document.querySelector('input[name="shipping_method"]:checked').value;
        const addressField = document.getElementById('address');

        if (selectedMethod === 'pickup') {
            addressSection.style.display = 'none';
            addressField.required = false;
            deliveryCost.textContent = 'Безкоштовно';
            totalCost.textContent = baseTotal.toFixed(2) + ' грн';
        } else if (selectedMethod === 'courier') {
            addressSection.style.display = 'block';
            addressField.required = true;
            if (baseTotal >= 1000) {
                deliveryCost.textContent = 'Безкоштовно';
                totalCost.textContent = baseTotal.toFixed(2) + ' грн';
            } else {
                deliveryCost.textContent = '50.00 грн';
                totalCost.textContent = (baseTotal + 50).toFixed(2) + ' грн';
            }
        } else {
            addressSection.style.display = 'block';
            addressField.required = true;
            deliveryCost.textContent = 'За тарифами НП';
            totalCost.textContent = baseTotal.toFixed(2) + ' + доставка';
        }
    }

    shippingMethods.forEach(method => {
        method.addEventListener('change', updateShipping);
    });

    updateShipping();
});
</script>
<?= $this->endSection() ?>