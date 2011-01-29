<?php
$link = mysql_connect('localhost', 'root', 'saktidc');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
if (!mysql_select_db("bap_imtek")) {
    echo "Unable to select bap_imtek: " . mysql_error();
    exit;
}
mysql_set_charset("utf8");
if(!empty($_REQUEST['kodepes'])){
    $kodepes =$_REQUEST['kodepes'];
    $sql="select * from tblpeserta where kodepes=".$kodepes;
    $result = mysql_query($sql);

    if (!$result) {
        echo "Could not successfully run query ($sql) from DB: " . mysql_error();
        exit;
    }

    if (mysql_num_rows($result) == 0) {
        echo "1";
    }else{
        echo "0";
    }
}

mysql_close($link);
?>
