<?php

/* _global/macros.html.twig */
class __TwigTemplate_5d3d75bb4f817b2dc299552c4916154b9de7429bd62df0dc774479613efafeb2 extends Twig_Template
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
        // line 19
        echo "
";
        // line 46
        echo "
";
        // line 64
        echo "

";
        // line 84
        echo "
";
        // line 107
        echo "
";
        // line 129
        echo "
";
        // line 149
        echo "
";
        // line 153
        echo "
";
    }

    // line 6
    public function getnoticia($_noticia = null)
    {
        $context = $this->env->mergeGlobals(array(
            "noticia" => $_noticia,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 7
            echo "<div class=\"evento_indiv\">
    ";
            // line 8
            if ($this->getAttribute((isset($context["noticia"]) ? $context["noticia"] : null), "imagen")) {
                // line 9
                echo "    <div class=\"imagen_evento\">
        <img src=\"";
                // line 10
                echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["noticia"]) ? $context["noticia"] : null), "imagen"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["noticia"]) ? $context["noticia"] : null), "titulo"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["noticia"]) ? $context["noticia"] : null), "titulo"), "html", null, true);
                echo "\" />
        <a href=\"";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["noticia"]) ? $context["noticia"] : null), "url"), "url"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["noticia"]) ? $context["noticia"] : null), "url"), "url"), "html", null, true);
                echo "\"><span class=\"fecha_evento arriba\">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["noticia"]) ? $context["noticia"] : null), "fecha"), "d/m/Y"), "html", null, true);
                echo "</span></a>
    </div>
    ";
            }
            // line 14
            echo "    <h2>";
            echo $this->getAttribute($this, "link", array(0 => $this->getAttribute((isset($context["noticia"]) ? $context["noticia"] : null), "titulo"), 1 => null, 2 => $this->getAttribute($this->getAttribute((isset($context["noticia"]) ? $context["noticia"] : null), "url"), "url"), 3 => $this->getAttribute($this->getAttribute((isset($context["noticia"]) ? $context["noticia"] : null), "url"), "targetBlank")), "method");
            echo "</h2>
    <h3>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["noticia"]) ? $context["noticia"] : null), "subtitulo"), "html", null, true);
            echo "</h3>
    <p>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["noticia"]) ? $context["noticia"] : null), "resumen"), "html", null, true);
            echo "</p>
</div>    
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 23
    public function getevento($_evento = null)
    {
        $context = $this->env->mergeGlobals(array(
            "evento" => $_evento,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 24
            echo "<article class=\"evento_indiv ";
            if ((!$this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "imagen"))) {
                echo "sin_imagen";
            }
            echo "\">
    ";
            // line 25
            if ($this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "imagen")) {
                // line 26
                echo "    <div class=\"imagen_evento\">
        <a href=\"";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "url"), "url"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "url"), "url"), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "imagen"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "titulo"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "titulo"), "html", null, true);
                echo "\" /></a>
        <span class=\"fechaEvento arriba\">
           <span class=\"fechaLeft\"></span>
            <span class=\"fechaInter\">";
                // line 30
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "fecha"), "d/m/Y"), "html", null, true);
                echo "</span>  
           <span class=\"fechaRigth\"></span>         
        </span>
    </div>
    ";
            } else {
                // line 35
                echo "       <span class=\"fecha\">
           <span class=\"fechaLeft\"></span>
            <span class=\"fechaInter\">";
                // line 37
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "fecha"), "d/m/Y"), "html", null, true);
                echo "</span>  
           <span class=\"fechaRigth\"></span>           
       </span> 
    ";
            }
            // line 41
            echo "    <h2>";
            echo $this->getAttribute($this, "link", array(0 => $this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "titulo"), 1 => null, 2 => $this->getAttribute($this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "url"), "url"), 3 => $this->getAttribute($this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "url"), "targetBlank")), "method");
            echo "</h2>
    <h3>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "subtitulo"), "html", null, true);
            echo "</h3>
    <p>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["evento"]) ? $context["evento"] : null), "resumen"), "html", null, true);
            echo "</p>
</article>    
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 53
    public function getvideo($_video = null, $_key = null, $_nCaracteres = null, $_ultimoFila = null)
    {
        $context = $this->env->mergeGlobals(array(
            "video" => $_video,
            "key" => $_key,
            "nCaracteres" => $_nCaracteres,
            "ultimoFila" => $_ultimoFila,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 54
            $context["nCar"] = ((array_key_exists("nCaracteres", $context)) ? (_twig_default_filter((isset($context["nCaracteres"]) ? $context["nCaracteres"] : null), 100)) : (100));
            // line 55
            echo "<div class=\"mosaic-block bar proyecto";
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
            echo "\">
    <div class=\"mosaic-backdrop\" style=\"display: block;\"> 
        <img src=\"";
            // line 57
            echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : null), "imagen"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : null), "titulo"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : null), "titulo"), "html", null, true);
            echo "\" />
    </div>
    <a href=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "url"), "url"), "html", null, true);
            echo "\" class=\"mosaic-overlay\" style=\"";
            if ((isset($context["ultimoFila"]) ? $context["ultimoFila"] : null)) {
                echo "display: inline;";
            }
            echo " left: 0px; bottom: -146px;\">
        <span class=\"details\">";
            // line 60
            echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : null), "titulo"), 0, (isset($context["nCar"]) ? $context["nCar"] : null)), "html", null, true);
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : null), "titulo")) > (isset($context["nCar"]) ? $context["nCar"] : null))) {
                echo "...";
            }
            echo "</span>
    </a>
</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 72
    public function getgaleria($_galeria = null, $_key = null)
    {
        $context = $this->env->mergeGlobals(array(
            "galeria" => $_galeria,
            "key" => $_key,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 73
            echo "<div class=\"proyecto";
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
            echo "\">
    <a href=\"";
            // line 74
            echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : null), "imagen"), "html", null, true);
            echo "\" rel=\"gallery\" class=\"pirobox_gall";
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : null), "titulo"), "html", null, true);
            echo "\">
        <img src=\"";
            // line 75
            echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : null), "imagen"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : null), "titulo"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : null), "titulo"), "html", null, true);
            echo "\" />
    </a>
    <div class=\"textoAlbum\"><h4>";
            // line 77
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : null), "titulo"), "html", null, true);
            echo "</h4></div>

    ";
            // line 79
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : null), "bloqueThumbnail"));
            foreach ($context['_seq'] as $context["_key"] => $context["thumbnail"]) {
                // line 80
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : null), "PathName"), "html", null, true);
                echo "\" rel=\"gallery\" class=\"pirobox_gall";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : null), "Title"), "html", null, true);
                echo "\"></a>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['thumbnail'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 82
            echo "</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 95
    public function getlink($_titulo = null, $_title = null, $_url = null, $_esPopup = null, $_id = null, $_claseCss = null)
    {
        $context = $this->env->mergeGlobals(array(
            "titulo" => $_titulo,
            "title" => $_title,
            "url" => $_url,
            "esPopup" => $_esPopup,
            "id" => $_id,
            "claseCss" => $_claseCss,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 96
            echo "    ";
            if (((isset($context["url"]) ? $context["url"] : null) == "")) {
                echo " 
        ";
                // line 97
                echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
                echo "
    ";
            } else {
                // line 99
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
                echo "\" 
           title=\"";
                // line 100
                echo twig_escape_filter($this->env, ((array_key_exists("title", $context)) ? (_twig_default_filter((isset($context["title"]) ? $context["title"] : null), (isset($context["titulo"]) ? $context["titulo"] : null))) : ((isset($context["titulo"]) ? $context["titulo"] : null))), "html", null, true);
                echo "\" 
           ";
                // line 101
                if (((isset($context["esPopup"]) ? $context["esPopup"] : null) == "1")) {
                    echo " rel=\"pop-up\" ";
                }
                echo " 
           ";
                // line 102
                if (((isset($context["id"]) ? $context["id"] : null) != "")) {
                    echo " id=\"";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "\" ";
                }
                echo "               
           ";
                // line 103
                if (((isset($context["claseCss"]) ? $context["claseCss"] : null) != "")) {
                    echo " class=\"";
                    echo twig_escape_filter($this->env, (isset($context["claseCss"]) ? $context["claseCss"] : null), "html", null, true);
                    echo "\" ";
                }
                // line 104
                echo "           >";
                echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
                echo "</a>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 119
    public function getpaginacion($_paginacion = null, $_claseCssAnterior = null, $_claseCssSiguiente = null)
    {
        $context = $this->env->mergeGlobals(array(
            "paginacion" => $_paginacion,
            "claseCssAnterior" => $_claseCssAnterior,
            "claseCssSiguiente" => $_claseCssSiguiente,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 120
            echo "    <div class=\"botonera\">
        ";
            // line 121
            if (($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") > 1)) {
                // line 122
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
                echo twig_escape_filter($this->env, (isset($context["urlAmigable"]) ? $context["urlAmigable"] : null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") - 1), "html", null, true);
                echo "\" title=\"anterior\" class=\"";
                echo twig_escape_filter($this->env, ((array_key_exists("claseCssAnterior", $context)) ? (_twig_default_filter((isset($context["claseCssAnterior"]) ? $context["claseCssAnterior"] : null), "boton left")) : ("boton left")), "html", null, true);
                echo "\">anterior</a>
        ";
            }
            // line 124
            echo "        ";
            if (($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") < $this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "totalPaginas"))) {
                // line 125
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, (isset($context["appPath"]) ? $context["appPath"] : null), "html", null, true);
                echo twig_escape_filter($this->env, (isset($context["urlAmigable"]) ? $context["urlAmigable"] : null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["paginacion"]) ? $context["paginacion"] : null), "pagina") + 1), "html", null, true);
                echo "\" title=\"siguiente\" class=\"";
                echo twig_escape_filter($this->env, ((array_key_exists("claseCssSiguiente", $context)) ? (_twig_default_filter((isset($context["claseCssSiguiente"]) ? $context["claseCssSiguiente"] : null), "boton right")) : ("boton right")), "html", null, true);
                echo "\">siguiente</a>
        ";
            }
            // line 127
            echo "    </div> 
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 143
    public function getrecortaTexto($_texto = null, $_nCaracteres = null)
    {
        $context = $this->env->mergeGlobals(array(
            "texto" => $_texto,
            "nCaracteres" => $_nCaracteres,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 144
            echo "    ";
            if ((twig_length_filter($this->env, (isset($context["texto"]) ? $context["texto"] : null)) > (isset($context["nCaracteres"]) ? $context["nCaracteres"] : null))) {
                // line 145
                echo "        ";
                $context["puntos"] = " ...";
                // line 146
                echo "    ";
            }
            // line 147
            echo "    ";
            echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["texto"]) ? $context["texto"] : null), 0, (isset($context["nCaracteres"]) ? $context["nCaracteres"] : null)), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["puntos"]) ? $context["puntos"] : null), "html", null, true);
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 150
    public function getmoneda($_importe = null, $_nDecimales = null, $_separadorMiles = null, $_separadorDecimales = null, $_simbolo = null)
    {
        $context = $this->env->mergeGlobals(array(
            "importe" => $_importe,
            "nDecimales" => $_nDecimales,
            "separadorMiles" => $_separadorMiles,
            "separadorDecimales" => $_separadorDecimales,
            "simbolo" => $_simbolo,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 151
            echo "    ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["importe"]) ? $context["importe"] : null), ((array_key_exists("nDecimales", $context)) ? (_twig_default_filter((isset($context["nDecimales"]) ? $context["nDecimales"] : null), 2)) : (2)), ((array_key_exists("separadorDecimales", $context)) ? (_twig_default_filter((isset($context["separadorDecimales"]) ? $context["separadorDecimales"] : null), ".")) : (".")), ((array_key_exists("separadorMiles", $context)) ? (_twig_default_filter((isset($context["separadorMiles"]) ? $context["separadorMiles"] : null), ",")) : (","))), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, ((array_key_exists("simbolo", $context)) ? (_twig_default_filter((isset($context["simbolo"]) ? $context["simbolo"] : null), "€")) : ("€")), "html", null, true);
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 154
    public function getidioma($_clave = null)
    {
        $context = $this->env->mergeGlobals(array(
            "clave" => $_clave,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 155
            ob_start();
            echo "    
";
            // line 156
            if ($this->getAttribute((isset($context["LABELS"]) ? $context["LABELS"] : null), (isset($context["clave"]) ? $context["clave"] : null), array(), "array")) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["LABELS"]) ? $context["LABELS"] : null), (isset($context["clave"]) ? $context["clave"] : null), array(), "array"), "html", null, true);
            } else {
                echo "[";
                echo twig_escape_filter($this->env, (isset($context["clave"]) ? $context["clave"] : null), "html", null, true);
                echo "]";
            }
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "_global/macros.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  532 => 156,  528 => 155,  517 => 154,  501 => 151,  486 => 150,  471 => 147,  468 => 146,  465 => 145,  462 => 144,  450 => 143,  438 => 127,  427 => 125,  424 => 124,  413 => 122,  411 => 121,  408 => 120,  395 => 119,  380 => 104,  374 => 103,  366 => 102,  360 => 101,  356 => 100,  351 => 99,  346 => 97,  341 => 96,  325 => 95,  313 => 82,  298 => 80,  294 => 79,  289 => 77,  278 => 75,  268 => 74,  263 => 73,  251 => 72,  233 => 60,  225 => 59,  214 => 57,  208 => 55,  206 => 54,  192 => 53,  178 => 43,  174 => 42,  169 => 41,  162 => 37,  158 => 35,  150 => 30,  134 => 27,  131 => 26,  122 => 24,  97 => 16,  93 => 15,  88 => 14,  78 => 11,  68 => 10,  63 => 8,  60 => 7,  44 => 153,  41 => 149,  38 => 129,  35 => 107,  28 => 64,  22 => 19,  19 => 2,  129 => 25,  123 => 14,  117 => 13,  111 => 23,  105 => 36,  99 => 34,  96 => 33,  94 => 32,  86 => 28,  83 => 27,  77 => 24,  69 => 22,  64 => 19,  62 => 18,  55 => 15,  53 => 14,  45 => 12,  36 => 8,  33 => 7,  31 => 6,  25 => 46,  23 => 1,  73 => 23,  71 => 26,  65 => 9,  61 => 24,  58 => 16,  56 => 22,  49 => 6,  47 => 20,  43 => 18,  40 => 17,  37 => 16,  34 => 15,  32 => 84,  29 => 13,  26 => 12,);
    }
}
