<?php

/**
 * @author Sergio Perez <sergio.perez@albatronic.com>
 * @copyright INFORMATICA ALBATRONIC SL
 * @date 09.03.2014 11:44:20
 */

/**
 * @orm:Entity(ErpFavoritosWeb)
 */
class FavoritosWeb extends FavoritosWebEntity {

    public function __toString() {
        return ($this->Id) ? $this->Id : '';
    }

    public function create() {
        $this->setPublish(1);
        $this->setChecked(1);
        parent::create();
    }

}

?>