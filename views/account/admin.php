<table class="table">
    <tr class="table__row">
        <th class="title table__title">
            Логін
        </th>
        <th class="title table__title">
            Пошта
        </th>
        <th class="title table__title">
            Роль
        </th>
        <th class="title table__title">
            Зміни
        </th>
    </tr>
    <? foreach ($users as $user) : ?>
        <tr class="table__row">
            <td class="table__cell">
                <?= $user['login'] ?>
            </td>
            <td class="table__cell">
                <?= $user['email'] ?>
            </td>
            <td class="table__cell">
                <?= $user['role_id'] ?>
            </td>
            <td class="table__cell">
                <a class="link change btn table__btn" href="/account/edit?id=<?= $user['id'] ?>"> Змінити</a>
            </td>
        </tr>
    <? endforeach; ?>
</table>