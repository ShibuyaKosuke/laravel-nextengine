#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

$files = glob('./src/*.php');

$result = [];

function getComment($string)
{
    $comment = sscanf($string, '/** * %s');
    return $comment[0];
}

foreach ($files as $file) {
    $pathinfo = pathinfo($file);
    $class_name = sprintf('\\ShibuyaKosuke\\LaravelNextEngine\\%s', $pathinfo['filename']);
    $class = new ReflectionClass($class_name);

    $class_comment = $class->getDocComment();
    $comment = getComment($class_comment);

    if (preg_match('/^[a-zA-Z]+$/', $comment)) {
        continue;
    }

    $temp_method = [];

    $methods = $class->getMethods();
    foreach ($methods as $method) {
        $method->getDocComment();
        $method_comment = getComment($method->getDocComment());
        $temp_method[] = [
            'return' => $method->hasReturnType() ? explode('\\', $method->getReturnType()->getName())[2] : null,
            'class' => '\\NextEngine',
            'name' => $method->getName(),
            'arguments' => implode(', ', array_map(function (ReflectionParameter $parameter) {
                $default = '';
                if ($parameter->isDefaultValueAvailable()) {
                    $def = $parameter->getDefaultValue();
                    if ($def === null) {
                        $default = '= null';
                    } elseif ($def === []) {
                        $default = '= []';
                    } else {
                        $default = $parameter->getDefaultValue();
                    }
                }
                return implode(' ', [
                    'type' => ($parameter->hasType()) ? $parameter->getType()->getName() : null,
                    'name' => '$' . $parameter->getName(),
                    'default' => $default
                ]);
            }, $method->getParameters())),
            'comment' => $method_comment
        ];
    }

    $result[] = [
        'class' => $class_name,
        'comment' => $comment,
        'methods' => $temp_method
    ];
}

$markdown = [];
foreach ($result as $class) {

    $markdown[] = '## ' . $class['comment'];
    foreach ($class['methods'] as $method) {
        $markdown[] = '';
        $markdown[] = '##### ' . $method['comment'];
        $markdown[] = '';
        $markdown[] = '```php';
        $markdown[] = sprintf('%s::%s(%s): %s',
            $method['class'],
            $method['name'],
            $method['arguments'],
            $method['return']
        );
        $markdown[] = '```';
    }
    $markdown[] = '';
}

$contemts = implode(PHP_EOL, $markdown);
file_put_contents('text.md', $contemts);

