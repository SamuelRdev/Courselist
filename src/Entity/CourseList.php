<?php

namespace App\Entity;

use App\Repository\CourseListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseListRepository::class)
 */
class CourseList
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
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $src;

    /**
     * @ORM\ManyToOne(targetEntity=CourseCategory::class, inversedBy="createdList")
     */
    private $categoryReference;

    /**
     * @ORM\OneToMany(targetEntity=ListContent::class, mappedBy="listReference")
     */
    private $listContent;

    public function __construct()
    {
        $this->listContent = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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

    public function getCategoryReference(): ?CourseCategory
    {
        return $this->categoryReference;
    }

    public function setCategoryReference(?CourseCategory $categoryReference): self
    {
        $this->categoryReference = $categoryReference;

        return $this;
    }

    /**
     * @return Collection|ListContent[]
     */
    public function getListContent(): Collection
    {
        return $this->listContent;
    }

    public function addListContent(ListContent $listContent): self
    {
        if (!$this->listContent->contains($listContent)) {
            $this->listContent[] = $listContent;
            $listContent->setListReference($this);
        }

        return $this;
    }

    public function removeListContent(ListContent $listContent): self
    {
        if ($this->listContent->removeElement($listContent)) {
            // set the owning side to null (unless already changed)
            if ($listContent->getListReference() === $this) {
                $listContent->setListReference(null);
            }
        }

        return $this;
    }
}
