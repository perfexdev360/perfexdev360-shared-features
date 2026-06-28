<?php

namespace Perfexdev360\SharedFeatures\Contracts;

interface AIGeneratorInterface
{
    /**
     * Generate a blog article based on a prompt.
     *
     * @param string $prompt
     * @return string|null
     */
    public function generateArticle(string $prompt): ?string;
}
