# [Magento Instruções]

* Criação de modulo
    - Crie a pasta code em /app
    - Crie uma pasta Vendo dentro da pasta code.
        - A estrutura do magento sempre é app/code/Vendor/Module
    - Dentro da pasta Vendor deverá ser criado as pastas de seu module
    - Dentro da pasta module sempre deverá ter os seguintes arquivos
        \- Vendor
            \- Module
                \- etc
                    \- module.xml
                \- registration.php

        Sempre esta estrutura
    - Para criar tabela basta criar a pasta Setup dentro do modulo e nela criar o arquivo InstallSchema.php
    - Crie os campo dentro da class e ao final rode os seguintes comandos
        Este comando irá habilitar o modulo q acabou de criar
        ```bash
            php bin/magento module:enable Seu_Modulo
        ```

        Este irá registrar seu modulo na tabela setup_module. Lembre de sempre verificar a versão do module quando realizar alterações na tabela.
        ```bash
            php bin/magento setup:upgrade
        ```

        Este comando irá registrar a tabela no banco de dados.
        ```bash
            php bin/magento setup:static-content:deploy -f
        ```
    
    - Para injetar informações via class na tabela pela api graphql:


        