<?php

declare(strict_types=1);

namespace App\Model;

class Skill
{
    private int $id = 0;
    private array $skillName = [];

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

    public function getSkillName(): array
    {
        return $this->skillName;
    }

    /**
     *
     * @param array $skillName
     */
    public function setSkillName(array $skillName): void
    {
        $this->skillName = $skillName;
    }
}