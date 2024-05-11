<x-cliente-layout titulo="Ayuda">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Preguntas frecuentes
                            <svg id="toggle-text" xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                            stroke-linecap="round" stroke-linejoin="round" class="feather" style="float: right;">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </h5>
                        <div id="text-section" style="display: none;">
                            <div class="mb-3">
                                <p class="form-label" style="margin-bottom: 0;"><u>¿Cómo hacer una devolución?</u></p>
                                <p style="margin-top: 0;">Para realizar una devolución, simplemente contacta con 
                                    nuestro equipo de atención al cliente y te ayudaremos con el proceso.</p>
                            </div>
                            <div class="mb-3">
                                <p class="form-label" style="margin-bottom: 0;"><u>¿Dónde está mi pedido?</u></p>
                                <p style="margin-top: 0;">Puedes rastrear tu pedido utilizando el número de 
                                    seguimiento proporcionado en el correo electrónico de confirmación de tu pedido.</p>
                            </div>
                            <div class="mb-3">
                                <p class="form-label" style="margin-bottom: 0;"><u>¿Qué métodos de pago puedo utilizar?</u></p>
                                <p style="margin-top: 0;">Actualmente aceptamos pagos en efectivo. Próximamente 
                                    estaremos agregando más opciones de pago.</p>
                            </div>
                        </div>
                        <hr style="margin-top: 0;">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <p style="font-size: 1.1em;">¿Necesitas más ayuda?<br>¡Contáctanos!</p>
                                <p><strong><i class="fas fa-phone-alt"></i> Teléfono:</strong> 33-33-33-55-55</p>
                                <p><strong><i class="far fa-envelope"></i> Correo electrónico:</strong> <a href="mailto:megamartmx@gmail.com">megamartmx@gmail.com</a></p>
                                <p><strong><i class="fas fa-map-marker-alt"></i> Dirección:</strong>
                                    <br> Blvd. Gral. Marcelino García Barragán 1421, Olímpica, 44430 Guadalajara, Jal.</p>
                                <p><strong>¡Estamos aquí para ayudarte en todo momento!</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-md-6">
                <br><br>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1862.8564321234657!2d-103.33600916501232!3d20.658868612340497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428a4e33bfbf7c3%3A0x5b3a51d8754fb4ad!2sBlvd.%20Gral.%20Marcelino%20Garc%C3%ADa%20Barrag%C3%A1n%201421%2C%20Ol%C3%ADmpica%2C%2044430%20Guadalajara%2C%20Jal.!5e0!3m2!1sen!2smx!4v1620715612810!5m2!1sen!2smx" 
                    allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</x-cliente-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleText = document.getElementById('toggle-text');
        const textSection = document.getElementById('text-section');

        toggleText.addEventListener('click', function() {
            textSection.style.display = (textSection.style.display === 'none') ? 'block' : 'none';
        });
    });
</script>
