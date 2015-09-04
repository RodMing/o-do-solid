<?php

require_once __DIR__ . '/../src/MensagemAreaCandidato.php';
require_once __DIR__ . '/../src/Usuario.php';

class MensagemAreaCandidatoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldBeMensagemStatusCongelado()
    {
        $mensagem = new MensagemAreaCandidato();
        $usuario = new Usuario('João Antonio', Usuario::STATUS_CONGELADO);

        $this->assertEquals(
            'Status congelado!',
            $mensagem->get($usuario)
        );
    }

    /**
     * @test
     */
    public function shouldBeMensagemStatusInativo()
    {
        $mensagem = new MensagemAreaCandidato();
        $usuario = new Usuario('Pietra', Usuario::STATUS_INATIVO);

        $this->assertEquals(
            'Status inativo!',
            $mensagem->get($usuario)
        );
    }
}
