<?php
session_start();


$base_url = "http://".$_SERVER['HTTP_HOST'].str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
define('CSS_URL', $base_url.'/assets/css/style.css');
define('BASE_DIR', dirname(__DIR__));

require BASE_DIR.'/app/Models/ClientModel.php';
require BASE_DIR.'/app/Models/TelephoneModel.php';
require BASE_DIR.'/app/Models/validators.models.php';
require BASE_DIR.'/public/enums/messages.enum.php';

$databaseFile = BASE_DIR.'/data/database.json';
$database = json_decode(file_exists($databaseFile) ? file_get_contents($databaseFile) : '{"clients":[], "numeros":[]}', true);
$telModel = include BASE_DIR.'/app/Models/TelephoneModel.php';
$validator = include BASE_DIR.'/app/Models/validators.models.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formType = $_POST['form_type'] ?? '';
    $controller = match($formType) {
        'client' => include BASE_DIR.'/app/Controllers/ClientController.php',
        'numero' => include BASE_DIR.'/app/Controllers/TelephoneController.php',
        default => null
    };

    if ($controller) {
        $result = $controller['handle']($_POST, $database, $databaseFile);
        if (isset($result['redirect'])) {
            header("Location: ".$result['redirect']);
            exit;
        }
    } ;

    

}








$page = $_GET['page'] ?? 'client';
$action = $_GET['action'] ?? 'form';
$numero = $_GET['numero'] ?? null;
$matricule = $_GET['matricule'] ?? null;
$search = $_GET['search'] ?? null;
$operateur = $_GET['operateur'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    
    if (($page === 'dashboard') ||(!isset($page) )) {
           
        $controller = require BASE_DIR . '/app/Controllers/StatistiquesController.php';
        $controller['dashboard']($database);
    }

if($page === 'client')
{
    require_once BASE_DIR . '/app/Controllers/TelephoneController.php';
    require_once BASE_DIR.'/app/Views/client/form.html.php';
}
}

$page = $_GET['page'] ?? 'client';
$action = $_GET['action'] ?? 'form';
$matricule = $_GET['matricule'] ?? 'client';

if ($page === 'client' && $action === 'list') {
    require BASE_DIR.'/app/Views/client/liste.client.html.php';
} elseif ($page === 'telephone' && $action === 'list') {
    require_once BASE_DIR . '/app/Controllers/TelephoneController.php';
    require_once BASE_DIR.'/app/Views/telephone/telephone.html.php';
} elseif ($page === 'client' && $action === 'view_numbers') {
    require_once BASE_DIR.'/app/Views/client/liste.telephone.client.html.php';
} elseif ($page === 'telephone' && $action === 'add') {
    require_once BASE_DIR.'/app/Views/client/form.html.php';
}
elseif ($page === 'client' && $action === 'view_numbers' && isset($matricule)) {
    
    require_once BASE_DIR.'/app/Views/client/liste.telephone.client.html.php';
}elseif ($page === 'dashboard') {
    require_once BASE_DIR.'/app/Views/dashboard/dashboard.html.php';
}
elseif (($page === 'client' && $action === 'form')) {
    require_once BASE_DIR.'/app/Views/client/form.html.php';
}else {
    $controller = require_once BASE_DIR . '/app/Controllers/StatistiquesController.php';
    $controller['dashboard']($database);
}