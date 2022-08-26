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

/* AdminBundle:Pushnotification:index.html.twig */
class __TwigTemplate_c5e485af1263679186b239e3a45c183688e8c522d2012f47fa1cbeb66e464fa4 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Pushnotification:index.html.twig"));

        $this->parent = $this->loadTemplate("AdminBundle::Layout/adminlayout.html.twig", "AdminBundle:Pushnotification:index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo " Push Notification List ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 4
        echo "<style>
\t.paddBottom { padding-bottom: 20px; }
\t.container1 {
\t\tdisplay: block;
\t\tposition: relative;
\t\tpadding-left: 35px;
\t\tmargin-bottom: 12px;
\t\tcursor: pointer;
\t\tfont-size: 22px;
\t\t-webkit-user-select: none;
\t\t-moz-user-select: none;
\t\t-ms-user-select: none;
\t\tuser-select: none;
\t}

\t/* Hide the browser's default checkbox */
\t.container1 input {
\t\tposition: absolute;
\t\topacity: 0;
\t\tcursor: pointer;
\t\tdisplay: none;
\t}

\t/* Create a custom checkbox */
\t.checkmark {
\t\tposition: absolute;
\t\ttop: -22px;;
\t\tleft: 50px;
\t\theight: 23px;
\t\twidth: 23px;
\t\tbackground-color: #e5e5e5;
\t}

\t/* On mouse-over, add a grey background color */
\t.container1:hover input ~ .checkmark {
\t\tbackground-color: #ccc;
\t}

\t/* When the checkbox is checked, add a blue background */
\t.container1 input:checked ~ .checkmark {
\t\tbackground-color: #3c8dbc;
\t}

\t/* Create the checkmark/indicator (hidden when not checked) */
\t.checkmark:after {
\t\tcontent: \"\";
\t\tposition: absolute;
\t\tdisplay: none;
\t}

\t/* Show the checkmark when checked */
\t.container1 input:checked ~ .checkmark:after {
\t\tdisplay: block;
\t}

\t/* Style the checkmark/indicator */
\t.container1 .checkmark:after {
\t\tleft: 9px;
\t\ttop: 5px;
\t\twidth: 5px;
\t\theight: 10px;
\t\tborder: solid white;
\t\tborder-width: 0 3px 3px 0;
\t\t-webkit-transform: rotate(45deg);
\t\t-ms-transform: rotate(45deg);
\t\ttransform: rotate(45deg);
\t}
\t#delete_selected_input .btn{
\t\tbackground: #3c8dbc;
\t\tborder: 1px solid #3c8dbc;
\t}
</style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 77
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 78
        echo "    <section class=\"content-header\">
        <h1>
            Push notification list
            <small></small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i>Dashboard</a></li>
            <li class=\"active\">Push notification list</li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 90
            echo "            <div role=\"alert\" class=\"alert alert-success alert-dismissible fade in\">
                <button aria-label=\"Close\" data-dismiss=\"alert\" class=\"close\" type=\"button\"><span aria-hidden=\"true\">×</span></button>
                <strong>Alert!</strong>&nbsp; ";
            // line 92
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 96
            echo "            <div role=\"alert\" class=\"alert alert-danger alert-dismissible fade in\">
                <button aria-label=\"Close\" data-dismiss=\"alert\" class=\"close\" type=\"button\"><span aria-hidden=\"true\">×</span></button>
                <strong>Alert!</strong>&nbsp; ";
            // line 98
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        echo "        <div class=\"row\">
            <div class=\"col-xs-12\">
                <div class=\"box box-solid\">
                    <div class=\"nav-tab-custom\">

                        <ul class=\"nav nav-tabs\">

                            <li  class=\"active\"><a href=\"#general\" data-toggle=\"tab\">General</a></li>
                           

                        </ul>
                        <div class=\"tab-content\">
                            <div class=\"tab-pane active\"  id=\"general\">
                                <div class=\"box-header with-border\">
                                    ";
        // line 116
        echo "                                    <div class=\"pull-right\">
                                        <a href=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pushnotification_addpushnotification", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\" class=\"btn btn-primary btn-flat\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;ADD</a>
                                    </div>
                                </div>
                                <div class=\"box-body\">
                                    <div class=\"container-fluid table-responsive\">
                                        <table id=\"example1\" class=\"table table-bordered table-striped text-center\">
                                            <thead>
                                            <th>No.</th>
                                            <th>Notification Title</th>
                                            <th>Notification Message</th>
                                            ";
        // line 128
        echo "                                            <th>Send Date</th>
\t\t\t\t\t\t\t\t\t\t\t<th>Delete</th>
                                            </thead>
                                            <tbody>
                                                ";
        // line 132
        if (((isset($context["note_list"]) || array_key_exists("note_list", $context)) &&  !twig_test_empty(($context["note_list"] ?? $this->getContext($context, "note_list"))))) {
            // line 133
            echo "                                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["note_list"] ?? $this->getContext($context, "note_list")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                // line 134
                echo "                                                        <tr id=\"note_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["note"], "general_notification_id", []), "html", null, true);
                echo "\">
                                                            <td>";
                // line 135
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                                            <td>";
                // line 136
                echo twig_escape_filter($this->env, $this->getAttribute($context["note"], "title", []), "html", null, true);
                echo "</td>
                                                            <td>";
                // line 137
                echo twig_escape_filter($this->env, $this->getAttribute($context["note"], "message", []), "html", null, true);
                echo "</td>
                                                          ";
                // line 139
                echo "                                                            <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["note"], "create_date", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"deletecategory btn btn-danger btn-xs\" href=\"";
                // line 141
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pushnotification_deletenotification", ["id" => $this->getAttribute($context["note"], "general_notification_id", [])]), "html", null, true);
                echo "\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"delete\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"container1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"checkmark\" onclick=\"del_response(";
                // line 146
                echo twig_escape_filter($this->env, $this->getAttribute($context["note"], "general_notification_id", []), "html", null, true);
                echo ");\"></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 151
            echo "                                                ";
        }
        // line 152
        echo "                                            </tbody>
                                            <tfoot>
                                            <th>No.</th>
                                            <th>Notification Title</th>
                                            <th>Notification Message</th>
                                           ";
        // line 158
        echo "                                            <th>Send Date</th>
\t\t\t\t\t\t\t\t\t\t\t<th>Delete</th>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class=\"tab-pane \"  id=\"healthtip\">
                                <div class=\"box-header with-border\">
                                    ";
        // line 169
        echo "                                    <div class=\"pull-right\">
                                        <a href=\"";
        // line 170
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pushnotification_addpushnotification", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\" class=\"btn btn-primary btn-flat\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;ADD</a>
                                    </div>
                                </div>
                                <div class=\"box-body\">
                                    <div class=\"container-fluid table-responsive\">
                                        <table id=\"example1\" class=\"table table-bordered table-striped text-center\">
                                            <thead>
                                            <th>No.</th>
                                            <th>Notification Title</th>
                                            <th>Notification Message</th>
                                            <th>Send to</th>
                                            <th>Send Date</th>
\t\t\t\t\t\t\t\t\t\t\t<th>Delete</th>
                                            </thead>
                                            <tbody>
                                                ";
        // line 185
        if (((isset($context["health_list"]) || array_key_exists("health_list", $context)) &&  !twig_test_empty(($context["health_list"] ?? $this->getContext($context, "health_list"))))) {
            // line 186
            echo "                                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["health_list"] ?? $this->getContext($context, "health_list")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                // line 187
                echo "                                                        <tr>
                                                            <td>";
                // line 188
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                                            <td>";
                // line 189
                echo twig_escape_filter($this->env, $this->getAttribute($context["note"], "title", []), "html", null, true);
                echo "</td>
                                                            <td>";
                // line 190
                echo twig_escape_filter($this->env, $this->getAttribute($context["note"], "message", []), "html", null, true);
                echo "</td>
                                                            <td>";
                // line 191
                if (($this->getAttribute($context["note"], "send_to", []) == "CUST")) {
                    echo "Customer";
                }
                if (($this->getAttribute($context["note"], "send_to", []) == "DEL")) {
                    echo " Delivery Boy ";
                }
                echo "</td>
                                                            <td>";
                // line 192
                echo twig_escape_filter($this->env, $this->getAttribute($context["note"], "create_date", []), "html", null, true);
                echo "</td>
                                                            <td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"deletecategory btn btn-danger btn-xs\" href=\"";
                // line 194
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_deleteproduct", ["cat_id" => $this->getAttribute(($context["category"] ?? $this->getContext($context, "category")), "main_product_id", [])]), "html", null, true);
                echo "\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"delete\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 200
            echo "                                                ";
        }
        // line 201
        echo "                                            </tbody>
                                            <tfoot>
                                            <th>No.</th>
                                            <th>Notification Title</th>
                                            <th>Notification Message</th>
                                            <th>Send to</th>
                                            <th>Send Date</th>
                                            <th>Delete</th>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
    </section>
    <div class=\"modal fade\" id=\"myModal\" role=\"dialog\">
        <div class=\"modal-dialog\">\t  
            <!-- Modal content-->
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                    <h4 class=\"modal-title\">Message</h4>
                </div>
                <form action=\"#\" method=\"post\" id=\"model_form\"></form>
                <div class=\"modal-body\">

                </div>
                <div class=\"modal-footer\">
                    <button type=\"submit\" class=\"btn btn-primary btn-flat\">Yes</button>
                    <button type=\"button\" class=\"btn btn-default btn-flat\" data-dismiss=\"modal\">No</button>
                </div>
                </form>
            </div>

        </div>
    </div>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 246
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 247
        echo "    <script>
        /*function delete_msg(id) {
         \$(\"#model_form\").attr(\"action\").val();
         \$(\"#myModal\").modal(\"show\");
         }*/
        \$(document).ready(function () {
            \$('#example1').DataTable();
        });
\t\t\$('.deletecategory').click(function () {
\t\t\tvar cnfm = confirm('Are you sure, you want to delete?');
\t\t\tif (cnfm) {
\t\t\t\tvar cnfm1 = confirm(\"Confirmation: Are you sure, you want to delete?\");
\t\t\t\tif (cnfm1) {
\t\t\t\t\treturn true;
\t\t\t\t}
\t\t\t}
\t\t\treturn false;
\t\t});
\t\t
\t\tvar note_ids = [];
\t\tvar search_html = '';
\t\tfunction del_response(note_id){
\t\t\t
\t\t\tvar i = 0;
\t\t\tvar add_flag = true;
\t\t\tfor(i=0;i<note_ids.length;i++){
\t\t\t\tif(note_ids[i] == note_id){
\t\t\t\t\tadd_flag = false;
\t\t\t\t\tnote_ids.splice(i,1);
\t\t\t\t}
\t\t\t}
\t\t\tif(add_flag == true){
\t\t\t\tnote_ids.push(note_id);
\t\t\t}
\t\t\t
\t\t\tif(note_ids.length > 0){
\t\t\t\tif(note_ids.length == 1){
\t\t\t\t\t\$('#example1_filter').addClass('hide');
\t\t\t\t\t\$('#delete_selected_input').remove();
\t\t\t\t\t\$('#example1_filter').after('<div id=\"delete_selected_input\" class=\"text-right\"><input type=\"button\" class=\"btn btn-primary\" onclick=\"delete_selected_questions();\" value=\"Delete Selected\"></div>');
\t\t\t\t}
\t\t\t} else {
\t\t\t\t\$('#example1_filter').removeClass('hide');
\t\t\t\t\$('#delete_selected_input').remove();
\t\t\t}
\t\t}
\t\t
\t\tfunction delete_selected_questions(){
\t\t\tvar cnfm = confirm(\"Do you want delete the comments'?\");
\t\t\tif(cnfm){
\t\t\t\tvar cnfm2 = confirm(\"Are you sure?\");
\t\t\t\tif(cnfm2){\t\t\t
\t\t\t\t\tif(note_ids.length == 0){
\t\t\t\t\t\talert('Please select checkbox');
\t\t\t\t\t\treturn false;
\t\t\t\t\t}
\t\t\t\t\t
\t\t\t\t\tvar url = \"";
        // line 304
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pushnotification_deletenotificationbulk");
        echo "\";
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\turl: url,
\t\t\t\t\t\tdata: {\"note_ids\": note_ids.join()},
\t\t\t\t\t\tmethod: 'POST',
\t\t\t\t\t\tsuccess: function(response){
\t\t\t\t\t\t\tvar res = JSON.parse(response);
\t\t\t\t\t\t\tconsole.log(res);
\t\t\t\t\t\t\tif(res['message'] == 'failed'){
\t\t\t\t\t\t\t\tlocation.href = \"";
        // line 313
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index");
        echo "\";
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\tif(res['success'] == true){
\t\t\t\t\t\t\t\talert(res['message']);
\t\t\t\t\t\t\t\tfor(i=0;i<note_ids.length;i++){
\t\t\t\t\t\t\t\t\t\$('#note_' + note_ids[i]).remove();
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\tnote_ids = [];
\t\t\t\t\t\t\t\t\$('#example1_filter').removeClass('hide');
\t\t\t\t\t\t\t\t\$('#delete_selected_input').remove();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t},
\t\t\t\t\t\terror: function(error){
\t\t\t\t\t\t\tconsole.log(error);
\t\t\t\t\t\t}
\t\t\t\t\t});\t\t\t
\t\t\t\t}
\t\t\t}
\t\t}
\t\t
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Pushnotification:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  552 => 313,  540 => 304,  481 => 247,  475 => 246,  425 => 201,  422 => 200,  402 => 194,  397 => 192,  388 => 191,  384 => 190,  380 => 189,  376 => 188,  373 => 187,  355 => 186,  353 => 185,  335 => 170,  332 => 169,  320 => 158,  313 => 152,  310 => 151,  291 => 146,  283 => 141,  277 => 139,  273 => 137,  269 => 136,  265 => 135,  260 => 134,  242 => 133,  240 => 132,  234 => 128,  221 => 117,  218 => 116,  202 => 101,  193 => 98,  189 => 96,  184 => 95,  175 => 92,  171 => 90,  167 => 89,  159 => 84,  151 => 78,  145 => 77,  66 => 4,  60 => 3,  48 => 2,  32 => 1,);
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
{% block title %} Push Notification List {% endblock %}
{% block css %}
<style>
\t.paddBottom { padding-bottom: 20px; }
\t.container1 {
\t\tdisplay: block;
\t\tposition: relative;
\t\tpadding-left: 35px;
\t\tmargin-bottom: 12px;
\t\tcursor: pointer;
\t\tfont-size: 22px;
\t\t-webkit-user-select: none;
\t\t-moz-user-select: none;
\t\t-ms-user-select: none;
\t\tuser-select: none;
\t}

\t/* Hide the browser's default checkbox */
\t.container1 input {
\t\tposition: absolute;
\t\topacity: 0;
\t\tcursor: pointer;
\t\tdisplay: none;
\t}

\t/* Create a custom checkbox */
\t.checkmark {
\t\tposition: absolute;
\t\ttop: -22px;;
\t\tleft: 50px;
\t\theight: 23px;
\t\twidth: 23px;
\t\tbackground-color: #e5e5e5;
\t}

\t/* On mouse-over, add a grey background color */
\t.container1:hover input ~ .checkmark {
\t\tbackground-color: #ccc;
\t}

\t/* When the checkbox is checked, add a blue background */
\t.container1 input:checked ~ .checkmark {
\t\tbackground-color: #3c8dbc;
\t}

\t/* Create the checkmark/indicator (hidden when not checked) */
\t.checkmark:after {
\t\tcontent: \"\";
\t\tposition: absolute;
\t\tdisplay: none;
\t}

\t/* Show the checkmark when checked */
\t.container1 input:checked ~ .checkmark:after {
\t\tdisplay: block;
\t}

\t/* Style the checkmark/indicator */
\t.container1 .checkmark:after {
\t\tleft: 9px;
\t\ttop: 5px;
\t\twidth: 5px;
\t\theight: 10px;
\t\tborder: solid white;
\t\tborder-width: 0 3px 3px 0;
\t\t-webkit-transform: rotate(45deg);
\t\t-ms-transform: rotate(45deg);
\t\ttransform: rotate(45deg);
\t}
\t#delete_selected_input .btn{
\t\tbackground: #3c8dbc;
\t\tborder: 1px solid #3c8dbc;
\t}
</style>
{% endblock %}
{% block content %}
    <section class=\"content-header\">
        <h1>
            Push notification list
            <small></small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"{{path('admin_dashboard_index',{'domain':app.session.get('domain')})}}\"><i class=\"fa fa-dashboard\"></i>Dashboard</a></li>
            <li class=\"active\">Push notification list</li>
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
                    <div class=\"nav-tab-custom\">

                        <ul class=\"nav nav-tabs\">

                            <li  class=\"active\"><a href=\"#general\" data-toggle=\"tab\">General</a></li>
                           

                        </ul>
                        <div class=\"tab-content\">
                            <div class=\"tab-pane active\"  id=\"general\">
                                <div class=\"box-header with-border\">
                                    {#<h3 class=\"box-title\">Progress Bars Different Sizes</h3>#}
                                    <div class=\"pull-right\">
                                        <a href=\"{{path('admin_pushnotification_addpushnotification',{'domain':app.session.get('domain')})}}\" class=\"btn btn-primary btn-flat\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;ADD</a>
                                    </div>
                                </div>
                                <div class=\"box-body\">
                                    <div class=\"container-fluid table-responsive\">
                                        <table id=\"example1\" class=\"table table-bordered table-striped text-center\">
                                            <thead>
                                            <th>No.</th>
                                            <th>Notification Title</th>
                                            <th>Notification Message</th>
                                            {# <th>Send to</th> #}
                                            <th>Send Date</th>
\t\t\t\t\t\t\t\t\t\t\t<th>Delete</th>
                                            </thead>
                                            <tbody>
                                                {% if note_list is defined and note_list is not empty %}
                                                    {% for note in note_list %}
                                                        <tr id=\"note_{{ note.general_notification_id }}\">
                                                            <td>{{loop.index}}</td>
                                                            <td>{{note.title}}</td>
                                                            <td>{{note.message}}</td>
                                                          {#   <td>{% if note.send_to == 'CUST' %}Customer{%endif%}{% if note.send_to == 'DEL' %} Delivery Boy {% endif %}</td> #}
                                                            <td>{{note.create_date}}</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"deletecategory btn btn-danger btn-xs\" href=\"{{ path('admin_pushnotification_deletenotification', {'id': note.general_notification_id}) }}\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"delete\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"container1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"checkmark\" onclick=\"del_response({{ note.general_notification_id }});\"></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
                                                        </tr>
                                                    {% endfor %}
                                                {% endif %}
                                            </tbody>
                                            <tfoot>
                                            <th>No.</th>
                                            <th>Notification Title</th>
                                            <th>Notification Message</th>
                                           {#  <th>Send to</th> #}
                                            <th>Send Date</th>
\t\t\t\t\t\t\t\t\t\t\t<th>Delete</th>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class=\"tab-pane \"  id=\"healthtip\">
                                <div class=\"box-header with-border\">
                                    {#<h3 class=\"box-title\">Progress Bars Different Sizes</h3>#}
                                    <div class=\"pull-right\">
                                        <a href=\"{{path('admin_pushnotification_addpushnotification',{'domain':app.session.get('domain')})}}\" class=\"btn btn-primary btn-flat\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;ADD</a>
                                    </div>
                                </div>
                                <div class=\"box-body\">
                                    <div class=\"container-fluid table-responsive\">
                                        <table id=\"example1\" class=\"table table-bordered table-striped text-center\">
                                            <thead>
                                            <th>No.</th>
                                            <th>Notification Title</th>
                                            <th>Notification Message</th>
                                            <th>Send to</th>
                                            <th>Send Date</th>
\t\t\t\t\t\t\t\t\t\t\t<th>Delete</th>
                                            </thead>
                                            <tbody>
                                                {% if health_list is defined and health_list is not empty %}
                                                    {% for note in health_list %}
                                                        <tr>
                                                            <td>{{loop.index}}</td>
                                                            <td>{{note.title}}</td>
                                                            <td>{{note.message}}</td>
                                                            <td>{% if note.send_to == 'CUST' %}Customer{%endif%}{% if note.send_to == 'DEL' %} Delivery Boy {% endif %}</td>
                                                            <td>{{note.create_date}}</td>
                                                            <td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"deletecategory btn btn-danger btn-xs\" href=\"{{ path('admin_product_deleteproduct', {'cat_id':category.main_product_id}) }}\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"delete\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
                                                        </tr>
                                                    {% endfor %}
                                                {% endif %}
                                            </tbody>
                                            <tfoot>
                                            <th>No.</th>
                                            <th>Notification Title</th>
                                            <th>Notification Message</th>
                                            <th>Send to</th>
                                            <th>Send Date</th>
                                            <th>Delete</th>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
    </section>
    <div class=\"modal fade\" id=\"myModal\" role=\"dialog\">
        <div class=\"modal-dialog\">\t  
            <!-- Modal content-->
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                    <h4 class=\"modal-title\">Message</h4>
                </div>
                <form action=\"#\" method=\"post\" id=\"model_form\"></form>
                <div class=\"modal-body\">

                </div>
                <div class=\"modal-footer\">
                    <button type=\"submit\" class=\"btn btn-primary btn-flat\">Yes</button>
                    <button type=\"button\" class=\"btn btn-default btn-flat\" data-dismiss=\"modal\">No</button>
                </div>
                </form>
            </div>

        </div>
    </div>\t
{% endblock %}

{% block js %}
    <script>
        /*function delete_msg(id) {
         \$(\"#model_form\").attr(\"action\").val();
         \$(\"#myModal\").modal(\"show\");
         }*/
        \$(document).ready(function () {
            \$('#example1').DataTable();
        });
\t\t\$('.deletecategory').click(function () {
\t\t\tvar cnfm = confirm('Are you sure, you want to delete?');
\t\t\tif (cnfm) {
\t\t\t\tvar cnfm1 = confirm(\"Confirmation: Are you sure, you want to delete?\");
\t\t\t\tif (cnfm1) {
\t\t\t\t\treturn true;
\t\t\t\t}
\t\t\t}
\t\t\treturn false;
\t\t});
\t\t
\t\tvar note_ids = [];
\t\tvar search_html = '';
\t\tfunction del_response(note_id){
\t\t\t
\t\t\tvar i = 0;
\t\t\tvar add_flag = true;
\t\t\tfor(i=0;i<note_ids.length;i++){
\t\t\t\tif(note_ids[i] == note_id){
\t\t\t\t\tadd_flag = false;
\t\t\t\t\tnote_ids.splice(i,1);
\t\t\t\t}
\t\t\t}
\t\t\tif(add_flag == true){
\t\t\t\tnote_ids.push(note_id);
\t\t\t}
\t\t\t
\t\t\tif(note_ids.length > 0){
\t\t\t\tif(note_ids.length == 1){
\t\t\t\t\t\$('#example1_filter').addClass('hide');
\t\t\t\t\t\$('#delete_selected_input').remove();
\t\t\t\t\t\$('#example1_filter').after('<div id=\"delete_selected_input\" class=\"text-right\"><input type=\"button\" class=\"btn btn-primary\" onclick=\"delete_selected_questions();\" value=\"Delete Selected\"></div>');
\t\t\t\t}
\t\t\t} else {
\t\t\t\t\$('#example1_filter').removeClass('hide');
\t\t\t\t\$('#delete_selected_input').remove();
\t\t\t}
\t\t}
\t\t
\t\tfunction delete_selected_questions(){
\t\t\tvar cnfm = confirm(\"Do you want delete the comments'?\");
\t\t\tif(cnfm){
\t\t\t\tvar cnfm2 = confirm(\"Are you sure?\");
\t\t\t\tif(cnfm2){\t\t\t
\t\t\t\t\tif(note_ids.length == 0){
\t\t\t\t\t\talert('Please select checkbox');
\t\t\t\t\t\treturn false;
\t\t\t\t\t}
\t\t\t\t\t
\t\t\t\t\tvar url = \"{{ path('admin_pushnotification_deletenotificationbulk') }}\";
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\turl: url,
\t\t\t\t\t\tdata: {\"note_ids\": note_ids.join()},
\t\t\t\t\t\tmethod: 'POST',
\t\t\t\t\t\tsuccess: function(response){
\t\t\t\t\t\t\tvar res = JSON.parse(response);
\t\t\t\t\t\t\tconsole.log(res);
\t\t\t\t\t\t\tif(res['message'] == 'failed'){
\t\t\t\t\t\t\t\tlocation.href = \"{{ path('admin_dashboard_index') }}\";
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\tif(res['success'] == true){
\t\t\t\t\t\t\t\talert(res['message']);
\t\t\t\t\t\t\t\tfor(i=0;i<note_ids.length;i++){
\t\t\t\t\t\t\t\t\t\$('#note_' + note_ids[i]).remove();
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\tnote_ids = [];
\t\t\t\t\t\t\t\t\$('#example1_filter').removeClass('hide');
\t\t\t\t\t\t\t\t\$('#delete_selected_input').remove();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t},
\t\t\t\t\t\terror: function(error){
\t\t\t\t\t\t\tconsole.log(error);
\t\t\t\t\t\t}
\t\t\t\t\t});\t\t\t
\t\t\t\t}
\t\t\t}
\t\t}
\t\t
    </script>
{% endblock %}", "AdminBundle:Pushnotification:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Pushnotification/index.html.twig");
    }
}
