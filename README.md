## Installation
``` 
composer require esim/esim-core-client-sdk-php@1.0.0
``` 

## Configuration
/config/bundles.php

``` 
return [
    ...
    Esim\eSIMCoreClient\eSimCoreBundle::class => ['all' => true],
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
