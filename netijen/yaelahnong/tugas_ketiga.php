<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Tugas PWPB</title>
    <link rel="shortcut icon" href="img/logo.png">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table,
        #button {
            position: relative;
            left: 235px;
        }

        table {
            margin-top: 100px;
        }

        #button {
            margin-top: 50px;

        }
    </style>
    <!-- Custom styles for this template -->
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Kelompok 9</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="tugas_pertama.php">Tugas pertama</a>
            <a class="p-2 text-dark" href="tugas_kedua.php">Tugas kedua</a>
            <a class="p-2 text-dark" href="tugas_ketiga.php">Tugas ketiga</a>
            <a class="p-2 text-dark" href="#">Tugas keempat</a>
        </nav>
        <a class="btn btn-outline-success" href="index.php">Home</a>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="card-body" style="width : 100%;">
            <form action="form.php" method="post">
                <h2 class="display-7 text-center">DATA IDENTITAS PESERTA DIDIK BARU</h2>
                <h2 class="display-7 text-center">2019/2020</h2>
                <table>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><input type="text" name="nm"></td>
                    </tr>
                    <tr>
                        <td>Nama Panggilan</td>
                        <td>:</td>
                        <td><input type="text" name="np"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="radio" value="laki-laki">Laki-laki
                            <input type="radio" name="radio" value="perempuan">Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td><input type="text" name="agm"></td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td><input type="text" name="nisn"></td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><input type="text" name="nik"></td>
                    </tr>
                    <tr>
                        <td>Tempat dan Tanggal Lahir</td>
                        <td>:</td>
                        <td><input type="text" name="tempat-lh" size="10">
                            <select name="Tgl">
                                <option name="Tgl">Tgl
                                <option name="Tgl">1</option>
                                <option name="Tgl">2</option>
                                <option name="Tgl">3</option>
                                <option name="Tgl">4</option>
                                <option name="Tgl">5</option>
                                <option name="Tgl">6</option>
                                <option name="Tgl">7</option>
                                <option name="Tgl">8</option>
                                <option name="Tgl">9</option>
                                <option name="Tgl">10</option>
                                <option name="Tgl">11</option>
                                <option name="Tgl">12</option>
                                <option name="Tgl">13</option>
                                <option name="Tgl">14</option>
                                <option name="Tgl">15</option>
                                <option name="Tgl">16</option>
                                <option name="Tgl">17</option>
                                <option name="Tgl">18</option>
                                <option name="Tgl">19</option>
                                <option name="Tgl">20</option>
                                <option name="Tgl">21</option>
                                <option name="Tgl">22</option>
                                <option name="Tgl">23</option>
                                <option name="Tgl">24</option>
                                <option name="Tgl">26</option>
                                <option name="Tgl">27</option>
                                <option name="Tgl">28</option>
                                <option name="Tgl">29</option>
                                <option name="Tgl">30</option>
                                <option name="Tgl">31</option>
                            </select>
                            <select name="Bln">
                                <option name="Bln">Bln</option>
                                <option name="Bln">Januari</option>
                                <option name="Bln">Februari</option>
                                <option name="Bln">Maret</option>
                                <option name="Bln">April</option>
                                <option name="Bln">Mei</option>
                                <option name="Bln">Juni</option>
                                <option name="Bln">Juli</option>
                                <option name="Bln">Agustus</option>
                                <option name="Bln">September</option>
                                <option name="Bln">Oktober</option>
                                <option name="Bln">November</option>
                                <option name="Bln">Desember</option>
                            </select>
                            <select name="Thn">
                                <option name="Thn">Thn</option>
                                <option name="Thn">2012</option>
                                <option name="Thn">2011</option>
                                <option name="Thn">2010</option>
                                <option name="Thn">2009</option>
                                <option name="Thn">2008</option>
                                <option name="Thn">1993</option>
                                <option name="Thn">1992</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td>:</td>
                        <td><input type="text" name="asal-sekolah"></td>
                    </tr>
                    <tr>
                        <td>Nomor SKHU</td>
                        <td>:</td>
                        <td><input type="text" name="skhu"></td>
                    </tr>
                    <tr>
                        <td>Tanggal diterima disekolah ini</td>
                        <td>:</td>
                        <td><input type="date" name="tds"></td>
                    </tr>
                    <tr>
                        <td>Jika Pindahan, Sebutkan Alasan Pindah ke Sekolah ini</td>
                        <td>:</td>
                    </tr>
                    <tr>
                        <td><textarea name="als" cols="40" rows="5" placeholder="Alasan kamu pindah ke sekolah ini...."></textarea></td>
                    </tr>
                    <tr>
                        <td>Alamat :</td>
                        <!-- <td></td> -->
                    </tr>
                    <tr>
                        <td><textarea name="almt" cols="40" rows="5" placeholder="Alamat kamu...."></textarea></td>
                    </tr>
                    <tr>
                        <td>Tinggal Bersama</td>
                        <td>:</td>
                        <td><input type="text" name="tb"></td>
                    </tr>
                    <tr>
                        <td>Transportasi ke Sekolah</td>
                        <td></td>
                        <td>
                            <input type="text" name="tsp">
                        </td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>:</td>
                        <td><input type="tel" name="telp"></td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td>:</td>
                        <td><input type="tel" name="hp"></td>
                    </tr>
                    <tr>
                        <td>Nomor Kartu Perlindungan Sosial (bagi yang memiliki)</td>
                        <td>:</td>
                        <td><input type="text" name="kps"></td>
                    </tr>
                    <tr>
                        <td><strong>Data Ayah Kandung</strong> :</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" name="nm-a"></td>
                    </tr>
                    <tr>
                        <td>Tahun Lahir</td>
                        <td>:</td>
                        <td><input type="text" name="tl-a"></td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td>:</td>
                        <td><input type="text" name="pd-a"></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td><input type="text" name="pk-a"></td>
                    </tr>
                    <tr>
                        <td>Data Ibu Kandung :</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" name="nm-i"></td>
                    </tr>
                    <tr>
                        <td>Tahun Lahir</td>
                        <td>:</td>
                        <td><input type="text" name="tl-i"></td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td>:</td>
                        <td><input type="text" name="pd-i"></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td><input type="text" name="pk-i"></td>
                    </tr>
                </table>
                <div id="button">
                    <input class="btn btn-outline-success" type="submit" name="sbmt" value="Simpan">
                    <input class="btn btn-outline-success" type="reset" name="rst" value="Batal">
                </div>
            </form>
        </div>
    </div>
    <!-- END OF CONTENT -->


    <div class="container">
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block mb-3 text-muted">&copy; 2019</small>
                    <p class="lead">#PWPB_XIRPL3</p>
                </div>
                <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Cool stuff</a></li>
                        <li><a class="text-muted" href="#">Random feature</a></li>
                        <li><a class="text-muted" href="#">Team feature</a></li>
                        <li><a class="text-muted" href="#">Stuff for developers</a></li>
                        <li><a class="text-muted" href="#">Another one</a></li>
                        <li><a class="text-muted" href="#">Last time</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Resource</a></li>
                        <li><a class="text-muted" href="#">Resource name</a></li>
                        <li><a class="text-muted" href="#">Another resource</a></li>
                        <li><a class="text-muted" href="#">Final resource</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Team</a></li>
                        <li><a class="text-muted" href="#">Locations</a></li>
                        <li><a class="text-muted" href="#">Privacy</a></li>
                        <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>