## Datos Server:

Laravel ya está instalado y configurado.


Se pretende desarrollar un Backend para gestión de agrupaciones granjeras (Uop), cada una de estas agrupaciones tiene bajo su control diversas granjas y productos (Chicken). Como cada agrupación es independiente de las otras, los listados de granjas y productos deben estar filtrados por agrupación.

## BD:

Las tablas ya han sido migradas y tienen datos para mostrar en los listados.

## Objetivos:

- Creación de los modelos para Uop, Farm, Chicken ( OK )
- Crear un dropdown (Componente Livewire) para seleccionar la agrupación de granjas. Este seleccionable debe estar visible en todo el backend. Cuando se cambie de agrupación deben filtrarse las tablas correspondientes. ( OK)
- Crear una sección y añadirla al menú para visualizar una tabla (Componente Livewire) con las granjas (Farm). ( OK )
- Crear formulario añadir nueva granja ( OK )
- Añadir opción para borrar granja de la tabla ( OK )
- Crear una sección y añadirla al menú para visualizar una tabla (Componente Livewire) con los productos (Chicken). ( OK )
- Crear formulario añadir un nuevo producto ( OK )
- Añadir opción para borrar un producto de la tabla ( OK )


## Requisitos Técnicos:

- Uso de Eloquent para todas las operaciones de base de datos (sin consultas SQL crudas).
- Implementar componentes de Livewire para los listados (Farm, Chicken) y el selector de agrupaciones granjeras.
- Eres libre de modificar cualquier fichero de Laravel que necesites cambiar.
- No es necesario implementar ningún tipo de diseño, solo las funcionalidades.
