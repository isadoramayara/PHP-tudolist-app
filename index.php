<?php

// Resgastando a URI atual
$request = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );

/*
*   ROUTER / ROUTES
*/

switch (true) {

    // Tela de Login
    case strpos($request,'login'):
        require __DIR__ . '/app/views/login.php';
        break;

    // Tela de Registro
    case strpos($request,'signup'):
        require __DIR__ . '/app/views/signup.php'; 
        break;

    // Dashboard / Lista de "Listas"
    case strpos($request,'dashboard'):
        require __DIR__ . '/app/views/dashboard.php'; 
        break;

    // Dashboard / Atualizar lista
    case strpos($request,'update-list'):
        require __DIR__ . '/app/views/update-list.php'; 
        break;

    // Acessando lista / to-do items
    case strpos($request,'todolist'):
        require __DIR__ . '/app/views/todo-items.php'; 
        break;

    // Acessando lista / Atualizar item
    case strpos($request,'update-item'):
        require __DIR__ . '/app/views/update-item.php'; 
        break;
    
    // Homepage
    case strpos($request,'home'):
        require __DIR__ . '/app/views/home.php'; 
        break;
    
        /** handlers routes **/
        case (strpos($request,'signupForm.php')):
            require __DIR__ . '/app/handlers/signupForm.php'; 
            break;
        case (strpos($request,'loginForm.php')):
            require __DIR__ . '/app/handlers/loginForm.php'; 
            break;
        case (strpos($request,'listForm.php')):
            require __DIR__ . '/app/handlers/listForm.php'; 
            break;
        case (strpos($request,'itemForm.php')):
            require __DIR__ . '/app/handlers/itemForm.php'; 
            break;
            
    default:
        require __DIR__ . '/app/views/home.php';
        break;
}

/** echo '<style type="text/css">' 
*            . $style['homepage'] 
*           . $style['header'] 
*            . '</style>'; */

?>