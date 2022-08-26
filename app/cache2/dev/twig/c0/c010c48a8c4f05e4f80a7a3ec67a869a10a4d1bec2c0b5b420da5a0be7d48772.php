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

/* @Admin/Layout/adminlayout.html.twig */
class __TwigTemplate_1019b0cc63d8e000b3c98ea8a8969d18a853bdfaa1e0596a7baca74afb1c30aa extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Admin/Layout/adminlayout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/appLogo.png"), "html", null, true);
        echo "\" rel=\"shortcut icon\">
        <title>
            ";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        // line 9
        echo "        </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta
            content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
        <!-- Bootstrap 3.3.4 -->
        <link
            href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <!-- Fontawesome --->
        <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <link
            href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/AdminLTE.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <!-- AdminLTE Skins. Choose a skin from the css/skins
                                                     folder instead of downloading all of them to reduce the load. -->
        <link
            href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/skins/_all-skins.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <!-- DataTable ---->
        <link href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/dataTables.bootstrap.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <link href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/buttons.dataTables.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <link href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <link href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/bootstrap-toggle.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <link
            href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css\" rel=\"stylesheet\" type=\"text/css\"/>
        ";
        // line 31
        $this->displayBlock('css', $context, $blocks);
        // line 55
        echo "        <!-- jQuery 2.1.4 -->
        <script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/jQuery-2.1.4.min.js\"></script>
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js\"></script>
        <script src=\"http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js\"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/bootstrap.min.js\" type=\"text/javascript\"></script>
        <!-- AdminLTE App -->
        <script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/app.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/buttons.print.min.js\" type=\"text/javascript\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js\" type=\"text/javascript\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.js\" type=\"text/javascript\"></script>
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css\" type=\"text/css\" media=\"screen\"/>
        <script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js\"></script>
        <script src=\"https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js\" type=\"text/javascript\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js\" type=\"text/javascript\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js\" type=\"text/javascript\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js\" type=\"text/javascript\"></script>
        <script src=\"https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js\" type=\"text/javascript\"></script>
        <link rel=\"stylesheet\" href=\"https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css\" type=\"text/css\" media=\"screen\"/>
    </head>
    <body class=\"skin-green-light sidebar-mini\">
        <div class=\"se-pre-con\"></div>
        <div class=\"wrapper\">
            <header
                class=\"main-header\">
                <!-- Logo -->
                <a
                    href=\"#\" class=\"logo\">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class=\"logo-mini\">
                        <img src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/appLogo.png"), "html", null, true);
        echo "\" style=\"height: 50px ; width: 50px\">
                    </span>
                    <!-- logo for regular state and mobile devices -->
                    <span class=\"logo-lg\">
                        <img src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/appLogo.png"), "html", null, true);
        echo "\" style=\"height: 50px\">
                    </span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav
                    class=\"navbar navbar-static-top\" role=\"navigation\">
                    <!-- Sidebar toggle button-->
                    <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
                        <span class=\"sr-only\">Toggle navigation</span>
                    </a>
                    <div class=\"navbar-custom-menu\">
                        <ul
                            class=\"nav navbar-nav\">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class=\"user user-menu\" >
                                <a href=\"";
        // line 106
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_default_logout");
        echo "\" onclick=\"return confirm('Are you sure want to Logout?');\" class=\"bg-navy\" style=\"background-color: #9cca3c !important;\">
                                    <span class=\"hidden-xs\">
                                        <i class=\"fa fa-power-off\"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside
                class=\"main-sidebar\">
                <!-- sidebar: style can be found in sidebar.less -->
                <section
                    class=\"sidebar\">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class=\"sidebar-menu\">
                       ";
        // line 127
        echo "                        <li class=\"active treeview\">
                            <a href=\"";
        // line 128
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index");
        echo "\">
                                <i class=\"fa fa-dashboard\"></i>
                                <span>Dashboard </span>   ";
        // line 130
        if ($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "has", [0 => "logged_in_username"], "method")) {
            // line 131
            echo "                                <small>[ Logged as : ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "logged_in_username"], "method"), "html", null, true);
            echo " ] </small>
                            ";
        }
        // line 133
        echo "                            </a>
                        </li>
                        ";
        // line 135
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 2)) {
            // line 136
            echo "                            <li class=\"\">
                                <a href=\"";
            // line 137
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_drivers", ["user_role_id" => 2]);
            echo "\">
                                    <i class=\"fa fa-user\"></i>
                                    <span>Drivers</span>
                                </a>
                            </li>
                        ";
        }
        // line 143
        echo "                        ";
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 1)) {
            // line 144
            echo "                            <li class=\"treeview menu-open\">
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
            // line 154
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => 3]);
            echo "\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>Users</span>
                                        </a>
                                    </li>
                                    <li class=\"\">
                                        <a href=\"";
            // line 160
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_drivers", ["user_role_id" => 2]);
            echo "\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>Drivers</span>
                                        </a>
                                    </li>
                                     <li class=\"\">
                                        <a href=\"";
            // line 166
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_dietitians", ["user_role_id" => 8]);
            echo "\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>Dietititans</span>
                                        </a>
                                    </li>
                                     <li class=\"\">
                                        <a href=\"";
            // line 172
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_drivers", ["user_role_id" => "admin"]);
            echo "\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>Admin Users</span>
                                        </a>
                                    </li>
                                    ";
            // line 178
            echo "                                </ul>
                            </li>
                            <li class=\"treeview menu-open hide\">
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
            // line 190
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideocategory_index");
            echo "\">
                                            <i class=\"fa fa-film\"></i>
                                            <span>Video Categories</span>
                                        </a>
                                    </li>
                                    <li class=\"active treeview\">
                                        <a href=\"";
            // line 196
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_index");
            echo "\">
                                            <i class=\"fa fa-film\"></i>
                                            <span>User's Video</span>
                                        </a>
                                    </li>
                                    <li class=\"active treeview\">
                                        <a href=\"";
            // line 202
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_tutorialvideolist");
            echo "\">
                                            <i class=\"fa fa-film\"></i>
                                            <span>Video Tutorial</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            ";
            // line 210
            echo "                            <li class=\"treeview\">
                                <a href=\"";
            // line 211
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_index");
            echo "\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Products</span>
                                </a>
                            </li>
                            <li class=\"treeview hide\">
                                <a href=\"";
            // line 217
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_ratings_index");
            echo "\">
                                    <i class=\"fa fa-star\"></i>
                                    <span>Ratings</span>
                                </a>
                            </li>
                            <li class=\"treeview\">
                                <a href=\"";
            // line 223
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_package_index");
            echo "\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Packages</span>
                                </a>
                            </li>
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
            // line 238
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_index");
            echo "/Active\">
                                            <i class=\"fa fa-file\"></i>
                                            <span>Customer Active Orders</span>
                                        </a>
                                    </li>
                                    <li class=\"hide\">
                                        <a href=\"";
            // line 244
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_index");
            echo "/Pause\">
                                            <i class=\"fa fa-file\"></i>
                                            <span>Customer Pause Orders</span>
                                        </a>
                                    </li>
                                    <li class=\"\">
                                        <a href=\"";
            // line 250
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_index");
            echo "/Expire\">
                                            <i class=\"fa fa-file\"></i>
                                            <span>Customer Expired Orders</span>
                                        </a>
                                    </li> 
                                    <li class=\"\">
                                        <a href=\"";
            // line 256
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_index");
            echo "/cancel\">
                                            <i class=\"fa fa-file\"></i>
                                            <span>Customer Cancel Orders</span>
                                        </a>
                                    </li> 
                                    <li class=\"active treeview\">
                                        <a href=\"";
            // line 262
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_driverorders_index");
            echo "\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Orders Driver Wise</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        ";
        }
        // line 271
        echo "                        ";
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 2)) {
            // line 272
            echo "                            <!-- Drivers-->
                            <li class=\"treeview\">
                                <a href=\"";
            // line 274
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_driverorders_index");
            echo "\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Orders</span>
                                </a>
                            </li>
                        ";
        }
        // line 280
        echo "                        ";
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 5)) {
            // line 281
            echo "                            <!-- Accountant -->
                            <li class=\"treeview\">
                                <a href=\"";
            // line 283
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_index");
            echo "\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Orders</span>
                                </a>
                            </li>
                            <li class=\"\">
                                <a href=\"";
            // line 289
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_salesreports_index");
            echo "\">
                                    <i class=\"fa fa-gear\"></i>
                                    <span>Monthly Sales report</span>
                                </a>
                            </li>
                        ";
        }
        // line 295
        echo "                        ";
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 7)) {
            // line 296
            echo "                            <!-- Supervisor -->
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
            // line 307
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => 3]);
            echo "\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>Users</span>
                                        </a>
                                    </li>
                                    <li class=\"\">
                                        <a href=\"";
            // line 313
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => 2]);
            echo "\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>Drivers</span>
                                        </a>
                                    </li>
                                    ";
            // line 322
            echo "                                </ul>
                            </li>
                            <li class=\"treeview\">
                                <a href=\"";
            // line 325
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_index");
            echo "\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Orders</span>
                                </a>
                            </li>
                            
                            <li class=\"\">
                                <a href=\"";
            // line 332
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_contactus_index");
            echo "\">
                                    <i class=\"fa fa-envelope\"></i>
                                    <span>Contact Us</span>
                                </a>
                            </li>
                        ";
        }
        // line 338
        echo "                        ";
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 6)) {
            // line 339
            echo "                            <!-- Customer Service -->
                            <li class=\"treeview\">
                                <a href=\"";
            // line 341
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => 3]);
            echo "\">
                                    <i class=\"fa fa-user\"></i>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li class=\"treeview\">
                                <a href=\"";
            // line 347
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_customerservice_notpaid");
            echo "\">
                                    <i class=\"fa fa-bank\"></i>
                                    <span>Customer Service</span>
                                </a>
                            </li>
                            <li class=\"\">
                                <a href=\"";
            // line 353
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_contactus_index");
            echo "\">
                                    <i class=\"fa fa-envelope\"></i>
                                    <span>Contact Us</span>
                                </a>
                            </li>
                        ";
        }
        // line 359
        echo "                        ";
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 1)) {
            // line 360
            echo "                            
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
                                        <a href=\"";
            // line 371
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_index");
            echo "\">
                                            <i class=\"fa fa-fire\"></i>
                                            <span>Coupon Master</span>
                                        </a>
                                    </li>
                                    <li class=\"active treeview hide\">
                                        <a href=\"";
            // line 377
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_categorylist");
            echo "\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Coupon Category</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class=\"treeview\">
                                <a href=\"";
            // line 386
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_advertise_index");
            echo "\">
                                    <i class=\"fa  fa-globe\"></i>
                                    <span>Advertisements / Offer</span>
                                </a>
                            </li>
                            <li class=\"treeview hide\">
                                <a href=\"";
            // line 392
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_gallery_index");
            echo "\">
                                    <i class=\"fa fa-image\"></i>
                                    <span>Common Gallery</span>
                                </a>
                            </li>
                            <li class=\"treeview menu-open\">
                                <a href=\"#\">
                                    <i class=\"fa fa-plus\"></i>
                                    <span>Masters</span>
                                    <span class=\"pull-right-container\">
                                        <i class=\"fa fa-angle-left pull-right\"></i>
                                    </span>
                                </a>
                                <ul class=\"treeview-menu\">
                                    ";
            // line 430
            echo "                                   ";
            // line 436
            echo "                                    <li class=\"\">
                                        <a href=\"";
            // line 437
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_mealtypes_index");
            echo "\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Meal Types</span>
                                        </a>
                                    </li>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t <li class=\"\">
                                        <a href=\"";
            // line 444
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dietstatus_index");
            echo "\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Diet Status</span>
                                        </a>
                                    </li>

                                    <li class=\"\">
                                        <a href=\"";
            // line 451
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_ordernote_index");
            echo "\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Order notes</span>
                                        </a>
                                    </li>
                                     <li class=\"\">
                                        <a href=\"";
            // line 457
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_packagefor_index");
            echo "\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Package For Types</span>
                                        </a>
                                    </li>
                                   ";
            // line 468
            echo "                                    <li class=\"\">
                                        <a href=\"";
            // line 469
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_timeslots_index");
            echo "\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Delivery Time</span>
                                        </a>
                                    </li>
                                    ";
            // line 480
            echo "                                    <li class=\"\">
                                        <a href=\"";
            // line 481
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_deliverymethods_index");
            echo "\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Delivery Methods</span>
                                        </a>
                                    </li>
                                    <li class=\"\">
                                        <a href=\"";
            // line 487
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_contactus_settings");
            echo "\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Contact Settings</span>
                                        </a>
                                    </li>
                                    <li class=\"\">
                                        <a href=\"";
            // line 493
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_aboutus_index");
            echo "\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>About Us</span>
                                        </a>
                                    </li>
                                     <li class=\"\">
                                        <a href=\"";
            // line 499
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_whyus_index");
            echo "\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>Why Us</span>
                                        </a>
                                    </li>
                                    <li class=\"\">
                                        <a href=\"";
            // line 505
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_terms_index");
            echo "\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Term and Condition</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class=\"\">
                                <a href=\"";
            // line 513
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_contactus_index");
            echo "\">
                                    <i class=\"fa fa-envelope\"></i>
                                    <span>Contact Us</span>
                                </a>
                            </li>
                            <li class=\"\">
                                <a href=\"";
            // line 519
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_subscriber_index");
            echo "\">
                                    <i class=\"fa fa-user\"></i>
                                    <span>Subscribers</span>
                                </a>
                            </li>
                             <li class=\"\">
                                <a href=\"";
            // line 525
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_socialmedia_index");
            echo "\">
                                    <i class=\"fa fa-newspaper-o\"></i>
                                    <span>Social Media</span>
                                </a>
                            </li>
                            ";
            // line 543
            echo "                            <li class=\"treeview menu-open\">
                                <a href=\"#\">
                                    <i class=\"fa fa-bar-chart\"></i>
                                    <span>Reports</span>
                                    <span class=\"pull-right-container\">
                                        <i class=\"fa fa-angle-left pull-right\"></i>
                                    </span>
                                </a>
                                <ul class=\"treeview-menu\">
                                    ";
            // line 558
            echo "                                    <li class=\"\">
                                        <a href=\"";
            // line 559
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_reports_summary");
            echo "\">
                                            <i class=\"fa fa-gear\"></i>
                                            <span>Report Summary</span>
                                        </a>
                                    </li>
\t\t\t\t\t\t\t\t\t  <li class=\"\">
                                        <a href=\"";
            // line 565
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dietitiancustomerservice_dietactiveusers");
            echo "\">
                                            <i class=\"fa fa-bank\"></i>
                                            <span>Dietitian Service</span>
                                        </a>
                                    </li>
                                    <li class=\"\">
                                        <a href=\"";
            // line 571
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_salesreports_index");
            echo "\">
                                            <i class=\"fa fa-gear\"></i>
                                            <span>Monthly Sales report</span>
                                        </a>
                                    </li>
                                    ";
            // line 589
            echo "                                   
                                </ul>
                            </li>

                            ";
            // line 619
            echo "                        ";
        }
        // line 620
        echo "                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <div
                class=\"content-wrapper\" style=\"min-height: 916px;\">
                <!--------------------- Main page contents loads here ------------------------------------>
            ";
        // line 627
        $this->displayBlock('content', $context, $blocks);
        // line 628
        echo "            <!---------------------------------------------------------------------------------------->
        </div>
        <footer class=\"main-footer\">
            <div class=\"pull-right hidden-xs\">
                <b>Admin Panel</b>
            </div>
            <strong>Copyright &copy; Anona
                ";
        // line 635
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "
        </footer>
    </div>
    <!-- ./wrapper -->
    <div class=\"\" id=\"wait\" data-backdrop=\"static\" data-keyboard=\"false\" style=\"display: none;position:fixed;top:40%;left:50%;z-index: 2147483647;padding: 15px 18px;background-color:#CCC;\">
        <span>
            <i class=\"fa fa-circle-o-notch fa-spin fa-3x\"></i>
    </div>
</body>
</html>
<script>
    \$(document).ajaxStart(function () {
    \$(\"#wait\").show();
    });
    \$(document).ajaxStop(function () {
    \$(\"#wait\").hide();
    });
    \$(window).load(function () {
    ";
        // line 655
        echo "// Animate loader off screen
// \$(\".se-pre-con\").fadeOut(\"slow\");;
    }
    );
</script>
";
        // line 660
        $this->displayBlock('js', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 7
    public function block_title($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Anona
            ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 31
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 32
        echo "            <style>
                {
                    #.no-js #loader {
                        display: none;
                    }
                    .js #loader {
                        display: block;
                        position: absolute;
                        left: 100px;
                        top: 0;
                    }
                    .se-pre-con {
                        position: fixed;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        z-index: 9999;
                        background: lightblue url('https://smallenvelop.com/wp-content/uploads / 2014/08/Preloader_51.gif') no-repeat fixed center;
                    }#
                }
            </style>
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 627
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 660
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@Admin/Layout/adminlayout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  895 => 660,  884 => 627,  855 => 32,  849 => 31,  836 => 7,  829 => 660,  822 => 655,  801 => 635,  792 => 628,  790 => 627,  781 => 620,  778 => 619,  772 => 589,  764 => 571,  755 => 565,  746 => 559,  743 => 558,  732 => 543,  724 => 525,  715 => 519,  706 => 513,  695 => 505,  686 => 499,  677 => 493,  668 => 487,  659 => 481,  656 => 480,  648 => 469,  645 => 468,  637 => 457,  628 => 451,  618 => 444,  608 => 437,  605 => 436,  603 => 430,  586 => 392,  577 => 386,  565 => 377,  556 => 371,  543 => 360,  540 => 359,  531 => 353,  522 => 347,  513 => 341,  509 => 339,  506 => 338,  497 => 332,  487 => 325,  482 => 322,  474 => 313,  465 => 307,  452 => 296,  449 => 295,  440 => 289,  431 => 283,  427 => 281,  424 => 280,  415 => 274,  411 => 272,  408 => 271,  396 => 262,  387 => 256,  378 => 250,  369 => 244,  360 => 238,  342 => 223,  333 => 217,  324 => 211,  321 => 210,  311 => 202,  302 => 196,  293 => 190,  279 => 178,  271 => 172,  262 => 166,  253 => 160,  244 => 154,  232 => 144,  229 => 143,  220 => 137,  217 => 136,  215 => 135,  211 => 133,  205 => 131,  203 => 130,  198 => 128,  195 => 127,  174 => 106,  156 => 91,  149 => 87,  124 => 65,  120 => 64,  116 => 63,  112 => 62,  107 => 60,  100 => 56,  97 => 55,  95 => 31,  89 => 28,  84 => 26,  80 => 25,  75 => 23,  68 => 19,  63 => 17,  58 => 15,  50 => 9,  48 => 7,  43 => 5,  37 => 1,);
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
        <title>
            {% block title %}Anona
            {% endblock %}
        </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta
            content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
        <!-- Bootstrap 3.3.4 -->
        <link
            href=\"{{asset('bundles/design/')}}css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <!-- Fontawesome --->
        <link href=\"{{asset('bundles/design/')}}css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <link
            href=\"{{asset('bundles/design/')}}css/AdminLTE.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <!-- AdminLTE Skins. Choose a skin from the css/skins
                                                     folder instead of downloading all of them to reduce the load. -->
        <link
            href=\"{{asset('bundles/design/')}}css/skins/_all-skins.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <!-- DataTable ---->
        <link href=\"{{asset('bundles/design/')}}css/dataTables.bootstrap.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <link href=\"{{asset('bundles/design/')}}css/buttons.dataTables.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <link href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <link href=\"{{asset('bundles/design/')}}css/bootstrap-toggle.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <link
            href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css\" rel=\"stylesheet\" type=\"text/css\"/>
        {% block css %}
            <style>
                {
                    #.no-js #loader {
                        display: none;
                    }
                    .js #loader {
                        display: block;
                        position: absolute;
                        left: 100px;
                        top: 0;
                    }
                    .se-pre-con {
                        position: fixed;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        z-index: 9999;
                        background: lightblue url('https://smallenvelop.com/wp-content/uploads / 2014/08/Preloader_51.gif') no-repeat fixed center;
                    }#
                }
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
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css\" type=\"text/css\" media=\"screen\"/>
        <script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js\"></script>
        <script src=\"https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js\" type=\"text/javascript\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js\" type=\"text/javascript\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js\" type=\"text/javascript\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js\" type=\"text/javascript\"></script>
        <script src=\"https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js\" type=\"text/javascript\"></script>
        <link rel=\"stylesheet\" href=\"https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css\" type=\"text/css\" media=\"screen\"/>
    </head>
    <body class=\"skin-green-light sidebar-mini\">
        <div class=\"se-pre-con\"></div>
        <div class=\"wrapper\">
            <header
                class=\"main-header\">
                <!-- Logo -->
                <a
                    href=\"#\" class=\"logo\">
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
                <nav
                    class=\"navbar navbar-static-top\" role=\"navigation\">
                    <!-- Sidebar toggle button-->
                    <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
                        <span class=\"sr-only\">Toggle navigation</span>
                    </a>
                    <div class=\"navbar-custom-menu\">
                        <ul
                            class=\"nav navbar-nav\">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class=\"user user-menu\" >
                                <a href=\"{{path('admin_default_logout')}}\" onclick=\"return confirm('Are you sure want to Logout?');\" class=\"bg-navy\" style=\"background-color: #9cca3c !important;\">
                                    <span class=\"hidden-xs\">
                                        <i class=\"fa fa-power-off\"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside
                class=\"main-sidebar\">
                <!-- sidebar: style can be found in sidebar.less -->
                <section
                    class=\"sidebar\">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class=\"sidebar-menu\">
                       {# <li class=\"header\" style=\"color: #e2e2e2;\">
                            
                        </li>#}
                        <li class=\"active treeview\">
                            <a href=\"{{path('admin_dashboard_index')}}\">
                                <i class=\"fa fa-dashboard\"></i>
                                <span>Dashboard </span>   {% if app.session.has('logged_in_username') %}
                                <small>[ Logged as : {{ app.session.get('logged_in_username') }} ] </small>
                            {% endif %}
                            </a>
                        </li>
                        {%if app.session.get('role_id') == 2 %}
                            <li class=\"\">
                                <a href=\"{{path('admin_users_drivers',{'user_role_id':2})}}\">
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
                                        <a href=\"{{path('admin_users_drivers',{'user_role_id':2})}}\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>Drivers</span>
                                        </a>
                                    </li>
                                     <li class=\"\">
                                        <a href=\"{{path('admin_users_dietitians',{'user_role_id':8})}}\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>Dietititans</span>
                                        </a>
                                    </li>
                                     <li class=\"\">
                                        <a href=\"{{path('admin_users_drivers',{'user_role_id':'admin'})}}\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>Admin Users</span>
                                        </a>
                                    </li>
                                    {# <li class=\"\">  <a href=\"{{path('admin_users_index',{'user_role_id':4})}}\"><i class=\"fa fa-user\"></i>  <span>Company</span>    </a>  </li>   #}
                                </ul>
                            </li>
                            <li class=\"treeview menu-open hide\">
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
                                    <li class=\"active treeview\">
                                        <a href=\"{{path('admin_uservideo_tutorialvideolist')}}\">
                                            <i class=\"fa fa-film\"></i>
                                            <span>Video Tutorial</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {#            <li class=\"active treeview\"><a href=\"{{path('admin_schedule_index')}}\"><i class=\"fa fa-book\"></i><span>User's Schedule</span></a> </li>   #}
                            <li class=\"treeview\">
                                <a href=\"{{path('admin_product_index')}}\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Products</span>
                                </a>
                            </li>
                            <li class=\"treeview hide\">
                                <a href=\"{{path('admin_ratings_index')}}\">
                                    <i class=\"fa fa-star\"></i>
                                    <span>Ratings</span>
                                </a>
                            </li>
                            <li class=\"treeview\">
                                <a href=\"{{path('admin_package_index')}}\">
                                    <i class=\"fa fa-list\"></i>
                                    <span>Packages</span>
                                </a>
                            </li>
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
                                        <a href=\"{{path('admin_orders_index')}}/Active\">
                                            <i class=\"fa fa-file\"></i>
                                            <span>Customer Active Orders</span>
                                        </a>
                                    </li>
                                    <li class=\"hide\">
                                        <a href=\"{{path('admin_orders_index')}}/Pause\">
                                            <i class=\"fa fa-file\"></i>
                                            <span>Customer Pause Orders</span>
                                        </a>
                                    </li>
                                    <li class=\"\">
                                        <a href=\"{{path('admin_orders_index')}}/Expire\">
                                            <i class=\"fa fa-file\"></i>
                                            <span>Customer Expired Orders</span>
                                        </a>
                                    </li> 
                                    <li class=\"\">
                                        <a href=\"{{path('admin_orders_index')}}/cancel\">
                                            <i class=\"fa fa-file\"></i>
                                            <span>Customer Cancel Orders</span>
                                        </a>
                                    </li> 
                                    <li class=\"active treeview\">
                                        <a href=\"{{path('admin_driverorders_index')}}\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Orders Driver Wise</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
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
                            </li>
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
                                    {#     
                                     <li class=\"\">    <a href=\"{{path('admin_users_index',{'user_role_id':4})}}\"> <i class=\"fa fa-user\"></i><span>Company</span> </a>
                                          </li>  
                                           #}
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
                                    <li class=\"active treeview hide\">
                                        <a href=\"{{path('admin_coupon_categorylist')}}\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Coupon Category</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class=\"treeview\">
                                <a href=\"{{path('admin_advertise_index')}}\">
                                    <i class=\"fa  fa-globe\"></i>
                                    <span>Advertisements / Offer</span>
                                </a>
                            </li>
                            <li class=\"treeview hide\">
                                <a href=\"{{path('admin_gallery_index')}}\">
                                    <i class=\"fa fa-image\"></i>
                                    <span>Common Gallery</span>
                                </a>
                            </li>
                            <li class=\"treeview menu-open\">
                                <a href=\"#\">
                                    <i class=\"fa fa-plus\"></i>
                                    <span>Masters</span>
                                    <span class=\"pull-right-container\">
                                        <i class=\"fa fa-angle-left pull-right\"></i>
                                    </span>
                                </a>
                                <ul class=\"treeview-menu\">
                                    {# <li class=\"\">
                                        <a href=\"{{path('admin_area_index')}}\">
                                            <i class=\"fa fa-map-marker\"></i>
                                            <span>Area</span>
                                        </a>
                                    </li>
                                    <li class=\"\"> 
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
                                   {# <li class=\"active treeview \">
                                        <a href=\"{{path('admin_goal_index')}}\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Goal</span>
                                        </a>
                                    </li> #}
                                    <li class=\"\">
                                        <a href=\"{{path('admin_mealtypes_index')}}\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Meal Types</span>
                                        </a>
                                    </li>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t <li class=\"\">
                                        <a href=\"{{path('admin_dietstatus_index')}}\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Diet Status</span>
                                        </a>
                                    </li>

                                    <li class=\"\">
                                        <a href=\"{{path('admin_ordernote_index')}}\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Order notes</span>
                                        </a>
                                    </li>
                                     <li class=\"\">
                                        <a href=\"{{path('admin_packagefor_index')}}\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Package For Types</span>
                                        </a>
                                    </li>
                                   {# <li class=\"\">
                                        <a href=\"{{path('admin_deliveryreason_index')}}\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Delivery Reason</span>
                                        </a>
                                    </li> #}
                                    <li class=\"\">
                                        <a href=\"{{path('admin_timeslots_index')}}\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Delivery Time</span>
                                        </a>
                                    </li>
                                    {# <li class=\"\">
                                        <a href=\"{{path('admin_festival_index')}}\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Festivals</span>
                                        </a>
                                    </li>  #}
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
                                    </li>
                                    <li class=\"\">
                                        <a href=\"{{path('admin_aboutus_index')}}\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>About Us</span>
                                        </a>
                                    </li>
                                     <li class=\"\">
                                        <a href=\"{{path('admin_whyus_index')}}\">
                                            <i class=\"fa fa-user\"></i>
                                            <span>Why Us</span>
                                        </a>
                                    </li>
                                    <li class=\"\">
                                        <a href=\"{{path('admin_terms_index')}}\">
                                            <i class=\"fa fa-list\"></i>
                                            <span>Term and Condition</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class=\"\">
                                <a href=\"{{path('admin_contactus_index')}}\">
                                    <i class=\"fa fa-envelope\"></i>
                                    <span>Contact Us</span>
                                </a>
                            </li>
                            <li class=\"\">
                                <a href=\"{{path('admin_subscriber_index')}}\">
                                    <i class=\"fa fa-user\"></i>
                                    <span>Subscribers</span>
                                </a>
                            </li>
                             <li class=\"\">
                                <a href=\"{{path('admin_socialmedia_index')}}\">
                                    <i class=\"fa fa-newspaper-o\"></i>
                                    <span>Social Media</span>
                                </a>
                            </li>
                            {#<li class=\"\">
                                <a href=\"{{path('admin_generalsettings_index')}}\">
                                    <i class=\"fa fa-gear\"></i>
                                    <span>General Setting</span>
                                </a>
                            </li>
                            
                            <li class=\"\">
                                <a href=\"{{ path('admin_pushnotification_index') }}\">
                                    <i class=\"fa  fa-bell\"></i>
                                    <span>Push Notification</span>
                                </a>
                            </li>  #}
                            <li class=\"treeview menu-open\">
                                <a href=\"#\">
                                    <i class=\"fa fa-bar-chart\"></i>
                                    <span>Reports</span>
                                    <span class=\"pull-right-container\">
                                        <i class=\"fa fa-angle-left pull-right\"></i>
                                    </span>
                                </a>
                                <ul class=\"treeview-menu\">
                                    {# <li class=\"\">
                                        <a href=\"{{path('admin_customerservice_notpaid')}}\">
                                            <i class=\"fa fa-bank\"></i>
                                            <span>Customer Service</span>
                                        </a>
                                    </li> #}
                                    <li class=\"\">
                                        <a href=\"{{ path('admin_reports_summary') }}\">
                                            <i class=\"fa fa-gear\"></i>
                                            <span>Report Summary</span>
                                        </a>
                                    </li>
\t\t\t\t\t\t\t\t\t  <li class=\"\">
                                        <a href=\"{{path('admin_dietitiancustomerservice_dietactiveusers')}}\">
                                            <i class=\"fa fa-bank\"></i>
                                            <span>Dietitian Service</span>
                                        </a>
                                    </li>
                                    <li class=\"\">
                                        <a href=\"{{ path('admin_salesreports_index') }}\">
                                            <i class=\"fa fa-gear\"></i>
                                            <span>Monthly Sales report</span>
                                        </a>
                                    </li>
                                    {#
                                    <li class=\"\">
                                        <a href=\"{{ path('admin_userreports_index') }}\">
                                            <i class=\"fa fa-gear\"></i>
                                            <span>User Package Summary</span>
                                        </a>
                                    </li>
                                    <li class=\"\">
                                        <a href=\"{{ path('admin_pauseuserreports_pausereports') }}\">
                                            <i class=\"fa fa-gear\"></i>
                                            <span>Pause User Summary</span>
                                        </a>
                                    </li>#}
                                   
                                </ul>
                            </li>

                            {#
                            <li class=\"\">
                                <a href=\"{{ path('admin_adminstatus_updateshopstatus') }}\">
                                    <i class=\"fa fa-toggle-off\"></i>
                                    <span>Anona Shop Status</span>
                                </a>
                            </li>
                            <li class=\"\">
                                <a href=\"{{ path('admin_adminstatus_notifylist') }}\">
                                    <i class=\"fa fa-gear\"></i>
                                    <span>Notify List</span>
                                </a>
                            </li>
                            <li class=\"\">
                                <a target=\"_blank\" href=\"{{ path('admin_remainingdays_updateremainingdays') }}\">
                                    <i class=\"fa fa-gear\"></i>
                                    <span>Update Remaining Days</span>
                                </a>
                            </li>
                           <li class=\"\">
                                <a target=\"_blank\" href=\"{{ path('admin_remainingdays_remdayscalllogs') }}\">
                                    <i class=\"fa fa-gear\"></i>
                                    <span>Call logs of Rem.Days</span>
                                </a>
                            </li>
                            #}
                        {%endif%}
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <div
                class=\"content-wrapper\" style=\"min-height: 916px;\">
                <!--------------------- Main page contents loads here ------------------------------------>
            {% block content %}{% endblock %}
            <!---------------------------------------------------------------------------------------->
        </div>
        <footer class=\"main-footer\">
            <div class=\"pull-right hidden-xs\">
                <b>Admin Panel</b>
            </div>
            <strong>Copyright &copy; Anona
                {{'now' | date('Y')}}
        </footer>
    </div>
    <!-- ./wrapper -->
    <div class=\"\" id=\"wait\" data-backdrop=\"static\" data-keyboard=\"false\" style=\"display: none;position:fixed;top:40%;left:50%;z-index: 2147483647;padding: 15px 18px;background-color:#CCC;\">
        <span>
            <i class=\"fa fa-circle-o-notch fa-spin fa-3x\"></i>
    </div>
</body>
</html>
<script>
    \$(document).ajaxStart(function () {
    \$(\"#wait\").show();
    });
    \$(document).ajaxStop(function () {
    \$(\"#wait\").hide();
    });
    \$(window).load(function () {
    {# \$(document).ready(function () {
    #}
// Animate loader off screen
// \$(\".se-pre-con\").fadeOut(\"slow\");;
    }
    );
</script>
{% block js %}{% endblock %}", "@Admin/Layout/adminlayout.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Layout/adminlayout.html.twig");
    }
}
