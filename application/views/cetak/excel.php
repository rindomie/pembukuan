<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan.xls");

$date1 = date_create($this->session->flashdata('tglawal'));
$date2 = date_create($this->session->flashdata('tglakhir'));

?>
<table class="table table-hover">
    <thead>
        <tr>
            <th colspan=6 height="20px">LAPORAN</th>
        </tr>
        <tr>
            <th colspan=6 height="20px">Keuangan</th>
        </tr>
        <tr>
            <th colspan=6 height="20px">Periode Bulan : <?= date_format($date1, " F Y") ?> - <?= date_format($date2, "F Y")  ?></th>
        </tr>


        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jumlah beli</th>
            <th scope="col">Jumlah(Rp)</th>
            <th scope="col">Pelanggan</th>
            <th scope="col">Barang</th>
            <th scope="col">Jenis</th>
            <th scope="col">Keterangan</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($jurnal as $d) : 
            $date = date_create($d['tgl_pembelian']);

            ?>
            <tr>
                <th><?= $i ?></th>
                
                <td><?= date_format($date,"d F Y") ?></td>
                <td><?= $d['jml_pembelian'] ?></td>
                <td><?= number_format($d['total_harga'],0,',','.') ?></td>
                <td><?= $d['nama_plg']?></td>
                <td><?= $d['nama_cup']?></td>
                <td>Pemasukan</td>
                <td><?php if ($d['keterangan'] == 0) {
                                        echo "-";
                                    }else{
                                        echo $d['keterangan'];
                                    } ?></td>
                
                
            </tr>

            <?php $i++;
        endforeach ?>

        <?php
        //$i = 1;
        foreach ($jurnal2 as $d) : 
            $date = date_create($d['tgl_pengeluaran']);

            ?>
            <tr>
                <th><?= $i ?></th>
                
                <td><?= date_format($date,"d F Y") ?></td>
                <td>-</td>
                <td><?= number_format($d['jml_pengeluaran'],0,',','.') ?></td>
                <td>-</td>
                <td>-</td>
                <td>Pengeluaran</td>
                <td><?= $d['keterangan'] ?></td>
                
                
            </tr>
            
            
            <?php $i++;
        endforeach ?>
    </tbody>
</table>