# IP API

## Live

* [brunoncosta.com](http://api.brunoncosta.com/ip/)

## Built With

* PHP
* IP Address Data from [IPInfo](https://ipinfo.io/)

## config.php
```php
return [
   "ip" => [
      "url" => "http://ipinfo.io/",
      "key" => "YOUR_KEY"
   ]
];
```

## Request GET 

```
?ip=xxx.xxx.xxx.xxx
```

## Response Data
```
ip
city
region
country
coordinates
postal
timezone
```

## Authors
* **Bruno Costa**
