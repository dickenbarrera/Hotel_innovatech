<?php
    //     
?>
    <div style="display:flex; justify-content:end;">
        <div id="view_chatbot" class="view_chatbot" style="visibility: hidden;bottom: 150px; position: fixed;">
            <div>
    
            <?php
                include "src/views/chatbot/chatbot.php";
            ?>
            </div>
        </div>
    </div>
    <!-- Footer de la aplicación -->
    <footer>
    <div class="chatbot">
        <a href="" onclick="agregarempl()">
            <img src="public/images/chatbot.png" class="img-chatbot" alt="">
        </a>
    </div>
        <p>&copy; <?php echo date('Y'); ?> Mi Aplicación - Todos los derechos reservados.</p>
    </footer>

    <!-- Incluir el archivo de JavaScript principal -->
    <script src="public/js/app.js"></script>
    <script>
        function agregarempl(){
            let jsc= document.getElementById("view_chatbot").style.visibility === "hidden";
            if(jsc){
                document.getElementById("view_chatbot").style.visibility="visible";
                event.preventDefault();
            }else{
                document.getElementById("view_chatbot").style.visibility="hidden";
                event.preventDefault();
            }
        }
    </script>
</body>

</html>