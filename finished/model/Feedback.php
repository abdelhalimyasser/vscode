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
 * @author Ali Samy
 * @version 1.0
 * @since 27-04-2026
*/
class Feedback
{
    private string $id;
    private int $solvedQuestions;
    private float $problemSolving;
    private float $codeCleaning;
    private float $codeComplexity;
    private float $architecture;
    private float $selfConfidence;
    private float $communication;
    private int $total;
    private float $normalizedScore;
    private bool $redFlag;
    private string $note;
    private DateTimeImmutable $createdAt;

    /**
     *  @param int $solvedQuestions
     * @param float $problemSolving
     * @param float $codeCleaning
     * @param float $codeComplexity
     * @param float $architecture
     * @param float $selfConfidence
     * @param float $communication
     * @param int $total
     * @param float $normalizedScore
     * @param bool $redFlag
     * @param string $note
     * @param DateTimeImmutable $createdAt
     * @throws Exception
    */
    public function __construct(
        int $solvedQuestions,
        float $problemSolving,
        float $codeCleaning,
        float $codeComplexity,
        float $architecture,
        float $selfConfidence,
        float $communication,
        int $total,
        float $normalizedScore,
        bool $redFlag,
        string $note,
        DateTimeImmutable $createdAt
        )
    {
        try{
            $this->id = uniqid('feedback_', true);
            $this->solvedQuestions = $solvedQuestions;
            $this->problemSolving = $problemSolving;
            $this->codeCleaning = $codeCleaning;
            $this->codeComplexity = $codeComplexity;
            $this->architecture = $architecture;
            $this->selfConfidence = $selfConfidence;
            $this->communication = $communication;
            $this->total = $total;
            $this->normalizedScore = $normalizedScore;
            $this->redFlag = $redFlag;
            $this->note = $note;
            $this->createdAt = new DateTimeImmutable();
        } catch (Exception $e) {
            throw new RuntimeException('Error creating feedback: ' . $e->getMessage(), 0, $e);
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

    public function getProblemSolving(): float
    {
        return $this->problemSolving;
    }

    /**
     * @param float $problemSolving
     */
    public function setProblemSolving(float $problemSolving): void
    {
        $this->problemSolving = $problemSolving;
    }

    public function getCodeCleaning(): float
    {
        return $this->codeCleaning;
    }

    /**
     * @param float $codeCleaning
     */
    public function setCodeCleaning(float $codeCleaning): void
    {
        $this->codeCleaning = $codeCleaning;
    }

    public function getCodeComplexity(): float
    {
        return $this->codeComplexity;
    }

    /**
     * @param float $codeComplexity
     */
    public function setCodeComplexity(float $codeComplexity): void
    {
        $this->codeComplexity = $codeComplexity;
    }

    public function getArchitecture(): float
    {
        return $this->architecture;
    }

    /**
     * @param float $architecture
     */
    public function setArchitecture(float $architecture): void
    {
        $this->architecture = $architecture;
    }

    public function getSelfConfidence(): float
    {
        return $this->selfConfidence;
    }

    /**
     * @param float $selfConfidence
     */
    public function setSelfConfidence(float $selfConfidence): void
    {
        $this->selfConfidence = $selfConfidence;
    }

    public function getCommunication(): float
    {
        return $this->communication;
    }

    /**
     * @param float $communication
     */
    public function setCommunication(float $communication): void
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

    public function getNormalizedScore(): float
    {
        return $this->normalizedScore;
    }

    /**
     * @param float $normalizedScore
     */
    public function setNormalizedScore(float $normalizedScore): void
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

    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
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