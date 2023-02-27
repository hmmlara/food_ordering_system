<footer class="text-center">
            <p>No 14, Nandar St, Conor of KhanTawLay'circle, Infront of Gannamar Park, YatKatGyi 6, Pyin Oo Lwin</p>
            <p>Ph no : 09 794278148</p>
        </footer>
        <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>          -->
        <!-- <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script> -->

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

                $( ".cartShake" ).addClass( "animate__headShake" );

                <?php
                unset($_SESSION['cart_meg_err']);
               

            } 
            
            else{
                ?>
                $( ".cartShake" ).removeClass( "animate__headShake" );
           <?php }
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

        <script>  
        <?php
            if(isset($_SESSION['order_meg_success']))
            {
                ?>
                
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('<?= $_SESSION['order_meg_success']; ?>');
                
                <?php
                unset($_SESSION['order_meg_success']);
               

            } 
        ?>
        </script>

        
    <script>

        function check_session_id()
        {
            var session_id = "<?php echo $_SESSION['user_session_id']; ?>";
            fetch ('index.php').then(function(response) {
                return response.json();

            }).then(function(responseData) {
                if(responseData.output == 'logout') {
                    // window.location.href = 'localhost/fos/login.php';
                    <?php header("Location:login.php") ?>;
                }
                else{
                    window.location.href = 'register.php';
                }
            })
        }

        setInterval(function() => {
            check_session_id();
        }, 10000);
    </script>

    </body>

</html>