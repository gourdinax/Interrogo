
<?php

    include_once 'modules/module_qcm/cont_qcm.php';
    include_once './Connexion.php';

     Connexion::initConnexion();

    class ModQcm{

        public $controleur;

         function __construct() {
            
           $this->controleur=new ContQcm();

        }
    }

?>

