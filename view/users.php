<div class="responsive">
    <div id="tableResp">
        <table id="user_table">
            <th colspan="5" style="text-align: center">Users</th>
            <tr>
                <td>Id</td>
                <td>Numele</td>
                <td>Prenumele</td>
                <td>Varsta</td>
                <td></td>
            </tr>
            <?php
            foreach ($users as $id => $user):
                ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $user['fName'] ?></td>
                    <td><?= $user['lName'] ?></td>
                    <td><?= $user['age'] ?></td>
                    <td>
                        <button type="button" class="delete_user" data-id="<?= $id ?>">Delete</button>
                    </td>
                </tr>

            <?php endforeach; ?>

        </table>
    </div>
</div>