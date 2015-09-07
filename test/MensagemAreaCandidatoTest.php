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
        $mensagemCollection = new MensagemCollection();
        $mensagemCollection
            ->atach(new MensagemCandidatoInativo)
            ->atach(new MensagemCandidatoCongelado);

        $usuario = new Usuario('João Antonio', Usuario::STATUS_CONGELADO);

        $this->assertEquals(
            'Status congelado!',
            (new MensagemAreaCandidato($mensagemCollection))->get($usuario)
        );
    }

    /**
     * @test
     */
    public function shouldBeMensagemStatusInativo()
    {
        $mensagemCollection = new MensagemCollection();
        $mensagemCollection
            ->atach(new MensagemCandidatoInativo)
            ->atach(new MensagemCandidatoCongelado);

        $usuario = new Usuario('Pietra', Usuario::STATUS_INATIVO);

        $this->assertEquals(
            'Status inativo!',
            (new MensagemAreaCandidato($mensagemCollection))->get($usuario)
        );
    }
}
