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

/* AdminBundle:Package:index.html.twig */
class __TwigTemplate_ab4dbb731d6f11c84d6af1e917d42cc8e1078a255855ecb7d06094abec258bba extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Package:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Package:index.html.twig", 1);
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
            Package Listing
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 15
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 17
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 21
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 23
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box-header\">
                    <a href=\"";
        // line 30
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_package_addpackage");
        echo "\" class=\"btn btn-xs btn-primary pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Package</a>\t\t
                </div>
                <div class=\"box box-primary\">
                    <div class=\"box-body table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>
                                ";
        // line 37
        if (((isset($context["languages"]) || array_key_exists("languages", $context)) &&  !twig_test_empty(($context["languages"] ?? $this->getContext($context, "languages"))))) {
            // line 38
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? $this->getContext($context, "languages")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 39
                echo "                                    <th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "\t
                                ";
        }
        // line 42
        echo "                            ";
        // line 43
        echo "                            <th>Priority</th>
                            ";
        // line 45
        echo "                            <th>Operation</th>
                            </thead>
                            <tbody>
                                ";
        // line 48
        if (((isset($context["packages"]) || array_key_exists("packages", $context)) &&  !twig_test_empty(($context["packages"] ?? $this->getContext($context, "packages"))))) {
            // line 49
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["packages"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["packages"]) {
                // line 50
                echo "                                        <tr>
                                            <td>";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>

                                            ";
                // line 53
                if (($this->getAttribute($context["packages"], "lang_wise", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["packages"], "lang_wise", [])))) {
                    // line 54
                    echo "                                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["packages"], "lang_wise", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["name"]) {
                        // line 55
                        echo "                                                    <td>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["name"], "package_name", []), "html", null, true);
                        echo "</td>
                                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['name'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 57
                    echo "                                            ";
                }
                // line 58
                echo "                                           ";
                // line 59
                echo "                                            <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["packages"], "sort_order", []), "html", null, true);
                echo "</td>
                                           ";
                // line 61
                echo "                                           <td>
                                                <a href=\"";
                // line 62
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_package_addpackage", ["main_package_id" => $this->getAttribute($context["packages"], "main_package_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>

                                                <a href=\"";
                // line 64
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_package_deletepackage", ["main_package_id" => $this->getAttribute($context["packages"], "main_package_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t

                                               ";
                // line 67
                echo "\t
                                            </td>
                                        </tr>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['packages'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            echo "                                ";
        }
        // line 72
        echo "                            </tbody>
                            <tfoot>
                            <th>No</th>
                                ";
        // line 75
        if (((isset($context["languages"]) || array_key_exists("languages", $context)) &&  !twig_test_empty(($context["languages"] ?? $this->getContext($context, "languages"))))) {
            // line 76
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? $this->getContext($context, "languages")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 77
                echo "                                    <th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 78
            echo "\t
                                ";
        }
        // line 80
        echo "                           ";
        // line 81
        echo "                            <th>Priority</th>
                           ";
        // line 83
        echo "                            <th>Operation</th>\t
                            </tfoot>
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

    // line 98
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 99
        echo "    <script>

        function change_status(main_product_id, status) {
          \$.ajax  ({
                url: \"";
        // line 103
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_changeproductstatus");
        echo "\",
                method: \"POST\",
                data: {'main_product_id': main_product_id, 'status': status},
                success: function (data) {
                    console.log('done');
                }
            });
        }

        \$(document).ready(function () {
            \$('#list').DataTable();
        });

        \$(document).ready(function () {

            \$('[data-fancybox=\"gallery\"]').fancybox({
                // Options will go here
            });

        });

    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Package:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  298 => 103,  292 => 99,  286 => 98,  266 => 83,  263 => 81,  261 => 80,  257 => 78,  248 => 77,  243 => 76,  241 => 75,  236 => 72,  233 => 71,  216 => 67,  211 => 64,  206 => 62,  203 => 61,  198 => 59,  196 => 58,  193 => 57,  184 => 55,  179 => 54,  177 => 53,  172 => 51,  169 => 50,  151 => 49,  149 => 48,  144 => 45,  141 => 43,  139 => 42,  135 => 40,  126 => 39,  121 => 38,  119 => 37,  109 => 30,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
            Package Listing
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
                <div class=\"box-header\">
                    <a href=\"{{path('admin_package_addpackage')}}\" class=\"btn btn-xs btn-primary pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Package</a>\t\t
                </div>
                <div class=\"box box-primary\">
                    <div class=\"box-body table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>
                                {% if languages is defined and languages is not empty%}
                                    {%for language in languages%}
                                    <th>Name : {{language.language_name}}</th>
                                    {%endfor%}\t
                                {% endif%}
                            {#<th>Pause </th> #}
                            <th>Priority</th>
                            {#<th>Grams</th>#}
                            <th>Operation</th>
                            </thead>
                            <tbody>
                                {%if packages is defined and packages is not empty%}
                                    {%for packages in packages%}
                                        <tr>
                                            <td>{{loop.index}}</td>

                                            {%if packages.lang_wise is defined and packages.lang_wise is not empty %}
                                                {%for name in packages.lang_wise %}
                                                    <td>{{name.package_name}}</td>
                                                {%endfor%}
                                            {%endif%}
                                           {# <td>{{packages.package_pause}}</td> #}
                                            <td>{{packages.sort_order}}</td>
                                           {# <td>{{packages.package_grams}}</td> #}
                                           <td>
                                                <a href=\"{{path('admin_package_addpackage',{'main_package_id':packages.main_package_master_id})}}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>

                                                <a href=\"{{path('admin_package_deletepackage',{'main_package_id':packages.main_package_master_id})}}\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t

                                               {# <a href=\"{{path('admin_pause_pausepackage',{'main_package_id':packages.main_package_master_id})}}\" class=\"btn btn-xs btn-info\"><i class=\"fa fa-stop\"></i>&nbsp; Pause</a>\t\t\t\t\t\t
                                               #}\t
                                            </td>
                                        </tr>
                                    {%endfor%}
                                {%endif%}
                            </tbody>
                            <tfoot>
                            <th>No</th>
                                {% if languages is defined and languages is not empty%}
                                    {%for language in languages%}
                                    <th>Name : {{language.language_name}}</th>
                                    {%endfor%}\t
                                {% endif%}
                           {#  <th>Pause </th>#}
                            <th>Priority</th>
                           {# <th>Grams</th> #}
                            <th>Operation</th>\t
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

        function change_status(main_product_id, status) {
          \$.ajax  ({
                url: \"{{path('admin_product_changeproductstatus')}}\",
                method: \"POST\",
                data: {'main_product_id': main_product_id, 'status': status},
                success: function (data) {
                    console.log('done');
                }
            });
        }

        \$(document).ready(function () {
            \$('#list').DataTable();
        });

        \$(document).ready(function () {

            \$('[data-fancybox=\"gallery\"]').fancybox({
                // Options will go here
            });

        });

    </script>
{% endblock %}
", "AdminBundle:Package:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Package/index.html.twig");
    }
}
