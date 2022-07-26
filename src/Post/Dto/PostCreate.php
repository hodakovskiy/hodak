<?php

/**
 * Description of Post
 *
 * @author Sergey Hodakovskiy <hodakovskiy@gmail.com>
 */
class PostCreate
{

  private $id;

  /**
   * @Assert\NotBlank()
   * @Assert\Length(
   *      max = 255,
   *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
   * )
   */
  private $title;
    /**
   * @Assert\NotBlank()
   * @Assert\Length(
   *      max = 500,
   *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
   * )
   */
  private $summary;
    /**
   * @Assert\NotBlank()
   * @Assert\Length(
   *      max = 1000,
   *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
   * )
   */
  private $content;
  private $author;

  public function __construct() {
    $this->author = new ArrayCollection();
  }

  public function getId(): ?int {
    return $this->id;
  }

  public function getTitle(): ?string {
    return $this->Title;
  }

  public function setTitle(?string $Title): self {
    $this->Title = $Title;

    return $this;
  }

  public function getSummary(): ?string {
    return $this->summary;
  }

  public function setSummary(string $summary): self {
    $this->summary = $summary;

    return $this;
  }

  public function getContent(): ?string {
    return $this->content;
  }

  public function setContent(string $content): self {
    $this->content = $content;

    return $this;
  }

  /**
   * @return Collection|User[]
   */
  public function getAuthor(): Collection {
    return $this->author;
  }

  public function addAuthor(User $author): self {
    if (!$this->author->contains($author)) {
      $this->author[] = $author;
      $author->setPost($this);
    }

    return $this;
  }

  public function removeAuthor(User $author): self {
    if ($this->author->removeElement($author)) {
      // set the owning side to null (unless already changed)
      if ($author->getPost() === $this) {
        $author->setPost(null);
      }
    }

    return $this;
  }

}
