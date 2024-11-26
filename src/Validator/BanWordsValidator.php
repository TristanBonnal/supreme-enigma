<?php

namespace App\Validator;

use Override;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class BanWordsValidator extends ConstraintValidator
{
    private array $words = [
        'dumb',
        'stupid',
        'idiot',
    ];
    #[Override]
    public function validate($value, Constraint $constraint): void
    {
        /* @var App\Validator\BanWords $constraint */

        if (null === $value || '' === $value) {
            return;
        }

        foreach ($this->words as $word) {
            if (stripos((string) $value, (string) $word) !== false) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ banWord }}', $word)
                    ->addViolation();
                return;
            }
        }
    }
}
