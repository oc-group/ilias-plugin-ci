<?php

namespace PluginStandard\Sniffs\Files;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class FileNamePrefixSniff implements Sniff
{
    public function register()
    {
        return [T_OPEN_TAG];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $fileName = basename($phpcsFile->getFileName(), '.php');

        $tokens = $phpcsFile->getTokens();
        $classToken = $phpcsFile->findNext(T_CLASS, 0);
        $classNameToken = $phpcsFile->findNext(T_STRING, $classToken);
        $className = $tokens[$classNameToken]['content'];

        if (strpos($fileName, 'class.' . $className) !== 0) {
            $error = 'File name "%s" must start with "class.%s"';
            $data = [$fileName, $className];
            $phpcsFile->addError($error, $stackPtr, 'FileNamePrefix', $data);
        }
    }
}
