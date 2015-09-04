<?php

interface UsuarioInterface
{
    const STATUS_CONGELADO = 'congelado';
    const STATUS_INATIVO = 'inativo';
    public function getNome();
    public function getStatus();
}

class Usuario implements UsuarioInterface
{
    private $nome;
    private $status;

    public function __construct($nome, $status)
    {
        $this->nome = $nome;
        $this->status = $status;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
