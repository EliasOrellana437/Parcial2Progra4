Miembros: Elias Ernesto Orellana Vazquez,
          Ariel Adolfo Diaz Sosa,
          Cesia Madai Avalos Diaz 

Preguntas;
1. Manejo de la conexión a la BD Manejo: La conexión se realiza mediante la extensión PDO (PHP Data Objects) o MySQLi. Se utiliza un bloque try-catch (en el caso de PDO) para encapsular el intento de conexión.
2. ¿Qué pasa si los datos son incorrectos?: Si las credenciales (host, usuario, contraseña) son erróneas, el sistema captura la excepción y muestra un mensaje de error genérico controlado.Justificación: Esto evita que el servidor lance un "Fatal Error" que exponga rutas internas o detalles técnicos del servidor, mejorando la seguridad y la experiencia del usuario
   
2. Diferencia entre $_GET y $_POST $_GET: Los datos se envían a través de la URL, son visibles para cualquiera y tienen un límite de caracteres.
   $_POST: Los datos se envían de forma invisible en el cuerpo de la petición HTTP, permitiendo manejar mayor volumen de información y archivos.
   ¿Cuándo usar cada uno?: Se usa $_GET para consultas o filtrado de datos; $_POST se usa para enviar información sensible o que modifica la base de datos.Ejemplo real en el proyecto: * Usamos $_POST en el formulario de Login y en el de Inscripción para proteger los datos personales de los estudiantes.Usamos $_GET en la tabla de visualización si quisiéramos filtrar a los estudiantes inscritos por su facultad mediante un enlace.

3. Riesgos de seguridad en la Zona Oriental Al manejar datos de usuarios en una empresa o institución de la zona oriental, identificamos los siguientes riesgos:Inyección SQL: Un atacante podría enviar código malicioso a través de los inputs para borrar o robar la base de datos de inscritos.Mitigación: Implementar Sentencias Preparadas (Prepared Statements) para separar la lógica SQL de los datos del usuario.
   Acceso no autorizado: Que usuarios no registrados intenten manipular los registros de inscripción.Mitigación: Uso de Sesiones de PHP (session_start()) para validar que solo un administrador autenticado tenga acceso a las funciones de escritura.Exposición de contraseñas: Robo de credenciales de los administradores si se guardan en texto plano.Mitigación: Uso de algoritmos de hashing como password_hash() para almacenar solo versiones cifradas de las claves.

  
