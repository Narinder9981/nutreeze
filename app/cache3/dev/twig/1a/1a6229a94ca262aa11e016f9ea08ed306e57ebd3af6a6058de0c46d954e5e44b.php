<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* AdminBundle:Layout:adminlayout.html_09_Jan_12_90_pm.twig */
class __TwigTemplate_cf701a3ec73d3bbaf455f3f7289d9bcc9f75b4361072420bccece289b551cccc extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'css' => [$this, 'block_css'],
            'content' => [$this, 'block_content'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Layout:adminlayout.html_09_Jan_12_90_pm.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/appLogo.png"), "html", null, true);
        echo "\" rel=\"shortcut icon\">
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
        <!-- Bootstrap 3.3.4 -->
        <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- Fontawesome --->
        <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/AdminLTE.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/skins/_all-skins.min.css\" rel=\"stylesheet\" type=\"text/css\" />

        <!-- DataTable ---->
        <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/dataTables.bootstrap.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/buttons.dataTables.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css\" rel=\"stylesheet\" type=\"text/css\" />

        <link href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/bootstrap-toggle.min.css\" rel=\"stylesheet\" type=\"text/css\" />

        <link href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css\" rel=\"stylesheet\" type=\"text/css\" />

    ";
        // line 27
        $this->displayBlock('css', $context, $blocks);
        // line 43
        echo "    <!-- jQuery 2.1.4 -->
    <script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/jQuery-2.1.4.min.js\"></script>
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js\"></script>
    <script src=\"http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js\"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/bootstrap.min.js\" type=\"text/javascript\"></script>
    <!-- AdminLTE App -->
    <script src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/app.min.js\" type=\"text/javascript\"></script>

    <script src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/buttons.print.min.js\" type=\"text/javascript\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js\" type=\"text/javascript\"></script>

    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.js\" type=\"text/javascript\"></script>

    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css\" type=\"text/css\" media=\"screen\" />
    <script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js\"></script>

    <script src=\"https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js\" type=\"text/javascript\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js\" type=\"text/javascript\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js\" type=\"text/javascript\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js\" type=\"text/javascript\"></script>
    <script src=\"https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js\" type=\"text/javascript\"></script>

    <link rel=\"stylesheet\" href=\"https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css\" type=\"text/css\" media=\"screen\" />

</head>
<body class=\"skin-blue sidebar-mini\">
    <div class=\"se-pre-con\"></div>
    <div class=\"wrapper\">

        <header class=\"main-header\">
            <!-- Logo -->
            <a href=\"#\" class=\"logo\">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class=\"logo-mini\">
                    <img src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/appLogo.png"), "html", null, true);
        echo "\" style=\"height: 50px ; width: 50px\">
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class=\"logo-lg\">
                    <img src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/appLogo.png"), "html", null, true);
        echo "\" style=\"height: 50px\">
                </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class=\"navbar navbar-static-top\" role=\"navigation\">
                <!-- Sidebar toggle button-->
                <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
                    <span class=\"sr-only\">Toggle navigation</span>
                </a>
                <div class=\"navbar-custom-menu\">
                    <ul class=\"nav navbar-nav\">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class=\"user user-menu\">
                            <a href=\"";
        // line 97
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_default_logout");
        echo "\" onclick=\"return confirm('Are you sure want to Logout?');\" class=\"bg-navy\">
                                <span class=\"hidden-xs\"><i class=\"fa fa-power-off\"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class=\"main-sidebar\">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class=\"sidebar\">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class=\"sidebar-menu\">
                    <li class=\"header\" style=\"color: #e2e2e2;\">";
        // line 111
        if ($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "has", [0 => "logged_in_username"], "method")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "logged_in_username"], "method"), "html", null, true);
        }
        echo "</li>
                    <li class=\"active treeview\">
                        <a href=\"";
        // line 113
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index");
        echo "\">
                            <i class=\"fa fa-dashboard\"></i> 
                            <span>Dashboard</span>
                        </a>
                    </li>
                    ";
        // line 118
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 2)) {
            // line 119
            echo "                        <li class=\"\">
                                <a href=\"";
            // line 120
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => 2]);
            echo "\">
                                    <i class=\"fa fa-user\"></i>
                                    <span>Drivers</span>
                                </a>
                            </li>
                    ";
        }
        // line 126
        echo "                    ";
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 1)) {
            // line 127
            echo "                    <li class=\"treeview menu-open\">
                        <a href=\"#\">
                            <i class=\"fa fa-users\"></i>
                            <span>Users</span>
                            <span class=\"pull-right-container\">
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </span>
                        </a>
                        <ul class=\"treeview-menu\">
                            <li class=\"\"> 
                                <a href=\"";
            // line 137
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => 3]);
            echo "\">
                                    <i class=\"fa fa-user\"></i>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li class=\"\">
                                <a href=\"";
            // line 143
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => 2]);
            echo "\">
                                    <i class=\"fa fa-user\"></i>
                                    <span>Drivers</span>
                                </a>
                            </li>
                            ";
            // line 155
            echo "\t
                        </ul>
                    </li>
                    <li class=\"treeview menu-open\">
                        <a href=\"#\">
                            <i class=\"fa fa-film\"></i>
                            <span>Video Section</span>
                            <span class=\"pull-right-container\">
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </span>
                        </a>
                        <ul class=\"treeview-menu\">
                            <li class=\"active treeview\">
                                <a href=\"";
            // line 168
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideocategory_index");
            echo "\">
                                    <i class=\"fa fa-film\"></i> 
                                    <span>Video Categories</span>
                                </a>
                            </li>
                            <li class=\"active treeview\">
                                <a href=\"";
            // line 174
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_index");
            echo "\">
                                    <i class=\"fa fa-film\"></i> 
                                    <span>User's Video</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    ";
            // line 188
            echo "\t\t
                    <li class=\"treeview\">
                        <a href=\"";
            // line 190
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_index");
            echo "\">
                            <i class=\"fa fa-list\"></i> 
                            <span>Products</span>
                        </a>
                    </li>\t\t\t
                    <li class=\"treeview\">
                        <a href=\"";
            // line 196
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_ratings_index");
            echo "\">
                            <i class=\"fa fa-star\"></i> 
                            <span>Ratings</span>
                        </a>
                    </li>\t\t\t\t\t\t
                    <li class=\"treeview\">
                        <a href=\"";
            // line 202
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_package_index");
            echo "\">
                            <i class=\"fa fa-list\"></i> 
                            <span>Packages</span>
                        </a>
                    </li>\t\t\t
                    <li class=\"treeview menu-open\">
                        <a href=\"#\">
                            <i class=\"fa fa-file\"></i>
                            <span>Orders</span>
                            <span class=\"pull-right-container\">
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </span>
                        </a>
                        <ul class=\"treeview-menu\">
                            <li class=\"\"> 
                                <a href=\"";
            // line 217
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_index");
            echo "\">
                                    <i class=\"fa fa-file\"></i>
                                    <span>Customer Orders</span>
                                </a>
                            </li>

                            <li class=\"active treeview\">
                                <a href=\"";
            // line 224
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_driverorders_index");
            echo "\">
                                    <i class=\"fa fa-list\"></i> 
                                    <span>Orders Driver Wise</span>
                                </a>
                            </li>\t\t

                        </ul>
                    </li>\t
                    ";
        }
        // line 233
        echo "
                    ";
        // line 234
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 2)) {
            // line 235
            echo "                     <!-- Drivers--> 
                    
                        <li class=\"treeview\">
                            <a href=\"";
            // line 238
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_driverorders_index");
            echo "\">
                                <i class=\"fa fa-list\"></i> 
                                <span>Orders</span>
                            </a>
                        </li>
                     ";
        }
        // line 244
        echo "
                     ";
        // line 245
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 5)) {
            // line 246
            echo "                        <!-- Accountant -->
                    
                        <li class=\"treeview\">
                            <a href=\"";
            // line 249
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_index");
            echo "\">
                                <i class=\"fa fa-list\"></i> 
                                <span>Orders</span>
                            </a>
                        </li>

                        <li class=\"\"> 
                            <a href=\"";
            // line 256
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_salesreports_index");
            echo "\">
                                <i class=\"fa fa-gear\"></i>
                                <span>Monthly Sales report</span>
                            </a>
                        </li>\t

                     ";
        }
        // line 263
        echo "
                     ";
        // line 264
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 7)) {
            // line 265
            echo "                        <!-- Supervisor -->

                        <li class=\"treeview menu-open\">
                            <a href=\"#\">
                                <i class=\"fa fa-users\"></i>
                                <span>Users</span>
                                <span class=\"pull-right-container\">
                                    <i class=\"fa fa-angle-left pull-right\"></i>
                                </span>
                            </a>
                            <ul class=\"treeview-menu\">
                                <li class=\"\"> 
                                    <a href=\"";
            // line 277
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => 3]);
            echo "\">
                                        <i class=\"fa fa-user\"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <li class=\"\">
                                    <a href=\"";
            // line 283
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => 2]);
            echo "\">
                                        <i class=\"fa fa-user\"></i>
                                        <span>Drivers</span>
                                    </a>
                                </li>
                                ";
            // line 295
            echo "\t
                            </ul>
                        </li>

                        <li class=\"treeview\">
                            <a href=\"";
            // line 300
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_index");
            echo "\">
                                <i class=\"fa fa-list\"></i> 
                                <span>Orders</span>
                            </a>
                        </li>

                        <li class=\"\"> 
                            <a href=\"";
            // line 307
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_contactus_index");
            echo "\">
                                <i class=\"fa fa-envelope\"></i>
                                <span>Contact Us</span>
                            </a>
                        </li>

                     ";
        }
        // line 314
        echo "
                     ";
        // line 315
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 6)) {
            // line 316
            echo "                        <!-- Customer Service -->

                        <li class=\"treeview\">
                            <a href=\"";
            // line 319
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => 3]);
            echo "\">
                                <i class=\"fa fa-user\"></i>
                                <span>Users</span>
                            </a>
                        </li>

                        <li class=\"treeview\">
                            <a href=\"";
            // line 326
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_customerservice_notpaid");
            echo "\">
                                <i class=\"fa fa-bank\"></i> 
                                <span>Customer Service</span>
                            </a>
                        </li>

                        <li class=\"\"> 
                            <a href=\"";
            // line 333
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_contactus_index");
            echo "\">
                                <i class=\"fa fa-envelope\"></i>
                                <span>Contact Us</span>
                            </a>
                        </li>

                     ";
        }
        // line 340
        echo "                     
                     
                     ";
        // line 342
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 1)) {
            // line 343
            echo "                    ";
            // line 349
            echo "                    <li class=\"treeview\">
                        <a href=\"#\">
                            <i class=\"fa fa-fire\"></i>
                            <span>Coupon Module</span>
                            <span class=\"pull-right-container\">
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </span>
                        </a>
                        <ul class=\"treeview-menu\">
                            <li class=\"\"> 
                                <a href=\"";
            // line 359
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_index");
            echo "\">
                                    <i class=\"fa fa-fire\"></i>
                                    <span>Coupon Master</span>
                                </a>
                            </li>

                            <li class=\"active treeview\">
                                <a href=\"";
            // line 366
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_categorylist");
            echo "\">
                                    <i class=\"fa fa-list\"></i> 
                                    <span>Coupon Category</span>
                                </a>
                            </li>\t\t

                        </ul>
                    </li>

                    <li class=\"treeview\">
                        <a href=\"";
            // line 376
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_customerservice_notpaid");
            echo "\">
                            <i class=\"fa fa-bank\"></i> 
                            <span>Customer Service</span>
                        </a>
                    </li>
                    
                    <li class=\"treeview\"> 
                        <a href=\"";
            // line 383
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_advertise_index");
            echo "\">
                            <i class=\"fa fa-image\"></i>
                            <span>Advertisements / Offer</span>
                        </a>
                    </li>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                    <li class=\"treeview\">
                        <a href=\"";
            // line 389
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_gallery_index");
            echo "\">
                            <i class=\"fa fa-image\"></i> 
                            <span>Common Gallery</span>
                        </a>
                    </li>\t\t\t\t\t\t
                    <li class=\"treeview menu-open\">
                        <a href=\"#\">
                            <i class=\"fa fa-plus\"></i>
                            <span>Masters</span>
                            <span class=\"pull-right-container\">
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </span>
                        </a>
                        <ul class=\"treeview-menu\">
                            <li class=\"\"> 
                                <a href=\"";
            // line 404
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_area_index");
            echo "\">
                                    <i class=\"fa fa-map-marker\"></i>
                                    <span>Area</span>
                                </a>
                            </li>
                            ";
            // line 427
            echo "                            <li class=\"active treeview\">
                                <a href=\"";
            // line 428
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_goal_index");
            echo "\">
                                    <i class=\"fa fa-list\"></i> 
                                    <span>Goal</span>
                                </a>
                            </li>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                            <li class=\"\"> 
                                <a href=\"";
            // line 434
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_mealtypes_index");
            echo "\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Meal Types</span>
                                </a>
                            </li>
                            <li class=\"\"> 
                                <a href=\"";
            // line 440
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_packagefor_index");
            echo "\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Package For Types</span>
                                </a>
                            </li>
                            <li class=\"\"> 
                                <a href=\"";
            // line 446
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_deliveryreason_index");
            echo "\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Delivery Reason</span>
                                </a>
                            </li>\t\t\t\t\t
                            <li class=\"\"> 
                                <a href=\"";
            // line 452
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_timeslots_index");
            echo "\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Delivery Time</span>
                                </a>
                            </li>\t\t\t\t\t
                            <li class=\"\"> 
                                <a href=\"";
            // line 458
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_deliverymethods_index");
            echo "\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Delivery Methods</span>
                                </a>
                            </li>
                            <li class=\"\"> 
                                <a href=\"";
            // line 464
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_contactus_settings");
            echo "\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Contact Settings</span>
                                </a>
                            </li>\t
                        </ul>
                    </li>
                    <li class=\"\"> 
                        <a href=\"";
            // line 472
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_contactus_index");
            echo "\">
                            <i class=\"fa fa-envelope\"></i>
                            <span>Contact Us</span>
                        </a>
                    </li>
                    <li class=\"\"> 
                        <a href=\"";
            // line 478
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_aboutus_index");
            echo "\">
                            <i class=\"fa fa-user\"></i>
                            <span>About Us</span>
                        </a>
                    </li>\t\t\t\t\t\t\t\t\t\t
                    <li class=\"\"> 
                        <a href=\"";
            // line 484
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_terms_index");
            echo "\">
                            <i class=\"fa fa-list\"></i>
                            <span>Term and Condition</span>
                        </a>
                    </li>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                    <li class=\"\"> 
                        <a href=\"";
            // line 490
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_generalsettings_index");
            echo "\">
                            <i class=\"fa fa-gear\"></i>
                            <span>General Setting</span>
                        </a>
                    </li>
                    <li class=\"\"> 
                        <a href=\"";
            // line 496
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pushnotification_index");
            echo "\">
                            <i class=\"fa fa-gear\"></i>
                            <span>Push Notification</span>
                        </a>
                    </li>
                     <li class=\"\"> 
                        <a href=\"";
            // line 502
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_reports_summary");
            echo "\">
                            <i class=\"fa fa-gear\"></i>
                            <span>Report Summary</span>
                        </a>
                    </li>
                    <li class=\"\"> 
                        <a href=\"";
            // line 508
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_salesreports_index");
            echo "\">
                            <i class=\"fa fa-gear\"></i>
                            <span>Monthly Sales report</span>
                        </a>
                    </li>
                    ";
            // line 519
            echo "                     <li class=\"\"> 
                        <a href=\"";
            // line 520
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_userreports_index");
            echo "\">
                            <i class=\"fa fa-gear\"></i>
                            <span>User Package Summary</span>
                        </a>
                    </li>
                    <li class=\"\"> 
                        <a href=\"";
            // line 526
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_adminstatus_updateshopstatus");
            echo "\">
                            <i class=\"fa fa-gear\"></i>
                            <span>MuscleFuel Shop Status</span>
                        </a>
                    </li>
                    <li class=\"\"> 
                        <a href=\"";
            // line 532
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_adminstatus_notifylist");
            echo "\">
                            <i class=\"fa fa-gear\"></i>
                            <span>Notify List</span>
                        </a>
                    </li>
                     ";
        }
        // line 538
        echo "                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <div class=\"content-wrapper\" style=\"min-height: 916px;\">

            <!--------------------- Main page contents loads here ------------------------------------>
        ";
        // line 545
        $this->displayBlock('content', $context, $blocks);
        // line 546
        echo "        <!---------------------------------------------------------------------------------------->

    </div>
    <footer class=\"main-footer\">
        <div class=\"pull-right hidden-xs\">
            <b>Admin Panel</b>
        </div>
        <strong>Copyright &copy; Muscle Fuel ";
        // line 553
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "
    </footer>
</div><!-- ./wrapper -->
<div class=\"\" id=\"wait\" data-backdrop=\"static\" data-keyboard=\"false\" style=\"display: none;position:fixed;top:40%;left:50%;z-index: 2147483647;padding: 15px 18px;background-color:#CCC;\"><span><i class=\"fa fa-circle-o-notch fa-spin fa-3x\"></i></div>
</body>
</html>
<script>
    \$(document).ajaxStart(function () {
        \$(\"#wait\").show();
    });
    \$(document).ajaxStop(function () {
        \$(\"#wait\").hide();

    });
  \$(window).load(function() {
       ";
        // line 569
        echo "\t\t// Animate loader off screen
\t\t//\$(\".se-pre-con\").fadeOut(\"slow\");;
\t});
</script>
";
        // line 573
        $this->displayBlock('js', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Muscle Fuel";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 27
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 28
        echo "        <style>
            ";
        // line 41
        echo "        </style>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 545
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 573
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Layout:adminlayout.html_09_Jan_12_90_pm.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  841 => 573,  830 => 545,  822 => 41,  819 => 28,  813 => 27,  801 => 6,  794 => 573,  788 => 569,  770 => 553,  761 => 546,  759 => 545,  750 => 538,  741 => 532,  732 => 526,  723 => 520,  720 => 519,  712 => 508,  703 => 502,  694 => 496,  685 => 490,  676 => 484,  667 => 478,  658 => 472,  647 => 464,  638 => 458,  629 => 452,  620 => 446,  611 => 440,  602 => 434,  593 => 428,  590 => 427,  582 => 404,  564 => 389,  555 => 383,  545 => 376,  532 => 366,  522 => 359,  510 => 349,  508 => 343,  506 => 342,  502 => 340,  492 => 333,  482 => 326,  472 => 319,  467 => 316,  465 => 315,  462 => 314,  452 => 307,  442 => 300,  435 => 295,  427 => 283,  418 => 277,  404 => 265,  402 => 264,  399 => 263,  389 => 256,  379 => 249,  374 => 246,  372 => 245,  369 => 244,  360 => 238,  355 => 235,  353 => 234,  350 => 233,  338 => 224,  328 => 217,  310 => 202,  301 => 196,  292 => 190,  288 => 188,  276 => 174,  267 => 168,  252 => 155,  244 => 143,  235 => 137,  223 => 127,  220 => 126,  211 => 120,  208 => 119,  206 => 118,  198 => 113,  191 => 111,  174 => 97,  158 => 84,  151 => 80,  122 => 54,  118 => 53,  114 => 52,  109 => 50,  104 => 48,  97 => 44,  94 => 43,  92 => 27,  85 => 23,  79 => 20,  75 => 19,  69 => 16,  63 => 13,  59 => 12,  54 => 10,  47 => 6,  43 => 5,  37 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <link href=\"{{asset('bundles/design/appLogo.png')}}\" rel=\"shortcut icon\">
        <title>{% block title %}Muscle Fuel{% endblock %}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
        <!-- Bootstrap 3.3.4 -->
        <link href=\"{{asset('bundles/design/')}}css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- Fontawesome --->
        <link href=\"{{asset('bundles/design/')}}css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"{{asset('bundles/design/')}}css/AdminLTE.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href=\"{{asset('bundles/design/')}}css/skins/_all-skins.min.css\" rel=\"stylesheet\" type=\"text/css\" />

        <!-- DataTable ---->
        <link href=\"{{asset('bundles/design/')}}css/dataTables.bootstrap.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"{{asset('bundles/design/')}}css/buttons.dataTables.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css\" rel=\"stylesheet\" type=\"text/css\" />

        <link href=\"{{asset('bundles/design/')}}css/bootstrap-toggle.min.css\" rel=\"stylesheet\" type=\"text/css\" />

        <link href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css\" rel=\"stylesheet\" type=\"text/css\" />

    {% block css %}
        <style>
            {#.no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
                    position: fixed;
                    left: 0px;
                    top: 0px;
                    width: 100%;
                    height: 100%;
                    z-index: 9999;
                    
                    background: lightblue url(https://smallenvelop.com/wp-content/uploads/2014/08/Preloader_51.gif) no-repeat fixed center;
            }#}
        </style>
    {% endblock %}
    <!-- jQuery 2.1.4 -->
    <script src=\"{{asset('bundles/design/')}}js/jQuery-2.1.4.min.js\"></script>
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js\"></script>
    <script src=\"http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js\"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src=\"{{asset('bundles/design/')}}js/bootstrap.min.js\" type=\"text/javascript\"></script>
    <!-- AdminLTE App -->
    <script src=\"{{asset('bundles/design/')}}js/app.min.js\" type=\"text/javascript\"></script>

    <script src=\"{{asset('bundles/design/')}}js/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"{{asset('bundles/design/')}}js/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script src=\"{{asset('bundles/design/')}}js/buttons.print.min.js\" type=\"text/javascript\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js\" type=\"text/javascript\"></script>

    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.js\" type=\"text/javascript\"></script>

    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css\" type=\"text/css\" media=\"screen\" />
    <script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js\"></script>

    <script src=\"https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js\" type=\"text/javascript\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js\" type=\"text/javascript\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js\" type=\"text/javascript\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js\" type=\"text/javascript\"></script>
    <script src=\"https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js\" type=\"text/javascript\"></script>

    <link rel=\"stylesheet\" href=\"https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css\" type=\"text/css\" media=\"screen\" />

</head>
<body class=\"skin-blue sidebar-mini\">
    <div class=\"se-pre-con\"></div>
    <div class=\"wrapper\">

        <header class=\"main-header\">
            <!-- Logo -->
            <a href=\"#\" class=\"logo\">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class=\"logo-mini\">
                    <img src=\"{{asset('bundles/design/appLogo.png')}}\" style=\"height: 50px ; width: 50px\">
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class=\"logo-lg\">
                    <img src=\"{{asset('bundles/design/appLogo.png')}}\" style=\"height: 50px\">
                </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class=\"navbar navbar-static-top\" role=\"navigation\">
                <!-- Sidebar toggle button-->
                <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
                    <span class=\"sr-only\">Toggle navigation</span>
                </a>
                <div class=\"navbar-custom-menu\">
                    <ul class=\"nav navbar-nav\">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class=\"user user-menu\">
                            <a href=\"{{path('admin_default_logout')}}\" onclick=\"return confirm('Are you sure want to Logout?');\" class=\"bg-navy\">
                                <span class=\"hidden-xs\"><i class=\"fa fa-power-off\"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class=\"main-sidebar\">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class=\"sidebar\">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class=\"sidebar-menu\">
                    <li class=\"header\" style=\"color: #e2e2e2;\">{% if app.session.has('logged_in_username') %}{{ app.session.get('logged_in_username') }}{% endif %}</li>
                    <li class=\"active treeview\">
                        <a href=\"{{path('admin_dashboard_index')}}\">
                            <i class=\"fa fa-dashboard\"></i> 
                            <span>Dashboard</span>
                        </a>
                    </li>
                    {%if app.session.get('role_id') == 2 %}
                        <li class=\"\">
                                <a href=\"{{path('admin_users_index',{'user_role_id':2})}}\">
                                    <i class=\"fa fa-user\"></i>
                                    <span>Drivers</span>
                                </a>
                            </li>
                    {%endif%}
                    {%if app.session.get('role_id') == 1 %}
                    <li class=\"treeview menu-open\">
                        <a href=\"#\">
                            <i class=\"fa fa-users\"></i>
                            <span>Users</span>
                            <span class=\"pull-right-container\">
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </span>
                        </a>
                        <ul class=\"treeview-menu\">
                            <li class=\"\"> 
                                <a href=\"{{path('admin_users_index',{'user_role_id':3})}}\">
                                    <i class=\"fa fa-user\"></i>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li class=\"\">
                                <a href=\"{{path('admin_users_index',{'user_role_id':2})}}\">
                                    <i class=\"fa fa-user\"></i>
                                    <span>Drivers</span>
                                </a>
                            </li>
                            {#\t\t
                                <li class=\"\">
                                    <a href=\"{{path('admin_users_index',{'user_role_id':4})}}\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>Company</span>
                                    </a>
                                </li>
                            #}\t
                        </ul>
                    </li>
                    <li class=\"treeview menu-open\">
                        <a href=\"#\">
                            <i class=\"fa fa-film\"></i>
                            <span>Video Section</span>
                            <span class=\"pull-right-container\">
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </span>
                        </a>
                        <ul class=\"treeview-menu\">
                            <li class=\"active treeview\">
                                <a href=\"{{path('admin_uservideocategory_index')}}\">
                                    <i class=\"fa fa-film\"></i> 
                                    <span>Video Categories</span>
                                </a>
                            </li>
                            <li class=\"active treeview\">
                                <a href=\"{{path('admin_uservideo_index')}}\">
                                    <i class=\"fa fa-film\"></i> 
                                    <span>User's Video</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    {#            <li class=\"active treeview\">
                                  <a href=\"{{path('admin_schedule_index')}}\">
                                    <i class=\"fa fa-book\"></i> 
                                                    <span>User's Schedule</span>
                                  </a>
                                </li>\t#}\t\t
                    <li class=\"treeview\">
                        <a href=\"{{path('admin_product_index')}}\">
                            <i class=\"fa fa-list\"></i> 
                            <span>Products</span>
                        </a>
                    </li>\t\t\t
                    <li class=\"treeview\">
                        <a href=\"{{path('admin_ratings_index')}}\">
                            <i class=\"fa fa-star\"></i> 
                            <span>Ratings</span>
                        </a>
                    </li>\t\t\t\t\t\t
                    <li class=\"treeview\">
                        <a href=\"{{path('admin_package_index')}}\">
                            <i class=\"fa fa-list\"></i> 
                            <span>Packages</span>
                        </a>
                    </li>\t\t\t
                    <li class=\"treeview menu-open\">
                        <a href=\"#\">
                            <i class=\"fa fa-file\"></i>
                            <span>Orders</span>
                            <span class=\"pull-right-container\">
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </span>
                        </a>
                        <ul class=\"treeview-menu\">
                            <li class=\"\"> 
                                <a href=\"{{path('admin_orders_index')}}\">
                                    <i class=\"fa fa-file\"></i>
                                    <span>Customer Orders</span>
                                </a>
                            </li>

                            <li class=\"active treeview\">
                                <a href=\"{{path('admin_driverorders_index')}}\">
                                    <i class=\"fa fa-list\"></i> 
                                    <span>Orders Driver Wise</span>
                                </a>
                            </li>\t\t

                        </ul>
                    </li>\t
                    {%endif%}

                    {% if app.session.get('role_id') == 2 %}
                     <!-- Drivers--> 
                    
                        <li class=\"treeview\">
                            <a href=\"{{path('admin_driverorders_index')}}\">
                                <i class=\"fa fa-list\"></i> 
                                <span>Orders</span>
                            </a>
                        </li>
                     {% endif %}

                     {% if app.session.get('role_id') == 5 %}
                        <!-- Accountant -->
                    
                        <li class=\"treeview\">
                            <a href=\"{{path('admin_orders_index')}}\">
                                <i class=\"fa fa-list\"></i> 
                                <span>Orders</span>
                            </a>
                        </li>

                        <li class=\"\"> 
                            <a href=\"{{ path('admin_salesreports_index') }}\">
                                <i class=\"fa fa-gear\"></i>
                                <span>Monthly Sales report</span>
                            </a>
                        </li>\t

                     {% endif %}

                     {% if app.session.get('role_id') == 7 %}
                        <!-- Supervisor -->

                        <li class=\"treeview menu-open\">
                            <a href=\"#\">
                                <i class=\"fa fa-users\"></i>
                                <span>Users</span>
                                <span class=\"pull-right-container\">
                                    <i class=\"fa fa-angle-left pull-right\"></i>
                                </span>
                            </a>
                            <ul class=\"treeview-menu\">
                                <li class=\"\"> 
                                    <a href=\"{{path('admin_users_index',{'user_role_id':3})}}\">
                                        <i class=\"fa fa-user\"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <li class=\"\">
                                    <a href=\"{{path('admin_users_index',{'user_role_id':2})}}\">
                                        <i class=\"fa fa-user\"></i>
                                        <span>Drivers</span>
                                    </a>
                                </li>
                                {#\t\t
                                    <li class=\"\">
                                        <a href=\"{{path('admin_users_index',{'user_role_id':4})}}\">
                                                <i class=\"fa fa-user\"></i>
                                                <span>Company</span>
                                        </a>
                                    </li>
                                #}\t
                            </ul>
                        </li>

                        <li class=\"treeview\">
                            <a href=\"{{path('admin_orders_index')}}\">
                                <i class=\"fa fa-list\"></i> 
                                <span>Orders</span>
                            </a>
                        </li>

                        <li class=\"\"> 
                            <a href=\"{{path('admin_contactus_index')}}\">
                                <i class=\"fa fa-envelope\"></i>
                                <span>Contact Us</span>
                            </a>
                        </li>

                     {% endif %}

                     {% if app.session.get('role_id') == 6 %}
                        <!-- Customer Service -->

                        <li class=\"treeview\">
                            <a href=\"{{path('admin_users_index',{'user_role_id':3})}}\">
                                <i class=\"fa fa-user\"></i>
                                <span>Users</span>
                            </a>
                        </li>

                        <li class=\"treeview\">
                            <a href=\"{{path('admin_customerservice_notpaid')}}\">
                                <i class=\"fa fa-bank\"></i> 
                                <span>Customer Service</span>
                            </a>
                        </li>

                        <li class=\"\"> 
                            <a href=\"{{path('admin_contactus_index')}}\">
                                <i class=\"fa fa-envelope\"></i>
                                <span>Contact Us</span>
                            </a>
                        </li>

                     {% endif %}
                     
                     
                     {% if app.session.get('role_id') == 1 %}
                    {# <li class=\"active treeview\">
                        <a href=\"{{path('admin_coupon_index')}}\">
                            <i class=\"fa fa-fire\"></i> 
                            <span>Coupon Master</span>
                        </a>
                    </li> #}
                    <li class=\"treeview\">
                        <a href=\"#\">
                            <i class=\"fa fa-fire\"></i>
                            <span>Coupon Module</span>
                            <span class=\"pull-right-container\">
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </span>
                        </a>
                        <ul class=\"treeview-menu\">
                            <li class=\"\"> 
                                <a href=\"{{path('admin_coupon_index')}}\">
                                    <i class=\"fa fa-fire\"></i>
                                    <span>Coupon Master</span>
                                </a>
                            </li>

                            <li class=\"active treeview\">
                                <a href=\"{{path('admin_coupon_categorylist')}}\">
                                    <i class=\"fa fa-list\"></i> 
                                    <span>Coupon Category</span>
                                </a>
                            </li>\t\t

                        </ul>
                    </li>

                    <li class=\"treeview\">
                        <a href=\"{{path('admin_customerservice_notpaid')}}\">
                            <i class=\"fa fa-bank\"></i> 
                            <span>Customer Service</span>
                        </a>
                    </li>
                    
                    <li class=\"treeview\"> 
                        <a href=\"{{path('admin_advertise_index')}}\">
                            <i class=\"fa fa-image\"></i>
                            <span>Advertisements / Offer</span>
                        </a>
                    </li>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                    <li class=\"treeview\">
                        <a href=\"{{path('admin_gallery_index')}}\">
                            <i class=\"fa fa-image\"></i> 
                            <span>Common Gallery</span>
                        </a>
                    </li>\t\t\t\t\t\t
                    <li class=\"treeview menu-open\">
                        <a href=\"#\">
                            <i class=\"fa fa-plus\"></i>
                            <span>Masters</span>
                            <span class=\"pull-right-container\">
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </span>
                        </a>
                        <ul class=\"treeview-menu\">
                            <li class=\"\"> 
                                <a href=\"{{path('admin_area_index')}}\">
                                    <i class=\"fa fa-map-marker\"></i>
                                    <span>Area</span>
                                </a>
                            </li>
                            {# <li class=\"\"> 
                                    <a href=\"{{path('admin_country_index')}}\">
                                            <i class=\"fa fa-map-marker\"></i>
                                            <span>Country</span>
                                    </a>
                            </li> 
                            <li class=\"\"> 
                                    <a href=\"{{path('admin_weight_index')}}\">
                                            <i class=\"fa fa-map-marker\"></i>
                                            <span>Weight</span>
                                    </a>
                            </li>
                            <li class=\"\"> 
                                    <a href=\"{{path('admin_height_index')}}\">
                                            <i class=\"fa fa-map-marker\"></i>
                                            <span>Height</span>
                                    </a>
                            </li>#}
                            <li class=\"active treeview\">
                                <a href=\"{{path('admin_goal_index')}}\">
                                    <i class=\"fa fa-list\"></i> 
                                    <span>Goal</span>
                                </a>
                            </li>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                            <li class=\"\"> 
                                <a href=\"{{path('admin_mealtypes_index')}}\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Meal Types</span>
                                </a>
                            </li>
                            <li class=\"\"> 
                                <a href=\"{{path('admin_packagefor_index')}}\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Package For Types</span>
                                </a>
                            </li>
                            <li class=\"\"> 
                                <a href=\"{{path('admin_deliveryreason_index')}}\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Delivery Reason</span>
                                </a>
                            </li>\t\t\t\t\t
                            <li class=\"\"> 
                                <a href=\"{{path('admin_timeslots_index')}}\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Delivery Time</span>
                                </a>
                            </li>\t\t\t\t\t
                            <li class=\"\"> 
                                <a href=\"{{path('admin_deliverymethods_index')}}\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Delivery Methods</span>
                                </a>
                            </li>
                            <li class=\"\"> 
                                <a href=\"{{path('admin_contactus_settings')}}\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Contact Settings</span>
                                </a>
                            </li>\t
                        </ul>
                    </li>
                    <li class=\"\"> 
                        <a href=\"{{path('admin_contactus_index')}}\">
                            <i class=\"fa fa-envelope\"></i>
                            <span>Contact Us</span>
                        </a>
                    </li>
                    <li class=\"\"> 
                        <a href=\"{{path('admin_aboutus_index')}}\">
                            <i class=\"fa fa-user\"></i>
                            <span>About Us</span>
                        </a>
                    </li>\t\t\t\t\t\t\t\t\t\t
                    <li class=\"\"> 
                        <a href=\"{{path('admin_terms_index')}}\">
                            <i class=\"fa fa-list\"></i>
                            <span>Term and Condition</span>
                        </a>
                    </li>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                    <li class=\"\"> 
                        <a href=\"{{path('admin_generalsettings_index')}}\">
                            <i class=\"fa fa-gear\"></i>
                            <span>General Setting</span>
                        </a>
                    </li>
                    <li class=\"\"> 
                        <a href=\"{{ path('admin_pushnotification_index') }}\">
                            <i class=\"fa fa-gear\"></i>
                            <span>Push Notification</span>
                        </a>
                    </li>
                     <li class=\"\"> 
                        <a href=\"{{ path('admin_reports_summary') }}\">
                            <i class=\"fa fa-gear\"></i>
                            <span>Report Summary</span>
                        </a>
                    </li>
                    <li class=\"\"> 
                        <a href=\"{{ path('admin_salesreports_index') }}\">
                            <i class=\"fa fa-gear\"></i>
                            <span>Monthly Sales report</span>
                        </a>
                    </li>
                    {#<li class=\"\"> 
                        <a href=\"{{ path('admin_salesreports_salesreportv2') }}\">
                            <i class=\"fa fa-gear\"></i>
                            <span>Sales Report V2</span>
                        </a>
                    </li>#}
                     <li class=\"\"> 
                        <a href=\"{{ path('admin_userreports_index') }}\">
                            <i class=\"fa fa-gear\"></i>
                            <span>User Package Summary</span>
                        </a>
                    </li>
                    <li class=\"\"> 
                        <a href=\"{{ path('admin_adminstatus_updateshopstatus') }}\">
                            <i class=\"fa fa-gear\"></i>
                            <span>MuscleFuel Shop Status</span>
                        </a>
                    </li>
                    <li class=\"\"> 
                        <a href=\"{{ path('admin_adminstatus_notifylist') }}\">
                            <i class=\"fa fa-gear\"></i>
                            <span>Notify List</span>
                        </a>
                    </li>
                     {%endif%}
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <div class=\"content-wrapper\" style=\"min-height: 916px;\">

            <!--------------------- Main page contents loads here ------------------------------------>
        {% block content %}{% endblock %}
        <!---------------------------------------------------------------------------------------->

    </div>
    <footer class=\"main-footer\">
        <div class=\"pull-right hidden-xs\">
            <b>Admin Panel</b>
        </div>
        <strong>Copyright &copy; Muscle Fuel {{'now' | date('Y')}}
    </footer>
</div><!-- ./wrapper -->
<div class=\"\" id=\"wait\" data-backdrop=\"static\" data-keyboard=\"false\" style=\"display: none;position:fixed;top:40%;left:50%;z-index: 2147483647;padding: 15px 18px;background-color:#CCC;\"><span><i class=\"fa fa-circle-o-notch fa-spin fa-3x\"></i></div>
</body>
</html>
<script>
    \$(document).ajaxStart(function () {
        \$(\"#wait\").show();
    });
    \$(document).ajaxStop(function () {
        \$(\"#wait\").hide();

    });
  \$(window).load(function() {
       {# \$( document ).ready(function() {#}
\t\t// Animate loader off screen
\t\t//\$(\".se-pre-con\").fadeOut(\"slow\");;
\t});
</script>
{% block js %}{% endblock %}", "AdminBundle:Layout:adminlayout.html_09_Jan_12_90_pm.twig", "/var/www/admin/src/AdminBundle/Resources/views/Layout/adminlayout.html_09_Jan_12_90_pm.twig");
    }
}
