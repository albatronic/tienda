<?php

/**
 * Description of Fabricantes
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática ALBATRONIC, SL
 * @since 04-nov-2011
 *
 */
class Fabricantes extends FabricantesEntity {

    public function __toString() {
        return $this->getTitulo();
    }

    public function fetchAll($column = '', $default = TRUE) {
        if ($column == '')
            $column = 'Titulo';
        return parent::fetchAll($column, $default);
    }

    /**
     * Devuelve el número de artículos del fabricante en curso
     * 
     * No tiene en cuenta los no vigentes
     * 
     * @return integer El número de artículos
     */
    public function getNArticulos() {

        $articulo = new Articulos();
        $rows = $articulo->cargaCondicion("count(IDArticulo) as nArticulos", "IDFabricante='{$this->IDFabricante}' and Vigente='1'");
        unset($articulo);

        return $rows[0]['nArticulos'];
    }

    /**
     * Devuelve un array de objetos familias que son categorias y que están relacionados
     * con el fabricante en curso
     * 
     * @return \Fabricantes
     */
    public function getCategorias() {

        $array = array();
        
        $articulo = new Articulos();
        $rows = $articulo->cargaCondicion("distinct IDCategoria", "IDFabricante='{$this->IDFabricante}' and Vigente='1'");
        unset($articulo);  

        foreach ($rows as $row)
            $array[] = new Familias($row['IDCategoria']);
        
        return $array;
    }  
    
    /**
     * Devuelve un array con todas las categorias y familias
     * ques tiene artículos vigentes del fabricante en curso
     * 
     * @return array
     */
    public function getCategoriasFamilias() {
        
        $array = array();

        $articulo = new Articulos();
        $categorias = $articulo->cargaCondicion("distinct IDCategoria", "IDFabricante='{$this->IDFabricante}' and Vigente='1'");
        unset($articulo); 

        foreach ($categorias as $categoria) {

            $familia = new Familias();
            $rows1 = $familia->cargaCondicion("IDFamilia", "BelongsTo='{$categoria['IDCategoria']}'");
            unset($familia);

            $array[$categoria['IDCategoria']]['categoria'] = new Familias($categoria['IDCategoria']);

            foreach ($rows1 as $row1)
                $array[$categoria['IDCategoria']]['familias'][] = new Familias($row1['IDFamilia']);
        }

        return $array;        
    }
}

?>
