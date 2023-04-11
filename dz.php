<?php

if (isset($_GET['url'])) {
    $path = $_GET['url'];
} else {
    $path = $_SERVER['DOCUMENT_ROOT'];
}

$splObjects = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($path),
    RecursiveIteratorIterator::CHILD_FIRST,
    false
);

$realPath = realpath('.');

foreach ($splObjects as $splObject) {

    $getPath = explode($path . '/', $splObject);
    $currentPath = implode($getPath);

    if ($splObject->getFileName() !== '.') {

        if (
            $path != '/'
            && $currentPath == $splObject->getFileName()
            && $splObject->getFileName() !== 'index.php'
            && $splObject->getFileName() !== '.htaccess'
            && $splObject->getFileName() !== '.DS_Store'
        ) {

            $url = '/?url=' . $splObject->getFileName();

            if ($realPath !== $path) {

                $url = '/?url=' . $path . '/' . $splObject->getFileName();


                if ($splObject->getFileName() == '..') {

                    $parseUrl = explode('/', $path);
                    array_pop($parseUrl);
                    if ($parseUrl) {

                        $url = '/?url=' . implode('/', $parseUrl);
                    } else {

                        $url = '/';
                    }
                };
            } else {

                if ($splObject->getFileName() == '..') {
                    $url = '#';
                }
            }

            if ($splObject->isFile()) {
                echo $splObject->getFileName() . '<br>';
            } else {
                echo "<a href='{$url}'>{$splObject->getFileName()}</a><br>";
            }
        }
    }
}
