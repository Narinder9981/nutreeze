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

/* AdminBundle:DriverOrders:index.html.twig */
class __TwigTemplate_9c04da60d06515be16dc1bba37ba5656e6bf73c0242ccb14d16f37a74f0df595 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:DriverOrders:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:DriverOrders:index.html.twig", 1);
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

        <h1>
            Driver Orders
        </h1>

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
                    <div class=\"box-header well\">
                        <p>note*: Please select date to print Delivery Stickers</p>
                        <form class=\"form-inline\" method=\"POST\">
                            <div class=\"form-group\">
                                <label>Date : </label>
                                <input type=\"text\" id=\"date_given\" class =\"form-control datepicker\" name=\"date_given\" value=\"";
        // line 36
        if (((isset($context["date_given"]) || array_key_exists("date_given", $context)) &&  !twig_test_empty(($context["date_given"] ?? $this->getContext($context, "date_given"))))) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["date_given"] ?? $this->getContext($context, "date_given")), "d-m-Y"), "html", null, true);
        }
        echo "\" />
                            </div>

                            ";
        // line 39
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 1)) {
            // line 40
            echo "
                                <div class=\"form-group\">
                                    <label>Driver : </label>
                                    ";
            // line 43
            if (((isset($context["drivers"]) || array_key_exists("drivers", $context)) &&  !twig_test_empty(($context["drivers"] ?? $this->getContext($context, "drivers"))))) {
                // line 44
                echo "                                        <select class=\"form-control\" name=\"driver_given\" id=\"driver_given\" >
                                            <option value=\"\" >-- Select Driver --</option>
                                            ";
                // line 46
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["drivers"]);
                foreach ($context['_seq'] as $context["_key"] => $context["drivers"]) {
                    // line 47
                    echo "                                                <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["drivers"], "user_master_id", []), "html", null, true);
                    echo "\" ";
                    if ((($context["driver_id"] ?? $this->getContext($context, "driver_id")) == $this->getAttribute($context["drivers"], "user_master_id", []))) {
                        echo " selected ";
                    }
                    echo " > ";
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["drivers"], "user_firstname", []) . " ") . $this->getAttribute($context["drivers"], "user_lastname", [])), "html", null, true);
                    echo " </option>
                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['drivers'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 49
                echo "                                        </select>
                                    ";
            }
            // line 51
            echo "                                </div>

                                <div class=\"form-group\">
                                    <label>Time Slots </label>

                                    ";
            // line 56
            if (((isset($context["timeSlots"]) || array_key_exists("timeSlots", $context)) &&  !twig_test_empty(($context["timeSlots"] ?? $this->getContext($context, "timeSlots"))))) {
                // line 57
                echo "                                        <select class=\"form-control\" name=\"time_id_given\" >
                                            <option value=\"\" >--Select Time Slot</option>
                                            ";
                // line 59
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["timeSlots"]);
                foreach ($context['_seq'] as $context["_key"] => $context["timeSlots"]) {
                    // line 60
                    echo "                                                <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["timeSlots"], "main_time_slot_master_id", []), "html", null, true);
                    echo "\" ";
                    if ((($context["time_id_given"] ?? $this->getContext($context, "time_id_given")) == $this->getAttribute($context["timeSlots"], "main_time_slot_master_id", []))) {
                        echo " selected ";
                    }
                    echo "> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["timeSlots"], "title", []), "html", null, true);
                    echo " : ( ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["timeSlots"], "start_time", []), "h:i a"), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["timeSlots"], "end_time", []), "h:i a"), "html", null, true);
                    echo " ) </option>
                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['timeSlots'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 62
                echo "                                        </select>
                                    ";
            }
            // line 64
            echo "
                                </div>

                                <div class=\"form-group\">
                                    <label>Area</label>

                                    ";
            // line 70
            if (((isset($context["area_list"]) || array_key_exists("area_list", $context)) &&  !twig_test_empty(($context["area_list"] ?? $this->getContext($context, "area_list"))))) {
                // line 71
                echo "                                        <select class=\"form-control\" name=\"area_id_given\" >
                                            <option value=\"\" >--Select Area</option>
                                            ";
                // line 73
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["area_list"]);
                foreach ($context['_seq'] as $context["_key"] => $context["area_list"]) {
                    // line 74
                    echo "                                                <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["area_list"], "main_area_id", []), "html", null, true);
                    echo "\" ";
                    if ((($context["area_id_given"] ?? $this->getContext($context, "area_id_given")) == $this->getAttribute($context["area_list"], "main_area_id", []))) {
                        echo " selected ";
                    }
                    echo " > ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["area_list"], "area_name", []), "html", null, true);
                    echo " </option>
                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['area_list'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 76
                echo "                                        </select>
                                    ";
            }
            // line 78
            echo "                                </div>

                            ";
        }
        // line 81
        echo "
                            <div class=\"row col-md-12 text-center\" style=\"margin-top : 5px\">
                                <button class=\"btn btn-primary\" name=\"filter\" value=\"filter\" type=\"submit\">Filter</button>

                                 ";
        // line 85
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "role_id"], "method") == 1)) {
            // line 86
            echo "
                                    ";
            // line 87
            if (((isset($context["driver_orders_data"]) || array_key_exists("driver_orders_data", $context)) &&  !twig_test_empty(($context["driver_orders_data"] ?? $this->getContext($context, "driver_orders_data"))))) {
                // line 88
                echo "
                                        



                                        <button class=\"btn btn-warning\" name=\"print_delivery_sticker\" value=\"print_delivery_sticker\" id=\"print_delivery_sticker\" type=\"submit\">Print Delivery Sticker for <b>";
                // line 93
                echo twig_escape_filter($this->env, ($context["date_given"] ?? $this->getContext($context, "date_given")), "html", null, true);
                echo "</b></button>

                                      

                                        
                                        <a class=\"btn btn-info\" id=\"printMealSticker\" >Print Meal Stickers for <b>";
                // line 98
                echo twig_escape_filter($this->env, ($context["date_given"] ?? $this->getContext($context, "date_given")), "html", null, true);
                echo "</b></a>
                                    ";
            }
            // line 100
            echo "
                                ";
        }
        // line 102
        echo "
                            </div>
                        </form>  

                        <div class=\"row col-md-12 text-center hide mealCategory\">
                            <p>Select Category</p>
                            ";
        // line 108
        if (((isset($context["productCategory"]) || array_key_exists("productCategory", $context)) &&  !twig_test_empty(($context["productCategory"] ?? $this->getContext($context, "productCategory"))))) {
            // line 109
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["productCategory"]);
            foreach ($context['_seq'] as $context["_key"] => $context["productCategory"]) {
                // line 110
                echo "                                    <label class=\"checkbox-inline\">
                                        <input type=\"checkbox\" name=\"productCategory\" value=\"";
                // line 111
                echo twig_escape_filter($this->env, $this->getAttribute($context["productCategory"], "main_product_category_master_id", []), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["productCategory"], "product_category_name", []), "html", null, true);
                echo "
                                    </label>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['productCategory'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 114
            echo "                            ";
        }
        // line 115
        echo "                            </br>
                            <button class=\"btn btn-primary\" id=\"makePrintBtn\">Go</button>
                        </div>


                    </div>  
                    <div class=\"box-body table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>
                           ";
        // line 126
        echo "                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>User ID</th>
                            <th>Package</th>
                            <th>Order Period</th>
                            <th>Delivery Method ";
        // line 131
        echo " </th>
                            <th>Time</th>
                            <th>Driver</th>

                            <th>Delivery Address </th>
\t\t\t\t\t\t\t<th>Governorate</th>
\t\t\t\t\t\t\t<th>Area</th>
\t\t\t\t\t\t\t<th>Block</th>
\t\t\t\t\t\t\t
                            <th>Details</th>
                            </thead>
                            ";
        // line 231
        echo "                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>

<div id=\"myModal\" class=\"modal fade\" role=\"dialog\">
    <div class=\"modal-dialog\">
        <!-- Modal content-->
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                <h4 class=\"modal-title\">Order Meals</h4>
            </div>
            <div class=\"modal-body\">
                <ul class=\"list-group\">
                    
                </ul>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
            </div>
        </div>

    </div>  
</div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 263
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 264
        echo "    <script>
        \$('.list-group').html('');
        function getmealdata(order_id, date_given){
            var url = \"";
        // line 267
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_driverorders_getordermealdata");
        echo "/\" + order_id + \"/\" + date_given;
            \$.ajax({
                url: url,
                success: function(response){
                    \$('.list-group').html(response);
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

        \$(document).ready(function () {

            /* ,
            exportOptions: {
                format: {
                    body: function (data, row, column, node) {
                        if(column = 7){
                            data = data.replace(/<br\\s*\\/?>/ig, \"\\n\");
                            data = data.replace(/<\\/?[^>]+(>|\$)/g, \"\");
                            return data;
                        }

                        return data;
                    }
                }
            } */

            function newexportaction(e, dt, button, config) {
                var self = this;
                var oldStart = dt.settings()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, settings) {
                        // Call the original action function
                        if (button[0].className.indexOf('buttons-copy') >= 0) {
                            \$.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                            \$.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                                \$.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                                \$.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                            \$.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                                \$.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                                \$.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                            \$.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                                \$.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                                \$.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-print') >= 0) {
                            \$.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                        }
                        dt.one('preXhr', function (e, s, data) {
                            // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                            // Set the property to what it was before exporting.
                            settings._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export settings
                dt.ajax.reload();
            };
\t\t\t";
        // line 352
        echo "\t\t\t var url = \"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_driverorders_getdriverorders");
        echo "/";
        echo twig_escape_filter($this->env, ($context["driver_id"] ?? $this->getContext($context, "driver_id")), "html", null, true);
        echo "\";
\t\t\t";
        // line 353
        if (((isset($context["date_given"]) || array_key_exists("date_given", $context)) &&  !twig_test_empty(($context["date_given"] ?? $this->getContext($context, "date_given"))))) {
            // line 354
            echo "                url += \"/";
            echo twig_escape_filter($this->env, ($context["date_given"] ?? $this->getContext($context, "date_given")), "html", null, true);
            echo "\";
            ";
        }
        // line 356
        echo "           ";
        // line 358
        echo " 
            ";
        // line 359
        if ((isset($context["time_id_given"]) || array_key_exists("time_id_given", $context))) {
            // line 360
            echo "                url += \"/";
            echo twig_escape_filter($this->env, ($context["time_id_given"] ?? $this->getContext($context, "time_id_given")), "html", null, true);
            echo "\";
            ";
        }
        // line 362
        echo "\t\t\t";
        $context["area_id"] = ($context["area_id_given"] ?? $this->getContext($context, "area_id_given"));
        echo " 
            ";
        // line 363
        if ((isset($context["area_id"]) || array_key_exists("area_id", $context))) {
            // line 364
            echo "                url += \"/";
            echo twig_escape_filter($this->env, ($context["area_id"] ?? $this->getContext($context, "area_id")), "html", null, true);
            echo "\";
           ";
        }
        // line 366
        echo "\t\t  

            \$('#list').DataTable({
                processing: true,
\t\t\t\tserverSide: true,
\t\t\t\tajax: url,
                dom: 'Bfrtip',
                columnDefs: [
                    { orderable: false, targets: -1 },
                    { orderable: false, targets: -3 }
                ],
                buttons: [
                    {
                        extend : 'copy',
                        pageSize : 'LEGAL',
                        title : function() {
                            return 'Driver Orders';
                        },
                    },
                    {
                        extend : 'excel',
                        pageSize : 'LEGAL',
                        title : function() {
                            return 'Driver Orders Excel';
                        },
                        action : newexportaction
                    },
                    {
\t\t\t\t\textend : 'csv',
                        pageSize : 'LEGAL',
                        title : function() {
                            return 'Driver Orders CSV';
                        },
                        action : newexportaction
                    },
                    {
                        extend : 'pdfHtml5',
                        pageSize : 'LEGAL',
                        title : function() {
                            return 'Driver Orders PDF';
                        },
                    }
                ],
            });

            \$('.datepicker').datepicker({
                format: 'dd-mm-yyyy'
            });


            \$(\"#print_delivery_sticker\").click(function (e) {

                if (\$('#date_given').val() == '') {
                    e.preventDefault();
                    alert(\"Please Select the Date\");
                }
            });

            \$(\"#print_driver_sticker\").click(function (e) {

                if (\$('#date_given').val() == '') {
                    e.preventDefault();
                    alert(\"Please Select the Date\");
                }
                if (\$('#driver_given').val() == '') {
                    e.preventDefault();
                    alert(\"Please Select Driver\");
                }
            });

            \$('#printMealSticker').click(function () {
                \$('.mealCategory').toggleClass('hide');
            });


            \$('#makePrintBtn').click(function () {

        ";
        // line 443
        if (((isset($context["date_given"]) || array_key_exists("date_given", $context)) &&  !twig_test_empty(($context["date_given"] ?? $this->getContext($context, "date_given"))))) {
            // line 444
            echo "                            let link_href = \"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_driverorders_printmealsticker", ["order_id" => "0", "driver_id" => ($context["driver_id"] ?? $this->getContext($context, "driver_id")), "date_given" => twig_date_format_filter($this->env, ($context["date_given"] ?? $this->getContext($context, "date_given")), "U"), "time_id_given" => ($context["time_id_given"] ?? $this->getContext($context, "time_id_given")), "area_id_given" => ($context["area_id_given"] ?? $this->getContext($context, "area_id_given"))]), "html", null, true);
            echo "\";
            ";
        } else {
            // line 445
            echo " \t 
                            let link_href = \"";
            // line 446
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_driverorders_printmealsticker", ["order_id" => "0", "driver_id" => ($context["driver_id"] ?? $this->getContext($context, "driver_id")), "date_given" => 0, "time_id_given" => ($context["time_id_given"] ?? $this->getContext($context, "time_id_given")), "area_id_given" => ($context["area_id_given"] ?? $this->getContext($context, "area_id_given"))]), "html", null, true);
            echo "\";
        ";
        }
        // line 447
        echo " \t 
                            let include_string = [];

                            \$(\"input[name=productCategory]\").each(function () {
                                if (\$(this).is(\":checked\")) {
                                    makeSingleObject = {
                                        productCategory: \$(this).val()
                                    };
                                    include_string.push(makeSingleObject);
                                }
                            });

                            if (include_string.length > 0) {

                                include_string = JSON.stringify(include_string);
                                link_href += \"?include_string=\" + include_string;
                                console.log({include_string, link_href});

                                window.location.href = link_href;
                            } else {
                                alert(\"Please Select Any One Category\");
                            }
                        });

                    });
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:DriverOrders:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  599 => 447,  594 => 446,  591 => 445,  585 => 444,  583 => 443,  504 => 366,  498 => 364,  496 => 363,  491 => 362,  485 => 360,  483 => 359,  480 => 358,  478 => 356,  472 => 354,  470 => 353,  463 => 352,  390 => 267,  385 => 264,  379 => 263,  342 => 231,  329 => 131,  322 => 126,  310 => 115,  307 => 114,  296 => 111,  293 => 110,  288 => 109,  286 => 108,  278 => 102,  274 => 100,  269 => 98,  261 => 93,  254 => 88,  252 => 87,  249 => 86,  247 => 85,  241 => 81,  236 => 78,  232 => 76,  217 => 74,  213 => 73,  209 => 71,  207 => 70,  199 => 64,  195 => 62,  176 => 60,  172 => 59,  168 => 57,  166 => 56,  159 => 51,  155 => 49,  140 => 47,  136 => 46,  132 => 44,  130 => 43,  125 => 40,  123 => 39,  115 => 36,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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

        <h1>
            Driver Orders
        </h1>

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
                    <div class=\"box-header well\">
                        <p>note*: Please select date to print Delivery Stickers</p>
                        <form class=\"form-inline\" method=\"POST\">
                            <div class=\"form-group\">
                                <label>Date : </label>
                                <input type=\"text\" id=\"date_given\" class =\"form-control datepicker\" name=\"date_given\" value=\"{% if date_given is defined and date_given is not empty %}{{ date_given | date('d-m-Y') }}{% endif%}\" />
                            </div>

                            {% if app.session.get('role_id') == 1 %}

                                <div class=\"form-group\">
                                    <label>Driver : </label>
                                    {% if drivers is defined and drivers is not empty %}
                                        <select class=\"form-control\" name=\"driver_given\" id=\"driver_given\" >
                                            <option value=\"\" >-- Select Driver --</option>
                                            {% for drivers in drivers %}
                                                <option value=\"{{drivers.user_master_id}}\" {% if driver_id == drivers.user_master_id %} selected {% endif %} > {{ drivers.user_firstname ~\" \"~ drivers.user_lastname }} </option>
                                            {% endfor %}
                                        </select>
                                    {% endif %}
                                </div>

                                <div class=\"form-group\">
                                    <label>Time Slots </label>

                                    {% if timeSlots is defined and timeSlots is not empty %}
                                        <select class=\"form-control\" name=\"time_id_given\" >
                                            <option value=\"\" >--Select Time Slot</option>
                                            {% for timeSlots in timeSlots %}
                                                <option value=\"{{timeSlots.main_time_slot_master_id}}\" {% if time_id_given == timeSlots.main_time_slot_master_id %} selected {% endif %}> {{ timeSlots.title }} : ( {{ timeSlots.start_time | date('h:i a') }} - {{ timeSlots.end_time | date('h:i a') }} ) </option>
                                            {% endfor %}
                                        </select>
                                    {% endif %}

                                </div>

                                <div class=\"form-group\">
                                    <label>Area</label>

                                    {% if area_list is defined and area_list is not empty %}
                                        <select class=\"form-control\" name=\"area_id_given\" >
                                            <option value=\"\" >--Select Area</option>
                                            {% for area_list in area_list %}
                                                <option value=\"{{area_list.main_area_id}}\" {% if area_id_given == area_list.main_area_id %} selected {% endif %} > {{ area_list.area_name }} </option>
                                            {% endfor %}
                                        </select>
                                    {% endif %}
                                </div>

                            {% endif %}

                            <div class=\"row col-md-12 text-center\" style=\"margin-top : 5px\">
                                <button class=\"btn btn-primary\" name=\"filter\" value=\"filter\" type=\"submit\">Filter</button>

                                 {% if app.session.get('role_id') == 1 %}

                                    {%if driver_orders_data is defined and driver_orders_data is not empty%}

                                        



                                        <button class=\"btn btn-warning\" name=\"print_delivery_sticker\" value=\"print_delivery_sticker\" id=\"print_delivery_sticker\" type=\"submit\">Print Delivery Sticker for <b>{{date_given}}</b></button>

                                      

                                        
                                        <a class=\"btn btn-info\" id=\"printMealSticker\" >Print Meal Stickers for <b>{{date_given }}</b></a>
                                    {% endif %}

                                {% endif %}

                            </div>
                        </form>  

                        <div class=\"row col-md-12 text-center hide mealCategory\">
                            <p>Select Category</p>
                            {% if productCategory is defined and productCategory is not empty %}
                                {% for productCategory in productCategory %}
                                    <label class=\"checkbox-inline\">
                                        <input type=\"checkbox\" name=\"productCategory\" value=\"{{productCategory.main_product_category_master_id}}\">{{productCategory.product_category_name}}
                                    </label>
                                {% endfor %}
                            {% endif %}
                            </br>
                            <button class=\"btn btn-primary\" id=\"makePrintBtn\">Go</button>
                        </div>


                    </div>  
                    <div class=\"box-body table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>
                           {# <th>Box No.</th>#}
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>User ID</th>
                            <th>Package</th>
                            <th>Order Period</th>
                            <th>Delivery Method {#/ Time#} </th>
                            <th>Time</th>
                            <th>Driver</th>

                            <th>Delivery Address </th>
\t\t\t\t\t\t\t<th>Governorate</th>
\t\t\t\t\t\t\t<th>Area</th>
\t\t\t\t\t\t\t<th>Block</th>
\t\t\t\t\t\t\t
                            <th>Details</th>
                            </thead>
                            {# <tbody>

                                {%if driver_orders_data is defined and driver_orders_data is not empty%}
                                    {%for driver_orders_data in driver_orders_data %}
                                        <tr>
                                            <td>{{loop.index}}</td>
                                            <td>{{driver_orders_data.customer_name}}</td>
                                            <td>{{driver_orders_data.unique_user_id}}</td>
                                            <td>
                                                {% if driver_orders_data.package_details is defined and driver_orders_data.package_details is not empty %}
                                                    {{driver_orders_data.package_details.package_name}}
                                                    - {{driver_orders_data.remaining_days_to_end_order}} days remains
                                                {% endif %}
                                            </td>
                                            <td>{{driver_orders_data.start_date | date('d-m-Y') }} to {{driver_orders_data.end_date | date('d-m-Y') }}</td>

                                            <td>{{driver_orders_data.delivery_method_name}}</td>

                                            <td> {{driver_orders_data.driver_name}} </td>
                                            <td>
                                                 {{ driver_orders_data.area_name }}<br><b> B:</b>{{driver_orders_data.address_name}}<br><b> S:</b>{{ driver_orders_data.street }} {{ driver_orders_data.address_type | capitalize }}<br>{% if driver_orders_data.address_name2 != '' %}<b> A:</b>{{driver_orders_data.address_name2}}<br>{% endif %} <b>H:</b>{{ driver_orders_data.flate_house_number }}, {{ driver_orders_data.society_building_name }}<br><b> C:</b>{{ driver_orders_data.mobile_no }}  
                                                
                                            </td>
                                            <td>
                                                <button class=\"btn btn-xs btn-info\" data-toggle=\"modal\" data-target=\"#myModal_{{driver_orders_data.order_master_id}}\" >Meals</button>
                                                 <a class=\"btn btn-xs btn-warning\" href=\"{{path(\"admin_orders_getmealsdatewisefilter\",{quick_access:'all',order_id : driver_orders_data.order_master_id })}}\" ><i class=\"fa fa-edit\"></i></a>
                                                {% if app.session.get('role_id') == 1 and  driver_orders_data.remaining_days_to_end_order != '0' and driver_orders_data.remaining_days_to_end_order != 0 %}
                                                    {% if date_given is defined and date_given is not empty %}

                                                        <a class=\"btn btn-success btn-xs\" href=\"{{path('admin_driverorders_printdeliverysticker',{
                                                            'order_id' : driver_orders_data.order_master_id,
                                                            'driver_id' : driver_id,
                                                            'date_given' : date_given | date('U') ,
                                                            'time_id_given' : time_id_given,
                                                            'area_id_given' : area_id_given
                                                        })}}\">Delivery Sticker for <b>{{date_given}}</b></a>

                                                        <a class=\"btn btn-danger btn-xs\" href=\"{{path('admin_driverorders_printmealsticker',{'order_id':driver_orders_data.order_master_id,'driver_id' : driver_id,'date_given' : date_given | date('U') ,'time_id_given' : time_id_given,'area_id_given' : area_id_given})}}\"> Meal Sticker for <b>{{date_given}}</b></a>

                                                    {% else %}

                                                        <a class=\"btn btn-success btn-xs\" href=\"{{path('admin_driverorders_printdeliverysticker',{
                                                            'order_id' : driver_orders_data.order_master_id,
                                                            'driver_id' : driver_id,
                                                            'date_given' : driver_orders_data.start_date | date('U') ,
                                                            'time_id_given' : time_id_given,
                                                            'area_id_given' : area_id_given
                                                        })}}\">Delivery Sticker  for <b>{{date_given}}</b></a>

                                                        <a class=\"btn btn-danger btn-xs\" href=\"{{path('admin_driverorders_printmealsticker',{'order_id':driver_orders_data.order_master_id,'driver_id' : 0,'date_given' : 0 ,'time_id_given' : time_id_given,'area_id_given' : area_id_given})}}\"> Meal Sticker  for <b>{{date_given}}</b></a>

                                                    {% endif %}
                                                   

                                                {% endif %}
                                            </td>

                                        <div id=\"myModal_{{driver_orders_data.order_master_id}}\" class=\"modal fade\" role=\"dialog\">
                                            <div class=\"modal-dialog\">
                                                {% set totalMeals = 0 %}
                                                {% set totalSnacks = 0 %}
                                                {% set totalSoups = 0 %}

                                                <!-- Modal content-->
                                                <div class=\"modal-content\">
                                                    <div class=\"modal-header\">
                                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                                        <h4 class=\"modal-title\">Order Meals</h4>
                                                    </div>
                                                    <div class=\"modal-body\">
                                                        <ul class=\"list-group\">
                                                            {% if driver_orders_data.meal_of_orders is defined and driver_orders_data.meal_of_orders is not empty %}
                                                                {% for meals in driver_orders_data.meal_of_orders %} 
                                                                    <li class=\"list-group-item\">{{ meals.product_name }} <label class=\"label label-primary\">{{meals.requested_datetime | date('d-m-Y') }}</label></br> {{meals.raw_eggs}} Raw Eggs,{{meals.white_eggs}} White Eggs,{{meals.carbs_amount}} Carbs,{{meals.proteins_amount}} Protiens <span class=\"badge\">{{ meals.count_in | capitalize }}</span></li>
                                                                    {% endfor %}
                                                                {% endif %}    
                                                        </ul>
                                                    </div>
                                                    <div class=\"modal-footer\">
                                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                                    </div>
                                                </div>

                                            </div>  
                                        </div>
                                    </tr>
                                {%endfor%}
                            {%endif%}
                            </tbody>              #}
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>

<div id=\"myModal\" class=\"modal fade\" role=\"dialog\">
    <div class=\"modal-dialog\">
        <!-- Modal content-->
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                <h4 class=\"modal-title\">Order Meals</h4>
            </div>
            <div class=\"modal-body\">
                <ul class=\"list-group\">
                    
                </ul>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
            </div>
        </div>

    </div>  
</div>

{% endblock %}

{% block js %}
    <script>
        \$('.list-group').html('');
        function getmealdata(order_id, date_given){
            var url = \"{{ path('admin_driverorders_getordermealdata') }}/\" + order_id + \"/\" + date_given;
            \$.ajax({
                url: url,
                success: function(response){
                    \$('.list-group').html(response);
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

        \$(document).ready(function () {

            /* ,
            exportOptions: {
                format: {
                    body: function (data, row, column, node) {
                        if(column = 7){
                            data = data.replace(/<br\\s*\\/?>/ig, \"\\n\");
                            data = data.replace(/<\\/?[^>]+(>|\$)/g, \"\");
                            return data;
                        }

                        return data;
                    }
                }
            } */

            function newexportaction(e, dt, button, config) {
                var self = this;
                var oldStart = dt.settings()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, settings) {
                        // Call the original action function
                        if (button[0].className.indexOf('buttons-copy') >= 0) {
                            \$.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                            \$.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                                \$.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                                \$.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                            \$.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                                \$.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                                \$.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                            \$.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                                \$.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                                \$.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-print') >= 0) {
                            \$.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                        }
                        dt.one('preXhr', function (e, s, data) {
                            // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                            // Set the property to what it was before exporting.
                            settings._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export settings
                dt.ajax.reload();
            };
\t\t\t{#
            var url = \"{{ path('admin_driverorders_getdriverorders') }}/{{ driver_id }}\";
            {% if date_given is defined and date_given is not empty %}
                url += \"/{{ date_given }}\";
            {% endif %}
            {% if driver_id is defined and driver_id != 0 %}
                url += \"?driver_given={{ driver_id }}\";
            {% endif %}
            {% if time_id_given is defined and time_id_given != 0 %}
                url += \"?time_id_given={{ time_id_given }}\";
            {% endif %}
            {% if area_id_given is defined and area_id_given != 0 %}
                url += \"?area_id_given={{ area_id_given }}\";
            {% endif %}
\t\t\t#}
\t\t\t var url = \"{{ path('admin_driverorders_getdriverorders') }}/{{ driver_id }}\";
\t\t\t{% if date_given is defined and date_given is not empty %}
                url += \"/{{ date_given }}\";
            {% endif %}
           {#  {% if driver_id is defined  %}
                 url += \"/{{ driver_id }}\";
             {% endif %} #} 
            {% if time_id_given is defined  %}
                url += \"/{{ time_id_given }}\";
            {% endif %}
\t\t\t{%set area_id = area_id_given %} 
            {% if area_id is defined  %}
                url += \"/{{ area_id }}\";
           {% endif %}
\t\t  

            \$('#list').DataTable({
                processing: true,
\t\t\t\tserverSide: true,
\t\t\t\tajax: url,
                dom: 'Bfrtip',
                columnDefs: [
                    { orderable: false, targets: -1 },
                    { orderable: false, targets: -3 }
                ],
                buttons: [
                    {
                        extend : 'copy',
                        pageSize : 'LEGAL',
                        title : function() {
                            return 'Driver Orders';
                        },
                    },
                    {
                        extend : 'excel',
                        pageSize : 'LEGAL',
                        title : function() {
                            return 'Driver Orders Excel';
                        },
                        action : newexportaction
                    },
                    {
\t\t\t\t\textend : 'csv',
                        pageSize : 'LEGAL',
                        title : function() {
                            return 'Driver Orders CSV';
                        },
                        action : newexportaction
                    },
                    {
                        extend : 'pdfHtml5',
                        pageSize : 'LEGAL',
                        title : function() {
                            return 'Driver Orders PDF';
                        },
                    }
                ],
            });

            \$('.datepicker').datepicker({
                format: 'dd-mm-yyyy'
            });


            \$(\"#print_delivery_sticker\").click(function (e) {

                if (\$('#date_given').val() == '') {
                    e.preventDefault();
                    alert(\"Please Select the Date\");
                }
            });

            \$(\"#print_driver_sticker\").click(function (e) {

                if (\$('#date_given').val() == '') {
                    e.preventDefault();
                    alert(\"Please Select the Date\");
                }
                if (\$('#driver_given').val() == '') {
                    e.preventDefault();
                    alert(\"Please Select Driver\");
                }
            });

            \$('#printMealSticker').click(function () {
                \$('.mealCategory').toggleClass('hide');
            });


            \$('#makePrintBtn').click(function () {

        {% if date_given is defined and date_given is not empty %}
                            let link_href = \"{{path('admin_driverorders_printmealsticker',{'order_id':'0','driver_id' : driver_id,'date_given' : date_given | date('U') ,'time_id_given' : time_id_given,'area_id_given' : area_id_given})}}\";
            {% else %} \t 
                            let link_href = \"{{path('admin_driverorders_printmealsticker',{'order_id':'0','driver_id' : driver_id,'date_given' : 0 ,'time_id_given' : time_id_given,'area_id_given' : area_id_given})}}\";
        {% endif %} \t 
                            let include_string = [];

                            \$(\"input[name=productCategory]\").each(function () {
                                if (\$(this).is(\":checked\")) {
                                    makeSingleObject = {
                                        productCategory: \$(this).val()
                                    };
                                    include_string.push(makeSingleObject);
                                }
                            });

                            if (include_string.length > 0) {

                                include_string = JSON.stringify(include_string);
                                link_href += \"?include_string=\" + include_string;
                                console.log({include_string, link_href});

                                window.location.href = link_href;
                            } else {
                                alert(\"Please Select Any One Category\");
                            }
                        });

                    });
    </script>
{% endblock %}
", "AdminBundle:DriverOrders:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/DriverOrders/index.html.twig");
    }
}
