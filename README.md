## Installation
composer.json add to the following lines
``` 
"repositories": [
        {
            "url": "git@github.com:Teknasyon/esim-core-client-sdk-php.git",
            "type": "git"
        }
    ],

``` 

``` 
composer require esim/esim-core-client-sdk-php@1.0.0
``` 

## Configuration
/config/bundles.php

``` 
return [
    ...
    eSIM\eSIMCoreClient\eSIMCoreBundle::class => ['all' => true],
    ...
];
```
config/packages/framework.yaml

```
    http_client:
        scoped_clients:
            eSIM_core_client:
                base_uri: '%env(resolve:ESIM_CORE_BASE_URL)%'
                timeout: 2.5
```
