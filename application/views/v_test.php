<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	.container {
		margin: 10px;
		padding: 20px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>

	<script
	  src="https://code.jquery.com/jquery-2.2.4.min.js"
	  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
	  crossorigin="anonymous">
	</script>

</head>
<body>

<div class="container">
	<div class="wrapper">
		<form class="billing-form" onsubmit="formProcessSynth('<?php echo $token; ?>', '<?php echo site_url(); ?>'); return false">
			<div id="txt_content">
				Bisnis.com, BANDUNG - Pemerintah China menyetujui pabrikan otomotif Tesla Inc. untuk mulai berproduksi di negaranya. Hal ini ditandai dengan 
				terbitnya izin dari Kementerian Perindustrian dan Teknologi Informasi.

				Kepala Automotive Foresight Yale Zhang menuturkan izin ini merupakan lampu hijau bagi perusahaan untuk memulai produksi di China.
				"Tesla dapat memulai produksi kapan saja," ujar Zhang.Terkait dengan izin tersebut, Tesla belum memberikan respon. Pabrik perusahaan senilai US$2 
				miliar tengah dibanngun di wilayah timur Shanghai. Pabrik ini menjadi pabrik pertama perusahaan di luar negeri.
				
				Berdasarkan berita Reuters, Tesla mengungkapkan akan memulai produksi di China pada awal bulan ini. Namun, perusahaan belum memastikan target akhir 
				tahunnya karena adanya ketidakpastian pesanan, tenaga kerja dan pemasok. Tesla berencana memproduksi setidaknya 1.000 Model 3s per minggu dari
				pabriknya di Shanghai hingga akhir tahun ini karena perusahaan bermaksud untuk mengenjot penjualannya di China dan menghindari tingginya tarif impor 
				yang dikenakan China terhadap mobil produksi AS.

				Pabrik Tesla ini juga merupakan pabrik mobil asing pertama di China dan sekaligus menandai keterbukaan pasar China terhadap mobil asing. Otoritas 
				Shanghai sendiri telah menawarkan bantuan kepada Tesla untuk mempercepat pembangunan pabriknya. Sejauh ini, China memberikan insentif pembebasan 
				pajak 10 persen dari pembelian mobil Tesla.
			</div>
			<br><br>
			<div id="load_content" style="margin-bottom: 30px;"></div>
			<button id="submit_synth" style="padding: 5px 10px;">Submit Synth</button>
		</form>
	</div>	
</div>

</body>
</html>


<script>
	const formProcessSynth = (token, uri) => {

		let txt_content		 = document.getElementById('txt_content');
		let submit_synth     = document.getElementById('submit_synth');

		submit_synth.disabled = true;
    	submit_synth.value = 'Loading...';

    	let datas = {"text":txt_content.innerText, "compose":false};

		// console.log(txt_content.innerText+'\n'+token+'\n'+uri);

		$.ajax({
	         url: 'http://www.tts.bahasakita.co.id/api/beta/synth',
	         headers: {
		        'x-access-token':token
		     },
	         type: 'post',
	         contentType: 'application/json',
	         dataType: 'json',
	         crossDomain: true,
	         data: JSON.stringify(datas),
	         success: function(data){
	            // console.log(data);
	            if(data.total == 0){
	            	alert('Tidak ada content');
	            	document.location = uri;
				}else{
				 	submit_synth.disabled = false;
	        		submit_synth.value = 'Submit Synth';

	        		for(let i=0; i < data.list.length; i++){
	        			document.getElementById('load_content').innerHTML += '<a href="'+data.list[i]['path']+'" target="_blank">Kalimat '+i+'</a><br>'; 
	        			// console.log(data.list[i]['path']);
	        		}
				}
	         },
	         error: function(xhr, exception){
	         	if( xhr.status === 0)
		            alert('Error : ' + xhr.status + 'You are not connected.');
		        else if( xhr.status == "201")
		            alert('Error : ' + xhr.status + '\nServer error.');
		        else if( xhr.status == "404")
		            alert('Error : ' + xhr.status + '\nPage note found');
		        else if( xhr.status == "500")
		             alert('Internal Server Error [500].');
		        else if (exception === 'parsererror') 
		            alert('Error : ' + xhr.status + '\nImpossible to parse result.');
		        else if (exception === 'timeout')
		            alert('Error : ' + xhr.status + '\nRequest timeout.');
		        else if( xhr.status == "401")
		            alert('Error : ' + xhr.status + '\nToken is not valid, create form postman, and placing in controller/test.php');
		        	/* 
		        	Bisa ditambahkan controller update token (jika mau menggunakan dynamic token) 
		        	document.location = uri + controller;
		        	*/
		        else
		            alert('Error .\n' + xhr.responseText);
	         }
	    });
	    
	    return true;
	}
</script>