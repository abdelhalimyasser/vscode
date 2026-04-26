<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\QuestionCategory;
use App\Model\Enums\QuestionDifficulty;

class Questions
{
    private int $id = 0;
    private ?string $questions = null;
    private ?string $description = null;
    private ?QuestionCategory $category = null;
    private ?string $recommendedBaseAnswer = null;
    private array $testCases = [];
    private ?QuestionDifficulty $difficulty = null;
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     *
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getQuestions(): ?string
    {
        return $this->questions;
    }

    /**
     *
     * @param string $questions
     */
    public function setQuestions(string $questions): void
    {
        $this->questions = $questions;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     *
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCategory(): ?QuestionCategory
    {
        return $this->category;
    }

    /**
     *
     * @param QuestionCategory $category
     */
    public function setCategory(QuestionCategory $category): void
    {
        $this->category = $category;
    }

    public function getRecommendedBaseAnswer(): ?string
    {
        return $this->recommendedBaseAnswer;
    }

    /**
     *
     * @param string $recommendedBaseAnswer
     */
    public function setRecommendedBaseAnswer(string $recommendedBaseAnswer): void
    {
        $this->recommendedBaseAnswer = $recommendedBaseAnswer;
    }

    public function getTestCases(): array
    {
        return $this->testCases;
    }

    /**
     *
     * @param array $testCases
     */
    public function setTestCases(array $testCases): void
    {
        $this->testCases = $testCases;
    }

    public function getDifficulty(): ?QuestionDifficulty
    {
        return $this->difficulty;
    }

    /**
     *
     * @param QuestionDifficulty $difficulty
     */
    public function setDifficulty(QuestionDifficulty $difficulty): void
    {
        $this->difficulty = $difficulty;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     *
     * @param \DateTimeImmutable $createdAt
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}