<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class BanWords extends Constraint
{

    public $message = 'Le mot "{{ banWord }}" est banni. Merci de bien vouloir corriger votre message.';
}
