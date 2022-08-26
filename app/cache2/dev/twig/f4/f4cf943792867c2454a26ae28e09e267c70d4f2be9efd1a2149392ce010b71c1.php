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

/* AdminBundle:Users:addUser.html.twig */
class __TwigTemplate_1f9084564272d60d1538992b63e7755807bc15adf646455442d078a747c55fab extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'css' => [$this, 'block_css'],
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Users:addUser.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Users:addUser.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 3
        echo "    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css\" rel=\"stylesheet\" />
";
        
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
            Add ";
        // line 9
        if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 3))) {
            echo "User";
        } else {
            echo "Driver";
        }
        // line 10
        echo "            <small></small>
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 19
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 21
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 25
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 27
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">

                    <!-- box header -->
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update User</h3>
                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                     
                        <!-- tab-content -->
                        <div class=\"tab-content\">
                            ";
        // line 46
        $context["user_master_id"] = 0;
        // line 47
        echo "                            ";
        $context["password"] = "";
        // line 48
        echo "                            ";
        $context["unique_user_id"] = "";
        // line 49
        echo "                            ";
        $context["user_firstname"] = "";
        // line 50
        echo "                            ";
        $context["user_lastname"] = "";
        // line 51
        echo "                            ";
        $context["user_mobile"] = "";
        // line 52
        echo "                            ";
        $context["email"] = "";
        // line 53
        echo "                            ";
        $context["img_url"] = "";
        // line 54
        echo "                            ";
        $context["area_id"] = "";
        // line 55
        echo "                            ";
        $context["lat"] = 0;
        // line 56
        echo "                            ";
        $context["lang"] = 0;
        // line 57
        echo "                            ";
        $context["selected_company"] = 0;
        // line 58
        echo "
                            ";
        // line 60
        echo "                            <div role=\"tabpanel\" class=\"tab-pane active\">

                                ";
        // line 62
        $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_saveuser");
        // line 63
        echo "
                                ";
        // line 64
        if (((isset($context["users"]) || array_key_exists("users", $context)) &&  !twig_test_empty(($context["users"] ?? $this->getContext($context, "users"))))) {
            // line 65
            echo "                                    ";
            $context["user_master_id"] = $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_master_id", []);
            // line 66
            echo "                                    ";
            $context["user_firstname"] = $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_firstname", []);
            // line 67
            echo "                                    ";
            $context["user_lastname"] = $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_lastname", []);
            // line 68
            echo "                                    ";
            $context["unique_user_id"] = $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "unique_user_id", []);
            // line 69
            echo "                                    ";
            $context["user_mobile"] = $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_mobile", []);
            // line 70
            echo "                                    ";
            $context["email"] = $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "email", []);
            // line 71
            echo "                                    ";
            $context["img_url"] = $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "media_url", []);
            // line 72
            echo "                                    ";
            $context["area_id"] = $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "area_id", []);
            // line 73
            echo "                                    ";
            $context["lang"] = $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "lang", []);
            // line 74
            echo "                                    ";
            $context["lat"] = $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "lat", []);
            // line 75
            echo "                                    ";
            $context["selected_company"] = $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "parent_user_id", []);
            // line 76
            echo "                                ";
        }
        // line 77
        echo "
                                <form  class=\"form-horizontal\" method=\"post\" action=\"";
        // line 78
        echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
        echo "\" enctype=\"multipart/form-data\">

                                    <input type=\"hidden\" name=\"user_master_id\" value=\"";
        // line 80
        echo twig_escape_filter($this->env, ($context["user_master_id"] ?? $this->getContext($context, "user_master_id")), "html", null, true);
        echo "\">
                                    <input type=\"hidden\" name=\"user_role_id\" value=\"";
        // line 81
        echo twig_escape_filter($this->env, ($context["user_role_id"] ?? $this->getContext($context, "user_role_id")), "html", null, true);
        echo "\">
                                    ";
        // line 82
        if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 2))) {
            // line 83
            echo "                                    <div class=\"row\">
                                        <div class=\"col-md-2\">
                                            
                                                <label>Unique user id </br></label>
                                           

                                        </div>
                                        <div class=\"col-md-4\">
                                            <input type='text' class=\"form-control\" name=\"unique_user_id\" value=\"";
            // line 91
            echo twig_escape_filter($this->env, ($context["unique_user_id"] ?? $this->getContext($context, "unique_user_id")), "html", null, true);
            echo "\" required=\"required\"/>
                                        </div>

                                           
                                    </div>
                                    </br>\t
                                     ";
        }
        // line 97
        echo " 
                                    <div class=\"row\">
                                        <div class=\"col-md-2\">
                                            ";
        // line 100
        if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 4))) {
            // line 101
            echo "                                                <label>Company name </br></label>
                                            ";
        } else {
            // line 102
            echo "    
                                                <label>First name </br></label>
                                            ";
        }
        // line 105
        echo "
                                        </div>
                                        <div class=\"col-md-4\">
                                            <input type='text' class=\"form-control\" name=\"user_firstname\" value=\"";
        // line 108
        echo twig_escape_filter($this->env, ($context["user_firstname"] ?? $this->getContext($context, "user_firstname")), "html", null, true);
        echo "\" required=\"required\"/>
                                        </div>

                                        ";
        // line 111
        if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 4))) {
            echo "                                    
                                            <input type=\"hidden\" name=\"user_lastname\" value=\"\">                                 
                                        ";
        } else {
            // line 113
            echo "      
                                            <div class=\"col-md-2\">
                                                <label>Last name </br></label>
                                            </div>
                                            <div class=\"col-md-4\">
                                                <input type='text' class=\"form-control\" name=\"user_lastname\" value=\"";
            // line 118
            echo twig_escape_filter($this->env, ($context["user_lastname"] ?? $this->getContext($context, "user_lastname")), "html", null, true);
            echo "\" required=\"required\"/>
                                            </div>                                  
                                        ";
        }
        // line 120
        echo "           
                                    </div>
                                    </br>   

                                   
                                    <div class=\"row\">

                                        <div class=\"col-md-2\">
                                            <label>Mobile Number</br></label>
                                        </div>
                                        <div class=\"col-md-4\">
                                            <input type='number' class=\"form-control\" name=\"user_mobile\" value=\"";
        // line 131
        echo twig_escape_filter($this->env, ($context["user_mobile"] ?? $this->getContext($context, "user_mobile")), "html", null, true);
        echo "\" required=\"required\"/>
                                        </div>

                                        <div class=\"col-md-2\">
                                            <label>Email</br></label>
                                        </div>
                                        <div class=\"col-md-4\">
                                            <input type='email' class=\"form-control\" name=\"email\" value=\"";
        // line 138
        echo twig_escape_filter($this->env, ($context["email"] ?? $this->getContext($context, "email")), "html", null, true);
        echo "\" required=\"required\"/>
                                        </div>


                                    </div>

                                    </br>\t\t\t\t\t\t\t\t\t\t
                                    <div class=\"row\">

                                        <div class=\"col-md-2\">
                                            <label>Password</br></label>
                                        </div>
                                        <div class=\"col-md-4\">
                                            <input type='password' class=\"form-control password\" name=\"password\" 
                                                   required=\"required\"/>
                                        </div>
                                        ";
        // line 154
        if (((isset($context["users"]) || array_key_exists("users", $context)) &&  !twig_test_empty(($context["users"] ?? $this->getContext($context, "users"))))) {
            // line 155
            echo "                                            <script>
                                                \$('.password').removeAttr('required');
                                            </script>\t
                                        ";
        }
        // line 159
        echo "                                        <input type=\"hidden\" name=\"area_id\" value=\"0\">   
                                        ";
        // line 160
        if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 2))) {
            // line 161
            echo "                                            <div class=\"col-md-2\">
                                                <label>Service Area</br></label>
                                            </div>
                                            <div class=\"col-md-4\">
                                                <select class=\"form-control select2\" name=\"area_id_driver[]\" required multiple>
                                                    <option value=\"\">Select Area</option>
                                                    ";
            // line 167
            if (((isset($context["area"]) || array_key_exists("area", $context)) &&  !twig_test_empty(($context["area"] ?? $this->getContext($context, "area"))))) {
                // line 168
                echo "                                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["area"]);
                foreach ($context['_seq'] as $context["_key"] => $context["area"]) {
                    // line 169
                    echo "                                                            <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "main_area_id", []), "html", null, true);
                    echo "\" ";
                    if (twig_in_filter($this->getAttribute($context["area"], "main_area_id", []), ($context["area_selected"] ?? $this->getContext($context, "area_selected")))) {
                        echo " selected";
                    }
                    echo ">
                                                                ";
                    // line 170
                    echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "lang_name", []), "html", null, true);
                    echo "
                                                            </option>
                                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['area'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 173
                echo "                                                    ";
            }
            // line 174
            echo "                                                </select>\t

                                            </div>
                                        ";
        }
        // line 178
        echo "                                    </div><br>
                                    <div class=\"row\">

                                        <div class=\"col-md-2 hide\">
                                            <label>Upload Image</label>
                                        </div>
                                        <div class=\"col-md-4 hide\">
                                            <input type='file' class=\"form-control goal_img\" accept=\".jpg,.jpeg,.png\" name=\"gallery\"/>
                                        </div>
                                        <div class=\"col-md-4\">
                                            ";
        // line 188
        if (((isset($context["img_url"]) || array_key_exists("img_url", $context)) && (($context["img_url"] ?? $this->getContext($context, "img_url")) != ""))) {
            // line 189
            echo "                                        
                                                <script>
                                                    \$('.goal_img').removeAttr('required');
                                                </script>
                                                <div class=\"row\">
                                                    <a data-fancybox='gallery' href=\"";
            // line 194
            echo twig_escape_filter($this->env, ($context["img_url"] ?? $this->getContext($context, "img_url")), "html", null, true);
            echo "\">\t\t\t
                                                        <img src=\"";
            // line 195
            echo twig_escape_filter($this->env, ($context["img_url"] ?? $this->getContext($context, "img_url")), "html", null, true);
            echo "\" style=\"height:100px;width:100px\" class=\"img-responsive img-thumbnail hide\"/>
                                                    </a>\t
                                                </div>\t

                                            ";
        }
        // line 199
        echo "\t
                                        </div>
                                    </div>
                                    </br>
                                    ";
        // line 203
        if (((isset($context["user_address"]) || array_key_exists("user_address", $context)) &&  !twig_test_empty(($context["user_address"] ?? $this->getContext($context, "user_address"))))) {
            echo " 
                                        ";
            // line 204
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["user_address"]);
            foreach ($context['_seq'] as $context["_key"] => $context["user_address"]) {
                // line 205
                echo "                                            ";
                if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) != 2))) {
                    // line 206
                    echo "                                                </br>
                                                <div class=\"row\">

                                                    <input type=\"hidden\" name=\"adress_master_id[]\" value=\"";
                    // line 209
                    if ($this->getAttribute($context["user_address"], "address_master_id", [], "any", true, true)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($context["user_address"], "address_master_id", []), "html", null, true);
                    }
                    echo " \">   
                                                    <div class=\"col-md-2\">
                                                        <label>Address Type</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <select name = \"address_type[]\" class=\"form-control\" >
                                                            <option value=\"building\" ";
                    // line 215
                    if (($this->getAttribute($context["user_address"], "address_type", [], "any", true, true) && ($this->getAttribute($context["user_address"], "address_type", []) == "building"))) {
                        echo " selected ";
                    }
                    echo ">Building</option>
                                                            <option value=\"house\"  ";
                    // line 216
                    if (($this->getAttribute($context["user_address"], "address_type", [], "any", true, true) && ($this->getAttribute($context["user_address"], "address_type", []) == "house"))) {
                        echo " selected ";
                    }
                    echo " >House</option>
                                                        </select>
                                                    </div>
                                                     <div class=\"col-md-2\">
                                                        <label>Home/Building No</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type='text' placeholder=\"Enter Home/Building No\" class=\"form-control \" name=\"flate_house_number[]\" required=\"required\" value=\"";
                    // line 223
                    if ($this->getAttribute($context["user_address"], "flate_house_number", [], "any", true, true)) {
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["user_address"], "flate_house_number", []), "html", null, true);
                        echo " ";
                    }
                    echo "\"/>
                                                    </div>
                                                </div>\t\t\t\t\t\t\t\t\t\t

                                                </br>
                                                <div class=\"row\">
                                                    <div class=\"col-md-2\">
                                                        <label>Block</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type='text' placeholder=\"Enter Block\" class=\"form-control \" name=\"block[]\" required=\"required\" value=\"";
                    // line 233
                    if ($this->getAttribute($context["user_address"], "address_name", [], "any", true, true)) {
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["user_address"], "address_name", []), "html", null, true);
                        echo " ";
                    }
                    echo "\"/>
                                                    </div>
                                                     <div class=\"col-md-2\">
                                                        <label>Street</label>
                                                    </div>

                                                    <div class=\"col-md-4\">
                                                        <input type='text' class=\"form-control \" name=\"street[]\" placeholder=\"Enter Street\" required=\"required\"  value=\"";
                    // line 240
                    if ($this->getAttribute($context["user_address"], "street", [], "any", true, true)) {
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["user_address"], "street", []), "html", null, true);
                        echo " ";
                    }
                    echo "\"/>
                                                    </div>
                                                </div>\t\t\t\t\t\t\t\t\t\t
                                            ";
                }
                // line 244
                echo "                                            </br>
                                            <div class=\"row\">
                                                ";
                // line 246
                if (((isset($context["users"]) || array_key_exists("users", $context)) &&  !twig_test_empty(($context["users"] ?? $this->getContext($context, "users"))))) {
                    // line 247
                    echo "                                                    <script>
                                                        \$('.password').removeAttr('required');
                                                    </script>\t
                                                ";
                }
                // line 251
                echo "
                                                ";
                // line 252
                if (((isset($context["user_role_id"]) || array_key_exists("user_role_id", $context)) && (($context["user_role_id"] ?? $this->getContext($context, "user_role_id")) == 3))) {
                    // line 253
                    echo "                                                    <div class=\"col-md-2\">
                                                        <label>Area</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <select class=\"form-control select2\" name=\"area_id[]\" required >
                                                            <option value=\"\">Select Area</option>
                                                            ";
                    // line 259
                    if (((isset($context["area"]) || array_key_exists("area", $context)) &&  !twig_test_empty(($context["area"] ?? $this->getContext($context, "area"))))) {
                        // line 260
                        echo "                                                                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["area"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["area"]) {
                            // line 261
                            echo "                                                                    <option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "main_area_id", []), "html", null, true);
                            echo "\" ";
                            if (($this->getAttribute($context["user_address"], "area_id", [], "any", true, true) && ($this->getAttribute($context["user_address"], "area_id", []) == $this->getAttribute($context["area"], "main_area_id", [])))) {
                                echo "  selected";
                            }
                            echo ">
                                                                        ";
                            // line 262
                            echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "lang_name", []), "html", null, true);
                            echo "
                                                                    </option>
                                                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['area'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 265
                        echo "                                                            ";
                    }
                    // line 266
                    echo "                                                        </select>\t

                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <label>Lat Lng</label>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                      <input type=\"text\" name=\"lat[]\" class=\"form-control\" Placeholder=\"Enter Lat\" value=\"";
                    // line 273
                    if ($this->getAttribute($context["user_address"], "street", [], "any", true, true)) {
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["user_address"], "lat", []), "html", null, true);
                        echo " ";
                    }
                    echo "\" />
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                      <input type=\"text\" name=\"lng[]\" class=\"form-control\" Placeholder=\"Enter Lng\" value=\"";
                    // line 276
                    if ($this->getAttribute($context["user_address"], "street", [], "any", true, true)) {
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["user_address"], "lng", []), "html", null, true);
                        echo " ";
                    }
                    echo "\" />
                                                    </div>
                                                ";
                }
                // line 279
                echo "                                            </div>\t\t\t\t\t\t\t\t\t\t

                                            </br>
                                             <div class=\"row\">
                                                    <div class=\"col-md-2\">
                                                        <label>Avenue </label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type='text' placeholder=\"Enter Avenue\" class=\"form-control \" name=\"avenue\" required=\"required\" value=\"";
                // line 287
                if ($this->getAttribute($context["user_address"], "society_building_name", [], "any", true, true)) {
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user_address"], "society_building_name", []), "html", null, true);
                    echo " ";
                }
                echo "\"/>
                                                    </div>
                                                    <div class=\"col-md-6\">
                                                        <label>*Note : Defining the area will allow the driver to be assigned</label>
                                                    </div>
                                                    
                                                </div>\t\t
                                            <input type='hidden' class=\"form-control\" name=\"lang\" value=\"0\"/>
                                            <input type='hidden' class=\"form-control\" name=\"lat\" value=\"0\"/>                                   \t\t\t\t\t\t\t\t\t
                                            </br>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user_address'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 298
            echo "                                    ";
        }
        // line 299
        echo "                                    <div class=\"row paddTop\">
                                        <div class=\"col-md-12\">
                                            <div class=\"col-md-6\">
                                                <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"submit\">
                                                    <span><i class=\"fa fa-check-square-o\"></i>&nbsp;
                                                        ";
        // line 304
        if (((isset($context["gallery"]) || array_key_exists("gallery", $context)) &&  !twig_test_empty(($context["gallery"] ?? $this->getContext($context, "gallery"))))) {
            echo "Update";
        } else {
            echo "Save";
        }
        echo "\t
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            ";
        // line 315
        echo "\t\t\t\t\t\t\t
                        </div>
                        <!-- end: tab-content -->

                        ";
        // line 320
        echo "\t\t\t\t\t\t\t\t\t\t\t\t
                    </div>

                </div>
            </div>
        </div>

    </section>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 331
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 332
        echo "    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js\"></script>
    <script src=\"";
        // line 333
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

    <script>
        \$(function () {
            \$('.editor1cls').each(function (e) {
                CKEDITOR.replace(this.id);
            });
            \$('.select2').select2({
                theme: \"classic\"
            });
        });

        \$(document).ready(function () {

            \$('[data-fancybox=\"gallery\"]').fancybox({
                // Options will go here
            });

        });

    </script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Users:addUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  707 => 333,  704 => 332,  698 => 331,  682 => 320,  676 => 315,  659 => 304,  652 => 299,  649 => 298,  628 => 287,  618 => 279,  608 => 276,  598 => 273,  589 => 266,  586 => 265,  577 => 262,  568 => 261,  563 => 260,  561 => 259,  553 => 253,  551 => 252,  548 => 251,  542 => 247,  540 => 246,  536 => 244,  525 => 240,  511 => 233,  494 => 223,  482 => 216,  476 => 215,  465 => 209,  460 => 206,  457 => 205,  453 => 204,  449 => 203,  443 => 199,  435 => 195,  431 => 194,  424 => 189,  422 => 188,  410 => 178,  404 => 174,  401 => 173,  392 => 170,  383 => 169,  378 => 168,  376 => 167,  368 => 161,  366 => 160,  363 => 159,  357 => 155,  355 => 154,  336 => 138,  326 => 131,  313 => 120,  307 => 118,  300 => 113,  294 => 111,  288 => 108,  283 => 105,  278 => 102,  274 => 101,  272 => 100,  267 => 97,  257 => 91,  247 => 83,  245 => 82,  241 => 81,  237 => 80,  232 => 78,  229 => 77,  226 => 76,  223 => 75,  220 => 74,  217 => 73,  214 => 72,  211 => 71,  208 => 70,  205 => 69,  202 => 68,  199 => 67,  196 => 66,  193 => 65,  191 => 64,  188 => 63,  186 => 62,  182 => 60,  179 => 58,  176 => 57,  173 => 56,  170 => 55,  167 => 54,  164 => 53,  161 => 52,  158 => 51,  155 => 50,  152 => 49,  149 => 48,  146 => 47,  144 => 46,  126 => 30,  117 => 27,  113 => 25,  108 => 24,  99 => 21,  95 => 19,  91 => 18,  84 => 14,  78 => 10,  72 => 9,  67 => 6,  61 => 5,  53 => 3,  47 => 2,  31 => 1,);
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
{% block css %}
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css\" rel=\"stylesheet\" />
{% endblock %}
{% block content %}
    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Add {%if user_role_id is defined and user_role_id == 3%}User{%else%}Driver{%endif%}
            <small></small>
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

                    <!-- box header -->
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update User</h3>
                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                     
                        <!-- tab-content -->
                        <div class=\"tab-content\">
                            {% set user_master_id = 0 %}
                            {% set password = '' %}
                            {% set unique_user_id = '' %}
                            {% set user_firstname = '' %}
                            {% set user_lastname = '' %}
                            {% set user_mobile = '' %}
                            {% set email = '' %}
                            {% set img_url = '' %}
                            {% set area_id = '' %}
                            {% set lat = 0 %}
                            {% set lang = 0 %}
                            {% set selected_company = 0 %}

                            {#\t\t\t\t\t\t\t{% for language in language_list %} #}
                            <div role=\"tabpanel\" class=\"tab-pane active\">

                                {% set action = path('admin_users_saveuser') %}

                                {% if users is defined and users is not empty %}
                                    {% set user_master_id = users.user_master_id %}
                                    {% set user_firstname = users.user_firstname %}
                                    {% set user_lastname = users.user_lastname %}
                                    {% set unique_user_id = users.unique_user_id %}
                                    {% set user_mobile = users.user_mobile %}
                                    {% set email = users.email %}
                                    {% set img_url = users.media_url %}
                                    {% set area_id = users.area_id %}
                                    {% set lang = users.lang %}
                                    {% set lat = users.lat %}
                                    {% set selected_company = users.parent_user_id %}
                                {% endif %}

                                <form  class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">

                                    <input type=\"hidden\" name=\"user_master_id\" value=\"{{ user_master_id }}\">
                                    <input type=\"hidden\" name=\"user_role_id\" value=\"{{ user_role_id }}\">
                                    {%if user_role_id is defined and user_role_id ==  2 %}
                                    <div class=\"row\">
                                        <div class=\"col-md-2\">
                                            
                                                <label>Unique user id </br></label>
                                           

                                        </div>
                                        <div class=\"col-md-4\">
                                            <input type='text' class=\"form-control\" name=\"unique_user_id\" value=\"{{unique_user_id}}\" required=\"required\"/>
                                        </div>

                                           
                                    </div>
                                    </br>\t
                                     {% endif %} 
                                    <div class=\"row\">
                                        <div class=\"col-md-2\">
                                            {%if user_role_id is defined and user_role_id == 4%}
                                                <label>Company name </br></label>
                                            {%else%}    
                                                <label>First name </br></label>
                                            {% endif%}

                                        </div>
                                        <div class=\"col-md-4\">
                                            <input type='text' class=\"form-control\" name=\"user_firstname\" value=\"{{user_firstname}}\" required=\"required\"/>
                                        </div>

                                        {%if user_role_id is defined and user_role_id == 4%}                                    
                                            <input type=\"hidden\" name=\"user_lastname\" value=\"\">                                 
                                        {%else%}      
                                            <div class=\"col-md-2\">
                                                <label>Last name </br></label>
                                            </div>
                                            <div class=\"col-md-4\">
                                                <input type='text' class=\"form-control\" name=\"user_lastname\" value=\"{{user_lastname}}\" required=\"required\"/>
                                            </div>                                  
                                        {%endif%}           
                                    </div>
                                    </br>   

                                   
                                    <div class=\"row\">

                                        <div class=\"col-md-2\">
                                            <label>Mobile Number</br></label>
                                        </div>
                                        <div class=\"col-md-4\">
                                            <input type='number' class=\"form-control\" name=\"user_mobile\" value=\"{{user_mobile}}\" required=\"required\"/>
                                        </div>

                                        <div class=\"col-md-2\">
                                            <label>Email</br></label>
                                        </div>
                                        <div class=\"col-md-4\">
                                            <input type='email' class=\"form-control\" name=\"email\" value=\"{{email}}\" required=\"required\"/>
                                        </div>


                                    </div>

                                    </br>\t\t\t\t\t\t\t\t\t\t
                                    <div class=\"row\">

                                        <div class=\"col-md-2\">
                                            <label>Password</br></label>
                                        </div>
                                        <div class=\"col-md-4\">
                                            <input type='password' class=\"form-control password\" name=\"password\" 
                                                   required=\"required\"/>
                                        </div>
                                        {% if users is defined and users is not empty %}
                                            <script>
                                                \$('.password').removeAttr('required');
                                            </script>\t
                                        {% endif%}
                                        <input type=\"hidden\" name=\"area_id\" value=\"0\">   
                                        {%if user_role_id is defined and user_role_id == 2 %}
                                            <div class=\"col-md-2\">
                                                <label>Service Area</br></label>
                                            </div>
                                            <div class=\"col-md-4\">
                                                <select class=\"form-control select2\" name=\"area_id_driver[]\" required multiple>
                                                    <option value=\"\">Select Area</option>
                                                    {%if area is defined and area is not empty%}
                                                        {%for area in area%}
                                                            <option value=\"{{area.main_area_id}}\" {%if area.main_area_id in area_selected %} selected{%endif%}>
                                                                {{area.lang_name}}
                                                            </option>
                                                        {%endfor%}
                                                    {%endif%}
                                                </select>\t

                                            </div>
                                        {% endif %}
                                    </div><br>
                                    <div class=\"row\">

                                        <div class=\"col-md-2 hide\">
                                            <label>Upload Image</label>
                                        </div>
                                        <div class=\"col-md-4 hide\">
                                            <input type='file' class=\"form-control goal_img\" accept=\".jpg,.jpeg,.png\" name=\"gallery\"/>
                                        </div>
                                        <div class=\"col-md-4\">
                                            {%if img_url is defined and img_url != ''%}
                                        
                                                <script>
                                                    \$('.goal_img').removeAttr('required');
                                                </script>
                                                <div class=\"row\">
                                                    <a data-fancybox='gallery' href=\"{{img_url}}\">\t\t\t
                                                        <img src=\"{{img_url}}\" style=\"height:100px;width:100px\" class=\"img-responsive img-thumbnail hide\"/>
                                                    </a>\t
                                                </div>\t

                                            {%endif%}\t
                                        </div>
                                    </div>
                                    </br>
                                    {%if user_address is defined and user_address is not empty %} 
                                        {%for user_address in user_address %}
                                            {%if user_role_id is defined and user_role_id != 2%}
                                                </br>
                                                <div class=\"row\">

                                                    <input type=\"hidden\" name=\"adress_master_id[]\" value=\"{%if user_address.address_master_id is defined %}{{user_address.address_master_id}}{%endif%} \">   
                                                    <div class=\"col-md-2\">
                                                        <label>Address Type</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <select name = \"address_type[]\" class=\"form-control\" >
                                                            <option value=\"building\" {%if user_address.address_type is defined and user_address.address_type == 'building' %} selected {%endif%}>Building</option>
                                                            <option value=\"house\"  {%if user_address.address_type is defined and user_address.address_type == 'house' %} selected {%endif%} >House</option>
                                                        </select>
                                                    </div>
                                                     <div class=\"col-md-2\">
                                                        <label>Home/Building No</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type='text' placeholder=\"Enter Home/Building No\" class=\"form-control \" name=\"flate_house_number[]\" required=\"required\" value=\"{%if user_address.flate_house_number is defined %} {{user_address.flate_house_number}} {%endif%}\"/>
                                                    </div>
                                                </div>\t\t\t\t\t\t\t\t\t\t

                                                </br>
                                                <div class=\"row\">
                                                    <div class=\"col-md-2\">
                                                        <label>Block</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type='text' placeholder=\"Enter Block\" class=\"form-control \" name=\"block[]\" required=\"required\" value=\"{%if user_address.address_name is defined %} {{user_address.address_name}} {%endif%}\"/>
                                                    </div>
                                                     <div class=\"col-md-2\">
                                                        <label>Street</label>
                                                    </div>

                                                    <div class=\"col-md-4\">
                                                        <input type='text' class=\"form-control \" name=\"street[]\" placeholder=\"Enter Street\" required=\"required\"  value=\"{%if user_address.street is defined %} {{user_address.street}} {%endif%}\"/>
                                                    </div>
                                                </div>\t\t\t\t\t\t\t\t\t\t
                                            {%endif%}
                                            </br>
                                            <div class=\"row\">
                                                {% if users is defined and users is not empty %}
                                                    <script>
                                                        \$('.password').removeAttr('required');
                                                    </script>\t
                                                {% endif%}

                                                {%if user_role_id is defined and user_role_id == 3 %}
                                                    <div class=\"col-md-2\">
                                                        <label>Area</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <select class=\"form-control select2\" name=\"area_id[]\" required >
                                                            <option value=\"\">Select Area</option>
                                                            {%if area is defined and area is not empty%}
                                                                {%for area in area%}
                                                                    <option value=\"{{area.main_area_id}}\" {%if user_address.area_id is defined  and user_address.area_id == area.main_area_id%}  selected{%endif%}>
                                                                        {{area.lang_name}}
                                                                    </option>
                                                                {%endfor%}
                                                            {%endif%}
                                                        </select>\t

                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <label>Lat Lng</label>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                      <input type=\"text\" name=\"lat[]\" class=\"form-control\" Placeholder=\"Enter Lat\" value=\"{%if user_address.street is defined %} {{user_address.lat}} {%endif%}\" />
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                      <input type=\"text\" name=\"lng[]\" class=\"form-control\" Placeholder=\"Enter Lng\" value=\"{%if user_address.street is defined %} {{user_address.lng}} {%endif%}\" />
                                                    </div>
                                                {% endif %}
                                            </div>\t\t\t\t\t\t\t\t\t\t

                                            </br>
                                             <div class=\"row\">
                                                    <div class=\"col-md-2\">
                                                        <label>Avenue </label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type='text' placeholder=\"Enter Avenue\" class=\"form-control \" name=\"avenue\" required=\"required\" value=\"{%if user_address.society_building_name is defined %} {{user_address.society_building_name}} {%endif%}\"/>
                                                    </div>
                                                    <div class=\"col-md-6\">
                                                        <label>*Note : Defining the area will allow the driver to be assigned</label>
                                                    </div>
                                                    
                                                </div>\t\t
                                            <input type='hidden' class=\"form-control\" name=\"lang\" value=\"0\"/>
                                            <input type='hidden' class=\"form-control\" name=\"lat\" value=\"0\"/>                                   \t\t\t\t\t\t\t\t\t
                                            </br>
                                        {%endfor%}
                                    {%endif%}
                                    <div class=\"row paddTop\">
                                        <div class=\"col-md-12\">
                                            <div class=\"col-md-6\">
                                                <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"submit\">
                                                    <span><i class=\"fa fa-check-square-o\"></i>&nbsp;
                                                        {% if gallery is defined and gallery is not empty %}Update{%else%}Save{%endif%}\t
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            {#\t\t\t\t\t\t\t{% endfor %}
                            #}\t\t\t\t\t\t\t
                        </div>
                        <!-- end: tab-content -->

                        {#\t\t\t\t\t{% endif %}
                        #}\t\t\t\t\t\t\t\t\t\t\t\t
                    </div>

                </div>
            </div>
        </div>

    </section>

{% endblock %}

{% block js %}
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js\"></script>
    <script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>

    <script>
        \$(function () {
            \$('.editor1cls').each(function (e) {
                CKEDITOR.replace(this.id);
            });
            \$('.select2').select2({
                theme: \"classic\"
            });
        });

        \$(document).ready(function () {

            \$('[data-fancybox=\"gallery\"]').fancybox({
                // Options will go here
            });

        });

    </script>\t
{% endblock %}", "AdminBundle:Users:addUser.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Users/addUser.html.twig");
    }
}
