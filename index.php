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
            var kodepes = $("#kodepes"),
			nama = $("#nama"),
			notelp = $("#notelp"),
			asal=$("#asal"),
			komentar=$("#komentar"),
			allFields = $([]).add(kodepes).add(nama).add(notelp).add(komentar),
			tips = $("#validateTips");
			var tersedia=false;
			
            kodepes.focus();
     		function updateTips(t) {
			    tips.text(t).effect("highlight",{},1500);
    		}
		    function checkLength(o,n,panjang) {
		        if(panjang==0){
		            if(o.val().length==0){
				        o.addClass('ui-state-error');
				        updateTips("Anda harus mengisi " + n + ".");
				        return false;		            
		            }else{
		                return true;
		            }
		        }else if ( o.val().length !=panjang ) {
				    o.addClass('ui-state-error');
				    updateTips("Panjang dari  " + n + " harus "+panjang+" digit.");
				    return false;
			    } else {
				    return true;
			    }
		    }
		    function checkRegexp(o,regexp,n) {
			    if ( !( regexp.test( o.val() ) ) ) {
				    o.addClass('ui-state-error');
				    updateTips(n);
				    return false;
			    } else {
				    return true;
			    }
		    }
		    function cekketersediaan(nilai){
                $.get('cek.php', {'kodepes': nilai}, function(data) {
                    if(data=="0"){
                        kodepes.addClass('ui-state-error');
                        updateTips("No. Tiket " + nilai + " sudah terdaftar, pastikan no. tiket anda benar.");
                        tersedia=false;
                    }else{
                        tersedia=true;
                    }
                });		        
		    }
		    $("#formdaftar").submit(function(){
				var bValid = true;
				allFields.removeClass('ui-state-error');
                updateTips("Semua wajib diisi");
                
				bValid = bValid && checkLength(kodepes,"kode peserta",8);
				bValid = bValid && checkRegexp(kodepes,/^([0-9])+$/i,"Kode Peserta hanya berupa angka.");
				cekketersediaan(kodepes.val());
				bValid = bValid && checkLength(nama,"nama",0);
				bValid = bValid && checkLength(notelp,"No Telepon",0);
				bValid = bValid && checkLength(komentar,"Komentar",0);
				bValid = bValid && tersedia;
		        if(bValid){
		            //alert('oke tervalidasi');
		            $('#dialog').dialog('open');
		        }
		        //alert($(this).serialize());
		        return false;
		    });
     		kodepes.blur(function(){
     		    allFields.removeClass('ui-state-error');
     		    var valid=true;
				valid = valid && checkLength(kodepes,"kode peserta",8);
				valid = valid && checkRegexp(kodepes,/^([0-9])+$/i,"Kode Peserta hanya berupa angka.");     		    
				cekketersediaan($(this).val());
				valid = valid && tersedia;
     		    if(valid){
     		        updateTips("Oke no. tiket anda belum terdaftar");
     		    }else{
     		        //alert('asfadadf');
     		        kodepes.focus();
     		        //return false;
     		    }
     		});          
            $('<img src="images/loading.gif" class="smalic" />').insertAfter('#kodepes')
            .ajaxStart(function() {
                $(this).show();
            }).ajaxStop(function() {
                $(this).hide();
            });     
		    $("#dialog").dialog({
			    bgiframe: true,
			    autoOpen: false,
			    resizable: false,
			    height:140,
			    modal: true,
			    overlay: {
				    backgroundColor: '#000',
				    opacity: 0.5
			    },
			    buttons: {
				    Ya: function() {
                        $.post('save.php', $("#formdaftar").serialize(), function(data) {
                           kodepes.attr({value:''});
                           nama.attr({value:''});
                           notelp.attr({value:''});
                           komentar.attr({value:''});
                           if(data=="ok"){
                               $("#badan").hide('fast');
                               $("#berhasil").show('slow');
                               setTimeout(function(){
                                     $("#berhasil").hide('fast');
                                     $("#badan").show('slow');
                               },3000);
                           }else{
                               $("#badan").hide('fast');
                               $("#gagal").show('slow');
                               setTimeout(function(){
                                     $("#gagal").hide('fast');
                                     $("#badan").show('slow');
                               },3000);                           
                           }
                           $("#dialog").dialog('close');                            
                        });				        
				    },
				    Tidak: function() {
					    $(this).dialog('close');
				    }
			    }
		    });
            		          
	    });   	     
    </script>
  </head>
  <body>
  <div id="dialog" title="Konfirmasi?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Apakah anda yakin data yang dimasukkan sudah benar?</p>
  </div>  
  <div id="wrapper">
        <div id="header">Telkom Smiling Together</div>
        <div id="berhasil">
            <h1>Oke</h1>
            Anda sudah terdaftar.
        </div>
        <div id="gagal">
            <h1>Maaf</h1>
            Operasi gagal, mohon diulangi.
        </div>        
        <div id="badan">
            <span id="validateTips">Semua wajib diisi</span><br/><br/>
            <form id="formdaftar">
                <label for="kodepes">
                  No. Tiket :
                </label>           
                <input type="text" name="kodepes" id="kodepes" class="text ui-widget-content ui-corner-all" size="8" maxlength="8" />
                <label for="nama">
                  Nama :
                </label>           
                <input type="text" name="nama" id="nama" class="text ui-widget-content ui-corner-all" size="35" />    
                <label for="notelp">
                  No. Telepon/HP :
                </label>           
                <input type="text" name="notelp" id="notelp" class="text ui-widget-content ui-corner-all" size="14" />                              
                <label for="asal">
                  Asal Sekolah :
                </label>           
                <select name="asal" id="asal">
                    <option value="1">terserah</option>
                    <option value="2">.....dfdf.</option>
                <?php
                //generate sekolah otomatis dari database
                $sql='select * from tblsekolah';
                $result = mysql_query($sql);
                while ($row = mysql_fetch_assoc($result)) {
                    echo '<option value="'.$row["kodesek"].'">'.$row["nama"].'</option>';
                }
                ?>
                </select>
                <label for="komentar">
                  Komentar anda :
                </label>                       
                <textarea name="komentar" id="komentar" class="text ui-widget-content ui-corner-all"></textarea> 
                <input type="submit" name="ok" id="ok" value="Ok »"/>
            </form>
        </div>
        <div id="footer">Ikatan Mahasiswa Telkom Kebumen&copy;2010</div>
  </div>
  </body>
</html>
<?php
mysql_close($link);
?>
