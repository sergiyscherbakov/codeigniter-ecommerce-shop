<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-list"></i> Категорії</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><a href="/" class="text-decoration-none">Всі товари</a></li>
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <li class="mt-2">
                                <a href="/products/category/<?= $category['id'] ?>" class="text-decoration-none">
                                    <?= esc($category['name']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-store"></i> <?= esc($title) ?></h1>
            <div>
                <span class="text-muted">Знайдено товарів: <?= count($products) ?></span>
            </div>
        </div>

        <?php if (!empty($products)): ?>
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= esc($product['name']) ?></h5>
                                <p class="card-text text-muted flex-grow-1">
                                    <?= esc(substr($product['description'], 0, 100)) ?>...
                                </p>
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="h5 mb-0 text-primary"><?= number_format($product['price'], 2) ?> грн</span>
                                        <small class="text-muted">
                                            <?php if ($product['quantity'] > 0): ?>
                                                <i class="fas fa-check-circle text-success"></i> В наявності
                                            <?php else: ?>
                                                <i class="fas fa-times-circle text-danger"></i> Немає в наявності
                                            <?php endif; ?>
                                        </small>
                                    </div>
                                    <div class="mt-2">
                                        <a href="/products/<?= $product['id'] ?>" class="btn btn-outline-primary btn-sm me-2">
                                            <i class="fas fa-eye"></i> Переглянути
                                        </a>
                                        <?php if ($product['quantity'] > 0): ?>
                                            <button type="button" class="btn btn-primary btn-sm" onclick="addToCart(<?= $product['id'] ?>)">
                                                <i class="fas fa-cart-plus"></i> В кошик
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Товари не знайдено</h4>
                <p class="text-muted">На даний момент в цій категорії немає доступних товарів</p>
            </div>
        <?php endif; ?>
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

    fetch('/cart/add/' + productId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        }
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
        alert('Помилка при додаванні товару до кошика');
    });
}
</script>
<?= $this->endSection() ?>