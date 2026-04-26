<?php

declare(strict_types=1);

namespace model;

use DateTimeImmutable;
use Exception;
use RuntimeException;

/**
 * Class
 *
 * Represents
 *
 * @package model
 * @author
 * @version 1.0
 * @since 27-04-2026
*/
class Feedback
{
    private int $id = 0;
    private int $solvedQuestions = 0;
    private ?mixed $problemSolving = null;
    private ?mixed $codeCleaning = null;
    private ?mixed $codeComplexity = null;
    private ?mixed $architecture = null;
    private ?mixed $selfConfidence = null;
    private ?mixed $communication = null;
    private int $total = 0;
    private ?mixed $normalizedScore = null;
    private bool $redFlag = false;
    private ?string $notes = null;
    private ?\DateTimeImmutable $createdAt = null;

    /***/
    public function __construct()
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSolvedQuestions(): int
    {
        return $this->solvedQuestions;
    }

    /**
     * @param int $solvedQuestions
     */
    public function setSolvedQuestions(int $solvedQuestions): void
    {
        $this->solvedQuestions = $solvedQuestions;
    }

    public function getProblemSolving(): ?mixed
    {
        return $this->problemSolving;
    }

    /**
     * @param mixed $problemSolving
     */
    public function setProblemSolving(mixed $problemSolving): void
    {
        $this->problemSolving = $problemSolving;
    }

    public function getCodeCleaning(): ?mixed
    {
        return $this->codeCleaning;
    }

    /**
     * @param mixed $codeCleaning
     */
    public function setCodeCleaning(mixed $codeCleaning): void
    {
        $this->codeCleaning = $codeCleaning;
    }

    public function getCodeComplexity(): ?mixed
    {
        return $this->codeComplexity;
    }

    /**
     * @param mixed $codeComplexity
     */
    public function setCodeComplexity(mixed $codeComplexity): void
    {
        $this->codeComplexity = $codeComplexity;
    }

    public function getArchitecture(): ?mixed
    {
        return $this->architecture;
    }

    /**
     * @param mixed $architecture
     */
    public function setArchitecture(mixed $architecture): void
    {
        $this->architecture = $architecture;
    }

    public function getSelfConfidence(): ?mixed
    {
        return $this->selfConfidence;
    }

    /**
     * @param mixed $selfConfidence
     */
    public function setSelfConfidence(mixed $selfConfidence): void
    {
        $this->selfConfidence = $selfConfidence;
    }

    public function getCommunication(): ?mixed
    {
        return $this->communication;
    }

    /**
     * @param mixed $communication
     */
    public function setCommunication(mixed $communication): void
    {
        $this->communication = $communication;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    public function getNormalizedScore(): ?mixed
    {
        return $this->normalizedScore;
    }

    /**
     * @param mixed $normalizedScore
     */
    public function setNormalizedScore(mixed $normalizedScore): void
    {
        $this->normalizedScore = $normalizedScore;
    }

    public function getRedFlag(): bool
    {
        return $this->redFlag;
    }

    /**
     * @param bool $redFlag
     */
    public function setRedFlag(bool $redFlag): void
    {
        $this->redFlag = $redFlag;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable $createdAt
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}