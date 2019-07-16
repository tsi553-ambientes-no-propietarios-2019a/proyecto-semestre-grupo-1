<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/ciudad' => [[['_route' => 'city_index', '_controller' => 'App\\Controller\\CityController::index'], null, ['GET' => 0], null, true, false, null]],
        '/ciudad/new' => [[['_route' => 'city_new', '_controller' => 'App\\Controller\\CityController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/complain' => [[['_route' => 'complain_index', '_controller' => 'App\\Controller\\ComplainController::index'], null, ['GET' => 0], null, true, false, null]],
        '/complain/new' => [[['_route' => 'complain_new', '_controller' => 'App\\Controller\\ComplainController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/pais' => [[['_route' => 'country_index', '_controller' => 'App\\Controller\\CountryController::index'], null, ['GET' => 0], null, true, false, null]],
        '/pais/new' => [[['_route' => 'country_new', '_controller' => 'App\\Controller\\CountryController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'homepage', '_controller' => 'App\\Controller\\DefaultController::index'], null, ['GET' => 0], null, false, false, null]],
        '/station' => [[['_route' => 'station_index', '_controller' => 'App\\Controller\\StationController::index'], null, ['GET' => 0], null, true, false, null]],
        '/station/new' => [[['_route' => 'station_new', '_controller' => 'App\\Controller\\StationController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/unit' => [[['_route' => 'unit_index', '_controller' => 'App\\Controller\\UnitController::index'], null, ['GET' => 0], null, true, false, null]],
        '/unit/new' => [[['_route' => 'unit_new', '_controller' => 'App\\Controller\\UnitController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/usr' => [[['_route' => 'usr_index', '_controller' => 'App\\Controller\\UsrController::index'], null, ['GET' => 0], null, true, false, null]],
        '/usr/new' => [[['_route' => 'usr_new', '_controller' => 'App\\Controller\\UsrController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/login' => [[['_route' => 'fos_user_security_login', '_controller' => 'fos_user.security.controller:loginAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/login_check' => [[['_route' => 'fos_user_security_check', '_controller' => 'fos_user.security.controller:checkAction'], null, ['POST' => 0], null, false, false, null]],
        '/logout' => [[['_route' => 'fos_user_security_logout', '_controller' => 'fos_user.security.controller:logoutAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/perfil' => [[['_route' => 'fos_user_profile_show', '_controller' => 'fos_user.profile.controller:showAction'], null, ['GET' => 0], null, true, false, null]],
        '/perfil/edit' => [[['_route' => 'fos_user_profile_edit', '_controller' => 'fos_user.profile.controller:editAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/registro' => [[['_route' => 'fos_user_registration_register', '_controller' => 'fos_user.registration.controller:registerAction'], null, ['GET' => 0, 'POST' => 1], null, true, false, null]],
        '/registro/check-email' => [[['_route' => 'fos_user_registration_check_email', '_controller' => 'fos_user.registration.controller:checkEmailAction'], null, ['GET' => 0], null, false, false, null]],
        '/registro/confirmed' => [[['_route' => 'fos_user_registration_confirmed', '_controller' => 'fos_user.registration.controller:confirmedAction'], null, ['GET' => 0], null, false, false, null]],
        '/recuperar-clave/request' => [[['_route' => 'fos_user_resetting_request', '_controller' => 'fos_user.resetting.controller:requestAction'], null, ['GET' => 0], null, false, false, null]],
        '/recuperar-clave/send-email' => [[['_route' => 'fos_user_resetting_send_email', '_controller' => 'fos_user.resetting.controller:sendEmailAction'], null, ['POST' => 0], null, false, false, null]],
        '/recuperar-clave/check-email' => [[['_route' => 'fos_user_resetting_check_email', '_controller' => 'fos_user.resetting.controller:checkEmailAction'], null, ['GET' => 0], null, false, false, null]],
        '/perfil/change-password' => [[['_route' => 'fos_user_change_password', '_controller' => 'fos_user.change_password.controller:changePasswordAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/c(?'
                    .'|iudad/([^/]++)(?'
                        .'|(*:191)'
                        .'|/edit(*:204)'
                        .'|(*:212)'
                    .')'
                    .'|omplain/([^/]++)(?'
                        .'|(*:240)'
                        .'|/edit(*:253)'
                        .'|(*:261)'
                    .')'
                .')'
                .'|/pais/(?'
                    .'|([^/]++)(?'
                        .'|(*:291)'
                        .'|/edit(*:304)'
                        .'|(*:312)'
                    .')'
                    .'|ciudad_pais(*:332)'
                .')'
                .'|/station/([^/]++)(?'
                    .'|(*:361)'
                    .'|/edit(*:374)'
                    .'|(*:382)'
                .')'
                .'|/u(?'
                    .'|nit/([^/]++)(?'
                        .'|(*:411)'
                        .'|/edit(*:424)'
                        .'|(*:432)'
                    .')'
                    .'|sr/([^/]++)(?'
                        .'|(*:455)'
                        .'|/edit(*:468)'
                        .'|(*:476)'
                    .')'
                .')'
                .'|/re(?'
                    .'|gistro/confirm/([^/]++)(*:515)'
                    .'|cuperar\\-clave/reset/([^/]++)(*:552)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        191 => [[['_route' => 'city_show', '_controller' => 'App\\Controller\\CityController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        204 => [[['_route' => 'city_edit', '_controller' => 'App\\Controller\\CityController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        212 => [[['_route' => 'city_delete', '_controller' => 'App\\Controller\\CityController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        240 => [[['_route' => 'complain_show', '_controller' => 'App\\Controller\\ComplainController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        253 => [[['_route' => 'complain_edit', '_controller' => 'App\\Controller\\ComplainController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        261 => [[['_route' => 'complain_delete', '_controller' => 'App\\Controller\\ComplainController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        291 => [[['_route' => 'country_show', '_controller' => 'App\\Controller\\CountryController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        304 => [[['_route' => 'country_edit', '_controller' => 'App\\Controller\\CountryController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        312 => [[['_route' => 'country_delete', '_controller' => 'App\\Controller\\CountryController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        332 => [[['_route' => 'cities_by_country', '_controller' => 'App\\Controller\\CountryController::citiesByCountry'], [], null, null, false, false, 1]],
        361 => [[['_route' => 'station_show', '_controller' => 'App\\Controller\\StationController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        374 => [[['_route' => 'station_edit', '_controller' => 'App\\Controller\\StationController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        382 => [[['_route' => 'station_delete', '_controller' => 'App\\Controller\\StationController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        411 => [[['_route' => 'unit_show', '_controller' => 'App\\Controller\\UnitController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        424 => [[['_route' => 'unit_edit', '_controller' => 'App\\Controller\\UnitController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        432 => [[['_route' => 'unit_delete', '_controller' => 'App\\Controller\\UnitController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        455 => [[['_route' => 'usr_show', '_controller' => 'App\\Controller\\UsrController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        468 => [[['_route' => 'usr_edit', '_controller' => 'App\\Controller\\UsrController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        476 => [[['_route' => 'usr_delete', '_controller' => 'App\\Controller\\UsrController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        515 => [[['_route' => 'fos_user_registration_confirm', '_controller' => 'fos_user.registration.controller:confirmAction'], ['token'], ['GET' => 0], null, false, true, null]],
        552 => [
            [['_route' => 'fos_user_resetting_reset', '_controller' => 'fos_user.resetting.controller:resetAction'], ['token'], ['GET' => 0, 'POST' => 1], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    static function ($condition, $context, $request) { // $checkCondition
        switch ($condition) {
            case 1: return ($request->headers->get("X-Requested-With") == "XMLHttpRequest");
        }
    },
];
