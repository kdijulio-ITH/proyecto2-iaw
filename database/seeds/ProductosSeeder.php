<?php
use Illuminate\Database\Seeder;
use \App\User;
use \App\Producto;
use \App\Stock;
use Illuminate\Support\Facades\DB;
class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          try{
               $producto = Producto::create([
                    'nombre' => 'hallowen man',
                    'descripcion' => 'Perfume masculino: Dulce y fuerte',
                    'creador' => 'J. Del Pozo',
                    'imagen' => 'hallowenman.jpeg'
                ]);

             $stock = Stock::create([
                  'precio' => 4000,
                  'contenido' => 100,
                  'disponibles' => 3,
                  'producto_id' => $producto->id
             ]);
             $stock = Stock::create([
                  'precio' => 2100,
                  'contenido' => 50,
                  'disponibles' => 5,
                  'producto_id' => $producto->id
             ]);
           }catch (Exception $e) {};

           try{
            $producto = Producto::create([
                   'nombre' => 'Lady Millon',
                   'descripcion' => 'Perfume femenino: AROMA: floral, amaderado fresco.',
                   'creador' => 'Paco Rabanne',
                   'imagen' => 'ladymillon.jpeg'
               ]);

            $stock = Stock::create([
                 'precio' => 4000,
                 'contenido' => 100,
                 'disponibles' => 2,
                 'producto_id' => $producto->id
            ]);
            $stock = Stock::create([
                 'precio' => 2100,
                 'contenido' => 50,
                 'disponibles' => 3,
                 'producto_id' => $producto->id
            ]);
            $stock = Stock::create([
                 'precio' => 3050,
                 'contenido' => 75,
                 'disponibles' => 1,
                 'producto_id' => $producto->id
            ]);
            }catch (Exception $e) {};

            try{
             $producto = Producto::create([
                    'nombre' => 'Le Male',
                    'descripcion' => 'Perfume masculino: La lavanda, que evoca el olor al hombre recién afeitado, es realzada por la sensualidad de la vainilla.',
                    'creador' => 'JEAN PAUL GAULTIER',
                    'imagen' => 'lemale.jpeg'
                ]);

             $stock = Stock::create([
                  'precio' => 5000,
                  'contenido' => 100,
                  'disponibles' => 5,
                  'producto_id' => $producto->id
             ]);
             $stock = Stock::create([
                  'precio' => 2600,
                  'contenido' => 50,
                  'disponibles' => 8,
                  'producto_id' => $producto->id
             ]);
             $stock = Stock::create([
                  'precio' => 4200,
                  'contenido' => 75,
                  'disponibles' => 3,
                  'producto_id' => $producto->id
             ]);
             }catch (Exception $e) {};

             try{
              $producto = Producto::create([
                     'nombre' => 'One Millon',
                     'descripcion' => 'Perfume masculino: Fragancia extremadamente moderna y masculina. Su envase es una reiterpretacion de un lingote de oro.',
                     'creador' => 'Paco Rabanne',
                     'imagen' => 'onemillon.jpeg'
                 ]);

              $stock = Stock::create([
                   'precio' => 3000,
                   'contenido' => 100,
                   'disponibles' => 5,
                   'producto_id' => $producto->id
              ]);
              $stock = Stock::create([
                   'precio' => 1600,
                   'contenido' => 50,
                   'disponibles' => 8,
                   'producto_id' => $producto->id
              ]);
              $stock = Stock::create([
                   'precio' => 2400,
                   'contenido' => 75,
                   'disponibles' => 3,
                   'producto_id' => $producto->id
              ]);
              }catch (Exception $e) {};

              try{
               $producto = Producto::create([
                      'nombre' => 'Spice Bomb',
                      'descripcion' => 'Perfume masculino:Notas de salida:alcaravea, pimienta negra.
                       Notas de corazón:lavanda, azafran, tabaco.',
                      'creador' => 'VIKTOR & ROLF',
                      'imagen' => 'spicebomb.jpeg'
                  ]);

               $stock = Stock::create([
                    'precio' => 3000,
                    'contenido' => 100,
                    'disponibles' => 5,
                    'producto_id' => $producto->id
               ]);
               $stock = Stock::create([
                    'precio' => 1600,
                    'contenido' => 50,
                    'disponibles' => 8,
                    'producto_id' => $producto->id
               ]);
               $stock = Stock::create([
                    'precio' => 2400,
                    'contenido' => 75,
                    'disponibles' => 3,
                    'producto_id' => $producto->id
               ]);
               }catch (Exception $e) {};




    }
}
