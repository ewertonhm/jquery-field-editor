<?php
    require_once 'classes/DB.php';
    $db = DB::get_instance();
    $contacts = $db->find('contacts',[
        'order' => 'lname, fname'
    ]);
    require_once 'layout/header.php';
?>

        <h1 class="text-center oneClickEdit" data-id="6" data-field="title" data-input="input">My Contacts</h1><hr>
        <div class="col-md-8 col-md-offset-2">
            <p id="message" class="bg-info info text-center">&nbsp;</p>
            <table class="table table-bordered table-striped">
                <thead>
                    <th>ID</th><th>First Name</th><th>Last Name</th><th>email</th><th>Cell</th><th>Home</th>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?=$contact->id?></td>
                            <td><?=$contact->fname?></td>
                            <td><?=$contact->lname?></td>
                            <td><?=$contact->email?></td>
                            <td><?=$contact->cell_phone?></td>
                            <td><?=$contact->home_phone?></td>
                        </tr>
                    <?php endforeach; ?>   
                </tbody>
            </table>
        </div>
<?php require_once 'layout/footer.pHp'; ?>
