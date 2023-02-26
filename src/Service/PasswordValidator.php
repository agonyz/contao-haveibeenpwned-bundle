<?php

declare(strict_types=1);

/*
 * This file is part of agonyz/contao-haveibeenpwned-bundle.
 *
 * (c) agonyz
 *
 * @license LGPL-3.0-or-later
 */

namespace Agonyz\ContaoHaveIBeenPwnedBundle\Service;

use Symfony\Component\Validator\Constraints\NotCompromisedPassword;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PasswordValidator
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function isPasswordLeaked(string $password): bool
    {
        $constraints = [
            new NotCompromisedPassword(),
        ];

        $violations = $this->validator->validate($password, $constraints);

        if ($violations->count() <= 0) {
            return false;
        }

        return true;
    }
}
