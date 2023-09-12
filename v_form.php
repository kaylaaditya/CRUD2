<?php
include("config.php");
if(isset($_GET['nis'])){
    $title = "Edit";
    $url = 'proses_edit.php';
    $id = $_GET['nis'];
    //buat query untuk ambil data dari database
    $sql = "SELECT * FROM databaseku WHERE nis = $id";
    $query = mysqli_query($db, $sql);
    $siswa = mysqli_fetch_assoc($query);
    //jika data yang diedit tidak ditemukan 
    if (mysqli_num_rows($query)< 1 ){
        die("data tidak ditemukan...");
    }
    //url jika edit data
    $title = "Add";
    //url jika tambah
    $url = 'proses_pendaftaran.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir title</title>
</head>
<body>
    <header><h3>Formulir Siswa</h3></header>
    <form action="proses_pendaftaran.php" method="POST">
        <fieldset>
            <legend><h2>Form Siswa</h2></legend>
            <div>
                <label for='nis'>NIS : </label><br>
                <input type="text" name="nis" value="<?php if(isset($_GET['nis'])){echo $siswa['nis'];}?>"/>
            </div>
            <div>
                <label for='nama' >Nama :</label><br>
                <input type="text" name="nama" value="<?php if(isset($_GET['nis']))
                {echo $siswa['nama'];}?>"/>
            </div>
            <div>
            <label for='alamat' >alamat :</label><br>
                <textarea name="alamat" rows="5"><?php if(isset($_GET['nis']))
                {echo $siswa['alamat'];}?></textarea>
            </div>
            <div>
                <label for='jenis_kelamin' >Jenis Kelamin :</label><br>
                <?php if(isset($_GET['nis'])){$jk = $siswa['jenis_kelamin'];?>
                <td>
                    <input name= "jenis_kelamin" type="radio" value="Laki-laki"
                    <?php if($jk=='Laki-laki'){echo 'checked';}?>>Laki-laki
                    <input type="radio" name="jenis_kelamin" value="Perempuan"
                    <?php if($jk=='Perempuan'){echo 'checked';}?>>Perempuan
                </td>
                <?php } else { ?>
                    <td><br>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki
                    <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
                    </td>
                    <?php } ?>
            </div>
            <div>
            <label for="no-telp">No Telepon :</label><br>
            <input type="text" name = "no_telepon" value="<?php if(isset($_GET['nis'])){ echo $siswa['no_telepon']; } ?>"/>
            </div>
            <div>
            <label for="kelas">Kelas:</label><br>
        <input type="text" name="kelas" value="<?php if(isset($_GET['nis']))
        { echo $siswa['kelas']; }?>">
            </div>
            <hr>
            <div>
            <input type="submit" value="Simpan" name="simpan"/>
            </div>
        </fieldset>
    </form>
</body>
</html>