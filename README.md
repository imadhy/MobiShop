# MobiShop
Client - E-commerce Website using Web Services (soap - php)

This is a simple website to call a Web Service using SOAP in PHP.

For now this website is able to :

+ List all products from the Supplier
+ Add product to cart
+ List all products in cart

Still to go :

- Add quantity to order
- Pay and validate the purchase (by calling the Bank service)

## Web Services
The Web Services are hosted using wso2 server running in localhost. They were written in Java [here](https://github.com/imadhy/Web-Services "Web Services")

## For testing

Download Wso2 server and enter the folder.

For Windows :

```bash
> cd bin/
> wso2server.bat
```

For Mac / Linux :

```bash
$ cd bin/
$ ./wso2server.sh
```

If you get an error like this under mac : 

```
Error: JAVA_HOME is not defined correctly.
 CARBON cannot execute /System/Library/Frameworks/JavaVM.framework/Versions/CurrentJDK/Home/bin/java
```

Run :

```bash
$ export JAVA_HOME="$(/usr/libexec/java_home)"
```

Then upload your Java service (.jar file) in your services in wso2server.

