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

/* AdminBundle:Users:viewDriverRoute.html.twig */
class __TwigTemplate_b05cfc8c0462f0d3f28acd3884ed9802d73b392ce3f02aff1ee46769c8027275 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Users:viewDriverRoute.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Users:viewDriverRoute.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 4
        echo "<!-- Driver Route Map Start-->
<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.6.0/dist/leaflet.css\"
\tintegrity=\"sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==\"
\tcrossorigin=\"\" />

<script src=\"https://unpkg.com/leaflet@1.6.0/dist/leaflet.js\"
\tintegrity=\"sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==\"
\tcrossorigin=\"\"></script>
<!-- Driver Route Map End-->

<style>
\t#map {
\t\theight: 480px;
\t}

\t.info.legend.leaflet-control {
\t\theight: 120px;
\t\tbackground: #e6e6e6e0;
\t\tpadding: 5px;
\t\tborder-radius: 15px;
\t}

\t.legend-img {
\t\tmargin-bottom: 2px;
\t}
</style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 31
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 32
        echo "<section class=\"content-header\">
\t<!-------- PAGE TITLE --------------->
\t<h1>
\t\tDriver Route Details of ";
        // line 35
        echo twig_escape_filter($this->env, ($context["date"] ?? $this->getContext($context, "date")), "html", null, true);
        echo "
\t</h1>
\t<!------- BREADCUMB --------------------->
\t<ol class=\"breadcrumb\">
\t\t<li>
\t\t\t<a href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\">
\t\t\t\t<i class=\"fa fa-dashboard\"></i>
\t\t\t\tDashboard</a>
\t\t</li>
\t</ol>
</section>
<section class=\"content\">
\t";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 48
            echo "\t<div class=\"alert alert-success alert-dismissable\">
\t\t<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
\t\t<h4>
\t\t\t<i class=\"icon fa fa-check\"></i>
\t\t\tAlert!</h4>
\t\t";
            // line 53
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
\t</div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 57
            echo "\t<div class=\"alert alert-danger alert-dismissable\">
\t\t<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
\t\t<h4>
\t\t\t<i class=\"icon fa fa-check\"></i>
\t\t\tAlert!</h4>
\t\t";
            // line 62
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
\t</div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "
\t";
        // line 66
        $context["status_name"] = [0 => "pending", 1 => "accept", 2 => "reject", 3 => "cancel", 4 => "success", 5 => "ongoing"];
        // line 67
        echo "
\t";
        // line 68
        if (((isset($context["users"]) || array_key_exists("users", $context)) &&  !twig_test_empty(($context["users"] ?? $this->getContext($context, "users"))))) {
            // line 69
            echo "\t<section class=\"invoice\" id=\"invoice\">
\t\t<!-- title row -->
\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-xs-12\">
\t\t\t\t<h2 class=\"page-header\">
\t\t\t\t\t<i class=\"fa fa-user\"></i>
\t\t\t\t\t";
            // line 76
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_firstname", []) . " ") . $this->getAttribute(($context["users"] ?? $this->getContext($context, "users")), "user_lastname", [])), "html", null, true);
            echo "
\t\t\t\t\t<a href=\"";
            // line 77
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users_index", ["user_role_id" => ($context["user_role_id"] ?? $this->getContext($context, "user_role_id"))]), "html", null, true);
            echo "\"
\t\t\t\t\t\tclass=\"btn btn-sm btn-primary pull-right\">Back</a>
\t\t\t\t</h2>
\t\t\t</div>
\t\t\t<!-- /.col -->
\t\t</div>

\t</section>
\t<section class=\"invoice\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div id=\"map\"></div>
\t\t\t</div>
\t\t</div>
\t</section>

\t";
        }
        // line 94
        echo "</section>
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 100
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 101
        echo "<script>
\t// leaflet map Script

\tvar map = L.map('map', { drawControl: true }).setView([51.505, -0.09], 18);
\tL.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href=\"http://osm.org/copyright\">OpenStreetMap</a> contributors' }).addTo(map);

\tvar latlngs = ";
        // line 107
        echo ($context["lat_lng"] ?? $this->getContext($context, "lat_lng"));
        echo ";
\tvar latlngsOrder = ";
        // line 108
        echo ($context["lat_lng_order"] ?? $this->getContext($context, "lat_lng_order"));
        echo ";

\t// custom icon declaration start
\tvar startIcon = L.icon({
\t\ticonUrl: `";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/images/map_images/location_map_pin_dark_green5.png"), "html", null, true);
        echo "`,
\t\tshadowUrl: '',

\t\ticonSize: [33, 48], // size of the icon
\t\tshadowSize: [50, 64], // size of the shadow
\t\ticonAnchor: [14.25, 48], // point of the icon which will correspond to marker's location
\t\tshadowAnchor: [4, 62], // the same for the shadow
\t\tpopupAnchor: [0, -40] // point from which the popup should open relative to the iconAnchor
\t});
\tvar endIcon = L.icon({
\t\ticonUrl: `";
        // line 122
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/images/map_images/imagefiles_location_map_pin_purple5.png"), "html", null, true);
        echo "`,
\t\tshadowUrl: '',

\t\ticonSize: [33, 48], // size of the icon
\t\tshadowSize: [50, 64], // size of the shadow
\t\ticonAnchor: [14.25, 48], // point of the icon which will correspond to marker's location
\t\tshadowAnchor: [4, 62], // the same for the shadow
\t\tpopupAnchor: [0, -40] // point from which the popup should open relative to the iconAnchor
\t});
\tvar normalIcon = L.icon({
\t\ticonUrl: `";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/images/map_images/imagefiles_location_map_pin_blue5.png"), "html", null, true);
        echo "`,
\t\tshadowUrl: '',

\t\ticonSize: [33, 48], // size of the icon
\t\tshadowSize: [50, 64], // size of the shadow
\t\ticonAnchor: [14.25, 48], // point of the icon which will correspond to marker's location
\t\tshadowAnchor: [4, 62], // the same for the shadow
\t\tpopupAnchor: [0, -40] // point from which the popup should open relative to the iconAnchor
\t});
\t// custom icon declaration end

\tfor (var i = 0; i < latlngs.length; i++) {
\t\tvar icon_to_display = \"\"
\t\tif (i === 0) {
\t\t\tvar icon_to_display = startIcon
\t\t} else if (i === latlngs.length - 1) {
\t\t\tvar icon_to_display = endIcon
\t\t} else {
\t\t\tvar icon_to_display = normalIcon
\t\t}
\t\tvar marker = L.marker(latlngs[i], { icon: icon_to_display }).addTo(map); // marker on the specific latlng 
\t\tpopupHtml = \"<b>Order No : </b>\" + latlngsOrder[i]['order_no'] + \" Status updated at \" + latlngsOrder[i]['date_time'];
\t\tmarker.bindPopup(popupHtml); // popup on the specific marker click
\t}

\t// legends for the info window which displays icon usage start
\tvar legend = L.control({ position: 'bottomright' });

\tlegend.onAdd = function (map) {

\t\tvar div = L.DomUtil.create('div', 'info legend'),
\t\t\tgrades = [\"Start Position\", \"In Between Position\", \"End Position\"],
\t\t\tlabels = [`";
        // line 164
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/images/map_images/location_map_pin_dark_green5.png"), "html", null, true);
        echo "`, `";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/images/map_images/imagefiles_location_map_pin_blue5.png"), "html", null, true);
        echo "`, `";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/images/map_images/imagefiles_location_map_pin_purple5.png"), "html", null, true);
        echo "`];

\t\t// loop through our density intervals and generate a label with a colored square for each interval
\t\tfor (var i = 0; i < grades.length; i++) {
\t\t\tdiv.innerHTML +=
\t\t\t\t(\" <img src=\" + labels[i] + \" height='35' width='23' class='legend-img'>  \") + grades[i] + '<br>';
\t\t}

\t\treturn div;
\t};

\tlegend.addTo(map);
\t// legends for the info window which displays icon usage end

\t// polyline for the route line start
\tvar polyline = L.polyline(latlngs, { color: '#b030ff' }).addTo(map);
\t// zoom the map to the polyline
\tmap.fitBounds(polyline.getBounds());

\t// polyline for the route line end

</script>
<script>


\tfunction change_status(order_master_id, element) {
\t\tvar status = element.val();
\t\t\$.ajax({
\t\t\turl: \"\",
\t\t\tmethod: \"POST\",
\t\t\tdata: {
\t\t\t\t'order_master_id': order_master_id,
\t\t\t\t'status': status
\t\t\t},
\t\t\tsuccess: function (data) {
\t\t\t\tif (\$.trim(data) == 'done') {
\t\t\t\t\talert('Status updated successfully');
\t\t\t\t} else {
\t\t\t\t\talert('Somehing went wrong');
\t\t\t\t}
\t\t\t},
\t\t\terror: function () {
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}

\t\$(document).ready(function () {
\t\t\$('#datatable').DataTable();

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({ // Options will go here
\t\t});
\t});

\tfunction printDivInvoice() {

\t\tvar divToPrint = document.getElementById('invoice');

\t\tvar newWin = window.open('', 'Print-Window');

\t\tnewWin.document.open();

\t\tnewWin.document.write(\"<html><body onload='window.print()'>\" + divToPrint.innerHTML);

\t\tnewWin.document.close();

\t\tsetTimeout(function () {
\t\t\tnewWin.close();
\t\t}, 10);

\t}
</script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Users:viewDriverRoute.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  296 => 164,  261 => 132,  248 => 122,  235 => 112,  228 => 108,  224 => 107,  216 => 101,  210 => 100,  199 => 94,  179 => 77,  175 => 76,  166 => 69,  164 => 68,  161 => 67,  159 => 66,  156 => 65,  147 => 62,  140 => 57,  135 => 56,  126 => 53,  119 => 48,  115 => 47,  105 => 40,  97 => 35,  92 => 32,  86 => 31,  53 => 4,  47 => 3,  31 => 1,);
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
<!-- Driver Route Map Start-->
<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.6.0/dist/leaflet.css\"
\tintegrity=\"sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==\"
\tcrossorigin=\"\" />

<script src=\"https://unpkg.com/leaflet@1.6.0/dist/leaflet.js\"
\tintegrity=\"sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==\"
\tcrossorigin=\"\"></script>
<!-- Driver Route Map End-->

<style>
\t#map {
\t\theight: 480px;
\t}

\t.info.legend.leaflet-control {
\t\theight: 120px;
\t\tbackground: #e6e6e6e0;
\t\tpadding: 5px;
\t\tborder-radius: 15px;
\t}

\t.legend-img {
\t\tmargin-bottom: 2px;
\t}
</style>
{%endblock%}
{% block content %}
<section class=\"content-header\">
\t<!-------- PAGE TITLE --------------->
\t<h1>
\t\tDriver Route Details of {{date}}
\t</h1>
\t<!------- BREADCUMB --------------------->
\t<ol class=\"breadcrumb\">
\t\t<li>
\t\t\t<a href=\"{{path('admin_dashboard_index',{'domain':app.session.get('domain')})}}\">
\t\t\t\t<i class=\"fa fa-dashboard\"></i>
\t\t\t\tDashboard</a>
\t\t</li>
\t</ol>
</section>
<section class=\"content\">
\t{% for flashMessage in app.session.flashbag.get('success_msg') %}
\t<div class=\"alert alert-success alert-dismissable\">
\t\t<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
\t\t<h4>
\t\t\t<i class=\"icon fa fa-check\"></i>
\t\t\tAlert!</h4>
\t\t{{ flashMessage }}
\t</div>
\t{% endfor %}
\t{% for flashMessage in app.session.flashbag.get('error_msg') %}
\t<div class=\"alert alert-danger alert-dismissable\">
\t\t<button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
\t\t<h4>
\t\t\t<i class=\"icon fa fa-check\"></i>
\t\t\tAlert!</h4>
\t\t{{ flashMessage }}
\t</div>
\t{% endfor %}

\t{%set status_name = ['pending','accept','reject','cancel','success','ongoing'] %}

\t{%if users is defined and users is not empty%}
\t<section class=\"invoice\" id=\"invoice\">
\t\t<!-- title row -->
\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-xs-12\">
\t\t\t\t<h2 class=\"page-header\">
\t\t\t\t\t<i class=\"fa fa-user\"></i>
\t\t\t\t\t{{users.user_firstname ~' '~ users.user_lastname}}
\t\t\t\t\t<a href=\"{{path('admin_users_index',{'user_role_id':user_role_id})}}\"
\t\t\t\t\t\tclass=\"btn btn-sm btn-primary pull-right\">Back</a>
\t\t\t\t</h2>
\t\t\t</div>
\t\t\t<!-- /.col -->
\t\t</div>

\t</section>
\t<section class=\"invoice\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div id=\"map\"></div>
\t\t\t</div>
\t\t</div>
\t</section>

\t{%endif%}
</section>
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->

{% endblock %}

{% block js %}
<script>
\t// leaflet map Script

\tvar map = L.map('map', { drawControl: true }).setView([51.505, -0.09], 18);
\tL.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href=\"http://osm.org/copyright\">OpenStreetMap</a> contributors' }).addTo(map);

\tvar latlngs = {{ lat_lng| raw}};
\tvar latlngsOrder = {{lat_lng_order |raw}};

\t// custom icon declaration start
\tvar startIcon = L.icon({
\t\ticonUrl: `{{ asset('bundles/design/images/map_images/location_map_pin_dark_green5.png') }}`,
\t\tshadowUrl: '',

\t\ticonSize: [33, 48], // size of the icon
\t\tshadowSize: [50, 64], // size of the shadow
\t\ticonAnchor: [14.25, 48], // point of the icon which will correspond to marker's location
\t\tshadowAnchor: [4, 62], // the same for the shadow
\t\tpopupAnchor: [0, -40] // point from which the popup should open relative to the iconAnchor
\t});
\tvar endIcon = L.icon({
\t\ticonUrl: `{{ asset('bundles/design/images/map_images/imagefiles_location_map_pin_purple5.png') }}`,
\t\tshadowUrl: '',

\t\ticonSize: [33, 48], // size of the icon
\t\tshadowSize: [50, 64], // size of the shadow
\t\ticonAnchor: [14.25, 48], // point of the icon which will correspond to marker's location
\t\tshadowAnchor: [4, 62], // the same for the shadow
\t\tpopupAnchor: [0, -40] // point from which the popup should open relative to the iconAnchor
\t});
\tvar normalIcon = L.icon({
\t\ticonUrl: `{{ asset('bundles/design/images/map_images/imagefiles_location_map_pin_blue5.png') }}`,
\t\tshadowUrl: '',

\t\ticonSize: [33, 48], // size of the icon
\t\tshadowSize: [50, 64], // size of the shadow
\t\ticonAnchor: [14.25, 48], // point of the icon which will correspond to marker's location
\t\tshadowAnchor: [4, 62], // the same for the shadow
\t\tpopupAnchor: [0, -40] // point from which the popup should open relative to the iconAnchor
\t});
\t// custom icon declaration end

\tfor (var i = 0; i < latlngs.length; i++) {
\t\tvar icon_to_display = \"\"
\t\tif (i === 0) {
\t\t\tvar icon_to_display = startIcon
\t\t} else if (i === latlngs.length - 1) {
\t\t\tvar icon_to_display = endIcon
\t\t} else {
\t\t\tvar icon_to_display = normalIcon
\t\t}
\t\tvar marker = L.marker(latlngs[i], { icon: icon_to_display }).addTo(map); // marker on the specific latlng 
\t\tpopupHtml = \"<b>Order No : </b>\" + latlngsOrder[i]['order_no'] + \" Status updated at \" + latlngsOrder[i]['date_time'];
\t\tmarker.bindPopup(popupHtml); // popup on the specific marker click
\t}

\t// legends for the info window which displays icon usage start
\tvar legend = L.control({ position: 'bottomright' });

\tlegend.onAdd = function (map) {

\t\tvar div = L.DomUtil.create('div', 'info legend'),
\t\t\tgrades = [\"Start Position\", \"In Between Position\", \"End Position\"],
\t\t\tlabels = [`{{ asset('bundles/design/images/map_images/location_map_pin_dark_green5.png') }}`, `{{ asset('bundles/design/images/map_images/imagefiles_location_map_pin_blue5.png') }}`, `{{ asset('bundles/design/images/map_images/imagefiles_location_map_pin_purple5.png') }}`];

\t\t// loop through our density intervals and generate a label with a colored square for each interval
\t\tfor (var i = 0; i < grades.length; i++) {
\t\t\tdiv.innerHTML +=
\t\t\t\t(\" <img src=\" + labels[i] + \" height='35' width='23' class='legend-img'>  \") + grades[i] + '<br>';
\t\t}

\t\treturn div;
\t};

\tlegend.addTo(map);
\t// legends for the info window which displays icon usage end

\t// polyline for the route line start
\tvar polyline = L.polyline(latlngs, { color: '#b030ff' }).addTo(map);
\t// zoom the map to the polyline
\tmap.fitBounds(polyline.getBounds());

\t// polyline for the route line end

</script>
<script>


\tfunction change_status(order_master_id, element) {
\t\tvar status = element.val();
\t\t\$.ajax({
\t\t\turl: \"\",
\t\t\tmethod: \"POST\",
\t\t\tdata: {
\t\t\t\t'order_master_id': order_master_id,
\t\t\t\t'status': status
\t\t\t},
\t\t\tsuccess: function (data) {
\t\t\t\tif (\$.trim(data) == 'done') {
\t\t\t\t\talert('Status updated successfully');
\t\t\t\t} else {
\t\t\t\t\talert('Somehing went wrong');
\t\t\t\t}
\t\t\t},
\t\t\terror: function () {
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}

\t\$(document).ready(function () {
\t\t\$('#datatable').DataTable();

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({ // Options will go here
\t\t});
\t});

\tfunction printDivInvoice() {

\t\tvar divToPrint = document.getElementById('invoice');

\t\tvar newWin = window.open('', 'Print-Window');

\t\tnewWin.document.open();

\t\tnewWin.document.write(\"<html><body onload='window.print()'>\" + divToPrint.innerHTML);

\t\tnewWin.document.close();

\t\tsetTimeout(function () {
\t\t\tnewWin.close();
\t\t}, 10);

\t}
</script>
{% endblock %}", "AdminBundle:Users:viewDriverRoute.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Users/viewDriverRoute.html.twig");
    }
}
