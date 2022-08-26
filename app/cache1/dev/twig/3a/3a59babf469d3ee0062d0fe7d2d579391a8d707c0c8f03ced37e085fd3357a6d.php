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

/* AdminBundle:Dashboard:index.html.twig */
class __TwigTemplate_6ba300b5dc10a2957816e9d30bb8d949269b4e679b185bfbf3f810473a785834 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Dashboard:index.html.twig"));

        $this->parent = $this->loadTemplate("AdminBundle::Layout/adminlayout.html.twig", "AdminBundle:Dashboard:index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Anona - Dash";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 4
        echo "
<link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/css/blueimp-gallery.min.css\">
<link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/css/jquery.fileupload.css\">
<link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/css/jquery.fileupload-ui.css\">

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 11
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 12
        echo "    <!-- PAGE HEADER : START -->
    <section class=\"content-header\">
        <!-- PAGE TITLE -->
        <h1>
            Dashboard
        </h1>
        <!-- BREADCUMB -->
        <ol class=\"breadcrumb\">
            <li class=\"active\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li></li>
        </ol>
    </section>
    <!-- PAGE HEADER : END -->
    <!-- Main content : START -->
    <section class=\"content\">
        <!-- Message block -->
        ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 28
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
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
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 34
            echo "            <div class=\"alert alert-error alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 36
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "warning_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 40
            echo "            <div class=\"alert alert-warning alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 42
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "
        ";
        // line 46
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 1)) {
            // line 47
            echo "            <div class=\"row\">

                                        
                <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box \" style=\"background-color: #86b57e !important;\">
                        <div class=\"inner\">
                            <h3>";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute(($context["statstics"] ?? $this->getContext($context, "statstics")), "users", []), "html", null, true);
            echo "</h3>
                            <p>Unique Registered Users</p>
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a href=\"";
            // line 60
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => 3]);
            echo "\" class=\"small-box-footer\">More info<i class=\"fa fa-arrow-circle-right\"></i></a>
                    </div>
                </div>

                
                <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box \" style=\"background-color: #b36e66 !important;\">
                        <div class=\"inner\">
                            <h3>";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute(($context["statstics"] ?? $this->getContext($context, "statstics")), "orders", []), "html", null, true);
            echo "</h3>
                            <p>Active Subscriptions</p>
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a href=\"";
            // line 75
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_index");
            echo "\" class=\"small-box-footer\">More info<i class=\"fa fa-arrow-circle-right\"></i></a>
                    </div>
                </div>\t

                <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box \" style=\"background-color: #c398ce !important;\">
                        <div class=\"inner\">
                            <h3><i class=\"fa fa-database\" aria-hidden=\"true\"></i></h3>
                            <a href=\"";
            // line 84
            echo twig_escape_filter($this->env, ($context["backupfile"] ?? $this->getContext($context, "backupfile")), "html", null, true);
            echo "\"  target=\"_blank\" class=\"btn btn-sm btn-primary form-group\">Database Backup
                            </a>


                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a  class=\"small-box-footer\">Backup<i class=\"fa fa-arrow-circle-right\"></i></a>
                    </div>
                </div>  \t\t 
            </div>
            <div class=\"row\">
                 <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box \" style=\"background-color: #87af3a !important;\">
                        <div class=\"inner\">
                            <a href=\"";
            // line 101
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_gettotalorders", ["quick_access" => "tommorow"]);
            echo "\" class=\"btn btn-sm btn-default form-group\">Total Of Tommorow
                            </a>
                            <br>
                           ";
            // line 108
            echo "                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a href=\"";
            // line 112
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_getmealsdatewisefilter", ["quick_access" => "all"]);
            echo "\" class=\"small-box-footer\">All Meals<i class=\"fa fa-arrow-circle-right\"></i></a>
                    </div>
                </div>   
                <div class=\"col-lg-4 col-xs-6 hide\">
                    <!-- small box -->
                    <div class=\"small-box\" style=\"background-color: #5d2071;\">
                        <div class=\"inner\">
                            <label class=\"\" style=\"color: rgba(255,255,255,0.8);\">Send Before </label><br>
                            <a onclick=\"send_notification_before_days(4);\" class=\"btn btn-sm btn-default form-group\"> <b>4</b> Days</a>
                            <a onclick=\"send_notification_before_days(5);\" class=\"btn btn-sm btn-default form-group\"><b>5</b> Days </a>
                            <a onclick=\"send_notification_before_days(6);\" class=\"btn btn-sm btn-default form-group\"><b>6</b> Days </a>
                          

                        </div>

                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a class=\"small-box-footer\">Send Notification to Users who have not filled Meal before X Days</a>
                    </div>
                </div>    
                    
                <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box\" style=\"background-color: #43a2a7 !important;\">
                        <div class=\"inner\">
                            <a onclick=\"assign_automaticmeal('";
            // line 138
            echo twig_escape_filter($this->env, ($context["nextDatePass"] ?? $this->getContext($context, "nextDatePass")), "html", null, true);
            echo "');\" class=\"btn btn-sm btn-default form-group\">For <b>";
            echo twig_escape_filter($this->env, ($context["nextDatePass"] ?? $this->getContext($context, "nextDatePass")), "html", null, true);
            echo "</b>
                            </a>


                            <a onclick=\"assign_automaticmeal('";
            // line 142
            echo twig_escape_filter($this->env, ($context["tomorowDatePass"] ?? $this->getContext($context, "tomorowDatePass")), "html", null, true);
            echo "');\" class=\"btn btn-sm btn-default form-group\">For <b>";
            echo twig_escape_filter($this->env, ($context["tomorowDatePass"] ?? $this->getContext($context, "tomorowDatePass")), "html", null, true);
            echo "</b>
                            </a>


                        </div>
                        <div class=\"inner\">
                            <a onclick=\"assign_automaticmeal('";
            // line 148
            echo twig_escape_filter($this->env, ($context["dayaftertomorowDatePass"] ?? $this->getContext($context, "dayaftertomorowDatePass")), "html", null, true);
            echo "');\" class=\"btn btn-sm btn-default form-group\">For <b>";
            echo twig_escape_filter($this->env, ($context["dayaftertomorowDatePass"] ?? $this->getContext($context, "dayaftertomorowDatePass")), "html", null, true);
            echo "</b>
                            </a>
                            <a onclick=\"assign_automaticmeal('";
            // line 150
            echo twig_escape_filter($this->env, ($context["dayaftertomorowDatePass_plus1day"] ?? $this->getContext($context, "dayaftertomorowDatePass_plus1day")), "html", null, true);
            echo "');\" class=\"btn btn-sm btn-default form-group\">For <b>";
            echo twig_escape_filter($this->env, ($context["dayaftertomorowDatePass_plus1day"] ?? $this->getContext($context, "dayaftertomorowDatePass_plus1day")), "html", null, true);
            echo "</b>
                            </a>
                            <a onclick=\"assign_automaticmeal('";
            // line 152
            echo twig_escape_filter($this->env, ($context["dayaftertomorowDatePass_plus2day"] ?? $this->getContext($context, "dayaftertomorowDatePass_plus2day")), "html", null, true);
            echo "');\" class=\"btn btn-sm btn-default form-group\">For <b>";
            echo twig_escape_filter($this->env, ($context["dayaftertomorowDatePass_plus2day"] ?? $this->getContext($context, "dayaftertomorowDatePass_plus2day")), "html", null, true);
            echo "</b>
                            </a>

                        </div>

                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a class=\"small-box-footer\">Assign Automatic Meal</a>
                    </div>
                </div>      
                  <div class=\"col-lg-3 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box bg-aqua\">
                        <div class=\"inner\">
                            <h3>";
            // line 167
            echo twig_escape_filter($this->env, ($context["schedule_week_id"] ?? $this->getContext($context, "schedule_week_id")), "html", null, true);
            echo "</h3>
                            <p>Current Week No of Anona</p>
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                       ";
            // line 174
            echo "                    </div>
                </div>
                ";
            // line 217
            echo "
               
            </div>
        ";
        }
        // line 221
        echo "
        
    </section>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 227
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 228
        echo "    <script>
        function assign_automaticmeal(datepass) {
            \$.ajax({
                url: \"";
        // line 231
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_assignautomaticmeal");
        echo "\",
                method: \"POST\",
                data: {'datepass': datepass},
                success: function (data) {
                    var obj = JSON.parse(data);
                    status = obj.status;
                    assigncount = obj.count;

                    if (\$.trim(status) == 'done') {
                        alert('Automatic meal [Count : ' + assigncount + ' ] Assigned successfully');
                    } else if (\$.trim(status) == 'nomeal') {
                        alert('No meal selection Pending for selected Date');
                    } else {
                        alert('Something went wrong');
                    }
                },
                error: function () {
                    alert(\"Something went wrong\");
                }
            });
        }
        
        function send_notification_before_days(day) {
            \$.ajax({
                url: \"";
        // line 255
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_sendnotificationbeforedays");
        echo "\",
                method: \"POST\",
                data: {'day': day},
                success: function (data) {
                    var obj = JSON.parse(data);
                    status = obj.status;
                    sentcount = obj.count;
                    sentfordate = obj.date ;

                    if (\$.trim(status) == 'done') {
                        alert('Notification sent to ' + sentcount + ' Users for Date : '+sentfordate+' successfully');
                    } else if (\$.trim(status) == 'nomeal') {
                        alert('No meal selection Pending by users for '+sentfordate+' Date');
                    } else {
                        alert('Something went wrong');
                    }
                },
                error: function () {
                    alert(\"Something went wrong\");
                }
            });
        }

        \$(document).ready(function () {
            //      \$('#list').DataTable();
        });
    </script>


<script id=\"template-upload\" type=\"text/x-tmpl\">
";
        // line 315
        echo "
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class=\"template-upload fade\">
        <td>
            <span class=\"preview\"></span>
        </td>
        <td>
            <p class=\"name\">{%=file.name%}</p>
            <strong class=\"error text-danger\"></strong>
        </td>
        <td>
            <p class=\"size\">Processing...</p>
            <div class=\"progress progress-striped active\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" aria-valuenow=\"0\"><div class=\"progress-bar progress-bar-success\" style=\"width:0%;\"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class=\"btn btn-primary start\" disabled>
                    <i class=\"glyphicon glyphicon-upload\"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class=\"btn btn-warning cancel\">
                    <i class=\"glyphicon glyphicon-ban-circle\"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
";
        echo "
</script>
<!-- The template to display files available for download -->
<script id=\"template-download\" type=\"text/x-tmpl\">
";
        // line 320
        echo "
";
        echo "
</script>

<script src=\"";
        // line 323
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/jquery.ui.widget.js\"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src=\"";
        // line 325
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/tmpl.min.js\"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src=\"";
        // line 327
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/load-image.all.min.js\"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src=\"";
        // line 329
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/canvas-to-blob.min.js\"></script>
<!-- blueimp Gallery script -->
<script src=\"";
        // line 331
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/jquery.blueimp-gallery.min.js\"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src=\"";
        // line 333
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/jquery.iframe-transport.js\"></script>
<!-- The basic File Upload plugin -->
<script src=\"";
        // line 335
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/jquery.fileupload.js\"></script>
<!-- The File Upload processing plugin -->
<script src=\"";
        // line 337
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/jquery.fileupload-process.js\"></script>
<!-- The File Upload image preview & resize plugin -->
<script src=\"";
        // line 339
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/jquery.fileupload-image.js\"></script>
<!-- The File Upload audio preview plugin -->
<script src=\"";
        // line 341
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/jquery.fileupload-audio.js\"></script>
<!-- The File Upload video preview plugin -->
<script src=\"";
        // line 343
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/jquery.fileupload-video.js\"></script>
<!-- The File Upload validation plugin -->
<script src=\"";
        // line 345
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/jquery.fileupload-validate.js\"></script>
<!-- The File Upload user interface plugin -->
<script src=\"";
        // line 347
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "fileupload/js/jquery.fileupload-ui.js\"></script>
<!-- The main application script -->
";
        // line 350
        echo "
<script>
\$(function () {
var html = \"\";
    'use strict';
    // Initialize the jQuery File Upload widget:
    \$('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:

        url: 'http://localhost/lifestyle/bundles/design/index.php?temp_dir=product_image',
      //  acceptFileTypes: /(\\.|\\/)(zip)\$/i,
        success: function(response)
        {
            console.log(response.files[0]);
            //database insert ajax
           
            
        }
    });
});

</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Dashboard:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  544 => 350,  539 => 347,  534 => 345,  529 => 343,  524 => 341,  519 => 339,  514 => 337,  509 => 335,  504 => 333,  499 => 331,  494 => 329,  489 => 327,  484 => 325,  479 => 323,  472 => 320,  435 => 315,  402 => 255,  375 => 231,  370 => 228,  364 => 227,  353 => 221,  347 => 217,  343 => 174,  334 => 167,  314 => 152,  307 => 150,  300 => 148,  289 => 142,  280 => 138,  251 => 112,  245 => 108,  239 => 101,  219 => 84,  207 => 75,  198 => 69,  186 => 60,  177 => 54,  168 => 47,  166 => 46,  163 => 45,  154 => 42,  150 => 40,  145 => 39,  136 => 36,  132 => 34,  127 => 33,  118 => 30,  114 => 28,  110 => 27,  93 => 12,  87 => 11,  77 => 7,  73 => 6,  69 => 5,  66 => 4,  60 => 3,  48 => 2,  32 => 1,);
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
{% block title %}Anona - Dash{% endblock %}
{% block css %}

<link rel=\"stylesheet\" href=\"{{asset('bundles/design/')}}fileupload/css/blueimp-gallery.min.css\">
<link rel=\"stylesheet\" href=\"{{asset('bundles/design/')}}fileupload/css/jquery.fileupload.css\">
<link rel=\"stylesheet\" href=\"{{asset('bundles/design/')}}fileupload/css/jquery.fileupload-ui.css\">

{% endblock %}

{% block content %}
    <!-- PAGE HEADER : START -->
    <section class=\"content-header\">
        <!-- PAGE TITLE -->
        <h1>
            Dashboard
        </h1>
        <!-- BREADCUMB -->
        <ol class=\"breadcrumb\">
            <li class=\"active\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li></li>
        </ol>
    </section>
    <!-- PAGE HEADER : END -->
    <!-- Main content : START -->
    <section class=\"content\">
        <!-- Message block -->
        {% for flashMessage in app.session.flashbag.get('success_msg') %}
            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>{{ flashMessage }}
            </div>
        {% endfor %}
        {% for flashMessage in app.session.flashbag.get('error_msg') %}
            <div class=\"alert alert-error alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>{{ flashMessage }}
            </div>
        {% endfor %}
        {% for flashMessage in app.session.flashbag.get('warning_msg') %}
            <div class=\"alert alert-warning alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>{{ flashMessage }}
            </div>
        {% endfor %}

        {% if app.session.get('role_id') == 1 %}
            <div class=\"row\">

                                        
                <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box \" style=\"background-color: #86b57e !important;\">
                        <div class=\"inner\">
                            <h3>{{statstics.users}}</h3>
                            <p>Unique Registered Users</p>
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a href=\"{{path('admin_users_index',{'user_role_id':3})}}\" class=\"small-box-footer\">More info<i class=\"fa fa-arrow-circle-right\"></i></a>
                    </div>
                </div>

                
                <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box \" style=\"background-color: #b36e66 !important;\">
                        <div class=\"inner\">
                            <h3>{{statstics.orders}}</h3>
                            <p>Active Subscriptions</p>
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a href=\"{{path('admin_orders_index')}}\" class=\"small-box-footer\">More info<i class=\"fa fa-arrow-circle-right\"></i></a>
                    </div>
                </div>\t

                <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box \" style=\"background-color: #c398ce !important;\">
                        <div class=\"inner\">
                            <h3><i class=\"fa fa-database\" aria-hidden=\"true\"></i></h3>
                            <a href=\"{{backupfile}}\"  target=\"_blank\" class=\"btn btn-sm btn-primary form-group\">Database Backup
                            </a>


                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a  class=\"small-box-footer\">Backup<i class=\"fa fa-arrow-circle-right\"></i></a>
                    </div>
                </div>  \t\t 
            </div>
            <div class=\"row\">
                 <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box \" style=\"background-color: #87af3a !important;\">
                        <div class=\"inner\">
                            <a href=\"{{path('admin_orders_gettotalorders',{'quick_access':'tommorow'})}}\" class=\"btn btn-sm btn-default form-group\">Total Of Tommorow
                            </a>
                            <br>
                           {# <a href=\"{{path('admin_orders_getmealsdatewisefilter',{'quick_access':'tommorow'})}}\" class=\"btn btn-sm btn-default form-group\" style=\"margin-top:5px\">Tommorow
                            </a>
                            <a href=\"{{path('admin_orders_getmealsdatewisefilter',{'quick_access':'day_after_tommorow'})}}\" class=\"btn btn-sm btn-default form-group\" style=\"margin-top:5px\">Day after Tommorow
                            </a>#}
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a href=\"{{path('admin_orders_getmealsdatewisefilter',{'quick_access':'all'})}}\" class=\"small-box-footer\">All Meals<i class=\"fa fa-arrow-circle-right\"></i></a>
                    </div>
                </div>   
                <div class=\"col-lg-4 col-xs-6 hide\">
                    <!-- small box -->
                    <div class=\"small-box\" style=\"background-color: #5d2071;\">
                        <div class=\"inner\">
                            <label class=\"\" style=\"color: rgba(255,255,255,0.8);\">Send Before </label><br>
                            <a onclick=\"send_notification_before_days(4);\" class=\"btn btn-sm btn-default form-group\"> <b>4</b> Days</a>
                            <a onclick=\"send_notification_before_days(5);\" class=\"btn btn-sm btn-default form-group\"><b>5</b> Days </a>
                            <a onclick=\"send_notification_before_days(6);\" class=\"btn btn-sm btn-default form-group\"><b>6</b> Days </a>
                          

                        </div>

                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a class=\"small-box-footer\">Send Notification to Users who have not filled Meal before X Days</a>
                    </div>
                </div>    
                    
                <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box\" style=\"background-color: #43a2a7 !important;\">
                        <div class=\"inner\">
                            <a onclick=\"assign_automaticmeal('{{nextDatePass}}');\" class=\"btn btn-sm btn-default form-group\">For <b>{{nextDatePass}}</b>
                            </a>


                            <a onclick=\"assign_automaticmeal('{{tomorowDatePass}}');\" class=\"btn btn-sm btn-default form-group\">For <b>{{tomorowDatePass}}</b>
                            </a>


                        </div>
                        <div class=\"inner\">
                            <a onclick=\"assign_automaticmeal('{{dayaftertomorowDatePass}}');\" class=\"btn btn-sm btn-default form-group\">For <b>{{dayaftertomorowDatePass}}</b>
                            </a>
                            <a onclick=\"assign_automaticmeal('{{dayaftertomorowDatePass_plus1day}}');\" class=\"btn btn-sm btn-default form-group\">For <b>{{dayaftertomorowDatePass_plus1day}}</b>
                            </a>
                            <a onclick=\"assign_automaticmeal('{{dayaftertomorowDatePass_plus2day}}');\" class=\"btn btn-sm btn-default form-group\">For <b>{{dayaftertomorowDatePass_plus2day}}</b>
                            </a>

                        </div>

                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a class=\"small-box-footer\">Assign Automatic Meal</a>
                    </div>
                </div>      
                  <div class=\"col-lg-3 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box bg-aqua\">
                        <div class=\"inner\">
                            <h3>{{schedule_week_id}}</h3>
                            <p>Current Week No of Anona</p>
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                       {#  <a href=\"{{path('admin_package_index')}}\" class=\"small-box-footer\">More info<i class=\"fa fa-arrow-circle-right\"></i></a> #}
                    </div>
                </div>
                {#<div class=\"col-lg-3 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box bg-aqua\">
                        <div class=\"inner\">
                            <h3>{{statstics.packages}}</h3>
                            <p>Packages</p>
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a href=\"{{path('admin_package_index')}}\" class=\"small-box-footer\">More info<i class=\"fa fa-arrow-circle-right\"></i></a>
                    </div>
                </div>
                <div class=\"col-lg-3 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box bg-green\">
                        <div class=\"inner\">
                            <h3>{{statstics.drivers}}</h3>
                            <p>Drivers</p>
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                        <a href=\"{{path('admin_users_index',{'user_role_id':2})}}\" class=\"small-box-footer\">More info<i class=\"fa fa-arrow-circle-right\"></i></a>
                    </div>
                </div>           
                          
                        <div class=\"col-lg-3 col-xs-6\">
                          <!-- small box -->
                          <div class=\"small-box bg-yellow\">
                                <div class=\"inner\">
                                  <h3>{{statstics.companies}}</h3>
                                  <p>Companies</p>
                                </div>
                                <div class=\"icon\">
                                  <i class=\"ion ion-bag\"></i>
                                </div>
                                <a href=\"{{path('admin_users_index',{'user_role_id':4})}}\" class=\"small-box-footer\">More info<i class=\"fa fa-arrow-circle-right\"></i></a>
                          </div>
                        </div>           
                        #}

               
            </div>
        {% endif %}

        
    </section>

{% endblock %}

{% block js %}
    <script>
        function assign_automaticmeal(datepass) {
            \$.ajax({
                url: \"{{path('admin_dashboard_assignautomaticmeal')}}\",
                method: \"POST\",
                data: {'datepass': datepass},
                success: function (data) {
                    var obj = JSON.parse(data);
                    status = obj.status;
                    assigncount = obj.count;

                    if (\$.trim(status) == 'done') {
                        alert('Automatic meal [Count : ' + assigncount + ' ] Assigned successfully');
                    } else if (\$.trim(status) == 'nomeal') {
                        alert('No meal selection Pending for selected Date');
                    } else {
                        alert('Something went wrong');
                    }
                },
                error: function () {
                    alert(\"Something went wrong\");
                }
            });
        }
        
        function send_notification_before_days(day) {
            \$.ajax({
                url: \"{{path('admin_dashboard_sendnotificationbeforedays')}}\",
                method: \"POST\",
                data: {'day': day},
                success: function (data) {
                    var obj = JSON.parse(data);
                    status = obj.status;
                    sentcount = obj.count;
                    sentfordate = obj.date ;

                    if (\$.trim(status) == 'done') {
                        alert('Notification sent to ' + sentcount + ' Users for Date : '+sentfordate+' successfully');
                    } else if (\$.trim(status) == 'nomeal') {
                        alert('No meal selection Pending by users for '+sentfordate+' Date');
                    } else {
                        alert('Something went wrong');
                    }
                },
                error: function () {
                    alert(\"Something went wrong\");
                }
            });
        }

        \$(document).ready(function () {
            //      \$('#list').DataTable();
        });
    </script>


<script id=\"template-upload\" type=\"text/x-tmpl\">
{% verbatim %}
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class=\"template-upload fade\">
        <td>
            <span class=\"preview\"></span>
        </td>
        <td>
            <p class=\"name\">{%=file.name%}</p>
            <strong class=\"error text-danger\"></strong>
        </td>
        <td>
            <p class=\"size\">Processing...</p>
            <div class=\"progress progress-striped active\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" aria-valuenow=\"0\"><div class=\"progress-bar progress-bar-success\" style=\"width:0%;\"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class=\"btn btn-primary start\" disabled>
                    <i class=\"glyphicon glyphicon-upload\"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class=\"btn btn-warning cancel\">
                    <i class=\"glyphicon glyphicon-ban-circle\"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
{% endverbatim %}
</script>
<!-- The template to display files available for download -->
<script id=\"template-download\" type=\"text/x-tmpl\">
{% verbatim %}
{% endverbatim %}
</script>

<script src=\"{{asset('bundles/design/')}}fileupload/js/jquery.ui.widget.js\"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src=\"{{asset('bundles/design/')}}fileupload/js/tmpl.min.js\"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src=\"{{asset('bundles/design/')}}fileupload/js/load-image.all.min.js\"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src=\"{{asset('bundles/design/')}}fileupload/js/canvas-to-blob.min.js\"></script>
<!-- blueimp Gallery script -->
<script src=\"{{asset('bundles/design/')}}fileupload/js/jquery.blueimp-gallery.min.js\"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src=\"{{asset('bundles/design/')}}fileupload/js/jquery.iframe-transport.js\"></script>
<!-- The basic File Upload plugin -->
<script src=\"{{asset('bundles/design/')}}fileupload/js/jquery.fileupload.js\"></script>
<!-- The File Upload processing plugin -->
<script src=\"{{asset('bundles/design/')}}fileupload/js/jquery.fileupload-process.js\"></script>
<!-- The File Upload image preview & resize plugin -->
<script src=\"{{asset('bundles/design/')}}fileupload/js/jquery.fileupload-image.js\"></script>
<!-- The File Upload audio preview plugin -->
<script src=\"{{asset('bundles/design/')}}fileupload/js/jquery.fileupload-audio.js\"></script>
<!-- The File Upload video preview plugin -->
<script src=\"{{asset('bundles/design/')}}fileupload/js/jquery.fileupload-video.js\"></script>
<!-- The File Upload validation plugin -->
<script src=\"{{asset('bundles/design/')}}fileupload/js/jquery.fileupload-validate.js\"></script>
<!-- The File Upload user interface plugin -->
<script src=\"{{asset('bundles/design/')}}fileupload/js/jquery.fileupload-ui.js\"></script>
<!-- The main application script -->
{# src=\"{{asset('bundles/design/')}}fileupload/js/main.js\"></script>#}

<script>
\$(function () {
var html = \"\";
    'use strict';
    // Initialize the jQuery File Upload widget:
    \$('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:

        url: 'http://localhost/lifestyle/bundles/design/index.php?temp_dir=product_image',
      //  acceptFileTypes: /(\\.|\\/)(zip)\$/i,
        success: function(response)
        {
            console.log(response.files[0]);
            //database insert ajax
           
            
        }
    });
});

</script>

{% endblock %}", "AdminBundle:Dashboard:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Dashboard/index.html.twig");
    }
}
