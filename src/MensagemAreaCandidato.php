<?php


class MensagemAreaCandidato
{
    public function get(Usuario $usuario)
    {
        if ($usuario->getStatus() == Usuario::STATUS_CONGELADO) {
            return 'Status congelado!'; 
        }

        if ($usuario->getStatus() == Usuario::STATUS_INATIVO) {
            return 'Status inativo!'; 
        }
    }
}
