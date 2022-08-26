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

/* AdminBundle:Uservideo:addtutorialVideo.html.twig */
class __TwigTemplate_38519bd200325b409083a87f41a782549cbea254c144124480dbc8147051b440 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'css' => [$this, 'block_css'],
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Uservideo:addtutorialVideo.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Uservideo:addtutorialVideo.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 3
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "select2/select2.min.css\" rel=\"stylesheet\" type=\"text/css\" />
    <style>
        .select2-selection__choice{
            color: #000 !important;
        }
    </style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 11
        echo "    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Add Video Tutorial
            <small></small>
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 24
            echo "            <div class=\"alert alert-success alert-dismissable\">
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
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 30
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 32
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">\t\t\t\t\t

                    <div class=\"box-body\">



                        
                        ";
        // line 45
        $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_savetutorialvideo");
        // line 46
        echo "                        ";
        $context["main_video_master_id"] = 0;
        // line 47
        echo "                        ";
        $context["video_title"] = "";
        // line 48
        echo "                        ";
        $context["video_id"] = "";
        // line 49
        echo "                        ";
        $context["video_link"] = "";
        // line 50
        echo "                        ";
        if (((isset($context["tutorial_video"]) || array_key_exists("tutorial_video", $context)) &&  !twig_test_empty(($context["tutorial_video"] ?? $this->getContext($context, "tutorial_video"))))) {
            // line 51
            echo "                            ";
            $context["main_video_master_id"] = $this->getAttribute(($context["tutorial_video"] ?? $this->getContext($context, "tutorial_video")), "main_video_tutorial_id", []);
            // line 52
            echo "                            ";
            $context["video_title"] = $this->getAttribute(($context["tutorial_video"] ?? $this->getContext($context, "tutorial_video")), "video_title", []);
            // line 53
            echo "                            ";
            $context["video_id"] = $this->getAttribute(($context["tutorial_video"] ?? $this->getContext($context, "tutorial_video")), "video_id", []);
            // line 54
            echo "                            ";
            $context["video_link"] = $this->getAttribute(($context["tutorial_video"] ?? $this->getContext($context, "tutorial_video")), "video_link", []);
            // line 55
            echo "                        ";
        }
        // line 56
        echo "                        
                        <form  class=\"form-horizontal\" method=\"post\" action=\"";
        // line 57
        echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
        echo "\" enctype=\"multipart/form-data\">

                            <input type=\"hidden\" name=\"main_video_master_id\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, ($context["main_video_master_id"] ?? $this->getContext($context, "main_video_master_id")), "html", null, true);
        echo "\">


                            
                            </br>\t
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <div class=\"col-md-2\">
                                        <label>Video Title </br></label>
                                    </div>
                                    <div class=\"col-md-10\">
                                        <input type='text' class=\"form-control\" placeholder=\"Enter Video title\" name=\"video_title\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, ($context["video_title"] ?? $this->getContext($context, "video_title")), "html", null, true);
        echo "\" required=\"required\"/>
                                    </div>
                                </div>
                            </div>
                            </br>


                            

                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <div class=\"col-md-2\">
                                        <label>YouTube Video Id </br></label>
                                    </div>
                                    <div class=\"col-md-10\">
                                        <input type='text' class=\"form-control\" name=\"video_id\" required=\"required\" placeholder=\"Enter YouTube Video ID from link\" value=\"";
        // line 85
        echo twig_escape_filter($this->env, ($context["video_id"] ?? $this->getContext($context, "video_id")), "html", null, true);
        echo "\"/>
                                    </div>
                                </div>
                            </div>
                            </br>
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <div class=\"col-md-2\">
                                        <label>YouTube Video Link </br></label>
                                    </div>
                                    <div class=\"col-md-10\">
                                        <input type='text' class=\"form-control\" name=\"video_link\" required=\"required\" value=\"";
        // line 96
        echo twig_escape_filter($this->env, ($context["video_link"] ?? $this->getContext($context, "video_link")), "html", null, true);
        echo "\"  placeholder=\"Enter YouTube Video Link\"/>
                                    </div>
                                </div>
                            </div>
                            </br>



                            <div class=\"row paddTop\">
                                <div class=\"col-md-12\">
                                    <div class=\"col-md-6\">
                                        <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"submit\">
                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;Save
                                            </span>
                                        </button>

                                        <a href=\"";
        // line 112
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_tutorialvideolist");
        echo "\" > <button type=\"button\" name=\"cancel\" class=\"btn btn-default\" value=\"Cancel\">
                                            <span><i class=\"fa fa-close\"></i>&nbsp;Cancel
                                            </span>
                                        </button> </a>
                                    </div>
                                </div>
                            </div>

                        </form>




                    </div>
                    <!-- end: tab-content -->


                </div>
            </div>
        </div>

    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 139
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 140
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>
    <script src=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "select2/select2.min.js\"></script>

    <script>
        \$(function () {
            \$('.editor1cls').each(function (e) {
                CKEDITOR.replace(this.id);
            });
        });

        \$(document).ready(function () {

            \$('[data-fancybox=\"gallery\"]').fancybox({
                // Options will go here
            });

            \$('.user-multi-select').select2();
            \$('.pk-multi-select').select2();

        });

    </script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Uservideo:addtutorialVideo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  287 => 141,  282 => 140,  276 => 139,  243 => 112,  224 => 96,  210 => 85,  192 => 70,  178 => 59,  173 => 57,  170 => 56,  167 => 55,  164 => 54,  161 => 53,  158 => 52,  155 => 51,  152 => 50,  149 => 49,  146 => 48,  143 => 47,  140 => 46,  138 => 45,  126 => 35,  117 => 32,  113 => 30,  108 => 29,  99 => 26,  95 => 24,  91 => 23,  84 => 19,  74 => 11,  68 => 10,  53 => 3,  47 => 2,  31 => 1,);
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
{% block css %}
    <link href=\"{{asset('bundles/design/plugins/')}}select2/select2.min.css\" rel=\"stylesheet\" type=\"text/css\" />
    <style>
        .select2-selection__choice{
            color: #000 !important;
        }
    </style>
{% endblock %}
{% block content %}
    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Add Video Tutorial
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
                <div class=\"box box-primary\">\t\t\t\t\t

                    <div class=\"box-body\">



                        
                        {% set action = path('admin_uservideo_savetutorialvideo') %}
                        {% set main_video_master_id = 0 %}
                        {% set video_title = '' %}
                        {% set video_id = '' %}
                        {% set video_link = '' %}
                        {%if tutorial_video is defined and tutorial_video is not empty %}
                            {%set main_video_master_id = tutorial_video.main_video_tutorial_id %}
                            {%set video_title = tutorial_video.video_title %}
                            {%set video_id = tutorial_video.video_id %}
                            {%set video_link = tutorial_video.video_link %}
                        {%endif%}
                        
                        <form  class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">

                            <input type=\"hidden\" name=\"main_video_master_id\" value=\"{{ main_video_master_id }}\">


                            
                            </br>\t
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <div class=\"col-md-2\">
                                        <label>Video Title </br></label>
                                    </div>
                                    <div class=\"col-md-10\">
                                        <input type='text' class=\"form-control\" placeholder=\"Enter Video title\" name=\"video_title\" value=\"{{video_title}}\" required=\"required\"/>
                                    </div>
                                </div>
                            </div>
                            </br>


                            

                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <div class=\"col-md-2\">
                                        <label>YouTube Video Id </br></label>
                                    </div>
                                    <div class=\"col-md-10\">
                                        <input type='text' class=\"form-control\" name=\"video_id\" required=\"required\" placeholder=\"Enter YouTube Video ID from link\" value=\"{{video_id}}\"/>
                                    </div>
                                </div>
                            </div>
                            </br>
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <div class=\"col-md-2\">
                                        <label>YouTube Video Link </br></label>
                                    </div>
                                    <div class=\"col-md-10\">
                                        <input type='text' class=\"form-control\" name=\"video_link\" required=\"required\" value=\"{{video_link}}\"  placeholder=\"Enter YouTube Video Link\"/>
                                    </div>
                                </div>
                            </div>
                            </br>



                            <div class=\"row paddTop\">
                                <div class=\"col-md-12\">
                                    <div class=\"col-md-6\">
                                        <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"submit\">
                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;Save
                                            </span>
                                        </button>

                                        <a href=\"{{path('admin_uservideo_tutorialvideolist')}}\" > <button type=\"button\" name=\"cancel\" class=\"btn btn-default\" value=\"Cancel\">
                                            <span><i class=\"fa fa-close\"></i>&nbsp;Cancel
                                            </span>
                                        </button> </a>
                                    </div>
                                </div>
                            </div>

                        </form>




                    </div>
                    <!-- end: tab-content -->


                </div>
            </div>
        </div>

    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

{% endblock %}

{% block js%}
    <script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>
    <script src=\"{{asset('bundles/design/plugins/')}}select2/select2.min.js\"></script>

    <script>
        \$(function () {
            \$('.editor1cls').each(function (e) {
                CKEDITOR.replace(this.id);
            });
        });

        \$(document).ready(function () {

            \$('[data-fancybox=\"gallery\"]').fancybox({
                // Options will go here
            });

            \$('.user-multi-select').select2();
            \$('.pk-multi-select').select2();

        });

    </script>\t
{% endblock %}", "AdminBundle:Uservideo:addtutorialVideo.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Uservideo/addtutorialVideo.html.twig");
    }
}
