<?php

interface MensagemAreaCandidatoInterface
{
	public function get(UsuarioInterface $usuario);
}

class MensagemAreaCandidato implements MensagemAreaCandidatoInterface
{
	private $mensagens = [];

	public function __construct(array $mensagens)
	{
		$this->mensagens = $mensagens;
	}

    public function get(UsuarioInterface $usuario)
    {
    	foreach ($this->mensagens as $key => $value) {
    		if ($value instanceof MensagemAreaCandidatoInterface && $value->get($usuario)) {
    			return $value->get($usuario);
    		}
    	}

    	return false;
    }
}

class MensagemCandidatoInativo implements MensagemAreaCandidatoInterface
{
	public function get(UsuarioInterface $usuario)
	{
		return $usuario->getStatus() == UsuarioInterface::STATUS_INATIVO ? 'Status inativo!' : false;
	}
}

class MensagemCandidatoCongelado implements MensagemAreaCandidatoInterface
{
	public function get(UsuarioInterface $usuario)
	{
		return $usuario->getStatus() == UsuarioInterface::STATUS_CONGELADO ? 'Status congelado!' : false;
	}
}
