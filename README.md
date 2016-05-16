# pKit

pKit, also called phpKit, is a small library for PHP projects. 

You can find its documentation [here](http://iexit1337.github.io/pkit/index.html).

It includes

  - M(odel) - V(iew) - C(ontroller) - System
  - Routing
  - Sessions
  - Password Hashing

Planned stuff:

- JSON Helpers
- Language System
- Plugin System

## Useful stuff
### Routing
> The routing allows you to set variables. You can decide between integers, floats, strings, booleans and base64-code. 
> The following code is how a variable in the url-pattern looks like

```php
new Route('/{variableType:variableName}', IRoute ...);
```
> Examples:

```php
new Route('/{int:number1}', IRoute ...); // Your variable name is "number1" that has an integer as value.
new Route('/{float:decimalNumber}', IRoute ...); // Your variable name is "decimalNumber" that has an float as value.
new Route('/{string:text}', IRoute ...); // Your variable name is "text" that has an string as value.
new Route('/{bool:trueOrFalse}', IRoute ...); // Your variable name is "trueOrFalse" that has an boolean as value.
new Route('/{base64:decodedBase64Code}', IRoute ...); // Your variable name is "decodedBase64Code" that has a decoded base64 code as value.
```
>Of course you can use more than one parameter in an url (example for a calculator via URL):

```php
new Route('/calc/{int:number1}/{int:numer2}', IRoute ...);
```

## Version
>0.1

License
----

>MIT
