# ElasticsearchPhpClientBundle


## Setting up bundle

### Step 1: Install bundle

Install bundle using [composer](https://getcomposer.org):

```
php composer.phar require "ulff/elasticsearch-php-client-bundle:dev-master"
```

Enable the bundle in AppKernel.php:

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = [
        // ...
        new Ulff\ElasticsearchPhpClientBundle\UlffElasticsearchPhpClientBundle(),
    ];

    // ...
}
```

### Step 2: add bundle configuration

Add following configuration to config.yml:

```yaml
# app/config/config.yml

ulff_elasticsearch_php_client:
    elastic_host: "localhost"
    elastic_port: "9200"
```

Replace values with proper ones.

## Usage

Elasticsearch client is available as a service:

```php
$client = $this->get('ulff_elasticsearch_php_client.client');
```

Create new index:

```php
$indexParams = new IndexParams('index-name', 'type-name', 'id');
$indexParams->setBody(['someField' => 'some value']);
$response = $client->index($indexParams);
```

Make search query:

```php
$searchParams = new SearchParams('index-name', 'type-name');
$searchParams->setBody([
    'query' => [
        'match' => [
            'someField' => 'some value'
        ]
    ]
]);
$response = $client->search($searchParams);
```

### Full Elasticsearch-PHP 2.0 documentation:

This bundle is a client for [Elasticsearch-PHP 2.0](https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/index.html).
Follow the documentation there.

## License

This bundle is licensed under the MIT license. Please, see the complete license in the bundle ```LICENSE``` file.