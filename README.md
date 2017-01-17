# jeffreymoelands/overheid-io

This package provides a library for using overheid-io API.

API documents can be found on [https://overheid.io/documentatie](https://overheid.io/documentatie).
This API requires authentication, you get an API key by registering on the website.

Installation
----


Install using composer: 

```
composer require jeffreymoelands/overheid-io
```

Usage
----

After installation, you can inject the OverheidIo in your project to access all the resources:

```php
use Jeffreymoelands\OverheidIo;

$overheid = new OverheidIo($api_key);
```

Or you can access each resource by initiating them directly:
```php
// init voertuig resource
use Jeffreymoelands\OverheidIo\Recources\Voertuig;
$voertuig = new Voertuig($api_key);

// init kvk resource
use Jeffreymoelands\OverheidIo\Recources\Kvk;
$voertuig = new Kvk($api_key);

// init bag resource
use Jeffreymoelands\OverheidIo\Recources\Bag;
$voertuig = new Bag($api_key);
```

Resource Voertuig
----
```php
$overheid = new OverheidIo($api_key);

// get car information by licence plate
$response = $overheid->voertuig()->get('76-GP-LH');

// search for car information (for applying filters see section filtering below)
$response = $overheid->voertuig()->search();

```

Resource Bag
----
```php
$overheid = new OverheidIo($api_key);

// get bag information by bag id
$response = $overheid->bag()->get('3015ba-nieuwe-binnenweg-10-a');

// search for bag information (for applying filter see section filtering below)
$response = $overheid->bag()->search();

// suggest function can used for autocomplete purposes 
$response = $overheid->bag()->suggest('Valken');

```

Resource KVK
----
```php
$overheid = new OverheidIo($api_key);

// get kvk information by dossier number and subdossier number
$response = $overheid->kvk()->get('22063560', '0000');

// search for kvk information (for applying filter see section filtering below)
$response = $overheid->kvk()->search();

// suggest function can used for autocomplete purposes 
$response = $overheid->kvk()->suggest('Valken');

```

Filtering
----
For filtering in the search functions of each resource you can call the next filter functions:  

```php
// for example we create the vervoer resource directly
use Jeffreymoelands\OverheidIo\Recources\Voertuig;
$voertuig = new Voertuig($api_key);

// filter for 100 items
$voertuig->size(100);

// filter for page 1
$voertuig->page(1);

// set ordering
$voertuig->order(100);

// add the fields merk and eerstkleur
$voertuig->fields(['merk', 'eerstekleur']);

// filters for bmw
$voertuig->filter(['merk' => 'BMW']);

// query for car brand ending with laren
$voertuig->query('*laren');

// apply query on the merk field
$voertuig->query(['merk']);

// search for cars by calling the search function:
$voertuig->search();

```