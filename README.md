La idea general del proyecto es crear una pagina la cual permita mantener el control de stock de una perfumeria.
La cual seria de una pagina de login , otra pagina donde se muestre la tabla y ademas otra pagina para hacer altas y modificaciones de los distintos perfumes.
Entre los datos que se manejaran van a esta el nombre , descripcion, contenido ( en ml) , creador , precio, cantidad e imagen.(El creador seria una identidad independiente que potencialmente podria haber creado varios perfumes)
Va a haber 2 tipos de roles, uno que es empleado, el cual puede solamente modificar la cantidad del producto y otro que va a ser el admin, el cual tiene permito el ABM de cada producto.


tab1:
php artisan serve

tab2:
php artisan migrate:fresh
php artisan db:seed
php artisan passport:install
