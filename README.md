Nombres: Gaviña Agustin (agusgavina2@hotmail.com) - Cotugno Francisco (franciscocotugno@gmail.com)

--GET

GET Obtener producto:
1) GET Administrador/productos/
   Obtiene una lista con todos los productos disponibles.
2) GET Productos/:Categoria/:Producto/
   Obtiene una lista de los productos filtrada por el campo 
   deseado, en este caso son las categorias.
3) GET Administrador/Productos?sort=prioridad&order=asc/
   Obtiene una lista con todos los productos ordenados por un 
   orden determinado.

GET Obtener categoria:
1) GET Administrador/Categorias/
   Obtiene una lista con todos los productos disponibles.
2) GET Administrador/Categorias/:ID
   Obtiene la categoria filtrada por el campo 
   deseado, en este caso el ID.

--GET

--POST

POST Crear un producto:
1) POST Administrador/Productos/
   Crea un producto a partir de un formulario determinado.

POST Crear una categoria:
  1) POST Administrador/Categorias/
     Crea una categoria a partir de un formulario     
     determinado.

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
