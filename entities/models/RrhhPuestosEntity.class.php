<?php

/**
 * @author Sergio Perez <sergio.perez@albatronic.com>
 * @copyright INFORMATICA ALBATRONIC SL
 * @date 12.03.2013 21:49:25
 */

/**
 * @orm:Entity(RrhhPuestos)
 */
class RrhhPuestosEntity extends EntityComunes {

    /**
     * @orm GeneratedValue
     * @orm Id
     * @var integer
     * @assert NotBlank(groups="RrhhPuestos")
     */
    protected $Id;

    /**
     * @var string
     * @assert NotBlank(groups="RrhhPuestos")
     */
    protected $Titulo;

    /**
     * @var string
     */
    protected $Subtitulo;

    /**
     * @var string
     */
    protected $Resumen;

    /**
     * Nombre de la conexion a la BD
     * @var string
     */
    protected $_conectionName = '';

    /**
     * Nombre de la tabla física
     * @var string
     */
    protected $_tableName = 'RrhhPuestos';

    /**
     * Nombre de la PrimaryKey
     * @var string
     */
    protected $_primaryKeyName = 'Id';

    /**
     * Relacion de entidades que dependen de esta
     * @var string
     */
    protected $_parentEntities = array(
        array('SourceColumn' => 'Id', 'ParentEntity' => 'RrhhPersonal', 'ParentColumn' => 'IdPuesto'),
    );

    /**
     * Relacion de entidades de las que esta depende
     * @var string
     */
    protected $_childEntities = array(
        'ValoresSN',
        'ValoresPrivacy',
        'ValoresDchaIzq',
        'ValoresChangeFreq',
        'RequestMethods',
        'RequestOrigins',
        'CpanAplicaciones',
    );

    /**
     * GETTERS Y SETTERS
     */
    public function setId($Id) {
        $this->Id = $Id;
    }

    public function getId() {
        return $this->Id;
    }

    public function setTitulo($Titulo) {
        $this->Titulo = trim($Titulo);
    }

    public function getTitulo() {
        return $this->Titulo;
    }

    public function setSubtitulo($Subtitulo) {
        $this->Subtitulo = trim($Subtitulo);
    }

    public function getSubtitulo() {
        return $this->Subtitulo;
    }

    public function setResumen($Resumen) {
        $this->Resumen = trim($Resumen);
    }

    public function getResumen() {
        return $this->Resumen;
    }

}

// END class RrhhPuestos
?>