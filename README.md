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
1) Consume los datos de la API segun los requerimientos necesarios y tambien las facultades de la API, ya que esta misma al momento de hacer las consultas a la API, devuelve solo 20 valores. Es por esto que, al momento de hacer el orden alfabetico y de genero de los personajes devueltos por la API, se realiza el ordenamiento por orden alfabetico y de genero de esos 20 personajes.
2) El codigo tiene paginación (ver segmento de posibles mejoras). Esta paginación funciona de la siguiente manera:
    - En la vista principal, se listan los primeros 20 personajes con el "status=alive", en orden alfabético y genero. Al momento de hacer click en el botón "Ir a la siguiente página", se listan los siguientes 20 personajes respetando las restricciones dichas.
    - En la vista principal, hay dos botones en la parte superior, un boton ROJO que indica la filtración de personajes con el "status=dead" y otro boton AMARILLO que filtra los personajes con el "status=unknown".
    - Debajo de esos dos botones, hay 7 botones más, que filtran segun el valor de "species" del json.
    - Los 9 botones mencionados, tienen las mismas funcionalidades que el listado de la página principal. Es decir, listan los 20 personajes retornados por la API, por orden alfabético y por género.
    - Al llegar a la ultima página, el botón de "Ir a la siguiente página" cambia por el de "Volver a la página principal", para evitar conflictos y prevenir errores.
3) Cada personaje tiene su propia sección. En la parte superior, se encuentra el nombre del personaje y en la parte inferior, se encuentra su foto con su información, respectivamente.
4) Para prevenir el uso de vistas innecesarias en la filtración de personajes segun el valor de "species", se utilizó una sola vista para seguir con la paginación de cada uno de los grupos de personajes filtrados. Aunque, para la obtencion de los datos necesitados para la filtración, se creó una vista para cada uno de los grupos, llamando desde esa vista (con sus respectivas rutas mediante el controlador) cada una de las peticiones correspondientes a las filtraciones de personajes necesarias. El caso de la página principal es un poco distinto, ya que almacena los botones de las distintas categorias de personajes, por lo que se crearon vistas aparte, para prevenir errores y malfuncionamientos de la herramienta.
5) Cada una de las categorías posee una ruta distinta (ver segmento de posibles mejoras).
6) Se utilizó una plantilla blade (layout) para la importacion de estilos Bootstrap 5.0 y así prevenir la reutilización de código que pudiese entorpecer el desarrollo de la herramienta.
7) No se utilizó ningun motor de Bases de Datos, pero aun así se realizaron algunas migraciones.
8) Las únicas librerías utilizadas fueron Guzzle y Blade.

## Posibles Mejoras

1) Para la paginación, las mejoras evidentes son las siguientes:
    - Botonera en la parte inferior que muestre la cantidad de páginas y al hacer click en una de las páginas disponibles, esta se vaya a la página seleccionada, cargando los personajes correspondientes a esa página. 
    - Crear una sección en donde se muestren todas las características disponibles. Seleccionar el tipo de especie de personaje que se quiera ver, y se listen todos los correspondientes a esa especie, sin ir cambiando de página para ver los distintos personajes de las especies correspondientes.
    - Boton de volver a la página anterior.
2) Para el diseño del código, las rutas son importantes para la obtencion de los datos de la API, por lo que al tener rutas específicas a cada una de las especies o características de los personajes puede ayudar a tener mejor nocion de los datos que se están trabajando, pero se puede mejorar el como estos datos se despliegan en las vistas.

### Apreciaciones personales

En lo personal, el reto es bastante interesante, ya que se debe aplicar bastante conocimiento para la obtencion de datos y listarlos de manera ordenada en la página. Para mi fue un reto, ya que habia ocupado muy poco Laravel (era de programar en PHP Puro), pero ahora que pude realizar este desafío, se ha convertido en uno de mis frameworks favoritos y sin duda uno de mis principales. Muchas gracias por la oportunidad de poder participar en este reto, lo he disfrutado.