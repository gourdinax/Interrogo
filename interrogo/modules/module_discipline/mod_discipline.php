
<?php
	defined( '_NOEXEC' ) or die( "Veuillez gentiment passer par l'index svp." );

    include_once 'modules/module_discipline/cont_discipline.php';
    include_once './Connexion.php';

     Connexion::initConnexion();

    class ModDiscipline{

        public $controleur;

         function __construct() {
            
           $this->controleur=new ContDiscipline();

        }

    }

?>

