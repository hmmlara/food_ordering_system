<footer class="block footer1 footer text-center">
            <p>No 14, Nandar St, Conor of KhanTawLay'circle, Infront of Gannamar Park, YatKatGyi 6, Pyin Oo Lwin</p>
            <p>Ph no : 09 794278148</p>
        </footer>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script>
            AOS.init();
        </script>
        <script src="js/custom-general.js"></script>
        <!-- Alertify JS -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script>  
        <?php
            if(isset($_SESSION['updated_info_message']))
            {
                ?>
                
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('<?= $_SESSION['updated_info_message']; ?>');
                
                <?php
                unset($_SESSION['updated_info_message']);
               

            } 
        ?>
        </script>
        
        <script>  
        <?php
            if(isset($_SESSION['cart_meg_err']))
            {
                ?>
                
                alertify.set('notifier','position', 'bottom-right');
                alertify.error('<?= $_SESSION['cart_meg_err']; ?>');
                
                <?php
                unset($_SESSION['cart_meg_err']);
               

            } 
        ?>
        </script>

        <script>  
        <?php
            if(isset($_SESSION['cart_meg_success']))
            {
                ?>
                
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('<?= $_SESSION['cart_meg_success']; ?>');
                
                <?php
                unset($_SESSION['cart_meg_success']);
               

            } 
        ?>
        </script>

        <script>  
        <?php
            if(isset($_SESSION['removeItem_msg']))
            {
                ?>
                
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('<?= $_SESSION['removeItem_msg']; ?>');
                
                <?php
                unset($_SESSION['removeItem_msg']);
               

            } 
        ?>
        </script>

        <script>  
        <?php
            if(isset($_SESSION['removeAllItem_msg']))
            {
                ?>
                
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('<?= $_SESSION['removeAllItem_msg']; ?>');
                
                <?php
                unset($_SESSION['removeAllItem_msg']);
               

            } 
        ?>
        </script>

    </body>

</html>