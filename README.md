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

### Client usage

Elasticsearch client is available as a service:

```php
$client = $this->get('ulff_elasticsearch_php_client.client');
```

#### Create new index:

```php
$indexParams = new IndexParams('index-name', 'type-name', 'id');
$indexParams->setBody(['someField' => 'some value']);
$response = $client->index($indexParams);
```

Returns [IndexResponse](Model/IndexResponse.php) object.

#### Get document:

```php
$getParams = new GetParams('index-name', 'type-name', 'id');
$response = $client->get($getParams);
```

Returns [GetResponse](Model/GetResponse.php) object.

#### Delete document:

```php
$deleteParams = new DeleteParams('index-name', 'type-name', 'id');
$response = $client->delete($deleteParams);
```

Returns [DeleteResponse](Model/DeleteResponse.php) object.

#### Make search query:

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

#### Update document:

```php
$updateParams = new UpdateParams('index-name', 'type-name', 'id');
$updateParams->setBody(['someField' => 'some value']);
$response = $client->update($updateParams);
```

Returns [UpdateResponse](Model/UpdateResponse.php) object.

### Purger usage

Bundle offers a possibility to purge whole index (by deleting and recreating empty). This can be useful e.g. for
testing purposes.


There is a separate ```ulff_elasticsearch_php_client.purger``` service provided with the bundle.
Following example shows how to purge index:

```php
$purger = $this->get('ulff_elasticsearch_php_client.purger');
$purger->purgeIndex('index_name');
```

### Full Elasticsearch-PHP 2.0 documentation:

This bundle is a client for [Elasticsearch-PHP 2.0](https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/index.html).
Follow the documentation there.

## License

This bundle is licensed under the MIT license. Please, see the complete license in the bundle ```LICENSE``` file.
