Nombres: Gaviña Agustin (agusgavina2@hotmail.com) - Cotugno Francisco (franciscocotugno@gmail.com)

--GET

1) GET Obtener producto:
   Obtiene una arreglolista con todos los productos disponibles.
   Ejemplo:
      Request:
      GET Administrador/Productos/
      Response:
      {
        "Product_id": 1,
        "Product_name": "Beefeater",
        "Milliliters": 1000,
        "Price": 12400,
        "Category_id": 4
    }, 
    {
        "Product_id": 2,
        "Product_name": "Bombay Frutos",
        "Milliliters": 750,
        "Price": 16500,
        "Category_id": 4
    }, y 
2) GET Obtener producto por id:
   Obtiene un producto en concreto, seleccionado por su parametro Product_id.
   Request:
   GET Administrador/Productos/:ID (3)
   Response:
   {
    "Product_id": 3,
    "Product_name": "Bombay",
    "Milliliters": 750,
    "Price": 16500,
    "Category_id": 4
   }
3) GET Obtener producto por categoria:
   Obtiene una lista de los productos filtrada por el campo 
   deseado, en este caso son las categorias.
   Request:
   GET Productos/:Categoria/ (3)
   Response:
   {
        "Product_id": 10,
        "Product_name": "Coca Cola",
        "Milliliters": 2250,
        "Price": 1350,
        "Category_id": 3
    },
    {
        "Product_id": 11,
        "Product_name": "Sprite",
        "Milliliters": 1500,
        "Price": 900,
        "Category_id": 3
    },
4) GET Obtener producto por id y categoria:
   Obtiene un producto en concreto, seleccionado por su parametro Product_id. 
   Además compara si ese producto pertenece a la categoria
   Request:
   GET Productos/:Categoria (3)/:Producto (10) 
   Response:
   {
    "Product_id": 10,
    "Product_name": "Coca Cola",
    "Milliliters": 2250,
    "Price": 1350,
    "Category_id": 3
   }

---GET categoria:
1) GET Obtener categorias:
   Obtiene una lista con todos las categorias disponibles.
   Request:
   GET Administrador/Categorias/
   Response:
   {
        "Category_id": 1,
        "Category_name": "Whisky"
    },
    {
        "Category_id": 2,
        "Category_name": "Cerveza"
    },
    {
        "Category_id": 3,
        "Category_name": "Gaseosa"
    },

2) GET Obtener categoria por id:
   Obtiene la categoria filtrada por el campo 
   deseado, en este caso el ID.
   Request:
   GET Administrador/Categorias/:ID (2)
   Response:
   {
        "Category_id": 2,
        "Category_name": "Cerveza"
   },

--Finaliza seccion GET

--POST

POST Crear un producto:
   1) POST Administrador/Productos/
      Crea un producto a partir de unos datos determinado.

POST Crear una categoria:
   1) POST Administrador/Categorias/
      Crea una categoria a partir de unos datos determinado.

--POST

--PUT

PUT Modificar un producto:
  1) PUT Administrador/Productos/:ID/
     Modifica un producto determinado a partir de un formulario, especificando el ID del mismo.

PUT Modificar una categoria:
  1) PUT Administrador/Categorias/:ID/
     Modifica una categoria determinada a partir de un formulario, especificando el ID de la misma.

--PUT 

--DELETE

DELETE Eliminar un producto:
  1) DELETE Administrador/Productos/:ID/
     Elimina un producto determinado, especificando el ID del mismo.

DELETE Eliminar una categoria:
  1) DELETE Administrador/Categorias/:ID/
     Elimina una categoria determinada, especificando el ID de la misma.

--DELETE     
