<?php

namespace Vatih\Nusantara;

use InvalidArgumentException;

class Helper
{

    public static function resolvePath(string $path): string
    {
        return preg_replace("/\\|\//", DIRECTORY_SEPARATOR, $path);
    }

    public static function removeFileOrDirectory(string $path)
    {
        if (!file_exists($path)) {
            // Jik path tidak ada, anggap sudah terhapus
            return;
        }

        if (is_file($path)) {
            return unlink($path);
        }

        // Recursive delete for directory
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($iterator as $file) {
            if ($file->isDir()) {
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }

        return rmdir($path);
    }

    public static function isWindows()
    {
        return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
    }

    /**
     * Convert text to Title Case
     * Example: "KOTA DEPOK" => "Kota Depok"
     * Handles special prefixes like "KAB.", "KABUPATEN", "KOTA", etc.
     */
    public static function toTitleCase(string $text): string
    {
        // Convert to lowercase first
        $text = mb_strtolower($text, 'UTF-8');

        // Convert to title case
        $text = mb_convert_case($text, MB_CASE_TITLE, 'UTF-8');

        // Fix common Indonesian administrative prefixes
        $prefixes = [
            'Kabupaten ' => 'Kabupaten ',
            'Kota ' => 'Kota ',
            'Kab. ' => 'Kab. ',
        ];

        // Fix Roman numerals (commonly used in Indonesian names)
        $text = preg_replace_callback('/\b(i{1,3}|iv|vi{0,3}|ix|x)\b/i', function ($matches) {
            return strtoupper($matches[0]);
        }, $text);

        return $text;
    }
}
