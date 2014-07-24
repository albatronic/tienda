<?php

/* ZonaPrivada/index.js.twig */
class __TwigTemplate_67664079bcb849299f5e40c8947012c674fb9debe3d4e50d260e9f6993b9bcb7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery-1.8.2.min.js\"></script> ";
        // line 2
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/modernizr.custom.12319.js\"></script> ";
        // line 3
        echo "<!-- JQUERY UI -->
<script src=\"http://code.jquery.com/ui/1.10.3/jquery-ui.js\"></script> <!-- jQuery UI -->  
<script>
 \$(function() {
      
    \$( \".accordion\" ).accordion({
        event: \"click hoverintent\",
        heightStyle: 'content'      
    });
    
  });
 
  /*
   * hoverIntent | Copyright 2011 Brian Cherne
   * http://cherne.net/brian/resources/jquery.hoverIntent.html
   * modified by the jQuery UI team
   */
  \$.event.special.hoverintent = {
    setup: function() {
      \$( this ).bind( \"mouseover\", jQuery.event.special.hoverintent.handler );
    },
    teardown: function() {
      \$( this ).unbind( \"mouseover\", jQuery.event.special.hoverintent.handler );
    },
    handler: function( event ) {
      var currentX, currentY, timeout,
        args = arguments,
        target = \$( event.target ),
        previousX = event.pageX,
        previousY = event.pageY;
 
      function track( event ) {
        currentX = event.pageX;
        currentY = event.pageY;
      };
 
      function clear() {
        target
          .unbind( \"mousemove\", track )
          .unbind( \"mouseout\", clear );
        clearTimeout( timeout );
      }
 
      function handler() {
        var prop,
          orig = event;
 
        if ( ( Math.abs( previousX - currentX ) +
            Math.abs( previousY - currentY ) ) < 7 ) {
          clear();
 
          event = \$.Event( \"hoverintent\" );
          for ( prop in orig ) {
            if ( !( prop in event ) ) {
              event[ prop ] = orig[ prop ];
            }
          }
          // Prevent accessing the original event since the new event
          // is fired asynchronously and the old event is no longer
          // usable (#6028)
          delete event.originalEvent;
 
          target.trigger( event );
        } else {
          previousX = currentX;
          previousY = currentY;
          timeout = setTimeout( handler, 100 );
        }
      }
 
      timeout = setTimeout( handler, 100 );
      target.bind({
        mousemove: track,
        mouseout: clear
      });
    }
  };
  </script>

<!-- ------------------------------ -->


<script src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/albatronic.js\"></script>
<script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/pirobox_extended.js\"></script>
<script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/pirobox_function.js\"></script> ";
        // line 88
        echo "
<!-- SLIDER HOME -->
<script src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/bjqs-1.3.min.js\"></script>
<script src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/bjqs-function.js\"></script>

<script src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jcarousellite.js\" type=\"text/javascript\"></script>


<script type=\"text/javascript\" src=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
        echo "/js/jquery-uniform-formulario.js\"></script>
    <script type=\"text/javascript\">
      \$(function(){
        \$(\":checkbox\").uniform();
    });
</script>  ";
        // line 102
        echo "
<script type=\"text/javascript\">
  jQuery(document).ready(function(\$){
  
  \$(\"a[rel='pop-up']\").click(function () {
  var caracteristicas = \"height=\"+(screen.availHeight - 40)+\",width=\"+(screen.availWidth - 13)+\",screenX=0,screenY=0,left=0,top=0,status=no,menubar=yes,scrollbars=yes,resizable=yes,toolbar=yes,location=yes\";
  nueva=window.open(this.href, 'Popup', caracteristicas);
  return false;
  });
});
</script> ";
        // line 113
        echo "
<script src=\"//use.edgefonts.net/open-sans.js\"></script>
<script type=\"text/javascript\">
jQuery(document).ready(function() {
        // testimonial-shortcode init
        jQuery(\"#testimonial-widget-1\").jCarouselLite({
                btnNext:\"#testimonial-cycle-widget .next\",
                btnPrev:\"#testimonial-cycle-widget .prev\",
                auto:true,
                speed:6000,
                visible:1   
        });\t\t
});

\$('#login_Email').focus();
</script>";
    }

    public function getTemplateName()
    {
        return "ZonaPrivada/index.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 113,  167 => 102,  157 => 96,  149 => 93,  142 => 91,  136 => 90,  132 => 88,  127 => 87,  121 => 86,  115 => 85,  31 => 3,  25 => 2,  19 => 1,  105 => 44,  101 => 43,  91 => 38,  85 => 37,  74 => 33,  70 => 32,  57 => 28,  53 => 27,  46 => 23,  37 => 17,  33 => 16,  29 => 14,  26 => 13,);
    }
}
