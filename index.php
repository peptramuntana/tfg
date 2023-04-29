<?php
    //Import all the Function Querys of the Model
    require_once('app/models/indexModels.php');
    //Import the logic of the Controller
    require_once('app/controllers/indexControllers.php');
    
        // // index.php
        // $action = isset($_GET['action']) ? $_GET['action'] : 'default';

        // switch ($action) {
        //     case 'logout':
        //         // Lógica para manejar el cierre de sesión
        //         echo ("
        //             <script>
        //                 window.alert('In --> index.php switch --> logout.');
        //             </script>
        //         ");
        //         break;
    
        //     case 'default':
        //     default:
        //         // Lógica para manejar la página predeterminada
        //         break;
        // }

    include('app/views/indexViews.php');
    


?>