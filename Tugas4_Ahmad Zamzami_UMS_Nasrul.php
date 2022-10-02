<?php 

// Class Pegawai
class Pegawai {
public $nip,$nama,$jabatan,$agama,$status;

// Membuat construction untuk dipanggil diparameter
public function __construct($nip,$nama,$jabatan,$agama,$status){
    // Mendifiniskan variable class dengan parameter function
    $this->nip = $nip;
    $this->nama = $nama;
    $this->jabatan = $jabatan;
    $this->agama = $agama;
    $this->status = $status;
}

// Function untuk mencetak
public function Cetak () {
// Gaji Pokok Untuk Setiap Jabatan
switch ($this->jabatan) {
    case 'manager':
        $gapok = 15000000;
        break;
    case 'asment':
        $gapok = 10000000;
        break; 
    case 'kabag' :
        $gapok = 7000000;
        break;
    case 'staff' : 
        $gapok = 4000000;
        break;

    default : $gapok = 0;  
}

// Tunjangan Jabatan
$tunjab = 0.2 * $gapok;
// Tunjangan Keluarga
$tunkel = ($this->status == "sudah menikah") ? 0.2 * $gapok  : 0;
// Uang Zakat Jika Beragama Islam dan Bergaji 6jt Keatas
$zakatProfesi = ($this->agama == "islam" && $gapok >= 6000000) ? 0.025 * $gapok : 0;
// Gaji Bersih
$THP = ($gapok + $tunjab + $tunkel) - $zakatProfesi;
?>

<!-- Pemanggilan Variable Untuk Dimasukan Ke Table -->
<td><?=$this->nip?></td>
<td><?=$this->nama;?></td>
<td><?= $this->jabatan?></td>
<td><?= $this->agama?></td>
<td><?=$this->status?></td>
<td><?="Rp"." ".number_format($gapok)?></td>
<td><?="Rp"." ".number_format($tunjab)?></td>
<td><?="Rp"." ".number_format($tunkel)?></td>
<td><?="Rp"." ".number_format($zakatProfesi)?></td>
<td><?="Rp"." ".number_format($THP)?></td>
<?php 
    }
}

// Membuat Beberapa Object
$wahyu = new Pegawai(198503302003121001,"Wahyu Rohmanto","manager","islam","sudah menikah") ;
$kayla = new Pegawai(198503302003121002,"Kayla Maharani","asment","kristen","belum menikah") ;
$arip = new Pegawai(198503302003121003,"Arif Fathurahman","kabag","islam","sudah menikah") ;
$adit = new Pegawai(198503302003121004,"Adit Prayoga","staff","budha","belum menikah") ;
$burhan = new Pegawai(198503301233121001,"Burhan Abdullah","staff","islam","sudah menikah") ;

// Array Variable Object Untuk Dilooping
$nama_var = [$wahyu,$kayla,$arip,$adit,$burhan];
?>