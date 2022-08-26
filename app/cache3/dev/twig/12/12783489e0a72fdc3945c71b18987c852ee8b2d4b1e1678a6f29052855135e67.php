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

/* AdminBundle:Userreports:index.html.twig */
class __TwigTemplate_a057116172535fd1bbc3ffd6582b78aca7d3481c4dcabf6b988930b092477e3e extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'title' => [$this, 'block_title'],
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Userreports:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Userreports:index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Anona : User Package Report";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 6
        echo "    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
           User Package Report
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 18
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 20
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 24
            echo "            <div class=\"alert alert-danger alert-dismissable\">
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
        echo "
        <div class=\"row\">
            
            <form name=\"filterdatewise\" method=\"Post\" action = \"";
        // line 32
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_userreports_index");
        echo "\">
                <section class=\"col-lg-12 \">
                    <div class=\"box box-success\">
                        <div class=\"box-body\">
                            <div class=\"row\">
                                <div class=\"col-md-2\"><label>Select Status</label></div>
                                <div class=\"col-md-2\">
                                    <select class=\"form-control\" name='filter_status'>
                                        <option value=''>Select</option>
                                        <option value='active' ";
        // line 41
        if (((isset($context["filter_status"]) || array_key_exists("filter_status", $context)) && (($context["filter_status"] ?? $this->getContext($context, "filter_status")) == "active"))) {
            echo " selected ";
        }
        echo " >Active</option>
                                        <option value='expired' ";
        // line 42
        if (((isset($context["filter_status"]) || array_key_exists("filter_status", $context)) && (($context["filter_status"] ?? $this->getContext($context, "filter_status")) == "expired"))) {
            echo " selected ";
        }
        echo ">Expired</option>
                                        <option value='not_purchased' ";
        // line 43
        if (((isset($context["filter_status"]) || array_key_exists("filter_status", $context)) && (($context["filter_status"] ?? $this->getContext($context, "filter_status")) == "not_purchased"))) {
            echo " selected ";
        }
        echo ">Not Purchased</option>
                                    </select>
                                </div>
                                 <div class=\"col-md-2\"><label>Select DOB : </label></div>
                                <div class=\"col-md-2\">
                                    <input type='text' id=\"month_datepicker\" name='dob_filter_date' placeholder='Select Date' value='";
        // line 48
        if (((isset($context["dob_filter_date"]) || array_key_exists("dob_filter_date", $context)) &&  !twig_test_empty(($context["dob_filter_date"] ?? $this->getContext($context, "dob_filter_date"))))) {
            echo " ";
            echo twig_escape_filter($this->env, ($context["dob_filter_date"] ?? $this->getContext($context, "dob_filter_date")), "html", null, true);
            echo " ";
        }
        echo "' class='form-control' />
                                </div>
                               
                                <div class=\"col-md-2\"><input type=\"submit\" name=\"submit\" value=\"Filter\" class=\"btn btn-success\"/></div>
                               
                            </div><hr>
                            <div class=\"row\">
                                <div class=\"col-md-2\"><label>Send Message to filtered List</label></div>
                                <div class=\"col-md-2\">
                                    <input type='text' name='msg_title' id='msg_title' placeholder='Enter Title' value='' class='form-control ' />
                                </div>
                                <div class=\"col-md-4\">
                                    <textarea id=\"message_text\" class=\"form-control\" placeholder=\"Enter Message to send as Notification\"></textarea>
                                </div>
                                
                               
                               <div class=\"col-md-2\"><input type=\"button\" onclick=\"send_notification_filter_wise();\" name=\"submit\" value=\"Send Notification\" class=\"btn btn-warning\"/></div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
        
        <div class=\"form-group\">
            <div class=\"table table-responsive\">
                <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal \">
                    <thead>
                        <th>No</th>
                        <th>User name </th>
                        <th>Date of Birth </th>
                        <th>Last Package</th>
                        <th>Status</th>
                        
                    </thead>
                    <tbody>
                        ";
        // line 84
        if (((isset($context["userArray"]) || array_key_exists("userArray", $context)) &&  !twig_test_empty(($context["userArray"] ?? $this->getContext($context, "userArray"))))) {
            // line 85
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["userArray"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["userArray"]) {
                // line 86
                echo "                                <tr>
                                    <td>";
                // line 87
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute($context["userArray"], "user_name", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 89
                echo twig_escape_filter($this->env, $this->getAttribute($context["userArray"], "dob", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 90
                echo twig_escape_filter($this->env, $this->getAttribute($context["userArray"], "last_package", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute($context["userArray"], "package_status", []), "html", null, true);
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userArray'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 96
            echo "                        ";
        } else {
            // line 97
            echo "                            <tr><td class=\"text-center\">No Records Found </td></tr>
                        ";
        }
        // line 99
        echo "                        
                    </tbody>
                    <tfooter>
                       <th>No</th>
                        <th>User name </th>
                        <th>Date of Birth </th>
                        <th>Last Package</th>
                        <th>Status</th>
                    </tfooter>
                </table>
            </div>
        </div>


    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 119
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 120
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

    <script>
       
    \$(document).ready(function() {
       
        var dtable =  \$('#list').DataTable();
        \$(\"#month_datepicker\").datepicker({
            format: 'M-dd',
        });
    //\t\$('#example').DataTable();
    });
    function send_notification_filter_wise(){
        var msg_title = \$('#msg_title').val();
        var msg_text = \$('#message_text').val();
        var filter_status = \"";
        // line 135
        echo twig_escape_filter($this->env, ($context["filter_status"] ?? $this->getContext($context, "filter_status")), "html", null, true);
        echo "\";
        var dob_filter_date = \"";
        // line 136
        echo twig_escape_filter($this->env, ($context["dob_filter_date"] ?? $this->getContext($context, "dob_filter_date")), "html", null, true);
        echo "\" ;
        if(msg_title != '' && msg_text != '' ){
            \$.ajax({
                url : \"";
        // line 139
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_userreports_sendotificationfilter");
        echo "\",
                method:\"POST\",
                data: {'msg_title':msg_title ,'msg_text':msg_text ,'filter_status':filter_status,'dob_filter_date':dob_filter_date},
                success:function(){
                     alert('Sent Successfully')
                },
                error:function(){
                    alert('Something went Wrong.')
                }
            });
        }
        else{
            alert(\"Please Fill notification details\");
        }
        
    }
    </script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Userreports:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  323 => 139,  317 => 136,  313 => 135,  294 => 120,  288 => 119,  263 => 99,  259 => 97,  256 => 96,  237 => 91,  233 => 90,  229 => 89,  225 => 88,  221 => 87,  218 => 86,  200 => 85,  198 => 84,  155 => 48,  145 => 43,  139 => 42,  133 => 41,  121 => 32,  116 => 29,  107 => 26,  103 => 24,  98 => 23,  89 => 20,  85 => 18,  81 => 17,  74 => 13,  65 => 6,  59 => 5,  47 => 3,  31 => 1,);
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

{% block title %}Anona : User Package Report{% endblock %}
    
{% block content %}
    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
           User Package Report
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
            
            <form name=\"filterdatewise\" method=\"Post\" action = \"{{path('admin_userreports_index')}}\">
                <section class=\"col-lg-12 \">
                    <div class=\"box box-success\">
                        <div class=\"box-body\">
                            <div class=\"row\">
                                <div class=\"col-md-2\"><label>Select Status</label></div>
                                <div class=\"col-md-2\">
                                    <select class=\"form-control\" name='filter_status'>
                                        <option value=''>Select</option>
                                        <option value='active' {%if filter_status is defined and filter_status == 'active' %} selected {%endif%} >Active</option>
                                        <option value='expired' {%if filter_status is defined and filter_status == 'expired' %} selected {%endif%}>Expired</option>
                                        <option value='not_purchased' {%if filter_status is defined and filter_status == 'not_purchased' %} selected {%endif%}>Not Purchased</option>
                                    </select>
                                </div>
                                 <div class=\"col-md-2\"><label>Select DOB : </label></div>
                                <div class=\"col-md-2\">
                                    <input type='text' id=\"month_datepicker\" name='dob_filter_date' placeholder='Select Date' value='{%if dob_filter_date is defined and dob_filter_date is not empty %} {{dob_filter_date}} {%endif%}' class='form-control' />
                                </div>
                               
                                <div class=\"col-md-2\"><input type=\"submit\" name=\"submit\" value=\"Filter\" class=\"btn btn-success\"/></div>
                               
                            </div><hr>
                            <div class=\"row\">
                                <div class=\"col-md-2\"><label>Send Message to filtered List</label></div>
                                <div class=\"col-md-2\">
                                    <input type='text' name='msg_title' id='msg_title' placeholder='Enter Title' value='' class='form-control ' />
                                </div>
                                <div class=\"col-md-4\">
                                    <textarea id=\"message_text\" class=\"form-control\" placeholder=\"Enter Message to send as Notification\"></textarea>
                                </div>
                                
                               
                               <div class=\"col-md-2\"><input type=\"button\" onclick=\"send_notification_filter_wise();\" name=\"submit\" value=\"Send Notification\" class=\"btn btn-warning\"/></div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
        
        <div class=\"form-group\">
            <div class=\"table table-responsive\">
                <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal \">
                    <thead>
                        <th>No</th>
                        <th>User name </th>
                        <th>Date of Birth </th>
                        <th>Last Package</th>
                        <th>Status</th>
                        
                    </thead>
                    <tbody>
                        {%if userArray is defined and userArray is not empty %}
                            {%for userArray in userArray %}
                                <tr>
                                    <td>{{loop.index}}</td>
                                    <td>{{userArray.user_name}}</td>
                                    <td>{{userArray.dob}}</td>
                                    <td>{{userArray.last_package}}</td>
                                    <td>{{userArray.package_status}}</td>
                                    
                                    
                                </tr>
                            {%endfor%}
                        {%else%}
                            <tr><td class=\"text-center\">No Records Found </td></tr>
                        {%endif%}
                        
                    </tbody>
                    <tfooter>
                       <th>No</th>
                        <th>User name </th>
                        <th>Date of Birth </th>
                        <th>Last Package</th>
                        <th>Status</th>
                    </tfooter>
                </table>
            </div>
        </div>


    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

{% endblock %}

{% block js %}
    <script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>

    <script>
       
    \$(document).ready(function() {
       
        var dtable =  \$('#list').DataTable();
        \$(\"#month_datepicker\").datepicker({
            format: 'M-dd',
        });
    //\t\$('#example').DataTable();
    });
    function send_notification_filter_wise(){
        var msg_title = \$('#msg_title').val();
        var msg_text = \$('#message_text').val();
        var filter_status = \"{{filter_status}}\";
        var dob_filter_date = \"{{dob_filter_date}}\" ;
        if(msg_title != '' && msg_text != '' ){
            \$.ajax({
                url : \"{{path('admin_userreports_sendotificationfilter')}}\",
                method:\"POST\",
                data: {'msg_title':msg_title ,'msg_text':msg_text ,'filter_status':filter_status,'dob_filter_date':dob_filter_date},
                success:function(){
                     alert('Sent Successfully')
                },
                error:function(){
                    alert('Something went Wrong.')
                }
            });
        }
        else{
            alert(\"Please Fill notification details\");
        }
        
    }
    </script>\t
{% endblock %}", "AdminBundle:Userreports:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Userreports/index.html.twig");
    }
}
