<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->exclude('bootstrap/cache')
    ->exclude('storage')
    ->exclude('node_modules')
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setRules([
        // Ruleset documentation
        // https://github.com/FriendsOfPHP/PHP-CS-Fixer

        // PSR2 ruleset
        '@PSR2' => true,

        // Ensure there is no code on the same line as the PHP open tag and it
        // is followed by a blank line.
        'blank_line_after_opening_tag' => true,

        // There MUST be one blank line after the namespace declaration.
        'blank_line_after_namespace' => true,

        // The body of each structure MUST be enclosed by braces. Braces should
        // be properly placed. Body of braces should be properly indented.
        'braces' => [
            'allow_single_line_closure' => false,
            'position_after_anonymous_constructs' => 'same',
            'position_after_control_structures' => 'same',
            'position_after_functions_and_oop_constructs' => 'next',
        ],

        // Concatenation should be spaced according configuration.
        'concat_space' => [
            'spacing' => 'one',
        ],

        // Operator => should not be surrounded by multi-line whitespaces.
        'no_multiline_whitespace_around_double_arrow' => false,

        // Remove useless semicolon statements.
        'no_empty_statement' => true,

        // The keyword elseif should be used instead of else if so that all
        // control keywords look like single words.
        'elseif' => true,

        // A return statement wishing to return void should not return null.
        'simplified_null_return' => true,

        // PHP code MUST use only UTF-8 without BOM (remove BOM).
        'encoding' => true,

        // A PHP file without end tag must always end with a single empty line
        // feed.
        'single_blank_line_at_eof' => true,

        // When making a method or function call, there MUST NOT be a space
        // between the method or function name and the opening parenthesis.
        'no_spaces_after_function_name' => true,

        // Spaces should be properly placed in a function declaration.
        'function_declaration' => [
            'closure_function_spacing' => 'one',
        ],

        // Include/Require and file path should be divided with a single space.
        //File path should not be placed under brackets.
        'include' => true,

        // Code MUST use configured indentation type.
        'indentation_type' => true,

        // Master functions shall be used instead of aliases.
        'no_alias_functions' => [
            'sets' => ['@internal', '@IMAP'],
        ],

        // All PHP files must use same line ending.
        'line_ending' => true,

        // Remove trailing commas in list function calls.
        'no_trailing_comma_in_list_call' => true,

        // Logical NOT operators (!) should have one trailing whitespace.
        'not_operator_with_successor_space' => true,

        // The PHP constants true, false, and null MUST be in lower case.
        'lowercase_constants' => true,

        // PHP keywords MUST be in lower case.
        'lowercase_keywords' => true,

        'align_multiline_comment' => [
            'comment_type' => 'all_multiline',
        ],

        // In method arguments and method call, there MUST NOT be a space before
        // each comma and there MUST be one space after each comma. Argument
        // lists MAY be split across multiple lines, where each subsequent line
        // is indented once. When doing so, the first item in the list MUST be
        // on the next line, and there MUST be only one argument per line.
        'method_argument_space' => [
            'after_heredoc' => false,
            'ensure_fully_multiline' => true,
            'keep_multiple_spaces_after_comma' => false,
            'on_multiline' => 'ignore',
        ],

        // PHP multi-line arrays should have a trailing comma.
        'trailing_comma_in_multiline_array' => [
            'after_heredoc' => false,
        ],

        // Forbid multi-line whitespace before the closing semicolon or move the
        // semicolon to the new line for chained calls.
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line',
        ],

        // There MUST be one use keyword per declaration.
        'single_import_per_statement' => true,

        // The namespace declaration line shouldn't contain leading whitespace.
        'no_leading_namespace_whitespace' => true,

        // There should be no empty lines after class opening brace.
        'no_blank_lines_after_class_opening' => true,

        // There should not be blank lines between docblock and the documented
        // element.
        'no_blank_lines_after_phpdoc' => true,

        // There should not be space before or after object T_OBJECT_OPERATOR ->
        'object_operator_without_whitespace' => true,

        // There MUST NOT be a space after the opening parenthesis. There MUST
        // NOT be a space before the closing parenthesis.
        'no_spaces_inside_parenthesis' => true,

        // Docblocks should have the same indentation as the documented subject.
        'phpdoc_indent' => true,

        // Fix PHPDoc inline tags, make @inheritdoc always inline.
        'phpdoc_inline_tag' => true,

        // @access annotations should be omitted from PHPDoc.
        'phpdoc_no_access' => true,

        // @package and @subpackage annotations should be omitted from PHPDoc.
        'phpdoc_no_package' => true,

        // Scalar types should always be written in the same form. int not
        // integer, bool not boolean, float not real or double.
        'phpdoc_scalar' => [
            'types' => ['boolean', 'double', 'integer', 'real', 'str'],
        ],

        // PHPDoc summary should end in either a full stop, exclamation mark,
        // or question mark.
        'phpdoc_summary' => true,

        // Docblocks should only be used on structural elements.
        'phpdoc_to_comment' => true,

        // PHPDoc should start and end with content, excluding the very first
        // and last line of the docblocks.
        'phpdoc_trim' => true,

        // No alias PHPDoc tags should be used.
        'phpdoc_no_alias_tag' => [
            'replacements' => [
                'type' => 'var',
            ],
        ],

        // @var and @type annotations should not contain the variable name.
        'phpdoc_var_without_name' => true,

        // Remove leading slashes in use clauses.
        'no_leading_import_slash' => true,

        // An empty line feed must precede any configured statement.
        'blank_line_before_statement' => [
            'statements' => ['return'],
        ],

        // Inside class or interface element self should be preferred to the
        // class name itself.
        // Risky rule: risky when using dynamic calls like get_called_class() or
        // late static binding.
        'self_accessor' => true,

        // PHP arrays should be declared using the configured syntax.
        'array_syntax' => ['syntax' => 'short'],

        // Replace short-echo <?= with long format <?php echo syntax.
        'no_short_echo_tag' => true,

        // PHP code must use the long <?php tags or short-echo <?= tags and not
        // other tag variations.
        'full_opening_tag' => true,

        // PHP single-line arrays should not have trailing comma.
        'no_trailing_comma_in_singleline_array' => true,

        // There should be exactly one blank line before a namespace declaration
        'single_blank_line_before_namespace' => true,

        // Each namespace use MUST go on its own line and there MUST be one
        // blank line after the use statements block.
        'single_line_after_imports' => true,

        // Convert double quotes to single quotes for simple strings.
        'single_quote' => [
            'strings_containing_single_quote_chars' => false,
        ],

        // Single-line whitespace before closing semicolon are prohibited.
        'no_singleline_whitespace_before_semicolons' => true,

        // A single space or none should be between cast and variable.
        'cast_spaces' => [
            'space' => 'single',
        ],

        // Replace all <> with !=.
        'standardize_not_equals' => true,

        // Standardize spaces around ternary operator.
        'ternary_operator_spaces' => true,

        // Remove trailing whitespace at the end of non-blank lines.
        'no_trailing_whitespace' => true,

        // Arrays should be formatted like function/method arguments, without
        // leading or trailing single line space.
        'trim_array_spaces' => true,

        'array_indentation' => true,

        // Binary operators should be surrounded by space as configured.
        'binary_operator_spaces' => [
            'operators' => [
                '=' => 'single_space',
                '=>' => 'align',
                '==' => 'align',
            ],
        ],

        // Unused use statements must be removed.
        'no_unused_imports' => true,

        // Visibility MUST be declared on all properties and methods; abstract
        // and final MUST be declared before the visibility; static MUST be
        // declared after the visibility.
        'visibility_required' => true,

        // Remove trailing whitespace at the end of blank lines.
        'no_whitespace_in_blank_line' => true,

        // Calling unset on multiple items should be done in one call.
        'combine_consecutive_unsets' => true,

        // In array declaration, there MUST be a whitespace after each comma.
        'whitespace_after_comma_in_array' => true,

        // Ordering use statements.
        'ordered_imports' => [
            'sortAlgorithm' => 'length',
        ],

        // Equal sign in declare statement should be surrounded by spaces or not
        // following configuration.
        'declare_equal_normalize' => [
            'space' => 'single',
        ],

        // Ensure single space between function's argument and its typehint.
        'function_typehint_space' => true,

        // Cast should be written in lower case.
        'lowercase_cast' => true,

        // Removes extra blank lines and/or blank lines following configuration.
        'no_extra_blank_lines' => [
            'tokens' => [
                'curly_brace_block',
                'extra',
                'parenthesis_brace_block',
                'square_brace_block',
                'throw',
                'use',
            ],
        ],

        // Either language construct print or echo should be used.
        'no_mixed_echo_print' => [
            'use' => 'echo',
        ],

        // There MUST NOT be spaces around offset braces.
        'no_spaces_around_offset' => true,

        // Removes unneeded parentheses around control statements.
        'no_unneeded_control_parentheses' => [
            'statements' => [
                'break',
                'clone',
                'continue',
                'echo_print',
                'return',
                'switch_case',
                'yield',
            ],
        ],

        // In array declaration, there MUST NOT be a whitespace before each
        // comma.
        'no_whitespace_before_comma_in_array' => [
            'after_heredoc' => false,
        ],

        // Array index should always be written by using square braces.
        'normalize_index_brace' => true,

        // Unary operators should be placed adjacent to their operands.
        'unary_operator_spaces' => true,
    ])
    ->setLineEnding("\n")
    ->setRiskyAllowed(true)
    ->setUsingCache(false)
    ->setFinder($finder);
