<?php

if(isset($_POST['submit'])){
        $namainstansi = $_POST['namainstansi'];
        $emailinstansi = $_POST['emailinstansi'];
        $tlpinstansi = $_POST['tlpinstansi'];
        $bidangpkl = $_POST['bidangpkl'];
        $userid = $_POST['id'];

        $mulaipkl = $_POST['mulaipkl'];
        $selesaipkl = $_POST['selesaipkl'];
        $alamat = $_POST['alamat'];
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $kecamatan = $_POST['kecamatan'];
        $kelurahan = $_POST['kelurahan'];
        
        $nim1 = $_POST['nim1'];
        $nama1 = $_POST['nama1'];
        $jurusan1 = $_POST['jurusan1'];
        $tlp1 = $_POST['tlp1'];
        $email1 = $_POST['email1'];
        
        $nim2 = $_POST['nim2'];
        $nama2 = $_POST['nama2'];
        $jurusan2 = $_POST['jurusan2'];
        $tlp2 = $_POST['tlp2'];
        $email2 = $_POST['email2'];

        $nim3 = $_POST['nim3'];
        $nama3 = $_POST['nama3'];
        $jurusan3 = $_POST['jurusan3'];
        $tlp3 = $_POST['tlp3'];
        $email3 = $_POST['email3'];

        $suratpermohonan = 'suratpermohonan_'.$namainstansi;
        $proposal = 'proposal_'.$namainstansi;
        //perihal dokumen
        $nama_file_suratpermohonan = $_FILES['suratpermohonan']['name'];
        $nama_file_proposal = $_FILES['proposal']['name'];
        $ext = pathinfo($nama_file_suratpermohonan, PATHINFO_EXTENSION);
        $ext2 = pathinfo($nama_file_proposal, PATHINFO_EXTENSION);
        $ukuran_file_suratpermohonan = $_FILES['suratpermohonan']['size'];
        $ukuran_file_proposal = $_FILES['proposal']['size'];
        $ukurantotal = $ukuran_file_suratpermohonan + $ukuran_file_proposal;
        $tipe_file = $_FILES['suratpermohonan']['type'];
        $tipe_file2 = $_FILES['proposal']['type'];
        $tmp_file = $_FILES['suratpermohonan']['tmp_name'];
        $tmp_file2 = $_FILES['proposal']['tmp_name'];
        $path_suratpermohonan = "document/suratpermohonan/".$suratpermohonan.'.'.$ext;
        $path_proposal = "document/proposal/".$proposal.'.'.$ext2;

        if($tipe_file == "application/pdf" || $tipe_file2 == "application/pdf"){
          if($ukurantotal <= 8600000){ 
            $upload = move_uploaded_file($tmp_file,$path_suratpermohonan);
            $upload2 = move_uploaded_file($tmp_file2,$path_proposal);
            if($upload){ 
              
                $submitdata = mysqli_query($conn,"insert into userdata (userid, namainstansi, emailinstansi, tlpinstansi, mulaipkl, selesaipkl, alamat, provinsi, kabupaten, kecamatan, kelurahan, bidangpkl, nim1, nama1, jurusan1, tlp1, email1, nim2, nama2, jurusan2, tlp2, email2,nim3, nama3, jurusan3, tlp3, email3, suratpermohonan, proposal) 
                values('$userid','$namainstansi','$emailinstansi','$tlpinstansi','$mulaipkl','$selesaipkl','$alamat','$provinsi','$kota','$kecamatan','$kelurahan','$bidangpkl','$nim1','$nama1','$jurusan1','$tlp1','$email1','$nim2','$nama2','$jurusan2','$tlp2','$email2','$nim3','$nama3','$jurusan3','$tlp3','$email3','$path_suratpermohonan','$path_proposal')");
              
              if($submitdata){ 

                //berhasil bikin
                echo " <div class='alert alert-success'>
                        Berhasil submit data.
                    </div>
                    <meta http-equiv='refresh' content='2; url= daftar.php'/>  ";  

              }else{

                echo "<div class='alert alert-warning'>
                        Gagal submit data. Silakan coba lagi nanti.
                    </div>
                    <meta http-equiv='refresh' content='3; url= daftar.php'/> ";
                }
            }else{
              // Jika dokumen gagal diupload, Lakukan :
              echo "Sorry, there's a problem while uploading the file.";
              echo "<br><meta http-equiv='refresh' content='5; URL=daftar.php'> You will be redirected to the form in 5 seconds";
            }
          }else{
            // Jika ukuran file lebih dari 4MB, lakukan :
            echo "Sorry, the file size is not allowed to more than 4,5mb";
            echo "<br><meta http-equiv='refresh' content='5; URL=daftar.php'> You will be redirected to the form in 5 seconds";
          }
        }else{
          // Jika tipe file yang diupload bukan PDF, lakukan :
          echo "Sorry, the document format should be PDF.";
          echo "<br><meta http-equiv='refresh' content='5; URL=daftar.php'> You will be redirected to the form in 5 seconds";
        }

    };




    //kalau update
    if(isset($_POST['update'])){
      $id = $_POST['id'];
      $alamat = $_POST['alamat'];
      $tlpinstansi = $_POST['tlpinstansi'];
      $nama1 = $_POST['nama1'];
        $jurusan1 = $_POST['jurusan1'];
        $tlp1 = $_POST['tlp1'];
        $email1 = $_POST['email1'];
      $nama2 = $_POST['nama2'];
        $jurusan2 = $_POST['jurusan2'];
        $tlp2 = $_POST['tlp2'];
        $email2 = $_POST['email2'];
      $nama3 = $_POST['nama3'];
        $jurusan3 = $_POST['jurusan3'];
        $tlp3 = $_POST['tlp3'];
        $email3 = $_POST['email3'];

    $update = mysqli_query($conn,"update userdata
    set alamat='$alamat', tlpinstansi='$tlpinstansi', nama1='$nama1', jurusan1='$jurusan1', tlp1='$tlp1',
    email1='$email1', nama2='$nama2', jurusan2='$jurusan2', tlp2='$tlp2', email2='$email2',nama3='$nama3', 
    jurusan3='$jurusan3', tlp3='$tlp3', email3='$email3', where userid='$id'");

    if($update){ 

      //berhasil bikin
      echo " <div class='alert alert-success'>
              Berhasil submit data.
          </div>
          <meta http-equiv='refresh' content='1; url= mydata.php'/>  ";  

    }else{

      echo "<div class='alert alert-warning'>
              Gagal submit data. Silakan coba lagi nanti.
          </div>
          <meta http-equiv='refresh' content='3; url= mydata.php'/> ";
      }

    };



    
//get timezone jkt
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d"); //now

    //kalau konfirmasi
    if(isset($_POST['ok'])){
      $id = $_POST['id'];
      $updateaja = mysqli_query($conn,"update userdata set status='Verified', tglkonfirmasi='$today' where userid='$id'");

      if($updateaja){
        //berhasil bikin
          echo " <div class='alert alert-success'>
          Berhasil submit data.
      </div>
      <meta http-equiv='refresh' content='1; url= mydata.php'/>  ";  
      } else {
        echo "<div class='alert alert-warning'>
              Gagal submit data. Silakan coba lagi nanti.
          </div>
          <meta http-equiv='refresh' content='3; url= mydata.php'/> ";
      }
    };

?>