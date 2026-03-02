<?php session_start();
require_once 'UserInfo.php';
?>

<?php if(isset($_SESSION['errors'])): ?>
    <ul style="color:red;">
        <?php foreach($_SESSION['errors'] as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>


<?php if(isset($_SESSION['formData'])): ?>
    <p>Данные из сессии:</p>
    <ul>
        <li>Имя: <?= $_SESSION['formData']['name'] ?></li>
        <li>Год рождения: <?= $_SESSION['formData']['birthyear'] ?></li>
        <li>Секция: <?= $_SESSION['formData']['section'] ?></li>
        <li>Сертификат: <?= $_SESSION['formData']['certificate'] ?></li>
        <li>Форма участия: <?= $_SESSION['formData']['participation'] ?></li>
    </ul>
<?php else: ?>
    <p>Данных пока нет.</p>
<?php endif; ?>

<?php
if (isset($_SESSION['api_data'])) {
    echo "<h3>Данные из API (страны):</h3>";
    echo "<ol>";
    foreach ($_SESSION['api_data'] as $country) {
        $name = $country['name']['common'] ?? '—';
        $capital = $country['capital'][0] ?? '—';
        $region = $country['region'] ?? '—';
        echo "<li>$name. Столица: $capital. Регион: $region.</li>";
    }
    echo "</ol>";
}
?>

<h3>Информация о пользователе:</h3>
<?php
$info = UserInfo::getInfo();
foreach ($info as $key => $val) {
    echo htmlspecialchars($key) . ': ' . htmlspecialchars($val) . '<br>';
}
?>

<?php
if (isset($_COOKIE['last_submission'])) {
    echo "Последняя отправка формы: " . $_COOKIE['last_submission'];
}
?>

<a href="form.html">Заполнить форму</a> |
<a href="view.php">Посмотреть все данные</a>
