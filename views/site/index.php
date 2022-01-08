<?php ?>
<p>Content main page</p>
<?php
    //new db for work with
    global $Config;
    $db = new \core\DB($Config['Database']['Server'],
        $Config['Database']['Username'],
        $Config['Database']['Password'],
        $Config['Database']['Database']);
    $db->select("user", "*",null,[
            'login' => "ASC",
            'email' => "ASC"
    ],10);

    $db->delete("user", ["id"=>8]);
