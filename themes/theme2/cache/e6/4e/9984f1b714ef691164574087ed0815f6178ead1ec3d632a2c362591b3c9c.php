<?php

/* _global/listadoArticulosPaginados.html.twig */
class __TwigTemplate_e64e9984f1b714ef691164574087ed0815f6178ead1ec3d632a2c362591b3c9c extends Twig_Template
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
        // line 2
        echo "
";
        // line 3
        $this->env->loadTemplate("_global/paginacion.html.twig")->display(array_merge($context, array("paginacion" => (isset($context["paginacion"]) ? $context["paginacion"] : null), "linkBy" => (isset($context["linkBy"]) ? $context["linkBy"] : null))));
        // line 4
        echo "
";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["articulos"]) ? $context["articulos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["articulo"]) {
            // line 6
            echo "<article>
    ";
            // line 7
            if ($this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "PathNameImagenN")) {
                // line 8
                echo "    <figure>
        <a href=\"";
                // line 9
                echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "UrlFriendly"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Descripcion"), "html", null, true);
                echo "\">
            <img src=\"";
                // line 10
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, (isset($context["theme"]) ? $context["theme"] : null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "PathNameImagenN", array(0 => 1), "method"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Descripcion"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Descripcion"), "html", null, true);
                echo "\" />
        </a>
    </figure>
    ";
            }
            // line 14
            echo "    <div class=\"info\">
        <h3><a href=\"";
            // line 15
            echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "UrlFriendly"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Descripcion"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Descripcion"), "html", null, true);
            echo "</a></h3>
        ";
            // line 16
            if (($this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Resumen") != $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Descripcion"))) {
                // line 17
                echo "            <div class=\"resumen\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "Resumen"), "html", null, true);
                echo "</div>
        ";
            }
            // line 19
            echo "        ";
            $context["precioActual"] = $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "PrecioWeb");
            // line 20
            echo "        ";
            if ((($this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "PvpAnterior") > 0) && ($this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "PrecioAnterior") != (isset($context["precioActual"]) ? $context["precioActual"] : null)))) {
                // line 21
                echo "            <div class=\"precios precioAnterior\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "moneda", array(0 => $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "PvpAnterior")), "method"), "html", null, true);
                echo "</div>                
        ";
            }
            // line 23
            echo "        <div class=\"precioActual\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "moneda", array(0 => (isset($context["precioActual"]) ? $context["precioActual"] : null)), "method"), "html", null, true);
            echo "</div>
        <article class=\"botonera\">
            <a href=\"";
            // line 25
            echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : null), "UrlFriendly"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "masInfo"), "method"), "html", null, true);
            echo "\" class=\"saberMas\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["macro"]) ? $context["macro"] : null), "idioma", array(0 => "saberMas"), "method"), "html", null, true);
            echo "
                <span class=\"sprite\"></span>
            </a>
        </article>
    </div>
</article>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "
";
        // line 33
        $this->env->loadTemplate("_global/paginacion.html.twig")->display(array_merge($context, array("paginacion" => (isset($context["paginacion"]) ? $context["paginacion"] : null), "linkBy" => (isset($context["linkBy"]) ? $context["linkBy"] : null))));
    }

    public function getTemplateName()
    {
        return "_global/listadoArticulosPaginados.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 33,  117 => 32,  99 => 25,  93 => 23,  87 => 21,  81 => 19,  73 => 16,  64 => 15,  61 => 14,  46 => 10,  39 => 9,  34 => 7,  31 => 6,  27 => 5,  24 => 4,  22 => 3,  19 => 2,  84 => 20,  82 => 33,  75 => 17,  71 => 27,  69 => 26,  65 => 24,  51 => 22,  49 => 21,  36 => 8,  33 => 16,  30 => 15,  25 => 13,  23 => 12,);
    }
}
