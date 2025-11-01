# E-Commerce Shop Application (CodeIgniter 4)

![PHP](https://img.shields.io/badge/PHP-8.1-777BB4?style=for-the-badge&logo=php&logoColor=white) ![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white) ![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white) ![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white) ![Composer](https://img.shields.io/badge/Composer-2.0-885630?style=for-the-badge&logo=composer&logoColor=white)

## Автор

**Розробник:** Сергій Щербаков
**Email:** sergiyscherbakov@ukr.net
**Telegram:** @s_help_2010

### 💰 Підтримати розробку
Задонатити на каву USDT (BINANCE SMART CHAIN):
**`0xDFD0A23d2FEd7c1ab8A0F9A4a1F8386832B6f95A`**

---

Повнофункціональний веб-додаток інтернет-магазину на CodeIgniter 4 з системою аутентифікації, управління товарами, кошиком покупок та оформленням замовлень.

## Опис проєкту

**E-Commerce Shop Application** - це навчальний проєкт повноцінного інтернет-магазину, що демонструє використання CodeIgniter 4 фреймворку для створення сучасних веб-додатків. Проєкт реалізує всі ключові функції електронної комерції: від каталогу товарів до обробки замовлень.

### Основні можливості

#### Система аутентифікації та авторизації
- Реєстрація користувачів з валідацією email
- Авторизація (вхід/вихід)
- Система ролей: user (користувач) та admin (адміністратор)
- Захист маршрутів відповідно до ролей
- Хешування паролів з використанням `password_hash()`
- Управління сесіями

#### Каталог товарів
- Перегляд каталогу з пагінацією
- Категорії товарів з ієрархічною структурою
- Детальна інформація про товар
- Перевірка наявності на складі
- Множинні зображення товарів
- Фільтрація та сортування товарів

#### Кошик покупок
- Додавання/видалення товарів
- Зміна кількості товарів
- Розрахунок загальної суми
- Розрахунок вартості доставки
- Збереження кошика між сесіями
- Валідація доступності товарів

#### Оформлення замовлень
- Багатокрокове оформлення замовлення
- Вибір способу доставки (самовивіз, кур'єр, пошта)
- Вибір способу оплати (готівка, картка, переказ)
- Підтвердження адреси доставки
- Коментарі до замовлення
- Email-повідомлення про замовлення

#### Профіль користувача
- Перегляд та редагування особистих даних
- Історія замовлень з фільтрацією
- Детальна інформація про кожне замовлення
- Відстеження статусу замовлення
- Повторне замовлення
- Можливість скасування замовлення

#### Адмін-панель
- Управління товарами (CRUD)
- Управління категоріями
- Перегляд всіх замовлень
- Зміна статусів замовлень
- Управління користувачами
- Статистика продажів

## Технологічний стек

### Backend
- **PHP 8.1+** - мова програмування
- **CodeIgniter 4.6.3** - PHP фреймворк
- **MySQL 8.0+** - система управління базами даних
- **Composer** - менеджер залежностей PHP

### Frontend
- **Bootstrap 5** - CSS фреймворк для адаптивного дизайну
- **JavaScript (ES6+)** - клієнтська логіка
- **HTML5** - розмітка

### Архітектура
- **MVC (Model-View-Controller)** - архітектурний патерн
- **RESTful** - підхід до API
- **Session-based authentication** - аутентифікація на основі сесій

### Безпека
- **CSRF Protection** - захист від міжсайтової підробки запитів
- **XSS Protection** - захист від міжсайтового скриптингу
- **SQL Injection Prevention** - через Query Builder
- **Password Hashing** - bcrypt алгоритм
- **Input Validation** - валідація на рівні сервера та клієнта

## Структура проєкту

```
CodeIgniter/
├── app/
│   ├── Config/             # Конфігураційні файли
│   │   ├── Routes.php      # Маршрутизація
│   │   ├── Database.php    # Налаштування БД
│   │   └── ...
│   ├── Controllers/        # Контролери MVC
│   │   ├── AuthController.php       # Аутентифікація
│   │   ├── ProductController.php    # Товари
│   │   ├── CartController.php       # Кошик
│   │   ├── UserController.php       # Користувачі
│   │   └── AdminController.php      # Адмін-панель
│   ├── Models/             # Моделі даних
│   │   ├── UserModel.php
│   │   ├── ProductModel.php
│   │   ├── CategoryModel.php
│   │   ├── OrderModel.php
│   │   └── CartModel.php
│   ├── Views/              # Представлення (шаблони)
│   │   ├── auth/           # Аутентифікація
│   │   ├── products/       # Товари
│   │   ├── cart/           # Кошик
│   │   ├── user/           # Профіль
│   │   └── admin/          # Адмін-панель
│   ├── Database/           # Міграції та сіди
│   │   └── Migrations/     # Файли міграцій
│   ├── Filters/            # HTTP фільтри (middleware)
│   └── Helpers/            # Допоміжні функції
├── public/                 # Публічна директорія
│   ├── index.php           # Точка входу
│   ├── css/                # Стилі
│   ├── js/                 # JavaScript
│   └── uploads/            # Завантажені файли
├── writable/               # Тимчасові файли
│   ├── cache/              # Кеш
│   ├── logs/               # Логи
│   └── session/            # Сесії
├── vendor/                 # Composer залежності
├── tests/                  # Тести
├── .env                    # Змінні оточення (локально)
├── composer.json           # Залежності проєкту
└── spark                   # CLI інструмент CodeIgniter
```

## Встановлення та налаштування

### Передумови

Переконайтесь, що у вас встановлено:

- **PHP 8.1 або вище**
  ```bash
  php --version
  ```
- **Composer** - https://getcomposer.org/download/
  ```bash
  composer --version
  ```
- **MySQL 8.0 або вище**
  ```bash
  mysql --version
  ```
- **Git**
  ```bash
  git --version
  ```

### Крок 1: Клонування репозиторію

```bash
git clone <repository-url>
cd CodeIgniter
```

### Крок 2: Встановлення залежностей

```bash
composer install
```

Ця команда встановить всі необхідні PHP пакети, включаючи CodeIgniter 4.

### Крок 3: Налаштування середовища

1. Скопіюйте файл `env` у `.env`:

```bash
# Windows
copy env .env

# Linux/macOS
cp env .env
```

2. Відредагуйте файл `.env` та налаштуйте параметри:

```ini
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------
CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------
database.default.hostname = localhost
database.default.database = ci_shop
database.default.username = root
database.default.password = your_password
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306

#--------------------------------------------------------------------
# APP
#--------------------------------------------------------------------
app.baseURL = 'http://localhost:8080/'
app.indexPage = ''
```

### Крок 4: Створення бази даних

1. Увійдіть в MySQL:

```bash
mysql -u root -p
```

2. Створіть базу даних:

```sql
CREATE DATABASE ci_shop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

### Крок 5: Запуск міграцій

Виконайте міграції для створення таблиць:

```bash
php spark migrate
```

Це створить наступні таблиці:
- `users` - користувачі
- `categories` - категорії товарів
- `products` - товари
- `product_images` - зображення товарів
- `orders` - замовлення
- `order_items` - позиції замовлень
- `cart` - кошик покупок
- `reviews` - відгуки

### Крок 6: Запуск сервера розробки

```bash
php spark serve
```

Додаток буде доступний за адресою: **http://localhost:8080**

### Крок 7: Створення тестових даних (опціонально)

Для створення тестових користувачів та товарів:

```bash
php spark db:seed TestDataSeeder
```

## База даних

### Структура таблиць

#### users
```sql
id INT AUTO_INCREMENT PRIMARY KEY
email VARCHAR(255) UNIQUE
password VARCHAR(255)
first_name VARCHAR(100)
last_name VARCHAR(100)
phone VARCHAR(20)
address TEXT
role ENUM('user', 'admin') DEFAULT 'user'
status ENUM('active', 'blocked') DEFAULT 'active'
created_at DATETIME
updated_at DATETIME
```

#### categories
```sql
id INT AUTO_INCREMENT PRIMARY KEY
name VARCHAR(255)
description TEXT
slug VARCHAR(255) UNIQUE
parent_id INT (FK to categories.id)
status ENUM('active', 'inactive') DEFAULT 'active'
created_at DATETIME
updated_at DATETIME
```

#### products
```sql
id INT AUTO_INCREMENT PRIMARY KEY
name VARCHAR(255)
description TEXT
price DECIMAL(10,2)
quantity INT
category_id INT (FK to categories.id)
status ENUM('active', 'inactive') DEFAULT 'active'
created_at DATETIME
updated_at DATETIME
```

#### orders
```sql
id INT AUTO_INCREMENT PRIMARY KEY
user_id INT (FK to users.id)
total_amount DECIMAL(10,2)
status ENUM('new', 'confirmed', 'processing', 'shipped', 'delivered', 'cancelled')
shipping_method ENUM('pickup', 'courier', 'post')
payment_method ENUM('cash', 'card', 'transfer')
shipping_address TEXT
notes TEXT
created_at DATETIME
updated_at DATETIME
```

### Діаграма зв'язків

- `users` 1:N `orders`
- `users` 1:N `cart`
- `users` 1:N `reviews`
- `categories` 1:N `products`
- `categories` 1:N `categories` (parent-child)
- `products` 1:N `product_images`
- `products` 1:N `order_items`
- `products` 1:N `cart`
- `orders` 1:N `order_items`

## Використання

### Запуск у режимі розробки

```bash
# Запуск сервера
php spark serve

# Запуск на іншому порті
php spark serve --port=8081

# Запуск на конкретному хості
php spark serve --host=192.168.1.100 --port=8080
```

### Доступ до адмін-панелі

1. Створіть адміністратора вручну через БД або зареєструйтесь та змініть роль:

```sql
UPDATE users SET role = 'admin' WHERE email = 'your@email.com';
```

2. Увійдіть в систему з обліковими даними адміністратора
3. Перейдіть до адмін-панелі: http://localhost:8080/admin

### Тестові облікові записи

Якщо ви запустили seeder:

**Адміністратор:**
- Email: admin@example.com
- Password: admin123

**Користувач:**
- Email: user@example.com
- Password: user123

## Розробка

### Створення нової міграції

```bash
php spark make:migration CreateNewTable
```

Редагуйте файл у `app/Database/Migrations/` та виконайте:

```bash
php spark migrate
```

### Відкат міграцій

```bash
# Відкотити останню міграцію
php spark migrate:rollback

# Відкотити всі міграції
php spark migrate:rollback --all

# Відкотити певну кількість
php spark migrate:rollback --batch=2
```

### Створення моделі

```bash
php spark make:model ProductModel
```

### Створення контролера

```bash
php spark make:controller ProductController
```

### Створення фільтра (middleware)

```bash
php spark make:filter AuthFilter
```

### Робота з Query Builder

```php
// SELECT
$products = $this->db->table('products')
    ->where('status', 'active')
    ->orderBy('created_at', 'DESC')
    ->get()
    ->getResultArray();

// INSERT
$this->db->table('products')->insert([
    'name' => 'Product Name',
    'price' => 100.00
]);

// UPDATE
$this->db->table('products')
    ->where('id', 1)
    ->update(['price' => 120.00]);

// DELETE
$this->db->table('products')
    ->where('id', 1)
    ->delete();
```

### Валідація даних

```php
$validation = \Config\Services::validation();

$rules = [
    'email' => 'required|valid_email|is_unique[users.email]',
    'password' => 'required|min_length[8]',
    'first_name' => 'required|alpha_space|max_length[100]'
];

if (!$validation->setRules($rules)->run($data)) {
    $errors = $validation->getErrors();
}
```

## Тестування

### Запуск тестів

```bash
# Всі тести
./vendor/bin/phpunit

# Конкретний тест
./vendor/bin/phpunit --filter testUserRegistration

# З покриттям коду
./vendor/bin/phpunit --coverage-html coverage/
```

### Структура тестів

```
tests/
├── unit/           # Юніт-тести
├── feature/        # Функціональні тести
└── database/       # Тести бази даних
```

## Безпека

### Захист від CSRF

CodeIgniter автоматично захищає форми. Додайте в форми:

```php
<?= csrf_field() ?>
```

### Захист від XSS

Використовуйте функцію `esc()` для виведення даних:

```php
<p><?= esc($user['name']) ?></p>
```

### Валідація вхідних даних

Завжди валідуйте дані перед обробкою:

```php
if (!$this->validate($rules)) {
    return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
}
```

### Безпечні паролі

```php
// Хешування
$hash = password_hash($password, PASSWORD_DEFAULT);

// Перевірка
if (password_verify($inputPassword, $storedHash)) {
    // Пароль вірний
}
```

## Оптимізація

### Кешування

```php
// Збереження в кеш
$cache = \Config\Services::cache();
$cache->save('key', $data, 3600); // 1 година

// Отримання з кешу
$data = $cache->get('key');
```

### Профілювання

Увімкніть Debugbar у `.env`:

```ini
CI_DEBUG = true
```

### Оптимізація запитів

```php
// Використовуйте select для вибору потрібних полів
$products = $this->db->table('products')
    ->select('id, name, price')
    ->get();

// Використовуйте join замість окремих запитів
$orders = $this->db->table('orders')
    ->join('users', 'users.id = orders.user_id')
    ->get();
```

## Troubleshooting

### Помилка: "Call to undefined function CodeIgniter\...\\password_hash()"

Переконайтесь, що PHP має модуль password:

```bash
php -m | grep password
```

### Помилка: "Base table or view not found"

Запустіть міграції:

```bash
php spark migrate
```

### Помилка: "Access denied for user"

Перевірте налаштування БД у файлі `.env`:

```ini
database.default.username = root
database.default.password = your_password
```

### Сторінка не знайдена (404)

Перевірте файл `app/Config/Routes.php` та переконайтесь, що маршрут визначений.

### Сесія не зберігається

Переконайтесь, що директорія `writable/session` існує та має права на запис:

```bash
chmod -R 777 writable/
```

### Не відображаються помилки

Увімкніть режим розробки в `.env`:

```ini
CI_ENVIRONMENT = development
```

## CLI Команди

### Міграції

```bash
php spark migrate                 # Запустити міграції
php spark migrate:rollback        # Відкотити останню міграцію
php spark migrate:refresh         # Відкотити всі та запустити знову
php spark migrate:status          # Статус міграцій
```

### База даних

```bash
php spark db:seed SeederName      # Запустити seeder
php spark db:table tablename      # Показати інформацію про таблицю
```

### Генератори

```bash
php spark make:model ModelName
php spark make:controller ControllerName
php spark make:migration MigrationName
php spark make:seeder SeederName
php spark make:filter FilterName
php spark make:entity EntityName
```

### Очищення

```bash
php spark cache:clear             # Очистити кеш
php spark debugbar:clear          # Очистити debugbar дані
```

## Розгортання (Production)

### Підготовка до продакшну

1. Змініть середовище в `.env`:

```ini
CI_ENVIRONMENT = production
```

2. Вимкніть debug:

```ini
CI_DEBUG = false
```

3. Налаштуйте безпечний `baseURL`:

```ini
app.baseURL = 'https://yourdomain.com/'
```

4. Налаштуйте продакшн БД:

```ini
database.default.hostname = production-db-host
database.default.database = production_db_name
database.default.username = production_user
database.default.password = secure_password
```

5. Увімкніть HTTPS:

```ini
app.forceGlobalSecureRequests = true
```

6. Оптимізуйте Composer:

```bash
composer install --no-dev --optimize-autoloader
```

7. Налаштуйте права доступу:

```bash
chmod -R 755 /path/to/project
chmod -R 777 writable/
```

## Подальший розвиток

Можливі напрямки розширення:

- [ ] Інтеграція платіжних систем (LiqPay, WayForPay)
- [ ] Email-сповіщення для замовлень
- [ ] Відгуки та рейтинги товарів
- [ ] Система знижок та промокодів
- [ ] Експорт замовлень у PDF/Excel
- [ ] Повнотекстовий пошук товарів
- [ ] Інтеграція з Новою Поштою API
- [ ] Багатомовність (i18n)
- [ ] REST API для мобільних додатків
- [ ] Інтеграція з соціальними мережами
- [ ] Push-сповіщення
- [ ] Чат з підтримкою

## Додаткові ресурси

- [CodeIgniter 4 Документація](https://codeigniter.com/user_guide/)
- [CodeIgniter 4 GitHub](https://github.com/codeigniter4/CodeIgniter4)
- [CodeIgniter Forum](https://forum.codeigniter.com/)
- [Bootstrap 5 Документація](https://getbootstrap.com/docs/5.0/)

## Ліцензія

MIT License - проєкт створено в освітніх цілях
