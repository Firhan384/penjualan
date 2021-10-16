<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="row m-1">
                <label>Compare With</label>
                <select name="c_product_1" class="form-control">
                    <option value="#" selected disabled>pilih produk</option>
                <?php if ( count($products) > 0) : ?>
                    <?php foreach ($products as $product) : ?>
                    <option value="<?= $product->id ?>"><?= $product->name ?></option>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
            <div class="row" id="result_c_1">
                
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="row m-1">
                <label>Compare With</label>
                <select name="c_product_2" class="form-control">
                    <option value="#" selected disabled>pilih produk</option>
                <?php if ( count($products) > 0) : ?>
                    <?php foreach ($products as $product) : ?>
                    <option value="<?= $product->id ?>"><?= $product->name ?></option>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
            <div class="row" id="result_c_2">
                
            </div>
        </div>
    </div>
</div>