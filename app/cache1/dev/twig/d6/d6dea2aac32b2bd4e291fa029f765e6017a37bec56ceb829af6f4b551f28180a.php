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

/* AdminBundle:Adminstatus:notifylist.html.twig */
class __TwigTemplate_a55e2ac9f1dc6abd8b63ee3466b705a7c8a9fd3433f9629062e0a6f59dfdbb32 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Adminstatus:notifylist.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Adminstatus:notifylist.html.twig", 1);
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
            Manage Notify User List
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
                    <form name=\"filterdatewise\" method=\"Post\" action = \"";
        // line 30
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_adminstatus_sendtoall");
        echo "\">
                    <div class=\"box-header with-border\">
                        <div class=\"row form-group\">
                                <div class=\"col-md-12\">
                                   
                                    <div class=\"col-md-1\"><label>Notify Text Title</label></div>
                                    <div class=\"col-md-3\">
                                        <input type=\"text\" name=\"notify_text\" class=\"form-control\" value=\"\" placeholder=\"Notify Text title\" />
                                    </div>
                                    <div class=\"col-md-1\"><label>Notify Text Message</label></div>
                                    <div class=\"col-md-3\">
                                        <input type=\"text\" name=\"notify_msg\" class=\"form-control\" value=\"\" placeholder=\"Notify Text Message\" />
                                    </div>
                                    <div class=\"col-md-1\">
                                        <input type=\"submit\" name=\"submit\" class=\"btn btn-warning\" value=\"Send to All\"  />
                                    </div>

                                   
                                </div>
                            </div>\t\t\t\t\t
                    </div>
                    </form>
                    <!-- end: box header -->


                    <div class=\"box-body table table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                                  <th>No</th>
                                  <th>Cutomer Name</th>
                                  <th>Phone</th>
                                  <th>Package Name</th>                                 
                                  <th>Start Date</th>
                                  <th>Datetime</th>
                                  <th>Send Notification</th>
                            </thead>
                            <tbody>
                                ";
        // line 67
        if (((isset($context["notify_listData"]) || array_key_exists("notify_listData", $context)) &&  !twig_test_empty(($context["notify_listData"] ?? $this->getContext($context, "notify_listData"))))) {
            // line 68
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["notify_listData"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["notify_listData"]) {
                // line 69
                echo "                                        <tr>
                                            <td>";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute($context["notify_listData"], "user_name", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute($context["notify_listData"], "phone_no", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute($context["notify_listData"], "package_name", []), "html", null, true);
                echo "</td>                                 
                                            <td>";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute($context["notify_listData"], "start_date", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 75
                echo twig_escape_filter($this->env, $this->getAttribute($context["notify_listData"], "notify_create_date", []), "html", null, true);
                echo "</td>
                                            <td>
                                                ";
                // line 77
                if (($this->getAttribute($context["notify_listData"], "status", []) == "notify_me")) {
                    echo " <input type=\"button\" class=\"btn btn-xs btn-warning\" value=\"Send\" onclick=\"sendNotifyme(";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["notify_listData"], "user_id", []), "html", null, true);
                    echo ",";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["notify_listData"], "package_id", []), "html", null, true);
                    echo ",";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["notify_listData"], "sub_package_id", []), "html", null, true);
                    echo ");\"/> ";
                } else {
                    echo " Notification sent ";
                }
                echo "</td>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notify_listData'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 80
            echo "                                ";
        }
        // line 81
        echo "                            </tbody>
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

    // line 95
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 96
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

    <script>
        \$(function () {
            \$('.editor1cls').each(function (e) {
                CKEDITOR.replace(this.id);
            });
            
        });
         \$(document).ready(function () {
            \$('#list').DataTable();
        });
        function sendNotifyme(user_id,main_package_id,main_sub_package_id){
                \$.ajax({
                    url : \"";
        // line 110
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_adminstatus_notifysendnotification");
        echo "\",
                    method : \"POST\",
                    data : {'user_id':user_id , 'main_package_id':main_package_id,'main_sub_package_id' : main_sub_package_id },
                    success : function(data){
                        alert('Sent Successfully')\t\t;

                    },
                    error : function(){
                            alert('Something went Wrong.')
                    }
                });
            }
    </script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Adminstatus:notifylist.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 110,  252 => 96,  246 => 95,  227 => 81,  224 => 80,  197 => 77,  192 => 75,  188 => 74,  184 => 73,  180 => 72,  176 => 71,  172 => 70,  169 => 69,  151 => 68,  149 => 67,  109 => 30,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
            Manage Notify User List
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
                    <form name=\"filterdatewise\" method=\"Post\" action = \"{{path('admin_adminstatus_sendtoall')}}\">
                    <div class=\"box-header with-border\">
                        <div class=\"row form-group\">
                                <div class=\"col-md-12\">
                                   
                                    <div class=\"col-md-1\"><label>Notify Text Title</label></div>
                                    <div class=\"col-md-3\">
                                        <input type=\"text\" name=\"notify_text\" class=\"form-control\" value=\"\" placeholder=\"Notify Text title\" />
                                    </div>
                                    <div class=\"col-md-1\"><label>Notify Text Message</label></div>
                                    <div class=\"col-md-3\">
                                        <input type=\"text\" name=\"notify_msg\" class=\"form-control\" value=\"\" placeholder=\"Notify Text Message\" />
                                    </div>
                                    <div class=\"col-md-1\">
                                        <input type=\"submit\" name=\"submit\" class=\"btn btn-warning\" value=\"Send to All\"  />
                                    </div>

                                   
                                </div>
                            </div>\t\t\t\t\t
                    </div>
                    </form>
                    <!-- end: box header -->


                    <div class=\"box-body table table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                                  <th>No</th>
                                  <th>Cutomer Name</th>
                                  <th>Phone</th>
                                  <th>Package Name</th>                                 
                                  <th>Start Date</th>
                                  <th>Datetime</th>
                                  <th>Send Notification</th>
                            </thead>
                            <tbody>
                                {%if notify_listData is defined and notify_listData is not empty %}
                                    {%for notify_listData in notify_listData %}
                                        <tr>
                                            <td>{{loop.index}}</td>
                                            <td>{{notify_listData.user_name}}</td>
                                            <td>{{notify_listData.phone_no}}</td>
                                            <td>{{notify_listData.package_name}}</td>                                 
                                            <td>{{notify_listData.start_date}}</td>
                                            <td>{{notify_listData.notify_create_date}}</td>
                                            <td>
                                                {%if notify_listData.status == 'notify_me' %} <input type=\"button\" class=\"btn btn-xs btn-warning\" value=\"Send\" onclick=\"sendNotifyme({{notify_listData.user_id}},{{notify_listData.package_id}},{{notify_listData.sub_package_id}});\"/> {%else%} Notification sent {%endif%}</td>
                                        </tr>
                                    {%endfor%}
                                {%endif%}
                            </tbody>
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
    <script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>

    <script>
        \$(function () {
            \$('.editor1cls').each(function (e) {
                CKEDITOR.replace(this.id);
            });
            
        });
         \$(document).ready(function () {
            \$('#list').DataTable();
        });
        function sendNotifyme(user_id,main_package_id,main_sub_package_id){
                \$.ajax({
                    url : \"{{path('admin_adminstatus_notifysendnotification')}}\",
                    method : \"POST\",
                    data : {'user_id':user_id , 'main_package_id':main_package_id,'main_sub_package_id' : main_sub_package_id },
                    success : function(data){
                        alert('Sent Successfully')\t\t;

                    },
                    error : function(){
                            alert('Something went Wrong.')
                    }
                });
            }
    </script>\t
{% endblock %}", "AdminBundle:Adminstatus:notifylist.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Adminstatus/notifylist.html.twig");
    }
}
