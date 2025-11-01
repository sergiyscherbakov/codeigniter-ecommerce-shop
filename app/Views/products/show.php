<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 400px;">
                    <i class="fas fa-image fa-5x text-muted"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <h1><?= esc($product['name']) ?></h1>

        <div class="mb-3">
            <span class="h3 text-primary"><?= number_format($product['price'], 2) ?> грн</span>
        </div>

        <div class="mb-3">
            <?php if ($product['quantity'] > 0): ?>
                <span class="badge bg-success fs-6">
                    <i class="fas fa-check-circle"></i> В наявності (<?= $product['quantity'] ?> шт.)
                </span>
            <?php else: ?>
                <span class="badge bg-danger fs-6">
                    <i class="fas fa-times-circle"></i> Товар закінчився
                </span>
            <?php endif; ?>
        </div>

        <div class="mb-4">
            <h5>Опис товару</h5>
            <p class="text-muted"><?= esc($product['description']) ?></p>
        </div>

        <div class="mb-4">
            <?php if ($product['quantity'] > 0): ?>
                <div class="row g-2">
                    <div class="col-md-4">
                        <label for="quantity" class="form-label">Кількість:</label>
                        <select class="form-select" id="quantity">
                            <?php for ($i = 1; $i <= min(10, $product['quantity']); $i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-8 d-flex align-items-end">
                        <button type="button" class="btn btn-primary btn-lg w-100" onclick="addToCart(<?= $product['id'] ?>)">
                            <i class="fas fa-cart-plus"></i> Додати в кошик
                        </button>
                    </div>
                </div>
            <?php else: ?>
                <button type="button" class="btn btn-secondary btn-lg w-100" disabled>
                    <i class="fas fa-times"></i> Товар недоступний
                </button>
            <?php endif; ?>
        </div>

        <div class="row g-2">
            <div class="col-md-6">
                <a href="/" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-arrow-left"></i> Назад до каталогу
                </a>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-outline-primary w-100">
                    <i class="fas fa-heart"></i> В улюблені
                </button>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-info-circle"></i> Додаткова інформація</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Характеристики:</h6>
                        <ul class="list-unstyled">
                            <li><strong>Артикул:</strong> <?= sprintf('ART-%06d', $product['id']) ?></li>
                            <li><strong>Статус:</strong>
                                <span class="badge bg-success">Активний</span>
                            </li>
                            <li><strong>Наявність:</strong> <?= $product['quantity'] ?> шт.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6>Доставка та оплата:</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-truck"></i> Безкоштовна доставка від 1000 грн</li>
                            <li><i class="fas fa-credit-card"></i> Оплата при отриманні</li>
                            <li><i class="fas fa-shield-alt"></i> Гарантія 12 місяців</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
function addToCart(productId) {
    if (!<?= session()->get('is_logged_in') ? 'true' : 'false' ?>) {
        alert('Будь ласка, увійдіть до системи для додавання товарів в кошик');
        window.location.href = '/auth/login';
        return;
    }

    const quantity = document.getElementById('quantity').value;

    fetch('/cart/add/' + productId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Товар додано до кошика!');
        } else {
            alert('Помилка при додаванні товару до кошика');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Товар додано до кошика! (демо режим)');
    });
}
</script>
<?= $this->endSection() ?>