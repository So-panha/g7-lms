<!-- header -->
<div class="col-xl-9 col-lg-8  col-md-12 main-board" style="font-family: 'Times New Roman', Times, serif;">
    <div class="title-team grow">Team <?= $manager['position_name'] ?></div>
    <div class="board-table grow">
        <table class="table">
            <thead style="background-color: #BEB9FF;">
                <tr>
                    <th scope="col">Profile</th>
                    <th scope="col">User name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Position</th>
                </tr>
            </thead>
            <tbody class="tbody">
                <tr> <!-- manager -->
                    <td scope="row"><img class="img-team" src="/assets/images/profiles/<?= $manager['picture'] ?>" ></td>
                    <td><?= $manager['fname'] . ' ' . $manager['lname'] ?></td>
                    <td><?= $manager['role'] ?></td>
                    <td><?= $manager['position_name'] ?></td>
                </tr> 
                <?php foreach ($groupMembers as $member) : ?> <!-- employees -->
                    <tr>
                        <td scope="row"><img class="img-team" src="/assets/images/profiles/<?= $member['picture'] ?>"></td>
                        <td><?= $member['fname'] . ' ' . $member['lname'] ?></td>
                        <td><?= $member['role'] ?></td>
                        <td><?= $member['position_name'] ?></td>
                    </tr> <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>