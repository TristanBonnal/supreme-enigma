<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class BanWordsValidator extends ConstraintValidator
{
    private array $words = [
        'dumb',
        'stupid',
        'idiot',
    ];
    public function validate($value, Constraint $constraint)
    {
        /* @var App\Validator\BanWords $constraint */

        if (null === $value || '' === $value) {
            return;
        }

        foreach ($this->words as $word) {
            if (stripos($value, $word) !== false) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ banWord }}', $word)
                    ->addViolation();
                return;
            }
        }
    }
}
