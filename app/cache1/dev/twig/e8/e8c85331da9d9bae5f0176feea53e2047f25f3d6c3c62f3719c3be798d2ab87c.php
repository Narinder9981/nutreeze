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

/* AdminBundle:Customerservice:notpaid.html.twig */
class __TwigTemplate_5f9c2b8310d05d794b44471d65698da615dedba774c5dc02fd55934de3bb49a6 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Customerservice:notpaid.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Customerservice:notpaid.html.twig", 1);
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
        <!-- PAGE TITLE -->
        <h1>
            Customer Service
            <small></small>
        </h1>
        <!-- BREADCUMB -->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
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
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">

                    <div class=\"box-body\">
                        <div class=\"row form-group\">
                            <div class=\"col-md-12\">
                                <a href=\"";
        // line 35
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_customerservice_notpaid");
        echo "\">
                                    <div class=\"col-md-3\">
                                        <div class=\"info-box\">
                                            <span class=\"info-box-icon bg-blue\">
                                                <i class=\"fa fa-users\"></i>
                                            </span>
                                            <div class=\"info-box-content\">
                                                <span class=\"info-box-text\">Not Subscribed</span>
                                                <span class=\"info-box-number\">";
        // line 43
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->controller("AdminBundle:Customerservice:notsubscribedusercount"));
        echo "</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                                 <a href=\"";
        // line 49
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_customerservice_triedtopurchaseusers");
        echo "\">
                                    <div class=\"col-md-3\">
                                        <div class=\"info-box\">
                                            <span class=\"info-box-icon bg-red-gradient\">
                                                <i class=\"fa fa-users\"></i>
                                            </span>
                                            <div class=\"info-box-content\">
                                                <span class=\"info-box-text\">Tried to Purchase Users</span>
                                                <span class=\"info-box-number\">";
        // line 57
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->controller("AdminBundle:Customerservice:triedtopurchasecount"));
        echo "</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>           
                                            
                                <a href=\"";
        // line 63
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_customerservice_activeusers");
        echo "\">
                                    <div class=\"col-md-3\">
                                        <div class=\"info-box\">
                                            <span class=\"info-box-icon bg-yellow\">
                                                <i class=\"fa fa-users\"></i>
                                            </span>
                                            <div class=\"info-box-content\">
                                                <span class=\"info-box-text\">Active Users</span>
                                                <span class=\"info-box-number\">";
        // line 71
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->controller("AdminBundle:Customerservice:activeusercount"));
        echo "</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href=\"";
        // line 77
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_customerservice_expiredusers");
        echo "\">
                                    <div class=\"col-md-3\">
                                        <div class=\"info-box\">
                                            <span class=\"info-box-icon bg-green\">
                                                <i class=\"fa fa-users\"></i>
                                            </span>
                                            <div class=\"info-box-content\">
                                                <span class=\"info-box-text\">Expired Users</span>
                                                <span class=\"info-box-number\">";
        // line 85
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->controller("AdminBundle:Customerservice:expiredusercount"));
        echo "</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                                 
                            </div>
                        </div>

                        <hr style=\"margin-top: 0px;margin-bottom: 0px;\" />

                        <div class=\"row form-group\">
                            <div class=\"col-md-12 form-group\">
                                <h4>Not Subscribed Users</h4>
                            </div>
                            <div class=\"col-md-12 form-group\">
                                <form class=\"form-horizontal\" method=\"post\" action=\"";
        // line 102
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_customerservice_sendnotificationcustomerserviceusers");
        echo "\" enctype=\"multipart/form-data\">
                                    <div class=\"row\">
                                        <div class=\"col-md-2\"><label>Notification Title</label></div>
                                        <div class=\"col-md-2\"><input type=\"text\" name=\"notification_title\" class=\"form-control\"><input type=\"hidden\" name=\"notification_type_to_send\" value=\"notsubscribedusers\"></div>
                                        <div class=\"col-md-2\"><label>Notification Message</label></div>
                                        <div class=\"col-md-3\"><input type=\"text\" name=\"notification_message\" class=\"form-control\"></div>
                                        <div class=\"col-md-2\"><input type=\"submit\" class=\"btn btn-info btn-sm\" value=\"Send Notification to Not Subscribed Users\"/></div>
                                    </div>
                                </form>
                            </div>

                            <div class=\"col-md-12\">
                                <table id=\"datatable\" class=\"example table display table-striped table-bordered scroll-horizontal\">
                                    <thead>
                                    <th>No</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Unique No</th>
                                    <th>Contact No</th>
                                    <th>Package Name</th>
                                    <th>Sub Package</th>
                                    <th>Start Date / End Date</th>
                                    <th>Created Datetime</th>
                                    </thead>
                                    <tbody>
                                        ";
        // line 127
        if (((isset($context["userList"]) || array_key_exists("userList", $context)) &&  !twig_test_empty(($context["userList"] ?? $this->getContext($context, "userList"))))) {
            // line 128
            echo "                                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["userList"] ?? $this->getContext($context, "userList")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 129
                echo "                                                <tr>
                                                    <td>";
                // line 130
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                                    <td><a href=\"";
                // line 131
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_viewuser", ["user_role_id" => 3, "user_id" => $this->getAttribute($context["user"], "order_by", [])]), "html", null, true);
                echo "\" data-toggle=\"tooltip\" title=\"View User Profile\"  target=\"_blank\" >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "customer_name", []), "html", null, true);
                echo "</a></td>
                                                    <td>";
                // line 132
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", []), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 133
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "unique_user_id", []), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 134
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "mobile_no", []), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 135
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "package_name", []), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 136
                echo twig_escape_filter($this->env, (($this->getAttribute($context["user"], "package_grams", []) . "-") . $this->getAttribute($context["user"], "pk_for_name", [])), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 137
                echo twig_escape_filter($this->env, (($this->getAttribute($context["user"], "start_date", []) . " / ") . $this->getAttribute($context["user"], "end_date", [])), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 138
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["user"], "created_date", []), "Y-m-d H:i"), "html", null, true);
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 141
            echo "                                        ";
        }
        // line 142
        echo "                                    </tbody>
                                    <tfoot>
                                    <th>No</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Unique No</th>
                                    <th>Contact No</th>
                                    <th>Package Name</th>
                                    <th>Sub Package</th>
                                    <th>Start Date / End Date</th>
                                    <th>Created Datetime</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>\t\t
    </section>
    <!-- PAGE HEADER : END -->
    <!-- Main content : START -->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 168
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 169
        echo "    <script>
        \$(document).ready(function () {
           \$('.example').DataTable( {
                dom: 'Bfrtip',

               buttons: [
                   'copy', 'excel', 'pdf'
               ]
            } );
        });
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Customerservice:notpaid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  347 => 169,  341 => 168,  310 => 142,  307 => 141,  290 => 138,  286 => 137,  282 => 136,  278 => 135,  274 => 134,  270 => 133,  266 => 132,  260 => 131,  256 => 130,  253 => 129,  235 => 128,  233 => 127,  205 => 102,  185 => 85,  174 => 77,  165 => 71,  154 => 63,  145 => 57,  134 => 49,  125 => 43,  114 => 35,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
        <!-- PAGE TITLE -->
        <h1>
            Customer Service
            <small></small>
        </h1>
        <!-- BREADCUMB -->
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

                    <div class=\"box-body\">
                        <div class=\"row form-group\">
                            <div class=\"col-md-12\">
                                <a href=\"{{ path('admin_customerservice_notpaid') }}\">
                                    <div class=\"col-md-3\">
                                        <div class=\"info-box\">
                                            <span class=\"info-box-icon bg-blue\">
                                                <i class=\"fa fa-users\"></i>
                                            </span>
                                            <div class=\"info-box-content\">
                                                <span class=\"info-box-text\">Not Subscribed</span>
                                                <span class=\"info-box-number\">{{ render(controller('AdminBundle:Customerservice:notsubscribedusercount')) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                                 <a href=\"{{ path('admin_customerservice_triedtopurchaseusers') }}\">
                                    <div class=\"col-md-3\">
                                        <div class=\"info-box\">
                                            <span class=\"info-box-icon bg-red-gradient\">
                                                <i class=\"fa fa-users\"></i>
                                            </span>
                                            <div class=\"info-box-content\">
                                                <span class=\"info-box-text\">Tried to Purchase Users</span>
                                                <span class=\"info-box-number\">{{ render(controller('AdminBundle:Customerservice:triedtopurchasecount')) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>           
                                            
                                <a href=\"{{ path('admin_customerservice_activeusers') }}\">
                                    <div class=\"col-md-3\">
                                        <div class=\"info-box\">
                                            <span class=\"info-box-icon bg-yellow\">
                                                <i class=\"fa fa-users\"></i>
                                            </span>
                                            <div class=\"info-box-content\">
                                                <span class=\"info-box-text\">Active Users</span>
                                                <span class=\"info-box-number\">{{ render(controller('AdminBundle:Customerservice:activeusercount')) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href=\"{{ path('admin_customerservice_expiredusers') }}\">
                                    <div class=\"col-md-3\">
                                        <div class=\"info-box\">
                                            <span class=\"info-box-icon bg-green\">
                                                <i class=\"fa fa-users\"></i>
                                            </span>
                                            <div class=\"info-box-content\">
                                                <span class=\"info-box-text\">Expired Users</span>
                                                <span class=\"info-box-number\">{{ render(controller('AdminBundle:Customerservice:expiredusercount')) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                                 
                            </div>
                        </div>

                        <hr style=\"margin-top: 0px;margin-bottom: 0px;\" />

                        <div class=\"row form-group\">
                            <div class=\"col-md-12 form-group\">
                                <h4>Not Subscribed Users</h4>
                            </div>
                            <div class=\"col-md-12 form-group\">
                                <form class=\"form-horizontal\" method=\"post\" action=\"{{path('admin_customerservice_sendnotificationcustomerserviceusers')}}\" enctype=\"multipart/form-data\">
                                    <div class=\"row\">
                                        <div class=\"col-md-2\"><label>Notification Title</label></div>
                                        <div class=\"col-md-2\"><input type=\"text\" name=\"notification_title\" class=\"form-control\"><input type=\"hidden\" name=\"notification_type_to_send\" value=\"notsubscribedusers\"></div>
                                        <div class=\"col-md-2\"><label>Notification Message</label></div>
                                        <div class=\"col-md-3\"><input type=\"text\" name=\"notification_message\" class=\"form-control\"></div>
                                        <div class=\"col-md-2\"><input type=\"submit\" class=\"btn btn-info btn-sm\" value=\"Send Notification to Not Subscribed Users\"/></div>
                                    </div>
                                </form>
                            </div>

                            <div class=\"col-md-12\">
                                <table id=\"datatable\" class=\"example table display table-striped table-bordered scroll-horizontal\">
                                    <thead>
                                    <th>No</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Unique No</th>
                                    <th>Contact No</th>
                                    <th>Package Name</th>
                                    <th>Sub Package</th>
                                    <th>Start Date / End Date</th>
                                    <th>Created Datetime</th>
                                    </thead>
                                    <tbody>
                                        {% if userList is defined and userList is not empty %}
                                            {% for user in userList %}
                                                <tr>
                                                    <td>{{ loop.index }}</td>
                                                    <td><a href=\"{{ path('admin_users_viewuser', {'user_role_id': 3, 'user_id': user.order_by}) }}\" data-toggle=\"tooltip\" title=\"View User Profile\"  target=\"_blank\" >{{ user.customer_name }}</a></td>
                                                    <td>{{ user.email}}</td>
                                                    <td>{{ user.unique_user_id }}</td>
                                                    <td>{{ user.mobile_no }}</td>
                                                    <td>{{ user.package_name }}</td>
                                                    <td>{{ user.package_grams ~ '-' ~ user.pk_for_name }}</td>
                                                    <td>{{ user.start_date ~ ' / ' ~ user.end_date }}</td>
                                                    <td>{{ user.created_date | date('Y-m-d H:i') }}</td>
                                                </tr>
                                            {% endfor %}
                                        {% endif %}
                                    </tbody>
                                    <tfoot>
                                    <th>No</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Unique No</th>
                                    <th>Contact No</th>
                                    <th>Package Name</th>
                                    <th>Sub Package</th>
                                    <th>Start Date / End Date</th>
                                    <th>Created Datetime</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>\t\t
    </section>
    <!-- PAGE HEADER : END -->
    <!-- Main content : START -->

{% endblock %}

{% block js %}
    <script>
        \$(document).ready(function () {
           \$('.example').DataTable( {
                dom: 'Bfrtip',

               buttons: [
                   'copy', 'excel', 'pdf'
               ]
            } );
        });
    </script>
{% endblock %}", "AdminBundle:Customerservice:notpaid.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Customerservice/notpaid.html.twig");
    }
}
