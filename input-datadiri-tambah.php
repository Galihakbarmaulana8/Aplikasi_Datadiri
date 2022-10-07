<div class="container">
<h2>Tambah Data</h2>
<form action="input-datadiri-tambah.php" method="POST">
    <label for="nis"> Nomor Induk siswa :</label>
    <input class="form-control" type="number" name="nis" placeholder="Ex. 12001142" /><br>

    <label for="nama"> Nama Lengkap :</label>
    <input class="form-control" type="text" name="nama" placeholder="Ex. David Lutfhi" /><br>

    <label for="tanggal_lahir"> Tanggal Lahir :</label>
    <input class="form-control" type="date" name="tanggal_lahir" /><br>

    <label for="nilai"> Nilai :</label>
    <input class="form-control" type="number" name="nilai" placeholder="Ex. 80.56" /><br>

    <input class='btn btn-sm btn-primary' type="submit" name="simpan" value="Simpan Data" />
    <a class='btn btn-sm btn-secondary' href="input-datadiri.php">kembali</a>
</form>

<?php
    include ('./input-config.php');
        if ($_SESSION["role"] !="admin"){
            echo"
                <script>
                    alert('Akses tidak diberikan, Kamu bukan admin');
                    window.location='input-datadiri.php';
                </script>
            ";
        }
    if( isset($_POST["simpan"])){
        $nis = $_POST["nis"];
        $nama = $_POST["nama"];
        $tanggal_lahir= $_POST["tanggal_lahir"];
        $nilai = $_POST["nilai"];

        //CREATE - Menambahkan Data ke DataBase
        $query = "
            INSERT INTO datadiri VALUES
            ('$nis', '$nama', '$tanggal_lahir', '$nilai');
        ";
        include ('./input-config.php');
        $insert = mysqli_query($mysqli, $query);

        if ($insert){
            echo"
                <script>
                    alert('Data Berhasil ditambahkan');
                    window.location='input-datadiri.php';
                </script>
            ";
        }
    }
?>