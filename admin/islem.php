<?php  
require_once '../config.php';

if(!$_SESSION['mykadi']){
	Header("Location:login.php");
}


//Giriş İşlemleri
if(isset($_POST['login'])){
    $kadi = htmlspecialchars(trim($_POST['admin_kadi']));
    $sifre = htmlspecialchars(trim(md5($_POST['admin_sifre'])));
    if(!$kadi || !$sifre){
        Header("Location:login.php?giris=bos");
    }else {
        $sql = "SELECT * FROM adminler WHERE admin_kadi = :kadi AND admin_sifre = :sifre";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":kadi",$kadi);
        $stmt->bindParam(":sifre",$sifre);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if($admin){
            $_SESSION['mykadi'] = $admin['admin_kadi'];
            $_SESSION['id'] = $admin['id'];

            Header("Location:index.php");
        }else{
            Header("Location:login.php?giris=no");
        }
    }
}

//Kullanıcı Güncelle
if(isset($_POST['kullanici-guncelle'])){
    $kullanici = $_POST['kullanici'];

    $sql = "UPDATE adminler SET admin_kadi = :kadi";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":kadi",$kullanici);
    $stmt->execute();
    if($stmt){
        Header("Location:profil.php");
    }



}

//Parola Güncelle
if(isset($_POST['parola-guncelle'])){
    $eskiparola = md5($_POST['eskiparola']);
    $yeniparola = md5($_POST['yeniparola']);

    $sql = "SELECT * FROM adminler WHERE admin_sifre = :parola";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":parola",$eskiparola);
    $stmt->execute();

    if($stmt){
        $sql = "UPDATE adminler SET admin_sifre = :parola";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":parola",$yeniparola);
        $stmt->execute();
        
        Header("Location:profil.php?guncelle=ok");
    }
}


//Genel Ayar İşlemleri
if(isset($_POST['genel-ayarlar'])){
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $url = $_POST['url'];
    $keyw = $_POST['keyw'];
    $footer = $_POST['footer'];

    if(!$title || !$desc || !$url || !$keyw || !$footer){
        Header("Location:genel-ayarlar.php?kayit-durum=bos");
    }else {

        $sql = "UPDATE ayarlar SET site_title = :site_title, site_desc = :site_desc, site_key = :site_key, site_footer = :site_footer, site_url = :site_url";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":site_title",$title);
        $stmt->bindParam(":site_desc",$desc);
        $stmt->bindParam(":site_url",$url);
        $stmt->bindParam(":site_key",$keyw);
        $stmt->bindParam(":site_footer",$footer);
        $stmt->execute();

        if($stmt){
            Header("Location:genel-ayarlar.php?kayit-durum=ok");

        }else{
            Header("Location:genel-ayarlar.php?kayit-durum=no");

        }



    }

}

//Bigli Düzenleme İşlemleri
if(isset($_POST['bilgilerim'])){
    $fotograf = $_POST['fotograf'];
    $isim = $_POST['isim'];
    $meslek = $_POST['meslek'];
    $ikamet = $_POST['ikamet'];
    $telefon = $_POST['telefon'];
    $mail = $_POST['mail'];

    if(!$fotograf || !$isim || !$meslek || !$ikamet || !$telefon || !$mail){
        Header("Location:bilgilerim.php?durum=bos");
    }else {
        $sql = "UPDATE bilgilerim SET bilgi_foto = :foto, bilgi_isim = :isim, bilgi_meslek = :meslek, bilgi_ikamet = :ikamet, bilgi_telefon = :telefon, bilgi_mail = :mail";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":foto",$fotograf);
        $stmt->bindParam(":isim",$isim);
        $stmt->bindParam(":meslek",$meslek);
        $stmt->bindParam(":ikamet",$ikamet);
        $stmt->bindParam(":telefon",$telefon);
        $stmt->bindParam(":mail",$mail);
        $stmt->execute();

        if($stmt){
            Header("Location:bilgilerim.php?durum=ok");

        }else {
            Header("Location:bilgilerim.php?durum=no");

        }

    }

}


//Yetenek Ekleme
if(isset($_POST['beceri-ekle'])){
    $beceri = $_POST['beceri'];
    $yuzde = $_POST['yuzde'];

    if(!$beceri || !$yuzde){
        Header("Location:becerilerim.php?durum=bos");
    }else {
        $sql = "INSERT INTO yetenekler (beceri,yuzde) VALUES (:beceri,:yuzde)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":beceri",$beceri);
        $stmt->bindParam(":yuzde",$yuzde);
        $stmt->execute();

        if($stmt){
            Header("Location:becerilerim.php?durum=ok");
        }else {
            Header("Location:becerilerim.php?durum=no");
        }

    }
}

//Beceri Düzenle
if(isset($_POST['beceri-duzenle'])){
    $beceri = $_POST['beceri'];
    $yuzde = $_POST['yuzde'];
    $id = $_GET['beceri_id'];

    if(!$beceri || !$yuzde){
        Header("Locaton:becerilerim.php?guncelle=bos");
    }else {
        $sql = "UPDATE yetenekler SET beceri = :beceri, yuzde = :yuzde WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":beceri",$beceri);
        $stmt->bindParam(":yuzde",$yuzde);
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        if($stmt){
            Header("Location:becerilerim.php?guncelle=ok");
        }else {
            Header("Location:becerilerim.php?guncelle=no");

        }

    }

}

//Beceri Sil
if(isset($_GET['beceri_sil'])){
    $id = $_GET['beceri_sil'];
    $sql = "DELETE FROM yetenekler WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    if($stmt){
        Header("Location:becerilerim.php?beceri-sil=ok");
    }else {
        Header("Location:becerilerim.php?beceri-sil=no");
    }
}

//Dil Ekle
if(isset($_POST['dil-ekle'])){
    $dil = $_POST['dil'];
    $yuzde = $_POST['yuzde'];

    if(!$dil || !$yuzde){
        Header("Location:diller.php?durum=bos");
    }else {
        $sql = "INSERT INTO dillerim (dil,yuzde) VALUES (:dil,:yuzde)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":dil",$dil);
        $stmt->bindParam(":yuzde",$yuzde);
        $stmt->execute();

        if($stmt){
            Header("Location:diller.php?durum=ok");
        }else {
            Header("Location:diller.php?durum=no");
        }

    }
}

//Dil Düzenle
if(isset($_POST['dil-duzenle'])){
    $dil = $_POST['dil'];
    $yuzde = $_POST['yuzde'];
    $id = $_GET['dil_id'];

    if(!$dil || !$yuzde){
        Header("Locaton:diller.php?guncelle=bos");
    }else {
        $sql = "UPDATE dillerim SET dil = :dil, yuzde = :yuzde WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":dil",$dil);
        $stmt->bindParam(":yuzde",$yuzde);
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        if($stmt){
            Header("Location:diller.php?guncelle=ok");
        }else {
            Header("Location:diller.php?guncelle=no");

        }

    }

}

//Dİl Sil
if(isset($_GET['dil_sil'])){
    $id = $_GET['dil_sil'];
    $sql = "DELETE FROM dillerim WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    if($stmt){
        Header("Location:diller.php?beceri-sil=ok");
    }else {
        Header("Location:diller.php?beceri-sil=no");
    }
}

//İş Ekle
if(isset($_POST['is-ekle'])){
    $adi = $_POST['adi'];
    $url = $_POST['url'];
    $aciklama = $_POST['aciklama'];
    $durum = $_POST['durum'];
    $tarih = "10.10.2010";

    echo $adi;
    echo $url;
    echo $aciklama;
    echo $durum;

    if(!$adi || !$url || !$aciklama || !$durum){
        Header("Location:islerim.php?durum=bos");
    }else {
        $sql = "INSERT INTO isler (is_adi,is_link,is_aciklama,is_devam,is_tarih) VALUES (:ad,:link,:aciklama,:durum,:tarih)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":ad",$adi);
        $stmt->bindParam(":link",$url);
        $stmt->bindParam(":aciklama",$aciklama);
        $stmt->bindParam(":durum",$durum);
        $stmt->bindParam(":tarih",$tarih);
        $stmt->execute();

        if($stmt){
            Header("Location:islerim.php?durum=ok");
        }else {
            Header("Location:islerim.php?durum=no");
        }

    }
}

//İş Düzenle
if(isset($_POST['is-duzenle'])){
    $adi = $_POST['adi'];
    $url = $_POST['url'];
    $aciklama = $_POST['aciklama'];
    $durum = $_POST['durum'];
    $tarih = "10.10.2010";
    $id = $_GET['is_id'];

   if(!$adi || !$url || !$aciklama || !$durum){
        Header("Location:islerim.php?durum=bos");
    }else {
        $sql = "UPDATE isler SET is_adi = :ad, is_link = :link, is_aciklama = :aciklama, is_tarih = :tarih, is_devam = :durum WHERE id = :id";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":ad",$adi);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":link",$url);
        $stmt->bindParam(":aciklama",$aciklama);
        $stmt->bindParam(":durum",$durum);
        $stmt->bindParam(":tarih",$tarih);
        $stmt->execute();

        if($stmt){
            Header("Location:islerim.php?durum=ok");
        }else {
            Header("Location:islerim.php?durum=no");
        }

    }

}


//Dİl Sil
if(isset($_GET['is_sil'])){
    $id = $_GET['is_sil'];
    $sql = "DELETE FROM isler WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    if($stmt){
        Header("Location:islerim.php?durum=ok");
    }else {
        Header("Location:islerim.php?durum=no");
    }

    
}


//Proje Ekleme
if(isset($_POST['proje-ekle'])){
    $adi = $_POST['adi'];
    $aciklama = $_POST['aciklama'];
    $fiyat = $_POST['fiyat'];
    $url = $_POST['url'];

    if(!$adi || !$aciklama || !$fiyat || !$url){
        Header("Location:projeler.php?durum=bos");
    }else {
        $sql = "INSERT INTO projeler (adi,link,aciklama,fiyat) VALUES (:adi,:link,:aciklama,:fiyat)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":adi",$adi);
        $stmt->bindParam(":link",$url);
        $stmt->bindParam(":aciklama",$aciklama);
        $stmt->bindParam(":fiyat",$fiyat);
        $stmt->execute();

        if($stmt){
            Header("Location:projeler.php?durum=ok");
        }else {
            Header("Location:projeler.php?durum=no");
        }

    }
}


//Proje Düzenle
if(isset($_POST['proje-duzenle'])){
    $adi = $_POST['adi'];
    $fiyat = $_POST['fiyat'];
    $aciklama = $_POST['aciklama'];
    $url = $_POST['url'];
    $id = $_GET['dil_id'];

    if(!$adi || !$fiyat ||!$aciklama ||!$url ){
        Header("Locaton:projeler.php?guncelle=bos");
    }else {
        $sql = "UPDATE projeler SET adi = :adi, fiyat = :fiyat, aciklama = :aciklama, link = :link WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":adi",$adi);
        $stmt->bindParam(":fiyat",$fiyat);
        $stmt->bindParam(":link",$url);
        $stmt->bindParam(":aciklama",$aciklama);
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        if($stmt){
            Header("Location:projeler.php?guncelle=ok");
        }else {
            Header("Location:projeler.php?guncelle=no");

        }

    }

}

//Proje Sil
if(isset($_GET['proje_sil'])){
    $id = $_GET['proje_sil'];
    $sql = "DELETE FROM projeler WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    if($stmt){
        Header("Location:projeler.php?durum=ok");
    }else {
        Header("Location:projeler.php?durum=no");
    }

    
}

//Okul Ekle
if(isset($_POST['okul-ekle'])){
    $adi = $_POST['adi'];
    $aciklama = $_POST['aciklama'];
    $durum = $_POST['durum'];
    $tarih = "10.10.2010";

   
    if(!$adi || !$aciklama || !$durum || !$tarih){
        Header("Location:okullar.php?durum=bos");
    }else {
        $sql = "INSERT INTO egitim (adi,aciklama,aktiflik,tarih) VALUES (:ad,:aciklama,:durum,:tarih)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":ad",$adi);
        $stmt->bindParam(":aciklama",$aciklama);
        $stmt->bindParam(":durum",$durum);
        $stmt->bindParam(":tarih",$tarih);
        $stmt->execute();

        if($stmt){
            Header("Location:okullar.php?durum=ok");
        }else {
            Header("Location:okullar.php?durum=no");
        }

    }
}

//Okul Düzenle
if(isset($_POST['okul-duzenle'])){
    $adi = $_POST['adi'];
    $aciklama = $_POST['aciklama'];
    $id = $_GET['dil_id'];

    if(!$adi || !$fiyat ||!$aciklama ||!$url ){
        Header("Locaton:projeler.php?guncelle=bos");
    }else {
        $sql = "UPDATE projeler SET adi = :adi, fiyat = :fiyat, aciklama = :aciklama, link = :link WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":adi",$adi);
        $stmt->bindParam(":fiyat",$fiyat);
        $stmt->bindParam(":link",$url);
        $stmt->bindParam(":aciklama",$aciklama);
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        if($stmt){
            Header("Location:projeler.php?guncelle=ok");
        }else {
            Header("Location:projeler.php?guncelle=no");

        }

    }

}




?>