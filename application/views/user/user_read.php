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
        <h2 style="margin-top:0px">Data User Read</h2>
        <table class="table">
	    <tr><td>NIK</td><td><?php echo $nik; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>No Telepon</td><td><?php echo $telepon; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
        <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>