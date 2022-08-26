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

/* AdminBundle:Pushnotification:addpushnotification.html.twig */
class __TwigTemplate_1320b305d3ce5ec6a3774128569f6e132955e17ba9a7dc733fe5f8098cea635d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'css' => [$this, 'block_css'],
            'content' => [$this, 'block_content'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "AdminBundle::Layout/adminlayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Pushnotification:addpushnotification.html.twig"));

        $this->parent = $this->loadTemplate("AdminBundle::Layout/adminlayout.html.twig", "AdminBundle:Pushnotification:addpushnotification.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo " Send push notification  ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 4
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 7
        echo "    <section class=\"content-header\">
        <h1>
            Send push notification
            <small></small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i>Dashboard</a></li>
            <li><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pushnotification_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"></i>Push notification list</a></li>
            <li class=\"active\">Send push notification</li>
        </ol>

    </section>

    <section class=\"content\">
        ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 22
            echo "            <div role=\"alert\" class=\"alert alert-success alert-dismissible fade in\">
                <button aria-label=\"Close\" data-dismiss=\"alert\" class=\"close\" type=\"button\"><span aria-hidden=\"true\">×</span></button>
                <strong>Alert!</strong>&nbsp; ";
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
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 28
            echo "            <div role=\"alert\" class=\"alert alert-danger alert-dismissible fade in\">
                <button aria-label=\"Close\" data-dismiss=\"alert\" class=\"close\" type=\"button\"><span aria-hidden=\"true\">×</span></button>
                <strong>Alert!</strong>&nbsp; ";
            // line 30
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "
        <div class=\"row\">
            <div class=\"col-xs-12\">
                <div class=\"box box-solid\">
                    <form class=\"form-horizontal\" action=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pushnotification_sendnotification", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return checkform()\">

                        <div class=\"box-body\">
                            <div class=\"form-group \">
                                <label class=\"col-sm-2 hide control-label\">Notification Type</label>
                                <div class=\"col-sm-4 hide\">
                                    <select required class=\" form-control\" name=\"notification_type\" id=\"notification_type\" onchange=\"show_hide();\">
                                        <option value=\"general\">General</option>                                       
                                    </select>
                                </div>

                                <label class=\"col-sm-2 control-label\">Notification title</label>
                                <div class=\"col-sm-4\">
                                    <input type=\"text\" name=\"note_title\" class=\"form-control input-sm\" placeholder=\"Title\" value=\"\" required >
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"col-sm-2 control-label\">Notification message</label>
                                <div class=\"col-sm-6\">
                                    <textarea name=\"note_message\" placeholder=\"Message\" class=\"form-control\" required></textarea>
                                </div>
                            </div>
                            <div class=\"form-group\" id=\"image-div\">
                                <label class=\"col-sm-2 control-label\">Image</label>
                                <div class=\"col-sm-6\">
                                    <input type=\"file\" name=\"image\" class=\"\">

                                    <p class=\"help-block\">Max image resolution is <b>512 X 512</b> and size will be <b>10 Kb</b> allowed</p>
                                </div>
                            </div>

                            ";
        // line 74
        echo "


                            <div class=\"form-group \" id=\"userbox\">
                                <label class=\"col-sm-2 control-label\">&nbsp;</label>
                                <div class=\"col-md-10\">
                                    <div class=\"box box-primary box-solid\">
                                        <div class=\"box-header with-border\">
                                            <h3 class=\"box-title\">Users list</h3>
                                            <input type=\"checkbox\" id=\"checkAll\" class=\"checkbox pull-right\">
                                        </div>
                                        <div class=\"box-body\">
                                            <div class=\"col-md-12\" style=\"margin-bottom:10px;padding-bottom: 11px;    border-bottom: 1px solid #ccc;\">
                                                <div class=\"col-md-2\"></div>
                                                <div class=\"col-md-8 col-sm-12\">
                                                    <div class=\"col-sm-3 text-right\">
                                                        <label>Search User</label>
                                                    </div>
                                                    <div class=\"col-sm-8\">
                                                        <input type=\"text\" id=\"search_user\" class=\"userchk\" style=\"width:100%;\">
                                                    </div>
                                                </div>
                                                <div class=\"col-md-2\"></div>
                                            </div>
                                            <div id=\"userlistbox\">
                                                ";
        // line 99
        if (((isset($context["user_list"]) || array_key_exists("user_list", $context)) &&  !twig_test_empty(($context["user_list"] ?? $this->getContext($context, "user_list"))))) {
            // line 100
            echo "                                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["user_list"]);
            foreach ($context['_seq'] as $context["_key"] => $context["user_list"]) {
                // line 101
                echo "                                                        <div class=\"col-xs-3\">

                                                            <input type=\"checkbox\" name=\"user[]\" class=\"checkBoxClass\" value=\"";
                // line 103
                echo twig_escape_filter($this->env, $this->getAttribute($context["user_list"], "user_master_id", []), "html", null, true);
                echo "\" >";
                if ((($this->getAttribute($context["user_list"], "user_firstname", []) == "") && ($this->getAttribute($context["user_list"], "user_lastname", []) == ""))) {
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user_list"], "username", []), "html", null, true);
                } else {
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user_list"], "user_firstname", []), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user_list"], "user_lastname", []), "html", null, true);
                    echo " ";
                }
                // line 104
                echo "
                                                        </div> 
                                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user_list'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 106
            echo "                                                        
                                                ";
        }
        // line 107
        echo "    

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                        </div>

                        <div class=\"box-footer\">
                            <p>*note : Sending notification will takes some time , please dont refresh the page.</p>
                            <a href=\"";
        // line 123
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pushnotification_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\" class=\"btn btn-default btn-flat\">Cancel</a>
                            <input type=\"hidden\" name=\"send_notification\" value=\"send_notification\" />
                            <button type=\"submit\" class=\"btn btn-primary pull-right btn-flat\">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 134
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 135
        echo "    <script>
        \$(document).ready(function () {
            \$('#example1').DataTable();

            \$(\"#search_user\").on(\"keyup\", function () {
                var value = \$(this).val().toLowerCase();
                \$(\"#userlistbox div\").filter(function () {                    
                    \$(this).toggle(\$(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        \$('#checkAll').change(function () {            
            var value = \$('#search_user').val().toLowerCase();
           
            if(value != ''){
                 \$('input:checkbox').prop('checked', false);
                \$(\"#userlistbox div\").filter(function () {   
                    console.log(\"text => \"+ \$(this).text());
                    console.log(\"value  => \"+ \$(this).text().toLowerCase().indexOf(value));
                    if(\$(this).text().toLowerCase().indexOf(value) > -1){
                        
                        console.log(\" match  => true\");
                        console.log( \$(this));
                        \$(this).children(\"INPUT[type='checkbox']\").prop('checked', true);
                    }
                    else{
                        \$(this).children(\"INPUT[type='checkbox']\").prop('checked', false);
                    }
                });
            }else{
                \$('input:checkbox').prop('checked', \$(this).prop('checked'));
            }
            
        });
        function show_hide() {
            var selected_id = \$('#notification_type').val();
            if (selected_id == 'app_alert') {
                \$('#image-div').addClass('hide').removeClass('show');
            } else {
                \$('#image-div').addClass('show').removeClass('hide');
            }
        }
        function getuser(user_type)
        {
            if (user_type != \"\") {
                \$.ajax({
                    type: 'POST    ',
                    url: \"";
        // line 183
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pushnotification_getuserlist", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\",
                    data: {'user_type': user_type, 'flag': 'getuser'},
                    success: function (response) {
                        if (response) {
                            \$(\"#userbox\").html(response);
                            \$(\"#userbox\").removeClass(\"hide\");
                        }
                    }
                });
            } else {
                \$(\"#userbox\").addClass(\"hide\");
            }
        }

        function getusercity(city_id)
        {
            user_type = \$('#send_to').val();
            if (user_type == \"\") {
                alert('please select send to');
                return false;
                //code
            }

            \$.ajax({
                type: 'POST    ',
                url: \"";
        // line 208
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pushnotification_getuserlist", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\",
                data: {'user_type': user_type, 'flag': 'getuser', 'city_id': city_id},
                success: function (response) {
                    if (response) {
                        \$(\"#userbox\").html(response);
                        \$(\"#userbox\").removeClass(\"hide\");
                    }
                }
            });
        }
        
        function checkform(){
            var length = \$('.checkBoxClass').filter(':checked').length ;
            if (length  > 0 ){
                    return true ;
            }
            else{
                alert(\"Please Select User\");
                return false ;
            }
        }
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Pushnotification:addpushnotification.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  359 => 208,  331 => 183,  281 => 135,  275 => 134,  258 => 123,  240 => 107,  236 => 106,  228 => 104,  215 => 103,  211 => 101,  206 => 100,  204 => 99,  177 => 74,  143 => 37,  137 => 33,  128 => 30,  124 => 28,  119 => 27,  110 => 24,  106 => 22,  102 => 21,  92 => 14,  88 => 13,  80 => 7,  74 => 6,  66 => 4,  60 => 3,  48 => 2,  32 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"AdminBundle::Layout/adminlayout.html.twig\" %}
{% block title %} Send push notification  {% endblock %}
{% block css %}

{% endblock %}
{% block content %}
    <section class=\"content-header\">
        <h1>
            Send push notification
            <small></small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"{{path('admin_dashboard_index',{'domain':app.session.get('domain')})}}\"><i class=\"fa fa-dashboard\"></i>Dashboard</a></li>
            <li><a href=\"{{path('admin_pushnotification_index',{'domain':app.session.get('domain')})}}\"></i>Push notification list</a></li>
            <li class=\"active\">Send push notification</li>
        </ol>

    </section>

    <section class=\"content\">
        {% for flashMessage in app.session.flashbag.get('success_msg') %}
            <div role=\"alert\" class=\"alert alert-success alert-dismissible fade in\">
                <button aria-label=\"Close\" data-dismiss=\"alert\" class=\"close\" type=\"button\"><span aria-hidden=\"true\">×</span></button>
                <strong>Alert!</strong>&nbsp; {{ flashMessage }}
            </div>
        {% endfor %}
        {% for flashMessage in app.session.flashbag.get('error_msg') %}
            <div role=\"alert\" class=\"alert alert-danger alert-dismissible fade in\">
                <button aria-label=\"Close\" data-dismiss=\"alert\" class=\"close\" type=\"button\"><span aria-hidden=\"true\">×</span></button>
                <strong>Alert!</strong>&nbsp; {{ flashMessage }}
            </div>
        {% endfor %}

        <div class=\"row\">
            <div class=\"col-xs-12\">
                <div class=\"box box-solid\">
                    <form class=\"form-horizontal\" action=\"{{path('admin_pushnotification_sendnotification',{'domain':app.session.get('domain')})}}\" method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return checkform()\">

                        <div class=\"box-body\">
                            <div class=\"form-group \">
                                <label class=\"col-sm-2 hide control-label\">Notification Type</label>
                                <div class=\"col-sm-4 hide\">
                                    <select required class=\" form-control\" name=\"notification_type\" id=\"notification_type\" onchange=\"show_hide();\">
                                        <option value=\"general\">General</option>                                       
                                    </select>
                                </div>

                                <label class=\"col-sm-2 control-label\">Notification title</label>
                                <div class=\"col-sm-4\">
                                    <input type=\"text\" name=\"note_title\" class=\"form-control input-sm\" placeholder=\"Title\" value=\"\" required >
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"col-sm-2 control-label\">Notification message</label>
                                <div class=\"col-sm-6\">
                                    <textarea name=\"note_message\" placeholder=\"Message\" class=\"form-control\" required></textarea>
                                </div>
                            </div>
                            <div class=\"form-group\" id=\"image-div\">
                                <label class=\"col-sm-2 control-label\">Image</label>
                                <div class=\"col-sm-6\">
                                    <input type=\"file\" name=\"image\" class=\"\">

                                    <p class=\"help-block\">Max image resolution is <b>512 X 512</b> and size will be <b>10 Kb</b> allowed</p>
                                </div>
                            </div>

                            {# <div class=\"form-group hide\">
                              <label class=\"col-sm-2 control-label\">&nbsp;</label>
                              <div class=\"col-sm-3\">
                                    <input type=\"checkbox\" name=\"sendall\" id=\"sendall\" class=\"\" value=\"0\" checked=\"checked\"> Send to all
                              </div>
                            </div>#}



                            <div class=\"form-group \" id=\"userbox\">
                                <label class=\"col-sm-2 control-label\">&nbsp;</label>
                                <div class=\"col-md-10\">
                                    <div class=\"box box-primary box-solid\">
                                        <div class=\"box-header with-border\">
                                            <h3 class=\"box-title\">Users list</h3>
                                            <input type=\"checkbox\" id=\"checkAll\" class=\"checkbox pull-right\">
                                        </div>
                                        <div class=\"box-body\">
                                            <div class=\"col-md-12\" style=\"margin-bottom:10px;padding-bottom: 11px;    border-bottom: 1px solid #ccc;\">
                                                <div class=\"col-md-2\"></div>
                                                <div class=\"col-md-8 col-sm-12\">
                                                    <div class=\"col-sm-3 text-right\">
                                                        <label>Search User</label>
                                                    </div>
                                                    <div class=\"col-sm-8\">
                                                        <input type=\"text\" id=\"search_user\" class=\"userchk\" style=\"width:100%;\">
                                                    </div>
                                                </div>
                                                <div class=\"col-md-2\"></div>
                                            </div>
                                            <div id=\"userlistbox\">
                                                {%if  user_list is defined and user_list is not empty %}
                                                    {%for user_list in user_list %}
                                                        <div class=\"col-xs-3\">

                                                            <input type=\"checkbox\" name=\"user[]\" class=\"checkBoxClass\" value=\"{{user_list.user_master_id}}\" >{%if user_list.user_firstname == \"\" and user_list.user_lastname == \"\" %} {{user_list.username}}{%else %} {{user_list.user_firstname}} {{user_list.user_lastname }} {%endif%}

                                                        </div> 
                                                    {%endfor%}                                                        
                                                {%endif%}    

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                        </div>

                        <div class=\"box-footer\">
                            <p>*note : Sending notification will takes some time , please dont refresh the page.</p>
                            <a href=\"{{path('admin_pushnotification_index',{'domain':app.session.get('domain')})}}\" class=\"btn btn-default btn-flat\">Cancel</a>
                            <input type=\"hidden\" name=\"send_notification\" value=\"send_notification\" />
                            <button type=\"submit\" class=\"btn btn-primary pull-right btn-flat\">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
{% endblock %}

{% block js %}
    <script>
        \$(document).ready(function () {
            \$('#example1').DataTable();

            \$(\"#search_user\").on(\"keyup\", function () {
                var value = \$(this).val().toLowerCase();
                \$(\"#userlistbox div\").filter(function () {                    
                    \$(this).toggle(\$(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        \$('#checkAll').change(function () {            
            var value = \$('#search_user').val().toLowerCase();
           
            if(value != ''){
                 \$('input:checkbox').prop('checked', false);
                \$(\"#userlistbox div\").filter(function () {   
                    console.log(\"text => \"+ \$(this).text());
                    console.log(\"value  => \"+ \$(this).text().toLowerCase().indexOf(value));
                    if(\$(this).text().toLowerCase().indexOf(value) > -1){
                        
                        console.log(\" match  => true\");
                        console.log( \$(this));
                        \$(this).children(\"INPUT[type='checkbox']\").prop('checked', true);
                    }
                    else{
                        \$(this).children(\"INPUT[type='checkbox']\").prop('checked', false);
                    }
                });
            }else{
                \$('input:checkbox').prop('checked', \$(this).prop('checked'));
            }
            
        });
        function show_hide() {
            var selected_id = \$('#notification_type').val();
            if (selected_id == 'app_alert') {
                \$('#image-div').addClass('hide').removeClass('show');
            } else {
                \$('#image-div').addClass('show').removeClass('hide');
            }
        }
        function getuser(user_type)
        {
            if (user_type != \"\") {
                \$.ajax({
                    type: 'POST    ',
                    url: \"{{path('admin_pushnotification_getuserlist',{'domain':app.session.get('domain')})}}\",
                    data: {'user_type': user_type, 'flag': 'getuser'},
                    success: function (response) {
                        if (response) {
                            \$(\"#userbox\").html(response);
                            \$(\"#userbox\").removeClass(\"hide\");
                        }
                    }
                });
            } else {
                \$(\"#userbox\").addClass(\"hide\");
            }
        }

        function getusercity(city_id)
        {
            user_type = \$('#send_to').val();
            if (user_type == \"\") {
                alert('please select send to');
                return false;
                //code
            }

            \$.ajax({
                type: 'POST    ',
                url: \"{{path('admin_pushnotification_getuserlist',{'domain':app.session.get('domain')})}}\",
                data: {'user_type': user_type, 'flag': 'getuser', 'city_id': city_id},
                success: function (response) {
                    if (response) {
                        \$(\"#userbox\").html(response);
                        \$(\"#userbox\").removeClass(\"hide\");
                    }
                }
            });
        }
        
        function checkform(){
            var length = \$('.checkBoxClass').filter(':checked').length ;
            if (length  > 0 ){
                    return true ;
            }
            else{
                alert(\"Please Select User\");
                return false ;
            }
        }
    </script>
{% endblock %}
", "AdminBundle:Pushnotification:addpushnotification.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Pushnotification/addpushnotification.html.twig");
    }
}
