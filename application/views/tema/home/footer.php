<!--  FOOTER START  -->
		<footer class="footer_area">
			<div class="container">
				<div class="row">				
					<div class="col-md-12 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Kontak Kami</h4>
							<ul>
								<li><?php echo $profil['profil_alamat']; ?></li>
								<li><?php echo $profil['profil_telp']; ?></li>
								<li><?php echo $profil['profil_email']; ?></li>
							</ul>
						</div>
					</div> <!--  End Col -->
					
					<!-- <div class="col-md-3 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Information</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
							</ul>
						</div>
					</div>  -->
					
					<!-- <div class="col-md-3 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Services</h4>
							<ul>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Site Map</a></li>
								<li><a href="<?php echo base_url(); ?>user/wishlist">Wish List</a></li>
								<li><a href="<?php echo base_url(); ?>account">My Account</a></li>
								<li><a href="<?php echo base_url(); ?>user/transaksi">Order History</a></li>
							</ul>
						</div>
					</div> 
					
					<div class="col-md-3 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Newsletter</h4>
							<div class="newsletter_form">
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have </p>
								<form method="post" class="form-inline">				
									<input name="EMAIL" id="email" placeholder="Enter Your Email" class="form-control" type="email">
									<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div>
					</div> -->
					
				</div>
			</div>
	<?php
$whatsapp = $profil['profil_wa'];
$nowa = substr($whatsapp, 1);
?>
		
			<div class="ftr_btm_area">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<div class="ftr_social_icon">
								<ul>
									<li><a href="https://facebook.com/<?php echo $profil['profil_fb']; ?>"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://instagram.com/<?php echo $profil['profil_ig']; ?>"><i class="fa fa-instagram"></i></a></li>
									<li><a href="https://wa.me/62<?php echo $nowa; ?>"><i class="fa fa-whatsapp"></i></a></li>
									<li><a href="https://twitter.com/<?php echo $profil['profil_tw']; ?>"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-5">
							<p class="copyright_text text-center">Fajar Konveksi</p>
						</div>
						
						<div class="col-sm-4">
							<!-- <div class="payment_mthd_icon text-right">
								<ul>
									<li><i class="fa fa-cc-paypal"></i></li>
									<li><i class="fa fa-cc-visa"></i></li>
									<li><i class="fa fa-cc-discover"></i></li>
									<li><i class="fa fa-cc-mastercard"></i></li>
									<li><i class="fa fa-cc-amex"></i></li>
								</ul>
							</div> -->
						</div>
					</div>
				</div>
			</div>
      <form id="payment-form" method="post" action="<?php echo base_url(); ?>send">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="result_type" id="result-type" value=""></div>
        <input type="hidden" name="result_data" id="result-data" value=""></div>
      </form>
		</footer>
		<!--  FOOTER END  -->

		<!-- <script src="<?php echo base_url(); ?>assets_home/js/jquery.min.js"></script> -->
    <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      url: '<?php echo base_url(); ?>token',
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>

		<!-- <script src="<?php echo base_url(); ?>assets_home/js/vendor/jquery-1.12.4.min.js"></script> -->
		<script src="<?php echo base_url(); ?>assets_home/js/materialize.min.js"></script>
		<script src="<?php echo base_url(); ?>assets_home/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets_home/js/jquery.meanmenu.min.js"></script>
		<script src="<?php echo base_url(); ?>assets_home/js/jquery.mixitup.js"></script>
		<script src="<?php echo base_url(); ?>assets_home/js/jquery.counterup.min.js"></script>
		<script src="<?php echo base_url(); ?>assets_home/js/waypoints.min.js"></script>
		<script src="<?php echo base_url(); ?>assets_home/js/wow.min.js"></script>
		<script src="<?php echo base_url(); ?>assets_home/js/venobox.min.js"></script>
		<script src="<?php echo base_url(); ?>assets_home/js/owl.carousel.min.js"></script>
		<script src="<?php echo base_url(); ?>assets_home/js/simplePlayer.js"></script>
		<script src="<?php echo base_url(); ?>assets_home/js/main.js"></script>
		<script src="<?php echo base_url(); ?>assets_home/js/sweetalert2.all.min.js"></script>
		<script>
    const flashData = $('.flash-data').data('flashdata');
      // console.log(flashData);
      if(flashData) {
        Swal.fire({
          position: 'top-end',
          title: 'Berhasil !',
          text: '' + flashData,
          icon: 'success',
          showConfirmButton: false,
          timer: 3500
        });
      }
  </script>
  <script>
    const flashDataError = $('.flash-data-error').data('flashdata');
      // console.log(flashData);
      if(flashDataError) {
        Swal.fire({
          position: 'top-end',
          title: 'Gagal !',
          text: '' + flashDataError,
          icon: 'error',
          showConfirmButton: false,
          timer: 3500
        });
      }
  </script>
  <script>
    $('.bdel').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          });
        swalWithBootstrapButtons.fire({
          position: 'top-end',
          title: 'Yakin data ini akan dihapus?',
          text: "Data tidak akan bisa dikembalikan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonText: 'Batal',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            document.location.href = href;
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Dibatalkan',
              '',
              'error'
            )
          }
        });
      });
  </script>
  <script>
    $('.bconfir').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          });
        swalWithBootstrapButtons.fire({
          position: 'top-end',
          title: 'INFO',
          text: "Dengan mengklik tombol 'Ya', notifikasi tagihan SPP akan masuk ke ruang orang tua/wali.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Ya !',
          cancelButtonText: 'Batal',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            document.location.href = href;
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Dibatalkan',
              '',
              'error'
            )
          }
        });
      });
  </script>
  <script>
  	function goBack() {
      window.history.back();
    }
  </script>
  <script type="text/javascript">
         $(".button-collapse").sideNav();
         $(".modal").modal();

         $(document).ready(function() {
         <?php //if($this->uri->segment(1) == 'checkout' || $this->uri->segment(1) == 'Checkout') { ?>

               $('#prov').change(function() {
                  var prov = $('#prov').val();
                  var province = prov.split(',');

                  $.ajax({
                     url: "<?php echo base_url(); ?>home/city",
                     method: "POST",
                     data: { prov : province[0] },
                     success: function(obj) {
                        $('#kota').html(obj);
                     }
                  });
               });

               $('#kota').change(function() {
                  var kota = $('#kota').val();
                  var dest = kota.split(',');
                  var kurir = $('#kurir').val()

                  $.ajax({
                     url: "<?php echo base_url(); ?>home/getcost",
                     method: "POST",
                     data: { dest : dest[0], kurir : kurir },
                     success: function(obj) {
                        $('#layanan').html(obj);
                     }
                  });
               });

               $('#kurir').change(function() {
                  var kota = $('#kota').val();
                  var dest = kota.split(',');
                  var kurir = $('#kurir').val()

                  $.ajax({
                     url: "<?php echo base_url(); ?>home/getcost",
                     method: "POST",
                     data: { dest : dest[0], kurir : kurir },
                     success: function(obj) {
                        $('#layanan').html(obj);
                     }
                  });
               });

               $('#layanan').change(function() {
                  var layanan = $('#layanan').val();

                  $.ajax({
                     url: "<?php echo base_url(); ?>home/cost",
                     method: "POST",
                     data: { layanan : layanan },
                     success: function(obj) {
                        var hasil = obj.split(",");

                        $('#ongkir').val(hasil[0]);
                        $('#total').val(hasil[1]);
                     }
                  });
               });

         <?php //} ?>
            $(window).scroll(function(){
               if ($(this).scrollTop() > 100) {
                  $('.back-top').fadeIn();
               } else {
                  $('.back-top').fadeOut();
               }
            });
            $('.back-top').click(function(){
               $("html, body").animate({ scrollTop: 0 }, 600);
               return false;
            });
         });
      </script>
		<!-- Google Map APi
		============================================ -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwIQh7LGryQdDDi-A603lR8NqiF3R_ycA"></script>
		<script>
		
			function initialize() {
			  var mapOptions = {
				zoom: 15,
				
				scrollwheel: false,
				center: new google.maps.LatLng(-7.3929748, 109.3480009),
				
			  };
			  var map = new google.maps.Map(document.getElementById('contact_map_area'),
				  mapOptions);
			  var marker = new google.maps.Marker({
				position: map.getCenter(),
				icon: '<?php echo base_url(); ?>assets_home/img/map_pin.png',
				map: map,
				
			  });
	  
			}
			google.maps.event.addDomListener(window, 'load', initialize);			
		</script>			
	</body>
</html>