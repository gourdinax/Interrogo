<?php
	class Connexion{

		protected static $bdd;

		public function __construct (){
		   
		}

		public static function initConnexion(){
			/*$user ="dutinfopw201633";
			$password="mejetuju";
			$dns="mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201633";

			self::$bdd = new PDO($dns,$user,$password);*/
			$user ="root";
			$password="";
			$dns="mysql:host=localhost;dbname=interrogo";

			self::$bdd = new PDO($dns,$user,$password);
		}
	}
	
	Connexion::initConnexion();	
?>
