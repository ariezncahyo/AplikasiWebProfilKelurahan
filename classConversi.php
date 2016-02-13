<?php
class classConversi{
private $bil;
private $data_titik;
private $jChar;
	function cAngka($angka){
			switch ($angka)
				{
					case 0:
					$this->bil = "";				
					break;
					case 1:
					$this->bil = "Satu";				
					break;
					case 2:
					$this->bil = "Dua ";
					break;
					case 3:
					$this->bil = "Tiga ";
					break;
					case 4:
					$this->bil = "Empat ";
					break;
					case 5:
					$this->bil = "Lima ";
					break;
					case 6:
					$this->bil = "Enam ";
					break;
					case 7:
					$this->bil = "Tujuh ";
					break;
					case 8:
					$this->bil = "Delapan ";
					break;
					case 9:
					$this->bil = "Sembilan ";
					break;
				}
				return $this->bil;	
		}
		function blokAngka($blok){
			if(strlen($blok) == 3)
			{	
						$a1 = substr($blok, 0, 1);
						$a2 = substr($blok, -2, 1);
						$a3 = substr($blok, -1);
						//untuk format 500
						if ($a1 >= 1 && $a2 == 0 && $a3 == 0)
						{
							$a1 = $this->cAngka($a1);	
							$a2 = $this->cAngka($a2);
							if ($a1 == "Satu")
							{
								$a1 = "Se";
							}
							if($a2 == "Satu")
							{
									$a2 = "se";
							}
							$nmBlok1 = $a1. "ratus ". $a2;
						}
						//untuk format 510
						elseif ( $a1 >= 1 && $a2 >= 1 && $a3 == 0)
						{
							$a1 = $this->cAngka($a1);
							$a2 = $this->cAngka($a2);
							if ($a1 == "Satu")
							{
								$a1 = "Se";
							}
							if ($a2 == "Satu")
							{
								$a2 = "Se";
							}
							$nmBlok1 = $a1. "ratus ".$a2. "puluh ";
						}
						//untuk format 501
						elseif ($a1 >=1 && $a2 == 0 && $a3 >= 1 )
						{
							$a1 = $this->cAngka($a1);
							$a3 = $this->cAngka($a3);
							if ($a1 == "Satu")
							{
								$a1 = "Se";
							}
							$nmBlok1 = $a1. "ratus ". $a3;
						}
						//untuk format 050
						elseif ($a1 == 0 && $a2 >= 1 && $a3 == 0 )
						{
							$a1 = $this->cAngka($a1);
							$a2 = $this->cAngka($a2);
							$a3 = $this->cAngka($a3);
							$nmBlok1 = $a2. " puluh ";
						}
						// untuk format 051 ke atas
						elseif ($a1 == 0 && $a2 >= 1 && $a3 >= 1 )
						{
							$a1 = $this->cAngka($a1);
							$a2 = $this->cAngka($a2);
							$a3 = $this->cAngka($a3);
							$nmBlok1 = $a2. " puluh ". $a3;
						}
						//untuk format 005
						elseif ($a1 == 0 && $a2 == 0 && $a3 >= 1 )
						{
							$a3 = $this->cAngka($a3);
							$nmBlok1 = $a3;
						}
						//untu format 512 
						elseif ($a2 == 1)
						{
							$a1 = $this->cAngka($a1);	
							$a2 = $this->cAngka($a3);
							if ($a1 == "Satu")
							{
								$a1 = "Se";
							}
							if ($a2 == "Satu")
							{
								$a2 = "Se";
							}
							$nmBlok1 = $a1. "ratus ". $a2 ."belas ";
						}
						//untuk format 000
						elseif ($blok == 000)
						{
							$nmBlok1 = "";
						}
						else
						{
							$a1 = $this->cAngka($a1);	
							$a2 = $this->cAngka($a2);
							$a3 = $this->cAngka($a3);
							if ($a1 == "Satu")
							{
								$a1 = "Se";
							}
							if ($a2 == "Satu")
							{
								$a2 = "Se";
							}
									if ($a1 == "Se")
									{
										$nmBlok1 = $a1. "ratus ". $a2 ." puluh ".$a3;
									}
									else
									{
									$nmBlok1 = $a1. " ratus ". $a2 ." puluh ".$a3;
									}
						}
			}
			elseif (strlen($blok) == 2)
			{	
					$a1 = substr($blok, 0, 1);
					$a2 = substr($blok, -1, 1);
					if($a1 == 1 && $a2 != 0)
					{
						$a2 = $this->cAngka($a2);
						if ($a2 == "Satu")
						{
							$a2 = "Se";
						}
							if ($a2 == "Se")
							{
								$nmBlok1 = $a2."belas ";
							}
							else
							{
								$nmBlok1 = $a2." belas ";
							}
					}
					else
					{
						$a1 = $this->cAngka($a1);
						if ($a1 == "Satu")
						{
						$a1 = "Se";
						}
						$a2 = $this->cAngka($a2);
						$nmBlok1 = $a1."puluh " .$a2;
					}
			}
			else
			{
				$a1 = substr($blok, 0, 1);
				$a1 = $this->cAngka($a1);
				$nmBlok1 = $a1;
				
			}
			return $nmBlok1;
		}
/*	
	function jKarakter($data){
				$this->jChar = strlen($data);
				for ($i=1; $i <= $this->jChar;$i++)
				{
					$cKarakter = substr($data, -$i , 1);
					$jChar2 = strlen($cKarakter[$i]);
				}
				return true;
			}*/
		function nominalAngka($data){
		//$exTitik = explode(".", $data);
		$jAngka = strlen($data);
				if ($jAngka == 1)
				{
					$terbilang = "";
				}
				elseif ($jAngka == 2)
				{
					$terbilang = "";
				}
				elseif ($jAngka == 3)
				{
					$terbilang = "";
				}
				elseif ($jAngka == 4)
				{
					$terbilang = "ribu";
				}
				elseif ($jAngka == 5)
				{	
					$terbilang = "ribu";
				}
				elseif ($jAngka == 6)
				{	
					$terbilang = "ribu";
				}
				elseif ($jAngka == 7)
				{	
					$terbilang = "juta";
				}
				elseif ($jAngka == 8)
				{	
					$terbilang = "juta";
				}
				elseif ($jAngka == 9)
				{	
					$terbilang = "juta";
				}
				elseif ($jAngka >= 10)
				{	
					$terbilang = "milyard";
				}
				return $terbilang;	
			}
			function conversiAngka($data){
				$titik = number_format($data, 0,'','.');
				$exTitik = explode(".",$titik);
				$jTitik = count($exTitik);
				$blok1 = $exTitik[0];
				$blok2 = $exTitik[1];
				$blok3 = $exTitik[2];
				$blok4 = $exTitik[3];
					$nmBlok1 = $this->blokAngka($blok1);
					$nmBlok2 = $this->blokAngka($blok2);
					$nmBlok3 = $this->blokAngka($blok3);
					$nmBlok4 = $this->blokAngka($blok4);
					$nmNominal1 = $this->nominalAngka($data);
					$rp = "";
					if ($blok2 == 000 && $blok3 != 000)
					{
						$nm1 = "";
					}
					elseif ($blok2 == 000 && $blok3 == 000)
					{
						$nm1 = "";
					}
					elseif($nmNominal1 == "juta")
					{
						$nm1 = "ribu";
					}
					elseif($nmNominal1 == "milyard")
					{
						$nm1 = "juta";
						$nm2 = "ribu";
					}
					else
					{
						$nm1 = "";
						$nm2 = "";
						$nm3 = "";
					}
						if ($nmBlok1 == "Se")
						{
							$hasil = "$nmBlok1$nmNominal1 $nmBlok2 $nm1 $nmBlok3 $nmBlok4 $nm2 $rp";
						}
						else
						{
							$hasil = "$nmBlok1 $nmNominal1 $nmBlok2 $nm1 $nmBlok3 $nmBlok4 $nm2 $rp";
						}
					if ($data == 1000)
					{
						$hasil ="Seribu $rp";
					}
					elseif ($data == 1000000)
					{
						$hasil ="Satu Juta $rp";
					}
					elseif ($data == 10000000)
					{
						$hasil ="Sepuluh Juta $rp";
					}
					return $hasil;
			}
		
	}
?>