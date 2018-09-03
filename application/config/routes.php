<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//USUÁRIO
$route['Usuario/painel-do-usuario'] = 'Usuario/dashboard';
$route['Usuario/cursos-inscritos'] = 'Usuario/cursosInscritos';

//cursos
$route['Cursos/Page/(:num)'] = 'Cursos/index/$1';
$route['Cursos/Page/(:num)/listarFiltro'] = 'Cursos/listarFiltro/$1';
$route['Cursos/(:num)/(:any)'] = 'Cursos/visCurso/$1/$2';
$route['Cursos'] = 'Cursos/Page/1';

//cursos finalizados
$route['Cursos/catalogoCursos'] = 'Cursos/catalogoCursos/1';
$route['Cursos/catalogoCursos/Page/(:num)'] = 'Cursos/catalogoCursos/$1';
$route['Cursos/Page/(:num)/Pesquisar_Catalogo'] = 'Cursos/listarFiltroCatalogoCursos/$1';

//noticias
$route['Noticias/Page/(:num)'] = 'Noticias/index/$1';
$route['Noticias/Page/(:num)/listarFiltro'] = 'Noticias/listarFiltro/$1';
$route['Noticias/(:num)/(:any)'] = 'Noticias/visNoticia/$1/$2';

$route['Contatos/enviando-email'] = 'Contatos/enviarEmail';
