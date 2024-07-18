<?php

namespace MyCustomStandard\Sniffs\Classes;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class ClassNamePrefixSniff implements Sniff
{
    public function register()
    {
        return [T_CLASS];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $classNameToken = $phpcsFile->findNext(T_STRING, $stackPtr);
        $className = $tokens[$classNameToken]['content'];

        if (strpos($className, 'il') !== 0) {
            $error = 'Class name "%s" must start with "il"';
            $data = [$className];
            $phpcsFile->addError($error, $stackPtr, 'ClassNamePrefix', $data);
        }
    }
}
