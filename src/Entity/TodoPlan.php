<?php

namespace App\Entity;

use App\Repository\TodoPlanRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="todo_plan")
 * @ORM\Entity(repositoryClass=TodoPlanRepository::class)
 */
class TodoPlan
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="json")
     */
    private $json = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJson(): ?array
    {
        return $this->json;
    }

    public function setJson(array $json): self
    {
        $this->json = $json;

        return $this;
    }
}
