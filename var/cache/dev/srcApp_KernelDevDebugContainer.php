<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerCxDZqJN\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerCxDZqJN/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerCxDZqJN.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerCxDZqJN\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerCxDZqJN\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'CxDZqJN',
    'container.build_id' => 'fbba6947',
    'container.build_time' => 1623747315,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerCxDZqJN');