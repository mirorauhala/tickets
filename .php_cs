<?php
$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->exclude('bootstrap/cache')
    ->exclude('storage')
    ->exclude('node_modules')
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,

        // Replace short-echo <?= with long format <?php echo syntax.
        'no_short_echo_tag' => true,

        // Use short array syntax
        'array_syntax' => ['syntax' => 'short'],

        // Calling unset() on multiple items should be done in one call.
        'combine_consecutive_unsets' => true,

        // Class, trait and interface elements must be separated with one blank
        // line.
        'class_attributes_separation' => true,

        // Forbid multi-line whitespace before the closing semicolon or move the
        // semicolon to the new line for chained calls.
        'no_multiline_whitespace_before_semicolons' => true,

        // Convert double quotes to single quotes
        'single_quote' => true,

        // Space after not operator
        // ex: if(! stuff()) { // then }
        'not_operator_with_successor_space' => true,

        // Inline array must have whitespace after each comma
        'whitespace_after_comma_in_array' => true,

        // Trailing comma in multiline array
        'trailing_comma_in_multiline_array' => true,

        // Blank line on
        'blank_line_before_statement' => true,

        // Align multiline array lists
        'binary_operator_spaces' => [
            'align_double_arrow' => true,
            'align_equals'       => false,
        ],

        // Sort imports by length
        'ordered_imports' => [
            'sortAlgorithm' => 'length',
        ],

        // Concatenation should be spaced according configuration.
        'concat_space' => ['spacing' => 'one'],

        // Equal sign in declare statement should be surrounded by spaces or not
        // following configuration.
        'declare_equal_normalize' => true,

        // Add missing space between function's argument and its typehint.
        'function_typehint_space' => true,

        // Include/Require and file path should be divided with a single space.
        // File path should not be placed under brackets.
        'include' => true,

        // Cast should be written in lower case.
        'lowercase_cast' => true,

        // Removes extra blank lines and/or blank lines following configuration.
        'no_extra_blank_lines' => [
            'curly_brace_block',
            'extra',
            'parenthesis_brace_block',
            'square_brace_block',
            'throw',
            'use',
        ],

        // The namespace declaration line shouldn't contain leading whitespace.
        'no_leading_namespace_whitespace' => true,

        // Either language construct print or echo should be used.
        'no_mixed_echo_print' => ['use' => 'echo'],

        // Operator => should not be surrounded by multi-line whitespaces.
        'no_multiline_whitespace_around_double_arrow' => true,

        // Single-line whitespace before closing semicolon are prohibited.
        'no_singleline_whitespace_before_semicolons' => true,

        // There MUST NOT be spaces around offset braces.
        'no_spaces_around_offset' => true,

        // PHP single-line arrays should not have trailing comma.
        'no_trailing_comma_in_singleline_array' => true,

        // Removes unneeded parentheses around control statements.
        'no_unneeded_control_parentheses' => true,

        // Unused use statements must be removed.
        'no_unused_imports' => true,

        // In array declaration, there MUST NOT be a whitespace before each
        // comma.
        'no_whitespace_before_comma_in_array' => true,

        // Remove trailing whitespace at the end of blank lines.
        'no_whitespace_in_blank_line' => true,

        // Array index should always be written by using square braces.
        'normalize_index_brace' => true,

        // There should not be space before or after object T_OBJECT_OPERATOR ->
        'object_operator_without_whitespace' => true,

        // There should be exactly one blank line before a namespace declaration
        'single_blank_line_before_namespace' => true,

        // Standardize spaces around ternary operator.
        'ternary_operator_spaces' => true,

        // Arrays should be formatted like function/method arguments, without
        // leading or trailing single line space.
        'trim_array_spaces' => true,

        // Unary operators should be placed adjacent to their operands.
        'unary_operator_spaces' => true,
    ])
    ->setLineEnding("\n")
    ->setFinder($finder);
