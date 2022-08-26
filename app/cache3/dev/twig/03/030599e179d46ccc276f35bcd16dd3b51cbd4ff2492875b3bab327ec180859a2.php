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

/* AdminBundle:Users:dietitians.html.twig */
class __TwigTemplate_899f745ff050d8be20aec05eddd444a275dfdaca3602f69787f50b49332b965e extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@Admin/Layout/adminlayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Users:dietitians.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Users:dietitians.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            ";
        // line 6
        if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 2))) {
            echo " Drivers";
        }
        // line 7
        echo "            ";
        if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 4))) {
            echo " Company";
        }
        // line 8
        echo "            ";
        if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 3))) {
            echo "Users";
        }
        echo " 
            ";
        // line 9
        if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == "admin"))) {
            echo "Admin User";
        }
        echo " Listing
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 18
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 20
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 24
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 26
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">";
        // line 34
        if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 8))) {
            echo "Dietitians";
        } else {
            echo "Users";
        }
        echo "</h3>
                        ";
        // line 35
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 1)) {
            // line 36
            echo "                            ";
            if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 8))) {
                echo "<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_adduser", ["user_role_id" => ($context["user_role_id"] ?? $this->getContext($context, "user_role_id"))]), "html", null, true);
                echo "\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Dietitian</b></a>";
            }
            // line 37
            echo "                            ";
            if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 4))) {
                echo "<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_adduser", ["user_role_id" => ($context["user_role_id"] ?? $this->getContext($context, "user_role_id"))]), "html", null, true);
                echo "\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Company</b></a>";
            }
            echo "\t\t\t\t
                                ";
        }
        // line 39
        echo "                    </div>
                    <div class=\"box-body table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>\t\t\t\t
                            <th>Unique ID</th>\t\t\t\t
                            <th>Username</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Date Of birth</th>
                                ";
        // line 50
        echo "                            <th>Status </th>                
                                ";
        // line 51
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 1)) {
            // line 52
            echo "
                                <th>Operation</th>

                            ";
        }
        // line 56
        echo "                            </thead>
                            <tbody>
                                ";
        // line 58
        if (((isset($context["users"]) || array_key_exists("users", $context)) &&  !twig_test_empty(($context["users"] ?? $this->getContext($context, "users"))))) {
            // line 59
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["users"]);
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["users"]) {
                // line 60
                echo "                                        <tr>
                                            <td>";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                           
                                            <td>";
                // line 63
                echo twig_escape_filter($this->env, $this->getAttribute($context["users"], "unique_user_id", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 64
                echo twig_escape_filter($this->env, (($this->getAttribute($context["users"], "user_firstname", []) . " ") . $this->getAttribute($context["users"], "user_lastname", [])), "html", null, true);
                echo "</td>
                                            <td>";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute($context["users"], "email", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute($context["users"], "user_mobile", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($context["users"], "date_of_birth", []), "html", null, true);
                echo "</td>
                                           
                                            ";
                // line 69
                $context["checked"] = "";
                // line 70
                echo "                                            ";
                if (($this->getAttribute($context["users"], "status", []) == "active")) {
                    // line 71
                    echo "                                                ";
                    $context["checked"] = "checked";
                    // line 72
                    echo "                                            ";
                }
                // line 73
                echo "                                            <td><input data-on=\"active\" class=\"status status_1\" data-off=\"inactive\" onchange=\" if (confirm('Are you sure?')) {
                                                        change_status(";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute($context["users"], "user_master_id", []), "html", null, true);
                echo ", \$(this).is(':checked'))
                                                    }\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" ";
                // line 75
                echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                echo "/></td>
                                                ";
                // line 76
                if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 1)) {
                    // line 77
                    echo "
                                                <td>

                                                    ";
                    // line 80
                    if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 3))) {
                        // line 81
                        echo "                                                          <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_viewuser", ["user_id" => $this->getAttribute($context["users"], "user_master_id", []), "user_role_id" => ($context["user_role_id"] ?? $this->getContext($context, "user_role_id"))]), "html", null, true);
                        echo "\" class=\"btn btn-xs btn-default\"><i class=\"fa fa-book\" data-toggle=\"tooltip\" data-title=\"View Details\"></i></a>\t\t\t\t\t\t\t\t
                                                    ";
                    }
                    // line 83
                    echo "                                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_adduser", ["user_id" => $this->getAttribute($context["users"], "user_master_id", []), "user_role_id" => ($context["user_role_id"] ?? $this->getContext($context, "user_role_id"))]), "html", null, true);
                    echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-title=\"Edit User\"></i></a>
                                                    ";
                    // line 84
                    if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) != "admin"))) {
                        // line 85
                        echo "                                                        <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_deleteuser", ["user_id" => $this->getAttribute($context["users"], "user_master_id", [])]), "html", null, true);
                        echo "\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete user ?');\"><i class=\"fa fa-trash\" data-toggle=\"tooltip\" data-title=\"Delete User\"></i></a>\t\t\t\t\t\t\t\t
                                                    ";
                    }
                    // line 87
                    echo "                                                    ";
                    if ((((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 2)) && false)) {
                        // line 88
                        echo "                                                        <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_viewdriverroute", ["user_id" => $this->getAttribute($context["users"], "user_master_id", [])]), "html", null, true);
                        echo "\" class=\"btn btn-xs btn-warning\" target=\"_blank\">Route</a>
                                                    ";
                    }
                    // line 90
                    echo "                                                </td>

                                            ";
                }
                // line 93
                echo "                                        </tr>
                                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['users'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "                                ";
        }
        // line 96
        echo "                            </tbody>
                            <tfoot>
                            <th>No</th>\t
                            <th>Unique ID</th>\t\t\t\t
                            <th>Username</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Date Of birth</th>
                               
                            <th>Status</th>                
                            ";
        // line 106
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 1)) {
            echo "<th>Operation</th>";
        }
        // line 107
        echo "                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 121
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 122
        echo "    <script>
       ";
        // line 126
        echo "        \$(document).ready(function() {
           
            \$('#list').DataTable();
        } );
        \$(document).ready(function () {

            \$('[data-fancybox=\"gallery\"]').fancybox({
                // Options will go here
            });

        });
        function change_status(main_user_id, status) {
            \$.ajax({
                url: \"";
        // line 139
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_changeuserstatus");
        echo "\",
                method: \"POST\",
                data: {'user_master_id': main_user_id, 'status': status},
                success: function (data) {
                    console.log('done');
                }
            });
        }
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Users:dietitians.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  375 => 139,  360 => 126,  357 => 122,  351 => 121,  332 => 107,  328 => 106,  316 => 96,  313 => 95,  298 => 93,  293 => 90,  287 => 88,  284 => 87,  278 => 85,  276 => 84,  271 => 83,  265 => 81,  263 => 80,  258 => 77,  256 => 76,  252 => 75,  248 => 74,  245 => 73,  242 => 72,  239 => 71,  236 => 70,  234 => 69,  229 => 67,  225 => 66,  221 => 65,  217 => 64,  213 => 63,  208 => 61,  205 => 60,  187 => 59,  185 => 58,  181 => 56,  175 => 52,  173 => 51,  170 => 50,  158 => 39,  148 => 37,  141 => 36,  139 => 35,  131 => 34,  124 => 29,  115 => 26,  111 => 24,  106 => 23,  97 => 20,  93 => 18,  89 => 17,  82 => 13,  73 => 9,  66 => 8,  61 => 7,  57 => 6,  52 => 3,  46 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"@Admin/Layout/adminlayout.html.twig\" %}
{% block content %}
    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            {%if user_role_id is defined and user_role_id == 2%} Drivers{%endif%}
            {%if user_role_id is defined and user_role_id == 4%} Company{%endif%}
            {% if user_role_id is defined and user_role_id == 3%}Users{%endif%} 
            {% if user_role_id is defined and user_role_id == 'admin'%}Admin User{%endif%} Listing
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"{{path('admin_dashboard_index',{'domain':app.session.get('domain')})}}\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        {% for flashMessage in app.session.flashbag.get('success_msg') %}
            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>{{ flashMessage }}
            </div>
        {% endfor %}
        {% for flashMessage in app.session.flashbag.get('error_msg') %}
            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>{{ flashMessage }}
            </div>
        {% endfor %}

        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">{%if user_role_id is defined and user_role_id == 8%}Dietitians{%else%}Users{%endif%}</h3>
                        {%if app.session.get('role_id') == 1 %}
                            {%if user_role_id is defined and user_role_id == 8%}<a href=\"{{ path('admin_users_adduser',{'user_role_id':user_role_id}) }}\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Dietitian</b></a>{%endif%}
                            {%if user_role_id is defined and user_role_id == 4%}<a href=\"{{ path('admin_users_adduser',{'user_role_id':user_role_id}) }}\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Company</b></a>{%endif%}\t\t\t\t
                                {%endif%}
                    </div>
                    <div class=\"box-body table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>\t\t\t\t
                            <th>Unique ID</th>\t\t\t\t
                            <th>Username</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Date Of birth</th>
                                {#<th>Order No</th>#}
                            <th>Status </th>                
                                {%if app.session.get('role_id') == 1 %}

                                <th>Operation</th>

                            {%endif%}
                            </thead>
                            <tbody>
                                {%if users is defined and users is not empty%}
                                    {%for users in users%}
                                        <tr>
                                            <td>{{loop.index}}</td>
                                           
                                            <td>{{users.unique_user_id}}</td>
                                            <td>{{users.user_firstname ~' '~ users.user_lastname}}</td>
                                            <td>{{users.email}}</td>
                                            <td>{{users.user_mobile}}</td>
                                            <td>{{users.date_of_birth}}</td>
                                           
                                            {% set checked = ''%}
                                            {% if users.status == 'active'%}
                                                {% set checked = 'checked'%}
                                            {%endif%}
                                            <td><input data-on=\"active\" class=\"status status_1\" data-off=\"inactive\" onchange=\" if (confirm('Are you sure?')) {
                                                        change_status({{users.user_master_id}}, \$(this).is(':checked'))
                                                    }\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" {{checked}}/></td>
                                                {%if app.session.get('role_id') == 1 %}

                                                <td>

                                                    {%if user_role_id is defined and user_role_id == 3 %}
                                                          <a href=\"{{path('admin_users_viewuser',{'user_id':users.user_master_id,'user_role_id':user_role_id})}}\" class=\"btn btn-xs btn-default\"><i class=\"fa fa-book\" data-toggle=\"tooltip\" data-title=\"View Details\"></i></a>\t\t\t\t\t\t\t\t
                                                    {%endif%}
                                                    <a href=\"{{path('admin_users_adduser',{'user_id':users.user_master_id,'user_role_id':user_role_id})}}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-title=\"Edit User\"></i></a>
                                                    {%if user_role_id is defined and user_role_id != 'admin'%}
                                                        <a href=\"{{path('admin_users_deleteuser',{'user_id':users.user_master_id})}}\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete user ?');\"><i class=\"fa fa-trash\" data-toggle=\"tooltip\" data-title=\"Delete User\"></i></a>\t\t\t\t\t\t\t\t
                                                    {%endif%}
                                                    {%if user_role_id is defined and user_role_id == 2 and false %}
                                                        <a href=\"{{path('admin_users_viewdriverroute',{'user_id':users.user_master_id})}}\" class=\"btn btn-xs btn-warning\" target=\"_blank\">Route</a>
                                                    {%endif%}
                                                </td>

                                            {%endif%}
                                        </tr>
                                    {%endfor%}
                                {%endif%}
                            </tbody>
                            <tfoot>
                            <th>No</th>\t
                            <th>Unique ID</th>\t\t\t\t
                            <th>Username</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Date Of birth</th>
                               
                            <th>Status</th>                
                            {%if app.session.get('role_id') == 1 %}<th>Operation</th>{%endif%}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

{% endblock %}

{% block js %}
    <script>
       {# \$(document).ready(function () {
            \$('#list').DataTable();
        });#}
        \$(document).ready(function() {
           
            \$('#list').DataTable();
        } );
        \$(document).ready(function () {

            \$('[data-fancybox=\"gallery\"]').fancybox({
                // Options will go here
            });

        });
        function change_status(main_user_id, status) {
            \$.ajax({
                url: \"{{path('admin_users_changeuserstatus')}}\",
                method: \"POST\",
                data: {'user_master_id': main_user_id, 'status': status},
                success: function (data) {
                    console.log('done');
                }
            });
        }
    </script>
{% endblock %}
", "AdminBundle:Users:dietitians.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Users/dietitians.html.twig");
    }
}
