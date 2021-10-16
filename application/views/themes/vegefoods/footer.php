<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
  <div class="container py-4">

  </div>
</section>
<footer class="ftco-footer ftco-section">
  <div class="container">
    <div class="row">
      <div class="mouse">
        <a href="#" class="mouse-icon">
          <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
        </a>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-md"> 
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2"><?php echo get_store_name(); ?></h2>
          <p><?php echo get_settings('store_description'); ?></p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4 ml-md-5">
          <h2 class="ftco-heading-2">Menu</h2>
          <ul class="list-unstyled">
            <li><a href="<?php echo site_url('pages/about'); ?>" class="py-2 d-block">Tentang Kami</a></li>
            <li><a href="<?php echo site_url('pages/contact'); ?>" class="py-2 d-block">Hubungi Kami</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Bantuan</h2>
          <div class="d-flex">
            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
              <li><a href="<?php echo site_url('shop/cart'); ?>" class="py-2 d-block">Keranjang Belanja</a></li>
              <li><a href="<?php echo site_url('customer/payments/confirm'); ?>" class="py-2 d-block">Konfirmasi Pembayaran</a></li>
              <li><a href="<?php echo site_url('shop/testimonial'); ?>" class="py-2 d-block">Testimoni Pelanggan</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Punya Pertanyaan?</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon icon-map-marker"></span><span class="text"><?php echo get_settings('store_address'); ?></span></li>
              <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?php echo get_settings('store_phone_number'); ?></span></a></li>
              <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?php echo get_settings('store_email'); ?></span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">

        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script> All rights reserved | Made with <i class="icon-heart text-danger" aria-hidden="true"></i> for every people.
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>
  </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
  </svg></div>
    
<script src="<?php echo get_theme_uri('js/popper.min.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/jquery.easing.1.3.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/jquery.waypoints.min.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/jquery.stellar.min.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/aos.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/jquery.animateNumber.min.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/bootstrap-datepicker.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/scrollax.min.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js'); ?>"></script>

<script>
  var base_url = "<?= base_url() ?>";

  function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
      ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
  }

  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  $.ajax({
    method: 'GET',
    url: '<?php echo site_url('shop/cart_api?action=cart_info'); ?>',
    success: function(res) {
      var data = res.data;

      var total_item = data.total_item;
      $('.cart-item-total').text(total_item);
    }
  });

  $('.add-cart').click(function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    var sku = $(this).data('sku');
    var qty = $(this).data('qty');
    qty = (qty > 0) ? qty : 1;
    var price = $(this).data('price');
    var name = $(this).data('name');

    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('shop/cart_api?action=add_item'); ?>',
      data: {
        id: id,
        sku: sku,
        qty: qty,
        price: price,
        name: name
      },
      success: function(res) {
        if (res.code == 200) {
          var totalItem = res.total_item;

          $('.cart-item-total').text(totalItem);
          toastr.info('Item ditambahkan dalam keranjang');
        } else {
          console.log('Terjadi kesalahan');
        }
      }
    });
  });

  $(document).ready(function() {
    $('#origin').select2();
    $('#destination').select2();
    $('#kurir').select2();
  });

  // cek ongkir
  $("#btnCekOngkir").click(function() {
    const kurir = $("[name='kurir']").val();
    const destination = $("[name='destination']").val();
    const origin = $("[name='origin']").val();
    const weight = $("[name='weight']").val();
    const subtotal = $("[name='subtotal']").val();
    const data = {
      courier: kurir,
      origin,
      destination,
      weight
    };

    $.ajax({
      url: "<?= site_url('Shop/get_ongkir_api') ?>",
      method: 'POST',
      data: data,
      dataType: 'JSON',
      success: function(data, txtStatus, xhr) {
        if (data.valid) {
          const totalPrice = parseInt(subtotal) + parseInt(data.body.ongkir);
          $("[name='price_delivery']").val(data.body.ongkir);
          $("[name='estimasi_delivery']").val(data.body.estimate);
          $("[name='total_price']").val(totalPrice);
          $("#estimasi").text(data.body.estimate);
          $("#p_ongkir").text((data.body.ongkir));
          $("#ongkir").text((data.body.ongkir));
          $("#p_total").text(totalPrice);
          $("#r_total").text(totalPrice);
        } else {
          alert(data.message);
        }
      }
    });
  });

  // compare
  $("[name='c_product_1']").change(function(e) {
    const id = $(this).find('option:selected').val();
    $.getJSON(base_url + 'index.php/Home/get_product_by_id_json?id=' + id, function(x) {
      console.log(x);
      let htmlParse = 
      `<div class="col">
            <div class="row">
                <div class="col">
                    <h3>${x.name}</h3>
                    <img src="http://localhost/penjualan/assets/uploads/products/${x.picture_name}" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table>
                        <tr>
                            <th>Harga</th>
                            <td>${x.price}</td>
                        </tr>
                        <tr>
                            <th>Rating</th>
                            <td>${x.picture_name}</td>
                        </tr>
                        <tr>
                            <th>Terjual</th>
                            <td>${x.is_available}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>${x.description}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>`;
        $("#result_c_1").empty().html(htmlParse);
    })
  });

  $("[name='c_product_2']").change(function(e) {
    const id = $(this).find('option:selected').val();
    $.getJSON(base_url + 'index.php/Home/get_product_by_id_json?id=' + id, function(x) {
      console.log(x);
      let htmlParse = 
      `<div class="col">
            <div class="row">
                <div class="col">
                    <h3>${x.name}</h3>
                    <img src="http://localhost/penjualan/assets/uploads/products/${x.picture_name}" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table>
                        <tr>
                            <th>Harga</th>
                            <td>${x.price}</td>
                        </tr>
                        <tr>
                            <th>Rating</th>
                            <td>${x.picture_name}</td>
                        </tr>
                        <tr>
                            <th>Terjual</th>
                            <td>${x.is_available}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>${x.description}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>`;
        $("#result_c_2").empty().html(htmlParse);
    })
  });

 
 
  $("#pay-button").click(function(event) {
	event.preventDefault();
	//var name = $("[name='name']").val();
	//var totalPrice = $("[name='total_price']").val();
	//var address = $("[name='address']").val();
		var name = $("#name").val();
	var total_price = $("#r_total").val();
	console.log(total_price)
	$.ajax({
		type: "POST",
		data: {total_price: total_price, name:	name},
		//data: {r_total: r_total},
		url: '<?=site_url()?>/shop/token',
		cache: false,
		success: function(data) {
			console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');
		
        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
		  
		 // resultType.innerHTML = type;
         // resultData.innerHTML = JSON.stringify(data);
		  
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

</body>

</html>
