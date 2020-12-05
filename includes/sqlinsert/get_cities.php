<?php

include "../load.php";
$query = $db->query("select * from city where state_id=$_GET[stateE] and status = 'ACTIVE'");
$states = array();
while ($r = $query->fetch_object()) {
    $states[] = $r;
}
if (count($states) > 0) {
    print "<option value=''>-- SELECCIONE --</option>";
    foreach ($states as $s) {
        print "<option value='$s->name_city'>$s->name_city</option>";
    }
} else {
    print "<option value=''>-- NO HAY DATOS --</option>";
}
?>