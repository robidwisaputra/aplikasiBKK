<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php



function format_decimal($value){
    return round($value, 3);
}

//fungsi utama
function proses_DT( $parent, $kasus_cabang1, $kasus_cabang2, $kasus_cabang3, $kasus_cabang4, $kasus_cabang5) {
    echo "cabang 1<br>";
    pembentukan_tree( $parent, $kasus_cabang1);
    echo "cabang 2<br>";
    pembentukan_tree( $parent, $kasus_cabang2);
	echo "cabang 3<br>";
    pembentukan_tree( $parent, $kasus_cabang3);
	echo "cabang 4<br>";
    pembentukan_tree( $parent, $kasus_cabang4);
	echo "cabang 5<br>";
    pembentukan_tree( $parent, $kasus_cabang5);
}

//fungsi proses dalam suatu kasus data
function pembentukan_tree( $N_parent, $kasus) {
    //mengisi kondisi
	$ci =& get_instance();
	
    if ($N_parent != '') {
        $kondisi = $N_parent . " AND " . $kasus;
    } else {
        $kondisi = $kasus;
    }
    echo $kondisi . "<br>";
    //cek data heterogen / homogen???
    $cek = cek_heterohomogen( 'hasil', $kondisi);
    if ($cek == 'homogen') {
        echo "<br>LEAF ||";
        $sql_keputusan = $ci->db->query("SELECT DISTINCT(hasil)as hasil FROM "
                . "t_datamining WHERE $kondisi");
        $keputusan = $sql_keputusan->row()->hasil;

        pangkas( $N_parent, $kasus, $keputusan);
    }//jika data masih heterogen
    else if ($cek == 'heterogen') {

        //jika kondisi tidak kosong kondisi_hasil=tambah and
        $kondisi_hasil = '';
        if ($kondisi != '') {
            $kondisi_hasil = $kondisi . " AND ";
        }
        $jml_SANGATBAIK = jumlah_data( "$kondisi_hasil hasil='SANGAT BAIK'");
        $jml_BAIK = jumlah_data( "$kondisi_hasil hasil='BAIK'");
        $jml_CUKUP = jumlah_data( "$kondisi_hasil hasil='CUKUP'");
        
        
        $jml_total = $jml_SANGATBAIK + $jml_BAIK + $jml_CUKUP;
        
		if ($jml_total<=0){
			echo "<br>LEAF ||";
			$keputusan = '?';
			pangkas( $N_parent, $kasus, $keputusan);
			
		}else{
		
		
		echo "Jumlah data = " . $jml_total . "<br>";
        echo "Jumlah SANGAT BAIK = " . $jml_SANGATBAIK . "<br>";
        echo "Jumlah BAIK = " . $jml_BAIK . "<br>";
        echo "Jumlah CUKUP = " . $jml_CUKUP . "<br>";

		
		
		
        //hitung entropy semua
        $entropy_all = hitung_entropy($jml_SANGATBAIK, $jml_BAIK, $jml_CUKUP);
        echo "Entropy All = " . $entropy_all . "<br>";

        echo "<table class='table table-bordered table-striped  table-hover'>";
        echo "<tr><th>Nilai Atribut</th> <th>Jumlah data</th> <th>Jumlah SANGAT BAIK</th> <th>Jumlah BAIK</th> "
        . "<th>Jumlah CUKUP</th><th>Entropy</th> <th>Gain</th><tr>";

        $ci->db->query("TRUNCATE t_gain");
        
        //JAWABAN A
        hitung_gain( $kondisi, "n1", $entropy_all, "n1='A'", "n1='B'", "n1='C'", "n1='D'", "n1='E'");
        hitung_gain( $kondisi, "n2", $entropy_all, "n2='A'", "n2='B'", "n2='C'", "n2='D'", "n2='E'");
        hitung_gain( $kondisi, "n3", $entropy_all, "n3='A'", "n3='B'", "n3='C'", "n3='D'", "n3='E'");
        hitung_gain( $kondisi, "n4", $entropy_all, "n4='A'", "n4='B'", "n4='C'", "n4='D'", "n4='E'");
        hitung_gain( $kondisi, "n5", $entropy_all, "n5='A'", "n5='B'", "n5='C'", "n5='D'", "n5='E'");
		hitung_gain( $kondisi, "n6", $entropy_all, "n6='A'", "n6='B'", "n6='C'", "n6='D'", "n6='E'");
        
		
        echo "</table>";
 
		$max_gain = $ci->db->query("SELECT MAX(gain)as jml FROM t_gain")->row()->jml;

        $atribut = $ci->db->query("SELECT atribut FROM t_gain WHERE gain=$max_gain")->row()->atribut;
  
        echo "Atribut terpilih = " . $atribut . ", dengan nilai gain = " . $max_gain . "<br>";
        echo "<br>================================<br>";

        //jika max gain = 0 perhitungan dihentikan dan mengambil keputusan
        if ($max_gain == 0) {
            echo "<br>LEAF ";
            $NSANGATBAIK = $kondisi . " AND hasil='SANGAT BAIK'";
            $NBAIK = $kondisi . " AND hasil='BAIK'";
            $NCUKUP = $kondisi . " AND hasil='CUKUP'";
            $jumlahSANGATBAIK = jumlah_data( "$NSANGATBAIK");
            $jumlahBAIK = jumlah_data( "$NBAIK");
            $jumlahCUKUP = jumlah_data( "$NCUKUP");
			
			echo $jumlahSANGATBAIK.' '.$jumlahBAIK.' '.$jumlahCUKUP;
			
            if($jumlahSANGATBAIK >= $jumlahBAIK && 
                    $jumlahSANGATBAIK >= $jumlahCUKUP) {
                $keputusan = 'SANGAT BAIK';
            }
            elseif($jumlahBAIK >= $jumlahSANGATBAIK && 
                    $jumlahBAIK >= $jumlahCUKUP) {
                $keputusan = 'BAIK';
            }
            elseif($jumlahCUKUP >= $jumlahSANGATBAIK && 
                    $jumlahCUKUP >= $jumlahBAIK) {
                $keputusan = 'CUKUP';
            }          
            //insert atau lakukan pemangkasan cabang
            pangkas( $N_parent, $kasus, $keputusan);
        }
        //jika max_gain >0 lanjut..
        else {
            
			if ($atribut == "n1") {
                proses_DT( $kondisi, "(n1='A')", "(n1='B')","(n1='C')","(n1='D')","(n1='E')");
            } else if ($atribut == "n2") {
                proses_DT( $kondisi, "(n2='A')", "(n2='B')","(n2='C')","(n2='D')","(n2='E')");
            } else if ($atribut == "n3") {
                proses_DT( $kondisi, "(n3='A')", "(n3='B')","(n3='C')","(n3='D')","(n3='E')");
            } else if ($atribut == "n4") {
				proses_DT( $kondisi, "(n4='A')", "(n4='B')","(n4='C')","(n4='D')","(n4='E')");
			} else if ($atribut == "n5") {
                proses_DT( $kondisi, "(n5='A')", "(n5='B')","(n5='C')","(n5='D')","(n5='E')");
			} else if ($atribut == "n6") {
                proses_DT( $kondisi, "(n6='A')", "(n6='B')","(n6='C')","(n6='D')","(n6='E')");
            }
			
        }//end else jika max_gain>0
       }// end jumlah total = 0
    }//end else if($cek=='heterogen'){
}

//==============================================================================
//fungsi cek nilai atribut
function cek_nilaiAtribut( $field , $kondisi){
	$ci =& get_instance();
    //sql disticnt		
    $hasil = array();
    if($kondisi==''){
            $sql = $ci->db->query("SELECT DISTINCT($field) FROM datamining");					
    }else{
            $sql = $ci->db->query("SELECT DISTINCT($field) FROM datamining WHERE $kondisi");					
    }
    $a=0;
    while($row = $sql->result()){
            $hasil[$a] = $row['0'];
            $a++;
    }	
    return $hasil;
}

//fungsi cek heterogen data
function cek_heterohomogen( $field, $kondisi) {
	$ci =& get_instance();
    //sql disticnt
    if ($kondisi == '') {
        $sql = $ci->db->query("SELECT DISTINCT($field) FROM t_datamining");
    } else {
        $sql = $ci->db->query("SELECT DISTINCT($field) FROM t_datamining WHERE $kondisi");
    }
    //jika jumlah data 1 maka homogen
    if ($sql->num_rows() == 1) {
        $nilai = "homogen";
    } else {
        $nilai = "heterogen";
    }
    return $nilai;
}

//fungsi menghitung jumlah data
function jumlah_data( $kondisi) {
	$ci =& get_instance();
    //sql
    if ($kondisi == '') {
        $sql = "SELECT COUNT(*) as jml FROM t_datamining $kondisi";
    } else {
        $sql = "SELECT COUNT(*) as jml FROM t_datamining WHERE $kondisi";
    }

    $query = $ci->db->query($sql);
    $jml = $query->row()->jml;
    return $jml;
}

//fungsi pemangkasan cabang
function pangkas( $PARENT, $KASUS, $LEAF) {
	$ci =& get_instance();
    //PEMANGKASAN CABANG
//    $sql_pangkas = $this->db->query("SELECT * FROM t_rules "
//            . "WHERE parent=\"$PARENT\" AND keputusan=\"$LEAF\"");
//    $row_pangkas = $db_object->db_fetch_array($sql_pangkas);
//    $jml_pangkas = $db_object->db_num_rows($sql_pangkas);
    //jika keputusan dan parent belum ada maka insert
//    if ($jml_pangkas == 0) {
        $sql_in = "INSERT INTO t_rules "
                . "(parent,akar,keputusan)"
                . " VALUES (\"$PARENT\" , \"$KASUS\" , \"$LEAF\")";
        $ci->db->query($sql_in);
        // echo "1".$sql_in;
//    }
    //jika keputusan dan parent sudah ada maka delete
//    else {
//        $this->db->query("DELETE FROM t_rules WHERE id='$row_pangkas[0]'");
//        $exPangkas = explode(" AND ", $PARENT);
//        $jmlEXpangkas = count($exPangkas);
//        $temp = array();
//        for ($a = 0; $a < ($jmlEXpangkas - 1); $a++) {
//            $temp[$a] = $exPangkas[$a];
//        }
//        $imPangkas = implode(" AND ", $temp);
//        $akarPangkas = $exPangkas[$jmlEXpangkas - 1];
//        $que_pangkas = $this->db->query("SELECT * FROM t_rules "
//                . "WHERE parent=\"$imPangkas\" AND keputusan=\"$LEAF\"");
//        $baris_pangkas = $db_object->db_fetch_array($que_pangkas);
//        $jumlah_pangkas = $db_object->db_num_rows($que_pangkas);
//        if ($jumlah_pangkas == 0) {
//            $sql_in2 = "INSERT INTO t_rules "
//                    . "(parent,akar,keputusan)"
//                    . " VALUES (\"$imPangkas\" , \"$akarPangkas\" , \"$LEAF\")";
//            $this->db->query($sql_in2);
//            //echo "2".$sql_in2;
//        } else {
//            pangkas( $imPangkas, $akarPangkas, $LEAF);
//        }
//    }
    echo "Keputusan = " . $LEAF . "<br>================================<br>";
}

//fungsi menghitung gain
//hitung_gain( $kondisi, "jenis_kelamin", $entropy_all, "jenis_kelamin='L'", "jenis_kelamin='P'", "", "", "");

function hitung_gain( $kasus, $atribut, $ent_all, $kondisi1, $kondisi2, $kondisi3, $kondisi4, $kondisi5) {
    $ci =& get_instance();
	$data_kasus = '';
    if ($kasus != '') {
        $data_kasus = $kasus . " AND ";
    }

        
     	$j_SANGATBAIK1 = jumlah_data( "$data_kasus hasil='SANGAT BAIK' AND $kondisi1");
     	$j_BAIK1 = jumlah_data( "$data_kasus hasil='BAIK' AND $kondisi1");
        $j_CUKUP1 = jumlah_data( "$data_kasus hasil='CUKUP' AND $kondisi1");
     	$jml1 = $j_SANGATBAIK1 + $j_BAIK1 + $j_CUKUP1;
        
     	$j_SANGATBAIK2 = jumlah_data( "$data_kasus hasil='SANGAT BAIK' AND $kondisi2");
     	$j_BAIK2 = jumlah_data( "$data_kasus hasil='BAIK' AND $kondisi2");
        $j_CUKUP2 = jumlah_data( "$data_kasus hasil='CUKUP' AND $kondisi2");
     	$jml2 = $j_SANGATBAIK2 + $j_BAIK2 + $j_CUKUP2 ;
        
     	$j_SANGATBAIK3 = jumlah_data( "$data_kasus hasil='SANGAT BAIK' AND $kondisi3");
     	$j_BAIK3 = jumlah_data( "$data_kasus hasil='BAIK' AND $kondisi3");
        $j_CUKUP3 = jumlah_data( "$data_kasus hasil='CUKUP' AND $kondisi3");
     	$jml3 = $j_SANGATBAIK3 + $j_BAIK3 + $j_CUKUP3 ;
		
		$j_SANGATBAIK4 = jumlah_data( "$data_kasus hasil='SANGAT BAIK' AND $kondisi4");
     	$j_BAIK4 = jumlah_data( "$data_kasus hasil='BAIK' AND $kondisi4");
        $j_CUKUP4 = jumlah_data( "$data_kasus hasil='CUKUP' AND $kondisi4");
     	$jml4 = $j_SANGATBAIK4 + $j_BAIK4 + $j_CUKUP4 ;
		
		$j_SANGATBAIK5 = jumlah_data( "$data_kasus hasil='SANGAT BAIK' AND $kondisi5");
     	$j_BAIK5 = jumlah_data( "$data_kasus hasil='BAIK' AND $kondisi5");
        $j_CUKUP5 = jumlah_data( "$data_kasus hasil='CUKUP' AND $kondisi5");
     	$jml5 = $j_SANGATBAIK5 + $j_BAIK5 + $j_CUKUP5 ;
        
     	//hitung entropy masing-masing kondisi
     	$jml_total = $jml1 + $jml2 + $jml3+ $jml4+ $jml5;
     	$ent1 = hitung_entropy($j_SANGATBAIK1 , $j_BAIK1, $j_CUKUP1);
     	$ent2 = hitung_entropy($j_SANGATBAIK2 , $j_BAIK2, $j_CUKUP2);
     	$ent3 = hitung_entropy($j_SANGATBAIK3 , $j_BAIK3, $j_CUKUP3);
		$ent4 = hitung_entropy($j_SANGATBAIK4 , $j_BAIK4, $j_CUKUP4);
		$ent5 = hitung_entropy($j_SANGATBAIK5 , $j_BAIK5, $j_CUKUP5);
		
     	$gain = $ent_all - ((($jml1/$jml_total)*$ent1) + (($jml2/$jml_total)*$ent2) + (($jml3/$jml_total)*$ent3)+ (($jml4/$jml_total)*$ent4)+ (($jml5/$jml_total)*$ent5));							
     	//desimal 3 angka dibelakang koma
     	$gain = format_decimal($gain);
		
     	echo "<tr>";
     	echo "<td style='text-align:center;'>".$kondisi1."</td>";
     	echo "<td style='text-align:center;'>".$jml1."</td>";
     	echo "<td style='text-align:center;'>".$j_SANGATBAIK1."</td>";
     	echo "<td style='text-align:center;'>".$j_BAIK1."</td>";
        echo "<td style='text-align:center;'>".$j_CUKUP1."</td>";
     	echo "<td style='text-align:center;'>".$ent1."</td>";
     	echo "<td style='text-align:center;'>&nbsp;</td>";
     	echo "</tr>";
     	echo "<tr>";
     	echo "<td style='text-align:center;'>".$kondisi2."</td>";
     	echo "<td style='text-align:center;'>".$jml2."</td>";
     	echo "<td style='text-align:center;'>".$j_SANGATBAIK2."</td>";
     	echo "<td style='text-align:center;'>".$j_BAIK2."</td>";
        echo "<td style='text-align:center;'>".$j_CUKUP2."</td>";
     	echo "<td style='text-align:center;'>".$ent2."</td>";
     	echo "<td style='text-align:center;'>&nbsp;</td>";
     	echo "</tr>";
     	echo "<tr>";
     	echo "<td style='text-align:center;'>".$kondisi3."</td>";
     	echo "<td style='text-align:center;'>".$jml3."</td>";
     	echo "<td style='text-align:center;'>".$j_SANGATBAIK3."</td>";
     	echo "<td style='text-align:center;'>".$j_BAIK3."</td>";
        echo "<td style='text-align:center;'>".$j_CUKUP3."</td>";
     	echo "<td style='text-align:center;'>".$ent3."</td>";
     	echo "<td style='text-align:center;'>&nbsp;</td>";
     	echo "</tr>";
		echo "<tr>";
     	echo "<td style='text-align:center;'>".$kondisi4."</td>";
     	echo "<td style='text-align:center;'>".$jml4."</td>";
     	echo "<td style='text-align:center;'>".$j_SANGATBAIK4."</td>";
     	echo "<td style='text-align:center;'>".$j_BAIK4."</td>";
        echo "<td style='text-align:center;'>".$j_CUKUP4."</td>";
     	echo "<td style='text-align:center;'>".$ent4."</td>";
     	echo "<td style='text-align:center;'>&nbsp;</td>";
     	echo "</tr>";
		echo "<tr>";
     	echo "<td style='text-align:center;'>".$kondisi5."</td>";
     	echo "<td style='text-align:center;'>".$jml5."</td>";
     	echo "<td style='text-align:center;'>".$j_SANGATBAIK5."</td>";
     	echo "<td style='text-align:center;'>".$j_BAIK5."</td>";
        echo "<td style='text-align:center;'>".$j_CUKUP5."</td>";
     	echo "<td style='text-align:center;'>".$ent5."</td>";
     	echo "<td style='text-align:center;'>".$gain."</td>";
     	echo "</tr>";
     	echo "<tr><td colspan='8'></td></tr>";
     
   	
    $ci->db->query("INSERT INTO t_gain VALUES ('','1','$atribut','$gain')");
}

//fungsi menghitung entropy
function hitung_entropy($nilai1, $nilai2, $nilai3) {
    $total = $nilai1 + $nilai2 + $nilai3;
	
    //jika salah satu nilai 0, maka entropy 0
    //if ($nilai1 == 0 || $nilai2 == 0 || $nilai3 == 0) {
    //    $entropy = 0;
    //}
    //else {
	
	if ($nilai1 == 0){
		$atribut1=0;
	}else{
		 $atribut1 = (-($nilai1 / $total) * (log(($nilai1 / $total), 2)));
		 $atribut1 = is_nan($atribut1)?0:$atribut1;
	}	
   
	if ($nilai2 == 0){
		$atribut2=0;
	}else{
    $atribut2 = (-($nilai2 / $total) * (log(($nilai2 / $total), 2)));
	$atribut2 = is_nan($atribut2)?0:$atribut2;
	}
	
	if ($nilai3 == 0){
		$atribut3=0;
	}else{
    $atribut3 = (-($nilai3 / $total) * (log(($nilai3 / $total), 2)));
	$atribut3 = is_nan($atribut3)?0:$atribut3;
    }

    $entropy = $atribut1 +$atribut2 +$atribut3;
    //}
    //desimal 3 angka dibelakang koma
    $entropy = format_decimal($entropy);
    return $entropy;
}

//fungsi hitung rasio
function hitung_rasio( $kasus , $atribut , $gain , $nilai1 , $nilai2 , $nilai3 , $nilai4 , $nilai5){				
	$ci =& get_instance();   
   $data_kasus = '';
    if($kasus!=''){
        $data_kasus = $kasus." AND ";
    }
    //menentukan jumlah nilai
    $jmlNilai=5;
    //jika nilai 5 kosong maka nilai atribut-nya 4
    if($nilai5==''){
        $jmlNilai=4;
    }
    //jika nilai 4 kosong maka nilai atribut-nya 3
    if($nilai4==''){
        $jmlNilai=3;
    }
    $ci->db->query("TRUNCATE rasio_gain");		
    if($jmlNilai==3){
        $opsi11 = jumlah_data( "$data_kasus ($atribut='$nilai2' OR $atribut='$nilai3')");
        $opsi12 = jumlah_data( "$data_kasus $atribut='$nilai1'");
        $tot_opsi1=$opsi11+$opsi12;
        $opsi21 = jumlah_data( "$data_kasus ($atribut='$nilai3' OR $atribut='$nilai1')");
        $opsi22 = jumlah_data( "$data_kasus $atribut='$nilai2'");
        $tot_opsi2=$opsi21+$opsi22;
        $opsi31 = jumlah_data( "$data_kasus ($atribut='$nilai1' OR $atribut='$nilai2')");
        $opsi32 = jumlah_data( "$data_kasus $atribut='$nilai3'");
        $tot_opsi3=$opsi31+$opsi32;			
        //hitung split info
        $opsi1 = (-($opsi11/$tot_opsi1)*(log(($opsi11/$tot_opsi1),2))) + (-($opsi12/$tot_opsi1)*(log(($opsi12/$tot_opsi1),2)));
        $opsi2 = (-($opsi21/$tot_opsi2)*(log(($opsi21/$tot_opsi2),2))) + (-($opsi22/$tot_opsi2)*(log(($opsi22/$tot_opsi2),2)));
        $opsi3 = (-($opsi31/$tot_opsi3)*(log(($opsi31/$tot_opsi3),2))) + (-($opsi32/$tot_opsi3)*(log(($opsi32/$tot_opsi3),2)));
        //desimal 3 angka dibelakang koma
        $opsi1 = format_decimal($opsi1);
        $opsi2 = format_decimal($opsi2);
        $opsi3 = format_decimal($opsi3);										
        //hitung rasio
        $rasio1 = $gain/$opsi1;
        $rasio2 = $gain/$opsi2;
        $rasio3 = $gain/$opsi3;
        //desimal 3 angka dibelakang koma
        $rasio1 = format_decimal($rasio1);
        $rasio2 = format_decimal($rasio2);
        $rasio3 = format_decimal($rasio3);
            //cetak
            echo "Opsi 1 : <br>jumlah ".$nilai2."/".$nilai3." = ".$opsi11.
                    "<br>jumlah ".$nilai1." = ".$opsi12.
                    "<br>Split = ".$opsi1.
                    "<br>Rasio = ".$rasio1."<br>";
            echo "Opsi 2 : <br>jumlah ".$nilai3."/".$nilai1." = ".$opsi21.
                    "<br>jumlah ".$nilai2." = ".$opsi22.
                    "<br>Split = ".$opsi2.
                    "<br>Rasio = ".$rasio2."<br>";
            echo "Opsi 3 : <br>jumlah ".$nilai1."/".$nilai2." = ".$opsi31.
                    "<br>jumlah ".$nilai3." = ".$opsi32.
                    "<br>Split = ".$opsi3.
                    "<br>Rasio = ".$rasio3."<br>";

            //insert 
            $ci->db->query("INSERT INTO rasio_gain VALUES 
                                    ('' , 'opsi1' , '$nilai1' , '$nilai2 , $nilai3' , '$rasio1'),
                                    ('' , 'opsi2' , '$nilai2' , '$nilai3 , $nilai1' , '$rasio2'),
                                    ('' , 'opsi3' , '$nilai3' , '$nilai1 , $nilai2' , '$rasio3')");
    }
    
    $sql_max = $ci->db->query("SELECT MAX(rasio_gain) FROM rasio_gain");
    $row_max = $sql_max->result();	
    $max_rasio = $row_max['0'];
    $sql = $ci->db->query("SELECT * FROM rasio_gain WHERE rasio_gain=$max_rasio");
    $row =$sql->result();	
    $opsiMax = array();
    $opsiMax[0] = $row[2];
    $opsiMax[1] = $row[3];		
    echo "<br>=========================<br>";
    return $opsiMax;		
}


function klasifikasi( $n_jenis_kelamin, $n_usia, $n_sekolah, $n_jawaban_a, $n_jawaban_b, $n_jawaban_c, $n_jawaban_d) {
$ci =& get_instance();
    $sql = $ci->db->query("SELECT * FROM t_rules");
    $keputusan = $id_rule_keputusan = "";
    while ($row = $sql->result()) {
        //menggabungkan parent dan akar dengan kata AND
        if ($row['parent'] != '') {
            $rule = $row['parent'] . " AND " . $row['akar'];
        } else {
            $rule = $row['akar'];
        }
        //mengubah parameter
        $rule = str_replace("<=", " k ", $rule);
        $rule = str_replace("=", " s ", $rule);
        $rule = str_replace(">", " l ", $rule);
        //mengganti nilai
        $rule = str_replace("jenis_kelamin", "'$n_jenis_kelamin'", $rule);
        $rule = str_replace("usia", "'$n_usia'", $rule);
        $rule = str_replace("sekolah", "'$n_sekolah'", $rule);
        $rule = str_replace("jawaban_a", "'$n_jawaban_a'", $rule);
        $rule = str_replace("jawaban_b", "$n_jawaban_b", $rule);
        $rule = str_replace("jawaban_c", "$n_jawaban_c", $rule);
        $rule = str_replace("jawaban_d", "$n_jawaban_d", $rule);
        //menghilangkan '
        $rule = str_replace("'", "", $rule);
        //explode and
        $explodeAND = explode(" AND ", $rule);
        $jmlAND = count($explodeAND);
        //menghilangkan ()
        $explodeAND = str_replace("(", "", $explodeAND);
        $explodeAND = str_replace(")", "", $explodeAND);
        //deklarasi bol
        $bolAND=array();
        $n=0;
        while($n<$jmlAND){
            //explode or
            $explodeOR = explode(" OR ",$explodeAND[$n]);
            $jmlOR = count($explodeOR);	
            //deklarasi bol
            $bol=array();
            $a=0;
            while($a<$jmlOR){				
                //pecah  dengan spasi
                $exrule2 = explode(" ",$explodeOR[$a]);
                $parameter = $exrule2[1];				
                if($parameter=='s'){
                    //pecah  dengan s
                    $explodeRule = explode(" s ",$explodeOR[$a]);
                    //nilai true false						
                    if($explodeRule[0]==$explodeRule[1]){
                            $bol[$a]="Benar";
                    }else if($explodeRule[0]!=$explodeRule[1]){
                            $bol[$a]="Salah";
                    }
                }else if($parameter=='k'){
                    //pecah  dengan k
                    $explodeRule = explode(" k ",$explodeOR[$a]);
                    //nilai true false
                    if($explodeRule[0]<=$explodeRule[1]){
                            $bol[$a]="Benar";
                    }else{
                            $bol[$a]="Salah";
                    }
                }else if($parameter=='l'){
                    //pecah dengan s
                    $explodeRule = explode(" l ",$explodeOR[$a]);
                    //nilai true false
                    if($explodeRule[0]>$explodeRule[1]){
                            $bol[$a]="Benar";
                    }else{
                            $bol[$a]="Salah";
                    }
                }				
                $a++;
            }
            //isi false
            $bolAND[$n]="Salah";
            $b=0;			
            while($b<$jmlOR){
                //jika $bol[$b] benar bolAND benar
                if($bol[$b]=="Benar"){
                        $bolAND[$n]="Benar";
                }
                $b++;
            }			
            $n++;
        }
        //isi boolrule
        $boolRule="Benar";
        $a=0;
        while($a<$jmlAND){			
                //jika ada yang salah boolrule diganti salah
                if($bolAND[$a]=="Salah"){
                        $boolRule="Salah";
                        break;
                }						
                $a++;
        }		
        if($boolRule=="Benar"){
            $keputusan=$row['keputusan'];
            $id_rule_keputusan=$row['id'];
            break;
        }
        //jika tidak ada rule yang memenuhi kondisi data uji 
        //maka ambil rule paling bawah(ambil konisi yg paling panjang)????....
        if ($keputusan == '') {
            $que = $ci->db->query("SELECT parent FROM t_rules");
            $jml = array();
            $exParent = array();
            $i = 0;
            while ($row_baris = $db_object->db_fetch_array($que)) {
                $exParent = explode(" AND ", $row_baris['parent']);
                $jml[$i] = count($exParent);
                $i++;
            }
            $maxParent = max($jml);
            $sql_query = $ci->db->query("SELECT * FROM t_rules");
            while ($row_bar = $db_object->db_fetch_array($sql_query)) {
                $explP = explode(" AND ", $row_bar['parent']);
                $jmlT = count($explP);
                if ($jmlT == $maxParent) {
                    $keputusan = $row_bar['keputusan'];
                    $id_rule[$it] = $row_bar['id'];
                    $id_rule_keputusan = $row_bar['id'];
                    break;
                }
            }
        }
    }//end loop t_rules

    return array('keputusan' => $keputusan, 'id_rule' => $id_rule_keputusan);
}
?>
<div class="box box-primary">
						
  				<div class="box-header with-border">				
					<a href="<?php echo site_url('admin/proses/rules');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
				</div>
  				<div class="box-body">
				<?php
				$awal = microtime(true);
                            
                            $hasil=$this->db->query("TRUNCATE t_rules");
                            pembentukan_tree("","");
                            echo "<br><h3><center>---PROSES SELESAI---</center></h3>";
                            $akhir = microtime(true);
				?>
							
					
				</div>
</div>
	
				

