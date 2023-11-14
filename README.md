Nombres: Gaviña Agustin (agusgavina2@hotmail.com) - Cotugno Francisco (franciscocotugno@gmail.com)

Aclaración:
   - En el proceso del trabajo se utilizó en varias ocasiones la extensión "Live Share" para trabajar en conjunto. Por este motivo hay más commits de un integrante que del otro.


**Obtener todos los productos**
GET Administrador/Productos

**Obtener producto por id**
GET Administrador/Productos/:ID
:ID = Product_id

**Crear un producto**
POST Administrador/Productos
Codigo necesario: {"Product_name": varchar, "Milliliters": int, "Price": int, "Category_id": int}

**Modificar un producto**
PUT Administrador/Productos/:ID
:ID = Product_id
Codigo necesario: {"Product_name": varchar, "Milliliters": int, "Price": int, "Category_id": int}

**Eliminar un producto**
DELETE Administrador/Productos/:ID
:ID = Product_id

**Obtener categorias**
GET Administrador/Categorias

**Obtener categoria por id**
GET Administrador/Categorias/:ID
:ID = Category_id

**Crear una categoria**
POST Administrador/Categorias
Codigo necesario: {"Category_name": varchar}

**Modificar una categoria**
PUT Administrador/Categorias/:ID
:ID = Category_id
Codigo necesario: {"Category_name": varchar}

**Eliminar una categoria**
DELETE Administrador/Categorias/:ID
:ID = Category_id



**Obtener todos los productos**
GET Productos

**Obtener todos los productos de forma ordenada**
GET Productos?sort=?&order=?
Esta accion se realiza si sort es igual a "Price" o "Product_name", y order a "ASC" o "DESC" (Ver linea 25 del app/controllers/products.api.controller.php)

**Obtener los producto de una categoria en espefico**
GET Productos/:Categoria
:Categoria = Category_id

**Obtener los producto de una categoria en espefico de forma ordenada**
GET Productos/:Categoria?sort=?&order=?
Esta accion se realiza si sort es igual a "Price" y order a "ASC" o "DESC" (Ver linea 54 del app/controllers/products.api.controller.php)

**Obtener producto por id y categoria**
GET Productos/:Categoria/:Producto
Obtiene un producto en concreto, seleccionado por su parametro Product_id. Además compara si ese producto pertenece a la categoria
Por ejemplo:
   Request: 
      Productos/3/10
   Response:
      {
      "Product_id": 10,
      "Product_name": "Coca Cola",
      "Milliliters": 2250,
      "Price": 1350,
      "Category_id": 3
      }

   Request:
      Productos/4/30
   Response:
      "Product id=30 doesnt belong to the category"