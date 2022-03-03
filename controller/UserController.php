<?php

namespace App\controller;

use App\core\Controller;
use App\model\Cities;
use App\model\Departments;
use App\model\Regions;
use App\model\User;

class UserController extends Controller
{
    public function login()
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) == 'get') {
            $this->renderView('user/login');
        } elseif (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $user = (new User())->getOneByMail($_POST['email']);
                if (is_null($user)) {
                    $this->renderView('user/login', [
                        'error' => "L'utilisateur n'existe pas"
                    ]);
                    return;
                }
                // TODO comparer un mot de passe crypté avec le mot passe saisi par l'utilisateur
                if (password_verify($_POST['password'], $user->getPassword())) {
                    // on doit garder une trace pour aux autres pages qu'il est authentifié
                    session_start();
                    $_SESSION['isLogged'] = true;
                    $user->beforeInsertInSession();
                    $_SESSION['user'] = $user;

                    // rediriger vers son backoffice
                    $this->redirectToRoute('dashboard');
                } else {
                    $this->renderView('user/login', [
                        'error' => "Mot de passe érroné"
                    ]);
                    return;
                }
            }
        }

    }

    public function logout()
    {
        session_start();
        $_SESSION['isLogged'] = false;

        $this->redirectToRoute("login");
    }

    public function dashboard()
    {
        session_start();
        if (!isset($_SESSION['isLogged']) || !$_SESSION['isLogged']) {
            $this->redirectToRoute('login');
        }
        $this->renderView('user/dashboard');
    }

    public function register()
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $user = new User();
                $user->setEmail($_POST['email']);
                try {
                    $user->setPassword($_POST['password']);
                } catch (\Exception $e) {
                    $this->renderView('user/register', [
                        'error' => $e->getMessage()
                    ]);

                }
                try {
                    $user->insert();

                } catch (\Exception $exception) {

                    if ($exception->getCode() == 23000) {
                        $error = "Cette adresse Mail existe déjà";
                    }
                    $this->renderView('user/register', [
                        'error' => $error
                    ]);
                }

            }

        }

        // ici je vais récupérer les régions

        $regions = (new Regions())->getAll();

        $this->renderView('user/register', [
            'regions' => $regions
        ]);
    }

    public function getDepartements($code_region)
    {

        if (isset(apache_request_headers()['is-ajax']) && apache_request_headers()['is-ajax'] == true) {
            $departements = (new Departments())->getManyByRegionCode($code_region);
            $htmlCode = "<select class='form-control' id='regions_php'  onchange=\"getData('regions_php', 'cities')\">";
            foreach ($departements as $departement) {
                $htmlCode .= "<option value='{$departement->getCode()}'>{$departement->getName()}</option>";
            }
            $htmlCode .= "</select><div id='cities'></div>";

            $this->renderHTML($htmlCode);
        } else {
            $this->redirectToRoute('home');
        }
    }

    public function getCities($code_department)
    {
        if (isset(apache_request_headers()['is-ajax']) && apache_request_headers()['is-ajax'] == true) {
            $cities = (new Cities())->getManyByDepartmentCode($code_department);
            $htmlCode = "<select class='form-control' >";
            foreach ($cities as $city) {
                $htmlCode .= "<option value='{$city->getid()}'>{$city->getName()}</option>";
            }
            $htmlCode .= "</select>";

            $this->renderHTML($htmlCode);
        } else {
            $this->redirectToRoute('home');
        }
    }
}