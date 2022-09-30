<!doctype html>
<html lang="en">

<hea>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</hea>

<body>
    <!-- Data -->
    <?php 
    // Array Scallar
    $m1 = ["nim" => "011022012" , "nama"=>"Latifah Irfan","nilai"=>"91"];
    $m2 = ["nim" => "011022014" , "nama"=>"Irfan Bagus","nilai"=>"85"];
    $m3 = ["nim" => "011022001" , "nama"=>"Ilham Ali","nilai"=>"78"];
     $m4 = ["nim" => "011022067" , "nama"=>"Ali Usman","nilai"=>"55"];
    $m4 = ["nim" => "011022020" , "nama"=>"Putra Abdul","nilai"=>"50"];
    $m5 = ["nim" => "011022031" , "nama"=>"Annisa Mawar","nilai"=>"80"];
    $m6 = ["nim" => "011022032" , "nama"=>"Danial Lestari","nilai"=>"90"];
    $m7 = ["nim" => "011022033" , "nama"=>"Akhmad Darma","nilai"=>"40"];
    $m8 = ["nim" => "011022034" , "nama"=>"Cahaya Fatimah","nilai"=>"78"];
    $m9 = ["nim" => "011022035" , "nama"=>"Mawar Taufik","nilai"=>"73"];
    $m10 = ["nim" => "011022036" , "nama"=>"Yohanes Krisna","nilai"=>"70"];
    
    // Array assosiative
    $mahasiswa = [$m1, $m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10];

    // Agregat
    $nilai_mhs = array_column($mahasiswa,'nilai');
    $nilai_tertinggi = max($nilai_mhs);
    $nilai_terendah = min($nilai_mhs);
    $jumlah_mahasiswa = count($mahasiswa);
    $nilai_rata2 = array_sum($nilai_mhs) / $jumlah_mahasiswa;
    ?>



    <h2 class="text-center mt-4">DAFTAR NILAI</h2>

    <div class="container text-center mt-4">
        <table class="table table-responsive">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">NILAI</th>
                    <th scope="col">KETERANGAN</th>
                    <th scope="col">GRADE</th>
                    <th scope="col">PREDIKAT</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            $no = "";
            foreach ($mahasiswa as $mhs) {
              $no++;
              $keterangan = ($mhs["nilai"] >= 60) ? "lulus" : "tidak lulus"; 
              if ($mhs["nilai"] >= 90) {
             $grade = "A";
              }
              else if ($mhs["nilai"] < 90 && $mhs["nilai"] >=80){
                $grade = "B";
              }
              else if ($mhs["nilai"] < 80 && $mhs["nilai"] >=70){
                $grade = "C";
              }
              else if ($mhs["nilai"] < 70 && $mhs["nilai"] >= 60){
                $grade = "D";
              }
              else $grade = "E";

            switch ($grade) {
                case 'A':
                   $predikat = "Memuaskan";
                    break;
                
                case 'B':
                    $predikat = "Baik";
                    break;
                
                case 'C':
                    $predikat = "Cukup";
                    break;
                
                case 'D':
                    $predikat = "Cukup Buruk";
                    break;
                
                case 'E':
                    $predikat = "Buruk";
                    break;
            }
               ?>

                <?php 
               
               if ($no % 2 == 1) {
                $warna = "#ffffff";
               }
               else $warna = "#cfcfcf";
               ?>

                <?php 
             $warna_p = ($keterangan == "tidak lulus") ? "red" : "" ;
             ?>
                <tr style="background-color: <?=$warna ?>;">
                    <td>
                        <?=$no ?>
                    </td>
                    <td><?=$mhs["nim"]  ?></td>
                    <td><?=$mhs["nama"]  ?></td>
                    <td><?=$mhs["nilai"]  ?></td>
                    <td>
                        <font color="<?=$warna_p?>"><?=$keterangan  ?></font>
                    </td>
                    <td><?=$grade  ?></td>
                    <td><?=$predikat?></td>
                </tr>
                <?php  }  ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>NILAI TERTINGGI</th>
                    <th colspan="6">
                        <?=$nilai_tertinggi ?>
                    </th>
                </tr>
                <tr>
                    <th>NILAI TERENDAH</th>
                    <th colspan="6">
                        <?=$nilai_terendah ?>
                    </th>
                </tr>
                <tr>
                    <th>NILAI RATA-RATA</th>
                    <th colspan="6">
                        <?=$nilai_rata2 ?>
                    </th>
                </tr>
                <tr>
                    <th>JUMLAH SISWA</th>
                    <th colspan="6">
                        <?=$jumlah_mahasiswa ?>
                    </th>
                </tr>
                <tr>

                </tr>
            </tfoot>
        </table>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>