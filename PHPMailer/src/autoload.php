<?php

/**
 * Função autoload PSR-4
 * Carrega automaticamente classes baseadas em seus namespaces e diretórios.
 *
 * @param string $class Nome completo da classe (com namespace).
 */
spl_autoload_register(function ($class) {
    // Define o namespace base para o projeto
    $prefix = '';

    // Diretório base onde estão as classes do projeto
    $base_dir = __DIR__ . '/src/';

    // Verifica se a classe usa o namespace base
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // Se a classe não usar o namespace base, retorna sem carregar nada
        return;
    }

    // Pega o nome relativo da classe
    $relative_class = substr($class, $len);

    // Substitui os separadores de namespace por separadores de diretório
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // Verifica se o arquivo existe e o inclui
    if (file_exists($file)) {
        require $file;
    }
});
