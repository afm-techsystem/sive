-- administrador
GRANT SELECT, UPDATE, INSERT, DELETE ON bd_sive.* TO ADMINISTRADOR;

-- vendedor
--GRANT SELECT ON bd_sive.* TO vendedor;
-- funciona de a una
-- GRANT SELECT, INSERT, UPDATE, DELETE ON bd_sive.Usuario TO VENDEDOR;
-- GRANT SELECT, INSERT, UPDATE, DELETE ON bd_sive.Producto TO VENDEDOR;
-- GRANT SELECT, INSERT, UPDATE, DELETE ON bd_sive.Catalogo TO VENDEDOR;
-- GRANT SELECT, INSERT, UPDATE, DELETE ON bd_sive.CentroDePagos TO VENDEDOR;
-- GRANT SELECT, INSERT, UPDATE, DELETE ON bd_sive.Carrito TO VENDEDOR;
-- GRANT SELECT, INSERT, UPDATE, DELETE ON bd_sive.MetodoDePago TO VENDEDOR;

-- esto vale ??
-- esta rara esta??? 
--GRANT SELECT ON bd_sive.* TO vendedor;
GRANT SELECT, INSERT, UPDATE, DELETE ON bd_sive.Usuario,bd_sive.Producto,bd_sive.Catalogo,bd_sive.CentroDePagos,bd_sive.Carrito,bd_sive.MetodoDePago TO VENDEDOR;


-- cliente
GRANT SELECT, INSERT, UPDATE, DELETE ON bd_sive.Usuario TO CLIENTE;
GRANT SELECT, INSERT, UPDATE, DELETE ON bd_sive.Cliente TO CLIENTE;
GRANT SELECT, INSERT, UPDATE, DELETE ON bd_sive.Carrito TO CLIENTE;
GRANT SELECT, INSERT, UPDATE, DELETE ON bd_sive.Tarjeta TO CLIENTE;
GRANT SELECT, INSERT, UPDATE, DELETE ON bd_sive.PayPal TO CLIENTE;
GRANT SELECT, INSERT, UPDATE ON bd_sive.Compras TO CLIENTE;
GRANT SELECT ON bd_sive.Producto TO CLIENTE;
GRANT SELECT ON bd_sive.Catalogo TO CLIENTE;
GRANT SELECT ON bd_sive.Categoria TO CLIENTE;
GRANT SELECT ON bd_sive.Despacho TO CLIENTE;
GRANT SELECT ON bd_sive.CentroDePagos TO CLIENTE;
GRANT SELECT ON bd_sive.MetodoDePago TO CLIENTE;
