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

/* AdminBundle:Default:index.html.twig */
class __TwigTemplate_9e8abbca1f9a769c45dd089038fc248e7297a7fade2a1e32877020f27184cb3b extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Default:index.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"UTF-8\">
    <title>Anona | Log in</title>
    <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/appLogo.png"), "html", null, true);
        echo "\" rel=\"shortcut icon\">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <!-- Bootstrap 3.3.4 -->
\t<link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />
\t<!-- Fontawesome --->
\t<link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/AdminLTE.min.css\" rel=\"stylesheet\" type=\"text/css\" />
  </head>
  <body class=\"login-page\">
    <div class=\"login-box\">
      <div class=\"login-logo\" style=\"background: white\">
        <img src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/appLogo.png"), "html", null, true);
        echo "\" style=\"height: 80px\">
      </div><!-- /.login-logo -->
      <div class=\"login-box-body\">
      <p class=\"login-box-msg\">Sign in to start your session</p>
\t\t
\t\t<!-- START block : Flash message ---------------->
\t\t<div class=\"row\">
\t\t<div class=\"col-md-12\">
\t\t";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 27
            echo "\t\t\t\t<div role=\"alert\" class=\"alert alert-success alert-dismissible fade in\">
\t\t\t\t  <button aria-label=\"Close\" data-dismiss=\"alert\" class=\"close\" type=\"button\"><span aria-hidden=\"true\">×</span></button>
\t\t\t\t  <strong>Alert!</strong>&nbsp; ";
            // line 29
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
\t\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 33
            echo "\t\t\t\t<div role=\"alert\" class=\"alert alert-danger alert-dismissible fade in\">
\t\t\t\t  <button aria-label=\"Close\" data-dismiss=\"alert\" class=\"close\" type=\"button\"><span aria-hidden=\"true\">×</span></button>
\t\t\t\t  <strong>Alert!</strong>&nbsp; ";
            // line 35
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
\t\t\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "\t\t</div>
\t\t</div>
\t\t<!-- END block : Flash message ---------------->

        <form action=\"";
        // line 42
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_default_logincheck");
        echo "\" method=\"post\">
          <div class=\"form-group has-feedback\">
\t\t\t  <input type=\"text\" class=\"form-control\" name=\"email_address\" placeholder=\"Email Address\" />
            <span class=\"glyphicon glyphicon-user form-control-feedback\"></span>
          </div>
          <div class=\"form-group has-feedback\">
\t\t\t  <input type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"Password\" />
            <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
          </div>
\t\t\t\t\t
";
        // line 62
        echo "\t\t\t\t\t
\t\t\t\t\t
          <div class=\"row\">

            <div class=\"col-xs-4\">
              <button type=\"submit\" name=\"sign_in\" value=\"sign_in\" class=\"btn btn-primary btn-block btn-flat\">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/jQuery-2.1.4.min.js\" type=\"text/javascript\"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "/js/bootstrap.min.js\" type=\"text/javascript\"></script>
\t
  </body>
</html>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 78,  145 => 76,  129 => 62,  116 => 42,  110 => 38,  101 => 35,  97 => 33,  92 => 32,  83 => 29,  79 => 27,  75 => 26,  64 => 18,  56 => 13,  52 => 12,  47 => 10,  40 => 6,  33 => 1,);
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
    <title>Anona | Log in</title>
    <link href=\"{{asset('bundles/design/appLogo.png')}}\" rel=\"shortcut icon\">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <!-- Bootstrap 3.3.4 -->
\t<link href=\"{{asset('bundles/design/')}}css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />
\t<!-- Fontawesome --->
\t<link href=\"{{asset('bundles/design/')}}css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"{{asset('bundles/design/')}}css/AdminLTE.min.css\" rel=\"stylesheet\" type=\"text/css\" />
  </head>
  <body class=\"login-page\">
    <div class=\"login-box\">
      <div class=\"login-logo\" style=\"background: white\">
        <img src=\"{{asset('bundles/design/appLogo.png')}}\" style=\"height: 80px\">
      </div><!-- /.login-logo -->
      <div class=\"login-box-body\">
      <p class=\"login-box-msg\">Sign in to start your session</p>
\t\t
\t\t<!-- START block : Flash message ---------------->
\t\t<div class=\"row\">
\t\t<div class=\"col-md-12\">
\t\t{% for flashMessage in app.session.flashbag.get('success_msg') %}
\t\t\t\t<div role=\"alert\" class=\"alert alert-success alert-dismissible fade in\">
\t\t\t\t  <button aria-label=\"Close\" data-dismiss=\"alert\" class=\"close\" type=\"button\"><span aria-hidden=\"true\">×</span></button>
\t\t\t\t  <strong>Alert!</strong>&nbsp; {{ flashMessage }}
\t\t\t</div>
\t\t{% endfor %}
\t\t{% for flashMessage in app.session.flashbag.get('error_msg') %}
\t\t\t\t<div role=\"alert\" class=\"alert alert-danger alert-dismissible fade in\">
\t\t\t\t  <button aria-label=\"Close\" data-dismiss=\"alert\" class=\"close\" type=\"button\"><span aria-hidden=\"true\">×</span></button>
\t\t\t\t  <strong>Alert!</strong>&nbsp; {{ flashMessage }}
\t\t\t\t</div>
\t\t{% endfor %}
\t\t</div>
\t\t</div>
\t\t<!-- END block : Flash message ---------------->

        <form action=\"{{path('admin_default_logincheck')}}\" method=\"post\">
          <div class=\"form-group has-feedback\">
\t\t\t  <input type=\"text\" class=\"form-control\" name=\"email_address\" placeholder=\"Email Address\" />
            <span class=\"glyphicon glyphicon-user form-control-feedback\"></span>
          </div>
          <div class=\"form-group has-feedback\">
\t\t\t  <input type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"Password\" />
            <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
          </div>
\t\t\t\t\t
{#\t\t\t\t\t
\t\t\t\t  <div class=\"form-group has-feedback\">
              <select class=\"form-control\" name=\"main_country_id\">
\t\t\t\t\t\t\t\t\t\t\t{% if countrymaster is defined and countrymaster is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t{% for country in countrymaster %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{country.main_country_master_id}}\">{{country.country_name}}</option>
\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
#}\t\t\t\t\t
\t\t\t\t\t
          <div class=\"row\">

            <div class=\"col-xs-4\">
              <button type=\"submit\" name=\"sign_in\" value=\"sign_in\" class=\"btn btn-primary btn-block btn-flat\">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src=\"{{asset('bundles/design/')}}js/jQuery-2.1.4.min.js\" type=\"text/javascript\"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src=\"{{asset('bundles/design/')}}/js/bootstrap.min.js\" type=\"text/javascript\"></script>
\t
  </body>
</html>

", "AdminBundle:Default:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Default/index.html.twig");
    }
}
