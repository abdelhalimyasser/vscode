<?php

declare(strict_types=1);

namespace App\Model;

class QuestionsRepository
{
    /**
     * @param mixed $question
     */
    public function addQuestion(mixed $question): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param mixed $question
     */
    public function updateQuestion(mixed $question): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $id
     */
    public function deleteQuestionById(int $id): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function deleteQuestion(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param array $testcase
     */
    public function addTestCase(array $testcase): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param array $testcase
     */
    public function updateTestCase(array $testcase): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function deleteTestCase(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}