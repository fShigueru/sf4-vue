<?php

namespace App\Entity\Admin;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Admin\NewsRepository")
 */
class News
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank(
     *     message = "Não pode ser em branco"
     * )
     * @ORM\Column(type="string", length=40)
     */
    private $title;

    /**
     * @var string
     *
     * @Assert\NotBlank(
     *     message = "Não pode ser em branco"
     * )
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Selecione uma imagem para a capa")
     * @Assert\Image(
     *     mimeTypes={"image/*"},
     *     mimeTypesMessage="Arquivo inválido!"
     * )
     */
    private $capa;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getCapa()
    {
        return $this->capa;
    }

    /**
     * @param string $capa
     * @return News
     */
    public function setCapa($capa)
    {
        $this->capa = $capa;

        return $this;
    }

}
