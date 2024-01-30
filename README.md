<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a><a href="https://laravel.com" target="_blank"><img src="https://repository-images.githubusercontent.com/120371205/b6740400-92d4-11ea-8a13-d5f6e0558e9b" width="400" alt="RAMAPI"></a></p>

<p align="center">
Esta es la prueba técnica de Nicolás Toledo para la postulación a la empresa DESTACADOS AGENCIA.
</p>

## Sobre la creación del proyecto   

- El código está desarrollado en la version de Laravel 10.42.0 y con Composer en su version 2.6.6 como se puede ver en la siguiente imagen.
- Para la creación del proyecto se realizaron los siguientes pasos:

1) Primero se creó el directorio donde se crearía el repositorio GIT.
2) Se ejecutaron los siguientes comandos:
    - composer create-project laravel/laravel PRUEBATECNICADESTACADOSAGENCIA
    - cd PRUEBATECNICADESTACADOSAGENCIA
    - php artisan serve
3) Una vez creado el proyecto se empiezan a crear las rutas, vistas y controladores.
## Sobre el código
El codigo tiene las siguientes funcionalidades:
1) Consume los datos de la API segun los requerimientos necesarios y tambien las facultades de la API, ya que esta misma al momento de hacer las consultas a la API, devuelve solo 20 valores. Es por esto que, al momento de hacer el orden alfabetico y de genero de los personajes devueltos por la API, se realiza el ordenamiento por orden alfabetico y de genero por solo esos 20 personajes.
2) El codigo tiene paginación (ver segmento de posibles mejoras). Esta paginación funciona de la siguiente manera:
    - En la vista principal, se listan los primeros 20 personajes con el status=alive, en orden alfabético y genero. Al momento de hacer click en el botón "Ir a la siguiente página", se listan los siguientes 20 personajes respetando las restricciones dichas.
    - En la vista principal, hay dos botones en la parte superior, un boton ROJO que indica la filtración de personajes con el status=dead y otro boton amarillo que filtra los personajes con el status=unknown.
    - Debajo de esos dos botones, hay 7 botones más, que filtran segun el valor de "species" en el json.
    - Los 9 botones mencionados, tienen las mismas funcionalidades que el listado de la página principal. Es decir, listan los 20 personajes retornados por la API, por orden alfabético y por género.
    - Al llegar a la ultima página, el botón de "Ir a la siguiente página" cambia por el de "Volver a la página principal", para evitar conflictos y prevenir errores.
3) Cada personaje tiene su propia sección. En la parte superior, se encuentra el nombre del personaje. En la parte inferior, se encuentra su foto y la información, respectivamente.