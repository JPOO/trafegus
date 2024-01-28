<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motorista
 *
 * @ORM\Table(name="motorista", indexes={@ORM\Index(name="veiculo_fk", columns={"veiculo"})})
 * @ORM\Entity
 */
class Motorista
{
    /**
     * @var int
     *
     * @ORM\Column(name="idmotorista", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmotorista;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=11, nullable=false)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=200, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="rg", type="string", length=20, nullable=false)
     */
    private $rg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefone", type="string", length=20, nullable=true)
     */
    private $telefone;

    /**
     * @var \Application\Entity\Veiculo
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Veiculo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="veiculo", referencedColumnName="idveiculo")
     * })
     */
    private $veiculo;



    /**
     * Get idmotorista.
     *
     * @return int
     */
    public function getIdmotorista()
    {
        return $this->idmotorista;
    }

    /**
     * Set cpf.
     *
     * @param string $cpf
     *
     * @return Motorista
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf.
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set nome.
     *
     * @param string $nome
     *
     * @return Motorista
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set rg.
     *
     * @param string $rg
     *
     * @return Motorista
     */
    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    /**
     * Get rg.
     *
     * @return string
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set telefone.
     *
     * @param string|null $telefone
     *
     * @return Motorista
     */
    public function setTelefone($telefone = null)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone.
     *
     * @return string|null
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set veiculo.
     *
     * @param \Application\Entity\Veiculo|null $veiculo
     *
     * @return Motorista
     */
    public function setVeiculo(\Application\Entity\Veiculo $veiculo = null)
    {
        $this->veiculo = $veiculo;

        return $this;
    }

    /**
     * Get veiculo.
     *
     * @return \Application\Entity\Veiculo|null
     */
    public function getVeiculo()
    {
        return $this->veiculo;
    }
}
