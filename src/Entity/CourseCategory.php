<?php

namespace App\Entity;

use App\Repository\CourseCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseCategoryRepository::class)
 */
class CourseCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $src;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="listOwned")
     */
    private $userOwner;

    /**
     * @ORM\OneToMany(targetEntity=CourseList::class, mappedBy="categoryReference")
     */
    private $createdList;

    public function __construct()
    {
        $this->createdList = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(?string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getUserOwner(): ?User
    {
        return $this->userOwner;
    }

    public function setUserOwner(?User $userOwner): self
    {
        $this->userOwner = $userOwner;

        return $this;
    }

    /**
     * @return Collection|CourseList[]
     */
    public function getCreatedList(): Collection
    {
        return $this->createdList;
    }

    public function addCreatedList(CourseList $createdList): self
    {
        if (!$this->createdList->contains($createdList)) {
            $this->createdList[] = $createdList;
            $createdList->setCategoryReference($this);
        }

        return $this;
    }

    public function removeCreatedList(CourseList $createdList): self
    {
        if ($this->createdList->removeElement($createdList)) {
            // set the owning side to null (unless already changed)
            if ($createdList->getCategoryReference() === $this) {
                $createdList->setCategoryReference(null);
            }
        }

        return $this;
    }
}
