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

/* WSBundle:WSForgotpass:passwordresetview.html.twig */
class __TwigTemplate_6a95edae9b0dbe67a612d345dec41abf4ed460804120271c4b5e6156f22960c1 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "WSBundle:WSForgotpass:passwordresetview.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"UTF-8\">
    <title>Muscle Fuel Password Reset</title>
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/css/AdminLTE.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/css/skins/_all-skins.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
  </head>
  <body class=\"login-page\">
    <div class=\"login-box\">
    
    <div class=\"login-box-body\">
      <section class=\"content-header\">
            <h4 align=\"center\">
                Muscle Fuel - Password Reset
            </h4>
        </section>
        <section class=\"content\">
            <div class=\"box\">
                <div class=\"box-body\">
                    ";
        // line 23
        if (((isset($context["done"]) || array_key_exists("done", $context)) &&  !twig_test_empty(($context["done"] ?? $this->getContext($context, "done"))))) {
            // line 24
            echo "                        <div class=\"row form-group\">
                            ";
            // line 25
            if ((($context["done"] ?? $this->getContext($context, "done")) == 1)) {
                // line 26
                echo "                                <h4 align=\"center\">Password Changed Successfuly.</h4>
                            ";
            } else {
                // line 28
                echo "                                <h4 align=\"center\">Something went wrong! Try again resetting password.</h4>
                            ";
            }
            // line 30
            echo "                        </div>
                    ";
        }
        // line 32
        echo "                    ";
        if (((isset($context["msg"]) || array_key_exists("msg", $context)) &&  !twig_test_empty(($context["msg"] ?? $this->getContext($context, "msg"))))) {
            // line 33
            echo "                        ";
            if ((($context["msg"] ?? $this->getContext($context, "msg")) == 3)) {
                // line 34
                echo "                            <h4 align=\"center\">Sorry! Your password reset link has been expired!</h4>
                        ";
            } else {
                // line 36
                echo "                            ";
                if ((($context["msg"] ?? $this->getContext($context, "msg")) == 2)) {
                    // line 37
                    echo "                                <h4 align=\"center\">Something went wrong! Reset Password again.</h4>
                            ";
                }
                // line 38
                echo "                      
                        ";
            }
            // line 40
            echo "                        ";
            if ((($context["msg"] ?? $this->getContext($context, "msg")) == 1)) {
                // line 41
                echo "                            <form method=\"post\" onsubmit=\"chkps()\" action=\"";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ws_wsforgotpass_passwordresetform");
                echo "\">
                                <input type=\"hidden\" name=\"email\" value=\"";
                // line 42
                echo twig_escape_filter($this->env, ($context["email"] ?? $this->getContext($context, "email")), "html", null, true);
                echo "\"/>
                                <div class=\"row form-group\">
                                    <div class=\"col-xs-12 col-sm-12\">
                                      <h5>New Password</h5>
                                    </div>
                                    <div class=\"col-xs-12 col-sm-12\">
                                        <input type=\"password\" name=\"new_password\" class=\"form-control\" id=\"ps1\" required=\"\"/>
                                    </div>
                                </div>
                                <div class=\"row form-group\">
                                    <div class=\"col-xs-12 col-sm-12\">
                                      <h5>Retype Password</h5>
                                    </div>
                                    <div class=\"col-xs-12 col-sm-12\">
                                        <input type=\"password\" name=\"retype_password\" class=\"form-control\" id=\"ps2\" required=\"\"/>
                                    </div>
                                </div>
                                <hr />
                                <div class=\"row form-group\">
                                    <div class=\"col-xs-12\" align=\"center\">
                                        <button class=\"btn btn-primary\" name=\"change_password\" style=\"width: 50%;\">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        ";
            }
            // line 67
            echo "                    ";
        }
        // line 68
        echo "                </div>
            </div>
        </section>
    </div>
    <script>
        function chkps(){
           if (document.getElementById(\"ps1\").value != document.getElementById(\"ps2\").value) {
               alert(\"New Password and Retype Password must be same.\");
               event.preventDefault();
            } 
        }   
    </script>
    <script src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/js/app.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
  </body>
</html>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "WSBundle:WSForgotpass:passwordresetview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 81,  159 => 80,  145 => 68,  142 => 67,  114 => 42,  109 => 41,  106 => 40,  102 => 38,  98 => 37,  95 => 36,  91 => 34,  88 => 33,  85 => 32,  81 => 30,  77 => 28,  73 => 26,  71 => 25,  68 => 24,  66 => 23,  49 => 9,  45 => 8,  41 => 7,  33 => 1,);
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
    <title>Muscle Fuel Password Reset</title>
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <link href=\"{{asset('bundles/design/css/bootstrap.min.css')}}\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"{{asset('bundles/design/css/AdminLTE.min.css')}}\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"{{asset('bundles/design/css/skins/_all-skins.min.css')}}\" rel=\"stylesheet\" type=\"text/css\" />
  </head>
  <body class=\"login-page\">
    <div class=\"login-box\">
    
    <div class=\"login-box-body\">
      <section class=\"content-header\">
            <h4 align=\"center\">
                Muscle Fuel - Password Reset
            </h4>
        </section>
        <section class=\"content\">
            <div class=\"box\">
                <div class=\"box-body\">
                    {% if done is defined and done is not empty %}
                        <div class=\"row form-group\">
                            {% if done == 1 %}
                                <h4 align=\"center\">Password Changed Successfuly.</h4>
                            {% else %}
                                <h4 align=\"center\">Something went wrong! Try again resetting password.</h4>
                            {% endif %}
                        </div>
                    {% endif %}
                    {% if msg is defined and msg is not empty %}
                        {% if msg == 3 %}
                            <h4 align=\"center\">Sorry! Your password reset link has been expired!</h4>
                        {% else %}
                            {% if msg == 2 %}
                                <h4 align=\"center\">Something went wrong! Reset Password again.</h4>
                            {% endif %}                      
                        {% endif %}
                        {% if msg == 1 %}
                            <form method=\"post\" onsubmit=\"chkps()\" action=\"{{path('ws_wsforgotpass_passwordresetform')}}\">
                                <input type=\"hidden\" name=\"email\" value=\"{{email}}\"/>
                                <div class=\"row form-group\">
                                    <div class=\"col-xs-12 col-sm-12\">
                                      <h5>New Password</h5>
                                    </div>
                                    <div class=\"col-xs-12 col-sm-12\">
                                        <input type=\"password\" name=\"new_password\" class=\"form-control\" id=\"ps1\" required=\"\"/>
                                    </div>
                                </div>
                                <div class=\"row form-group\">
                                    <div class=\"col-xs-12 col-sm-12\">
                                      <h5>Retype Password</h5>
                                    </div>
                                    <div class=\"col-xs-12 col-sm-12\">
                                        <input type=\"password\" name=\"retype_password\" class=\"form-control\" id=\"ps2\" required=\"\"/>
                                    </div>
                                </div>
                                <hr />
                                <div class=\"row form-group\">
                                    <div class=\"col-xs-12\" align=\"center\">
                                        <button class=\"btn btn-primary\" name=\"change_password\" style=\"width: 50%;\">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        {% endif %}
                    {% endif %}
                </div>
            </div>
        </section>
    </div>
    <script>
        function chkps(){
           if (document.getElementById(\"ps1\").value != document.getElementById(\"ps2\").value) {
               alert(\"New Password and Retype Password must be same.\");
               event.preventDefault();
            } 
        }   
    </script>
    <script src=\"{{asset('bundles/design/js/bootstrap.min.js')}}\" type=\"text/javascript\"></script>
    <script src=\"{{asset('bundles/design/js/app.min.js')}}\" type=\"text/javascript\"></script>
  </body>
</html>", "WSBundle:WSForgotpass:passwordresetview.html.twig", "/var/www/admin/src/WSBundle/Resources/views/WSForgotpass/passwordresetview.html.twig");
    }
}
