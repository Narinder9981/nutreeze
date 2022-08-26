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

/* AdminBundle:Contactus:settings.html.twig */
class __TwigTemplate_6cfd5c838e5eda7b4ad30f3d2c4eeea2da3819b4aa5f906daa6b2751165043f8 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Contactus:settings.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Contactus:settings.html.twig", 1);
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
            Contact Settings
            <small></small>
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 16
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 18
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 22
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 24
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">

                    <!-- box header -->
                    <div class=\"box-header with-border\">
                      ";
        // line 35
        echo "                    </div>
                    <!-- end: box header -->

                    <div class=\"box-body\">
                        <form class=\"form-horizontal\" method=\"post\" action=\"";
        // line 39
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_contactus_savesettings");
        echo "\" enctype=\"multipart/form-data\">
                        <div class=\"row\">
                            <div class=\"col-md-2\"><label>FaceBook</label></div>
                            <div class=\"col-md-3\">
                                <input type=\"text\" name=\"facebook\" class=\"form-control\" value=\"";
        // line 43
        if (((isset($context["contactSettingsData"]) || array_key_exists("contactSettingsData", $context)) &&  !twig_test_empty(($context["contactSettingsData"] ?? $this->getContext($context, "contactSettingsData"))))) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["contactSettingsData"] ?? $this->getContext($context, "contactSettingsData")), "facebook_link", []), "html", null, true);
            echo " ";
        }
        echo "\">
                            </div>
                            <div class=\"col-md-2\"><label>Twiiter</label></div>
                            <div class=\"col-md-3\"><input type=\"text\" name=\"twitter\" class=\"form-control\" value=\"";
        // line 46
        if (((isset($context["contactSettingsData"]) || array_key_exists("contactSettingsData", $context)) &&  !twig_test_empty(($context["contactSettingsData"] ?? $this->getContext($context, "contactSettingsData"))))) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["contactSettingsData"] ?? $this->getContext($context, "contactSettingsData")), "twitter_link", []), "html", null, true);
            echo " ";
        }
        echo "\"></div>
                            
                        </div><br>
                        <div class=\"row\">
                            <div class=\"col-md-2\"><label>Google</label></div>
                            <div class=\"col-md-3\"><input type=\"text\" name=\"google\" class=\"form-control\" value=\"";
        // line 51
        if (((isset($context["contactSettingsData"]) || array_key_exists("contactSettingsData", $context)) &&  !twig_test_empty(($context["contactSettingsData"] ?? $this->getContext($context, "contactSettingsData"))))) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["contactSettingsData"] ?? $this->getContext($context, "contactSettingsData")), "google_link", []), "html", null, true);
            echo " ";
        }
        echo "\"></div>
                            <div class=\"col-md-2\"><label>LinkedIn</label></div>
                            <div class=\"col-md-3\"><input type=\"text\" name=\"linkedin\" class=\"form-control\" value=\"";
        // line 53
        if (((isset($context["contactSettingsData"]) || array_key_exists("contactSettingsData", $context)) &&  !twig_test_empty(($context["contactSettingsData"] ?? $this->getContext($context, "contactSettingsData"))))) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["contactSettingsData"] ?? $this->getContext($context, "contactSettingsData")), "linkedin_link", []), "html", null, true);
            echo " ";
        }
        echo "\"> </div>
                            
                        </div><br>
                        <div class=\"row\">
                             <div class=\"col-md-2\"><label>Whatsapp</label></div>
                            <div class=\"col-md-3\"><input type=\"text\" name=\"whatsapp\" class=\"form-control\" value=\"";
        // line 58
        if (((isset($context["contactSettingsData"]) || array_key_exists("contactSettingsData", $context)) &&  !twig_test_empty(($context["contactSettingsData"] ?? $this->getContext($context, "contactSettingsData"))))) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["contactSettingsData"] ?? $this->getContext($context, "contactSettingsData")), "whatsapp_link", []), "html", null, true);
            echo " ";
        }
        echo "\"></div>
                            <div class=\"col-md-2\"><label>Whatsapp Number</label></div>
                            <div class=\"col-md-3\"><input type=\"text\" name=\"whatsappnumber\" class=\"form-control\" value=\"";
        // line 60
        if (((isset($context["contactSettingsData"]) || array_key_exists("contactSettingsData", $context)) &&  !twig_test_empty(($context["contactSettingsData"] ?? $this->getContext($context, "contactSettingsData"))))) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["contactSettingsData"] ?? $this->getContext($context, "contactSettingsData")), "whatsapp_number", []), "html", null, true);
            echo " ";
        }
        echo "\"></div>
                        </div><br>
                        <div class=\"row\">
                             
                            <div class=\"col-md-3\"><input type=\"submit\" class=\"btn btn-info btn-sm\" value=\"Save Settings\"/></div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>\t\t
    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 78
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 79
        echo "    <script>
        \$(document).ready(function () {
            \$('#datatable').DataTable();
        });
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Contactus:settings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 79,  206 => 78,  178 => 60,  169 => 58,  157 => 53,  148 => 51,  136 => 46,  126 => 43,  119 => 39,  113 => 35,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
            Contact Settings
            <small></small>
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
                      {#  <h3 class=\"box-title\"> Contact Settings</h3>#}
                    </div>
                    <!-- end: box header -->

                    <div class=\"box-body\">
                        <form class=\"form-horizontal\" method=\"post\" action=\"{{path('admin_contactus_savesettings')}}\" enctype=\"multipart/form-data\">
                        <div class=\"row\">
                            <div class=\"col-md-2\"><label>FaceBook</label></div>
                            <div class=\"col-md-3\">
                                <input type=\"text\" name=\"facebook\" class=\"form-control\" value=\"{%if  contactSettingsData is defined and contactSettingsData is not empty %} {{contactSettingsData.facebook_link}} {%endif%}\">
                            </div>
                            <div class=\"col-md-2\"><label>Twiiter</label></div>
                            <div class=\"col-md-3\"><input type=\"text\" name=\"twitter\" class=\"form-control\" value=\"{%if  contactSettingsData is defined and contactSettingsData is not empty %} {{contactSettingsData.twitter_link}} {%endif%}\"></div>
                            
                        </div><br>
                        <div class=\"row\">
                            <div class=\"col-md-2\"><label>Google</label></div>
                            <div class=\"col-md-3\"><input type=\"text\" name=\"google\" class=\"form-control\" value=\"{%if  contactSettingsData is defined and contactSettingsData is not empty %} {{contactSettingsData.google_link}} {%endif%}\"></div>
                            <div class=\"col-md-2\"><label>LinkedIn</label></div>
                            <div class=\"col-md-3\"><input type=\"text\" name=\"linkedin\" class=\"form-control\" value=\"{%if  contactSettingsData is defined and contactSettingsData is not empty %} {{contactSettingsData.linkedin_link}} {%endif%}\"> </div>
                            
                        </div><br>
                        <div class=\"row\">
                             <div class=\"col-md-2\"><label>Whatsapp</label></div>
                            <div class=\"col-md-3\"><input type=\"text\" name=\"whatsapp\" class=\"form-control\" value=\"{%if  contactSettingsData is defined and contactSettingsData is not empty %} {{contactSettingsData.whatsapp_link}} {%endif%}\"></div>
                            <div class=\"col-md-2\"><label>Whatsapp Number</label></div>
                            <div class=\"col-md-3\"><input type=\"text\" name=\"whatsappnumber\" class=\"form-control\" value=\"{%if  contactSettingsData is defined and contactSettingsData is not empty %} {{contactSettingsData.whatsapp_number}} {%endif%}\"></div>
                        </div><br>
                        <div class=\"row\">
                             
                            <div class=\"col-md-3\"><input type=\"submit\" class=\"btn btn-info btn-sm\" value=\"Save Settings\"/></div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>\t\t
    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

{% endblock %}

{% block js %}
    <script>
        \$(document).ready(function () {
            \$('#datatable').DataTable();
        });
    </script>
{% endblock %}", "AdminBundle:Contactus:settings.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Contactus/settings.html.twig");
    }
}
