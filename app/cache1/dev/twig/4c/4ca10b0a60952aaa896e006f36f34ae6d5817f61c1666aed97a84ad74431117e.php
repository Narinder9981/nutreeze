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

/* AdminBundle:Orders:index.html.twig */
class __TwigTemplate_f0bcd347f96adfc2c66b70e315e2ef3445773ae95995043dceb7a757ea29158e extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Orders:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Orders:index.html.twig", 1);
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
            Orders Listing
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
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Orders</h3>

                        <div class=\"panel panel-default hide\">
                            <div class=\"panel-body\">
                                <form method=\"post\" action=\"\" id=\"fiter_form\">
                                    <div class=\"row \">
                                        <div class=\"col-md-12 form-group\">
                                            <div class=\"col-md-6\">
                                                <div class=\"col-md-2\"><b>Status:</b></div>
                                                <select id=\"package\" name=\"status\" class=\"col-md-5\">
                                                    <option value=\"0\" ";
        // line 41
        if ((($context["status"] ?? $this->getContext($context, "status")) == 0)) {
            echo "selected";
        }
        echo ">Select Status</option>
                                                    <option value=\"Active\" ";
        // line 42
        if ((($context["status"] ?? $this->getContext($context, "status")) == "Active")) {
            echo "selected";
        }
        echo ">Active</option>
                                                    <option value=\"Expired\" ";
        // line 43
        if ((($context["status"] ?? $this->getContext($context, "status")) == "Expired")) {
            echo "selected";
        }
        echo ">Expired</option>
                                                </select>
                                            </div>
                                            <div class=\"col-md-6\">
                                                <a href=\"";
        // line 47
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_getmealsdatewisefilter");
        echo "\" class=\"btn btn-info pull-right\">Date Wise Meal Order</a>
                                            </div>

                                        </div>
                                    </div>

                                    <div class=\"row\">
                                        <div class=\"col-md-12\">
                                            <div class=\"col-md-4\"></div>
                                            <div class=\"col-md-4 text-center\">
                                                <input type=\"submit\" name=\"filter\" id=\"filter\" value=\"Search\" class=\"btn btn-success\">
                                                <a class=\"btn btn-default cancel-btn\" href=\"";
        // line 58
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_index");
        echo "\" >Clear</a>
                                            </div>
                                            <div class=\"col-md-4\"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class=\"box-body table-responsive\">
                        <input type=\"hidden\" name=\"status\" value=";
        // line 68
        echo twig_escape_filter($this->env, ($context["status"] ?? $this->getContext($context, "status")), "html", null, true);
        echo " />
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>Sr.</th>
                            <th>Order U.No</th>
                            <th>Cutomer Name</th>
                            <th>Package Name</th>
                            <th>Sub Package</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                           <!--  <th title=\"Remaining Days\">Rem. Day</th> -->
                            <th>Transaction Id</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Operation</th>
                            </thead>
                            
                            <tfoot>
                            <th>Sr.</th>
                            <th>Order U.No</th>
                            <th>Cutomer Name</th>
                            <th>Package Name</th>
                            <th>Sub Package</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <!--  <th title=\"Remaining Days\">Rem. Day</th> -->
                            <th>Transaction Id</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Operation</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 112
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 113
        echo "  <script>


   \$(document).ready(function() {
        
        //var url = \"";
        // line 118
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_ajaxlist");
        echo "\";
  var oldExportAction = function (self, e, dt, button, config) {
    if (button[0].className.indexOf('buttons-excel') >= 0) {
        if (\$.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
            \$.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
        }
        else {
            \$.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
        }
    } else if (button[0].className.indexOf('buttons-print') >= 0) {
        \$.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
    }
};

var newExportAction = function (e, dt, button, config) {
    var self = this;
    var oldStart = dt.settings()[0]._iDisplayStart;

    dt.one('preXhr', function (e, s, data) {
        // Just this once, load all data from the server...
        data.start = 0;
        data.length = 2147483647;

        dt.one('preDraw', function (e, settings) {
            // Call the original action function 
            oldExportAction(self, e, dt, button, config);

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
        
            var url = \"";
        // line 164
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_ajaxlist");
        echo "/\" + \"";
        echo twig_escape_filter($this->env, ($context["status"] ?? $this->getContext($context, "status")), "html", null, true);
        echo "\" ;
            \$('#list').DataTable({
                processing: true,
                serverSide: true,
                ajax: url,  
                 dom: 'Bfrtip',              
                columnDefs: [
                    { orderable: false, targets: -1 },
                    { orderable: false, targets: -3 }
                ],
                  buttons: [
                        {
                            extend: 'csv',
                            pageSize: 'LEGAL',
                            title: function () {
                                return 'Order  CSV';
                            },
                        },
                        { extend: 'excel',
                           
                            exportOptions: {
                                modifier: {
                                    search: 'applied',
                                    order: 'applied'
                                }
                            },
                        },
                        { extend: 'excel',
                             text: '<span class=\"fa fa-file-excel-o\"></span> Excel Export All Records',
                          action: newExportAction
                        }
                      
                    ],
               
            });
        
    });
\t
\t\$(document).ready(function(){

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t
\t});\t
\t
        function resetmealtype(ele,order_id){         
            \$('#'+ele).parent().next().find('select').val('');  
            // get package Gram Value
            var selected_date = \$('#'+ele).val();
            \$.ajax({
                url : \"";
        // line 215
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_getupgradegramvaluebydate");
        echo "\",
                method : \"POST\",
                data : {'order_id':order_id , 'selected_date' : selected_date },
                success : function(data){
                   // console.log(data);                    
                    \$(\"#prot_\"+order_id).html(data);
                    \$(\"#carb_\"+order_id).html(data);
                }
            });
\t\t\t
        }

        function getMeals(elem,dateval,order_id,main_sub_package_id){
            meal_type_id = elem.val();

            if(meal_type_id != 0){
                    \$.ajax({
                            url : \"";
        // line 232
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_getmealsbytype");
        echo "\",
                            method : \"POST\",
                            data : {'meal_type_id':meal_type_id , 'main_sub_package_id' : main_sub_package_id ,'req_date' : dateval},
                            success : function(data){
                                    console.log(data);
                                    \$(\"#meal_select_\"+order_id).html(data);
                            },
                            error : function(){
                                    alert('Something went Wrong.')
                            }
                    });
            }

            if(meal_type_id == 1 || true ){ 
                    //snakes
                    \$('.breakfast').show();
            }else{
                    \$('.breakfast').hide();
            }
\t}

function getMealEggs(elem,order_id,main_sub_package_id){
\t\tproduct_id = elem.val();

\t\tif(meal_type_id != 0){
\t\t\t\$.ajax({
\t\t\t\turl : \"";
        // line 258
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_getmealsegssbyproduct");
        echo "\",
\t\t\t\tmethod : \"POST\",
\t\t\t\tdata : {'main_product_id':product_id , 'main_sub_package_id' : main_sub_package_id },
\t\t\t\tsuccess : function(data){
\t\t\t\t\tconsole.log(data);
\t\t\t\t\tdata = JSON.parse(data);
\t\t\t\t\tif(data.white_eggs_html != ''){
\t\t\t\t\t\t\$(\"#white_eggs_\"+order_id).html(data.white_eggs_html);
\t\t\t\t\t}
\t\t\t\t\tif(data.raw_eggs_html != ''){
                                            \$(\"#raw_eggs_\"+order_id).html(data.raw_eggs_html);
\t\t\t\t\t}
\t\t\t\t\tif(data.product_max_value_html != ''){
                                            \$(\"#meal_qty_\"+order_id).html(data.product_max_value_html);
\t\t\t\t\t}
                                        if(data.pro_carb_flag == 'false'){
                                            \$(\"#prot_\"+order_id).addClass('hide').removeClass('show');
                                            \$(\"#carb_\"+order_id).addClass('hide').removeClass('show')
                                        }
                                        if(data.pro_carb_flag == 'true'){
                                            \$(\"#prot_\"+order_id).addClass('show').removeClass('hide');
                                            \$(\"#carb_\"+order_id).addClass('show').removeClass('hide')
                                        }
\t\t\t\t\t
\t\t\t\t},
\t\t\t\terror : function(){
\t\t\t\t\talert('Something went Wrong.')
\t\t\t\t}
\t\t\t});
\t\t}
\t}

  </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Orders:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  385 => 258,  356 => 232,  336 => 215,  280 => 164,  231 => 118,  224 => 113,  218 => 112,  168 => 68,  155 => 58,  141 => 47,  132 => 43,  126 => 42,  120 => 41,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
            Orders Listing
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
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Orders</h3>

                        <div class=\"panel panel-default hide\">
                            <div class=\"panel-body\">
                                <form method=\"post\" action=\"\" id=\"fiter_form\">
                                    <div class=\"row \">
                                        <div class=\"col-md-12 form-group\">
                                            <div class=\"col-md-6\">
                                                <div class=\"col-md-2\"><b>Status:</b></div>
                                                <select id=\"package\" name=\"status\" class=\"col-md-5\">
                                                    <option value=\"0\" {% if status == 0 %}selected{% endif %}>Select Status</option>
                                                    <option value=\"Active\" {% if status == 'Active' %}selected{% endif %}>Active</option>
                                                    <option value=\"Expired\" {% if status == 'Expired' %}selected{% endif %}>Expired</option>
                                                </select>
                                            </div>
                                            <div class=\"col-md-6\">
                                                <a href=\"{{path('admin_orders_getmealsdatewisefilter')}}\" class=\"btn btn-info pull-right\">Date Wise Meal Order</a>
                                            </div>

                                        </div>
                                    </div>

                                    <div class=\"row\">
                                        <div class=\"col-md-12\">
                                            <div class=\"col-md-4\"></div>
                                            <div class=\"col-md-4 text-center\">
                                                <input type=\"submit\" name=\"filter\" id=\"filter\" value=\"Search\" class=\"btn btn-success\">
                                                <a class=\"btn btn-default cancel-btn\" href=\"{{path('admin_product_index')}}\" >Clear</a>
                                            </div>
                                            <div class=\"col-md-4\"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class=\"box-body table-responsive\">
                        <input type=\"hidden\" name=\"status\" value={{status}} />
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>Sr.</th>
                            <th>Order U.No</th>
                            <th>Cutomer Name</th>
                            <th>Package Name</th>
                            <th>Sub Package</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                           <!--  <th title=\"Remaining Days\">Rem. Day</th> -->
                            <th>Transaction Id</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Operation</th>
                            </thead>
                            
                            <tfoot>
                            <th>Sr.</th>
                            <th>Order U.No</th>
                            <th>Cutomer Name</th>
                            <th>Package Name</th>
                            <th>Sub Package</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <!--  <th title=\"Remaining Days\">Rem. Day</th> -->
                            <th>Transaction Id</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Operation</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

{% endblock %}

{% block js %}
  <script>


   \$(document).ready(function() {
        
        //var url = \"{{ path('admin_orders_ajaxlist') }}\";
  var oldExportAction = function (self, e, dt, button, config) {
    if (button[0].className.indexOf('buttons-excel') >= 0) {
        if (\$.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
            \$.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
        }
        else {
            \$.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
        }
    } else if (button[0].className.indexOf('buttons-print') >= 0) {
        \$.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
    }
};

var newExportAction = function (e, dt, button, config) {
    var self = this;
    var oldStart = dt.settings()[0]._iDisplayStart;

    dt.one('preXhr', function (e, s, data) {
        // Just this once, load all data from the server...
        data.start = 0;
        data.length = 2147483647;

        dt.one('preDraw', function (e, settings) {
            // Call the original action function 
            oldExportAction(self, e, dt, button, config);

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
        
            var url = \"{{ path('admin_orders_ajaxlist') }}/\" + \"{{status}}\" ;
            \$('#list').DataTable({
                processing: true,
                serverSide: true,
                ajax: url,  
                 dom: 'Bfrtip',              
                columnDefs: [
                    { orderable: false, targets: -1 },
                    { orderable: false, targets: -3 }
                ],
                  buttons: [
                        {
                            extend: 'csv',
                            pageSize: 'LEGAL',
                            title: function () {
                                return 'Order  CSV';
                            },
                        },
                        { extend: 'excel',
                           
                            exportOptions: {
                                modifier: {
                                    search: 'applied',
                                    order: 'applied'
                                }
                            },
                        },
                        { extend: 'excel',
                             text: '<span class=\"fa fa-file-excel-o\"></span> Excel Export All Records',
                          action: newExportAction
                        }
                      
                    ],
               
            });
        
    });
\t
\t\$(document).ready(function(){

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t
\t});\t
\t
        function resetmealtype(ele,order_id){         
            \$('#'+ele).parent().next().find('select').val('');  
            // get package Gram Value
            var selected_date = \$('#'+ele).val();
            \$.ajax({
                url : \"{{path('admin_orders_getupgradegramvaluebydate')}}\",
                method : \"POST\",
                data : {'order_id':order_id , 'selected_date' : selected_date },
                success : function(data){
                   // console.log(data);                    
                    \$(\"#prot_\"+order_id).html(data);
                    \$(\"#carb_\"+order_id).html(data);
                }
            });
\t\t\t
        }

        function getMeals(elem,dateval,order_id,main_sub_package_id){
            meal_type_id = elem.val();

            if(meal_type_id != 0){
                    \$.ajax({
                            url : \"{{path('admin_orders_getmealsbytype')}}\",
                            method : \"POST\",
                            data : {'meal_type_id':meal_type_id , 'main_sub_package_id' : main_sub_package_id ,'req_date' : dateval},
                            success : function(data){
                                    console.log(data);
                                    \$(\"#meal_select_\"+order_id).html(data);
                            },
                            error : function(){
                                    alert('Something went Wrong.')
                            }
                    });
            }

            if(meal_type_id == 1 || true ){ 
                    //snakes
                    \$('.breakfast').show();
            }else{
                    \$('.breakfast').hide();
            }
\t}

function getMealEggs(elem,order_id,main_sub_package_id){
\t\tproduct_id = elem.val();

\t\tif(meal_type_id != 0){
\t\t\t\$.ajax({
\t\t\t\turl : \"{{path('admin_orders_getmealsegssbyproduct')}}\",
\t\t\t\tmethod : \"POST\",
\t\t\t\tdata : {'main_product_id':product_id , 'main_sub_package_id' : main_sub_package_id },
\t\t\t\tsuccess : function(data){
\t\t\t\t\tconsole.log(data);
\t\t\t\t\tdata = JSON.parse(data);
\t\t\t\t\tif(data.white_eggs_html != ''){
\t\t\t\t\t\t\$(\"#white_eggs_\"+order_id).html(data.white_eggs_html);
\t\t\t\t\t}
\t\t\t\t\tif(data.raw_eggs_html != ''){
                                            \$(\"#raw_eggs_\"+order_id).html(data.raw_eggs_html);
\t\t\t\t\t}
\t\t\t\t\tif(data.product_max_value_html != ''){
                                            \$(\"#meal_qty_\"+order_id).html(data.product_max_value_html);
\t\t\t\t\t}
                                        if(data.pro_carb_flag == 'false'){
                                            \$(\"#prot_\"+order_id).addClass('hide').removeClass('show');
                                            \$(\"#carb_\"+order_id).addClass('hide').removeClass('show')
                                        }
                                        if(data.pro_carb_flag == 'true'){
                                            \$(\"#prot_\"+order_id).addClass('show').removeClass('hide');
                                            \$(\"#carb_\"+order_id).addClass('show').removeClass('hide')
                                        }
\t\t\t\t\t
\t\t\t\t},
\t\t\t\terror : function(){
\t\t\t\t\talert('Something went Wrong.')
\t\t\t\t}
\t\t\t});
\t\t}
\t}

  </script>
{% endblock %}
", "AdminBundle:Orders:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Orders/index.html.twig");
    }
}
