<!doctype html>
<html>
    <head>
        <title>Buana Abadi</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Data Supplier <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode Supplier <?php echo form_error('kode_supplier') ?></label>
            <input type="text" class="form-control" name="kode_supplier" id="kode_supplier" placeholder="kode_supplier" value="<?php echo $kode_supplier; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Supplier <?php echo form_error('nama_supplier') ?></label>
            <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="nama_supplier" value="<?php echo $nama_supplier; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" value="<?php echo $alamat; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">No Telepon <?php echo form_error('telepon') ?></label>
            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="telepon" value="<?php echo $telepon; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('supplier') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>