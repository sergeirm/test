<h3>Студенты</h3>
<p><a href="/student/add">Добавить студента</a></p>
<table border="1">
    <tr>
        <th>Имя</th>
        <th>Email</th>
        <th>Телефон</th>
        <th>Адрес</th>
        <th>&nbsp;</th>
    </tr>
<?php
foreach ($variables['students'] as $student):
?>
<tr>
    <td><?php print $student['name']; ?></td>
    <td><?php print $student['email']; ?></td>
    <td><?php print $student['phone']; ?></td>
    <td><?php print $student['address']; ?></td>
    <td><a href="/student/edit?id=<?php print $student['id']; ?>">редактировать</a></td>
</tr>
<?php
endforeach;
?>