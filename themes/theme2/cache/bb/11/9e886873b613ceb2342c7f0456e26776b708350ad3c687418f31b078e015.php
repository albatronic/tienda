<?php

/* Producto/index.html.twig */
class __TwigTemplate_bb119e886873b613ceb2342c7f0456e26776b708350ad3c687418f31b078e015 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((isset($context["layout"]) ? $context["layout"] : null));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <section class=\"central\">
        <h1 class=\"tituloProducto\">";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "producto"), "Descripcion"), "html", null, true);
        echo "</h1>   
        ";
        // line 6
        $template = $this->env->resolveTemplate(($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "controller") . "/productoInfo.html.twig"));
        $template->display($context);
        echo "   
    </section>

    <section>
        ";
        // line 11
        echo "        ";
        // line 12
        echo "    </section>

";
    }

    public function getTemplateName()
    {
        return "Producto/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 12,  44 => 11,  36 => 6,  32 => 5,  29 => 4,  26 => 3,);
    }
}
