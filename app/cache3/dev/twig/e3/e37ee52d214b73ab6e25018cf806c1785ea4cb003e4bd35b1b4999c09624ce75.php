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

/* AdminBundle:DietitianCustomerservice:dietexpiredusers.html.twig */
class __TwigTemplate_404ffc813a86c9631814c278b51465387f8fea72d0cf2cb8c4102ee7de4ce8a7 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:DietitianCustomerservice:dietexpiredusers.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:DietitianCustomerservice:dietexpiredusers.html.twig", 1);
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
            Dietitian Customer Service
            <small>Expired Users</small>
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
                                ";
        // line 63
        echo "         
                                <a href=\"";
        // line 64
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dietitiancustomerservice_dietactiveusers");
        echo "\">
                                    <div class=\"col-md-6\">
                                        <div class=\"info-box\">
                                            <span class=\"info-box-icon bg-yellow\">
                                                <i class=\"fa fa-users\"></i>
                                            </span>
                                            <div class=\"info-box-content\">
                                                <span class=\"info-box-text\">Active Users</span>
                                                <span class=\"info-box-number\">";
        // line 72
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->controller("AdminBundle:Customerservice:activeusercount"));
        echo "</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href=\"";
        // line 78
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dietitiancustomerservice_dietexpiredusers");
        echo "\">
                                    <div class=\"col-md-6\">
                                        <div class=\"info-box\">
                                            <span class=\"info-box-icon bg-green\">
                                                <i class=\"fa fa-users\"></i>
                                            </span>
                                            <div class=\"info-box-content\">
                                                <span class=\"info-box-text\">Expired Users</span>
                                                <span class=\"info-box-number\">";
        // line 86
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
                               ";
        // line 101
        echo "                            </div>
                            <div class=\"col-md-12 form-group hide\">
                                <form class=\"form-horizontal\" method=\"post\" action=\"";
        // line 103
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_customerservice_sendnotificationcustomerserviceusers");
        echo "\" enctype=\"multipart/form-data\">
                                    <div class=\"row\">
                                        <div class=\"col-md-2\"><label>Notification Title</label></div>
                                        <div class=\"col-md-2\"><input type=\"text\" name=\"notification_title\" class=\"form-control\"><input type=\"hidden\" name=\"notification_type_to_send\" value=\"expiredusers\"></div>
                                        <div class=\"col-md-2\"><label>Notification Message</label></div>
                                        <div class=\"col-md-3\"><input type=\"text\" name=\"notification_message\" class=\"form-control\"></div>
                                        <div class=\"col-md-2\"><input type=\"submit\" class=\"btn btn-info btn-sm\" value=\"Send Notification to Expired Users\"/></div>
                                    </div>
                                </form>
                            </div>
                            <div class=\"col-md-12\">
                                <table id=\"datatable\" class=\"example table display table-striped table-bordered scroll-horizontal\">
                                    <thead>
                                    <th>No</th>
                                    <th>Unique Id</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Package Name</th>
                                    <th>Comment Status</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                        ";
        // line 126
        if (((isset($context["userList"]) || array_key_exists("userList", $context)) &&  !twig_test_empty(($context["userList"] ?? $this->getContext($context, "userList"))))) {
            // line 127
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
                // line 128
                echo "                                                <tr>
                                                    <td>";
                // line 129
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                                    <td>
                                                        <a href=\"";
                // line 131
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_viewuser", ["user_role_id" => 3, "user_id" => $this->getAttribute($context["user"], "order_by", [])]), "html", null, true);
                echo "\" data-toggle=\"tooltip\" title=\"View User Profile\" target=\"_blank\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "unique_user_id", []), "html", null, true);
                echo "</a>
                                                    </td>
                                                    <td><a href=\"";
                // line 133
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_viewuser", ["user_role_id" => 3, "user_id" => $this->getAttribute($context["user"], "order_by", [])]), "html", null, true);
                echo "\" data-toggle=\"tooltip\" title=\"View User Profile\"  target=\"_blank\" >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "customer_name", []), "html", null, true);
                echo "</td></a>
                                                    <td>";
                // line 134
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "mobile_no", []), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 135
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", []), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 136
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "package_name", []), "html", null, true);
                echo "</td>
                                                    <td>";
                // line 137
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "comment_status", []), "html", null, true);
                echo "</td>
                                                    <td><a onclick=\"get_details(";
                // line 138
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "order_master_id", []), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "order_by", []), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "unique_no", []), "html", null, true);
                echo ")\" class=\"fa fa-commenting-o\" data-toggle=\"modal\" data-target=\"#exampleModal\">

</a></td> 
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
            // line 143
            echo "                                        ";
        }
        // line 144
        echo "                                    </tbody>
                                    <tfoot>
                                    <th>No</th>
                                    <th>Unique Id</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Package Name</th>
                                    <th>Comment Status</th>
                                    <th>Action</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>\t\t
    </section>
    <div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Add Status</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <form action=\"";
        // line 173
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dietitiancustomerservice_savecomment");
        echo "\" method=\"post\">
      <div class=\"modal-body\">
        
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
        <button type=\"submit\" class=\"btn btn-primary\">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <!-- PAGE HEADER : END -->
    <!-- Main content : START -->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 190
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 191
        echo "    <script>
        \$(document).ready(function () {
           \$('.example').DataTable( {
                dom: 'Bfrtip',

               buttons: [
                   'copy', 'excel', 'pdf'
               ]
            } );
        });
         function get_details(order_master_id,user_id,unique_no){

  var url = \"";
        // line 203
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dietitiancustomerservice_getcomment");
        echo "/\"+order_master_id+\"/\"+user_id+\"/\"+unique_no;
            \$.ajax({
                url: url,
                success: function(response){
                    \$('.modal-body').html(response);
                },
                error: function(error){
                    console.log(error);
                }
            });
            }
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:DietitianCustomerservice:dietexpiredusers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  352 => 203,  338 => 191,  332 => 190,  309 => 173,  278 => 144,  275 => 143,  252 => 138,  248 => 137,  244 => 136,  240 => 135,  236 => 134,  230 => 133,  223 => 131,  218 => 129,  215 => 128,  197 => 127,  195 => 126,  169 => 103,  165 => 101,  148 => 86,  137 => 78,  128 => 72,  117 => 64,  114 => 63,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
            Dietitian Customer Service
            <small>Expired Users</small>
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
                                {#
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
                                   #}         
                                <a href=\"{{ path('admin_dietitiancustomerservice_dietactiveusers') }}\">
                                    <div class=\"col-md-6\">
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

                                <a href=\"{{ path('admin_dietitiancustomerservice_dietexpiredusers') }}\">
                                    <div class=\"col-md-6\">
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
                               {#  <h4>Expired Users</h4> #}
                            </div>
                            <div class=\"col-md-12 form-group hide\">
                                <form class=\"form-horizontal\" method=\"post\" action=\"{{path('admin_customerservice_sendnotificationcustomerserviceusers')}}\" enctype=\"multipart/form-data\">
                                    <div class=\"row\">
                                        <div class=\"col-md-2\"><label>Notification Title</label></div>
                                        <div class=\"col-md-2\"><input type=\"text\" name=\"notification_title\" class=\"form-control\"><input type=\"hidden\" name=\"notification_type_to_send\" value=\"expiredusers\"></div>
                                        <div class=\"col-md-2\"><label>Notification Message</label></div>
                                        <div class=\"col-md-3\"><input type=\"text\" name=\"notification_message\" class=\"form-control\"></div>
                                        <div class=\"col-md-2\"><input type=\"submit\" class=\"btn btn-info btn-sm\" value=\"Send Notification to Expired Users\"/></div>
                                    </div>
                                </form>
                            </div>
                            <div class=\"col-md-12\">
                                <table id=\"datatable\" class=\"example table display table-striped table-bordered scroll-horizontal\">
                                    <thead>
                                    <th>No</th>
                                    <th>Unique Id</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Package Name</th>
                                    <th>Comment Status</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                        {% if userList is defined and userList is not empty %}
                                            {% for user in userList %}
                                                <tr>
                                                    <td>{{ loop.index }}</td>
                                                    <td>
                                                        <a href=\"{{ path('admin_users_viewuser', {'user_role_id': 3, 'user_id': user.order_by}) }}\" data-toggle=\"tooltip\" title=\"View User Profile\" target=\"_blank\">{{ user.unique_user_id }}</a>
                                                    </td>
                                                    <td><a href=\"{{ path('admin_users_viewuser', {'user_role_id': 3, 'user_id': user.order_by}) }}\" data-toggle=\"tooltip\" title=\"View User Profile\"  target=\"_blank\" >{{ user.customer_name }}</td></a>
                                                    <td>{{ user.mobile_no }}</td>
                                                    <td>{{ user.email }}</td>
                                                    <td>{{ user.package_name }}</td>
                                                    <td>{{ user.comment_status }}</td>
                                                    <td><a onclick=\"get_details({{user.order_master_id}},{{user.order_by}},{{ user.unique_no }})\" class=\"fa fa-commenting-o\" data-toggle=\"modal\" data-target=\"#exampleModal\">

</a></td> 
                                                </tr>
                                            {% endfor %}
                                        {% endif %}
                                    </tbody>
                                    <tfoot>
                                    <th>No</th>
                                    <th>Unique Id</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Package Name</th>
                                    <th>Comment Status</th>
                                    <th>Action</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>\t\t
    </section>
    <div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Add Status</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <form action=\"{{ path('admin_dietitiancustomerservice_savecomment') }}\" method=\"post\">
      <div class=\"modal-body\">
        
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
        <button type=\"submit\" class=\"btn btn-primary\">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
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
         function get_details(order_master_id,user_id,unique_no){

  var url = \"{{ path('admin_dietitiancustomerservice_getcomment') }}/\"+order_master_id+\"/\"+user_id+\"/\"+unique_no;
            \$.ajax({
                url: url,
                success: function(response){
                    \$('.modal-body').html(response);
                },
                error: function(error){
                    console.log(error);
                }
            });
            }
    </script>
{% endblock %}", "AdminBundle:DietitianCustomerservice:dietexpiredusers.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/DietitianCustomerservice/dietexpiredusers.html.twig");
    }
}
