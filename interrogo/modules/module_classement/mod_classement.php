
<?php
	defined( '_NOEXEC' ) or die( "Veuillez gentiment passer par l'index svp." );
    include_once 'modules/module_classement/cont_classement.php';
    include_once './Connexion.php';

    Connexion::initConnexion();

    class ModClassement{

        public $controleur;

         function __construct() {
            
           $this->controleur=new ContClassement();

        }

    }

?>

