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

/* AdminBundle:Customerservice:activeusers.html.twig */
class __TwigTemplate_5c3e0349cad339cb34d492568eae2287828f3fca07654e64b6a87c599aaaeb41 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Customerservice:activeusers.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Customerservice:activeusers.html.twig", 1);
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

                        <div class=\"row\">
                            <hr style=\"margin-top: 0px;margin-bottom: 0px;\" />
                        </div>

                        <div class=\"row\">
                            <div class=\"col-md-12\">
                                <h4>Active Users</h4>
                            </div>
                            <div class=\"col-md-12 form-group\">
                                <form class=\"form-horizontal\" method=\"post\" action=\"";
        // line 104
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_customerservice_sendnotificationcustomerserviceusers");
        echo "\" enctype=\"multipart/form-data\">
                                    <div class=\"row\">
                                        <div class=\"col-md-2\"><label>Notification Title</label></div>
                                        <div class=\"col-md-2\"><input type=\"text\" name=\"notification_title\" class=\"form-control\"><input type=\"hidden\" name=\"notification_type_to_send\" value=\"activeusers\"></div>
                                        <div class=\"col-md-2\"><label>Notification Message</label></div>
                                        <div class=\"col-md-3\"><input type=\"text\" name=\"notification_message\" class=\"form-control\"></div>
                                        <div class=\"col-md-2\"><input type=\"submit\" class=\"btn btn-info btn-sm\" value=\"Send Notification to Active Users\"/></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class=\"row\">
                            <hr style=\"margin-top: 0px;\" />
                        </div>

                        <div class=\"row form-group\">
                            <div class=\"col-md-12\">
                                <div class=\"col-md-6\">
                                    <form id=\"start_day_form\" name=\"\" action=\"\" method=\"post\">
                                        <label class=\"col-md-3\">Start Days</label>
                                        <div class=\"col-md-6\">
                                            <input type=\"text\" class=\"form-control\" id=\"start_day_filter\" name=\"start_day_filter\" value=\"";
        // line 125
        if ((($context["start_day_filter"] ?? $this->getContext($context, "start_day_filter")) != 0)) {
            echo twig_escape_filter($this->env, ($context["start_day_filter"] ?? $this->getContext($context, "start_day_filter")), "html", null, true);
        }
        echo "\"  placeholder=\"Enter number of days\">
                                        </div>
                                        <input type=\"submit\" class=\"col-md-2 btn btn-primary\" value=\"Filter\">
                                    </form>
                                </div>

                                <div class=\"col-md-6\">
                                    <form id=\"end_day_form\" name=\"\" action=\"\" method=\"post\">
                                        <label class=\"col-md-3\">End Days</label>
                                        <div class=\"col-md-6\">
                                            <input type=\"text\" class=\"form-control\" id=\"end_day_filter\" name=\"end_day_filter\" value=\"";
        // line 135
        if ((($context["end_day_filter"] ?? $this->getContext($context, "end_day_filter")) != 0)) {
            echo twig_escape_filter($this->env, ($context["end_day_filter"] ?? $this->getContext($context, "end_day_filter")), "html", null, true);
        }
        echo "\" placeholder=\"Enter number of days\">
                                        </div>
                                        <input type=\"submit\" class=\"col-md-2 btn btn-primary\" value=\"Filter\">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col-md-12 text-center\">
                                <div class=\"col-md-4\"></div>
                                <div class=\"col-md-4\">
                                    <form id=\"end_day_form\" name=\"\" action=\"\" method=\"post\">
                                        <input type=\"submit\" class=\"btn btn-warning\" value=\"Clear Filter\" name=\"clear_filter\">
                                    </form>
                                </div>
                                <div class=\"col-md-4\"></div>
                            </div>
                        </div>

                        <div class=\"row form-group\">
                            <hr style=\"margin-top: 0px;\" />
                        </div>



                        <div class=\"row form-group\">
                            <div class=\"col-md-12\">
                                <table id=\"datatable\" class=\"example table display table-striped table-bordered scroll-horizontal\">
                                    <thead>
                                    <th>No</th>
                                    <th>Order No</th>
                                    <th>Unique No</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    
                                    <th>Contact No</th>
                                    <th>Package Name</th>
                                    <th>Sub Package</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Remaining Days</th>
                                    </thead>
                                    <tbody>
                                        ";
        // line 178
        if (((isset($context["orderList"]) || array_key_exists("orderList", $context)) &&  !twig_test_empty(($context["orderList"] ?? $this->getContext($context, "orderList"))))) {
            // line 179
            echo "                                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["orderList"] ?? $this->getContext($context, "orderList")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 180
                echo "                                                <tr>
                                                    <td>";
                // line 181
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                                    <td><a href=\"";
                // line 182
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_vieworder", ["order_master_id" => $this->getAttribute($context["order"], "order_master_id", [])]), "html", null, true);
                echo "\" data-toggle=\"tooltip\" title=\"View Order\"  target=\"_blank\" >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "unique_no", []), "html", null, true);
                echo "</a></td>
                                                    <td>";
                // line 183
                echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "unique_user_id", []), "html", null, true);
                echo "</td>
                                                    <td><a href=\"";
                // line 184
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_viewuser", ["user_role_id" => 3, "user_id" => $this->getAttribute($context["order"], "order_by", [])]), "html", null, true);
                echo "\" data-toggle=\"tooltip\" title=\"View User Profile\"  target=\"_blank\" >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "customer_name", []), "html", null, true);
                echo "</a></td>
                                                    <td>";
                // line 185
                echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "email", []), "html", null, true);
                echo "</td>
                                                    
                                                    <td>";
                // line 187
                echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "mobile_no", []), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 188
                echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "package_name", []), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 189
                echo twig_escape_filter($this->env, (($this->getAttribute($context["order"], "package_grams", []) . "-") . $this->getAttribute($context["order"], "pk_for_name", [])), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 190
                echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "start_date", []), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 191
                echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "end_date", []), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 192
                echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "remaining_days", []), "html", null, true);
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 195
            echo "                                        ";
        }
        // line 196
        echo "                                    </tbody>
                                    <tfoot>
                                    <th>No</th>
                                    <th>Order No</th>
                                    <th>Unique No</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    
                                    <th>Contact No</th>
                                    <th>Package Name</th>
                                    <th>Sub Package</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Remaining Days</th>
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

    // line 225
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 226
        echo "    <script>
        \$(document).ready(function () {
            \$('.example').DataTable( {
                dom: 'Bfrtip',

               buttons: [
                   'copy', 'excel', 'pdf'
               ]
            } );

            \$('#end_day_form').submit(function () {
                \$('#start_day_filter').val()
                return true;
            });

            \$('#start_day_form').submit(function () {
                \$('#end_day_filter').val()
                return true;
            });
        });
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Customerservice:activeusers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  422 => 226,  416 => 225,  382 => 196,  379 => 195,  362 => 192,  358 => 191,  354 => 190,  350 => 189,  346 => 188,  342 => 187,  337 => 185,  331 => 184,  327 => 183,  321 => 182,  317 => 181,  314 => 180,  296 => 179,  294 => 178,  246 => 135,  231 => 125,  207 => 104,  185 => 85,  174 => 77,  165 => 71,  154 => 63,  145 => 57,  134 => 49,  125 => 43,  114 => 35,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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

                        <div class=\"row\">
                            <hr style=\"margin-top: 0px;margin-bottom: 0px;\" />
                        </div>

                        <div class=\"row\">
                            <div class=\"col-md-12\">
                                <h4>Active Users</h4>
                            </div>
                            <div class=\"col-md-12 form-group\">
                                <form class=\"form-horizontal\" method=\"post\" action=\"{{path('admin_customerservice_sendnotificationcustomerserviceusers')}}\" enctype=\"multipart/form-data\">
                                    <div class=\"row\">
                                        <div class=\"col-md-2\"><label>Notification Title</label></div>
                                        <div class=\"col-md-2\"><input type=\"text\" name=\"notification_title\" class=\"form-control\"><input type=\"hidden\" name=\"notification_type_to_send\" value=\"activeusers\"></div>
                                        <div class=\"col-md-2\"><label>Notification Message</label></div>
                                        <div class=\"col-md-3\"><input type=\"text\" name=\"notification_message\" class=\"form-control\"></div>
                                        <div class=\"col-md-2\"><input type=\"submit\" class=\"btn btn-info btn-sm\" value=\"Send Notification to Active Users\"/></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class=\"row\">
                            <hr style=\"margin-top: 0px;\" />
                        </div>

                        <div class=\"row form-group\">
                            <div class=\"col-md-12\">
                                <div class=\"col-md-6\">
                                    <form id=\"start_day_form\" name=\"\" action=\"\" method=\"post\">
                                        <label class=\"col-md-3\">Start Days</label>
                                        <div class=\"col-md-6\">
                                            <input type=\"text\" class=\"form-control\" id=\"start_day_filter\" name=\"start_day_filter\" value=\"{% if start_day_filter != 0 %}{{ start_day_filter }}{% endif %}\"  placeholder=\"Enter number of days\">
                                        </div>
                                        <input type=\"submit\" class=\"col-md-2 btn btn-primary\" value=\"Filter\">
                                    </form>
                                </div>

                                <div class=\"col-md-6\">
                                    <form id=\"end_day_form\" name=\"\" action=\"\" method=\"post\">
                                        <label class=\"col-md-3\">End Days</label>
                                        <div class=\"col-md-6\">
                                            <input type=\"text\" class=\"form-control\" id=\"end_day_filter\" name=\"end_day_filter\" value=\"{% if end_day_filter != 0 %}{{ end_day_filter }}{% endif %}\" placeholder=\"Enter number of days\">
                                        </div>
                                        <input type=\"submit\" class=\"col-md-2 btn btn-primary\" value=\"Filter\">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col-md-12 text-center\">
                                <div class=\"col-md-4\"></div>
                                <div class=\"col-md-4\">
                                    <form id=\"end_day_form\" name=\"\" action=\"\" method=\"post\">
                                        <input type=\"submit\" class=\"btn btn-warning\" value=\"Clear Filter\" name=\"clear_filter\">
                                    </form>
                                </div>
                                <div class=\"col-md-4\"></div>
                            </div>
                        </div>

                        <div class=\"row form-group\">
                            <hr style=\"margin-top: 0px;\" />
                        </div>



                        <div class=\"row form-group\">
                            <div class=\"col-md-12\">
                                <table id=\"datatable\" class=\"example table display table-striped table-bordered scroll-horizontal\">
                                    <thead>
                                    <th>No</th>
                                    <th>Order No</th>
                                    <th>Unique No</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    
                                    <th>Contact No</th>
                                    <th>Package Name</th>
                                    <th>Sub Package</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Remaining Days</th>
                                    </thead>
                                    <tbody>
                                        {% if orderList is defined and orderList is not empty %}
                                            {% for order in orderList %}
                                                <tr>
                                                    <td>{{ loop.index }}</td>
                                                    <td><a href=\"{{ path('admin_orders_vieworder', {'order_master_id': order.order_master_id}) }}\" data-toggle=\"tooltip\" title=\"View Order\"  target=\"_blank\" >{{ order.unique_no }}</a></td>
                                                    <td>{{ order.unique_user_id }}</td>
                                                    <td><a href=\"{{ path('admin_users_viewuser', {'user_role_id': 3, 'user_id': order.order_by}) }}\" data-toggle=\"tooltip\" title=\"View User Profile\"  target=\"_blank\" >{{ order.customer_name }}</a></td>
                                                    <td>{{ order.email }}</td>
                                                    
                                                    <td>{{ order.mobile_no }}</td>
                                                    <td>{{ order.package_name }}</td>
                                                    <td>{{ order.package_grams ~ '-' ~ order.pk_for_name }}</td>
                                                    <td>{{ order.start_date }}</td>
                                                    <td>{{ order.end_date }}</td>
                                                    <td>{{ order.remaining_days }}</td>
                                                </tr>
                                            {% endfor %}
                                        {% endif %}
                                    </tbody>
                                    <tfoot>
                                    <th>No</th>
                                    <th>Order No</th>
                                    <th>Unique No</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    
                                    <th>Contact No</th>
                                    <th>Package Name</th>
                                    <th>Sub Package</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Remaining Days</th>
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

            \$('#end_day_form').submit(function () {
                \$('#start_day_filter').val()
                return true;
            });

            \$('#start_day_form').submit(function () {
                \$('#end_day_filter').val()
                return true;
            });
        });
    </script>
{% endblock %}", "AdminBundle:Customerservice:activeusers.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Customerservice/activeusers.html.twig");
    }
}
