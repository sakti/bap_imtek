<?php
$link = mysql_connect('localhost', 'root', 'saktidc');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
if (!mysql_select_db("bap_imtek")) {
    echo "Unable to select bap_imtek: " . mysql_error();
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="id" lang="id">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Daftar Hadir :: IMTEK</title>
	<link type="text/css" href="jquery-ui-1.7.2.css" rel="stylesheet" />    
    <link rel="stylesheet" href="gaya.css" type="text/css" media="screen" />
    <script src="jquery-1.3.2.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.js"></script>
	<script type="text/javascript" src="external/bgiframe/jquery.bgiframe.js"></script>    
    <script type="text/javascript">
    	$(function() {
            $('tr:odd').addClass('alt');
	    });   	     
    </script>
  </head>
  <body>
  <div id="wrapper">
        <div id="header">Daftar Peserta</div>
        <div id="badan">
            <table id="lihat">
                <tr><th>No. Tiket</th><th>Nama</th><th>Asal</th><th>No. Telp</th><th>Komentar</th></tr>
            <?php
                $sql='SELECT kodepes,a.nama,notelp,komentar,b.nama sekolah from tblpeserta a,tblsekolah b where a.kodesek=b.kodesek order by sekolah';
                $result = mysql_query($sql);
                while ($row = mysql_fetch_assoc($result)) {
                    echo '<tr><td>'.$row['kodepes'].'</td><td>'.htmlentities($row['nama']).'</td><td>'.$row['sekolah'].'</td><td>'.htmlentities($row['notelp']).'</td><td>'.htmlentities($row['komentar']).'</td></tr>';
                }        
            ?>
            </table>
            <hr/>
            <?php
                $sql='SELECT a.nama,b.kodepes,count(*) jml FROM tblsekolah a left join tblpeserta b on a.kodesek=b.kodesek group by a.nama';
                $result = mysql_query($sql);
                $i=0;
                $total=0;
                while ($row = mysql_fetch_assoc($result)) {
                    if(empty($row['kodepes'])){
                        $jml=0;
                    }else{
                        $jml=$row['jml'];
                    }
                    if(($i%2)==1){
                        echo '<div id="listsek">'.$row['nama'].' : '.$jml.'</div>';
                    }else{
                        echo '<div id="listsek" style="float:left">'.$row['nama'].' : '.$jml.'</div>';
                    }
                    $total+=$jml;
                    $i++;
                }  
                                 
            ?>
            <div id="bersih">
            <?php
                echo '<p>Total peserta yang hadir :'.$total.'</p>'; 
            ?>
            </div>
        </div>
        <div id="footer">Ikatan Mahasiswa Telkom Kebumen&copy;2010</div>
  </div>
  </body>
</html>
<?php
mysql_close($link);
?>
