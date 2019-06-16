<?php
function build_table($array){
    // start table
    $html = "<table class='table'>\n";
    // header row
    $html .= "\t\t<tr>\n";
    foreach($array[0] as $key=>$value){
        $html .= "\t\t<th>" . htmlspecialchars($key) . "</th>\n";
    }
    $html .= "\t</tr>\n";

    // data rows
    foreach( $array as $key=>$value){
        $html .= "\t<tr>\n";
        foreach($value as $key2=>$value2){
            $html .= "\t\t<td>\n\t\t\t" . htmlspecialchars($value2) . "\n\t\t</td>\n";
        }
        $html .= "\t</tr>\n";
    }

    // finish table and return it

    $html .= "</table>";
    return $html;
}



?>
<div>
    <p>Username : <?php echo $data['username']?></p>
    <p>Nice Username : <?php echo $data['nice_user_name']?></p>
    <p>Email : <?php echo $data['email'] ?></p>
</div>

<a class="btn btn-primary" href="<?php echo base_url("account/logout")?>">LOGOUT</a>

<div class="table_users">
    <p>TABLE USERS</p>
    <?php

    echo build_table($table_users);

    ?>


</div>


<div class="table_users_log">
    <p>TABLE USERS LOG</p>
    <?php

    echo build_table($table_users_log);

    ?>



</div>
