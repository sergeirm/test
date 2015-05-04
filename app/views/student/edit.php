<?php if ($variables['action'] == 'edit'): ?>
<h3>Редактировать студента</h3>
<form action="/student/edit?id=<?php print $variables['student']['id']; ?>" method="post">
<?php else: ?>
<h3>Добавить студента</h3>
<form action="/student/add" method="post">
<?php endif; ?>
    <table>
        <tr>
            <th>Имя</th>
            <td><input type="text" name="name" value="<?php if (isset($variables['student']['name'])) print $variables['student']['name']; ?>"></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="text" name="email" value="<?php if (isset($variables['student']['email'])) print $variables['student']['email']; ?>"></td>
        </tr>
        <tr>
            <th>Телефон</th>
            <td><input type="text" name="phone" value="<?php if (isset($variables['student']['phone'])) print $variables['student']['phone']; ?>"></td>
        </tr>
        <tr>
            <th>Адрес</th>
            <td><input type="text" name="address" value="<?php if (isset($variables['student']['address'])) print $variables['student']['address']; ?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Сохранить">
                <input type="button" name="cancel" value="Отмена" onclick="history.back()">
            </td>
            
        </tr>
    </table>
</form>