<!DOCTYPE html>
<html lang="en"><head>
    <title></title>
</head><body>
    <h3>Daftar Alumni SMKSA</h3>
    <hr>
    <ul style="list-style: none">
        <?php if ($jurusan) { ?>
            <li>Jurusan : <?= $jurusan ?></li>
        <?php }
        if ($tahun) { ?>
            <li>Angkatan : <?= $tahun ?></li>
        <?php } ?>
    </ul>
    <table border="1">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <?php if (!$jurusan) { ?>
                <th scope="col">Jurusan</th>
            <?php }
            if (!$tahun) { ?>
                <th scope="col">Tahun</th>
            <?php } ?>
            <th scope="col">No. Telp</th>
            <th scope="col">Email</th>
            <th scope="col">Kegiatan Setelah Lulus</th>
            <th scope="col">Nama Industry</th>
            <th scope="col">Rating SMKSA</th>
            <th scope="col">Saran SMKSA</th>
            <th scope="col">Tanggal Daftar</th>
        </tr>
        <?php
        $i = 1;
        foreach ($admin as $u) :
        ?>
            <tr>
                <th><?= $i++; ?></th>
                <td><?= $u['nama_alumni'] ?></td>
                <td><?= $u['jenis_kelamin'] ?></td>
                <td><?= $u['alamat'] ?></td>
                <?php if (!$jurusan) { ?>
                    <td><?= $u['jurusan'] ?></td>
                <?php }
                if (!$tahun) { ?>
                    <td><?= $u['tahun_lulus'] ?></td>
                <?php } ?>
                <td><?= $u['no_telp'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['keg_set_lulus'] ?></td>
                <td><?= $u['nama_industry'] ?></td>
                <td><?= $u['rating_smksa'] ?></td>
                <td><?= $u['saran_smksa'] ?></td>
                <td><?= $u['tanggal_daftar'] ?></td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
</body></html>