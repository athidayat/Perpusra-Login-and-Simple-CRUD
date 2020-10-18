<?php

$con->auth();
$conn=$con->koneksi();
switch (@$_GET['page']){
    case 'add':
        $sql="select * from tb_buku";
        $spesialis=$conn->query($sql);
        $content="views/buku/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['judul'])){
                $err['judul']="Nama Dokter Wajib";
            }
            if(empty($_POST['penulis'])){
                $err['penulis']="Pendidikan Wajib Terisi";
            }
            if(empty($_POST['penerbit'])){
                $err['penerbit']="No IDI Wajib Angka";
            }
            if(empty($_POST['tgl'])){
                $err['tgl']="Pendidikan Wajib Terisi";
            }
            if(empty($_POST['file_buku'])){
                $err['file_buku']="Pendidikan Wajib Terisi";
            }
            if(!isset($err)){
                $id_pegawai=$_SESSION['login']['id'];
                if(!empty($_POST['id_buku'])){
                    //update
                    $sql="update tb_buku set judul='$_POST[judul]',penulis='$_POST[penulis]',penerbit='$_POST[penerbit]', tgl='$_POST[tgl]',file_buku='$_POST[file_buku]'
                    where id_buku='$_POST[id_buku]'";
                }else{
                   //save
                   $sql = "INSERT INTO tb_buku (judul,penulis,penerbit,tgl,file_buku) 
                   VALUES ('$_POST[judul]','$_POST[penulis]','$_POST[penerbit]','$_POST[tgl]','$_POST[file_buku]')";
                }
                    if ($conn->query($sql) === TRUE) {
                        header('Location: '.$con->site_url().'/admin/index.php?mode=buku');
                    } else {
                        $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
                    }
            }
        }else{
            $err['msg']="tidak diijinkan";
        }
        if(isset($err)){
            $content="views/buku/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $buku ="select * from tb_buku where id_buku='$_GET[id]'";
        $buku=$conn->query($buku);
        $_POST=$buku->fetch_assoc();
        $_POST['penerbit']=$_POST['penerbit'];
        $_POST['id_buku']=$_POST['id_buku'];
        //var_dump($buku);
        $content="views/buku/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete';
        $buku ="delete from tb_buku where id_buku='$_GET[id]'";
        $buku=$conn->query($buku);
        header('Location: '.$con->site_url().'/admin/index.php?mode=buku');
    break;
    default:
    $sql="select * from tb_buku";
    $dokter=$conn->query($sql);
    $conn->close();
    $content="views/buku/tampil.php";
    include_once 'views/template.php';
}
?>