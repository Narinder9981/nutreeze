<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === rtrim($pathinfo, '/')) {
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                        goto not__profiler_home;
                    } else {
                        return $this->redirect($rawPathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ('/_profiler/purge' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if ('/_configurator' === rtrim($pathinfo, '/')) {
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                        goto not__configurator_home;
                    } else {
                        return $this->redirect($rawPathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }
                not__configurator_home:

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ('/_configurator/final' === $pathinfo) {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/ws')) {
            // ws_wsaddaddress_addaddress
            if (0 === strpos($pathinfo, '/ws/addaddress') && preg_match('#^/ws/addaddress(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsaddaddress_addaddress')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSAddAddressController::addaddressAction',));
            }

            // ws_wsaddaddress_useraddresslist
            if (0 === strpos($pathinfo, '/ws/useraddresslist') && preg_match('#^/ws/useraddresslist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsaddaddress_useraddresslist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSAddAddressController::useraddresslistAction',));
            }

        }

        // ws_wsaddaddress_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsaddaddress_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSAddAddressController::fileupload1',));
        }

        // ws_wsaddaddress_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAddAddressController::mediauploadAction',  '_route' => 'ws_wsaddaddress_mediaupload',);
        }

        // ws_wsaddaddress_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAddAddressController::fireQuery',  '_route' => 'ws_wsaddaddress_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsaddaddress_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAddAddressController::getLoyalitypointAction',  '_route' => 'ws_wsaddaddress_getloyalitypoint',);
            }

            // ws_wsaddaddress_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAddAddressController::getHeightAction',  '_route' => 'ws_wsaddaddress_getheight',);
            }

            // ws_wsaddaddress_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAddAddressController::getWeightAction',  '_route' => 'ws_wsaddaddress_getweight',);
            }

            // ws_wsaddaddress_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAddAddressController::getCurrentpackageAction',  '_route' => 'ws_wsaddaddress_getcurrentpackage',);
            }

        }

        // ws_wsaddmeal_addmeal
        if (0 === strpos($pathinfo, '/ws/addMeal') && preg_match('#^/ws/addMeal(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsaddmeal_addmeal')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSAddMealController::addMealAction',));
        }

        // ws_wsaddmeal_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsaddmeal_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSAddMealController::fileupload1',));
        }

        // ws_wsaddmeal_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAddMealController::mediauploadAction',  '_route' => 'ws_wsaddmeal_mediaupload',);
        }

        // ws_wsaddmeal_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAddMealController::fireQuery',  '_route' => 'ws_wsaddmeal_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsaddmeal_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAddMealController::getLoyalitypointAction',  '_route' => 'ws_wsaddmeal_getloyalitypoint',);
            }

            // ws_wsaddmeal_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAddMealController::getHeightAction',  '_route' => 'ws_wsaddmeal_getheight',);
            }

            // ws_wsaddmeal_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAddMealController::getWeightAction',  '_route' => 'ws_wsaddmeal_getweight',);
            }

            // ws_wsaddmeal_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAddMealController::getCurrentpackageAction',  '_route' => 'ws_wsaddmeal_getcurrentpackage',);
            }

        }

        // ws_wsaddmealv1qtyupdate_addmealv1qtyupdate
        if (0 === strpos($pathinfo, '/ws/addMealV1QtyUpdate') && preg_match('#^/ws/addMealV1QtyUpdate(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsaddmealv1qtyupdate_addmealv1qtyupdate')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSAddMealV1QtyUpdateController::addMealV1QtyUpdateAction',));
        }

        // ws_wsaddmealv1qtyupdate_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsaddmealv1qtyupdate_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSAddMealV1QtyUpdateController::fileupload1',));
        }

        // ws_wsaddmealv1qtyupdate_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAddMealV1QtyUpdateController::mediauploadAction',  '_route' => 'ws_wsaddmealv1qtyupdate_mediaupload',);
        }

        // ws_wsaddmealv1qtyupdate_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAddMealV1QtyUpdateController::fireQuery',  '_route' => 'ws_wsaddmealv1qtyupdate_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsaddmealv1qtyupdate_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAddMealV1QtyUpdateController::getLoyalitypointAction',  '_route' => 'ws_wsaddmealv1qtyupdate_getloyalitypoint',);
            }

            // ws_wsaddmealv1qtyupdate_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAddMealV1QtyUpdateController::getHeightAction',  '_route' => 'ws_wsaddmealv1qtyupdate_getheight',);
            }

            // ws_wsaddmealv1qtyupdate_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAddMealV1QtyUpdateController::getWeightAction',  '_route' => 'ws_wsaddmealv1qtyupdate_getweight',);
            }

            // ws_wsaddmealv1qtyupdate_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAddMealV1QtyUpdateController::getCurrentpackageAction',  '_route' => 'ws_wsaddmealv1qtyupdate_getcurrentpackage',);
            }

        }

        if (0 === strpos($pathinfo, '/ws')) {
            // ws_wsadminshopstatus_getadminshopstaus
            if (0 === strpos($pathinfo, '/ws/getadminshopstaus') && preg_match('#^/ws/getadminshopstaus(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsadminshopstatus_getadminshopstaus')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSAdminshopstatusController::getadminshopstausAction',));
            }

            // ws_wsadminshopstatus_notifymeadd
            if (0 === strpos($pathinfo, '/ws/notifymeadd') && preg_match('#^/ws/notifymeadd(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsadminshopstatus_notifymeadd')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSAdminshopstatusController::notifymeaddAction',));
            }

        }

        // ws_wsadminshopstatus_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsadminshopstatus_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSAdminshopstatusController::fileupload1',));
        }

        // ws_wsadminshopstatus_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAdminshopstatusController::mediauploadAction',  '_route' => 'ws_wsadminshopstatus_mediaupload',);
        }

        // ws_wsadminshopstatus_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAdminshopstatusController::fireQuery',  '_route' => 'ws_wsadminshopstatus_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsadminshopstatus_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAdminshopstatusController::getLoyalitypointAction',  '_route' => 'ws_wsadminshopstatus_getloyalitypoint',);
            }

            // ws_wsadminshopstatus_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAdminshopstatusController::getHeightAction',  '_route' => 'ws_wsadminshopstatus_getheight',);
            }

            // ws_wsadminshopstatus_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAdminshopstatusController::getWeightAction',  '_route' => 'ws_wsadminshopstatus_getweight',);
            }

            // ws_wsadminshopstatus_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAdminshopstatusController::getCurrentpackageAction',  '_route' => 'ws_wsadminshopstatus_getcurrentpackage',);
            }

        }

        // ws_wsappversion_appversionlist
        if (0 === strpos($pathinfo, '/ws/appversionlist') && preg_match('#^/ws/appversionlist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsappversion_appversionlist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSAppversionController::appversionlistAction',));
        }

        // ws_wsappversion_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsappversion_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSAppversionController::fileupload1',));
        }

        // ws_wsappversion_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAppversionController::mediauploadAction',  '_route' => 'ws_wsappversion_mediaupload',);
        }

        // ws_wsappversion_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAppversionController::fireQuery',  '_route' => 'ws_wsappversion_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsappversion_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAppversionController::getLoyalitypointAction',  '_route' => 'ws_wsappversion_getloyalitypoint',);
            }

            // ws_wsappversion_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAppversionController::getHeightAction',  '_route' => 'ws_wsappversion_getheight',);
            }

            // ws_wsappversion_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAppversionController::getWeightAction',  '_route' => 'ws_wsappversion_getweight',);
            }

            // ws_wsappversion_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAppversionController::getCurrentpackageAction',  '_route' => 'ws_wsappversion_getcurrentpackage',);
            }

        }

        // ws_wsarea_arealist
        if (0 === strpos($pathinfo, '/ws/arealist') && preg_match('#^/ws/arealist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsarea_arealist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSAreaController::arealistAction',));
        }

        // ws_wsarea_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsarea_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSAreaController::fileupload1',));
        }

        // ws_wsarea_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAreaController::mediauploadAction',  '_route' => 'ws_wsarea_mediaupload',);
        }

        // ws_wsarea_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAreaController::fireQuery',  '_route' => 'ws_wsarea_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsarea_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAreaController::getLoyalitypointAction',  '_route' => 'ws_wsarea_getloyalitypoint',);
            }

            // ws_wsarea_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAreaController::getHeightAction',  '_route' => 'ws_wsarea_getheight',);
            }

            // ws_wsarea_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAreaController::getWeightAction',  '_route' => 'ws_wsarea_getweight',);
            }

            // ws_wsarea_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAreaController::getCurrentpackageAction',  '_route' => 'ws_wsarea_getcurrentpackage',);
            }

        }

        // ws_wsbanner_get_banner
        if (0 === strpos($pathinfo, '/ws/get_banner') && preg_match('#^/ws/get_banner(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsbanner_get_banner')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSBannerController::get_bannerAction',));
        }

        // ws_wsbanner_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsbanner_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSBannerController::fileupload1',));
        }

        // ws_wsbanner_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSBannerController::mediauploadAction',  '_route' => 'ws_wsbanner_mediaupload',);
        }

        // ws_wsbanner_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSBannerController::fireQuery',  '_route' => 'ws_wsbanner_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsbanner_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSBannerController::getLoyalitypointAction',  '_route' => 'ws_wsbanner_getloyalitypoint',);
            }

            // ws_wsbanner_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSBannerController::getHeightAction',  '_route' => 'ws_wsbanner_getheight',);
            }

            // ws_wsbanner_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSBannerController::getWeightAction',  '_route' => 'ws_wsbanner_getweight',);
            }

            // ws_wsbanner_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSBannerController::getCurrentpackageAction',  '_route' => 'ws_wsbanner_getcurrentpackage',);
            }

        }

        // ws_wsbase_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsbase_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSBaseController::fileupload1',));
        }

        // ws_wsbase_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSBaseController::mediauploadAction',  '_route' => 'ws_wsbase_mediaupload',);
        }

        // ws_wsbase_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSBaseController::fireQuery',  '_route' => 'ws_wsbase_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsbase_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSBaseController::getLoyalitypointAction',  '_route' => 'ws_wsbase_getloyalitypoint',);
            }

            // ws_wsbase_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSBaseController::getHeightAction',  '_route' => 'ws_wsbase_getheight',);
            }

            // ws_wsbase_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSBaseController::getWeightAction',  '_route' => 'ws_wsbase_getweight',);
            }

            // ws_wsbase_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSBaseController::getCurrentpackageAction',  '_route' => 'ws_wsbase_getcurrentpackage',);
            }

        }

        // ws_wscontactus_contactus
        if (0 === strpos($pathinfo, '/ws/contactus') && preg_match('#^/ws/contactus(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wscontactus_contactus')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSContactusController::contactusAction',));
        }

        // ws_wscontactus_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wscontactus_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSContactusController::fileupload1',));
        }

        // ws_wscontactus_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSContactusController::mediauploadAction',  '_route' => 'ws_wscontactus_mediaupload',);
        }

        // ws_wscontactus_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSContactusController::fireQuery',  '_route' => 'ws_wscontactus_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wscontactus_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSContactusController::getLoyalitypointAction',  '_route' => 'ws_wscontactus_getloyalitypoint',);
            }

            // ws_wscontactus_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSContactusController::getHeightAction',  '_route' => 'ws_wscontactus_getheight',);
            }

            // ws_wscontactus_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSContactusController::getWeightAction',  '_route' => 'ws_wscontactus_getweight',);
            }

            // ws_wscontactus_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSContactusController::getCurrentpackageAction',  '_route' => 'ws_wscontactus_getcurrentpackage',);
            }

        }

        // ws_wscountry_countrylist
        if (0 === strpos($pathinfo, '/ws/countrylist') && preg_match('#^/ws/countrylist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wscountry_countrylist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSCountryController::countrylistAction',));
        }

        // ws_wscountry_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wscountry_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSCountryController::fileupload1',));
        }

        // ws_wscountry_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSCountryController::mediauploadAction',  '_route' => 'ws_wscountry_mediaupload',);
        }

        // ws_wscountry_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSCountryController::fireQuery',  '_route' => 'ws_wscountry_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wscountry_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSCountryController::getLoyalitypointAction',  '_route' => 'ws_wscountry_getloyalitypoint',);
            }

            // ws_wscountry_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSCountryController::getHeightAction',  '_route' => 'ws_wscountry_getheight',);
            }

            // ws_wscountry_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSCountryController::getWeightAction',  '_route' => 'ws_wscountry_getweight',);
            }

            // ws_wscountry_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSCountryController::getCurrentpackageAction',  '_route' => 'ws_wscountry_getcurrentpackage',);
            }

        }

        // ws_wsdeliverymethods_deliverymethodlist
        if (0 === strpos($pathinfo, '/ws/DeliveryMethod') && preg_match('#^/ws/DeliveryMethod(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsdeliverymethods_deliverymethodlist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSDeliveryMethodsController::deliveryMethodlistAction',));
        }

        // ws_wsdeliverymethods_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsdeliverymethods_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSDeliveryMethodsController::fileupload1',));
        }

        // ws_wsdeliverymethods_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryMethodsController::mediauploadAction',  '_route' => 'ws_wsdeliverymethods_mediaupload',);
        }

        // ws_wsdeliverymethods_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryMethodsController::fireQuery',  '_route' => 'ws_wsdeliverymethods_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsdeliverymethods_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryMethodsController::getLoyalitypointAction',  '_route' => 'ws_wsdeliverymethods_getloyalitypoint',);
            }

            // ws_wsdeliverymethods_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryMethodsController::getHeightAction',  '_route' => 'ws_wsdeliverymethods_getheight',);
            }

            // ws_wsdeliverymethods_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryMethodsController::getWeightAction',  '_route' => 'ws_wsdeliverymethods_getweight',);
            }

            // ws_wsdeliverymethods_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryMethodsController::getCurrentpackageAction',  '_route' => 'ws_wsdeliverymethods_getcurrentpackage',);
            }

        }

        // ws_wsdeliveryorderstatus_deliveryorderstatus
        if (0 === strpos($pathinfo, '/ws/deliveryorderstatus') && preg_match('#^/ws/deliveryorderstatus(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsdeliveryorderstatus_deliveryorderstatus')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSDeliveryOrderStatusController::deliveryorderstatusAction',));
        }

        // ws_wsdeliveryorderstatus_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsdeliveryorderstatus_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSDeliveryOrderStatusController::fileupload1',));
        }

        // ws_wsdeliveryorderstatus_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryOrderStatusController::mediauploadAction',  '_route' => 'ws_wsdeliveryorderstatus_mediaupload',);
        }

        // ws_wsdeliveryorderstatus_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryOrderStatusController::fireQuery',  '_route' => 'ws_wsdeliveryorderstatus_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsdeliveryorderstatus_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryOrderStatusController::getLoyalitypointAction',  '_route' => 'ws_wsdeliveryorderstatus_getloyalitypoint',);
            }

            // ws_wsdeliveryorderstatus_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryOrderStatusController::getHeightAction',  '_route' => 'ws_wsdeliveryorderstatus_getheight',);
            }

            // ws_wsdeliveryorderstatus_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryOrderStatusController::getWeightAction',  '_route' => 'ws_wsdeliveryorderstatus_getweight',);
            }

            // ws_wsdeliveryorderstatus_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryOrderStatusController::getCurrentpackageAction',  '_route' => 'ws_wsdeliveryorderstatus_getcurrentpackage',);
            }

        }

        // ws_wsdeliveryreasonlist_deliveryreasonlist
        if (0 === strpos($pathinfo, '/ws/deliveryreasonlist') && preg_match('#^/ws/deliveryreasonlist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsdeliveryreasonlist_deliveryreasonlist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSDeliveryReasonListController::deliveryreasonlistAction',));
        }

        // ws_wsdeliveryreasonlist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsdeliveryreasonlist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSDeliveryReasonListController::fileupload1',));
        }

        // ws_wsdeliveryreasonlist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryReasonListController::mediauploadAction',  '_route' => 'ws_wsdeliveryreasonlist_mediaupload',);
        }

        // ws_wsdeliveryreasonlist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryReasonListController::fireQuery',  '_route' => 'ws_wsdeliveryreasonlist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsdeliveryreasonlist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryReasonListController::getLoyalitypointAction',  '_route' => 'ws_wsdeliveryreasonlist_getloyalitypoint',);
            }

            // ws_wsdeliveryreasonlist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryReasonListController::getHeightAction',  '_route' => 'ws_wsdeliveryreasonlist_getheight',);
            }

            // ws_wsdeliveryreasonlist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryReasonListController::getWeightAction',  '_route' => 'ws_wsdeliveryreasonlist_getweight',);
            }

            // ws_wsdeliveryreasonlist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDeliveryReasonListController::getCurrentpackageAction',  '_route' => 'ws_wsdeliveryreasonlist_getcurrentpackage',);
            }

        }

        // ws_wsdietstatuslist_dietstatuslist
        if (0 === strpos($pathinfo, '/ws/dietstatuslist') && preg_match('#^/ws/dietstatuslist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsdietstatuslist_dietstatuslist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSDietStatusListController::dietstatuslistAction',));
        }

        // ws_wsdietstatuslist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsdietstatuslist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSDietStatusListController::fileupload1',));
        }

        // ws_wsdietstatuslist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSDietStatusListController::mediauploadAction',  '_route' => 'ws_wsdietstatuslist_mediaupload',);
        }

        // ws_wsdietstatuslist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSDietStatusListController::fireQuery',  '_route' => 'ws_wsdietstatuslist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsdietstatuslist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDietStatusListController::getLoyalitypointAction',  '_route' => 'ws_wsdietstatuslist_getloyalitypoint',);
            }

            // ws_wsdietstatuslist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDietStatusListController::getHeightAction',  '_route' => 'ws_wsdietstatuslist_getheight',);
            }

            // ws_wsdietstatuslist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDietStatusListController::getWeightAction',  '_route' => 'ws_wsdietstatuslist_getweight',);
            }

            // ws_wsdietstatuslist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDietStatusListController::getCurrentpackageAction',  '_route' => 'ws_wsdietstatuslist_getcurrentpackage',);
            }

        }

        // ws_wsdietitianrequest_senddietcallrequest
        if (0 === strpos($pathinfo, '/ws/senddietcallrequest') && preg_match('#^/ws/senddietcallrequest(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsdietitianrequest_senddietcallrequest')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSDietitianRequestController::senddietcallrequestAction',));
        }

        // ws_wsdietitianrequest_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsdietitianrequest_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSDietitianRequestController::fileupload1',));
        }

        // ws_wsdietitianrequest_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSDietitianRequestController::mediauploadAction',  '_route' => 'ws_wsdietitianrequest_mediaupload',);
        }

        // ws_wsdietitianrequest_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSDietitianRequestController::fireQuery',  '_route' => 'ws_wsdietitianrequest_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsdietitianrequest_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDietitianRequestController::getLoyalitypointAction',  '_route' => 'ws_wsdietitianrequest_getloyalitypoint',);
            }

            // ws_wsdietitianrequest_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDietitianRequestController::getHeightAction',  '_route' => 'ws_wsdietitianrequest_getheight',);
            }

            // ws_wsdietitianrequest_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDietitianRequestController::getWeightAction',  '_route' => 'ws_wsdietitianrequest_getweight',);
            }

            // ws_wsdietitianrequest_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSDietitianRequestController::getCurrentpackageAction',  '_route' => 'ws_wsdietitianrequest_getcurrentpackage',);
            }

        }

        // ws_wsfaqslist_faqslist
        if (0 === strpos($pathinfo, '/ws/faqslist') && preg_match('#^/ws/faqslist(?:/(?P<param>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsfaqslist_faqslist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSFAQsListController::faqslistAction',));
        }

        // ws_wsfaqslist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsfaqslist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSFAQsListController::fileupload1',));
        }

        // ws_wsfaqslist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSFAQsListController::mediauploadAction',  '_route' => 'ws_wsfaqslist_mediaupload',);
        }

        // ws_wsfaqslist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSFAQsListController::fireQuery',  '_route' => 'ws_wsfaqslist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsfaqslist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSFAQsListController::getLoyalitypointAction',  '_route' => 'ws_wsfaqslist_getloyalitypoint',);
            }

            // ws_wsfaqslist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSFAQsListController::getHeightAction',  '_route' => 'ws_wsfaqslist_getheight',);
            }

            // ws_wsfaqslist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSFAQsListController::getWeightAction',  '_route' => 'ws_wsfaqslist_getweight',);
            }

            // ws_wsfaqslist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSFAQsListController::getCurrentpackageAction',  '_route' => 'ws_wsfaqslist_getcurrentpackage',);
            }

        }

        // ws_wsforgotpass_passwordreset
        if (0 === strpos($pathinfo, '/ws/passwordreset') && preg_match('#^/ws/passwordreset(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsforgotpass_passwordreset')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSForgotpassController::passwordreset',));
        }

        if (0 === strpos($pathinfo, '/passwordreset')) {
            // ws_wsforgotpass_passwordresetview
            if (0 === strpos($pathinfo, '/passwordresetview') && preg_match('#^/passwordresetview(?:/(?P<hash>[^/]++)(?:/(?P<email>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsforgotpass_passwordresetview')), array (  'hash' => '',  'email' => '',  '_controller' => 'WSBundle\\Controller\\WSForgotpassController::passwordresetviewAction',));
            }

            // ws_wsforgotpass_passwordresetform
            if ('/passwordresetform' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSForgotpassController::passwordresetformAction',  '_route' => 'ws_wsforgotpass_passwordresetform',);
            }

        }

        // ws_wsforgotpass_changepassword
        if (0 === strpos($pathinfo, '/ws/changepassword') && preg_match('#^/ws/changepassword(?:/(?P<user_id>[^/]++)(?:/(?P<old_pass>[^/]++)(?:/(?P<new_pass>[^/]++))?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsforgotpass_changepassword')), array (  'user_id' => '',  'old_pass' => '',  'new_pass' => '',  '_controller' => 'WSBundle\\Controller\\WSForgotpassController::changepasswordAction',));
        }

        // ws_wsforgotpass_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsforgotpass_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSForgotpassController::fileupload1',));
        }

        // ws_wsforgotpass_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSForgotpassController::mediauploadAction',  '_route' => 'ws_wsforgotpass_mediaupload',);
        }

        // ws_wsforgotpass_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSForgotpassController::fireQuery',  '_route' => 'ws_wsforgotpass_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsforgotpass_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSForgotpassController::getLoyalitypointAction',  '_route' => 'ws_wsforgotpass_getloyalitypoint',);
            }

            // ws_wsforgotpass_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSForgotpassController::getHeightAction',  '_route' => 'ws_wsforgotpass_getheight',);
            }

            // ws_wsforgotpass_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSForgotpassController::getWeightAction',  '_route' => 'ws_wsforgotpass_getweight',);
            }

            // ws_wsforgotpass_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSForgotpassController::getCurrentpackageAction',  '_route' => 'ws_wsforgotpass_getcurrentpackage',);
            }

        }

        // ws_wsgallerylist_gallerylist
        if (0 === strpos($pathinfo, '/ws/gallerylist') && preg_match('#^/ws/gallerylist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgallerylist_gallerylist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSGallerylistController::gallerylistAction',));
        }

        // ws_wsgallerylist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgallerylist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSGallerylistController::fileupload1',));
        }

        // ws_wsgallerylist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGallerylistController::mediauploadAction',  '_route' => 'ws_wsgallerylist_mediaupload',);
        }

        // ws_wsgallerylist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGallerylistController::fireQuery',  '_route' => 'ws_wsgallerylist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsgallerylist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGallerylistController::getLoyalitypointAction',  '_route' => 'ws_wsgallerylist_getloyalitypoint',);
            }

            // ws_wsgallerylist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGallerylistController::getHeightAction',  '_route' => 'ws_wsgallerylist_getheight',);
            }

            // ws_wsgallerylist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGallerylistController::getWeightAction',  '_route' => 'ws_wsgallerylist_getweight',);
            }

            // ws_wsgallerylist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGallerylistController::getCurrentpackageAction',  '_route' => 'ws_wsgallerylist_getcurrentpackage',);
            }

        }

        // ws_wsaboutus_aboutus
        if (0 === strpos($pathinfo, '/ws/aboutus') && preg_match('#^/ws/aboutus(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsaboutus_aboutus')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSAboutusController::aboutusAction',));
        }

        // ws_wsaboutus_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsaboutus_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSAboutusController::fileupload1',));
        }

        // ws_wsaboutus_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAboutusController::mediauploadAction',  '_route' => 'ws_wsaboutus_mediaupload',);
        }

        // ws_wsaboutus_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSAboutusController::fireQuery',  '_route' => 'ws_wsaboutus_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsaboutus_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAboutusController::getLoyalitypointAction',  '_route' => 'ws_wsaboutus_getloyalitypoint',);
            }

            // ws_wsaboutus_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAboutusController::getHeightAction',  '_route' => 'ws_wsaboutus_getheight',);
            }

            // ws_wsaboutus_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAboutusController::getWeightAction',  '_route' => 'ws_wsaboutus_getweight',);
            }

            // ws_wsaboutus_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSAboutusController::getCurrentpackageAction',  '_route' => 'ws_wsaboutus_getcurrentpackage',);
            }

        }

        // ws_wsgetappinfo_getappinfo
        if (0 === strpos($pathinfo, '/ws/getAppInfo') && preg_match('#^/ws/getAppInfo(?:/(?P<param>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetappinfo_getappinfo')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSGetAppInfoController::getAppInfoAction',));
        }

        // ws_wsgetappinfo_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetappinfo_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSGetAppInfoController::fileupload1',));
        }

        // ws_wsgetappinfo_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetAppInfoController::mediauploadAction',  '_route' => 'ws_wsgetappinfo_mediaupload',);
        }

        // ws_wsgetappinfo_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetAppInfoController::fireQuery',  '_route' => 'ws_wsgetappinfo_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsgetappinfo_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetAppInfoController::getLoyalitypointAction',  '_route' => 'ws_wsgetappinfo_getloyalitypoint',);
            }

            // ws_wsgetappinfo_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetAppInfoController::getHeightAction',  '_route' => 'ws_wsgetappinfo_getheight',);
            }

            // ws_wsgetappinfo_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetAppInfoController::getWeightAction',  '_route' => 'ws_wsgetappinfo_getweight',);
            }

            // ws_wsgetappinfo_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetAppInfoController::getCurrentpackageAction',  '_route' => 'ws_wsgetappinfo_getcurrentpackage',);
            }

        }

        // ws_wsgetdriversorders_getdriversorders
        if (0 === strpos($pathinfo, '/ws/getDriversOrders') && preg_match('#^/ws/getDriversOrders(?:/(?P<param>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetdriversorders_getdriversorders')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersController::getDriversOrdersAction',));
        }

        // ws_wsgetdriversorders_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetdriversorders_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersController::fileupload1',));
        }

        // ws_wsgetdriversorders_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersController::mediauploadAction',  '_route' => 'ws_wsgetdriversorders_mediaupload',);
        }

        // ws_wsgetdriversorders_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersController::fireQuery',  '_route' => 'ws_wsgetdriversorders_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsgetdriversorders_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersController::getLoyalitypointAction',  '_route' => 'ws_wsgetdriversorders_getloyalitypoint',);
            }

            // ws_wsgetdriversorders_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersController::getHeightAction',  '_route' => 'ws_wsgetdriversorders_getheight',);
            }

            // ws_wsgetdriversorders_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersController::getWeightAction',  '_route' => 'ws_wsgetdriversorders_getweight',);
            }

            // ws_wsgetdriversorders_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersController::getCurrentpackageAction',  '_route' => 'ws_wsgetdriversorders_getcurrentpackage',);
            }

        }

        // ws_wsgetdriversordersv1qtyupdate_getdriversordersv1qtyupdate
        if (0 === strpos($pathinfo, '/ws/getDriversOrdersV1QtyUpdate') && preg_match('#^/ws/getDriversOrdersV1QtyUpdate(?:/(?P<param>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetdriversordersv1qtyupdate_getdriversordersv1qtyupdate')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersV1QtyUpdateController::getDriversOrdersV1QtyUpdateAction',));
        }

        // ws_wsgetdriversordersv1qtyupdate_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetdriversordersv1qtyupdate_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersV1QtyUpdateController::fileupload1',));
        }

        // ws_wsgetdriversordersv1qtyupdate_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersV1QtyUpdateController::mediauploadAction',  '_route' => 'ws_wsgetdriversordersv1qtyupdate_mediaupload',);
        }

        // ws_wsgetdriversordersv1qtyupdate_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersV1QtyUpdateController::fireQuery',  '_route' => 'ws_wsgetdriversordersv1qtyupdate_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsgetdriversordersv1qtyupdate_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersV1QtyUpdateController::getLoyalitypointAction',  '_route' => 'ws_wsgetdriversordersv1qtyupdate_getloyalitypoint',);
            }

            // ws_wsgetdriversordersv1qtyupdate_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersV1QtyUpdateController::getHeightAction',  '_route' => 'ws_wsgetdriversordersv1qtyupdate_getheight',);
            }

            // ws_wsgetdriversordersv1qtyupdate_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersV1QtyUpdateController::getWeightAction',  '_route' => 'ws_wsgetdriversordersv1qtyupdate_getweight',);
            }

            // ws_wsgetdriversordersv1qtyupdate_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetDriversOrdersV1QtyUpdateController::getCurrentpackageAction',  '_route' => 'ws_wsgetdriversordersv1qtyupdate_getcurrentpackage',);
            }

        }

        // ws_wsgetmymeal_getmymeal
        if (0 === strpos($pathinfo, '/ws/getMyMeal') && preg_match('#^/ws/getMyMeal(?:/(?P<param>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetmymeal_getmymeal')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSGetMyMealController::getMyMealAction',));
        }

        // ws_wsgetmymeal_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetmymeal_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSGetMyMealController::fileupload1',));
        }

        // ws_wsgetmymeal_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyMealController::mediauploadAction',  '_route' => 'ws_wsgetmymeal_mediaupload',);
        }

        // ws_wsgetmymeal_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyMealController::fireQuery',  '_route' => 'ws_wsgetmymeal_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsgetmymeal_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyMealController::getLoyalitypointAction',  '_route' => 'ws_wsgetmymeal_getloyalitypoint',);
            }

            // ws_wsgetmymeal_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyMealController::getHeightAction',  '_route' => 'ws_wsgetmymeal_getheight',);
            }

            // ws_wsgetmymeal_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyMealController::getWeightAction',  '_route' => 'ws_wsgetmymeal_getweight',);
            }

            // ws_wsgetmymeal_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyMealController::getCurrentpackageAction',  '_route' => 'ws_wsgetmymeal_getcurrentpackage',);
            }

        }

        // ws_wsgetmymealv1qtyupdate_getmymealv1qtyupdate
        if (0 === strpos($pathinfo, '/ws/getMyMealV1QtyUpdate') && preg_match('#^/ws/getMyMealV1QtyUpdate(?:/(?P<param>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetmymealv1qtyupdate_getmymealv1qtyupdate')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSGetMyMealV1QtyUpdateController::getMyMealV1QtyUpdateAction',));
        }

        // ws_wsgetmymealv1qtyupdate_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetmymealv1qtyupdate_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSGetMyMealV1QtyUpdateController::fileupload1',));
        }

        // ws_wsgetmymealv1qtyupdate_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyMealV1QtyUpdateController::mediauploadAction',  '_route' => 'ws_wsgetmymealv1qtyupdate_mediaupload',);
        }

        // ws_wsgetmymealv1qtyupdate_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyMealV1QtyUpdateController::fireQuery',  '_route' => 'ws_wsgetmymealv1qtyupdate_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsgetmymealv1qtyupdate_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyMealV1QtyUpdateController::getLoyalitypointAction',  '_route' => 'ws_wsgetmymealv1qtyupdate_getloyalitypoint',);
            }

            // ws_wsgetmymealv1qtyupdate_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyMealV1QtyUpdateController::getHeightAction',  '_route' => 'ws_wsgetmymealv1qtyupdate_getheight',);
            }

            // ws_wsgetmymealv1qtyupdate_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyMealV1QtyUpdateController::getWeightAction',  '_route' => 'ws_wsgetmymealv1qtyupdate_getweight',);
            }

            // ws_wsgetmymealv1qtyupdate_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyMealV1QtyUpdateController::getCurrentpackageAction',  '_route' => 'ws_wsgetmymealv1qtyupdate_getcurrentpackage',);
            }

        }

        // ws_wsgetmyorders_getmyordersnotinuse
        if (0 === strpos($pathinfo, '/ws/getMyOrdersNotInuse') && preg_match('#^/ws/getMyOrdersNotInuse(?:/(?P<param>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetmyorders_getmyordersnotinuse')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSGetMyOrdersController::getMyOrdersNotInuseAction',));
        }

        // ws_wsgetmyorders_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetmyorders_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSGetMyOrdersController::fileupload1',));
        }

        // ws_wsgetmyorders_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyOrdersController::mediauploadAction',  '_route' => 'ws_wsgetmyorders_mediaupload',);
        }

        // ws_wsgetmyorders_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyOrdersController::fireQuery',  '_route' => 'ws_wsgetmyorders_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsgetmyorders_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyOrdersController::getLoyalitypointAction',  '_route' => 'ws_wsgetmyorders_getloyalitypoint',);
            }

            // ws_wsgetmyorders_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyOrdersController::getHeightAction',  '_route' => 'ws_wsgetmyorders_getheight',);
            }

            // ws_wsgetmyorders_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyOrdersController::getWeightAction',  '_route' => 'ws_wsgetmyorders_getweight',);
            }

            // ws_wsgetmyorders_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetMyOrdersController::getCurrentpackageAction',  '_route' => 'ws_wsgetmyorders_getcurrentpackage',);
            }

        }

        // ws_wsgetnotificationstatus_getnotification_status
        if (0 === strpos($pathinfo, '/ws/getnotification_status') && preg_match('#^/ws/getnotification_status(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetnotificationstatus_getnotification_status')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSGetNotificationStatusController::getnotification_statusAction',));
        }

        // ws_wsgetnotificationstatus_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetnotificationstatus_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSGetNotificationStatusController::fileupload1',));
        }

        // ws_wsgetnotificationstatus_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetNotificationStatusController::mediauploadAction',  '_route' => 'ws_wsgetnotificationstatus_mediaupload',);
        }

        // ws_wsgetnotificationstatus_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetNotificationStatusController::fireQuery',  '_route' => 'ws_wsgetnotificationstatus_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsgetnotificationstatus_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetNotificationStatusController::getLoyalitypointAction',  '_route' => 'ws_wsgetnotificationstatus_getloyalitypoint',);
            }

            // ws_wsgetnotificationstatus_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetNotificationStatusController::getHeightAction',  '_route' => 'ws_wsgetnotificationstatus_getheight',);
            }

            // ws_wsgetnotificationstatus_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetNotificationStatusController::getWeightAction',  '_route' => 'ws_wsgetnotificationstatus_getweight',);
            }

            // ws_wsgetnotificationstatus_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetNotificationStatusController::getCurrentpackageAction',  '_route' => 'ws_wsgetnotificationstatus_getcurrentpackage',);
            }

        }

        // ws_wsgetorderdatesdetails_getorderdates
        if (0 === strpos($pathinfo, '/ws/getOrderDates') && preg_match('#^/ws/getOrderDates(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetorderdatesdetails_getorderdates')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsController::getOrderDatesAction',));
        }

        // ws_wsgetorderdatesdetails_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetorderdatesdetails_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsController::fileupload1',));
        }

        // ws_wsgetorderdatesdetails_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsController::mediauploadAction',  '_route' => 'ws_wsgetorderdatesdetails_mediaupload',);
        }

        // ws_wsgetorderdatesdetails_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsController::fireQuery',  '_route' => 'ws_wsgetorderdatesdetails_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsgetorderdatesdetails_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsController::getLoyalitypointAction',  '_route' => 'ws_wsgetorderdatesdetails_getloyalitypoint',);
            }

            // ws_wsgetorderdatesdetails_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsController::getHeightAction',  '_route' => 'ws_wsgetorderdatesdetails_getheight',);
            }

            // ws_wsgetorderdatesdetails_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsController::getWeightAction',  '_route' => 'ws_wsgetorderdatesdetails_getweight',);
            }

            // ws_wsgetorderdatesdetails_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsController::getCurrentpackageAction',  '_route' => 'ws_wsgetorderdatesdetails_getcurrentpackage',);
            }

        }

        // ws_wsgetorderdatesdetailsforgram_getorderdatesforgram
        if (0 === strpos($pathinfo, '/ws/getOrderDatesForGram') && preg_match('#^/ws/getOrderDatesForGram(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetorderdatesdetailsforgram_getorderdatesforgram')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsForGramController::getOrderDatesForGramAction',));
        }

        // ws_wsgetorderdatesdetailsforgram_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgetorderdatesdetailsforgram_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsForGramController::fileupload1',));
        }

        // ws_wsgetorderdatesdetailsforgram_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsForGramController::mediauploadAction',  '_route' => 'ws_wsgetorderdatesdetailsforgram_mediaupload',);
        }

        // ws_wsgetorderdatesdetailsforgram_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsForGramController::fireQuery',  '_route' => 'ws_wsgetorderdatesdetailsforgram_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsgetorderdatesdetailsforgram_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsForGramController::getLoyalitypointAction',  '_route' => 'ws_wsgetorderdatesdetailsforgram_getloyalitypoint',);
            }

            // ws_wsgetorderdatesdetailsforgram_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsForGramController::getHeightAction',  '_route' => 'ws_wsgetorderdatesdetailsforgram_getheight',);
            }

            // ws_wsgetorderdatesdetailsforgram_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsForGramController::getWeightAction',  '_route' => 'ws_wsgetorderdatesdetailsforgram_getweight',);
            }

            // ws_wsgetorderdatesdetailsforgram_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGetOrderDatesDetailsForGramController::getCurrentpackageAction',  '_route' => 'ws_wsgetorderdatesdetailsforgram_getcurrentpackage',);
            }

        }

        // ws_wsgoallist_goallist
        if (0 === strpos($pathinfo, '/ws/goallist') && preg_match('#^/ws/goallist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgoallist_goallist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSGoalListController::goallistAction',));
        }

        // ws_wsgoallist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsgoallist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSGoalListController::fileupload1',));
        }

        // ws_wsgoallist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGoalListController::mediauploadAction',  '_route' => 'ws_wsgoallist_mediaupload',);
        }

        // ws_wsgoallist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSGoalListController::fireQuery',  '_route' => 'ws_wsgoallist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsgoallist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGoalListController::getLoyalitypointAction',  '_route' => 'ws_wsgoallist_getloyalitypoint',);
            }

            // ws_wsgoallist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGoalListController::getHeightAction',  '_route' => 'ws_wsgoallist_getheight',);
            }

            // ws_wsgoallist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGoalListController::getWeightAction',  '_route' => 'ws_wsgoallist_getweight',);
            }

            // ws_wsgoallist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSGoalListController::getCurrentpackageAction',  '_route' => 'ws_wsgoallist_getcurrentpackage',);
            }

        }

        // ws_wsheight_heightlist
        if (0 === strpos($pathinfo, '/ws/heightlist') && preg_match('#^/ws/heightlist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsheight_heightlist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSHeightController::heightlistAction',));
        }

        // ws_wsheight_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsheight_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSHeightController::fileupload1',));
        }

        // ws_wsheight_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSHeightController::mediauploadAction',  '_route' => 'ws_wsheight_mediaupload',);
        }

        // ws_wsheight_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSHeightController::fireQuery',  '_route' => 'ws_wsheight_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsheight_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSHeightController::getLoyalitypointAction',  '_route' => 'ws_wsheight_getloyalitypoint',);
            }

            // ws_wsheight_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSHeightController::getHeightAction',  '_route' => 'ws_wsheight_getheight',);
            }

            // ws_wsheight_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSHeightController::getWeightAction',  '_route' => 'ws_wsheight_getweight',);
            }

            // ws_wsheight_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSHeightController::getCurrentpackageAction',  '_route' => 'ws_wsheight_getcurrentpackage',);
            }

        }

        if (0 === strpos($pathinfo, '/ws/meallist')) {
            // ws_wsmeallist_meallist
            if (preg_match('#^/ws/meallist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsmeallist_meallist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSMealListController::meallistAction',));
            }

            // ws_wsmeallist_meallistv2
            if (0 === strpos($pathinfo, '/ws/meallistv2') && preg_match('#^/ws/meallistv2(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsmeallist_meallistv2')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSMealListController::meallistv2Action',));
            }

        }

        // ws_wsmeallist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsmeallist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSMealListController::fileupload1',));
        }

        // ws_wsmeallist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSMealListController::mediauploadAction',  '_route' => 'ws_wsmeallist_mediaupload',);
        }

        // ws_wsmeallist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSMealListController::fireQuery',  '_route' => 'ws_wsmeallist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsmeallist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMealListController::getLoyalitypointAction',  '_route' => 'ws_wsmeallist_getloyalitypoint',);
            }

            // ws_wsmeallist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMealListController::getHeightAction',  '_route' => 'ws_wsmeallist_getheight',);
            }

            // ws_wsmeallist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMealListController::getWeightAction',  '_route' => 'ws_wsmeallist_getweight',);
            }

            // ws_wsmeallist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMealListController::getCurrentpackageAction',  '_route' => 'ws_wsmeallist_getcurrentpackage',);
            }

        }

        // ws_wsmealtypelist_mealtypelist
        if (0 === strpos($pathinfo, '/ws/mealtypelist') && preg_match('#^/ws/mealtypelist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsmealtypelist_mealtypelist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSMealTypeListController::mealtypelistAction',));
        }

        // ws_wsmealtypelist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsmealtypelist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSMealTypeListController::fileupload1',));
        }

        // ws_wsmealtypelist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSMealTypeListController::mediauploadAction',  '_route' => 'ws_wsmealtypelist_mediaupload',);
        }

        // ws_wsmealtypelist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSMealTypeListController::fireQuery',  '_route' => 'ws_wsmealtypelist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsmealtypelist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMealTypeListController::getLoyalitypointAction',  '_route' => 'ws_wsmealtypelist_getloyalitypoint',);
            }

            // ws_wsmealtypelist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMealTypeListController::getHeightAction',  '_route' => 'ws_wsmealtypelist_getheight',);
            }

            // ws_wsmealtypelist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMealTypeListController::getWeightAction',  '_route' => 'ws_wsmealtypelist_getweight',);
            }

            // ws_wsmealtypelist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMealTypeListController::getCurrentpackageAction',  '_route' => 'ws_wsmealtypelist_getcurrentpackage',);
            }

        }

        // ws_wsmypackage_mypackage
        if (0 === strpos($pathinfo, '/ws/mypackage') && preg_match('#^/ws/mypackage(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsmypackage_mypackage')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSMyPackageController::mypackageAction',));
        }

        // ws_wsmypackage_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsmypackage_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSMyPackageController::fileupload1',));
        }

        // ws_wsmypackage_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSMyPackageController::mediauploadAction',  '_route' => 'ws_wsmypackage_mediaupload',);
        }

        // ws_wsmypackage_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSMyPackageController::fireQuery',  '_route' => 'ws_wsmypackage_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsmypackage_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMyPackageController::getLoyalitypointAction',  '_route' => 'ws_wsmypackage_getloyalitypoint',);
            }

            // ws_wsmypackage_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMyPackageController::getHeightAction',  '_route' => 'ws_wsmypackage_getheight',);
            }

            // ws_wsmypackage_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMyPackageController::getWeightAction',  '_route' => 'ws_wsmypackage_getweight',);
            }

            // ws_wsmypackage_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMyPackageController::getCurrentpackageAction',  '_route' => 'ws_wsmypackage_getcurrentpackage',);
            }

        }

        // ws_wsmypackagewithorderdates_mypackagewithorderdates
        if (0 === strpos($pathinfo, '/ws/mypackagewithorderdates') && preg_match('#^/ws/mypackagewithorderdates(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsmypackagewithorderdates_mypackagewithorderdates')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSMyPackageWithOrderDatesController::mypackagewithorderdatesAction',));
        }

        // ws_wsmypackagewithorderdates_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsmypackagewithorderdates_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSMyPackageWithOrderDatesController::fileupload1',));
        }

        // ws_wsmypackagewithorderdates_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSMyPackageWithOrderDatesController::mediauploadAction',  '_route' => 'ws_wsmypackagewithorderdates_mediaupload',);
        }

        // ws_wsmypackagewithorderdates_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSMyPackageWithOrderDatesController::fireQuery',  '_route' => 'ws_wsmypackagewithorderdates_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsmypackagewithorderdates_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMyPackageWithOrderDatesController::getLoyalitypointAction',  '_route' => 'ws_wsmypackagewithorderdates_getloyalitypoint',);
            }

            // ws_wsmypackagewithorderdates_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMyPackageWithOrderDatesController::getHeightAction',  '_route' => 'ws_wsmypackagewithorderdates_getheight',);
            }

            // ws_wsmypackagewithorderdates_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMyPackageWithOrderDatesController::getWeightAction',  '_route' => 'ws_wsmypackagewithorderdates_getweight',);
            }

            // ws_wsmypackagewithorderdates_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSMyPackageWithOrderDatesController::getCurrentpackageAction',  '_route' => 'ws_wsmypackagewithorderdates_getcurrentpackage',);
            }

        }

        // ws_wsnotificationstatus_notification_status
        if (0 === strpos($pathinfo, '/ws/notification_status') && preg_match('#^/ws/notification_status(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsnotificationstatus_notification_status')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSNotificationStatusController::notification_statusAction',));
        }

        // ws_wsnotificationstatus_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsnotificationstatus_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSNotificationStatusController::fileupload1',));
        }

        // ws_wsnotificationstatus_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSNotificationStatusController::mediauploadAction',  '_route' => 'ws_wsnotificationstatus_mediaupload',);
        }

        // ws_wsnotificationstatus_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSNotificationStatusController::fireQuery',  '_route' => 'ws_wsnotificationstatus_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsnotificationstatus_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSNotificationStatusController::getLoyalitypointAction',  '_route' => 'ws_wsnotificationstatus_getloyalitypoint',);
            }

            // ws_wsnotificationstatus_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSNotificationStatusController::getHeightAction',  '_route' => 'ws_wsnotificationstatus_getheight',);
            }

            // ws_wsnotificationstatus_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSNotificationStatusController::getWeightAction',  '_route' => 'ws_wsnotificationstatus_getweight',);
            }

            // ws_wsnotificationstatus_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSNotificationStatusController::getCurrentpackageAction',  '_route' => 'ws_wsnotificationstatus_getcurrentpackage',);
            }

        }

        // ws_wsoffdays_offdays
        if (0 === strpos($pathinfo, '/ws/GetOffDaysList') && preg_match('#^/ws/GetOffDaysList(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsoffdays_offdays')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSOffdaysController::offDaysAction',));
        }

        // ws_wsoffdays_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsoffdays_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSOffdaysController::fileupload1',));
        }

        // ws_wsoffdays_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSOffdaysController::mediauploadAction',  '_route' => 'ws_wsoffdays_mediaupload',);
        }

        // ws_wsoffdays_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSOffdaysController::fireQuery',  '_route' => 'ws_wsoffdays_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsoffdays_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOffdaysController::getLoyalitypointAction',  '_route' => 'ws_wsoffdays_getloyalitypoint',);
            }

            // ws_wsoffdays_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOffdaysController::getHeightAction',  '_route' => 'ws_wsoffdays_getheight',);
            }

            // ws_wsoffdays_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOffdaysController::getWeightAction',  '_route' => 'ws_wsoffdays_getweight',);
            }

            // ws_wsoffdays_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOffdaysController::getCurrentpackageAction',  '_route' => 'ws_wsoffdays_getcurrentpackage',);
            }

        }

        // ws_wsoodogetorderdetails_oodoorderdetailsperdate
        if (0 === strpos($pathinfo, '/ws/oodoOrderDetailsperdate') && preg_match('#^/ws/oodoOrderDetailsperdate(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsoodogetorderdetails_oodoorderdetailsperdate')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSOodoGetOrderDetailsController::oodoOrderDetailsperdateAction',));
        }

        // ws_wsoodogetorderdetails_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsoodogetorderdetails_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSOodoGetOrderDetailsController::fileupload1',));
        }

        // ws_wsoodogetorderdetails_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSOodoGetOrderDetailsController::mediauploadAction',  '_route' => 'ws_wsoodogetorderdetails_mediaupload',);
        }

        // ws_wsoodogetorderdetails_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSOodoGetOrderDetailsController::fireQuery',  '_route' => 'ws_wsoodogetorderdetails_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsoodogetorderdetails_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOodoGetOrderDetailsController::getLoyalitypointAction',  '_route' => 'ws_wsoodogetorderdetails_getloyalitypoint',);
            }

            // ws_wsoodogetorderdetails_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOodoGetOrderDetailsController::getHeightAction',  '_route' => 'ws_wsoodogetorderdetails_getheight',);
            }

            // ws_wsoodogetorderdetails_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOodoGetOrderDetailsController::getWeightAction',  '_route' => 'ws_wsoodogetorderdetails_getweight',);
            }

            // ws_wsoodogetorderdetails_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOodoGetOrderDetailsController::getCurrentpackageAction',  '_route' => 'ws_wsoodogetorderdetails_getcurrentpackage',);
            }

        }

        // ws_wsorderconfirm_confirmorder
        if (0 === strpos($pathinfo, '/ws/confirmOrder') && preg_match('#^/ws/confirmOrder(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsorderconfirm_confirmorder')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSOrderConfirmController::confirmOrderAction',));
        }

        // ws_wsorderconfirm_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsorderconfirm_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSOrderConfirmController::fileupload1',));
        }

        // ws_wsorderconfirm_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSOrderConfirmController::mediauploadAction',  '_route' => 'ws_wsorderconfirm_mediaupload',);
        }

        // ws_wsorderconfirm_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSOrderConfirmController::fireQuery',  '_route' => 'ws_wsorderconfirm_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsorderconfirm_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOrderConfirmController::getLoyalitypointAction',  '_route' => 'ws_wsorderconfirm_getloyalitypoint',);
            }

            // ws_wsorderconfirm_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOrderConfirmController::getHeightAction',  '_route' => 'ws_wsorderconfirm_getheight',);
            }

            // ws_wsorderconfirm_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOrderConfirmController::getWeightAction',  '_route' => 'ws_wsorderconfirm_getweight',);
            }

            // ws_wsorderconfirm_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOrderConfirmController::getCurrentpackageAction',  '_route' => 'ws_wsorderconfirm_getcurrentpackage',);
            }

        }

        // ws_wsordernotelist_ordernotelist
        if (0 === strpos($pathinfo, '/ws/ordernotelist') && preg_match('#^/ws/ordernotelist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsordernotelist_ordernotelist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSOrdernoteListController::ordernotelistAction',));
        }

        // ws_wsordernotelist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsordernotelist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSOrdernoteListController::fileupload1',));
        }

        // ws_wsordernotelist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSOrdernoteListController::mediauploadAction',  '_route' => 'ws_wsordernotelist_mediaupload',);
        }

        // ws_wsordernotelist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSOrdernoteListController::fireQuery',  '_route' => 'ws_wsordernotelist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsordernotelist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOrdernoteListController::getLoyalitypointAction',  '_route' => 'ws_wsordernotelist_getloyalitypoint',);
            }

            // ws_wsordernotelist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOrdernoteListController::getHeightAction',  '_route' => 'ws_wsordernotelist_getheight',);
            }

            // ws_wsordernotelist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOrdernoteListController::getWeightAction',  '_route' => 'ws_wsordernotelist_getweight',);
            }

            // ws_wsordernotelist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSOrdernoteListController::getCurrentpackageAction',  '_route' => 'ws_wsordernotelist_getcurrentpackage',);
            }

        }

        // ws_wspackagedetails_packagedetails
        if (0 === strpos($pathinfo, '/ws/packagedetails') && preg_match('#^/ws/packagedetails(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspackagedetails_packagedetails')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsController::packagedetailsAction',));
        }

        // ws_wspackagedetails_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspackagedetails_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsController::fileupload1',));
        }

        // ws_wspackagedetails_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsController::mediauploadAction',  '_route' => 'ws_wspackagedetails_mediaupload',);
        }

        // ws_wspackagedetails_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsController::fireQuery',  '_route' => 'ws_wspackagedetails_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wspackagedetails_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsController::getLoyalitypointAction',  '_route' => 'ws_wspackagedetails_getloyalitypoint',);
            }

            // ws_wspackagedetails_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsController::getHeightAction',  '_route' => 'ws_wspackagedetails_getheight',);
            }

            // ws_wspackagedetails_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsController::getWeightAction',  '_route' => 'ws_wspackagedetails_getweight',);
            }

            // ws_wspackagedetails_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsController::getCurrentpackageAction',  '_route' => 'ws_wspackagedetails_getcurrentpackage',);
            }

        }

        // ws_wspackagedetailsv2_packagedetails
        if (0 === strpos($pathinfo, '/ws/packagedetailsV2') && preg_match('#^/ws/packagedetailsV2(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspackagedetailsv2_packagedetails')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsV2Controller::packagedetailsAction',));
        }

        // ws_wspackagedetailsv2_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspackagedetailsv2_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsV2Controller::fileupload1',));
        }

        // ws_wspackagedetailsv2_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsV2Controller::mediauploadAction',  '_route' => 'ws_wspackagedetailsv2_mediaupload',);
        }

        // ws_wspackagedetailsv2_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsV2Controller::fireQuery',  '_route' => 'ws_wspackagedetailsv2_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wspackagedetailsv2_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsV2Controller::getLoyalitypointAction',  '_route' => 'ws_wspackagedetailsv2_getloyalitypoint',);
            }

            // ws_wspackagedetailsv2_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsV2Controller::getHeightAction',  '_route' => 'ws_wspackagedetailsv2_getheight',);
            }

            // ws_wspackagedetailsv2_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsV2Controller::getWeightAction',  '_route' => 'ws_wspackagedetailsv2_getweight',);
            }

            // ws_wspackagedetailsv2_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackageDetailsV2Controller::getCurrentpackageAction',  '_route' => 'ws_wspackagedetailsv2_getcurrentpackage',);
            }

        }

        // ws_wspackagetypelist_packagetypelist
        if (0 === strpos($pathinfo, '/ws/packagetypelist') && preg_match('#^/ws/packagetypelist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspackagetypelist_packagetypelist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSPackageTypelistController::packagetypelistAction',));
        }

        // ws_wspackagetypelist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspackagetypelist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSPackageTypelistController::fileupload1',));
        }

        // ws_wspackagetypelist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPackageTypelistController::mediauploadAction',  '_route' => 'ws_wspackagetypelist_mediaupload',);
        }

        // ws_wspackagetypelist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPackageTypelistController::fireQuery',  '_route' => 'ws_wspackagetypelist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wspackagetypelist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackageTypelistController::getLoyalitypointAction',  '_route' => 'ws_wspackagetypelist_getloyalitypoint',);
            }

            // ws_wspackagetypelist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackageTypelistController::getHeightAction',  '_route' => 'ws_wspackagetypelist_getheight',);
            }

            // ws_wspackagetypelist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackageTypelistController::getWeightAction',  '_route' => 'ws_wspackagetypelist_getweight',);
            }

            // ws_wspackagetypelist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackageTypelistController::getCurrentpackageAction',  '_route' => 'ws_wspackagetypelist_getcurrentpackage',);
            }

        }

        // ws_wspackagelist_packagelist
        if (0 === strpos($pathinfo, '/ws/packagelist') && preg_match('#^/ws/packagelist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspackagelist_packagelist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSPackagelistController::packagelistAction',));
        }

        // ws_wspackagelist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspackagelist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSPackagelistController::fileupload1',));
        }

        // ws_wspackagelist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistController::mediauploadAction',  '_route' => 'ws_wspackagelist_mediaupload',);
        }

        // ws_wspackagelist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistController::fireQuery',  '_route' => 'ws_wspackagelist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wspackagelist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistController::getLoyalitypointAction',  '_route' => 'ws_wspackagelist_getloyalitypoint',);
            }

            // ws_wspackagelist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistController::getHeightAction',  '_route' => 'ws_wspackagelist_getheight',);
            }

            // ws_wspackagelist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistController::getWeightAction',  '_route' => 'ws_wspackagelist_getweight',);
            }

            // ws_wspackagelist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistController::getCurrentpackageAction',  '_route' => 'ws_wspackagelist_getcurrentpackage',);
            }

        }

        // ws_wspackagelistforupgrade_packagelistforupgrade
        if (0 === strpos($pathinfo, '/ws/packagelistforupgrade') && preg_match('#^/ws/packagelistforupgrade(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspackagelistforupgrade_packagelistforupgrade')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSPackagelistForupgradeController::packagelistforupgradeAction',));
        }

        // ws_wspackagelistforupgrade_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspackagelistforupgrade_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSPackagelistForupgradeController::fileupload1',));
        }

        // ws_wspackagelistforupgrade_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistForupgradeController::mediauploadAction',  '_route' => 'ws_wspackagelistforupgrade_mediaupload',);
        }

        // ws_wspackagelistforupgrade_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistForupgradeController::fireQuery',  '_route' => 'ws_wspackagelistforupgrade_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wspackagelistforupgrade_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistForupgradeController::getLoyalitypointAction',  '_route' => 'ws_wspackagelistforupgrade_getloyalitypoint',);
            }

            // ws_wspackagelistforupgrade_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistForupgradeController::getHeightAction',  '_route' => 'ws_wspackagelistforupgrade_getheight',);
            }

            // ws_wspackagelistforupgrade_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistForupgradeController::getWeightAction',  '_route' => 'ws_wspackagelistforupgrade_getweight',);
            }

            // ws_wspackagelistforupgrade_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistForupgradeController::getCurrentpackageAction',  '_route' => 'ws_wspackagelistforupgrade_getcurrentpackage',);
            }

        }

        // ws_wspackagelistv2_packagelist
        if (0 === strpos($pathinfo, '/ws/packagelistV2') && preg_match('#^/ws/packagelistV2(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspackagelistv2_packagelist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSPackagelistV2Controller::packagelistAction',));
        }

        // ws_wspackagelistv2_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspackagelistv2_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSPackagelistV2Controller::fileupload1',));
        }

        // ws_wspackagelistv2_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistV2Controller::mediauploadAction',  '_route' => 'ws_wspackagelistv2_mediaupload',);
        }

        // ws_wspackagelistv2_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistV2Controller::fireQuery',  '_route' => 'ws_wspackagelistv2_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wspackagelistv2_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistV2Controller::getLoyalitypointAction',  '_route' => 'ws_wspackagelistv2_getloyalitypoint',);
            }

            // ws_wspackagelistv2_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistV2Controller::getHeightAction',  '_route' => 'ws_wspackagelistv2_getheight',);
            }

            // ws_wspackagelistv2_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistV2Controller::getWeightAction',  '_route' => 'ws_wspackagelistv2_getweight',);
            }

            // ws_wspackagelistv2_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPackagelistV2Controller::getCurrentpackageAction',  '_route' => 'ws_wspackagelistv2_getcurrentpackage',);
            }

        }

        // ws_wspromotionlist_promotionlist
        if (0 === strpos($pathinfo, '/ws/promotionlist') && preg_match('#^/ws/promotionlist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspromotionlist_promotionlist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSPromotionlistController::promotionlistAction',));
        }

        // ws_wspromotionlist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspromotionlist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSPromotionlistController::fileupload1',));
        }

        // ws_wspromotionlist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPromotionlistController::mediauploadAction',  '_route' => 'ws_wspromotionlist_mediaupload',);
        }

        // ws_wspromotionlist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPromotionlistController::fireQuery',  '_route' => 'ws_wspromotionlist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wspromotionlist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPromotionlistController::getLoyalitypointAction',  '_route' => 'ws_wspromotionlist_getloyalitypoint',);
            }

            // ws_wspromotionlist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPromotionlistController::getHeightAction',  '_route' => 'ws_wspromotionlist_getheight',);
            }

            // ws_wspromotionlist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPromotionlistController::getWeightAction',  '_route' => 'ws_wspromotionlist_getweight',);
            }

            // ws_wspromotionlist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPromotionlistController::getCurrentpackageAction',  '_route' => 'ws_wspromotionlist_getcurrentpackage',);
            }

        }

        // ws_wspurchaseoderdate_purchaseorderdate
        if (0 === strpos($pathinfo, '/ws/purchaseorderdate') && preg_match('#^/ws/purchaseorderdate(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspurchaseoderdate_purchaseorderdate')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSPurchaseOderDateController::purchaseorderdateAction',));
        }

        // ws_wspurchaseoderdate_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspurchaseoderdate_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSPurchaseOderDateController::fileupload1',));
        }

        // ws_wspurchaseoderdate_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPurchaseOderDateController::mediauploadAction',  '_route' => 'ws_wspurchaseoderdate_mediaupload',);
        }

        // ws_wspurchaseoderdate_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPurchaseOderDateController::fireQuery',  '_route' => 'ws_wspurchaseoderdate_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wspurchaseoderdate_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPurchaseOderDateController::getLoyalitypointAction',  '_route' => 'ws_wspurchaseoderdate_getloyalitypoint',);
            }

            // ws_wspurchaseoderdate_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPurchaseOderDateController::getHeightAction',  '_route' => 'ws_wspurchaseoderdate_getheight',);
            }

            // ws_wspurchaseoderdate_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPurchaseOderDateController::getWeightAction',  '_route' => 'ws_wspurchaseoderdate_getweight',);
            }

            // ws_wspurchaseoderdate_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPurchaseOderDateController::getCurrentpackageAction',  '_route' => 'ws_wspurchaseoderdate_getcurrentpackage',);
            }

        }

        if (0 === strpos($pathinfo, '/ws')) {
            // ws_wspurchasepackage_purchasepackage
            if (0 === strpos($pathinfo, '/ws/purchasepackage') && preg_match('#^/ws/purchasepackage(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspurchasepackage_purchasepackage')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSPurchasePackageController::purchasepackageAction',));
            }

            // ws_wspurchasepackage_checkcouponredemption_notinuse
            if (0 === strpos($pathinfo, '/ws/checkCouponRedemption_notinuse') && preg_match('#^/ws/checkCouponRedemption_notinuse(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspurchasepackage_checkcouponredemption_notinuse')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSPurchasePackageController::checkCouponRedemption_notinuseAction',));
            }

            // ws_wspurchasepackage_duplicate
            if (0 === strpos($pathinfo, '/ws/duplicate') && preg_match('#^/ws/duplicate(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspurchasepackage_duplicate')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSPurchasePackageController::duplicate',));
            }

        }

        // ws_wspurchasepackage_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wspurchasepackage_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSPurchasePackageController::fileupload1',));
        }

        // ws_wspurchasepackage_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPurchasePackageController::mediauploadAction',  '_route' => 'ws_wspurchasepackage_mediaupload',);
        }

        // ws_wspurchasepackage_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSPurchasePackageController::fireQuery',  '_route' => 'ws_wspurchasepackage_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wspurchasepackage_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPurchasePackageController::getLoyalitypointAction',  '_route' => 'ws_wspurchasepackage_getloyalitypoint',);
            }

            // ws_wspurchasepackage_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPurchasePackageController::getHeightAction',  '_route' => 'ws_wspurchasepackage_getheight',);
            }

            // ws_wspurchasepackage_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPurchasePackageController::getWeightAction',  '_route' => 'ws_wspurchasepackage_getweight',);
            }

            // ws_wspurchasepackage_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSPurchasePackageController::getCurrentpackageAction',  '_route' => 'ws_wspurchasepackage_getcurrentpackage',);
            }

        }

        // ws_wsratings_addrating
        if (0 === strpos($pathinfo, '/ws/addRatings') && preg_match('#^/ws/addRatings(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsratings_addrating')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSRatingsController::addRatingAction',));
        }

        // ws_wsratings_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsratings_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSRatingsController::fileupload1',));
        }

        // ws_wsratings_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSRatingsController::mediauploadAction',  '_route' => 'ws_wsratings_mediaupload',);
        }

        // ws_wsratings_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSRatingsController::fireQuery',  '_route' => 'ws_wsratings_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsratings_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSRatingsController::getLoyalitypointAction',  '_route' => 'ws_wsratings_getloyalitypoint',);
            }

            // ws_wsratings_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSRatingsController::getHeightAction',  '_route' => 'ws_wsratings_getheight',);
            }

            // ws_wsratings_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSRatingsController::getWeightAction',  '_route' => 'ws_wsratings_getweight',);
            }

            // ws_wsratings_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSRatingsController::getCurrentpackageAction',  '_route' => 'ws_wsratings_getcurrentpackage',);
            }

        }

        // ws_wsresendotp_verifyotp
        if (0 === strpos($pathinfo, '/ws/resendOTP') && preg_match('#^/ws/resendOTP(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsresendotp_verifyotp')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSResendOTPController::verifyOTPAction',));
        }

        // ws_wsresendotp_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsresendotp_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSResendOTPController::fileupload1',));
        }

        // ws_wsresendotp_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSResendOTPController::mediauploadAction',  '_route' => 'ws_wsresendotp_mediaupload',);
        }

        // ws_wsresendotp_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSResendOTPController::fireQuery',  '_route' => 'ws_wsresendotp_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsresendotp_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSResendOTPController::getLoyalitypointAction',  '_route' => 'ws_wsresendotp_getloyalitypoint',);
            }

            // ws_wsresendotp_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSResendOTPController::getHeightAction',  '_route' => 'ws_wsresendotp_getheight',);
            }

            // ws_wsresendotp_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSResendOTPController::getWeightAction',  '_route' => 'ws_wsresendotp_getweight',);
            }

            // ws_wsresendotp_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSResendOTPController::getCurrentpackageAction',  '_route' => 'ws_wsresendotp_getcurrentpackage',);
            }

        }

        // ws_wsresumepauseorder_resumepackage
        if (0 === strpos($pathinfo, '/ws/resumepackage') && preg_match('#^/ws/resumepackage(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsresumepauseorder_resumepackage')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSResumepauseorderController::resumepackageAction',));
        }

        // ws_wsresumepauseorder_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsresumepauseorder_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSResumepauseorderController::fileupload1',));
        }

        // ws_wsresumepauseorder_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSResumepauseorderController::mediauploadAction',  '_route' => 'ws_wsresumepauseorder_mediaupload',);
        }

        // ws_wsresumepauseorder_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSResumepauseorderController::fireQuery',  '_route' => 'ws_wsresumepauseorder_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsresumepauseorder_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSResumepauseorderController::getLoyalitypointAction',  '_route' => 'ws_wsresumepauseorder_getloyalitypoint',);
            }

            // ws_wsresumepauseorder_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSResumepauseorderController::getHeightAction',  '_route' => 'ws_wsresumepauseorder_getheight',);
            }

            // ws_wsresumepauseorder_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSResumepauseorderController::getWeightAction',  '_route' => 'ws_wsresumepauseorder_getweight',);
            }

            // ws_wsresumepauseorder_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSResumepauseorderController::getCurrentpackageAction',  '_route' => 'ws_wsresumepauseorder_getcurrentpackage',);
            }

        }

        // ws_wsschedulelist_schedulelist
        if (0 === strpos($pathinfo, '/ws/schedulelist') && preg_match('#^/ws/schedulelist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsschedulelist_schedulelist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSSchedulelistController::schedulelistAction',));
        }

        // ws_wsschedulelist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsschedulelist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSSchedulelistController::fileupload1',));
        }

        // ws_wsschedulelist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSSchedulelistController::mediauploadAction',  '_route' => 'ws_wsschedulelist_mediaupload',);
        }

        // ws_wsschedulelist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSSchedulelistController::fireQuery',  '_route' => 'ws_wsschedulelist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsschedulelist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSchedulelistController::getLoyalitypointAction',  '_route' => 'ws_wsschedulelist_getloyalitypoint',);
            }

            // ws_wsschedulelist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSchedulelistController::getHeightAction',  '_route' => 'ws_wsschedulelist_getheight',);
            }

            // ws_wsschedulelist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSchedulelistController::getWeightAction',  '_route' => 'ws_wsschedulelist_getweight',);
            }

            // ws_wsschedulelist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSchedulelistController::getCurrentpackageAction',  '_route' => 'ws_wsschedulelist_getcurrentpackage',);
            }

        }

        // ws_wssettings_settings
        if (0 === strpos($pathinfo, '/ws/settings') && preg_match('#^/ws/settings(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wssettings_settings')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSSettingsController::settingsAction',));
        }

        // ws_wssettings_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wssettings_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSSettingsController::fileupload1',));
        }

        // ws_wssettings_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSSettingsController::mediauploadAction',  '_route' => 'ws_wssettings_mediaupload',);
        }

        // ws_wssettings_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSSettingsController::fireQuery',  '_route' => 'ws_wssettings_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wssettings_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSettingsController::getLoyalitypointAction',  '_route' => 'ws_wssettings_getloyalitypoint',);
            }

            // ws_wssettings_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSettingsController::getHeightAction',  '_route' => 'ws_wssettings_getheight',);
            }

            // ws_wssettings_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSettingsController::getWeightAction',  '_route' => 'ws_wssettings_getweight',);
            }

            // ws_wssettings_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSettingsController::getCurrentpackageAction',  '_route' => 'ws_wssettings_getcurrentpackage',);
            }

        }

        // ws_wssocialmedia_socialmedia
        if ('/ws/socialmedia' === $pathinfo) {
            return array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSSocialmediaController::socialmediaAction',  '_route' => 'ws_wssocialmedia_socialmedia',);
        }

        // ws_wssocialmedia_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wssocialmedia_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSSocialmediaController::fileupload1',));
        }

        // ws_wssocialmedia_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSSocialmediaController::mediauploadAction',  '_route' => 'ws_wssocialmedia_mediaupload',);
        }

        // ws_wssocialmedia_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSSocialmediaController::fireQuery',  '_route' => 'ws_wssocialmedia_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wssocialmedia_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSocialmediaController::getLoyalitypointAction',  '_route' => 'ws_wssocialmedia_getloyalitypoint',);
            }

            // ws_wssocialmedia_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSocialmediaController::getHeightAction',  '_route' => 'ws_wssocialmedia_getheight',);
            }

            // ws_wssocialmedia_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSocialmediaController::getWeightAction',  '_route' => 'ws_wssocialmedia_getweight',);
            }

            // ws_wssocialmedia_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSocialmediaController::getCurrentpackageAction',  '_route' => 'ws_wssocialmedia_getcurrentpackage',);
            }

        }

        // ws_wssubscription_subscribe
        if ('/ws/subscribe' === $pathinfo) {
            return array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSSubscriptionController::subscribeAction',  '_route' => 'ws_wssubscription_subscribe',);
        }

        // ws_wssubscription_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wssubscription_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSSubscriptionController::fileupload1',));
        }

        // ws_wssubscription_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSSubscriptionController::mediauploadAction',  '_route' => 'ws_wssubscription_mediaupload',);
        }

        // ws_wssubscription_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSSubscriptionController::fireQuery',  '_route' => 'ws_wssubscription_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wssubscription_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSubscriptionController::getLoyalitypointAction',  '_route' => 'ws_wssubscription_getloyalitypoint',);
            }

            // ws_wssubscription_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSubscriptionController::getHeightAction',  '_route' => 'ws_wssubscription_getheight',);
            }

            // ws_wssubscription_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSubscriptionController::getWeightAction',  '_route' => 'ws_wssubscription_getweight',);
            }

            // ws_wssubscription_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSubscriptionController::getCurrentpackageAction',  '_route' => 'ws_wssubscription_getcurrentpackage',);
            }

        }

        // ws_wssuspendplan_suspendplan
        if (0 === strpos($pathinfo, '/ws/suspendplan') && preg_match('#^/ws/suspendplan(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wssuspendplan_suspendplan')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSSuspendplanController::suspendplanAction',));
        }

        // ws_wssuspendplan_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wssuspendplan_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSSuspendplanController::fileupload1',));
        }

        // ws_wssuspendplan_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSSuspendplanController::mediauploadAction',  '_route' => 'ws_wssuspendplan_mediaupload',);
        }

        // ws_wssuspendplan_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSSuspendplanController::fireQuery',  '_route' => 'ws_wssuspendplan_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wssuspendplan_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSuspendplanController::getLoyalitypointAction',  '_route' => 'ws_wssuspendplan_getloyalitypoint',);
            }

            // ws_wssuspendplan_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSuspendplanController::getHeightAction',  '_route' => 'ws_wssuspendplan_getheight',);
            }

            // ws_wssuspendplan_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSuspendplanController::getWeightAction',  '_route' => 'ws_wssuspendplan_getweight',);
            }

            // ws_wssuspendplan_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSuspendplanController::getCurrentpackageAction',  '_route' => 'ws_wssuspendplan_getcurrentpackage',);
            }

        }

        // ws_wssuspendplanwithmultipledates_suspendplanwithmultipledates
        if (0 === strpos($pathinfo, '/ws/suspendplanwithmultipledates') && preg_match('#^/ws/suspendplanwithmultipledates(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wssuspendplanwithmultipledates_suspendplanwithmultipledates')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSSuspendplanwithmultipledatesController::suspendplanwithmultipledatesAction',));
        }

        // ws_wssuspendplanwithmultipledates_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wssuspendplanwithmultipledates_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSSuspendplanwithmultipledatesController::fileupload1',));
        }

        // ws_wssuspendplanwithmultipledates_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSSuspendplanwithmultipledatesController::mediauploadAction',  '_route' => 'ws_wssuspendplanwithmultipledates_mediaupload',);
        }

        // ws_wssuspendplanwithmultipledates_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSSuspendplanwithmultipledatesController::fireQuery',  '_route' => 'ws_wssuspendplanwithmultipledates_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wssuspendplanwithmultipledates_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSuspendplanwithmultipledatesController::getLoyalitypointAction',  '_route' => 'ws_wssuspendplanwithmultipledates_getloyalitypoint',);
            }

            // ws_wssuspendplanwithmultipledates_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSuspendplanwithmultipledatesController::getHeightAction',  '_route' => 'ws_wssuspendplanwithmultipledates_getheight',);
            }

            // ws_wssuspendplanwithmultipledates_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSuspendplanwithmultipledatesController::getWeightAction',  '_route' => 'ws_wssuspendplanwithmultipledates_getweight',);
            }

            // ws_wssuspendplanwithmultipledates_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSSuspendplanwithmultipledatesController::getCurrentpackageAction',  '_route' => 'ws_wssuspendplanwithmultipledates_getcurrentpackage',);
            }

        }

        // ws_wstermsandcondition_termsandcondition
        if (0 === strpos($pathinfo, '/ws/termsandcondition') && preg_match('#^/ws/termsandcondition(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wstermsandcondition_termsandcondition')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSTermsandconditionController::termsandconditionAction',));
        }

        // ws_wstermsandcondition_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wstermsandcondition_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSTermsandconditionController::fileupload1',));
        }

        // ws_wstermsandcondition_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSTermsandconditionController::mediauploadAction',  '_route' => 'ws_wstermsandcondition_mediaupload',);
        }

        // ws_wstermsandcondition_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSTermsandconditionController::fireQuery',  '_route' => 'ws_wstermsandcondition_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wstermsandcondition_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSTermsandconditionController::getLoyalitypointAction',  '_route' => 'ws_wstermsandcondition_getloyalitypoint',);
            }

            // ws_wstermsandcondition_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSTermsandconditionController::getHeightAction',  '_route' => 'ws_wstermsandcondition_getheight',);
            }

            // ws_wstermsandcondition_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSTermsandconditionController::getWeightAction',  '_route' => 'ws_wstermsandcondition_getweight',);
            }

            // ws_wstermsandcondition_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSTermsandconditionController::getCurrentpackageAction',  '_route' => 'ws_wstermsandcondition_getcurrentpackage',);
            }

        }

        // ws_wstimeslots_timeslotlist
        if (0 === strpos($pathinfo, '/ws/DeliveryTime') && preg_match('#^/ws/DeliveryTime(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wstimeslots_timeslotlist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSTimeSlotsController::timeSlotlistAction',));
        }

        // ws_wstimeslots_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wstimeslots_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSTimeSlotsController::fileupload1',));
        }

        // ws_wstimeslots_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSTimeSlotsController::mediauploadAction',  '_route' => 'ws_wstimeslots_mediaupload',);
        }

        // ws_wstimeslots_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSTimeSlotsController::fireQuery',  '_route' => 'ws_wstimeslots_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wstimeslots_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSTimeSlotsController::getLoyalitypointAction',  '_route' => 'ws_wstimeslots_getloyalitypoint',);
            }

            // ws_wstimeslots_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSTimeSlotsController::getHeightAction',  '_route' => 'ws_wstimeslots_getheight',);
            }

            // ws_wstimeslots_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSTimeSlotsController::getWeightAction',  '_route' => 'ws_wstimeslots_getweight',);
            }

            // ws_wstimeslots_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSTimeSlotsController::getCurrentpackageAction',  '_route' => 'ws_wstimeslots_getcurrentpackage',);
            }

        }

        // ws_wstutorialvideolist_tutorialvideolist
        if (0 === strpos($pathinfo, '/ws/tutorialvideolist') && preg_match('#^/ws/tutorialvideolist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wstutorialvideolist_tutorialvideolist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSTutorialvideolistController::tutorialvideolistAction',));
        }

        // ws_wstutorialvideolist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wstutorialvideolist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSTutorialvideolistController::fileupload1',));
        }

        // ws_wstutorialvideolist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSTutorialvideolistController::mediauploadAction',  '_route' => 'ws_wstutorialvideolist_mediaupload',);
        }

        // ws_wstutorialvideolist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSTutorialvideolistController::fireQuery',  '_route' => 'ws_wstutorialvideolist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wstutorialvideolist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSTutorialvideolistController::getLoyalitypointAction',  '_route' => 'ws_wstutorialvideolist_getloyalitypoint',);
            }

            // ws_wstutorialvideolist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSTutorialvideolistController::getHeightAction',  '_route' => 'ws_wstutorialvideolist_getheight',);
            }

            // ws_wstutorialvideolist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSTutorialvideolistController::getWeightAction',  '_route' => 'ws_wstutorialvideolist_getweight',);
            }

            // ws_wstutorialvideolist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSTutorialvideolistController::getCurrentpackageAction',  '_route' => 'ws_wstutorialvideolist_getcurrentpackage',);
            }

        }

        // ws_wsupgradegrampackage_upgradegrampackage
        if (0 === strpos($pathinfo, '/ws/upgradeGramPackage') && preg_match('#^/ws/upgradeGramPackage(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsupgradegrampackage_upgradegrampackage')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSUpgradeGramPackageController::upgradeGramPackageAction',));
        }

        // ws_wsupgradegrampackage_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsupgradegrampackage_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSUpgradeGramPackageController::fileupload1',));
        }

        // ws_wsupgradegrampackage_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradeGramPackageController::mediauploadAction',  '_route' => 'ws_wsupgradegrampackage_mediaupload',);
        }

        // ws_wsupgradegrampackage_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradeGramPackageController::fireQuery',  '_route' => 'ws_wsupgradegrampackage_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsupgradegrampackage_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradeGramPackageController::getLoyalitypointAction',  '_route' => 'ws_wsupgradegrampackage_getloyalitypoint',);
            }

            // ws_wsupgradegrampackage_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradeGramPackageController::getHeightAction',  '_route' => 'ws_wsupgradegrampackage_getheight',);
            }

            // ws_wsupgradegrampackage_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradeGramPackageController::getWeightAction',  '_route' => 'ws_wsupgradegrampackage_getweight',);
            }

            // ws_wsupgradegrampackage_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradeGramPackageController::getCurrentpackageAction',  '_route' => 'ws_wsupgradegrampackage_getcurrentpackage',);
            }

        }

        // ws_wsupgradepackagebysubpackage_upgradepackagebysubpackage
        if (0 === strpos($pathinfo, '/ws/upgradePackageBySubPackage') && preg_match('#^/ws/upgradePackageBySubPackage(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsupgradepackagebysubpackage_upgradepackagebysubpackage')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageBySubPackageController::upgradePackageBySubPackageAction',));
        }

        // ws_wsupgradepackagebysubpackage_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsupgradepackagebysubpackage_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageBySubPackageController::fileupload1',));
        }

        // ws_wsupgradepackagebysubpackage_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageBySubPackageController::mediauploadAction',  '_route' => 'ws_wsupgradepackagebysubpackage_mediaupload',);
        }

        // ws_wsupgradepackagebysubpackage_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageBySubPackageController::fireQuery',  '_route' => 'ws_wsupgradepackagebysubpackage_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsupgradepackagebysubpackage_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageBySubPackageController::getLoyalitypointAction',  '_route' => 'ws_wsupgradepackagebysubpackage_getloyalitypoint',);
            }

            // ws_wsupgradepackagebysubpackage_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageBySubPackageController::getHeightAction',  '_route' => 'ws_wsupgradepackagebysubpackage_getheight',);
            }

            // ws_wsupgradepackagebysubpackage_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageBySubPackageController::getWeightAction',  '_route' => 'ws_wsupgradepackagebysubpackage_getweight',);
            }

            // ws_wsupgradepackagebysubpackage_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageBySubPackageController::getCurrentpackageAction',  '_route' => 'ws_wsupgradepackagebysubpackage_getcurrentpackage',);
            }

        }

        // ws_wsupgradepackage_upgradepackage
        if (0 === strpos($pathinfo, '/ws/upgradePackage') && preg_match('#^/ws/upgradePackage(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsupgradepackage_upgradepackage')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageController::upgradePackageAction',));
        }

        // ws_wsupgradepackage_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsupgradepackage_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageController::fileupload1',));
        }

        // ws_wsupgradepackage_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageController::mediauploadAction',  '_route' => 'ws_wsupgradepackage_mediaupload',);
        }

        // ws_wsupgradepackage_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageController::fireQuery',  '_route' => 'ws_wsupgradepackage_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsupgradepackage_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageController::getLoyalitypointAction',  '_route' => 'ws_wsupgradepackage_getloyalitypoint',);
            }

            // ws_wsupgradepackage_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageController::getHeightAction',  '_route' => 'ws_wsupgradepackage_getheight',);
            }

            // ws_wsupgradepackage_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageController::getWeightAction',  '_route' => 'ws_wsupgradepackage_getweight',);
            }

            // ws_wsupgradepackage_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageController::getCurrentpackageAction',  '_route' => 'ws_wsupgradepackage_getcurrentpackage',);
            }

        }

        // ws_wsupgradepackagegramlist_gramlistforupgradepackage
        if (0 === strpos($pathinfo, '/ws/gramListForUpgradePackage') && preg_match('#^/ws/gramListForUpgradePackage(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsupgradepackagegramlist_gramlistforupgradepackage')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageGramListController::gramListForUpgradePackageAction',));
        }

        // ws_wsupgradepackagegramlist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsupgradepackagegramlist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageGramListController::fileupload1',));
        }

        // ws_wsupgradepackagegramlist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageGramListController::mediauploadAction',  '_route' => 'ws_wsupgradepackagegramlist_mediaupload',);
        }

        // ws_wsupgradepackagegramlist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageGramListController::fireQuery',  '_route' => 'ws_wsupgradepackagegramlist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsupgradepackagegramlist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageGramListController::getLoyalitypointAction',  '_route' => 'ws_wsupgradepackagegramlist_getloyalitypoint',);
            }

            // ws_wsupgradepackagegramlist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageGramListController::getHeightAction',  '_route' => 'ws_wsupgradepackagegramlist_getheight',);
            }

            // ws_wsupgradepackagegramlist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageGramListController::getWeightAction',  '_route' => 'ws_wsupgradepackagegramlist_getweight',);
            }

            // ws_wsupgradepackagegramlist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageGramListController::getCurrentpackageAction',  '_route' => 'ws_wsupgradepackagegramlist_getcurrentpackage',);
            }

        }

        // ws_wsupgradepackagelifestyle_upgradepackagelifestyle
        if (0 === strpos($pathinfo, '/ws/upgradePackageLifestyle') && preg_match('#^/ws/upgradePackageLifestyle(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsupgradepackagelifestyle_upgradepackagelifestyle')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageLifestyleController::upgradePackageLifestyleAction',));
        }

        // ws_wsupgradepackagelifestyle_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsupgradepackagelifestyle_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageLifestyleController::fileupload1',));
        }

        // ws_wsupgradepackagelifestyle_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageLifestyleController::mediauploadAction',  '_route' => 'ws_wsupgradepackagelifestyle_mediaupload',);
        }

        // ws_wsupgradepackagelifestyle_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageLifestyleController::fireQuery',  '_route' => 'ws_wsupgradepackagelifestyle_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsupgradepackagelifestyle_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageLifestyleController::getLoyalitypointAction',  '_route' => 'ws_wsupgradepackagelifestyle_getloyalitypoint',);
            }

            // ws_wsupgradepackagelifestyle_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageLifestyleController::getHeightAction',  '_route' => 'ws_wsupgradepackagelifestyle_getheight',);
            }

            // ws_wsupgradepackagelifestyle_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageLifestyleController::getWeightAction',  '_route' => 'ws_wsupgradepackagelifestyle_getweight',);
            }

            // ws_wsupgradepackagelifestyle_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageLifestyleController::getCurrentpackageAction',  '_route' => 'ws_wsupgradepackagelifestyle_getcurrentpackage',);
            }

        }

        // ws_wsupgradepackagemealtypes_mealtypelistforupgradepackage
        if (0 === strpos($pathinfo, '/ws/mealTypeListForUpgradePackage') && preg_match('#^/ws/mealTypeListForUpgradePackage(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsupgradepackagemealtypes_mealtypelistforupgradepackage')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageMealTypesController::mealTypeListForUpgradePackageAction',));
        }

        // ws_wsupgradepackagemealtypes_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsupgradepackagemealtypes_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageMealTypesController::fileupload1',));
        }

        // ws_wsupgradepackagemealtypes_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageMealTypesController::mediauploadAction',  '_route' => 'ws_wsupgradepackagemealtypes_mediaupload',);
        }

        // ws_wsupgradepackagemealtypes_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageMealTypesController::fireQuery',  '_route' => 'ws_wsupgradepackagemealtypes_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsupgradepackagemealtypes_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageMealTypesController::getLoyalitypointAction',  '_route' => 'ws_wsupgradepackagemealtypes_getloyalitypoint',);
            }

            // ws_wsupgradepackagemealtypes_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageMealTypesController::getHeightAction',  '_route' => 'ws_wsupgradepackagemealtypes_getheight',);
            }

            // ws_wsupgradepackagemealtypes_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageMealTypesController::getWeightAction',  '_route' => 'ws_wsupgradepackagemealtypes_getweight',);
            }

            // ws_wsupgradepackagemealtypes_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUpgradePackageMealTypesController::getCurrentpackageAction',  '_route' => 'ws_wsupgradepackagemealtypes_getcurrentpackage',);
            }

        }

        if (0 === strpos($pathinfo, '/ws/u')) {
            // ws_wsuserlogin_userlogin
            if (0 === strpos($pathinfo, '/ws/userlogin') && preg_match('#^/ws/userlogin(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsuserlogin_userlogin')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSUserLoginController::userLoginAction',));
            }

            // ws_wsuserlogin_update_token
            if (0 === strpos($pathinfo, '/ws/update_token') && preg_match('#^/ws/update_token(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsuserlogin_update_token')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSUserLoginController::update_tokenAction',));
            }

            // ws_wsuserlogin_userlogout
            if (0 === strpos($pathinfo, '/ws/userlogout') && preg_match('#^/ws/userlogout(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsuserlogin_userlogout')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSUserLoginController::userlogoutAction',));
            }

        }

        // ws_wsuserlogin_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsuserlogin_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSUserLoginController::fileupload1',));
        }

        // ws_wsuserlogin_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUserLoginController::mediauploadAction',  '_route' => 'ws_wsuserlogin_mediaupload',);
        }

        // ws_wsuserlogin_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUserLoginController::fireQuery',  '_route' => 'ws_wsuserlogin_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsuserlogin_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUserLoginController::getLoyalitypointAction',  '_route' => 'ws_wsuserlogin_getloyalitypoint',);
            }

            // ws_wsuserlogin_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUserLoginController::getHeightAction',  '_route' => 'ws_wsuserlogin_getheight',);
            }

            // ws_wsuserlogin_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUserLoginController::getWeightAction',  '_route' => 'ws_wsuserlogin_getweight',);
            }

            // ws_wsuserlogin_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUserLoginController::getCurrentpackageAction',  '_route' => 'ws_wsuserlogin_getcurrentpackage',);
            }

        }

        // ws_wsuserlogout_userlogout
        if (0 === strpos($pathinfo, '/ws/user-logout') && preg_match('#^/ws/user\\-logout(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsuserlogout_userlogout')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSUserLogoutController::userlogoutAction',));
        }

        // ws_wsuserlogout_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsuserlogout_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSUserLogoutController::fileupload1',));
        }

        // ws_wsuserlogout_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUserLogoutController::mediauploadAction',  '_route' => 'ws_wsuserlogout_mediaupload',);
        }

        // ws_wsuserlogout_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUserLogoutController::fireQuery',  '_route' => 'ws_wsuserlogout_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsuserlogout_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUserLogoutController::getLoyalitypointAction',  '_route' => 'ws_wsuserlogout_getloyalitypoint',);
            }

            // ws_wsuserlogout_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUserLogoutController::getHeightAction',  '_route' => 'ws_wsuserlogout_getheight',);
            }

            // ws_wsuserlogout_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUserLogoutController::getWeightAction',  '_route' => 'ws_wsuserlogout_getweight',);
            }

            // ws_wsuserlogout_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUserLogoutController::getCurrentpackageAction',  '_route' => 'ws_wsuserlogout_getcurrentpackage',);
            }

        }

        // ws_wsuserregistration_userregistration
        if (0 === strpos($pathinfo, '/ws/userregistration') && preg_match('#^/ws/userregistration(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsuserregistration_userregistration')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSUserRegistrationController::userRegistrationAction',));
        }

        // ws_wsuserregistration_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsuserregistration_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSUserRegistrationController::fileupload1',));
        }

        // ws_wsuserregistration_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUserRegistrationController::mediauploadAction',  '_route' => 'ws_wsuserregistration_mediaupload',);
        }

        // ws_wsuserregistration_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSUserRegistrationController::fireQuery',  '_route' => 'ws_wsuserregistration_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsuserregistration_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUserRegistrationController::getLoyalitypointAction',  '_route' => 'ws_wsuserregistration_getloyalitypoint',);
            }

            // ws_wsuserregistration_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUserRegistrationController::getHeightAction',  '_route' => 'ws_wsuserregistration_getheight',);
            }

            // ws_wsuserregistration_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUserRegistrationController::getWeightAction',  '_route' => 'ws_wsuserregistration_getweight',);
            }

            // ws_wsuserregistration_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSUserRegistrationController::getCurrentpackageAction',  '_route' => 'ws_wsuserregistration_getcurrentpackage',);
            }

        }

        // ws_wsverifycoupon_verifycoupon
        if (0 === strpos($pathinfo, '/ws/verifyCoupon') && preg_match('#^/ws/verifyCoupon(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsverifycoupon_verifycoupon')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSVerifyCouponController::verifyCouponAction',));
        }

        // ws_wsverifycoupon_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsverifycoupon_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSVerifyCouponController::fileupload1',));
        }

        // ws_wsverifycoupon_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSVerifyCouponController::mediauploadAction',  '_route' => 'ws_wsverifycoupon_mediaupload',);
        }

        // ws_wsverifycoupon_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSVerifyCouponController::fireQuery',  '_route' => 'ws_wsverifycoupon_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsverifycoupon_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSVerifyCouponController::getLoyalitypointAction',  '_route' => 'ws_wsverifycoupon_getloyalitypoint',);
            }

            // ws_wsverifycoupon_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSVerifyCouponController::getHeightAction',  '_route' => 'ws_wsverifycoupon_getheight',);
            }

            // ws_wsverifycoupon_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSVerifyCouponController::getWeightAction',  '_route' => 'ws_wsverifycoupon_getweight',);
            }

            // ws_wsverifycoupon_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSVerifyCouponController::getCurrentpackageAction',  '_route' => 'ws_wsverifycoupon_getcurrentpackage',);
            }

        }

        // ws_wsverifyotp_verifyotp
        if (0 === strpos($pathinfo, '/ws/verifyOTP') && preg_match('#^/ws/verifyOTP(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsverifyotp_verifyotp')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSVerifyOTPController::verifyOTPAction',));
        }

        // ws_wsverifyotp_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsverifyotp_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSVerifyOTPController::fileupload1',));
        }

        // ws_wsverifyotp_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSVerifyOTPController::mediauploadAction',  '_route' => 'ws_wsverifyotp_mediaupload',);
        }

        // ws_wsverifyotp_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSVerifyOTPController::fireQuery',  '_route' => 'ws_wsverifyotp_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsverifyotp_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSVerifyOTPController::getLoyalitypointAction',  '_route' => 'ws_wsverifyotp_getloyalitypoint',);
            }

            // ws_wsverifyotp_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSVerifyOTPController::getHeightAction',  '_route' => 'ws_wsverifyotp_getheight',);
            }

            // ws_wsverifyotp_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSVerifyOTPController::getWeightAction',  '_route' => 'ws_wsverifyotp_getweight',);
            }

            // ws_wsverifyotp_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSVerifyOTPController::getCurrentpackageAction',  '_route' => 'ws_wsverifyotp_getcurrentpackage',);
            }

        }

        // ws_wsvideolist_videolist
        if (0 === strpos($pathinfo, '/ws/videolist') && preg_match('#^/ws/videolist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsvideolist_videolist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSVideolistController::videolistAction',));
        }

        // ws_wsvideolist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsvideolist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSVideolistController::fileupload1',));
        }

        // ws_wsvideolist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSVideolistController::mediauploadAction',  '_route' => 'ws_wsvideolist_mediaupload',);
        }

        // ws_wsvideolist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSVideolistController::fireQuery',  '_route' => 'ws_wsvideolist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsvideolist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSVideolistController::getLoyalitypointAction',  '_route' => 'ws_wsvideolist_getloyalitypoint',);
            }

            // ws_wsvideolist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSVideolistController::getHeightAction',  '_route' => 'ws_wsvideolist_getheight',);
            }

            // ws_wsvideolist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSVideolistController::getWeightAction',  '_route' => 'ws_wsvideolist_getweight',);
            }

            // ws_wsvideolist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSVideolistController::getCurrentpackageAction',  '_route' => 'ws_wsvideolist_getcurrentpackage',);
            }

        }

        // ws_wswallettrasactionlist_getwallettransactionlist
        if (0 === strpos($pathinfo, '/ws/getWalletTransactionList') && preg_match('#^/ws/getWalletTransactionList(?:/(?P<param>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wswallettrasactionlist_getwallettransactionlist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSWalletTrasactionListController::getWalletTransactionListAction',));
        }

        // ws_wswallettrasactionlist_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wswallettrasactionlist_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSWalletTrasactionListController::fileupload1',));
        }

        // ws_wswallettrasactionlist_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSWalletTrasactionListController::mediauploadAction',  '_route' => 'ws_wswallettrasactionlist_mediaupload',);
        }

        // ws_wswallettrasactionlist_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSWalletTrasactionListController::fireQuery',  '_route' => 'ws_wswallettrasactionlist_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wswallettrasactionlist_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSWalletTrasactionListController::getLoyalitypointAction',  '_route' => 'ws_wswallettrasactionlist_getloyalitypoint',);
            }

            // ws_wswallettrasactionlist_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSWalletTrasactionListController::getHeightAction',  '_route' => 'ws_wswallettrasactionlist_getheight',);
            }

            // ws_wswallettrasactionlist_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSWalletTrasactionListController::getWeightAction',  '_route' => 'ws_wswallettrasactionlist_getweight',);
            }

            // ws_wswallettrasactionlist_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSWalletTrasactionListController::getCurrentpackageAction',  '_route' => 'ws_wswallettrasactionlist_getcurrentpackage',);
            }

        }

        // ws_wsweight_weightlist
        if (0 === strpos($pathinfo, '/ws/weightlist') && preg_match('#^/ws/weightlist(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsweight_weightlist')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSWeightController::weightlistAction',));
        }

        // ws_wsweight_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wsweight_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSWeightController::fileupload1',));
        }

        // ws_wsweight_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSWeightController::mediauploadAction',  '_route' => 'ws_wsweight_mediaupload',);
        }

        // ws_wsweight_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSWeightController::fireQuery',  '_route' => 'ws_wsweight_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wsweight_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSWeightController::getLoyalitypointAction',  '_route' => 'ws_wsweight_getloyalitypoint',);
            }

            // ws_wsweight_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSWeightController::getHeightAction',  '_route' => 'ws_wsweight_getheight',);
            }

            // ws_wsweight_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSWeightController::getWeightAction',  '_route' => 'ws_wsweight_getweight',);
            }

            // ws_wsweight_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSWeightController::getCurrentpackageAction',  '_route' => 'ws_wsweight_getcurrentpackage',);
            }

        }

        // ws_wswhyus_whyus
        if (0 === strpos($pathinfo, '/ws/whyus') && preg_match('#^/ws/whyus(?:/(?P<param>.+))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wswhyus_whyus')), array (  'param' => '',  '_controller' => 'WSBundle\\Controller\\WSWhyusController::whyusAction',));
        }

        // ws_wswhyus_fileupload1
        if (0 === strpos($pathinfo, '/admin/fileupload1') && preg_match('#^/admin/fileupload1(?:/(?P<file>[^/]++)(?:/(?P<tmp>[^/]++)(?:/(?P<path>[^/]++)(?:/(?P<media_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ws_wswhyus_fileupload1')), array (  'file' => '',  'tmp' => '',  'path' => '',  'media_id' => '',  '_controller' => 'WSBundle\\Controller\\WSWhyusController::fileupload1',));
        }

        // ws_wswhyus_mediaupload
        if ('/ws/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSWhyusController::mediauploadAction',  '_route' => 'ws_wswhyus_mediaupload',);
        }

        // ws_wswhyus_firequery
        if ('/fireQuery' === $pathinfo) {
            return array (  '_controller' => 'WSBundle\\Controller\\WSWhyusController::fireQuery',  '_route' => 'ws_wswhyus_firequery',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // ws_wswhyus_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSWhyusController::getLoyalitypointAction',  '_route' => 'ws_wswhyus_getloyalitypoint',);
            }

            // ws_wswhyus_getheight
            if ('/getHeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSWhyusController::getHeightAction',  '_route' => 'ws_wswhyus_getheight',);
            }

            // ws_wswhyus_getweight
            if ('/getWeight' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSWhyusController::getWeightAction',  '_route' => 'ws_wswhyus_getweight',);
            }

            // ws_wswhyus_getcurrentpackage
            if ('/getCurrentpackage' === $pathinfo) {
                return array (  '_controller' => 'WSBundle\\Controller\\WSWhyusController::getCurrentpackageAction',  '_route' => 'ws_wswhyus_getcurrentpackage',);
            }

        }

        // admin_aboutus_index
        if ('/about_us' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AboutusController::indexAction',  '_route' => 'admin_aboutus_index',);
        }

        // admin_aboutus_saveabout
        if ('/saveAboutUs' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AboutusController::saveaboutAction',  '_route' => 'admin_aboutus_saveabout',);
        }

        if (0 === strpos($pathinfo, '/ch')) {
            // admin_aboutus_checkemailtemplate
            if ('/checkEmailTemplate' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AboutusController::checkEmailTemplateAction',  '_route' => 'admin_aboutus_checkemailtemplate',);
            }

            // admin_aboutus_chksession
            if ('/chksession' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AboutusController::chksessionAction',  '_route' => 'admin_aboutus_chksession',);
            }

        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_aboutus_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AboutusController::fireQuery',  '_route' => 'admin_aboutus_firequery',);
            }

            // admin_aboutus_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AboutusController::fireupdateQuery',  '_route' => 'admin_aboutus_fireupdatequery',);
            }

        }

        // admin_aboutus_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AboutusController::getLanguages',  '_route' => 'admin_aboutus_getlanguages',);
        }

        // admin_aboutus_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AboutusController::mediauploadAction',  '_route' => 'admin_aboutus_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_aboutus_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AboutusController::getmediaAction',  '_route' => 'admin_aboutus_getmedia',);
            }

            // admin_aboutus_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AboutusController::getLoyalitypointAction',  '_route' => 'admin_aboutus_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/updates')) {
            // admin_adminstatus_updateshopstatus
            if ('/updateshopstatus' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdminstatusController::updateshopstatusAction',  '_route' => 'admin_adminstatus_updateshopstatus',);
            }

            // admin_adminstatus_updatesettings
            if ('/updatesettings' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdminstatusController::updatesettingsAction',  '_route' => 'admin_adminstatus_updatesettings',);
            }

        }

        if (0 === strpos($pathinfo, '/notify')) {
            // admin_adminstatus_notifylist
            if ('/notifylist' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdminstatusController::notifylistAction',  '_route' => 'admin_adminstatus_notifylist',);
            }

            // admin_adminstatus_notifysendnotification
            if ('/notifysendnotification' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdminstatusController::notifysendnotification',  '_route' => 'admin_adminstatus_notifysendnotification',);
            }

        }

        // admin_adminstatus_sendtoall
        if ('/sendtoall' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AdminstatusController::sendtoallAction',  '_route' => 'admin_adminstatus_sendtoall',);
        }

        // admin_adminstatus_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AdminstatusController::chksessionAction',  '_route' => 'admin_adminstatus_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_adminstatus_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdminstatusController::fireQuery',  '_route' => 'admin_adminstatus_firequery',);
            }

            // admin_adminstatus_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdminstatusController::fireupdateQuery',  '_route' => 'admin_adminstatus_fireupdatequery',);
            }

        }

        // admin_adminstatus_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AdminstatusController::getLanguages',  '_route' => 'admin_adminstatus_getlanguages',);
        }

        // admin_adminstatus_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AdminstatusController::mediauploadAction',  '_route' => 'admin_adminstatus_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_adminstatus_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdminstatusController::getmediaAction',  '_route' => 'admin_adminstatus_getmedia',);
            }

            // admin_adminstatus_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdminstatusController::getLoyalitypointAction',  '_route' => 'admin_adminstatus_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/advertise')) {
            // admin_advertise_index
            if ('/advertise' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdvertiseController::indexAction',  '_route' => 'admin_advertise_index',);
            }

            // admin_advertise_addadvertise
            if (0 === strpos($pathinfo, '/advertise/addAdvertise') && preg_match('#^/advertise/addAdvertise(?:/(?P<ad_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_advertise_addadvertise')), array (  'ad_id' => '0',  '_controller' => 'AdminBundle\\Controller\\AdvertiseController::addAdvertiseAction',));
            }

        }

        // admin_advertise_deleteadvertise
        if (0 === strpos($pathinfo, '/gallery/deleteAdvertise') && preg_match('#^/gallery/deleteAdvertise(?:/(?P<ad_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_advertise_deleteadvertise')), array (  'ad_id' => '0',  '_controller' => 'AdminBundle\\Controller\\AdvertiseController::deleteAdvertiseAction',));
        }

        // admin_advertise_saveadvertise
        if ('/advertise/save' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AdvertiseController::saveAdvertiseAction',  '_route' => 'admin_advertise_saveadvertise',);
        }

        if (0 === strpos($pathinfo, '/ch')) {
            // admin_advertise_changeadstatus
            if ('/changeAdStatus' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdvertiseController::changeadstatusAction',  '_route' => 'admin_advertise_changeadstatus',);
            }

            // admin_advertise_chksession
            if ('/chksession' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdvertiseController::chksessionAction',  '_route' => 'admin_advertise_chksession',);
            }

        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_advertise_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdvertiseController::fireQuery',  '_route' => 'admin_advertise_firequery',);
            }

            // admin_advertise_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdvertiseController::fireupdateQuery',  '_route' => 'admin_advertise_fireupdatequery',);
            }

        }

        // admin_advertise_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AdvertiseController::getLanguages',  '_route' => 'admin_advertise_getlanguages',);
        }

        // admin_advertise_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AdvertiseController::mediauploadAction',  '_route' => 'admin_advertise_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_advertise_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdvertiseController::getmediaAction',  '_route' => 'admin_advertise_getmedia',);
            }

            // admin_advertise_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdvertiseController::getLoyalitypointAction',  '_route' => 'admin_advertise_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/area')) {
            // admin_area_index
            if ('/area' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AreaController::indexAction',  '_route' => 'admin_area_index',);
            }

            // admin_area_addarea
            if (0 === strpos($pathinfo, '/area/addArea') && preg_match('#^/area/addArea(?:/(?P<main_area_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_area_addarea')), array (  'main_area_id' => '0',  '_controller' => 'AdminBundle\\Controller\\AreaController::addareaAction',));
            }

        }

        // admin_area_deletearea
        if (0 === strpos($pathinfo, '/deleteArea') && preg_match('#^/deleteArea(?:/(?P<main_area_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_area_deletearea')), array (  'main_area_id' => '0',  '_controller' => 'AdminBundle\\Controller\\AreaController::deleteareaAction',));
        }

        // admin_area_savearea
        if ('/saveArea' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AreaController::saveareaAction',  '_route' => 'admin_area_savearea',);
        }

        if (0 === strpos($pathinfo, '/ch')) {
            // admin_area_changeareastatus
            if ('/changeAreaStatus' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AreaController::changeareastatusAction',  '_route' => 'admin_area_changeareastatus',);
            }

            // admin_area_chksession
            if ('/chksession' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AreaController::chksessionAction',  '_route' => 'admin_area_chksession',);
            }

        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_area_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AreaController::fireQuery',  '_route' => 'admin_area_firequery',);
            }

            // admin_area_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AreaController::fireupdateQuery',  '_route' => 'admin_area_fireupdatequery',);
            }

        }

        // admin_area_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AreaController::getLanguages',  '_route' => 'admin_area_getlanguages',);
        }

        // admin_area_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\AreaController::mediauploadAction',  '_route' => 'admin_area_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_area_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AreaController::getmediaAction',  '_route' => 'admin_area_getmedia',);
            }

            // admin_area_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\AreaController::getLoyalitypointAction',  '_route' => 'admin_area_getloyalitypoint',);
            }

        }

        // admin_base_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\BaseController::chksessionAction',  '_route' => 'admin_base_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_base_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\BaseController::fireQuery',  '_route' => 'admin_base_firequery',);
            }

            // admin_base_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\BaseController::fireupdateQuery',  '_route' => 'admin_base_fireupdatequery',);
            }

        }

        // admin_base_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\BaseController::getLanguages',  '_route' => 'admin_base_getlanguages',);
        }

        // admin_base_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\BaseController::mediauploadAction',  '_route' => 'admin_base_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_base_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\BaseController::getmediaAction',  '_route' => 'admin_base_getmedia',);
            }

            // admin_base_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\BaseController::getLoyalitypointAction',  '_route' => 'admin_base_getloyalitypoint',);
            }

        }

        // admin_contactus_index
        if ('/contact_us' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\ContactusController::indexAction',  '_route' => 'admin_contactus_index',);
        }

        if (0 === strpos($pathinfo, '/s')) {
            // admin_contactus_settings
            if ('/settings' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ContactusController::settingsAction',  '_route' => 'admin_contactus_settings',);
            }

            // admin_contactus_savesettings
            if ('/savesettings' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ContactusController::savesettingsAction',  '_route' => 'admin_contactus_savesettings',);
            }

        }

        // admin_contactus_deletecontact
        if (0 === strpos($pathinfo, '/deleteContactUS') && preg_match('#^/deleteContactUS(?:/(?P<contact_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_contactus_deletecontact')), array (  'contact_id' => '0',  '_controller' => 'AdminBundle\\Controller\\ContactusController::deletecontactAction',));
        }

        // admin_contactus_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\ContactusController::chksessionAction',  '_route' => 'admin_contactus_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_contactus_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ContactusController::fireQuery',  '_route' => 'admin_contactus_firequery',);
            }

            // admin_contactus_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ContactusController::fireupdateQuery',  '_route' => 'admin_contactus_fireupdatequery',);
            }

        }

        // admin_contactus_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\ContactusController::getLanguages',  '_route' => 'admin_contactus_getlanguages',);
        }

        // admin_contactus_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\ContactusController::mediauploadAction',  '_route' => 'admin_contactus_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_contactus_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ContactusController::getmediaAction',  '_route' => 'admin_contactus_getmedia',);
            }

            // admin_contactus_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ContactusController::getLoyalitypointAction',  '_route' => 'admin_contactus_getloyalitypoint',);
            }

        }

        // admin_country_index
        if ('/country' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CountryController::indexAction',  '_route' => 'admin_country_index',);
        }

        // admin_country_addcountry
        if (0 === strpos($pathinfo, '/addCountry') && preg_match('#^/addCountry(?:/(?P<country_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_country_addcountry')), array (  'country_id' => '0',  '_controller' => 'AdminBundle\\Controller\\CountryController::addcountryAction',));
        }

        // admin_country_savecountry
        if ('/saveCountry' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CountryController::savecountryAction',  '_route' => 'admin_country_savecountry',);
        }

        // admin_country_deletecountry
        if (0 === strpos($pathinfo, '/deleteCountry') && preg_match('#^/deleteCountry(?:/(?P<country_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_country_deletecountry')), array (  'country_id' => '0',  '_controller' => 'AdminBundle\\Controller\\CountryController::deletecountryAction',));
        }

        // admin_country_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CountryController::chksessionAction',  '_route' => 'admin_country_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_country_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CountryController::fireQuery',  '_route' => 'admin_country_firequery',);
            }

            // admin_country_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CountryController::fireupdateQuery',  '_route' => 'admin_country_fireupdatequery',);
            }

        }

        // admin_country_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CountryController::getLanguages',  '_route' => 'admin_country_getlanguages',);
        }

        // admin_country_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CountryController::mediauploadAction',  '_route' => 'admin_country_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_country_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CountryController::getmediaAction',  '_route' => 'admin_country_getmedia',);
            }

            // admin_country_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CountryController::getLoyalitypointAction',  '_route' => 'admin_country_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/c')) {
            if (0 === strpos($pathinfo, '/coupon')) {
                // admin_coupon_couponreport
                if (0 === strpos($pathinfo, '/coupon/report') && preg_match('#^/coupon/report(?:/(?P<main_coupon_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_coupon_couponreport')), array (  'main_coupon_id' => '0',  '_controller' => 'AdminBundle\\Controller\\CouponController::couponreportAction',));
                }

                // admin_coupon_couponusage
                if (0 === strpos($pathinfo, '/coupon/usage') && preg_match('#^/coupon/usage(?:/(?P<main_coupon_id>[^/]++)(?:/(?P<user_master_id>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_coupon_couponusage')), array (  'main_coupon_id' => '0',  'user_master_id' => '0',  '_controller' => 'AdminBundle\\Controller\\CouponController::couponusageAction',));
                }

                // admin_coupon_index
                if ('/coupon' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\CouponController::indexAction',  '_route' => 'admin_coupon_index',);
                }

                // admin_coupon_addcouponcategory
                if (0 === strpos($pathinfo, '/coupon/addCouponCategory') && preg_match('#^/coupon/addCouponCategory(?:/(?P<main_coupon_category_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_coupon_addcouponcategory')), array (  'main_coupon_category_id' => '0',  '_controller' => 'AdminBundle\\Controller\\CouponController::addcouponcategoryAction',));
                }

                // admin_coupon_savecouponcategory
                if ('/coupon/saveCouponCategory' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\CouponController::saveCouponCategoryAction',  '_route' => 'admin_coupon_savecouponcategory',);
                }

                // admin_coupon_categorylist
                if ('/coupon/category' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\CouponController::categorylistAction',  '_route' => 'admin_coupon_categorylist',);
                }

                // admin_coupon_addcoupon
                if (0 === strpos($pathinfo, '/coupon/addcoupon') && preg_match('#^/coupon/addcoupon(?:/(?P<main_coupon_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_coupon_addcoupon')), array (  'main_coupon_id' => '0',  '_controller' => 'AdminBundle\\Controller\\CouponController::addcouponAction',));
                }

                // admin_coupon_savecoupon
                if ('/coupon/savecoupon' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\CouponController::savecouponAction',  '_route' => 'admin_coupon_savecoupon',);
                }

                // admin_coupon_deletecoupon
                if (0 === strpos($pathinfo, '/coupon/deleteCoupon') && preg_match('#^/coupon/deleteCoupon(?:/(?P<main_coupon_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_coupon_deletecoupon')), array (  'main_coupon_id' => '0',  '_controller' => 'AdminBundle\\Controller\\CouponController::deletecouponAction',));
                }

            }

            // admin_coupon_changecouponstatus
            if ('/changeCouponStatus' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CouponController::changecouponstatusAction',  '_route' => 'admin_coupon_changecouponstatus',);
            }

            // admin_coupon_sendmailtousers
            if (0 === strpos($pathinfo, '/coupon/sendMailToUser') && preg_match('#^/coupon/sendMailToUser(?:/(?P<main_coupon_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_coupon_sendmailtousers')), array (  'main_coupon_id' => '0',  '_controller' => 'AdminBundle\\Controller\\CouponController::sendMailToUsersAction',));
            }

            // admin_coupon_chksession
            if ('/chksession' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CouponController::chksessionAction',  '_route' => 'admin_coupon_chksession',);
            }

        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_coupon_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CouponController::fireQuery',  '_route' => 'admin_coupon_firequery',);
            }

            // admin_coupon_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CouponController::fireupdateQuery',  '_route' => 'admin_coupon_fireupdatequery',);
            }

        }

        // admin_coupon_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CouponController::getLanguages',  '_route' => 'admin_coupon_getlanguages',);
        }

        // admin_coupon_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CouponController::mediauploadAction',  '_route' => 'admin_coupon_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_coupon_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CouponController::getmediaAction',  '_route' => 'admin_coupon_getmedia',);
            }

            // admin_coupon_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CouponController::getLoyalitypointAction',  '_route' => 'admin_coupon_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/customer-service')) {
            // admin_customerservice_sendnotificationcustomerserviceusers
            if ('/customer-service/sendnotificationcustomerserviceusers' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::sendnotificationcustomerserviceusersAction',  '_route' => 'admin_customerservice_sendnotificationcustomerserviceusers',);
            }

            // admin_customerservice_notpaid
            if ('/customer-service/not-paid' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::notpaidAction',  '_route' => 'admin_customerservice_notpaid',);
            }

            // admin_customerservice_activeusers
            if ('/customer-service/active-users' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::activeusersAction',  '_route' => 'admin_customerservice_activeusers',);
            }

            // admin_customerservice_expiredusers
            if ('/customer-service/expired-users' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::expiredusersAction',  '_route' => 'admin_customerservice_expiredusers',);
            }

            // admin_customerservice_triedtopurchaseusers
            if ('/customer-service/triedtopurchase-users' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::triedtopurchaseusersAction',  '_route' => 'admin_customerservice_triedtopurchaseusers',);
            }

        }

        // admin_customerservice_activeusercount
        if ('/active-user-count' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::activeusercountAction',  '_route' => 'admin_customerservice_activeusercount',);
        }

        // admin_customerservice_expiredusercount
        if ('/expired-user-count' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::expiredusercountAction',  '_route' => 'admin_customerservice_expiredusercount',);
        }

        // admin_customerservice_triedtopurchasecount
        if ('/triedtopurchasecount' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::triedtopurchasecountAction',  '_route' => 'admin_customerservice_triedtopurchasecount',);
        }

        // admin_customerservice_notsubscribedusercount
        if ('/notsubscribed-user-count' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::notsubscribedusercountAction',  '_route' => 'admin_customerservice_notsubscribedusercount',);
        }

        // admin_customerservice_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::chksessionAction',  '_route' => 'admin_customerservice_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_customerservice_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::fireQuery',  '_route' => 'admin_customerservice_firequery',);
            }

            // admin_customerservice_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::fireupdateQuery',  '_route' => 'admin_customerservice_fireupdatequery',);
            }

        }

        // admin_customerservice_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::getLanguages',  '_route' => 'admin_customerservice_getlanguages',);
        }

        // admin_customerservice_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::mediauploadAction',  '_route' => 'admin_customerservice_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_customerservice_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::getmediaAction',  '_route' => 'admin_customerservice_getmedia',);
            }

            // admin_customerservice_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\CustomerserviceController::getLoyalitypointAction',  '_route' => 'admin_customerservice_getloyalitypoint',);
            }

        }

        // admin_dashboard_index
        if ('/dashboard' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DashboardController::indexAction',  '_route' => 'admin_dashboard_index',);
        }

        // admin_dashboard_assignautomaticmeal
        if ('/assignautomaticmeal' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DashboardController::assignautomaticmealAction',  '_route' => 'admin_dashboard_assignautomaticmeal',);
        }

        // admin_dashboard_sendnotificationbeforedays
        if ('/sendnotificationbeforedays' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DashboardController::sendnotificationbeforedaysAction',  '_route' => 'admin_dashboard_sendnotificationbeforedays',);
        }

        // admin_dashboard_freezedatewithallusers
        if ('/freezedatewithallusers' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DashboardController::freezedatewithallusersAction',  '_route' => 'admin_dashboard_freezedatewithallusers',);
        }

        // admin_dashboard_expirepackageofalluser
        if ('/expirepackageofalluser' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DashboardController::expirepackageofalluserAction',  '_route' => 'admin_dashboard_expirepackageofalluser',);
        }

        // admin_dashboard_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DashboardController::chksessionAction',  '_route' => 'admin_dashboard_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_dashboard_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DashboardController::fireQuery',  '_route' => 'admin_dashboard_firequery',);
            }

            // admin_dashboard_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DashboardController::fireupdateQuery',  '_route' => 'admin_dashboard_fireupdatequery',);
            }

        }

        // admin_dashboard_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DashboardController::getLanguages',  '_route' => 'admin_dashboard_getlanguages',);
        }

        // admin_dashboard_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DashboardController::mediauploadAction',  '_route' => 'admin_dashboard_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_dashboard_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DashboardController::getmediaAction',  '_route' => 'admin_dashboard_getmedia',);
            }

            // admin_dashboard_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DashboardController::getLoyalitypointAction',  '_route' => 'admin_dashboard_getloyalitypoint',);
            }

        }

        // admin_default_index
        if ('' === rtrim($pathinfo, '/')) {
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                goto not_admin_default_index;
            } else {
                return $this->redirect($rawPathinfo.'/', 'admin_default_index');
            }

            return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::indexAction',  '_route' => 'admin_default_index',);
        }
        not_admin_default_index:

        if (0 === strpos($pathinfo, '/log')) {
            // admin_default_logincheck
            if ('/logincheck' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::logincheckAction',  '_route' => 'admin_default_logincheck',);
            }

            // admin_default_logout
            if ('/logout' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::logoutAction',  '_route' => 'admin_default_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/deliveryMethod')) {
            // admin_deliverymethods_index
            if ('/deliveryMethod' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryMethodsController::indexAction',  '_route' => 'admin_deliverymethods_index',);
            }

            // admin_deliverymethods_add
            if (0 === strpos($pathinfo, '/deliveryMethod/addDeliveryMethod') && preg_match('#^/deliveryMethod/addDeliveryMethod(?:/(?P<main_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_deliverymethods_add')), array (  'main_id' => '0',  '_controller' => 'AdminBundle\\Controller\\DeliveryMethodsController::addAction',));
            }

            // admin_deliverymethods_save
            if ('/deliveryMethod/save' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryMethodsController::saveAction',  '_route' => 'admin_deliverymethods_save',);
            }

            // admin_deliverymethods_delete
            if (0 === strpos($pathinfo, '/deliveryMethod/deleteDeliveryMethod') && preg_match('#^/deliveryMethod/deleteDeliveryMethod(?:/(?P<main_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_deliverymethods_delete')), array (  'main_id' => '0',  '_controller' => 'AdminBundle\\Controller\\DeliveryMethodsController::deleteAction',));
            }

        }

        // admin_deliverymethods_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryMethodsController::chksessionAction',  '_route' => 'admin_deliverymethods_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_deliverymethods_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryMethodsController::fireQuery',  '_route' => 'admin_deliverymethods_firequery',);
            }

            // admin_deliverymethods_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryMethodsController::fireupdateQuery',  '_route' => 'admin_deliverymethods_fireupdatequery',);
            }

        }

        // admin_deliverymethods_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryMethodsController::getLanguages',  '_route' => 'admin_deliverymethods_getlanguages',);
        }

        // admin_deliverymethods_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryMethodsController::mediauploadAction',  '_route' => 'admin_deliverymethods_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_deliverymethods_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryMethodsController::getmediaAction',  '_route' => 'admin_deliverymethods_getmedia',);
            }

            // admin_deliverymethods_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryMethodsController::getLoyalitypointAction',  '_route' => 'admin_deliverymethods_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/deliveryreason')) {
            // admin_deliveryreason_index
            if ('/deliveryreason' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryReasonController::indexAction',  '_route' => 'admin_deliveryreason_index',);
            }

            // admin_deliveryreason_addreason
            if (0 === strpos($pathinfo, '/deliveryreason/addReason') && preg_match('#^/deliveryreason/addReason(?:/(?P<main_reason_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_deliveryreason_addreason')), array (  'main_reason_id' => '0',  '_controller' => 'AdminBundle\\Controller\\DeliveryReasonController::addReasonAction',));
            }

            // admin_deliveryreason_savereason
            if ('/deliveryreason/save' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryReasonController::saveReasonAction',  '_route' => 'admin_deliveryreason_savereason',);
            }

            // admin_deliveryreason_deletereason
            if (0 === strpos($pathinfo, '/deliveryreason/deletereason') && preg_match('#^/deliveryreason/deletereason(?:/(?P<main_reason_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_deliveryreason_deletereason')), array (  'main_reason_id' => '0',  '_controller' => 'AdminBundle\\Controller\\DeliveryReasonController::deletereasonAction',));
            }

        }

        // admin_deliveryreason_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryReasonController::chksessionAction',  '_route' => 'admin_deliveryreason_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_deliveryreason_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryReasonController::fireQuery',  '_route' => 'admin_deliveryreason_firequery',);
            }

            // admin_deliveryreason_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryReasonController::fireupdateQuery',  '_route' => 'admin_deliveryreason_fireupdatequery',);
            }

        }

        // admin_deliveryreason_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryReasonController::getLanguages',  '_route' => 'admin_deliveryreason_getlanguages',);
        }

        // admin_deliveryreason_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryReasonController::mediauploadAction',  '_route' => 'admin_deliveryreason_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_deliveryreason_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryReasonController::getmediaAction',  '_route' => 'admin_deliveryreason_getmedia',);
            }

            // admin_deliveryreason_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DeliveryReasonController::getLoyalitypointAction',  '_route' => 'admin_deliveryreason_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/diet')) {
            if (0 === strpos($pathinfo, '/diet-customer-service/diet')) {
                // admin_dietitiancustomerservice_dietsendnotificationcustomerserviceusers
                if ('/diet-customer-service/dietsendnotificationcustomerserviceusers' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::dietsendnotificationcustomerserviceusersAction',  '_route' => 'admin_dietitiancustomerservice_dietsendnotificationcustomerserviceusers',);
                }

                // admin_dietitiancustomerservice_dietnotpaid
                if ('/diet-customer-service/dietnot-paid' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::dietnotpaidAction',  '_route' => 'admin_dietitiancustomerservice_dietnotpaid',);
                }

                // admin_dietitiancustomerservice_dietactiveusers
                if ('/diet-customer-service/dietactive-users' === $pathinfo) {
                    return array (  'order_id' => '0',  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::dietactiveusersAction',  '_route' => 'admin_dietitiancustomerservice_dietactiveusers',);
                }

                // admin_dietitiancustomerservice_dietexpiredusers
                if ('/diet-customer-service/dietexpired-users' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::dietexpiredusersAction',  '_route' => 'admin_dietitiancustomerservice_dietexpiredusers',);
                }

                // admin_dietitiancustomerservice_diettriedtopurchaseusers
                if ('/diet-customer-service/diettriedtopurchase-users' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::diettriedtopurchaseusersAction',  '_route' => 'admin_dietitiancustomerservice_diettriedtopurchaseusers',);
                }

            }

            // admin_dietitiancustomerservice_dietactiveusercount
            if ('/dietactive-user-count' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::dietactiveusercountAction',  '_route' => 'admin_dietitiancustomerservice_dietactiveusercount',);
            }

            // admin_dietitiancustomerservice_dietexpiredusercount
            if ('/dietxpired-user-count' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::dietexpiredusercountAction',  '_route' => 'admin_dietitiancustomerservice_dietexpiredusercount',);
            }

            // admin_dietitiancustomerservice_diettriedtopurchasecount
            if ('/diettriedtopurchasecount' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::diettriedtopurchasecountAction',  '_route' => 'admin_dietitiancustomerservice_diettriedtopurchasecount',);
            }

            // admin_dietitiancustomerservice_dietnotsubscribedusercount
            if ('/dietnotsubscribed-user-count' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::dietnotsubscribedusercountAction',  '_route' => 'admin_dietitiancustomerservice_dietnotsubscribedusercount',);
            }

        }

        // admin_dietitiancustomerservice_getcomment
        if (0 === strpos($pathinfo, '/getcomment') && preg_match('#^/getcomment(?:/(?P<order_id>[^/]++)(?:/(?P<user_id>[^/]++)(?:/(?P<unique_no>[^/]++))?)?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_dietitiancustomerservice_getcomment')), array (  'order_id' => '0',  'user_id' => '0',  'unique_no' => '0',  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::getcommentAction',));
        }

        // admin_dietitiancustomerservice_savecomment
        if ('/savecomment' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::savecommentAction',  '_route' => 'admin_dietitiancustomerservice_savecomment',);
        }

        // admin_dietitiancustomerservice_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::chksessionAction',  '_route' => 'admin_dietitiancustomerservice_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_dietitiancustomerservice_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::fireQuery',  '_route' => 'admin_dietitiancustomerservice_firequery',);
            }

            // admin_dietitiancustomerservice_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::fireupdateQuery',  '_route' => 'admin_dietitiancustomerservice_fireupdatequery',);
            }

        }

        // admin_dietitiancustomerservice_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::getLanguages',  '_route' => 'admin_dietitiancustomerservice_getlanguages',);
        }

        // admin_dietitiancustomerservice_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::mediauploadAction',  '_route' => 'admin_dietitiancustomerservice_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_dietitiancustomerservice_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::getmediaAction',  '_route' => 'admin_dietitiancustomerservice_getmedia',);
            }

            // admin_dietitiancustomerservice_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DietitianCustomerserviceController::getLoyalitypointAction',  '_route' => 'admin_dietitiancustomerservice_getloyalitypoint',);
            }

        }

        // admin_dietstatus_index
        if ('/dietstatuslist' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DietstatusController::indexAction',  '_route' => 'admin_dietstatus_index',);
        }

        // admin_dietstatus_adddietstatus
        if (0 === strpos($pathinfo, '/adddietstatus') && preg_match('#^/adddietstatus(?:/(?P<main_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_dietstatus_adddietstatus')), array (  'main_id' => '0',  '_controller' => 'AdminBundle\\Controller\\DietstatusController::adddietstatusAction',));
        }

        // admin_dietstatus_savesietstatus
        if ('/savesietstatus' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DietstatusController::savesietstatusAction',  '_route' => 'admin_dietstatus_savesietstatus',);
        }

        // admin_dietstatus_deletegoal
        if (0 === strpos($pathinfo, '/goal/deleteGoal') && preg_match('#^/goal/deleteGoal(?:/(?P<main_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_dietstatus_deletegoal')), array (  'main_id' => '0',  '_controller' => 'AdminBundle\\Controller\\DietstatusController::deleteGoalAction',));
        }

        // admin_dietstatus_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DietstatusController::chksessionAction',  '_route' => 'admin_dietstatus_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_dietstatus_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DietstatusController::fireQuery',  '_route' => 'admin_dietstatus_firequery',);
            }

            // admin_dietstatus_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DietstatusController::fireupdateQuery',  '_route' => 'admin_dietstatus_fireupdatequery',);
            }

        }

        // admin_dietstatus_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DietstatusController::getLanguages',  '_route' => 'admin_dietstatus_getlanguages',);
        }

        // admin_dietstatus_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DietstatusController::mediauploadAction',  '_route' => 'admin_dietstatus_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_dietstatus_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DietstatusController::getmediaAction',  '_route' => 'admin_dietstatus_getmedia',);
            }

            // admin_dietstatus_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DietstatusController::getLoyalitypointAction',  '_route' => 'admin_dietstatus_getloyalitypoint',);
            }

        }

        // admin_driverorders_index
        if (0 === strpos($pathinfo, '/driverOrders') && preg_match('#^/driverOrders(?:/(?P<driver_id>[^/]++)(?:/(?P<date_given>[^/]++))?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_driverorders_index')), array (  'driver_id' => '0',  'date_given' => '0',  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_driverorders_getordermealdata
            if (0 === strpos($pathinfo, '/getOrderMealData') && preg_match('#^/getOrderMealData(?:/(?P<order_id>[^/]++)(?:/(?P<date_given>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_driverorders_getordermealdata')), array (  'order_id' => '0',  'date_given' => '',  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::getOrderMealDataAction',));
            }

            // admin_driverorders_getdriverorders
            if (0 === strpos($pathinfo, '/getDriverOrders') && preg_match('#^/getDriverOrders(?:/(?P<driver_id>[^/]++)(?:/(?P<date_given>[^/]++)(?:/(?P<time_slot_id>[^/]++)(?:/(?P<area_id>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_driverorders_getdriverorders')), array (  'driver_id' => '0',  'date_given' => '',  'time_slot_id' => '',  'area_id' => '',  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::getDriverOrdersAction',));
            }

        }

        if (0 === strpos($pathinfo, '/print')) {
            if (0 === strpos($pathinfo, '/printDeliverySticker')) {
                // admin_driverorders_printdeliverystickerold
                if (0 === strpos($pathinfo, '/printDeliveryStickerold') && preg_match('#^/printDeliveryStickerold/(?P<order_id>[^/]++)(?:/(?P<driver_id>[^/]++)(?:/(?P<date_given>[^/]++)(?:/(?P<time_id_given>[^/]++)(?:/(?P<area_id_given>[^/]++))?)?)?)?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_driverorders_printdeliverystickerold')), array (  'driver_id' => '0',  'date_given' => '0',  'time_id_given' => '0',  'area_id_given' => '0',  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::printdeliverystickeroldAction',));
                }

                // admin_driverorders_printdeliverysticker
                if (preg_match('#^/printDeliverySticker(?:/(?P<order_id>[^/]++)(?:/(?P<driver_id>[^/]++)(?:/(?P<date_given>[^/]++)(?:/(?P<time_id_given>[^/]++)(?:/(?P<area_id_given>[^/]++))?)?)?)?)?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_driverorders_printdeliverysticker')), array (  'order_id' => '0',  'driver_id' => '0',  'date_given' => '0',  'time_id_given' => '0',  'area_id_given' => '0',  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::printdeliverystickerAction',));
                }

            }

            // admin_driverorders_printmealsticker
            if (0 === strpos($pathinfo, '/printMealSticker') && preg_match('#^/printMealSticker(?:/(?P<order_id>[^/]++)(?:/(?P<driver_id>[^/]++)(?:/(?P<date_given>[^/]++)(?:/(?P<time_id_given>[^/]++)(?:/(?P<area_id_given>[^/]++))?)?)?)?)?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_driverorders_printmealsticker')), array (  'order_id' => '0',  'driver_id' => '0',  'date_given' => '0',  'time_id_given' => '0',  'area_id_given' => '0',  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::printmealstickerAction',));
            }

            // admin_driverorders_printdriversticker
            if (0 === strpos($pathinfo, '/printDriverSticker') && preg_match('#^/printDriverSticker(?:/(?P<order_id>[^/]++)(?:/(?P<driver_id>[^/]++)(?:/(?P<date_given>[^/]++)(?:/(?P<time_id_given>[^/]++)(?:/(?P<area_id_given>[^/]++))?)?)?)?)?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_driverorders_printdriversticker')), array (  'order_id' => '0',  'driver_id' => '0',  'date_given' => '0',  'time_id_given' => '0',  'area_id_given' => '0',  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::printDriverstickerAction',));
            }

        }

        // admin_driverorders_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::chksessionAction',  '_route' => 'admin_driverorders_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_driverorders_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::fireQuery',  '_route' => 'admin_driverorders_firequery',);
            }

            // admin_driverorders_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::fireupdateQuery',  '_route' => 'admin_driverorders_fireupdatequery',);
            }

        }

        // admin_driverorders_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::getLanguages',  '_route' => 'admin_driverorders_getlanguages',);
        }

        // admin_driverorders_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::mediauploadAction',  '_route' => 'admin_driverorders_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_driverorders_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::getmediaAction',  '_route' => 'admin_driverorders_getmedia',);
            }

            // admin_driverorders_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DriverOrdersController::getLoyalitypointAction',  '_route' => 'admin_driverorders_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/entity')) {
            // admin_entity_index
            if ('/entity' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\EntityController::indexAction',  '_route' => 'admin_entity_index',);
            }

            // admin_entity_createentity
            if ('/entity/createentity' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\EntityController::createentityAction',  '_route' => 'admin_entity_createentity',);
            }

        }

        if (0 === strpos($pathinfo, '/festival')) {
            // admin_festival_index
            if ('/festival' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\FestivalController::indexAction',  '_route' => 'admin_festival_index',);
            }

            // admin_festival_addfestival
            if (0 === strpos($pathinfo, '/festival/addFestival') && preg_match('#^/festival/addFestival(?:/(?P<festival_master_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_festival_addfestival')), array (  'festival_master_id' => '0',  '_controller' => 'AdminBundle\\Controller\\FestivalController::addfestivalAction',));
            }

        }

        // admin_festival_deletefestival
        if (0 === strpos($pathinfo, '/deleteFestival') && preg_match('#^/deleteFestival(?:/(?P<festival_master_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_festival_deletefestival')), array (  'festival_master_id' => '0',  '_controller' => 'AdminBundle\\Controller\\FestivalController::deletefestivalAction',));
        }

        // admin_festival_savefestival
        if ('/saveFestival' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\FestivalController::savefestivalAction',  '_route' => 'admin_festival_savefestival',);
        }

        if (0 === strpos($pathinfo, '/ch')) {
            // admin_festival_changefestivalstatus
            if ('/changeFestivalStatus' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\FestivalController::changefestivalstatusAction',  '_route' => 'admin_festival_changefestivalstatus',);
            }

            // admin_festival_chksession
            if ('/chksession' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\FestivalController::chksessionAction',  '_route' => 'admin_festival_chksession',);
            }

        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_festival_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\FestivalController::fireQuery',  '_route' => 'admin_festival_firequery',);
            }

            // admin_festival_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\FestivalController::fireupdateQuery',  '_route' => 'admin_festival_fireupdatequery',);
            }

        }

        // admin_festival_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\FestivalController::getLanguages',  '_route' => 'admin_festival_getlanguages',);
        }

        // admin_festival_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\FestivalController::mediauploadAction',  '_route' => 'admin_festival_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/g')) {
            if (0 === strpos($pathinfo, '/get')) {
                // admin_festival_getmedia
                if ('/getmedia' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\FestivalController::getmediaAction',  '_route' => 'admin_festival_getmedia',);
                }

                // admin_festival_getloyalitypoint
                if ('/getLoyalitypoint' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\FestivalController::getLoyalitypointAction',  '_route' => 'admin_festival_getloyalitypoint',);
                }

            }

            if (0 === strpos($pathinfo, '/gallery')) {
                // admin_gallery_index
                if ('/gallery' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\GalleryController::indexAction',  '_route' => 'admin_gallery_index',);
                }

                // admin_gallery_addgallery
                if (0 === strpos($pathinfo, '/gallery/addGallery') && preg_match('#^/gallery/addGallery(?:/(?P<gallery_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gallery_addgallery')), array (  'gallery_id' => '0',  '_controller' => 'AdminBundle\\Controller\\GalleryController::addGalleryAction',));
                }

                // admin_gallery_deletegallery
                if (0 === strpos($pathinfo, '/gallery/deleteGallery') && preg_match('#^/gallery/deleteGallery(?:/(?P<gallery_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gallery_deletegallery')), array (  'gallery_id' => '0',  '_controller' => 'AdminBundle\\Controller\\GalleryController::deleteGalleryAction',));
                }

                // admin_gallery_savegallery
                if ('/gallery/save' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\GalleryController::saveGalleryAction',  '_route' => 'admin_gallery_savegallery',);
                }

            }

        }

        // admin_gallery_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\GalleryController::chksessionAction',  '_route' => 'admin_gallery_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_gallery_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\GalleryController::fireQuery',  '_route' => 'admin_gallery_firequery',);
            }

            // admin_gallery_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\GalleryController::fireupdateQuery',  '_route' => 'admin_gallery_fireupdatequery',);
            }

        }

        // admin_gallery_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\GalleryController::getLanguages',  '_route' => 'admin_gallery_getlanguages',);
        }

        // admin_gallery_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\GalleryController::mediauploadAction',  '_route' => 'admin_gallery_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_gallery_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\GalleryController::getmediaAction',  '_route' => 'admin_gallery_getmedia',);
            }

            // admin_gallery_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\GalleryController::getLoyalitypointAction',  '_route' => 'admin_gallery_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/s')) {
            // admin_generalsettings_index
            if ('/settings' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\GeneralSettingsController::indexAction',  '_route' => 'admin_generalsettings_index',);
            }

            // admin_generalsettings_savesetting
            if ('/saveSetting' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\GeneralSettingsController::savesettingAction',  '_route' => 'admin_generalsettings_savesetting',);
            }

        }

        // admin_generalsettings_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\GeneralSettingsController::chksessionAction',  '_route' => 'admin_generalsettings_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_generalsettings_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\GeneralSettingsController::fireQuery',  '_route' => 'admin_generalsettings_firequery',);
            }

            // admin_generalsettings_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\GeneralSettingsController::fireupdateQuery',  '_route' => 'admin_generalsettings_fireupdatequery',);
            }

        }

        // admin_generalsettings_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\GeneralSettingsController::getLanguages',  '_route' => 'admin_generalsettings_getlanguages',);
        }

        // admin_generalsettings_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\GeneralSettingsController::mediauploadAction',  '_route' => 'admin_generalsettings_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/g')) {
            if (0 === strpos($pathinfo, '/get')) {
                // admin_generalsettings_getmedia
                if ('/getmedia' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\GeneralSettingsController::getmediaAction',  '_route' => 'admin_generalsettings_getmedia',);
                }

                // admin_generalsettings_getloyalitypoint
                if ('/getLoyalitypoint' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\GeneralSettingsController::getLoyalitypointAction',  '_route' => 'admin_generalsettings_getloyalitypoint',);
                }

            }

            if (0 === strpos($pathinfo, '/goal')) {
                // admin_goal_index
                if ('/goal' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\GoalController::indexAction',  '_route' => 'admin_goal_index',);
                }

                // admin_goal_addgoal
                if (0 === strpos($pathinfo, '/goal/addGoal') && preg_match('#^/goal/addGoal(?:/(?P<main_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_goal_addgoal')), array (  'main_id' => '0',  '_controller' => 'AdminBundle\\Controller\\GoalController::addGoalAction',));
                }

                // admin_goal_savegoal
                if ('/goal/save' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\GoalController::saveGoalAction',  '_route' => 'admin_goal_savegoal',);
                }

                // admin_goal_deletegoal
                if (0 === strpos($pathinfo, '/goal/deleteGoal') && preg_match('#^/goal/deleteGoal(?:/(?P<main_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_goal_deletegoal')), array (  'main_id' => '0',  '_controller' => 'AdminBundle\\Controller\\GoalController::deleteGoalAction',));
                }

            }

        }

        // admin_goal_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\GoalController::chksessionAction',  '_route' => 'admin_goal_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_goal_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\GoalController::fireQuery',  '_route' => 'admin_goal_firequery',);
            }

            // admin_goal_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\GoalController::fireupdateQuery',  '_route' => 'admin_goal_fireupdatequery',);
            }

        }

        // admin_goal_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\GoalController::getLanguages',  '_route' => 'admin_goal_getlanguages',);
        }

        // admin_goal_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\GoalController::mediauploadAction',  '_route' => 'admin_goal_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_goal_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\GoalController::getmediaAction',  '_route' => 'admin_goal_getmedia',);
            }

            // admin_goal_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\GoalController::getLoyalitypointAction',  '_route' => 'admin_goal_getloyalitypoint',);
            }

        }

        // admin_height_index
        if ('/Height' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\HeightController::indexAction',  '_route' => 'admin_height_index',);
        }

        if (0 === strpos($pathinfo, '/height')) {
            // admin_height_addheight
            if (0 === strpos($pathinfo, '/height/addHeight') && preg_match('#^/height/addHeight(?:/(?P<main_height_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_height_addheight')), array (  'main_height_id' => '0',  '_controller' => 'AdminBundle\\Controller\\HeightController::addHeightAction',));
            }

            // admin_height_saveheight
            if ('/height/save' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\HeightController::saveheightAction',  '_route' => 'admin_height_saveheight',);
            }

            // admin_height_deleteheight
            if (0 === strpos($pathinfo, '/height/deleteheight') && preg_match('#^/height/deleteheight(?:/(?P<main_height_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_height_deleteheight')), array (  'main_height_id' => '0',  '_controller' => 'AdminBundle\\Controller\\HeightController::deleteheightAction',));
            }

        }

        // admin_height_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\HeightController::chksessionAction',  '_route' => 'admin_height_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_height_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\HeightController::fireQuery',  '_route' => 'admin_height_firequery',);
            }

            // admin_height_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\HeightController::fireupdateQuery',  '_route' => 'admin_height_fireupdatequery',);
            }

        }

        // admin_height_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\HeightController::getLanguages',  '_route' => 'admin_height_getlanguages',);
        }

        // admin_height_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\HeightController::mediauploadAction',  '_route' => 'admin_height_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_height_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\HeightController::getmediaAction',  '_route' => 'admin_height_getmedia',);
            }

            // admin_height_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\HeightController::getLoyalitypointAction',  '_route' => 'admin_height_getloyalitypoint',);
            }

        }

        // admin_mealtypes_index
        if ('/mealsType' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\MealtypesController::indexAction',  '_route' => 'admin_mealtypes_index',);
        }

        // admin_mealtypes_addmeal
        if (0 === strpos($pathinfo, '/addMeal') && preg_match('#^/addMeal(?:/(?P<meal_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_mealtypes_addmeal')), array (  'meal_id' => '0',  '_controller' => 'AdminBundle\\Controller\\MealtypesController::addmealAction',));
        }

        // admin_mealtypes_savemeal
        if ('/saveMealType' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\MealtypesController::savemealAction',  '_route' => 'admin_mealtypes_savemeal',);
        }

        // admin_mealtypes_deletemeal
        if (0 === strpos($pathinfo, '/deleteMeal') && preg_match('#^/deleteMeal(?:/(?P<meal_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_mealtypes_deletemeal')), array (  'meal_id' => '0',  '_controller' => 'AdminBundle\\Controller\\MealtypesController::deletemealAction',));
        }

        // admin_mealtypes_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\MealtypesController::chksessionAction',  '_route' => 'admin_mealtypes_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_mealtypes_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\MealtypesController::fireQuery',  '_route' => 'admin_mealtypes_firequery',);
            }

            // admin_mealtypes_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\MealtypesController::fireupdateQuery',  '_route' => 'admin_mealtypes_fireupdatequery',);
            }

        }

        // admin_mealtypes_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\MealtypesController::getLanguages',  '_route' => 'admin_mealtypes_getlanguages',);
        }

        // admin_mealtypes_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\MealtypesController::mediauploadAction',  '_route' => 'admin_mealtypes_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_mealtypes_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\MealtypesController::getmediaAction',  '_route' => 'admin_mealtypes_getmedia',);
            }

            // admin_mealtypes_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\MealtypesController::getLoyalitypointAction',  '_route' => 'admin_mealtypes_getloyalitypoint',);
            }

        }

        // admin_ordernote_index
        if ('/ordernote' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\OrdernoteController::indexAction',  '_route' => 'admin_ordernote_index',);
        }

        // admin_ordernote_addordernote
        if (0 === strpos($pathinfo, '/addOrdernote') && preg_match('#^/addOrdernote(?:/(?P<ordernote_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_ordernote_addordernote')), array (  'ordernote_id' => '0',  '_controller' => 'AdminBundle\\Controller\\OrdernoteController::addordernoteAction',));
        }

        // admin_ordernote_saveordernote
        if ('/saveordernote' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\OrdernoteController::saveordernoteAction',  '_route' => 'admin_ordernote_saveordernote',);
        }

        // admin_ordernote_deleteordernote
        if (0 === strpos($pathinfo, '/deleteordernote') && preg_match('#^/deleteordernote(?:/(?P<ordernote_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_ordernote_deleteordernote')), array (  'ordernote_id' => '0',  '_controller' => 'AdminBundle\\Controller\\OrdernoteController::deleteordernoteAction',));
        }

        // admin_ordernote_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\OrdernoteController::chksessionAction',  '_route' => 'admin_ordernote_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_ordernote_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdernoteController::fireQuery',  '_route' => 'admin_ordernote_firequery',);
            }

            // admin_ordernote_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdernoteController::fireupdateQuery',  '_route' => 'admin_ordernote_fireupdatequery',);
            }

        }

        // admin_ordernote_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\OrdernoteController::getLanguages',  '_route' => 'admin_ordernote_getlanguages',);
        }

        // admin_ordernote_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\OrdernoteController::mediauploadAction',  '_route' => 'admin_ordernote_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_ordernote_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdernoteController::getmediaAction',  '_route' => 'admin_ordernote_getmedia',);
            }

            // admin_ordernote_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdernoteController::getLoyalitypointAction',  '_route' => 'admin_ordernote_getloyalitypoint',);
            }

        }

        // admin_orders_freezefromadmin
        if ('/freezeFromAdmin' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::freezeFromAdminAction',  '_route' => 'admin_orders_freezefromadmin',);
        }

        if (0 === strpos($pathinfo, '/orders')) {
            // admin_orders_index
            if (0 === strpos($pathinfo, '/orders/list') && preg_match('#^/orders/list(?:/(?P<status>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_orders_index')), array (  'status' => 'Active',  '_controller' => 'AdminBundle\\Controller\\OrdersController::indexAction',));
            }

            // admin_orders_ajaxlist
            if (0 === strpos($pathinfo, '/orders/ajaxlist') && preg_match('#^/orders/ajaxlist(?:/(?P<status>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_orders_ajaxlist')), array (  'status' => 'Active',  '_controller' => 'AdminBundle\\Controller\\OrdersController::ajaxlistAction',));
            }

            if (0 === strpos($pathinfo, '/orders/view')) {
                // admin_orders_vieworder
                if (preg_match('#^/orders/view(?:/(?P<order_master_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_orders_vieworder')), array (  'order_master_id' => '0',  '_controller' => 'AdminBundle\\Controller\\OrdersController::vieworderAction',));
                }

                // admin_orders_vieworderwiseoffdays
                if (0 === strpos($pathinfo, '/orders/vieworderwiseoffdays') && preg_match('#^/orders/vieworderwiseoffdays(?:/(?P<order_master_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_orders_vieworderwiseoffdays')), array (  'order_master_id' => '0',  '_controller' => 'AdminBundle\\Controller\\OrdersController::vieworderwiseoffdaysAction',));
                }

            }

            if (0 === strpos($pathinfo, '/orders/Assign')) {
                // admin_orders_assigndrivertoallorder
                if ('/orders/AssignDriverToAllOrder' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::AssignDriverToAllOrderAction',  '_route' => 'admin_orders_assigndrivertoallorder',);
                }

                // admin_orders_assignnote
                if ('/orders/AssignNote' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::AssignNoteAction',  '_route' => 'admin_orders_assignnote',);
                }

            }

            // admin_orders_changedeliverytime
            if ('/orders/changedeliverytime' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::changedeliverytimeAction',  '_route' => 'admin_orders_changedeliverytime',);
            }

            // admin_orders_ordermeals
            if (0 === strpos($pathinfo, '/orders/meals') && preg_match('#^/orders/meals(?:/(?P<order_master_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_orders_ordermeals')), array (  'order_master_id' => '0',  '_controller' => 'AdminBundle\\Controller\\OrdersController::orderMealsAction',));
            }

        }

        // admin_orders_deliverynote
        if (0 === strpos($pathinfo, '/delivery-note') && preg_match('#^/delivery\\-note(?:/(?P<order_master_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_orders_deliverynote')), array (  'order_master_id' => '0',  '_controller' => 'AdminBundle\\Controller\\OrdersController::deliverynoteAction',));
        }

        if (0 === strpos($pathinfo, '/orders')) {
            // admin_orders_assigndriver
            if ('/orders/assignDriver' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::assignDriverAction',  '_route' => 'admin_orders_assigndriver',);
            }

            if (0 === strpos($pathinfo, '/orders/get')) {
                if (0 === strpos($pathinfo, '/orders/getMeals')) {
                    if (0 === strpos($pathinfo, '/orders/getMealsDa')) {
                        // admin_orders_getmealsdaywise
                        if ('/orders/getMealsDayWise' === $pathinfo) {
                            return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::getMealsDayWiseAction',  '_route' => 'admin_orders_getmealsdaywise',);
                        }

                        // admin_orders_getmealsdatewisefilter
                        if (0 === strpos($pathinfo, '/orders/getMealsDateWiseFilter') && preg_match('#^/orders/getMealsDateWiseFilter(?:/(?P<quick_access>[^/]++)(?:/(?P<order_id>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_orders_getmealsdatewisefilter')), array (  'quick_access' => 'all_by_order',  'order_id' => '0',  '_controller' => 'AdminBundle\\Controller\\OrdersController::getMealsDateWiseFilterAction',));
                        }

                    }

                    // admin_orders_getmealsegssbyproduct
                    if ('/orders/getMealsEgssByProduct' === $pathinfo) {
                        return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::getMealsEgssByProductAction',  '_route' => 'admin_orders_getmealsegssbyproduct',);
                    }

                }

                // admin_orders_getupgradegramvaluebydate
                if ('/orders/getupgradegramvaluebydate' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::getupgradegramvaluebydateAction',  '_route' => 'admin_orders_getupgradegramvaluebydate',);
                }

            }

            // admin_orders_deletemealproduct
            if ('/orders/deletemealproduct' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::deletemealproductAction',  '_route' => 'admin_orders_deletemealproduct',);
            }

            // admin_orders_addmealbyadmin
            if ('/orders/addMealByAdmin' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::addMealByAdminAction',  '_route' => 'admin_orders_addmealbyadmin',);
            }

            // admin_orders_getmealsbytype
            if ('/orders/getMealsByType' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::getMealsByTypeAction',  '_route' => 'admin_orders_getmealsbytype',);
            }

            // admin_orders_editmeal
            if ('/orders/editMeal' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::editMealAction',  '_route' => 'admin_orders_editmeal',);
            }

            // admin_orders_deletemeal
            if ('/orders/deletemeal' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::deletemealAction',  '_route' => 'admin_orders_deletemeal',);
            }

            // admin_orders_setsubs
            if ('/orders/setSubscriptionIds' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::setSubsAction',  '_route' => 'admin_orders_setsubs',);
            }

            // admin_orders_gettotalorders
            if (0 === strpos($pathinfo, '/orders/getTotalOrders') && preg_match('#^/orders/getTotalOrders(?:/(?P<quick_access>[^/]++)(?:/(?P<order_id>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_orders_gettotalorders')), array (  'quick_access' => 'all_by_order',  'order_id' => '0',  '_controller' => 'AdminBundle\\Controller\\OrdersController::gettotalordersAction',));
            }

        }

        if (0 === strpos($pathinfo, '/change')) {
            // admin_orders_changedayoffstatus
            if ('/changedayoffstatus' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::changedayoffstatusAction',  '_route' => 'admin_orders_changedayoffstatus',);
            }

            // admin_orders_changeordersubscription
            if ('/changeordersubscription' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::changeordersubscriptionAction',  '_route' => 'admin_orders_changeordersubscription',);
            }

        }

        // admin_orders_adddaystoorder
        if ('/adddaystoorder' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::adddaystoorderAction',  '_route' => 'admin_orders_adddaystoorder',);
        }

        // admin_orders_expireorderbeforedate
        if ('/expireorderbeforedate' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::expireorderbeforedateAction',  '_route' => 'admin_orders_expireorderbeforedate',);
        }

        // admin_orders_cancelorderupdate
        if ('/orders/cancelorderupdate' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::cancelorderupdateAction',  '_route' => 'admin_orders_cancelorderupdate',);
        }

        // admin_orders_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::chksessionAction',  '_route' => 'admin_orders_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_orders_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::fireQuery',  '_route' => 'admin_orders_firequery',);
            }

            // admin_orders_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::fireupdateQuery',  '_route' => 'admin_orders_fireupdatequery',);
            }

        }

        // admin_orders_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::getLanguages',  '_route' => 'admin_orders_getlanguages',);
        }

        // admin_orders_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::mediauploadAction',  '_route' => 'admin_orders_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_orders_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::getmediaAction',  '_route' => 'admin_orders_getmedia',);
            }

            // admin_orders_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\OrdersController::getLoyalitypointAction',  '_route' => 'admin_orders_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/package')) {
            // admin_package_index
            if ('/package' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PackageController::indexAction',  '_route' => 'admin_package_index',);
            }

            if (0 === strpos($pathinfo, '/package/add')) {
                // admin_package_addpackage
                if (0 === strpos($pathinfo, '/package/addPackage') && preg_match('#^/package/addPackage(?:/(?P<main_package_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_package_addpackage')), array (  'main_package_id' => '0',  '_controller' => 'AdminBundle\\Controller\\PackageController::addPackageAction',));
                }

                // admin_package_adddefaultvaluesubpackage
                if (0 === strpos($pathinfo, '/package/adddefaultvaluesubpackage') && preg_match('#^/package/adddefaultvaluesubpackage/(?P<main_package_id>[^/]++)/(?P<sub_package_id>[^/]++)/(?P<language_id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_package_adddefaultvaluesubpackage')), array (  'main_package_id' => '0',  '_controller' => 'AdminBundle\\Controller\\PackageController::adddefaultvaluesubpackageAction',));
                }

            }

            if (0 === strpos($pathinfo, '/package/save')) {
                // admin_package_savedefaultmealsubpackage
                if ('/package/savedefaultmealsubpackage' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\PackageController::savedefaultmealsubpackageAction',  '_route' => 'admin_package_savedefaultmealsubpackage',);
                }

                // admin_package_savepackage
                if ('/package/save' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\PackageController::savePackageAction',  '_route' => 'admin_package_savepackage',);
                }

            }

            // admin_package_updatepackage
            if ('/package/update' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PackageController::updatePackageAction',  '_route' => 'admin_package_updatepackage',);
            }

            // admin_package_deletepackage
            if (0 === strpos($pathinfo, '/package/deletePackage') && preg_match('#^/package/deletePackage(?:/(?P<main_package_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_package_deletepackage')), array (  'main_package_id' => '0',  '_controller' => 'AdminBundle\\Controller\\PackageController::deletePackageAction',));
            }

        }

        if (0 === strpos($pathinfo, '/ch')) {
            // admin_package_changeproductstatus
            if ('/changeProductStatus' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PackageController::changeproductstatusAction',  '_route' => 'admin_package_changeproductstatus',);
            }

            // admin_package_chksession
            if ('/chksession' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PackageController::chksessionAction',  '_route' => 'admin_package_chksession',);
            }

        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_package_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PackageController::fireQuery',  '_route' => 'admin_package_firequery',);
            }

            // admin_package_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PackageController::fireupdateQuery',  '_route' => 'admin_package_fireupdatequery',);
            }

        }

        // admin_package_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PackageController::getLanguages',  '_route' => 'admin_package_getlanguages',);
        }

        // admin_package_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PackageController::mediauploadAction',  '_route' => 'admin_package_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_package_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PackageController::getmediaAction',  '_route' => 'admin_package_getmedia',);
            }

            // admin_package_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PackageController::getLoyalitypointAction',  '_route' => 'admin_package_getloyalitypoint',);
            }

        }

        // admin_packagefor_index
        if ('/packageFor' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PackageforController::indexAction',  '_route' => 'admin_packagefor_index',);
        }

        // admin_packagefor_addpackagefor
        if (0 === strpos($pathinfo, '/addPackageFor') && preg_match('#^/addPackageFor(?:/(?P<pk_for_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_packagefor_addpackagefor')), array (  'pk_for_id' => '0',  '_controller' => 'AdminBundle\\Controller\\PackageforController::addpackageForAction',));
        }

        // admin_packagefor_savepackagefor
        if ('/savePackageFor' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PackageforController::savepackageForAction',  '_route' => 'admin_packagefor_savepackagefor',);
        }

        // admin_packagefor_deletepackagefor
        if (0 === strpos($pathinfo, '/deletePackageFor') && preg_match('#^/deletePackageFor(?:/(?P<pk_for_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_packagefor_deletepackagefor')), array (  'pk_for_id' => '0',  '_controller' => 'AdminBundle\\Controller\\PackageforController::deletepackageforAction',));
        }

        // admin_packagefor_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PackageforController::chksessionAction',  '_route' => 'admin_packagefor_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_packagefor_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PackageforController::fireQuery',  '_route' => 'admin_packagefor_firequery',);
            }

            // admin_packagefor_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PackageforController::fireupdateQuery',  '_route' => 'admin_packagefor_fireupdatequery',);
            }

        }

        // admin_packagefor_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PackageforController::getLanguages',  '_route' => 'admin_packagefor_getlanguages',);
        }

        // admin_packagefor_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PackageforController::mediauploadAction',  '_route' => 'admin_packagefor_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_packagefor_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PackageforController::getmediaAction',  '_route' => 'admin_packagefor_getmedia',);
            }

            // admin_packagefor_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PackageforController::getLoyalitypointAction',  '_route' => 'admin_packagefor_getloyalitypoint',);
            }

        }

        // admin_pause_pausepackage
        if (0 === strpos($pathinfo, '/pausepackage') && preg_match('#^/pausepackage(?:/(?P<main_package_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pause_pausepackage')), array (  'main_package_id' => '0',  '_controller' => 'AdminBundle\\Controller\\PauseController::pausepackageAction',));
        }

        if (0 === strpos($pathinfo, '/s')) {
            // admin_pause_savepausepackage
            if ('/savepausepackage' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PauseController::savepausepackageAction',  '_route' => 'admin_pause_savepausepackage',);
            }

            // admin_pause_singlepauseorder
            if ('/singlepauseorder' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PauseController::singlepauseorderAction',  '_route' => 'admin_pause_singlepauseorder',);
            }

        }

        // admin_pause_pausepackageorders
        if (0 === strpos($pathinfo, '/pausepackageorders') && preg_match('#^/pausepackageorders(?:/(?P<main_package_id>[^/]++)(?:/(?P<pause_package_history_id>[^/]++))?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pause_pausepackageorders')), array (  'main_package_id' => '0',  'pause_package_history_id' => '0',  '_controller' => 'AdminBundle\\Controller\\PauseController::pausepackageordersAction',));
        }

        // admin_pause_updatepausepackage
        if ('/updatepausepackage' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PauseController::updatepausepackageAction',  '_route' => 'admin_pause_updatepausepackage',);
        }

        // admin_pause_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PauseController::chksessionAction',  '_route' => 'admin_pause_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_pause_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PauseController::fireQuery',  '_route' => 'admin_pause_firequery',);
            }

            // admin_pause_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PauseController::fireupdateQuery',  '_route' => 'admin_pause_fireupdatequery',);
            }

        }

        // admin_pause_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PauseController::getLanguages',  '_route' => 'admin_pause_getlanguages',);
        }

        // admin_pause_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PauseController::mediauploadAction',  '_route' => 'admin_pause_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_pause_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PauseController::getmediaAction',  '_route' => 'admin_pause_getmedia',);
            }

            // admin_pause_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PauseController::getLoyalitypointAction',  '_route' => 'admin_pause_getloyalitypoint',);
            }

        }

        // admin_pauseuserreports_pausereports
        if (0 === strpos($pathinfo, '/pausereports') && preg_match('#^/pausereports(?:/(?P<flag_type>[^/]++)(?:/(?P<filter_date_selected>[^/]++))?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pauseuserreports_pausereports')), array (  'flag_type' => '0',  'filter_date_selected' => '0',  '_controller' => 'AdminBundle\\Controller\\PauseuserreportsController::pausereportsAction',));
        }

        // admin_pauseuserreports_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PauseuserreportsController::chksessionAction',  '_route' => 'admin_pauseuserreports_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_pauseuserreports_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PauseuserreportsController::fireQuery',  '_route' => 'admin_pauseuserreports_firequery',);
            }

            // admin_pauseuserreports_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PauseuserreportsController::fireupdateQuery',  '_route' => 'admin_pauseuserreports_fireupdatequery',);
            }

        }

        // admin_pauseuserreports_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PauseuserreportsController::getLanguages',  '_route' => 'admin_pauseuserreports_getlanguages',);
        }

        // admin_pauseuserreports_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PauseuserreportsController::mediauploadAction',  '_route' => 'admin_pauseuserreports_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_pauseuserreports_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PauseuserreportsController::getmediaAction',  '_route' => 'admin_pauseuserreports_getmedia',);
            }

            // admin_pauseuserreports_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PauseuserreportsController::getLoyalitypointAction',  '_route' => 'admin_pauseuserreports_getloyalitypoint',);
            }

            // admin_product_getsubpackages
            if ('/getSubPackages' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ProductController::getSubPackagesAction',  '_route' => 'admin_product_getsubpackages',);
            }

        }

        if (0 === strpos($pathinfo, '/product')) {
            if (0 === strpos($pathinfo, '/products')) {
                // admin_product_index
                if ('/products' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\ProductController::indexAction',  '_route' => 'admin_product_index',);
                }

                // admin_product_addproduct
                if (0 === strpos($pathinfo, '/products/addProduct') && preg_match('#^/products/addProduct(?:/(?P<main_product_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_addproduct')), array (  'main_product_id' => '0',  '_controller' => 'AdminBundle\\Controller\\ProductController::addProductAction',));
                }

            }

            // admin_product_saveproduct
            if ('/product/save' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ProductController::saveProductAction',  '_route' => 'admin_product_saveproduct',);
            }

            // admin_product_deleteproduct
            if (0 === strpos($pathinfo, '/product/deleteProduct') && preg_match('#^/product/deleteProduct(?:/(?P<main_product_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_deleteproduct')), array (  'main_product_id' => '0',  '_controller' => 'AdminBundle\\Controller\\ProductController::deleteProductAction',));
            }

        }

        if (0 === strpos($pathinfo, '/ch')) {
            // admin_product_changeproductstatus
            if ('/changeProductStatus' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ProductController::changeproductstatusAction',  '_route' => 'admin_product_changeproductstatus',);
            }

            // admin_product_chksession
            if ('/chksession' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ProductController::chksessionAction',  '_route' => 'admin_product_chksession',);
            }

        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_product_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ProductController::fireQuery',  '_route' => 'admin_product_firequery',);
            }

            // admin_product_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ProductController::fireupdateQuery',  '_route' => 'admin_product_fireupdatequery',);
            }

        }

        // admin_product_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\ProductController::getLanguages',  '_route' => 'admin_product_getlanguages',);
        }

        // admin_product_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\ProductController::mediauploadAction',  '_route' => 'admin_product_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_product_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ProductController::getmediaAction',  '_route' => 'admin_product_getmedia',);
            }

            // admin_product_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ProductController::getLoyalitypointAction',  '_route' => 'admin_product_getloyalitypoint',);
            }

        }

        // admin_pushnotification_index
        if ('/pushnotification' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::indexAction',  '_route' => 'admin_pushnotification_index',);
        }

        if (0 === strpos($pathinfo, '/notification')) {
            // admin_pushnotification_deletenotification
            if (0 === strpos($pathinfo, '/notification/delete') && preg_match('#^/notification/delete(?:/(?P<id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pushnotification_deletenotification')), array (  'id' => '',  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::deleteNotificationAction',));
            }

            // admin_pushnotification_deletenotificationbulk
            if ('/notification-bulk/delete' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::deleteNotificationBulkAction',  '_route' => 'admin_pushnotification_deletenotificationbulk',);
            }

        }

        // admin_pushnotification_addpushnotification
        if (0 === strpos($pathinfo, '/addpushnotification') && preg_match('#^/addpushnotification(?:/(?P<user_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pushnotification_addpushnotification')), array (  'user_id' => '0',  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::addpushnotificationAction',));
        }

        // admin_pushnotification_sendnotification
        if ('/sendnotification' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::sendnotificationAction',  '_route' => 'admin_pushnotification_sendnotification',);
        }

        // admin_pushnotification_getuserlist
        if ('/getuserlist' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::getuserlistAction',  '_route' => 'admin_pushnotification_getuserlist',);
        }

        // admin_pushnotification_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::chksessionAction',  '_route' => 'admin_pushnotification_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_pushnotification_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::fireQuery',  '_route' => 'admin_pushnotification_firequery',);
            }

            // admin_pushnotification_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::fireupdateQuery',  '_route' => 'admin_pushnotification_fireupdatequery',);
            }

        }

        // admin_pushnotification_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::getLanguages',  '_route' => 'admin_pushnotification_getlanguages',);
        }

        // admin_pushnotification_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::mediauploadAction',  '_route' => 'admin_pushnotification_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_pushnotification_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::getmediaAction',  '_route' => 'admin_pushnotification_getmedia',);
            }

            // admin_pushnotification_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\PushnotificationController::getLoyalitypointAction',  '_route' => 'admin_pushnotification_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/rating')) {
            // admin_ratings_index
            if (0 === strpos($pathinfo, '/rating/list') && preg_match('#^/rating/list(?:/(?P<product_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_ratings_index')), array (  'product_id' => '0',  '_controller' => 'AdminBundle\\Controller\\RatingsController::indexAction',));
            }

            // admin_ratings_detelerating
            if (0 === strpos($pathinfo, '/ratings/deteleRating') && preg_match('#^/ratings/deteleRating(?:/(?P<ratings_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_ratings_detelerating')), array (  'ratings_id' => '0',  '_controller' => 'AdminBundle\\Controller\\RatingsController::deteleRatingAction',));
            }

        }

        // admin_ratings_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\RatingsController::chksessionAction',  '_route' => 'admin_ratings_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_ratings_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\RatingsController::fireQuery',  '_route' => 'admin_ratings_firequery',);
            }

            // admin_ratings_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\RatingsController::fireupdateQuery',  '_route' => 'admin_ratings_fireupdatequery',);
            }

        }

        // admin_ratings_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\RatingsController::getLanguages',  '_route' => 'admin_ratings_getlanguages',);
        }

        // admin_ratings_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\RatingsController::mediauploadAction',  '_route' => 'admin_ratings_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_ratings_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\RatingsController::getmediaAction',  '_route' => 'admin_ratings_getmedia',);
            }

            // admin_ratings_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\RatingsController::getLoyalitypointAction',  '_route' => 'admin_ratings_getloyalitypoint',);
            }

        }

        // admin_remainingdays_remdayscalllogs
        if ('/remdayscalllogs' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\RemainingdaysController::remdayscalllogsAction',  '_route' => 'admin_remainingdays_remdayscalllogs',);
        }

        // admin_remainingdays_updateremainingdays
        if ('/updateremainingdays' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\RemainingdaysController::updateremainingdaysAction',  '_route' => 'admin_remainingdays_updateremainingdays',);
        }

        // admin_remainingdays_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\RemainingdaysController::chksessionAction',  '_route' => 'admin_remainingdays_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_remainingdays_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\RemainingdaysController::fireQuery',  '_route' => 'admin_remainingdays_firequery',);
            }

            // admin_remainingdays_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\RemainingdaysController::fireupdateQuery',  '_route' => 'admin_remainingdays_fireupdatequery',);
            }

        }

        // admin_remainingdays_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\RemainingdaysController::getLanguages',  '_route' => 'admin_remainingdays_getlanguages',);
        }

        // admin_remainingdays_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\RemainingdaysController::mediauploadAction',  '_route' => 'admin_remainingdays_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_remainingdays_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\RemainingdaysController::getmediaAction',  '_route' => 'admin_remainingdays_getmedia',);
            }

            // admin_remainingdays_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\RemainingdaysController::getLoyalitypointAction',  '_route' => 'admin_remainingdays_getloyalitypoint',);
            }

        }

        // admin_reports_summary
        if (0 === strpos($pathinfo, '/summary') && preg_match('#^/summary(?:/(?P<flag_type>[^/]++)(?:/(?P<filter_date_selected>[^/]++))?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_reports_summary')), array (  'flag_type' => '0',  'filter_date_selected' => '0',  '_controller' => 'AdminBundle\\Controller\\ReportsController::summaryAction',));
        }

        // admin_reports_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\ReportsController::chksessionAction',  '_route' => 'admin_reports_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_reports_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ReportsController::fireQuery',  '_route' => 'admin_reports_firequery',);
            }

            // admin_reports_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ReportsController::fireupdateQuery',  '_route' => 'admin_reports_fireupdatequery',);
            }

        }

        // admin_reports_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\ReportsController::getLanguages',  '_route' => 'admin_reports_getlanguages',);
        }

        // admin_reports_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\ReportsController::mediauploadAction',  '_route' => 'admin_reports_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_reports_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ReportsController::getmediaAction',  '_route' => 'admin_reports_getmedia',);
            }

            // admin_reports_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ReportsController::getLoyalitypointAction',  '_route' => 'admin_reports_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/salesreport')) {
            // admin_salesreports_index
            if ('/salesreport' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SalesreportsController::indexAction',  '_route' => 'admin_salesreports_index',);
            }

            // admin_salesreports_salesreportv2
            if ('/salesreportv2' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SalesreportsController::salesreportv2Action',  '_route' => 'admin_salesreports_salesreportv2',);
            }

        }

        // admin_salesreports_detailssalesreport
        if (0 === strpos($pathinfo, '/detailssalesreport') && preg_match('#^/detailssalesreport(?:/(?P<month>[^/]++)(?:/(?P<selected_year>[^/]++))?)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_salesreports_detailssalesreport')), array (  'month' => '0',  'selected_year' => '0',  '_controller' => 'AdminBundle\\Controller\\SalesreportsController::detailssalesreportAction',));
        }

        // admin_salesreports_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\SalesreportsController::chksessionAction',  '_route' => 'admin_salesreports_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_salesreports_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SalesreportsController::fireQuery',  '_route' => 'admin_salesreports_firequery',);
            }

            // admin_salesreports_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SalesreportsController::fireupdateQuery',  '_route' => 'admin_salesreports_fireupdatequery',);
            }

        }

        // admin_salesreports_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\SalesreportsController::getLanguages',  '_route' => 'admin_salesreports_getlanguages',);
        }

        // admin_salesreports_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\SalesreportsController::mediauploadAction',  '_route' => 'admin_salesreports_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_salesreports_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SalesreportsController::getmediaAction',  '_route' => 'admin_salesreports_getmedia',);
            }

            // admin_salesreports_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SalesreportsController::getLoyalitypointAction',  '_route' => 'admin_salesreports_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/schedule')) {
            // admin_schedule_index
            if (0 === strpos($pathinfo, '/schedule/list') && preg_match('#^/schedule/list(?:/(?P<user_id>[^/]++)(?:/(?P<assign_schedule>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_schedule_index')), array (  'user_id' => '0',  'assign_schedule' => '',  '_controller' => 'AdminBundle\\Controller\\ScheduleController::indexAction',));
            }

            // admin_schedule_addschedule
            if (0 === strpos($pathinfo, '/schedule/addSchedule') && preg_match('#^/schedule/addSchedule(?:/(?P<schedule_id>[^/]++)(?:/(?P<user_id>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_schedule_addschedule')), array (  'schedule_id' => '0',  'user_id' => '0',  '_controller' => 'AdminBundle\\Controller\\ScheduleController::addScheduleAction',));
            }

            // admin_schedule_deleteschedule
            if (0 === strpos($pathinfo, '/schedule/deleteSchedule') && preg_match('#^/schedule/deleteSchedule(?:/(?P<schedule_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_schedule_deleteschedule')), array (  'schedule_id' => '0',  '_controller' => 'AdminBundle\\Controller\\ScheduleController::deleteScheduleAction',));
            }

            // admin_schedule_assignschedule
            if ('/schedule/AssignSchdule' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ScheduleController::assignScheduleAction',  '_route' => 'admin_schedule_assignschedule',);
            }

            // admin_schedule_saveschedule
            if ('/schedule/save' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ScheduleController::saveScheduleAction',  '_route' => 'admin_schedule_saveschedule',);
            }

        }

        // admin_schedule_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\ScheduleController::chksessionAction',  '_route' => 'admin_schedule_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_schedule_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ScheduleController::fireQuery',  '_route' => 'admin_schedule_firequery',);
            }

            // admin_schedule_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ScheduleController::fireupdateQuery',  '_route' => 'admin_schedule_fireupdatequery',);
            }

        }

        // admin_schedule_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\ScheduleController::getLanguages',  '_route' => 'admin_schedule_getlanguages',);
        }

        // admin_schedule_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\ScheduleController::mediauploadAction',  '_route' => 'admin_schedule_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_schedule_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ScheduleController::getmediaAction',  '_route' => 'admin_schedule_getmedia',);
            }

            // admin_schedule_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\ScheduleController::getLoyalitypointAction',  '_route' => 'admin_schedule_getloyalitypoint',);
            }

        }

        // admin_sendnotification_index
        if ('/send-reminder' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\SendnotificationController::indexAction',  '_route' => 'admin_sendnotification_index',);
        }

        // admin_sendnotification_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\SendnotificationController::chksessionAction',  '_route' => 'admin_sendnotification_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_sendnotification_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SendnotificationController::fireQuery',  '_route' => 'admin_sendnotification_firequery',);
            }

            // admin_sendnotification_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SendnotificationController::fireupdateQuery',  '_route' => 'admin_sendnotification_fireupdatequery',);
            }

        }

        // admin_sendnotification_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\SendnotificationController::getLanguages',  '_route' => 'admin_sendnotification_getlanguages',);
        }

        // admin_sendnotification_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\SendnotificationController::mediauploadAction',  '_route' => 'admin_sendnotification_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_sendnotification_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SendnotificationController::getmediaAction',  '_route' => 'admin_sendnotification_getmedia',);
            }

            // admin_sendnotification_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SendnotificationController::getLoyalitypointAction',  '_route' => 'admin_sendnotification_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/socialmedia')) {
            // admin_socialmedia_index
            if ('/socialmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SocialmediaController::indexAction',  '_route' => 'admin_socialmedia_index',);
            }

            // admin_socialmedia_addmedia
            if (0 === strpos($pathinfo, '/socialmedia/addmedia') && preg_match('#^/socialmedia/addmedia(?:/(?P<social_media_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_socialmedia_addmedia')), array (  'social_media_id' => '0',  '_controller' => 'AdminBundle\\Controller\\SocialmediaController::addmediaAction',));
            }

            // admin_socialmedia_savemedia
            if ('/socialmedia/savemedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SocialmediaController::savemediaAction',  '_route' => 'admin_socialmedia_savemedia',);
            }

            // admin_socialmedia_deletemedia
            if (0 === strpos($pathinfo, '/socialmedia/deletemedia') && preg_match('#^/socialmedia/deletemedia(?:/(?P<media_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_socialmedia_deletemedia')), array (  'media_id' => '0',  '_controller' => 'AdminBundle\\Controller\\SocialmediaController::deletemediaAction',));
            }

        }

        if (0 === strpos($pathinfo, '/ch')) {
            // admin_socialmedia_changemediastatus
            if ('/changemediaStatus' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SocialmediaController::changemediastatusAction',  '_route' => 'admin_socialmedia_changemediastatus',);
            }

            // admin_socialmedia_chksession
            if ('/chksession' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SocialmediaController::chksessionAction',  '_route' => 'admin_socialmedia_chksession',);
            }

        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_socialmedia_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SocialmediaController::fireQuery',  '_route' => 'admin_socialmedia_firequery',);
            }

            // admin_socialmedia_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SocialmediaController::fireupdateQuery',  '_route' => 'admin_socialmedia_fireupdatequery',);
            }

        }

        // admin_socialmedia_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\SocialmediaController::getLanguages',  '_route' => 'admin_socialmedia_getlanguages',);
        }

        // admin_socialmedia_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\SocialmediaController::mediauploadAction',  '_route' => 'admin_socialmedia_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_socialmedia_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SocialmediaController::getmediaAction',  '_route' => 'admin_socialmedia_getmedia',);
            }

            // admin_socialmedia_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SocialmediaController::getLoyalitypointAction',  '_route' => 'admin_socialmedia_getloyalitypoint',);
            }

        }

        // admin_subscriber_index
        if ('/subscribers' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\SubscriberController::indexAction',  '_route' => 'admin_subscriber_index',);
        }

        // admin_subscriber_delete
        if (0 === strpos($pathinfo, '/delete') && preg_match('#^/delete(?:/(?P<subscription_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_subscriber_delete')), array (  'subscription_id' => '0',  '_controller' => 'AdminBundle\\Controller\\SubscriberController::deleteAction',));
        }

        if (0 === strpos($pathinfo, '/ch')) {
            // admin_subscriber_changestatus
            if ('/changeStatus' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SubscriberController::changestatusAction',  '_route' => 'admin_subscriber_changestatus',);
            }

            // admin_subscriber_chksession
            if ('/chksession' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SubscriberController::chksessionAction',  '_route' => 'admin_subscriber_chksession',);
            }

        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_subscriber_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SubscriberController::fireQuery',  '_route' => 'admin_subscriber_firequery',);
            }

            // admin_subscriber_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SubscriberController::fireupdateQuery',  '_route' => 'admin_subscriber_fireupdatequery',);
            }

        }

        // admin_subscriber_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\SubscriberController::getLanguages',  '_route' => 'admin_subscriber_getlanguages',);
        }

        // admin_subscriber_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\SubscriberController::mediauploadAction',  '_route' => 'admin_subscriber_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_subscriber_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SubscriberController::getmediaAction',  '_route' => 'admin_subscriber_getmedia',);
            }

            // admin_subscriber_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\SubscriberController::getLoyalitypointAction',  '_route' => 'admin_subscriber_getloyalitypoint',);
            }

        }

        // admin_terms_index
        if ('/terms' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\TermsController::indexAction',  '_route' => 'admin_terms_index',);
        }

        // admin_terms_saveterms
        if ('/saveTermsconditionsmaster' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\TermsController::savetermsAction',  '_route' => 'admin_terms_saveterms',);
        }

        // admin_terms_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\TermsController::chksessionAction',  '_route' => 'admin_terms_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_terms_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\TermsController::fireQuery',  '_route' => 'admin_terms_firequery',);
            }

            // admin_terms_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\TermsController::fireupdateQuery',  '_route' => 'admin_terms_fireupdatequery',);
            }

        }

        // admin_terms_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\TermsController::getLanguages',  '_route' => 'admin_terms_getlanguages',);
        }

        // admin_terms_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\TermsController::mediauploadAction',  '_route' => 'admin_terms_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_terms_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\TermsController::getmediaAction',  '_route' => 'admin_terms_getmedia',);
            }

            // admin_terms_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\TermsController::getLoyalitypointAction',  '_route' => 'admin_terms_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/timeSlots')) {
            // admin_timeslots_index
            if ('/timeSlots' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\TimeSlotsController::indexAction',  '_route' => 'admin_timeslots_index',);
            }

            // admin_timeslots_addtimeslot
            if (0 === strpos($pathinfo, '/timeSlots/addtimeSlot') && preg_match('#^/timeSlots/addtimeSlot(?:/(?P<main_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_timeslots_addtimeslot')), array (  'main_id' => '0',  '_controller' => 'AdminBundle\\Controller\\TimeSlotsController::addtimeslotAction',));
            }

            // admin_timeslots_savetimeslots
            if ('/timeSlots/save' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\TimeSlotsController::savetimeSlotsAction',  '_route' => 'admin_timeslots_savetimeslots',);
            }

            // admin_timeslots_delete
            if (0 === strpos($pathinfo, '/timeSlots/deleteTimeSlot') && preg_match('#^/timeSlots/deleteTimeSlot(?:/(?P<main_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_timeslots_delete')), array (  'main_id' => '0',  '_controller' => 'AdminBundle\\Controller\\TimeSlotsController::deleteAction',));
            }

        }

        // admin_timeslots_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\TimeSlotsController::chksessionAction',  '_route' => 'admin_timeslots_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_timeslots_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\TimeSlotsController::fireQuery',  '_route' => 'admin_timeslots_firequery',);
            }

            // admin_timeslots_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\TimeSlotsController::fireupdateQuery',  '_route' => 'admin_timeslots_fireupdatequery',);
            }

        }

        // admin_timeslots_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\TimeSlotsController::getLanguages',  '_route' => 'admin_timeslots_getlanguages',);
        }

        // admin_timeslots_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\TimeSlotsController::mediauploadAction',  '_route' => 'admin_timeslots_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_timeslots_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\TimeSlotsController::getmediaAction',  '_route' => 'admin_timeslots_getmedia',);
            }

            // admin_timeslots_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\TimeSlotsController::getLoyalitypointAction',  '_route' => 'admin_timeslots_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/userVideoCategory')) {
            // admin_uservideocategory_index
            if ('/userVideoCategory' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UserVideoCategoryController::indexAction',  '_route' => 'admin_uservideocategory_index',);
            }

            // admin_uservideocategory_add
            if (0 === strpos($pathinfo, '/userVideoCategory/add') && preg_match('#^/userVideoCategory/add(?:/(?P<main_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_uservideocategory_add')), array (  'main_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UserVideoCategoryController::addAction',));
            }

            // admin_uservideocategory_save
            if ('/userVideoCategory/save' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UserVideoCategoryController::saveAction',  '_route' => 'admin_uservideocategory_save',);
            }

            // admin_uservideocategory_delete
            if (0 === strpos($pathinfo, '/userVideoCategory/deleteUserVideoCategory') && preg_match('#^/userVideoCategory/deleteUserVideoCategory(?:/(?P<main_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_uservideocategory_delete')), array (  'main_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UserVideoCategoryController::deleteAction',));
            }

        }

        // admin_uservideocategory_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UserVideoCategoryController::chksessionAction',  '_route' => 'admin_uservideocategory_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_uservideocategory_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UserVideoCategoryController::fireQuery',  '_route' => 'admin_uservideocategory_firequery',);
            }

            // admin_uservideocategory_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UserVideoCategoryController::fireupdateQuery',  '_route' => 'admin_uservideocategory_fireupdatequery',);
            }

        }

        // admin_uservideocategory_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UserVideoCategoryController::getLanguages',  '_route' => 'admin_uservideocategory_getlanguages',);
        }

        // admin_uservideocategory_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UserVideoCategoryController::mediauploadAction',  '_route' => 'admin_uservideocategory_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_uservideocategory_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UserVideoCategoryController::getmediaAction',  '_route' => 'admin_uservideocategory_getmedia',);
            }

            // admin_uservideocategory_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UserVideoCategoryController::getLoyalitypointAction',  '_route' => 'admin_uservideocategory_getloyalitypoint',);
            }

        }

        // admin_userreports_index
        if ('/list' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UserreportsController::indexAction',  '_route' => 'admin_userreports_index',);
        }

        // admin_userreports_sendotificationfilter
        if ('/sendotificationfilter' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UserreportsController::sendotificationfilter',  '_route' => 'admin_userreports_sendotificationfilter',);
        }

        // admin_userreports_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UserreportsController::chksessionAction',  '_route' => 'admin_userreports_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_userreports_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UserreportsController::fireQuery',  '_route' => 'admin_userreports_firequery',);
            }

            // admin_userreports_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UserreportsController::fireupdateQuery',  '_route' => 'admin_userreports_fireupdatequery',);
            }

        }

        // admin_userreports_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UserreportsController::getLanguages',  '_route' => 'admin_userreports_getlanguages',);
        }

        // admin_userreports_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UserreportsController::mediauploadAction',  '_route' => 'admin_userreports_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_userreports_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UserreportsController::getmediaAction',  '_route' => 'admin_userreports_getmedia',);
            }

            // admin_userreports_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UserreportsController::getLoyalitypointAction',  '_route' => 'admin_userreports_getloyalitypoint',);
            }

        }

        // admin_users_serversideuserlist
        if ('/serversideuserlist' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::serversideuserlistAction',  '_route' => 'admin_users_serversideuserlist',);
        }

        if (0 === strpos($pathinfo, '/users')) {
            // admin_users_index
            if (0 === strpos($pathinfo, '/users/list') && preg_match('#^/users/list(?:/(?P<user_role_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_users_index')), array (  'user_role_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UsersController::indexAction',));
            }

            if (0 === strpos($pathinfo, '/users/d')) {
                // admin_users_drivers
                if (0 === strpos($pathinfo, '/users/drivers') && preg_match('#^/users/drivers(?:/(?P<user_role_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_users_drivers')), array (  'user_role_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UsersController::driversAction',));
                }

                // admin_users_dietitians
                if (0 === strpos($pathinfo, '/users/dietitians') && preg_match('#^/users/dietitians(?:/(?P<user_role_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_users_dietitians')), array (  'user_role_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UsersController::dietitiansAction',));
                }

            }

            // admin_users_adduser
            if (0 === strpos($pathinfo, '/users/addUser') && preg_match('#^/users/addUser(?:/(?P<user_role_id>[^/]++)(?:/(?P<user_id>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_users_adduser')), array (  'user_id' => '0',  'user_role_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UsersController::addUserAction',));
            }

            if (0 === strpos($pathinfo, '/users/view')) {
                // admin_users_viewuser
                if (0 === strpos($pathinfo, '/users/viewUser') && preg_match('#^/users/viewUser(?:/(?P<user_role_id>[^/]++)(?:/(?P<user_id>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_users_viewuser')), array (  'user_id' => '0',  'user_role_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UsersController::viewUserAction',));
                }

                // admin_users_viewdriverroute
                if (0 === strpos($pathinfo, '/users/viewDriverRoute') && preg_match('#^/users/viewDriverRoute(?:/(?P<user_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_users_viewdriverroute')), array (  'user_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UsersController::viewDriverRouteAction',));
                }

            }

            // admin_users_updatepassword
            if ('/users/updatepassword' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::updatepasswordAction',  '_route' => 'admin_users_updatepassword',);
            }

            // admin_users_withdrawwalletamount
            if ('/users/withdrawwalletamount' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::withdrawwalletamountAction',  '_route' => 'admin_users_withdrawwalletamount',);
            }

            // admin_users_addwwalletamount
            if ('/users/addwwalletamount' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::addwwalletamountAction',  '_route' => 'admin_users_addwwalletamount',);
            }

            // admin_users_saveuser
            if ('/users/save' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::saveUserAction',  '_route' => 'admin_users_saveuser',);
            }

            // admin_users_deleteuser
            if (0 === strpos($pathinfo, '/users/deleteUsers') && preg_match('#^/users/deleteUsers(?:/(?P<user_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_users_deleteuser')), array (  'user_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UsersController::deleteUserAction',));
            }

        }

        if (0 === strpos($pathinfo, '/ch')) {
            // admin_users_changeuserstatus
            if ('/changeuserstatus' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::changeuserstatusAction',  '_route' => 'admin_users_changeuserstatus',);
            }

            // admin_users_chksession
            if ('/chksession' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::chksessionAction',  '_route' => 'admin_users_chksession',);
            }

        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_users_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::fireQuery',  '_route' => 'admin_users_firequery',);
            }

            // admin_users_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::fireupdateQuery',  '_route' => 'admin_users_fireupdatequery',);
            }

        }

        // admin_users_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::getLanguages',  '_route' => 'admin_users_getlanguages',);
        }

        // admin_users_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::mediauploadAction',  '_route' => 'admin_users_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_users_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::getmediaAction',  '_route' => 'admin_users_getmedia',);
            }

            // admin_users_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UsersController::getLoyalitypointAction',  '_route' => 'admin_users_getloyalitypoint',);
            }

        }

        // admin_uservideo_index
        if (0 === strpos($pathinfo, '/userVideo/list') && preg_match('#^/userVideo/list(?:/(?P<user_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_uservideo_index')), array (  'user_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UservideoController::indexAction',));
        }

        // admin_uservideo_tutorialvideolist
        if ('/tutorialvideolist' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UservideoController::tutorialvideolistAction',  '_route' => 'admin_uservideo_tutorialvideolist',);
        }

        if (0 === strpos($pathinfo, '/userVideo/a')) {
            // admin_uservideo_assignvideo
            if ('/userVideo/assignVideo' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UservideoController::assignVideoAction',  '_route' => 'admin_uservideo_assignvideo',);
            }

            if (0 === strpos($pathinfo, '/userVideo/add')) {
                // admin_uservideo_adduservideo
                if (0 === strpos($pathinfo, '/userVideo/adduserVideo') && preg_match('#^/userVideo/adduserVideo(?:/(?P<video_id>[^/]++)(?:/(?P<user_id>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_uservideo_adduservideo')), array (  'video_id' => '0',  'user_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UservideoController::adduserVideoAction',));
                }

                // admin_uservideo_addtutorialvideo
                if (0 === strpos($pathinfo, '/userVideo/addtutorialvideo') && preg_match('#^/userVideo/addtutorialvideo(?:/(?P<video_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_uservideo_addtutorialvideo')), array (  'video_id' => '0',  'user_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UservideoController::addtutorialVideoAction',));
                }

            }

        }

        // admin_uservideo_deletetutorialvideo
        if (0 === strpos($pathinfo, '/deletetutorialvideo') && preg_match('#^/deletetutorialvideo(?:/(?P<video_id>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_uservideo_deletetutorialvideo')), array (  'video_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UservideoController::deletetutorialvideoAction',));
        }

        if (0 === strpos($pathinfo, '/userVideo')) {
            // admin_uservideo_deleteuservideo
            if (0 === strpos($pathinfo, '/userVideo/deleteUserVideo') && preg_match('#^/userVideo/deleteUserVideo(?:/(?P<video_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_uservideo_deleteuservideo')), array (  'video_id' => '0',  '_controller' => 'AdminBundle\\Controller\\UservideoController::deleteuserVideoAction',));
            }

            if (0 === strpos($pathinfo, '/userVideo/save')) {
                // admin_uservideo_saveuservideo
                if ('/userVideo/save' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\UservideoController::saveuservideoAction',  '_route' => 'admin_uservideo_saveuservideo',);
                }

                // admin_uservideo_savetutorialvideo
                if ('/userVideo/savetutorialvideo' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\UservideoController::savetutorialvideoAction',  '_route' => 'admin_uservideo_savetutorialvideo',);
                }

            }

        }

        // admin_uservideo_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UservideoController::chksessionAction',  '_route' => 'admin_uservideo_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_uservideo_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UservideoController::fireQuery',  '_route' => 'admin_uservideo_firequery',);
            }

            // admin_uservideo_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UservideoController::fireupdateQuery',  '_route' => 'admin_uservideo_fireupdatequery',);
            }

        }

        // admin_uservideo_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UservideoController::getLanguages',  '_route' => 'admin_uservideo_getlanguages',);
        }

        // admin_uservideo_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\UservideoController::mediauploadAction',  '_route' => 'admin_uservideo_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_uservideo_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UservideoController::getmediaAction',  '_route' => 'admin_uservideo_getmedia',);
            }

            // admin_uservideo_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\UservideoController::getLoyalitypointAction',  '_route' => 'admin_uservideo_getloyalitypoint',);
            }

        }

        if (0 === strpos($pathinfo, '/weight')) {
            // admin_weight_index
            if ('/weight' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\WeightController::indexAction',  '_route' => 'admin_weight_index',);
            }

            // admin_weight_addweight
            if (0 === strpos($pathinfo, '/weight/addWeight') && preg_match('#^/weight/addWeight(?:/(?P<main_weight_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_weight_addweight')), array (  'main_weight_id' => '0',  '_controller' => 'AdminBundle\\Controller\\WeightController::addWeightAction',));
            }

            // admin_weight_saveweight
            if ('/weight/save' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\WeightController::saveweightAction',  '_route' => 'admin_weight_saveweight',);
            }

            // admin_weight_deleteweight
            if (0 === strpos($pathinfo, '/weight/deleteweight') && preg_match('#^/weight/deleteweight(?:/(?P<main_weight_id>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_weight_deleteweight')), array (  'main_weight_id' => '0',  '_controller' => 'AdminBundle\\Controller\\WeightController::deleteweightAction',));
            }

        }

        // admin_weight_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\WeightController::chksessionAction',  '_route' => 'admin_weight_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_weight_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\WeightController::fireQuery',  '_route' => 'admin_weight_firequery',);
            }

            // admin_weight_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\WeightController::fireupdateQuery',  '_route' => 'admin_weight_fireupdatequery',);
            }

        }

        // admin_weight_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\WeightController::getLanguages',  '_route' => 'admin_weight_getlanguages',);
        }

        // admin_weight_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\WeightController::mediauploadAction',  '_route' => 'admin_weight_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_weight_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\WeightController::getmediaAction',  '_route' => 'admin_weight_getmedia',);
            }

            // admin_weight_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\WeightController::getLoyalitypointAction',  '_route' => 'admin_weight_getloyalitypoint',);
            }

        }

        // admin_whyus_index
        if ('/why_us' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\WhyusController::indexAction',  '_route' => 'admin_whyus_index',);
        }

        // admin_whyus_savewhy
        if ('/saveWhyus' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\WhyusController::savewhyAction',  '_route' => 'admin_whyus_savewhy',);
        }

        // admin_whyus_chksession
        if ('/chksession' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\WhyusController::chksessionAction',  '_route' => 'admin_whyus_chksession',);
        }

        if (0 === strpos($pathinfo, '/fire')) {
            // admin_whyus_firequery
            if ('/fireQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\WhyusController::fireQuery',  '_route' => 'admin_whyus_firequery',);
            }

            // admin_whyus_fireupdatequery
            if ('/fireupdateQuery' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\WhyusController::fireupdateQuery',  '_route' => 'admin_whyus_fireupdatequery',);
            }

        }

        // admin_whyus_getlanguages
        if ('/getLanguages' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\WhyusController::getLanguages',  '_route' => 'admin_whyus_getlanguages',);
        }

        // admin_whyus_mediaupload
        if ('/mediaupload' === $pathinfo) {
            return array (  '_controller' => 'AdminBundle\\Controller\\WhyusController::mediauploadAction',  '_route' => 'admin_whyus_mediaupload',);
        }

        if (0 === strpos($pathinfo, '/get')) {
            // admin_whyus_getmedia
            if ('/getmedia' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\WhyusController::getmediaAction',  '_route' => 'admin_whyus_getmedia',);
            }

            // admin_whyus_getloyalitypoint
            if ('/getLoyalitypoint' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\WhyusController::getLoyalitypointAction',  '_route' => 'admin_whyus_getloyalitypoint',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
