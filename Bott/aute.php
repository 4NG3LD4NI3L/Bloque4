<?php

class AuthController
{
    public function login($email = null, $password = null)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('email' => 'aromero_21@alu.uabcs.mx','password' => '123456789'),
        CURLOPT_HTTPHEADER => array(
            'Cookie: XSRF-TOKEN=eyJpdiI6Ik1hMVU2MGUyd2t1NHdzVFEweThFeXc9PSIsInZhbHVlIjoiRGhRbDh3R3VqNFBlM2t2czdIVGpBUkVockFyT295dHlKQkhBK3BDY3pmakZjU3ZMYnFvb2p1MUtndTdQckhhWkNhNGNzUTVMUGZYYSt3KzBmMmZUQUlGUmZKWFVQVjllRklrZmNVeWN6b2RXVzU2UklRaEppM1E1YlN3WkY0UGEiLCJtYWMiOiIxNGMxOWJiMGVlYzZlYjFhODc2ODQ1YTYzZjk5N2Q2MTZkN2EzMDJiZjdmMjc4YjA5NTE5NGNkYzE4ZDRjZmMxIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6Imt1MGRjR01XMWorRnE0aURVTWFVY1E9PSIsInZhbHVlIjoielNaMmRmNXZZb1pWWGJzeEFvZEY4QisxN3hoVmNkMk1pYzQvaWtWVmtVSy93TlptdEUyZ2dodjlKUFRmSHlmZHM4RTRYRk9jajBkank4OEtBekFzZjFha25CMnJJYURJS003aURKY3FHMmJ0d1NJdXlPTjJNK2prVUIwZ0ZTVFIiLCJtYWMiOiJhNzc3OWU3YTE5NGM0N2U0YmI1NTE4YTk0YWFmYzFhMWM1ZDVmMDc2MzU0M2Y1Y2YwZDU2MzM1MjAxZDkxNGJhIiwidGFnIjoiIn0%3D'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        if ($email === 'aromero_21@alu.uabcs.mx' && $password === '123456789') {
            $_SESSION['user'] = $email;
            header('Location: ../Bott/pag.php');
            exit;
        } else {
            echo "Email o contraseña inválidos.";
        }
    }

    public function logout()
    {
        
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        $authController = new AuthController();

        switch ($action) {
            case 'login':
                $email = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL);
                $password = filter_var(trim($_POST['contrasena']), FILTER_SANITIZE_STRING);
                $authController->login($email, $password);
                break;

            case 'logout':
                $authController->logout();
                break;

            default:
                echo "Acción no válida.";
                break;
        }
    } else {
        echo "No se ha especificado ninguna acción.";
    }
}