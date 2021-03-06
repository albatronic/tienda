<?php

/**
 * Description of ControllerWeb
 *
 * Controlador común a todos los proyectos web
 *
 * @author Sergio Pérez
 * @copyright Informática ALBATRONIC, SL
 * @version 1.0 1-dic-2012
 */
class ControllerWeb {

    /**
     * Variables enviadas en el request por POST o por GET
     * @var request
     */
    protected $request;

    /**
     * Objeto de la clase 'form' con las propiedades y métodos
     * del formulario obtenidos del fichero de configuracion
     * del formulario en curso
     * @var from
     */
    protected $form;

    /**
     * Valores a devolver al controlador principal para
     * que los renderice con el twig correspondiente
     * @var array
     */
    protected $values;

    /**
     * Objeto de la clase 'controlAcceso'
     * para gestionar los permisos de acceso a los métodos del controller
     * @var ControlAcceso
     */
    protected $permisos;

    /**
     * Array con las variables Web
     * @var array
     */
    protected $varWeb;

    /**
     * Array con las variables Env
     * @var array
     */
    protected $varEnv;

    /**
     * Carga las variables web del proyecto
     * Borra la tabla temporal de visitas según la frecuencia de borrado indicada en el config.yml
     * Controla el número de visitas únicas a cada url
     * Almacena el registro de visitas
     * 
     * @param array $request Array con el request
     */
    public function __construct($request) {

        $this->values['controller'] = $this->controller;

        // Cargar lo que viene en el request
        $this->request = $request;

        // Cargar las variables de entorno y web del proyecto en la variable 
        // de sesion y en $this->varEnv['Pro'] y $this->varWeb['Pro'] respectivamente
        // de esta forma solo se cargaran la primera vez
        $this->varWeb['Pro'] = CpanVariables::getVariables('Web', 'Pro');
        $this->varEnv['Pro'] = CpanVariables::getVariables('Env', 'Pro');

        // Establece los idiomas posibles de la web
        $this->values['idiomas'] = $_SESSION['idiomas'];

        // Construye el array de las url amigable para cada idioma
        $this->values['URLS_LANGUAGES'] = $this->getUrlsLanguages();

        // CARGA LOS TEXTOS DE LAS ETIQUETAS WEB DEL IDIOMA CORRESPONDIENTE
        // La carga se realiza si no se ha hecho previamente o si estamos en
        // entorno de desarrollo
        $codigoIdiomaActual = $_SESSION['idiomas']['disponibles'][$_SESSION['idiomas']['actual']]['codigo'];
        $textos = new CpanTextos();
        $this->values['LABELS'] = $textos->getTextos($this->controller);
        unset($textos);

        $this->values['LANGUAGE'] = $codigoIdiomaActual;

        // GESTION DE COOKIES. El cartel debe mostrarse cada 7 días
        if (empty($_COOKIE["SESS_ID_CARTEL_COOKIE"])) {
            setcookie("SESS_ID_CARTEL_COOKIE", uniqid(time()), time() + (86400 * 7), "/");
        }
        $this->values["session_id"] = $_COOKIE["SESS_ID_CARTEL_COOKIE"];

        // El objeto widgets para que esté disponible en todas las vistas
        $this->values['widgets'] = new Widgets();

        /**
         * CONTROL DE VISITAS, SI ESTÁ ACTIVO POR LA VARIABLE DE ENTORNO
         *
         * OBSOLETO: SE GESTIONA DESDE GOOGLE ANALYTICS

          if ($_SESSION['varEnv']['Pro']['visitas']['activo']) {

          // Borrar la tabla temporal de visitas, si procede según la
          // frecuencia de horas de borrado
          if (!$_SESSION['borradoTemporalVisitas']) {
          $temp = new VisitVisitasTemporal();
          $temp->borraTemporal();
          unset($temp);
          }

          // Control de visitas UNICAS a la url amigable
          $temp = new VisitVisitasTemporal();
          $temp->anotaVisitaUrlUnica($this->request['IdUrlAmigable']);
          unset($temp);

          // Anotar en el registro de visitas
          $visita = new VisitVisitas();
          $visita->anotaVisita($this->request);
          unset($visita);
          }
         * 
         */
        // LECTURA DE METATAGS
        $this->values['meta'] = $this->getMetaInformacion();

        // INCREMENTA EL NÚMERO DE VISITAS DE LA URL AMIGABLE Y SU ENTIDAD ASOCIADA
        $urlAmigable = new CpanUrlAmigables($this->request['IdUrlAmigable']);
        $urlAmigable->IncrementaVisitas();
        unset($urlAmigable);
    }

    /**
     * Devuelve un array con dos elementos:
     * 
     * - 'template' => el template a devolver
     * - 'values' => array con los valores obtenidos
     * 
     * @return array Array template y values
     */
    public function IndexAction() {

        return array(
            'template' => $this->controller . "/index.html.twig",
            'values' => $this->values,
        );
    }

    /**
     * Genera el array 'firma' de forma aletoria en base
     * la variable web del proyecto 'signatures'
     * 
     * El array tiene tres elementos:
     * 
     * - url => 'texto'
     * - location => 'texto'
     * - service => 'texto'
     * 
     * @return array Array con la firma de la web
     */
    protected function getFirma() {

        $links = explode(",", $this->varWeb['Pro']['signatures']['links']);
        $link = trim($links[rand(0, count($links) - 1)]);

        $locations = explode(",", $this->varWeb['Pro']['signatures']['locations']);
        $location = trim($locations[rand(0, count($locations) - 1)]);

        $idioma = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        if (!is_array($this->varWeb['Pro']['signatures']['services'][$idioma]))
            $idioma = 'es';

        $services = explode(",", $this->varWeb['Pro']['signatures']['services'][$idioma]);
        $service = trim($services[rand(0, count($services) - 1)]);

        return array(
            'url' => $link,
            'location' => $location,
            'service' => $service,
        );
    }

    /**
     * Genera el array 'ruta' con todas las entidades
     * padre del objeto en curso
     * 
     * El array tiene dos elementos:
     * 
     *  - nombre => 'texto',
     *  - url => array(
     *                  url => 'texto con la url completa incluido http::// ó https://'
     *                  tartgetBlank => boolean
     *              )
     *              
     * @return array Array con la ruta en la que está el visitante web
     */
    protected function getRuta() {

        $array = array();

        if ($this->request['Entity'] == 'GconContenidos') {
            $contenido = new GconContenidos($this->request['IdEntity']);
            $idSeccion = $contenido->getIdSeccion()->getId();
            unset($contenido);
        } else {
            $idSeccion = $this->request['IdEntity'];
        }

        $seccion = new GconSecciones($idSeccion);
        if ($seccion->getBelongsTo()->getId() > 0) {
            $ruta = $seccion->getPadres();
            foreach ($ruta as $IdPadre) {
                $subSeccion = new GconSecciones($IdPadre);
                $array[] = array(
                    'nombre' => $subSeccion->getTitulo(),
                    'url' => $subSeccion->getHref(),
                );
            }
        } else {
            $array[] = array(
                'nombre' => 'Inicio',
                'url' => array('url' => $_SESSION['appPath'], 'targetBlank' => 0),
            );
        }

        $array[] = array(
            'nombre' => $seccion->getTitulo(),
            'url' => $seccion->getHref(),
        );

        unset($seccion);

        return $array;
    }

    /**
     * Genera el array 'ustedEstaEn'
     * 
     * El array tiene dos elementos:
     * 
     * - titulo => texto
     * - subsecciones => array con n elmentos numerados del 0 al N (
     *                          titulo => texto
     *                          url => array(url => texto, targetBlank => boolean)
     *                      )
     * 
     * @return array Array con los elmentos de 'ustedEntaEn'
     */
    protected function getUstedEstaEn() {

        $array = array();

        if ($this->request['Entity'] == 'GconContenidos') {
            $contenido = new GconContenidos($this->request['IdEntity']);
            $idSeccion = $contenido->getIdSeccion()->getId();
            unset($contenido);
        } else {
            $idSeccion = $this->request['IdEntity'];
        }

        $seccion = new GconSecciones($idSeccion);
        $array['titulo'] = $seccion->getEtiquetaWeb1();

        $rows = $seccion->cargaCondicion("Id", "BelongsTo='{$seccion->getId()}'", "OrdenMenu1 ASC");
        foreach ($rows as $row) {
            $subSeccion = new GconSecciones($row['Id']);
            $array['subsecciones'][] = array(
                'titulo' => $subSeccion->getTitulo(),
                'subtitulo' => $subSeccion->getSubtitulo(),
                'EtiquetaWeb1' => $subSeccion->getEtiquetaWeb1(),
                'url' => $subSeccion->getHref(),
            );
        }
        $padre = $seccion->getBelongsTo();
        if ($padre->getId() > 0) {
            $url = $padre->getHref();
            $array['subirNivel'] = $url['url'];
        }

        unset($seccion);
        unset($padre);

        return $array;
    }

    /**
     * Devuelve un array con las columnas del objeto $entidad cuyo id es $idEntidad
     * indicadas en el array $arrayColumnas.
     * 
     * Si no se indica $arrayColumnas, devuelve el OBJETO completo
     * 
     * Además añade al array devuelto el elemento 'url'
     * 
     * @param string $entidad El nombre de la entidad
     * @param int $idEntidad El id del objeto
     * @param array $arrayColumnas Array con las columnas. Opcional
     * @return mixed Array con las columnas del objeto o el objeto completo
     */
    static function getObjeto($entidad, $idEntidad, $arrayColumnas = '') {

        $objeto = new $entidad($idEntidad);

        if (is_array($arrayColumnas)) {
            $array = array();

            $array['url'] = $objeto->getHref();

            foreach ($arrayColumnas as $columna) {
                $array[$columna] = $objeto->{"get$columna"}();
            }

            return $array;
        } else {
            return $objeto;
        }
    }

    /**
     * Devuelve un array con los objetos más buscados y que son de las
     * entidades indicadas en el array $enQueEntidades
     * 
     * Si el array está vacío, la búsqueda se hace para cualquier entidad.
     * 
     * El array de objetos a devolver está ordenado descendentemente por
     * el número de visitas.
     * 
     * @param array $enQueEntidades Array con los nombres de las entidades a buscar
     * @param integer $nItems El número máximo de objetos a devolver. Por defecto sin límite
     * @return array Array de objetos
     */
    static function getLoMasBuscado(array $enQueEntidades, $nItems = '0') {

        $array = array();

        $limite = ($nItems <= 0) ? "" : "LIMIT {$nItems}";

        $filtro = "";
        if (count($enQueEntidades)) {
            foreach ($enQueEntidades as $entidad) {
                if ($filtro != "") {
                    $filtro .= " OR ";
                }
                $filtro .= "Entity='{$entidad}'";
            }
        } else {
            $filtro = "1";
        }

        $urls = new CpanUrlAmigables();
        $rows = $urls->cargaCondicion("Entity,IdEntity", $filtro, "NumberVisits DESC {$limite}");
        unset($urls);

        foreach ($rows as $row) {
            if (class_exists($row['Entity'])) {
                $array[] = new $row['Entity']($row['IdEntity']);
            }
        }

        return $array;
    }

    /**
     * Devuelve un array con contenidos que son NOVEDADES.
     * 
     * Están ordenados DESCENDENTEMENTE por Id
     * 
     * El array tiene 5 elementos:
     * 
     * - titulo => el titulo de la novedad
     * - subtitulo => el subtitulo de la novedad
     * - resumen => el resumen de la novedad
     * - desarrollo => el desarrollo de la novedad
     * - url => array(url => texto, targetBlank => boolean)
     * 
     * @param integer $nItems Número máximo de novedades a devolver. Opcional (defecto=5)
     * @return array Array de novedades
     */
    protected function getNovedades($nItems = 5) {

        $array = array();
        $limite = ($nItems <= 0) ? "" : "LIMIT {$nItems}";

        $novedad = new GconContenidos();
        $filtro = "NoticiaPublicar='1' AND NoticiaPublicarEnPortada='1'";

        $rows = $novedad->cargaCondicion("Id", $filtro, "Id DESC {$limite}");
        unset($novedad);

        foreach ($rows as $row) {
            $novedad = new GconContenidos($row['Id']);
            $array[] = array(
                'titulo' => $novedad->getTitulo(),
                'subtitulo' => $novedad->getSubtitulo(),
                'resumen' => Textos::limpiaTiny($novedad->getResumen()),
                'desarrollo' => Textos::limpiaTiny($novedad->getDesarrollo()),
                'url' => $novedad->getHref(),
            );
        }
        unset($novedad);

        return $array;
    }

    protected function getSubsecciones($idSeccion) {

        $array = array();

        $seccion = new GconSecciones($idSeccion);

        $array['titulo'] = ($seccion->getMostrarTitulo()->getIDTipo() == 1) ? $seccion->getTitulo() : "";
        $array['subtitulo'] = ($seccion->getMostrarSubtitulo()->getIDTipo() == 1) ? $seccion->getSubtitulo() : "";
        $array['introduccion'] = ($seccion->getMostrarIntroduccion()->getIDTipo() == 1) ? $seccion->getIntroduccion() : "";

        $rows = $seccion->cargaCondicion("Id", "BelongsTo='{$idSeccion}'", "SortOrder ASC");
        foreach ($rows as $row) {
            $seccion = new GconSecciones($row['Id']);
            $array['subsecciones'][] = array(
                'titulo' => ($seccion->getMostrarTitulo()->getIDTipo() == 1) ? $seccion->getTitulo() : "",
                'subtitulo' => ($seccion->getMostrarSubtitulo()->getIDTipo() == 1) ? $seccion->getSubtitulo() : "",
                'introduccion' => ($seccion->getMostrarIntroduccion()->getIDTipo() == 1) ? $seccion->getIntroduccion() : "",
                'fecha' => $seccion->getPublishedAt(),
                'url' => $seccion->getHref(),
            );
        }
        unset($seccion);

        return $array;
    }

    /**
     * Devuelve el texto utilizado para calcular la password
     * 
     * El texto está en el nodo <config><semillaMD5> del archivo config/config.yml
     * 
     * @return string La semilla
     */
    protected function getSemilla() {

        $semilla = "";

        $fileConfig = $_SERVER['DOCUMENT_ROOT'] . $_SESSION['appPath'] . "/config/config.yml";

        if (file_exists($fileConfig)) {
            $yaml = sfYaml::load($fileConfig);
            $semilla = $yaml['config']['semillaMD5'];
        }

        return $semilla;
    }

    /**
     * Genera un array con la meta información en base
     * a la meta del objeto en curso, su padre (belongsTo) y la del proyecto
     * 
     * @return array Array con la meta información
     */
    protected function getMetaInformacion() {

        $meta['pro'] = $this->varWeb['Pro']['meta'];

        $objetoActual = new $this->request['Entity']($this->request['IdEntity']);
        $meta['objetoActual'] = array(
            'title' => $objetoActual->getMetatagTitle(),
            'description' => $objetoActual->getMetatagDescription(),
            'keyWords' => $objetoActual->getMetatagKeywords(),
            'titleSimple' => $objetoActual->getMetatagTitleSimple()->getIDTipo(),
            'titlePosition' => $objetoActual->getMetatagTitlePosition()->getIDTipo(),
            'revisitAfter' => $objetoActual->getRevisitAfter(),
        );

        $imagen = $objetoActual->getPathNameImagenN(1);
        if ($imagen) {
            $meta['pro']['urlImagen'] = $_SESSION['appUrl'] . "/" . $_SESSION['theme'] . "/" . $imagen;
        }

        $objetoPadre = $objetoActual->getBelongsTo();
        $meta['objetoPadre'] = array(
            'title' => $objetoPadre->getMetatagTitle(),
            'description' => $objetoPadre->getMetatagDescription(),
            'keyWords' => $objetoPadre->getMetatagKeywords(),
            'titleSimple' => $objetoPadre->getMetatagTitleSimple()->getIDTipo(),
            'titlePosition' => $objetoPadre->getMetatagTitlePosition()->getIDTipo(),
            'revisitAfter' => $objetoPadre->getRevisitAfter(),
        );

        unset($objetoActual);
        unset($objetoPadre);

        foreach ($meta['pro'] as $key => $value) {
            if (trim($meta['objetoActual'][$key]) != '') {
                $metaInformacion[$key] = $meta['objetoActual'][$key];
            } elseif (trim($meta['objetoPadre'][$key]) != '') {
                $metaInformacion[$key] = $meta['objetoPadre'][$key];
            } else {
                $metaInformacion[$key] = $value;
            }
        }

        $metaInformacion['lang'] = $_SESSION['idiomas']['disponibles'][$_SESSION['idiomas']['actual']]['codigoLargo'];
        $metaInformacion['blockRobots'] = $this->varEnv['Pro']['blockRobots'];

        return $metaInformacion;
    }

    /**
     * Devuelve un array con las urls amigables en los distintos idiomas
     * correspondientes a la entidad e identidad en curso
     * 
     * El índice el array es el código numérico del idioma y el valor
     * es la url en dicho idioma
     * 
     * @return array Array de urls amigables
     */
    protected function getUrlsLanguages() {

        $url = new CpanUrlAmigables();
        $rows = $url->cargaCondicion("Idioma,UrlFriendly", "Entity='{$this->request['Entity']}' AND IdEntity='{$this->request['IdEntity']}'");
        unset($url);

        $array = array();

        foreach ($rows as $row) {
            $array[$row['Idioma']] = $row['UrlFriendly'];
        }

        return $array;
    }

    /**
     * Devuelve el nombre del archivo css asociado al template
     * @param string $template
     * @return string
     */
    static function getArchivoCss($template) {

        $archivoTemplate = str_replace('html', 'css', $template);

        if (!file_exists($_SESSION['theme'] . '/modules/' . $archivoTemplate)) {
            $aux = explode("/", $archivoTemplate);
            $modulo = $aux[0];
            $archivoTemplate = (!file_exists("{$_SESSION['theme']}/modules/{$modulo}/index.css.twig")) ?
                    "_global/css.twig" :
                    "{$modulo}/index.css.twig";
        }

        return $archivoTemplate;
    }

    /**
     * Devuelve el nombre del archivo js asociado al template
     * @param string $template
     * @return string
     */
    static function getArchivoJs($template) {

        $archivoTemplate = str_replace('html', 'js', $template);

        if (!file_exists($_SESSION['theme'] . '/modules/' . $archivoTemplate)) {
            $aux = explode("/", $archivoTemplate);
            $modulo = $aux[0];
            $archivoTemplate = (!file_exists("{$_SESSION['theme']}/modules/{$modulo}/index.js.twig")) ?
                    "_global/js.twig" :
                    "{$modulo}/index.js.twig";
        }

        return $archivoTemplate;
    }

    /**
     * Establezco la variable de entorno con el idioma $_SESSION['idiomas']
     */
    static function setIdioma() {

        $variables = CpanVariables::getVariables('Web', 'Pro');

        $idiomaVisitante = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $idiomasPermitidos = explode(",", trim($variables['globales']['lang']));

        $idIdioma = array_search($idiomaVisitante, $idiomasPermitidos);
        if (!$idIdioma) {
            $idIdioma = 0;
        }

        foreach ($idiomasPermitidos as $key => $value) {
            $idiomas = new Idiomas($value);
            $idioma = $idiomas->getTipo();
            $idiomasPermitidos[$key] = array(
                'codigo' => $value,
                'codigoLargo' => $idioma['Value'],
                'texto' => $idioma['Texto'],
            );
        }
        unset($idiomas);

        $_SESSION['idiomas']['disponibles'] = $idiomasPermitidos;
        $_SESSION['idiomas']['actual'] = $idIdioma;
        $_SESSION['LANGUAGE'] = $_SESSION['idiomas']['disponibles'][$idIdioma]['codigo'];
    }

    /**
     * Redirige al método $action del controller indicado
     * 
     * @param string $controller El nombre del controller
     * @param string $action El nombre del método. Por defecto el Index
     * @return array
     */
    protected function redirect($controller, $action = "Index") {

        $controlador = "{$controller}Controller";
        $metodo = "{$action}Action";
        $fileController = $_SESSION['theme'] . "/modules/{$controller}/{$controller}Controller.class.php";
        if (!file_exists($fileController)) {
            $controlador = "Error404Controller";
            $metodo = "IndexAction";
            $fileController = "{$_SESSION['theme']}/modules/Error404/Error404Controller.class.php";
        }
        include_once($fileController);
        //echo $fileController;
        $controller = new $controlador($this->request);
        return $controller->{$metodo}();
    }

    /**
     * Comprueba la existencia del controlador, si no existe
     * intenta crearlo
     * 
     * @param string $controller El nombre del controlador
     * @param string $template El nombre del template
     * @return string El nombre del controller si existe o ha podido crearlo. Vacio si no ha podido crearlo
     */
    static function validaController($controller, $template = "index.html.twig") {

        $pathController = "{$_SESSION['theme']}/modules/{$controller}";
        $fileController = "{$_SESSION['theme']}/modules/{$controller}/{$controller}Controller.class.php";
        $fileTemplate = "{$_SESSION['theme']}/modules/{$controller}/{$template}";
        if (!file_exists($fileController)) {
            if (mkdir($pathController)) {
                $fp = fopen($fileController, "w");
                if ($fp) {
                    // Crear controlador
                    $texto = "<?php\n\n" .
                            "/**\n" .
                            " * Description of {$controller}Controller\n" .
                            " *\n" .
                            " * AUTOGENERATED\n\n" .
                            " * @author Sergio Pérez <sergio.perez@albatronic.com>\n" .
                            " * @copyright Informática ALBATRONIC\n" .
                            " * @date " . date('d-M-Y') . "\n" .
                            " *\n" .
                            " */\n" .
                            "class {$controller}Controller extends ControllerProject {\n\n" .
                            "    protected \$controller = \"{$controller}\";\n\n" .
                            "}";
                    fwrite($fp, $texto);
                    fclose($fp);
                    $ok = true;
                } else {
                    $ok = false;
                }
            } else {
                $ok = false;
            }
        } else {
            $ok = true;
        }

        if ($ok && !file_exists($fileTemplate)) {
            // Crear template
            $fp = fopen($fileTemplate, "w");
            if ($fp) {
                $texto = "{# " . $controller . " #}\n" .
                        "{% extends layout %}\n\n" .
                        "{% set widgets = values.widgets %}\n\n" .
                        "{% block content %}\n" .
                        "\t<p>Template autogenerado para el controlador {$controller}</p>\n" .
                        "\t<p>Edítalo en {$fileTemplate}</p>\n" .
                        "{% endblock %}";
                fwrite($fp, $texto);
                fclose($fp);
            }
        }

        return ($ok) ? $controller : "";
    }

    /**
     * Renderiza template
     * 
     * @param string $template El path completo al template
     * @param array $values Array de valores
     * @return string Texto html
     */
    static function renderTwigTemplate($template, $values) {
        
        $loader = new Twig_Loader_Array(array('index' => file_get_contents($template),));
        $twig = new Twig_Environment($loader);

        return $twig->render('index', $values);
    }    
}
