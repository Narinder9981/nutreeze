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

/* AdminBundle:Uservideo:tutorialvideolist.html.twig */
class __TwigTemplate_d6416c33108ac263b68e8eee3158770075bba50281105461dea6a3f9053c7fd3 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Uservideo:tutorialvideolist.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Uservideo:tutorialvideolist.html.twig", 1);
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
    <!-------- PAGE TITLE --------------->
        <h1>
         Tutorial Video Listing
        </h1>
    <!------- BREADCUMB --------------------->
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
                <h3 class=\"box-title\">User Video</h3>

                ";
        // line 33
        if (((isset($context["user_id"]) || array_key_exists("user_id", $context)) && (($context["user_id"] ?? $this->getContext($context, "user_id")) != 0))) {
            // line 34
            echo "                    ";
            $context["action_link"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_addtutorialvideo", ["video_id" => 0, "user_id" => ($context["user_id"] ?? $this->getContext($context, "user_id"))]);
            // line 35
            echo "                ";
        } else {
            // line 36
            echo "                    ";
            $context["action_link"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_addtutorialvideo");
            // line 37
            echo "                ";
        }
        // line 38
        echo "                <a href=\"";
        echo twig_escape_filter($this->env, ($context["action_link"] ?? $this->getContext($context, "action_link")), "html", null, true);
        echo "\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Tutorial Video </b></a>
            </div>
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
                <th>Title</th>
                <th>Video Id</th>
                <th>Video Link</th>
                <th>Operation</th>
              </thead>
              <tbody>
                ";
        // line 50
        if (((isset($context["videoList"]) || array_key_exists("videoList", $context)) &&  !twig_test_empty(($context["videoList"] ?? $this->getContext($context, "videoList"))))) {
            // line 51
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["videoList"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["videoList"]) {
                // line 52
                echo "                        <tr>
                            <td>";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                             <td>";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute($context["videoList"], "video_title", []), "html", null, true);
                echo "</td>
                            <td>";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($context["videoList"], "video_id", []), "html", null, true);
                echo "</td>
                           <td>
                                <a data-fancybox='gallery' href=\"";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($context["videoList"], "video_link", []), "html", null, true);
                echo "\">                                    
                                     Video Link<video width=\"50px\" height=\"50px\">
                                      <source src=\"";
                // line 59
                echo twig_escape_filter($this->env, $this->getAttribute($context["videoList"], "video_link", []), "html", null, true);
                echo "\" type=\"video/mp4\">
                                     
                                    Your browser does not support the video tag.
                                    </video>
                                </a>    
                                
                                                     
                            <td>
                                <a href=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_addtutorialvideo", ["video_id" => $this->getAttribute($context["videoList"], "video_tutorial_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
                                <a href=\"";
                // line 68
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_deletetutorialvideo", ["video_id" => $this->getAttribute($context["videoList"], "video_tutorial_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ? ')\"><i class=\"fa fa-trash\"></i></a>                               
                            </td>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['videoList'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "                ";
        }
        // line 73
        echo "              </tbody>
              <tfoot>
                <th>No</th>
                <th>Title</th>
                <th>Video Id</th>
                <th>Video Link</th>
                <th>Operation</th>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
    
<div id=\"myModal\" class=\"modal fade\" role=\"dialog\">
  <div class=\"modal-dialog\">

    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title\">Specify Video Title For User</h4>
      </div>
      <div class=\"modal-body\">
        <input type=\"text\" class=\"form-control\" id=\"video_day\"/>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" id=\"btn_day\" class=\"btn btn-default\">Add</button>
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
    
    var user_id_global = 0;
    var video_id_global = 0;
    var btn_element_global ;
    function assign_video(user_id,video_id,btn_element,e){
        e.preventDefault();
        user_id_global = user_id;
        video_id_global = video_id;
        btn_element_global = btn_element;
        
        if(btn_element_global.hasClass('btn-danger')){
        
            \$('#video_day').val('');
            \$('#myModal').modal('show');        
        
        }else{
        
            if(confirm('Are you sure want to remove video from user List ?')){
            
                //call ajax not assigned
                
                change_assign(user_id_global,video_id_global,\$('#video_day').val(),'remove');               
            
            }
            
            
        }
    }
    
    \$('#btn_day').click(function(){
        if(\$('#video_day').val() != 0){
            if(btn_element_global.hasClass('btn-danger')){
            
                //call ajaxx for assign
                change_assign(user_id_global,video_id_global,\$('#video_day').val(),'assign');
                
                \$('#myModal').modal('hide');
            }
            
        }else{
            alert(\"Please mention Day\");
        }
    });
    
    function change_assign(user_id,video_id,day = 0,operation='assign'){
        \$.ajax({
            url : \"";
        // line 160
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideo_assignvideo");
        echo "\",
            method : \"POST\",
            data : {'user_id':user_id,'video_id':video_id,'day':day,'operation':operation},
            success : function(data){
                if(operation == 'assign'){
                    btn_element_global.removeClass('btn-danger').addClass('btn-success');
                    btn_element_global.text('Assigned');
                    \$('#day_label_'+video_id).show();
                    \$('#day_label_'+video_id).text('Title : '+day);
                }
                if(operation == 'remove'){
                
                    btn_element_global.removeClass('btn-success').addClass('btn-danger');
                    btn_element_global.text('Not Assigned');
                    \$('#day_label_'+video_id).hide();   
                }
                
                user_id_global = 0;
                video_id_global = 0;                                        
                \$('#video_day').val(0);
            },
            error : function (){
                alert('Something went wrong');
                return false;
            }
        });
    }
    
    \$(document).ready(function() {
      \$('#list').DataTable();
    });
    
    \$(document).ready(function(){

        \$('[data-fancybox=\"gallery\"]').fancybox({
            // Options will go here
        });
    
    }); 
    
  </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Uservideo:tutorialvideolist.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  318 => 160,  269 => 113,  263 => 112,  219 => 73,  216 => 72,  198 => 68,  194 => 67,  183 => 59,  178 => 57,  173 => 55,  169 => 54,  165 => 53,  162 => 52,  144 => 51,  142 => 50,  126 => 38,  123 => 37,  120 => 36,  117 => 35,  114 => 34,  112 => 33,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
    <!-------- PAGE TITLE --------------->
        <h1>
         Tutorial Video Listing
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
            <div class=\"box-header with-border\">
                <h3 class=\"box-title\">User Video</h3>

                {% if user_id is defined and user_id != 0 %}
                    {% set action_link = path('admin_uservideo_addtutorialvideo',{'video_id':0,'user_id':user_id}) %}
                {% else %}
                    {% set action_link = path('admin_uservideo_addtutorialvideo') %}
                {% endif %}
                <a href=\"{{ action_link }}\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Tutorial Video </b></a>
            </div>
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
                <th>Title</th>
                <th>Video Id</th>
                <th>Video Link</th>
                <th>Operation</th>
              </thead>
              <tbody>
                {%if videoList is defined and videoList is not empty%}
                    {%for videoList in videoList%}
                        <tr>
                            <td>{{loop.index}}</td>
                             <td>{{videoList.video_title}}</td>
                            <td>{{videoList.video_id}}</td>
                           <td>
                                <a data-fancybox='gallery' href=\"{{videoList.video_link}}\">                                    
                                     Video Link<video width=\"50px\" height=\"50px\">
                                      <source src=\"{{videoList.video_link}}\" type=\"video/mp4\">
                                     
                                    Your browser does not support the video tag.
                                    </video>
                                </a>    
                                
                                                     
                            <td>
                                <a href=\"{{path('admin_uservideo_addtutorialvideo',{'video_id':videoList.video_tutorial_id})}}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
                                <a href=\"{{path('admin_uservideo_deletetutorialvideo',{'video_id':videoList.video_tutorial_id})}}\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ? ')\"><i class=\"fa fa-trash\"></i></a>                               
                            </td>
                        </tr>
                    {%endfor%}
                {%endif%}
              </tbody>
              <tfoot>
                <th>No</th>
                <th>Title</th>
                <th>Video Id</th>
                <th>Video Link</th>
                <th>Operation</th>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
    
<div id=\"myModal\" class=\"modal fade\" role=\"dialog\">
  <div class=\"modal-dialog\">

    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title\">Specify Video Title For User</h4>
      </div>
      <div class=\"modal-body\">
        <input type=\"text\" class=\"form-control\" id=\"video_day\"/>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" id=\"btn_day\" class=\"btn btn-default\">Add</button>
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
    
    var user_id_global = 0;
    var video_id_global = 0;
    var btn_element_global ;
    function assign_video(user_id,video_id,btn_element,e){
        e.preventDefault();
        user_id_global = user_id;
        video_id_global = video_id;
        btn_element_global = btn_element;
        
        if(btn_element_global.hasClass('btn-danger')){
        
            \$('#video_day').val('');
            \$('#myModal').modal('show');        
        
        }else{
        
            if(confirm('Are you sure want to remove video from user List ?')){
            
                //call ajax not assigned
                
                change_assign(user_id_global,video_id_global,\$('#video_day').val(),'remove');               
            
            }
            
            
        }
    }
    
    \$('#btn_day').click(function(){
        if(\$('#video_day').val() != 0){
            if(btn_element_global.hasClass('btn-danger')){
            
                //call ajaxx for assign
                change_assign(user_id_global,video_id_global,\$('#video_day').val(),'assign');
                
                \$('#myModal').modal('hide');
            }
            
        }else{
            alert(\"Please mention Day\");
        }
    });
    
    function change_assign(user_id,video_id,day = 0,operation='assign'){
        \$.ajax({
            url : \"{{path('admin_uservideo_assignvideo')}}\",
            method : \"POST\",
            data : {'user_id':user_id,'video_id':video_id,'day':day,'operation':operation},
            success : function(data){
                if(operation == 'assign'){
                    btn_element_global.removeClass('btn-danger').addClass('btn-success');
                    btn_element_global.text('Assigned');
                    \$('#day_label_'+video_id).show();
                    \$('#day_label_'+video_id).text('Title : '+day);
                }
                if(operation == 'remove'){
                
                    btn_element_global.removeClass('btn-success').addClass('btn-danger');
                    btn_element_global.text('Not Assigned');
                    \$('#day_label_'+video_id).hide();   
                }
                
                user_id_global = 0;
                video_id_global = 0;                                        
                \$('#video_day').val(0);
            },
            error : function (){
                alert('Something went wrong');
                return false;
            }
        });
    }
    
    \$(document).ready(function() {
      \$('#list').DataTable();
    });
    
    \$(document).ready(function(){

        \$('[data-fancybox=\"gallery\"]').fancybox({
            // Options will go here
        });
    
    }); 
    
  </script>
{% endblock %}
", "AdminBundle:Uservideo:tutorialvideolist.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Uservideo/tutorialvideolist.html.twig");
    }
}
