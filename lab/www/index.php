<?php
require 'db.php';
require 'Conference.php';

$conference = new Conference($pdo);
$all = $conference->getAll();
?>

<h2>Список регистраций</h2>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Имя</th>
    <th>Год рождения</th>
    <th>Секция</th>
    <th>Сертификат</th>
    <th>Форма участия</th>
</tr>

<?php foreach($all as $row): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['birthyear'] ?></td>
    <td><?= $row['section_name'] ?></td>
    <td><?= $row['need_certificate'] ? 'Да' : 'Нет' ?></td>
    <td><?= $row['participation_form'] ?></td>
</tr>
<?php endforeach; ?>

</table>

<a href="form.html">Заполнить форму</a>
<br><br>
