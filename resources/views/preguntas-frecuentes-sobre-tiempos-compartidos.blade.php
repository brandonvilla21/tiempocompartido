@extends('layouts.master')
@section('content')             
    <section class="ruta py-1" id="inicia">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="/">Inicio</a>
                </div>
            </div>
        </div>
    </section>

    <div class="container padding-row">
        <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Preguntas frecuentes acerca de tiempos compartidos
                                </a>
                            </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li><strong>Necesito ser  Propietario para poder Alquilar o Comprar un Tiempo Compartido?<br>
                                    </strong>No. Todos  los listados y Publicaciones en <strong>tiempocompartido.com</strong> están disponibles  al público en general. Bienvenido! <a href="/signup"><u>Registrate aquí</u></a></li>
                                    <li><strong>Porque no puedo ver  los detalles del Propietario en una publicación para contactarlo? <br>
                                    </strong>Se  requiere haber Accesado a tu cuenta. Si aún no la tienes, <a href="/signup"><u>Registra tu cuenta.</u></a> &nbsp;Recibirás un email para confirmar tu  solicitud, Respondelo, regresa y <a href="/signup"><u>Accesa a tu cuenta</u></a> utilizando tus datos de  registro.</li>
                                    <li><strong>Como encuentro  disponibilidad de Tiempos Compartidos?<br>
                                        </strong>Utilizando  nuestro Buscador Avanzado de Propiedades, Selecciona y Filtra los resultados según  tus necesidades: En Venta, En Alquiler. Por Destino, País, Nombre de la  Propiedad, Fecha de Entrada y Salida, Capacidad, Tipo de Hospedaje, Precio,&nbsp; (completar texto con  las características del buscador…) <br>
                                    Todas las Publicaciones: &nbsp;<u>En Alquiler</u>&nbsp; <u>En Venta</u>&nbsp; <u>Promociones Especiales</u>.
                                    <li><strong>Que sucede si no  encuentro disponibilidad la semana o desarrollo que busco?</strong><br>
                                    Además de la demanda de ciertas fechas y destinos, en <strong>tiempocompartido.com</strong> cada Propietarios  publica independientemente sus membresías en Venta o en Alquiler por lo que  notaras que los listados cambian constantemente.</li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Preguntas  sobre Alquilar un Tiempo Compartido: 
                                </a>
                            </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <ul>
                                    <li><strong>Porque los  Propietarios Alquilan sus Tiempos Compartidos?<br>
                                    </strong>Regularmente  debido a ocupaciones o situaciones imprevistas que no le permiten disfrutarlo  este año, para amortizar el costo de mantenimiento o impuestos, porque ya no lo  utiliza o está tratando de venderlo pero aún no tiene un comprador.</li>
                                    <li><strong>Qué ventajas tiene  Alquilar un Tiempo Compartido de un Propietario?</strong><br>
                                    Aparte de contar con mayor privacidad, múltiples habitaciones, cocinas  totalmente equipadas para preparar alimentos, sala, comedor, lavaplatos, &nbsp;lavadora y secadora de ropa, &nbsp;la información publicada es real, ahorras negociando  el precio y en muchas ocasiones solo pagas el equivalente a su cuota anual de  mantenimiento.</li>
                                    <li><strong>Como puedo alquilar un  tiempo compartido de un propietario? </strong><br>
                                    Una vez que seleccionaste una publicación, Contacta al propietario y Negocia  las condiciones más convenientes para ambos. El trato <u>siempre</u> es  realizado 100% entre Tú y el Propietario, sin intermediación. Para tu mayor  confianza recomendamos seleccionar una PROPIEDAD CERTFICADA (link a listado de Prop Certificadas)</li>
                                    <li><strong>Que es una Propiedad  Certificada?</strong><br>
                                        Son las publicaciones verificadas por el equipo de <strong>tiempocompartido.com</strong> donde hemos corroborado que la  información publicada corresponde al contrato y documentación proporcionada  por el Propietario.
                                    </li>
                                    <li><strong>Que son los “Avisos  de Ofertas” en las Publicaciones?<br>
                                    </strong>Son notificaciones  enviadas a tu email periódicamente para tus búsquedas de<strong> </strong>fechas determinadas, destino, país o  club.<strong> </strong></li>
                                    <li><strong>Que es la "Suscripción al NewsLetter</strong>"?<br>
                                    Son notificaciones  enviadas a tu email periódicamente con novedades y  artículos sobre destinos específicos para vacacionar.<strong> </strong></li>
                                    <li><strong>Que significa</strong> "<strong>Deseo recibir actualizaciones de esta membresía</strong>"? <br>
                                    Marcando  esta opción recibirás<strong> </strong>vía email un  aviso cada que esta publicación sea modificada.<strong><em> (dentro  de detalle de membresias</em></strong>,  agregar una lista de selección "Todas", Destino específico, fechas  específicas, etc.)<strong> </strong></li>
                                    <li><strong>Como encontrar más  información de una publicación en particular? </strong><br>
                                    La información contenida en las publicaciones es proporcionada por cada propietario.  Contáctalo y solicítala en la página de su publicación.</li>
                                    <li><strong>Como contacto al  Propietario de una publicación?<br>
                                        </strong>Por  seguridad y comodidad, en cada publicación encontraras las secciones: <strong>Contactar al Propietario </strong>si deseas enviarle un Mensaje  Privado<br>
                                    <strong>Preguntas</strong> para aclarar todas tus dudas sobre instalaciones,  amenidades, el destino y sus recomendaciones personales de como disfrutar al  máximo tus próximas vacaciones en esa propiedad. Lee las respuestas a las <strong>Preguntas</strong> de otros usuarios y comparte con ellos tus  inquietudes. </li>
                                    <li><strong>Cuanto tiempo tarda  un propietario en responder mis dudas y mensajes?<br>
                                    </strong>Nuestro  sistema envía automáticamente al propietario tus mensajes y Preguntas. Si  después de unos días razonables aun no recibes respuesta <u>contáctanos aquí</u> &lt;link a contacto&gt;</li>
                                    <li><strong>El precio publicado es  negociable? <br>
                                    </strong>La mayoría  de las publicaciones son negociables. Busca por esta indicación debajo del  precio. Pregunta al propietario por el precio más bajo, no tienes nada que  perder!<strong></strong></li>
                                    <li><strong>Porque leo o recibo  respuestas y ofertas de “otro” usuario?<br>
                                    </strong>Hemos  detectado algunos usuarios utilizando nuestro sistema para promover sus  servicios de reventa. <strong>No respondas a  estas invitaciones</strong>. <strong><em><u>tiempocompartido</u></em></strong><strong><em><u>.com</u></em></strong> <strong><em>no tiene ninguna relación con  estas personas</em></strong>. Estamos tomando medidas para evitar este asunto.  Gracias por tu comprensión.</li>
                                    <li><strong>Puedo alquilar solo  unas Noches en lugar de Semanas Completas?<br>
                                    </strong>Los  Tiempos Compartidos son adquiridos generalmente en base a semanas<strong>, </strong>sin embargo si aceptas pagar el costo  de la semana completa pero utilizar menos noches recomendamos contactar al  propietario para que informe al desarrollo.</li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Preguntas  sobre Comprar un Tiempo Compartido: 
                                </a>
                            </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <ul>
                                    <li><strong>Que es un Tiempo  Compartido?</strong><br>
                                        Es el derecho a disfrutar alojamiento en un complejo o resort específico, regularmente  por una semana cada año. Esencialmente pagas por adelantado por el alojamiento  de futuras vacaciones anuales. <br>
                                    Los complejos de tiempo compartido ofrecen lujosas habitaciones mucho más  espaciosas que un hotel tradicional además de una serie de beneficios  particulares.</li>
                                    <li><strong>Porque comprar un  tiempo compartido de Reventa?</strong><br>
                                    Porque al comprarle directamente a un propietario ahorras hasta un 70%  comparado al precio adquiriéndolo con el desarrollador. Similar al comprarle un  auto usado a un particular.</li>
                                    <li><strong>Como comprar una  membresía?</strong><br>
                                    Selecciona una publicación, Contacta al propietario y acuerda las condiciones  más convenientes para ambos. El trato es realizado 100% entre tú y los  propietarios, sin intermediación.</li>
                                    <li><strong>Que es una Propiedad  Certificada?</strong><br>
                                        Son las propiedades que han sido Certificadas por tiempocompartido.com que  la información publicada es como lo establece el contrato original firmado por  el propietario.
                                    </li>
                                    <li><strong>Que diferencia existe  entre semanas fijas, flotantes y puntos?</strong><br>
                                        Semanas Fijas: Te da el derecho al mismo alojamiento (Unidad) y fecha cada año.<br>
                                        Semana Flotante: Te da derecho a cualquier alojamiento y fecha disponible durante  el año o temporada.<br>
                                    Puntos: En base a una tabla de valores puedes consumir tus puntos en cualquier  tamaño de suite y fecha. Sujeto solo a la disponibilidad de la fecha que desees  reservar.</li>
                                    <li><strong>Qué diferencia hay  entre temporadas Rojas, Blancas, Amarillas, Azul y Verde?</strong><br>
                                    Estos colores se utilizan para categorizar la demanda de una semana específica  en un resort en particular. Rojo es considerado Alta, Blanco o Amarillo Media,  Azul o Verde Baja</li>
                                    <li><strong>Siendo un nuevo  propietario tendré que pagar cuotas de mantenimiento?</strong><br>
                                    Sí. Sin importar si lo adquieres de un desarrollador o en reventa de un  propietario, eres responsable de pagar las cuotas de mantenimiento anual.</li>
                                    <li><strong>Porque leo o recibo  respuestas y ofertas de “otro” usuario?<br>
                                    </strong>Hemos  detectado algunos usuarios utilizando nuestro sistema para promover sus  servicios de reventa. <strong>No respondas a  estas invitaciones</strong>. <strong><em><u>tiempocompartido</u></em></strong><strong><em><u>.com</u></em></strong> <strong><em>no tiene ninguna relación con  estas personas</em></strong>. Estamos tomando medidas para evitar este asunto.  Gracias por tu comprensión.</li>
                                    <li><strong>Puedo probarlo antes  decidir una compra?</strong><br>
                                    <u>Alquila</u> &lt;link&gt; una semana de un Propietario o&nbsp; Aprovecha una <a href="/promociones"><u>Promoción</u></a> para probar y conocer un Resort, se  requiere generalmente aceptar condiciones y asistir a una presentación de  ventas <u>sin compromiso de compra.</u></li>
                                </ul> 
                            </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Preguntas de Propietarios sobre Publicar y Mi  Cuenta
                                </a>
                            </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <ul>
                                    <li><strong>Que debo hacer antes  de publicar mi Tiempo Compartido en Venta?</strong><br>
                                        Leer detenidamente tu contrato original de compra debido a que algunos  desarrollos estipulan en sus contratos restricciones tales como ”primera opción  de compra” o “limitación de beneficios originales” para nuevos propietarios.<br>
                                    Contacta a tu desarrollador y solicítales te informen el costo y condiciones  requeridas para realizar un trámite de cambio de propietario y cesión de  derechos. </li>
                                    <li><strong>Cuánto me cuesta  publicar mi Tiempo Compartido?</strong><br>
                                    Publicar  es un servicio gratuito y exclusivo para Propietarios de Tiempos Compartidos.  Si tienes urgencia en Alquilar o Vender selecciona entre varias opciones que  encontraras entrando a tu cuenta y al costado de tus publicaciones. </li>
                                    <li><strong>Como publicar mi  membresía en tiempocompartido.com?</strong><br>
                                    <u>Regístrate</u> &lt;links&gt; y <u>Accede a tu  cuenta</u>. Clic en Publicar membresía. Ten a la mano tu contrato para mayor  precisión en la información de tu publicación. Puedes modificar posteriormente  entrando a tu cuenta, clic en modificar publicación, no olvides salvar los  cambios. </li>
                                    <li><strong>Cuantas membresías  puedo publicar con mi cuenta gratis?</strong><br>
                                    Solo una publicación, ya sea en Venta o en Alquiler. Si deseas publicar  membresías adicionales o eres un agencia de representación consulta nuestros <u>planes  de publicación</u> &lt;link a planes&gt;</li>
                                    <li><strong>Es necesario además contratar  un agente de bienes raíces para vender mi membresía?</strong><br>
                                    No, los tiempos compartidos generalmente no se consideran un bien raíz y puedes  transferir tus derechos de uso y goce sin pagar comisiones tramitando cada  propietario directamente con su desarrollador.</li>
                                    <li><strong>Necesito además contratar  un abogado para tramitar el cambio de propietario?</strong><br>
                                    No, esta solicitud la debes realizar tú como propietario original y directamente  con el desarrollador, funciona como una simple cesión de derechos por el tiempo  restante de tu contrato original.</li>
                                    <li><strong>Se requiere cotizar  mi tiempo compartido para poder venderlo?</strong><br>
                                    No, igual como nunca es necesario cotizarlo al adquirirlo originalmente.</li>
                                    <li><strong>A qué precio debo publicar  mi tiempo compartido?<br>
                                    </strong>Tú lo  decides. La mayoría publican precios en venta entre un 20% y un 70% por debajo  del precio de compra original y en alquiler por el importe de la cuota de  mantenimiento. Para modificar el precio solo entra a tu cuenta, clic en  modificar y salva los cambios en tu publicación.</li>
                                    <li><strong>Puedo vender mi  tiempo compartido si he dejado de pagar mi(s) cuota(s) de mantenimiento y/o  expensas anual(es)?</strong><br>
                                    No. Te recomendamos leer detenidamente tu contrato original y revisar las  penalizaciones y plazos estipulados y reconfirmar con tu desarrollador.</li>
                                    <li><strong>Cuanto tiempo toma  vender mi tiempo compartido?</strong><br>
                                    NADIE puede garantizarte un plazo ya que depende de varios factores como:  ubicación de la propiedad, capacidad, nivel de calidad, amenidades, temporada,  demanda, beneficios y principalmente el precio de venta que solicitas por tu  tiempo compartido. </li>
                                    <li><strong>Como podría reducir  el tiempo para alquilar o vender mi tiempo compartido?</strong><br>
                                    Reduciendo el precio solicitado, <strong>“Certifica tu  publicación”</strong> o contrata un “plan destacado” para incrementar la  credibilidad y exposición entre los cientos de visitantes diarios a <strong>tiempocompartido.com </strong></li>
                                    <li><strong>Que es una Propiedad  Certificada?<br>
                                    </strong>Son las  propiedades que han sido verificadas por <strong>tiempocompartido.com</strong> y la información publicada coincide con los datos del contrato original.</li>
                                    <li>Q<strong>ue pasara con mis semanas  depositadas en la compañía de intercambio al vender mi tiempo compartido?<br>
                                    </strong>Tus semanas depositadas con una compañía de intercambio ya no tienen  relación con tu desarrollo por lo que la reventa de tu membresía no te impide  su uso o puedes utilizarlas como incentivo adicional al comprador interesado.</li>
                                    <li><strong>Puedo publicar mis  semanas bono y certificados extras?</strong><br>
                                    No, Generalmente estos bonos y certificados son intransferibles. Revisa  y lee las condiciones impresas.</li>
                                    <li><strong>Puedo utilizar mi  tiempo compartido mientras lo tengo publicado?<br>
                                    </strong>Claro que  sí!, Tú mantienes el control de tu membresía todo el tiempo. Puedes <strong><em>suspender</em></strong> tu  publicación temporalmente y reiniciarla en cualquier momento, sin perder la  información.</li>
                                    <li><strong>Como cambio mi nombre  de usuario, contraseña, email?</strong></li>
                                    <li>Qué hacer si olvide mi contraseña?</li>
                                    <li>Donde consigo un formato para concretar un Alquiler?</li>
                                    <li>Donde consigo un formato para concretar una Venta?</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection