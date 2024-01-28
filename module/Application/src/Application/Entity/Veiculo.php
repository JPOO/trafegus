<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Veiculo
 *
 * @ORM\Table(name="veiculo")
 * @ORM\Entity
 */
class Veiculo
{
    /**
     * @var int
     *
     * @ORM\Column(name="idveiculo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idveiculo;

    /**
     * @var int
     *
     * @ORM\Column(name="ano", type="integer", nullable=false)
     */
    private $ano;

    /**
     * @var string
     *
     * @ORM\Column(name="cor", type="string", length=20, nullable=false)
     */
    private $cor;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=20, nullable=false)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=20, nullable=false)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="placa", type="string", length=7, nullable=false)
     */
    private $placa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="renavam", type="string", length=30, nullable=true)
     */
    private $renavam;



    /**
     * Get idveiculo.
     *
     * @return int
     */
    public function getIdveiculo()
    {
        return $this->idveiculo;
    }

    /**
     * Set ano.
     *
     * @param int $ano
     *
     * @return Veiculo
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get ano.
     *
     * @return int
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set cor.
     *
     * @param string $cor
     *
     * @return Veiculo
     */
    public function setCor($cor)
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * Get cor.
     *
     * @return string
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * Set marca.
     *
     * @param string $marca
     *
     * @return Veiculo
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca.
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo.
     *
     * @param string $modelo
     *
     * @return Veiculo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo.
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set placa.
     *
     * @param string $placa
     *
     * @return Veiculo
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }

    /**
     * Get placa.
     *
     * @return string
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * Set renavam.
     *
     * @param string|null $renavam
     *
     * @return Veiculo
     */
    public function setRenavam($renavam = null)
    {
        $this->renavam = $renavam;

        return $this;
    }

    /**
     * Get renavam.
     *
     * @return string|null
     */
    public function getRenavam()
    {
        return $this->renavam;
    }
}
