# IP API

## Live

* [brunoncosta.com](http://api.brunoncosta.com/ip/)

## Built With

* PHP
* IP Data from [IPInfo](https://ipinfo.io/)

## config.php
```php
return [
   "ip" => [
      "url" => "http://ipinfo.io/",
      "key" => "YOUR_KEY"
   ]
];
```

## GET Request  

```
?ip=YOUR_IP
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
