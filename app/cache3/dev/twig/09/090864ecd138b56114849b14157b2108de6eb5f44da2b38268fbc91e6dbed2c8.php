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

/* AdminBundle:Entity:index.html.twig */
class __TwigTemplate_c7a845fa5bd0bb36b017d5e7cde893a0641777b16099a678a4827d93347e3be1 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Entity:index.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>ENTITY GENERATOR</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/css/bootstrap.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/css/font-awesome.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/css/AdminLTE.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/css/skins/_all-skins.min.css"), "html", null, true);
        echo "\">
  </head>
  <body class=\"hold-transition login-page\">
    <div class=\"login-box\">
      <div class=\"login-logo\">
        <a href=\"../../index2.html\"><b>ENTITY</b>GENERATOR</a>
      </div><!-- /.login-logo -->
      <div class=\"login-box-body\">
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 21
            echo "            <div class=\"box-body\">
                <div class=\"alert alert-success alert-dismissable\">
                    <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\"><i class=\"fa fa-close\"></i></button>
                    <h4><i class=\"icon fa fa-check\"></i> Alert!</h4> ";
            // line 24
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
                </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 29
            echo "            <div class=\"box-body\">
                <div class=\"alert alert-danger alert-dismissable\">
                    <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                    <h4><i class=\"icon fa fa-ban\"></i> Alert!</h4> ";
            // line 32
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
                </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "        <form action=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_entity_createentity");
        echo "\" method=\"post\">
          <div class=\"form-group has-feedback\">
            <input type=\"text\" class=\"form-control\" name=\"namespace\" placeholder=\"Namespace\" value=\"AdminBundle\\Entity\" required>
          </div>
          <div class=\"form-group has-feedback\">
            <input type=\"text\" class=\"form-control\" name=\"table\" placeholder=\"Table name\" required>
          </div>
          <div class=\"row\">
            <div class=\"col-xs-4\">
              <button type=\"submit\" name=\"create\" value=\"create\" class=\"btn btn-primary btn-block btn-flat\">Generate</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <script src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/js/jquery.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
  </body>
</html>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Entity:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 54,  126 => 53,  105 => 36,  95 => 32,  90 => 29,  85 => 28,  75 => 24,  70 => 21,  66 => 20,  55 => 12,  51 => 11,  47 => 10,  43 => 9,  33 => 1,);
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
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>ENTITY GENERATOR</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/design/css/bootstrap.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/design/css/font-awesome.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/design/css/AdminLTE.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/design/css/skins/_all-skins.min.css') }}\">
  </head>
  <body class=\"hold-transition login-page\">
    <div class=\"login-box\">
      <div class=\"login-logo\">
        <a href=\"../../index2.html\"><b>ENTITY</b>GENERATOR</a>
      </div><!-- /.login-logo -->
      <div class=\"login-box-body\">
        {% for flashMessage in app.session.flashbag.get('success') %}
            <div class=\"box-body\">
                <div class=\"alert alert-success alert-dismissable\">
                    <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\"><i class=\"fa fa-close\"></i></button>
                    <h4><i class=\"icon fa fa-check\"></i> Alert!</h4> {{flashMessage}}
                </div>
            </div>
        {% endfor %}
        {% for flashMessage in app.session.flashbag.get('error') %}
            <div class=\"box-body\">
                <div class=\"alert alert-danger alert-dismissable\">
                    <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                    <h4><i class=\"icon fa fa-ban\"></i> Alert!</h4> {{flashMessage}}
                </div>
            </div>
        {% endfor %}
        <form action=\"{{path('admin_entity_createentity')}}\" method=\"post\">
          <div class=\"form-group has-feedback\">
            <input type=\"text\" class=\"form-control\" name=\"namespace\" placeholder=\"Namespace\" value=\"AdminBundle\\Entity\" required>
          </div>
          <div class=\"form-group has-feedback\">
            <input type=\"text\" class=\"form-control\" name=\"table\" placeholder=\"Table name\" required>
          </div>
          <div class=\"row\">
            <div class=\"col-xs-4\">
              <button type=\"submit\" name=\"create\" value=\"create\" class=\"btn btn-primary btn-block btn-flat\">Generate</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <script src=\"{{ asset('bundles/design/js/jquery.js') }}\"></script>
    <script src=\"{{ asset('bundles/design/js/bootstrap.min.js') }}\"></script>
  </body>
</html>
", "AdminBundle:Entity:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Entity/index.html.twig");
    }
}
