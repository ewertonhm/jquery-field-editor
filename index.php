<?php
    require_once 'classes/DB.php';
    $db = DB::get_instance();
    $contacts = $db->find('contacts',[
        'order' => 'lname, fname'
    ]);
    
    require_once 'layout/header.php';
?>

        <h1 class="text-center oneClickEdit" data-id="6" data-field="title" data-input="input">Cadastrados</h1><hr>
        <div class="col-md-8 col-md-offset-2">
            <p id="message" class="bg-info info text-center">&nbsp;</p>
            <table class="table table-bordered table-striped">
                <thead>
                    <th>ID</th><th>First Name</th><th>Last Name</th><th>email</th><th>Cell</th><th>Home</th>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><p><?=$contact->id?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$contact->id?>" data-field="fname" data-input="input"><?=$contact->fname?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$contact->id?>" data-field="lname" data-input="input"><?=$contact->lname?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$contact->id?>" data-field="email" data-input="input"><?=$contact->email?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$contact->id?>" data-field="cell_phone" data-input="input"><?=$contact->cell_phone?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$contact->id?>" data-field="home_phone" data-input="input"><?=$contact->home_phone?></p></td>
                        </tr>
                    <?php endforeach; ?>   
                </tbody>
            </table>
        </div>
        <p id="message"></p>
            <script>
            function oneClickSuccess(resp){
                var r = JSON.parse(resp);
                if(r.success){
                    alertMessage("I have updated your contact, sir!");
                }else{
                    alertMessage("oops... something has gone wrong.");
                }
            }    
                
            function alertMessage(msg){
                clearTimeout(window.timer);
                $('#message').html(msg);
                window.timer = setTimeout(function(){$('#message').html('&nbsp;');randomMessage();},5000);
                
            }
            
            function randomMessage(){
                var msgs = ['Hello','Welcome Back!','I missed you','Do you need to update a contact?','I\'m lonely...','My Name is Robert Paulson','They all float down here...',
                '\"Our great depression is our lives\"','Please talk to me...','Hey! Listem!','Get your stinking paws off me, you dammed durt ape!','You have my axe!','Chewie, we\'re home',
                'They call it a Royale with cheese','They\'re here!','My precious'];
            var msg = msgs[Math.floor(Math.random()*msgs.length)];
            alertMessage(msg);
            }
            
            $('.oneClickEdit').oneClickEdit({url : 'parser.php'},oneClickSuccess);
            
            
            $('document').ready(function(){
                randomMessage();
            });
            </script>
<?php require_once 'layout/footer.php'; ?>
