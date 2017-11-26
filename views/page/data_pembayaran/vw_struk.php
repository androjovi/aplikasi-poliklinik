<center><h4>Struk pembayaran</h4>
    <?php foreach($query2 as $k): ?>

<li><?php echo $k->nomor_resep; ?></li>
    
    ==================================
    <p>Total : <?php echo $k->sub_total; ?></p>
    <p>Jumlah bayar : <?php echo $jumlah_bayar; ?> </p>
    <p>Kembali : <?php echo $kembalian; ?> </p>
    ==================================
    <?php endforeach; ?>
    </center>