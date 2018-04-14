/* 
 * *****************************************************************************
 * Filename  : login.js
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
function pindah(waktu, pindah){
	var interval = setInterval(function(){
		waktu  = waktu - 1;
		if(waktu==0) {
			clearInterval(interval);
			window.location= pindah;
		}
    	}, 1000);
        }
	function hide(time, konten){
				var tampilkan = setInterval(function(){
		time  = time - 1;
		if(time==0) {
			clearInterval(tampilkan);
			$(konten).fadeOut(500);
		}
    	}, 1000);
        }
        function show(time, konten){
				var tampilkan = setInterval(function(){
		time  = time - 1;
		if(time==0) {
			clearInterval(tampilkan);
			$(konten).fadeIn(500);
		}
    	}, 1000);
        }
	$(document).ready(function(){
            $('.login-alert').hide();
            $('.close').click(function() {
                $('.login-alert').slideUp(700);
            });
		$("#login").submit(function(){
		   var u = $('#username').val();
                   var p = $('#password').val();
            if(u == '' || p == '') {
                $('.login-alert').slideDown(700);
                return false;
            }
			var form_data = {
				username: $("#username").val(),
				password: $("#password").val(),
                                cookie  : $("#cookie").val(),
                                is_ajax : 1
			};
			$.ajax({
				type: "POST",
				url: $(this).attr('action'),
				data: form_data,
				success: function(response)
				{
					if(response == "success") {
						$("#login").fadeOut('slow', function(){
						$("#message").html('<center><p class="success"><img class="loading" src="assets/img/loader2.gif"></p><br /><p class="sukses">LOGIN BERHASIL</p></center>');
                                                $('.sukses').hide();
                                                $('.loading-sukses').hide();
                                                $('.success').hide();
                                                show(1,'.success');
                                                hide(8,'.success');
                                                show(9,'.sukses');
                                                hide(10,'.sukses');
                                                pindah(11,'admin.php')
						});
                                                }
                                                else {
                            $("#login").fadeOut('slow', function(){
                            $("#message").html('<center><p class="error"><img class="loading" src="assets/img/loader2.gif"></p><br /><p class="gagal">Login gagal, username atau password salah.<br />Klik <a href="">disini</a> untuk mencoba kembali. Atau tunggu halaman akan memuat ulang secara otomatis.</p></center>');
                            $('.gagal').hide();
                            $('.error').hide();
                            show(1,'.error');
                            hide(7,'.error');
                            show(8,'.gagal');
                            pindah(18,'')
    	                });
                        }
                }	
                
			});
			return false;
		});
	});


