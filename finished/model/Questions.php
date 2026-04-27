<?php

declare(strict_types=1);

namespace model;

use DateTimeImmutable;
use Exception;
use RuntimeException;
use enum\QuestionCategory;
use enum\QuestionDifficulty;

/**
 * Class
 *
 * Represents
 *
 * @package model
 * @author Ali Samy
 * @version 1.0
 * @since 27-04-2026
*/
class Questions
{
    private string $id;
    private string $questions;
    private string $description;
    private QuestionCategory $category;
    private string $recommendedBaseAnswer;
    private array $testCases = [];
    private QuestionDifficulty $difficulty;
    private DateTimeImmutable $createdAt;

    /***/
    public function __construct(
        string $questions,
        string $description,
        QuestionCategory $category,
        string $recommendedBaseAnswer,
        array $testCases,
        QuestionDifficulty $difficulty,
        DateTimeImmutable $createdAt
    ) {
        try {
            $this->id = uniqid('question_', true);
            $this->questions = $questions;
            $this->description = $description;
            $this->category = $category;
            $this->recommendedBaseAnswer = $recommendedBaseAnswer;
            $this->testCases = $testCases;
            $this->difficulty = $difficulty;
            $this->createdAt = new DateTimeImmutable();
        } catch (Exception $e) {
            throw new RuntimeException('Error creating question: ' . $e->getMessage(), 0, $e);
        }
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getQuestions(): string
    {
        return $this->questions;
    }

    /**
     * @param string $questions
     */
    public function setQuestions(string $questions): void
    {
        $this->questions = $questions;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCategory(): QuestionCategory
    {
        return $this->category;
    }

    /**
     * @param QuestionCategory $category
     */
    public function setCategory(QuestionCategory $category): void
    {
        $this->category = $category;
    }

    public function getRecommendedBaseAnswer(): string
    {
        return $this->recommendedBaseAnswer;
    }

    /**
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
     * @param array $testCases
     */
    public function setTestCases(array $testCases): void
    {
        $this->testCases = $testCases;
    }

    public function getDifficulty(): QuestionDifficulty
    {
        return $this->difficulty;
    }

    /**
     * @param QuestionDifficulty $difficulty
     */
    public function setDifficulty(QuestionDifficulty $difficulty): void
    {
        $this->difficulty = $difficulty;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable $createdAt
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}