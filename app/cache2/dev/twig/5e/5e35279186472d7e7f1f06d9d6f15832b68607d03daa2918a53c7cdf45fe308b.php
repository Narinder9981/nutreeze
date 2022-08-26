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

/* AdminBundle:Uservideo:index.html.twig */
class __TwigTemplate_822e0fc31b1e2ca33d604e72624ff2e01294c18fd95132e62740acbd91275d4a extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Uservideo:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Uservideo:index.html.twig", 1);
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
\t\t  User Video Listing
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
    <div class=\"row\">
      <div class=\"col-md-12\">
        <div class=\"box box-primary\">
\t\t\t<div class=\"box-header with-border\">
\t\t\t\t<h3 class=\"box-title\">User Video</h3>

\t\t\t\t";
        // line 33
        if (((isset($context["user_id"]) || array_key_exists("user_id", $context)) && (($context["user_id"] ?? $this->getContext($context, "user_id")) != 0))) {
            // line 34
            echo "\t\t\t\t\t";
            $context["action_link"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_adduservideo", ["video_id" => 0, "user_id" => ($context["user_id"] ?? $this->getContext($context, "user_id"))]);
            // line 35
            echo "\t\t\t\t";
        } else {
            // line 36
            echo "\t\t\t\t\t";
            $context["action_link"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_adduservideo");
            // line 37
            echo "\t\t\t\t";
        }
        // line 38
        echo "\t\t\t\t<a href=\"";
        echo twig_escape_filter($this->env, ($context["action_link"] ?? $this->getContext($context, "action_link")), "html", null, true);
        echo "\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Video ";
        if (((isset($context["user_id"]) || array_key_exists("user_id", $context)) && (($context["user_id"] ?? $this->getContext($context, "user_id")) != 0))) {
            echo " For ";
            echo twig_escape_filter($this->env, ($context["user_name"] ?? $this->getContext($context, "user_name")), "html", null, true);
            echo " ";
        }
        echo "</b></a>
\t\t\t</div>
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
                <th>Title</th>
\t\t\t\t<th>Media</th>
\t\t\t\t";
        // line 46
        if (((isset($context["user_id"]) || array_key_exists("user_id", $context)) && (($context["user_id"] ?? $this->getContext($context, "user_id")) != 0))) {
            // line 47
            echo "\t\t\t\t<th>Assigned</th>\t
\t\t\t\t";
        }
        // line 49
        echo "\t\t\t\t<th>Catgory</th>
\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
                ";
        // line 53
        if (((isset($context["gallery"]) || array_key_exists("gallery", $context)) &&  !twig_test_empty(($context["gallery"] ?? $this->getContext($context, "gallery"))))) {
            // line 54
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["gallery"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["gallery"]) {
                // line 55
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "title", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"";
                // line 59
                echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "media_url", []), "html", null, true);
                echo "\">\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<video width=\"50px\" height=\"50px\">
\t\t\t\t\t\t\t\t\t  <source src=\"";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "media_url", []), "html", null, true);
                echo "\" type=\"video/mp4\">
\t\t\t\t\t\t\t\t\t  <source src=\"";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "media_url", []), "html", null, true);
                echo "\" type=\"video/ogg\">
\t\t\t\t\t\t\t\t\tYour browser does not support the video tag.
\t\t\t\t\t\t\t\t\t</video>
\t\t\t\t\t\t\t\t</a>\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t";
                // line 68
                if (((isset($context["user_id"]) || array_key_exists("user_id", $context)) && (($context["user_id"] ?? $this->getContext($context, "user_id")) != 0))) {
                    // line 69
                    echo "\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t";
                    // line 70
                    $context["btn_class"] = "btn-danger";
                    // line 71
                    echo "\t\t\t\t\t\t\t\t";
                    $context["btn_text"] = "Not Assigned";
                    // line 72
                    echo "\t\t\t\t\t\t\t\t";
                    $context["day"] = 0;
                    // line 73
                    echo "\t\t\t\t\t\t\t\t";
                    if ((((isset($context["gallery"]) || array_key_exists("gallery", $context)) && $this->getAttribute($context["gallery"], "user_video_relation_id", [], "any", true, true)) && ($this->getAttribute($context["gallery"], "user_video_relation_id", []) != null))) {
                        // line 74
                        echo "\t\t\t\t\t\t\t\t\t";
                        $context["btn_class"] = "btn-success";
                        // line 75
                        echo "\t\t\t\t\t\t\t\t\t";
                        $context["btn_text"] = "Assigned";
                        // line 76
                        echo "\t\t\t\t\t\t\t\t\t";
                        $context["day"] = $this->getAttribute($context["gallery"], "day", []);
                        // line 77
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 78
                    echo "\t\t\t\t\t\t\t\t<button class=\"btn btn-sm ";
                    echo twig_escape_filter($this->env, ($context["btn_class"] ?? $this->getContext($context, "btn_class")), "html", null, true);
                    echo "\" onclick=\"assign_video('";
                    echo twig_escape_filter($this->env, ($context["user_id"] ?? $this->getContext($context, "user_id")), "html", null, true);
                    echo "','";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "main_video_master_id", []), "html", null, true);
                    echo "',\$(this),event)\">";
                    echo twig_escape_filter($this->env, ($context["btn_text"] ?? $this->getContext($context, "btn_text")), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</button>&nbsp;&nbsp;
\t\t\t\t\t\t\t\t";
                    // line 80
                    $context["style_lable"] = "";
                    // line 81
                    echo "\t\t\t\t\t\t\t\t";
                    if ((((isset($context["gallery"]) || array_key_exists("gallery", $context)) && $this->getAttribute($context["gallery"], "user_video_relation_id", [], "any", true, true)) && ($this->getAttribute($context["gallery"], "user_video_relation_id", []) == null))) {
                        // line 82
                        echo "\t\t\t\t\t\t\t\t\t";
                        $context["style_lable"] = "display:none";
                        // line 83
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    echo "\t
\t\t\t\t\t\t\t\t\t<label id=\"day_label_";
                    // line 84
                    echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "main_video_master_id", []), "html", null, true);
                    echo "\" style=\"";
                    echo twig_escape_filter($this->env, ($context["style_lable"] ?? $this->getContext($context, "style_lable")), "html", null, true);
                    echo "\" class=\"lable label-info\">Title : ";
                    echo twig_escape_filter($this->env, ($context["day"] ?? $this->getContext($context, "day")), "html", null, true);
                    echo "</label>\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t";
                }
                // line 87
                echo "\t\t\t\t\t\t\t<td>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "video_category", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 89
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_adduservideo", ["video_id" => $this->getAttribute($context["gallery"], "main_video_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 90
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_deleteuservideo", ["video_id" => $this->getAttribute($context["gallery"], "main_video_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure wwant to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gallery'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 94
            echo "\t\t\t\t";
        }
        // line 95
        echo "              </tbody>
              <tfoot>
                 <th>No</th>
\t\t\t\t\t\t\t\t <th>Title</th>
\t\t\t\t<th>Media</th>
\t\t\t\t";
        // line 100
        if (((isset($context["user_id"]) || array_key_exists("user_id", $context)) && (($context["user_id"] ?? $this->getContext($context, "user_id")) != 0))) {
            // line 101
            echo "\t\t\t\t<th>Assigned</th>\t
\t\t\t\t";
        }
        // line 102
        echo "\t\t\t\t
\t\t\t\t<th>Category</th>
\t\t\t\t<th>Operation</th>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
\t
<div id=\"myModal\" class=\"modal fade\" role=\"dialog\">
  <div class=\"modal-dialog\">

    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title\">Specify Video Title For User</h4>
      </div>
      <div class=\"modal-body\">
\t\t<input type=\"text\" class=\"form-control\" id=\"video_day\"/>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" id=\"btn_day\" class=\"btn btn-default\">Add</button>
      </div>
    </div>

  </div>
</div>\t\t
\t</section>
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 137
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 138
        echo "  <script>
\t
\tvar user_id_global = 0;
\tvar video_id_global = 0;
\tvar btn_element_global ;
\tfunction assign_video(user_id,video_id,btn_element,e){
\t\te.preventDefault();
\t\tuser_id_global = user_id;
\t\tvideo_id_global = video_id;
\t\tbtn_element_global = btn_element;
\t\t
\t\tif(btn_element_global.hasClass('btn-danger')){
\t\t
\t\t\t\$('#video_day').val('');
\t\t\t\$('#myModal').modal('show');\t\t
\t\t
\t\t}else{
\t\t
\t\t\tif(confirm('Are you sure want to remove video from user List ?')){
\t\t\t
\t\t\t\t//call ajax not assigned
\t\t\t\t
\t\t\t\tchange_assign(user_id_global,video_id_global,\$('#video_day').val(),'remove');\t\t\t\t
\t\t\t
\t\t\t}
\t\t\t
\t\t\t
\t\t}
\t}
\t
\t\$('#btn_day').click(function(){
\t\tif(\$('#video_day').val() != 0){
\t\t\tif(btn_element_global.hasClass('btn-danger')){
\t\t\t
\t\t\t\t//call ajaxx for assign
\t\t\t\tchange_assign(user_id_global,video_id_global,\$('#video_day').val(),'assign');
\t\t\t\t
\t\t\t\t\$('#myModal').modal('hide');
\t\t\t}
\t\t\t
\t\t}else{
\t\t\talert(\"Please mention Day\");
\t\t}
\t});
\t
\tfunction change_assign(user_id,video_id,day = 0,operation='assign'){
\t\t\$.ajax({
\t\t\turl : \"";
        // line 185
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_assignvideo");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'user_id':user_id,'video_id':video_id,'day':day,'operation':operation},
\t\t\tsuccess : function(data){
\t\t\t\tif(operation == 'assign'){
\t\t\t\t\tbtn_element_global.removeClass('btn-danger').addClass('btn-success');
\t\t\t\t\tbtn_element_global.text('Assigned');
\t\t\t\t\t\$('#day_label_'+video_id).show();
\t\t\t\t\t\$('#day_label_'+video_id).text('Title : '+day);
\t\t\t\t}
\t\t\t\tif(operation == 'remove'){
\t\t\t\t
\t\t\t\t\tbtn_element_global.removeClass('btn-success').addClass('btn-danger');
\t\t\t\t\tbtn_element_global.text('Not Assigned');
\t\t\t\t\t\$('#day_label_'+video_id).hide();\t
\t\t\t\t}
\t\t\t\t
\t\t\t\tuser_id_global = 0;
\t\t\t\tvideo_id_global = 0;\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\$('#video_day').val(0);
\t\t\t},
\t\t\terror : function (){
\t\t\t\talert('Something went wrong');
\t\t\t\treturn false;
\t\t\t}
\t\t});
\t}
\t
    \$(document).ready(function() {
      \$('#list').DataTable();
    });
\t
\t\$(document).ready(function(){

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t
\t});\t
\t
  </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Uservideo:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  408 => 185,  359 => 138,  353 => 137,  313 => 102,  309 => 101,  307 => 100,  300 => 95,  297 => 94,  279 => 90,  275 => 89,  269 => 87,  259 => 84,  254 => 83,  251 => 82,  248 => 81,  246 => 80,  234 => 78,  231 => 77,  228 => 76,  225 => 75,  222 => 74,  219 => 73,  216 => 72,  213 => 71,  211 => 70,  208 => 69,  206 => 68,  197 => 62,  193 => 61,  188 => 59,  183 => 57,  179 => 56,  176 => 55,  158 => 54,  156 => 53,  150 => 49,  146 => 47,  144 => 46,  126 => 38,  123 => 37,  120 => 36,  117 => 35,  114 => 34,  112 => 33,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  User Video Listing
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
    <div class=\"row\">
      <div class=\"col-md-12\">
        <div class=\"box box-primary\">
\t\t\t<div class=\"box-header with-border\">
\t\t\t\t<h3 class=\"box-title\">User Video</h3>

\t\t\t\t{% if user_id is defined and user_id != 0 %}
\t\t\t\t\t{% set action_link = path('admin_uservideo_adduservideo',{'video_id':0,'user_id':user_id}) %}
\t\t\t\t{% else %}
\t\t\t\t\t{% set action_link = path('admin_uservideo_adduservideo') %}
\t\t\t\t{% endif %}
\t\t\t\t<a href=\"{{ action_link }}\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Video {% if user_id is defined and user_id != 0 %} For {{user_name}} {% endif %}</b></a>
\t\t\t</div>
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
                <th>Title</th>
\t\t\t\t<th>Media</th>
\t\t\t\t{% if user_id is defined and user_id != 0%}
\t\t\t\t<th>Assigned</th>\t
\t\t\t\t{% endif%}
\t\t\t\t<th>Catgory</th>
\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
                {%if gallery is defined and gallery is not empty%}
\t\t\t\t\t{%for gallery in gallery%}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t\t\t<td>{{gallery.title}}</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"{{gallery.media_url}}\">\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<video width=\"50px\" height=\"50px\">
\t\t\t\t\t\t\t\t\t  <source src=\"{{gallery.media_url}}\" type=\"video/mp4\">
\t\t\t\t\t\t\t\t\t  <source src=\"{{gallery.media_url}}\" type=\"video/ogg\">
\t\t\t\t\t\t\t\t\tYour browser does not support the video tag.
\t\t\t\t\t\t\t\t\t</video>
\t\t\t\t\t\t\t\t</a>\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t{% if user_id is defined and user_id != 0%}
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t{% set btn_class = 'btn-danger'%}
\t\t\t\t\t\t\t\t{% set btn_text = 'Not Assigned'%}
\t\t\t\t\t\t\t\t{% set day = 0%}
\t\t\t\t\t\t\t\t{% if gallery is defined and gallery.user_video_relation_id is defined and gallery.user_video_relation_id != null%}
\t\t\t\t\t\t\t\t\t{% set btn_class = 'btn-success'%}
\t\t\t\t\t\t\t\t\t{% set btn_text = 'Assigned'%}
\t\t\t\t\t\t\t\t\t{% set day = gallery.day %}
\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t<button class=\"btn btn-sm {{btn_class}}\" onclick=\"assign_video('{{user_id}}','{{gallery.main_video_master_id}}',\$(this),event)\">{{btn_text}}
\t\t\t\t\t\t\t\t</button>&nbsp;&nbsp;
\t\t\t\t\t\t\t\t{% set style_lable = ''%}
\t\t\t\t\t\t\t\t{% if gallery is defined and gallery.user_video_relation_id is defined and gallery.user_video_relation_id == null%}
\t\t\t\t\t\t\t\t\t{% set style_lable = 'display:none'%}
\t\t\t\t\t\t\t\t{%endif%}\t
\t\t\t\t\t\t\t\t\t<label id=\"day_label_{{gallery.main_video_master_id}}\" style=\"{{style_lable}}\" class=\"lable label-info\">Title : {{day}}</label>\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t<td>{{gallery.video_category}}</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_uservideo_adduservideo',{'video_id':gallery.main_video_master_id})}}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_uservideo_deleteuservideo',{'video_id':gallery.main_video_master_id})}}\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure wwant to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{%endfor%}
\t\t\t\t{%endif%}
              </tbody>
              <tfoot>
                 <th>No</th>
\t\t\t\t\t\t\t\t <th>Title</th>
\t\t\t\t<th>Media</th>
\t\t\t\t{% if user_id is defined and user_id != 0%}
\t\t\t\t<th>Assigned</th>\t
\t\t\t\t{% endif%}\t\t\t\t
\t\t\t\t<th>Category</th>
\t\t\t\t<th>Operation</th>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
\t
<div id=\"myModal\" class=\"modal fade\" role=\"dialog\">
  <div class=\"modal-dialog\">

    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title\">Specify Video Title For User</h4>
      </div>
      <div class=\"modal-body\">
\t\t<input type=\"text\" class=\"form-control\" id=\"video_day\"/>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" id=\"btn_day\" class=\"btn btn-default\">Add</button>
      </div>
    </div>

  </div>
</div>\t\t
\t</section>
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
{% endblock %}

{% block js %}
  <script>
\t
\tvar user_id_global = 0;
\tvar video_id_global = 0;
\tvar btn_element_global ;
\tfunction assign_video(user_id,video_id,btn_element,e){
\t\te.preventDefault();
\t\tuser_id_global = user_id;
\t\tvideo_id_global = video_id;
\t\tbtn_element_global = btn_element;
\t\t
\t\tif(btn_element_global.hasClass('btn-danger')){
\t\t
\t\t\t\$('#video_day').val('');
\t\t\t\$('#myModal').modal('show');\t\t
\t\t
\t\t}else{
\t\t
\t\t\tif(confirm('Are you sure want to remove video from user List ?')){
\t\t\t
\t\t\t\t//call ajax not assigned
\t\t\t\t
\t\t\t\tchange_assign(user_id_global,video_id_global,\$('#video_day').val(),'remove');\t\t\t\t
\t\t\t
\t\t\t}
\t\t\t
\t\t\t
\t\t}
\t}
\t
\t\$('#btn_day').click(function(){
\t\tif(\$('#video_day').val() != 0){
\t\t\tif(btn_element_global.hasClass('btn-danger')){
\t\t\t
\t\t\t\t//call ajaxx for assign
\t\t\t\tchange_assign(user_id_global,video_id_global,\$('#video_day').val(),'assign');
\t\t\t\t
\t\t\t\t\$('#myModal').modal('hide');
\t\t\t}
\t\t\t
\t\t}else{
\t\t\talert(\"Please mention Day\");
\t\t}
\t});
\t
\tfunction change_assign(user_id,video_id,day = 0,operation='assign'){
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_uservideo_assignvideo')}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'user_id':user_id,'video_id':video_id,'day':day,'operation':operation},
\t\t\tsuccess : function(data){
\t\t\t\tif(operation == 'assign'){
\t\t\t\t\tbtn_element_global.removeClass('btn-danger').addClass('btn-success');
\t\t\t\t\tbtn_element_global.text('Assigned');
\t\t\t\t\t\$('#day_label_'+video_id).show();
\t\t\t\t\t\$('#day_label_'+video_id).text('Title : '+day);
\t\t\t\t}
\t\t\t\tif(operation == 'remove'){
\t\t\t\t
\t\t\t\t\tbtn_element_global.removeClass('btn-success').addClass('btn-danger');
\t\t\t\t\tbtn_element_global.text('Not Assigned');
\t\t\t\t\t\$('#day_label_'+video_id).hide();\t
\t\t\t\t}
\t\t\t\t
\t\t\t\tuser_id_global = 0;
\t\t\t\tvideo_id_global = 0;\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\$('#video_day').val(0);
\t\t\t},
\t\t\terror : function (){
\t\t\t\talert('Something went wrong');
\t\t\t\treturn false;
\t\t\t}
\t\t});
\t}
\t
    \$(document).ready(function() {
      \$('#list').DataTable();
    });
\t
\t\$(document).ready(function(){

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t
\t});\t
\t
  </script>
{% endblock %}
", "AdminBundle:Uservideo:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Uservideo/index.html.twig");
    }
}
