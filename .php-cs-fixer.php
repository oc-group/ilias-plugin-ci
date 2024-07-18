<?php

/**
 * Custom PHP-CS-Fixer ruleset for ILIAS Plugins.
 */

$finder = PhpCsFixer\Finder::create()
    ->in('../classes');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        'strict_param' => false,
        'cast_spaces' => true,
        'concat_space' => ['spacing' => 'one'],
        'function_typehint_space' => true,
        'array_syntax' => ['syntax' => 'short'],
        'combine_consecutive_unsets' => true,
        'combine_consecutive_issets' => true,
        'no_extra_blank_lines' => [
            'tokens' => [
                'continue',
                'extra',
                'throw',
                'use',
                'parenthesis_brace_block',
                'square_brace_block',
                'curly_brace_block',
            ],
        ],
        'echo_tag_syntax' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_imports' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'no_superfluous_phpdoc_tags' => false,
        'phpdoc_order' => true,
        'align_multiline_comment' => true,
    ])
    ->setFinder($finder);
