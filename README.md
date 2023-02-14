# Prueba Balidea
Realizar la instalación habitual por medio de composer

`composer install`

## Custom module: balidea_module

1. Formulario de configuración con un campo "Texto" traducible (textarea con wysiwyg) y otro campo "Entero" que solo permita números enteros.<br><br>
**Rpta: /home/yeisua/balidea/web/modules/custom/balidea_module/src/Form/BalideaForm.php<br>
El mismo fue configurado para estar disponible navegando en *Configuración > Sistema > Balidea* cumpliendo con el criterio de traducción para el cambo Texto que esta configuracod wysiwyg.**

2. Controlador que la información configurada en el formulario anterior acompañada de un texto fijo para cada uno de los campos (Texto informativo y Número entero).<br><br>**Rpta: Se puede validar en termino funcional a traves de la ruta /balidea-module/render preparada con restricciones de acceso.<br>A nivel de modulo, tiene un hook install para hacer la inclusión del item de menu en el menu *main*<br>Se genera hook_theme para ofrecer template para la muestra del template a nivel del build del controller, se pasan las variables de configuración generadas a traves del formulario en el punto 1.**

3. El módulo debe estar preparado para inglés y castellano.<br><br>**Rpta: Implicito en cada punto previo, tanto a nivel configuración permite traducción gracias al manejo del schema.yml en la carpeta install del modulo y todo el manejo de funciont t() / $this->t para mantener traducciones, tambien instanciación de hook_locale_translation_projects_alter() para apuntar hacia archivo local para cargar las traducciones.**

4. El módulo también debe añadir al body del sitio la clase del tipo de contenido que se esté mostrando cuando se trata de una página de un nodo.<br><br> **Rpta: Implementación hook_preprocess_THEMEHOOK para añadir dinamicamente clase al body, detectando si se trata de un nodo, y extrayendo el nombre del bundle para ponerlo como clase en el tag Body.**

## Custom theme: balidea_theme
1. Una hoja de estilos que cambie el color del fondo del sitio y ajuste la tipografía con otra cualquiera.<br><br>**Rpta: Se genera theme custom a partir classy, motivo por el cual se hace uso de D9, ya que en D10 este modulo ha sido depreciado. Se adiciona library global, para garantizar que aplique en todo el sitio la hoja de estilo styles.css**

2. Un archivo js que añada un botón al cuerpo del sitio y que al pulsarlo saque un alert con el nombre del portal.<br><br>**Rpta: En la misma library del punto anterior se hace la inclusión del archivo web/themes/custom/balidea_theme/js/main.js el cual esta escrito con javascript, evitando el uso de jquery, el cual estara depreciado eventualmente segun las recomendaciones de lanzamiento de D10, cumpliendo funcionalmente con lo solicitado**