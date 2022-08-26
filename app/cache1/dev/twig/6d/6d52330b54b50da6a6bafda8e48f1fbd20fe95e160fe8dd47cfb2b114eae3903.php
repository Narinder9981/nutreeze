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

/* AdminBundle:Uservideo:adduserVideo.html.twig */
class __TwigTemplate_3439b82e9929e1d4719581ecfae77aeaa8c5748e59e342faf13e708f8f252a60 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Uservideo:adduserVideo.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Uservideo:adduserVideo.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 3
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

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 11
        echo "\t<section class=\"content-header\">
\t<!-------- PAGE TITLE --------------->
\t\t<h1>
\t\t  Add User Video
\t\t  <small></small>
\t\t</h1>
\t<!------- BREADCUMB --------------------->
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t";
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
        echo "\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div class=\"box box-primary\">
\t\t\t\t\t
\t\t\t\t\t<!-- box header -->
\t\t\t\t\t<div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update User Video</h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t";
        // line 48
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 49
            echo "\t\t\t\t\t\t<div class=\"nav-tabs-custom\">
                            <ul class=\"nav nav-tabs\">
                                ";
            // line 51
            if ((isset($context["language_list"]) || array_key_exists("language_list", $context))) {
                // line 52
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
                    // line 53
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
                    // line 54
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
                // line 57
                echo "                                ";
            }
            // line 58
            echo "                            </ul>
                        </div>
\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t";
            // line 63
            $context["main_video_master_id"] = 0;
            // line 64
            echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
            // line 65
            $context["media_type"] = "video";
            // line 66
            echo "\t\t\t\t\t\t";
            $context["package_id"] = 0;
            // line 67
            echo "\t\t\t\t\t\t";
            $context["video_category_id"] = 0;
            // line 68
            echo "\t\t\t\t\t\t";
            $context["video_url"] = "";
            // line 69
            echo "\t\t\t\t\t\t";
            $context["title"] = "";
            // line 70
            echo "
\t\t\t\t\t\t\t";
            // line 71
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
                // line 72
                if (($this->getAttribute($context["loop"], "first", []) == true)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 74
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_saveuservideo");
                // line 75
                echo "\t\t\t\t\t\t\t\t\t";
                $context["img_url"] = "";
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
                            $context["main_video_master_id"] = $this->getAttribute($context["video_master"], "main_video_master_id", []);
                            // line 80
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["img_url"] = $this->getAttribute($context["video_master"], "media_url", []);
                            // line 81
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["video_category_id"] = $this->getAttribute($context["video_master"], "video_category", []);
                            // line 82
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["video_url"] = $this->getAttribute($context["video_master"], "thumb_url", []);
                            // line 83
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["title"] = $this->getAttribute($context["video_master"], "title", []);
                            // line 84
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["package_id"] = $this->getAttribute($context["video_master"], "main_package_id", []);
                            // line 85
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 86
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video_master'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 87
                    echo "\t\t\t\t\t\t\t\t\t";
                }
                // line 88
                echo "\t\t\t\t\t\t\t\t\t<form  class=\"form-horizontal\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_video_master_id\" value=\"";
                // line 90
                echo twig_escape_filter($this->env, ($context["main_video_master_id"] ?? $this->getContext($context, "main_video_master_id")), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_package_master_id\" value=\"0\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"user_id\" value=\"";
                // line 93
                echo twig_escape_filter($this->env, ($context["user_id"] ?? $this->getContext($context, "user_id")), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Select Package</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select multiple name=\"main_package_master_id[]\" class=\"form-control pk-multi-select\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Package</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 103
                if (((isset($context["main_packages"]) || array_key_exists("main_packages", $context)) &&  !twig_test_empty(($context["main_packages"] ?? $this->getContext($context, "main_packages"))))) {
                    // line 104
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["main_packages"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["main_packages"]) {
                        // line 105
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["main_packages"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 106
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["main_packages"], "main_package_master_id", []), "html", null, true);
                            echo "\" ";
                            if (twig_in_filter($this->getAttribute($context["main_packages"], "main_package_master_id", []), ($context["pk_selected"] ?? $this->getContext($context, "pk_selected")))) {
                                echo " selected";
                            }
                            echo ">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 107
                            echo twig_escape_filter($this->env, $this->getAttribute($context["main_packages"], "package_name", []), "html", null, true);
                            echo "\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 109
                        echo "\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['main_packages'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 111
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 112
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
";
                // line 140
                echo "\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Video Title </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' class=\"form-control\" name=\"title\" value=\"";
                // line 147
                echo twig_escape_filter($this->env, ($context["title"] ?? $this->getContext($context, "title")), "html", null, true);
                echo "\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>

\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Select Video  Category</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"video_category\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Video Category</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 161
                if (((isset($context["video_category"]) || array_key_exists("video_category", $context)) &&  !twig_test_empty(($context["video_category"] ?? $this->getContext($context, "video_category"))))) {
                    // line 162
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["video_category"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["video_category"]) {
                        // line 163
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["video_category"], "main_user_video_category_master_id", []), "html", null, true);
                        echo "\" ";
                        if (($this->getAttribute($context["video_category"], "main_user_video_category_master_id", []) == ($context["video_category_id"] ?? $this->getContext($context, "video_category_id")))) {
                            echo " selected";
                        }
                        echo ">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 164
                        echo twig_escape_filter($this->env, $this->getAttribute($context["video_category"], "lang_wise", []), "html", null, true);
                        echo "\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video_category'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 167
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 168
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t";
                // line 188
                echo "
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Upload Video </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='file' accept=\".mp4,.mov,.3gp\" class=\"form-control goal_img";
                // line 195
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"gallery\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                // line 201
                if (((isset($context["img_url"]) || array_key_exists("img_url", $context)) && (($context["img_url"] ?? $this->getContext($context, "img_url")) != ""))) {
                    // line 202
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$('.goal_img";
                    // line 204
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                    echo "').removeAttr('required');
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-2\">
\t\t\t\t\t\t\t\t\t\t\t<b>Type : ";
                    // line 207
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["media_type"] ?? $this->getContext($context, "media_type"))), "html", null, true);
                    echo "</b></br>\t
\t\t\t\t\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"";
                    // line 208
                    echo twig_escape_filter($this->env, ($context["img_url"] ?? $this->getContext($context, "img_url")), "html", null, true);
                    echo "\">\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 209
                    if ((($context["media_type"] ?? $this->getContext($context, "media_type")) == "img")) {
                        // line 210
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, ($context["img_url"] ?? $this->getContext($context, "img_url")), "html", null, true);
                        echo "\" style=\"height:100px;width:100px\" class=\"img-responsive img-thumbnail\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 212
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 213
                    if ((($context["media_type"] ?? $this->getContext($context, "media_type")) == "video")) {
                        // line 214
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<video width=\"100px\" height=\"100px\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t  <source src=\"";
                        // line 216
                        echo twig_escape_filter($this->env, ($context["img_url"] ?? $this->getContext($context, "img_url")), "html", null, true);
                        echo "\" type=\"video/mp4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t  <source src=\"";
                        // line 217
                        echo twig_escape_filter($this->env, ($context["img_url"] ?? $this->getContext($context, "img_url")), "html", null, true);
                        echo "\" type=\"video/ogg\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\tYour browser does not support the video tag.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</video>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 221
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t</a>\t
\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 225
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Upload Thumb Image </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='file' accept=\".mp4,.mov,.3gp\" class=\"form-control thumb_img";
                // line 231
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"thumb_image\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t";
                // line 236
                if (((isset($context["video_url"]) || array_key_exists("video_url", $context)) && (($context["video_url"] ?? $this->getContext($context, "video_url")) != ""))) {
                    // line 237
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$('.thumb_img";
                    // line 239
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                    echo "').removeAttr('required');
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-2\">
\t\t\t\t\t\t\t\t\t\t\t<b>Type : Image</b></br>\t
\t\t\t\t\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"";
                    // line 243
                    echo twig_escape_filter($this->env, ($context["video_url"] ?? $this->getContext($context, "video_url")), "html", null, true);
                    echo "\">\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 245
                    echo twig_escape_filter($this->env, ($context["video_url"] ?? $this->getContext($context, "video_url")), "html", null, true);
                    echo "\" style=\"height:100px;width:100px\" class=\"img-responsive img-thumbnail\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</a>\t
\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 250
                echo "\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"submit\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 256
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
            // line 267
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t";
        }
        // line 272
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

    // line 285
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 286
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>
<script src=\"";
        // line 287
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
\t\t\$('.pk-multi-select').select2();
\t
\t});\t
\t
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Uservideo:adduserVideo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  624 => 287,  619 => 286,  613 => 285,  595 => 272,  588 => 267,  559 => 256,  551 => 250,  543 => 245,  538 => 243,  531 => 239,  527 => 237,  525 => 236,  517 => 231,  509 => 225,  503 => 221,  496 => 217,  492 => 216,  488 => 214,  486 => 213,  483 => 212,  477 => 210,  475 => 209,  471 => 208,  467 => 207,  461 => 204,  457 => 202,  455 => 201,  446 => 195,  437 => 188,  429 => 168,  426 => 167,  417 => 164,  408 => 163,  403 => 162,  401 => 161,  384 => 147,  375 => 140,  368 => 112,  365 => 111,  358 => 109,  352 => 107,  343 => 106,  340 => 105,  335 => 104,  333 => 103,  320 => 93,  315 => 91,  311 => 90,  305 => 88,  302 => 87,  296 => 86,  293 => 85,  290 => 84,  287 => 83,  284 => 82,  281 => 81,  278 => 80,  275 => 79,  272 => 78,  267 => 77,  264 => 76,  261 => 75,  259 => 74,  250 => 72,  231 => 71,  228 => 70,  225 => 69,  222 => 68,  219 => 67,  216 => 66,  214 => 65,  211 => 64,  209 => 63,  202 => 58,  199 => 57,  180 => 54,  167 => 53,  149 => 52,  147 => 51,  143 => 49,  141 => 48,  126 => 35,  117 => 32,  113 => 30,  108 => 29,  99 => 26,  95 => 24,  91 => 23,  84 => 19,  74 => 11,  68 => 10,  53 => 3,  47 => 2,  31 => 1,);
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
\t\t  Add User Video
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
                        <h3 class=\"box-title\">Add / Update User Video</h3>
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
\t\t\t\t\t\t{% set main_video_master_id = 0 %}
\t\t\t\t\t\t
\t\t\t\t\t\t{% set media_type = 'video' %}
\t\t\t\t\t\t{% set package_id = 0 %}
\t\t\t\t\t\t{% set video_category_id = 0 %}
\t\t\t\t\t\t{% set video_url = '' %}
\t\t\t\t\t\t{% set title = '' %}

\t\t\t\t\t\t\t{% for language in language_list %} 
\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane {%if loop.first == true %}active{%endif%}\" id=\"lan_{{language.language_master_id}}\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% set action = path('admin_uservideo_saveuservideo') %}
\t\t\t\t\t\t\t\t\t{% set img_url = '' %}
\t\t\t\t\t\t\t\t\t{% if video_master is defined and video_master is not empty %}
\t\t\t\t\t\t\t\t\t\t{% for video_master in video_master %}
\t\t\t\t\t\t\t\t\t\t\t{%if video_master.language_id  == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set main_video_master_id = video_master.main_video_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set img_url = video_master.media_url %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set video_category_id = video_master.video_category %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set video_url = video_master.thumb_url %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set title = video_master.title %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set package_id = video_master.main_package_id %}
\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t<form  class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_video_master_id\" value=\"{{ main_video_master_id }}\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_package_master_id\" value=\"0\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"user_id\" value=\"{{user_id}}\">
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Select Package</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select multiple name=\"main_package_master_id[]\" class=\"form-control pk-multi-select\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Package</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if main_packages is defined and main_packages is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%for main_packages in main_packages%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if main_packages.language_id == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{main_packages.main_package_master_id}}\" {%if main_packages.main_package_master_id in pk_selected %} selected{%endif%}>
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
{#\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Select Users</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select class=\"user-multi-select form-control\" name=\"user_selected[]\" multiple=\"multiple\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Users</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if users is defined and users is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%for users in users%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{users.user_master_id}}\" {% if user_id is defined and user_id == users.user_master_id %} selected {% endif  %}  {% if users.user_master_id in user_selected %} selected {% endif %}>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{users.user_firstname}}\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
#}
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Video Title </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' class=\"form-control\" name=\"title\" value=\"{{title}}\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>

\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Select Video  Category</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"video_category\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Video Category</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if video_category is defined and video_category is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%for video_category in video_category %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{video_category.main_user_video_category_master_id }}\" {%if video_category.main_user_video_category_master_id == video_category_id %} selected{%endif%}>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{video_category.lang_wise}}\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t{# <div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Select An Option</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"s_uploaded\" type=\"radio\" name=\"select_option\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"s_uploaded\">Select from Uploaded</label>&nbsp;&nbsp;&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"upload_new\" type=\"radio\" name=\"select_option\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"upload_new\">Upload New Video</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br> #}

\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Upload Video </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='file' accept=\".mp4,.mov,.3gp\" class=\"form-control goal_img{{language.language_master_id}}\" name=\"gallery\" required=\"required\"/>
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
\t\t\t\t\t\t\t\t\t\t\t<b>Type : {{media_type | capitalize}}</b></br>\t
\t\t\t\t\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"{{img_url}}\">\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t{%if media_type == 'img'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"{{img_url}}\" style=\"height:100px;width:100px\" class=\"img-responsive img-thumbnail\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t{%if media_type == 'video'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<video width=\"100px\" height=\"100px\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t  <source src=\"{{img_url}}\" type=\"video/mp4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t  <source src=\"{{img_url}}\" type=\"video/ogg\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\tYour browser does not support the video tag.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</video>
\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t</a>\t
\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Upload Thumb Image </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='file' accept=\".mp4,.mov,.3gp\" class=\"form-control thumb_img{{language.language_master_id}}\" name=\"thumb_image\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t{%if video_url is defined and video_url != ''%}
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$('.thumb_img{{language.language_master_id}}').removeAttr('required');
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-2\">
\t\t\t\t\t\t\t\t\t\t\t<b>Type : Image</b></br>\t
\t\t\t\t\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"{{video_url}}\">\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"{{video_url}}\" style=\"height:100px;width:100px\" class=\"img-responsive img-thumbnail\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</a>\t
\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{%endif%}
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
\t\t\$('.pk-multi-select').select2();
\t
\t});\t
\t
</script>\t
{% endblock %}", "AdminBundle:Uservideo:adduserVideo.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Uservideo/adduserVideo.html.twig");
    }
}
