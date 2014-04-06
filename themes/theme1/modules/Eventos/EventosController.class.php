<?php

/**
 * Description of IndexController
 *
 * @author Sergio Pérez <sergio.perez@albatronic.com>
 * @copyright Informática ALBATRONIC
 * @date 06-nov-2012
 *
 */
class EventosController extends ControllerProject {

    protected $entity = "Eventos";

    public function IndexAction() {

        if (isset($this->request[1])) {
            $fecha = explode("-", $this->request[1]);
            $mes = $fecha[1];
            $ano = $fecha[0];
            $this->values['calendario'] = Calendario::getCalendario($mes, $ano);
            $this->values['eventos'] = Eventos::getEventos($this->request[1], $this->request[1], 0, 2, false);
        } else
            $this->values['eventos'] = Eventos::getEventos('','', 0, 2, false);

        return parent::IndexAction();
    }

}

?>
