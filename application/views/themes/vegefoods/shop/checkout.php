<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="hero-wrap hero-bread" style="background-image: url('<?php echo get_theme_uri('images/bg_1.jpg'); ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><?php echo anchor(base_url(), 'Home'); ?></span> <span>Checkout</span></p>
                <h1 class="mb-0 bread">Checkout</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <form  method="POST" id="payment-form" action="<?=site_url()?>/shop/checkout/order">
			<input type="hidden" name="result_type" id="result-type" value=""></div>
			<input type="hidden" name="result_data" id="result-data" value=""></div>
            <input type="hidden" name="total_price" class="form-control" value="">
            <input type="hidden" name="price_delivery">
            <input type="hidden" name="estimasi_delivery">

            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <h3 class="mb-4 billing-heading">Alamat Pengiriman</h3>

                    <div class="form-group">
                        <label for="name" class="form-control-label">Pengiriman untuk (nama):</label>
                        <input type="text" name="name" value="<?php echo $customer->name; ?>" class="form-control" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="hp" class="form-control-label">No. HP:</label>
                        <input type="text" name="phone_number" value="<?php echo $customer->phone_number; ?>" class="form-control" id="hp" required>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-control-label">Alamat:</label>
                        <textarea name="address" class="form-control" id="address" required><?php echo $customer->address; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="note" class="form-control-label">Catatan:</label>
                        <textarea name="note" class="form-control" id="note"></textarea>
                    </div>

                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Jenis Pengiriman</h3>
                                <div class="row">
                                    <div class="col">
                                        <span>Tujuan Pengiriman</span>
                                    </div>
                                    <div class="col">
                                        <select name="destination" id="destination">
                                            <option value="" selected disabled>pilih tujuan pengiriman</option>
                                            <?php
                                            if ($city->rajaongkir->status->code == 200 && $city->rajaongkir->status->description == "OK") :
                                                foreach ($city->rajaongkir->results as $key => $value) :
                                            ?>
                                                    <option value="<?= $value->city_id ?>" data-destination="<?= $value->city_name ?>"><?= $value->city_name ?></option>
                                            <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>Kurir</label>
                                        <select name="kurir" id="kurir" class="form-control">
                                            <option value="" selected disabled>pilih kurir</option>
                                            <option value="jne">JNE Reguler</option>
                                            <option value="pos">POS Indonesia</option>
                                            <option value="tiki">TIKI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>Berat (KG)</label>
                                        <input type="text" name="weight" class="form-control" value="<?= $weight ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <button class="button btn-primary" type="button" id="btnCekOngkir">Cek ongkir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Pengiriman</h3>
                                <p class="d-flex">
                                    <span>Tujuan</span>
                                    <span id="p_tujuan"></span>
                                </p>
                                <p class="d-flex">
                                    <span>Ongkos kirim</span>
                                    <span id="p_ongkir"></span>
                                </p>
                                <p class="d-flex">
                                    <span>Estimasi Pengiriman</span>
                                    <span id="estimasi"></span>
                                </p>
                                <p class="d-flex">
                                    <span>Kupon</span>
                                    <span><?php echo $discount; ?></span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span id="p_total"></span>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Rincian Belanja</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>Rp <?php echo format_rupiah($subtotal); ?></span>
                                </p>
                                <p class="d-flex">
                                    <span>Ongkos kirim</span>
                                    <span id="ongkir"></span>
                                </p>
                                <p class="d-flex">
                                    <span>Kupon</span>
                                    <span><?php echo $discount; ?></span>
                                </p>
                                <hr>
                                <div class="form-group">
                     
                        <textarea name="r_total" class="form-control" id="r_total"></textarea>
                    </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Metode Pembayaran</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="payment" class="mr-2" value="1"> Transfer bank</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="payment" class="mr-2" value="2" checked> Bayar ditempat</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                          
                        </div>


                    </div>
                </div> <!-- .col-md-8 -->
            </div>

        </form>
		  <div class="form-group text-right" style="margin-top: 10px;">
                                <button id="pay-button" class="btn btn-primary py-2 px-2">Checkout</button>
                            </div>
    </div>
</section> <!-- .section -->

<!-- input hidden -->
<input type="hidden" name="subtotal" value="<?= $subtotal ?>">

          
				
