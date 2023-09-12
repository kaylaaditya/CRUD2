<?php include('config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>

<body>
    <header>
        <h3>Daftar Siswa</h3>
    </header>
    <nav><a href="v_form.php"><button>Tambah Baru</button></a></nav>
    <table border="1" cellpadding="8">
        <thread>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No Telepon</th>
                <th>Kelas</th>
                <th>Tindakan</th>
            </tr>
        </thread>
</body>
<?php
$sql = "SELECT * FROM databaseku";
$query = mysqli_query($db, $sql);
while ($siswa = mysqli_fetch_array($query)) {
    echo "<tr>";
    echo "<td>" . $siswa['nis'] . "</td>";
    echo "<td>" . $siswa['nama'] . "</td>";
    echo "<td>" . $siswa['alamat'] . "</td>";
    echo "<td>" . $siswa['jenis_kelamin'] . "</td>";
    echo "<td>" . $siswa['no_telepon'] . "</td>";
    echo "<td>" . $siswa['kelas'] . "</td>";
    echo "<td>";
    echo "<a href= 'v_edit.php?nis=" . $siswa['nis'] . "'>Edit</a> \ ";
    echo "<a href='hapus.php?nis=" . $siswa['nis'] . "'>Hapus</a>";
    echo "</td>";
    echo "</tr>";
}
?>

<body>
    </table>
    <p>Total:
        <?php echo mysqli_num_rows($query) ?>
    </p>
</body>

</html>