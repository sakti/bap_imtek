<?php
$link = mysql_connect('localhost', 'root', 'saktidc');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
if (!mysql_select_db("bap_imtek")) {
    echo "Unable to select bap_imtek: " . mysql_error();
    exit;
}
if(isset($_POST['kodepes'])&&isset($_POST['nama'])){
    $kodepes =mysql_real_escape_string($_POST['kodepes']);
    $nama=mysql_real_escape_string($_POST['nama']);
    $asal=mysql_real_escape_string($_POST['asal']);
    $notelp=mysql_real_escape_string($_POST['notelp']);
    $komentar=mysql_real_escape_string($_POST['komentar']);
    $sql="insert into tblpeserta values($kodepes,'$nama',$asal,'$notelp','$komentar')";
    $result = mysql_query($sql);

    if (!$result) {
        echo "Could not successfully run query ($sql) from DB: " . mysql_error();
        exit;
    }else{
        echo "ok";
    }
}
mysql_close($link);
?>
