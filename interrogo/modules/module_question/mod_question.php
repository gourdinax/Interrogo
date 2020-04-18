
<?php
	defined( '_NOEXEC' ) or die( "Veuillez gentiment passer par l'index svp." );
    include_once 'modules/module_question/cont_question.php';
    include_once './Connexion.php';

     Connexion::initConnexion();

    class ModQuestion{

        public $controleur;

         function __construct() {
            
           $this->controleur=new ContQuestion();

        }
    }

?>

