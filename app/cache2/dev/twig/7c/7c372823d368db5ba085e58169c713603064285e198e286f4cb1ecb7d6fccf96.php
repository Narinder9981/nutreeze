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

/* AdminBundle:Users:viewUser.html.twig */
class __TwigTemplate_b951302126aa30af3fe0a8b1501e5d60296fc985537597b768956789d2ed15ee extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Users:viewUser.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Users:viewUser.html.twig", 1);
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
\t\t  User Details
\t\t</h1>
\t<!------- BREADCUMB --------------------->
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t";
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
        echo "\t\t
\t\t";
        // line 27
        $context["status_name"] = [0 => "pending", 1 => "accept", 2 => "reject", 3 => "cancel", 4 => "success", 5 => "ongoing"];
        // line 28
        echo "\t\t\t\t\t
\t\t";
        // line 29
        if (((isset($context["users"]) || array_key_exists("users", $context)) &&  !twig_test_empty(($context["users"] ?? $this->getContext($context, "users"))))) {
            // line 30
            echo "\t\t\t<section class=\"invoice\" id=\"invoice\"> \t\t\t\t\t
\t\t\t  <!-- title row -->
\t\t\t  <div class=\"row\">
\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t  <h2 class=\"page-header\">
\t\t\t\t\t<i class=\"fa fa-user\"></i>";
            // line 35
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_firstname", []) . " ") . $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_lastname", [])), "html", null, true);
            echo "
\t\t\t\t\t<a href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => ($context["user_role_id"] ?? $this->getContext($context, "user_role_id"))]), "html", null, true);
            echo "\" class=\"btn btn-sm btn-primary pull-right\">Back</a>\t\t\t\t\t\t\t
\t\t\t\t  </h2>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
\t\t\t  <!-- info row -->
\t\t\t  <div class=\"row invoice-info\">
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t  <h3>User Details</h3> </br>
\t\t\t\t\t";
            // line 45
            if (($this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "media_url", []) != "")) {
                // line 46
                echo "\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "media_url", []), "html", null, true);
                echo "\" data-fancybox=\"gallery\">\t
\t\t\t\t\t\t\t<img src=\"";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "media_url", []), "html", null, true);
                echo "\" class='img-thumbnail img-responsive' style=\"height:50px;width:50px\" />
\t\t\t\t\t\t</a>
\t\t\t\t\t";
            } else {
                // line 50
                echo "\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/images/no_img.png"), "html", null, true);
                echo "\" data-fancybox=\"gallery\"\">
\t\t\t\t\t\t\t<img src=\"";
                // line 51
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/images/no_img.png"), "html", null, true);
                echo "\" class='img-thumbnail img-responsive' style=\"height:50px;width:50px\" />\t
\t\t\t\t\t\t</a>\t
\t\t\t\t\t";
            }
            // line 54
            echo "\t\t\t\t\t</br>
\t\t\t\t\t<b>Name</b> : ";
            // line 55
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_firstname", []) . " ") . $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_lastname", [])), "html", null, true);
            echo "</br>\t
\t\t\t\t\t<b>Mobile No : </b>  ";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_mobile", []), "html", null, true);
            echo "\t</br>
\t\t\t\t\t<b>Email : </b>  ";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "email", []), "html", null, true);
            echo "\t</br>
\t\t\t\t\t<b>Gender : </b>  ";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_gender", []), "html", null, true);
            echo "\t</br>
\t\t\t\t\t<b>Date of Birth : </b>  ";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "date_of_birth", []), "html", null, true);
            echo "\t</br>
\t\t\t\t\t<b>Height : </b>  ";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "height", []), "html", null, true);
            echo "\t</br>
\t\t\t\t\t<b>Weight : </b>  ";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "weight", []), "html", null, true);
            echo "\t</br>
\t\t\t\t\t<b>Area : </b>  ";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "area_name", []), "html", null, true);
            echo "</br>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t\t
\t\t\t\t<!-- /.col -->
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t\t<h3>Address Details</h3></br>
\t\t\t\t\t";
            // line 69
            if (($this->getAttribute(($context["users"] ?? null), "address_details", [], "any", true, true) &&  !twig_test_empty($this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "address_details", [])))) {
                // line 70
                echo "\t\t\t\t\t\t";
                $context["del_addr"] = $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "address_details", []);
                // line 71
                echo "\t\t\t\t\t\t<address>
\t\t\t\t\t\tHouse no : ";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "flate_house_number", []), "html", null, true);
                echo ",Building Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "society_building_name", []), "html", null, true);
                echo ",</br>
\t\t\t\t\t\t";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "address_name", []), "html", null, true);
                echo ",
\t\t\t\t\t\tStreet  : ";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "street", []), "html", null, true);
                echo ",</br>
\t\t\t\t\t\tArea : ";
                // line 75
                echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "area_name", []), "html", null, true);
                echo "</br>
\t\t\t\t\t\tContact no : ";
                // line 76
                if (($this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "contact_no", []) != 0)) {
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "contact_no", []), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_mobile", []), "html", null, true);
                }
                // line 77
                echo "\t\t\t\t\t\t</address>
\t\t\t\t\t";
            }
            // line 78
            echo "\t\t\t\t
\t\t\t\t
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
\t\t\t  <!-- /.row -->
\t\t\t  </br></br>
\t\t\t  <!-- Table row -->
                 ";
            // line 103
            echo "\t\t\t  <!-- /.row -->

\t\t\t</section>
                        <section class=\"invoice\">
                            <form name=\"updatepassword\" action=\"";
            // line 107
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_updatepassword");
            echo "\" method=\"POST\">
                            <div class=\"row\">
                                <div class=\"col-md-12 \">
                                    <input type=\"hidden\" value=\"";
            // line 110
            echo twig_escape_filter($this->env, ($context["user_master_id"] ?? $this->getContext($context, "user_master_id")), "html", null, true);
            echo "\" name =\"user_master_id\" />
                                    <div class=\"col-md-2\"><label>New Password</label></div>
                                    <div class=\"col-md-2\"><input type=\"password\" name=\"update_password\" class=\"form-control\" placeholder=\"Enter New Password\" required /></div>
                                    <div class=\"col-md-2\"><input type=\"submit\" name=\"Update\" value=\"Update\" class=\"btn btn-primary\"/></div>
                                     <div class=\"col-md-2 hide \"><label>Wallet Amount</label></div>
                                    <div class=\"col-md-2 hide\"><input type=\"text\" name=\"wallet_amount_s\" class=\"form-control\"  value=\"";
            // line 115
            echo twig_escape_filter($this->env, ($context["wallet_amount"] ?? $this->getContext($context, "wallet_amount")), "html", null, true);
            echo "\" disabled /></div>
                                </div>
                            </div>
                            </form>
                        </section>
                        <section class=\"invoice hide\">
                           
                            <div class=\"row\">
                            \t
                                <div class=\"col-md-12\">
                                   <form name=\"updatepassword\" action=\"";
            // line 125
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_withdrawwalletamount");
            echo "\" method=\"POST\">
\t                                    <div class=\"col-md-2\"><label>Withdraw Amount</label></div>
\t                                      <input type=\"hidden\" value=\"";
            // line 127
            echo twig_escape_filter($this->env, ($context["user_master_id"] ?? $this->getContext($context, "user_master_id")), "html", null, true);
            echo "\" name =\"user_master_id\" />
\t                                      <input type=\"hidden\" value=\"";
            // line 128
            echo twig_escape_filter($this->env, ($context["user_role_id"] ?? $this->getContext($context, "user_role_id")), "html", null, true);
            echo "\" name =\"role_id_p\" />
\t                                 
\t                                    <div class=\"col-md-2\"><input type=\"text\" name=\"withdraw_amount\" class=\"form-control\"  /></div>
\t                                     <div class=\"col-md-2\"><input type=\"submit\" name=\"withdraw_wallet\" value=\"Withdraw Wallet\" class=\"btn btn-primary\"/></div>
                                     </form>
                                      <form name=\"updatepassword\" action=\"";
            // line 133
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_addwwalletamount");
            echo "\" method=\"POST\">
\t                                      <div class=\"col-md-2\"><label>Add Amount</label></div>
\t                                      <input type=\"hidden\" value=\"";
            // line 135
            echo twig_escape_filter($this->env, ($context["user_master_id"] ?? $this->getContext($context, "user_master_id")), "html", null, true);
            echo "\" name =\"user_master_id\" />
\t                                      <input type=\"hidden\" value=\"";
            // line 136
            echo twig_escape_filter($this->env, ($context["user_role_id"] ?? $this->getContext($context, "user_role_id")), "html", null, true);
            echo "\" name =\"role_id_p\" />
\t                                 
\t                                    <div class=\"col-md-2\"><input type=\"text\t\" name=\"add_amount\" class=\"form-control\"   /></div>
\t                                     <div class=\"col-md-2\"><input type=\"submit\" name=\"add_wallet\" value=\"Add Wallet\" class=\"btn btn-primary\"/></div>
                                    </form>
                                </div>
                                
                            </div><br>
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                   
                                    <table class=\"table\">
                                    \t<thead>
                                    \t\t<th>No</th>
                                    \t\t<th>Wallet Action</th>
                                    \t\t<th>Transaction for</th>
                                    \t\t<th>Order No</th>
                                    \t\t<th>Package</th>
                                    \t\t<th>Previous Amount</th>
                                    \t\t<th>Transaction Amount</th>
                                    \t\t<th>Balance Amount</th>
                                    \t\t<th>Created Datetime</th>
                                \t\t</thead>
                                \t\t<tbody>
                                \t\t\t";
            // line 160
            if (((isset($context["walletTransactionInfo"]) || array_key_exists("walletTransactionInfo", $context)) &&  !twig_test_empty(($context["walletTransactionInfo"] ?? $this->getContext($context, "walletTransactionInfo"))))) {
                // line 161
                echo "                                \t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["walletTransactionInfo"]);
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
                foreach ($context['_seq'] as $context["_key"] => $context["walletTransactionInfo"]) {
                    // line 162
                    echo "                                \t\t\t\t\t<tr>\t
                                \t\t\t\t\t\t<td>";
                    // line 163
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                    echo "</td>
                                \t\t\t\t\t\t<td>";
                    // line 164
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["walletTransactionInfo"], "wallet_action", [])), "html", null, true);
                    echo "</td>
                                \t\t\t\t\t\t<td>";
                    // line 165
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["walletTransactionInfo"], "transaction_for", [])), "html", null, true);
                    echo "</td>
                                \t\t\t\t\t\t<td>";
                    // line 166
                    echo twig_escape_filter($this->env, $this->getAttribute($context["walletTransactionInfo"], "orderNo", []), "html", null, true);
                    echo "</td>
                                \t\t\t\t\t\t<td>";
                    // line 167
                    echo twig_escape_filter($this->env, $this->getAttribute($context["walletTransactionInfo"], "package_name", []), "html", null, true);
                    echo "</td>
                                \t\t\t\t\t\t<td>";
                    // line 168
                    echo twig_escape_filter($this->env, $this->getAttribute($context["walletTransactionInfo"], "previous_amount", []), "html", null, true);
                    echo "</td>
                                \t\t\t\t\t\t
                                \t\t\t\t\t\t
                                \t\t\t\t\t\t<td>";
                    // line 171
                    echo twig_escape_filter($this->env, $this->getAttribute($context["walletTransactionInfo"], "transaction_amount", []), "html", null, true);
                    echo "</td>
                                \t\t\t\t\t\t<td>";
                    // line 172
                    echo twig_escape_filter($this->env, $this->getAttribute($context["walletTransactionInfo"], "after_action_amount", []), "html", null, true);
                    echo "</td>
                                \t\t\t\t\t\t<td>";
                    // line 173
                    echo twig_escape_filter($this->env, $this->getAttribute($context["walletTransactionInfo"], "action_created_datetime", []), "html", null, true);
                    echo "</td>
                                \t\t\t\t\t
                                \t\t\t\t\t</tr>
                                \t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['walletTransactionInfo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 177
                echo "                                \t\t\t";
            }
            // line 178
            echo "                                \t\t</tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </section>
\t\t\t
\t\t";
        }
        // line 186
        echo "</section>\t\t
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 192
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 193
        echo "  <script>
\t\t  

  
\tfunction change_status(order_master_id,element){
\t\t
\t\tvar status = element.val();
\t\t\$.ajax({
\t\t\turl : \"\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'status':status},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Status updated successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}
\t
    \$(document).ready(function() {
\t\t\$('#datatable').DataTable();
\t  
\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});\t  
    });
\t
\tfunction printDivInvoice() 
\t{

\t  var divToPrint=document.getElementById('invoice');

\t  var newWin=window.open('','Print-Window');

\t  newWin.document.open();

\t  newWin.document.write(\"<html><body onload='window.print()'>\"+divToPrint.innerHTML);

\t  newWin.document.close();

\t  setTimeout(function(){newWin.close();},10);

\t}
\t\t
  </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Users:viewUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  438 => 193,  432 => 192,  421 => 186,  411 => 178,  408 => 177,  390 => 173,  386 => 172,  382 => 171,  376 => 168,  372 => 167,  368 => 166,  364 => 165,  360 => 164,  356 => 163,  353 => 162,  335 => 161,  333 => 160,  306 => 136,  302 => 135,  297 => 133,  289 => 128,  285 => 127,  280 => 125,  267 => 115,  259 => 110,  253 => 107,  247 => 103,  237 => 78,  233 => 77,  227 => 76,  223 => 75,  219 => 74,  215 => 73,  209 => 72,  206 => 71,  203 => 70,  201 => 69,  191 => 62,  187 => 61,  183 => 60,  179 => 59,  175 => 58,  171 => 57,  167 => 56,  163 => 55,  160 => 54,  154 => 51,  149 => 50,  143 => 47,  138 => 46,  136 => 45,  124 => 36,  120 => 35,  113 => 30,  111 => 29,  108 => 28,  106 => 27,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  User Details
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
\t\t{%set status_name = ['pending','accept','reject','cancel','success','ongoing'] %}
\t\t\t\t\t
\t\t{%if users is defined and users is not empty%}
\t\t\t<section class=\"invoice\" id=\"invoice\"> \t\t\t\t\t
\t\t\t  <!-- title row -->
\t\t\t  <div class=\"row\">
\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t  <h2 class=\"page-header\">
\t\t\t\t\t<i class=\"fa fa-user\"></i>{{users.user_firstname ~' '~ users.user_lastname}}
\t\t\t\t\t<a href=\"{{path('admin_users_index',{'user_role_id':user_role_id})}}\" class=\"btn btn-sm btn-primary pull-right\">Back</a>\t\t\t\t\t\t\t
\t\t\t\t  </h2>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
\t\t\t  <!-- info row -->
\t\t\t  <div class=\"row invoice-info\">
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t  <h3>User Details</h3> </br>
\t\t\t\t\t{%if users.media_url != ''%}
\t\t\t\t\t\t<a href=\"{{users.media_url}}\" data-fancybox=\"gallery\">\t
\t\t\t\t\t\t\t<img src=\"{{users.media_url}}\" class='img-thumbnail img-responsive' style=\"height:50px;width:50px\" />
\t\t\t\t\t\t</a>
\t\t\t\t\t{%else%}
\t\t\t\t\t\t<a href=\"{{asset('bundles/design/images/no_img.png')}}\" data-fancybox=\"gallery\"\">
\t\t\t\t\t\t\t<img src=\"{{asset('bundles/design/images/no_img.png')}}\" class='img-thumbnail img-responsive' style=\"height:50px;width:50px\" />\t
\t\t\t\t\t\t</a>\t
\t\t\t\t\t{%endif%}
\t\t\t\t\t</br>
\t\t\t\t\t<b>Name</b> : {{users.user_firstname ~' '~ users.user_lastname}}</br>\t
\t\t\t\t\t<b>Mobile No : </b>  {{users.user_mobile}}\t</br>
\t\t\t\t\t<b>Email : </b>  {{users.email}}\t</br>
\t\t\t\t\t<b>Gender : </b>  {{users.user_gender}}\t</br>
\t\t\t\t\t<b>Date of Birth : </b>  {{users.date_of_birth}}\t</br>
\t\t\t\t\t<b>Height : </b>  {{users.height}}\t</br>
\t\t\t\t\t<b>Weight : </b>  {{users.weight}}\t</br>
\t\t\t\t\t<b>Area : </b>  {{users.area_name}}</br>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t\t
\t\t\t\t<!-- /.col -->
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t\t<h3>Address Details</h3></br>
\t\t\t\t\t{%if users.address_details is defined and users.address_details is not empty%}
\t\t\t\t\t\t{% set del_addr = users.address_details%}
\t\t\t\t\t\t<address>
\t\t\t\t\t\tHouse no : {{del_addr.flate_house_number}},Building Name : {{del_addr.society_building_name}},</br>
\t\t\t\t\t\t{{del_addr.address_name}},
\t\t\t\t\t\tStreet  : {{del_addr.street}},</br>
\t\t\t\t\t\tArea : {{users.area_name}}</br>
\t\t\t\t\t\tContact no : {% if del_addr.contact_no != 0 %}{{del_addr.contact_no}}{% else %}{{ users.user_mobile }}{% endif %}
\t\t\t\t\t\t</address>
\t\t\t\t\t{%endif%}\t\t\t\t
\t\t\t\t
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
\t\t\t  <!-- /.row -->
\t\t\t  </br></br>
\t\t\t  <!-- Table row -->
                 {#
\t\t\t  <div class=\"row\">
\t\t\t\t<div class=\"col-xs-12 table-responsive\">
\t\t\t\t\t<h3>Body Report</h3></br>
\t\t\t\t\t{%if users.body_report_img != ''%}
\t\t\t\t\t\t<a href=\"{{users.body_report_img}}\" data-fancybox=\"gallery\" data-caption = \"Body Report\">\t
\t\t\t\t\t\t\t<img src=\"{{users.body_report_img}}\" class='img-thumbnail img-responsive' style=\"height:50px;width:50px\" />
\t\t\t\t\t\t</a>
\t\t\t\t\t{%else%}
\t\t\t\t\t\t<a href=\"{{asset('bundles/design/images/no_img.png')}}\" data-fancybox=\"gallery\"\">
\t\t\t\t\t\t\t<img src=\"{{asset('bundles/design/images/no_img.png')}}\" class='img-thumbnail img-responsive' style=\"height:50px;width:50px\" />\t
\t\t\t\t\t\t</a>\t
\t\t\t\t\t{%endif%}\t\t\t\t
\t\t\t\t
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div> #}
\t\t\t  <!-- /.row -->

\t\t\t</section>
                        <section class=\"invoice\">
                            <form name=\"updatepassword\" action=\"{{path('admin_users_updatepassword')}}\" method=\"POST\">
                            <div class=\"row\">
                                <div class=\"col-md-12 \">
                                    <input type=\"hidden\" value=\"{{user_master_id}}\" name =\"user_master_id\" />
                                    <div class=\"col-md-2\"><label>New Password</label></div>
                                    <div class=\"col-md-2\"><input type=\"password\" name=\"update_password\" class=\"form-control\" placeholder=\"Enter New Password\" required /></div>
                                    <div class=\"col-md-2\"><input type=\"submit\" name=\"Update\" value=\"Update\" class=\"btn btn-primary\"/></div>
                                     <div class=\"col-md-2 hide \"><label>Wallet Amount</label></div>
                                    <div class=\"col-md-2 hide\"><input type=\"text\" name=\"wallet_amount_s\" class=\"form-control\"  value=\"{{wallet_amount}}\" disabled /></div>
                                </div>
                            </div>
                            </form>
                        </section>
                        <section class=\"invoice hide\">
                           
                            <div class=\"row\">
                            \t
                                <div class=\"col-md-12\">
                                   <form name=\"updatepassword\" action=\"{{path('admin_users_withdrawwalletamount')}}\" method=\"POST\">
\t                                    <div class=\"col-md-2\"><label>Withdraw Amount</label></div>
\t                                      <input type=\"hidden\" value=\"{{user_master_id}}\" name =\"user_master_id\" />
\t                                      <input type=\"hidden\" value=\"{{user_role_id}}\" name =\"role_id_p\" />
\t                                 
\t                                    <div class=\"col-md-2\"><input type=\"text\" name=\"withdraw_amount\" class=\"form-control\"  /></div>
\t                                     <div class=\"col-md-2\"><input type=\"submit\" name=\"withdraw_wallet\" value=\"Withdraw Wallet\" class=\"btn btn-primary\"/></div>
                                     </form>
                                      <form name=\"updatepassword\" action=\"{{path('admin_users_addwwalletamount')}}\" method=\"POST\">
\t                                      <div class=\"col-md-2\"><label>Add Amount</label></div>
\t                                      <input type=\"hidden\" value=\"{{user_master_id}}\" name =\"user_master_id\" />
\t                                      <input type=\"hidden\" value=\"{{user_role_id}}\" name =\"role_id_p\" />
\t                                 
\t                                    <div class=\"col-md-2\"><input type=\"text\t\" name=\"add_amount\" class=\"form-control\"   /></div>
\t                                     <div class=\"col-md-2\"><input type=\"submit\" name=\"add_wallet\" value=\"Add Wallet\" class=\"btn btn-primary\"/></div>
                                    </form>
                                </div>
                                
                            </div><br>
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                   
                                    <table class=\"table\">
                                    \t<thead>
                                    \t\t<th>No</th>
                                    \t\t<th>Wallet Action</th>
                                    \t\t<th>Transaction for</th>
                                    \t\t<th>Order No</th>
                                    \t\t<th>Package</th>
                                    \t\t<th>Previous Amount</th>
                                    \t\t<th>Transaction Amount</th>
                                    \t\t<th>Balance Amount</th>
                                    \t\t<th>Created Datetime</th>
                                \t\t</thead>
                                \t\t<tbody>
                                \t\t\t{%if walletTransactionInfo is defined and walletTransactionInfo is not empty %}
                                \t\t\t\t{%for walletTransactionInfo in walletTransactionInfo %}
                                \t\t\t\t\t<tr>\t
                                \t\t\t\t\t\t<td>{{loop.index}}</td>
                                \t\t\t\t\t\t<td>{{walletTransactionInfo.wallet_action | capitalize }}</td>
                                \t\t\t\t\t\t<td>{{walletTransactionInfo.transaction_for | capitalize }}</td>
                                \t\t\t\t\t\t<td>{{walletTransactionInfo.orderNo}}</td>
                                \t\t\t\t\t\t<td>{{walletTransactionInfo.package_name}}</td>
                                \t\t\t\t\t\t<td>{{walletTransactionInfo.previous_amount}}</td>
                                \t\t\t\t\t\t
                                \t\t\t\t\t\t
                                \t\t\t\t\t\t<td>{{walletTransactionInfo.transaction_amount}}</td>
                                \t\t\t\t\t\t<td>{{walletTransactionInfo.after_action_amount}}</td>
                                \t\t\t\t\t\t<td>{{walletTransactionInfo.action_created_datetime}}</td>
                                \t\t\t\t\t
                                \t\t\t\t\t</tr>
                                \t\t\t\t{%endfor%}
                                \t\t\t{%endif%}
                                \t\t</tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </section>
\t\t\t
\t\t{%endif%}
</section>\t\t
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
{% endblock %}

{% block js %}
  <script>
\t\t  

  
\tfunction change_status(order_master_id,element){
\t\t
\t\tvar status = element.val();
\t\t\$.ajax({
\t\t\turl : \"\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'status':status},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Status updated successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}
\t
    \$(document).ready(function() {
\t\t\$('#datatable').DataTable();
\t  
\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});\t  
    });
\t
\tfunction printDivInvoice() 
\t{

\t  var divToPrint=document.getElementById('invoice');

\t  var newWin=window.open('','Print-Window');

\t  newWin.document.open();

\t  newWin.document.write(\"<html><body onload='window.print()'>\"+divToPrint.innerHTML);

\t  newWin.document.close();

\t  setTimeout(function(){newWin.close();},10);

\t}
\t\t
  </script>
{% endblock %}", "AdminBundle:Users:viewUser.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Users/viewUser.html.twig");
    }
}
