<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\WorkoutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=WorkoutRepository::class)
 * @ApiResource(
 *      shortName="workouts",
 *      normalizationContext={"groups"={"read:workout"}},
 *      paginationItemsPerPage=10,
 *      attributes={
 *          "order"={"id"="DESC"}
 *      },
 *      collectionOperations={
 *          "get",
 *          "post"={
 *              "denormalization_context"={"groups"={"create:workout"}},
 *              "controller"=App\Controller\Api\WorkoutCreateController::class,
 *          },
 *      },
 *      itemOperations={
 *          "get",
 *          "put"={
 *              "denormalizationContext"={"groups"={"update:workout"}},         
 *          },
 *          "delete",
 *      }
 * )
 */
class Workout
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:workout","read:techno","read:type","read:user"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"read:workout","create:workout","read:techno","read:type","read:user"})
     */
    private $name;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank
     * @Assert\Range(min = 0, max = 5, notInRangeMessage = "Your rating must be between {{ min }} and {{ max }} to make sense.")
     * @Groups({"read:workout","create:workout","read:techno","read:type","read:user"})
     */
    private $rating;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Groups({"read:workout","create:workout","read:techno","read:type","read:user"})
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Groups({"read:workout","create:workout","read:techno","read:type","read:user"})
     */
    private $doneAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="workouts",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read:workout","create:workout","read:techno","read:type"})
     */
    private $maker;

    /**
     * @ORM\ManyToOne(targetEntity=Techno::class, inversedBy="workouts",cascade={"persist"})
     * @Groups({"read:workout","create:workout","read:type","read:user"})
     */
    private $techno;

    /**
     * @ORM\ManyToMany(targetEntity=Type::class, inversedBy="workouts",cascade={"persist"})
     * @Groups({"read:workout","create:workout","read:techno","read:user"})
     */
    private $types;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDisplayed;

    public function __construct()
    {
        $this->types = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->isDisplayed = true;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDoneAt(): ?\DateTimeInterface
    {
        return $this->doneAt;
    }

    public function setDoneAt(\DateTimeInterface $doneAt): self
    {
        $this->doneAt = $doneAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getMaker(): ?User
    {
        return $this->maker;
    }

    public function setMaker(?User $maker): self
    {
        $this->maker = $maker;

        return $this;
    }

    public function getTechno(): ?Techno
    {
        return $this->techno;
    }

    public function setTechno(?Techno $techno): self
    {
        $this->techno = $techno;

        return $this;
    }

    /**
     * @return Collection|Type[]
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        $this->types->removeElement($type);

        return $this;
    }

    public function getIsDisplayed(): ?bool
    {
        return $this->isDisplayed;
    }

    public function setIsDisplayed(bool $isDisplayed): self
    {
        $this->isDisplayed = $isDisplayed;

        return $this;
    }
}
