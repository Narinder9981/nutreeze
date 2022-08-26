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

/* AdminBundle:Schedule:addSchedule.html.twig */
class __TwigTemplate_42ec0e205727f6a614da5159fe6f87ab7f4974e525a7cef51a25c2b17abbeda0 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Schedule:addSchedule.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Schedule:addSchedule.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 4
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "select2/select2.min.css\" rel=\"stylesheet\" type=\"text/css\" />
<style>
.select2-selection__choice{
\tcolor: #000 !important;
}
</style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 12
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 13
        echo "\t<section class=\"content-header\">
\t<!-------- PAGE TITLE --------------->
\t\t<h1>
\t\t  Add User Schedule
\t\t  <small></small>
\t\t</h1>
\t<!------- BREADCUMB --------------------->
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 26
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 28
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 32
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 34
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div class=\"box box-primary\">
\t\t\t\t\t
\t\t\t\t\t<!-- box header -->
\t\t\t\t\t<div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update User Schedule</h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t";
        // line 50
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 51
            echo "\t\t\t\t\t\t<div class=\"nav-tabs-custom\">
                            <ul class=\"nav nav-tabs\">
                                ";
            // line 53
            if ((isset($context["language_list"]) || array_key_exists("language_list", $context))) {
                // line 54
                echo "                                   ";
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
                    // line 55
                    echo "                                        <li class=\"";
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
                    // line 56
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
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
                // line 59
                echo "                                ";
            }
            // line 60
            echo "                            </ul>
                        </div>
\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t";
            // line 65
            $context["main_schedule_id"] = 0;
            // line 66
            echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
            // line 67
            $context["media_type"] = "video";
            // line 68
            echo "\t\t\t\t\t\t";
            $context["package_id"] = 0;
            // line 69
            echo "\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            // line 70
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
                echo " 
\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane ";
                // line 71
                if (($this->getAttribute($context["loop"], "first", []) == true)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 73
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_schedule_saveschedule");
                // line 74
                echo "\t\t\t\t\t\t\t\t\t";
                $context["img_url"] = "";
                // line 75
                echo "\t\t\t\t\t\t\t\t\t";
                $context["hidden_media_id"] = "";
                // line 76
                echo "\t\t\t\t\t\t\t\t\t";
                if (((isset($context["video_master"]) || array_key_exists("video_master", $context)) &&  !twig_test_empty(($context["video_master"] ?? $this->getContext($context, "video_master"))))) {
                    // line 77
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["video_master"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["video_master"]) {
                        // line 78
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["video_master"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 79
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["main_schedule_id"] = $this->getAttribute($context["video_master"], "main_schedule_id", []);
                            // line 80
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["img_url"] = $this->getAttribute($context["video_master"], "media_url", []);
                            // line 81
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["package_id"] = $this->getAttribute($context["video_master"], "main_package_id", []);
                            // line 82
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["hidden_media_id"] = $this->getAttribute($context["video_master"], "media_id", []);
                            // line 83
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 84
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video_master'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 85
                    echo "\t\t\t\t\t\t\t\t\t";
                }
                // line 86
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form  class=\"form-horizontal ";
                // line 87
                echo twig_escape_filter($this->env, ($context["img_url"] ?? $this->getContext($context, "img_url")), "html", null, true);
                echo "\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_schedule_id\" value=\"";
                // line 89
                echo twig_escape_filter($this->env, ($context["main_schedule_id"] ?? $this->getContext($context, "main_schedule_id")), "html", null, true);
                echo "\">

\t\t\t\t\t\t\t\t\t\t";
                // line 91
                if (((((isset($context["schedule_id"]) || array_key_exists("schedule_id", $context)) &&  !twig_test_empty(($context["schedule_id"] ?? $this->getContext($context, "schedule_id")))) && (($context["schedule_id"] ?? $this->getContext($context, "schedule_id")) != 0)) && (($context["hidden_media_id"] ?? $this->getContext($context, "hidden_media_id")) != ""))) {
                    // line 92
                    echo "\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"hidden_media_id\" value=\"";
                    echo twig_escape_filter($this->env, ($context["hidden_media_id"] ?? $this->getContext($context, "hidden_media_id")), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 94
                echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<!-- assign user to schedule dirrectly -->
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"user_id\" value=\"";
                // line 96
                echo twig_escape_filter($this->env, ($context["user_id"] ?? $this->getContext($context, "user_id")), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"";
                // line 98
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>

\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Select Users</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select class=\"user-multi-select form-control\" name=\"user_selected[]\" multiple=\"multiple\" ";
                // line 108
                if ((($context["user_id"] ?? $this->getContext($context, "user_id")) != 0)) {
                    echo "disabled=\"disabled\"";
                }
                echo ">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Users</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 110
                if (((isset($context["users"]) || array_key_exists("users", $context)) &&  !twig_test_empty(($context["users"] ?? $this->getContext($context, "users"))))) {
                    // line 111
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["users"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["users"]) {
                        // line 112
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["users"], "user_master_id", []), "html", null, true);
                        echo "\" ";
                        if (((isset($context["user_id"]) || array_key_exists("user_id", $context)) && (($context["user_id"] ?? $this->getContext($context, "user_id")) == $this->getAttribute($context["users"], "user_master_id", [])))) {
                            echo " selected ";
                        }
                        echo "  ";
                        if (twig_in_filter($this->getAttribute($context["users"], "user_master_id", []), ($context["user_selected"] ?? $this->getContext($context, "user_selected")))) {
                            echo " selected ";
                        }
                        echo "> ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["users"], "user_firstname", []), "html", null, true);
                        echo " </option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['users'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 114
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 115
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>

\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Select Package</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"main_package_master_id\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Package</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 129
                if (((isset($context["main_packages"]) || array_key_exists("main_packages", $context)) &&  !twig_test_empty(($context["main_packages"] ?? $this->getContext($context, "main_packages"))))) {
                    // line 130
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["main_packages"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["main_packages"]) {
                        // line 131
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["main_packages"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 132
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["main_packages"], "main_package_master_id", []), "html", null, true);
                            echo "\" ";
                            if (($this->getAttribute($context["main_packages"], "main_package_master_id", []) == ($context["package_id"] ?? $this->getContext($context, "package_id")))) {
                                echo " selected";
                            }
                            echo ">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 133
                            echo twig_escape_filter($this->env, $this->getAttribute($context["main_packages"], "package_name", []), "html", null, true);
                            echo "\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 135
                        echo "\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['main_packages'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 137
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 138
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Upload Schedule Doc </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='file' accept=\".doc,.pdf,.xls,.txt\" class=\"form-control goal_img";
                // line 150
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"gallery\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                // line 156
                if (((isset($context["img_url"]) || array_key_exists("img_url", $context)) && (($context["img_url"] ?? $this->getContext($context, "img_url")) != ""))) {
                    // line 157
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$('.goal_img";
                    // line 159
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                    echo "').removeAttr('required');
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-2\">
\t\t\t\t\t\t\t\t\t\t\t<b><a href=\"";
                    // line 162
                    echo twig_escape_filter($this->env, ($context["img_url"] ?? $this->getContext($context, "img_url")), "html", null, true);
                    echo "\" target=\"_blank\">View Schedule</a></b></br>\t
\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 165
                echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"submit\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 172
                if (((isset($context["gallery"]) || array_key_exists("gallery", $context)) &&  !twig_test_empty(($context["gallery"] ?? $this->getContext($context, "gallery"))))) {
                    echo "Update";
                } else {
                    echo "Save";
                }
                echo "\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
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
            // line 183
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t";
        }
        // line 188
        echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t</section>
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 201
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 202
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>
<script src=\"";
        // line 203
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "select2/select2.min.js\"></script>
<script>\t
\t\$(function () {
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t});
\t
\t\$(document).ready(function(){

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t\t\$('.user-multi-select').select2();
\t});\t
\t
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Schedule:addSchedule.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  541 => 203,  536 => 202,  530 => 201,  512 => 188,  505 => 183,  476 => 172,  467 => 165,  460 => 162,  454 => 159,  450 => 157,  448 => 156,  439 => 150,  425 => 138,  422 => 137,  415 => 135,  409 => 133,  400 => 132,  397 => 131,  392 => 130,  390 => 129,  374 => 115,  371 => 114,  352 => 112,  347 => 111,  345 => 110,  338 => 108,  325 => 98,  320 => 96,  316 => 94,  310 => 92,  308 => 91,  303 => 89,  296 => 87,  293 => 86,  290 => 85,  284 => 84,  281 => 83,  278 => 82,  275 => 81,  272 => 80,  269 => 79,  266 => 78,  261 => 77,  258 => 76,  255 => 75,  252 => 74,  250 => 73,  241 => 71,  222 => 70,  219 => 69,  216 => 68,  214 => 67,  211 => 66,  209 => 65,  202 => 60,  199 => 59,  180 => 56,  167 => 55,  149 => 54,  147 => 53,  143 => 51,  141 => 50,  126 => 37,  117 => 34,  113 => 32,  108 => 31,  99 => 28,  95 => 26,  91 => 25,  84 => 21,  74 => 13,  68 => 12,  53 => 4,  47 => 3,  31 => 1,);
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
\tcolor: #000 !important;
}
</style>
{% endblock %}

{% block content %}
\t<section class=\"content-header\">
\t<!-------- PAGE TITLE --------------->
\t\t<h1>
\t\t  Add User Schedule
\t\t  <small></small>
\t\t</h1>
\t<!------- BREADCUMB --------------------->
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"{{path('admin_dashboard_index',{'domain':app.session.get('domain')})}}\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t{% for flashMessage in app.session.flashbag.get('success_msg') %}
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
\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div class=\"box box-primary\">
\t\t\t\t\t
\t\t\t\t\t<!-- box header -->
\t\t\t\t\t<div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update User Schedule</h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t{% if language_list is defined  and language_list is not empty%}
\t\t\t\t\t\t<div class=\"nav-tabs-custom\">
                            <ul class=\"nav nav-tabs\">
                                {% if language_list is defined %}
                                   {% for language in language_list %}
                                        <li class=\"{% if selected is defined %}{% if selected == language.language_master_id%}active{% endif %}{% else %}{% if loop.index == 1 %}active{% endif %}{% endif %}\">
                                            <a href=\"#lan_{{language.language_master_id}}\" data-toggle=\"tab\">{{language.language_name}}</a>
                                        </li>
                                    {% endfor %}
                                {% endif %}
                            </ul>
                        </div>
\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t{% set main_schedule_id = 0 %}
\t\t\t\t\t\t
\t\t\t\t\t\t{% set media_type = 'video' %}
\t\t\t\t\t\t{% set package_id = 0 %}
\t\t\t\t\t\t
\t\t\t\t\t\t\t{% for language in language_list %} 
\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane {%if loop.first == true %}active{%endif%}\" id=\"lan_{{language.language_master_id}}\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% set action = path('admin_schedule_saveschedule') %}
\t\t\t\t\t\t\t\t\t{% set img_url = '' %}
\t\t\t\t\t\t\t\t\t{% set hidden_media_id = '' %}
\t\t\t\t\t\t\t\t\t{% if video_master is defined and video_master is not empty %}
\t\t\t\t\t\t\t\t\t\t{% for video_master in video_master %}
\t\t\t\t\t\t\t\t\t\t\t{%if video_master.language_id  == language.language_master_id%}
\t\t\t\t\t\t\t\t\t\t\t\t{% set main_schedule_id = video_master.main_schedule_id %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set img_url = video_master.media_url %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set package_id = video_master.main_package_id %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set hidden_media_id = video_master.media_id %}
\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form  class=\"form-horizontal {{img_url}}\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_schedule_id\" value=\"{{ main_schedule_id }}\">

\t\t\t\t\t\t\t\t\t\t{% if schedule_id is defined and schedule_id is not empty and schedule_id != 0 and hidden_media_id != '' %}
\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"hidden_media_id\" value=\"{{ hidden_media_id }}\">
\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<!-- assign user to schedule dirrectly -->
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"user_id\" value=\"{{ user_id }}\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>

\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Select Users</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select class=\"user-multi-select form-control\" name=\"user_selected[]\" multiple=\"multiple\" {% if user_id != 0 %}disabled=\"disabled\"{% endif %}>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Users</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if users is defined and users is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%for users in users%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{users.user_master_id}}\" {% if user_id is defined and user_id == users.user_master_id %} selected {% endif  %}  {% if users.user_master_id in user_selected %} selected {% endif %}> {{users.user_firstname}} </option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>

\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Select Package</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"main_package_master_id\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Package</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if main_packages is defined and main_packages is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%for main_packages in main_packages%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if main_packages.language_id == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{main_packages.main_package_master_id}}\" {%if main_packages.main_package_master_id == package_id%} selected{%endif%}>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{main_packages.package_name}}\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Upload Schedule Doc </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='file' accept=\".doc,.pdf,.xls,.txt\" class=\"form-control goal_img{{language.language_master_id}}\" name=\"gallery\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{%if img_url is defined and img_url != ''%}
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$('.goal_img{{language.language_master_id}}').removeAttr('required');
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-2\">
\t\t\t\t\t\t\t\t\t\t\t<b><a href=\"{{img_url}}\" target=\"_blank\">View Schedule</a></b></br>\t
\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{%endif%}\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"submit\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if gallery is defined and gallery is not empty %}Update{%else%}Save{%endif%}\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t</section>
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
{% endblock %}

{% block js%}
<script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>
<script src=\"{{asset('bundles/design/plugins/')}}select2/select2.min.js\"></script>
<script>\t
\t\$(function () {
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t});
\t
\t\$(document).ready(function(){

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t\t\$('.user-multi-select').select2();
\t});\t
\t
</script>\t
{% endblock %}", "AdminBundle:Schedule:addSchedule.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Schedule/addSchedule.html.twig");
    }
}
