# Proyecto-Alimentador
Este proyecto tiene como objetivo ver el estado de un animal mascota, esto basado en su alimentación e hidratación mediante la temperatura del ambiente, la humedad del ambiente, la cantidad de comida que come y finalmente la cantidad de veces que toma agua.

Lo que explora este artefacto es mediante a 3 sensores diferentes, el de temperatura y humedad DHT11, sensor de peso HX711 y un flujometro YF-S201.


### ¿Requisitos?

Para hacer funcionar este artefacto es necesario lo siguiente:

- Arduino UNO R3
- Conexión a internet para conectarse a arduino Cloud
- Sensores antes mencionados
- Sistema Operativo Linux
- PHP >= 8
- 10.9.4-MariaDB o MySQL 8.0.31
- Nodejs >= 16.18.0

### ¿Como funciona?

Para hacer funcionar el servidor debemos hacer lo siguiente:

- Ejecutar arduino cloud y conectar arduino mediante arduino cloud\
Esto se utiliza para poder generar la conexión del arduino uno.
- Utilizar el comando "node app.js"\
Esto para poder hacer una conexión hacia la base de datos y enviar la data del arduino.
- Utilizar en otra terminal el comando "php -S localhost:8080"\
Esto se utiliza para hacer inicio del servidor y ver todos los datos de la mascota

### ¿Qué necesito para hacer la conexión?

Luego de hacer las ejecuciones correspondientes, la base de datos comenzará a obtener los datos, mediante un token, el cual se debe modificar en el archivo "app.js" e insertar el token dado.

Luego registrarse en la página web, utilizando el token enviado con anterioridad.

Terminando el registro se puede visualizar la pantalla de login, dónde si inicias sesión puedes ver el monitoreo de la mascota.
