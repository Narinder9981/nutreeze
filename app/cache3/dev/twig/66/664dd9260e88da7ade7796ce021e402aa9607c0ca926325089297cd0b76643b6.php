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

/* AdminBundle:Ordernote:addordernote.html.twig */
class __TwigTemplate_7247612393fb3c4e6b4262259dc775d002534ce66401719b0d4382213c9b1e98 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Ordernote:addordernote.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Ordernote:addordernote.html.twig", 1);
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
            Add Order notes
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
                <div class=\"box box-primary\">

                    <!-- box header -->
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update Meal Types</h3>
                        <a href=\"";
        // line 34
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_mealtypes_index");
        echo "\" class=\"btn btn-primary btn-flat pull-right\">Back</a>

                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                        ";
        // line 41
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 42
            echo "                            <div class=\"nav-tabs-custom\">
                                <ul class=\"nav nav-tabs\">
                                    ";
            // line 44
            if ((isset($context["language_list"]) || array_key_exists("language_list", $context))) {
                // line 45
                echo "                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
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
                foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                    // line 46
                    echo "                                            <li class=\"";
                    if ((isset($context["selected"]) || array_key_exists("selected", $context))) {
                        if ((($context["selected"] ?? $this->getContext($context, "selected")) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            echo "active";
                        }
                    } else {
                        if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                            echo "active";
                        }
                    }
                    echo "\">
                                                <a href=\"#lan_";
                    // line 47
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                    echo "\" data-toggle=\"tab\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                    echo "</a>
                                            </li>
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 50
                echo "                                    ";
            }
            // line 51
            echo "                                </ul>
                            </div>

                            <!-- tab-content -->
                           
                            <div class=\"tab-content\">
                                ";
            // line 57
            $context["main_order_note_id"] = 0;
            // line 58
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 59
                echo "                                    <div role=\"tabpanel\" class=\"tab-pane ";
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">

                                        ";
                // line 61
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_ordernote_saveordernote");
                // line 62
                echo "
                                        ";
                // line 63
                $context["order_note_text"] = "";
                // line 64
                echo "                                        
                                        ";
                // line 65
                if (((isset($context["ordernote"]) || array_key_exists("ordernote", $context)) &&  !twig_test_empty(($context["ordernote"] ?? $this->getContext($context, "ordernote"))))) {
                    // line 66
                    echo "
                                            ";
                    // line 67
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["ordernote"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["ordernote"]) {
                        // line 68
                        echo "                                                ";
                        if (($this->getAttribute($context["ordernote"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 69
                            echo "
                                                    ";
                            // line 70
                            $context["main_order_note_id"] = $this->getAttribute($context["ordernote"], "main_order_note_id", []);
                            // line 71
                            echo "                                                    ";
                            $context["order_note_text"] = $this->getAttribute($context["ordernote"], "order_note_text", []);
                            // line 72
                            echo "                                                   
                                                ";
                        }
                        // line 74
                        echo "                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ordernote'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 75
                    echo "                                        ";
                }
                // line 76
                echo "
                                        <form id=\"form-";
                // line 77
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" class=\"form-horizontal\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\" enctype=\"multipart/form-data\">

                                            <input type=\"hidden\" name=\"main_order_note_id\" value=\"";
                // line 79
                echo twig_escape_filter($this->env, ($context["main_order_note_id"] ?? $this->getContext($context, "main_order_note_id")), "html", null, true);
                echo "\">
                                            <input type=\"hidden\" name=\"language_id\" value=\"";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">

                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Order note</label>
                                                    </div>
                                                    <div class=\"col-lg-10\">
                                                        <input type=\"text\" class=\"form-control\" id=\"order_note_text";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"order_note_text\" value=\"";
                echo twig_escape_filter($this->env, ($context["order_note_text"] ?? $this->getContext($context, "order_note_text")), "html", null, true);
                echo "\" required>
                                                    </div>
                                                </div>
                                            </div>\t
                                            </br>\t
                                            
                                           

                                            <div class=\"row paddTop\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-6\">
                                                        <button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\">
                                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;Submit</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 110
            echo "
                            </div>
                            <!-- end: tab-content -->

                        ";
        }
        // line 115
        echo "
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

    public function getTemplateName()
    {
        return "AdminBundle:Ordernote:addordernote.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  334 => 115,  327 => 110,  289 => 88,  278 => 80,  274 => 79,  267 => 77,  264 => 76,  261 => 75,  255 => 74,  251 => 72,  248 => 71,  246 => 70,  243 => 69,  240 => 68,  236 => 67,  233 => 66,  231 => 65,  228 => 64,  226 => 63,  223 => 62,  221 => 61,  211 => 59,  193 => 58,  191 => 57,  183 => 51,  180 => 50,  161 => 47,  148 => 46,  130 => 45,  128 => 44,  124 => 42,  122 => 41,  112 => 34,  102 => 26,  93 => 23,  89 => 21,  84 => 20,  75 => 17,  71 => 15,  67 => 14,  60 => 10,  51 => 3,  45 => 2,  29 => 1,);
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
            Add Order notes
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

                    <!-- box header -->
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update Meal Types</h3>
                        <a href=\"{{ path('admin_mealtypes_index') }}\" class=\"btn btn-primary btn-flat pull-right\">Back</a>

                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                        {% if language_list is defined  and language_list is not empty%}
                            <div class=\"nav-tabs-custom\">
                                <ul class=\"nav nav-tabs\">
                                    {% if language_list is defined %}
                                        {% for language in language_list %}
                                            <li class=\"{% if selected is defined %}{% if selected == language.language_master_id%}active{% endif %}{% else %}{% if loop.index == 1 %}active{% endif %}{% endif %}\">
                                                <a href=\"#lan_{{loop.index}}\" data-toggle=\"tab\">{{language.language_name}}</a>
                                            </li>
                                        {% endfor %}
                                    {% endif %}
                                </ul>
                            </div>

                            <!-- tab-content -->
                           
                            <div class=\"tab-content\">
                                {% set main_order_note_id = 0 %}
                                {% for language in language_list %}
                                    <div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\">

                                        {% set action = path('admin_ordernote_saveordernote') %}

                                        {% set order_note_text = '' %}
                                        
                                        {% if ordernote is defined and ordernote is not empty %}

                                            {% for ordernote in ordernote %}
                                                {% if ordernote.language_id == language.language_master_id %}

                                                    {% set main_order_note_id = ordernote.main_order_note_id %}
                                                    {% set order_note_text = ordernote.order_note_text %}
                                                   
                                                {% endif %}
                                            {% endfor %}
                                        {% endif %}

                                        <form id=\"form-{{ language.language_master_id }}\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">

                                            <input type=\"hidden\" name=\"main_order_note_id\" value=\"{{ main_order_note_id }}\">
                                            <input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">

                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Order note</label>
                                                    </div>
                                                    <div class=\"col-lg-10\">
                                                        <input type=\"text\" class=\"form-control\" id=\"order_note_text{{language.language_master_id}}\" name=\"order_note_text\" value=\"{{order_note_text}}\" required>
                                                    </div>
                                                </div>
                                            </div>\t
                                            </br>\t
                                            
                                           

                                            <div class=\"row paddTop\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-6\">
                                                        <button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\">
                                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;Submit</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                {% endfor %}

                            </div>
                            <!-- end: tab-content -->

                        {% endif %}

                    </div>

                </div>
            </div>
        </div>

    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

{% endblock %}
", "AdminBundle:Ordernote:addordernote.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Ordernote/addordernote.html.twig");
    }
}
