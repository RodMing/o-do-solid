<?php

interface MensagemAreaCandidatoInterface
{
	public function get(UsuarioInterface $usuario);
}

class MensagemCollection
{
    private $mensagens = [];

    public function atach(MensagemAreaCandidatoInterface $mensagem)
    {
        $this->mensagens[] = $mensagem;
        return $this;
    }

    public function getMensagens()
    {
        return $this->mensagens;
    }
}

class MensagemAreaCandidato implements MensagemAreaCandidatoInterface
{
	private $mensagens;

	public function __construct(MensagemCollection $mensagens)
	{
		$this->mensagens = $mensagens;
	}

    public function get(UsuarioInterface $usuario)
    {
    	foreach ($this->mensagens->getMensagens() as $mensagem) 
    	    if ($mensagem->get($usuario)) return $mensagem->get($usuario);

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
