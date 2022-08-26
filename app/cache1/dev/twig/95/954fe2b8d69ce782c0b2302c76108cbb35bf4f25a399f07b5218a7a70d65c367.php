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

/* AdminBundle:GeneralSettings:index.html.twig */
class __TwigTemplate_cb04140e52886f8d51e60cb8f1bbadadf55005dfe66dfa08fcbaffffab88e904 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:GeneralSettings:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:GeneralSettings:index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "\t<section class=\"content-header\">
\t<!-------- PAGE TITLE --------------->
\t\t<h1>
\t\t  App Info
\t\t  <small></small>
\t\t</h1>
\t<!------- BREADCUMB --------------------->
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t";
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
        echo "\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div class=\"box box-primary\">
\t\t\t\t\t
\t\t\t\t\t<!-- box header -->
\t\t\t\t\t<div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update App Info</h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
";
        // line 52
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t";
        // line 55
        $context["email"] = "";
        // line 56
        echo "\t\t\t\t\t\t";
        $context["mobile"] = 0;
        // line 57
        echo "\t\t\t\t\t\t";
        $context["facebook_link_selected"] = "";
        // line 58
        echo "\t\t\t\t\t\t";
        $context["twitter_link_selected"] = "";
        // line 59
        echo "\t\t\t\t\t\t";
        $context["instagram_link_selected"] = "";
        // line 60
        echo "\t\t\t\t\t\t";
        $context["snapchat_link_selected"] = "";
        // line 61
        echo "\t\t\t\t\t\t";
        $context["linkedin_link_selected"] = "";
        // line 62
        echo "\t\t\t\t\t\t";
        $context["google_link_selected"] = "";
        // line 63
        echo "\t\t\t\t\t\t";
        $context["whatsapp_link"] = "";
        // line 64
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t
";
        // line 67
        echo "\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane active\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
        // line 69
        $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_generalsettings_savesetting");
        // line 70
        echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
        // line 71
        if (((isset($context["response"]) || array_key_exists("response", $context)) &&  !twig_test_empty(($context["response"] ?? $this->getContext($context, "response"))))) {
            // line 72
            echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
            // line 73
            if ($this->getAttribute(($context["response"] ?? null), "email", [], "any", true, true)) {
                // line 74
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["email"] = $this->getAttribute(($context["response"] ?? $this->getContext($context, "response")), "email", []);
                // line 75
                echo "\t\t\t\t\t\t\t\t\t\t\t";
            }
            echo "\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
            // line 76
            if ($this->getAttribute(($context["response"] ?? null), "mobile", [], "any", true, true)) {
                // line 77
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["mobile"] = $this->getAttribute(($context["response"] ?? $this->getContext($context, "response")), "mobile", []);
                // line 78
                echo "\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 79
            echo "\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute(($context["response"] ?? null), "social_links", [], "any", true, true) &&  !twig_test_empty($this->getAttribute(($context["response"] ?? $this->getContext($context, "response")), "social_links", [])))) {
                // line 80
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if ($this->getAttribute($this->getAttribute(($context["response"] ?? null), "social_links", [], "any", false, true), "facebook_link", [], "any", true, true)) {
                    // line 81
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["facebook_link_selected"] = $this->getAttribute($this->getAttribute(($context["response"] ?? $this->getContext($context, "response")), "social_links", []), "facebook_link", []);
                    // line 82
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 83
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if ($this->getAttribute($this->getAttribute(($context["response"] ?? null), "social_links", [], "any", false, true), "twitter_link", [], "any", true, true)) {
                    // line 84
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["twitter_link_selected"] = $this->getAttribute($this->getAttribute(($context["response"] ?? $this->getContext($context, "response")), "social_links", []), "twitter_link", []);
                    // line 85
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 86
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if ($this->getAttribute($this->getAttribute(($context["response"] ?? null), "social_links", [], "any", false, true), "linkedin_link", [], "any", true, true)) {
                    // line 87
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["linkedin_link_selected"] = $this->getAttribute($this->getAttribute(($context["response"] ?? $this->getContext($context, "response")), "social_links", []), "linkedin_link", []);
                    // line 88
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 89
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if ($this->getAttribute($this->getAttribute(($context["response"] ?? null), "social_links", [], "any", false, true), "google_link", [], "any", true, true)) {
                    // line 90
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["google_link_selected"] = $this->getAttribute($this->getAttribute(($context["response"] ?? $this->getContext($context, "response")), "social_links", []), "google_link", []);
                    // line 91
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                echo "\t

\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 93
                if ($this->getAttribute($this->getAttribute(($context["response"] ?? null), "social_links", [], "any", false, true), "whatsapp_link", [], "any", true, true)) {
                    // line 94
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["whatsapp_link"] = $this->getAttribute($this->getAttribute(($context["response"] ?? $this->getContext($context, "response")), "social_links", []), "whatsapp_link", []);
                    // line 95
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                echo "\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 98
            echo "
\t\t\t\t\t\t\t\t\t";
        }
        // line 100
        echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form  class=\"form-horizontal\" method=\"post\" action=\"";
        // line 101
        echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
        echo "\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Email</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='email' class=\"form-control\" name=\"email\" value=\"";
        // line 110
        echo twig_escape_filter($this->env, ($context["email"] ?? $this->getContext($context, "email")), "html", null, true);
        echo "\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Phone no</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"mobile\" value=\"";
        // line 121
        echo twig_escape_filter($this->env, ($context["mobile"] ?? $this->getContext($context, "mobile")), "html", null, true);
        echo "\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Facebook Link</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' class=\"form-control\" name=\"facebook_link_selected\" value=\"";
        // line 133
        echo twig_escape_filter($this->env, ($context["facebook_link_selected"] ?? $this->getContext($context, "facebook_link_selected")), "html", null, true);
        echo "\"required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Twitter Link</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' class=\"form-control\" name=\"twitter_link_selected\" value=\"";
        // line 144
        echo twig_escape_filter($this->env, ($context["twitter_link_selected"] ?? $this->getContext($context, "twitter_link_selected")), "html", null, true);
        echo "\"required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Google Link</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' class=\"form-control\" name=\"google_link_selected\" value=\"";
        // line 155
        echo twig_escape_filter($this->env, ($context["google_link_selected"] ?? $this->getContext($context, "google_link_selected")), "html", null, true);
        echo "\"required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Linkedin Link</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' class=\"form-control\" name=\"linkedin_link_selected\" value=\"";
        // line 166
        echo twig_escape_filter($this->env, ($context["linkedin_link_selected"] ?? $this->getContext($context, "linkedin_link_selected")), "html", null, true);
        echo "\"required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Whatsapp</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' class=\"form-control\" name=\"whatsapp_link\" value=\"";
        // line 177
        echo twig_escape_filter($this->env, ($context["whatsapp_link"] ?? $this->getContext($context, "whatsapp_link")), "html", null, true);
        echo "\"required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t

\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"submit\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 189
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
";
        // line 200
        echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
";
        // line 205
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

    // line 218
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 219
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

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
\t
\t});\t
\t
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:GeneralSettings:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  406 => 219,  400 => 218,  382 => 205,  376 => 200,  359 => 189,  344 => 177,  330 => 166,  316 => 155,  302 => 144,  288 => 133,  273 => 121,  259 => 110,  247 => 101,  244 => 100,  240 => 98,  233 => 95,  230 => 94,  228 => 93,  222 => 91,  219 => 90,  216 => 89,  213 => 88,  210 => 87,  207 => 86,  204 => 85,  201 => 84,  198 => 83,  195 => 82,  192 => 81,  189 => 80,  186 => 79,  183 => 78,  180 => 77,  178 => 76,  173 => 75,  170 => 74,  168 => 73,  165 => 72,  163 => 71,  160 => 70,  158 => 69,  154 => 67,  150 => 64,  147 => 63,  144 => 62,  141 => 61,  138 => 60,  135 => 59,  132 => 58,  129 => 57,  126 => 56,  124 => 55,  119 => 52,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
\t<section class=\"content-header\">
\t<!-------- PAGE TITLE --------------->
\t\t<h1>
\t\t  App Info
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
                        <h3 class=\"box-title\">Add / Update App Info</h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
{#\t\t\t\t\t{% if language_list is defined  and language_list is not empty%}
\t\t\t\t\t\t<div class=\"nav-tabs-custom\">
                            <ul class=\"nav nav-tabs\">
                                {% if language_list is defined %}
                                   {% for language in language_list %}
                                        <li class=\"{% if selected is defined %}{% if selected == language.language_master_id%}active{% endif %}{% else %}{% if loop.index == 1 %}active{% endif %}{% endif %}\">
                                            <a href=\"#lan_{{loop.index}}\" data-toggle=\"tab\">{{language.language_name}}</a>
                                        </li>
                                    {% endfor %}
                                {% endif %}
                            </ul>
                        </div>  #}
\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t{% set email = '' %}
\t\t\t\t\t\t{% set mobile = 0 %}
\t\t\t\t\t\t{% set facebook_link_selected = '' %}
\t\t\t\t\t\t{% set twitter_link_selected = '' %}
\t\t\t\t\t\t{% set instagram_link_selected = '' %}
\t\t\t\t\t\t{% set snapchat_link_selected = '' %}
\t\t\t\t\t\t{% set linkedin_link_selected = '' %}
\t\t\t\t\t\t{% set google_link_selected = '' %}
\t\t\t\t\t\t{% set whatsapp_link = '' %}
\t\t\t\t\t\t
\t\t\t\t\t\t
{#\t\t\t\t\t\t\t{% for language in language_list %} #}
\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane active\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% set action = path('admin_generalsettings_savesetting') %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% if response is defined and response is not empty %}
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t{%if response.email is defined%}
\t\t\t\t\t\t\t\t\t\t\t\t{% set email = response.email %}
\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t\t\t
\t\t\t\t\t\t\t\t\t\t\t{%if response.mobile is defined%}
\t\t\t\t\t\t\t\t\t\t\t\t{% set mobile = response.mobile %}
\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t{%if response.social_links is defined and response.social_links is not empty%}
\t\t\t\t\t\t\t\t\t\t\t\t{%if response.social_links.facebook_link is defined%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% set facebook_link_selected = response.social_links.facebook_link %}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t{%if response.social_links.twitter_link is defined%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% set twitter_link_selected = response.social_links.twitter_link %}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t{%if response.social_links.linkedin_link is defined%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% set linkedin_link_selected = response.social_links.linkedin_link %}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t{%if response.social_links.google_link is defined%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% set google_link_selected = response.social_links.google_link %}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t

\t\t\t\t\t\t\t\t\t\t\t\t{%if response.social_links.whatsapp_link is defined%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% set whatsapp_link = response.social_links.whatsapp_link %}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t{%endif%}

\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form  class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Email</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='email' class=\"form-control\" name=\"email\" value=\"{{email}}\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Phone no</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"mobile\" value=\"{{mobile}}\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Facebook Link</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' class=\"form-control\" name=\"facebook_link_selected\" value=\"{{facebook_link_selected}}\"required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Twitter Link</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' class=\"form-control\" name=\"twitter_link_selected\" value=\"{{twitter_link_selected}}\"required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Google Link</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' class=\"form-control\" name=\"google_link_selected\" value=\"{{google_link_selected}}\"required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Linkedin Link</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' class=\"form-control\" name=\"linkedin_link_selected\" value=\"{{linkedin_link_selected}}\"required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Whatsapp</br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' class=\"form-control\" name=\"whatsapp_link\" value=\"{{whatsapp_link}}\"required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t

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
{#\t\t\t\t\t\t\t{% endfor %}
#}\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
{#\t\t\t\t\t{% endif %}
#}\t\t\t\t\t\t\t\t\t\t\t\t
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
\t
\t});\t
\t
</script>\t
{% endblock %}", "AdminBundle:GeneralSettings:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/GeneralSettings/index.html.twig");
    }
}
